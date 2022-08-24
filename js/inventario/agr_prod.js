
function modal(id_producto){
    var id_product =  id_producto;

    var base_url =window.location.origin+'/anitacafe/index.php/Inventario/consultar_producto';

    $.ajax({
       url:base_url,
       method: 'post',
       data: {id_product: id_product},
       dataType: 'json',
       success: function(data){
                $('#id_producto').val(data['id_producto']);
                $('#nomb_prod_ver').val(data['nom_producto']);
                $('#id_categoria_c').val(data['id_categoria']);
                $('#categoria').val(data['categoria']);
                $('#fecha_exp_ver').val(data['fec_exp']);
                $('#cantidad_stock_ver').val(data['cantidad_stock']);
        }
    });
}

function sumar_cant(){
    var cantidad_stock_ver = $('#cantidad_stock_ver').val();
    var cantidad_sumar = $('#cantidad_sumar').val();

    var sumar = Number(cantidad_stock_ver) + Number(cantidad_sumar);
    console.log(sumar);
    $('#total_agr').val(sumar);
}


function sumar_producto(){
    var id_producto = $('#id_producto').val();
    var cantidad_stock_ver = $('#cantidad_stock_ver').val();
    var cantidad_sumar = $('#cantidad_sumar').val();
    var total_agr = $('#total_agr').val();

    event.preventDefault();
    swal.fire({
        title: '¿Seguro que desea agregar esa cantidad al Stock de este producto?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, Editar!'
    }).then((result) => {
        if (result.value == true) {
            var base_url =window.location.origin+'/anitacafe/index.php/Inventario/agr_prod';

            $.ajax({
                url:base_url,
                method: 'post',
                data:{
                    id_producto: id_producto,
                    cantidad_stock_ver: cantidad_stock_ver,
                    total_agr:total_agr,
                    cantidad_sumar: cantidad_sumar
                },
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    if(response == true) {
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
