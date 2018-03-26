<section role="main" class="content-body">
	<header class="page-header">
		<h2>Cadastro de Clientes</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="index.html">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Clientes</span>
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
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/cliente/add");?>'>
					<header class="panel-heading">
						
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Cadastro de Cliente</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<div class="form-group">
									<label class="control-label">Nome do Cliente</label>
									<input type="text" id="txtNome" name="txtNome" value="Leonardo Almeida Soares" class="form-control">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">CPF</label>
									<input type="text" id="txtCpf" name="txtCpf" value="079,141,256-36" class="form-control">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Identidade</label>
									<input type="text" id="txtIdentidade" value="MG-16.861.616" name="txtIdentidade" class="form-control">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Nacionalidade</label>
									<select id="txtNacionalidade" name="txtNacionalidade" class="form-control">
										<?php foreach($paises->result() as $item){?>
											<option value="<?= $item->codPais;?>"><?= $item->nome;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Data de Nascimento</label>
									<input type="text" id="txtNascimento" value="23041989" name="txtNascimento" class="form-control">
								</div>
							</div>


							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Profissão</label>
									<input type="text" id="txtProfissao" value="Programador" name="txtProfissao" class="form-control">
								</div>
							</div>

							

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Escolaridade</label>
									<input type="text" id="txtEscolaridade" value="Superior Completo" name="txtEscolaridade" class="form-control">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Nome do Pai</label>
									<input type="text" id="txtPai" name="txtPai" value="Florderalde Pereira Soares" class="form-control">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Nome da Mãe</label>
									<input type="text" id="txtMae" name="txtMae" value="Laurentina de Almeida Soares" class="form-control">
								</div>
							</div>

						</div>
						<hr />
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Estado</label>
									<select id="txtEstado" name="txtEstado" class="form-control">
										<option value="-1" selected hidden>Selecione o Estado</option>
										<?php foreach($estados->result() as $item){ ?>
											<option value="<?= $item->codEstado;?>"><?= $item->nome;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Cidade</label>
									<select id="txtCidade" name="txtCidade" class="form-control">
										<option value="-1" selected hidden>Selecione o Estado</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">CEP</label>
									<input type="text" id="txtCep" value="36880000" name="txtCep" class="form-control">
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<label class="control-label">logradouro</label>
									<input type="text" id="txtEndereco" value="Rua dos Democratas" name="txtLogradouro" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Bairro</label>
									<input type="text" id="txtBairro" value="São Pedro" name="txtBairro" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Número</label>
									<input type="text" id="txtNumero" value="44" name="txtNumero" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Complemento</label>
									<input type="text" id="txtComplemento" name="txtComplemento" class="form-control">
								</div>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Telefone</label>
									<input type="text" id="txtTelefone" name="txtTelefone" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Celular</label>
									<input type="text" id="txtCelular" value="32991194038" name="txtCelular" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Email</label>
									<input type="email" id="txtEmail" value="leonardo@megaacesso.com.br" name="txtEmail" class="form-control">
								</div>
							</div>
						</div>

						<hr />

					
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
<script src="<?= base_url("assets/vendor/mask-plugin/dist/jquery.mask.min.js");?>"></script>
<script src="<?= base_url("assets/vendor/ckeditor/ckeditor.js");?>"></script>
<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js");?>"></script>

<link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-datepicker/css/datepicker3.css");?>" />

<script src="<?= base_url("assets/paginas/cadastro_cliente.js");?>"></script>