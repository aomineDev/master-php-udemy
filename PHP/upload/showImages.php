<?php 
$gestor = opendir('./assets');
if ($gestor):
	while (($image = readdir($gestor)) !== false):
		if ($image != '.' && $image != '..'):
			echo "<div class='box'>	<img src='assets/$image' alt='img'></div>";
		endif;
	endwhile;
endif;
?>