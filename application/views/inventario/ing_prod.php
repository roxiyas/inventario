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
                    <!-- <div class="row">
                        <div class="form-group col-3">
                            <label>Buscar Nroº de Factura:</label>
                            <input class="form-control" type="text" name="nro_factura_b" id="nro_factura_b" onkeypress="return valideKey(event);">
                        </div>
                        <div class="col-3 mt-4">
                            <a onclick="buscar_fact();" class="btn btn-success btn-icon btn-circle btn-lg">
                                <i style="color: white" class="mt-2 fas fa-search"></i>
                            </a>
                        </div>
                        <div class="col-6"></div>
                        <div class="form-group col-3">
                            <label>Rif:</label>
                            <input class="form-control" type="text" name="rif" id="rif" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label>Cliente:</label>
                            <input class="form-control" type="text" name="cliente" id="cliente" readonly>
                        </div>
						<div class="form-group col-3">
							<label>Vendedor Asig.:</label>
							<input class="form-control" type="text" name="vendedor" id="vendedor" readonly>
						</div>
                    </div> -->
					<div class="table-responsive mt-3">
						<h3 class="text-center">Productos en Inventario.</h3>
						<table id="tab_prod" class="table table-bordered table-hover">
							<thead style="background:#e4e7e8">
							<tr class="text-center">
								<th>Producto</th>
								<th>Presentación</th>
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
    									<a class="button">
    	                                    <i title="Agregar Cantidad" onclick="modal(<?php echo $lista['id_producto']?>);" data-toggle="modal" data-target="#exampleModal" class="fas fa-lg fa-fw fa-plus" style="color: #3fcc04;"></i>
    	                                <a/>
            							<!-- <a title="Ver" onclick="eliminar_cliente(<?php echo $lista['id_producto'];?>);" class="button"><i class="fas fa-lg fa-fw fa-trash-alt" style="color:red"></i><a/> -->
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
<script src="<?=base_url()?>/js/inventario/agr_prod.js"></script>
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
                        <div class="form-group col-2">
							<label>ID</label>
							<input class="form-control" type="text" name="id_producto" id="id_producto" readonly>
						</div>
                        <div class="col-6"></div>
                        <div class="form-group col-4">
                            <label>Fecha y Hora</label>
                            <input class="form-control" type="datetime" name="fecha_act" value="<?php echo date("d-m-Y \ h:i");?>" readonly>
                        </div>

						<div class="form-group col-4">
							<label>Nombre del Producto</label>
							<input class="form-control" type="text" name="nomb_prod_ver" id="nomb_prod_ver" readonly>
						</div>
						<div class="form-group col-4">
							<label>Presentación</label>
							<input type="hidden" id="id_categoria_c" name="id_categoria_c">
							<input class="form-control" type="text" name="categoria" id="categoria" readonly>
						</div>
						<div class="form-group col-3">
							<label>Cantidad en Stock:</label>
							<input class="form-control" type="text" name="cantidad_stock_ver" id="cantidad_stock_ver" readonly>
						</div>
                        <div class="form-group col-3">
							<label>Cantidad a sumar:</label>
							<input class="form-control" type="text" name="cantidad_sumar" id="cantidad_sumar"  onblur="sumar_cant();" onkeypress="return valideKey(event);">
						</div>
                        <div class="form-group col-3">
							<label>Cantidad total:</label>
							<input class="form-control" type="text" name="total_agr" id="total_agr"  onkeypress="return valideKey(event);" readonly>
						</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="sumar_producto();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function valideKey(evt){
   var code = (evt.which) ? evt.which : evt.keyCode;
    if(code==8) { // backspace.
        return true;
    }else if(code>=48 && code<=57) { // is a number.
        return true;
    }else{ // other keys.
        return false;
    }
}
</script>
