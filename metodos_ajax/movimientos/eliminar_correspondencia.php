<?php

require_once '../../clases/Funciones.php';
require_once '../../clases/Correspondencia.php';

$Funciones = new Funciones();

$id_correspondencia = $Funciones->limpiarNumeroEntero($_REQUEST['id']);


$Correspondencia = new Correspondencia();
$Correspondencia->setIdCorrespondencia($id_correspondencia);
$Correspondencia->setEstado(2);


 if($Correspondencia->eliminarCorrespondencia()){
   echo "1";
 }else{
   echo "2";
 }

 ?>
