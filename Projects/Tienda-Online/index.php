<?php require_once 'config/dataBase.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'helpers/pass.php';
require_once 'autoload.php'; ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tienda Online</title>
	<link rel="stylesheet" href="<?= baseUrl.'assets/css/styles.css' ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>

	<?php require_once 'views/layout/header.php';
	require_once 'views/layout/sidebar.php'; 

	if (isset($_GET['controller']) && class_exists($_GET['controller'].'Controller')) {
		$controllerName = $_GET['controller'].'Controller';
		$controller = new $controllerName();

		if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
			$action = $_GET['action'];
			$controller->$action();
		}else{
			Utils::showError();
		}

	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$controllerName = controllerDefault.'Controller';
		$controller = new $controllerName();
		$action = actionDefault;
		$controller->$action();
	} else{
		Utils::showError();
	}

	require_once 'views/layout/footer.php';

	?>

	<script src="<?= baseUrl.'assets/js/file.js' ?>"></script>

</body>
</html>