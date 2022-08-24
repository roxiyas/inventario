<div id="page-loader" class="fade show">
	<div class="material-loader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
		</svg>
		<div class="message">Cargando...</div>
	</div>
</div>
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar">
	<div id="header" class="header navbar-default" style="background-color:#6e3324">
		<div class="navbar-header" style="">
			<button type="button" class="navbar-toggle collapsed navbar-toggle-left" data-click="sidebar-minify">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.html" class="navbar-brand text-white">
				<b>Anita Café -</b> <small>Sistema de Control Y Registros</small>
			</a>
		</div>
		<ul class="navbar-nav navbar-right">
			<li class="dropdown navbar-user">
				<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
					<span class="d-none d-md-inline text-white">Bienvenid@, <b><?= $this->session->userdata('usuario') ?></b></span>
					<img src="<?=base_url()?>Plantilla/admin/assets/img/user/user-14.jpg" alt="" />
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<!-- <a href="javascript:;" class="dropdown-item">Editar Perfil</a>
					<a href="javascript:;" class="dropdown-item">Configurar</a>
					<div class="dropdown-divider"></div>-->
					<a href="<?=base_url()?>index.php/login/v_camb_clave" class="dropdown-item">Cambiar Contraseña</a>
					<a href="<?=base_url()?>index.php/login/logout" class="dropdown-item">Cerrar Sesión</a>
				</div>
			</li>
		</ul>
	</div>
	<div id="sidebar" class="sidebar bg-white" data-disable-slide-animation="true">
		<div data-scrollbar="true" data-height="100%">
			<ul class="nav">
				<li class="nav-profile">
					<a href="javascript:;" data-toggle="nav-profile">
						<div class="cover">
							<img src="<?=base_url()?>Plantilla/img/logo3.png" style="width:100%;opacity:0.9" alt="" />
						</div>
						<div class="image">
							<!-- <img src="<?=base_url()?>Plantilla/img/logo-pool.jpg" alt="" /> -->
						</div>
						<!-- <div class="info">
							<b class="caret pull-right"></b>
							<?= $this->session->userdata('usuario') ?>
							<small><?= $this->session->userdata('id_perfil') ?></small>
						</div> -->
					</a>
				</li>
				<li>
					<ul class="nav nav-profile">
						<li><a href="javascript:;"><i class="fa fa-cog"></i> Configuración</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav">
				<li class="nav-header" style="color:#fff">Navegador</li>
				<li>
					<a href="<?=base_url()?>index.php/login/inicio">
						<i class="fas fa-home"></i>
						<span style="color:#fff">Inicio</span>
					</a>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<b class="caret"></b>
						<i class="fas fa-file-invoice-dollar"></i>
						<span style="color:#fff">Compras</span>
					</a>
					<ul class="sub-menu">
						<li><a href="<?=base_url()?>index.php/consignacion/registro" class="text-black">Registrar</a></li>

						<!-- <?php if ($this->session->userdata('id_perfil') != 3): ?>
							<li><a href="<?=base_url()?>index.php/consignacion/procesar" class="text-black">Procesar Consignaciones</a></li>
						<?php endif; ?> -->

						<li><a href="<?=base_url()?>index.php/consignacion/reporte" class="text-black">Reporte</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<b class="caret"></b>
						<i class="fas fa-cash-register"></i>
						<span style="color:#fff">Pagos</span>
					</a>
					<ul class="sub-menu">
						<li><a href="<?=base_url()?>index.php/pagos/ingreso" class="text-black">Registrar Pago</a></li>
						<li><a href="<?=base_url()?>index.php/pagos/reporte" class="text-black">Reporte</a></li>

						<!-- <?php if ($this->session->userdata('id_perfil') != 3): ?>
							<li><a href="<?=base_url()?>index.php/consignacion/procesar" class="text-black">Procesar Consignaciones</a></li>
						<?php endif; ?>

						-->
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<b class="caret"></b>
						<i class="fas fa-file-invoice"></i>
						<span style="color:#fff">Reportes</span>
					</a>
					<ul class="sub-menu">
						<li><a href="<?=base_url()?>index.php/reportes/total_dia" class="text-black">Total de día</a></li>
						<li><a href="<?=base_url()?>index.php/reportes/list_precios" class="text-black">Listado de Precios</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<b class="caret"></b>
						<i class="fas fa-boxes"></i>
						<span style="color:#fff">Inventario</span>
					</a>
					<ul class="sub-menu">
						<li><a href="<?=base_url()?>index.php/inventario/ing_prod" class="text-black">Ing. Productos</a></li>
						<li><a href="<?=base_url()?>index.php/inventario/reporte" class="text-black">Reporte</a></li>
					</ul>
				</li>
				<?php if ($this->session->userdata('id_perfil') != 3): ?>
					<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fas fa-cogs"></i>
								<span style="color:#fff">Configuración</span>
							</a>
							<ul class="sub-menu">
								<li class="has-sub">
									<a href="javascript:;">
										<b class="caret"></b>
										<span style="color:#fff">Tablas Parametros</span>
									</a>
									<ul class="sub-menu">
										<li><a href="<?= base_url()?>index.php/parametros/cliente" class="text-black">Cliente</a></li>
										<li><a href="<?= base_url()?>index.php/parametros/categoria" class="text-black">Categoría</a></li>
										<li><a href="<?= base_url()?>index.php/parametros/producto" class="text-black">Producto</a></li>
										<li><a href="<?= base_url()?>index.php/parametros/conv_moneda" class="text-black" >Conv. Moneda</a></li>
									</ul>
								</li>
								<li><a href="<?= base_url()?>index.php/parametros/usuario" class="text-black">Usuarios</a></li>
							</ul>
						</li>
				<?php endif; ?>

				<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="sidebar-bg"></div>
