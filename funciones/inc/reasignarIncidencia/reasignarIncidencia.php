<form role="form" id="agregar_RI" name="agregar_RI" method="post">
  <div class="input-field">
    <input class="validate" type="text" name="incidencia">
    <label for="incidencia">Ingrese ID de la incidencia</label>
  </div><br>
  <div class="input-field col s5">
    <select name="usuario" id="usuario">
      <option value="" disabled selected>Selecciona una opción</option>
    </select>
    <label>Desplegable empleados</label>
  </div><br>
  <center>
    <div class="row">
      <div id="resultados_ri"></div>
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
</script>
