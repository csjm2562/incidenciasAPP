<form role="form" name="modificarIP" id="modificarIP" method="post">
  <div class="row">
    <div class="input-field col s12">
      <textarea class="materialize-textarea" name="comentario"></textarea>
      <label for="comentario">Comentarios</label>
    </div>
    <button type="submit" class="btn btn-large waves-effect right">Guardar</button>
  </div>
</form>
<div id="contenido2"></div>
<script>
  $('#modificarIP').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/altaIncidenciaPeticionAdministradorCliente/cargaIP.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
