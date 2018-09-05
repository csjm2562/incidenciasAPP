<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
  if ($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    if (!empty($_POST)) {
      require_once (__DIR__.'/../../funciones.php');
	    $productos = obtener_productos();
      session_start();
      $id = $_SESSION['id_usuario'];
      $sql = "DELETE FROM producto_usuario WHERE usuario_id='$id'";
	    $mysqli->query($sql);
    	foreach($productos as $prod) {
    		if(isset($_POST["productos_".$prod->id_producto])) {
      		$sql = "INSERT INTO producto_usuario (producto_id, usuario_id) VALUES ('".$prod->id_producto."','".$_SESSION['id_usuario']."')";
          $mysqli->query($sql);
    		}
    	}
    }
    echo "Los productos fueron dados de baja con éxito.";
    exit();
  }
?>
