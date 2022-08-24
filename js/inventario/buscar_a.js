function buscar_fact(){
    var nro_factura_b = $('#nro_factura_b').val();

    var base_url = window.location.origin+'/anitacafe/index.php/inventario/buscar_fact';

    $.ajax({
       url:base_url,
       method: 'post',
       data: {nro_factura_b:nro_factura_b},
       dataType: 'json',
       success: function(data){
            $('#rif').val(data['rif']);
            $('#cliente').val(data['dir_fiscal']);
       }
    });
}
