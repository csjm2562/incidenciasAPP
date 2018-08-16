<form role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <div class="row">
    <div class="col s6">
      <div class="input-field">
        <input class="validate" type="text" name="incidencia">
        <label for="incidencia">Ingrese ID de la incidencia</label>
      </div>
    </div>
    <div class="col s6">
      <center>
        <div class="row">
          <button type="submit" class="btn btn-large waves-effect">Buscar</button>
        </div>
      </center>
    </div>
  </div>
  <div class="input-field col s12">
    <textarea class="materialize-textarea" name="comentario"></textarea>
    <label for="comentario">Comentarios</label>
  </div>
</form>
