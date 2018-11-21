<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Movimiento.php';


  echo '
  <table class="table table-responsive table-sm table-striped table-hover">
     <thead class="thead-dark">
        <th></th>
        <th></th>
        <th>Nº</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Descripcion</th>
        <th>Colegio</th>
        <th>Subvencion</th>
        <th>Cuenta</th>
        <th>OC</th>
        <th>N° Certificado</th>
        <th>Estado</th>
     </thead>
     <tbody>';

       $Funciones = new Funciones();
       $texto_buscar = $Funciones->limpiarTexto($_REQUEST['texto_buscar']);

       $Movimiento = new Movimiento();
       $listadoMovimiento = $Movimiento->mostrarListadoMovimientos($texto_buscar);

         while($filas = $listadoMovimiento->fetch_array()){

               $fecha_ingreso = date_create($filas['fecha_ingreso']);
               $fecha_ingreso = date_format($fecha_ingreso, 'd-m-Y');

               echo '<tr>

               <td>
                     <button data-target="#modal_correspondencia" data-toggle="modal" onclick="cargarInformacionModificarCorrespondencia('.$filas['id_movimiento'].')" class="col-12 btn btn-warning "> <i class="fa fa-edit"></i> </button>
               </td>
               <td>
                     <button onclick="eliminarCorrespondencia('.$filas['id_movimiento'].')"  class="col-12 btn btn-danger "> <i class="fa fa-trash-alt"></i> </button>
               </td>
                       <td><span id="columna_id_correspondencia_'.$filas['id_movimiento'].'" >'.$filas['id_movimiento'].'</span></td>
                       <td><span id="columna_fecha_ingreso_'.$filas['id_movimiento'].'" >'.$fecha_ingreso.'</span></td>
                       <td><span id="columna_tipo_movimiento_'.$filas['id_movimiento'].'" >'.$filas['descripcion_tipo_movimiento'].'</span></td>
                       <td><span id="columna_descripcion_'.$filas['id_movimiento'].'" >'.$filas['descripcion'].'</span></td>
                       <td><span id="columna_colegio_'.$filas['id_movimiento'].'" >'.$filas['rbd_colegio'].': '.$filas['nombre_colegio'].'</span></td>
                       <td><span id="columna_subvencion_'.$filas['id_movimiento'].'" >'.$filas['subvencion'].'</span></td>
                       <td><span id="columna_numero_cuenta_'.$filas['id_movimiento'].'" >'.$filas['numero_cuenta'].': '.$filas['nombre_cuenta'].'</span></td>
                       <td><span id="columna_orden_compra_'.$filas['id_movimiento'].'" >'.$filas['orden_compra'].'</span></td>
                       <td><span id="columna_numero_certificado_'.$filas['id_movimiento'].'" >'.$filas['numero_certificado'].'</span></td>
                       <td><span id="columna_estado_'.$filas['id_movimiento'].'" >'.$filas['descripcion_estado'].'</span></td>


                     </tr>';
         }

    echo '
     </tbody>
  </table>';



 ?>
