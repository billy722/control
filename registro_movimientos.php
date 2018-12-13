<?php

@session_start();
require_once 'comun.php';
require_once './clases/Usuario.php';
require_once './clases/TipoMovimiento.php';
require_once './clases/Subvencion.php';
require_once './clases/Colegio.php';
require_once './clases/Cuenta.php';
require_once './clases/Estado_movimiento.php';

comprobarSession();
$usuario= new Usuario();
$usuario= $usuario->obtenerUsuarioActual();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>


</style>
   <title>Registro Movimientos</title>
   <?php cargarHead(); ?>

  <script src="./js/script_movimientos.js"></script>

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
                   <button class="active btn btn-info col-12">Ver lista</button>
                     <!-- <hr> -->
                   <!-- <button  class="active btn btn-info col-12">Seguimiento</button> -->
              </div>
            </div>

        </div>

         <!-- <div class="col-12 col-md-10">

             <div id='' style="" class=" card col-12 ">

                 <div class="card-header  text-info">Buscar </div>
                 <div class="card-body">
                   <input type="text" onkeyup="mostrarListadoCorrespondencia(this.value)" class="border-info form-control" name="txt_buscar_correspondencia" value="" placeholder="Ingrese Numero de oficio, descripcion, fecha, etc.">
                 </div>

             </div>

         </div> -->
    </div>

    <div class="container-fluid">
      <hr>
    </div>

    <!--   <div class="col-12 col-md-12">

           <div id='' style="" class="  col-12 ">

               <div class="card-header  text-info">Registro de movimientos</div>
               <div class="card-body">
                  <h5 class="card-title">Titulo</h5>
                 <p class="card-text">texto prueba</p> -->
                 <!-- <div class="row" id="contenedor_registro_movimientos">

                 </div>

               </div>

           </div> -->

       </div>

  </div>

</div>


