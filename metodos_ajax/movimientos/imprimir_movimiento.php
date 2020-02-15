<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Usuario.php';
$usuario= new Usuario();
$usuario= $usuario->obtenerUsuarioActual();


$numero_registro = $_REQUEST['id'];
$sub_numero = $_REQUEST['sub_id'];

$conexion = new Conexion();
$conexion = $conexion->conectar();

$consulta = "select * from vista_movimientos where id_movimiento=".$numero_registro." and sub_numero_registro=".$sub_numero;
// echo $consulta;

$resultado_consulta = $conexion->query($consulta);
$resultado_consulta = $resultado_consulta->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Orden de Trabajo</title>


    <style>
        @media print {
          @page {
            margin: 0;
          }
          body {
            margin: 2cm;
          }

          #logo{
              width: 100px;
              height: 100px;
              float:left;
           }
          #contenedor_texto{
              width: auto;
              height: 100px;
              float:left;
           }
          #contenedor_datos_orden{

           }
          #contenedor_clientes{
           }
          #contenedor_vehiculo{
              width: auto;
              height: 100px;
              float:left;
           }
          #contenedor_detalle_orden{
              width: 100%;
              float:left;
           }
          #tabla_detalle_orden{
              width: 100%;
              border-collapse: collapse;
           }
           .texto{
             display: block;
           }
           .texto_codigo{
             font-size: 20px;
           }
           .texto_parrafo{
             font-size: 20px;
           }
           .contenedor_tabla{
             display: block;
           }
           #tabla_informe{
             width: 100%;
            border-collapse: collapse;
           }
           #tabla_resumen_detalle{
            border-collapse: collapse;
            float: right;
           }
           #tabla_cliente{
            border-collapse: collapse;
            float: right;
           }
           #tabla_patente{
            border-collapse: collapse;
            float: right;
            border-left-style: none;
            border-left-width: 0;
           }


        }

        #logo{
            width: 100px;
            height: 100px;
            float:left;

         }
         #contenedor_texto{
           margin-top: 20px;
             width: auto;
             height: 100px;
             float:left;
          }
          #contenedor_datos_orden{

           }
           #contenedor_clientes{
            }
           #contenedor_vehiculo{
               width: 50%;
               float:left;
            }
           #contenedor_detalle_orden{
              margin-top:40px;
               width: 100%;
               float:left;
            }
          .texto{
            display: block;
          }
          .texto_codigo{
            font-size: 20px;
          }
          .texto_parrafo{
            font-size: 20px;
          }
          .contenedor_tabla{
            display: block;
          }
          #tabla_informe{
            width: 100%;
            border-collapse: collapse;
          }

    </style>
</head>
<body>
  <img id="logo" src="../../img/logo_daem.png" alt="">

  <div id="contenedor_texto">

  </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <div id="contenedor_datos_orden">
    <center>
      <label class="texto" for=""><strong>CERTIFICADO DISPONIBILIDAD PRESUPUESTARIA</strong></label>
    </center>

    <br>

    <center>
      <label class="texto_codigo" for=""><strong>Nº <?php echo $numero_registro." - ".$sub_numero; ?></strong></label>
    </center>
  </div>



<br>
<br>

<div id="">
      <center>
          <p class="texto_parrafo">En conformidad al presupuesto aprobado para el sector Educación, año 2020,
            mediante el Decreto Nº 5.636 del 26 de Diciembre de 2019, certifico que a
            la fecha del presente documento, ésta institución cuenta
            con el presupuesto para el financiamiento de los bienes y/o servicios indicados
            en las órdenes de compra que a continuación se detallan.</p>
      </center>
</div>

<br>
<br>

<?php

$fecha_ingreso = date_create($filas['fecha_ingreso']);
$fecha_ingreso = date_format($fecha_ingreso, 'd-m-Y');

 ?>

<div id="">
    <table border="1" style="width:100% " >
      <thead>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Cuenta</th>
        <th>Descripcion</th>
        <th>Colegio</th>
      </thead>
      <tbody>
        <tr>
          <td> <?php echo $fecha_ingreso; ?> </td>
          <td> <?php echo $resultado_consulta['descripcion_tipo_movimiento']; ?> </td>
          <td> <?php echo $resultado_consulta['numero_cuenta']; ?> </td>
          <td> <?php echo $resultado_consulta['descripcion']; ?> </td>
          <td> <?php echo $resultado_consulta['nombre_colegio']; ?></td>
        </tr>
      </tbody>
    </table>
</div>

</br>
</br>

<div id="">
    <table border="1" style="width:100% " >
      <thead>
        <th>Subvencion</th>
        <th>Orden de compra</th>
        <th>ORD</th>
        <th>Nº Decreto</th>
        <th>Monto</th>
      </thead>
      <tbody>
        <tr>
          <td> <?php echo $resultado_consulta['subvencion']; ?> </td>
          <td> <?php echo $resultado_consulta['orden_compra']; ?> </td>
          <td> <?php echo $resultado_consulta['ord']; ?> </td>
          <td> <?php echo $resultado_consulta['numero_decreto']; ?> </td>
          <td> <?php echo '$'.number_format($resultado_consulta['monto'],0,",",".") ?></td>
        </tr>
      </tbody>
    </table>
</div>



<br>
<br>

<center>
  <p>______________________________</p>
  <p><?php echo $usuario['nombre']; ?></p>
</center>

</body>
<script type="text/javascript" src="../../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript">

function printHTML() {
  if (window.print) {
    window.print();
  }
}

printHTML();

</script>
</html>
