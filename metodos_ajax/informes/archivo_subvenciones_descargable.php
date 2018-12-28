<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Movimiento.php';



$anio = $_REQUEST['txt_anio'];
$subvencion = $_REQUEST['select_subvencion'];
$tipo_informe = $_REQUEST['select_tipo_informe'];
$colegio = $_REQUEST['select_colegio'];

echo '
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html" charset="Windows-1252">

	<title>Document</title>

<style>
';
require "../../css/bootstrap.min.css";

echo '
table{
   width: 100%;
   border: 1px solid #000;
}
      td {
      width: 25%;
      text-align: center;
      vertical-align: top;
      border: 1px solid #000;
      }
      th{
         background: cyan;
      }

      .imagen_logo{
        background-image: url(http://www.librosweb.es/website/css/images/logo.gif);
        background-repeat: no-repeat;
      }
      .gastos{
      background: #A4A4A4;
      color: #F2F2F2;
      }
      .titulo {
        text-align: center;
      }
      .muni {
        text-align: left;
      }
      .logo {
        text-align: right;
      }


</style>

</head>
<body>
';


if($subvencion==5){
  echo'
  <style>
  .thScvtf{
      background:yellow;
  }
  </style>
  ';

}if($subvencion==6){
  echo'
  <style>
  .th{
      background:blue;
  }
  </style>
  ';
}if($subvencion==7){
  echo'
  <style>
  th{
      background:green;
  }
  </style>
  ';
}

//nombres
$lista_meses = array(
1 => "Enero",
2 => "Febrero",
3 => "Marzo",
4 => "Abril",
5 => "Mayo",
6 => "Junio",
7 => "Julio",
8 => "Agosto",
9 => "Septiembre",
10 => "Octubre",
11 => "Noviembre",
12 => "Diciembre");


//valores
$enero = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );//primero
$febrero = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$marzo = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$abril = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$mayo = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$junio = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$julio = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$agosto = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$septiembre = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$octubre = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$noviembre = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );
$diciembre = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0", "sep_preferente" => "0", "sep_preferencial" => "0", "sep_concentracion" => "0", "sep_articulo_19" => "0", "sep_ajustes" => "0" );

$total = array("total_mes"=> "0", "total_scvtf_normal" => "0", "total_scvtf_nivelacion" => "0", "total_sep_preferente" => "0", "total_sep_preferencial" => "0", "total_sep_concentracion" => "0", "total_sep_articulo_19" => "0", "total_sep_ajustes" => "0" );//segundo


