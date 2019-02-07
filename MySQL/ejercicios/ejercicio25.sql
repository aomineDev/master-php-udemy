/*Obtener una lista de los nombres de los clientes con el importe de sus encargos acumulado*/
SELECT c.nombre, SUM(e.cantidad * co.precio) AS 'Importe' FROM encargos e INNER JOIN clientes c ON e.idclientes = c.idclientes INNER JOIN coches co ON e.idcoches = co.idcoches GROUP BY c.nombre ORDER BY 2 DESC;
/*Sin sumar*/
SELECT c.nombre, e.cantidad * co.precio AS 'Importe' FROM encargos e INNER JOIN clientes c ON e.idclientes = c.idclientes INNER JOIN coches co ON e.idcoches = co.idcoches;
