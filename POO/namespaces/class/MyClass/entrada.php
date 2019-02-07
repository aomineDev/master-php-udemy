<?php 

namespace MyClass;

class Entrada{
	public $titulo;
	public $fecha;

	public function __construct(){
		$this->titulo = 'Review GTA V';
		$this->fecha = '31 de Enero del 2019';
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

}

?>