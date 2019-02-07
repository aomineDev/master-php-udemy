<?php
include 'ejercicio-5/styles.php';
/*
Crear un array con el contenido de la tabla:
ACTION     AVENTURA       DEPORTES
GTA            ASSASINS       FIFA 19
COD            CRASH              PES 19
PUBG           PRINCE            MOTO GP 19

Cada fila debe ir en un fichero separado(includes).
*/

$tabla = [
	'Accion' => ['GTA 5', 'Call of Duty', 'PUBG'],
	'Aventura' => ['Assasins Creed', 'Crash', 'Prince of Persia'],
	'Deportes' => ['Fifa 19', 'PES 19', 'Moto G 19'] 
];

$categorias = array_keys($tabla);

?>

<table>
	<thead>
		<?php include 'ejercicio-5/head.php'; ?>
	</thead>
	<tbody>	
		<?php include_once 'ejercicio-5/first.php'; ?>
		<?php require 'ejercicio-5/second.php'; ?>
		<?php require_once 'ejercicio-5/third.php'; ?>
	</tbody>
</table>