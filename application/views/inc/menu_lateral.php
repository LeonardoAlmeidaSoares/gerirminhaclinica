
<div class="inner-wrapper">
	<!-- start: sidebar -->
	<aside id="sidebar-left" class="sidebar-left">
	
		<div class="sidebar-header">
			<div class="sidebar-title"></div>
			<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>
	
		<div class="nano">
			<div class="nano-content">
				<nav id="menu" class="nav-main" role="navigation">
					<ul class="nav nav-main">
						<li class="nav-active">
							<a href="<?= base_url();?>">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Principal</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url("index.php/cliente");?>">
								<i class="fa fa-users" aria-hidden="true"></i>
								<span>Cliente</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url("index.php/colaborador");?>">
								<i class="fa fa-life-bouy" aria-hidden="true"></i>
								<span>Colaboradores</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url("index.php/funcionario");?>">
								<i class="fa fa-life-bouy" aria-hidden="true"></i>
								<span>Funcionários</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url("index.php/plano");?>">
								<i class="fa fa-database" aria-hidden="true"></i>
								<span>Planos</span>
							</a>
						</li>

						<li class="">
							<a href="<?= base_url("index.php/ContaPagar/");?>">
								<i class="fa fa-money" aria-hidden="true"></i>
								<span>Contas a Pagar</span>
							</a>
						</li>

						<li class="">
							<a href="<?= base_url("index.php/ContaReceber/");?>">
								<i class="fa fa-money" aria-hidden="true"></i>
								<span>Contas a Receber</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url("index.php/procedimento");?>">
								<i class="fa fa-database" aria-hidden="true"></i>
								<span>Procedimentos</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url("index.php/especializacao");?>">
								<i class="fa fa-tags" aria-hidden="true"></i>
								<span>Especialização</span>
							</a>
						</li>

						<li>
							<a href="<?= base_url("index.php/consulta");?>">
								<i class="fa fa-calendar" aria-hidden="true"></i>
								<span>Agenda</span>
							</a>
						</li>


					</ul>
				</nav>
			</div>
		</div>
	
	</aside>
	<!-- end: sidebar -->
