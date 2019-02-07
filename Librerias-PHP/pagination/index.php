<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<style>
	.pagination {
		justify-content: center;
	}
</style>
</head>
<body>
	<h1 class="text-center p-3">Paginacion de Entradas</h1>
	<?php 
	//Autoload
	require '../vendor/autoload.php';

	//Conexion
	$conex = new mysqli("localhost", "root", "", "master_blog");
	$conex ->query("SET NAMES 'utf8'");

	//Consulta para contar elementos totales 
	// $query = $conex->query("SELECT * FROM entradas");
	// $nElements = $query->num_rows;
	$query = $conex->query("SELECT COUNT(identradas) AS 'total' FROM entradas");
	$nElements = $query->fetch_object()->total;
	$nELementsPage = 4;

	//Paginacion
	$pagination = new Zebra_Pagination();

	//Numero total de elementos
	$pagination->records($nElements);

	//Numero de elementos por pagina
	$pagination->records_per_page($nELementsPage);

	//Entradas
	$page = $pagination->get_page();
	$limit = ($page - 1) * $nELementsPage;
	$sql = "SELECT * FROM entradas ORDER BY fecha DESC LIMIT $limit,$nELementsPage";
	$entradas = $conex->query($sql);

	while($entrada = $entradas->fetch_object()) {
		echo "<h1>$entrada->titulo</h1>";
		echo "<p>$entrada->descripcion</p>";
	}

	$pagination->render();

	?>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>