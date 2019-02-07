<?php 
if (!empty($_GET['error'])) {
	$error = $_GET['error'];
	$error1 = $_GET['error1'];
	$error2 = $_GET['error2'];
	$error3 = $_GET['error3'];
	$error4 = $_GET['error4'];
	$error5 = $_GET['error5'];
	if ($error == 'faltan_valores') {
		echo "<small class='text-danger d-block mb-3'>Introduce todos los datos en los campos del formulario</small>";
	}
	if ($error1 == 'nombre') {
		echo "<small class='text-danger d-block mb-3'>Error en el nombre</small>";
	}
	if ($error2 == 'apellido') {
		echo "<small class='text-danger d-block mb-3'>Error en el apellido</small>";
	}
	if ($error3 == 'edad') {
		echo "<small class='text-danger d-block mb-3'>Error en la edad</small>";
	}
	if ($error4 == 'email') {
		echo "<small class='text-danger d-block mb-3'>Error en el email</small>";
	}
	if ($error5 == 'password') {
		echo "<small class='text-danger d-block mb-3'>Password mayor a 5 caracteres</small>";
	}
}
?>