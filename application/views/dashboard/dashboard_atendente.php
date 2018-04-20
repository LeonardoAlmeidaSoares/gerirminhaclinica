				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Principal</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url();?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Principal</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">

						<?php foreach($painel as $dash){ 
							echo $dash;
						} ?>

							
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
									<div class="pull-right">
										<a href="<?= base_url("index.php/consulta/novo");?>">
											<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
												<span class="fa fa-save"> &nbsp;NOVO
											</button>
										</a>
									</div>
								</div>
							</section>
						</div>

						<div class="col-xs-12">
							<section class="panel">
								<header class="panel-heading" style="min-height: 60px;">	
										<h2 class="panel-title col-lg-8">Datas Disponíveis</h2>
										<div class="col-lg-4">
											<select class="select form-control" id="txtCodColaborador">
												<option value="0" hidden="hidden" selected>SELECIONE O COLABORADOR</option>
												<?php foreach($lista_colaboradores->result() as $item){?>
													<option value="<?= $item->codColaborador;?>"><?= $item->nome;?></option>
												<?php } ?>
											</select>
										</div>
								</header>
								<div class="panel-body">
									<div class="row list_calendar" id="calendario_0">
											<div class="col-xs-6">
												<h3 style="margin-top: 5px;margin-bottom: 15px; margin-left: 5px;">Selecione o Dia</h3>
												<div id="calendar0" 
														data-plugin-datepicker 
														data-plugin-skin="primary">
												</div>
											</div>
											<div class="col-xs-6">
												<div class="calendario" id="agenda0"></div>
											</div>
										</div>
									<?php foreach($lista_colaboradores->result() as $item){?>
										<div class="row list_calendar" id="<?= "calendario_$item->codColaborador";?>">
											<div class="col-xs-6">
												<h3 style="margin-top: 5px;margin-bottom: 15px; margin-left: 5px;">Selecione o Dia</h3>
												<div id="calendar<?= $item->codColaborador;?>" class="datepicker-primary">
												</div>
											</div>
											<div class="col-xs-6">
												<div class="calendario" id="agenda<?= $item->codColaborador;?>"></div>
											</div>
										</div>
									<?php } ?>
									
								</div>
							</section>
						</div>
				</section>
			</div>
		
		</section>
		<link rel="stylesheet" href="<?= base_url("assets/vendor/fullcalendar/fullcalendar.css");?>" />
		<script src="<?= base_url("assets/vendor/fullcalendar/lib/moment.min.js");?>"></script>
		<script src="<?= base_url("assets/vendor/fullcalendar/fullcalendar.js");?>"></script>
		<script src='<?= base_url("assets/vendor/fullcalendar/locale/pt-br.js");?>'></script>

		<link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-datepicker/css/datepicker.css");?>" />
		<link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-datepicker/css/datepicker3.css");?>" />
		<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
		<script src="<?= base_url("assets/vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js");?>"></script>

		<script type="text/javascript">

			function setColor(){
				$(".day").each(function(){

					if($(this).hasClass("disabled")){

						$(this).css("background-color", "rgba(255,0,0,0.1)");
						$(this).css("color", "#F00");

					} else {
						
						$(this).hover(function(){
							$(this).css("color", "white");
						}, function(){
							$(this).css("color", "#000");
		    			});
						
					}
					
				});
			}

			function setCalendar($element, $data, $colaborador){

				$.ajax({
					method: "POST",
				  	url: "<?= base_url("index.php/ajax/buscarDatasTrabalhoColaborador");?>",
				  	data: { 
				  		codColaborador: $colaborador, 
				  		data: $data 
				  	}
				}).done(function( msg ) {

			    	$vet = JSON.parse(msg);

			    	$element.fullCalendar('gotoDate', $data);
					$element.fullCalendar('option', 'maxTime', moment($vet[0].dataFinal , "HH:mm").format("HH:mm"));
					$element.fullCalendar('option', 'minTime', moment($vet[0].dataInicio, "hh:mm").format("hh:mm"));
			  	});

			}

		<?php 
			$parametrosColaboradores = array();
			$parametrosEventos = array();
		?>

		<?php foreach($lista_compromissos->result() as $item){

			if(!isset($parametrosColaboradores[$item->codColaborador])){
				$parametrosColaboradores[$item->codColaborador] = "";
				$parametrosEventos[$item->codColaborador] = "";
			}
				
			$parametrosColaboradores[$item->codColaborador] .=  "'" . date("d/m/Y", strtotime($item->dataInicio)) . "',";
			$evt = array(
				"title" => "evt",
				"start" => date("d/m/Y H:i", strtotime($item->dataInicio)),
				"end" => date("d/m/Y", strtotime($item->dataFinal))
			);
			$parametrosEventos[$item->codColaborador] .=  json_encode($evt);
			
		 }; ?>

		<?php foreach($lista_colaboradores->result() as $item){ ?>
			$("#calendar<?= $item->codColaborador;?>").datepicker({

			    weekStart: 0,
			    clearBtn: true,
			    language: "pt-BR",
			    <?php if(isset($parametrosColaboradores[$item->codColaborador])){ ?>
			    beforeShowDay: function(date){

			    	var obj = {
			    		"enabled" : [<?= $parametrosColaboradores[$item->codColaborador];?>].includes(moment(date, "DD/MM/YYYY").format("DD/MM/YYYY"))
			    	}

			    	obj.class = (obj.enabled) ? "": "active";

			    	return obj;
			    }
			    <?php } ?>
			}).on("changeDate", function(e){
				setCalendar($("#agenda<?= $item->codColaborador;?>"), e.format("yyyy-mm-dd").toString(), <?= $item->codColaborador;?>);
				setColor();
			}).on("changeMonth", function(e){
				setCalendar($("#agenda<?= $item->codColaborador;?>"), e.format("yyyy-mm-dd").toString(), <?= $item->codColaborador;?>);
				setColor();
			}).on("changeYear", function(e){
				setCalendar($("#agenda<?= $item->codColaborador;?>"), e.format("yyyy-mm-dd").toString(), <?= $item->codColaborador;?>);
				setColor();
			});

			$("#agenda<?= $item->codColaborador;?>").fullCalendar({
				defaultView: 'agendaDay',
				allDaySlot: false,
				events: {
			    	url: '<?= base_url("index.php/ajax/getListaCompromissosEventosCalendario/");?>',
			    	type: 'POST',
			    	data: {
			        	codColaborador: <?= $item->codColaborador;?>,
			        	codEmpresa: <?= $_SESSION["corporate"]->codEmpresa;?>,
			      	},
			      	error: function() {
			        	alert('Houve um erro ao trazer as consultas marcadas');
			      	},
			    },
				noEventsMessage : 'Nenhuma Consulta Cadastrada',
			});


		<?php } ?>

		$(".datepicker-inline").addClass("datepicker-primary");

		setColor();

		</script>

		<script src="<?= base_url("assets/paginas/dashboardAtendente.js");?>"></script>