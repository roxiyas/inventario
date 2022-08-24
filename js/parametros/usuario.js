function reg_usuario(){
    var id_tip_doc  = $('#id_tip_doc').val();
    var cedula      = $('#cedula').val();
    var nom_ape     = $('#nom_ape').val();
    var id_perfil   = $('#id_perfil').val();
    var usuario     = $('#usuario').val();
    var contrasenia = $('#contrasenia').val();

    if (id_tip_doc == '0') {
        document.getElementById("id_tip_doc").focus();
    }else if (cedula == '') {
        document.getElementById("id_tip_doc").focus();
    }else if (nom_ape == '') {
        document.getElementById("id_tip_doc").focus();
    }else if (id_perfil == '0') {
        document.getElementById("id_perfil").focus();
    }else if (usuario == '') {
        document.getElementById("usuario").focus();
    }else if (contrasenia == '0') {
        document.getElementById("contrasenia").focus();
    }else {
        event.preventDefault();
        swal.fire({
            title: '¿Registrar?',
            text: '¿Esta seguro de Registrar el Usuario?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: '¡Si, guardar!'
        }).then((result) => {
            if (result.value == true) {
                event.preventDefault();
                var datos = new FormData($("#reg_usuario")[0]);
                var base_url =window.location.origin+'/anitacafe/index.php/Parametros/reg_usuario';
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

function modal(id){
    var id_usuario = id;
    var base_url =window.location.origin+'/anitacafe/index.php/Parametros/consultar_user';

    $.ajax({
       url:base_url,
       method: 'post',
       data: {id_usuario: id_usuario},
       dataType: 'json',
       success: function(data){
           console.log(data);
                $('#id_usuario').val(data['id_user']);
                $('#id_persona_ver').val(data['id_persona']);
                $('#cedula_ver').val(data['cedula']);
                $('#nom_ape_ver').val(data['nom_ape']);
                $('#usuario_ver').val(data['usuario']);
                $('#id_perfil_ver').val(data['id_perfil']);
                $('#perfil_ver').val(data['perfil']);
        }
    });
}

function eliminar_usuario(id_usuario, id_person){
    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea eliminar el usuario?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Eliminar!'
    }).then((result) => {
        if (result.value == true) {
            var id_user = id_usuario
            var id_persona = id_person

            var base_url =window.location.origin+'/anitacafe/index.php/Parametros/eliminar_usuario';

            $.ajax({
                url:base_url,
                method: 'post',
                data:{
                    id_user: id_user,
                    id_persona: id_persona
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

function cam_sta_usuario(id_use, id_ests){
    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea cambiar el Estatus al usuario?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Eliminar!'
    }).then((result) => {
        if (result.value == true) {
            var id_user = id_use
            var id_estatus = id_ests

            var base_url =window.location.origin+'/anitacafe/index.php/Parametros/camb_est_usuario';

            $.ajax({
                url:base_url,
                method: 'post',
                data:{
                    id_user: id_user,
                    id_estatus: id_estatus
                },
                dataType: 'json',
                success: function(response){
                    if(response == 1) {
                        swal.fire({
                            title: 'Actualización Exitosa',
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

function editar_usuario(){
    var id_usuario  = $('#id_usuario').val();
    var cedula_ver  = $('#cedula_ver').val();
    var nom_ape_ver = $('#nom_ape_ver').val();
    var usuario_ver = $('#usuario_ver').val();
    var id_perfil_ver  = $('#id_perfil_ver').val();
    var id_perfil_edit   = $('#id_perfil_edit').val();
    var id_persona_ver   = $('#id_persona_ver').val();

    if (id_perfil_edit == '0') {
        var id_perf = id_perfil_ver
    }else {
        var id_perf = id_perfil_edit
    }

    if (cedula_ver == '') {
        document.getElementById("cedula_ver").focus();
    }else if (nom_ape_ver == '') {
        document.getElementById("nom_ape_ver").focus();
    }else if (usuario_ver == '') {
        document.getElementById("usuario_ver").focus();
    }else{
        event.preventDefault();
        swal.fire({
            title: '¿Seguro que desea editar el registro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: '¡Si, Editar!'
        }).then((result) => {
            if (result.value == true) {
                var base_url =window.location.origin+'/anitacafe/index.php/Parametros/editar_usuario';

                $.ajax({
                    url:base_url,
                    method: 'post',
                    data:{
                        id_usuario: id_usuario,
                        cedula_ver: cedula_ver,
                        nom_ape_ver: nom_ape_ver,
                        usuario_ver: usuario_ver,
                        id_perf: id_perf,
                        id_persona_ver: id_persona_ver
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
