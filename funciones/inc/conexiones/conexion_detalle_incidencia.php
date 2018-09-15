<?php
  if (empty($_POST['incidencia'])) {
    echo "Por favor ingrese el ID de la incidencia.";
    exit();
  }
  if (!empty($_POST['incidencia'])) {
    $con=mysqli_connect('localhost','johan','root','incidenciasapp') or die ('Error en la conexion');
    $incidencia = $_POST["incidencia"];
    $usuario = $_POST["usuario"];
    $sql="SELECT * FROM incidencia WHERE id_incidencia='$incidencia'";
    $resultado=mysqli_query($con,$sql) or die ('Error en el query database');
    $fila = mysqli_fetch_array( $resultado );
    if ($fila['id_cliente'] == $usuario || $fila['id_empleado'] == $usuario) {
      $sql="SELECT * FROM incidencia WHERE id_incidencia = '$incidencia'";
      $resultado=mysqli_query($con,$sql) or die ('Error en el query database');
      $fila = mysqli_fetch_array( $resultado );
      mysqli_free_result( $resultado );
      mysqli_close( $con );
      echo '<b>Localización: </b>'.$fila['localizacion'];
      echo '<br><b>Comentarios: </b>'.$fila['comentarios'];
      echo '<br><video class="responsive-video" controls><source src="'."media/".$fila['url_video'].'"></video>';
    } else {
      echo "El ID: ".$incidencia." no está asociado a tu cuenta. \nIntenta con otro.";
    }
  } else {
    echo "Error desconocido.";
  }
  exit();
?>
