<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Correspondencia.php';


  echo '
  <table class="table table-responsive table-sm table-striped table-hover">
     <thead class="thead-dark">
        <th>Nº</th>
        <th>Fecha de ingreso</th>
        <th>Emisor</th>
        <th>Tipo</th>
        <th>Número de Documento</th>
        <th>Fecha de creación</th>
        <th>Descripcion general del requerimiento</th>
        <th></th>
        <th></th>
     </thead>
     <tbody>';

       $Funciones = new Funciones();
       $texto_buscar = $Funciones->limpiarTexto($_REQUEST['texto_buscar']);

       $Correspondencia = new Correspondencia();
       $listadoCorrespondencia = $Correspondencia->mostrarListadoCorrespondencia($texto_buscar);

         while($filas = $listadoCorrespondencia->fetch_array()){

               $fecha_ingreso = date_create($filas['fecha_ingreso']);
               $fecha_ingreso = date_format($fecha_ingreso, 'd-m-Y');

               $fecha_creacion = date_create($filas['fecha_creacion']);
               $fecha_creacion = date_format($fecha_creacion, 'd-m-Y');

               echo '<tr>

                       <td><span id="columna_id_correspondencia_'.$filas['id_correspondencia'].'" >'.$filas['id_correspondencia'].'</span></td>
                       <td><span id="columna_fecha_ingreso_'.$filas['id_correspondencia'].'" >'.$fecha_ingreso.'</span></td>
                       <td><span id="columna_lugar_origen_'.$filas['id_correspondencia'].'" >'.$filas['lugar_origen'].'</span></td>
                           <span class="d-none" id="columna_id_tipo_documento_'.$filas['id_correspondencia'].'" >'.$filas['id_tipo_documento'].'</span>
                       <td><span id=""_'.$filas['id_correspondencia'].' >'.$filas['descripcion_tipo'].'</span></td>
                       <td><span id="columna_numero_documento_'.$filas['id_correspondencia'].'" >'.$filas['numero_documento'].'</span></td>
                       <td><span id="columna_fecha_creacion_'.$filas['id_correspondencia'].'" >'.$fecha_creacion.'</span></td>
                       <td><span id="columna_descripcion_'.$filas['id_correspondencia'].'" >'.$filas['descripcion'].'</span></td>
                       <td>
                         <button data-target="#modal_revisar_correspondencia" data-toggle="modal" onclick="cargarInformacionModificarCorrespondencia('.$filas['id_correspondencia'].')" class="col-12 btn btn-success "> <i class="fa fa-sitemap"></i> </button>
                         <button data-target="#modal_historial_correspondencia" data-toggle="modal" onclick="cargarInformacionModificarCorrespondencia('.$filas['id_correspondencia'].')" class="col-12 btn btn-info "> <i class="fa fa-eye"></i> </button>
                       </td>
                       <td>
                         <button data-target="#modal_correspondencia" data-toggle="modal" onclick="cargarInformacionModificarCorrespondencia('.$filas['id_correspondencia'].')" class="col-12 btn btn-warning "> <i class="fa fa-edit"></i> </button>
                         <button onclick="eliminarCorrespondencia('.$filas['id_correspondencia'].')"  class="col-12 btn btn-danger "> <i class="fa fa-trash-alt"></i> </button>
                       </td>
                     </tr>';
         }

    echo '
     </tbody>
  </table>';



 ?>
