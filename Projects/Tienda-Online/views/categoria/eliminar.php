<?php Pass::admin(); 
if (isset($elegir)) {
	$title = 'Elegir	 Categoria';
	$action = baseUrl.'categoria/editar0';
	$btn = 'Elegir';
}else{
	$title = 'Eliminar Categorias';
	$action = baseUrl.'categoria/remove';
	$btn = 'Eliminar';
} ?>
<div class="block-aside">
	<h3><?= $title ?></h3>
	<?= isset($_SESSION['categoria']) ? Utils::result($_SESSION['categoria']) : '' ?>
	<form action="<?= $action ?>" method="POST">
		<?php require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->categorias();
		if($categorias && $categorias->num_rows >= 1) : ?>
			<label for="categoria">Elige la categoria</label>
			<select name="categoria" id="categoria">
				<?php while ($category = $categorias->fetch_object()) : ?>
					<option value="<?= $category->idcategorias ?>"><?= $category->nombre ?></option>
				<?php endwhile; ?>
			</select>
			<div class="box-btn">
				<button type="submit" class="btn primary"><?= $btn ?></button>
			</div>
			<?php else: ?>
				<p class="none">No existen categorias para eliminar</p>
			<?php endif; ?>
		</form>
		<?php Utils::cleanError(); ?>
	</div>