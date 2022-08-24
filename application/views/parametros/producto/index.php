<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Presentación</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Registro de los productos <small>Para el registro de la Factura</small> </h1>
	<div class="row">
        <div class="col-lg-12">
			<div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
				    <h4 class="panel-title">Registro</h4>
				</div>
                <div class="panel-body panel-form">
					<form id="reg_producto" method="POST" class="form-horizontal form-bordered">
                        <div class="panel-body">
                            <div class="row">
								<div class="form-group col-2">
                                    <label>Categoría</label>
                                    <select class="form-control" id="id_categoria" name="id_categoria">
										<option value="0">SELECCIONE</option>
                                    	<?php foreach ($categoria as $data): ?>
                                    		<option value="<?=$data['id_categoria']?>"><?=$data['descripcion']?></option>
                                    	<?php endforeach; ?>
									</select>
                                </div>
                                <div class="form-group col-4">
                                    <label>Nombre del Producto:</label>
                                    <input class="form-control" type="text" name="nom_producto" id="nom_producto" placeholder="Descripción">
                                </div>
								<div class="form-group col-3">
                                    <label>Precio:</label>
                                    <input class="form-control" type="text" name="precio" id="precio" placeholder="Precio" onkeypress="return valideKey(event);">
                                </div>
								<div class="form-group col-3">
									<label>Cantidad en Stock:</label>
									<input class="form-control" type="text" name="cantidad_stock" id="cantidad_stock">
								</div>
                                <div class="col-12  text-center">
                                    <button type="button" onclick="reg_producto();" class="btn btn-success mt-3">Guardar</button>
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
					<h4 class="panel-title">Productos Registrados</h4>
				</div>
				<div class="panel-body">
                    <table id="data-table-default responsive" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Categoría</th>
								<th class="text-nowrap">Nombre del Producto</th>
								<th class="text-nowrap">Precio</th>
								<th class="text-nowrap">Cant. Actual</th>
								<th class="text-nowrap">Acción</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($productos as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['id_producto']?></td>
								<td><?=$lista['categoria']?></td>
								<td><?=$lista['nom_producto']?></td>
								<td><?=$lista['cantidad_stock']?></td>
								<td><?=$lista['precio']?></td>
								<td>
									<a class="button">
	                                    <i title="Editar" onclick="modal(<?php echo $lista['id_producto'];?>, <?php echo $lista['id_categoria'];?>);" data-toggle="modal" data-target="#exampleModal" class="fas fa-lg fa-fw fa-edit" style="color: #00d932;"></i>
	                                <a/>
        							<a onclick="eliminar_producto(<?php echo $lista['id_producto'];?>);" class="button"><i class="fas fa-lg fa-fw fa-trash-alt" style="color:red"></i><a/>
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
<script src="<?=base_url()?>/js/parametros/producto.js"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editar_producto" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-2">
							<label>ID</label>
							<input class="form-control" type="text" name="id_producto" id="id_producto" readonly>
						</div>
						<div class="col-10"></div>
						<div class="form-group col-4">
							<label>Nombre del Producto</label>
							<input class="form-control" type="text" name="nomb_prod_ver" id="nomb_prod_ver">
						</div>
						<div class="form-group col-4">
							<label>Categoria</label>
							<input type="hidden" id="id_categoria_c" name="id_categoria_c">
							<input class="form-control" type="text" name="categoria" id="categoria" readonly>
						</div>
						<div class="form-group col-4">
							<label>Categoria Nueva</label>
							<select class="form-control" id="id_categoria_ver" name="id_categoria_ver"">
								<option value="0">SELECCIONE</option>
							</select>
						</div>
						<div class="form-group col-3">
							<label>Precio:</label>
							<input class="form-control" type="text" name="precio_ver" id="precio_ver">
						</div>
						<div class="form-group col-3">
							<label>Cantidad en Stock:</label>
							<input class="form-control" type="text" name="cantidad_stock_ver" id="cantidad_stock_ver">
						</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="editar_producto();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

$("#precio_ver").on({
    "focus": function(event) {
        $(event.target).select();
    },
    "keyup": function(event) {
        $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});
</script>