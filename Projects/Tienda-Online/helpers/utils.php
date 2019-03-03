<?php 

class Utils{

	public static function invalid($action, $camp){
		$result = null;
		if (isset($action[$camp])) {
			$result = "<span class='invalido'>{$action[$camp]}</span>";
		}
		return $result;
	}

	public static function result($action){
		$result = null;
		if (isset($action['ok'])) {
			$result = "<div class='accion ok'>{$action['ok']}</div>";
		}
		if (isset($action['error'])) {
			$result = "<div class='accion error'>{$action['error']}</div>";
		}
		return $result;
	}

	public static function cleanError(){
		if (isset($_SESSION['errores'])) {
			$_SESSION['errores'] = null;
		}

		if (isset($_SESSION['registro'])) {
			$_SESSION['registro'] = null;
		}

		if (isset($_SESSION['categoria'])) {
			$_SESSION['categoria'] = null;
		}

		if (isset($_SESSION['producto'])) {
			$_SESSION['producto'] = null;
		}

		if (isset($_SESSION['carrito'])) {
			$_SESSION['carrito'] = null;
		}

		if (isset($_SESSION['pedido'])) {
			$_SESSION['pedido'] = null;
		}
		
	}

	public static function cleanSidebar(){
		if (isset($_SESSION['login'])) {
			$_SESSION['login'] = null;
		}
	}

	public static function showError(){
		$error = new ErrorController();
		$error->error404();
	}

	public static function state($state){
		$newState = '';
		switch ($state) {
			case 'confirm':
			$newState = 'Pendiete';
			break;
			case 'preparation':
			$newState = 'En preparación';
			break;
			case 'ready':
			$newState = 'Preparado para enviar';
			break;
			case 'submited':
			$newState = 'Enviado';
			break;
		}
		return $newState;
	}
}

?>