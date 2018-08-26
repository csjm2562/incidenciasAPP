<form role="form" name="reabrir" id="reabrir" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="incidencia">
      <label for="incidencia">Ingrese ID de la incidencia</label>
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
      url: "funciones/inc/reabrirIncidencia/conexionIncidencia.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
