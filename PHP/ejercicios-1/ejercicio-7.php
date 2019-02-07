<style>
body{
	font-family: sans-serif;
}
</style>

<?php 

?>
<style>
body{
	font-family: sans-serif;
}
a{
	display: block;
	text-decoration: none;
	text-transform: uppercase;
	font-size: 18px;
	color: #000;
	font-weight: bold;
}
a:hover{
	text-decoration: underline;
}
</style>

<?php 
$n1 = $_POST['num1'];
$n2 = $_POST['num2'];

echo "Los numeros impares entre $n1 y $n2 son:";

if($n1 < $n2){
	if(++$n1 == $n2){
		echo "<p>No existen numeros enteros entre " . --$n1 . " y $n2.</p>";
	}else{
		if($n1 % 2 == 0 && ++$n1 == $n2){
			--$n1;
			echo "<p>No existen numeros impares entre " . --$n1 . " y $n2.</p>";
		}else{
			--$n1;
			for(++$n1; $n1 < $n2; $n1++){ 
				if ($n1 % 2 != 0) {
					echo "<p>$n1</p>";
				}
			}
		}
	}
}else if($n1 > $n2){
	if (++$n2 == $n1) {
		echo "<p>No existen numeros enteros entre $n1 y " . --$n2 . ".</p>";
	}else{
		if ($n2 % 2 == 0 && ++$n2 == $n1) {
			--$n2;
			echo "<p>No existen numeros impares entre $n1 y " . --$n2 . ".</p>";
		}else{
			--$n2;
			for($n2; $n2 < $n1; $n2++){ 
				if ($n2 % 2 != 0) {
					echo "<p>$n2</p>";
				}
			}
		}
	}
}else{
	echo '<p>Los numeros son iguales.</p>';
}
?>
<hr>
<a href="ejercicio-7.html">Volver</a>