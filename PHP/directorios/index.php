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
	<h1 class="text-center py-3">Directorios</h1>
	<div class="container w-100">	
		<?php 
		//Crear carpetas
		if (!is_dir('mi_carpeta')) {
			mkdir('mi_carpeta', 0777) or die('No se pudo crear la carpeta');
		}else{
			echo "<p>Ya existe la carpeta</p>";
		}

		//Eliminar Carpeta
		//rmdir('mi_carpeta');
		echo "<h3>Contenido de la carpeta</h3>";
		if ($gestor = opendir('./mi_carpeta')) {
			while (false !== ($archivo = readdir($gestor))) {
				if ($archivo != '.' && $archivo != '..') {
					echo "<p>$archivo</p>";
				}
			}
		}
		?>	
	</div>
</body>
</html>