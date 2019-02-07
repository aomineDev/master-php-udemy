<?php 
require_once 'config/db.php';
class BaseMethods{

	private $db;

	public function __construct(){ 
		$this->db = DB::conex();
	}

	public function getDb(){	
		return $this->db;
	}
	
	public function setDb($db){
		$this->db = $db;
	}


	public function getAll(String $table){
		$sql = "SELECT * FROM $table ORDER BY fecha DESC";
		$query = $this->getDb()->query($sql);
		return $query;
	}
}
?>
