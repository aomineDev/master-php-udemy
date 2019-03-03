<?php 
if (isset($_POST['submit'])) {
	//Conexión a la base de datos
	include_once '../includes/conexion.php';	
	//Recoger los valores que nos llegan por POST
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, trim($_POST['nombre'])) : null;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, trim($_POST['apellidos'])) : null;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : null;
	$password = isset($_POST['pass']) ? mysqli_real_escape_string($db, $_POST['pass']) : null;

	//Array de Errores
	$errores = [];

	//Validar los datos antes de guardarlos en la base de datos
	//Validando nombre
	if (empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) {
		$errores['nombre'] = "El nombre no es valido";		
	}
	//Validando apellidos
	if (empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)) {
		$errores['apellidos'] = "Los apellidos no son validos";
	}
	//Validando Email
	if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores['email'] = "El email no es valido";
	}
	//Validando password
	if (empty($password)) {
		$errores['password'] = "El password no es valido";
	}	
	//Insertando usuario en la base de datos
	if (count($errores) == 0) {	
		//Cifrar la contraseña
		$password_cifrado = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

		//Comprobar si el email ya existe
		$sql = "SELECT email FROM usuarios WHERE email = '$email'";
		$query1 = mysqli_query($db, $sql);
		$verify = mysqli_fetch_assoc($query1);

		if ($verify['email'] != $email) {
			//Sentencias SQL
			$sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_cifrado', CURDATE())";
			$query = mysqli_query($db, $sql);

			if ($query) {
				$sql2 = "SELECT * FROM usuarios WHERE email = '$email'";
				$login = mysqli_query($db, $sql2);
				$usuario = mysqli_fetch_assoc($login);
				$_SESSION['usuario'] = $usuario;
			}else{
				$_SESSION['registro_error'] = 'Fallo al registrar el usuario';
			}

		}else{
			$_SESSION['registro_error'] = 'EL email ya esta en uso.';	
		}
	}else{
		$_SESSION['errores'] = $errores;
	}
}
header('Location: ../index.php');
?>