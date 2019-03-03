<?php Pass::user(); ?>
<h2>Carrito</h2>
<?= isset($_SESSION['carrito']) ? Utils::result($_SESSION['carrito']) : '' ?>
<?php if ($productos && $productos->num_rows >= 1): 
	$precioTotal1 = 0 ;
	$precioTotal2 = 0 ;
	$cantidadTotal = 0; ?>
	<div class="carrito">
		<?php while ($producto = $productos->fetch_object()) : ?>
			<div class="producto">
				<div class="img">
					<a href="<?= baseUrl.'producto/especifico&id='.$producto->idproductos ?>" ><img src="<?= baseUrl.'uploads/img/products/'.$producto->img ?>" alt="img"></a>
				</div>
				<div class="content">
					<h4><a href="<?= baseUrl.'producto/especifico&id='.$producto->idproductos ?>" ><?= $producto->nombre ?></a></h4>
					<p>Precio Unitario: $<?= $producto->precio ?></p>
					<p>Cantidad: <?= $producto->cantidad == 1 ? $producto->cantidad . ' unidad' : $producto->cantidad . ' unidades' ?></p>
					<?php $precioTotal1 = round(($producto->precio * $producto->cantidad), 2); ?>
					<p>Precio Total: $<?= $precioTotal1 ?></p>
					<?php $precioTotal2 += $precioTotal1;
					$cantidadTotal += $producto->cantidad; ?>
				</div>
				<div class="box-btn-center">
					<a href="<?= baseUrl.'carrito/up&id='.$producto->idproductos ?>" class="btn primary">+</a>
					<a href="<?= baseUrl.'carrito/down&id='.$producto->idproductos ?>" class="btn danger">-</a>
				</div>
				<div class="buttons">
					<a href="<?= baseUrl.'pedido/compra&id='.$producto->idproductos ?>" class="btn success">Comrpar</a>
					<a href="<?= baseUrl.'carrito/actualizar&id='.$producto->idproductos ?>" class="btn primary">Editar</a>
					<a href="<?= baseUrl.'carrito/remove&id='.$producto->idproductos ?>" class="btn danger">Eliminar</a>
				</div>
			</div>
		<?php endwhile; ?>
		<div class="total">
			<div class="detalles">
				<p>Cantidad de polos Totales: <?= $cantidadTotal ?></p>
				<p>Pecio Total de todos los productos: $ <?= $precioTotal2 ?></p>
			</div>
			<div class="buttonsTotal">
				<a href="<?= baseUrl.'pedido/compraTodo' ?>" class="btn success">Comrpar Todo</a>
				<a href="<?= baseUrl.'carrito/delete' ?>" class="btn danger">Eliminar Carrito</a>
			</div>
		</div>	
	</div>
	<?php else: ?>
		<p class="none">No existe ningun producto en el carrito.</p>
	<?php endif; ?>
	<?php Utils::cleanError(); ?>