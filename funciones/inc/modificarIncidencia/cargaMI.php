<?php
  $mysqli = new mysqli("localhost","johan","root","login"); //MODIFICAR
  if ($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    if (empty($_POST['incidencia'])) {
      echo "Por favor ingrese el ID de la incidencia.";
      exit();
    }
    if (!empty($_POST['incidencia'])) {
      $incidencia = $_POST["incidencia"];
      $comentario = $_POST["comentario"];
      $query = "UPDATE incidencia SET comentarios='$comentario' WHERE idIncidencia='$incidencia'";
      $resultado = $mysqli->query($query);
      echo "La incidencia ".$incidencia." fué actualizada con ".$comentario;
    } else {
      echo "Error desconocido.";
    }
  }
  exit();
?>
