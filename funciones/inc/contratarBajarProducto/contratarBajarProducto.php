<form role="form" id="productos" name="productos" method="post">
  <div class="row">
    <div class="input-field col s4">
      <p>
        <label>
          <input type="checkbox" checked="checked" />
          <span>Yellow</span>
        </label>
      </p>
      <select name="usuario" id="usuario">
        <option value="" disabled selected>Empleados</option>
      </select>
    </div>
  </div>
  <center>
    <div class="row">
      <div id="contenido2"></div><br>
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
