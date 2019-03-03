<!-- CONEXION -->
<?php include_once  'includes/conexion.php'?>

<!-- REDIRECCION -->
<?php include_once  'includes/redireccion.php'?>

<!-- FUNCIONES -->
<?php include_once 'includes/helpers.php' ?>

<!-- HEADER -->
<?php include_once  'includes/header.php'?>

<!-- CONTAINER -->
<div id="container">
	<!-- CAJA PRINCIPAL -->
	<div id="content">
		<h2>Crear Categoria</h2>
		<div id="crear-categoria">
			<p>Añadir nuevas categorias al blog</p>
			<form action="accion/save_categoria.php" method="POST">
				<?= isset($_SESSION['categoria']) ? categoriaGuardada($_SESSION['categoria']) : '' ?>
				<label for="nombre_categoria">Nombre de la categoria</label>
				<input type="text" name="nombre_categoria" id="nombre_categoria">
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre_categoria') : '' ?>
				<button type="submit" name="guardar_categoria">Guardar</button>
				<?php borrarErrores(); ?>
			</form>
		</div>
	</div>

	<!-- SIDEBAR -->
	<?php include_once 'includes/sidebar.php' ?>
</div>

<!-- FOOTER -->
<?php include_once 'includes/footer.php' ?>