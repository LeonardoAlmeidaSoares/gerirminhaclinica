<?php 
	function getStatus($codStatus){

		$ret = "";

		switch($codStatus){
			case STATUS_SERVICO_INATIVO: 
				$ret = "<span class='label label-danger'>INATIVO</span>"; break;
			case STATUS_SERVICO_ATIVO: 
				$ret = "<span class='label label-info'>ATIVO</span>"; break;
			case STATUS_SERVICO_AGUARDANDO_PREENCHIMENTO_VALORES: 
				$ret = "<span class='label label-warning'>VALORES NÃO ATUALIZADOS</span>"; break;
		}

		return $ret;
	}
?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Listagem de Procedimentos</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?= base_url();?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li>
					<span>Procedimentos</span>
				</li>
				<li>
					<span>Listagem</span>
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
		
				<h2 class="panel-title">Listagem de Procedimentos</h2>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable">
					<thead>
						<tr>
							<th>Código</th>
							<th>Descrição</th>
							<th>Tempo Estimado</th>
							<th>Status</th>
							<th class="hidden-phone">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listagem->result() as $item){?>
						<tr class="gradeX">
							<td><?= str_pad($item->codProcedimento, 6, "0", STR_PAD_LEFT);?></td>
							<td><?= $item->nome;?></td>
							<td><?= $item->tempo_estimado;?> minutos</td>
							<td class="center"><?= getStatus($item->status);?></td>
							<td class="center hidden-phone">
								<a class="icon_action" href="<?= base_url("index.php/procedimento/ajustarValores/$item->codProcedimento");?>">
									<webicon icon="simple-line:wallet"/>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<div class="pull-right">
				<a href="<?= base_url("index.php/procedimento/novo");?>">
					<button type="button" class="mb-xs mt-xs mr-xs btn btn-success">
						<span class="fa fa-save"> &nbsp;NOVO
					</button>
				</a>
			</div>

			</div>

			
		</section>
		
	<!-- end: page -->
</section>