<style>
body{
	font-family: sans-serif;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}
div{
	padding: 16px;
	padding-top: 0;
	text-align: center;
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
<div>
	<?php 
	$num1 = $_POST['num1'] ;
	$num2 = $_POST['num2']; 

	echo "<p>$num1 + $num2 = " . ($num1 + $num2)
	."</p><p>$num1 - $num2 = " . ($num1 - $num2)
	."</p><p>$num1 * $num2 = " . ($num1 * $num2)
	."</p><p>$num1 / $num2 = " . round($num1 / $num2, 2) . "</p>";
	?>
	<hr>
	<a href="ejercicio-4.html">Volver</a>
</div>
