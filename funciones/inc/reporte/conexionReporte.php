<?php
  $mysqli = new mysqli("localhost","johan","root","login");
  if($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    $mysqli->set_charset("utf8");
  	$jsondata = array();
  	$jsondataList = array();
  	if($_GET['param1']=="cuantos")	{
  		$myquery = "SELECT COUNT(*) total FROM reportes";
  		$resultado = $mysqli->query($myquery);
  		$fila = $resultado ->fetch_assoc();
  		$jsondata['total'] = $fila['total'];
  	}	elseif($_GET["param1"]=="dame") {
  		$myquery = "SELECT * FROM reportes LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);
  		$resultado = $mysqli->query($myquery);
  		while($fila = $resultado ->fetch_assoc())	{
  			$jsondatareport = array();
        $jsondatareport["idReporte"] = $fila["idReporte"];
  			$jsondatareport["tipo"] = $fila["tipo"];
  			$jsondatareport["usuario"] = $fila["usuario"];
  			$jsondatareport["fecha"] = $fila["fecha"];
  			$jsondatareport["descripcion"] = $fila["descripcion"];
  			$jsondataList[]=$jsondatareport;
  		}
  		$jsondata["lista"] = array_values($jsondataList);
  	}
    header("Content-type:application/json; charset = utf-8");
    echo json_encode($jsondata);
    exit();
  }
?>
