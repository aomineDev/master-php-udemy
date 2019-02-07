<?php 

namespace MyClass;

class Usuario{
	public $email;
	public $nombre;

	public function __construct(){
		$this->email = 'aomine@gmail.com';
		$this->nombre = 'aomine';
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

}

?>