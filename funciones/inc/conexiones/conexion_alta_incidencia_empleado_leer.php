<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
  if($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    $mysqli->set_charset("utf8");
    $query = "SELECT * FROM usuario WHERE id_tipo = '3' && id_producto = 1";
    $resultado = $mysqli->query($query);
    $jsondata['seleccionCliente'] = '';
    while($row = mysqli_fetch_array($resultado)) {
      $jsondata['seleccionCliente'] .= '<option name="cliente" id="cliente" value="'.$row["id_usuario"].'">'.$row["nombre_usuario"].'</option>';
    }
    header('Content-type: application/json; charset=utf-8');
    print_r(json_encode($jsondata));
  }
  exit();
?>
