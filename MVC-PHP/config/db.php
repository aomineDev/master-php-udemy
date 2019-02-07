<?php 

class DB{
	public static function conex(){
		$conex = new mysqli('localhost', 'root', '', 'master_notas');
		$conex->query("SET NAMES 'utf8'");

		return $conex;
	}
}

?>