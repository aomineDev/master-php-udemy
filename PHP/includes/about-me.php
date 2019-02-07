<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Icludes en php</title>
	<!-- Incluyendo setilos base --> 
	<?php
	require_once 'components/styles.php';
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
	include_once 'components/header.php';
	?>

	<h1>Includes PHP</h1>
	<!-- content -->
	<div class="container">
		<h2>About me</h2>
		<p>Quien io? :v</p>
	</div>
	<!-- Incluyendo Footer --> 
	<?php 
	require_once 'components/footer.php';
	?>
</body>
</html>