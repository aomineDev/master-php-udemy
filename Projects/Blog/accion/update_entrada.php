<?php 
if (isset($_POST['editar_entrada'])) {

	//Conexion a la base de daos
	require_once '../includes/conexion.php';

	$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, trim($_POST['titulo'])) : null;
	$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, trim($_POST['descripcion'])) : null;
	$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : null;
	$id = (int)$_GET['id'];
	$errores = [];

	//Validacion del titulo
	if(empty($titulo)){
		$errores['titulo'] = 'El titulo de la entrada no es valido'; 
	}
	//Validacion del titulo
	if(empty($descripcion)){
		$errores['descripcion'] = 'La descripcion de la entrada no es valida'; 
	}

	//Actualizar la base de datos
	if (count($errores) == 0) {

		$sql = "UPDATE entradas SET titulo = '$titulo', descripcion = '$descripcion', idcategorias = '$categoria', fecha = CURDATE() WHERE identradas = $id";
		$query = mysqli_query($db, $sql);

		if ($query) {
			$_SESSION['Up_entrada']['correcto'] = "Entrada actualizada con exito";
		}else{
			$_SESSION['Up_entrada']['error'] = 'Fallo al actualizar la entrada';
		}

	}else{
		$_SESSION['errores'] = $errores;
	}
}

//redireccion
header('Location: ../editar-entrada.php?id='.$id);
?>