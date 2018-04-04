<?php 
	function getStatus($codStatus){

		$ret = "";

		switch($codStatus){
			case STATUS_CONSULTA_CANCELADA: 
				$ret = "<span class='label label-danger'>CANCELADA</span>"; break;
			case STATUS_CONSULTA_ATIVA: 
				$ret = "<span class='label label-info'>AGUARDANDO</span>"; break;
			case STATUS_CONSULTA_EM_ANDAMENTO: 
				$ret = "<span class='label label-warning'>EM ANDAMENTO</span>"; break;
			case STATUS_CONSULTA_FINALIZADA: 
				$ret = "<span class='label label-default'>FINALIZADA</span>"; break;
		}

		return $ret;
	}
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Listagem de Consultas Para Hoje</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?= base_url();?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li>
					<span>Consultas</span>
				</li>
				<li>
					<span>Hoje</span>
				</li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>

	<!-- start: page -->
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
					<a href="#" class="fa fa-times"></a>
				</div>
		
				<h2 class="panel-title">Listagem de Consultas de Hoje</h2>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable">
					<thead>
						<tr>
							<th>Código</th>
							<th>Paciente</th>
							<th>Colaborador</th>
							<th>Horário</th>
							<th>Status</th>
							<th class="hidden-phone">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listagem->result() as $item){?>
						<tr class="gradeX">
							<td><?= str_pad($item->codConsulta, 6, "0", STR_PAD_LEFT);?></td>
							<td><?= $item->paciente;?></td>
							<td><?= $item->colaborador;?></td>
							<td><?= date("d/m/Y H:i",strtotime($item->data));?></td>
							<td><?= getStatus($item->status);?></td>
							<td class="center hidden-phone"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>


			</div>

			
		</section>
		
	<!-- end: page -->
</section>