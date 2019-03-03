<?php 

class ErrorController{
	public function error404(){
		require_once 'views/error/error404.php';
	}

	public function process(){
		require_once 'views/error/process.php';
	}
}

?>