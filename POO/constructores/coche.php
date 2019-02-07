<?php
/* 
public: podemos acceder desde cualquier lugar, dentro de clase actual, dentro de clases que heredan esta clase o fuera de la clase.
protected: podemos acceder desde la clase que los define y desde clases que hereden esta clase
private: unicamente se puede acceder desde esta clase */

class Coche{
	protected $color;
	private $marca;
	private $modelo;
	private $velocidad;
	private $caballaje;
	private $plazas;

	//Metodo constructor
	public function __construct($color, $marca, $modelo, $velocidad, $caballaje, $plazas){ 
		$this -> color = $color;
		$this -> marca = $marca;
		$this -> modelo = $modelo;
		$this -> velocidad = $velocidad;
		$this -> caballaje = $caballaje;
		$this -> plazas = $plazas;
	}

	//Metodos get and set
	public function getColor(){
		return $this -> color;
	}

	public function setColor(String $color){
		$this -> color = $color;
	}

	public function getMarca(){
		return $this -> marca;
	}

	public function setMarca($marca){
		$this -> marca = $marca;
	}

	public function getModelo(){
		return $this -> modelo;
	}

	public function setModelo($modelo){
		$this -> modelo = $modelo;
	}

	public function getVelocidad(){
		return $this -> velocidad;
	}

	public function setVelocidad($velocidad){
		$this -> velocidad = $velocidad;
	}

	public function getCaballaje(){
		return $this -> caballaje;
	}

	public function setCaballaje($caballaje){
		$this -> caballaje = $caballaje;
	}

	public function getPlazas(){
		return $this -> plazas;
	}

	public function setPlazas($plazas){
		$this -> plazas = $plazas;
	}

	public function acelerar(){
		$this -> velocidad++;
	}

	public function frenar(){
		$this -> velocidad--;
	}

	//Tipado fuerte -> se le exige que la variable sea de un tipo en especifico en este caso que sea de tipo Coche 
	public function mostrarInformacion(Coche $coche){
		if (is_object($coche)) {
			$informacion = "<h2>Informacion del coche</h2>";
			$informacion .= "<p>Color: " . $coche->getColor() . "</p>";
			$informacion .= "<p>Marca: " . $coche->getMarca() . "</p>";
			$informacion .= "<p>Modelo: " . $coche->getModelo() . "</p>";
			$informacion .= "<p>Velocidad: " . $coche->getVelocidad() . "</p>";
		}else{
			$informacion = "El parametrotiene el valor de $coche y es de tipo " . gettype($coche) ;
		}
		return $informacion;
	}

}
?>