<?php 
//Definiendo variables
$hola = 'Hola mundo desde una variables';
$num = 44;
$value = true;

$num = 77;

echo '<h2>' . $hola . '</h3>';
echo 'Número = ' . $num;

$num = 120;

echo '<br>El nuevo número = ' . $num;

/*Tipo de datos
Entero (int/integer) = 99;
Decimal (float/double) = 12.5;
Cadenas (string) = 'Hola soy un string';
Boleano (boleam) = true / false;
null
Array (Coleccion de datos) = [121, 451]
Objetos
*/

$int = 100;
$decimal = 12.5;
$cadena = 'GG';
$boleam = true;
$nulo = null;
echo '<br>' . gettype($int)
.'<br>' . gettype($decimal)
.'<br>' . gettype($cadena)
.'<br>True = ' . $boleam
.'<br>False = ' . !$boleam
.'<br>' . gettype($boleam)
.'<br>Null = ' . $nulo
.'<br>' . gettype($nulo);

//Debugear
echo '<br>Debugeando: ';
$miNombre[] = ['aomine daiki', 'Akashi Seijuro'];
var_dump($miNombre);

?>