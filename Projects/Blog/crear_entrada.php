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
		<h2>Crear Entradas</h2>
		<div id="crear-entrada">
			<p>Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutas de nuestro contenido</p>
			<form action="accion/save_entrada.php" method="POST">
				<?= isset($_SESSION['entrada']) ? entradaGuardada($_SESSION['entrada']) : '' ?>
				<label for="titulo">Titulo</label>
				<input type="text" name="titulo" id="titulo">
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'titulo') : '' ?>
				<label for="descripcion">Descripción</label>
				<textarea name="descripcion" id="descripcion"></textarea>
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'descripcion') : '' ?>
				<label for="categoria">Categoria</label>
				<select name="categoria" id="categoria">
					<?php $categorias = obtenerCategorias($db);
					if (!empty($categorias)):
						while ($categoria = mysqli_fetch_assoc($categorias)): ?>
							<option value="<?= $categoria['idcategorias'] ?>"><?= $categoria['nombre_categoria'] ?></option>
						<?php endwhile; 
					endif; ?>
				</select>
				<br>
				<button type="submit" name="guardar_entrada">Guardar</button>
				<?php borrarErrores(); ?>
			</form>
		</div>
	</div>

	<!-- SIDEBAR -->
	<?php include_once 'includes/sidebar.php' ?>
</div>

<!-- FOOTER -->
<?php include_once 'includes/footer.php' ?>