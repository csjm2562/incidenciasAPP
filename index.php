<?php
  require 'funciones/conexion.php';
  require 'funciones/funciones.php';
  session_start();
  if(isset($_SESSION["id_usuario"])){
		header("Location: principal.php");
	}
  $errors = array();
  if(!empty($_POST)){
    $nombreU = $mysqli->real_escape_string($_POST['nombreU']);
		$claveU = $mysqli->real_escape_string($_POST['claveU']);
		$errors[] = login($nombreU, $claveU);
	}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link  href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="formInicio">
        <form id="loginform" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
          <div class="formContent">
            <div class="imgcontainer">
              <img src="media/img_avatar2.png" alt="avatar" class="avatar">
  					</div>
            <div class="input-field" style="margin-bottom: 25px;">
              <i class="fas fa-user prefix"></i>
              <input class="validate" type="text" name="nombreU" required>
              <label for="nombreU">Ingresa tu nombre de usuario</label>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <i class="fas fa-lock prefix"></i>
              <input class="validate" type="password" name="claveU">
  						<label for="claveU">Ingresa tu contraseña</label>
  						<div>
                <label style="float: right;"><a href="recupera.php"><b>¿Olvidó su contraseña?</b></a></label><br>
  						</div>
            </div>
            <center>
              <div class="row">
                <button type="submit" name="iniciar" class="col s12 btn btn-large waves-effect">Iniciar sesión</button>
              </div>
            </center>
          </div>
          <div class="opcion">
            <span>¿No tienes cuenta? <a href="registro.php">Regístrate!</a></span>
          </div>
        </form>
        <?php echo resultBlock($errors); ?>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	<script src="js/scripts.js"></script>
  </body>
</html>
