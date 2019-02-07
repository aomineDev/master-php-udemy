/*
DB->master_blog
Subconsultas: 
-Consultas que se ejecutan dentro de otras
-Consisten en utilizar los resultados de la subconsulta para operar en la consulta principal
-Jugando con las llaves foraneas 

IN cuando devuelve varios resultados, = si devuelve solo 1 
*/

/*Mostrar los usuarios que tienen entradas realizadas*/
SELECT * FROM usuarios WHERE idusuarios IN (SELECT idusuarios FROM entradas); 

/*Mostrar los usuarios que no tienen entradas realizadas*/
SELECT * FROM usuarios WHERE idusuarios NOT IN (SELECT idusuarios FROM entradas);

/*Mostrar los usuarios que tengan entradas hablando de GTA*/
SELECT CONCAT(nombre, ' ', apellidos) AS 'Usuarios' FROM usuarios WHERE idusuarios IN(SELECT idusuarios FROM entradas WHERE titulo LIKE '%GTA%');

/*Mostar todas las entradas de la categoria accion utilizando su nombre*/	
SELECT titulo FROM entradas WHERE idcategorias IN (SELECT idcategorias FROM categorias WHERE nombre_categoria = 'Acción'); 

/*Mostrar las categorias con 3 o más entradas*/
SELECT * FROM categorias WHERE idcategorias IN(SELECT idcategorias FROM entradas GROUP BY idcategorias HAVING COUNT(idcategorias) >= 3); 

/*Mostrar los usuarios que crearon una entrada en un 11 de cualquier mes*/
SELECT* FROM usuarios WHERE idusuarios IN(SELECT idusuarios FROM entradas WHERE DAYOFMONTH(fecha) = '11');

/*Mostrar los usuarios que crearon una entrada un dia jueves de cualquier mes*/
SELECT* FROM usuarios WHERE idusuarios IN(SELECT idusuarios FROM entradas WHERE DAYOFWEEK(fecha) = '5'); /*Se inicia en domingo = 1*/

/*Mostrar el nombre del usuario que tenga mas entradas*/
SELECT * FROM usuarios WHERE idusuarios = (SELECT idusuarios FROM entradas GROUP BY idusuarios ORDER BY COUNT(idusuarios) DESC LIMIT 1);

/*Mostrar las categorias sin entradas*/
SELECT * FROM categorias WHERE idcategorias NOT IN (SELECT idcategorias FROM entradas);	