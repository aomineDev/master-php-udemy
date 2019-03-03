<?php Pass::admin(); 
if (isset($id)) {
	$title = 'Editar Productos';
	$action = baseUrl.'producto/edit&id='.$id;
	$nombre = $producto->nombre;
	$descripcion = $producto->descripcion;
	$precio = $producto->precio;
	$stock = $producto->stock;
	$cateogria = $producto->idcategorias;
	$img = "<div class='imgEdit'><img src='".baseUrl."uploads/img/products/{$producto->img}' alt='img'></div>";
	$btn = 'Actualizar';
}else{
	$title = 'Crear Productos';
	$action = baseUrl.'producto/save';
	$nombre =null;
	$descripcion = null;
	$precio = null;
	$stock = null;
	$cateogria = null;
	$img = null;
	$btn = 'Crear';
} ?>
<div class="block-aside">
	<h3><?= $title ?></h3>
	<?= isset($_SESSION['producto']) ? Utils::result($_SESSION['producto']) : '' ?>
	<form action="<?= $action ?>" method="POST" enctype= "multipart/form-data">
		<label for="nombreProducto">Nombre</label>
		<input type="text" name="nombre" id="nombreProducto" value="<?= $nombre ?>">
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'nombre') : '' ?>
		<label for="descripcion">Descripcion</label>
		<textarea name="descripcion" id="descripcion"><?= $descripcion ?></textarea>
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'descripcion') : '' ?>
		<label for="precio">Precio</label>
		<input type="number" name="precio" id="precio" value="<?= $precio ?>">
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'precio') : '' ?>
		<label for="stock">Stock</label>
		<input type="number" name="stock" id="stock" value="<?= $stock ?>">
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'stock') : '' ?>
		<?php require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->categorias();
		if($categorias && $categorias->num_rows >= 1) : ?>
			<label for="categoriaProducto">Categoria</label>
			<select name="categoria" id="categoriaProducto">
				<?php while ($category = $categorias->fetch_object()) : ?>
					<?php if($category->idcategorias == $cateogria): ?>
						<option value="<?= $category->idcategorias ?>" selected><?= $category->nombre ?></option>
						<?php else: ?>	
							<option value="<?= $category->idcategorias ?>"><?= $category->nombre ?></option>
						<?php endif ?>
					<?php endwhile; ?>
				</select>
				<?php else: ?>
					<p class="none">No existen categorias</p>
				<?php endif; ?>
				<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'categoria') : '' ?>
				<label for="imagen">Imagen</label>
				<?= $img ?>
				<input type="file" name="imagen" id="imagen" class="inputfile" data-multiple-caption="{count} files selected" multiple>
				<label for="imagen"><i class="fas fa-cloud-upload-alt"></i><span>Choose a file&hellip;</span></label>
				<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'imagen') : '' ?>
				<div class="box-btn-center">
					<button type="submit" class="btn primary"><?= $btn ?></button>
				</div>
			</form>
			<?php Utils::cleanError(); ?>
		</div>