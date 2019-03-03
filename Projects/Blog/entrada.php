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
		<?php if (!is_numeric($_GET['id'])):
			header('Location: index.php');
		endif;
		$id = (int)$_GET['id'];
		$entrada = obtenerEntradas($db, $id);
		if (!empty($entrada)): ?>
			<article class="entrada-especifica">
				<h3><?= $entrada['titulo'] ?></h3>
				<p class="badges"><a href="categoria.php?id=<?= $entrada['idcategorias']  ?>"><?= $entrada['nombre'] ?></a><span><?= $entrada['fecha_mod'] ?></span><a href="perfil.php?id=<?= $entrada['iduser']  ?>">Escrito por: <?= $entrada['usuario'] ?></a></p>
				<p class="descripcion"><?= $entrada['descripcion'] ?></p>
				<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['idusuarios'] == $entrada['idusuarios']): ?>
					<div id="btn_entrada">
						<a href="editar-entrada.php?id=<?= $entrada['identradas'] ?>">Editar Entrada</a>
						<a href="accion/eliminar-entrada.php?id=<?= $entrada['identradas'] ?>">Eliminar Entrada</a>
					</div>
				<?php endif; ?>
			</article>
		<?php else:
			header('Location: index.php') ?>;
		<?php endif;?>
	</div>

	<!-- SIDEBAR -->
	<?php include_once 'includes/sidebar.php' ?>
</div>

<!-- FOOTER -->
<?php include_once 'includes/footer.php' ?>
