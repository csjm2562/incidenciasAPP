<?php
  require 'funciones/conexion.php';
  require 'funciones/funciones.php';
  session_start();
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	$idUsuario = $_SESSION['id_usuario'];
	$sql = "SELECT id_usuario, nombre, apellido FROM usuario WHERE id_usuario = '$idUsuario'";
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
          <a href="principal.php" class="brand-logo">Logotipo</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php
              $producto = obtener_productos();
              $obtPro = obtener_productos_para_marcar($_SESSION['id_usuario']);
              if(count($producto)>0):
                echo "<ul id='dropdown1' class='dropdown-content'>";
                foreach($producto as $d):
                  $encontrado = false;
                  foreach($obtPro as $pc) {
                    if($pc->producto_id==$d->id_producto) {
                      $encontrado = true;
                      break;
                    }
                  }
                  if($encontrado) {
                    echo "<li><a href='#'>$d->descripcion</a></li>";
                  }
                endforeach;
                echo "</ul>";
              endif;
            ?>
            <ul id='dropdown2' class='dropdown-content'>
              <li><a href='#'>Reporte 1</a></li>
              <li><a href='#'>Reporte 2</a></li>
            </ul>
            <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Productos</a></li>
            <li><a class='dropdown-trigger' href='#' data-target='dropdown2'>Reportes</a></li>
            <li><a href="cierra.php" title="Cerrar sesión"><i class="fas fa-power-off"></i></a></li>
          </ul>

          <ul id="slide-out" class="sidenav collapsible">
            <?php
              $producto = obtener_productos();
              $obtPro = obtener_productos_para_marcar($_SESSION['id_usuario']);
              if(count($producto)>0):
                echo "<li>
                        <div class='collapsible-header black-text'>Productos</div>
                        <div class='collapsible-body'>
                          <ul>";
                foreach($producto as $d):
                  $encontrado = false;
                  foreach($obtPro as $pc) {
                    if($pc->producto_id==$d->id_producto) {
                      $encontrado = true;
                      break;
                    }
                  }
                  if($encontrado) {
                    echo "<li><a href='#'>$d->descripcion</a></li>";
                  }
                endforeach;
                echo "</ul>
                    </div>
                  </li>";
              endif;
            ?>
            <li>
              <div class="collapsible-header black-text">Reportes</div>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#">Reporte 1</a></li>
                  <li><a href="#">Reporte 2</a></li>
                </ul>
              </div>
            </li>
            <li><div class="divider"></div></li>
            <li><a href="cierra.php" title="Cerrar sesión"><i class="fas fa-power-off"></i>Cerrar sesión</a></li>
          </ul>
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
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
          <p><?php echo 'Bienvenido(a) '.utf8_decode($row['nombre']).' '.utf8_decode($row['apellido']); ?></p>
          <div class="container" id="contenido"></div>
        </div>
      </div>
    </div>
    <p style="background-color:#ffffff;margin:auto;width:90%;">Copyright © Johan Solano. Todos los derechos reservados.</p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.collapsible').collapsible();
      });
    </script>
  </body>
</html>
