/*
DB->master_blog
Consulta Multitabla
Son consultas que sirven para consultar varias tablas en una sola sentencia;
*/

/*Mostrar las entradas con el nombre del autor y la categoria */
SELECT e.identradas, e.titulo, u.nombre AS 'autor', c.nombre_categoria AS 'categoria' FROM entradas e, usuarios u, categorias c WHERE e.idusuarios = u.idusuarios AND e.idcategorias = c.idcategorias;
--Inner Join
SELECT e.identradas, e.titulo, u.nombre AS 'autor', c.nombre_categoria AS 'categoria' FROM entradas e INNER JOIN usuarios u ON e.idusuarios = u.idusuarios INNER JOIN categorias c ON e.idcategorias = c.idcategorias;

/*Mostrar el nombre de las categorias y cuantas entradas tienen*/
SELECT c.nombre_categoria, COUNT(e.idcategorias) AS 'n° entradas' FROM categorias c, entradas e WHERE e.idcategorias = c.idcategorias GROUP BY e.idcategorias; 
--Left Join
SELECT c.nombre_categoria, COUNT(e.idcategorias) AS 'n° entradas' FROM categorias c LEFT JOIN entradas e ON  c.idcategorias = e.idcategorias GROUP BY e.idcategorias; 

/*Mostrar el email de los usuarios y al lado cuantas entradas tienen*/
SELECT u.email, COUNT(e.idcategorias) AS 'n° entradas' FROM usuarios u, entradas e WHERE e.idusuarios = u.idusuarios GROUP BY e.idusuarios; 
--Right Join
SELECT u.email, COUNT(e.idcategorias) AS 'n° entradas' FROM  entradas e RIGHT JOIN usuarios u ON  e.idusuarios = u.idusuarios GROUP BY e.idusuarios; 