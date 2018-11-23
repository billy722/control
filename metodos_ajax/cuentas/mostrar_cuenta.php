<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Cuenta.php';


$Cuenta = new Cuenta();
$listado_cuenta = $Cuenta->obtenerCuentas();


    echo '
    <table class="table table-responsive table-sm table-striped table-bordered table-hover">
       <thead>
           <th>Numero</th>
           <th>Nombre</th>
           <th></th>
           <th></th>
       </thead>
       <tbody>';

          $contador = 1;
          while($filas = $listado_cuenta->fetch_array()){


           echo '<tr class="">
                   <td class=""><span id="txt_numero_'.$contador.'" >'.$filas['numero_cuenta'].'</span></td>
                   <td class=""><span id="txt_nombre_'.$contador.'" >'.$filas['nombre_cuenta'].'</span></td>

                   <td class="">
                      <button onclick="cargarDatosModificar('.$contador.');" data-toggle="modal" data-target="#modal_cuenta" type="button" class="btn btn-block btn-warning" name="button">Editar</button>
                   </td>
                   <td class="">
                      <button onclick="eliminarCuenta(\''.$filas['numero_cuenta'].'\')" type="button" class="btn btn-block btn-danger" name="button">Eliminar</button>
                   </td>
                 </tr>';

            $contador++;

         }

       echo '</tbody>
    </table>';

 ?>
