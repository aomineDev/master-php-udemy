<link rel="stylesheet" href="../css/styles.css">

<?php 
echo "<h1 class='text-center'>Errores</h1>";	

//Capturar excepciones, en codigo suceptible a errores  	
try{

	if (isset($_GET['n'])) {
		echo "<p>EL parametro es {$_GET['n']}</p>";
	}else{
		throw new Exception("Faltan parametros por la url");
	}

}catch(Exception $e){
	echo "<p>Ha ocurrido un error: {$e->getMessage()}</p>";
}finally{
	echo "<p>Try y Catch finalizados</p>";
}


?>