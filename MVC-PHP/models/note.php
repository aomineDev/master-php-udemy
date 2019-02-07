<?php 
require_once 'baseMethods.php';
class Note extends baseMethods{
	private $idnotas;
	private $idusuarios;
	private $titulo;
	private $descripcion;
	private $fecha;

	public function __construct(){
		parent::__construct();
	}

	public function getIdnotas(){	
		return $this->idnotas;
	}
	
	public function setIdnotas(Int $idnotas){
		$this->idnotas = $idnotas;
	}

	public function getIdusuarios(){	
		return $this->idusuarios;
	}
	
	public function setIdusuarios(Int $idusuarios){
		$this->idusuarios = $idusuarios;
	}

	public function getTitulo(){	
		return $this->titulo;
	}

	public function setTitulo(String $titulo){
		$this->titulo = $titulo;
	}

	public function getDescripcion(){	
		return $this->descripcion;
	}

	public function setDescripcion(String $descripcion){
		$this->descripcion = $descripcion;
	}

	public function getFecha(){	
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}
	
	public function createNote(){
		$sql = "INSERT INTO notas(idusuarios, titulo, descripcion, fecha) VALUES({$this->getIdusuarios()}, '{$this->getTitulo()}', '{$this->getDescripcion()}', CURDATE())";
		$query = $this->getDb()->query($sql);
	}

}
?>