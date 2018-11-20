<?php
require_once 'Conexion.php';

class Correspondencia{

  private $id_correspondencia;
  private $fecha_ingreso;
  private $fecha_creacion;
  private $numero_documento;
  private $lugar_origen;
  private $tipo_documento;
  private $descripcion;
  private $estado;
  private $derivaciones;

  function setIdCorrespondencia($parametro){
    $this->id_correspondencia = $parametro;
  }
  function setFechaIngreso($parametro){
    $this->fecha_ingreso = $parametro;
  }
  function setFechaCreacion($parametro){
    $this->fecha_creacion = $parametro;
  }
  function setNumeroDocumento($parametro){
    $this->numero_documento = $parametro;
  }
  function setLugarOrigen($parametro){
    $this->lugar_origen = $parametro;
  }
  function setTipoDocumento($parametro){
    $this->tipo_documento = $parametro;
  }
  function setDescripcion($parametro){
    $this->descripcion = $parametro;
  }
  function setEstado($parametro){
    $this->estado = $parametro;
  }
  function setDerivaciones($parametro){
    $this->derivaciones = $parametro;
  }

  function mostrarListadoCorrespondencia($texto_buscar){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      if($texto_buscar=="" || $texto_buscar==" "){
        $consulta= "select * from vista_correspondencia where estado=1";
      }else{
        $consulta= "select * from vista_correspondencia
                    where id_correspondencia like '%".$texto_buscar."%'
                    or descripcion like '%".$texto_buscar."%'
                    or lugar_origen like '%".$texto_buscar."%'
                    and estado=1";
      }
      $resultado= $conexion->query($consulta);
      if($resultado){
         return $resultado;
      }else{
        return false;
      }
  }

  function agregarDerivacion($arg_id_departamento){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();
    @session_start();

    $consulta= "insert into tb_derivaciones(id_correspondencia,id_departamento,usuario_deriva)
                values (".$this->id_correspondencia.",".$arg_id_departamento.",".$_SESSION['run'].")";

    echo $consulta;

    $resultado= $conexion->query($consulta);
    if($resultado){
       return $resultado;
    }else{
      return false;
    }
  }

  function ingresarCorrespondencia(){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      $consulta= "insert INTO tb_correspondencia (fecha_ingreso,fecha_creacion,numero_documento,lugar_origen,tipo_documento,descripcion)
       VALUES ('".$this->fecha_ingreso."',
               '".$this->fecha_creacion."',
               '".$this->numero_documento."',
               '".$this->lugar_origen."',
               '".$this->tipo_documento."',
               '".$this->descripcion."');";

      // echo $consulta;

      $resultado= $conexion->query($consulta);
      if($resultado){

          foreach($this->derivaciones as $dep){

              if($resultado= $conexion->query("SELECT LAST_INSERT_ID() as id")){
                $resultado=$resultado->fetch_array();
                $this->setIdCorrespondencia($resultado['id']);
                $this->agregarDerivacion($dep);
              }

          }
      }else{
        return false;
      }
  }

  function modificarCorrespondencia(){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      $consulta= "update tb_correspondencia set
                  fecha_ingreso='".$this->fecha_ingreso."',
                  fecha_creacion='".$this->fecha_creacion."',
                  numero_documento='".$this->numero_documento."',
                  lugar_origen='".$this->lugar_origen."',
                  tipo_documento=".$this->tipo_documento.",
                  descripcion='".$this->descripcion."'
                  where id_correspondencia=".$this->id_correspondencia;

      $resultado= $conexion->query($consulta);
      if($resultado){
         return $resultado;
      }else{
        return false;
      }
  }

  function eliminarCorrespondencia(){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      $consulta= "select c.id_correspondencia from tb_respuesta_derivacion rd
                  inner join tb_derivaciones d on rd.id_derivacion=d.id_derivacion
                  inner join tb_correspondencia c on d.id_correspondencia=c.id_correspondencia
                  where c.id_correspondencia=".$this->id_correspondencia;


      $resultado= $conexion->query($consulta);

      //COMRUEBA SI HAY RESPUESTAS INGRESADAS RELACIONADA A ESTA CORRESPONDENCIA
      if($resultado->num_rows>0){//SI HAY RESPUESTAS A DERIVACIONES, SOLO CAMBIA EL ESTADO PARA NO PERDER INFORMACION
        $consulta= "update tb_correspondencia set estado=".$this->estado." where id_correspondencia=".$this->id_correspondencia;
      }else{//SI NO HAY RESPUESTA A DERIVACIONES SE PUEDE ELIMINAR EL REGISTRO DE CORRESPONDENCIA

        $consulta= "delete from tb_derivaciones where id_correspondencia=".$this->id_correspondencia;

        if($conexion->query($consulta)){
            $consulta= "delete from tb_correspondencia where id_correspondencia=".$this->id_correspondencia;
        }else{
            return false;
        }
      }


      if($conexion->query($consulta)){
          return true;
      }else{
          return false;
      }
  }

}

 ?>
