/*
DB->master_blog
Vistas:
-Se puede definir como una consulta almacenada en la base de datos que se ultiliza como una tabla virtual que no almacena datos sino que utiliza asociaciones y los datos de originales de las tablas, de forma que siempre se mantiene alctualizada
*/

/*Crear la vista */
CREATE VIEW entradas_con_nombres AS SELECT e.identradas, e.titulo, u.nombre AS 'autor', c.nombre_categoria AS 'categoria' FROM entradas e INNER JOIN usuarios u ON e.idusuarios = u.idusuarios INNER JOIN categorias c ON e.idcategorias = c.idcategorias;

/*Ver la vista*/
SELECT * FROM entradas_con_nombres;

/*Borrar la vista */
DROP VIEW entradas_con_nombres;