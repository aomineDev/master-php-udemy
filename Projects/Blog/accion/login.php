<?php 
if (isset($_POST['submitLogin'])) {
	//Conexión a la base de datos
	include_once '../includes/conexion.php';		

	//Recoger los datos del formulrio
	$email = isset($_POST['loginEmail']) ? mysqli_real_escape_string($db, trim($_POST['loginEmail'])) : null;
	$password = isset($_POST['loginPass']) ? mysqli_real_escape_string($db, trim($_POST['loginPass'])) : null;

	//Consulta para comprobar las credenciales del usuario
	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$login = mysqli_query($db, $sql);
	if ($login && mysqli_num_rows($login) == 1) {
		$usuario = mysqli_fetch_assoc($login);
		
		//Comprobar la contraseña
		$verify = password_verify($password, $usuario['password']);
		if ($verify) {
			//Utilizar un sesion para guardar los datos del usuario guardado
			$_SESSION['usuario'] = $usuario;

			if (isset($_SESSION['error_login'])) {
				$_SESSION['error_login'] = null;
			}
		}else{
		//Mensaje de error
			$_SESSION['error_login'] = 'Contraseña incorrecta';	
		}
	}else{
		//Mensaje de error
		$_SESSION['error_login'] = 'Email incorrrecto';
	}
}
//Redirigir al index
header('Location: ../index.php');
?>