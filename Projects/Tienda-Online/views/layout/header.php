	<!-- CONTAINER -->
	<div id="container">
		<!-- HEADER -->
		<header id="header">
			<div>	
				<a href="<?= baseUrl ?>"><img src="<?= baseUrl.'assets/img/camiseta.png' ?>" alt="logo"></a>
				<h1><a href="<?= baseUrl ?>">Tienda de Camisetas</a></h1>
			</div>
		</header>

		<!-- NAVBAR -->
		<nav id="nav">
			<ul>
				<li><a href="<?= baseUrl ?>">Incio</a></li>
				<?php require_once 'models/categoria.php';
				$categoria = new Categoria();
				$categorias = $categoria->categorias();
				if ($categorias && $categorias->num_rows >= 1):
					while ($category = $categorias->fetch_object()) : ?>
						<li><a href="<?= baseUrl.'categoria/productos&id='.$category->idcategorias ?>"><?= $category->nombre ?></a></li>
					<?php endwhile; 
				endif;?>
				<li><a href="#!">Contactanos</a></li>	
				<li><a href="#!">Sobre Nosotros</a></li>	
			</ul>
		</nav>