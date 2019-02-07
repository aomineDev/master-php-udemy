<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Traits</h1>";		
require_once 'clase.php';

$coche = new Coche();
$coche->setNombre('Ferrari Testarrosa'); 
$persona = new Persona();
$persona->setNombre('Omar'); 
$juego = new Juego();
$juego->setNombre('Dota'); 

echo "<p>Nombre del coche: " . $coche->mostrarNombre() . "</p>";
echo "<p>Nombre de la persona: " . $persona->mostrarNombre() . "</p>";
echo "<p>Nombre del juego: " . $juego->mostrarNombre() . "</p>";

?>