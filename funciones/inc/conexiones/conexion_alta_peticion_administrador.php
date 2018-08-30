<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
  if ($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    if($_POST) {
      session_start();
      $hora = time().'~';
      $hora_actual = time();
      $query = "INSERT INTO incidencia (id_incidencia, id_producto, id_cliente, id_empleado, estado_actual, historico_estado, hora_estado, url_video, hora_estado_actual, peticion_servicio, comentarios, localizacion)
                VALUES ('NULL', '1', '".$_SESSION['id_usuario']."', 'NULL', '1', '1~', '$hora', 'NULL', '$hora_actual', '1', '".$_POST['comentario']."', 'NULL')";
      if(mysqli_query($mysqli, $query)) {
        echo "Los datos se anexaron correctamente.";
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
      }
    }
  }
  exit();
?>
