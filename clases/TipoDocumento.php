<?php
require_once 'Conexion.php';

class TipoDocumento{

 private $id_tipo_documento;
 private $descripcion_tipo;

 public function setIdTipoDocumento($parametro){
   $this->id_tipo_documento = $parametro;
 }
 public function setDescripcionTipo($parametro){
   $this->descripcion_tipo = $parametro;
 }

 public function obtenerTiposDocumento(){

    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $resultado= $conexion->query("select * from tb_tipo_correspondencia");
    if($resultado){
       return $resultado;
    }else{
      return false;
    }

 }


}
 ?>
