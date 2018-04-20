<section role="main" class="content-body">
	<header class="page-header">
		<h2>Cadastro de Colaborador</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="<?= base_url();?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Colaborador</span>
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
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/colaborador/add");?>'>
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Cadastro de Colaborador</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-8">
								<div class="form-group">
									<label class="control-label">Nome do Colaborador</label>
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

						</div>

						<div class="row">
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Email</label>
									<input type="email" id="txtEmail" name="txtEmail" class="form-control">
								</div>
							</div>
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Telefone</label>
									<input type="text" id="txtTelefone" name="txtTelefone" class="form-control">
								</div>
							</div>
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Celular</label>
									<input type="text" id="txtCelular" name="txtCelular" class="form-control">
								</div>
							</div>
						</div>

						<br /><hr /><br />	

						<div class="row">
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Forma de Pagamento</label>
									<select id="txtFormaPagto" name="txtFormaPagto" class="select form-control">
										<option value='0' hidden selected>SELECIONE A FORMA DE PAGAMENTO</option>
										<option value="<?= FORMA_PAGTO_CONSULTA;?>">Pagamento Por Consulta</option>
										<option value="<?= FORMA_PAGTO_PLANTAO;?>">Pagamento Por Plantão</option>
										<option value="<?= FORMA_PAGTO_MENSALIDADE;?>">Pagamento De Salário</option>
									</select>
								</div>
							</div>
							
							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Valor</label>
									<input type="text" id="txtValor" name="txtValor" class="form-control">
								</div>
							</div>

							<div class="col-sm-12 col-lg-4">
								<div class="form-group">
									<label class="control-label">Registro</label>
									<input type="text" id="txtRegistro" name="txtRegistro" class="form-control">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<a href="<?= base_url("index.php/colaborador/");?>" class="btn btn-default pull-left">VOLTAR</a>
									<input type="submit" class="btn btn-primary pull-right" value="CADASTRAR" />
								</div>
							</div>
						</div>
					
					</div>

				</form>
			</section>
	
		</div>
	</div>
</body>
<script src="<?= base_url("assets/vendor/mask-plugin/dist/jquery.mask.min.js");?>"></script>
<script src="<?= base_url("assets/paginas/cadastro_colaborador.js");?>"></script>