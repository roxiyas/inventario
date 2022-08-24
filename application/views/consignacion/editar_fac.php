<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Facturas</li>
	</ol>
	<h1 class="page-header">Editar Factura</h1>
	<div class="row">
		<div class="col-1 mb-3">
        	<a class="btn btn-circle waves-effect  waves-circle waves-float btn-primary" href="javascript:history.back()"> Volver</a>
      	</div>
	</div>

    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
				    <h4 class="panel-title text-center"></h4>
				</div>
                <div class="panel-body panel-form">
                    <div class="panel-body">
                        <div class="row">
							<div class="col-3">
								<label>Estatus de la Factura: </label><br>
								<h4><b><?=$factura_ind['descripcion']?></b> </h4>
							</div>
							<?php if ($factura_ind['id_estatus'] > '4'): ?>
								<div class="col-3">
									<label>Aprobado por:</label>
								</div>
								<div class="col-3">
									<label>Fecha</label>
								</div>
							<?php endif; ?>
							<?php if ($factura_ind['id_estatus'] = '3'): ?>
								<div class="col-7"></div>
							<?php endif; ?>
							<div class="col-6"></div>
                            <div class="form-group col-3">
                                <label>Fecha de Factura:</label>
                                <input class="form-control" type="date" value="<?=$factura_ind['fecha_reg']?>" readonly>
                            </div>
							<div class="form-group col-3">
								<label>Nroº de Factura:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['nro_factura']?>" readonly>
							</div>
							<div class="form-group col-2">
								<label>RIF:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['cod_rif']?>" readonly>
							</div>
							<div class="form-group col-3">
								<label>Cliente</label>
								<input class="form-control" type="text"  value="<?=$factura_ind['nom_razon_social']?>" readonly>
							</div>
							<div class="form-group col-2">
								<label>Estado:</label>
								<input class="form-control" type="text"  value="<?=$factura_ind['descedo']?>" readonly>
							</div>
							<div class="form-group col-2">
								<label>Ciudad:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['descciu']?>" readonly>
							</div>
							<div class="form-group col-3">
								<label>Responsable:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['responsable']?>" readonly>
							</div>
							<div class="form-group col-12">
								<label>Dirección:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['dir_fiscal']?>" readonly>
							</div>
							<div class="col-12 text-center">
								<table id="data-table-responsive" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="text-nowrap">ID</th>
											<th class="text-nowrap">Producto</th>
											<th class="text-nowrap">Presentación</th>
											<th class="text-nowrap">Peso</th>
											<th class="text-nowrap">Sabor</th>
											<th class="text-nowrap">Cantidad</th>
											<th class="text-nowrap">Precio</th>
											<th class="text-nowrap">Sub-total</th>
											<th class="text-nowrap">Fecha Expedición</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($factura_ind_tabla as $lista):?>
										<tr class="odd gradeX">
											<td><?=$lista['id_reg_prod_fact']?></td>
											<td><?=$lista['nom_producto']?></td>
											<td><?=$lista['descripcion']?></td>
											<td><?=$lista['peso']?></td>
											<td><?=$lista['sabor']?></td>
											<td><?=$lista['cantidad']?></td>
											<td><?=$lista['precio']?></td>
											<td><?=$lista['sub_total']?></td>
											<td><?=$lista['fec_exp']?></td>
										</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>

							<div class="col-10"></div>
							<div class="form-group col-2">
								<label>Sub-Total:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['sub_total_2']?>" readonly>
							</div>
							<div class="col-8"></div>
							<div class="col-2"></div>
							<div class="form-group col-2">
								<label>Iva:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['iva']?>" readonly>
							</div>
							<div class="col-4"></div>
							<div class="form-group col-2">
								<label>Moneda:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['descripcion']?>" readonly>
							</div>
							<div class="form-group col-2">
								<label>Valor:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['valor']?>" readonly>
							</div>
							<div class="form-group col-2">
								<label>Total otra Moneda:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['total_mon']?>" readonly>
							</div>
							<div class="form-group col-2">
								<label>Total Bs:</label>
								<input class="form-control" type="text" value="<?=$factura_ind['total']?>" readonly>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
