function mostrarFormularioInforme(tipo_informe){

if(tipo_informe==1){
  $("#contenedor_informe_subvencion").removeClass("d-none");
  $("#contenedor_informe_resumen").addClass("d-none");
}else if(tipo_informe==2){
  $("#contenedor_informe_subvencion").addClass("d-none");
  $("#contenedor_informe_resumen").removeClass("d-none");
}

}


function generarInformeSubvencion(){

  $.ajax({
       url:"./metodos_ajax/informes/informe_subvenciones_resumen.php",
       method:"post",
       data: $("#formulario_informe_subvencion_resumen").serialize(),
       success: function(respuesta){
            alert(respuesta);
            $("#contenedor_resultado_informe").html(respuesta);
       }
  });

  $.ajax({
       url:"./metodos_ajax/informes/archivo_subvenciones_excel_resumen.php",
       method:"post",
       data: $("#formulario_informe_subvencion_resumen").serialize(),
       success: function(respuesta){
            alert(respuesta);
       }
  });
}


function generarExcelInformeSubvencion(){

  window.open("./metodos_ajax/informes/archivo_subvenciones_excel_resumen.php", "Diseño Web", "width=300, height=200")

}