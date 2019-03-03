<?php Pass::admin(); 
if (isset($allCategoria)) {
	$title = 'Editar Categoria';
	$action = baseUrl.'categoria/edit&id='.$allCategoria->idcategorias;
	$nombre = $allCategoria->nombre;

	$btn = 'Editar';
}else{
	$title = 'Crear Categorias';
	$action = baseUrl.'categoria/remove';
	$nombre = null;
	$btn = 'Crear';
} ?>
<div class="block-aside">
	<h3><?= $title ?></h3>
	<?= isset($_SESSION['categoria']) ? Utils::result($_SESSION['categoria']) : '' ?>
	<form action="<?= $action ?>" method="POST">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre" value="<?= $nombre ?>" autofocus>
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'nombre') : '' ?>
		<div class="box-btn">
			<button type="submit" class="btn primary"><?= $btn ?></button>
		</div>
	</form>
	<?php Utils::cleanError(); ?>

</div>