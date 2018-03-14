<section role="main" class="content-body">
	<header class="page-header">
		<h2>Cadastro de Especialização</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="<?= base_url();?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Especialização</span>
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
				<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/especializacao/add");?>'>
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
		
						<h2 class="panel-title">Cadastro de Especialização</h2>
					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 col-lg-12">
								<div class="form-group">
									<label class="control-label">Nome da Especialização</label>
									<input type="text" id="txtNome" name="txtNome" class="form-control">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Descrição</label>
									<textarea id="txtDescricao" name="txtDescricao"></textarea>
								</div>
							</div>

						</div>

						<br />
					
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
<script src="<?= base_url("assets/vendor/ckeditor/ckeditor.js");?>"></script>

<script src="<?= base_url("assets/paginas/cadastro_especializacao.js");?>"></script>