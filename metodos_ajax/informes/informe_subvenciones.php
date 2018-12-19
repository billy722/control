<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Movimiento.php';



$anio = $_REQUEST['txt_anio'];
$subvencion = $_REQUEST['select_subvencion'];
$tipo_informe = $_REQUEST['select_tipo_informe'];
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
$enero = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$febrero = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$marzo = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$abril = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$mayo = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$junio = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$julio = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$agosto = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$septiembre = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$octubre = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$noviembre = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");
$diciembre = array("mes"=> "0", "scvtf_normal" => "0", "scvtf_nivelacion" => "0");

$total = array("total_mes"=> "0", "total_scvtf_normal" => "0", "total_scvtf_nivelacion" => "0");


if($tipo_informe==2){

    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();



    if($resultado_consulta = $Conexion->query("call procedimiento_informe(".$anio.",1,".$subvencion.",".$colegio.")")){

      while($filas= $resultado_consulta->fetch_array()){

           switch ($filas['mes']) {
             case '1': $enero['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $enero['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $enero['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '2': $febrero['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $febrero['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $febrero['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '3': $marzo['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $marzo['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $marzo['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '4': $abril['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $abril['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $abril['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '5': $mayo['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $mayo['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $mayo['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '6': $junio['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $junio['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $junio['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '7': $julio['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $julio['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $julio['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '8': $agosto['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $agosto['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $agosto['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '9': $septiembre['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                       $septiembre['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                       $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                       $septiembre['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                       $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '10': $octubre['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                        $octubre['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                        $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                        $octubre['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                        $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '11': $noviembre['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                        $noviembre['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                        $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                        $noviembre['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                        $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;
             case '12': $diciembre['mes']=number_format($filas['monto'],0,',','.');
                       $total['total_mes'] += $filas['monto'];
                        $diciembre['scvtf_normal']=number_format($filas['scvtf_normal'],0,',','.');
                        $total['total_scvtf_normal'] += $filas['scvtf_normal'];
                        $diciembre['scvtf_nivelacion']=number_format($filas['scvtf_nivelacion'],0,',','.');
                        $total['total_scvtf_nivelacion']+=$filas['scvtf_nivelacion'];
               break;

           }
      }

     echo '
     <script>
     function generar_informe_descargable(){
       window.open("./metodos_ajax/informes/archivo_subvenciones_descargable.php?txt_anio='.$anio.'&select_subvencion='.$subvencion.'&select_colegio='.$colegio.'", "Diseño Web", "width=500, height=100")
     }
     </script>

     ';

      echo '
         <div class="container">
             <button onclick="generar_informe_descargable()" class="btn btn-danger">EXPORTAR INFORME EXCEL</button>
         </div>
      ';

      echo '
        <table class="table table-bordered table_striped">

        <thead>
          <th>MES</th>';

              //cuando subvencion es sc-vtf
              if($subvencion==5){
                echo '<th>Subv. Normal</th>';
                echo '<th>Subv. Nivelación</th>';
                echo '<th>Total</th>';
              }else{
                echo '<th>Monto</th>';
              }

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

              if($subvencion==5){
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

              if($subvencion==5){
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

              if($subvencion==5){
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

              if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$abril['scvtf_normal'].'</td>';
                echo '<td>'.$abril['scvtf_nivelacion'].'</td>';
                echo '<td>'.($abril['scvtf_normal']+$abril['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$abril['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Mayo</td>';

              if($subvencion==5){
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

              if($subvencion==5){
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

              if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$julio['scvtf_normal'].'</td>';
                echo '<td>'.$julio['scvtf_nivelacion'].'</td>';
                echo '<td>'.($junio['scvtf_normal']+$junio['scvtf_nivelacion']).'</td>';
              }else{
                echo '<td>'.$julio['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Agosto</td>';

              if($subvencion==5){
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

              if($subvencion==5){
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

              if($subvencion==5){
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

              if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$noviembre['scvtf_normal'].'</td>';
                echo '<td>'.$noviembre['scvtf_nivelacion'].'</td>';
                echo '<td>'.($noviembre['mes']).'</td>';
              }else{
                echo '<td>'.$noviembre['mes'].'</td>';
              }

      echo '
           </tr>
           <tr>
              <td>Diciembre</td>';

              if($subvencion==5){
                //cuando subvencion es sc-vtf
                echo '<td>'.$diciembre['scvtf_normal'].'</td>';
                echo '<td>'.$diciembre['scvtf_nivelacion'].'</td>';
                echo '<td>'.($diciembre['mes']).'</td>';

              }else{
                echo '<td>'.$diciembre['mes'].'</td>';
              }

      echo '
           </tr>

           <tr>
              <td><strong>Total</strong></td>';

              if($subvencion==5){
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
