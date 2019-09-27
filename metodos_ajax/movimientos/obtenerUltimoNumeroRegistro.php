<?php

require_once '../../clases/Movimiento.php';

$Movimiento = new Movimiento();

$resultado = $Movimiento->obtenerUltimoNumeroRegistro();
$filas = $resultado->fetch_assoc();



echo json_encode($filas);

 ?>
