<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Reportes</a></li>
		<li class="breadcrumb-item active">Total Diario</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Total de Ventas <small>Por Tipo de Pago</small> </h1>
	<div class="row" id="imp1">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Registro</h4>
				</div>
				<div class="panel-body">
                    <div class="row">
                        <div class="form-group col-3">
                            <label>Fecha:</label>
                            <input class="form-control" type="text" name="fecha" id="datepicker-autoClose">
                        </div>
                        <div class="col-1 mt-4">
                            <a
							onclick="buscar_total();act();" class="btn btn-success btn-icon btn-circle btn-lg">
                                <i style="color: white" class="mt-2 fas fa-search"></i>
                            </a>
                        </div>
                        <div class="col-12">
                        <table id="data-table" class="table table-striped table-bordered">
								<thead>
									<tr class="text-center">
										<th>ID</th>
										<th>Tipo de Pago</th>
										<th>Abonado en Bs.D</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody class="text-center" id="pruebaa">
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>/js/reportes/total_dia.js"></script>