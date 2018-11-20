<?php
require_once '../../clases/Funciones.php';
require_once '../../clases/Correspondencia.php';

$Funciones = new Funciones();

$fecha_ingreso = $Funciones->limpiarTexto($_REQUEST['txt_fecha_ingreso']);
$fecha_ingreso = date_create($fecha_ingreso);
$fecha_ingreso = date_format($fecha_ingreso, 'Y-m-d');

$lugar_origen = $Funciones->limpiarTexto($_REQUEST['txt_lugar_origen']);
$tipo_documento = $Funciones->limpiarNumeroEntero($_REQUEST['select_tipo_documento']);
$numero_documento = $Funciones->limpiarTexto($_REQUEST['txt_numero_documento']);

$fecha_creacion = $Funciones->limpiarTexto($_REQUEST['txt_fecha_creacion']);
$fecha_creacion = date_create($fecha_creacion);
$fecha_creacion = date_format($fecha_creacion, 'Y-m-d');

$descripcion = $Funciones->limpiarTexto($_REQUEST['txt_descripcion_documento']);

$derivaciones = array();

foreach($_REQUEST['chb_selector_derivaciones'] as $valor)
{
   $derivaciones[] = $valor;
}



$Correspondencia = new Correspondencia();
$Correspondencia->setFechaIngreso($fecha_ingreso);
$Correspondencia->setLugarOrigen($lugar_origen);
$Correspondencia->setTipoDocumento($tipo_documento);
$Correspondencia->setNumeroDocumento($numero_documento);
$Correspondencia->setFechaCreacion($fecha_creacion);
$Correspondencia->setDescripcion($descripcion);
$Correspondencia->setDerivaciones($derivaciones);


//recibe el id de correspondencia, en caso que se desea modificar
$id_correspondencia;
if($_REQUEST['txt_id_correspondencia']!=""){
echo "modificar o";
  $id_correspondencia = $Funciones->limpiarNumeroEntero($_REQUEST['txt_id_correspondencia']);
  $Correspondencia->setIdCorrespondencia($id_correspondencia);

    if($Correspondencia->modificarCorrespondencia()){
      echo "1";
    }else{
      echo "2";
    }

}else{
  echo "nuevo o";
    if($Correspondencia->ingresarCorrespondencia()){
      echo "1";
    }else{
      echo "2";
    }

}



 ?>
