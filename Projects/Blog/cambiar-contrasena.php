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
		<h2>Cambiar Contraseña</h2>
		<div id="editar-perfil">
			<p>Cambiar la contraseña de <?= $_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellidos']  ?></p>
			<form action="accion/change-contrasena.php" method="POST">
				<?= isset($_SESSION['password']) ? contraseñaCambiada($_SESSION['password']) : '' ?>
				<label for="pass">Password Actual</label>
				<input type="password" name="pass" id="pass">
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '' ?>
				<label for="pass2">Password Nueva</label>
				<input type="password" name="pass2" id="pass2">
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password2') : '' ?>
				<label for="pass3">Repertir la Password nueva</label>
				<input type="password" name="pass3" id="pass3">
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password3') : '' ?>
				<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password4') : '' ?>
				<button type="submit" name="cambiar">Cambiar</button>
				<?php borrarErrores(); ?>
			</form>
		</div>
	</div>

	<!-- SIDEBAR -->
	<?php include_once 'includes/sidebar.php' ?>
</div>

<!-- FOOTER -->
<?php include_once 'includes/footer.php' ?>