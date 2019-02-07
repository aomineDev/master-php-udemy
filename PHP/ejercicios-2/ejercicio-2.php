<style>
body{
	font-family: Poppins
}
</style>

<?php 
/*
Escribir un programa que añada valores a un array mientras que su longitud sea menor a 120 y luego mostrarlo por pantalla. 
*/

$coleccion = [];
for ($i=1; $i <= 120; $i++) { 
	array_push($coleccion ,"elemento-".$i);
}

echo "<h2>Números:</h2><ul>";
foreach ($coleccion as $key => $n) {
	echo "<li>$n</li>";
}
echo '</ul>';
?>