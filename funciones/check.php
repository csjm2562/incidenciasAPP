<?php
	$mysqli = mysqli_connect("localhost", "johan", "root", "incidenciasapp"); //MODIFICAR
	if($mysqli->connect_errno) {
		echo "Falló al conectar".$mysqli->connect_errno;
		exit();
	}
	$nombreU = $_POST['nombreU'];
	$nombreUsql = "SELECT * FROM usuario WHERE nombre_usuario='$nombreU'";
	$nombreUes = mysqli_query($mysqli, $nombreUsql);
	$count = mysqli_num_rows($nombreUes);
	if($count == 1){
		 echo  "<span class='red-text'>Nombre de usuario no disponible.<span>";
	}
?>
