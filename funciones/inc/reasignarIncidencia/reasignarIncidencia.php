<form role="form" id="agregar_RI" name="agregar_RI" method="post">
  <div class="row">
    <div class="input-field col s6">
      <input class="validate" type="text" name="incidencia">
      <label for="incidencia">Ingrese ID de la incidencia</label>
    </div>
    <div class="input-field col s6">
      <select name="usuario" id="usuario">
        <option value="" disabled selected>Empleados</option>
      </select>
    </div>
  </div>
  <center>
    <div class="row">
      <div id="resultados_ri"></div><br>
      <button type="submit" class="col s12 btn btn-large waves-effect">Enviar</button>
    </div>
  </center>
</form>
<script>
  $select = $('#usuario');
  $.ajax({
    url:"funciones/inc/reasignarIncidencia/queryRI.php",
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
      url: "funciones/inc/reasignarIncidencia/guardarRI.php",
      data: parametros,
      success: function(data) {
        $('#resultados_ri').html(data);
      }
    });
    event.preventDefault();
  });
</script>
