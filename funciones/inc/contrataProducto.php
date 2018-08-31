<form role="form" id="contrata_producto" name="contrata_producto" method="post">
  <div class="row">
  <?php
    $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
    if($mysqli->connect_errno) {
      echo "Falló al conectar".$mysqli->connect_errno;
    } else {
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
    }
  ?>
  </div>
  <div class="row">
    <button type="submit" class="col s12 btn btn-large waves-effect">Enviar</button>
  </div>
</form>
<div id="contenido2"></div>
<script>

</script>
