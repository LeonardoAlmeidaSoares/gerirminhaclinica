<section role="main" class="content-body">
	<header class="page-header">
		<h2>Listagem de Especializações</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?= base_url();?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li>
					<span>Especializações</span>
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
		
				<h2 class="panel-title">Listagem de Especializações</h2>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped mb-none" id="datatable">
					<thead>
						<tr>
							<th>Código</th>
							<th>Descrição</th>
							<th class="hidden-phone">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($listagem->result() as $item){?>
						<tr class="gradeX">
							<td><?= str_pad($item->codEspecializacao, 6, "0", STR_PAD_LEFT);?></td>
							<td><?= $item->nome;?></td>
							<td class="center hidden-phone">
								<a class="icon_action" href="<?= base_url("index.php/especializacao/edit/$item->codEspecializacao/");?>" 	title="Alterar Dados do Cliente">
									<span class="fa fa-edit fa-2x"></span>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<div class="pull-right">
				<a href="<?= base_url("index.php/especializacao/novo");?>">
					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
						<span class="fa fa-save"> &nbsp;NOVO
					</button>
				</a>
			</div>

			</div>

			
		</section>
		
	<!-- end: page -->
</section>