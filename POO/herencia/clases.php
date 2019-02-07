<?php 
//Herencia: Es la posibilidad de compartir atributos y métodos entre clases
//Creando la clase padre
class Persona{
	private $nombre;
	private $edad;
	private $altura;

	public function getNombre(){
		return $this->nombre;
	}

	public function SetNombre(String $nombre){
		$this->nombre = $nombre;
	}

	public function getEdad(){
		return $this->edad;
	}

	public function setEdad(Int $edad){
		$this->edad = $edad;
	}

	public function getAltura(){
		return $this->altura;
	}

	public function SetAltura(Float $altura){
		$this->altura = $altura;
	}

	public function hablar(){
		return "Hola mi nombre es " . $this->nombre;
	}

	public function caminar(){
		return "Estoy Caminando";
	}

	public function setInformacion(String $nombre, Int $edad, Float $altura){
		$this->nombre = $nombre;
		$this->edad = $edad;
		$this->altura = $altura;
	}

	public function getInformacion(){
		$informacion = "<h2>Informacion de la persona</h2>";
		$informacion .= "<p>Nombre: " . $this->nombre . "</p>";
		$informacion .= "<p>Edad: " . $this->edad . "</p>";
		$informacion .= "<p>Altura: " . $this->altura . "</p>";
		return $informacion;
	}

}

//Creando la clase que hereda la clase padre
class Informatico extends Persona{

	private $lenguajes;
	private $experienciaProgramando;

	public function __construct(){
		$this->lenguajes = "Ninguno";
		$this->experienciaProgramando = "Ninguna";
	}

	public function getLenguajes(){
		return $this->lenguajes;
	}

	public function setLenguajes(String $lenguajes){
		$this->lenguajes = $lenguajes;
	}

	public function getExperienciaProgramando(){
		return $this->experienciaProgramando;
	}

	public function setExperienciaProgramando(String $experienciaProgramando){
		$this->experienciaProgramando = $experienciaProgramando;
	}

	public function programar(){
		return "No compila!!!!";
	}

	public function repararOrdenador(){
		return "Ya reiniciaste?";
	}

}

//Creando una clase que heredea la clase que herede la clase padre :V
class TecnicoRedes extends Informatico{
	private $auditarRedes;
	private $experienciaRedes;

	public function __construct(){
		parent::__construct();
		$this->auditarRedes = "Inactivo";
		$this->experienciaRedes = "Ninguna";
	}

	public function getAuditarRedes(){
		return $this->auditarRedes;
	}

	public function setAuditarRedes(String $auditarRedes){
		$this->auditarRedes = $auditarRedes;
	}

	public function getExperienciaRedes(){
		return $this->experienciaRedes;
	}

	public function setExperienciaRedes(String $experienciaRedes){
		$this->experienciaRedes = $experienciaRedes;
	}

	public function auditoria(){
		return "Estoy auditando una red";
	}

}

?>