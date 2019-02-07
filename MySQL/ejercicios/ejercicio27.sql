/*Visualizar los nombres de los clientes y la cantidad de encargos realizados, incluyendos los que no hayan realizado encargos*/
SELECT c.nombre, COUNT(e.idclientes) AS 'cantidad' FROM clientes c LEFT JOIN encargos e ON c.idclientes = e.idclientes GROUP BY 1 ORDER BY 2 DESC; 