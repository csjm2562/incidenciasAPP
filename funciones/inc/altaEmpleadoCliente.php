<form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="row">
    <div class="col s12">
      <div class="input-field">
        <input class="validate" type="text" name="nombreU" required>
        <label for="nombreU">Nombre de usuario</label>
      </div>
      <div class="input-field">
        <input class="validate" type="password" name="claveU" minlength="6" required>
        <label for="claveU">Ingrese contraseña</label>
      </div>
      <div class="input-field">
        <input class="validate" type="text" name="nombre" required pattern="[A-Za-z ]+">
        <label for="nombre">Ingrese nombre</label>
      </div>
      <div class="input-field">
        <input class="validate" type="text" name="apellido" required pattern="[A-Za-z ]+">
        <label for="apellido">Ingrese apellido</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s6">
        <h6 class="right">Productos: </h6>
    </div>
    <div class="col s6">
      <label>
        <input type="checkbox">
        <span>Producto 1</span>
      </label><br>
      <label>
        <input type="checkbox">
        <span>Producto 2</span>
      </label>
    </div>
  </div><br>
  <center>
    <div class="row">
      <button type="submit" class="col s12 btn btn-large waves-effect">Enviar</button>
    </div>
  </center>
</form>