<!-- MODAL INGRESAR CORRESPONDENCIA-->
<div class="container">
<div class="card">
  <h5 class="card-header">Nuevo Movimientos</h5>
  <div class="card-body">

      <form id="formulario_modal_movimientos" class="" action="javascript:registrarModificarMovimiento()" method="post">


             <div class="form-group  border-info" >

                  <input type="hidden" name="txt_id_movimiento" id="txt_id_movimiento">

                  <div class="row">

                      <div class="form-group col-4" >
                             <label for="title" class="col-12 control-label">Fecha de ingreso</label>
                             <input value="<?php echo date('d-m-Y'); ?>" class="form-control" type="text" id="txt_fecha_ingreso" name="txt_fecha_ingreso" min="2018-01-01"  readonly placeholder="Dia/Mes/Año" >
                      </div>

                      <div class="form-group col-md-4" >

                          <label for="title" class="col-12 control-label">Tipo movimiento</label>
                          <select required class="form-control" name="select_tipo_movimiento" id="select_tipo_movimiento">
                            <option value="" selected disabled>Seleccione:</option>
                            <?php
                                $TipoMovimiento = new TipoMovimiento();
                                $listaTiposMovimientos = $TipoMovimiento->obtenerTiposMovimientos();

                                while($filas = $listaTiposMovimientos->fetch_array()){
                                   echo '<option value="'.$filas['id_tipo_movimiento'].'">'.$filas['descripcion_tipo_movimiento'].'</option>';
                                }
                             ?>
                          </select>

                      </div>

                      <div class="form-group col-md-4" >

                          <label for="title" class="col-12 control-label">Colegio</label>
                          <select required class="form-control" name="select_colegio" id="select_colegio">
                            <option value="" selected disabled>Seleccione:</option>
                            <?php
                                $Colegio = new Colegio();
                                $listaColegios = $Colegio->obtenerColegios();

                                while($filas = $listaColegios->fetch_array()){
                                    echo '<option value="'.$filas['rbd_colegio'].'">'.$filas['rbd_colegio'].': '.$filas['nombre_colegio'].'</option>';
                                }
                              ?>
                          </select>

                      </div>

                  </div>

                  <div class="row">

                      <div class="form-group col-md-4" >

                          <label for="title" class="col-12 control-label">Subvencion</label>
                          <select required onChange="cambiaSubvencion(this.value)" class="form-control" name="select_subvencion" id="select_subvencion">
                            <option value="" selected disabled>Seleccione:</option>
                            <?php
                                $Subvencion = new Subvencion();
                                $listaSubvenciones = $Subvencion->obtenerSubvencion();

                                while($filas = $listaSubvenciones->fetch_array()){
                                    echo '<option value="'.$filas['id_subvencion'].'">'.$filas['subvencion'].'</option>';
                                }
                              ?>
                          </select>

                      </div>

                      <div class="form-group col-md-4" >
                          <label for="title" class="col-12 control-label">Cuenta Presupuesto</label>
                          <select required class="form-control" name="select_cuenta" id="select_cuenta">
                            <option value="" selected disabled>Seleccione:</option>
                            <?php
                                $Cuenta = new Cuenta();
                                $listaCuentas = $Cuenta->obtenerCuentas();

                                while($filas = $listaCuentas->fetch_array()){
                                   echo '<option value="'.$filas['numero_cuenta'].'">'.$filas['numero_cuenta'].': '.$filas['nombre_cuenta'].'</option>';
                                }
                             ?>
                          </select>
                      </div>

                      <div class="form-group col-md-4" >
                          <label for="title" class="col-12 control-label">Orden de compra</label>
                          <input type="text" class="form-control" name="txt_orden_compra" placeholder="Orden de compra">
                      </div>

                  </div>

                  <div class="row">

                    <div class="form-group col-md-12" >
                        <label for="title" class="col-12 control-label">Descripción</label>
                        <textarea name="txt_descripcion" id="txt_descripcion" class="form-control " rows="2"></textarea>
                    </div>

                  </div>


                  <!-- CONTENEDOR DE CAMPOS A MOSTRAR CUANDO LA SUBVENCION ES SEP -->
                  <div id="contenedor_campos_sep" class="card bg-light mb-12 d-none" >
                    <div class="card-header">
                       <h5 class="card-title">Campos SEP</h5>
                    </div>
                    <div class="card-body bg-white">

                       <div class="row" >
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Preferente</label>
                              <input type="text" class="form-control" name="sep_preferente" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Preferencia</label>
                              <input type="text" class="form-control" name="sep_preferencia" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Concentracion</label>
                              <input type="text" class="form-control" name="sep_concentracion" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Articulo 19</label>
                              <input type="text" class="form-control" name="sep_articulo_19" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Ajustes</label>
                              <input type="text" class="form-control" name="sep_ajustes" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Total</label>
                              <input type="text" class="form-control" name="sep_total" placeholder="$">
                          </div>
                      </div>

                    </div>
                  </div>

                  <!-- CONTENEDOR DE CAMPOS A MOSTRAR CUANDO LA SUBVENCION ES Sc-vtf -->
                  <div id="contenedor_campos_Sc-vtf" class="card bg-light mb-12 d-none" >
                    <div class="card-header">
                       <h5 class="card-title">Campos Sc-vtf</h5>
                    </div>
                    <div class="card-body bg-white">

                       <div class="row" >
                          <div class="form-group col-md-6" >
                              <label for="title" class="col-12 control-label">Subvencion Normal:</label>
                              <input type="text" class="form-control" name="scvtf_normal" placeholder="$">
                          </div>
                          <div class="form-group col-md-6" >
                              <label for="title" class="col-12 control-label">Subvencion de Nivelacion:</label>
                              <input type="text" class="form-control" name="scvtf_nivelacion" placeholder="$">
                          </div>

                      </div>

                    </div>
                  </div>


                  <div class="row">

                    <div class="form-group col-md-4" >
                        <label for="title" class="col-12 control-label">Monto</label>
                        <input type="text" class="form-control-lg" name="txt_monto" placeholder="Ingrese Monto">
                    </div>

                  </div>


                  <div class="row">

                    <div id="contenedor_selector_estado" class="form-group col-md-12" >
                        <label for="title" class="col-12 control-label">Estado</label>
                        <select class="form-control" name="select_estado" id="select_estado">
                          <option value="" selected disabled>Seleccione:</option>
                            <?php
                                $Estado = new Estado_movimiento();
                                $Estado->setTabla("tb_estado_movimiento");
                                $listaEstados = $Estado->obtenerEstados();

                                while($filas = $listaEstados->fetch_array()){
                                   echo '<option value="'.$filas['id_estado'].'">'.$filas['descripcion_estado'].'</option>';
                                }
                             ?>
                        </select>
                    </div>

                  </div>


            </div>


                <div class="col-12">
                  <button class="btn btn-info btn-block" type="submit" name="button">Guardar</button>
                </div>
            </form>
