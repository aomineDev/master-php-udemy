<?php Pass::noUser(); ?>
<div class="block-aside w-75">
	<h3>Registro</h3>
	<?= isset($_SESSION['registro']) ? Utils::result($_SESSION['registro']) : '' ?>
	<form action="<?= baseUrl ?>usuario/save" method="POST">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre">
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'nombre') : '' ?>
		<label for="apellidos">Apellidos</label>
		<input type="text" name="apellidos" id="apellidos">
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'apellidos') : '' ?>
		<label for="emailRegistro">Email</label>
		<input type="email" name="email" id="emailRegistro">
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'email') : '' ?>
		<label for="passwordRegistro">Password</label>
		<input type="password" name="password" id="passwordRegistro">
		<?= isset($_SESSION['errores']) ? Utils::invalid($_SESSION['errores'], 'password') : '' ?>
		<div class="box-btn-center">
			<button type="submit" class="btn primary">Registrate</button>
		</div>
	</form>
	<?php Utils::cleanError(); ?>

</div>