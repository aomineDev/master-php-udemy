/*Diseñar y crear la base de datos de un master_concesionario*/

CREATE DATABASE IF NOT EXISTS master_concesionario;
USE master_concesionario;

CREATE TABLE coches(
	idcoches  		int auto_increment not null,
	modelo			varchar(45) not null,
	marca			varchar(45),
	precio			decimal(20,2) not null,
	stock			int not null,
	CONSTRAINT pk_coches PRIMARY KEY(idcoches)
	)ENGINE=InnoDB;

CREATE TABLE grupos(
	idgrupos		int auto_increment not null,
	nombre			varchar(45) not null,
	ciudad			varchar(45),
	CONSTRAINT pk_grupos PRIMARY KEY(idgrupos)
	)ENGINE=InnoDB;

CREATE TABLE vendedores(
	idvendedores		int auto_increment not null,
	idgrupos				int not null,
	jefe						int,
	nombre					varchar(45) not null,
	apellidos				varchar(45),
	cargo					varchar(45),
	fecha_alta			date,
	sueldo					decimal(20,2),
	comision				decimal(20,2),
	CONSTRAINT pk_vendedores PRIMARY KEY(idvendedores),
	CONSTRAINT fk_vendedores_grupos FOREIGN KEY(idgrupos) REFERENCES grupos(idgrupos),
	CONSTRAINT fk_vendedores_jefe FOREIGN KEY(jefe) REFERENCES vendedores(idvendedores) 
	)ENGINE=InnoDB;

CREATE TABLE clientes(
	idclientes				int auto_increment not null,
	idvendedores		int,
	nombre 				varchar(45) not null,
	ciudad					varchar(45),
	gastado 				decimal(20,2),
	fecha 					date,
	CONSTRAINT pk_clientes PRIMARY KEY(idclientes),
	CONSTRAINT fk_clientes_vendedores FOREIGN KEY(idvendedores) REFERENCES vendedores(idvendedores)
	)ENGINE=InnoDB;

CREATE TABLE encargos(
	idencargos			int auto_increment not null,
	idclientes				int not null,
	idcoches				int not null,
	cantidad				int,
	fecha 					date,
	CONSTRAINT pk_encargos PRIMARY KEY(idencargos),
	CONSTRAINT fk_encargos_clientes FOREIGN KEY(idclientes) REFERENCES clientes(idclientes),
	CONSTRAINT fk_encargos_coche FOREIGN KEY(idcoches) REFERENCES coches(idcoches)
	)ENGINE=InnoDB;

/*Rellenar las tablas de las base de datos*/

/*Coches*/
INSERT INTO coches VALUES(null, 'Renault Clio', 'Renault', 12000, 13),
(null, 'Seat Panda', 'Seat', 10000, 10),
(null, 'Mercedes Ranchera', 'Mercedes Benz', 32000, 24),
(null, 'Porche Cayene', 'Porche', 65000, 5),
(null, 'Lambo Aventador', 'Lamborgini', 170000, 2),
(null, 'Ferrari Spider', 'Ferrari', 245000, 8);

/*Grupos*/
INSERT INTO grupos VALUES(null, 'Vendedores A', 'Madrid'),
(null, 'Vendedores B', 'Madrid'),
(null, 'Directores mecanicos', 'Madrid'),
(null, 'Vendedores A', 'Barcelona'),
(null, 'Vendedores B', 'Barcelona'),
(null, 'Vendedores C', 'Valencia'),
(null, 'Vendedores A', 'Bilbao'),
(null, 'Vendedores B', 'Pamplona'),
(null, 'Vendedores C', 'Santiago de  Compostela');

/*Vendedores*/
INSERT INTO vendedores VALUES
(null, 1, null, 'David', 'Lopez', 'Responsable de tienda', CURDATE(), 3000, 4),
(null, 1, 1, 'Fran', 'Martinez', 'Ayudante en tienda', CURDATE(), 2300, 2),
(null, 2, null, 'Nelson', 'Sanchez', 'Responsable de tienda', CURDATE(), 3800, 5),
(null, 2, 3, 'Jesus', 'Lopez', 'Ayudante en tienda', CURDATE(), 1200, 6),
(null, 3, null, 'Victor', 'Lopez', 'Mecanico jefe', CURDATE(), 5000, 2),
(null, 4, null, 'Antonio', 'Lopez', 'Vendedor de recambios', CURDATE(), 1300, 8),
(null, 5, null, 'Salvador', 'Lopez', 'Vendedor experto', CURDATE(), 6000, 2),
(null, 5, null, 'Joaquin', 'Lopez', 'Ejecutivo de cuentas', CURDATE(), 8000, 1),
(null, 6, 8, 'Luis', 'Lopez', 'Ayudante en tienda', CURDATE(), 1000, 10);

/*Clientes*/
INSERT INTO clientes VALUES
(null, 1, 'Construcciones Diaz Inc', 'Alcobendas', 24000, CURDATE()),
(null, 3, 'Fruteria Antonia Inc', 'Fuenlabrada', 40000, CURDATE()),
(null, 5, 'Imprenta Martinez Inc', 'Barcelona', 32000, CURDATE()),
(null, 1, 'Jesus Colchones Inc', 'El prat', 96000, CURDATE()),
(null, 2, 'Bar Pepe Inc', 'Valencia', 170000, CURDATE()),
(null, 4, 'Tienda PC Inc', 'Murcia', 245000, CURDATE()),
(null, 5, 'Tienda Organica Inc', 'Madrid', 0, CURDATE());

/*Encargos*/
INSERT INTO encargos VALUES
(null, 1, 1, 2, CURDATE()),
(null, 2, 2, 4, CURDATE()),
(null, 3, 3, 1, CURDATE()),
(null, 4, 3, 3, CURDATE()),
(null, 5, 5, 1, CURDATE()),
(null, 6, 6, 1, CURDATE()),
(null, 4, 4, 3, CURDATE());


