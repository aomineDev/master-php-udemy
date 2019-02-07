<style>
body{
	font-family: Poppins;
	color: #2c3e50;
	
}
a{
	text-decoration: none;
	color: #2c3e50;
	font-size: 24px;
}
a:hover{
	text-decoration: underline;
	color: #42b983;
}
span{
	font-size: 24px;
}
</style>

<?php 
//Para mostrar el valor de las cookies se $_COOKIE, una variable superglobal, es un array asociativo.

if (isset($_COOKIE['galleta'])) {
	echo "<h1>" .  $_COOKIE['galleta'] .  "</h1>";
}else{
	echo '<p>No existe la cookie galleta</p>';
}

if (isset($_COOKIE['unyear'])) {
	echo "<h2>" .  $_COOKIE['unyear'] .  "</h2>";
}else{
	echo '<p>No existe la cookie unyear</p>';
}
?>

<a href="crear-cookies.php">Crear Galletas</a><span> | </span>
<a href="borrar-cookies.php">Borrar Galletas</a>