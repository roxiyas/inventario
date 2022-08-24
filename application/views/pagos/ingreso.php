<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Pagos</a></li>
		<li class="breadcrumb-item active">Registro</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Clientes con Deudas <small></small> </h1>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Clientes</h4>
				</div>
				<div class="panel-body">
                <div class="panel-body">
					<table id="data-table-default" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nombre y Apellido</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach($facturas as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['nom_razon_social']?></td>
								<td>
									<a class="btn btn-success btn-circle waves-effect waves-circle waves-float" style="color: white" href="<?php echo base_url();?>index.php/Pagos/ver_factura?id=<?php echo $lista['id_cliente'];?>" >
										Ver Deudas
									</a>
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