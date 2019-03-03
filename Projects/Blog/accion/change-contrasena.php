<?php 
if (isset($_POST['cambiar'])) {
	//Conexión a la base de datos
	include_once '../includes/conexion.php';	
	//Recoger los valores que nos llegan por POST
	$password = isset($_POST['pass']) ? mysqli_real_escape_string($db, $_POST['pass']) : null;
	$password2 = isset($_POST['pass2']) ? mysqli_real_escape_string($db, $_POST['pass2']) : null;
	$password3 = isset($_POST['pass3']) ? mysqli_real_escape_string($db, $_POST['pass3']) : null;
	$usuario = (int) $_SESSION['usuario']['idusuarios'];

	//Array de Errores
	$errores = [];

	//Validar los datos antes de guardarlos en la base de datos
	//Validando nombre
	if (empty($password)) {
		$errores['password'] = "El campo esta vacio";				
	}
	if (empty($password2)) {
		$errores['password2'] = "El campo esta vacio";				
	}
	if (empty($password3)) {
		$errores['password3'] = "El campo esta vacio";				
	}
	if ($password2 != $password3) {
		$errores['password4'] = "El password es incorrecto";				
	}

	//Insertando usuario en la base de datos
	if (count($errores) == 0) {	

		//Obtener el password
		$sql = "SELECT * FROM usuarios WHERE idusuarios = " . $usuario;
		$query1 = mysqli_query($db, $sql);

		if ($query1 && mysqli_num_rows($query1) == 1) {
			$assoc = mysqli_fetch_assoc($query1);

		//Comprobar si el password es el correcto
			$verify = password_verify($password, $assoc['password']);
			if ($verify) {
				//Cifrar la contraseña
				$password_cifrado = password_hash($password2, PASSWORD_BCRYPT, ['cost' => 4]);

				//Sentencias SQL
				$sql = "UPDATE usuarios SET password = '$password_cifrado' WHERE  idusuarios = " . $usuario;
				$query2 = mysqli_query($db, $sql);

				if ($query2) {
					$_SESSION['usuario']['password'] = $password_cifrado;
					$_SESSION['password']['correcto'] = "La contraseña ah sido cambiada con exito";
				}else{
					$_SESSION['password']['error'] = 'Fallo al cambiar la contraseña';
				}
			}else{
				//Mensaje de error
				$_SESSION['password']['error'] = 'La contraseña es incorrecta';
			}

		}else{
		//Mensaje de error
			$_SESSION['password']['error'] = 'Fallo al cambiar la contraseña';
		}


	}else{
		$_SESSION['errores'] = $errores;
	}
}
//Redireccion
header('Location: ../cambiar-contrasena.php');
?>