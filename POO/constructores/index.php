<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Constructores - Tipado Fuerte</h1>";		
require_once 'coche.php';
$coche = new Coche('Red', 'Ferrari', 'Panda', 0, 500, 2);
$coche->setColor('Blue');
$coche->setMarca('Audi');
echo $coche->mostrarInformacion($coche);
?>