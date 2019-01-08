function mostrarListadoMovimientos(texto_buscar){

		$.ajax({
			url:"./metodos_ajax/movimientos/mostrar_listado_movimientos.php?texto_buscar="+texto_buscar,
			method:"POST",
			success:function(respuesta){
				 $("#contenedor_registro_movimientos").html(respuesta);
			}
		});
}


function registrarModificarMovimiento(){


		$.ajax({
			url:"./metodos_ajax/movimientos/ingresar_modificar_movimiento.php",
			method:"POST",
      data: $("#formulario_modal_movimientos").serialize(),
			success:function(respuesta){
				 alert(respuesta);
				 console.log(respuesta);

           if(respuesta==1){
             swal("Guardado","Los datos se han guardado correctamente.","success");
             mostrarListadoMovimientos("");
           }else if(respuesta==2){
             swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
           }
			}
		});
}

function cambiaSubvencion(){

$subvencion= $("#select_subvencion").val();

 if($subvencion==3){
		//sep
    sumarCamposSep();
		$("#contenedor_campos_sep").removeClass("d-none");
 }else{
	  $("#contenedor_campos_sep").addClass("d-none");
 }
 if($subvencion==5){
	 //scvtf
	 $("#contenedor_campos_Sc-vtf").removeClass("d-none");
   sumarCamposScvtf();
 }else{
	 $("#contenedor_campos_Sc-vtf").addClass("d-none");
 }

muestraTotalesColegioSubvencion();

}



//
// const number = document.querySelector('.txt_monto');
//
// function formateaValores(n){
//  n = String(n).replace(/\D/g, "");
//  return n === '' ? n : Number(n).toLocaleString();
//
// number.addEventListener('keyup', (e) => {
//  const element = e.target;
//  const value = element.value;
//  element.value = formatNumber(value);
// });
// 	 // return numeroFormateado;
// }

function sumarCamposSep(){
	var sep_preferente=Number(document.getElementById('sep_preferente').value);
	var sep_preferencia=Number(document.getElementById('sep_preferencia').value);
	var sep_concentracion=Number(document.getElementById('sep_concentracion').value);
	var sep_articulo_19=Number(document.getElementById('sep_articulo_19').value);
	var sep_ajustes=Number(document.getElementById('sep_ajustes').value);
	var txt_monto= sep_preferente+sep_preferencia+sep_concentracion+sep_articulo_19+sep_ajustes;

	//txt_monto = formateaValores(txt_monto);

	document.getElementById('txt_monto').value=txt_monto;

}
function sumarCamposScvtf(){
	var scvtf_normal=Number(document.getElementById('scvtf_normal').value);
	var scvtf_nivelacion=Number(document.getElementById('scvtf_nivelacion').value);
	var txt_monto= scvtf_normal+scvtf_nivelacion;

	document.getElementById('txt_monto').value=txt_monto;

}

function cambiarTipoMovmiento(tipo){

 if(tipo==2){
	  $("#contenedor_tipo_gasto").removeClass("d-none");
 }else{
	  $("#contenedor_tipo_gasto").addClass("d-none");
 }

}

function muestraTotalesColegioSubvencion(){
	// Ingresos y Gastos
 colegio = $("#select_colegio").val();
 subvencion = $("#select_subvencion").val();

 if(subvencion!=null){

	 $.ajax({
			url:"./metodos_ajax/movimientos/mostrar_totales_colegios.php?colegio="+colegio+"&subvencion="+subvencion,
		 method:"POST",
		 data: $("#formulario_modal_movimientos").serialize(),
		 success:function(respuesta){
         $("#contenedor_informacion_resumen").html(respuesta);
		 }
	 });

 }
}

function limpiarModal(){
	 $("#formulario_modal_movimientos")[0].reset();
	 $("#txt_id_movimiento").val("");
}

function cargarInformacionModificarMovimientos(id){


	 var txt_fecha_ingreso = $("#columna_fecha_ingreso_"+id).html();
	 var select_tipo_movimiento = $("#columna_id_tipo_movimiento_"+id).html();
	 var select_colegio = $("#columna_rbdcolegio_"+id).html();
	 var select_subvencion = $("#columna_id_subvencion_"+id).html();
	 var select_cuenta = $("#columna_id_numero_cuenta_"+id).html();
	 var select_estado = $("#columna_estado_mov_"+id).html();
	 var txt_descripcion = $("#columna_descripcion_"+id).html();
	 var txt_orden_compra = $("#columna_id_orden_compra_"+id).html();
	 var txt_monto = $("#columna_monto_"+id).html();
	 var sep_preferente = $("#columna_sep_preferente_"+id).html();
	 var sep_preferencia = $("#columna_sep_preferencial_"+id).html();
	 var sep_concentracion = $("#columna_sep_concentracion_"+id).html();
	 var sep_articulo_19 = $("#columna_sep_articulo_19_"+id).html();
	 var sep_ajustes = $("#columna_sep_ajustes_"+id).html();
	 var sep_total = $("#sep_total"+id).html();

	 if(select_subvencion==3){
		 $("#contenedor_campos_sep").removeClass("d-none");
	 }else{
		 $("#contenedor_campos_sep").addClass("d-none");
	 }
	 if(select_subvencion==5){
		$("#contenedor_campos_Sc-vtf").removeClass("d-none");
	 }else{
		$("#contenedor_campos_Sc-vtf").addClass("d-none");
	 }

	 $("#txt_id_movimiento").val(id);


	 $("#txt_fecha_ingreso").val(txt_fecha_ingreso);
	 $("#select_tipo_movimiento").val(select_tipo_movimiento);
	 $("#select_colegio").val(select_colegio);
	 $("#select_subvencion").val(select_subvencion);
	 $("#select_cuenta").val(select_cuenta);
	 $("#select_estado").val(select_estado);
	 $("#txt_descripcion").val(txt_descripcion);
	 $("#txt_orden_compra").val(txt_orden_compra);
	 $("#txt_monto").val(txt_monto);
	 $("#sep_preferente").val(sep_preferente);
	 $("#sep_preferencia").val(sep_preferencia);
	 $("#sep_concentracion").val(sep_concentracion);
	 $("#sep_articulo_19").val(sep_articulo_19);
	 $("#sep_ajustes").val(sep_ajustes);
	 $("#sep_total").val(sep_total);

	 $('html,body').animate({
     scrollTop: $("#contenedor_formulario_movimientos").offset().top
	 }, 1200);

   muestraTotalesColegioSubvencion();
}



function eliminarMovimientos(id){

	swal({
    title: "Desea eliminar registro?",
    text: "No podrá recuperar los datos.",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "No, conservar",
    closeOnConfirm: false
  },
  function(){

			$.ajax({
				url:"./metodos_ajax/movimientos/eliminar_movimiento.php?id="+id,
				method:"POST",
				success:function(respuesta){
					 alert(respuesta);

						 if(respuesta==1){
							 swal("Guardado","Los datos se han guardado correctamente.","success");
							 mostrarListadoMovimientos("");
						 }else if(respuesta==2){
							 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
						 }
				}
			});

  });


}
