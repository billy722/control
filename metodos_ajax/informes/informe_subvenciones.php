<?php
require_once '../../clases/Conexion.php';

$anio = $_REQUEST['txt_anio'];
$subvencion = $_REQUEST['select_subvencion'];
$colegio = $_REQUEST['select_colegio'];


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
$enero = 0;
$febrero = 0;
$marzo = 0;
$abril = 0;
$mayo = 0;
$junio = 0;
$julio = 0;
$agosto = 0;
$septiembre = 0;
$octubre = 0;
$noviembre = 0;
$diciembre = 0;


$Conexion = new Conexion();
$Conexion = $Conexion->conectar();

if($resultado_consulta = $Conexion->query("call procedimiento_informe(".$anio.",1,".$subvencion.",".$colegio.")")){

  while($filas= $resultado_consulta->fetch_array()){

       switch ($filas['mes']) {
         case '1': $enero=number_format($filas['monto'],0,',','.');
           break;
         case '2': $febrero=number_format($filas['monto'],0,',','.');
           break;
         case '3': $marzo=number_format($filas['monto'],0,',','.');
           break;
         case '4': $abril=number_format($filas['monto'],0,',','.');
           break;
         case '5': $mayo=number_format($filas['monto'],0,',','.');
           break;
         case '6': $junio=number_format($filas['monto'],0,',','.');
           break;
         case '7': $julio=number_format($filas['monto'],0,',','.');
           break;
         case '8': $agosto=number_format($filas['monto'],0,',','.');
           break;
         case '9': $septiembre=number_format($filas['monto'],0,',','.');
           break;
         case '10': $octubre=number_format($filas['monto'],0,',','.');
           break;
         case '11': $noviembre=number_format($filas['monto'],0,',','.');
           break;
         case '12': $diciembre=number_format($filas['monto'],0,',','.');
           break;

       }
  }

  echo '
    <table class="table table-bordered table_striped">

    <thead>
      <th>MES</th>
      <th>MONTO</th>
    </thead>
    <tbody>
       <tr>
          <td>Enero</td>
          <td>'.$enero.'</td>
       </tr>
       <tr>
          <td>Febrero</td>
          <td>'.$febrero.'</td>
       </tr>
       <tr>
          <td>Marzo</td>
          <td>'.$marzo.'</td>
       </tr>
       <tr>
          <td>Abril</td>
          <td>'.$abril.'</td>
       </tr>
       <tr>
          <td>Mayo</td>
          <td>'.$mayo.'</td>
       </tr>
       <tr>
          <td>Junio</td>
          <td>'.$junio.'</td>
       </tr>
       <tr>
          <td>Julio</td>
          <td>'.$julio.'</td>
       </tr>
       <tr>
          <td>Agosto</td>
          <td>'.$agosto.'</td>
       </tr>
       <tr>
          <td>Septiembre</td>
          <td>'.$septiembre.'</td>
       </tr>
       <tr>
          <td>Octubre</td>
          <td>'.$octubre.'</td>
       </tr>
       <tr>
          <td>Noviembre</td>
          <td>'.$noviembre.'</td>
       </tr>
       <tr>
          <td>Diciembre</td>
          <td>'.$diciembre.'</td>
       </tr>
   </tbody>
  </table>';

}else{
  echo "ERROR CON EL INFORME DE INGRESOS AMIGO";
}


//GASTOS

//valores
$enero = 0;
$febrero = 0;
$marzo = 0;
$abril = 0;
$mayo = 0;
$junio = 0;
$julio = 0;
$agosto = 0;
$septiembre = 0;
$octubre = 0;
$noviembre = 0;
$diciembre = 0;


$Conexion = new Conexion();
$Conexion = $Conexion->conectar();

if($resultado_consulta = $Conexion->query("call procedimiento_informe(".$anio.",2,".$subvencion.",".$colegio.")")){

  while($filas= $resultado_consulta->fetch_array()){

       switch ($filas['mes']) {
         case '1': $enero=number_format($filas['monto'],0,',','.');
           break;
         case '2': $febrero=number_format($filas['monto'],0,',','.');
           break;
         case '3': $marzo=number_format($filas['monto'],0,',','.');
           break;
         case '4': $abril=number_format($filas['monto'],0,',','.');
           break;
         case '5': $mayo=number_format($filas['monto'],0,',','.');
           break;
         case '6': $junio=number_format($filas['monto'],0,',','.');
           break;
         case '7': $julio=number_format($filas['monto'],0,',','.');
           break;
         case '8': $agosto=number_format($filas['monto'],0,',','.');
           break;
         case '9': $septiembre=number_format($filas['monto'],0,',','.');
           break;
         case '10': $octubre=number_format($filas['monto'],0,',','.');
           break;
         case '11': $noviembre=number_format($filas['monto'],0,',','.');
           break;
         case '12': $diciembre=number_format($filas['monto'],0,',','.');
           break;

       }
  }

echo '
  <table class="table table-bordered table_striped">

  <thead>
    <th>MES</th>
    <th>MONTO</th>
  </thead>
  <tbody>
     <tr>
        <td>Enero</td>
        <td>'.$enero.'</td>
     </tr>
     <tr>
        <td>Febrero</td>
        <td>'.$febrero.'</td>
     </tr>
     <tr>
        <td>Marzo</td>
        <td>'.$marzo.'</td>
     </tr>
     <tr>
        <td>Abril</td>
        <td>'.$abril.'</td>
     </tr>
     <tr>
        <td>Mayo</td>
        <td>'.$mayo.'</td>
     </tr>
     <tr>
        <td>Junio</td>
        <td>'.$junio.'</td>
     </tr>
     <tr>
        <td>Julio</td>
        <td>'.$julio.'</td>
     </tr>
     <tr>
        <td>Agosto</td>
        <td>'.$agosto.'</td>
     </tr>
     <tr>
        <td>Septiembre</td>
        <td>'.$septiembre.'</td>
     </tr>
     <tr>
        <td>Octubre</td>
        <td>'.$octubre.'</td>
     </tr>
     <tr>
        <td>Noviembre</td>
        <td>'.$noviembre.'</td>
     </tr>
     <tr>
        <td>Diciembre</td>
        <td>'.$diciembre.'</td>
     </tr>
 </tbody>
</table>';

}else{
  echo "ERROR CON EL INFORME DE GASTOS AMIGO";
}

 ?>
