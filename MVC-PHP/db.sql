/*Creando la base de datos*/
CREATE DATABASE master_notas;

/*Creando la tabla usuarios*/
CREATE TABLE usuarios(
	idusuarios int auto_increment not null,
	nombre varchar(20) not null,
	apellidos varchar(30) not null,
	email varchar(40) not null,
	password varchar(30) default 'contraseña' not null,
	fecha date,
	CONSTRAINT pk_usuarios PRIMARY KEY(idusuarios),
	CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb; 

/*Creando la tabla notas*/
CREATE TABLE notas(
	idnotas int auto_increment not null,
	idusuarios int not null,
	titulo varchar(50) not null,
	descripcion text not null,
	fecha date not null,
	CONSTRAINT pk_entradas PRIMARY KEY(idnotas),
	CONSTRAINT fk_entradas_usuarios FOREIGN KEY(idusuarios) REFERENCES usuarios(idusuarios)
)ENGINE=InnoDb;