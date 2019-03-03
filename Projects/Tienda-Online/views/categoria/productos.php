<h2><?= $category->nombre ?></h2>
<?php if ($productos && $productos->num_rows >= 1) : ?>
	<div class="products">
		<?php while ($producto = $productos->fetch_object()) : ?>
			<div class="product">
				<a href="<?= baseUrl.'producto/especifico&id='.$producto->idproductos ?>" ><img src="<?= baseUrl.'uploads/img/products/'.$producto->img ?>" alt="img"></a>
				<h3><a href="<?= baseUrl.'producto/especifico&id='.$producto->idproductos ?>" ><?= $producto->nombre ?></a></h3>
				<p>$<?= $producto->precio ?></p>
				<div class="box-btn-around">
					<a href="<?= baseUrl.'carrito/añadir&id='.$producto->idproductos ?>" class="btn success">Añadir al carrito</a>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<?php else : ?>
		<p>No existen productos en esta categoria</p>
		<?php endif; ?>