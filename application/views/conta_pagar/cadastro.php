<section role="main" class="content-body">
	<header class="page-header">
		<h2>Cadastro de Conta a Pagar</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="<?= base_url();?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Conta a Pagar</span>
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
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/contaPagar/add");?>'>
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Cadastro de Conta a Pagar</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-12">
								<div class="form-group">
									<label class="control-label">Descrição</label>
									<input type="text" id="txtDescricao" name="txtDescricao" class="form-control">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Valor da Conta</label>
									<input type="text" id="txtValor" name="txtValor" class="form-control">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Data de Vencimento</label>
									<input type="int" id="txtVencimento" name="txtVencimento" class="form-control">
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Tipo de Conta</label>
									<select id="txtTipoConta" name="txtTipoConta" class="select form-control">
										<option hidden selected>SELECIONE O TIPO</option>
										<?php foreach($tiposConta->result() as $item){?>
											<option value="<?= $item->codTipoContaPagar;?>"><?= $item->descricao;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Situação da Conta</label>
									<select id="txtStatus" name="txtStatus" class="select form-control">
										<option hidden selected>SELECIONE O STATUS</option>
										<option VALUE="<?= STATUS_CONTA_PAGAR_ATIVA;?>">ATIVA</option>
										<option VALUE="<?= STATUS_CONTA_PAGAR_ATRASADA;?>">ATRASADA</option>
										<option VALUE="<?= STATUS_CONTA_PAGAR_PAGA;?>">PAGA</option>
									</select>
								</div>
							</div>

						</div>

						<br />
					
						<div class="row">
							<div class="col-xs-12">
								<input type="submit" class="btn btn-primary pull-right" value="CADASTRAR" />
							</div>
						</div>
					
					</div>

				</form>
			</section>
	
		</div>
	</div>
</body>
<script src="<?= base_url("assets/vendor/mask-plugin/dist/jquery.mask.min.js");?>"></script>
<script src="<?= base_url("assets/paginas/cadastro_conta_pagar.js");?>"></script>