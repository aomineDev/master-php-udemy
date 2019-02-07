<style>
body{
	font-family: Poppins;
}
</style>

<?php 
//Array: Coleccion o conjunto de datos/valores, bajo un unico nombre y para acceder a esos valor podemos usar usar un indice numerico o alfanumerico

$pelicula = 'Batman';
$peliculas = array('Batman', 'Spiderman', 'Hulk', 'Thor');
$cantantes = ['Lil Pump', 'Lil Xan', 'Lith Kila', 'Duki', 'FMK'];

//Recorrer array con bucle for
echo '<h2>Peliculas:</h2><ul>';
for ($i=0; $i < count($peliculas); $i++) { 
	echo "<li>$peliculas[$i]</li>";
}
echo '</ul>';

//Recorrer array con foreach
echo '<h2>Musicas:</h2><ul>';
foreach($cantantes as $index => $cantante) {
	echo "<li>$cantante</li>";
}
echo '</ul>';

//Arrays asociativos
$personas = [
	'name' => 'aomine',
	'surname' => 'Daiki',
	'web' => 'https://aomine.nibbleframe.com'
];

echo '<p>by ' . $personas['name'] . '</p>';

//Array multidimensional
$contacts = [
	[
		'name' => 'aomine',
		'tel' => '912271464'
	], 
	[
		'name' => 'omar',
		'tel' => '923657378'
	],
	[
		'name' => 'FreeStyle',
		'tel' => '123456789'
	]
];

echo '<h2>Contactos:</h2><ul>';
foreach($contacts as $index => $contact) {
	echo '<li>' . $contact['name'] . ' - ' . $contact['tel'] . '</li>';
}
echo '</ul>';
?>