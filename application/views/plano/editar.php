<?php function checkStatusAtual($status, $dados){
	if($status == $dados->status){
		return "selected";
	}else{
		return "";
	}
}
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Edição de Plano</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="<?= base_url();?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Plano</span>
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
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/plano/update");?>'>
					<input type="hidden" name="txtCodigo" value="<?= $dados->codPlano;?>">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Edição de Plano
							<small>&nbsp;<?= $dados->descricao;?></small>
						</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-9 col-lg-9">
								<div class="form-group">
									<label class="control-label">Nome do Plano</label>
									<input type="text" id="txtNome" name="txtNome" value="<?= $dados->descricao;?>" class="form-control">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Disponibilidade do Plano</label>
									<select type="text" id="txtStatus" name="txtStatus" class="select form-control">
										<option value="<?= STATUS_PLANO_CANCELADO;?>" <?= checkStatusAtual(STATUS_PLANO_CANCELADO, $dados);?>>CANCELADO</option>
										<option value="<?= STATUS_PLANO_ATIVO;?>" <?= checkStatusAtual(STATUS_PLANO_ATIVO, $dados);?>>ATIVO</option>
										<option value="<?= STATUS_PLANO_INATIVO;?>" <?= checkStatusAtual(STATUS_PLANO_INATIVO, $dados);?>>INATIVO</option>
									</select>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Valor do Plano</label>
									<input type="text" id="txtValor" name="txtValor" value="<?= number_format($dados->valor, 2, ',','.');?>" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Dependentes</label>
									<input type="int" id="txtNumDependentes"  value="<?= $dados->numeroDependentes;?>" name="txtNumDependentes" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label">Valor Adicional por Dependente</label>
									<input type="text" id="txtValorDependente"  value="<?= number_format($dados->valorDependente, 2, ',', '.');?>" name="txtValorDependente" class="form-control">
								</div>
							</div>

						</div>

						<br />
					
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
<script src="<?= base_url("assets/paginas/cadastro_plano.js");?>"></script>