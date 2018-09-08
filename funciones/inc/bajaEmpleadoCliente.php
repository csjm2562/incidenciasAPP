<form role="form" name="baja" id="baja" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="nombreU" required>
      <label for="nombreU">Ingrese usuario a eliminar</label>
      <span class="helper-text" data-error="Este campo no puede estar vacío."></span>
    </div>
    <button type="submit" class="btn btn-large waves-effect right col s6">Enviar</button>
  </div>
</form>
<div id="contenido2"></div>
<script>
  $('#baja').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_baja_empleado_cliente.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
