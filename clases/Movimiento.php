<?php
require_once 'Conexion.php';

class Movimiento{

  private $id_movimiento;
  private $tipo_movimiento;
  private $colegio;
  private $subvencion;
  private $cuenta_presupuesto;
  private $estado;
  private $descripcion;
  private $fecha_ingreso;
  private $orden_compra;
  private $monto;

  private $sep_preferente;
  private $sep_preferencial;
  private $sep_concentracion;
  private $sep_articulo_19;
  private $sep_ajustes;
  private $sep_total;
  private $scvtf_normal;
  private $scvtf_nivelacion;


  function setIdMovimiento($parametro){
    $this->id_movimiento = $parametro;
  }
  function setTipoMovimiento($parametro){
    $this->tipo_movimiento = $parametro;
  }
  function setColegio($parametro){
    $this->colegio = $parametro;
  }
  function setSubvencion($parametro){
    $this->subvencion = $parametro;
  }
  function setCuentaPresupuesto($parametro){
    $this->cuenta_presupuesto = $parametro;
  }
  function setEstado($parametro){
    $this->estado = $parametro;
  }
  function setDescripcion($parametro){
    $this->descripcion = $parametro;
  }
  function setFechaIngreso($parametro){
    $this->fecha_ingreso = $parametro;
  }
  function setOrdenCompra($parametro){
    $this->orden_compra = $parametro;
  }
  function setMonto($parametro){
    $this->monto = $parametro;
  }

  function setSepPreferente($parametro){
    $this->sep_preferente = $parametro;
  }
  function setSepPreferencial($parametro){
    $this->sep_preferencial = $parametro;
  }
  function setSepConcentracion($parametro){
    $this->sep_concentracion = $parametro;
  }
  function setSepArticulo19($parametro){
    $this->sep_articulo_19 = $parametro;
  }
  function setSepAjustes($parametro){
    $this->sep_ajustes = $parametro;
  }
  function setSepTotal($parametro){
    $this->sep_total = $parametro;
  }
  function setScvtfNormal($parametro){
    $this->scvtf_normal = $parametro;
  }
  function setScvtfNivelacion($parametro){
    $this->scvtf_nivelacion = $parametro;
  }


  function eliminarMovimiento(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

      if($conexion->query("update tb_movimientos set estado=".$this->estado." where id_movimiento=".$this->id_movimiento)){
         return true;
      }else{
         return false;
      }
  }

  function modificarMovimiento(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    echo "modifica";

    // if($conexion->query($consulta)){
    //    return $resultado;
    // }else{
    //   return false;
    // }
  }

  function ingresarMovimiento(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();


    $consulta ="insert INTO tb_movimientos
              (`tipo_movimiento`,
              `colegio`,
              `subvencion`,
              `cuenta_presupuesto`,
              `estado`,
              `descripcion`,
              `fecha_ingreso`,
              `orden_compra`,
              `monto`,
              `sep_preferente`,
              `sep_preferencial`,
              `sep_concentracion`,
              `sep_articulo_19`,
              `sep_ajustes`,
              `sep_total`,
              `scvtf_normal`,
              `scvtf_nivelacion`)
              VALUES
              ('".$this->tipo_movimiento."',
               '".$this->colegio."',
               '".$this->subvencion."',
               '".$this->cuenta_presupuesto."',
               '".$this->estado."',
               '".$this->descripcion."',
               '".$this->fecha_ingreso."',
               '".$this->orden_compra."',
               '".$this->monto."',
               '".$this->sep_preferente."',
               '".$this->sep_preferencial."',
               '".$this->sep_concentracion."',
               '".$this->sep_articulo_19."',
               '".$this->sep_ajustes."',
               '".$this->sep_total."'
               '".$this->sub_normal."'
               '".$this->sub_nivelacion."');";

    if($conexion->query($consulta)){
       return true;
    }else{
      // echo $consulta;
      return false;
    }
  }

  function mostrarListadoMovimientos($texto_buscar,$condiciones){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      if($texto_buscar=="" || $texto_buscar==" "){
        $consulta= "select * from vista_movimientos ".$condiciones;
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
