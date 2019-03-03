<?php 
class Usuario{
	private $idusuarios;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
	private $img;
	private $fecha;
	
	private $conex;

	public function __construct(){
		$this->conex = DataBase::conex();
	}

	public function getIdusuarios(){	
		return $this->idusuarios;
	}

	public function setIdusuarios($idusuarios){
		$this->idusuarios = $idusuarios;
	}

	public function getNombre(){	
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellidos(){	
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getEmail(){	
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){	
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getRol(){	
		return $this->rol;
	}

	public function setRol($rol){
		$this->rol = $rol;
	}

	public function getImg(){	
		return $this->img;
	}

	public function setImg($img){
		$this->img = $img;
	}

	public function getFecha(){	
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getConex(){	
		return $this->conex;
	}

	public function verifyEmail(){
		$sql = "SELECT email FROM usuarios WHERE email = '{$this->getEmail()}'";
		$query = $this->getConex()->query($sql); 
		$verify = $query->fetch_object();
		return $verify;
	}

	public function save(){
		if (empty($this->getImg())) {
			$sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', DEFAULT, DEFAULT, CURDATE())";
		}else{
			$sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', DEFAULT, '{$this->getImg()}', CURDATE())";
		}
		$save = $this->getConex()->query($sql); 
		return $save;
	}

	public function login(){
		$sql = "SELECT * FROM usuarios WHERE email= '{$this->getEmail()}'";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function destroyUser(){
		$_SESSION['usuario'] = null;
	}

	public function destroyAdmin(){
		$_SESSION['admin'] = null;
	}

}

?>