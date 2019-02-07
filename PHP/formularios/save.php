<style>
body{
	font-family: Poppins;
	color: #2c3e50;
	-webkit-font-smoothing: antialiased;
}
.volver{
	font-size: 24px;
	color: #2c3e50;
	text-decoration: none;
	transition: .5s;
}
.volver:hover{
	text-decoration: underline;
	color: #42b983;
}
</style>
<?php 
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
echo "<h2>$titulo</h2>";
echo "<p>$descripcion</p>";
?>
<p><a href="index.html" class="volver">Volver</a></p>