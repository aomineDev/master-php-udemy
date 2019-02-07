<?php 

trait Utilidades{
	public function mostrarNombre(){
		return $this->nombre;
	}
}

class Coche{
	private $nombre;
	private $marca;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	use Utilidades;

}

class Persona{
	private $nombre;
	private $apellido;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	use Utilidades;

}

class Juego{
	private $nombre;
	private $categoria;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	use Utilidades;

}

?>