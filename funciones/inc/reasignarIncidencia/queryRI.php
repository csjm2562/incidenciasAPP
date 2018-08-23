<?php
  $mysqli = new mysqli("localhost","johan","root","login"); //MODIFICAR
  if($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    $mysqli->set_charset("utf8");
    $query = "SELECT * FROM usuarios WHERE id_tipo = '2'";
    $resultado = $mysqli->query($query);
    $jsondata['seleccionUsuario'] = '';
    while($row = mysqli_fetch_array($resultado)) {
      $jsondata['seleccionUsuario'] .= '<option name="usuario" id="usuario" value="'.$row["id"].'">'.$row["nombre"].'</option>';
    }
    header('Content-type: application/json; charset=utf-8');
    print_r(json_encode($jsondata));
  }
  exit();
?>
