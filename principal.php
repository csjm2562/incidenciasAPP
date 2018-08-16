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
    <div class="principal">
      <nav>
        <div class="nav-wrapper teal">
          <a href="principal.php" class="brand-logo">Logo</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="cierra.php" title="Cerrar sesión"><i class="fas fa-power-off"></i></a></li>
          </ul>
        </div>
      </nav>
      <div class="row">
        <div class="col s3">
          <?php
            if($_SESSION['tipo_usuario']==1)
              include_once("funciones/menu1.html");
            if($_SESSION['tipo_usuario']==2)
              include_once("funciones/menu2.html");
            if($_SESSION['tipo_usuario']==3)
              include_once("funciones/menu3.html");
          ?>
        </div>
        <div class="col s9">
          <p><?php echo 'Bienvenido(a) '.utf8_decode($row['nombre']); ?></p>
          <div class="container" id="contenido"></div>
        </div>
      </div>
    </div>
    <p style="background-color:#ffffff;margin:auto;width:90%;">Copyright © Johan Solano. Todos los derechos reservados.</p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  </body>
</html>
