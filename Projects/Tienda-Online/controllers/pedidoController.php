<?php 

require_once 'models/pedido.php';
require_once 'models/producto.php';
require_once 'models/carrito.php';

class pedidoController{

	private $pedido;
	private $producto;
	private $carrito;

	public function __construct(){
		$this->pedido = new Pedido();
		$this->producto = new Producto();
		$this->carrito = new Carrito();
	}

	public function compra(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$idusuarios = (int)$_SESSION['usuario']->idusuarios;
			$this->carrito->setIdproductos($id);
			$this->carrito->setIdusuarios($idusuarios);
			$query = $this->carrito->getProducto();
			if ($query && $query->num_rows == 1) {
				$productoCarrito = $query->fetch_object();
				if ($productoCarrito->idusuarios == $idusuarios) {
					require_once 'views/pedido/compra.php';	
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

	public function buy(){
		PASS::user();
		if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_POST)) {
			$id = (int)$_GET['id'];
			$idusuarios = (int)$_SESSION['usuario']->idusuarios;
			$this->carrito->setIdproductos($id);
			$this->producto->setIdproductos($id);
			$this->carrito->setIdusuarios($idusuarios);
			$query = $this->carrito->getProducto();
			if ($query && $query->num_rows == 1) {
				$productoCarrito = $query->fetch_object();
				$idusuarios = (int)$_SESSION['usuario']->idusuarios;
				if ($productoCarrito->idusuarios == $idusuarios) {
					$region = isset($_POST['region']) ? $this->pedido->getConex()->real_escape_string(trim($_POST['region'])) : null;
					$ciudad = isset($_POST['ciudad']) ? $this->pedido->getConex()->real_escape_string(trim($_POST['ciudad'])) : null;
					$direccion = isset($_POST['direccion']) ? $this->pedido->getConex()->real_escape_string(trim($_POST['direccion'])) : null;
					$errores = [];

					if (empty($region) || is_numeric($region) || preg_match("/[0-9]/", $region)) {
						$errores['region'] = 'La region no es valida';
					}

					if (empty($ciudad) || is_numeric($ciudad) || preg_match("/[0-9]/", $ciudad)) {
						$errores['ciudad'] = 'La ciudad no es valida';
					}

					if (empty($direccion) || is_numeric($direccion)) {
						$errores['direccion'] = 'La direccion no es valida';
					}
					if (count($errores) == 0) {
						$precioTotal = $productoCarrito->cantidad * $productoCarrito->precio;
						$this->pedido->setIdusuarios($idusuarios);
						$this->pedido->setProvincia($region);
						$this->pedido->setCiudad($ciudad);
						$this->pedido->setDireccion($direccion);
						$this->pedido->setPrecioTotal($precioTotal);
						$buy = $this->pedido->buy();
						if ($buy) {
							$lastPedidoId = $this->pedido->lastPedidoId();
							$lastPedidoId = $lastPedidoId->fetch_object();
							$lastPedidoId = $lastPedidoId->lastId;
							$addLine = $this->pedido->addLine($lastPedidoId, $id, $productoCarrito->cantidad);
							if ($addLine) {
								$remove = $this->carrito->remove();
								if ($remove) {
									$_SESSION['pedido']['ok'] = 'El pedido ah sido realizado correctamente';
									header('Location: '.baseUrl.'pedido/confirmado');
								}else{
									$_SESSION['pedido']['error'] = 'Error al realizar el pedido';
									header('Location: '.baseUrl.'pedido/compra&id='.$id);
								}
							}else{
								$_SESSION['pedido']['error'] = 'Error al realizar el pedido';
								header('Location: '.baseUrl.'pedido/compra&id='.$id);
							}
						}else{
							$_SESSION['pedido']['error'] = 'Error al realizar el pedido';
							header('Location: '.baseUrl.'pedido/compra&id='.$id);
						}
					}else{
						$_SESSION['errores'] = $errores;
						header('Location: '.baseUrl.'pedido/compra&id='.$id);
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

	public function compraTodo(){
		$idusuarios = (int)$_SESSION['usuario']->idusuarios;
		$this->carrito->setIdusuarios($idusuarios);
		$verifyId = $this->carrito->getOneByUser();
		if ($verifyId && $verifyId->num_rows == 1) {
			$verifyId = $verifyId->fetch_object()->idusuarios;
			if ($verifyId == $idusuarios) {
				$query = $this->carrito->getProductos();
				require_once 'views/pedido/compra.php';	
			}else{
				header('Location: '.baseUrl);
			}
		}else{
			header('Location: '.baseUrl);
		}
	}

	public function buyAll(){
		Pass::user();
		$idusuarios = (int)$_SESSION['usuario']->idusuarios;
		$this->carrito->setIdusuarios($idusuarios);
		$verifyId = $this->carrito->getOneByUser();
		if ($verifyId && $verifyId->num_rows == 1) {
			$verifyId = $verifyId->fetch_object()->idusuarios;
			if ($verifyId == $idusuarios) {
				$region = isset($_POST['region']) ? $this->pedido->getConex()->real_escape_string(trim($_POST['region'])) : null;
				$ciudad = isset($_POST['ciudad']) ? $this->pedido->getConex()->real_escape_string(trim($_POST['ciudad'])) : null;
				$direccion = isset($_POST['direccion']) ? $this->pedido->getConex()->real_escape_string(trim($_POST['direccion'])) : null;
				$errores = [];

				if (empty($region) || is_numeric($region) || preg_match("/[0-9]/", $region)) {
					$errores['region'] = 'La region no es valida';
				}

				if (empty($ciudad) || is_numeric($ciudad) || preg_match("/[0-9]/", $ciudad)) {
					$errores['ciudad'] = 'La ciudad no es valida';
				}

				if (empty($direccion) || is_numeric($direccion)) {
					$errores['direccion'] = 'La direccion no es valida';
				}
				if (count($errores) == 0) {
					$precioTotal = 0;
					$productos = $this->carrito->getProductos();
					while ($producto = $productos->fetch_object()) {
						$precio = $producto->precio * $producto->cantidad;
						$precioTotal += $precio;
					}
					$this->pedido->setIdusuarios($idusuarios);
					$this->pedido->setProvincia($region);
					$this->pedido->setCiudad($ciudad);
					$this->pedido->setDireccion($direccion);
					$this->pedido->setPrecioTotal($precioTotal);
					$buy = $this->pedido->buy();
					if ($buy) {
						$addLine = false;
						$lastPedidoId = $this->pedido->lastPedidoId();
						$lastPedidoId = $lastPedidoId->fetch_object();
						$lastPedidoId = $lastPedidoId->lastId;
						$productos = $this->carrito->getProductos();
						while ($producto = $productos->fetch_object()) {
							$addLine = $this->pedido->addLine($lastPedidoId, $producto->idproductos, $producto->cantidad);
						}
						if ($addLine) {
							$delete = $this->carrito->delete();
							if ($delete) {
								$_SESSION['pedido']['ok'] = 'El pedido ah sido realizado correctamente';
								header('Location: '.baseUrl.'pedido/confirmado');
							}else{
								$_SESSION['pedido']['error'] = 'Error al realizar el pedido';
								header('Location: '.baseUrl.'pedido/compraTodo');
							}
							die();
						}else{
							$_SESSION['pedido']['error'] = 'Error al realizar el pedido';
							header('Location: '.baseUrl.'pedido/compraTodo');
						}
					}else{
						$_SESSION['pedido']['error'] = 'Error al realizar el pedido';
						header('Location: '.baseUrl.'pedido/compraTodo');
					}
				}else{
					$_SESSION['errores'] = $errores;
					header('Location: '.baseUrl.'pedido/compraTodo');
				}
			}else{
				header('Location: '.baseUrl);
			}
		}else{
			header('Location: '.baseUrl);
		}
	}

	public function confirmado(){
		$idusuarios = (int)$_SESSION['usuario']->idusuarios;
		$this->pedido->setIdusuarios($idusuarios);
		$pedido = $this->pedido->getLastPedido();
		$pedido = $pedido->fetch_object();
		$this->pedido->setIdpedidos($pedido->idpedidos);
		$productos = $this->pedido->getProductoOfPedido();
		require_once 'views/pedido/confirmado.php';
	}

	public function pedidos(){
		$idusuarios = (int)$_SESSION['usuario']->idusuarios;
		$this->pedido->setIdusuarios($idusuarios);
		$pedidos = $this->pedido->getPedidos();
		require_once 'views/pedido/pedidos.php';
	}

	public function detalle(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$idusuarios = (int)$_SESSION['usuario']->idusuarios;
			$this->pedido->setIdusuarios($idusuarios);
			$this->pedido->setIdpedidos($id);
			$pedido = $this->pedido->getAllByUser();
			if ($pedido && $pedido->num_rows == 1) {
				$pedido = $pedido->fetch_object();
				$productos = $this->pedido->getProductoOfPedido();
				if ($productos && $productos->num_rows >= 1) {
					require_once 'views/pedido/detalle.php';
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

	public function gestion(){
		Pass::admin();
		$idusuarios = (int)$_SESSION['usuario']->idusuarios;
		$this->pedido->setIdusuarios($idusuarios);
		$pedidos = $this->pedido->getAllPedidos();
		$admin = true;
		require_once 'views/pedido/pedidos.php';
	}

	public function detalleGestion(){
		Pass::admin();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->pedido->setIdpedidos($id);
			$pedido = $this->pedido->getAllByAdmin();
			if ($pedido && $pedido->num_rows == 1) {
				$pedido = $pedido->fetch_object();
				$productos = $this->pedido->getProductoOfPedido();
				if ($productos && $productos->num_rows >= 1) {
					$admin = true;
					require_once 'views/pedido/detalle.php';
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

	public function estado(){
		Pass::admin();
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = (int)$_GET['id'];
			$this->pedido->setIdpedidos($id);
			$pedido = $this->pedido->getAllByAdmin();
			if ($pedido && $pedido->num_rows == 1) {
				$estado = isset($_POST['estado']) ? $this->pedido->getConex()->real_escape_string(trim($_POST['estado'])) : null;
				$this->pedido->setEstado($estado);
				$change = $this->pedido->updateState();
				if ($change) {
					$_SESSION['pedido']['ok'] = 'El estado del pedido ha sido cambiado correctamente';
					header('Location: '.baseUrl.'pedido/detalleGestion&id='.$id);
				}else{
					$_SESSION['pedido']['error'] = 'Error al cambiar el estado del pedido';
					header('Location: '.baseUrl.'pedido/detalleGestion&id='.$id);
				}
			}else{
				header('Location: '.baseUrl);
			}
		}else{
			header('Location: '.baseUrl);
		}
	}

}

?>