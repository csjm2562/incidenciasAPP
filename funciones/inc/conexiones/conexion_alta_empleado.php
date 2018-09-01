<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
  if ($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    require '../../funciones.php';
    $flag = false;
    if(!empty($_POST)){
      $nombre = $mysqli->real_escape_string($_POST['nombre']);
      $apellido = $mysqli->real_escape_string($_POST['apellido']);
      $nombreU = $mysqli->real_escape_string($_POST['nombreU']);
      $claveU = $mysqli->real_escape_string($_POST['claveU']);
      $activo = 1; //MODIFICAR; 0-Inactivo, 1-Activo
      $tipoU = 2; //MODIFICAR; 1-Administrador, 2-Empleado, 3-Cliente
      if(usuarioExiste($nombreU)){
        $flag = true;
        echo "El nombre de usuario $nombreU ya existe.";
        exit();
      }
      if(!$flag){
        $pass_hash = hashPassword($claveU);
        $registro = registraUsuario($nombreU, $pass_hash, $nombre, $apellido, $activo, $tipoU);
        echo "El usuario $nombreU fué creado exitosamente.";
      }
    }
  }
  exit();
?>
