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
	<h1 class="text-center py-3">Ejercicio 3</h1>
	<div class="container w-50">	

		<form action="" method="POST" autocomplete="off">
			<div class="form-group row">
				<label for="n1" class="col-sm-2 col-form-label">Número 1</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="n1" name="n1" placeholder="Número 1" autofocus required>
				</div>
			</div>
			<div class="form-group row">
				<label for="n2" class="col-sm-2 col-form-label">Número 2</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="n2" name="n2" placeholder="Número 2" required>
				</div>
			</div>
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary" name="sumar">Sumar +</button>
				<button type="submit" class="btn btn-danger" name="restar">Restar -</button>
				<button type="submit" class="btn btn-success" name="multiplicar">Multiplicar *</button>
				<button type="submit" class="btn btn-dark" name="dividir">Dividir /</button>
			</div>
		</form>

		<?php 
		/*
		Calculadora
		*/

		$resultado = null;

		if (isset($_POST['n1']) && isset($_POST['n2'])) {
			if (isset($_POST['sumar'])) {
				$resultado = $_POST['n1'] + $_POST['n2'];
			}
			if (isset($_POST['restar'])) {
				$resultado = $_POST['n1'] - $_POST['n2'];
			}
			if (isset($_POST['multiplicar'])) {
				$resultado = $_POST['n1'] * $_POST['n2'];
			}
			if (isset($_POST['dividir'])) {
				$resultado = round($_POST['n1'] / $_POST['n2'], 2);
			}
		}
		?>
		<p class='lead mt-3'>
			<?php 
			if ($resultado != null):
				echo "Resultado: $resultado";
			endif;
			?>
		</p>

	</div>
</body>
</html>