<!-- CONEXION -->
<?php include_once  'includes/conexion.php'?>

<!-- REDIRECCION -->
<?php include_once  'includes/redireccion.php'?>

<!-- FUNCIONES -->
<?php include_once 'includes/helpers.php' ?>

<!-- HEADER -->
<?php include_once  'includes/header.php'?>

<!-- CONTAINER -->
<div id="container">
	<!-- CAJA PRINCIPAL -->
	<div id="content">
		<h2>Editar Entrada</h2>
		<div id="crear-entrada">
			<p>Edita la entrada</p>

			<?php if (!is_numeric($_GET['id'])):
				header('Location: index.php');
			endif;
			$id = (int)$_GET['id'];
			$entrada = obtenerEntradas($db, $id);
			if($_SESSION['usuario']['idusuarios'] != $entrada['idusuarios']){
				header('Location: index.php');
			}
			if (!empty($entrada)): ?>
				<form action="accion/update_entrada.php?id=<?= $id ?>" method="POST">
					<?= isset($_SESSION['Up_entrada']) ? entradaGuardada($_SESSION['Up_entrada']) : '' ?>
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" value="<?= $entrada['titulo'] ?>">
					<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'titulo') : '' ?>
					<label for="descripcion">Descripción</label>
					<textarea name="descripcion" id="descripcion"><?= $entrada['descripcion'] ?></textarea>
					<?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'descripcion') : '' ?>
					<label for="categoria">Categoria</label>
					<select name="categoria" id="categoria">
						<?php $categorias = obtenerCategorias($db);
						if (!empty($categorias)):
							while ($categoria = mysqli_fetch_assoc($categorias)): 
								if($categoria['idcategorias'] == $entrada['id']):?>
									<option value="<?= $categoria['idcategorias'] ?>" selected><?= $categoria['nombre_categoria'] ?></option>
									<?php else: ?>
										<option value="<?= $categoria['idcategorias'] ?>"><?= $categoria['nombre_categoria'] ?></option>
									<?php endif;
								endwhile; 
							endif; ?>
						</select>
						<br>
						<button type="submit" name="editar_entrada">Actualizar</button>
						<?php borrarErrores(); ?>
					</form>
				<?php else:
					header('Location: index.php') ?>;
				<?php endif;?>		
			</div>
		</div>

		<!-- SIDEBAR -->
		<?php include_once 'includes/sidebar.php' ?>
	</div>

	<!-- FOOTER -->
	<?php include_once 'includes/footer.php' ?>