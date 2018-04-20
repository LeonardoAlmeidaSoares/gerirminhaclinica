<?php 
	function getStatus($codStatus){

		$ret = "";

		switch($codStatus){
			case STATUS_CONTA_PAGAR_CANCELADA: $ret = "<span class='label label-danger'>CANCELADO</span>"; break;
			case STATUS_CONTA_PAGAR_ATIVA: $ret = "<span class='label label-info'>ATIVO</span>"; break;
			case STATUS_CONTA_PAGAR_ATRASADA: $ret = "<span class='label label-warning'>ATRASADO</span>"; break;
			case STATUS_CONTA_PAGAR_PAGA: $ret = "<span class='label label-success'>PAGO</span>"; break;
		}

		return $ret;
	}
?>

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Listagem de Contas a Pagar Atrasadas</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?= base_url();?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li>
					<span>Contas a Pagar</span>
				</li>
				<li>
					<span>Atrasadas</span>
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
		
				<h2 class="panel-title">Listagem de Contas a Pagar Atrasadas</h2>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable">
					<thead>
						<tr>
							<th>Código</th>
							<th>Descrição</th>
							<th>Status</th>
							<th class="hidden-phone">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listagem->result() as $item){?>
						<tr class="gradeX">
							<td><?= str_pad($item->codContaPagar, 6, "0", STR_PAD_LEFT);?></td>
							<td><?= $item->descricao;?></td>
							<td class="center"><?= getStatus($item->status);?></td>
							<td class="center hidden-phone"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<a href="<?= base_url("index.php/contaPagar/");?>" class="btn btn-default pull-left">VOLTAR</a>

			</div>



			
		</section>
		
	<!-- end: page -->
</section>