
<aside id="sidebar-right" class="sidebar-right">
	<div class="nano">
		<div class="nano-content">
			<a href="#" class="mobile-close visible-xs">
				Collapse <i class="fa fa-chevron-right"></i>
			</a>

			<div class="sidebar-right-wrapper">


				<div class="sidebar-widget widget-friends">
					<h6>Colaboradores</h6>
					<ul>
						<?php foreach($colaboradores->result() as $item){ ?>
							<li class="">
								<a href="#" class="lnk_select_doctor" codDoutor = "<?= $item->codColaborador;?>">
									<figure class="profile-picture">
										<img src="https://www.aaglobal.com/images/MVSPIDER_L.jpg" alt="<?= $item->nome;?>" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name"><?= $item->nome;?></span>
										<span class="title"><?= $item->especializacao;?></span>
									</div>
								</a>
							</li>
						<?php } ?>
						
					</ul>
				</div>


				<div class="sidebar-widget widget-calendar">
					<h6>Agenda</h6>
					<div data-plugin-datepicker data-plugin-skin="dark" ></div>

					<ul id="lista_compromissos">
						<!--li>
							<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
							<span>Company Meeting</span>
						</li-->
					</ul>
				</div>

			</div>
		</div>
	</div>

</aside>