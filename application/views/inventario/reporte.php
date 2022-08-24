<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Inventario</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Registro de Inventario <small>Ingresos</small> </h1>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Productos en Inventario</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive mt-3">
						<h3 class="text-center">Productos en Inventario al día.</h3>
						<table id="tab_prod" class="table table-bordered table-hover">
							<thead style="background:#e4e7e8">
							<tr class="text-center">
								<th>Producto</th>
								<th>Categoría</th>
                                <th>Cant. Actual</th>
								<th>Acciones</th>
							</tr>
							</thead>
							<tbody>
                                <?php foreach($productos as $lista):?>
    							<tr class="odd gradeX">
    								<td><?=$lista['nom_producto']?></td>
                                    <td><?=$lista['categoria']?></td>
    								<td><?=$lista['cantidad_stock']?></td>
    								<td>
                                        <a class="button" href="<?php echo base_url();?>index.php/Inventario/reporte_ind?id=<?php echo $lista['id_producto'];?>" >
    	                                    <i title="Ver Detalles" class="fas fa-lg fa-fw fa-list-alt" style="color: #00d41a;"></i>
    	                                <a/>
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
</div>
