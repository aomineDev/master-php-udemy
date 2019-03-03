<?php 
$db = mysqli_connect('localhost', 'root', '', 'master_blog');

mysqli_query($db, "Set Names 'utf8'");

//Iniciar la sesion
session_start();

?>