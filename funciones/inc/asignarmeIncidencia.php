<?php
  $con=mysqli_connect('localhost','johan','root','incidenciasapp') or die ('Error en la conexion');
  session_start();
  $idUsuario = $_SESSION['id_usuario'];
  $sql="SELECT * FROM usuario WHERE id_usuario = '$idUsuario'";
  $resultado=mysqli_query($con,$sql) or die ('Error en el query database');
  $fila = mysqli_fetch_array( $resultado );
  mysqli_free_result( $resultado );
  mysqli_close( $con );
?>
<h4>Asignarme incidencia</h4><br>
<form role="form" id="agregar_AI" name="agregar_AI" method="post">
  <input value="<?php echo ''.$fila['id_usuario']; ?>" type="hidden" name="usuario">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="incidencia" required>
      <label for="incidencia">Ingrese ID de la incidencia</label>
      <span class="helper-text" data-error="Este campo no puede estar vacío."></span>
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
