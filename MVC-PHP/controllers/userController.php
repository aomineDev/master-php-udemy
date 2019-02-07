<?php 
//Model
require_once 'models/user.php';

class UserController{
	private $user;

	public function __construct(){
		$this->user = new User();
	}

	public function getAllUsers(){
		$users = $this->user->getAll('usuarios');
		require_once 'views/users/getAll.php';
	}

	public function create(){
		require_once 'views/users/create.php';
	}
}
?>