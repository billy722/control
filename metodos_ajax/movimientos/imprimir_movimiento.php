<?php
require_once '../../clases/Conexion.php';

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
              width: 200px;
              height: 100px;
              float:left;

           }
          #contenedor_texto{
              width: auto;
              height: 100px;
              float:left;
           }
          #contenedor_datos_orden{
              width: 50%;
              float:left;
           }
          #contenedor_clientes{
              width: 50%;
              float:left;
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
            width: 200px;
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
              width: auto;
              height: 100px;
              float:right;
           }
           #contenedor_clientes{
               width: 50%;
               float:left;
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
    <label class="texto" for=""><strong>José Manuel Infante Poduje</strong></label>
    <label class="texto" for="">R.U.T: 7.816.171-K</label>
    <label class="texto" for="">Taller Electromecánico</label>
    <label class="texto" for="">Nueva Rancagua: N°0125</label>
    <label class="texto" for="">Fono: 713558 ANGOL</label>
  </div>

  <div id="contenedor_datos_orden">
    <label class="texto" for=""><strong>Órden de Trabajo</strong></label>
    <!-- <label class="texto" for=""><strong>N° <?php //echo $id_orden; ?></strong></label> -->
  </div>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div id="contenedor_clientes">

</div>

<div id="contenedor_vehiculo">

</div>

<br>
<br>

<div id="contenedor_detalle_orden">
</div>

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
