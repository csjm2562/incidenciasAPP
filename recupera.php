<?php
  require 'funciones/conexion.php';
  require 'funciones/funciones.php';
  session_start();
  if(isset($_SESSION["id_usuario"])){
    header("Location: principal.php");
  }
	if(!empty($_POST)){
		$nombreU = $mysqli->real_escape_string($_POST['nombreU']);
		if(usuarioExiste($nombreU)){

		} else {
			$usuario_error = "El nombre de usuario $nombreU no existe.";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link  href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="formInicio">
        <form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
          <div class="formContent">
            <div class="imgcontainer">
              <img src="media/img_logo2.png" alt="avatar" class="avatar">
  					</div>
            <div class="input-field" style="margin-bottom: 25px;">
              <i class="fas fa-user prefix"></i>
              <input class="validate" type="text" name="nombreU" required autocomplete="username">
              <label for="nombreU">Ingrese su nombre de usuario</label>
              <span class="helper-text red-text"><?php if (isset($usuario_error)) echo $usuario_error; ?></span>
            </div>
            <center>
              <div class="row">
                <button type="submit" name="recuperar" class="col s12 btn btn-large waves-effect">Recuperar contraseña</button>
              </div>
            </center>
          </div>
          <div class="opcion">
            <div class="row">
              <div class="col s6">
                <span>¿No tienes cuenta? <a href="registro.php">Regístrate!</a></span>
              </div>
              <div class="col s6">
                <span>¿Ya tienes cuenta? <a href="index.php">Inicia sesión!</a></span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  </body>
</html>
