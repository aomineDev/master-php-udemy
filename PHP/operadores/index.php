<style>
*{
	font-family: sans-serif;
}
</style>

<?php 
//Operadores Matematicos
$num1 = 100;
$num2 = 50;

echo '<h2>Operaciones matematicas</h2>';

echo 'Suma => ' . $num1 . ' + ' . $num2 . ' = ' . ($num1 + $num2)
.'<br>Resta => ' . $num1 . ' - ' . $num2 . ' = ' . ($num1 - $num2)
.'<br>Multiplicación => ' . $num1 . ' x ' . $num2 . ' = ' . ($num1 * $num2)
.'<br>Divición => ' . $num1 . ' / ' . $num2 . ' = ' . ($num1 / $num2)
.'<br>Rest => ' . $num1 . ' % ' . $num2 . ' = ' . ($num1 % $num2);

//Operadores decremento y decremento
/*Incremento = $var++;
Decremento = $var--;
Pre-incremento = ++$var;
Pre-decremento = --$var;
*/
$year = 2018;
echo '<br>Año => ' . $year;
echo '<br>Año + 1 => ' . ++$year;
$year--;
echo '<br>Año - 1 => ' . --$year;

//Operadores de asignacion
$age = 18;
echo '<br>Edad => ' . $age;
$age += 5;
echo '<br>Edad + 5 => ' . $age;
$age -= 5;
$age *= 2;
echo '<br>Edad x 2 => ' . $age;
$age /= 2;
$age /= 9;
echo '<br>Edad / 9 => ' . $age;
?>