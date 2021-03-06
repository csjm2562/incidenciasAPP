<h4>Reasignar incidencias</h4><br>
<form role="form" id="agregar_RI" name="agregar_RI" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="incidencia" required>
      <label for="incidencia">Ingrese ID de la incidencia</label>
      <span class="helper-text" data-error="Este campo no puede estar vacío."></span>
    </div>
    <div class="input-field col s6">
      <select name="usuario" id="usuario">
        <option value="" disabled selected>Empleados</option>
      </select>
    </div>
  </div>
  <center>
    <div class="row">
      <button type="submit" class="col s12 btn btn-large waves-effect">Enviar</button>
    </div>
  </center>
</form>
<div id="resultados_ri"></div><br>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
  $select = $('#usuario');
  $.ajax({
    url:"funciones/inc/conexiones/conexion_reasignar_incidencia_leer.php",
    dataType:'JSON',
    success:function(response){
      $select.append(response.seleccionUsuario);
      $('select').formSelect();
    },
    error:function(){
      $select.html('<option id="-1">Error!</option>');
    }
  });
  $('#agregar_RI').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_reasignar_incidencia_guardar.php",
      data: parametros,
      success: function(data) {
        $('#resultados_ri').html(data);
      }
    });
    event.preventDefault();
  });
</script>
