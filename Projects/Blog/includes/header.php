<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>My Blog</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
	<header id="header">	
		<!-- LOGO -->
		<div id="logo">	
			<a href="index.php">
				<h1>Blog de Videojuegos</h1>
			</a>
		</div>

		<!-- MENU -->
		<nav id="navbar" >
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<?php $query = obtenerCategorias($db);
				if (!empty($query)):
					while ($categoria = mysqli_fetch_assoc($query)): ?>
						<li><a href="categoria.php?id=<?= $categoria['idcategorias'] ?>"><?= $categoria['nombre_categoria'] ?></a></li>
					<?php endwhile; 
				endif;?>
				<li><a href="sobre_mi.php">Sobre mi</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</nav>
	</header>



