<?php
require_once 'Conexion.php';

class Colegio{

 private $rbd_colegio;
 private $nombre_colegio;

 public function setColegio($rbd_colegio){
   $this->rbd_colegio = $rbd_colegio;
 }
 public function setNombre($nombre_colegio){
   $this->nombre_colegio = $nombre_colegio;
 }

 public function obtenerColegios(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_colegios");
    return $resultado_consulta;
 }

 public function crearColegio(){
   $conexion = new Conexion();
   $conexion = $conexion->conectar();

   $consulta = "insert INTO tb_colegios (`rbd_colegio`, `nombre_colegio`) VALUES ('".$this->rbd_colegio."', '".$this->nombre_colegio."')";
   $resultado= $conexion->query($consulta);
   return $resultado;
   // if($Conexion->query($consulta)){
   //       $resultadoNuevoId = $Conexion->query("SELECT LAST_INSERT_ID() as id");
   //       $resultadoNuevoId = $resultadoNuevoId->fetch_array();
   //       return $resultadoNuevoId['id'];
   // }else{
   //     // echo $consulta;
   //     return false;
   // }
 }

   public function modificarColegio(){
       $conexion = new Conexion();
       $conexion = $conexion->conectar();

       $consulta="update tb_colegios set
                 nombre_colegio = '".$this->nombre_colegio."'
                 where rbd_colegio=".$this->rbd_colegio;

       $resultado= $conexion->query($consulta);
       return $resultado;
   }

   public function eliminarColegio(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $consulta = "DELETE FROM tb_colegios WHERE (rbd_colegio = ".$this->rbd_colegio.") ";

     if($Conexion->query($consulta)){
         return true;
     }else{
         // echo $consulta;
         return false;
     }

   }

}
 ?>
