<section role="main" class="content-body">
	<header class="page-header">
		<h2>Cadastro de Funcionários</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?= base_url();?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li>
					<span>Funcionário</span>
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
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/funcionario/add");?>'>
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Cadastro de Funcionário</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<div class="form-group">
									<label class="control-label">Nome do Funcionário</label>
									<input type="text" id="txtNome" name="txtNome" class="form-control">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Cargo do Funcionário</label>
									<select id="txtCargo" name="txtCargo" class="select form-control">
										<option value="0" selected hidden>SELECIONE O CARGO</option>
										<?php foreach($cargos->result() as $item){ ?>
											<option value="<?= $item->codCargo;?>"><?= $item->descricao;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-12 col-lg-3">
								<div class="form-group">
									<label class="control-label">Valor de Salário</label>
									<input type="text" id="txtSalario" name="txtSalario" class="form-control">
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Email do Funcionário</label>
									<input type="email" id="txtEmail" name="txtEmail" class="form-control">
								</div>
							</div>
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Telefone do Funcionário</label>
									<input type="text" id="txtTelefone" name="txtTelefone" class="form-control">
								</div>
							</div>
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Celular do Funcionário</label>
									<input type="text" id="txtCelular" name="txtCelular" class="form-control">
								</div>
							</div>
							
						</div>

						<br /> <hr /><br />
					
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Estado</label>
									<select id="txtEstado" name="txtEstado" class="select form-control">
										<option value="-1" selected hidden>Selecione o Estado</option>
										<?php foreach($estados->result() as $item){ ?>
											<option value="<?= $item->codEstado;?>"><?= $item->nome;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Cidade</label>
									<select id="txtCidade" name="txtCidade" class="select form-control">
										<option value="-1" selected hidden>Selecione o Estado</option>
									</select>
								</div>
							</div>
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Data de Nascimento</label>
									<input type="text" id="txtNascimento" name="txtNascimento" class="form-control">
								</div>
							</div>
						</div>

						<br />

						<div class="row">
							<div class="col-xs-12">
								<a href="<?= base_url("index.php/funcionario/");?>" class="btn btn-default pull-left">VOLTAR</a>
								<input type="submit" class="btn btn-primary pull-right" value="CADASTRAR" />
							</div>
						</div>
					
					</div>

				</form>
			</section>
	
		</div>
	</div>
</body>
<link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-datepicker/css/datepicker3.css");?>" />
<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js");?>"></script>
<script src="<?= base_url("assets/vendor/mask-plugin/dist/jquery.mask.min.js");?>"></script>
<script src="<?= base_url("assets/paginas/cadastro_funcionario.js");?>"></script>