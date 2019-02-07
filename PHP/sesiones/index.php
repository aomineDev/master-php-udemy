<style>
body{
	font-family: Poppins
}
</style>

<?php 
//sesión: almacenar y persistir datos del usuario mientras que navega en un sitio web hasta que cierra seción o el navegador 

//Iniciar la sesion
session_start();

//variable local
$variable_normal = 'soy una cadena de texto';

//variable de sesión 
$_SESSION['variable_persistente'] = "Hola soy un sesion activa";

echo "$variable_normal<br>";
echo $_SESSION['variable_persistente'];
?>