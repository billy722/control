<?php
require_once 'Conexion.php';

class Movimiento{

  private $id_correspondencia;


  function setIdMovimiento($parametro){
    $this->id_movimiento = $parametro;
  }


  function mostrarListadoMovimientos($texto_buscar){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      if($texto_buscar=="" || $texto_buscar==" "){
        $consulta= "select * from vista_movimientos";
      }else{
        // $consulta= "consulta para buscar";
      }
      $resultado= $conexion->query($consulta);
      if($resultado){
         return $resultado;
      }else{
        return false;
      }
  }


}

 ?>
