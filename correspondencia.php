<?php

@session_start();
require_once 'comun.php';
require_once './clases/Departamento.php';
require_once './clases/TipoDocumento.php';
require_once './clases/Usuario.php';
comprobarSession();
$usuario= new Usuario();
$usuario= $usuario->obtenerUsuarioActual();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>


</style>
   <title>Correspondencia</title>
   <?php cargarHead(); ?>

  <script src="./js/script_correspondencia.js"></script>

  <script>
      $(document).ready(function(){

        var date_input=$('input[name="txt_fecha_ingreso"]'); //our date input has the name "date"
        var options={
          format: 'dd-mm-yyyy',
          todayHighlight: true,
          autoclose: true,
          language: 'es',
        };
        date_input.datepicker(options);

      })
      $(document).ready(function(){

        var date_input=$('input[name="txt_fecha_creacion"]'); //our date input has the name "date"
        var options={
          format: 'dd-mm-yyyy',
          todayHighlight: true,
          autoclose: true,
          language: 'es',
        };
        date_input.datepicker(options);

      })
  </script>

</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>



<div class="container-fluid">
  <div class="row">

   <div class="row col-12">

        <div class="col-12 col-md-2">

            <div class="card text-dark ">
              <div class="card-header ">
                  <center>OPCIONES</center>
              </div>
              <div class="card-body">
                   <button onclick="limpiarModal()" data-toggle="modal" data-target="#modal_correspondencia" class="active btn btn-info col-12">Recepción</button>
                     <!-- <hr> -->
                   <!-- <button  class="active btn btn-info col-12">Seguimiento</button> -->
              </div>
            </div>

        </div>

         <div class="col-12 col-md-10">

             <div id='' style="" class=" card col-12 ">

                 <div class="card-header  text-info">Buscar correspondencia</div>
                 <div class="card-body">
                   <input type="text" onkeyup="mostrarListadoCorrespondencia(this.value)" class="border-info form-control" name="txt_buscar_correspondencia" value="" placeholder="Ingrese Numero de oficio, descripcion, fecha, etc.">
                 </div>

             </div>

         </div>
    </div>

    <div class="container-fluid">
      <hr>
    </div>

       <div class="col-12 col-md-12">

           <div id='' style="" class="  col-12 ">

               <div class="card-header  text-info">Registro de correspondencia</div>
               <div class="card-body">
                 <!-- <h5 class="card-title">Titulo</h5>
                 <p class="card-text">texto prueba</p> -->
                 <div class="row" id="contenedor_listado_correspondencia">

                 </div>

               </div>

           </div>

       </div>

  </div>

</div>


<!-- MODAL INGRESAR CORRESPONDENCIA-->
<div class="modal fade" id="modal_correspondencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="myModalLabel">Recepción de correspondencia</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">

      <form id="formulario_modal_correspondencia" class="" action="javascript:registrarModificarDocumento()" method="post">


             <div class="form-group  border-info" >

                  <input type="hidden" name="txt_id_correspondencia" id="txt_id_correspondencia">

                  <div class="row">

                      <div class="form-group col-6" >
                             <label for="title" class="col-12 control-label">Fecha de ingreso</label>
                             <input value="<?php echo date('d-m-Y'); ?>" class="form-control" type="text" id="txt_fecha_ingreso" name="txt_fecha_ingreso" min="2018-01-01"  readonly placeholder="Dia/Mes/Año" >
                      </div>
                      <div class="form-group col-6" >
                          <label for="title" class="col-12 control-label">Fecha de creación</label>
                          <input required value="<?php echo date('d-m-Y'); ?>" class="form-control" type="text" id="txt_fecha_creacion" name="txt_fecha_creacion" min="2018-01-01"  readonly placeholder="Dia/Mes/Año" >
                      </div>
                  </div>

                  <div class="row">

                      <div class="form-group col-6" >

                          <label for="title" class="col-12 control-label">Tipo de documento</label>
                          <select required class="form-control" name="select_tipo_documento" id="select_tipo_documento">
                            <?php
                                $TipoDocumento = new TipoDocumento();
                                $listaTipos = $TipoDocumento->obtenerTiposDocumento();

                                while($filas = $listaTipos->fetch_array()){
                                   echo '<option value="'.$filas['id_tipo_correspondencia'].'">'.$filas['descripcion_tipo'].'</option>';
                                }

                             ?>
                          </select>

                      </div>

                      <div class="form-group col-6" >
                          <label for="title" class="col-12 control-label">Número documento</label>
                          <input type="text" class="form-control" name="txt_numero_documento" id="txt_numero_documento">
                      </div>

                  </div>


                  <div class="form-group col-12" >
                         <label for="title" class="col-12 control-label">Establecimiento o lugar de origen</label>
                         <input type="text" onkeypress="return soloLetras(event);" required class="form-control" name="txt_lugar_origen" id="txt_lugar_origen" value="">
                  </div>

                  <div class="form-group col-12" >
                      <label for="title" class="col-12 control-label">Descripción general</label>
                      <textarea required class="form-control" name="txt_descripcion_documento" id="txt_descripcion_documento" rows="6" ></textarea>
                  </div>
                  <!-- <div class="form-group col-12" >
                      <label for="title" class="col-12 control-label">Imagen</label>
                      <input type="file" capture="camera" name="" value="">
                  </div>
                  <div class="form-group col-12" >

                      <video style="width:300px;" id="video"></video>

                  </div> -->

            </div>



            <div class="form-group card border-info" >
                <div class="form-group col-12" >
                        <center><label for="title" class="col-12 control-label">DERIVACIÓN</label></center>

                        <div class="">
                           <?php
                              $Departamentos = new Departamento();
                              $listaDepartamentos = $Departamentos->obtenerDepartamentos();

                              while($filas = $listaDepartamentos->fetch_array()){
                                  echo '<input type="checkbox" id="chb_departamento_'.$filas['id_departamento'].'" name="chb_selector_derivaciones[]" value="'.$filas['id_departamento'].'">
                                        <label for="chb_departamento_'.$filas['id_departamento'].'">'.$filas['nombre_departamento'].'</label>
                                        <br/>';
                              }

                            ?>

                        </div>
                </div>
            </div>


              <div class="form-group" >
                <div class="col-12">
                  <button class="btn btn-success btn-block" type="submit" name="button">Guardar</button>
                </div>
              </div>


      </form>

    </div>


  </div>
  </div>
