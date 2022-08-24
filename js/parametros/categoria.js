function reg_categoria(){
    var descripcion = $('#descripcion').val();
    if (descripcion == '') {
        document.getElementById("descripcion").focus();
    }else {
        event.preventDefault();
        swal.fire({
            title: '¿Registrar?',
            text: '¿Esta seguro de Registrar la Categoría?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ed946e',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: '¡Si, guardar!'
        }).then((result) => {
            if (result.value == true) {
                event.preventDefault();
                var datos = new FormData($("#reg_categoria")[0]);
				console.log(datos);
                var base_url =window.location.origin+'/anitacafe/index.php/Parametros/registrar_categoria';
                $.ajax({
                    url:base_url,
                    method: 'POST',
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response == 'true') {
                            swal.fire({
                                title: 'Registro Exitoso',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#ed946e',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.value == true) {
                                    location.reload();
                                }
                            });
                        }
                    }
                })
            }
        });
    }
}

function modal(id){
    var id_categoria = id;
    var base_url =window.location.origin+'/anitacafe/index.php/Parametros/consultar_categoria';

    $.ajax({
       url:base_url,
       method: 'post',
       data: {id_categoria: id_categoria},
       dataType: 'json',
       success: function(data){
                $('#id').val(data['id_categoria']);
                $('#descripcion_ver').val(data['descripcion']);
        }
    });
}

function editar_categoria(){
    var id_categoria = $('#id').val();
    var descripcion = $('#descripcion_ver').val();

    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea editar el registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ed946e',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Editar!'
    }).then((result) => {
        if (result.value == true) {
            var base_url =window.location.origin+'/anitacafe/index.php/Parametros/editar_categoria';

            $.ajax({
                url:base_url,
                method: 'post',
                data:{
                    id_categoria: id_categoria,
                    descripcion: descripcion
                },
                dataType: 'json',
                success: function(response){
                    if(response == 1) {
                        swal.fire({
                            title: 'Modificación Exitosa',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value == true) {
                                location.reload();
                            }
                        });
                    }
                }
            })
        }
    });
}

function eliminar_categoria(id){
    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea eliminar el registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ed946e',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Eliminar!'
    }).then((result) => {
        if (result.value == true) {
            var id_categoria = id
            var base_url =window.location.origin+'/anitacafe/index.php/Parametros/eliminar_categoria';

            $.ajax({
                url:base_url,
                method: 'post',
                data:{
                    id_categoria: id_categoria
                },
                dataType: 'json',
                success: function(response){
                    if(response == 1) {
                        swal.fire({
                            title: 'Eliminación Exitosa',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value == true) {
                                location.reload();
                            }
                        });
                    }
                }
            })
        }
    });
}
