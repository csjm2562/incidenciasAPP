<?php
  $connection = mysqli_connect("localhost","johan","root","incidenciasapp"); //MODIFICAR
  if(isset($_POST) & !empty($_POST)){
    $correoU = $_POST['correoU'];
    $pass = rand(999, 99999);
	  $newpass = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM `usuario` WHERE ";
      if(filter_var($correoU, FILTER_VALIDATE_EMAIL)){
        $sql .= "correo='$correoU'";
      }else{
        $sql .= "nombre_usuario='$correoU'";
      }
    $res = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($res);
    if($count == 1){
      $r = mysqli_fetch_assoc($res);
	  $nombre_usuario = $r['nombre_usuario'];
      $usql = "UPDATE usuario SET password='$newpass' WHERE nombre_usuario='$nombre_usuario'";
      $result = mysqli_query($connection, $usql);
      if($result){
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = ' '; //Modificar
		$mail->Host = ' '; //Modificar
		$mail->Port = 0; //Modificar
		$mail->Username = ' '; //Modificar
		$mail->Password = ' '; //Modificar
		$mail->setFrom('correo', 'asunto'); //Modificar
		$mail->addAddress($correoU, $nombre_usuario);
        $mail->Subject = 'Nueva contraseña';
        $mail->Body    = "Tu nueva contraseña es $pass";
		$mail->IsHTML(true);
        if(!$mail->send()) {
            echo 'El correo no pudo ser enviado.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Un mensaje fué enviado a '.$correoU;
        }
      }else{
        echo "Falló al actualizar la contraseña.";
      }
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
		</form>
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

      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  </body>
</html>
