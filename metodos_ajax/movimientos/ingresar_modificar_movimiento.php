<?php
require_once '../../clases/Funciones.php';
require_once '../../clases/Movimiento.php';

$Funciones = new Funciones();

$fecha_ingreso = $Funciones->limpiarTexto($_REQUEST['txt_fecha_ingreso']);
$fecha_ingreso = date_create($fecha_ingreso);
$fecha_ingreso = date_format($fecha_ingreso, 'Y-m-d');

$tipo_movimiento = $Funciones->limpiarNumeroEntero($_REQUEST['select_tipo_movimiento']);
$colegio = $Funciones->limpiarNumeroEntero($_REQUEST['select_colegio']);
$subvencion = $Funciones->limpiarNumeroEntero($_REQUEST['select_subvencion']);
$cuenta = $Funciones->limpiarNumeroEntero($_REQUEST['select_cuenta']);
$estado = $Funciones->limpiarNumeroEntero($_REQUEST['select_estado']);

$descripcion = $Funciones->limpiarTexto($_REQUEST['txt_descripcion']);
$orden_compra = $Funciones->limpiarTexto($_REQUEST['txt_orden_compra']);
$monto = $Funciones->limpiarNumeroEntero($_REQUEST['txt_monto']);
//campos sep
$sep_preferente = $Funciones->limpiarNumeroEntero($_REQUEST['sep_preferente']);
$sep_preferencia = $Funciones->limpiarNumeroEntero($_REQUEST['sep_preferencia']);
$sep_concentracion = $Funciones->limpiarNumeroEntero($_REQUEST['sep_concentracion']);
$sep_articulo_19 = $Funciones->limpiarNumeroEntero($_REQUEST['sep_articulo_19']);
$sep_ajustes = $Funciones->limpiarNumeroEntero($_REQUEST['sep_ajustes']);
$sep_total = $Funciones->limpiarNumeroEntero($_REQUEST['sep_total']);


$Movimiento = new Movimiento();
$Movimiento->setTipoMovimiento($tipo_movimiento);
$Movimiento->setColegio($colegio);
$Movimiento->setSubvencion($subvencion);
$Movimiento->setCuentaPresupuesto($cuenta);
$Movimiento->setEstado($estado);
$Movimiento->setDescripcion($descripcion);
$Movimiento->setFechaIngreso($fecha_ingreso);
$Movimiento->setOrdenCompra($orden_compra);
$Movimiento->setMonto($monto);
$Movimiento->setSepPreferente($sep_preferente);
$Movimiento->setSepPreferencial($sep_preferencia);
$Movimiento->setSepConcentracion($sep_concentracion);
$Movimiento->setSepArticulo19($sep_articulo_19);
$Movimiento->setSepAjustes($sep_ajustes);
$Movimiento->setSepTotal($sep_total);


//recibe el id de correspondencia, en caso que se desea modificar
$_id_movimiento;

if($_REQUEST['txt_id_movimiento']!=""){
// echo "modificar o";
  $_id_movimiento = $Funciones->limpiarNumeroEntero($_REQUEST['txt_id_movimiento']);
  $Movimiento->setIdMovimiento($_id_movimiento);

    if($Movimiento->modificarMovimiento()){
      echo "1";
    }else{
      echo "2";
    }

}else{
  // echo "nuevo o";
    if($Movimiento->ingresarMovimiento()){
      echo "1";
    }else{
      echo "2";
    }

}



 ?>
