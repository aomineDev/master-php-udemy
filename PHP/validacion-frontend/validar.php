<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php 
	if (!empty($_POST['user']) && !empty($_POST['password'])) {
		$user = $_POST['user'];
		$password = $_POST['password'];
		if ($user != 'aomine' || $password != '123') {
			header("location:index.php?error=1");
		}
	}else{
		echo '<p>Error al enviar los datos</p>';
	}

	?>
	<div class="container pt-3">
		<?="<h1>Bienvenido <span class='text-primary'>$user</span></h1>"?>
		<p><a href="index.php">Volver</a></p>
	</div>
</div>
</body>
</html>