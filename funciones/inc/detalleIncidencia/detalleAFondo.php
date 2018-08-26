<?php
  if (empty($_POST['incidencia'])) {
    echo "Por favor ingrese el ID de la incidencia.";
    exit();
  }
  if (!empty($_POST['incidencia'])) {
    $con=mysqli_connect('localhost','johan','root','login') or die ('Error en la conexion');
    $incidencia = $_POST["incidencia"];
    $sql="SELECT * FROM incidencia WHERE idIncidencia = '$incidencia'";
    $resultado=mysqli_query($con,$sql) or die ('Error en el query database');
    $fila = mysqli_fetch_array( $resultado );
    mysqli_free_result( $resultado );
    mysqli_close( $con );
    echo ''.$fila['localizacion'];
?>
    <div class="video-container">
      <?php echo "".$fila['url_video']; ?>
    </div>
<?php
  } else {
    echo "Error desconocido.";
  }
  exit();
?>
