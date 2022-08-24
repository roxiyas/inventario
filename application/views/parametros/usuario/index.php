<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Presentación</li>
	</ol>
	<h1 class="page-header">Registro de Usuarios</h1>
	<div class="row">
        <div class="col-lg-12">
			<div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
				    <h4 class="panel-title">Registro</h4>
				</div>
                <div class="panel-body panel-form">
					<form id="reg_usuario" method="POST" class="form-horizontal form-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-1">
                                    <label>Tip. Doc</label>
                                    <select class="form-control" id="id_tip_doc" name="id_tip_doc">
										<option value="0">...</option>
                                    	<?php foreach ($tipo_doc as $data): ?>
                                    		<option value="<?=$data['id_tip_doc']?>"><?=$data['descripcion']?></option>
                                    	<?php endforeach; ?>
									</select>
                                </div>
                                <div class="form-group col-2">
                                    <label>Cédula</label>
                                    <input class="form-control" type="text" name="cedula" id="cedula" placeholder="Cédula">
                                </div>
                                <div class="form-group col-5">
                                    <label>Nombre y Apellido</label>
                                    <input class="form-control" type="text" name="nom_ape" id="nom_ape" placeholder="Nombre y Apellido">
                                </div>
                                <div class="form-group col-4">
                                    <label>Perfil</label>
                                    <select class="form-control" id="id_perfil" name="id_perfil">
										<option value="0">SELECCIONE</option>
                                    	<?php foreach ($perfiles as $data): ?>
                                    		<option value="<?=$data['id_perfil']?>"><?=$data['descripcion']?></option>
                                    	<?php endforeach; ?>
									</select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Usuario</label>
                                    <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario">
                                </div>
                                <div class="form-group col-6">
                                    <label>Clave</label>
                                    <input class="form-control" type="password" name="contrasenia" id="contrasenia" placeholder="Clave">
                                </div>
                                <div class="col-12  text-center">
                                    <button type="button" onclick="reg_usuario();" class="btn btn-success mt-3">Guardar</button>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
			</div>
        </div>
		<div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Usuarios Registrados</h4>
				</div>
				<div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Cedula</th>
								<th class="text-nowrap">Nombre y Apellido</th>
								<th class="text-nowrap">Usuario</th>
								<th class="text-nowrap">Perfil</th>
								<th class="text-nowrap">Estatus</th>
								<th class="text-nowrap">Acción</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($usuarios as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['id_user']?></td>
                                <td><?=$lista['cedula']?></td>
								<td><?=$lista['nom_ape']?></td>
								<td><?=$lista['usuario']?></td>
								<td><?=$lista['perfil']?></td>
								<td><?=$lista['estatus']?></td>
								<td>
									<a class="button">
	                                    <i title="Editar Usuario" onclick="modal(<?php echo $lista['id_user']?>);" data-toggle="modal" data-target="#exampleModal" class="fas fa-lg fa-fw fa-edit" style="color: #00BCD4;"></i>
	                                <a/>
        							<a title="Eliminar Usuario" onclick="eliminar_usuario(<?php echo $lista['id_user'];?>, <?php echo $lista['id_persona'];?>);" class="button"><i class="fas fa-lg fa-fw fa-trash-alt" style="color:red"></i><a/>
									<?php if ($lista['id_estatus'] == 2): ?>
										<a title="Activar Usuario" onclick="cam_sta_usuario(<?php echo $lista['id_user'];?>, <?php echo $lista['id_estatus'];?>);" class="button"><i class="fas fa-lg fa-fw fa-check" style="color:green"></i><a/>
									<?php endif; ?>
									<?php if ($lista['id_estatus'] == 1): ?>
										<a title="Suspender Usuario" onclick="cam_sta_usuario(<?php echo $lista['id_user'];?>, <?php echo $lista['id_estatus'];?>);" class="button"><i class="fas fa-lg fa-fw fa-times" style="color: orange"></i><a/>
									<?php endif; ?>

                                </td>
							</tr>
                            <?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>/js/parametros/usuario.js"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Presentación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editar_presentacion" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-3">
							<label>ID</label>
							<input type="text" name="id_persona_ver" id="id_persona_ver">
							<input class="form-control" type="text" name="id_usuario" id="id_usuario" readonly>
						</div>
						<div class="form-group col-3">
							<label>Cédula</label>
							<input class="form-control" type="text" name="cedula_ver" id="cedula_ver">
						</div>
						<div class="form-group col-3">
							<label>Nombre y Apellido</label>
							<input class="form-control" type="text" name="nom_ape_ver" id="nom_ape_ver">
						</div>
						<div class="form-group col-3">
							<label>Usuario</label>
							<input class="form-control" type="text" name="usuario_ver" id="usuario_ver">
						</div>
						<div class="form-group col-3">
							<label>Perfil Actual</label>
							<input type="hidden" name="id_perfil_ver" id="id_perfil_ver">
							<input class="form-control" type="text" name="perfil_ver" id="perfil_ver" readonly>
						</div>
						<div class="form-group col-4">
							<label>Perfil Nuevo</label>
							<select class="form-control" id="id_perfil_edit" name="id_perfil_edit">
								<option value="0">SELECCIONE</option>
								<?php foreach ($perfiles as $data): ?>
									<option value="<?=$data['id_perfil']?>"><?=$data['descripcion']?></option>
								<?php endforeach; ?>
							</select>
						</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="editar_usuario();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
