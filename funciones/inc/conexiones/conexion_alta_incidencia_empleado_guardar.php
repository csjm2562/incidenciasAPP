<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
  if ($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    if (empty($_POST['localizacion']) || empty($_POST['cliente'])) {
      echo "Por favor rellene los campos 'Localización' y 'Clientes'.";
      exit();
    }
    if($_POST) {
      session_start();
      $id = $_SESSION['id_usuario'];
      $hora = time().'~';
      $url = strtotime($_POST['selec_desde']).'_'.strtotime($_POST['selec_hasta']).'_'.$_POST['localizacion'];
      $hora_actual = time();
      $query = "INSERT INTO incidencia (id_incidencia, id_cliente, id_empleado, estado_actual, historico_estado, hora_estado, url_video, hora_estado_actual, peticion_servicio, comentarios, localizacion)
                VALUES (NULL, '".$_POST['cliente']."', '$id', '2', '2~', '$hora', '$url', '$hora_actual', '0', '".$_POST['comentario']."', '".$_POST['localizacion']."')";
      if(mysqli_query($mysqli, $query)) {
        echo "Los datos se anexaron correctamente.";
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
      }
    }
  }
  exit();
?>
