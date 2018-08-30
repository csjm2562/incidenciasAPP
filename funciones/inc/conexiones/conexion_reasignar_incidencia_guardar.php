<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
  if ($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    if (empty($_POST['incidencia'])) {
      echo "Por favor ingrese el ID de la incidencia.";
      exit();
    }
    if (empty($_POST['usuario'])) {
      echo "Por favor ingrese un empleado para asignarle la incidencia ".$incidencia = $_POST["incidencia"];
      exit();
    }
    if (!empty($_POST['incidencia']) && !empty($_POST['usuario'])) {
      $incidencia = $_POST["incidencia"];
      $idUsuario = $_POST["usuario"];
      $query = "UPDATE incidencia SET id_empleado='$idUsuario' WHERE id_incidencia='$incidencia'";
      $resultado = $mysqli->query($query);
      echo "La incidencia ".$incidencia." fué asignada correctamente.";
    } else {
      echo "Error desconocido.";
    }
  }
  exit();
?>
