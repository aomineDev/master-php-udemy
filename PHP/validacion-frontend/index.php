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
		<form action="validar.php" method="POST" autocomplete="off">
			<div class="form-group row">
				<label for="user" class="col-sm-2 col-form-label">User</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="user" name="user" placeholder="User" autofocus required pattern="[A-Za-z]+">
				</div>
			</div>	
			<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
			</div>
			<?php
			if (!empty($_GET['error'])) {
				if($_GET['error'] != null){
					echo "<small class='text-danger'>Crendenciales incorrectas</small>";
				}
			}
			?>
			<button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
		</form>
	</div>
</body>
</html>