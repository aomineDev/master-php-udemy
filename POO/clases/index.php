<link rel="stylesheet" href="../css/styles.css">

<?php 
//Programación orientada a objetos en PHP - POO

//Definir una clase (Molde para crear mas objetos de tipo coche con caracteristicas parecidas) 
class Coche{
	//Atributos o propiedades (Variables)
	public $color = 'red';
	public $marca = 'Ferrari_430';
	public $modelo = 'Aventador';
	public $velocidad = 0;
	public $caballaje = 500;
	public $plazas = 2;

	//Metodos (Funciones) - son acciones que hace el objeto
	public function getColor(){
		//$this-> Busca en esta clase la propiedad -o metodo- X
		return $this -> color;
	}

	public function setColor($color){
		$this -> color = $color;
	}

	public function acelerar(){
		$this -> velocidad++;
	}

	public function frenar(){
		$this -> velocidad--;
	}

	public function getVelocidad(){
		return $this -> velocidad;
	}

	public function getMarca(){
		return $this -> marca;
	}

}

echo "<h1 class='text-center'>Clases - Objetos</h1>";		

//Crear un objeto / Instanciar la clase
$coche = new Coche();
echo "<h2>Coche 1</h2>";
$coche->setColor('green');
echo '<p>Color: ' . $coche->getColor() . '</p>';
echo '<p>Velocidad: ' . $coche->getVelocidad() . '</p>';
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
echo '<p>Velocidad acelerada: ' . $coche->getVelocidad() . '</p>';
$coche->frenar();
$coche->frenar();
$coche->frenar();
echo '<p>Velocidad frenada: ' . $coche->getVelocidad() . '</p>';

//Segundo Objeto
$coche2 = new Coche();
echo "<h2>Coche 2</h2>";
echo '<p>Color: ' . $coche2->getColor() . '</p>';
echo '<p>Marca: ' . $coche2->getMarca() . '</p>';
echo '<p>Velocidad: ' . $coche2->getVelocidad() . '</p>';
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
$coche2->acelerar();
echo '<p>Velocidad acelerada: ' . $coche2->getVelocidad() . '</p>';

?>