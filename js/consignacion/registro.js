// REGISTRAR
function cargar_inf_cliente() {
    var id_tip_doc = $("#id_tip_doc").val();
    var rif = $("#rif").val();

    var base_url =
        window.location.origin + "/anitacafe/index.php/Consignacion/cargar_info";

    $.ajax({
        url: base_url,
        method: "post",
        data: { id_tip_doc: id_tip_doc, rif: rif },
        dataType: "json",
        success: function(data) {
            if (data != null) {
                $("#reg").hide();
                $("#si").show();

                $("#id_cliente").val(data["id_cliente"]);
                $("#nom_razon_social_ver").val(data["nom_razon_social"]);
                $("#nro_telefono_ver").val(data["nro_telefono"]);
                $("#direccion").val(data["dir_fiscal"]);
                $("#si_existe").val("SI");

                $("#responsable").attr("disabled", true);
                $("#direccion").attr("disabled", true);
                $("#estado").attr("disabled", true);
                $("#ciudad").attr("disabled", true);
            } else {
                $("#reg").show();
                $("#si").hide();
                $("#existe").val("NO");
            }
        },
    });
}
$(document).ready(function() {
    //para consultar y crear el numero de nota de entrega
    var base_url =
        window.location.origin + "/anitacafe/index.php/Consignacion/cons_nro";
    $.ajax({
        url: base_url,
        method: "post",
        dataType: "json",

        success: function(response) {
            if (response === null) {
                numero = "1";
            } else {
                numero_c = response["nro_factura"];
                numero = Number(numero_c) + 1;
            }

            function zeroFill(number, width) {
                width -= number.toString().length;
                if (width > 0) {
                    return (
                        new Array(width + (/\./.test(number) ? 2 : 1)).join("0") + number
                    );
                }
                return number + ""; // siempre devuelve tipo cadena
            }
            $("#nro_factura").val(zeroFill(numero, 5));
        },
    });

    var id_tipo_pago = $("#id_tipo_pago").val();
    if (id_tipo_pago == "1") {
        $("#id_estatus").val("4");
    }

    $("#id_cliente").change(function() {
        var id_cliente = $(this).val();
        console.log(id_cliente);
        var base_url =
            window.location.origin + "/anitacafe/index.php/Consignacion/cargar_info";
        $.ajax({
            url: base_url,
            method: "post",
            data: { id_cliente: id_cliente },
            dataType: "json",

            success: function(data) {
                $("#id_cliente").val(data["id_cliente"]);
                $("#rif").val(data["rif"]);
                $("#direccion").val(data["dir_fiscal"]);
                $("#cliente").val(data["nom_razon_social"]);
                $("#nro_telefono").val(data["nro_telefono"]);
                $("#estado").val(data["descedo"]);
                $("#ciudad").val(data["descciu"]);
            },
        });
    });
});

function cargar_inf_prod() {
    var id_producto = $("#id_producto").val();
    var id_prod = id_producto.split("/")[0];
    var producto = id_producto.split("/")[1];

    var base_url =
        window.location.origin + "/anitacafe/index.php/Consignacion/listar_prodc";

    $.ajax({
        url: base_url,
        method: "post",
        data: { id_prod: id_prod },
        dataType: "json",
        success: function(data) {
            console.log(data);
            $("#id_categoria").val(data["id_categoria"]);
            $("#categoria").val(data["categoria"]);
            $("#precio").val(data["precio"]);
            $("#cantidad_stock").val(data["cantidad_stock"]);
            $("#fec_exp").val(data["fec_exp"]);
        },
    });
}

function cargar_moneda() {
    var id_moneda = $("#id_moneda").val();
    // console.log(id_cliente);
    var base_url =
        window.location.origin + "/anitacafe/index.php/Consignacion/listar_mond";

    $.ajax({
        url: base_url,
        method: "post",
        data: { id_moneda: id_moneda },
        dataType: "json",
        success: function(data) {
            $("#valor").val(data["valor"]);
        },
    });
}

