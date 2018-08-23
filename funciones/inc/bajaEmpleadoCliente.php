<?php
  chdir("../");
  require 'conexion.php';

  chdir("inc/");
?>
<form name="form" action="" onsubmit="enviarDatos(); return false">
  <div class="row">
    <div class="col s6">
      <div class="input-field">
        <input class="validate" type="text" name="nombreU" required>
        <label for="nombreU">Ingrese usuario a eliminar</label>
      </div>
    </div>
    <div class="col s6">
      <center>
        <div class="row">
          <button type="submit" class="btn btn-large waves-effect">Enviar</button>
        </div>
      </center>
    </div>
  </div>
  <div id="contenidoMenu">

  </div>
</form>
