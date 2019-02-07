<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Interfaces</h1>";		
require_once 'clase.php';

$mac = new IMac();
$mac->setModelo('Macbook Pro 2019');
echo "<p>" . $mac->getModelo() . "</p>";

?>