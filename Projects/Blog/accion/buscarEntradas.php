	<?php 
	//Autoload
	require_once 'vendor/autoload.php';

	//Conexion
	require_once 'includes/conexionPOO.php';

	//Consulta para contar elementos totales 	
	$query = $conex->query("SELECT COUNT(identradas) AS 'total' FROM entradas WHERE titulo LIKE '%$search%'");
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
	$sql = "SELECT e.*, DATE_FORMAT(e.fecha, '%d-%m-%Y') AS 'fecha_mod', c.nombre_categoria AS 'nombre', c.idcategorias AS 'id' FROM entradas e INNER JOIN categorias c ON e.idcategorias = c.idcategorias WHERE e.titulo LIKE '%$search%' ORDER BY e.fecha DESC LIMIT $limit,$nELementsPage";	
	$entradas = $conex->query($sql);

	?>