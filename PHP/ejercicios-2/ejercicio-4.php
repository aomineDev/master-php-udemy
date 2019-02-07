<style>
body{
	font-family: Poppins
}
</style>

<?php 
/*
Crear un programa que tenga 4 variables, una de tipo array, otra de tipo string, otra int y otra booleana y que imprimar un mensaje segun el tipo de variable que sea.
*/

$arrai = ['a', 'r', 'r', 'a', 'i'];
$strin = 'soy un strin :V';
$namber = 0;
$bulean = true; 
echo '<h2>Tipos de variables:</h2><ul>';
if (is_array($arrai)) {
	echo '<li>la variable $arrai es de tipo ' . gettype($arrai) . '</li>';
}
if (is_string($strin)) {
	echo '<li>la variable $strin es de tipo ' . gettype($strin) . '</li>';
}
if (is_numeric($namber)) {
	echo '<li>la variable $namber es de tipo ' . gettype($namber) . '</li>';
}
if (is_bool($bulean)) {
	echo '<li>la variable $bulean es de tipo ' . gettype($bulean) . '</li></ul>';
}
?>