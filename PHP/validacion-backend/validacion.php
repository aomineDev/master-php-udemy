<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body class="scroll">
	<div class="container mt-3">
		<?php 
		$error = '0';
		$error1 = '1';
		$error2 = '2'; 
		$error3 = '3'; 
		$error4 = '4'; 
		$error5 = '5'; 
		if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['edad']) && !empty($_POST['email']) && !empty($_POST['password'])) {
			$error = 'ok';
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$edad = intval($_POST['edad']);
			$email = $_POST['email'];
			$password = $_POST['password'];

			//Validar Nombre
			if (!is_string($nombre) || preg_match("/[0-9]/", $nombre)) {
				$error1 = 'nombre';
			}

			//Validar Apellido
			if (!is_string($apellido) || preg_match("/[0-9]/", $apellido)) {
				$error2 = 'apellido';
			}

			//Validar Edad
			if (!is_int($edad) || !filter_var($edad, FILTER_VALIDATE_INT)) {
				$error3 = 'edad';
			}

			//Validar Email
			if (!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error4 = 'email';
			}
			//Validar Password
			if (!is_string($password) || strlen($password) < 5) {
				$error5 = 'password';
			}
		}else{
			$error = 'faltan_valores';
		}

		if ($error != 'ok' || $error1 == 'nombre' || $error2 == 'apellido' || $error3 == 'edad' || $error4 == 'email' || $error5 == 'password') {
			header("Location:index.php?error=$error&error1=$error1&error2=$error2&error3=$error3&error4=$error4&error5=$error5");
		}else{
			echo "<p>Nombre: $nombre</p>"
			."<p>Apellidos: $apellido</p>"
			."<p>Edad: $edad</p>"
			."<p>Email: $email</p>";
		}
		?>
		<p><a href="index.php" class="volver">Volver</a></p>
	</div>
</body>
</html>