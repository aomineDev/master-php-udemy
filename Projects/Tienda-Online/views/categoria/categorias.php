<?php Pass::admin(); ?>
<h2>Gestionar Categorias</h2>
<?= isset($_SESSION['categoria']) ? Utils::result($_SESSION['categoria']) : '' ?>
<div class="categorias">
	<div class="box-btn-around">
		<a href="<?= baseUrl.'categoria/crear' ?>" class="btn success">Crear Categoria</a>
		<a href="<?= baseUrl.'categoria/elegir' ?>" class="btn warning">Editar Categoria</a>
		<a href="<?= baseUrl.'categoria/eliminar' ?>" class="btn danger">Eliminar Categoria</a>
	</div>
	<?php if($categorias && $categorias->num_rows >= 1) : ?>
		<ul>
			<?php while ($categoria = $categorias->fetch_object()) : ?>
				<li><?= $categoria->nombre ?></li>
			<?php endwhile; ?>
		</ul>
		<?php else: ?>
			<p class="none">No existe ninguna categoria registrada.</p>
		<?php endif; ?>
	</div>
	<?php Utils::cleanError(); ?>
