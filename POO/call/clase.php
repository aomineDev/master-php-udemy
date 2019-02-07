<?php 

class Persona{
	private $nombre;
	private $edad;
	private $ciudad;

	public function __construct($nombre, $edad, $ciudad){
		$this->nombre = $nombre;
		$this->edad = $edad;
		$this->ciudad = $ciudad;
	}

	public function __call($name, $argument){
		$prefix_method = substr($name, 0, 3);
		$method_name = substr(strtolower($name), 3);
		if ($prefix_method == 'get') {
			if (!isset($this->$method_name)) {
				return "El metodo $prefix_method para la propieda $method_name no existe.";
			}
			return $this->$method_name; // = $this->nombre
		}else{
			return "El metodo $prefix_method para la propieda $method_name no existe.";
		}

	}

}

?>