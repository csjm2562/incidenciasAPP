<?php
  require 'funciones/conexion.php';
  require 'funciones/funciones.php';
  $flag = false;
  if(!empty($_POST)){
		$nombre = $mysqli->real_escape_string($_POST['nombre']);
    $apellido = $mysqli->real_escape_string($_POST['apellido']);
		$nombreU = $mysqli->real_escape_string($_POST['nombreU']);
		$claveU = $mysqli->real_escape_string($_POST['claveU']);
		$conClaveU = $mysqli->real_escape_string($_POST['conClaveU']);
    $correoU = $mysqli->real_escape_string($_POST['correoU']);
		$activo = 1; //MODIFICAR; 0-Inactivo, 1-Activo
		$tipoU = 2; //MODIFICAR; 1-Administrador, 2-Empleado, 3-Cliente
    $idProducto = 1;
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
      $registro = registraUsuario($nombreU, $pass_hash, $nombre, $apellido, $correoU, $activo, $tipoU, $idProducto);
      $usuario_creado = "El usuario $nombreU fué creado exitosamente.";
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
      <div class="formInicio" style="margin-top: 0.5%;">
        <form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
          <div class="formContent">
            <div class="imgcontainer">
              <img src="media/img_logo2.png" alt="avatar" class="avatar">
  					</div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="text" name="nombreU" required autocomplete="username">
              <label for="nombreU">Ingrese nombre de usuario</label>
              <span class="helper-text red-text"><?php if (isset($cusuario_error)) echo $cusuario_error; ?></span>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="text" name="nombre" required pattern="[A-Za-z ]+" autocomplete="given-name">
              <label for="nombre">Ingrese nombre</label>
              <span class="helper-text" data-error="El nombre no puede contener caracteres númericos ni especiales."></span>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="text" name="apellido" required pattern="[A-Za-z ]+" autocomplete="family-name">
              <label for="apellido">Ingrese apellido</label>
              <span class="helper-text" data-error="El apellido no puede contener caracteres númericos ni especiales."></span>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="password" name="claveU" minlength="8" required autocomplete="new-password">
              <label for="claveU">Ingrese contraseña</label>
              <span class="helper-text" data-error="La contraseña debe de tener un mínimo de 8 caracteres."></span>
            </div>
            <div class="input-field" style="margin-bottom: 25px;">
              <input class="validate" type="password" name="conClaveU" required autocomplete="new-password">
              <label for="conClaveU">Vuelva a ingresar su contraseña</label>
              <span class="helper-text red-text"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
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
    <?php if (isset($usuario_creado)) { ?>
      <div class='modal'>
        <div class='modal-content'>
          <?php echo $usuario_creado; ?>
        </div>
        <div class='modal-footer'>
          <a href='index.php' class='modal-close waves-effect waves-green btn-flat'>Aceptar</a>
        </div>
      </div>";
    <?php } ?>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.modal').modal();
      $('.modal').modal('open');
    });
  </script>
  </body>
</html>
