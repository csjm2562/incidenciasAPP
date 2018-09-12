<?php
    if (!empty($_POST['nombreU'])) {
	  echo "<h4>Productos</h4>";
      $con=mysqli_connect('localhost','johan','root','incidenciasapp') or die ('Error en la conexion');
	  $usuario=$_POST['nombreU'];
      $sql="SELECT * FROM usuario WHERE nombre_usuario = '$usuario'";
      $resultado=mysqli_query($con,$sql) or die ('Error en el query database');
      $fila = mysqli_fetch_array( $resultado );
      mysqli_free_result( $resultado );
      mysqli_close( $con );
      require_once (__DIR__.'/../../funciones.php');
      $producto = obtener_productos();
      $contador = 0;
      $obtPro = obtener_productos_para_marcar($fila['id_usuario']);
	  echo "<form role='form' name='actualizar' id='actualizar' method='post'>";
?>
	    <input type="text" name="nombreU" hidden value="<?php echo $fila['id_usuario']; ?>">
<?php
	    echo "<div class='row'>";
        if(count($producto)>0):
          foreach($producto as $d):
            $encontrado = false;
            foreach($obtPro as $pc) {
              if($pc->producto_id==$d->id_producto) {
                $encontrado = true;
                break;
              }
            }
            if($contador == 0 ) {
              echo "<div class='col s3'>";
              $contador++;
            } else {
              $contador++;
            }
            echo "<p><label>";
?>
              <input type="checkbox" name="productos_<?php echo $d->id_producto; ?>" <?php if($encontrado){ echo "checked"; }?>>
              <span><?php echo $d->descripcion; ?></span>
<?php
			echo "</label></p>";
            if ($contador == 10) {
              echo "</div>";
              $contador = 0;
            }
          endforeach;
        endif;
		echo "</div>";
        echo "<button type='submit' class='btn btn-large waves-effect col s6 offset-s3'>Modificar</button>";
	  echo "</form>";
    } else {
      echo "Error desconocido.";
    }
?>
<div id="contenido2"></div>
<script>
  $('#actualizar').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_modificar_empleado_cliente_guardar.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>