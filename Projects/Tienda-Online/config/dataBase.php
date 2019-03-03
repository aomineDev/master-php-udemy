<?php 

class DataBase{
	public static function conex(){
		$conex = new mysqli('localhost', 'root', '', 'master_tienda');
		$conex->query("SET NAMES 'utf8'");
		return $conex;
	}
}
session_start();
?>