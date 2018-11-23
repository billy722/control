<?php
require_once 'Conexion.php';

class Cuenta{

 private $numero_cuenta;
 private $nombre_cuenta;

 public function setCuenta($numero_cuenta){
   $this->numero_cuenta = $numero_cuenta;
 }
 public function setNombre($nombre_cuenta){
   $this->nombre_cuenta = $nombre_cuenta;
 }

 public function obtenerCuentas(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_cuentas_presupuesto");
    return $resultado_consulta;
 }

 public function crearCuenta(){
   $conexion = new Conexion();
   $conexion = $conexion->conectar();

   $consulta = "insert INTO tb_cuentas_presupuesto (`numero_cuenta`, `nombre_cuenta`) VALUES ('".$this->numero_cuenta."', '".$this->nombre_cuenta."')";
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

   public function modificarCuenta(){
       $conexion = new Conexion();
       $conexion = $conexion->conectar();

       $consulta="update tb_cuentas_presupuesto SET
       nombre_cuenta = '".$this->nombre_cuenta."'
        WHERE (numero_cuenta = '".$this->numero_cuenta."');";

       $resultado= $conexion->query($consulta);
       return $resultado;
   }

   public function eliminarCuenta(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $consulta = "DELETE FROM tb_cuentas_presupuesto WHERE (numero_cuenta = ".$this->numero_cuenta.") ";

     if($Conexion->query($consulta)){
         return true;
     }else{
         // echo $consulta;
         return false;
     }

   }

}
 ?>
