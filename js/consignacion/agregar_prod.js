
function agregar_prod(button) {
	var row = button.parentNode.parentNode;
  	var cells = row.querySelectorAll('td:not(:last-of-type)');
  	agregar_prodToCartTable(cells);
}


function remove_ff_acc() {

	var row = this.parentNode.parentNode;
	var y =  document.querySelector('#tab_prod tbody').removeChild(row);

	//Se captura el Sub-Total de la fila seleccionada
	var sub_total_restar = row.getElementsByTagName("td")[3].children[0].value;

	//Se tranforma el valor para operacions
	var newstr = sub_total_restar.replace('.', "");
	var newstr2 = newstr.replace('.', "");
	var newstr3 = newstr2.replace('.', "");
	var newstr4 = newstr3.replace('.', "");
	var sub_restar = newstr4.replace(',', ".");

	var total = $('#sub_total_2').val();
	var newstr = total.replace('.', "");
	var newstr5 = newstr.replace('.', "");
	var newstr6 = newstr5.replace('.', "");
	var newstr7 = newstr6.replace('.', "");
	var total_2 = newstr7.replace(',', ".");

	// Operación para recalculo del campo de Sub-total de la factura
	var n_total = total_2 - sub_restar
	var total_f_2 = parseFloat(n_total).toFixed(2);
	var total_f = Intl.NumberFormat("de-DE").format(total_f_2);
	$('#sub_total_2').val(total_f);

	// Operación para recalculo del campo de Total en bs de la factura
	var iva = $('#iva').val();
	var newstr = iva.replace('.', "");
    var newstr2 = newstr.replace('.', "");
    var newstr3 = newstr2.replace('.', "");
    var newstr4 = newstr3.replace('.', "");
    var iva_2 = newstr4.replace(',', ".");

    var total_iva = Number(n_total) * Number(iva_2) / 100;
    var total = Number(n_total) + Number(total_iva)
    var total2 = parseFloat(total).toFixed(2);
    var total3 = Intl.NumberFormat("de-DE").format(total2);
    $('#total').val(total3);

	// Operación para el calculo de total otra moneda
	var valor = $('#valor').val();
    var total = $('#total').val();

    var newstr = valor.replace('.', "");
    var newstr2 = newstr.replace('.', "");
    var newstr3 = newstr2.replace('.', "");
    var newstr4 = newstr3.replace('.', "");
    var valor_2 = newstr4.replace(',', ".");

    var newstr = total.replace('.', "");
    var newstr2 = newstr.replace('.', "");
    var newstr3 = newstr2.replace('.', "");
    var newstr4 = newstr3.replace('.', "");
    var total2 = newstr4.replace(',', ".");

    var total_mon = total2 / valor_2;
    var total_mon2 = parseFloat(total_mon).toFixed(2);
    var total_mon3 = Intl.NumberFormat("de-DE").format(total_mon2);

    $('#total_mon').val(total_mon3);

}

function agregar_prodToCartTable(cells){
	var nro_factura = $("#nro_factura").val();
	var id_producto = $("#id_producto").val();
	var id_prod = id_producto.split("/")[0];
   	var producto = id_producto.split("/")[1];

	var cantidad  = $("#cantidad").val();
	var precio    = $("#precio").val();
	var sub_total = $("#sub_total").val();

	var newstr = sub_total.replace('.', "");
    var newstr2 = newstr.replace('.', "");
    var newstr3 = newstr2.replace('.', "");
    var newstr4 = newstr3.replace('.', "");
    var sub_total_2 = newstr4.replace(',', ".");


	if (nro_factura == '' || id_producto == 0 || cantidad == '' || precio == ''|| sub_total == ''){
		if (nro_factura == '') {
			document.getElementById("nro_factura").focus();
		}else if (id_producto == 0) {
			document.getElementById("id_producto").focus();
		}else if (cantidad == '') {
			document.getElementById("cantidad").focus();
		}else if (precio == '') {
			document.getElementById("precio").focus();
		}else if (sub_total == '') {
			document.getElementById("sub_total").focus();
		}
	}else{
		var newRow = document.createElement('tr');
		var increment = increment +1;
		newRow.className='myTr';
		newRow.innerHTML = `
		<td>${producto}<input type="text" name="id_producto[]" id="ins-type-${increment}" hidden value="${id_prod}"></td>
		<td>${cantidad}<input type="text" name="cantidad[]" id="ins-type-${increment}" hidden value="${cantidad}"></td>
		<td>${precio}<input type="text" name="precio[]" id="ins-type-${increment}" hidden value="${precio}"></td>

		<td id="pfdfdf">${sub_total}<input type="text" name="sub_total[]"  id="sub_total[]" hidden value="${sub_total}"></td>
		`;

		var cellremove_ff_accBtn = createCell();

		cellremove_ff_accBtn.appendChild(createremove_ff_accBtn())
		newRow.appendChild(cellremove_ff_accBtn);

		document.querySelector('#tab_prod tbody').appendChild(newRow);
		//
		var total = $('#sub_total_2').val();
		var newstr = total.replace('.', "");
	    var newstr2 = newstr.replace('.', "");
	    var newstr3 = newstr2.replace('.', "");
	    var newstr4 = newstr3.replace('.', "");
	    var total_2 = newstr4.replace(',', ".");

		var total_f_1 = Number(total_2) + Number(sub_total_2);
		var total_f_2 = parseFloat(total_f_1).toFixed(2);
	    var total_f = Intl.NumberFormat("de-DE").format(total_f_2);
		$('#sub_total_2').val(total_f);

		// var par = $("#id_presentacion").val('');
		var par = $("#presentacion").val('');
		var par = $("#peso").val('');
		var par = $("#sabor").val('');
		var par = $("#fec_exp").val('');
		//	var par = $("#cantidad_stock").val('');
		// $("#id_producto").val($("#id_producto").data("default-value"));
		// var par = $("#cantidad").val('0');
		// var par = $("#precio").val('0');
		// var par = $("#sub_total").val('0');
	}
}

function createremove_ff_accBtn() {
    var btnremove_ff_acc = document.createElement('button');
    btnremove_ff_acc.className = 'btn btn-xs btn-danger';
    btnremove_ff_acc.onclick = remove_ff_acc;
    btnremove_ff_acc.innerText = 'Descartar';
    return btnremove_ff_acc;
}

function createCell(text) {
	var td = document.createElement('td');
  if(text) {
  	td.innerText = text;
  }
  return td;
}
