<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Facturas</li>
	</ol>
	<h1 class="page-header">Registro de Facturas</h1>

    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
				    <h4 class="panel-title text-center">Factura</h4>
				</div>
                <div class="panel-body panel-form">
					<form id="reg_producto" method="POST" class="form-horizontal form-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-6 mb-2"></div>
								<div class="form-group mb-2 col-3 text-center">
                                    <label>Fecha de Factura:</label>
                                    <input class="form-control text-center" type="text" value="<?php echo date("d/m/Y h:i A");?>" name="fec_registro" id="fec_registro" readonly>
                                </div>
                                <div class="form-group col-3 mb-2">
                                    <label>Nroº de Factura:</label>
                                    <input class="form-control" type="text" name="nro_factura" id="nro_factura" readonly>
                                </div>

								<div class="form-group col-1 mb-2">
                                    <label>Tip. Doc</label>
                                    <select class="form-control" id="id_tip_doc" name="id_tip_doc">
                                    	<?php foreach ($tipo_doc as $data): ?>
                                    		<option value="<?=$data['id_tip_doc']?>"><?=$data['descripcion']?></option>
                                    	<?php endforeach; ?>
									</select>
                                </div>
                                <div class="form-group col-2">
                                    <label>Identificación:</label>
                                    <input class="form-control" type="text" name="rif" id="rif" onblur="cargar_inf_cliente();">
                                </div>

								<div class="row col-8" id="si" style="display : none;">
									<input type="hidden" name="si_existe" id="si_existe">
									<div class="form-group col-4">
										<label>Nombre o Razón Social:</label>
										<input class="form-control" type="hidden" name="id_cliente" id="id_cliente" readonly>
										<input class="form-control" type="text" name="nom_razon_social_ver" id="nom_razon_social_ver" readonly>
									</div>
									<div class="form-group col-4">
										<label>Nro. Télefono / Ext.</label>
										<input class="form-control" type="text" name="nro_telefono_ver" id="nro_telefono_ver" readonly>
									</div>
									<div class="form-group col-4">
                                    	<label>Dirección:</label>
                                    	<input class="form-control" type="text" name="direccion" id="direccion" readonly>
                                	</div>
                            	</div>
                                
								<div class="row" id="reg" style="display : none">
									<input type="hidden" name="existe" id="existe">
									<div class="form-group col-3 mt-2">
										<label>Nombre o Razón Social</label>
										<input class="form-control" type="text" name="nom_razon_social" id="nom_razon_social" placeholder="Nombre o Razón Social">
									</div>
									<div class="form-group col-2 mt-2">
										<label>Nro. Télefono / Ext.</label>
										<input class="form-control" type="text" name="nro_telefono" id="nro_telefono" placeholder="Nro">
									</div>
									<div class="form-group col-2">
										<label>Estado</label>
										<select class="form-control" id="id_estado" name="id_estado">
											<option value="0">SELECCIONE</option>
											<?php foreach ($estado as $data): ?>
												<option value="<?=$data['id']?>"><?=$data['descedo']?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group col-2">
										<label>Ciudad</label>
										<select class="form-control" id="id_ciudad" name="id_ciudad">
											<option value="0">SELECCIONE</option>
										</select>
									</div>
									<div class="form-group col-2">
										<label>Municipio</label>
										<select class="form-control" id="id_municipio" name="id_municipio">
											<option value="0">SELECCIONE</option>
										</select>
									</div>
									<div class="form-group col-2 mt-2">
										<label>Parroquia</label>
										<select class="form-control" id="id_parroquia" name="id_parroquia">
											<option value="0">SELECCIONE</option>
										</select>
									</div>
									<div class="form-group col-10 mt-2">
										<label>Dirección / Piso</label>
										<input class="form-control" type="text" name="dir_fiscal" id="dir_fiscal" placeholder="Dirección Fiscal">
									</div>  
								</div>
								<!-- <div class="form-group col-3  mt-2">
                                    <label>CLiente</label>
                                    <select class="form-control default-select2" id="id_cliente" name="id_cliente">
                                        <option value="0">SELECCIONE</option>
                                        <?php foreach ($clientes as $data): ?>
                                            <option value="<?=$data['id_cliente']?>"><?=$data['nom_razon_social']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group col-4">
                                    <label>Dirección:</label>
                                    <input class="form-control" type="text" name="direccion" id="direccion" readonly>
                                </div>
								<div class="form-group col-2">
                                    <label>Nro. Teléfono / Ext.:</label>
                                    <input class="form-control" type="text" name="nro_telefono" id="nro_telefono" readonly>
                                </div> -->
                            </div>
							<div class="row mt-3">
								<div class="col-12">
									<h5 class="text-center"><b>Registro de Productos</b></h5>
								</div>
								<div class="form-group col-3">
                                    <label>Categoría:</label>
									<input type="hidden" name="id_categoria" id="id_categoria">
                                    <input class="form-control" type="text" name="categoria" id="categoria" readonly>
                                </div>
								<div class="form-group col-2">
                                    <label>Cantidad en stock:</label>
                                    <input class="form-control" type="text" name="cantidad_stock" id="cantidad_stock" readonly>
                                </div>
								<div class="col-6"></div>
								<div class="form-group col-3  mt-2">
                                    <label>Producto</label>
                                    <select class="form-control" id="id_producto" name="id_producto" onclick="cargar_inf_prod();">
                                        <option value="0">SELECCIONE</option>
                                        <?php foreach ($productos as $data): ?>
                                            <option value="<?=$data['id_producto']?>/<?=$data['nom_producto']?>"><?=$data['nom_producto']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
								<div class="form-group col-2  mt-2">
								    <label>Cantidad a Vender:</label>
								    <input class="form-control" type="text" name="cantidad" id="cantidad" onblur="calcular_sub(); verf_cantd();" onkeypress="return valideKey(event);">
                                </div>
								<div class="form-group col-2 mt-2">
                                    <label>Precio:</label>
                                    <input class="form-control" type="text" name="precio" id="precio" onblur="calcular_sub();" onkeypress="return valideKey(event);" readonly>
                                </div>
								<div class="form-group col-2 mt-2">
                                    <label>Sub-Total:</label>
                                    <input class="form-control" type="text" name="sub_total" id="sub_total" onkeypress="return valideKey(event);" readonly>
                                </div>
								<div class="col-1 mt-4">
									<button type="button" onclick="agregar_prod(this);cargar_total();cargar_total_mod();" id="btn_ag" name="btn_ag" class="btn btn-circle btn-primary btn-lg"><i class="fas fa-plus"></i></button>
								</div>
								<div class="table-responsive mt-3">
							   		<h5 class="text-center"><b style="color:red;">NOTA:</b> La tabla debe tener al menos un registro agregado, para proceder con el registro.</h5>
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

								<div class="col-10"></div>
								<div class="form-group col-2">
                  					<label>Sub-Total:</label>
                  					<input class="form-control" type="text" name="sub_total_2" id="sub_total_2" onchange="cargar_total(); cargar_total_mod();"  readonly>
                				</div>
								<div class="col-8"></div>
								<div class="col-2"></div>
								<div class="form-group col-2" style="display: none">
                  					<label>Iva:</label>
                  					<input class="form-control" value="0" type="text" name="iva" id="iva" onkeyup="cargar_total();" onblur="cargar_total_mod();">
                				</div>
								<div class="col-4"></div>
								<div class="form-group col-2">
                                    <label>Moneda:</label>
									<select class="form-control" id="id_moneda" name="id_moneda" onclick="cargar_moneda();" onblur="cargar_total_mod();" >
                                        <option value="0">SELECCIONE</option>
                                        <?php foreach ($monedas as $data): ?>
                                            <option value="<?=$data['id_moneda']?>"><?=$data['descripcion']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
								<div class="form-group col-2">
                                    <label>Valor:</label>
                                    <input class="form-control" type="text" name="valor" id="valor" readonly>
                                </div>
								<div class="form-group col-2">
									<label>Total otra Moneda:</label>
									<input class="form-control" type="text" name="total_mon" id="total_mon" readonly>
								</div>
								<div class="form-group col-2">
									<label>Total Bs.D:</label>
									<input class="form-control" type="text" name="total" id="total" readonly>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-3">
									<label>Tipo de pago</label>
									<select class="form-control" name="id_tipo_pago" id="id_tipo_pago" onclick="llenar_pago();">
										<option value="1">A deuda</option>
										<option value="2">Transferencia</option>
										<option value="3">Pago Móvil</option>
										<option value="4">Efectivo</option>
										<option value="5">Efectivo en Otra Moneda</option>
									</select>
								</div>
								<div class="col-3">
									<label>Número de referencia:</label>
									<input class="form-control" type="text" name="nro_referencia" id="nro_referencia" value="0000" readonly>
								</div>
								<div class="col-3">
									<label>Monto Bs. D:</label>
									<input class="form-control" type="text" name="monto" id="monto" onblur="restar_m();"  value="0" onkeypress="return valideKey(event);" readonly>
								</div>
								<div class="col-3">
									<label>Monto Otra moneda:</label>
									<input class="form-control" type="text" name="monto_om" id="monto_om" value="0" onblur="restar_om();" onkeypress="return valideKey(event);" readonly>
								</div>
								<div class="col-6 mt-2">
									<label>Banco:</label>
									<input class="form-control" type="text" name="banco" id="banco" readonly>
								
								</div>
								<div class="col-3 mt-2">
									<label>Deuda Bs.D:</label>
									<input class="form-control" type="text" name="restante_bs" id="restante_bs" readonly>
								</div>
								
								<div class="col-3 mt-2">
									<label>Deuda Otra Moneda:</label>
									<input class="form-control" type="text" name="restante_om" id="restante_om" readonly>
								</div>
								<div class="col-2">
									<input class="form-control" type="hidden" name="id_estatus" id="id_estatus" readonly>	
								</div>
							</div>
                        </div>
						
                    </form>
					<div class="col-12 text-center mb-3">
						<button type="button" onclick="reg_factura();" class="btn btn-success mt-3">Guardar</button>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>/js/parametros/cliente.js"></script>
<script src="<?=base_url()?>/js/consignacion/registro.js"></script>
<script src="<?=base_url()?>/js/consignacion/agregar_prod.js"></script>
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
