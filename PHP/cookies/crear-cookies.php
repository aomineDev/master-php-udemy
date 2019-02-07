<?php 
//cookies: Es un fichero que se almacena en el ordenador del usuario que visita la web con el fin de  reciordar datos o rastreas el comportamiente del mismo en la web

//Crear cookies
//setcookie("name", "value que solo puede ser texto", caducidad, ruta, dominio);

//Cookie basica
setcookie("galleta", "valor de mi galleta");

//Cookie con caducidad
setcookie("unyear", "valor de mi cookie de 365 dias", time() + (60*60*24*365));

header('Location:index.php');
?>
