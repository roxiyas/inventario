<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Reportes</a></li>
		<li class="breadcrumb-item active">Total Diario</li>
	</ol>
	<h1 class="page-header">
        <i class="fas fa-info text-teal fa-spin"></i> Total de Ventas <small>Por Tipo de Pago</small> 
    </h1>
	<div class="row" id="imp1">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Registro</h4>
				</div>
				<div class="panel-body">
                    <div class="row">
                        <div class="col-12">
                        <table id="data-table-buttons" class="table table-striped table-bordered">
								<thead>
									<tr class="text-center">
										<th>Producto</th>
										<th>Precio</th>
									</tr>
								</thead>
								<tbody class="text-center" >
                                    <?php foreach($listPrecios as $lista):?>
                                        <tr class="odd gradeX">
                                            <td width="50%"><?=$lista['nom_producto']?></td>
                                            <td width="50%"><?=$lista['precio']?></td>
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
</div>