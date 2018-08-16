<?php
  require 'funciones/conexion.php';
  require 'funciones/funciones.php';
  $flag = false;
  if(!empty($_POST)){
		$nombre = $mysqli->real_escape_string($_POST['nombre']);
		$nombreU = $mysqli->real_escape_string($_POST['nombreU']);
		$claveU = $mysqli->real_escape_string($_POST['claveU']);
		$conClaveU = $mysqli->real_escape_string($_POST['conClaveU']);
		$correoU = $mysqli->real_escape_string($_POST['correoU']);
		$activo = 1; //MODIFICAR
		$tipoU = 3;
		if(!validaPassword($claveU, $conClaveU)){
      $flag = true;
			$cpassword_error = "Las contraseñas no coinciden.";
		}
		if(usuarioExiste($nombreU)){
      $flag = true;
			$cusuario_error = "El nombre de usuario $nombreU ya existe.";
		}
    if(!$flag){
      $pass_hash = hashPassword($claveU);
      $token = generateToken();
      $registro = registraUsuario($nombreU, $pass_hash, $nombre, $correoU, $activo, $token, $tipoU);
      echo "<div class='modal'>
              <div class='modal-content'>
                <p>Usuario creado exitosamente</p>
              </div>
              <div class='modal-footer'>
                <a href='index.php' class='modal-close waves-effect waves-green btn-flat'>Aceptar</a>
              </div>
            </div>";
    }
	}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link  href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="formInicio" style="margin-top: 6%;">
        <form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
          <div class="formContent">
            <div class="imgcontainer">
              <img src="media/img_logo2.png" alt="avatar" class="avatar">
  					</div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="text" name="nombre" required pattern="[A-Za-z ]+">
              <label for="nombre">Ingrese nombre</label>
              <span class="helper-text" data-error="El nombre no puede contener caracteres númericos ni especiales."></span>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="text" name="nombreU" required>
              <label for="nombreU">Ingrese nombre de usuario</label>
              <span class="helper-text"><?php if (isset($cusuario_error)) echo $cusuario_error; ?></span>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="password" name="claveU" minlength="6" required>
              <label for="claveU">Ingrese contraseña</label>
              <span class="helper-text" data-error="La contraseña debe de tener un mínimo de 6 caracteres."></span>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="password" name="conClaveU" required>
              <label for="conClaveU">Vuelva a ingresar su contraseña</label>
              <span class="helper-text"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="email" name="correoU" required>
              <label for="correoU">Ingrese su correo electrónico</label>
              <span class="helper-text" data-error="Ingrese un formato de correo válido."></span>
            </div>
            <center>
              <div class="row">
                <button type="submit" name="registrar" class="col s12 btn btn-large waves-effect">Registrar</button>
              </div>
            </center>
          </div>
          <div class="opcion">
            <span>¿Ya tienes una cuenta? <a href="index.php">Inicia sesión!</a></span>
          </div>
        </form>
      </div>
    </div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	<script src="js/scripts.js"></script>
  </body>
</html>
