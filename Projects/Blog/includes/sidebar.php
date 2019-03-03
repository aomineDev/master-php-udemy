<aside id="sidebar">

	<form action="accion/valueSearch.php" method="POST" id="search">
		<input type="text" placeholder="Search..." name="search">
		<button type="submit"><i class="fas fa-search"></i></button>
	</form>
	
	<?php  if (isset($_SESSION['usuario'])) : ?>

		<div id="welcome">
			<h3><?= 'Bienvenido	 ' . $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos'] ?></h3>
			<div class="box-btn">
				<a href="perfil.php?id=<?= $_SESSION['usuario']['idusuarios'] ?>" class="perfil">Perfil</a>				
			</div>
			<div class="box-btn">
				<a href="crear_entrada.php" class="crear">Crear Entrada</a>				
			</div>
			<?php if($_SESSION['usuario']['nombre'] == 'admin'): ?>
				<div class="box-btn">
					<a href="crear_categoria.php" class="categoria">Crear Categoria</a>				
				</div>
			<?php endif; ?>
			<div class="box-btn">
				<a href="accion/destroy.php" class="salir">Salir</a>				
			</div>
		</div>

		<?php  else : ?>

			<div id="login" class="block-aside">
				<h3>Identificate</h3>
				<form action="accion/login.php" method="POST">
					<?= isset($_SESSION['error_login']) ? errorLogin($_SESSION['error_login']) : '' ?>
					<label for="loginEmail">Email</label>
					<input type="email" name="loginEmail" id="loginEmail">
					<label for="loginPass">Contraseña</label>
					<input type="password" name="loginPass" id="loginPass">
					<div class="box-btn">
						<input type="submit" name="submitLogin" value="Enviar">
					</div>
				</form>
			</div>

			<div id="login" class="block-aside">
				<h3>Registrate</h3>
				<form action="accion/registro.php" method="POST">
					<?= isset($_SESSION['registro_error']) ? sesionGuardada($_SESSION['registro_error']) : '' ?>
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" id="nombre">
					<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ?>
					<label for="apellidos">Apellidos</label>
					<input type="text" name="apellidos" id="apellidos">
					<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ?>
					<label for="email">Email</label>
					<input type="email" name="email" id="email">
					<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ?>
					<label for="pass">Contraseña</label>
					<input type="password" name="pass" id="pass">
					<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '' ?>
					<div class="box-btn">
						<input type="submit" name="submit" value="Enviar">
					</div>
				</form>
				<?php borrarErrores(); ?>
			</div>

		<?php  endif;?>

	</aside>