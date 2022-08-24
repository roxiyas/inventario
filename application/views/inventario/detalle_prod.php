<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Facturas</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Facturas Registradas</h1>
    <div class="row">
        <div class="col-1 mb-3">
            <a class="btn btn-circle waves-effect  waves-circle waves-float btn-primary" href="javascript:history.back()"> Volver</a>
        </div>
        <div class="col-1 mb-3">
            <button class="btn btn-circle waves-effect waves-circle waves-float btn-primary" type="submit" onclick="printDiv('areaImprimir');" name="action">Imprimir</button>
        </div>
    </div>

	<div class="row" id="imp1">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="text-center" style="color:white"><b>Ingreso a Inventario</b></h4>
				</div>
				<div class="panel-body">
                    <table id="data-table-responsive" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Producto</th>
                                <th class="text-nowrap">Categoría</th>
								<th class="text-nowrap">Cant. Stock</th>
								<th class="text-nowrap">Cant. Sumar</th>
								<th class="text-nowrap">Total</th>
								<th class="text-nowrap">Fecha Update</th>
								<th class="text-nowrap">Usuario</th>
                                <th class="text-nowrap">Acción</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($detalle_prod as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['id_producto']?></td>
								<td><?=$lista['nom_producto']?></td>
                                <td><?=$lista['categoria']?></td>
								<td><?=$lista['cantidad_stock']?></td>
								<td><?=$lista['cantidad_sumar']?></td>
								<td><?=$lista['total_agr']?></td>
                                <td><?=$lista['fecha_update']?></td>
                                <td><?=$lista['usuario']?></td>
                                <td><?=$lista['tabla']?></td>
                            </tr>
                            <?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>

            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="text-center" style="color:white"><b>Egresos por Consignaciones</b></h4>
				</div>
				<div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="">ID</th>
                                <th class="">Nº Factura</th>
								<th class="">Producto</th>
                                <th class="">Categoría</th>
								<th class="">Cant. Stock</th>
								<th class="">Cant. Solicitada</th>
								<th class="">Total</th>
								<th class="">Fecha Reg.</th>
								<th class="">Usuario</th>
                                <th class="">Estatus</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($detalle_prod_sal as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['id_reg_fact']?></td>
                                <td><?=$lista['nro_factura']?></td>
								<td><?=$lista['produc']?></td>
                                <td><?=$lista['categoria']?></td>
								<td><?=$lista['cantidad_stock']?></td>
								<td><?=$lista['cantidad_solicitada']?></td>
								<td><?=$lista['total_restante']?></td>
                                <td><?=$lista['fecha_reg']?></td>
                                <td><?=$lista['usuario']?></td>
                                <td><?=$lista['descripcion']?></td>
                            </tr>
                            <?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printDiv(nombreDiv){
        var contenido= document.getElementById('imp1').innerHTML;
        var contenidoOriginal= document.body.innerHTML;

        document.body.innerHTML = contenido;

        window.print();

        document.body.innerHTML = contenidoOriginal;
    }
</script>
