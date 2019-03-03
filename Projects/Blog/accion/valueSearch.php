<?php 
session_start();

$_SESSION['search'] = $_POST['search'];

header('Location: ../busqueda.php');

?>