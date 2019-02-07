<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Call</h1>";		
require_once 'clase.php';

$persona = new Persona('aomine', 18, 'Huancayo');

echo "<p>Nombre: {$persona->getNombre()}</p>";
echo "<p>Edad: {$persona->getEdad()}</p>";
echo "<p>Ciudad: {$persona->getCiudad()}</p>";

?>