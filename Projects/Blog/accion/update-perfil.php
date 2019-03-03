<?php 
if (isset($_POST['editar'])) {
	//Conexión a la base de datos
	include_once '../includes/conexion.php';	
	//Recoger los valores que nos llegan por POST
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, trim($_POST['nombre'])) : null;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, trim($_POST['apellidos'])) : null;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : null;
	$usuario = (int) $_SESSION['usuario']['idusuarios'];

	//Array de Errores
	$errores = [];

	//Validar los datos antes de guardarlos en la base de datos
	//Validando nombre
	if (empty($nombre)) {
		$nombre = $_SESSION['usuario']['nombre'];
	}
	if (is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) {
		$errores['nombre'] = "El nombre no es valido";		
	}
	//Validando apellidos
	if (empty($apellidos)) {
		$apellidos = $_SESSION['usuario']['apellidos'];
	}
	if (is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)) {
		$errores['apellidos'] = "Los apellidos no son validos";
	}
	//Validando Email
	if (empty($email)) {
		$email = $_SESSION['usuario']['email'];
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores['email'] = "El email no es valido";
	}

	//Insertando usuario en la base de datos
	if (count($errores) == 0) {	

		//Comprobar si el email ya existe
		$sql = "SELECT idusuarios, email FROM usuarios WHERE email = '$email'";
		$query1 = mysqli_query($db, $sql);
		$verify = mysqli_fetch_assoc($query1);

		if ($verify['idusuarios'] == $usuario || empty($verify)) {

			//Sentencias SQL
			$sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE  idusuarios = " . $usuario;
			$query2 = mysqli_query($db, $sql);

			if ($query2) {
				$_SESSION['usuario']['nombre'] = $nombre;
				$_SESSION['usuario']['apellidos'] = $apellidos;
				$_SESSION['usuario']['email'] = $email;
				$_SESSION['perfil']['correcto'] = "Tus datos se han actualizado con exito";
			}else{
				$_SESSION['perfil']['error'] = 'Fallo al actualizar los datos';
			}
		}else{
			$_SESSION['perfil']['error'] = 'EL email ya esta en uso.';	
		}
	}else{
		$_SESSION['errores'] = $errores;
	}
}
//Redireccion
header('Location: ../editar-perfil.php');
?>