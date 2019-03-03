<?php 

class Pass{
	public static function admin(){
		if (!isset($_SESSION['admin'])) {
			header('Location: '.baseUrl);
		}
	}

	public static function user(){	
		if (!isset($_SESSION['usuario'])) {
			header('Location: '.baseUrl);
		}
	}

	public static function noUser(){
		if (isset($_SESSION['usuario'])) {
			header('Location: '.baseUrl);
		}
	}

}

?>