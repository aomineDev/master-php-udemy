<?php Pass::admin(); ?>
<h2>Gestionar Productos</h2>
<?= isset($_SESSION['producto']) ? Utils::result($_SESSION['producto']) : '' ?>
<div class="box-btn-around">
	<a href="<?= baseUrl.'producto/crear' ?>" class="btn success crear">Crear Producto</a>
</div>
<?php if($productos && $productos->num_rows >= 1) : ?>
	<div class="products">
		<?php while ($producto = $productos->fetch_object()) : ?>
			<div class="product">
				<a href="<?= baseUrl.'producto/especifico&id='.$producto->idproductos ?>" ><img src="<?= baseUrl.'uploads/img/products/'.$producto->img ?>" alt="img"></a>
				<h3><a href="<?= baseUrl.'producto/especifico&id='.$producto->idproductos ?>" ><?= $producto->nombre ?></a></h3>
				<p>$<?= $producto->precio ?></p>
				<div class="box-btn-around">
					<a href="<?= baseUrl.'producto/editar&id='.$producto->idproductos ?>" class="btn primary">Editar</a>
					<a href="<?= baseUrl.'producto/remove&id='.$producto->idproductos ?>" class="btn danger">Eliminar</a>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<?php else: ?>
		<p class="none">No existe ningun producto registrado.</p>
	<?php endif; ?>
	<?php Utils::cleanError(); ?>