</div>


<!-- MODAL REVISAR CORRESPONDENCIA-->
<div class="modal fade" id="modal_revisar_correspondencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="myModalLabel">Revisar correspondencia</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">

      <form id="formulario_modal_correspondencia" class="" action="javascript:registrarModificarDocumento()" method="post">



                    <div class="form-group card border-info" >
                        <div class="form-group col-12" >
                                <center><label for="title" class="col-12 control-label">DECISIÓN</label></center>

                                <div class="">
                                    <input type="checkbox" id="" name="chb_selector_derivaciones[]" value="">
                                    <label for="">ESTUDIAR Y PROPONER</label>
                                    <br/>
                                    <input type="checkbox" id="" name="chb_selector_derivaciones[]" value="">
                                    <label for="">SU CONOCIMIENTO</label>
                                    <br/>
                                    <input type="checkbox" id="" name="chb_selector_derivaciones[]" value="">
                                    <label for="">DAR CUMPLIMIENTO</label>
                                    <br/>
                                    <input type="checkbox" id="" name="chb_selector_derivaciones[]" value="">
                                    <label for="">INFORME AL RESPECTO</label>
                                    <br/>
                                    <input type="checkbox" id="" name="chb_selector_derivaciones[]" value="">
                                    <label for="">PROPONER OFICIO</label>
                                    <br/>
                                    <input type="checkbox" id="" name="chb_selector_derivaciones[]" value="">
                                    <label for="">ARCHIVO</label>

                                </div>
                        </div>
                    </div>

            <div class="form-group card border-info" >
                <div class="form-group col-12" >
                        <center><label for="title" class="col-12 control-label">DERIVACIÓN</label></center>

                        <div class="">
                           <?php
                              $Departamentos = new Departamento();
                              $listaDepartamentos = $Departamentos->obtenerDepartamentos();

                              while($filas = $listaDepartamentos->fetch_array()){
                                  echo '<input type="checkbox" id="chb_departamento_'.$filas['id_departamento'].'" name="chb_selector_derivaciones[]" value="'.$filas['id_departamento'].'">
                                        <label for="chb_departamento_'.$filas['id_departamento'].'">'.$filas['nombre_departamento'].'</label>
                                        <br/>';
                              }

                            ?>

                        </div>
                </div>
            </div>

              <div class="form-group" >
                <div class="col-12">
                  <button class="btn btn-success btn-block" type="submit" name="button">Guardar</button>
                </div>
              </div>


      </form>

    </div>


  </div>
  </div>
</div>


<!-- MODAL HISTORIAL CORRESPONDENCIA-->
<div class="modal fade" id="modal_historial_correspondencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="myModalLabel">Historial correspondencia</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">

      <form id="formulario_modal_correspondencia" class="" action="javascript:registrarModificarDocumento()" method="post">

            <div class="form-group card border-info" >
                <div class="form-group col-12" >
                        <center><label for="title" class="col-12 control-label">HISTORIAL</label></center>

                </div>
            </div>

              <div class="form-group" >
                <div class="col-12">
                  <button class="btn btn-success btn-block" type="submit" name="button">Guardar</button>
                </div>
              </div>


      </form>

    </div>


  </div>
  </div>
</div>

</body>
</html>
