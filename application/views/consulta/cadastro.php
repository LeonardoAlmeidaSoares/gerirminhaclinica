<section role="main" class="content-body">
	<header class="page-header">
		<h2>Cadastro de Consulta</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="<?= base_url();?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Consulta</span>
			</li>
			<li>
				<span>Cadastro</span>
			</li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
<body>
	
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<section class="panel">
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/consulta/add");?>'>
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Cadastro de Consulta</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<div class="form-group">
									<label class="control-label">Nome do Colaborador</label>
									<select class="form-control" name="txtColaborador" id="txtColaborador">
										<option value="0" selected hidden>SELECIONE O COLABORADOR</option>
										<?php foreach ($colaboradores->result() as $item) { ?>
											<option value="<?= $item->codColaborador;?>"><?= $item->nome;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Nome do Dependente</label>
									<select class="form-control" name="txtDependente" id="txtDependente">
										<option value="0" selected hidden>SELECIONE O DEPENDENTE</option>
										<?php foreach ($dependentes->result() as $item) { ?>
											<option value="<?= $item->codDependente;?>"><?= $item->nome;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Horário</label>
									<input type="text" id="txtHorario" name="txtHorario" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Procedimento</label>
									<select id="txtProcedimento" name="txtProcedimento" class="form-control">
										<option hidden selected value="0">SELECIONE O PROCEDIMENTO</option>
										<?php $codLast = 0;

											foreach($procedimentos->result() as $item){

												if($item->codEspecializacao != $codLast) {
													$codLast = $item->codEspecializacao; ?>
													<optgroup label="<?= $item->especialidade;?>"></optgroup>
											<?php } ?>

											<option value="<?= $item->codProcedimento;?>"><?= $item->nome;?></option>

											<?php }

										?>
									</select>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Valor Total</label>
									<input type="text" id="txtValor" name="txtValor" readonly class="form-control">
								</div>
							</div>

						</div>

						<br />
					
						<div class="row">
							<div class="col-xs-12">
								<input type="hidden" name="txtPlano" id="txtPlano">
								<input type="submit" class="btn btn-success pull-right" value="Cadastrar" />
							</div>
						</div>
					
					</div>

				</form>
			</section>
	
		</div>
	</div>
</body>
<script src="<?= base_url("assets/vendor/mask-plugin/dist/jquery.mask.min.js");?>"></script>
<script src="<?= base_url("assets/paginas/cadastro_consulta.js");?>"></script>