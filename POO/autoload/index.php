<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Autoload</h1>";	

require_once 'autoload.php';

$usuario = new Usuario();
$categoria = new Categoria();
$entrada = new Entrada();

echo "<h2>Usuario</h2>";
echo "<p>Nombre: $usuario->nombre</p>"; 
echo "<p>Email: $usuario->email</p>"; 
echo "<h2>Categoria</h2>";
echo "<p>Nombre: $categoria->nombre</p>"; 
echo "<p>Descripcion: $categoria->descripcion</p>"; 
echo "<h2>Entrada</h2>";
echo "<p>Titulo: $entrada->titulo</p>"; 
echo "<p>Fecha: $entrada->fecha</p>"; 

?>