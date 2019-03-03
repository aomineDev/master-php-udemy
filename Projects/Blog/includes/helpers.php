<?php 
function mostrarError($errores, $campo){
	$alert = null; 
	if (isset($errores[$campo])){
		$alert = "<span class='invalido'>" . $errores[$campo] . "</span>";
	}
	return $alert;
}

function sesionGuardada($registro){
	$msg = null;
	if(isset($registro)){
		$msg = "<div class='guardado error'>" . $registro . "</div>";
	}
	return $msg;
}

function errorLogin($error){
	$msg_login = null;
	if (isset($error)) {
		$msg_login = "<div class='guardado error'>" . $error . "</div>";
	}
	return $msg_login;
}

function borrarErrores(){
	if (isset($_SESSION['error_login'])) {
		$_SESSION['error_login'] = null;
	}
	if (isset($_SESSION['errores'])) {
		$_SESSION['errores'] = null;
	}
	if (isset($_SESSION['registro_error'])) {
		$_SESSION['registro_error'] = null;
	}
	if (isset($_SESSION['categoria'])) {
		$_SESSION['categoria'] = null;
	}
	if (isset($_SESSION['entrada'])) {
		$_SESSION['entrada'] = null;
	}
	if (isset($_SESSION['perfil'])) {
		$_SESSION['perfil'] = null;
	}
	if (isset($_SESSION['password'])) {
		$_SESSION['password'] = null;
	}
	if (isset($_SESSION['Up_entrada'])) {
		$_SESSION['Up_entrada'] = null;
	}
}

function obtenerCategorias($conex, $id = false){
	$sql = "SELECT * FROM categorias";
	$result = [];
	if ($id) {
		$sql .= " WHERE idcategorias = " . $id;
		$categorias = mysqli_query($conex, $sql);
		if ($categorias && mysqli_num_rows($categorias) == 1) {
			$result = mysqli_fetch_assoc($categorias) ;
		}
	}else{
		$sql .= " ORDER BY nombre_categoria";
		$categorias = mysqli_query($conex, $sql);
		if ($categorias && mysqli_num_rows($categorias) >= 1) {
			$result = $categorias;
		}
	}
	
	return $result;	
}

function obtenerUsuarios($conex, $id = false){
	$sql = "SELECT * FROM usuarios";
	$result = [];
	if ($id) {
		$sql .= " WHERE idusuarios = " . $id;
		$usuarios = mysqli_query($conex, $sql);
		if ($usuarios && mysqli_num_rows($usuarios) == 1) {
			$result = mysqli_fetch_assoc($usuarios) ;
		}
	}else{
		$sql .= " ORDER BY nombre_categoria";
		$usuarios = mysqli_query($conex, $sql);
		if ($usuarios && mysqli_num_rows($usuarios) >= 1) {
			$result = $usuarios;
		}
	}
	
	return $result;	
}

function obtenerEntradas($conex, $id = false){
	$sql = "SELECT e.*, DATE_FORMAT(e.fecha, '%d-%m-%Y') AS 'fecha_mod', c.nombre_categoria AS 'nombre', c.idcategorias AS 'id', CONCAT(u.nombre, ' ', u.apellidos) AS usuario, u.idusuarios AS 'iduser' FROM entradas e INNER JOIN categorias c ON e.idcategorias = c.idcategorias INNER JOIN usuarios u ON e.idusuarios = u.idusuarios WHERE e.identradas = $id";
	$result = [];
	$entradas = mysqli_query($conex, $sql);
	if ($entradas && mysqli_num_rows($entradas) == 1) {
		$result = mysqli_fetch_assoc($entradas) ;
	}

	return $result;	
}

function categoriaGuardada($categoria){
	$msg = null;
	if (isset($categoria['correcto'])) {
		$msg = "<div class='guardado correcto'>" . $categoria['correcto'] . "</div>";	
	}
	if(isset($categoria['error'])){
		$msg = "<div class='guardado error'>" . $categoria['error'] . "</div>";
	}
	return $msg;
}

function entradaGuardada($entrada){
	$msg = null;
	if (isset($entrada['correcto'])) {
		$msg = "<div class='guardado correcto'>" . $entrada['correcto'] . "</div>";	
	}
	if(isset($entrada['error'])){
		$msg = "<div class='guardado error'>" . $entrada['error'] . "</div>";
	}
	return $msg;
}

function perfilEditado($perfil){
	$msg = null;
	if (isset($perfil['correcto'])) {
		$msg = "<div class='guardado correcto'>" . $perfil['correcto'] . "</div>";	
	}
	if(isset($perfil['error'])){
		$msg = "<div class='guardado error'>" . $perfil['error'] . "</div>";
	}
	return $msg;
}

function contraseñaCambiada($password){
	$msg = null;
	if (isset($password['correcto'])) {
		$msg = "<div class='guardado correcto'>" . $password['correcto'] . "</div>";	
	}
	if(isset($password['error'])){
		$msg = "<div class='guardado error'>" . $password['error'] . "</div>";
	}
	return $msg;
}

?>