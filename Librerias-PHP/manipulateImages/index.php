<?php 
//Autoload
require '../vendor/autoload.php';
$origin = 'kurumi.jpg';
$saveOn = 'kurumiMod.png';

$thumb = new PHPThumb\GD($origin);

//Redimensionar
$thumb->resize(339, 760);

//Recortar
$thumb->crop(100, 20, 200, 300);
// $thumb->cropFromCenter(250, 300);

//Mostrar y guardar
$thumb ->show();
$thumb->save($saveOn, 'png');

?>