$("#monto").on({
    focus: function(event) {
        $(event.target).select();
    },
    keyup: function(event) {
        $(event.target).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, "$1,$2")
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    },
});

$("#monto_om").on({
    focus: function(event) {
        $(event.target).select();
    },
    keyup: function(event) {
        $(event.target).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, "$1,$2")
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    },
});

$("#precio").on({
    focus: function(event) {
        $(event.target).select();
    },
    keyup: function(event) {
        $(event.target).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, "$1,$2")
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    },
});

$("#iva").on({
    focus: function(event) {
        $(event.target).select();
    },
    keyup: function(event) {
        $(event.target).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, "$1,$2")
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    },
});

function verf_cantd() {
    var cantidad_stock = $("#cantidad_stock").val();
    var cantidad = $("#cantidad").val();

    var x = Number(cantidad);
    var y = Number(cantidad_stock);

    if (x > y) {
        swal({
            title: "¡ATENCION!",
            text: "La cantidad solicitada no puede ser mayor a la cantidad en stock.",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#00897b",
            confirmButtonText: "CONTINUAR",
            closeOnConfirm: false,
        });
        $("#precio").attr("disabled", true);
        $("#btn_ag").attr("disabled", true);
    } else {
        $("#precio").attr("disabled", false);
        $("#btn_ag").attr("disabled", false);
    }
}

function calcular_sub() {
    var cantidad = $("#cantidad").val();
    var precio = $("#precio").val();

    var newstr = precio.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var precio2 = newstr4.replace(",", ".");

    var sub_total = precio2 * cantidad;
    var sub_total2 = parseFloat(sub_total).toFixed(2);
    var sub_total3 = Intl.NumberFormat("de-DE").format(sub_total2);
    $("#sub_total").val(sub_total3);
}

function cargar_total() {
    var sub_total_2 = $("#sub_total_2").val();
    var iva = $("#iva").val();

    var newstr = sub_total_2.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var sub_total_3 = newstr4.replace(",", ".");

    var newstr = iva.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var iva_2 = newstr4.replace(",", ".");

    var total_iva = (Number(sub_total_3) * Number(iva_2)) / 100;
    var total = Number(sub_total_3) + Number(total_iva);
    var total2 = parseFloat(total).toFixed(2);
    var total3 = Intl.NumberFormat("de-DE").format(total2);
    $("#total").val(total3);
    $("#restante_bs").val(total3);
}

function cargar_total_mod() {
    var valor = $("#valor").val();
    var total = $("#total").val();

    var newstr = valor.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var valor_2 = newstr4.replace(",", ".");

    var newstr = total.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var total2 = newstr4.replace(",", ".");

    var total_mon = total2 / valor_2;
    var total_mon2 = parseFloat(total_mon).toFixed(2);
    var total_mon3 = Intl.NumberFormat("de-DE").format(total_mon2);

    $("#total_mon").val(total_mon3);
    $("#restante_om").val(total_mon3);
}

//VALIDAR
function compr_cant() {
    var nro_factura = $("#nro_factura").val();
    var cantidad = $("#cantidad").val();
    var id_producto = $("#id_producto").val();
    var id_prod = id_producto.split("/")[0];
    var cantidad_stock = $("#cantidad_stock").val();

    if ((nro_factura = "")) {
        document.getElementById("nro_factura").focus();
    } else if ((cantidad = "")) {
        document.getElementById("cantidad").focus();
    } else if ((id_prod = "")) {
        document.getElementById("id_producto").focus();
    } else if ((cantidad_stock = 0)) {
        document.getElementById("cantidad_stock").focus();
    } else {
        var nro_factura1 = $("#nro_factura").val();
        var cantidad1 = $("#cantidad").val();
        var id_producto1 = $("#id_producto").val();
        var id_prod1 = id_producto.split("/")[0];
        var cantidad_stock1 = $("#cantidad_stock").val();

        var base_url =
            window.location.origin +
            "/anitacafe/index.php/Consignacion/comprometer_cant";
        $.ajax({
            url: base_url,
            method: "post",
            data: {
                nro_factura: nro_factura1,
                cantidad: cantidad1,
                id_prod: id_prod1,
                cantidad_stock: cantidad_stock1,
            },
            dataType: "json",
            success: function(response) {
                console.log("llego");
            },
        });
    }
}

