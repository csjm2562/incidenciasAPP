<form role="form" name="modificar" id="modificar" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="incidencia">
      <label for="incidencia">Ingrese ID de la incidencia</label>
    </div>
    <div class="input-field col s12">
      <textarea class="materialize-textarea" name="comentario"></textarea>
      <label for="comentario">Comentarios</label>
    </div>
    <button type="submit" class="btn btn-large waves-effect right">Guardar</button>
  </div>
</form>
<div id="contenido2"></div>
<script>
  $('#modificar').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/modificarIncidencia/cargaMI.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
