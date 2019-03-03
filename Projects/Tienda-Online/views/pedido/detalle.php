<?php Pass::user(); ?>
<h2>Detalles del Pedido</h2>
<?= isset($_SESSION['pedido']) ? Utils::result($_SESSION['pedido']) : ''; ?>
<div class="detalle">
	<?php if (isset($admin)) : ?>
		<div class="block-aside">
			<form action="<?= baseUrl.'pedido/estado&id='.$pedido->idpedidos ?>" method="POST">
				<label for="state">Cambiar el estado del pedido</label>
				<select name="estado" id="state">
					<option value="confirm" <?= $pedido->estado == 'confirm' ? 'selected' : '' ?>>Pendiete</option>
					<option value="preparation" <?= $pedido->estado == 'preparation' ? 'selected' : '' ?>>En preparación</option>
					<option value="ready" <?= $pedido->estado == 'ready' ? 'selected' : '' ?>>Preparado para enviar</option>
					<option value="submited" <?= $pedido->estado == 'submited' ? 'selected' : '' ?>>Enviado</option>
				</select>
				<button type="submit" class="btn primary">Cambiar estado</button>
			</form>
		</div>
		<h3>Información del Comprador</h3>
		<p>Nombre: <?= $pedido->name ?></p>
		<p>Email: <?= $pedido->email ?></p>
	<?php endif; ?>
	<h3>Dirección de envio</h3>
	<p>Región: <?= $pedido->region ?></p>
	<p>Ciudad: <?= $pedido->ciudad ?></p>
	<p>Dirección: <?= $pedido->direccion ?></p>
	<h3>Datos del pedido</h3>
	<p>Numero del pedido: <?= $pedido->idpedidos ?></p>
	<p>Total a pagar: $<?= $pedido->precioTotal ?></p>
	<p>Estado: <?= Utils::state($pedido->estado) ?></p>
	<?php while($producto = $productos->fetch_object()): ?>
		<div class="producto">
			<div class="img">
				<a href="<?= baseUrl.'producto/especifico&id='.$producto->idproductos ?>"><img src="<?= baseUrl.'uploads/img/products/'.$producto->img ?>" alt="img"></a>
			</div>
			<div class="content">
				<h3><a href="<?= baseUrl.'producto/especifico&id='.$producto->idproductos ?> "><?= $producto->nombre ?></a></h3>
				<p>Cantidad: <?= $producto->cantidad ?></p>
				<p>Precio: $<?= $producto->precio ?></p>
				<p>Coste Total: $<?= $producto->cantidad * $producto->precio ?></p>
			</div>
		</div>
	<?php endwhile; ?>
</div>
<?php Utils::cleanError(); ?>
