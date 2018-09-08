<h4>Reabrir incidencia</h4><br>
<form role="form" name="reabrir" id="reabrir" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="incidencia" required>
      <label for="incidencia">Ingrese ID de la incidencia</label>
      <span class="helper-text" data-error="Este campo no puede estar vacío."></span>
    </div>
    <button type="submit" class="btn btn-large waves-effect col s6">Abrir</button>
  </div>
</form>
<div id="contenido2"></div>
<script>
  $('#reabrir').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_reabrir_incidencia.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
