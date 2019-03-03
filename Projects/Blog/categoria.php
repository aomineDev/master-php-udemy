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
		$categoria = obtenerCategorias($db, $id);
		if (!empty($categoria)): ?>
			<h2>Entradas de <?= $categoria['nombre_categoria'] ?></h2>
		<?php else:
			header('Location: index.php') ?>;
		<?php endif;?>

		<?php require_once 'accion/entradasCategoria.php';
		if (!empty($nElements)):
			while($entrada = $entradas->fetch_object()) : ?>
				<article class="entrada">
					<h3><a href="entrada.php?id=<?= $entrada->identradas ?>"><?= $entrada->titulo ?></a><span><?= $entrada->nombre ?></span></h3>
					<p><?= strlen($entrada->descripcion) > 180 ? substr($entrada->descripcion, 0, 180) . '...' : $entrada->descripcion ?></p>
					<span class="fecha"><?= $entrada->fecha_mod ?></span>
				</article>
			<?php endwhile;
			$pagination->render();
			else:?>
				<p>No existen entradas de la categoria <?= $categoria['nombre_categoria'] ?></p>
			<?php endif; ?>
		</div>

		<!-- SIDEBAR -->
		<?php include_once 'includes/sidebar.php' ?>
	</div>

	<!-- FOOTER -->
	<?php include_once 'includes/footer.php' ?>