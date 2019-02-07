/*
DB->master_blog
Consultas de agrupamiento*/
SELECT COUNT(titulo) AS 'n° entradas', idcategorias FROM entradas GROUP BY idcategorias;

/*Consultas de agrupamiento con condiciones (HAVING)*/
SELECT COUNT(titulo) AS 'n° entradas', idcategorias FROM entradas GROUP BY idcategorias HAVING COUNT(titulo) >= 3;

/*
AVG 				Sacar la media
COUNT 		Contar el numero de elementos
MAX				Valor maximo del grupo 
MIN				Valor minimo del grupo
SUM 			Sumar todo el contenido del grupo
*/

SELECT AVG(identradas) AS 'Media' FROM entradas;
SELECT SUM(identradas) AS 'Suma' FROM entradas;
SELECT MAX(identradas) AS 'Maximo id' FROM entradas;
SELECT MIN(identradas) AS 'Minnimo id' FROM  entradas;

