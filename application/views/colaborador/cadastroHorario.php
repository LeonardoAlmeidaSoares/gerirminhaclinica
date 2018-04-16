<section role="main" class="content-body">
	<header class="page-header">
		<h2>Gerir Horários</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
				<a href="index.html">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li>
				<span>Colaborador</span>
			</li>
			<li>
				<span>Horário</span>
			</li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
	<body>
	<div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<section class="panel">
					<form id="frmCadCliente" method="POST" action='<?= base_url("index.php/colaborador/cadastroFaixaHorario");?>'>
						<input type="hidden" name="txtColaborador" value="<?= $codColaborador;?>" />
						<header class="panel-heading">
							
							<div class="panel-actions">
								<a href="#" class="fa fa-caret-down"></a>
								<a href="#" class="fa fa-times"></a>
							</div>
			
							<h2 class="panel-title">Horários do Colaborador&nbsp;<small><?= $dados->nome;?></small></h2>

						</header>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<input id="datepicker" name="txtHorario"></input>
								</div>
							</div>

							<input type="submit" value="Cadastrar" class="pull-right btn btn-primary">
						</div>
					</form>
				</section>
				<section class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<table id="tbl" class="table table-hover">
										<thead>
											<th>Data de Início</th>
											<th>Data de Fim</th>
										</thead>
										<tbody>
											<?php foreach($lista->result() as $item){?>
											<tr>
												<td><?= date("d/m/Y H:i", strtotime($item->dataInicio));?></td>
												<td><?= date("d/m/Y H:i", strtotime($item->dataFinal));?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div> 
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</body>
</section>

<link rel="stylesheet j" href="<?= base_url("assets/vendor/bootstrap-timepicker/css/bootstrap-responsive.css");?>" />
<link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css");?>" />
<script src="<?= base_url("assets/vendor/fullcalendar/lib/moment.min.js");?>"></script>

<link rel="stylesheet" href="<?= base_url("assets/vendor/calentim/calentim.min.css");?>" />
<script type="text/javascript" src="<?= base_url("assets/vendor/calentim/calentim.min.js");?>"></script>

<script src="<?= base_url("assets/paginas/gerirHorarios.js");?>"></script>