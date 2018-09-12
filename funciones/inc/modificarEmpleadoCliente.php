<form role="form" name="modificar" id="modificar" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="nombreU" required>
      <label for="nombreU">Ingrese nombre de usuario</label>
      <span class="helper-text" data-error="Este campo no puede estar vacío."></span>
    </div>
    <button type="submit" class="btn btn-large waves-effect col s4 right">Enviar</button>
  </div>
</form>
<div id="contenido2"></div>
<script>
  $('#modificar').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_modificar_empleado_cliente_leer.php",
      data: parametros,
      success: function(data) {
        $('#contenido2').html(data);
      }
    });
    event.preventDefault();
  });
</script>
