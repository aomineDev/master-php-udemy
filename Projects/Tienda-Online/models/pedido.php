<?php 

class Pedido{
	private $idpedidos;
	private $idusuarios;
	private $provincia;
	private $ciudad;
	private $direccion;
	private $precioTotal;
	private $estado;
	private $fecha;
	private $hora;

	private $conex;

	public function __construct(){
		$this->conex = DataBase::conex();
	}
	public function getIdpedidos(){	
		return $this->idpedidos;
	}
	
	public function setIdpedidos($idpedidos){
		$this->idpedidos = $idpedidos;
	}

	public function getIdusuarios(){	
		return $this->idusuarios;
	}
	
	public function setIdusuarios($idusuarios){
		$this->idusuarios = $idusuarios;
	}

	public function getProvincia(){	
		return $this->provincia;
	}
	
	public function setProvincia($provincia){
		$this->provincia = $provincia;
	}

	public function getCiudad(){	
		return $this->ciudad;
	}
	
	public function setCiudad($ciudad){
		$this->ciudad = $ciudad;
	}

	public function getDireccion(){	
		return $this->direccion;
	}
	
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getPrecioTotal(){	
		return $this->precioTotal;
	}

	public function setPrecioTotal($precioTotal){
		$this->precioTotal = $precioTotal;
	}

	public function getEstado(){	
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getFecha(){	
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getHora(){	
		return $this->hora;
	}

	public function setHora($hora){
		$this->hora = $hora;
	}

	public function getConex(){	
		return $this->conex;
	}

	public function getAllByUser(){
		$sql = "SELECT * FROM pedidos WHERE idusuarios = {$this->getIdusuarios()} AND idpedidos = {$this->getIdpedidos()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getAllByAdmin(){
		$sql = "SELECT *, CONCAT(u.nombre, ' ', u.apellidos) AS name FROM pedidos p INNER JOIN usuarios u ON p.idusuarios = u.idusuarios WHERE p.idpedidos = {$this->getIdpedidos()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getLastPedido(){
		$sql = "SELECT * FROM pedidos WHERE idusuarios = {$this->getIdusuarios()} ORDER BY idpedidos DESC LIMIT 1";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getProductoOfPedido(){
		$sql = "SELECT lp.*, p.* FROM lineas_pedidos lp INNER JOIN productos p ON  lp.idproductos = p.idproductos WHERE lp.idpedidos = {$this->getIdpedidos()}";
		// $sql= "SELECT * FROM productos WHERE idproductos IN (SELECT idproductos FROM lineas_pedidos WHERE idpedidos = {$this->getIdpedidos()})";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getUsuarioOfPedido(){
		$sql = "SELECT lp.*, p.* FROM lineas_pedidos lp INNER JOIN productos p ON  lp.idproductos = p.idproductos WHERE lp.idpedidos = {$this->getIdpedidos()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getPedidos(){
		$sql = "SELECT * FROM pedidos WHERE idusuarios = {$this->getIdusuarios()} ORDER BY fecha, hora DESC";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getAllPedidos(){
		$sql = "SELECT * FROM pedidos ORDER BY fecha, hora DESC";
		$query = $this->getConex()->query($sql);
		return $query;
	}
	
	public function buy(){
		$sql = "INSERT INTO pedidos VALUES(null, {$this->getIdusuarios()}, '{$this->getProvincia()}', '{$this->getCiudad()}', '{$this->getDireccion()}', {$this->getPrecioTotal()}, DEFAULT, CURDATE(), CURTIME())";
		$query = $this->getConex()->query($sql);
		return $query;
	}
	
	public function lastPedidoId(){
		$sql = "SELECT  LAST_INSERT_ID() AS 'lastId'";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function addLine($pedidoId, $productoId, $cantidad){
		$sql = "INSERT INTO lineas_pedidos VALUES(null, {$pedidoId}, {$productoId}, {$cantidad})";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function updateState(){
		$sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' WHERE idpedidos = {$this->getIdpedidos()}";
		$query = $this->getConex()->query($sql);
		return $query;
	}

}

?>