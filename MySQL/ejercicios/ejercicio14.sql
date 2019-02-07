/*Mostrar las unidades totales vendidas de cada coche a cada cliente.
Mostrar el nombre del producto, numero de cliente y la suma de unidades*/
SELECT co.modelo, cl.nombre, e.cantidad FROM encargos e INNER JOIN coches co ON e.idcoches = co.idcoches INNER JOIN clientes cl ON e.idclientes = cl.idclientes ORDER BY e.cantidad DESC; 
