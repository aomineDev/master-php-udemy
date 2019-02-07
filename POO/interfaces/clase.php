<?php 
interface Ordernador{
	public function encender();
	public function apagar();
	public function reiniciar();
	public function desfragmentar();
	public function detectarUSB();
}

class IMac implements Ordernador{
	public $modelo;

	public function getModelo(){
		return $this->modelo;
	}

	public function setModelo($modelo){
		$this->modelo = $modelo;
	}

	public function encender(){
		return "Encendido";
	}

	public function apagar(){
		return "Apagado";

	}

	public function reiniciar(){
		return "Reiniciando";
	}

	public function desfragmentar(){
		return "Desfragmentando";
	}

	public function detectarUSB(){
		return "USB detectado";

	}

}

?>