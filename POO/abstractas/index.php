<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Abstractas</h1>";		
require_once 'clase.php';

$pc = new PcAsus();

$pc->encender();
$encendido = $pc->encendido ? 'Encendido' : 'Apagado';
echo "<p>PC: " . $encendido . "</p>";
$pc->arrancarSoftware();
$software = $pc->software ? 'Ejecutando' : 'No ejecutado';
echo "<p>Software: " . $software . "</p>";
$pc->apagar();
$encendido = $pc->encendido ? 'Encendido' : 'Apagado';
echo "<p>PC: " . $encendido . "</p>";
?>