if($tipo_informe==2){

    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

if($resultado_consulta = $Conexion->query("call procedimiento_informe(".$anio.",1,".$subvencion.",".$colegio.")")){

      while($filas= $resultado_consulta->fetch_array()){

           switch ($filas['mes']) {
             case '1':

                       $enero['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $enero['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $enero['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $enero['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $enero['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $enero['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $enero['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $enero['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '2':
                       $febrero['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $febrero['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $febrero['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $febrero['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.');
                       $febrero['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.');
                       $febrero['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.');
                       $febrero['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.');
                       $febrero['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.');
                       //TOTALES
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '3': $marzo['mes']=number_format($filas['monto'],0,',','.');
                      //SCVTF
                       $marzo['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $marzo['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $marzo['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $marzo['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $marzo['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $marzo['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $marzo['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];

                       $total['total_mes'] += $filas['monto'];
               break;
             case '4':
                       $abril['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $abril['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $abril['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $abril['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $abril['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $abril['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $abril['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $abril['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '5':
                       $mayo['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $mayo['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $mayo['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $mayo['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $mayo['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $mayo['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $mayo['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $mayo['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '6':
                       $junio['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $junio['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $junio['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $junio['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $junio['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $junio['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $junio['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $junio['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '7':
                       $julio['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $julio['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $julio['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $julio['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $julio['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $julio['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $julio['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $julio['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '8':
                       $agosto['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $agosto['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $agosto['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $agosto['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $agosto['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $agosto['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $agosto['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $agosto['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '9':
                       $septiembre['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $septiembre['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $septiembre['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $septiembre['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $septiembre['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $septiembre['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $septiembre['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $septiembre['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '10':
                       $octubre['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $octubre['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $octubre['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $octubre['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $octubre['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $octubre['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $octubre['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $octubre['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '11':
                       $noviembre['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $noviembre['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $noviembre['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $noviembre['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $noviembre['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $noviembre['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $noviembre['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $noviembre['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;
             case '12':
                       $diciembre['mes']=number_format($filas['monto'],0,',','.');
                       //PARA SCVTF
                       $diciembre['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $diciembre['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       //TOTAL SCVTF
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
                       //PARA SEP
                       $diciembre['sep_preferente'] = number_format($filas['sep_preferente'],0,',','.'); //tercero
                       $diciembre['sep_preferencial'] = number_format($filas['sep_preferencial'],0,',','.'); //tercero
                       $diciembre['sep_concentracion'] = number_format($filas['sep_concentracion'],0,',','.'); //tercero
                       $diciembre['sep_articulo_19'] = number_format($filas['sep_articulo_19'],0,',','.'); //tercero
                       $diciembre['sep_ajustes'] = number_format($filas['sep_ajustes'],0,',','.'); //tercero
                       //TOTALES SEP
                       $total['total_sep_preferente'] += $filas['sep_preferente'];
                       $total['total_sep_preferencial'] += $filas['sep_preferencial'];
                       $total['total_sep_concentracion'] += $filas['sep_concentracion'];
                       $total['total_sep_articulo_19'] += $filas['sep_articulo_19'];
                       $total['total_sep_ajustes'] += $filas['sep_ajustes'];
                       //TOTAL FINAL
                       $total['total_mes'] += $filas['monto'];
               break;

           }
      }

     // echo '
     // <script>
     // function generar_informe_descargable(){
     //   window.open("./metodos_ajax/informes/archivo_subvenciones_descargable.php?txt_anio='.$anio.'&select_subvencion='.$subvencion.'&select_colegio='.$colegio.'", "Diseño Web", "width=500, height=100")
     // }
     // </script>
		 //
     // ';
		 //
     //  echo '
     //     <div class="container">
     //         <button onclick="generar_informe_descargable()" class="btn btn-danger">DESCARGAR INFORME</button>
     //     </div>
     //  ';



      // echo '
      //   <table>
      //     <tr>
      //       <td>SUBVENCION '.$nombre_subvencion.' '.$anio.' '.$nombre_colegio.'</td>
      //     </tr>
      //   </table>
      // ';

      echo '
        <table class="table table-bordered table_striped">

        <thead>
          <th>MES</th>';

              //cuando subvencion es sc-vtf
              if($subvencion==3){
                echo '<th>Preferente</th>';
                echo '<th>Preferencial</th>';
                echo '<th>Concentracion</th>';
                echo '<th>Articulo 19</th>';
                echo '<th>Ajustes</th>';
              }else if($subvencion==5){
                echo '<th>Subv. Normal</th>';
                echo '<th>Subv. Nivelación</th>';
              }

        echo '<th>Monto</th>';


    echo '
       </thead>
        <tbody>';

       //CALCULA SALDO ANIO ANTERIOR

       $Movimiento_totales = new Movimiento();
       $Movimiento_totales->setColegio($colegio);
       $Movimiento_totales->setSubvencion($subvencion);
       $anio_anterior = ($anio-1);

       $resultado = $Movimiento_totales->mostrarTotalesColegio($anio_anterior);
       $filas = $resultado->fetch_array();

       echo '
           <tr>
             <td><strong>Saldo año '.$anio_anterior.'</strong></td>
             <td>'.number_format($filas['total_saldo'], "0", ",", ".").'</td>
           </tr>
       ';



      echo '
           <tr>
              <td>Enero</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$enero['sep_preferente'].'</td>';
                echo '<td>'.$enero['sep_preferencial'].'</td>';
                echo '<td>'.$enero['sep_concentracion'].'</td>';
                echo '<td>'.$enero['sep_articulo_19'].'</td>';
                echo '<td>'.$enero['sep_ajustes'].'</td>';

                echo '<td>'.($enero['sep_preferente']+$enero['sep_preferencial']+$enero['sep_concentracion']+$enero['sep_articulo_19']+$enero['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$enero['scvtf_normal'].'</td>';
                echo '<td>'.$enero['scvtf_nivelacion'].'</td>';
                echo '<td>'.($enero['scvtf_normal']+$enero['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$enero['mes'].'</td>';
              }

      echo '</tr>
           <tr>
              <td>Febrero</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$febrero['sep_preferente'].'</td>';
                echo '<td>'.$febrero['sep_preferencial'].'</td>';
                echo '<td>'.$febrero['sep_concentracion'].'</td>';
                echo '<td>'.$febrero['sep_articulo_19'].'</td>';
                echo '<td>'.$febrero['sep_ajustes'].'</td>';

                echo '<td>'.($febrero['sep_preferente']+$febrero['sep_preferencial']+$febrero['sep_concentracion']+$febrero['sep_articulo_19']+$febrero['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$febrero['scvtf_normal'].'</td>';
                echo '<td>'.$febrero['scvtf_nivelacion'].'</td>';
                echo '<td>'.($febrero['scvtf_normal']+$febrero['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$febrero['mes'].'</td>';
              }

      echo '</tr>
           <tr>
              <td>Marzo</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$marzo['sep_preferente'].'</td>';
                echo '<td>'.$marzo['sep_preferencial'].'</td>';
                echo '<td>'.$marzo['sep_concentracion'].'</td>';
                echo '<td>'.$marzo['sep_articulo_19'].'</td>';
                echo '<td>'.$marzo['sep_ajustes'].'</td>';

                echo '<td>'.($marzo['sep_preferente']+$marzo['sep_preferencial']+$marzo['sep_concentracion']+$marzo['sep_articulo_19']+$marzo['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$marzo['scvtf_normal'].'</td>';
                echo '<td>'.$marzo['scvtf_nivelacion'].'</td>';
                echo '<td>'.($marzo['scvtf_normal']+$marzo['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$marzo['mes'].'</td>';
              }

      echo '</tr>
           <tr>
              <td>Abril</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$abril['sep_preferente'].'</td>';
                echo '<td>'.$abril['sep_preferencial'].'</td>';
                echo '<td>'.$abril['sep_concentracion'].'</td>';
                echo '<td>'.$abril['sep_articulo_19'].'</td>';
                echo '<td>'.$abril['sep_ajustes'].'</td>';

                echo '<td>'.($abril['sep_preferente']+$abril['sep_preferencial']+$abril['sep_concentracion']+$abril['sep_articulo_19']+$abril['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$abril['scvtf_normal'].'</td>';
                echo '<td>'.$abril['scvtf_nivelacion'].'</td>';
                echo '<td>'.($abril['scvtf_normal']+$febrero['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$abril['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Mayo</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$mayo['sep_preferente'].'</td>';
                echo '<td>'.$mayo['sep_preferencial'].'</td>';
                echo '<td>'.$mayo['sep_concentracion'].'</td>';
                echo '<td>'.$mayo['sep_articulo_19'].'</td>';
                echo '<td>'.$mayo['sep_ajustes'].'</td>';

                echo '<td>'.($mayo['sep_preferente']+$mayo['sep_preferencial']+$mayo['sep_concentracion']+$mayo['sep_articulo_19']+$mayo['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$mayo['scvtf_normal'].'</td>';
                echo '<td>'.$mayo['scvtf_nivelacion'].'</td>';
                echo '<td>'.($mayo['scvtf_normal']+$mayo['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$mayo['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Junio</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$junio['sep_preferente'].'</td>';
                echo '<td>'.$junio['sep_preferencial'].'</td>';
                echo '<td>'.$junio['sep_concentracion'].'</td>';
                echo '<td>'.$junio['sep_articulo_19'].'</td>';
                echo '<td>'.$junio['sep_ajustes'].'</td>';

                echo '<td>'.($junio['sep_preferente']+$junio['sep_preferencial']+$junio['sep_concentracion']+$junio['sep_articulo_19']+$junio['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$junio['scvtf_normal'].'</td>';
                echo '<td>'.$junio['scvtf_nivelacion'].'</td>';
                echo '<td>'.($junio['scvtf_normal']+$junio['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$junio['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Julio</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$julio['sep_preferente'].'</td>';
                echo '<td>'.$julio['sep_preferencial'].'</td>';
                echo '<td>'.$julio['sep_concentracion'].'</td>';
                echo '<td>'.$julio['sep_articulo_19'].'</td>';
                echo '<td>'.$julio['sep_ajustes'].'</td>';

                echo '<td>'.($julio['sep_preferente']+$julio['sep_preferencial']+$julio['sep_concentracion']+$julio['sep_articulo_19']+$julio['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$julio['scvtf_normal'].'</td>';
                echo '<td>'.$julio['scvtf_nivelacion'].'</td>';
                echo '<td>'.($julio['scvtf_normal']+$julio['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$julio['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Agosto</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$agosto['sep_preferente'].'</td>';
                echo '<td>'.$agosto['sep_preferencial'].'</td>';
                echo '<td>'.$agosto['sep_concentracion'].'</td>';
                echo '<td>'.$agosto['sep_articulo_19'].'</td>';
                echo '<td>'.$agosto['sep_ajustes'].'</td>';

                echo '<td>'.($agosto['sep_preferente']+$agosto['sep_preferencial']+$agosto['sep_concentracion']+$agosto['sep_articulo_19']+$agosto['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$agosto['scvtf_normal'].'</td>';
                echo '<td>'.$agosto['scvtf_nivelacion'].'</td>';
                echo '<td>'.($agosto['scvtf_normal']+$agosto['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$agosto['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Septiembre</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$septiembre['sep_preferente'].'</td>';
                echo '<td>'.$septiembre['sep_preferencial'].'</td>';
                echo '<td>'.$septiembre['sep_concentracion'].'</td>';
                echo '<td>'.$septiembre['sep_articulo_19'].'</td>';
                echo '<td>'.$septiembre['sep_ajustes'].'</td>';

                echo '<td>'.($septiembre['sep_preferente']+$septiembre['sep_preferencial']+$septiembre['sep_concentracion']+$septiembre['sep_articulo_19']+$septiembre['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$septiembre['scvtf_normal'].'</td>';
                echo '<td>'.$septiembre['scvtf_nivelacion'].'</td>';
                echo '<td>'.($septiembre['scvtf_normal']+$septiembre['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$septiembre['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Octubre</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$octubre['sep_preferente'].'</td>';
                echo '<td>'.$octubre['sep_preferencial'].'</td>';
                echo '<td>'.$octubre['sep_concentracion'].'</td>';
                echo '<td>'.$octubre['sep_articulo_19'].'</td>';
                echo '<td>'.$octubre['sep_ajustes'].'</td>';

                echo '<td>'.($octubre['sep_preferente']+$octubre['sep_preferencial']+$octubre['sep_concentracion']+$octubre['sep_articulo_19']+$octubre['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$octubre['scvtf_normal'].'</td>';
                echo '<td>'.$octubre['scvtf_nivelacion'].'</td>';
                echo '<td>'.($octubre['scvtf_normal']+$octubre['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$octubre['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Noviembre</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$noviembre['sep_preferente'].'</td>';
                echo '<td>'.$noviembre['sep_preferencial'].'</td>';
                echo '<td>'.$noviembre['sep_concentracion'].'</td>';
                echo '<td>'.$noviembre['sep_articulo_19'].'</td>';
                echo '<td>'.$noviembre['sep_ajustes'].'</td>';

                echo '<td>'.($noviembre['sep_preferente']+$noviembre['sep_preferencial']+$noviembre['sep_concentracion']+$noviembre['sep_articulo_19']+$noviembre['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$noviembre['scvtf_normal'].'</td>';
                echo '<td>'.$noviembre['scvtf_nivelacion'].'</td>';
                echo '<td>'.($noviembre['scvtf_normal']+$noviembre['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$noviembre['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Diciembre</td>';

              if($subvencion==3){
                //cuando subvencion es SEP
                echo '<td>'.$diciembre['sep_preferente'].'</td>';
                echo '<td>'.$diciembre['sep_preferencial'].'</td>';
                echo '<td>'.$diciembre['sep_concentracion'].'</td>';
                echo '<td>'.$diciembre['sep_articulo_19'].'</td>';
                echo '<td>'.$diciembre['sep_ajustes'].'</td>';

                echo '<td>'.($diciembre['sep_preferente']+$diciembre['sep_preferencial']+$diciembre['sep_concentracion']+$diciembre['sep_articulo_19']+$diciembre['sep_ajustes']).'</td>';

              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$diciembre['scvtf_normal'].'</td>';
                echo '<td>'.$diciembre['scvtf_nivelacion'].'</td>';
                echo '<td>'.($diciembre['scvtf_normal']+$diciembre['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$diciembre['mes'].'</td>';
              }
      echo '
           </tr>

           <tr>
              <td><strong>Total</strong></td>';

              if($subvencion==3){
                echo '<td>'.number_format($total['total_sep_preferente'], "0", ",","." ).'</td>';
                echo '<td>'.number_format($total['total_sep_preferencial'], "0", ",","." ).'</td>';
                echo '<td>'.number_format($total['total_sep_concentracion'], "0", ",","." ).'</td>';
                echo '<td>'.number_format($total['total_sep_articulo_19'], "0", ",","." ).'</td>';
                echo '<td>'.number_format($total['total_sep_ajustes'], "0", ",","." ).'</td>';
              }else if($subvencion==5){
                //cuando subvencion es sc-vtf
                // echo '<td>'.number_format($total['total_mes'], "0", ",","." ).'</td>';
                echo '<td>'.number_format($total['total_scvtf_normal'], "0", ",","." ).'</td>';
                echo '<td>'.number_format($total['total_scvtf_nivelacion'], "0", ",","." ).'</td>';
                echo '<td>'.number_format(($total['total_scvtf_normal']+$total['total_scvtf_nivelacion']), "0", ",","." ).'</td>';
              }else{
                echo '<td>'.number_format($total['total_mes'], "0", ",","." ).'</td>';
              }

      echo '
           </tr>
       </tbody>
      </table>';

    }else{
      echo "ERROR CON EL INFORME DE INGRESOS AMIGO";
    }


    //GASTOS
    $total_gastos = 0;

    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    if($resultado_consulta = $Conexion->query("call procedimiento_informe(".$anio.",2,".$subvencion.",".$colegio.")")){

    echo '
      <table class="table table-bordered ">
       <thead>
           <th>Descripción</th>
           <th>Ord. compra</th>
           <th>Fecha</th>
           <th>Monto</th>
       </thead>
       <tbody>
    ';
      while($filas= $resultado_consulta->fetch_array()){

        $fecha=date_create($filas['fecha_ingreso']);
        $fecha= date_format($fecha, 'd/m/Y');

        $total_gastos += $filas['monto'];

        echo '<tr>
                 <td>'.$filas['descripcion'].'</td>
                 <td>'.$filas['orden_compra'].'</td>
                 <td>'.$fecha.'</td>
                 <td>'.number_format($filas['monto'],0,',','.').'</td>
             </tr>';

      }

    echo '
            <tr>
              <td colspan="3"><strong>Total de gastos</strong></td>
              <td>'.number_format($total_gastos,0,",",".").'</td>
            </tr>
       </tbody>
     </table>';


    }else{
      echo "ERROR CON EL INFORME DE GASTOS AMIGO";
    }



}else if($tipo_informe==1){

  echo "el tipo de informe es RESUMEN";

}

 ?>
