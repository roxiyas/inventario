<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Inventario</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Registro de Inventario <small>Por Factura</small> </h1>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Facturas Registradas</h4>
				</div>
				<div class="panel-body">
                    <div class="row">
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
                    </div>
					<div class="table-responsive mt-3">
						<h3 class="text-center">Productos solicitados en la factura.</h3>
						<table id="tab_prod" class="table table-bordered table-hover">
							<thead style="background:#e4e7e8">
							<tr class="text-center">
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Sub-Total</th>
								<th>Acciones</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>/js/inventario/buscar.js"></script>
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
