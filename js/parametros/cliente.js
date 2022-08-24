$(document).ready(function(){
    //CIUDADES
    $('#id_estado').change(function(){
        var id_estado = $(this).val();
        var base_url = window.location.origin+'/anitacafe/index.php/Parametros/listar_ciudades';

        $.ajax({
            url: base_url,
            method:'post',
            data: {id_estado: id_estado},
            dataType:'json',

            success: function(response){
                $('#id_ciudad').find('option').not(':first').remove();
                $.each(response, function(index, data){
                    $('#id_ciudad').append('<option value="'+data['id']+'">'+data['descciu']+'</option>');
                });
            }
        });
    });

    //MUNICIPIO
    $('#id_estado').change(function(){
        var id_estado = $(this).val();
        var base_url = window.location.origin+'/anitacafe/index.php/Parametros/listar_municipio';
        // var base_url = '/index.php/Programacion/listar_municipio';

        $.ajax({
            url: base_url,
            method:'post',
            data: {id_estado: id_estado},
            dataType:'json',

            success: function(response){
                $('#id_municipio').find('option').not(':first').remove();
                $('#id_parroquia').find('option').not(':first').remove();
                $.each(response, function(index, data){
                    $('#id_municipio').append('<option value="'+data['id_municipio']+'">'+data['descripcion']+'</option>');
                });
            }
        });
    });

    //PARROQUIA
    $('#id_municipio').change(function(){
        var id_municipio = $(this).val();
        var base_url = window.location.origin+'/anitacafe/index.php/Parametros/listar_parroquia';
        // var base_url = '/index.php/Programacion/listar_parroquia';
        $.ajax({
            url: base_url,
            method:'post',
            data: {id_municipio: id_municipio},
            dataType:'json',

            success: function(response){
                $('#id_parroquia').find('option').not(':first').remove();

                $.each(response, function(index, data){
                    $('#id_parroquia').append('<option value="'+data['id_parroquia']+'">'+data['descripcion']+'</option>');
                });
            }
        });
    });

    // PARA EDITAR
    // CIUDAD
    $('#id_estado_nuv').change(function(){
        var id_estado = $(this).val();
        var base_url = window.location.origin+'/anitacafe/index.php/Parametros/listar_ciudades';

        $.ajax({
            url: base_url,
            method:'post',
            data: {id_estado: id_estado},
            dataType:'json',

            success: function(response){
                $('#id_ciudad_nuv').find('option').not(':first').remove();
                $.each(response, function(index, data){
                    $('#id_ciudad_nuv').append('<option value="'+data['id']+'">'+data['descciu']+'</option>');
                });
            }
        });
    });

    //MUNICIPIO
    $('#id_estado_nuv').change(function(){
        var id_estado = $(this).val();
        var base_url = window.location.origin+'/anitacafe/index.php/Parametros/listar_municipio';
        // var base_url = '/index.php/Programacion/listar_municipio';

        $.ajax({
            url: base_url,
            method:'post',
            data: {id_estado: id_estado},
            dataType:'json',

            success: function(response){
                $('#id_municipio_nuv').find('option').not(':first').remove();
                $('#id_parroquia_nuv').find('option').not(':first').remove();
                $.each(response, function(index, data){
                    $('#id_municipio_nuv').append('<option value="'+data['id_municipio']+'">'+data['descripcion']+'</option>');
                });
            }
        });
    });

    //PARROQUIA
    $('#id_municipio_nuv').change(function(){
        var id_municipio = $(this).val();
        var base_url = window.location.origin+'/anitacafe/index.php/Parametros/listar_parroquia';
        // var base_url = '/index.php/Programacion/listar_parroquia';
        $.ajax({
            url: base_url,
            method:'post',
            data: {id_municipio: id_municipio},
            dataType:'json',

            success: function(response){
                $('#id_parroquia_nuv').find('option').not(':first').remove();

                $.each(response, function(index, data){
                    $('#id_parroquia_nuv').append('<option value="'+data['id_parroquia']+'">'+data['descripcion']+'</option>');
                });
            }
        });
    });
});

