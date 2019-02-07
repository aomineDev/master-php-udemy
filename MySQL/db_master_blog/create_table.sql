/*Creando la tabla usuarios*/
CREATE TABLE usuarios(
	idusuarios int auto_increment not null,
	nombre varchar(20) not null,
	apellidos varchar(30) not null,
	email varchar(40) not null,
	password varchar(30) default 'contraseña' not null,
	fecha_registro date,
	CONSTRAINT pk_usuarios PRIMARY KEY(idusuarios),
	CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb; 

/*Creando la tabla categorias*/
CREATE TABLE categorias(
	idcategorias int auto_increment not null,
	nombre_categoria varchar(20) not null,
	CONSTRAINT pk_categorias PRIMARY KEY(idcategorias)
)ENGINE=InnoDb;

/*Creando la tabla entradas*/
CREATE TABLE entradas(
	identradas int auto_increment not null,
	idusuarios int not null,
	idcategorias int not null,
	titulo varchar(50) not null,
	descripcion text not null,
	fecha date not null,
	CONSTRAINT pk_entradas PRIMARY KEY(identradas),
	CONSTRAINT fk_entradas_usuarios FOREIGN KEY(idusuarios) REFERENCES usuarios(idusuarios),
	CONSTRAINT fk_entradas_categorias FOREIGN KEY(idcategorias) REFERENCES categorias(idcategorias) ON DELETE CASCADE
)ENGINE=InnoDb;

/*ON DELETE SET NULL*/
/*ON DELETE SET DEFAULT*/
/*ON DELETE NO ACTION*/
/*ON UPDATE CASCADE*/