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
	<h1 class="text-center py-3">Ficheros</h1>
	<div class="container w-100">	
		<?php 
		/*
		mode r: lectura
		mode x: ejecucion
		mode w: escritura
		mode a+: leer y escribir 
 		*/

		//Abrir Archivo
		$archivo = fopen("texto.txt", "a+");

		//Leer contenido
		while (!feof($archivo)) {
			$contenido = fgets($archivo);
			echo $contenido.'<br>';
		}

		//Escribir en un archivo
		//fwrite($archivo, "\nDesde peachepe");
		
		//Cerrar archivo
		fclose($archivo);

		//Copiar cada vez que se actualiza la pagina
		//copy("texto.txt", "text_copiado.txt") or die("error al copiar");

		//Renombrar
		//rename('text_copiado.txt', 'text_copiado_renombrado.txt');

		//Eliminar
		//unlink('text_copiado_renombrado.txt') or die('Error al borrar');

		if (file_exists('texto.txt')) {
			echo "El archivo existe";
		}else
		echo "El archivo no existe";
		?>	
	</div>
</body>
</html>