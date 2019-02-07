<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<h1 class="text-center py-3">Ejercicio 1</h1>
	<div class="container">	
		<?php 
		/*
		Crear una sesion que aumente o disminuya su valor en 1 en función al parametro get counter esta a 1 o a 0
		*/

		session_start();
		if (!isset($_SESSION['numero'])) {
			$_SESSION['numero'] = 0;
		}

		if (isset($_GET['counter']) && $_GET['counter'] == 1) {
			$_SESSION['numero']++;
		}

		if (isset($_GET['counter']) && $_GET['counter'] == 0) {
			$_SESSION['numero']--;
		}

		?>

		<h3>El valor de la sessión número es: <?=$_SESSION['numero'] ?></h3>

		<a href="ejercicio1.php?counter=1">Aumentar</a><span> | </span>
		<a href="ejercicio1.php?counter=0">Disminuir</a> 
	</div>
</body>
</html>