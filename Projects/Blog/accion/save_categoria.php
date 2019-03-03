<?php 
if (isset($_POST['guardar_categoria'])) {

	//Conexion a la base de daos
	require_once '../includes/conexion.php';

	$nombre = isset($_POST['nombre_categoria']) ? mysqli_real_escape_string($db, trim($_POST['nombre_categoria'])) : null;
	$errores = [];

	//Validacion
	if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
		$errores['nombre_categoria'] = 'El nombre de la categoria no es valido'; 
	}
	//Insertar en la base de datos
	if (count($errores) == 0) {

		$sql = "INSERT INTO categorias VALUES(null, '$nombre')";
		$query = mysqli_query($db, $sql);

		if ($query) {
			$_SESSION['categoria']['correcto'] = "Categoria creada con exito";
		}else{
			$_SESSION['categoria']['error'] = 'Fallo al crear la cateogria';
		}
		
		if (isset($_SESSION['errores'])) {
			$_SESSION['errores'] = null;
		}

	}else{
		$_SESSION['errores'] = $errores;
	}
}

//redireccion
header('Location: ../crear_categoria.php');
?>