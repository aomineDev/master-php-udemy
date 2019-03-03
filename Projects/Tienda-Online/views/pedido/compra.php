<?php Pass::user(); ?>
<h2>Hacer Pedido</h2>
<?= isset($_SESSION['pedido']) ? Utils::result($_SESSION['pedido']) : ''; ?>

<?php if (isset($verifyId)): ?>
	<?php while($productoCarrito = $query->fetch_object()): ?>
		<div class="compra">
			<div class="img">
				<img src="<?= baseUrl.'uploads/img/products/'.$productoCarrito->img ?>" alt="img">
			</div>
			<div class="content">
				<h3><?= $productoCarrito->nombre ?></h3>
				<p>Cantidad: <?= $productoCarrito->cantidad == 1 ? $productoCarrito->cantidad . ' unidad' : $productoCarrito->cantidad . ' unidades' ?></p>
				<p>Precio Unitario: $<?= $productoCarrito->precio ?></p>
				<p>Precio Total: $<?= $productoCarrito->precio * $productoCarrito->cantidad ?></p>
			</div>
		</div>
	<?php endwhile; ?>
	<?php $action = baseUrl.'pedido/buyAll' ?>
	<?php else: ?>
		<div class="compra">
			<div class="img">
				<img src="<?= baseUrl.'uploads/img/products/'.$productoCarrito->img ?>" alt="img">
			</div>
			<div class="content">
				<h3><?= $productoCarrito->nombre ?></h3>
				<p>Cantidad: <?= $productoCarrito->cantidad == 1 ? $productoCarrito->cantidad . ' unidad' : $productoCarrito->cantidad . ' unidades' ?></p>
				<p>Precio Unitario: $<?= $productoCarrito->precio ?></p>
				<p>Precio Total: $<?= $productoCarrito->precio * $productoCarrito->cantidad ?></p>
			</div>
		</div>
		<?php $action = baseUrl.'pedido/buy&id='.$productoCarrito->idproductos; ?>
	<?php endif ?>
	<div class="block-aside">
		<h3>Dirección de envio</h3>
		<?= isset($_SESSION['registro']) ? Utils::result($_SESSION['registro']) : '' ?>
		<form action="<?= $action ?>" method="POST">
			<label for="region">Región (Departamento)</label>
			<input type="text" name="region" id="region">
			<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'region') : '' ?>
			<label for="ciudad">Ciudad (Provincia)</label>
			<input type="text" name="ciudad" id="ciudad">
			<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'ciudad') : '' ?>
			<label for="direccion">Dirección (Distrito - Calle - n°)</label>
			<input type="text" name="direccion" id="direccion">
			<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'direccion') : '' ?>
			<div class="box-btn-center">
				<button type="submit" class="btn primary">Finalizar Compra</button>
			</div>
		</form>
		<?php Utils::cleanError(); ?>
	</div>