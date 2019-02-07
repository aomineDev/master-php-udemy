<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Statics</h1>";		
require_once 'configuracion.php';

echo "<h2>Instancia Directa</h2>";

Configuracion::setColor('Red');
Configuracion::setNewsletter(true);
Configuracion::setEntorno('Localhost');

$newsletter = Configuracion::getNewsletter() ? "Activado" : "Desactivado";

echo "<p>Color: " . Configuracion::getColor() . "</p>";
echo "<p>Newsletter: " . $newsletter . "</p>";
echo "<p>Entorno: " . Configuracion::getEntorno() . "</p>";

echo "<h2>Instancia con variable</h2>";

$configuracion = new Configuracion();

$configuracion::setColor('Blue');
$configuracion::setNewsletter(false);
$configuracion::setEntorno('Servidor Privado');

$newsletter = $configuracion::getNewsletter() ? "Activado" : "Desactivado";

echo "<p>Color: " . $configuracion::getColor() . "</p>";
echo "<p>Newsletter: " . $newsletter . "</p>";
echo "<p>Entorno: " . $configuracion::getEntorno() . "</p>";


?>