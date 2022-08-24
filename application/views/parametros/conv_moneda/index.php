<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Presentación</li>
	</ol>
	<h1 class="page-header">Registro de Moneda y Valor</h1>
	<div class="row">
        <div class="col-lg-12">
			<div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
				    <h4 class="panel-title">Registro</h4>
				</div>
                <div class="panel-body panel-form">
					<form id="reg_con_moneda" method="POST" class="form-horizontal form-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label>Moneda</label>
                                    <input class="form-control" type="text" name="moneda" id="moneda" placeholder="Descripción">
                                </div>
                                <div class="form-group col-3">
                                    <label>Valor</label>
                                    <input class="form-control" type="text" name="valor" id="valor" placeholder="Valor en BS.F" onkeypress="return valideKey(event);">
                                </div>
								<div class="form-group col-3">
                                    <label>Fecha</label>
                                    <input class="form-control" type="text" name="fecha_act" id="fecha_act" value="<?php echo date("d-m-Y");?>" readonly >
                                </div>
                                <div class="col-12  text-center">
                                    <button type="button" onclick="reg_valor();" class="btn btn-success mt-3">Guardar</button>
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
					<h4 class="panel-title">Monedas Registradas</h4>
				</div>
				<div class="panel-body">
                    <table id="data-table" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Fec. Registro</th>
                                <th class="text-nowrap">Moneda</th>
								<th class="text-nowrap">Valor</th>
								<th class="text-nowrap">Acción</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($moneda as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['id_moneda']?></td>
								<td><?=$lista['fecha_reg']?></td>
                                <td><?=$lista['descripcion']?></td>
								<td><?=$lista['valor']?></td>
								<td>
									<a class="button">
	                                    <i title="Editar Moneda" onclick="modal(<?php echo $lista['id_moneda']?>);" data-toggle="modal" data-target="#exampleModal" class="fas fa-lg fa-fw fa-edit" style="color: #00BCD4;"></i>
	                                <a/>
        							<a onclick="eliminar_moneda(<?php echo $lista['id_moneda'];?>);" class="button"><i class="fas fa-lg fa-fw fa-trash-alt" style="color:red"></i><a/>
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
<script src="<?=base_url()?>/js/parametros/conv_moneda.js"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Moneda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editar_presentacion" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-2">
							<label>ID</label>
                            <input class="form-control" type="text" name="id_moneda_ver" id="id_moneda_ver" readonly>
                        </div>
                        <div class="form-group col-5">
                            <label>Moneda</label>
                            <input class="form-control" type="text" name="moneda_edt" id="moneda_edt">
                        </div>
                        <div class="form-group col-5">
                            <label>Valor</label>
                            <input class="form-control" type="text" name="valor_edt" id="valor_edt" onkeypress="return valideKey(event);">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="editar_moneda();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$("#valor_edt").on({
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
