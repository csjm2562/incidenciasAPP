<?php
  $mysqli = new mysqli("localhost","johan","root","login"); //MODIFICAR
  if ($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    if (empty($_POST['nombreU'])) {
      echo "Por favor ingrese el nombre de usuario.";
      exit();
    }
    if (!empty($_POST['nombreU'])) {
      $nombreU = $_POST["nombreU"];
      $query = "UPDATE usuarios SET activacion=0 WHERE usuario='$nombreU'";
      $resultado = $mysqli->query($query);
      echo "El usuario ".$nombreU." fué dado de baja.";
    } else {
      echo "Error desconocido.";
    }
  }
  exit();
?>
