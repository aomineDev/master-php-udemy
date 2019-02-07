<style>
body{
	font-family: Poppins;
}
</style>
<?php 
$cantantes = ['Lil Pump', 'Lil Xan', 'Lith Kila', 'Duki', 'FMK'];

/*
Fuciones para los arrays:
array_push() y array_pop(): Para añadir y eliminar elementos.
count(): Para contar el número de elementos en el array.
var_export() y var_dump(): Para mostrar el contenido de los arrays.
shuffle() y array_merge(): Para desordenar y unir arrays.
sort() y rsort() -  asort() y arsort(): Para ordenar arrays de forma ascendete y descendente.
ksort(), krsort: para ordenar arrays asociativos.
*/
//Cantantes
echo '<h2>Cantantes:</h2><ul>';
foreach ($cantantes as $key => $cantante) {
	echo "<li>$cantante</li>";
}
echo '</ul>';

//array Ordenado Alfabeticamente
echo '<h2>Cantantes Ordenados Alfabeticamente:</h2><ul>';
//sort($cantantes); 
asort($cantantes); 
foreach ($cantantes as $key => $cantante) {
	echo "<li>$cantante</li>";
}
echo '</ul>';

//Array Ordenados Alfabeticamente (Inverso)
echo '<h2>Cantantes Ordenados Alfabeticamente (Inverso):</h2><ul>';
arsort($cantantes);
foreach ($cantantes as $key => $cantante) {
	echo "<li>$cantante</li>";
}
echo '</ul>';

$numeros = ['2', '12', '1', '5', '21'];

//Numeros
echo '<h2>Numeros:</h2><ul>';
foreach ($numeros as $key => $numero) {
	echo "<li>$numero</li>";
}
echo '</ul>';

//Numeros ordenados alfabeticamente
echo '<h2>Numeros ordenados alfabeticamente:</h2><ul>';
//asort($cantantes); 
sort($numeros);
foreach ($numeros as $key => $numero) {
	echo "<li>$numero</li>";
}
echo '</ul>';

//Numeros ordenados alfabeticamente (Inverso)
echo '<h2>Numeros ordenados alfabeticamente (Inverso):</h2><ul>';
//asort($cantantes); 
rsort($numeros);
foreach ($numeros as $key => $numero) {
	echo "<li>$numero</li>";
}
echo '</ul>';

//Agregar valores a los arrays
array_push($cantantes, 'Paulo Lonedruid');
array_push($cantantes, 'Khea');
sort($cantantes);
echo '<h2>Agregando Cantantes (Khea, Paulo Lonedruid):</h2><ul>';
foreach ($cantantes as $key => $cantante) {
	echo "<li>$cantante</li>";
}
echo '</ul>';

//Eliminando el ultimo valor del array
array_pop($cantantes);
echo '<h2>Eliminando al ultimo Cantante:</h2><ul>';
foreach ($cantantes as $key => $cantante) {
	echo "<li>$cantante</li>";
}
echo '</ul>';

//Eliminando valor especifico del array
echo '<h2>Eliminando a Khea	:</h2><ul>';
unset($cantantes[2]);
foreach ($cantantes as $key => $cantante) {
	echo "<li>$cantante</li>";
}
echo '</ul>';

//Desordenando la lista de cantantes aleatoriamente
echo '<h2>Desordenando la lista de cantantes aleatoriamente	:</h2><ul>';
shuffle($cantantes);
foreach ($cantantes as $key => $cantante) {
	echo "<li>$cantante</li>";
}
echo '</ul>';

//Sacando cantante aleatorio
echo '<h2>Sacando cantante aleatorio	:</h2>';
$index = array_rand($cantantes);
echo "<ul>
<li>$cantantes[$index]</li>
</ul>";

//Sacando el indice de Lil Pump
echo '<h2>Sacando a Lil Pump:</h2><ul>';
$lilPump = array_search('Lil Pump', $cantantes);
echo "<li>$cantantes[$lilPump]</li></ul>";

//Numero de Cantantes
echo '<h2>Numero de Cantantes</h2><ul>';
//$Ncantantes = count($cantantes);
$Ncantantes = sizeof($cantantes);
echo "<li>En la lista hay $Ncantantes cantantes</li></ul>";
?>
