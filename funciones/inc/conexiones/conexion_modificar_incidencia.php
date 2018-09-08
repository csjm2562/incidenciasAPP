<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
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
      $usuario = $_POST["usuario"];
      $sql="SELECT * FROM incidencia WHERE id_incidencia='$incidencia'";
      $resultado=mysqli_query($mysqli,$sql) or die ('Error en el query database');
      $fila = mysqli_fetch_array( $resultado );
      if ($fila['id_cliente'] == $usuario) {
        $query = "UPDATE incidencia SET comentarios='$comentario' WHERE id_incidencia='$incidencia'";
        $resultado = $mysqli->query($query);
        echo "La incidencia ".$incidencia." fué actualizada con ".$comentario;
      } else {
        echo "El ID: ".$incidencia." no está asociado a tu cuenta. Intenta con otro.";
      }
    } else {
      echo "Error desconocido.";
    }
  }
  exit();
?>
