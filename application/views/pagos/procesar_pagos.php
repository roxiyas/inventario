<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Pagos</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Facturas Registradas por Cliente</h1>
    <div class="col-1 mb-3">
        	<a class="btn btn-circle waves-effect  waves-circle waves-float btn-primary" href="javascript:history.back()"> Volver</a>
      	</div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Facturas Registradas por Cliente</h4>
				</div>
				<div class="panel-body">
                    <div class="row">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Deuda en Bs. D</th>
                                    <th>Deuda Otra Moneda</th>
                                    <th>Pagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="odd gradeX">
                                        <td><?=$factura_x_cliente['nro_factura']?></td>
                                        <td><?=$factura_x_cliente['nom_razon_social']?></td>
                                        <td><?=$factura_x_cliente['restante_bs']?></td>
                                        <td><?=$factura_x_cliente['restante_om']?></td>
                                        <td>
                                        <!-- <a class="button" href="<?php echo base_url();?>index.php/Pagos/ver_factura?id=<?php echo $lista['id_registro_fact'];?>" >
	                                        <i title="Pagar" class="fas fa-lg fa-fw fa-list-alt" style="color: #00d41a;"></i>
	                                    <a/> -->
                                        <a onclick="modal(<?php echo $factura_x_cliente['id_registro_fact']?>);" data-toggle="modal" data-target="#exampleModal" style="color: white" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                            Pagar
                                        </a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
					<h4 class="panel-title">Productos Comprados</h4>
                </div>
                <div class="panel-body">
                    <div class="row">  
                        <div class="col-12 text-center">
                            <table id="data-table-responsive" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">ID</th>
                                        <th class="text-nowrap">Producto</th>
                                        <th class="text-nowrap">Cantidad</th>
                                        <th class="text-nowrap">Precio</th>
                                        <th class="text-nowrap">Sub-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($factura_x_cliente_prod as $lista):?>
                                        <tr class="odd gradeX">
                                            <td><?=$lista['nro_factura']?></td>
                                            <td><?=$lista['nom_producto']?></td>
                                            <td><?=$lista['cantidad']?></td>
                                            <td><?=$lista['precio']?></td>
                                            <td><?=$lista['sub_total']?></td>
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
						<div class="col-4">
                            <label>Tipo de pago</label>
                            <select class="form-control" name="id_tipo_pago" id="id_tipo_pago" onclick="llenar_pago();">
                                <option value="1">A deuda</option>
                                <option value="2">Transferencia</option>
                                <option value="3">Pago Móvil</option>
                                <option value="4">Efectivo</option>
                                <option value="5">Efectivo en Otra Moneda</option>
                            </select>
                        </div>
						<div class="form-group col-4">
							<label>Cantidad a pagar Bs. F</label>
							<input class="form-control" type="text" id="cantidad_pagar_bs" name="cantidad_pagar_bs" onblur="calcular_bol();" onkeypress="return valideKey(event);">
						</div>
						<div class="form-group col-4">
							<label>Cantidad a pagar Otra Moneda</label>
							<input class="form-control" type="text" id="cantidad_pagar_otra" name="cantidad_pagar_otra" onblur="calcular_dol();" onkeypress="return valideKey(event);">
						</div>
						<div class="col-4">
                            <label>Número de referencia:</label>
                            <input class="form-control" type="text" name="nro_referencia" id="nro_referencia" readonly>
                        </div>
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
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
