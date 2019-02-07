	/*Mostrar todos los registros / filas de una tabla*/
	SELECT * FROM usuarios;
	SELECT nombre FROM usuarios;
	SELECT apellidos, email FROM usuarios;
	SELECT * FROM usuarios WHERE idusuarios = 1;

	/*Operadores aritmeticos*/
	SELECT email, (1+2) AS 'operacion' FROM usuarios;
	SELECT email, (idusuarios+2) AS 'operacion' FROM usuarios;

	/*Funciones matematicas*/
	SELECT DISTINCT ABS(-7) AS 'operacion' FROM usuarios;/*Valor abosluto*/
	SELECT DISTINCT CEIL(7.34) AS 'operacion' FROM usuarios;/*Redondeo superior*/
	SELECT DISTINCT FLOOR(7.34) AS 'operacion' FROM usuarios;/*Redondeo inferior*/
	SELECT DISTINCT ROUND(7.54) AS 'operacion' FROM usuarios;/*Redondeo*/
	SELECT DISTINCT ROUND(7.4564654, 2) AS 'operacion' FROM usuarios;/*Redondeo con 2 decimales*/
	SELECT DISTINCT PI() AS 'operacion' FROM usuarios;/*PI*/
	SELECT  ROUND(RAND()*10) AS 'operacion' FROM usuarios;/*Redondeando numero random x 10*/
	SELECT DISTINCT SQRT(25) AS 'operacion' FROM usuarios;/*Raiz cuadrada*/
	SELECT DISTINCT TRUNCATE(7.4584654, 2) AS 'operacion' FROM usuarios;/*Numero exacto de decimales*/

	/*Ordenar*/
	SELECT idusuarios, apellidos FROM usuarios ORDER BY apellidos;
	SELECT idusuarios, apellidos FROM usuarios ORDER BY apellidos ASC;
	SELECT idusuarios, apellidos FROM usuarios ORDER BY apellidos DESC;

	/*Limitar*/
	SELECT idusuarios, nombre FROM usuarios LIMIT 3;
	SELECT idusuarios, nombre FROM usuarios LIMIT 1, 3;
	SELECT idusuarios, nombre FROM usuarios LIMIT 0, 4;

	/*Funciones de texto*/
	SELECT LOWER(nombre) FROM usuarios;
	SELECT UPPER(nombre) FROM usuarios;
	SELECT LENGTH(nombre) FROM usuarios;
	SELECT CONCAT(nombre, ' ', apellidos) AS 'concatenacion' FROM usuarios;
	SELECT TRIM(CONCAT('        ', nombre, ' ', apellidos, '            ')) AS 'concatenacion' FROM usuarios;

	/*Funciones para fechas*/
	SELECT DISTINCT CURDATE() AS 'Fecha actual' FROM usuarios;
	SELECT DATEDIFF(fecha_registro, CURDATE()) AS 'Fecha actual' FROM usuarios;
	SELECT DAY(fecha_registro) FROM usuarios;
	SELECT DAYNAME(fecha_registro) FROM usuarios;
	SELECT DAYOFMONTH(fecha_registro) FROM usuarios;
	SELECT DAYOFWEEK(fecha_registro) FROM usuarios;
	SELECT DAYOFYEAR(fecha_registro) FROM usuarios;
	SELECT MONTH(fecha_registro) FROM usuarios;
	SELECT YEAR(fecha_registro) FROM usuarios;
	SELECT HOUR(fecha_registro) FROM usuarios;
	SELECT DISTINCT CURTIME() AS 'Fecha actual' FROM usuarios;
	SELECT DISTINCT SYSDATE() AS 'Fecha actual' FROM usuarios;
	SELECT DATE_FORMAT(fecha_registro, '%d-%m-%Y') FROM usuarios;

	/*Funciones generales 1=true 0=false*/  
	SELECT ISNULL(email) FROM usuarios; /*0=no nulo, 1=nulo*/
	SELECT DISTINCT STRCMP('HOLA', 'HOLA') FROM usuarios;
	SELECT DISTINCT VERSION() FROM usuarios;
	SELECT DISTINCT USER() FROM usuarios;
	SELECT DISTINCT DATABASE() FROM usuarios;
	SELECT email, IFNULL(apellidos, 'Este campo esta vacio') FROM usuarios;