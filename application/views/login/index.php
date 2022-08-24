<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Anita Café</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="<?=base_url()?>Plantilla/admin/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>Plantilla/admin/assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>Plantilla/admin/assets/plugins/fontawesome/css/all.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>Plantilla/admin/assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>Plantilla/admin/assets/css/material/style.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>Plantilla/admin/assets/css/material/style-responsive.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>Plantilla/admin/assets/css/material/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<link href="<?=base_url()?>Plantilla/admin/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url()?>Plantilla/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top" >
	<div id="page-loader" class="fade show">
		<div class="material-loader">
			<svg class="circular" viewBox="25 25 50 50">
				<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
			</svg>
			<div class="message">Cargando...</div>
		</div>
	</div>
	<div id="page-container" class="fade ">
		<div class="login login-with-news-feed ">
			<div class="news-feed">
				<div class="news-image" style="background-image: url(<?=base_url()?>Plantilla/img/fondo2.jpg);opacity: 0.7;"></div>
				<div class="news-caption">
					<h4 class="caption-title"> <b>Anita Café</b>  y más</h4>
				</div>
			</div>
			<div class="right-content">
				<div class="login-header">
					<div class="brand">
					    <b>Anita Café</b>
						<small>Sistema de Control y Registro</small>
					</div>
					<div class="icon">
						<i class="fa fa-sign-in"></i>
					</div>
				</div>
				<div class="login-content">
					<form action="<?=base_url()?>index.php/login/validacion" method="POST" class="form-horizontal">
						<div class="form-group m-b-15">
							<input type="text" id="usuario" name="usuario" class="form-control form-control-lg" placeholder="Usuario" required />
						</div>
						<div class="form-group m-b-15">
							<input type="password" id="contrasenia" name="contrasenia" class="form-control form-control-lg" placeholder="Contraseña" required />
						</div>
						<div class="login-buttons">
							<button type="submit" onclick="ingresar();" class="btn btn-success btn-block btn-lg" style="background-color:#3d1f1e">Ingresar</button>
						</div>
						<hr />
						<p class="text-center text-grey-darker">
							Sistema Desarrollado V.1
						</p>
					</form>
				</div>
				<div class="login-content">
					<div class="alert alert-dark fade show text-center"> <img src="<?=base_url()?>Plantilla/img/logo1.png" style="width:100%" alt=""></div>
				</div>
			</div>
		</div>
	</div>

	<?php if ($this->session->flashdata('sa-error')) { ?>
		<div hidden id="sa-error"> <?= $this->session->flashdata('sa-error') ?> </div>
	<?php } ?>
	<?php if ($this->session->flashdata('sa-error2')) { ?>
		<div hidden id="sa-error2"> <?= $this->session->flashdata('sa-error2') ?> </div>
	<?php } ?>

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url()?>Plantilla/admin/assets/plugins/jquery/jquery-3.3.1.min.js"></script>
	<script src="<?=base_url()?>Plantilla/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>Plantilla/admin/assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

	<script src="<?=base_url()?>Plantilla/admin/assets/plugins/sweetalert/sweetalert.min.js"></script>
	<script src="<?=base_url()?>Plantilla/admin/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>

	<script src="<?=base_url()?>Plantilla/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>Plantilla/admin/assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="<?=base_url()?>Plantilla/admin/assets/js/theme/material.min.js"></script>
	<script src="<?=base_url()?>Plantilla/admin/assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
