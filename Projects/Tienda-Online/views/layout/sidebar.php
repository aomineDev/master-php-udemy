<!-- BOX -->
<section id="box">
	<!-- SIDEBAR -->
	<aside>
		<div class="block-aside">
			<?php if (isset($_SESSION['usuario'])): ?>
				<h3>Bienvenido <?= $_SESSION['usuario']->nombre.' '.$_SESSION['usuario']->apellidos ?></h3>
				<?php if (isset($_SESSION['admin'])) : ?>
					<p class="admin">baia baia un admin ¬¬</p>
				<?php endif; ?>
				<ul>
					<li>
						<a href="<?= baseUrl . 'carrito/carrito' ?>">Carrito</a>
						<ul>
							<?php $productosTotal = 0;
							$precioTotal = 0;
							require_once 'models/carrito.php';
							$carrito = new Carrito();
							$id = (int)$_SESSION['usuario']->idusuarios;
							$carrito->setIdusuarios($id);
							$carrito = $carrito->carrito();
							if ($carrito && $carrito->num_rows >= 1):
								while ($producto = $carrito->fetch_object()) : ?>
									<?php $productosTotal += $producto->cantidad; 
									$precioTotal += round(($producto->precio * $producto->cantidad), 2);  ?>
								<?php endwhile; 
							endif;?>
							<li>Productos: <?= $productosTotal ?></li>
							<li>Monto total: $<?= $precioTotal ?></li>
						</ul>
					</li>
					<li><a href="<?= baseUrl . 'pedido/pedidos' ?>">Mis  Pedidos</a></li>
					<?php if (isset($_SESSION['admin'])) : ?>
						<li><a href="<?= baseUrl . 'categoria/categorias' ?>">Gestionar Categorias</a></li>
						<li><a href="<?= baseUrl . 'producto/productos' ?>">Gestionar Productos</a></li>
						<li><a href="<?= baseUrl . 'pedido/gestion' ?>">Gestionar Pedidos</a></li>
					<?php endif; ?>
					<li><a href="<?= baseUrl . 'usuario/destroy' ?>">Cerrar Sesión</a></li>
				</ul>
				<?php else: ?>
					<h3>Logueate</h3>
					<?= isset($_SESSION['login']) ? Utils::result($_SESSION['login']) : '' ?>	
					<form action="<?= baseUrl . 'usuario/login' ?>" method="POST">
						<label for="email">Email</label>
						<input type="email" name="email" id="email">
						<label for="password">Password</label>
						<input type="password" name="password" id="password">
						<div class="box-btn-center">
							<button type="submit" class="btn primary">Ingresar</button>
						</div>
					</form>
					<?php Utils::cleanSidebar(); ?>
					<ul>
						<li><a href="<?= baseUrl.'usuario/registro' ?>">Registrate</a></li>
						<li><a href="<?= baseUrl.'error/process' ?>">Recuperar contraseña</a></li>
					</ul>
				<?php endif; ?>
			</div>
		</aside>
		<!-- CONTENT	-->
		<main>