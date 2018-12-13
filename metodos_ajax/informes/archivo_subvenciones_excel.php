<?php


 $filename = "libros.xls";
 header("Content-Type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=".$filename);

   echo "hola amiga"

 $mostrar_columnas = false;

 foreach($libros as $libro) {
 if(!$mostrar_columnas) {
 echo implode("\t", array_keys($libro)) . "\n";
 $mostrar_columnas = true;
 }
 echo implode("\t", array_values($libro)) . "\n";
 }

 exit;



 ?>
