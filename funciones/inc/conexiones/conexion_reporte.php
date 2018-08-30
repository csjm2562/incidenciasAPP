<?php
  $mysqli = new mysqli("localhost","johan","root","incidenciasapp");
  if($mysqli->connect_errno) {
    echo "Falló al conectar".$mysqli->connect_errno;
  } else {
    $mysqli->set_charset("utf8");
  	$jsondata = array();
  	$jsondataList = array();
  	if($_GET['param1']=="cuantos")	{
  		$myquery = "SELECT COUNT(*) total FROM reporte";
  		$resultado = $mysqli->query($myquery);
  		$fila = $resultado ->fetch_assoc();
  		$jsondata['total'] = $fila['total'];
  	}	elseif($_GET["param1"]=="dame") {
  		$myquery = "SELECT * FROM reporte LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);
  		$resultado = $mysqli->query($myquery);
  		while($fila = $resultado ->fetch_assoc())	{
  			$jsondatareport = array();
        $jsondatareport["id_reporte"] = $fila["id_reporte"];
  			$jsondatareport["id_cliente"] = $fila["id_cliente"];
  			$jsondatareport["tipo_reporte"] = $fila["tipo_reporte"];
  			$jsondatareport["fecha"] = $fila["fecha"];
  			$jsondataList[]=$jsondatareport;
  		}
  		$jsondata["lista"] = array_values($jsondataList);
  	}
    header("Content-type:application/json; charset = utf-8");
    echo json_encode($jsondata);
    exit();
  }
?>
