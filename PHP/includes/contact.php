<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Icludes en php</title>
	<!-- Incluyendo estilos base --> 
	<?php
	include_once 'components/styles.php';
	?>	
	<style>
	h1{
		text-align: center;
	}
</style>
</head>
<body>
	<!-- Incluyendo navbar --> 
	<?php 
	require_once 'components/header.php';
	?>

	<h1>Includes PHP</h1>

	<!-- content -->
	<div class="container">
		<h2>Contact me</h2>
		<p>Aqui tendria que estar un formulario :v</p>
	</div>

	<!-- Incluyendo Footer --> 
	<?php 
	include_once 'components/footer.php';
	?>
	
</body>
</html>