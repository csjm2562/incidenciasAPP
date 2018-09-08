<h4>Contratar productos</h4><br>
<form role="form" id="contrata_producto" name="contrata_producto" method="post">
  <div class="row">
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
  $('#contrata_producto').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_contrata_producto.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