function reg_cliente(){
    var id_estado        = $('#id_estado').val();
    var id_ciudad        = $('#id_ciudad').val();
    var id_municipio     = $('#id_municipio').val();
    var id_parroquia     = $('#id_parroquia').val();
    var dir_fiscal       = $('#dir_fiscal').val();
    var id_tip_doc       = $('#id_tip_doc').val();
    var cod_rif          = $('#cod_rif').val();
    var nom_razon_social = $('#nom_razon_social').val();
    var nro_telefono     = $('#nro_telefono').val();

    if (id_estado == '0') {
        document.getElementById("id_estado").focus();
    }else if (id_ciudad == '0') {
        document.getElementById("id_ciudad").focus();
    }else if (id_municipio == '0') {
        document.getElementById("id_municipio").focus();
    }else if (id_parroquia == '0') {
        document.getElementById("id_parroquia").focus();
    }else if (dir_fiscal == '') {
        document.getElementById("dir_fiscal").focus();
    }else if (id_tip_doc == '0') {
        document.getElementById("id_tip_doc").focus();
    }else if (cod_rif == '') {
        document.getElementById("cod_rif").focus();
    }else if (nom_razon_social == '') {
        document.getElementById("nom_razon_social").focus();
    }else if (nro_telefono == '') {
        document.getElementById("nro_telefono").focus();
    }else {
        event.preventDefault();
        swal.fire({
            title: '¿Registrar?',
            text: '¿Esta seguro de Registrar la Cliente?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ed946e',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: '¡Si, guardar!'
        }).then((result) => {
            if (result.value == true) {
                event.preventDefault();
                var datos = new FormData($("#reg_cliente")[0]);
                var base_url =window.location.origin+'/anitacafe/index.php/Parametros/reg_cliente';
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
    // $('#id_presentacion').val(id);
    var id_cliente = id;
    var base_url   = window.location.origin+'/anitacafe/index.php/Parametros/consultar_cliente';
    var base_url_2 = window.location.origin+'/anitacafe/index.php/Parametros/consultar_estado_mod';
    var base_url_3 = window.location.origin+'/anitacafe/index.php/Parametros/consultar_municipio_mod';
    var base_url_4 = window.location.origin+'/anitacafe/index.php/Parametros/consultar_parroquia_mod';
    var base_url_5 = window.location.origin+'/anitacafe/index.php/Parametros/consultar_ciudad_mod';
    var base_url_6 = window.location.origin+'/anitacafe/index.php/Parametros/consultar_tip_doc_mod';
    var base_url_7 = window.location.origin+'/anitacafe/index.php/Parametros/consultar_vendedor_mod';

    $.ajax({
        url:base_url,
        method: 'post',
        data: {id_cliente: id_cliente},
        dataType: 'json',
        success: function(data){
            $('#id_cliente').val(data['id_cliente']);
            $('#id_estado_ver').val(data['id_estado']);
            $('#estado_ver').val(data['descedo']);
            $('#id_ciudad_ver').val(data['id_ciudad']);
            $('#ciudad_ver').val(data['ciudad']);
            $('#id_municipio_ver').val(data['id_municipio']);
            $('#municipio_ver').val(data['municipio']);
            $('#id_parroquia_ver').val(data['id_parroquia']);
            $('#parroquia_ver').val(data['parroquia']);
            $('#dir_fiscal_ver').val(data['dir_fiscal']);
            $('#id_tip_doc_ver').val(data['id_tip_doc']);
            $('#cod_rif_ver').val(data['cod_rif']);
            $('#doc_ver').val(data['t_doc']);
            $('#nom_razon_social_ver').val(data['nom_razon_social']);
            $('#nro_telefono_ver').val(data['nro_telefono']);

            var id_est_consul = data['id_estado'];
            $.ajax({
               url:base_url_2,
               method: 'post',
               data: {id_est_consul: id_est_consul},
               dataType: 'json',
               success: function(response){
                   $('#id_municipio_nuv').find('option').not(':first').remove();
                   $('#id_parroquia_nuv').find('option').not(':first').remove();
                   $.each(response, function(index, data){
                       $('#id_estado_nuv').append('<option value="'+data['id']+'">'+data['descedo']+'</option>');
                   });
               }
            });

            var id_ciu_consul = data['id_ciudad'];
            $.ajax({
               url:base_url_5,
               method: 'post',
               data: {id_ciu_consul:id_ciu_consul,
                      id_est_consul: id_est_consul},
               dataType: 'json',
               success: function(response){
                   $('#id_ciudad_nuv').find('option').not(':first').remove();
                   $.each(response, function(index, data){
                       $('#id_ciudad_nuv').append('<option value="'+data['id']+'">'+data['descciu']+'</option>');
                   });
               }
            });

            var id_mun_consul = data['id_municipio'];
            $.ajax({
               url:base_url_3,
               method: 'post',
               data: {id_mun_consul: id_mun_consul,
                      id_est_consul: id_est_consul},
               dataType: 'json',
               success: function(response){
                   $.each(response, function(index, data){
                       $('#id_municipio_nuv').append('<option value="'+data['id_municipio']+'">'+data['descripcion']+'</option>');
                   });
               }
            });

            var id_par_consul = data['id_parroquia'];
            $.ajax({
               url:base_url_4,
               method: 'post',
               data: {id_par_consul: id_par_consul,
                      id_mun_consul:id_mun_consul},
               dataType: 'json',
               success: function(response){
                   $.each(response, function(index, data){
                       $('#id_parroquia_nuv ').append('<option value="'+data['id_parroquia']+'">'+data['descripcion']+'</option>');
                   });
               }
            });

            var id_tip_doc = data['id_tip_doc'];
            $.ajax({
               url:base_url_6,
               method: 'post',
               data: {id_tip_doc: id_tip_doc},
               dataType: 'json',
               success: function(response){
                   $.each(response, function(index, data){
                       $('#id_tip_doc_nuv ').append('<option value="'+data['id_tip_doc']+'">'+data['descripcion']+'</option>');
                   });
               }
            });

            var id_vendedor = data['id_vendedor'];
            $.ajax({
               url:base_url_7,
               method: 'post',
               data: {id_vendedor: id_vendedor},
               dataType: 'json',
               success: function(response){
                   $.each(response, function(index, data){
                       $('#id_vendedor_nuv ').append('<option value="'+data['id_user']+'">'+data['usuario']+'</option>');
                   });
               }
            });
        }
    });


}

function editar_cliente(){
    var id_cliente = $('#id_cliente').val();

    var id_estado_ver = $('#id_estado_ver').val();
    var id_ciudad_ver = $('#id_ciudad_ver').val();
    var id_municipio_ver = $('#id_municipio_ver').val();
    var id_parroquia_ver = $('#id_parroquia_ver').val();

    var id_estado_nuv = $('#id_estado_nuv').val();
    var id_ciudad_nuv = $('#id_ciudad_nuv').val();
    var id_municipio_nuv = $('#id_municipio_nuv').val();
    var id_parroquia_nuv = $('#id_parroquia_nuv').val();

    var dir_fiscal_ver = $('#dir_fiscal_ver').val();

    var id_tip_doc_ver = $('#id_tip_doc_ver').val();
    var id_tip_doc_nuv = $('#id_tip_doc_nuv').val();

    var cod_rif_ver = $('#cod_rif_ver').val();
    var nom_razon_social_ver = $('#nom_razon_social_ver').val();
    var nro_telefono_ver = $('#nro_telefono_ver').val();

    if (id_estado_nuv == '0') {
        var id_estado = id_estado_ver;
    }else {
        var id_estado = id_estado_nuv
    }

    if (id_ciudad_nuv == '0') {
        var id_ciudad = id_ciudad_ver;
    }else {
        var id_ciudad = id_ciudad_nuv;
    }

    if (id_municipio_nuv == '0') {
        var id_municipio = id_municipio_ver;
    }else {
        var id_municipio = id_municipio_nuv
    }

    if (id_parroquia_nuv == '0') {
        var id_parroquia = id_parroquia_ver
    }else {
        var id_parroquia = id_parroquia_nuv
    }

    if (id_tip_doc_nuv == '0') {
        var id_tip_doc =  id_tip_doc_ver;
    }else {
        var id_tip_doc = id_tip_doc_nuv;
    }
    if (id_cliente == '') {
        document.getElementById("id_cliente").focus();
    }else{
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
                var base_url =window.location.origin+'/anitacafe/index.php/Parametros/editar_cliente';

                $.ajax({
                    url:base_url,
                    method: 'post',
                    data:{
                        id_cliente: id_cliente,
                        id_estado: id_estado,
                        id_ciudad: id_ciudad,
                        id_municipio: id_municipio,
                        id_parroquia: id_parroquia,
                        dir_fiscal: dir_fiscal_ver,
                        id_tip_doc: id_tip_doc,
                        cod_rif: cod_rif_ver,
                        nom_razon_social : nom_razon_social_ver,
                        nro_telefono : nro_telefono_ver,
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
}

function eliminar_cliente(id_cliente){
    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea eliminar el Cliente?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ed946e',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Eliminar!'
    }).then((result) => {
        if (result.value == true) {
            var id_client = id_cliente

            var base_url =window.location.origin+'/anitacafe/index.php/Parametros/eliminar_cliente';

            $.ajax({
                url:base_url,
                method: 'post',
                data:{
                    id_client: id_client
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
