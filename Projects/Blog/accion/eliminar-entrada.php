<?php 
//CONEXION 
include_once  '../includes/conexion.php';

//REDIRECCION
include_once  '../includes/redireccion.php';

if (!is_numeric($_GET['id'])){ 
	header('Location: ../index.php');
}

$id = (int)$_GET['id']; 
$usuario = (int)$_SESSION['usuario']['idusuarios'];

$sql = "DELETE FROM entradas WHERE idusuarios = $usuario AND identradas = $id";
mysqli_query($db, $sql);

header('Location: ../index.php');
?>