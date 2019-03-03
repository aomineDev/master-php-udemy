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
			<h2>Ultimas Entradas</h2>
			<?php 
			require_once 'accion/entradas.php';
			while($entrada = $entradas->fetch_object()) : ?>
				<article class="entrada">
					<h3><a href="entrada.php?id=<?= $entrada->identradas ?>"><?= $entrada->titulo ?></a><span><?= $entrada->nombre ?></span></h3>
					<p><?= strlen($entrada->descripcion) > 180 ? substr($entrada->descripcion, 0, 180) . '...' : $entrada->descripcion ?></p>
					<span class="fecha"><?= $entrada->fecha_mod ?></span>
				</article>
			<?php endwhile;
			$pagination->render();?>
		</div>

		<!-- SIDEBAR -->
		<?php include_once 'includes/sidebar.php' ?>
	</div>

	<!-- FOOTER -->
	<?php include_once 'includes/footer.php' ?>