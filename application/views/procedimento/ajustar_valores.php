<?php 

function getValor($codPlano, $valores){

	$valor = 0;

	foreach($valores->result_array() as $item){
		if($item["codPlano"] == $codPlano){
			$valor = $item["valor"];
		}
	}

	return number_format($valor, 2, ",", ".");
}

?>

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Ajuste de Valores</h2>
	
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
					<span>Ajuste de Valores</span>
				</li>
				<li>
					<span><?= $procedimento->nome;?></span>
				</li>
				
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right">
				<i class="fa fa-chevron-left"></i>
			</a>
		</div>
	</header>

	<!-- start: page -->
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
					<a href="#" class="fa fa-times"></a>
				</div>
		
				<h2 class="panel-title">Valores Para <?= $procedimento->nome;?></h2>
			</header>
			<div class="panel-body">

				<form action="<?= base_url("index.php/procedimento/setar_valores");?>" method="POST">

					<input type="hidden" name="txtCodProcedimento" value="<?= $procedimento->codProcedimento;?>" />

					<table class="table table-bordered table-striped mb-none" id="datatables">
						<thead>
							<tr>
								<th></th>
								<?php foreach($planos->result() as $item){?>
									<th class="center"><?= $item->descricao;?></th>
								<?php } ?>
								
							</tr>
						</thead>
						<tbody>
							<tr class="gradeX">
								<th class="center">Valor</th>
								<?php foreach($planos->result() as $item){?>
									<td class="center"><input type="text" class="campo-valor form-control" id="txt_<?= $item->codPlano;?>" name="txt_<?= $item->codPlano;?>" value="<?= getValor($item->codPlano, $valores);?>"></td>
								<?php } ?>
							</tr>
						</tbody>
					</table>

					<br />
						
					<div class="row">
						<div class="col-xs-12">
							<input type="submit" class="btn btn-primary pull-right" value="CADASTRAR" />
						</div>
					</div>
				</form>
			</div>

			
		</section>
		
	<!-- end: page -->
</section>

<script src="<?= base_url("assets/vendor/mask-plugin/dist/jquery.mask.min.js");?>"></script>
<script src="<?= base_url("assets/paginas/ajuste_valores_procedimentos.js");?>"></script>