<section role="main" class="content-body">
	<header class="page-header">
		<h2>Listagem de Clientes</h2>
	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="<?= base_url();?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Clientes</span></li>
				<li><span>Listagem</span></li>
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
	
			<h2 class="panel-title">Listagem de Clientes</h2>
		</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Plano</th>
						<th class="hidden-phone">Idade</th>
						<th class="hidden-phone">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($listagem->result() as $item){?>
					<tr class="gradeX">
						<td><?= str_pad($item->codCliente, 6, "0", STR_PAD_LEFT);?></td>
						<td><?= $item->nome;?></td>
						<td><?= $item->celular;?></td>
						<td><?= $item->descricaoPlano;?></td>
						<td class="center hidden-phone"><?= $this->uteis->getIdade($item->nascimento);?></td>
						<td class="center hidden-phone">
							<a target="_blank"  class="icon_action" href="<?= base_url("index.php/contrato/contrato/$item->codCliente/");?>" 	title="Visualizar/Criar Contrato">
								<span class="fa fa-fax fa-2x"></span>
							</a>
							<a target="_blank" class="icon_action" href="<?= base_url("index.php/contrato/termo_adesao/$item->codCliente/");?>" 	title="Termos de Uso">
								<span class="fa fa-fax fa-2x"></span>
							</a>
							
							<a class="icon_action" href="<?= base_url("index.php/cliente/edit/$item->codCliente/");?>" 	title="Alterar Dados do Cliente">
									<span class="fa fa-edit fa-2x"></span>
								</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

			<div class="pull-right">
				<a href="<?= base_url("index.php/cliente/novo");?>">
					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
						<span class="fa fa-save"> &nbsp;NOVO
					</button>
				</a>
			</div>

		</div>

	</section>
		
	<!-- end: page -->
</section>