<?php 
require '../vendor/autoload.php';

$fruits = ['apple', 'orange', 'banana'];

\FB::log($fruits);

$names = ['Front-end'=>'aomine', 'Back-end'=>'akashi'];

\FB::log($names);

\FB::log("Muestrame en consola");

echo "Hello World!! " . $names['Front-end'];

?>