<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Tabla Parametros</a></li>
		<li class="breadcrumb-item active">Categoría</li>
	</ol>
	<h1 class="page-header"><i class="fas fa-info text-teal fa-spin"></i> Registro de Categorías para los Productos</h1>
	<div class="row">
        <div class="col-lg-5">
			<div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
				    <h4 class="panel-title">Registro</h4>
				</div>
                <div class="panel-body">
					<form id="reg_categoria" method="POST" class="form-horizontal form-bordered">
						<div class="row">
							<div class="form-group col-12">
								<label>Descripción</label>
								<input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Descripción">
							</div>
							<div class="col-12  text-center">
								<button type="button" onclick="reg_categoria();" class="btn btn-success mt-3">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
        <div class="col-lg-7">
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Categorías Registradas</h4>
				</div>
				<div class="panel-body">
				<table id="data-table-default" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-nowrap">ID</th>
								<th class="text-nowrap">Descripción</th>
								<th class="text-nowrap">Acción</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($categoria as $lista):?>
							<tr class="odd gradeX">
								<td><?=$lista['id_categoria']?></td>
								<td><?=$lista['descripcion']?></td>
								<td>
									<a class="button">
	                                    <i title="Editar" onclick="modal(<?php echo $lista['id_categoria']?>);" data-toggle="modal" data-target="#exampleModal" class="fas fa-lg fa-fw fa-edit" style="color: #00d932;"></i>
	                                <a/>
        							<a onclick="eliminar_categoria(<?php echo $lista['id_categoria'];?>);" class="button"><i class="fas fa-lg fa-fw fa-trash-alt" style="color:red"></i><a/>
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

<script src="<?=base_url()?>/js/parametros/categoria.js"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editar_categoria" data-parsley-validate="true" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-3">
							<label>ID</label>
							<input class="form-control" type="text" name="id" id="id"readonly>
						</div>
						<div class="form-group col-9">
							<label>Descripción</label>
							<input class="form-control" type="text" name="descripcion_ver" id="descripcion_ver">
						</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="editar_categoria();" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
