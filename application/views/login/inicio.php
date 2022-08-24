<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">Dashboard</li>
	</ol>
	<br><br>

	<div class="row">
		<div class="col-12">
			<div class="col-12 text-center mb-3">
				<h3>Bienvenido al Sistema</h3>
				<img src="<?=base_url()?>/Plantilla/img/logo1.png" width="65%" height="200">
			</div>
		</div>
		<div class="col-lg-4 col-md-3">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon"><i class="fa fa-user"></i></div>
				<div class="stats-info">
					<h4 style="color:white"><b>Total Clientes Registrados</b></h4>
					<p><?= $clientes['clientes'] ?></p>
				</div>
				<div class="stats-link">
					<a href="<?=base_url()?>index.php/parametros/cliente">Ver Detalles<i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="widget widget-stats bg-orange">
				<div class="stats-icon"><i class="fa fa-archive"></i></div>
				<div class="stats-info">
					<h4 style="color:white"><b>Total Productos Registrados</b></h4>
					<p><?= $producto['productos'] ?></p>
				</div>
				<div class="stats-link">
					<a href="<?=base_url()?>index.php/parametros/producto">Ver Detalles <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="widget widget-stats bg-grey-darker">
				<div class="stats-icon"><i class="fa fa-file-alt"></i></div>
				<div class="stats-info">
					<h4 style="color:white"><b>Total Consignaciones Registradas</b></h4>
					<p><?= $facturas['fact'] ?></p>
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver Detalles<i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


	</div>
</div>
