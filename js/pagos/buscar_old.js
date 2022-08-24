function buscar_fact(){
    var nro_factura_b = $('#nro_factura_b').val();
    if (nro_factura_b == '') {
        swal({
                    title: "¡ATENCION!",
                    text: "El campo no puede estar vacio.",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#00897b",
                    confirmButtonText: "CONTINUAR",
                    closeOnConfirm: false
                }, function(){
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                });
                $('#ueba').attr("disabled", true);
    }else{
        var base_url = window.location.origin+'/anitacafe/index.php/pagos/buscar_fact_ind';
        $.ajax({
           url:base_url,
           method: 'post',
           data: {nro_factura_b:nro_factura_b},
           dataType: 'json',
           success: function(data){
			   console.log(data);
               if (data['id_estatus'] <= 4 || data['id_estatus'] == 6) {
                   swal({
                               title: "¡ATENCION!",
                               text: "La factura debe estar en estatus aprobado.",
                               type: "warning",
                               showCancelButton: false,
                               confirmButtonColor: "#00897b",
                               confirmButtonText: "CONTINUAR",
                               closeOnConfirm: false
                           }, function(){
                               swal("Deleted!", "Your imaginary file has been deleted.", "success");
                           });
               }else {
                   $("#items").show();
                   $("#proce").show();
                   $("#imprimir").show();

                   $('#reg_fact').val(data['fecha_reg']);
                   $('#nro_factura').val(data['nro_factura']);
                   $('#cod_rif').val(data['cod_rif']);
                   $('#razon_social').val(data['nom_razon_social']);
                   $('#estado').val(data['descedo']);
                   $('#ciudad').val(data['descciu']);
                   $('#responsable').val(data['responsable']);
                   $('#direccion').val(data['dir_fiscal']);

                   $('#sub-total_2').val(data['sub_total_2']);
                   $('#iva').val(data['iva']);
                   $('#moneda').val(data['id_moneda']);
                   $('#valor').val(data['valor']);
                   $('#total_otr_mon').val(data['total_mon']);
                   $('#total_bs').val(data['total']);

                   $('#id_registro_fact').val(data['id_registro_fact']);

                   var id_registro_fact = data['id_registro_fact'];
                   if (id_registro_fact){
                       var base_url = window.location.origin+'/anitacafe/index.php/pagos/buscar_fact_art'
                       $.ajax({
                           url:base_url,
                           method: 'post',
                           data: {id_registro_fact:id_registro_fact},
                           dataType: 'json',
                           success: function(data){
                               $.each(data, function(index, response){
                                     $('#data-table-responsive tbody').append('<tr><td>' + response['id_reg_prod_fact']
                                                                           + '</td><td>' + response['nom_producto']
                                                                           + '</td><td>' + response['categoria']
                                                                           + '</td><td>' + response['cantidad']
                                                                           + '</td><td>' + response['precio']
                                                                           + '</td><td>' + response['sub_total'] + '</td></tr>');
                               });
                           }
                       })
                   }

                   var id_estatus = (data['id_estatus']);
                   if (id_estatus === '8') {
                        $("#proce").hide();
                   }

                   if (id_estatus >= '8') {
                       $("#movimientos").show();
                       var base_url = window.location.origin+'/anitacafe/index.php/pagos/buscar_mov_fac'
                       $.ajax({
                           url:base_url,
                           method: 'post',
                           data: {id_registro_fact:id_registro_fact},
                           dataType: 'json',
                           success: function(data){
                               $.each(data, function(index, response){
                                     $('#pruebaa').append('<tr><td>' + response['id_registro_fact']
                                                                   + '</td><td>' + response['total_ant_bs']
                                                                   + '</td><td>' + response['id_moneda']
                                                                   + '</td><td>' + response['valor']
                                                                   + '</td><td>' + response['total_om']
                                                                   + '</td><td>' + response['total_abonado_bs']
                                                                   + '</td><td>' + response['total_abonado_om']
                                                                   + '</td><td>' + response['restante_bs']
                                                                   + '</td><td>' + response['restante_om']
                                                                   + '</td><td>' + response['fecha_reg'] + '</td></tr>');
                               });
                           }
                       })
                   }
               }
           }
        });
    }
}

function act(){
     $("#data-table-responsive tbody").load(location.href+"#data-table-responsive tbody>*","");
}

function modal(){
    var id_reg_factura =  $('#id_registro_fact').val();

    var base_url =window.location.origin+'/anitacafe/index.php/Pagos/consultar_total_fact';

    $.ajax({
       url:base_url,
       method: 'post',
       data: {id_reg_factura: id_reg_factura},
       dataType: 'json',
       success: function(data){
           console.log(data);
                $('#id_reg_factura_ver').val(id_reg_factura);
                $('#cantidad_deu').val(data['restante_bs']);
                $('#cantidad_deu_om').val(data['restante_om']);
                $('#id_moneda_ver').val(data['id_moneda']);
                $('#moneda_ver').val(data['descripcion']);
                $('#valor_2').val(data['valor']);
        }
    });
}