function llenar_pago() {
    var tipo_pago = $("#id_tipo_pago").val();
    if (tipo_pago == "2" || tipo_pago == "3") {
        $("#nro_referencia").attr("readonly", false);
        $("#monto").attr("readonly", false);
        $("#monto_om").attr("readonly", false);
        $("#banco").attr("readonly", false);
    } else {
        $("#nro_referencia").attr("readonly", true);
        $("#monto").attr("readonly", false);
        $("#monto_om").attr("readonly", false);
        $("#banco").attr("readonly", true);
    }
}

function restar_m() {
    var monto = $("#monto").val();
    var total = $("#total").val();

    var newstr = monto.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var monto_1 = newstr4.replace(",", ".");

    var newstr = total.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var total_2 = newstr4.replace(",", ".");

    var total_restante = Number(total_2) - Number(monto_1);
    var total2 = parseFloat(total_restante).toFixed(2);
    var total3 = Intl.NumberFormat("de-DE").format(total2);
    $("#restante_bs").val(total3);

    var id_tipo_pago = $("#id_tipo_pago").val();
    if (id_tipo_pago == "1") {
        $("#id_estatus").val("4");
    } else {
        if (total2 == "0.00") {
            $("#id_estatus").val("9");
        } else {
            $("#id_estatus").val("8");
        }
    }

    var valor = $("#valor").val();
    var total_mon = $("#total_mon").val();

    var newstr = valor.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var valor_1 = newstr4.replace(",", ".");

    var newstr = total_mon.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var total_mon1 = newstr4.replace(",", ".");

    var total_restante_om = Number(monto_1) / Number(valor_1);
    var total4 = parseFloat(total_restante_om).toFixed(2);
    var total5 = Intl.NumberFormat("de-DE").format(total4);
    $("#monto_om").val(total5);

    var total_restante = Number(total_mon1) - Number(total_restante_om);
    var total4 = parseFloat(total_restante).toFixed(2);
    var total5 = Intl.NumberFormat("de-DE").format(total4);
    $("#restante_om").val(total5);
}

function restar_om() {
    var monto_om = $("#monto_om").val();
    var valor = $("#valor").val();
    var total_mon = $("#total_mon").val();

    var newstr = monto_om.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var monto_1 = newstr4.replace(",", ".");

    var newstr = total_mon.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var valor_1 = newstr4.replace(",", ".");

    var total_restante_om = Number(monto_1) - Number(valor_1);
    var total2 = parseFloat(total_restante_om).toFixed(2);
    var total3 = Intl.NumberFormat("de-DE").format(total2);
    $("#restante_om").val(total3);

    var newstr = valor.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var valor_2 = newstr4.replace(",", ".");

    var monto_bs = Number(monto_1) * Number(valor_2);
    var total2 = parseFloat(monto_bs).toFixed(2);
    var total3 = Intl.NumberFormat("de-DE").format(total2);
    $("#monto").val(total3);

    var total = $("#total").val();
    var newstr = total.replace(".", "");
    var newstr2 = newstr.replace(".", "");
    var newstr3 = newstr2.replace(".", "");
    var newstr4 = newstr3.replace(".", "");
    var total_5 = newstr4.replace(",", ".");

    var total_restante_bs = Number(total_5) - Number(monto_bs);
    var total2 = parseFloat(total_restante_bs).toFixed(2);
    var total3 = Intl.NumberFormat("de-DE").format(total2);
    $("#restante_bs").val(total3);
}

