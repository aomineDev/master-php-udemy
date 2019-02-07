<style>
body{
	font-family: sans-serif;
}
</style>

<?php 
//Constantes -> Contenedor de informacion que no puede variar
define('name', 'aomine');
define('web', 'https://aomine.nibbleframe.com');

echo name . ' => ' . web;

//Constantes
echo '<br>Windows version: ' . PHP_OS
.'<br>PHP version: ' . PHP_VERSION
.'<br>Direccion de las extenciones: ' . PHP_EXTENSION_DIR
.'<br>Linea: ' . __LINE__
.'<br>Direccion del archivo: ' . __FILE__;

function hello(){
	echo '<br>Nombre de la funcion: ' . __FUNCTION__;
}

hello();

?>