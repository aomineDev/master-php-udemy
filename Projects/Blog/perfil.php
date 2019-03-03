<!-- CONEXION -->
<?php include_once  'includes/conexion.php'?>

<!-- FUNCIONES -->
<?php include_once 'includes/helpers.php' ?>

<!-- HEADER -->
<?php include_once  'includes/header.php'?>

<!-- CONTAINER -->
<div id="container">
	<!-- CAJA PRINCIPAL -->
	<div id="content">
		<h2>Perfil</h2>
		<?php if (!is_numeric($_GET['id'])):
			header('Location: index.php');
		endif;
		$id = (int)$_GET['id'];
		$usuario = obtenerUsuarios($db, $id);
		if(empty($usuario['idusuarios'])){
			header('Location: index.php');
		} ?>
		<div id="perfil">
			<p><strong>Nombre:</strong> <?= $usuario['nombre'] ?></p>
			<p><strong>Apellidos:</strong> <?= $usuario['apellidos'] ?></p>
			<p><strong>Email:</strong> <?= $usuario['email'] ?></p>
			<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['idusuarios'] == $usuario['idusuarios']): ?>
				<a href="editar-perfil.php">Editar Pefil</a>
				<a href="cambiar-contrasena.php">Cambiar contraseña</a>
			<?php endif; ?>
		</div>
	</div>

	<!-- SIDEBAR -->
	<?php include_once 'includes/sidebar.php' ?>
</div>

<!-- FOOTER -->
<?php include_once 'includes/footer.php' ?>
