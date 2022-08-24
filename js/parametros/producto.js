$("#precio").on({
    "focus": function(event) {
        $(event.target).select();
    },
    "keyup": function(event) {
        $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});


function reg_producto() {
    var nom_producto = $('#nom_producto').val();
    var id_categoria = $('#id_categoria').val();
    var precio = $('#precio').val();
    var cantidad_stock = $('#cantidad_stock').val();

    if (nom_producto == '') {
        document.getElementById("nom_producto").focus();
    } else if (id_categoria == '0') {
        document.getElementById("id_categoria").focus();
    } else if (precio == '') {
        document.getElementById("precio").focus();
    } else if (cantidad_stock == '') {
        document.getElementById("cantidad_stock").focus();
    } else {
        event.preventDefault();
        swal.fire({
            title: '¿Registrar?',
            text: '¿Esta seguro de Registrar el Producto?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ed946e',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: '¡Si, guardar!'
        }).then((result) => {
            if (result.value == true) {
                event.preventDefault();
                var datos = new FormData($("#reg_producto")[0]);
                var base_url = window.location.origin + '/anitacafe/index.php/Parametros/reg_producto';
                $.ajax({
                    url: base_url,
                    method: 'POST',
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response == 'true') {
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

function modal(id_producto, id_categori) {
    var id_product = id_producto;
    var id_categoria = id_categori;

    var base_url = window.location.origin + '/anitacafe/index.php/Parametros/consultar_producto';

    $.ajax({
        url: base_url,
        method: 'post',
        data: {
            id_product: id_product,
            id_categoria: id_categoria
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#id_producto').val(data['id_producto']);
            $('#nomb_prod_ver').val(data['nom_producto']);
            $('#id_categoria_c').val(data['id_categoria']);
            $('#categoria').val(data['categoria']);
            $('#precio_ver').val(data['precio']);
            $('#cantidad_stock_ver').val(data['cantidad_stock']);
        }
    });

    var base_url2 = window.location.origin + '/anitacafe/index.php/Parametros/consultar_categoria_2';
    $.ajax({
        url: base_url2,
        method: 'post',
        data: { id_categoria: id_categoria },
        dataType: 'json',
        success: function(response) {

            $.each(response, function(index, data) {
                $('#id_categoria_ver').append('<option value="' + data['id_categoria'] + '">' + data['descripcion'] + '</option>');
            });
        }
    });
}

function editar_producto() {
    var id_producto = $('#id_producto').val();
    var nomb_prod_ver = $('#nomb_prod_ver').val();
    var id_categoria_c = $('#id_categoria_c').val();
    var id_categoria_ver = $('#id_categoria_ver').val();
    var cantidad_stock_ver = $('#cantidad_stock_ver').val();
    var precio = $('#precio_ver').val();

    if (id_categoria_ver == '0') {
        var id_catg = id_categoria_c;
    } else {
        var id_catg = id_categoria_ver;
    }

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
            var base_url = window.location.origin + '/anitacafe/index.php/Parametros/editar_producto';

            $.ajax({
                url: base_url,
                method: 'post',
                data: {
                    id_producto: id_producto,
                    nomb_prod_ver: nomb_prod_ver,
                    precio: precio,
                    id_catg: id_catg,
                    cantidad_stock_ver: cantidad_stock_ver
                },
                dataType: 'json',
                success: function(response) {
                    if (response == 1) {
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

function eliminar_producto(id) {
    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea eliminar el Producto?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Eliminar!'
    }).then((result) => {
        if (result.value == true) {
            var id_producto = id
            var base_url = window.location.origin + '/anitacafe/index.php/Parametros/eliminar_producto';

            $.ajax({
                url: base_url,
                method: 'post',
                data: {
                    id_producto: id_producto
                },
                dataType: 'json',
                success: function(response) {
                    if (response == 1) {
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