<?php 

class Categoria{

	private $idcategorias;
	private $nombre;

	private $conex;

	public function __construct(){
		$this->conex = DataBase::conex();
	}

	public function getIdcategorias(){	
		return $this->idcategorias;
	}

	public function setIdcategorias($idcategorias){
		$this->idcategorias = $idcategorias;
	}

	public function getNombre(){	
		return $this->nombre;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getConex(){	
		return $this->conex;
	}

	public function productos(){
		$sql = "SELECT * FROM productos WHERE idcategorias = {$this->getIdcategorias()} AND stock > 0";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getOne(){
		$sql = "SELECT * FROM categorias WHERE idcategorias = {$this->getIdcategorias()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function categorias(){
		$sql = "SELECT * FROM categorias ORDER BY nombre";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function save(){
		$sql = "INSERT INTO categorias VALUES(null, '{$this->getNombre()}')";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function edit(){
		$sql = "UPDATE categorias SET nombre = '{$this->getNombre()}' WHERE idcategorias = {$this->getIdcategorias()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function remove(){
		$sql = "DELETE FROM categorias WHERE idcategorias = {$this->getIdcategorias()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

}

?>