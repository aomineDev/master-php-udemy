/*Consulta con un acondicion*/
SELECT * FROM usuarios WHERE email = 'aomine@gmail.com';

/*
Operador de comparacion:
Igual 				= 
Distinto 			!=
Menor 				<
Mayor 				>
Menor igual 		<=
Maoy igual 		>=
Entre 				between A and B
En 					in
Es nulo				is null
No nulo				is not null
Como 				like
no es como 		not like

Operadores Logicos:
o 						OR
y 						AND
no 					NOT

Comodines:
Cualquier cantidad de caracteres		%
Un caracter desconocido					_
*/

/*Mostrar nombre y apellidos de todos los usuarios registrados en 2019*/
SELECT nombre, apellidos FROM usuarios WHERE YEAR(fecha_registro) = '2019';  

/*Mostrar nombre y apellidos de todos los usuarios no registrados en 2019*/
SELECT nombre, apellidos FROM usuarios WHERE YEAR(fecha_registro) != '2019' OR ISNULL(fecha_registro); 

/*Mostrar apellidos que contengan la letra 'a' y que el password sea igual a contraseña*/
SELECT idusuarios, nombre, apellidos FROM usuarios WHERE apellidos LIKE '%a%' AND password = 'contraseña';

/*Mostrar todos los registros cuyo id se par*/
SELECT * FROM usuarios WHERE (idusuarios % 2 = 0);

/*Mostrar todos los registros cuyo nombre tengo mas de 5 letras, que se haya registrado antes de 2020 y mostrar el nombre en mayuscula*/
SELECT UPPER(nombre) AS (nombre) FROM usuarios WHERE (LENGTH(nombre) >= 5) AND (YEAR(fecha_registro) < 2020);