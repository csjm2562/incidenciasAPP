<form role="form" id="baja_producto" name="baja_producto" method="post">
  <div class="row">
  <?php
    require_once (__DIR__.'/../funciones.php');
    $producto = obtener_productos();
    $contador = 0;
    session_start();
    $obtPro = obtener_productos_para_marcar($_SESSION['id_usuario']);
  ?>
  <?php if(count($producto)>0):?>
    <?php foreach($producto as $d):
      $encontrado = false;
      foreach($obtPro as $pc) {
        if($pc->producto_id==$d->id_producto) {
          $encontrado = true;
          break;
        }
      }
    ?>
      <?php
        if($contador == 0 ) {
          echo "<div class='col s3'>";
          $contador++;
        } else {
          $contador++;
        }
      ?>
      <p><label>
        <input type="checkbox" name="productos_<?php echo $d->id_producto; ?>" <?php if($encontrado){ echo "checked"; }?>>
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
  $('#baja_producto').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_baja_producto.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
