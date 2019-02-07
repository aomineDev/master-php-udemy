<?php 
//Conectar a la base de datos
//DB->master_mysql_php
//tabla id, nombre, apellidos, email, password 
$conexion = mysqli_connect('localhost', 'root', '', 'master_mysql_php');

//Comprobar si la conexion es correcta
if (mysqli_connect_errno()) {
	echo '<p>La conexión a la base de datos MySQL a fallado</p>' . mysqli_connect_error();
}else{
	echo "<p>conexión realizada correctamente!!!</p>";
}

//Consulta para configurar la codificaciòn de caracteres
mysqli_query($conexion, "SET NAMES 'utf8'");
// $conexion -> set_charset("utf8");

//Consulta Select desde php
$query = mysqli_query($conexion, "SELECT * FROM notas");
while ($nota = mysqli_fetch_assoc($query)) {
	echo "<h2>" . $nota['titulo'] . "</h2>";
	echo '<p>' . $nota['descripcion'] . '</p>';
	echo '<p>' . $nota['color'] . '</p>';
}

//Insertar registros en la base de datos desde PHP
// $insert = "INSERT INTO notas VALUES(null, 'Nota desde PHP', 'Esto es una nota enviada desde PHP', 'Green')";
// $query2 = mysqli_query($conexion, $insert);
// if ($query2) {
// 	echo "<p>Datos insertados correctamente</p>";
// }else{
// 	echo "Error " . mysqli_error($conexion);
// }

?>