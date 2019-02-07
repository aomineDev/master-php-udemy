<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Icludes en php</title>
	<!-- Incluyendo setilos base --> 
	<?php
	include 'components/styles.php';
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
	require 'components/header.php';
	?>

	<h1>Includes PHP</h1>

	<!-- content -->
	<div class="container">
		<h2>Esta es la pagina de inicio</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, laboriosam sint voluptatem quisquam culpa dolorum temporibus odit fugiat ut animi praesentium, quos iure officia eum! Suscipit repellendus optio vitae libero?</p>
	</div>
	
	<!-- Incluyendo Footer --> 
	<?php 
	include_once 'components/footer.php';
	?>
	
</body>
</html>