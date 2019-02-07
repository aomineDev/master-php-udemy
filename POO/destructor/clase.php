<?php 

class Usuario{
	public $nombre;
	public $email;

	public function __construct(){
		$this->nombre = 'aomine';
		$this->email = 'aomine@gmail.com';
		echo "<p>Creando el objeto</p>";
	}
	public function __toString(){
		return "Hola {$this->nombre} esta registrado con el email: {$this->email}";
	}

	public function __destruct(){
		echo "<p>Destruyendo el objeto</p>";
	}

}

?>