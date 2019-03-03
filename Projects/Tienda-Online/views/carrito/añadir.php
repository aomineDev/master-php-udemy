<?php Pass::user(); 
if (isset($product)) {
	$title = 'Actualizar Carrito';
	$action = baseUrl.'carrito/update&id='. $product->idproductos;
	$cantidad = $product->cantidad;
	$btn = 'Actualizar';
}else{
	$title = 'Añadir al carrito';
	$action = baseUrl.'carrito/add&id='.$id;
	$cantidad = null;
	$btn = 'Añadir al carrito';
} ?>

<div class="block-aside">
	<h3><?= $title ?></h3>
	<?= isset($_SESSION['carrito']) ? Utils::result($_SESSION['carrito']) : '' ?>
	<form action="<?= $action ?>" method="POST">
		<label for="cantidad">Cantidad</label>
		<input type="number" name="cantidad" id="cantidad" value="<?= $cantidad ?>" autofocus>
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'cantidad') : '' ?>
		<div class="box-btn">
			<button type="submit" class="btn primary"><?= $btn ?></button>
		</div>
	</form>
	<?php Utils::cleanError(); ?>

</div>