</div>
</div>
</div>

<div class="container">
  <br>
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

      <form id="formulario_modal_movimientos" class="" action="javascript:registrarModificarDocumento()" method="post">



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

      <form id="formulario_modal_movimientos" class="" action="javascript:registrarModificarDocumento()" method="post">

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


<!-- MODAL INGRESAR CORRESPONDENCIA-->
<!-- <div class="modal fade" id="modal_movimientos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

    <div class="modal-header bg-info">
      <h5 class="modal-title text-white"  id="myModalLabel">Ingreso Movimiento</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">

      <form id="formulario_modal_movimientos" class="" action="javascript:registrarModificarMovimiento()" method="post">


             <div class="form-group  border-info" >

                  <input type="hidden" name="txt_id_movimiento" id="txt_id_movimiento">

                  <div class="row">

                      <div class="form-group col-4" >
                             <label for="title" class="col-12 control-label">Fecha de ingreso</label>
                             <input value="<?php //echo date('d-m-Y'); ?>" class="form-control" type="text" id="txt_fecha_ingreso" name="txt_fecha_ingreso" min="2018-01-01"  readonly placeholder="Dia/Mes/Año" >
                      </div>

                      <div class="form-group col-md-4" >

                          <label for="title" class="col-12 control-label">Tipo movimiento</label>
                          <select required class="form-control" name="select_tipo_movimiento" id="select_tipo_movimiento">
                            <option value="" selected disabled>Seleccione:</option>
                            <?php
                                // $TipoMovimiento = new TipoMovimiento();
                                // $listaTiposMovimientos = $TipoMovimiento->obtenerTiposMovimientos();
                                //
                                // while($filas = $listaTiposMovimientos->fetch_array()){
                                //    echo '<option value="'.$filas['id_tipo_movimiento'].'">'.$filas['descripcion_tipo_movimiento'].'</option>';
                                // }
                             ?>
                          </select>

                      </div>

                      <div class="form-group col-md-4" >

                          <label for="title" class="col-12 control-label">Colegio</label>
                          <select required class="form-control" name="select_colegio" id="select_colegio">
                            <option value="" selected disabled>Seleccione:</option>
                            <?php
                                // $Colegio = new Colegio();
                                // $listaColegios = $Colegio->obtenerColegios();
                                //
                                // while($filas = $listaColegios->fetch_array()){
                                //     echo '<option value="'.$filas['rbd_colegio'].'">'.$filas['rbd_colegio'].': '.$filas['nombre_colegio'].'</option>';
                                // }
                              ?>
                          </select>

                      </div>

                  </div>

                  <div class="row">

                      <div class="form-group col-md-4" >

                          <label for="title" class="col-12 control-label">Subvencion</label>
                          <select required onChange="cambiaSubvencion(this.value)" class="form-control" name="select_subvencion" id="select_subvencion">
                            <option value="" selected disabled>Seleccione:</option>
                            <?php
                                // $Subvencion = new Subvencion();
                                // $listaSubvenciones = $Subvencion->obtenerSubvencion();
                                //
                                // while($filas = $listaSubvenciones->fetch_array()){
                                //     echo '<option value="'.$filas['id_subvencion'].'">'.$filas['subvencion'].'</option>';
                                // }
                              ?>
                          </select>

                      </div>

                      <div class="form-group col-md-4" >
                          <label for="title" class="col-12 control-label">Cuenta Presupuesto</label>
                          <select required class="form-control" name="select_cuenta" id="select_cuenta">
                            <option value="" selected disabled>Seleccione:</option>
                            <?php
                                // $Cuenta = new Cuenta();
                                // $listaCuentas = $Cuenta->obtenerCuentas();
                                //
                                // while($filas = $listaCuentas->fetch_array()){
                                //    echo '<option value="'.$filas['numero_cuenta'].'">'.$filas['numero_cuenta'].': '.$filas['nombre_cuenta'].'</option>';
                                // }
                             ?>
                          </select>
                      </div>

                      <div class="form-group col-md-4" >
                          <label for="title" class="col-12 control-label">Orden de compra</label>
                          <input type="text" class="form-control" name="txt_orden_compra" placeholder="Orden de compra">
                      </div>

                  </div>

                  <div class="row">

                    <div class="form-group col-md-12" >
                        <label for="title" class="col-12 control-label">Descripción</label>
                        <textarea name="txt_descripcion" id="txt_descripcion" class="form-control " rows="2"></textarea>
                    </div>

                  </div>


                  <!-- CONTENEDOR DE CAMPOS A MOSTRAR CUANDO LA SUBVENCION ES SEP -->
                  <!-- <div id="contenedor_campos_sep" class="card bg-light mb-12 d-none" >
                    <div class="card-header">
                       <h5 class="card-title">Campos SEP</h5>
                    </div>
                    <div class="card-body bg-white">

                       <div class="row" >
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Preferente</label>
                              <input type="text" class="form-control" name="sep_preferente" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Preferencia</label>
                              <input type="text" class="form-control" name="sep_preferencia" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Concentracion</label>
                              <input type="text" class="form-control" name="sep_concentracion" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Articulo 19</label>
                              <input type="text" class="form-control" name="sep_articulo_19" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Ajustes</label>
                              <input type="text" class="form-control" name="sep_ajustes" placeholder="$">
                          </div>
                          <div class="form-group col-md-4" >
                              <label for="title" class="col-12 control-label">Total</label>
                              <input type="text" class="form-control" name="sep_total" placeholder="$">
                          </div>
                      </div>

                    </div>
                  </div> -->

                  <!-- CONTENEDOR DE CAMPOS A MOSTRAR CUANDO LA SUBVENCION ES Sc-vtf -->
                  <!-- <div id="contenedor_campos_Sc-vtf" class="card bg-light mb-12 d-none" >
                    <div class="card-header">
                       <h5 class="card-title">Campos Sc-vtf</h5>
                    </div>
                    <div class="card-body bg-white">

                       <div class="row" >
                          <div class="form-group col-md-6" >
                              <label for="title" class="col-12 control-label">Subvencion Normal:</label>
                              <input type="text" class="form-control" name="scvtf_normal" placeholder="$">
                          </div>
                          <div class="form-group col-md-6" >
                              <label for="title" class="col-12 control-label">Subvencion de Nivelacion:</label>
                              <input type="text" class="form-control" name="scvtf_nivelacion" placeholder="$">
                          </div>

                      </div>

                    </div>
                  </div>


                  <div class="row">

                    <div class="form-group col-md-4" >
                        <label for="title" class="col-12 control-label">Monto</label>
                        <input type="text" class="form-control-lg" name="txt_monto" placeholder="Ingrese Monto">
                    </div>

                  </div>


                  <div class="row">

                    <div id="contenedor_selector_estado" class="form-group col-md-12" >
                        <label for="title" class="col-12 control-label">Estado</label>
                        <select class="form-control" name="select_estado" id="select_estado">
                          <option value="" selected disabled>Seleccione:</option>
                            <?php
                                // $Estado = new Estado();
                                // $Estado->setTabla("tb_estado_movimiento");
                                // $listaEstados = $Estado->obtenerEstados();
                                //
                                // while($filas = $listaEstados->fetch_array()){
                                //    echo '<option value="'.$filas['id_estado'].'">'.$filas['descripcion_estado'].'</option>';
                                // }
                             ?>
                        </select>
                    </div>

                  </div>

            </div>


              <div class="form-group" >
                <div class="col-12">
                  <button class="btn btn-info btn-block" type="submit" name="button">Guardar</button>
                </div>
              </div>


      </form>

    </div>


  </div>
  </div>
</div> -->
