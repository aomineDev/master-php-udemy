<style>
body{
	font-family: sans-serif;
	background-color: #f5f5f5;
	color: #262626;
}
</style>

<?php 
//Variables Globales = Las que se declaran fuera de un funcion y estan siempre disponibles
//Varialbes Locales = Las que se declaran dentro de una funcion y solo estan disponibles en la funcion a menos que se haga un return

$frase = 'alv me vale vrga prro';

function Frases(){
	global $frase;
	$year =  'CiberPunk 2077'; 
	$text = "<p>$frase - $year</p>";
	return $text;
}
echo Frases();

//Funciones variables
function BuenosDias(){
	return '<p>Buenos Dias! :)</p>';
}

function BuenasTardes(){
	return '<p>Buenas Tardes! :|</p>';
}

function BuenasNoches(){
	return '<p>Buenas Noches! :(</p>';
}

$random = 'BuenasNoches';
echo $random();

$random = 'Dias';
$miVarFunc = "Buenos$random";

echo $miVarFunc();

?>