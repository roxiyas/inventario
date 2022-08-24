<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Presentación</li>
	</ol>
	<h1 class="page-header">Registro de Clientes</h1>
	<div class="row">
        <div class="col-lg-12">
			<div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
				    <h4 class="panel-title">Registro</h4>
				</div>
                <div class="panel-body panel-form">
					<form id="reg_cliente" method="POST" class="form-horizontal form-bordered">
                        <div class="panel-body">
                            <div class="row">
								<div class="form-group col-3">
                                    <label>Estado</label>
                                    <select class="form-control" id="id_estado" name="id_estado">
										<option value="0">SELECCIONE</option>
                                    	<?php foreach ($estado as $data): ?>
                                    		<option value="<?=$data['id']?>"><?=$data['descedo']?></option>
                                    	<?php endforeach; ?>
									</select>
                                </div>
                                <div class="form-group col-3">
                                    <label>Ciudad</label>
                                    <select class="form-control" id="id_ciudad" name="id_ciudad">
										<option value="0">SELECCIONE</option>
									</select>
                                </div>
								<div class="form-group col-3">
                                    <label>Municipio</label>
                                    <select class="form-control" id="id_municipio" name="id_municipio">
										<option value="0">SELECCIONE</option>
									</select>
                                </div>
								<div class="form-group col-3">
                                    <label>Parroquia</label>
                                    <select class="form-control" id="id_parroquia" name="id_parroquia">
										<option value="0">SELECCIONE</option>
									</select>
                                </div>
                                <div class="form-group col-1 mt-2">
                                    <label>Tip. Doc</label>
                                    <select class="form-control" id="id_tip_doc" name="id_tip_doc">
										<option value="0">...</option>
                                    	<?php foreach ($tipo_doc as $data): ?>
                                    		<option value="<?=$data['id_tip_doc']?>"><?=$data['descripcion']?></option>
                                    	<?php endforeach; ?>
									</select>
                                </div>
                                <div class="form-group col-2 mt-2">
                                    <label>Cédula o Rif</label>
                                    <input class="form-control" type="text" name="cod_rif" id="cod_rif" placeholder="Cédula o Rif">
                                </div>
                                <div class="form-group col-3 mt-2">
                                    <label>Nombre o Razón Social</label>
                                    <input class="form-control" type="text" name="nom_razon_social" id="nom_razon_social" placeholder="Nombre o Razón Social">
                                </div>
								<div class="form-group col-4 mt-2">
                                    <label>Dirección</label>
                                    <input class="form-control" type="text" name="dir_fiscal" id="dir_fiscal" placeholder="Dirección Fiscal">
                                </div>
                                <div class="form-group col-2 mt-2">
                                    <label>Nro. Télefono / Ext</label>
                                    <input class="form-control" type="text" name="nro_telefono" id="nro_telefono" placeholder="Nro">
                                </div>
                                <div class="col-12  text-center">
                                    <button type="button" onclick="reg_cliente();" class="btn btn-success mt-3">Guardar</button>
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
                    <table id="data-table-responsive" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Estado</th>
								<th class="text-nowrap">Cédula o Rif</th>
								<th class="text-nowrap">Nombre o Razón Soc.</th>
								<th class="text-nowrap">Acción</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($clientes as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['id_cliente']?></td>
                                <td><?=$lista['descedo']?></td>
								<td><?=$lista['cod_rif']?></td>
								<td><?=$lista['nom_razon_social']?></td>
								<td>
									<a class="button">
	                                    <i title="Editar Usuario" onclick="modal(<?php echo $lista['id_cliente']?>);" data-toggle="modal" data-target="#exampleModal" class="fas fa-lg fa-fw fa-edit" style="color: #00d932;"></i>
	                                <a/>
        							<a title="Eliminar Usuario" onclick="eliminar_cliente(<?php echo $lista['id_cliente'];?>);" class="button"><i class="fas fa-lg fa-fw fa-trash-alt" style="color:red"></i><a/>
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
<script src="<?=base_url()?>/js/parametros/cliente.js"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editar_cliente" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-2">
							<label>ID</label>
							<input class="form-control" type="text" name="id_cliente" id="id_cliente" readonly>
						</div>
						<div class="col-10"></div>
						<div class="form-group col-3">
							<label>Estado</label>
							<input type="hidden" name="id_estado_ver" id="id_estado_ver">
							<input class="form-control" type="text" name="estado_ver" id="estado_ver" readonly>
						</div>
						<div class="form-group col-3">
							<label>Ciudad</label>
							<input type="hidden" name="id_ciudad_ver" id="id_ciudad_ver">
							<input class="form-control" type="text" name="ciudad_ver" id="ciudad_ver" readonly>
						</div>
						<div class="form-group col-3">
							<label>Municipio</label>
							<input type="hidden" name="id_municipio_ver" id="id_municipio_ver">
							<input class="form-control" type="text" name="municipio_ver" id="municipio_ver" readonly>
						</div>
						<div class="form-group col-3">
							<label>Parroquia</label>
							<input type="hidden" name="id_parroquia_ver" id="id_parroquia_ver">
							<input class="form-control" type="text" name="parroquia_ver" id="parroquia_ver" readonly>
						</div>
						<div class="form-group col-3">
							<label>Estado Nuevo</label>
							<select class="form-control" id="id_estado_nuv" name="id_estado_nuv">
								<option value="0">SELECCIONE</option>
							</select>
						</div>
						<div class="form-group col-3">
							<label>Ciudad Nueva</label>
							<select class="form-control" id="id_ciudad_nuv" name="id_ciudad_nuv">
								<option value="0">SELECCIONE</option>
							</select>
						</div>
						<div class="form-group col-3">
							<label>Municipio Nuevo</label>
							<select class="form-control" id="id_municipio_nuv" name="id_municipio_nuv">
								<option value="0">SELECCIONE</option>
							</select>
						</div>
						<div class="form-group col-3">
							<label>Parroquia Nueva</label>
							<select class="form-control" id="id_parroquia_nuv" name="id_parroquia_nuv">
								<option value="0">SELECCIONE</option>
							</select>
						</div>
						<div class="form-group col-12">
							<label>Dirección Fiscal</label>
							<input class="form-control" type="text" name="dir_fiscal_ver" id="dir_fiscal_ver">
						</div>
						<div class="form-group col-1">
							<label style="width: 150%">Tip. Doc</label>
							<input type="hidden" name="id_tip_doc_ver" id="id_tip_doc_ver">
							<input class="form-control" type="text" name="doc_ver" id="doc_ver" readonly>
						</div>
						<div class="form-group col-2">
							<label>Tip. Doc Nueva</label>
							<select class="form-control" id="id_tip_doc_nuv" name="id_tip_doc_nuv">
								<option value="0">...</option>
							</select>
						</div>
						<div class="form-group col-3">
							<label>Cédula o Rif</label>
							<input class="form-control" type="text" name="cod_rif_ver" id="cod_rif_ver">
						</div>
						<div class="form-group col-6">
							<label>Nombre o Razón Social</label>
							<input class="form-control" type="text" name="nom_razon_social_ver" id="nom_razon_social_ver">
						</div>
						<div class="form-group col-3">
							<label>Nro. Télefono</label>
							<input class="form-control" type="text" name="nro_telefono_ver" id="nro_telefono_ver">
						</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="editar_cliente();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
