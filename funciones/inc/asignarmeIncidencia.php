<?php
  $con=mysqli_connect('localhost','johan','root','incidenciasapp') or die ('Error en la conexion');
  session_start();
  $idUsuario = $_SESSION['id_usuario'];
  $sql="SELECT * FROM usuario WHERE id = '$idUsuario'";
  $resultado=mysqli_query($con,$sql) or die ('Error en el query database');
  $fila = mysqli_fetch_array( $resultado );
  mysqli_free_result( $resultado );
  mysqli_close( $con );
?>
<form role="form" id="agregar_AI" name="agregar_AI" method="post">
  <input value="<?php echo ''.$fila['id']; ?>" type="hidden" name="usuario">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="incidencia">
      <label for="incidencia">Ingrese ID de la incidencia</label>
    </div>
    <button type="submit" name="enviar" class="btn btn-large waves-effect col s6">Enviar</button>
  </div>
</form>
<div id="resultados_ai"></div>
<script>
  $('#agregar_AI').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_asignarme_incidencia.php",
      data: parametros,
      success: function(data) {
        $('#resultados_ai').html(data);
      }
    });
    event.preventDefault();
  });
</script>
