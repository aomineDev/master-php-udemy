<?php 

require_once 'models/categoria.php';

class categoriaController{

	private $categoria;

	public function __construct(){
		$this->categoria = new Categoria();
	}

	public function productos(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->categoria->setIdcategorias($id);
			$categoria = $this->categoria->getOne();
			if ($categoria && $categoria->num_rows == 1) {
				$category = $categoria->fetch_object(); 
				$productos = $this->categoria->productos();
				require_once 'views/categoria/productos.php';
			}else{
				header('Location: ' . baseUrl);
			}	
		}else{
			header('Location: ' . baseUrl);
		}
	}	

	public function categorias(){
		$categorias = $this->categoria->categorias();
		require_once 'views/categoria/categorias.php';
	}

	public function crear(){
		require_once 'views/categoria/crear.php';
	}

	public function save(){
		Pass::admin();
		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $this->categoria->getConex()->real_escape_string(trim($_POST['nombre'])) : null;
			$errores = [];

			if (empty($nombre)) {
				$errores['nombre'] = 'El nombre no es valido';
			}

			if (count($errores) == 0) {
				$this->categoria->setNombre($nombre);

				$save = $this->categoria->save();

				if ($save) {
					$_SESSION['categoria']['ok'] = 'La categoria ah sido creada correctamente';
					header('Location: '.baseUrl.'categoria/categorias');
				}else{
					$_SESSION['categoria']['error'] = 'Error al crear la categoria';
					header('Location: '.baseUrl.'categoria/crear');
				}

			}else{
				$_SESSION['errores'] = $errores;
				header('Location: '.baseUrl.'categoria/crear');
			}

		}else{
			header('Location: '.baseUrl.'categoria/categorias');
		}

	}

	public function elegir(){
		$elegir = true;
		require_once 'views/categoria/eliminar.php';
	}

	public function editar0(){
		if (isset($_POST)) {
			$id = isset($_POST['categoria']) ? (int)$_POST['categoria'] : null;
			header('Location: '.baseUrl.'categoria/editar&id='.$id);
		}else{
			header('Location: '.baseUrl.'categoria/categorias');
		}
	}

	public function editar(){	
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->categoria->setIdcategorias($id);
			$categoria = $this->categoria->getOne();
			if ($categoria && $categoria->num_rows == 1) {
				$allCategoria = $categoria->fetch_object(); 
				require_once 'views/categoria/crear.php';
			}else{
				header('Location: '.baseUrl.'categoria/categorias');
			}
		}else{
			header('Location: '.baseUrl.'categoria/categorias');
		}
	}

	public function edit(){
		Pass::admin();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->categoria->setIdcategorias($id);
			$categoria = $this->categoria->getOne();
			if ($categoria && $categoria->num_rows == 1) {
				if (isset($_POST)) {
					$nombre = isset($_POST['nombre']) ? $this->categoria->getConex()->real_escape_string(trim($_POST['nombre']))  : null;	
					$errores = [];

					if (empty($nombre)) {
						$errores['nombre'] = 'El nombre no es valido';
					}

					if (count($errores) == 0) {
						$this->categoria->setNombre($nombre);

						$edit = $this->categoria->edit();

						if ($edit) {
							$_SESSION['categoria']['ok'] = 'La categoria ah sido editada correctamente';
							header('Location: '.baseUrl.'categoria/categorias');
						}else{
							$_SESSION['categoria']['error'] = 'Error al editar la categoria';
							header('Location: '.baseUrl.'categoria/editar&id='.$id);
						}

					}else{
						$_SESSION['errores'] = $errores;
						header('Location: '.baseUrl.'categoria/editar&id='.$id);
					}
				}else{
					header('Location: '.baseUrl.'categoria/categorias');
				}
			}else{
				header('Location: '.baseUrl.'categoria/categorias');
			}
		}else{
			header('Location: '.baseUrl.'categoria/categorias');
		}
	}

	public function eliminar(){
		require_once 'views/categoria/eliminar.php';
	}

	public function remove(){
		Pass::admin();
		if (isset($_POST)) {
			$id = isset($_POST['categoria']) ? (int) $_POST['categoria'] : null;	

			$this->categoria->setIdcategorias($id);

			$remove = $this->categoria->remove();

			if ($remove) {
				$_SESSION['categoria']['ok'] = 'La categoria ah sido eliminada correctamente';
				header('Location: '.baseUrl.'categoria/categorias');
			}else{
				$_SESSION['categoria']['error'] = 'Error al eliminar la categoria';
				header('Location: '.baseUrl.'categoria/eliminar');
			}

		}else{
			header('Location: '.baseUrl.'categoria/categorias');
		}

	}

}

?>