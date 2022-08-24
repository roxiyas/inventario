<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Facturas</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Facturas Registradas</h1>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Facturas Registradas</h4>
				</div>
				<div class="panel-body">
                    <table id="data-table-responsive" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Nro. Factura</th>
								<th class="text-nowrap">Cliente</th>
								<th class="text-nowrap">Fecha Registro</th>
								<th>Estatus</th>
								<?php if ($id_perfil != '3'): ?>
									<th class="text-nowrap">Vendedor</th>
								<?php endif; ?>
								<th class="text-nowrap">Acción</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($factura as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['id_registro_fact']?></td>
								<td><?=$lista['nro_factura']?></td>
								<td><?=$lista['nom_razon_social']?></td>
								<td><?=$lista['fecha_reg']?></td>
								<td><?=$lista['descripcion']?></td>
								<?php if ($id_perfil != '3'): ?>
									<td><?=$lista['usuario']?></td>
								<?php endif; ?>
								<td>
									<a class="button" href="<?php echo base_url();?>index.php/Consignacion/ver_consignacion?id=<?php echo $lista['id_registro_fact'];?>" >
	                                    <i title="Ver" class="fas fa-lg fa-fw fa-list-alt" style="color: #00d41a;"></i>
	                                <a/>
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
<script src="<?=base_url()?>/js/consignacion/registro.js"></script>
