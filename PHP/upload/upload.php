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
	<div class="container w-50">	
		<?php 
		$archivo = $_FILES['archivo'];
		$nombre = $archivo['name'];
		$tipo = $archivo['type'];

		if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/gif") {
			if (!is_dir('assets')) {
				mkdir('assets', 0777);
			}

			move_uploaded_file($archivo['tmp_name'], "assets/$nombre");

			echo "<p>Imagen Subida Correctamente</p>"; 

			echo "	<img src='assets/$nombre' alt='img'>";

			header("Refresh: 3; URL=index.php");

		}else{
			header("Refresh: 3; URL=index.php");
			echo "<p>Sube una imagen con un formato correcto</p>";
		}
		?>
	</div>
</body>
</html>