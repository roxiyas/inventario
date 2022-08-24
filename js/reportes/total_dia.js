function buscar_total() {
    var fecha = $('#datepicker-autoClose').val();
    var parametros = fecha.split("/");
    var dia = parametros['0'];
    var mes = parametros['1'];
    var anio = parametros['2'];
    var fecha_c = anio + '-' + mes + '-' + dia;

    var base_url = window.location.origin + '/anitacafe/index.php/Reportes/consultar_dia';
    $.ajax({
        url: base_url,
        method: 'post',
        data: { fecha_c: fecha_c },
        dataType: 'json',
        success: function(data) {
            $.each(data, function(index, response) {
                $('#data-table tbody').append('<tr><td>' + response['id_tipo_pago'] +
                    '</td><td>' + response['tipo_pago'] +
                    '</td><td>' + response['total_abonado_bs'] +
                    '</td><td>' + response['fecha_reg'] + '</td></tr>');
            });
        }
    });
}