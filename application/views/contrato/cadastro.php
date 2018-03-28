<section role="main" class="content-body">
	<header class="page-header">
		<h2>Cadastro de Contrato</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="<?= base_url();?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Contrato</span>
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
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/contrato/add");?>'>
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Cadastro de Contrato</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-8">
								<div class="form-group">
									<input type="hidden" name="txtCodCliente" value="<?= $dadosCliente->codCliente;?>" />
									<label class="control-label">Nome do Contrato</label>
									<input type="text" id="txtNome" value="<?= $dadosCliente->nome;?>" disabled name="txtNome" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Valor Total</label>
									<input type="text" id="txtValorTotal" disabled name="txtValorTotal" value='' class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Planos Selecionado</label>
									<select id="txtPlano" name="txtPlano" class="form-control">
										<option value="0" selected hidden>SELECIONE O PLANO</option>
										<?php foreach($planos->result() as $item){?>
											<option value="<?= $item->codPlano;?>"><?= $item->descricao;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Data de Inicio</label>
									<input type="text" id="txtDataInicio" value="14/03/2018" name="txtDataInicio" class="form-control">
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Data de Fim</label>
									<input type="text" id="txtDataFim" name="txtDataFim" value='14/03/2019' class="form-control">
								</div>
							</div>

						</div>

						<br /> <hr />

						<div id="div_add_dependent">
							<h3>
								Dependentes
								<a href="#" id="btnAddDependent" class="btn btn-info pull-right">
										<span class="fa fa-plus"></span>
								</a>
							</h3>
							
						</div>
						<br> <hr /> <br />
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Observações</label>
									<textarea id="txtObs" name="txtObs"></textarea>>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<input type="submit" class="btn btn-success pull-right" value="Cadastrar" />
							</div>
						</div>
					
					</div>

				</form>
			</section>
	
		</div>
	</div>
</body>
<script src="<?= base_url("assets/vendor/accounting.min.js");?>"></script>
<script src="<?= base_url("assets/vendor/ckeditor/ckeditor.js");?>"></script>
<script src="<?= base_url("assets/vendor/mask-plugin/dist/jquery.mask.min.js");?>"></script>
<script src="<?= base_url("assets/vendor/ckeditor/ckeditor.js");?>"></script>
<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js");?>"></script>
<script src="<?= base_url("assets/paginas/cadastro_contrato.js");?>"></script>
<link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-datepicker/css/datepicker3.css");?>" />
