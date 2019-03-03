<?php 
if (isset($_POST['guardar_entrada'])) {

	//Conexion a la base de daos
	require_once '../includes/conexion.php';

	$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, trim($_POST['titulo'])) : null;
	$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, trim($_POST['descripcion'])) : null;
	$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : null;
	$usuario = (int)$_SESSION['usuario']['idusuarios'];
	$errores = [];

	//Validacion del titulo
	if(empty($titulo)){
		$errores['titulo'] = 'El titulo de la entrada no es valido'; 
	}
	//Validacion del titulo
	if(empty($descripcion)){
		$errores['descripcion'] = 'La descripcion de la entrada no es valida'; 
	}

	//Insertar en la base de datos
	if (count($errores) == 0) {

		$sql = "INSERT INTO entradas VALUES(null, '$usuario', '$categoria', '$titulo', '$descripcion', CURDATE())";
		$query = mysqli_query($db, $sql);

		if ($query) {
			$_SESSION['entrada']['correcto'] = "Entrada creada con exito";
		}else{
			$_SESSION['entrada']['error'] = 'Fallo al crear la entrada';
		}

		if (isset($_SESSION['errores'])) {
			$_SESSION['errores'] = null;
		}

	}else{
		$_SESSION['errores'] = $errores;
	}
}

//redireccion
header('Location: ../crear_entrada.php');
?>