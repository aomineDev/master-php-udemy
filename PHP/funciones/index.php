<style>
body{
	font-family: sans-serif;
}
h1{
	text-align: center;
	text-transform: uppercase;
}
.n{
	font-weight: bold;
}
</style>

<?php 
//Funciones: Una Funcion es un conjunto de instrucciones agrupadas bajo un nombre concreto y que pueden ser reutilizarse solamente invocando a la funcion tantas veces como queramos.

echo '<h1>Funciones</h1>';

//Ejemplo 1
function ShowNames(){
	$names = '';
	$name1 = 'aomine';
	$name2 ='omar'; 
	$names .= "<p>Nombre 1: $name1</p>"
	."<p>Nombre 2:$name2</p>";
	return $names;
}
echo ShowNames();

//Ejemplo 2
function tabla($n){
	$tablaResult = '';
	$tablaResult .= "<h3>Tabla del $n</h3>";
	for ($i = 1; $i <= 10; $i++) { 
		$tablaResult .= "$n x $i = " . ($n * $i) . '<br>';
	}
	$tablaResult .= "<hr>";
	return $tablaResult;
}
echo tabla(3);

// if (isset($_GET['n'])) {
// 	echo tabla(($_GET['n']));
// }else{
// 	echo "<p>No hay numero para multiplicar</p>";
// }

//Ejemplo 3
// for ($i=1; $i <= 10 ; $i++) { 
// 	echo tabla($i);
// }

//Ejemplo 4
function calculadora($n1, $n2, $em = false){
	//Conjunto de instrucciones a ejecutar
	$result = '';
	if ($em) {
		$result .= '<em>';
	}
	$result .= '<h3>Calculadora</h3>'
	."<p class='n'>Numeros: $n1 y $n2</p>"
	."<p>Suma: " . ($n1 + $n2) . '</p>'
	."<p>Resta: " . ($n1 - $n2) . '</p>'
	."<p>Multiplicación: " . ($n1 * $n2) . '</p>'
	."<p>División: " . round($n1 / $n2, 2) . '</p>';

	if ($em) {
		$result .= '</em>';
	}
	$result .= "<hr>";
	return $result;
}
echo calculadora(25, 6);
echo calculadora(5, 7, true);
echo calculadora(10, 4, false);

//Ejemplo 5
function getName($name){
	$textName = "Mi nombre es $name";
	return $textName;
} 
function getSurname($surname){
	$textSurame = "Y mi apellido es $surname";
	return $textSurame;
} 
function returnFullName($name, $surname){
	$text = getName($name) 
	."<br>"
	.getSurname($surname);
	return $text;
}
echo returnFullName('Omar', 'Carrión');


?>