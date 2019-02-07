<style>
body{
	font-family: sans-serif;
}
</style>

<?php 

$color = 'rojo';

//Condicionales if

if($color == 'rojo'){
	echo "El color es $color";
}else{
	echo "El color no es $color";
}

/*Operadores de comparación
== igual valor
=== igual valor y tipo
!= diferente valor
<> diferente valor
!== diferente valor y tipo
< menor que
> myor que
<= menor o igual que
>= mayor o igual que
*/

$year = 2018;

if ($year >= 2000) {
	echo "<p>Estamos en el año $year.</p>";
}else{
	echo "No estamos en el $year";
}

$age1 = 18;
$age2 = 64;
$age = 20;

if($age >= $age1 && $age <= $age2){
	echo '<p>Esta en edad de trabajar</p>';
}else{
	echo '<p>No esta en edad de trabajar</p>';
}

//GOTO
goto marca;

echo "<h4>Instruccion 1</h4>";
echo "<h4>Instruccion 2</h4>";
echo "<h4>Instruccion 3</h4>";
echo "<h4>Instruccion 4</h4>";

marca:
echo "<h4>Me he saltado 4 echos</h4>";

?>