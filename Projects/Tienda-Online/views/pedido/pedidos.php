<?php Pass::user(); ?>
<h2>Mis pedidos</h2>
<?php if ($pedidos && $pedidos->num_rows >= 1): ?>
	<div class="pedido">
		<table>
			<tr>
				<th>Número del pedido</th>
				<th>Coste Total</th>
				<th>Cantidad</th>
				<th>Fecha</th>
				<?php if (isset($admin)): ?>
					<th>Estado</th>
				<?php endif; ?>
			</tr>
			<?php while ( $pedido = $pedidos->fetch_object() ) :?>
				<?php if (isset($admin)){ 
					$detalle = baseUrl.'pedido/detalleGestion&id='.$pedido->idpedidos;
				}else{
					$detalle = baseUrl.'pedido/detalle&id='.$pedido->idpedidos;
				} ?>
				<?php $this->pedido->setIdpedidos($pedido->idpedidos); ?>
				<?php $query = $this->pedido->getProductoOfPedido(); ?>
				<?php $cantidadT = 0; ?>
				<?php while ( $producto = $query->fetch_object()) {
					$cantidadT += $producto->cantidad;
				} ?>
				<tr>
					<td><a href="<?= $detalle ?>"><?= $pedido->idpedidos ?></a></td>
					<td>$<?= $pedido->precioTotal ?></td>
					<td><?= $cantidadT ?></td>
					<td><?= $pedido->fecha ?></td>
					<?php if (isset($admin)): ?>
						<td><?= $pedido->estado ?></td>
					<?php endif; ?>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
	<?php else: ?>
		<p class="none">No tienes pedidos realizados</p>
		<?php endif; ?>