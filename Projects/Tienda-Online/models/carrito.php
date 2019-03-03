<?php 

class Carrito{
	private $idcarrito;
	private $idusuarios;
	private $idproductos;
	private $cantidad;
	private $fecha;

	private $conex;

	public function __construct(){
		$this->conex = DataBase::conex();
	}

	public function getIdcarrito(){	
		return $this->idcarrito;
	}
	
	public function setIdcarrito($idcarrito){
		$this->idcarrito = $idcarrito;
	}
	
	public function getIdusuarios(){	
		return $this->idusuarios;
	}

	public function setIdusuarios($idusuarios){
		$this->idusuarios = $idusuarios;
	}


	public function getIdproductos(){	
		return $this->idproductos;
	}
	
	public function setIdproductos($idproductos){
		$this->idproductos = $idproductos;
	}

	public function getCantidad(){	
		return $this->cantidad;
	}
	
	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function getFecha(){	
		return $this->fecha;
	}
	
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}


	public function getConex(){	
		return $this->conex;
	}

	public function carrito(){
		$sql = "SELECT c.*, p.* FROM carrito c INNER JOIN productos p ON c.idproductos = p.idproductos WHERE c.idusuarios = {$this->getIdusuarios()} ORDER BY c.fecha DESC";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getOne(){
		$sql = "SELECT * FROM carrito WHERE idusuarios = {$this->getIdusuarios()} AND idproductos = {$this->getIdproductos()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getOneByUser(){
		$sql = "SELECT * FROM carrito WHERE idusuarios = {$this->getIdusuarios()} LIMIT 1";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getProducto(){
		$sql = "SELECT c.*, p.* FROM carrito c INNER JOIN productos p ON c.idproductos = p.idproductos WHERE c.idusuarios = {$this->getIdusuarios()} AND c.idproductos = {$this->getIdproductos()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getProductos(){
		$sql = "SELECT c.*, p.* FROM carrito c INNER JOIN productos p ON c.idproductos = p.idproductos WHERE c.idusuarios = {$this->getIdusuarios()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function add(){
		$sql = "INSERT INTO carrito VALUES(null, {$this->getIdusuarios()}, {$this->getIdproductos()}, {$this->getCantidad()}, CURDATE())";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function edit(){
		$sql = "UPDATE carrito SET cantidad = {$this->getCantidad()} WHERE idproductos = {$this->getIdproductos()} AND idusuarios = {$this->getIdusuarios()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function remove(){
		$sql = "DELETE FROM carrito WHERE idusuarios = {$this->getIdusuarios()} AND idproductos = {$this->getIdproductos()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function delete(){
		$sql = "DELETE FROM carrito WHERE idusuarios = {$this->getIdusuarios()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

}

?>