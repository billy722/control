<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Colegio.php';


$Colegio = new Colegio();
$listado_colegio = $Colegio->obtenerColegios();


    echo '
    <table class="table table-responsive table-sm table-striped table-bordered table-hover">
       <thead>
           <th>RBD</th>
           <th>Nombre</th>
           <th></th>
           <th></th>
       </thead>
       <tbody>';

          $contador = 1;
          while($filas = $listado_colegio->fetch_array()){


           echo '<tr class="">
                   <td class=""><span id="txt_rbd_'.$contador.'" >'.$filas['rbd_colegio'].'</span></td>
                   <td class=""><span id="txt_nombre_'.$contador.'" >'.$filas['nombre_colegio'].'</span></td>

                   <td class="">
                      <button onclick="cargarDatosModificar('.$contador.');" data-toggle="modal" data-target="#modal_colegio" type="button" class="btn btn-block btn-warning" name="button">Editar</button>
                   </td>
                   <td class="">
                      <button onclick="eliminarColegio('.$filas['rbd_colegio'].')" type="button" class="btn btn-block btn-danger" name="button">Eliminar</button>
                   </td>
                 </tr>';

            $contador++;

         }

       echo '</tbody>
    </table>';

 ?>
