<style>
body{
	font-family: Poppins;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh
}
</style>

<?php 
/*
Programa que compruebe si una variable esta vacia y si está vacia: rellenarla con texto en minusculas y mostrarlo en mayusculas y negrita
*/

$text = '';

if (empty($text)) {
	$text = 'peachepe';
	$textUpper = strtoupper($text);
	echo "<strong>$textUpper</strong>";
}else{
	echo "<p>La variable tiene el siguiente texto: $text</p>";
}

?>