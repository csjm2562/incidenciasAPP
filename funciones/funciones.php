<?php
	function validaPassword($var1, $var2)	{
		if (strcmp($var1, $var2) !== 0) {
			return false;
		} else {
			return true;
		}
	}

	function usuarioExiste($usuario) {
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT id_usuario FROM usuario WHERE nombre_usuario = ? LIMIT 1");
		$stmt->bind_param("s", $usuario);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		if ($num > 0) {
			return true;
		} else {
			return false;
		}
	}

	function emailExiste($email) {
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT id_usuario FROM usuario WHERE correo = ? LIMIT 1");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();
		if ($num > 0){
			return true;
		} else {
			return false;
		}
	}

	function hashPassword($password) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}

	function resultBlock($errors) {
		if(count($errors) > 0) {
			echo "<div class='modal'><div class='modal-content'><h4>Error</h4>";
			foreach($errors as $error)
			{ echo "<li>".$error."</li>";	}
			echo "</ul>";
			echo "</div>";
			echo "</div></div>";
		}
	}

	function registraUsuario($usuario, $pass_hash, $nombre, $apellido, $correoU, $activo, $tipo_usuario, $id_producto) {
		global $mysqli;
		$stmt = $mysqli->prepare("INSERT INTO usuario (id_tipo, id_producto, nombre_usuario, password, nombre, apellido, correo, activacion) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->bind_param('iisssssi', $tipo_usuario, $id_producto, $usuario, $pass_hash, $nombre, $apellido, $correoU, $activo);
		if ($stmt->execute()) {
			return $mysqli->insert_id;
		} else {
			return 0;
		}
	}

	function login($usuario, $password)	{
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT id_usuario, id_tipo, password FROM usuario WHERE nombre_usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		if($rows > 0) {			
			if(isActivo($usuario)){
				$stmt->bind_result($id, $id_tipo, $passwd);
				$stmt->fetch();
				$validaPassw = password_verify($password, $passwd);
				if($validaPassw) {
					$_SESSION['id_usuario'] = $id;
					$_SESSION['tipo_usuario'] = $id_tipo;
					header("location: principal.php");
				} else {
					$errors = "La contraseña es incorrecta";
				}
			} else {
				$errors = 'El usuario no esta activo';
			}
		} else {
			$errors = "El nombre de usuario o correo electrónico no existe";
		}
		return $errors;
	}
/*
	function lastSession($id)	{
		global $mysqli;
		$stmt = $mysqli->prepare("UPDATE usuarios SET last_session=NOW(), token_password='', password_request=0 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}
*/
	function isActivo($usuario)	{
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT activacion FROM usuario WHERE nombre_usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param("ss", $usuario, $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();
		if ($activacion == 1) {
			return true;
		}	else	{
			return false;
		}
	}
/*
	function getValor($campo, $campoWhere, $valor) {
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		if ($num > 0)	{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}	else	{
			return null;
		}
	}
*/
	function obtener_productos(){
		$mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
		$sql = "SELECT * FROM producto";
		$query=$mysqli->query($sql);
		$data =  array();
		if($query){
			while($r = $query->fetch_object()){
				$data[] = $r;
			}
		}
		return $data;
	}

	function obtener_productos_para_marcar($id){
		$mysqli = new mysqli("localhost","johan","root","incidenciasapp"); //MODIFICAR
		$sql = "SELECT * FROM producto_usuario WHERE usuario_id='$id'";
		$query = $mysqli->query($sql);
		$data = array();
		if($query){
			while($r = $query->fetch_object()){
				$data[] = $r;
			}
		}
		return $data;
	}
