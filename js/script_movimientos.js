

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
             $("#modal_movimientos").modal('hide');
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
	  $("#contenedor_campos_sep").removeClass("d-none");
 }else{
	  $("#contenedor_campos_sep").addClass("d-none");
 }
 if($subvencion==5){
	 $("#contenedor_campos_Sc-vtf").removeClass("d-none");
 }else{
	 $("#contenedor_campos_Sc-vtf").addClass("d-none");
 }

muestraTotalesColegioSubvencion();

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

	 var txt_fecha_ingreso = $("#columna_fecha_ingreso_").html();
	 var select_tipo_movimiento = $("#columna_tipo_movimiento_").html();
	 var select_colegio = $("#columna_colegio_").html();
	 var select_subvencion = $("#columna_subvencion_").html();
	 var select_cuenta = $("#columna_numero_cuenta_").html();
	 var select_estado = $("#columna_estado_").html();
	 var txt_descripcion = $("#columna_descripcion_").html();
	 var txt_orden_compra = $("#columna_orden_compra_").html();
	 var txt_monto = $("#txt_monto").html();
	 var sep_preferente = $("#sep_preferente").html();
	 var sep_preferencia = $("#sep_preferencia").html();
	 var sep_concentracion = $("#sep_concentracion").html();
	 var sep_articulo_19 = $("#sep_articulo_19").html();
	 var sep_ajustes = $("#sep_ajustes").html();
	 var sep_total = $("#sep_total").html();


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
