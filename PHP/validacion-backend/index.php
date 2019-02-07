<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body class="scroll">
	<h1 class="text-center py-3">Formulario</h1>
	<div class="container w-50">	
		<form action="validacion.php" method="POST" autocomplete="off">
			<div class="form-group row">
				<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" autofocus">
				</div>
			</div>
			<div class="form-group row">
				<label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido"">
				</div>
			</div>
			<div class="form-group row">
				<label for="edad" class="col-sm-2 col-form-label">Edad</label>
				<div class="col-sm-10 d-flex align-items-center">
					<input type="number" id="edad" name="edad" class="form-control" placeholder="Edad">
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="email" name="email" placeholder="Email">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
			</div>
			<?php 
			include_once 'msg_error.php';
			?>
			<button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
		</form>
	</div>
</body>
</html>