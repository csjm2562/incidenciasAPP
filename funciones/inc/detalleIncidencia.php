<h4>Detalle de incidencia</h4><br>
<form role="form" name="detalle" id="detalle" method="post">
  <input value="<?php session_start(); echo ''.$_SESSION['id_usuario']; ?>" type="hidden" name="usuario">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="incidencia" required>
      <label for="incidencia">Ingrese ID de la incidencia</label>
      <span class="helper-text" data-error="Este campo no puede estar vacío."></span>
    </div>
    <button class="btn btn-large waves-effect col s6">Buscar</button>
  </div>
</form>
<div id="contenido2"></div>
<script>
  $('#detalle').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_detalle_incidencia.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
