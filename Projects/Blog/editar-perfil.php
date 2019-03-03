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
		<h2>Editar Perfil</h2>
		<div id="editar-perfil">
			<p>Editar el perfil de <?= $_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellidos']  ?></p>
			<form action="accion/update-perfil.php" method="POST">
				<?= isset($_SESSION['perfil']) ? perfilEditado($_SESSION['perfil']) : '' ?>
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Dejar en blanco si no se desea modificar">
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ?>
				<label for="apellidos">Apellidos</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Dejar en blanco si no se desea modificar">
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ?>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="Dejar en blanco si no se desea modificar">
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ?>
				<button type="submit" name="editar">Actualizar</button>
				<?php borrarErrores(); ?>
			</form>
		</div>
	</div>

	<!-- SIDEBAR -->
	<?php include_once 'includes/sidebar.php' ?>
</div>

<!-- FOOTER -->
<?php include_once 'includes/footer.php' ?>