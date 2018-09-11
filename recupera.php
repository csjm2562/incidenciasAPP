<?php
  require 'funciones/conexion.php';
  require 'funciones/funciones.php';
  session_start();
  if(isset($_SESSION["id_usuario"])){
    header("Location: principal.php");
  }
	if(!empty($_POST)){
		$correoU = $mysqli->real_escape_string($_POST['correoU']);
		if(emailExiste($correoU)){
      $user_id = getValor('id', 'correo', $correoU);
			$nombre = getValor('nombre', 'correo', $correoU);
			$token = generaTokenPass($user_id);

			$url = 'http://'.$_SERVER["SERVER_NAME"].'/login2/cambiaClave.php?user_id='.$user_id.'&token='.$token; //Modificar

			$asunto = 'Recuperar Contraseña';
			$cuerpo = "Hola $nombre: <br><br>Se ha solicitado un reinicio de contraseña.
                 <br><br>Para restaurar la contraseña, visita la siguiente dirección:
                 <a href='$url'>$url</a>";
      if(enviarEmail($correoU, $nombre, $asunto, $cuerpo)){
        echo "Hemos enviado un correo electronico a las direcion $correoU para restablecer tu password.<br />";
        echo "<a href='index.php' >Iniciar Sesion</a>";
        exit;
      }
		} else {
			$ccorreo_error = "La direccion de correo electronico no existe";
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
              <i class="fas fa-envelope prefix"></i>
              <input class="validate" type="email" name="correoU" required>
              <label for="correoU">Ingrese su correo electrónico</label>
              <span class="helper-text" data-error="Ingrese un formato de correo válido."><?php if (isset($ccorreo_error)) echo $ccorreo_error; ?></span>
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
