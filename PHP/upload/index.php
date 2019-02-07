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
	<h1 class="text-center py-3">Subir Imagenes con php</h1>
	<div class="container w-50">	
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="archivo" class="col-sm-2 col-form-label">Imagen</label>
				<div class="custom-file col-sm-10">
					<input type="file" class="custom-file-input" id="archivo" name="archivo" multiple>
					<label class="custom-file-label" for="archivo">Choose file</label>
				</div>
			</div>
			<button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
		</form>
	</div>
	<div class="container">
		<h2>Galeria de Imagenes</h2>
	</div>
	<section class="layout">	
		<?php require_once 'showImages.php'; ?>
	</section>
</body>
</html>