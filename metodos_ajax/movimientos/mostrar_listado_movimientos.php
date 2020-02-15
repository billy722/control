<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Movimiento.php';


  echo '
  <table class="table table-dark table-sm table-bordered  table-hover" style="background:black; font-size:13px;">
     <thead class="thead-dark">
        <th>NºReg</th>
        <th>Correl.</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Descripcion</th>
        <th>Colegio</th>
        <th>Sub</th>
        <th>Cuenta</th>
        <th>Monto</th>
        <th>Orden compra</th>
        <th>Estado</th>
        <th></th>
        <th></th>
     </thead>
     <tbody>';

       $Funciones = new Funciones();
       $texto_buscar = $Funciones->limpiarTexto($_REQUEST['texto_buscar']);
       $cantidad_registros = $Funciones->limpiarNumeroEntero($_REQUEST['cantidad_registros']);

       $Movimiento = new Movimiento();
       $listadoMovimiento = $Movimiento->mostrarListadoMovimientos($texto_buscar," where id_estado=1 or id_estado=2 ",$cantidad_registros);

         while($filas = $listadoMovimiento->fetch_array()){

               $fecha_ingreso = date_create($filas['fecha_ingreso']);
               $fecha_ingreso = date_format($fecha_ingreso, 'd-m-Y');

               echo '<tr>

                       <td><span id="columna_numero_certificado_'.$filas['id_movimiento'].'" >'.$filas['numero_certificado'].'</span></td>
                       <td><span class="" id="columna_sub_numero_registro_'.$filas['id_movimiento'].'" >'.$filas['sub_numero_registro'].'</span></td>

                         <span class="d-none" id="columna_id_movimiento_'.$filas['id_movimiento'].'" >'.$filas['id_movimiento'].'</span>

                       <td><span id="columna_fecha_ingreso_'.$filas['id_movimiento'].'" >'.$fecha_ingreso.'</span></td>

                       <td><span id="columna_tipo_movimiento_'.$filas['id_movimiento'].'" >'.$filas['descripcion_tipo_movimiento'].'</span></td>
                          <span class="d-none" id="columna_id_tipo_movimiento_'.$filas['id_movimiento'].'" >'.$filas['id_tipo_movimiento'].'</span>

                       <td><span id="columna_descripcion_'.$filas['id_movimiento'].'" >'.$filas['descripcion'].'</span></td>

                       <td><span id="columna_colegio_'.$filas['id_movimiento'].'" >'.$filas['nombre_colegio'].'</span></td>
                           <span class="d-none" id="columna_rbdcolegio_'.$filas['id_movimiento'].'" >'.$filas['rbd_colegio'].'</span>

                       <td><span id="columna_subvencion_'.$filas['id_movimiento'].'" >'.$filas['subvencion'].'</span></td>
                           <span class="d-none" id="columna_id_subvencion_'.$filas['id_movimiento'].'" >'.$filas['id_subvencion'].'</span>


                       <td><span id="columna_numero_cuenta_'.$filas['id_movimiento'].'" >'.$filas['numero_cuenta'].': '.$filas['nombre_cuenta'].'</span></td>
                            <span class="d-none" id="columna_id_numero_cuenta_'.$filas['id_movimiento'].'" >'.$filas['numero_cuenta'].'</span>

                       <td><span class="" id="columna_monto_'.$filas['id_movimiento'].'" >$'.number_format($filas['monto'],0,",",".").'</span></td>

                       <td><span id="columna_orden_compra_'.$filas['id_movimiento'].'" >'.$filas['orden_compra'].'</span></td>
                            <span class="d-none" id="columna_id_orden_compra_'.$filas['id_movimiento'].'" >'.$filas['orden_compra'].'</span>

                       <td><span id="columna_estado_'.$filas['id_movimiento'].'" >'.$filas['descripcion_estado'].'</span></td>
                            <span class="d-none" id="columna_estado_mov_'.$filas['id_movimiento'].'" >'.$filas['id_estado'].'</span>

                            <span class="d-none" id="columna_sep_preferente_'.$filas['id_movimiento'].'" >'.$filas['sep_preferente'].'</span>
                            <span class="d-none" id="columna_sep_preferencial_'.$filas['id_movimiento'].'" >'.$filas['sep_preferencial'].'</span>
                            <span class="d-none" id="columna_sep_concentracion_'.$filas['id_movimiento'].'" >'.$filas['sep_concentracion'].'</span>
                            <span class="d-none" id="columna_sep_articulo_19_'.$filas['id_movimiento'].'" >'.$filas['sep_articulo_19'].'</span>
                            <span class="d-none" id="columna_sep_ajustes_'.$filas['id_movimiento'].'" >'.$filas['sep_ajustes'].'</span>
                            <span class="d-none" id="columna_ord_'.$filas['id_movimiento'].'" >'.$filas['ord'].'</span>
                            <span class="d-none" id="columna_numero_decreto_'.$filas['id_movimiento'].'" >'.$filas['numero_decreto'].'</span>


                            <span class="d-none" id="columna_id_tipo_gasto_'.$filas['id_movimiento'].'" >'.$filas['tipo_gasto'].'</span>

                        <td><button onclick="imprimirRegistroMovimiento('.$filas['id_movimiento'].','.$filas['sub_numero_registro'].')" class="col-12 btn btn-info  btn-sm"> <i class="fa fa-print"></i> </button></td>
                        <td><button onclick="cargarInformacionModificarMovimientos('.$filas['id_movimiento'].')" class="col-12 btn btn-warning  btn-sm"> <i class="fa fa-edit"></i> </button></td>
                        <td><button onclick="eliminarMovimientos('.$filas['id_movimiento'].')"  class="col-12 btn btn-danger btn-sm"> <i class="fa fa-trash-alt "></i> </button></td>

                    </tr>';
         }

    echo '
     </tbody>
  </table>';

  // <a href="./modificar_empresa.php?id_empresa='.$filas['id_empresa'].'" class="btn btn-outline-primary">Editar</a>


 ?>
