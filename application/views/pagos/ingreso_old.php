<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Pagos</a></li>
		<li class="breadcrumb-item active">Registro</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Registrar Pagos <small>Por Consignación</small> </h1>
	<div class="row" id="imp1">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Registro</h4>
				</div>
				<div class="panel-body">
                    <div class="row">
                        <div class="form-group col-3">
                            <label>Buscar Nroº de Factura:</label>
                            <input class="form-control" type="text" name="nro_factura_b" id="nro_factura_b" onkeypress="return valideKey(event);">
                        </div>
                        <div class="col-1 mt-4">
                            <a
							onclick="buscar_fact();act();" class="btn btn-success btn-icon btn-circle btn-lg">
                                <i style="color: white" class="mt-2 fas fa-search"></i>
                            </a>
                        </div>
						<div class="col-8 mt-2 text-right" id="proce" style="display: none">
							<input class="form-control" id="id_registro_fact" name="id_registro_fact" type="hidden" readonly>
							<a onclick="modal();" data-toggle="modal" data-target="#exampleModal" style="color: white" class="btn btn-success btn-circle waves-effect  waves-circle waves-float btn-lg">
								Procesar Pago
							</a>
						</div>
                        <div class="col-6"></div>
						<div class="col-6"></div>
						<div class="col-12 row" id="items" style="display: none">
							<div class="form-group col-3">
								<label>Fecha de Factura:</label>
								<input class="form-control" id="reg_fact" name="reg_fact" type="text" readonly>
							</div>
							<div class="form-group col-3">
								<label>Nroº de Factura:</label>
								<input class="form-control" id="nro_factura" name="nro_factura" type="text" readonly>
							</div>
							<div class="form-group col-2">
								<label>RIF:</label>
								<input class="form-control" id="cod_rif" name="cod_rif" type="text" readonly>
							</div>
							<div class="form-group col-3">
								<label>Cliente</label>
								<input class="form-control" id="razon_social" name="razon_social" type="text" readonly>
							</div>
							<div class="form-group col-2">
								<label>Estado:</label>
								<input class="form-control" id="estado" name="estado" type="text" readonly>
							</div>
							<div class="form-group col-2">
								<label>Ciudad:</label>
								<input class="form-control" id="ciudad" name="ciudad" type="text" readonly>
							</div>
							<div class="form-group col-12">
								<label>Dirección:</label>
								<input class="form-control" id="direccion" name="direccion" type="text" readonly>
							</div>
							<div class="col-12 text-center">
								<table id="data-table-responsive" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="text-nowrap">ID</th>
											<th class="text-nowrap">Producto</th>
											<th class="text-nowrap">Categoría</th>
											<th class="text-nowrap">Cantidad</th>
											<th class="text-nowrap">Precio</th>
											<th class="text-nowrap">Sub-total</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>

							<div class="col-10"></div>
							<div class="form-group col-2">
								<label>Sub-Total:</label>
								<input class="form-control" type="text" id="sub-total_2" name="sub-total_2" readonly>
							</div>
							<div class="col-8"></div>
							<div class="col-2"></div>
							<div class="form-group col-2">
								<label>Iva:</label>
								<input class="form-control" id="iva" name="iva" type="text" readonly>
							</div>
							<div class="col-4"></div>
							<div class="form-group col-2">
								<label>Moneda:</label>
								<input class="form-control" id="moneda" name="moneda" type="text" readonly>
							</div>
							<div class="form-group col-2">
								<label>Valor:</label>
								<input class="form-control" id="valor" name="valor" type="text" readonly>
							</div>
							<div class="form-group col-2">
								<label>Total otra Moneda:</label>
								<input class="form-control" type="text" id="total_otr_mon" name="total_otr_mon" readonly>
							</div>
							<div class="form-group col-2">
								<label>Total Bs:</label>
								<input class="form-control"id="total_bs" name="total_bs" type="text" readonly>
							</div>
						</div>
                    </div>
					<div class="row mt-3" id="movimientos" style="display: none">
						<div class="col-12">
							<h5 class="text-center"><b>Movimientos de la Factura</b></h5>
						</div>
						<div class="col-12 text-center">
							<table id="data-table responsive" class="table table-striped table-bordered">
								<thead>
									<tr class="text-center">
										<th>ID</th>
										<th>Total en Bs.F</th>
										<th>Moneda</th>
										<th>Valor</th>
										<th>Total Moneda</th>
										<th>Abonado en Bs.F</th>
										<th>Abonado Moneda</th>
										<th>Saldo en Bs.F</th>
										<th>Saldo Moneda</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody id="pruebaa">
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>/js/pagos/buscar.js"></script>

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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="guardar_proc_pag" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-2">
							<label>ID Registro de Factura</label>
							<input class="form-control" type="text" name="id_reg_factura_ver" id="id_reg_factura_ver" readonly>
						</div>
						<div class="col-10"></div>
						<div class="form-group col-4">
							<label>Total deudora</label>
							<input class="form-control" type="text" name="cantidad_deu" id="cantidad_deu" readonly>
						</div>
						<div class="form-group col-3">
							<label>Total deudora otra Moneda</label>
							<input class="form-control" type="text" name="cantidad_deu_om" id="cantidad_deu_om" readonly>
						</div>
						<div class="form-group col-3">
							<label>Moneda</label>
							<input class="form-control" type="text" name="moneda_ver" id="moneda_ver" readonly>
						</div>
						<div class="form-group col-2">
							<label>Valor:</label>
							<input class="form-control" type="hidden" name="id_moneda_ver" id="id_moneda_ver" readonly>
							<input class="form-control" type="text" name="valor_2" id="valor_2" readonly>
						</div>
						<div class="col-4"></div>
						<div class="form-group col-4">
							<label>Cantidad a pagar Bs. F</label>
							<input class="form-control" type="text" id="cantidad_pagar_bs" name="cantidad_pagar_bs" onblur="calcular_bol();" onkeypress="return valideKey(event);">
						</div>
						<div class="form-group col-4">
							<label>Cantidad a pagar Otra Moneda</label>
							<input class="form-control" type="text" id="cantidad_pagar_otra" name="cantidad_pagar_otra" onblur="calcular_dol();" onkeypress="return valideKey(event);">
						</div>
						<div class="col-4"></div>
						<div class="form-group col-4">
							<label>Cantidad restante Bs. F</label>
							<input class="form-control" type="text" id="total_bs_pag" name="total_bs_pag" readonly>
						</div>
						<div class="form-group col-4">
							<label>Cantidad restante Otra Moneda</label>
							<input class="form-control" type="text" id="total_otra" name="total_otra" readonly>
						</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="guardar_proc_pago();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$('#exampleModal').on('hidden', function () {
	document.location.reload();
	})
</script>
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

$("#cantidad_pagar_bs").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});

$("#cantidad_pagar_otra").on({
        "focus": function (event) {
            $(event.target).select();
        },
        "keyup": function (event) {
            $(event.target).val(function (index, value ) {
                return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
            });
        }
    });
</script>
