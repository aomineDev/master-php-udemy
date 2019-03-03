<?php 

require_once 'models/producto.php';
require_once 'models/carrito.php';

class carritoController{

	private $producto;
	private $carrito;

	public function __construct(){
		$this->producto = new Producto();
		$this->carrito = new Carrito();
	}

	public function carrito(){
		$id = (int)$_SESSION['usuario']->idusuarios;
		$this->carrito->setIdusuarios($id);
		$productos = $this->carrito->carrito();
		require_once 'views/carrito/carrito.php';
	}

	public function añadir(){
		if (isset($_SESSION['usuario'])) {
			if (isset($_GET['id']) && is_numeric($_GET['id'])) {
				$id = (int)$_GET['id'];
				$this->producto->setIdproductos($id);
				$producto = $this->producto->getOne();
				if ($producto && $producto->num_rows == 1) {
					require_once 'views/carrito/añadir.php';
				}else{
					header('Location: '.baseUrl);
				}
			}else{
				header('Location: '.baseUrl);
			}
		}else{
			echo "Usted no esta identificado.";
		}
	}

	public function add(){
		if (isset($_POST) && isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$cantidad =  isset($_POST['cantidad'])  ? (int)$_POST['cantidad'] : null;
			$errores = [];
			if (empty($cantidad)) {
				$errores['cantidad'] = 'EL campo esta vacio';
			}
			if ($cantidad < 0) {
				$errores['cantidad'] = 'EL campo es invalido';
			}
			if (count($errores) == 0) {
				$this->producto->setIdproductos($id);
				$producto = $this->producto->getOne();
				if ($producto && $producto->num_rows == 1) {
					$producto = $producto->fetch_object();
					if ($producto->stock != 0 && $producto->stock >= $cantidad) {
						$newStock = $producto->stock - $cantidad;
						$this->producto->setStock($newStock);
						$query = $this->producto->updateStock();
						if ($query) {
							$idusuarios = (int)$_SESSION['usuario']->idusuarios;
							$this->carrito->setIdproductos($id);
							$this->carrito->setIdusuarios($idusuarios);
							$verify = $this->carrito->getOne();
							if ($verify->num_rows == 0) {
								$this->carrito->setCantidad($cantidad);
								$carrito = $this->carrito->add();
							}else{
								$productoCarrito = $verify->fetch_object();
								$newCantidad = $productoCarrito->cantidad + $cantidad;
								$this->carrito->setCantidad($newCantidad);
								$carrito = $this->carrito->edit();
							}
							if ($carrito) {
								$_SESSION['carrito']['ok'] = 'Producto añadido al carrito correctamente';
								header('Location: '.baseUrl.'carrito/carrito');
							}else{
								$_SESSION['carrito']['error'] = 'Error al añadir el producto al carrito';
								header('Location: '.baseUrl.'carrito/añadir&id='.$id);
							}
						}else{
							$_SESSION['carrito']['error'] = 'Error al añadir el producto al carrito';
							header('Location: '.baseUrl.'carrito/añadir&id='.$id);
						}
					}else{
						$_SESSION['carrito']['error'] = 'No existe suficiente stock de este producto';
						header('Location: '.baseUrl.'carrito/añadir&id='.$id);
					}	
				}else{
					header('Location: '.baseUrl);
				}
			}else{
				$_SESSION['errores'] = $errores;
				header('Location: '.baseUrl.'carrito/añadir&id='.$id);
			}
		}else{
			header('Location: '.baseUrl);
		}
	}

