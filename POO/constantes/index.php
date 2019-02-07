<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Constantes</h1>";		
require_once 'clase.php';

$usuario = new Usuario();
$serverName = $_SERVER['SERVER_NAME'];
echo "<p>" . $usuario::getURL() . $serverName . "</p>";

?>