function calcular_bol(){
    var cantidad_deu_bs =  $('#cantidad_deu').val();
    var cantidad_pagar_bs =  $('#cantidad_pagar_bs').val();
    var valor_2 =  $('#valor_2').val();

    var newstr = cantidad_deu_bs.replace('.', "");
    var newstr2 = newstr.replace('.', "");
    var newstr3 = newstr2.replace('.', "");
    var newstr4 = newstr3.replace('.', "");
    var cant_deu_bs = newstr4.replace(',', ".");

    var newstr = cantidad_pagar_bs.replace('.', "");
    var newstr5 = newstr.replace('.', "");
    var newstr6 = newstr5.replace('.', "");
    var newstr7 = newstr6.replace('.', "");
    var cant_pag_bs = newstr7.replace(',', ".");

    var newstr = valor_2.replace('.', "");
    var newstr8 = newstr.replace('.', "");
    var newstr9 = newstr8.replace('.', "");
    var newstr10 = newstr9.replace('.', "");
    var dolar = newstr10.replace(',', ".");

    // Total restante bs
    var restant_bs = cant_deu_bs - cant_pag_bs;
    var sub_total2 = parseFloat(restant_bs).toFixed(2);
    var sub_total3 = Intl.NumberFormat("de-DE").format(sub_total2);
    $('#total_bs_pag').val(sub_total3);

    // total a pagar om
    var sub_total_dolar = cant_pag_bs / dolar;
    var sub_total_dolar4 = parseFloat(sub_total_dolar).toFixed(2);
    var sub_total_dolar5 = Intl.NumberFormat("de-DE").format(sub_total_dolar4);
    $('#cantidad_pagar_otra').val(sub_total_dolar5);

    // total restante om
    var sub_total_dolar = restant_bs / dolar;
    var sub_total_dolar2 = parseFloat(sub_total_dolar).toFixed(2);
    var sub_total_dolar3 = Intl.NumberFormat("de-DE").format(sub_total_dolar2);
    $('#total_otra').val(sub_total_dolar3);

}

function calcular_dol(){
    var cantidad_deu_om =  $('#cantidad_deu_om').val();
    var cantidad_pagar_otra =  $('#cantidad_pagar_otra').val();
    var valor_2 =  $('#valor_2').val();
    var cantidad_deu_bs =  $('#cantidad_deu').val();

    var newstr = cantidad_deu_om.replace('.', "");
    var newstr2 = newstr.replace('.', "");
    var newstr3 = newstr2.replace('.', "");
    var newstr4 = newstr3.replace('.', "");
    var cant_deu_om = newstr4.replace(',', ".");

    var newstr = cantidad_pagar_otra.replace('.', "");
    var newstr5 = newstr.replace('.', "");
    var newstr6 = newstr5.replace('.', "");
    var newstr7 = newstr6.replace('.', "");
    var cant_pag_otra = newstr7.replace(',', ".");

    var newstr = valor_2.replace('.', "");
    var newstr8 = newstr.replace('.', "");
    var newstr9 = newstr8.replace('.', "");
    var newstr10 = newstr9.replace('.', "");
    var dolar = newstr10.replace(',', ".");

    // Total a pagar de otra moneda
    var sub_total = cant_deu_om - cant_pag_otra;
    var sub_total2 = parseFloat(sub_total).toFixed(2);
    var sub_total3 = Intl.NumberFormat("de-DE").format(sub_total2);
    $('#total_otra').val(sub_total3);

    // Total a pagar en bs
    var sub_total_dolar1 = cant_pag_otra * dolar;
    var sub_total_dolar2 = parseFloat(sub_total_dolar1).toFixed(2);
    var sub_total_dolar3 = Intl.NumberFormat("de-DE").format(sub_total_dolar2);
    $('#cantidad_pagar_bs').val(sub_total_dolar3);

    // Restante en bolvares
    var cantidad_deu_bs =  $('#cantidad_deu').val();
    var cantidad_deu_bs1 = cantidad_deu_bs.replace('.', "");
    var cantidad_deu_bs2 = cantidad_deu_bs1.replace('.', "");
    var cantidad_deu_bs3 = cantidad_deu_bs2.replace('.', "");
    var cantidad_deu_bs4 = cantidad_deu_bs3.replace('.', "");
    var cantidad_deu_bsf = cantidad_deu_bs4.replace(',', ".");

    var total_a_deber = cant_pag_otra * dolar;
    var total_deber_bol = cantidad_deu_bsf - total_a_deber;
    var total_deber_bol2 = parseFloat(total_deber_bol).toFixed(2);
    var total_a_deb_bs = Intl.NumberFormat("de-DE").format(total_deber_bol2);
    $('#total_bs_pag').val(total_a_deb_bs);

}

function guardar_proc_pago(){
    event.preventDefault();
    swal.fire({
        title: '¿Registrar?',
        text: '¿Esta seguro de registrar el proceso de Pago?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, guardar!'
    }).then((result) => {
        if (result.value == true) {
            event.preventDefault();
            var datos = new FormData($("#guardar_proc_pag")[0]);
            var base_url =window.location.origin+'/anitacafe/index.php/Pagos/guardar_proc_pag';
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
