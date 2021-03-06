<?php
require_once 'Conexion.php';

class Movimiento{

  private $id_movimiento;
  private $sub_numero_registro;

  private $numero_certificado;
  private $tipo_movimiento;
  private $tipo_gasto;
  private $colegio;
  private $subvencion;
  private $cuenta_presupuesto;
  private $estado;

  private $ord;
  private $numero_decreto;

  private $descripcion;
  private $fecha_ingreso;
  private $orden_compra;
  private $monto;

  private $sep_preferente;
  private $sep_preferencial;
  private $sep_concentracion;
  private $sep_articulo_19;
  private $sep_ajustes;
  // private $sep_total;
  private $scvtf_normal;
  private $scvtf_nivelacion;


  function setIdMovimiento($parametro){
    $this->id_movimiento = $parametro;
  }
  function setSubNumeroRegistro($parametro){
    $this->sub_numero_registro = $parametro;
  }

  function setNumeroCertificado($parametro){
    $this->numero_certificado = $parametro;
  }
  function setTipoMovimiento($parametro){
    $this->tipo_movimiento = $parametro;
  }
  function setTipoGasto($parametro){
    $this->tipo_gasto = $parametro;
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
  function setOrd($parametro){
    $this->ord = $parametro;
  }
  function setNumeroDecreto($parametro){
    $this->numero_decreto = $parametro;
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
    if($parametro==""){
       $parametro=0;
    }
    $this->scvtf_normal = $parametro;
  }
  function setScvtfNivelacion($parametro){
    if($parametro==""){
       $parametro=0;
    }
    $this->scvtf_nivelacion = $parametro;
  }


  function eliminarMovimiento(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $consulta = "update tb_movimientos set estado=".$this->estado.", numero_certificado=NULL where id_movimiento=".$this->id_movimiento;
    // echo $consulta;

      if($conexion->query($consulta)){
         return true;
      }else{
         return false;
      }
  }

  function obtenerUltimoNumeroRegistro(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $consulta = "select max(id_movimiento)+1 as nuevo_id_registro from tb_movimientos";

    $resultado= $conexion->query($consulta);
    if($resultado){
       return $resultado;
    }else{
      return false;
    }
  }

  function modificarMovimiento(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $consulta = "UPDATE tb_movimientos
                  SET
                  tipo_movimiento = ".$this->tipo_movimiento.",
                  tipo_gasto = ".$this->tipo_gasto.",
                  colegio = ".$this->colegio.",
                  subvencion = ".$this->subvencion.",
                  cuenta_presupuesto = '".$this->cuenta_presupuesto."',
                  estado = ".$this->estado.",
                  ord = ".$this->ord.",
                  numero_decreto = ".$this->numero_decreto.",
                  descripcion = '".$this->descripcion."',
                  fecha_ingreso = '".$this->fecha_ingreso."',
                  orden_compra = '".$this->orden_compra."',
                  monto = ".$this->monto.",
                  sep_preferente = ".$this->sep_preferente.",
                  sep_preferencial = ".$this->sep_preferencial.",
                  sep_concentracion = ".$this->sep_concentracion.",
                  sep_articulo_19 = ".$this->sep_articulo_19.",
                  sep_ajustes = ".$this->sep_ajustes.",
                  scvtf_normal = ".$this->scvtf_normal.",
                  scvtf_nivelacion = ".$this->scvtf_nivelacion."
                  WHERE id_movimiento = ".$this->id_movimiento." ";

    if($conexion->query($consulta)){
      return true;
    }else{
      echo $consulta;
      return false;
    }

  }

  function ingresarMovimiento(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();


    $consulta ="insert INTO tb_movimientos
              (`numero_certificado`,
              `sub_numero_registro`,
              `tipo_movimiento`,
              `tipo_gasto`,
              `colegio`,
              `subvencion`,
              `cuenta_presupuesto`,
              `estado`,
              `ord`,
              `numero_decreto`,
              `descripcion`,
              `fecha_ingreso`,
              `orden_compra`,
              `monto`,
              `sep_preferente`,
              `sep_preferencial`,
              `sep_concentracion`,
              `sep_articulo_19`,
              `sep_ajustes`,
              `scvtf_normal`,
              `scvtf_nivelacion`)
              VALUES
              (".$this->numero_certificado.",
               '".$this->sub_numero_registro."',
               '".$this->tipo_movimiento."',
               ".$this->tipo_gasto.",
               '".$this->colegio."',
               '".$this->subvencion."',
               '".$this->cuenta_presupuesto."',
               '".$this->estado."',
               '".$this->ord."',
               '".$this->numero_decreto."',
               '".$this->descripcion."',
               '".$this->fecha_ingreso."',
               '".$this->orden_compra."',
               '".$this->monto."',
               '".$this->sep_preferente."',
               '".$this->sep_preferencial."',
               '".$this->sep_concentracion."',
               '".$this->sep_articulo_19."',
               '".$this->sep_ajustes."',
               '".$this->scvtf_normal."',
               '".$this->scvtf_nivelacion."');";

    if($conexion->query($consulta)){
       return true;
    }else{
      echo $consulta;
      return false;
    }
  }

  function mostrarListadoMovimientos($texto_buscar,$condiciones,$mostrarListadoMovimientos){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      $mostrarListadoMovimientos = ($mostrarListadoMovimientos*20);

      if($texto_buscar=="" || $texto_buscar==" "){
        $consulta= "select * from vista_movimientos ".$condiciones." order by numero_certificado desc limit ".$mostrarListadoMovimientos;
      }else{
        $consulta= "select * from vista_movimientos
                    where id_movimiento like '%".$texto_buscar."%'
                    or descripcion like '%".$texto_buscar."%'
                    or orden_compra like '%".$texto_buscar."%'
                    or rbd_colegio like '%".$texto_buscar."%'
                    or subvencion like '%".$texto_buscar."%'
                    or numero_cuenta like '%".$texto_buscar."%'
                    or nombre_cuenta like '%".$texto_buscar."%'
                    or descripcion_estado like '%".$texto_buscar."%'
                    or ord like '%".$texto_buscar."%'
                    or numero_decreto like '%".$texto_buscar."%'
                    or descripcion_tipo_movimiento like '%".$texto_buscar."%'
                    limit ".$mostrarListadoMovimientos;
      }
      $resultado= $conexion->query($consulta);
      if($resultado){
         return $resultado;
      }else{
        return false;
      }
  }

  function mostrarTotalesColegio($anio){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

        $consulta= "call procedimiento_totales(".$anio.",".$this->subvencion.",'".$this->colegio."');";

      $resultado= $conexion->query($consulta);
      if($resultado){
         return $resultado;
      }else{
        return false;
      }
  }




}

 ?>
