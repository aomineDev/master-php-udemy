<style>
body{
	font-family: Poppins
}
.si{
	color: rgb(91, 241, 0);
	text-transform: uppercase;
}
.no{
	color: rgb(255, 93, 93);
	text-transform: uppercase;
}
</style>
<?php 
/*
Ejercicio 1. Hacer un programa en PHP que tenga un array con 8 numeros enteros y que haga lo siguiente.
-Recorrerlo y mostrarlo
-Ordenarlo y mostrarlo
-Mostrar su longitud
-Buscar algun elemento
-Buscar con get
*/

$numbers = [2, 21, 28, 1, 5, 16, 13, 34];
echo '<h2>Numeros:</h2><ul>';
foreach($numbers as $key => $number){
	echo "<li>$number</li>";
}
echo '</ul>';

echo '<h2>Numeros ordernados:</h2><ul>';
sort($numbers);
foreach($numbers as $key => $number){
	echo "<li>$number</li>";
}
echo '</ul>';
echo '<h2>Longitud del array:</h2><ul>'
.'<li>' . count($numbers) . '</li>'
.'</ul>'; 

if (isset($_GET['n'])) {
	$buscar = $_GET['n'];
	echo "<h2>Buscando al número $buscar:</h2><ul>";
	$exist = array_search($buscar, $numbers);
	if(!empty($exist)) {
		echo "<li>El numero $buscar <span class='si'>si</span> existe en el array en el indice n°$exist.</li></ul>";
	}else{
		echo "<li>El numero $buscar <span class='no'>no</span> existe en el array.</li></ul>";
	}
}else{
	echo "<h2>Ingresar un número por la url: ?n=numero</h2><ul>";
}
?>