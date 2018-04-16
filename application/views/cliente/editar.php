<?php 
function getData($dia){
	$aux = explode('-',$dia);
	return $aux[2] . "/" . $aux[1] . "/" . $aux[0];
}
?>

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Edição de Cliente</h2>
	
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
				<span>Edição</span>
			</li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
<body>
	
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<section class="panel">
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/cliente/update");?>'>
					<input type="hidden" name="txtCodigo" value="<?= $dados->codCliente;?>">
					<header class="panel-heading">
						
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">
							Edição de Cliente
							<small><?= $dados->nome;?></small>
						</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-6">
								<div class="form-group">
									<label class="control-label">Nome do Cliente</label>
									<input type="text" id="txtNome" value="<?= $dados->nome;?>" name="txtNome" class="form-control">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">CPF</label>
									<input type="text" id="txtCpf" value="<?= $dados->cpf;?>" name="txtCpf" class="form-control">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Identidade</label>
									<input type="text" id="txtIdentidade" value="<?= $dados->rg;?>" name="txtIdentidade" class="form-control">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Nacionalidade</label>
									<select id="txtNacionalidade" name="txtNacionalidade" class="select form-control">
										<?php foreach($paises->result() as $item){?>
											<option value="<?= $item->codPais;?>"><?= $item->nome;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Data de Nascimento</label>
									<input type="text" id="txtNascimento" value="<?= getData($dados->nascimento);?>" name="txtNascimento" class="form-control">
								</div>
							</div>


							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Profissão</label>
									<input type="text" id="txtProfissao" value="<?= $dados->profissao;?>" name="txtProfissao" class="form-control">
								</div>
							</div>

							

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Escolaridade</label>
									<input type="text" id="txtEscolaridade" value="<?= $dados->escolaridade;?>" name="txtEscolaridade" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Nome do Pai</label>
									<input type="text" id="txtPai" name="txtPai"  value="<?= $dados->nome_pai;?>"  class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Nome da Mãe</label>
									<input type="text" id="txtMae" name="txtMae" value="<?= $dados->nome_mae;?>" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Estado Civil</label>
										<select  id="txtEstadoCivil" name="txtEstadoCivil" class="select form-control">
										<option hidden selected>ESTADO CIVIL</option>
										<option value="<?= STATUS_ESTADO_CIVIL_SOLTEIRO ;?>" 
											<?php if($dados->estado_civil == STATUS_ESTADO_CIVIL_SOLTEIRO) { echo "selected";} ?>>SOLTEIRO(A)</option>
										<option value="<?= STATUS_ESTADO_CIVIL_CASADO ;?>"
											<?php if($dados->estado_civil == STATUS_ESTADO_CIVIL_CASADO) { echo "selected";} ?>>CASADO(A)</option>
										<option value="<?= STATUS_ESTADO_CIVIL_NOIVO ;?>"
											<?php if($dados->estado_civil == STATUS_ESTADO_CIVIL_NOIVO) { echo "selected";} ?>>NOIVO(A)</option>
										<option value="<?= STATUS_ESTADO_CIVIL_VIÚVO ;?>"
											<?php if($dados->estado_civil == STATUS_ESTADO_CIVIL_VIÚVO) { echo "selected";} ?>>VIÚVO(A)</option>
										<option value="<?= STATUS_ESTADO_CIVIL_DIVORCIADO ;?>"
											<?php if($dados->estado_civil == STATUS_ESTADO_CIVIL_DIVORCIADO) { echo "selected";} ?>>DIVORCIADO(A)</option>
										<option value="<?= STATUS_ESTADO_CIVIL_SEPARADO ;?>"
											<?php if($dados->estado_civil == STATUS_ESTADO_CIVIL_SEPARADO) { echo "selected";} ?>>SEPARADO(A)</option>
									</select>
									</select>
								</div>
							</div>

						</div>
						<hr />
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Estado</label>
									<select id="txtEstado" name="txtEstado" class="select form-control">
										<option value="-1" selected hidden>Selecione o Estado</option>
										<?php foreach($estados->result() as $item){ ?>
											<option value="<?= $item->codEstado;?>" <?= ($cidades["codEstado"] != $item->codEstado)? "" : "selected";?>><?= $item->nome;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label class="control-label">Cidade</label>
									<select id="txtCidade" name="txtCidade" class="select form-control">
										<?php foreach($cidades["cidades"]->result() as $item){ ?>
											<option value="<?= $item->codCidade;?>" <?= ($cidades["cidadeSelecionada"] != $item->codCidade)? "" : "selected";?>><?= $item->descricao;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">CEP</label>
									<input type="text" id="txtCep" name="txtCep" value="<?= $dados->cep;?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<label class="control-label">logradouro</label>
									<input type="text" id="txtEndereco" name="txtLogradouro" value="<?= $dados->logradouro;?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Bairro</label>
									<input type="text" id="txtBairro" name="txtBairro" value="<?= $dados->bairro;?>" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Número</label>
									<input type="text" id="txtNumero" name="txtNumero" value="<?= $dados->numero;?>" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Complemento</label>
									<input type="text" id="txtComplemento" name="txtComplemento" value="<?= $dados->complemento;?>" class="form-control">
								</div>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Telefone</label>
									<input type="text" id="txtTelefone" value="<?= $dados->telefone;?>" name="txtTelefone" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Celular</label>
									<input type="text" id="txtCelular" value="<?= $dados->celular;?>" name="txtCelular" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Email</label>
									<input type="email" id="txtEmail" value="<?= $dados->email;?>" name="txtEmail" class="form-control">
								</div>
							</div>
						</div>

						<hr />

					
						<div class="row">
							<div class="col-xs-12">
								<input type="submit" class="btn btn-primary pull-right" value="SALVAR" />
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