	public function actualizar(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$idusuarios = (int)$_SESSION['usuario']->idusuarios;
			$this->carrito->setIdproductos($id);
			$this->carrito->setIdusuarios($idusuarios);
			$query = $this->carrito->getOne();
			if ($query && $query->num_rows == 1) {
				$product = $query->fetch_object();
				$idusuarios = (int)$_SESSION['usuario']->idusuarios;
				if ($product->idusuarios == $idusuarios) {
					require_once 'views/carrito/añadir.php';
				}else{
					header('Location: '.baseUrl);
				}
			}else{
				// header('Location: '.baseUrl);
				echo "aqui";
			}
		}else{
			header('Location: '.baseUrl);
		}
	}

	public function update(){
		Pass::user();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$idusuarios = (int)$_SESSION['usuario']->idusuarios;
			$this->carrito->setIdproductos($id);
			$this->carrito->setIdusuarios($idusuarios);
			$query = $this->carrito->getOne();
			if ($query && $query->num_rows == 1) {
				$productoCarrito = $query->fetch_object();
				$cantidad =  isset($_POST['cantidad'])  ? (int)$_POST['cantidad'] : null;
				$errores = [];
				if (empty($cantidad)) {
					$errores['cantidad'] = 'EL campo esta vacio';
				}
				if ($cantidad < 0) {
					$errores['cantidad'] = 'EL campo es invalido';
				}
				if (count($errores) == 0) {
					$this->producto->setIdproductos($id);
					$producto = $this->producto->getOne();
					if ($producto && $producto->num_rows == 1) {
						$producto = $producto->fetch_object();
						$newCantidad = $cantidad - $productoCarrito->cantidad;
						if ($producto->stock >= $newCantidad) {
							$newStock = $producto->stock - $newCantidad;
							$this->producto->setStock($newStock);
							$query = $this->producto->updateStock();
							if ($query) {
								$this->carrito->setCantidad($cantidad);
								$carrito = $this->carrito->edit();
								if ($carrito) {
									$_SESSION['carrito']['ok'] = 'Producto actualizado correctamente';
									header('Location: '.baseUrl.'carrito/carrito');
								}else{
									$_SESSION['carrito']['error'] = 'Error al actualizar el producto del carrito';
									header('Location: '.baseUrl.'carrito/actualizar&id='.$id);
								}
							}else{
								$_SESSION['carrito']['error'] = 'Error al actualizar el producto del carrito';
								header('Location: '.baseUrl.'carrito/actualizar&id='.$id);
							}
						}else{
							$_SESSION['carrito']['error'] = 'No existe suficiente stock de este producto';
							header('Location: '.baseUrl.'carrito/actualizar&id='.$id);
						}	
					}else{
						header('Location: '.baseUrl);
					}
				}else{
					$_SESSION['errores'] = $errores;
					header('Location: '.baseUrl.'carrito/actualizar&id='.$id);
				}

			}else{
				header('Location: '.baseUrl);
			}
		}else{
			header('Location: '.baseUrl);
		}
	}

	public function remove(){
		Pass::user();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$idusuarios = (int)$_SESSION['usuario']->idusuarios;
			$this->carrito->setIdproductos($id);
			$this->carrito->setIdusuarios($idusuarios);
			$query = $this->carrito->getOne();
			if ($query && $query->num_rows == 1) {
				$productoCarrito = $query->fetch_object();
				if ($productoCarrito->idusuarios == $idusuarios) {
					$this->producto->setIdproductos($id);
					$producto = $this->producto->getOne();
					$producto = $producto->fetch_object();
					$newCantidad = $productoCarrito->cantidad;
					$newStock = $producto->stock + $newCantidad;
					$this->producto->setStock($newStock);
					$query = $this->producto->updateStock();
					if ($query) {
						$remove = $this->carrito->remove();
						if ($remove) {
							$_SESSION['carrito']['ok'] = 'Producto eliminado correctamente';
							header('Location: '.baseUrl.'carrito/carrito');
						}else{
							$_SESSION['carrito']['error'] = 'Error al eliminar el producto del carrito';
							header('Location: '.baseUrl.'carrito/carrito');
						}
					}else{
						$_SESSION['carrito']['error'] = 'Error al eliminar el producto del carrito';
						header('Location: '.baseUrl.'carrito/carrito');
					}		
				}else{
					header('Location: '.baseUrl);
				}
			}else{
				header('Location: '.baseUrl);
			}
		}else{
			header('Location: '.baseUrl);
		}
	}

	public function delete(){
		Pass::user();
		$id = (int)$_SESSION['usuario']->idusuarios;
		$errores = 0;
		$this->carrito->setIdusuarios($id);
		$productosCarrito = $this->carrito->carrito();
		if ($productosCarrito && $productosCarrito->num_rows >= 1){ 
			while ($productoCarrito = $productosCarrito->fetch_object()){ 
				$this->producto->setIdproductos($productoCarrito->idproductos);
				$producto = $this->producto->getOne();
				if ($producto && $producto->num_rows == 1) {
					$producto = $producto->fetch_object();
					$newStock = $productoCarrito->cantidad + $producto->stock;
					$this->producto->setStock($newStock);
					$update = $this->producto->updateStock();
					if (!$update) {
						$errores++;
					}
				}else{ 
					$_SESSION['carrito']['error'] = 'Error al eliminar el carrito';
					header('Location: '.baseUrl.'carrito/carrito');
				}
			}
			if ($errores == 0) {
				$delete = $this->carrito->delete();
				if ($delete) {
					$_SESSION['carrito']['ok'] = 'Carrito eliminado correctamente';
					header('Location: '.baseUrl.'carrito/carrito');
				}else{
					$_SESSION['carrito']['error'] = 'Error al eliminar el carrito';
					header('Location: '.baseUrl.'carrito/carrito');
				}
			}
		}else{ 
			$_SESSION['carrito']['error'] = 'Error al eliminar el carrito';
			header('Location: '.baseUrl.'carrito/carrito');
		}
	}

	public function up(){
		Pass::user();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$idusuarios = (int)$_SESSION['usuario']->idusuarios;
			$this->carrito->setIdusuarios($idusuarios);
			$this->carrito->setIdproductos($id);
			$this->producto->setIdproductos($id);
			$productoCarrito = $this->carrito->getOne();
			$producto = $this->producto->getOne();
			if ($productoCarrito && $productoCarrito->num_rows == 1 && $producto && $producto->num_rows == 1) {
				$productoCarrito = $productoCarrito->fetch_object();
				$producto = $producto->fetch_object();
				if ($producto->stock > 0) {
					$this->carrito->setCantidad(++$productoCarrito->cantidad);
					$this->producto->setStock(--$producto->stock);
					$c = $this->carrito->edit();
					$s = $this->producto->updateStock();
					if ($c && $s) {
						$_SESSION['carrito']['ok'] = 'Producto actualizado correctamente';
						header('Location: '.baseUrl.'carrito/carrito');
					}else{
						$_SESSION['carrito']['error'] = 'Error al actualizar el producto del carrito';
						header('Location: '.baseUrl.'carrito/carrito');
					}			
				}else{
					$_SESSION['carrito']['error'] = 'No existe suficiente stock de este producto';
					header('Location: '.baseUrl.'carrito/carrito');
				}
			}
		}
	}

	public function down(){
		Pass::user();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$idusuarios = (int)$_SESSION['usuario']->idusuarios;
			$this->carrito->setIdusuarios($idusuarios);
			$this->carrito->setIdproductos($id);
			$this->producto->setIdproductos($id);
			$productoCarrito = $this->carrito->getOne();
			$producto = $this->producto->getOne();
			if ($productoCarrito && $productoCarrito->num_rows == 1 && $producto && $producto->num_rows == 1) {
				$productoCarrito = $productoCarrito->fetch_object();
				$producto = $producto->fetch_object();
				if ($productoCarrito->cantidad != 1) {
					$this->carrito->setCantidad(--$productoCarrito->cantidad);
					$this->producto->setStock(++$producto->stock);
					$c = $this->carrito->edit();
					$s = $this->producto->updateStock();
					if ($c && $s) {
						$_SESSION['carrito']['ok'] = 'Producto actualizado correctamente';
						header('Location: '.baseUrl.'carrito/carrito');
					}else{
						$_SESSION['carrito']['error'] = 'Error al actualizar el producto del carrito';
						header('Location: '.baseUrl.'carrito/carrito');
					}			
				}else{
					$this->producto->setStock(++$producto->stock);
					$s = $this->producto->updateStock();
					$remove = $this->carrito->remove();
					$_SESSION['carrito']['error'] = 'EL producto ha sido eliminado';
					header('Location: '.baseUrl.'carrito/carrito');
				}
			}
		}
	}

}

?>