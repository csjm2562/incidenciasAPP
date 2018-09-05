<form role="form" id="alta_empleado_cliente" name="alta_empleado_cliente" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="nombreU" required>
      <label for="nombreU">Ingrese nombre de usuario</label>
    </div>
    <div class="input-field col s6">
      <input class="validate" type="email" name="correoU" required>
      <label for="correoU">Ingrese su correo electrónico</label>
    </div>
    <div class="input-field col s4">
      <input class="validate" type="text" name="nombre" required pattern="[A-Za-z ]+">
      <label for="nombre">Ingrese nombre</label>
    </div>
    <div class="input-field col s4">
      <input class="validate" type="text" name="apellido" required pattern="[A-Za-z ]+">
      <label for="apellido">Ingrese apellido</label>
    </div>
    <div class="input-field col s4">
      <input class="validate" type="password" name="claveU" minlength="6" required>
      <label for="claveU">Ingrese contraseña</label>
    </div>
  </div>
  <div class="row">
    <h5>Productos:</h5>
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
  $('#alta_empleado_cliente').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_alta_cliente.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
