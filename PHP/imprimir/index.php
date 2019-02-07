<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Introducción</title>
</head>
<body>

	<?='Bienvenido al curso de PHP'  ?>

	<?php
	//Titular de la sección
	echo '<h2>Listado de videojuegos:</h2>';
	/*
	Esta es una lista de
	Videojuegos
	*/
	echo '<ul>'
	.'<li>GTA</li>'
	.'<li>Fifa</li>'
	.'<li>Mario Bros</li>'
	.'</ul>';
	echo '<p>Esta es toda' . ' - ' . 'lista de juegos </p>';
	?>

</body>
</html>