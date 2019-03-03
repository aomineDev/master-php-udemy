<h2>Detallas del producto</h2>
<div class="especifico">
	<div class="img">
		<img src="<?= baseUrl.'uploads/img/products/'.$producto->img ?>" alt="img">
	</div>
	<div class="content">
		<h3><?= $producto->nombre ?><a href="<?= baseUrl.'categoria/productos&id='.$producto->idcategorias ?>" class="categoria"><?= $producto->categoria ?></a><span class="fecha"><?= $producto->fechaMod ?></span></h3>
		<p><?= $producto->descripcion ?></p>
		<p>Precio: $<?= $producto->precio ?></p>
		<p>Stock: <?= $producto->stock ?> unidades</p>
	</div>
	<div class="button">
		<a href="<?= baseUrl.'carrito/añadir&id='.$producto->idproductos ?>" class="btn success">Añadir al carrito</a>
	</div>
</div>