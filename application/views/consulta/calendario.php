				<?php 
					function getStatus($codStatus){

						$ret = "";

						switch($codStatus){
							case STATUS_CONSULTA_CANCELADA:
								$ret = "CANCELADA"; break;
							case STATUS_CONSULTA_ATIVA:
								$ret = "MARCADA"; break;
							case STATUS_CONSULTA_EM_ANDAMENTO:
								$ret = "EM ANDAMENTO"; break;
							case STATUS_CONSULTA_FINALIZADA:
								$ret = "FINALIZADA"; break;
						}

					}
				?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Consultas</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Consultas</span></li>
								<li><span>Calendario</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<section class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div id="calendar"></div>
								</div>
								<div class="col-md-6">
									<p class="h4 text-light">Colaboradores</p>

									<hr />

									<div id='external-events'>

										<?php foreach($colaboradores->result() as $item){ ?>
											<div class="col-xs-12 col-lg-6">
												<a style="text-decoration: none;" href="#" 
													cod="<?= $item->codColaborador;?>" class="novoCadastro external-event label label-default" style="width:100%; cursor: pointer;">
														<?= $item->nome;?>
												</a>
											</div>
											
										<?php } ?>

									</div>
								</div>
							</div>
						</div>
					</section>

					<section class="panel" id="div_lista_consultas">
						<div class="panel-body">
							<header class="panel-heading">
								<h2 class="panel-title">Consultas Marcadas
								<a style="margin-top: -5px;" href="<?= base_url("index.php/consulta/novo");?>" class="btn btn-primary pull-right">
									<span class="fa fa-plus"> ADICIONAR</span>
								</a>
								</h2>
							</header>
							<div class="panel-body">
								<table id="tabela" class="table table-hover table-responsive mb-none">
									<thead>
										<tr>
											<th>Código</th>
											<th>Cliente</th>
											<th>Horário</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>

								<br><br>

								
							</div>

						</div>

					</section>

					<!-- end: page -->
				</section>

		<!-- Specific Page Vendor -->

		<link rel="stylesheet" href="<?= base_url("assets/vendor/fullcalendar/fullcalendar.css");?>" />

		<script src="<?= base_url("assets/vendor/fullcalendar/lib/moment.min.js");?>"></script>

		<link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-datepicker/css/datepicker.css");?>" />
		<link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-datepicker/css/datepicker3.css");?>" />
		<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
		<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js");?>"></script>

		<script src="<?= base_url("assets/paginas/calendario2.js");?>"></script>

