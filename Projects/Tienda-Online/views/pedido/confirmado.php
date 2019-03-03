<?php Pass::user(); ?>
<h2>Pedido Confirmado</h2>
<?php if (isset($_SESSION['pedido']) && isset($pedido)): ?>
<?= Utils::result($_SESSION['pedido']) ?>
<div class="confirmado">
	<p>Una vez realizada la transferencia bancaria a la cuenta 1547 3254 6548 4562 con el coste del pedido, será procesado y enviado.</p>
	<?php if ($productos && $productos->num_rows >= 1): ?>
		<?php $count = 1; 
		$cantidadT = 0; ?>
		<div class="confirmadoBox">
			<div class="detalles">
				<?php while($producto = $productos->fetch_object()) : ?>	
					<h3>Datos del Pedido <?= $productos->num_rows > 1 ? "n° $count" : '' ?></h3>
					<?php $count++; ?>
					<ul>
						<li>Nombre del producto: <?= $producto->nombre ?></li>
						<li>Cantidad: <?= $producto->cantidad ?></li>
						<li>Precio Unitario: $<?= $producto->precio ?></li>
						<li>Precio Total: $<?= $producto->precio * $producto->cantidad ?></li>
						<?php $cantidadT += $producto->cantidad; ?>
					</ul>	
				<?php endwhile; ?>
			</div>
			<div class="general">
				<h4>Datos Generales</h4>
				<ul>
					<li>Número de pedido: <?= $pedido->idpedidos ?></li>
					<li>Cantidad: <?= $cantidadT ?></li>
					<li>Total a pagar: $<?= $pedido->precioTotal ?></li>
				</ul>
			</div>
		</div>
		<?php else: ?>
			<?php header('Location: '.baseUrl); ?>
		<?php endif ?>
		<div class="box-btn-end">
			<a href="<?= baseUrl ?>" class="btn success">OK</a>		
		</div>
	</div>
	<?php else: ?>
		<?php header('Location: '.baseUrl); ?>
	<?php endif ?>
	<?php Utils::cleanError(); ?>