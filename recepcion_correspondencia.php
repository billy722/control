<?php
@session_start();
require_once 'comun.php';
require_once './clases/Departamento.php';
require_once './clases/Usuario.php';
comprobarSession();
$usuario= new Usuario();
$usuario= $usuario->obtenerUsuarioActual();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>


</style>
   <title>Correspondencia</title>
   <?php cargarHead(); ?>

  <script src="./js/script_usuarios.js"></script>
</head>
<body>

<?php cargarMenuPrincipal(); ?>

<br>



<div class="container-fluid">
  <div class="row">

      <div class="col-12 col-md-3 ">

          <div class="card text-dark ">
            <div class="card-header ">
                <center>OPCIONES</center>
            </div>
            <div class="card-body">
                 <?php cargarMenuCorrespondencia(); ?>
            </div>
          </div>

      </div>
       <div class="col-12 col-md-9">

              <div id='' style="" class=" card col-12 border-info">

              
                  <div class="card-header">Registrar ingreso de correspondencia</div>
                  <div class="card-body text-info">
                    <h5 class="card-title">Titulo</h5>
                    <p class="card-text">texto prueba</p>
                  </div>


              </div>

       </div>

  </div>

</div>




</body>
</html>
