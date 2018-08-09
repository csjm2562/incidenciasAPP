<?php
  require 'funciones/conexion.php';
  require 'funciones/funciones.php';
  session_start();
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	$idUsuario = $_SESSION['id_usuario'];
	$sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Incidencias APP</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link  href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s6">
          <div class="imgcontainer">
            <img src="img/img_logo2.png" alt="avatar" class="avatar">
          </div>
        </div>
        <div class="col s2">
          imagen1
        </div>
        <div class="col s2">
          imagen2
        </div>
        <div class="col s2">
          imagen3
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col s3">
          <ul class="acorh">
          <li><a href="#">menu1</a>
            <ul>
              <li><a href="URL11">Opción 1.1</a></li>
              <li><a href="URL12">Opción 1.2</a></li>
            </ul>
          </li>
          <li><a href="#">menu2</a>
            <ul>
              <li><a href="URL21">Opción 2.1</a></li>
              <li><a href="URL22">Opción 2.2</a></li>
              <li><a href="URL23">Opción 2.3</a></li>
            </ul>
          </li>
          <li><a href="#">menu3</a>
            <ul>
              <li><a href="URL31">Opción 3.1</a></li>
              <li><a href="URL32">Opción 3.2</a></li>
            </ul>
          </li>
          <li><a href="#">menu4</a>
            <ul>
              <li><a href="URL31">Opción 3.1</a></li>
              <li><a href="URL32">Opción 3.2</a></li>
            </ul>
          </li>
        </ul>
        </div>
        <div class="col 9">
          <div class="card-panel">

          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  </body>
</html>
