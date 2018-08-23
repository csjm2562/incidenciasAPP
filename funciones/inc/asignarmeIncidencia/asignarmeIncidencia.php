<form name="form" action="" onsubmit="enviarDatos(); return false">
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
          <button type="submit" name="enviar" class="btn btn-large waves-effect">Enviar</button>
        </div>
      </center>
    </div>
  </div>
</form>
<div id="resultado"></div>
<script>
  function objetoAjax() {
    var xmlhttp=false;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false;
      }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
	  }
    return xmlhttp;
  }
  function enviarDatos() {
    divResultado = document.getElementById('resultado');
    id=document.nuevo.incidencia.value;
    ajax=objetoAjax();
    ajax.open("POST", "conexionIncidencia.php",true);
    ajax.onreadystatechange=function() {
    	if (ajax.readyState==4) {
    		divResultado.innerHTML = ajax.responseText
    		LimpiarCampos();
  	  }
    }
	  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	  ajax.send("id="+incidencia)
  }
  function LimpiarCampos(){
    document.nuevo.incidencia.value="";
    document.nuevo.incidencia.focus();
  }
</script>
