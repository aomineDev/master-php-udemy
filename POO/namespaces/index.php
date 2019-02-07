<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Namespaces</h1>";	

require_once 'autoload.php';

//Namespace and paquets
use MyClass\Usuario;
use MyClass\Entrada;
use MyClass\Categoria;
use PanelAdministrador\Usuario AS UsuarioAdmin;

class Principal{
	public $usuario;
	public $categoria;
	public $entrada;

	public function __construct(){
		$this->usuario = new Usuario();
		$this->categoria = new Categoria();
		$this->entrada = new Entrada();
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getEntrada(){
		return $this->entrada;
	}

	public function setEntrada($entrada){
		$this->entrada = $entrada;
	}

	//Funciones para clases
	public function informacion(){
		$informacion =  "<p>Clases a la que pertenece: " . __CLASS__ . "</p>"
		."<p>Ruta del Archivo: " . __FILE__ . "</p>"
		// ."<p>Nombre del Trait: " . __TRAIT__ . "</p>"
		// ."<p>Nombre del Namespace: " . __NAMESPACE__ . "</p>"
		."<p>Metodo: " . __METHOD__ . "</p>";

		return $informacion;
	}

}

$principal = new Principal();

echo "<h2>Usuario</h2>";
echo "<p>Nombre: {$principal->usuario->nombre} </p>"; 
echo "<p>Email: {$principal->usuario->email} </p>"; 
echo "<h2>Categoria</h2>";
echo "<p>Nombre: {$principal->categoria->nombre}</p>"; 
echo "<p>Descripcion: {$principal->categoria->descripcion}</p>"; 
echo "<h2>Entrada</h2>";
echo "<p>Titulo: {$principal->entrada->titulo}</p>"; 
echo "<p>Fecha: {$principal->entrada->fecha}</p>";
echo "<h2>Informacion</h2>";
echo "<p>{$principal->informacion()}</p>";


$admin = new UsuarioAdmin();	

echo "<h2>Administrador</h2>";
echo "<p>Nombre: {$admin->nombre} </p>"; 
echo "<p>Email: {$admin->email} </p>"; 

// Comprobar si existe una clase
// @class_exists(class_name); -> para quitar los warnings
$clase = class_exists('PanelAdministrador\Usuario');

if ($clase) {
	echo "<p>La clase Usuario SI existe</p>";
}else{
	echo "<p>La clase Usuario NO existe</p>";
}
//Buscar Metodos en una clase
$methods = get_class_methods($principal);
$busqueda = array_search('getUsuario', $methods);
var_dump($busqueda);

?>