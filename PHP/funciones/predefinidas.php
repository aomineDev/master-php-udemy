<style>
body{
	font-family: sans-serif;
	color: #262626;
	background-color: #f5f5f5;
}
h2{
	font-family: comic sans MS;
	text-align: center;
}
</style>

<?php 
echo "<h2>Funciones Predefinidas</h2>";
$name = 'aomine';

//Debug
echo "<h4>Debug</h4>";
echo '<p>' . var_dump($name) . '</p><hr>';

//Fechas
echo "<h4>Fechas</h4>";
echo '<p>' . date('d-m-y') . '<p/><hr>';

//Time
echo "<h4>Time</h4>";
echo '<p>Unix Time: ' . time() . '<p/><hr>';

//Math
echo "<h4>Funciones matematicas</h4>";
echo '<p>Valor de PI: ' . pi() . '<p/>'
.'<p>Raiz Cuadrada de 100: ' . sqrt(100) . '<p/>'
.'<p>10<sup	>2</sup>: ' . pow(10, 2) . '<p/>'
.'<p>Numero aleatorio entre 10 y 40: ' . rand(10, 40) . '<p/>'
.'<p>Valor de PI redondeado a 2 decimales: ' . round(pi(), 2) . '<p/><hr>';

//Tipo de Variables
echo "<h4>Tipo de Variables</h4>";
$name = 'aomine';
$num = 17;

echo '<p>La variables $num es un ' . gettype($num) . '</p>';

if (is_string($name)) {
	echo '<p>La variable $name es un string</p>';
}
if (is_float($num)) {
	echo '<p>La variable $num es un float</p>';
}else{
	echo '<p>La variable $num no es un float</p><hr>';
}

//Verificando si existen variables;
echo "<h4>Verificando si existen variables</h4>";
$age = null;
if(isset($age)){
	echo '<p>La variables $age existe</p>';
}else{
	echo '<p>La variables $age no existe</p>';
}
echo '<hr>'; 

//Limpiando strings
echo "<h4>Eliminar espacios por delante y por detras</h4>";
$frase = '                 content                     ';
echo '<p>' . $frase . '</p>';
echo '<p>' . var_dump($frase) . '</p>';
echo '<p>' . var_dump(trim($frase)) . '</p><hr>';

//Eliminar variables / indices 
echo "<h4>Eliminando variables</h4>";
$year = 2018;
echo $year;
unset($year);
echo "<hr>	";

//Comprobar variables vacias 
echo "<h4>Comprobar variables vacias</h4>";
$text = '';
if (empty($text)) {
	echo '<p>La variable esta vacia</p>';
}else{
	echo '<p>La variable no esta vacia</p>';
}
echo "<hr>";

//Contar caracteres de un string
echo "<h4>Contar caracteres de un string</h4>";
$text = 'aomine Daiki Zone!!!';
echo strlen($text) . '<hr>';

//Encontrar Caracter
echo "<h4>Encontrar Caracter</h4>";
echo strpos($text, 'e') . '<hr>';

//Remplazar palabras en un string
echo "<h4>Remplazar palabras en un string</h4>";
echo "$text <br>" . str_replace('Zone', 'GOD', $text) . '<hr>';

//Lower Case y Upper Case
echo "<h4>Lower Case y Upper Case</h4>";
echo strtolower($text) . '<br>' . strtoupper($text) . '<hr>';


?>