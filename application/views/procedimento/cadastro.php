<section role="main" class="content-body">
	<header class="page-header">
		<h2>Cadastro de Procedimentos</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="<?= base_url();?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Procedimentos</span>
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
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/procedimento/add");?>'>
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Cadastro de Procedimentos</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<div class="form-group">
									<label class="control-label">Nome do Procedimento</label>
									<input type="text" id="txtNome" name="txtNome" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Especialização</label>
									<select id="txtEspecializacao" name="txtEspecializacao" class="select form-control">
										<option value="0" hidden selected>SELECIONE A ESPECIALIZAÇÃO</option>
										<?php foreach($especializacoes->result() as $item){?>
											<option value="<?= $item->codEspecializacao;?>"><?= $item->nome;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-sm-12 col-lg-2">
								<div class="form-group">
									<label class="control-label">Tempo<small> Em Minutos</small></label>
									<input type="number" id="txtTempo" name="txtTempo" class="form-control">
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Descrição do Procedimento</label>
									<textarea id="txtDescricao" name="txtObservacao"></textarea>
								</div>
							</div>
						</div>

						<br />
					
						<div class="row">
							<div class="col-xs-12">
								<input type="submit" class="btn btn-primary pull-right" value="Cadastrar" />
							</div>
						</div>
					
					</div>

				</form>
			</section>
	
		</div>
	</div>
</body>
<script src="<?= base_url("assets/vendor/ckeditor/ckeditor.js");?>"></script>
<script src="<?= base_url("assets/paginas/cadastro_procedimento.js");?>"></script>