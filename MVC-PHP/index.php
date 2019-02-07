<link rel="stylesheet" href="css/styles.css">
<h1 class="text-center">Welcome to my Web!</h1>
<?php 
require_once 'autoload.php';

if (isset($_GET['controller']) && class_exists($_GET['controller'].'Controller')) {
	$controllerName = $_GET['controller'].'Controller';
	$controller = new $controllerName();

	if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
		$action = $_GET['action'];
		$controller->$action();
	}else{
		echo "<p>Erroor 404 La página no existe - fallo al cargar el metodo</p>";
	}

}else{
	echo "<p>Erroor 404 La página no existe - fallo al cargar el controlador</p>";
}

?>