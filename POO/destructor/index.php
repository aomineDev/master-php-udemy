<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Destructor</h1>";		
require_once 'clase.php';

$usuario = new Usuario();
echo "<p>" . $usuario . "</p>";

for ($i=0; $i <= 5 ; $i++) { 
	echo "$i<br>";
}

?>