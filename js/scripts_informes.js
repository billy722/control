function cambiarTipoInforme(tipo_informe){

  if(tipo_informe==2){
    $("#contenedor_campo_colegio").removeClass("d-none");
    $("#select_colegio").attr("required","true");
  }else{
    $("#contenedor_campo_colegio").addClass("d-none");
    $("#select_colegio").removeAttr("required");

  }

}



function generarInformeSubvencion(){

  contenedorCargando("#contenedor_resultado_informe");
  botonCargando("#btn_generar_informe",1);

  $.ajax({
       url:"./metodos_ajax/informes/informe_subvenciones.php",
       method:"post",
       data: $("#formulario_informe_subvencion").serialize(),
       success: function(respuesta){
            // alert(respuesta);
            $("#contenedor_resultado_informe").html(respuesta);
            botonCargando("#btn_generar_informe",2);
       }
  });


}
