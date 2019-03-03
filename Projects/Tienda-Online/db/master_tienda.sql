/*Creando base de datos*/
CREATE DATABASE master_tienda;
USE master_tienda;

/*Creando tablas*/
/*usuarios*/
CREATE TABLE usuarios(
	idusuarios INT auto_increment NOT NULL,
	nombre VARCHAR(45) NOT NULL,
	apellidos VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	password VARCHAR(60) NOT NULL,
	rol VARCHAR(45)  DEFAULT 'usuario' NOT NULL,
	img VARCHAR(255) DEFAULT 'unknown.jpg' NOT NULL,
	fecha DATE NOT NULL,
	CONSTRAINT pk_usuarios PRIMARY KEY(idusuarios),
	CONSTRAINT uq_email UNIQUE(email) 
)ENGINE=InnoDb;

/*categorias*/
CREATE TABLE categorias(
	idcategorias INT auto_increment NOT NULL,
	nombre VARCHAR(45) NOT NULL,
	CONSTRAINT pk_categorias PRIMARY KEY(idcategorias)
	)ENGINE=InnoDb;

/*productos*/
CREATE TABLE productos(
	idproductos INT auto_increment NOT NULL,
	idcategorias INT NOT NULL,
	nombre VARCHAR(45) NOT NULL,
	descripcion TEXT NOT NULL,
	precio DECIMAL(20, 2) NOT NULL,
	stock INT NOT NULL,
	oferta VARCHAR(2) DEFAULT 'no' NOT NULL,	
	fecha DATE NOT NULL,
	img VARCHAR(255) DEFAULT 'unknown.jpg' NOT NULL,
	CONSTRAINT pk_productos PRIMARY KEY(idproductos),
	CONSTRAINT fk_productos_categorias FOREIGN KEY(idcategorias) REFERENCES categorias(idcategorias)
	)ENGINE=InnoDb;

/*carrito*/
CREATE TABLE carrito(
	idcarrito INT auto_increment NOT NULL,
	idusuarios INT NOT NULL,
	idproductos INT NOT NULL,
	cantidad INT NOT NULL,
	fecha DATE NOT NULL,
	CONSTRAINT pk_carrito PRIMARY KEY(idcarrito),
	CONSTRAINT fk_carrito_usuarios FOREIGN KEY(idusuarios) REFERENCES usuarios(idusuarios),
	CONSTRAINT fk_carrito_productos FOREIGN KEY(idproductos) REFERENCES productos(idproductos)
	)ENGINE=InnoDb;

/*pedidos*/
CREATE TABLE pedidos(
	idpedidos INT auto_increment NOT NULL,
	idusuarios INT NOT NULL,
	region VARCHAR(45) NOT NULL,
	ciudad VARCHAR(45) NOT NULL,
	direccion VARCHAR(100) NOT NULL,
	precioTotal DECIMAL(20, 2) NOT NULL,
	estado VARCHAR(20) DEFAULT 'confirm' NOT NULL,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	CONSTRAINT pk_pedidos PRIMARY KEY(idpedidos),
	CONSTRAINT fk_productos_usuarios FOREIGN KEY(idusuarios) REFERENCES usuarios(idusuarios)
	)ENGINE=InnoDb;

/*lineas_pedidos*/
CREATE TABLE lineas_pedidos(
	idlineas_pedidos INT auto_increment NOT NULL,
	idpedidos INT NOT NULL,
	idproductos INT NOT NULL,
	cantidad INT NOT NULL,
	CONSTRAINT pk_lineas_pedidos PRIMARY KEY(idlineas_pedidos),
	CONSTRAINT fk_idlineas_pedidos_pedidos FOREIGN KEY(idpedidos) REFERENCES pedidos(idpedidos),
	CONSTRAINT fk_idlineas_pedidos_productos FOREIGN KEY(idproductos) REFERENCES productos(idproductos)
	)ENGINE=InnoDb;

/*Insertando valores*/
/*usuarios*/
INSERT INTO usuarios VALUES(null, 'admin', 'root', 'admin@gmail.com', '$2y$04$nxblCTKjidtRek/ySy4Hg.WkrE8C18xCSqlF5As7Vu08kqtX1xlbC', 'admin', 'unknown.jpg', CURDATE());

/*categorias*/
INSERT INTO categorias VALUES
(null, 'Manga corta'),
(null, 'Tirantes'),
(null, 'Manga larga'),
(null, 'Sudadera');












