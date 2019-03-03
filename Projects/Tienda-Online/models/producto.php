<?php 

class Producto{
	private $idproductos;
	private $idcategorias;
	private $nombre;
	private $descripcion;
	private $precio;
	private $stock;
	private $oferta;
	private $fecha;
	private $img;
	
	private $conex;

	public function __construct(){
		$this->conex = DataBase::conex();
	}

	public function getIdproductos(){	
		return $this->idproductos;
	}
	
	public function setIdproductos($idproductos){
		$this->idproductos = $idproductos;
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


	public function getDescripcion(){	
		return $this->descripcion;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}


	public function getPrecio(){	
		return $this->precio;
	}
	
	public function setPrecio($precio){
		$this->precio = $precio;
	}


	public function getStock(){	
		return $this->stock;
	}
	
	public function setStock($stock){
		$this->stock = $stock;
	}


	public function getOferta(){	
		return $this->oferta;
	}

	public function setOferta($oferta){
		$this->oferta = $oferta;
	}


	public function getFecha(){	
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}


	public function getImg(){	
		return $this->img;
	}
	
	public function setImg($img){
		$this->img = $img;
	}


	public function getConex(){	
		return $this->conex;
	}

	public function random(){
		$sql = "SELECT * FROM productos WHERE stock > 0 ORDER BY RAND() LIMIT 6";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function productos(){
		$sql = "SELECT * FROM productos ORDER BY fecha DESC";
		$query = $this->getConex()->query($sql);
		return $query;
	}

	public function getOne(){
		$sql = "SELECT * FROM productos WHERE idproductos = {$this->getIdproductos()}";
		$id = $this->getConex()->query($sql);
		return $id;
	}

	public function getSpecific(){
		$sql = "SELECT p.*, c.nombre AS 'categoria', DATE_FORMAT(p.fecha, '%d-%m-%Y') AS 'fechaMod' FROM productos p INNER JOIN categorias c ON p.idcategorias = c.idcategorias WHERE p.idproductos = {$this->getIdproductos()}";
		$id = $this->getConex()->query($sql);
		return $id;
	}

	public function save(){
		if (empty($this->getImg())) {
			$sql = "INSERT INTO productos VALUES(null, {$this->getIdcategorias()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, DEFAULT, CURDATE(), DEFAULT)";
		}else{
			$sql = "INSERT INTO productos VALUES(null, {$this->getIdcategorias()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, DEFAULT, CURDATE(), '{$this->getImg()}')";
		}
		$save = $this->getConex()->query($sql); 
		return $save;
	}

	public function edit(){
		if (empty($this->getImg())) {
			$sql = "UPDATE productos SET idcategorias = {$this->getIdcategorias()}, nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock = {$this->getStock()}, fecha = CURDATE() WHERE idproductos = {$this->getIdproductos()}";
		}else{
			$sql = "SELECT img FROM productos WHERE idproductos = {$this->getIdproductos()}";
			$query = $this->getConex()->query($sql);
			$img = $query->fetch_object();
			if ($img->img != 'unknown.jpg') {
				unlink('uploads/img/products/'.$img->img) or die('Error al borrar');
			}
			$sql = "UPDATE productos SET idcategorias = {$this->getIdcategorias()}, nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock = {$this->getStock()}, fecha = CURDATE(), img = '{$this->getImg()}' WHERE idproductos = {$this->getIdproductos()}";
		}
		$edit = $this->getConex()->query($sql); 
		return $edit;
	}

	public function remove(){
		$sql = "SELECT img FROM productos WHERE idproductos = {$this->getIdproductos()}";
		$query = $this->getConex()->query($sql);
		$img = $query->fetch_object();
		if ($img->img != 'unknown.jpg') {
			unlink('uploads/img/products/'.$img->img) or die('Error al borrar');
		}
		$sql = "DELETE FROM productos WHERE idproductos = {$this->getIdproductos()}";
		$remove = $this->getConex()->query($sql);
		return $remove;	
	}

	public function updateStock(){
		$sql = "UPDATE productos SET stock = {$this->getStock()} WHERE idproductos = {$this->getIdproductos()}";
		$query = $this->getConex()->query($sql); 
		return $query;
	}

}

?>