/*
DB->master_php
int(n° cifras) Entero;
integer(n° cifras) Entero maximo(4294967295);
varchar(n° caracteres) Alfanúmerico maximo(255);
char(n° caracteres) Alfanumerico(un solo valor);
floar(n° cifras, n° decimales) Decimal; 
date, time, timestamp Fechas;

//String mas grandes
text 65 535 de caracteres;
Mediuntext 16 000 000 de caracteres;
Longtext 4 billones de caracteres;

//Enteros mas grandes
mediumint 
bigint
*/
/*CREAR TABLA*/
CREATE DATABASE master_php; 
/*CREAR TABLA*/
CREATE TABLE usuarios(id	int(11) auto_increment not null, nombre varchar(50) not null, apellidos varchar(100) not null, email varchar(100) null, password varchar(50) default 'contraseña', CONSTRAINT pk_usuarios PRIMARY kEY(id));