				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url();?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-12">
							<div class="row">

								<div class="col-md-6 col-xl-12">
									<section class="panel">
										<div class="panel-body bg-primary">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total de Clientes</h4>
														<div class="info">
															<strong class="amount"><?= str_pad($total_clientes, 4, "0", STR_PAD_LEFT);?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-uppercase" href="<?= base_url("index.php/cliente/");?>">(VISUALIZAR TODOS)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

								<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-tertiary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-book"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Atendimentos Para Hoje</h4>
															<div class="info">
																<strong class="amount"><?= str_pad($lista_consultas->num_rows(), 4, "0", STR_PAD_LEFT);?></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase" href="<?= base_url("index.php/consulta/hoje");?>">(VISUALIZAR TODOS)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>

									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-secondary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-credit-card"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Contas Atrasadas</h4>
															<div class="info">
																<strong class="amount"><?= str_pad($total_contas_pagar_vencendo, 4, "0", STR_PAD_LEFT);?></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase" href="<?= base_url("index.php/contaPagar/atrasadas");?>">(VISUALIZAR TODOS)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>

									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-quartenary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-money"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Contas a Receber Até Hoje</h4>
															<div class="info">
																<strong class="amount"><?= str_pad($total_contas_receber_vencendo, 4, "0", STR_PAD_LEFT);?></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase" href="<?= base_url("index.php/contaReceber/atrasadas");?>">(VISUALIZAR TODOS)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>

							</div>
						</div>
						<div class="col-xs-12">
							<section class="panel">
								<header class="panel-heading">					
									<h2 class="panel-title">Próximas Consultas</h2>
								</header>
								<div class="panel-body">
									<table class="table table-responsive table-hover">
										<thead>
											<tr>
												<th>Consulta</th>
												<th>Paciente</th>
												<th>Colaborador</th>
												<th>Horário</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($lista_consultas->result() as $item){ ?>
												<tr>
													<td><?= str_pad($item->codConsulta, 6, "0", STR_PAD_LEFT);?></td>
													<td><?= $item->paciente;?></td>
													<td><?= $item->colaborador;?></td>
													<td><?= date("H:i",strtotime($item->data));?></td>
													<td class="actions">
														<a href="#" class="btn-start" title="Iniciar Atendimento" cod="<?= $item->codConsulta;?>">
															<span class="fa fa-play"></span>
														</a>
														<a href="#" class="btn-stop" title="Cancelar Atendimento" cod="<?= $item->codConsulta;?>">
															<span class="fa fa-stop"></span>
														</a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</section>
						</div>
				</section>
			</div>

		</section>
<script src="<?= base_url("assets/paginas/dashboardAtendente.js");?>"></script>