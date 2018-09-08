<form role="form" id="alta_empleado_cliente" name="alta_empleado_cliente" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="nombreU" required>
      <label for="nombreU">Ingrese nombre de usuario</label>
      <span class="helper-text" data-error="El nombre de usuario no puede estar vacío."></span>
    </div>
    <div class="input-field col s6">
      <input class="validate" type="email" name="correoU" required>
      <label for="correoU">Ingrese su correo electrónico</label>
      <span class="helper-text" data-error="Ingrese un formato de correo válido."></span>
    </div>
    <div class="input-field col s4">
      <input class="validate" type="text" name="nombre" required pattern="[A-Za-z ]+">
      <label for="nombre">Ingrese nombre</label>
      <span class="helper-text" data-error="El nombre no puede contener caracteres númericos ni especiales."></span>
    </div>
    <div class="input-field col s4">
      <input class="validate" type="text" name="apellido" required pattern="[A-Za-z ]+">
      <label for="apellido">Ingrese apellido</label>
      <span class="helper-text" data-error="El apellido no puede contener caracteres númericos ni especiales."></span>
    </div>
    <div class="input-field col s4">
      <input class="validate" type="password" name="claveU" minlength="8" required>
      <label for="claveU">Ingrese contraseña</label>
      <span class="helper-text" data-error="La contraseña debe de tener un mínimo de 8 caracteres."></span>
    </div>
  </div>
  <div class="row">
    <h5>Productos:</h5>
    <?php
      require_once (__DIR__.'/../funciones.php');
      $producto = obtener_productos();
      $contador = 0;
    ?>
    <?php if(count($producto)>0):?>
      <?php foreach($producto as $d):?>
        <?php
          if($contador == 0 ) {
            echo "<div class='col s3'>";
            $contador++;
          } else {
            $contador++;
          }
        ?>
        <p><label>
          <input type="checkbox" name="productos_<?php echo $d->id_producto; ?>">
          <span><?php echo $d->descripcion; ?></span>
        </label></p>
        <?php
          if ($contador == 10) {
            echo "</div>";
            $contador = 0;
          }
        ?>
      <?php endforeach; ?>
    <?php endif; ?>
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
      url: "funciones/inc/conexiones/conexion_alta_empleado.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
