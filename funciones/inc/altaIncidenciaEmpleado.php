<?php
echo "".strtotime("selec_hasta");
 ?>
<form role="form" id="alta_incidencia_empleado" name="alta_incidencia_empleado" method="post">
  <div class="row">
    <div class="input-field col s6">
      <select name="localizacion" id="localizacion">
        <option value="" disabled selected>Localización</option>
        <?php
          for ($i=1; $i <= 20; $i++) {
            echo "<option value='$i'>$i</option>";
          }
        ?>
      </select>
    </div>
    <div class="input-field col s6">
      <select name="cliente" id="cliente">
        <option value="" disabled selected>Seleccione clientes</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s3">
      <input type="time" name="selec_desde" value="<?php date_default_timezone_set("America/Caracas"); echo date("h:i:s", strtotime("- 1 minute"));?>">
      <label class="active" for="selec_desde">Desde</label>
    </div>
    <div class="input-field col s3">
      <input type="time" name="selec_hasta" value="<?php date_default_timezone_set("America/Caracas"); echo date("h:i:s");?>">
      <label class="active" for="selec_hasta">Hasta</label>
    </div>
    <div class="input-field col s6">
      <input type="text" class="datepicker" name="selec_dia" value="<?php echo date("d-m-Y");?>">
      <label class="active" for="selec_dia">Fecha</label>
    </div>
  </div>
  <div class="input-field col s12">
    <textarea class="materialize-textarea" name="comentario" required></textarea>
    <label for="comentario">Comentarios</label>
  </div><br>
  <center>
    <div class="row">
      <button type="submit" class="col s12 btn btn-large waves-effect">Enviar</button>
    </div>
  </center>
</form>
<div id="resultados"></div>
<script>
  $(document).ready(function(){
    $('input#localizacion').characterCounter();
    $('select').formSelect();
    $('.datepicker').datepicker({
      format: 'dd-mm-yyyy',
      i18n: {
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
        weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
        cancel: 'Cancelar'
      }
    });
    $('.timepicker').timepicker({
      i18n: {
        done: 'OK',
        cancel: 'Cancelar'
      }
    });
  });
  $select = $('#cliente');
  $.ajax({
    url:"funciones/inc/conexiones/conexion_alta_incidencia_empleado_leer.php",
    dataType:'JSON',
    success:function(response){
      $select.append(response.seleccionCliente);
      $('select').formSelect();
    },
    error:function(){
      $select.html('<option id="-1">Error!</option>');
    }
  });
  $('#alta_incidencia_empleado').submit(function(event){
    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "funciones/inc/conexiones/conexion_alta_incidencia_empleado_guardar.php",
      data: parametros,
      success: function(data) {
        $('#resultados').html(data);
      }
    });
    event.preventDefault();
  });
</script>
