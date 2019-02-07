<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<h1 class="text-center py-3">Ejercicio 2</h1>
	<div class="container w-50">	

		<form action="#" method="GET" autocomplete="off">
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="email" name="email" placeholder="email" autofocus>
				</div>
			</div>
			<button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
		</form>

		<?php 
		/*
		Una función que valide un email con filter var
		Recoger una variable por get, validar y mostrarla
		*/

		function validarEmail($email){
			$status = "<p class='text-danger'>no válido</p>";
			if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$status = "<p class='text-success'>válido</p>";
			}

			return $status;
		}

		if (isset($_GET['email'])) {
			echo validarEmail($_GET['email']);
		}else{
			echo "<p class='text-warning'>Introduce un email</p>";
		}

		?>
	</div>
</body>
</html>