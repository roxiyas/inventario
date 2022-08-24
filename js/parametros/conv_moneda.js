function reg_valor(){
    var moneda = $('#moneda').val();
    var valor = $('#valor').val();
    var fecha_act = $('#fecha_act').val();

    if (moneda == '') {
        document.getElementById("moneda").focus();
    }else if (valor == '') {
        document.getElementById("valor").focus();
    }else {
        event.preventDefault();
        swal.fire({
            title: '¿Registrar?',
            text: '¿Esta seguro de Registrar la Moneda?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: '¡Si, guardar!'
        }).then((result) => {
            if (result.value == true) {
                event.preventDefault();
                var datos = new FormData($("#reg_con_moneda")[0]);
                var base_url =window.location.origin+'/anitacafe/index.php/Parametros/reg_conv_moneda';
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

function modal(id){
    // $('#id_presentacion').val(id);
    var id_moneda = id;
    var base_url =window.location.origin+'/anitacafe/index.php/Parametros/consultar_moneda';

    $.ajax({
       url:base_url,
       method: 'post',
       data: {id_moneda: id_moneda},
       dataType: 'json',
       success: function(data){
           console.log(data);
                $('#id_moneda_ver').val(data['id_moneda']);
                $('#moneda_edt').val(data['descripcion']);
                $('#valor_edt').val(data['valor']);
        }
    });
}

$("#valor").on({
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

function editar_moneda(){
    var id_moneda_ver = $('#id_moneda_ver').val();
    var moneda_edt = $('#moneda_edt').val();
    var valor_edt = $('#valor_edt').val();

    if (moneda_edt == '') {
        document.getElementById("moneda_edt").focus();
    }else if (valor_edt == '') {
        document.getElementById("valor_edt").focus();
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
                var base_url =window.location.origin+'/anitacafe/index.php/Parametros/editar_moneda';

                $.ajax({
                    url:base_url,
                    method: 'post',
                    data:{
                        id_moneda_ver: id_moneda_ver,
                        moneda_edt: moneda_edt,
                        valor_edt: valor_edt
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

function eliminar_moneda(id){
    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea eliminar el registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Eliminar!'
    }).then((result) => {
        if (result.value == true) {
            var id_moneda = id
            var base_url =window.location.origin+'/anitacafe/index.php/Parametros/eliminar_moneda';

            $.ajax({
                url:base_url,
                method: 'post',
                data:{
                    id_moneda: id_moneda
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