function reg_factura() {
    var fec_registro = $("#fec_registro").val();
    var nro_factura = $("#nro_factura").val();
    var id_cliente = $("#id_cliente").val();
    var sub_total_2 = $("#sub_total_2").val();
    var iva = $("#iva").val();
    var id_moneda = $("#id_moneda").val();
    var total_mon = $("#total_mon").val();
    var total = $("#total").val();

    if (fec_registro == "") {
        document.getElementById("fec_registro").focus();
    } else if (nro_factura == "") {
        document.getElementById("nro_factura").focus();
    } else if (id_cliente == "0") {
        document.getElementById("id_cliente").focus();
    } else if (sub_total_2 === "") {
        document.getElementById("sub_total_2").focus();
    } else if (iva == "") {
        document.getElementById("iva").focus();
    } else if (id_moneda == "0") {
        document.getElementById("id_moneda").focus();
    } else if (total_mon == "" || total_mon == "NaN") {
        document.getElementById("total_mon").focus();
    } else if (total == "" || total == "NaN") {
        document.getElementById("total").focus();
    } else {
        event.preventDefault();
        swal
            .fire({
                title: "¿Registrar?",
                text: "¿Esta seguro de Registrar la consignación?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "¡Si, guardar!",
            })
            .then((result) => {
                if (result.value == true) {
                    event.preventDefault();
                    var datos = new FormData($("#reg_producto")[0]);
                    var base_url =
                        window.location.origin +
                        "/anitacafe/index.php/Consignacion/reg_factura";
                    $.ajax({
                        url: base_url,
                        method: "POST",
                        data: datos,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response == "true") {
                                swal
                                    .fire({
                                        title: "Registro Exitoso",
                                        type: "success",
                                        showCancelButton: false,
                                        confirmButtonColor: "#3085d6",
                                        confirmButtonText: "Ok",
                                    })
                                    .then((result) => {
                                        if (result.value == true) {
                                            location.reload();
                                        }
                                    });
                            }
                        },
                    });
                }
            });
    }
}

// EDITAR

// ELIMINAR
function eliminar_factura(id_fact) {
    event.preventDefault();
    swal
        .fire({
            title: "¿Seguro que desea eliminar el registro?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, Eliminar!",
        })
        .then((result) => {
            if (result.value == true) {
                var id_factura = id_fact;

                var base_url =
                    window.location.origin +
                    "/anitacafe/index.php/Consignacion/eliminar_factura";

                $.ajax({
                    url: base_url,
                    method: "post",
                    data: {
                        id_factura: id_factura,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == 1) {
                            swal
                                .fire({
                                    title: "Eliminación Exitosa",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "Ok",
                                })
                                .then((result) => {
                                    if (result.value == true) {
                                        location.reload();
                                    }
                                });
                        }
                    },
                });
            }
        });
}

// PROCESAR FACTURAS - APROBAR
function aprobar_factura(id_fact) {
    event.preventDefault();
    swal
        .fire({
            title: "¿Seguro que desea aprobar la factura selecionada?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, Aprobar!",
        })
        .then((result) => {
            if (result.value == true) {
                var id_factura = id_fact;

                var base_url =
                    window.location.origin +
                    "/anitacafe/index.php/Consignacion/aprobar_factura";

                $.ajax({
                    url: base_url,
                    method: "post",
                    data: {
                        id_factura: id_factura,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == 1) {
                            swal
                                .fire({
                                    title: "Proceso Exitoso",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "Ok",
                                })
                                .then((result) => {
                                    if (result.value == true) {
                                        location.reload();
                                    }
                                });
                        }
                    },
                });
            }
        });
}

// Anular
function anular_factura(id_fact) {
    event.preventDefault();
    swal
        .fire({
            title: "¿Seguro que desea anular la factura selecionada?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "¡Si, Anular!",
        })
        .then((result) => {
            if (result.value == true) {
                var id_factura = id_fact;

                var base_url =
                    window.location.origin +
                    "/anitacafe/index.php/Consignacion/anular_factura";

                $.ajax({
                    url: base_url,
                    method: "post",
                    data: {
                        id_factura: id_factura,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == 1) {
                            swal
                                .fire({
                                    title: "Proceso Exitoso",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "Ok",
                                })
                                .then((result) => {
                                    if (result.value == true) {
                                        location.reload();
                                    }
                                });
                        }
                    },
                });
            }
        });
}