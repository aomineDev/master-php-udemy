<?php 

namespace MyClass;

class Categoria{
	public $nombre;
	public $descripcion;

	public function __construct(){
		$this->nombre = 'Accion';
		$this->descripcion = 'Categoria enfocada a las reviews de videojuegos de acción';
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

}

?>