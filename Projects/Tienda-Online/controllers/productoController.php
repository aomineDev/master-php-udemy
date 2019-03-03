<?php 

require_once 'models/producto.php';

class productoController{

	private $producto;

	public function __construct(){
		$this->producto = new Producto();
	}

	public function random(){
		$productos = $this->producto->random();
		require_once 'views/producto/random.php';
	}

	public function productos(){
		$productos = $this->producto->productos();
		require_once 'views/producto/productos.php';
	}

	public function especifico(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->producto->setIdproductos($id);
			$producto = $this->producto->getSpecific();
			if($producto && $producto->num_rows == 1) {
				$producto = $producto->fetch_object();
				require_once 'views/producto/especifico.php';
			}else{
				header('Location: '.baseUrl);
			}
		}else{
			header('Location: '.baseUrl);
		}
	}

	public function crear(){
		require_once 'views/producto/crear.php';
	}

	public function save(){
		Pass::admin();
		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $this->producto->getConex()->real_escape_string(trim($_POST['nombre'])) : null;
			$descripcion = isset($_POST['descripcion']) ? $this->producto->getConex()->real_escape_string(trim($_POST['descripcion'])) : null;
			$precio = isset($_POST['precio']) ? (int)$_POST['precio'] : null;
			$stock = isset($_POST['stock']) ? (int)$_POST['stock'] : null;
			$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : null;
			$errores = [];

			if (empty($nombre)) {
				$errores['nombre'] = 'El nombre no es valido';
			}

			if (empty($descripcion)) {
				$errores['descripcion'] = 'La descripción no es valida';
			}

			if (empty($precio)) {
				$errores['precio'] = 'El precio no es valido';
			}

			if (empty($stock)) {
				$errores['stock'] = 'El stock no es valido';
			}

			if (empty($categoria)) {
				$errores['categoria'] = 'La categoria no es valida';
			}

			$imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;
			$imagenName =  strtolower($imagen['name']);
			$imagenType = $imagen['type'];


			if (!empty($imagenName)) {
				if ($imagenType == "image/jpg" || $imagenType == "image/jpeg" || $imagenType == "image/png" || $imagenType == "image/gif") {
					if (!is_dir('uploads/img/products')) {
						mkdir('uploads/img/products', 0777, true);
					}

					$gestor = opendir('uploads/img/products');
					if ($gestor){
						while (($image = readdir($gestor)) !== false){
							if ($image != '.' && $image != '..'){
								if ($image != $imagenName) {
									$this->producto->setImg($imagenName);
									move_uploaded_file($imagen['tmp_name'], "uploads/img/products/$imagenName");
								}else{
									$errores['imagen'] = 'El nombre de la imagen ya existe';
								}
							}
						}
					}

				}else{
					$errores['imagen'] = 'El formato de la imagen no es valido';
				}
			}

			if (count($errores) == 0) {

				$this->producto->setIdcategorias($categoria);
				$this->producto->setNombre($nombre);
				$this->producto->setDescripcion($descripcion);
				$this->producto->setPrecio($precio);
				$this->producto->setStock($stock);

				$save = $this->producto->save();

				if ($save) {
					$_SESSION['producto']['ok'] = 'El producto ah sido creado correctamente';
					header('Location: '.baseUrl.'producto/productos');
				}else{
					$_SESSION['producto']['error'] = 'Error al crear el producto';
					header('Location: '.baseUrl.'producto/crear');
				}

			}else{
				$_SESSION['errores'] = $errores;
				header('Location: '.baseUrl.'producto/crear');
			}

		}else{
			header('Location: '.baseUrl.'producto/productos');
		}
		
	}

	public function editar(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->producto->setIdproductos($id);
			$producto = $this->producto->getOne();
			if($producto && $producto->num_rows == 1) {
				$producto = $producto->fetch_object();
				require_once 'views/producto/crear.php';
			}else{
				header('Location: '.baseUrl.'producto/productos');
			}
		}else{
			header('Location: '.baseUrl.'producto/productos');
		}
	}

	public function edit(){	
		Pass::admin();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->producto->setIdproductos($id);
			$producto = $this->producto->getOne();
			if ($producto && $producto->num_rows == 1) {
				if (isset($_POST)) {
					$nombre = isset($_POST['nombre']) ? $this->producto->getConex()->real_escape_string(trim($_POST['nombre'])) : null;
					$descripcion = isset($_POST['descripcion']) ? $this->producto->getConex()->real_escape_string(trim($_POST['descripcion'])) : null;
					$precio = isset($_POST['precio']) ? (int)$_POST['precio'] : null;
					$stock = isset($_POST['stock']) ? $_POST['stock'] : '';
					$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : null;
					$errores = [];

					if (empty($nombre)) {
						$errores['nombre'] = 'El nombre no es valido';
					}

					if (empty($descripcion)) {
						$errores['descripcion'] = 'La descripción no es valida';
					}

					if (empty($precio)) {
						$errores['precio'] = 'El precio no es valido';
					}

					if (is_numeric($stock) && $stock >= 0) {
						$stock = (int)$stock;
					}else{
						$errores['stock'] = 'El stock no es valido';
					}

					if (empty($categoria)) {
						$errores['categoria'] = 'La categoria no es valida';
					}

					$imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;
					$imagenName =  strtolower($imagen['name']);
					$imagenType = $imagen['type'];


					if (!empty($imagenName)) {
						if ($imagenType == "image/jpg" || $imagenType == "image/jpeg" || $imagenType == "image/png" || $imagenType == "image/gif"){
							if (!is_dir('uploads/img/products')) {
								mkdir('uploads/img/products', 0777, true);
							}

							$gestor = opendir('uploads/img/products');
							if ($gestor){
								while (($image = readdir($gestor)) !== false){
									if ($image != '.' && $image != '..'){
										if ($image != $imagenName) {
											$this->producto->setImg($imagenName);
											move_uploaded_file($imagen['tmp_name'], "uploads/img/products/$imagenName");
										}else{
											$errores['imagen'] = 'El nombre de la imagen ya existe';
										}
									}
								}
							}

						}else{
							$errores['imagen'] = 'El formato de la imagen no es valido';
						}
					}

					if (count($errores) == 0) {

						$this->producto->setIdcategorias($categoria);
						$this->producto->setNombre($nombre);
						$this->producto->setDescripcion($descripcion);
						$this->producto->setPrecio($precio);
						$this->producto->setStock($stock);

						$edit = $this->producto->edit();

						if ($edit) {
							$_SESSION['producto']['ok'] = 'El producto ah sido actualizado correctamente';
							header('Location: '.baseUrl.'producto/productos');
						}else{
							$_SESSION['producto']['error'] = 'Error al actualizar el producto';
							header('Location: '.baseUrl.'producto/editar&id='.$id);
						}

					}else{
						$_SESSION['errores'] = $errores;
						header('Location: '.baseUrl.'producto/editar&id='.$id);
					}

				}else{
					header('Location: '.baseUrl.'producto/productos');
				}

			}else{
				header('Location: '.baseUrl.'producto/productos');
			}

		}else{
			header('Location: '.baseUrl.'producto/productos');
		}
		
	}

	public function remove(){
		Pass::admin();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->producto->setIdproductos($id);
			$producto = $this->producto->getOne();
			if ($producto && $producto->num_rows == 1) {
				$remove = $this->producto->remove();
				if ($remove) {
					$_SESSION['producto']['ok'] = "Producto eliminado correctamente";
				}else{
					$_SESSION['producto']['error'] = "Fallo al eliminar el producto";
				}
			}
		}
		header('Location: '.baseUrl.'producto/productos');
	}

}

?>