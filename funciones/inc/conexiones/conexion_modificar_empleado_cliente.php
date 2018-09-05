<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
  if ($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    if (empty($_POST['nombreU'])) {
      echo "Por favor ingrese el nombre de usuario.";
      exit();
    }
    if (!empty($_POST['nombreU'])) {
      echo "<h4>Productos</h4>";    
      $query = "SELECT * FROM producto";
      $contador = 0;
      $resultado = $mysqli->query($query);
      while($row = mysqli_fetch_array($resultado)) {
        if($contador == 0 ) {
          echo "<div class='col s3'>";
          $contador++;
        } else {
          $contador++;
        }
          echo "<p><label>
                  <input type='checkbox' name='productos[]' value='".$row["id_producto"]."'>
                  <span>".$row['descripcion']."</span>
                </label></p>";
          if ($contador == 10) {
            echo "</div>";
            $contador = 0;
          }
      }
    } else {
      echo "Error desconocido.";
    }
  }
  exit();
?>
