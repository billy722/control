mostrarListadoMovimientos("");

function mostrarListadoMovimientos(texto_buscar){

		$.ajax({
			url:"./metodos_ajax/correspondencia/mostrar_listado_correspondencia.php?texto_buscar="+texto_buscar,
			method:"POST",
			success:function(respuesta){
				 $("#contenedor_registro_movimientos").html(respuesta);
			}
		});
}

function registrarModificarDocumento(){


		$.ajax({
			url:"./metodos_ajax/correspondencia/ingresar_modificar_correspondencia.php",
			method:"POST",
      data: $("#formulario_modal_correspondencia").serialize(),
			success:function(respuesta){
				 alert(respuesta);

           if(respuesta==1){
             swal("Guardado","Los datos se han guardado correctamente.","success");
             $("#modal_correspondencia").modal('hide');
             mostrarListadoMovimientos("");
           }else if(respuesta==2){
             swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
           }
			}
		});
}

function limpiarModal(){
	 $("#formulario_modal_correspondencia")[0].reset();
	 $("#txt_id_correspondencia").val("");
	 // $("#formulario_modal_correspondencia").attr("action","javascript:registrarDocumento()");
}

function cargarInformacionModificarMovimientos(id){
	// $("#formulario_modal_correspondencia").attr("action","javascript:modificarMovimientos()");


   var fecha_ingreso = $("#columna_fecha_ingreso_"+id).html();
   var lugar_origen = $("#columna_lugar_origen_"+id).html();
   var tipo_documento = $("#columna_id_tipo_documento_"+id).html();
   var numero_documento = $("#columna_numero_documento_"+id).html();
   var fecha_creacion = $("#columna_fecha_creacion_"+id).html();
   var descripcion = $("#columna_descripcion_"+id).html();

   $("#txt_id_correspondencia").val(id);
   $("#txt_fecha_ingreso").val(fecha_ingreso);
   $("#txt_lugar_origen").val(lugar_origen);
   $("#select_tipo_documento").val(tipo_documento);
   $("#txt_numero_documento").val(numero_documento);
   $("#txt_fecha_creacion").val(fecha_creacion);
   $("#txt_descripcion_documento").val(descripcion);

}

// function modificarMovimientos(){
//
// 		$.ajax({
// 			url:"./metodos_ajax/correspondencia/ingresar_modificar_correspondencia.php",
// 			method:"POST",
//       data: $("#formulario_modal_correspondencia").serialize(),
// 			success:function(respuesta){
// 				 // alert(respuesta);
//
//            if(respuesta==1){
//              swal("Guardado","Los datos se han guardado correctamente.","success");
//              $("#modal_correspondencia").modal('hide');
//              mostrarListadoMovimientos("");
//            }else if(respuesta==2){
//              swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
//            }
// 			}
// 		});
// }

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
				url:"./metodos_ajax/correspondencia/eliminar_correspondencia.php?id="+id,
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
