/*Listar los clientes que han hecho algun encargo del coche "Merches Ranchera"*/
SELECT cl.nombre AS 'cliente', co.modelo, e.fecha FROM encargos e INNER JOIN coches co ON e.idcoches = co.idcoches INNER JOIN clientes cl ON e.idclientes = cl.idclientes WHERE e.idcoches IN(SELECT idcoches FROM coches WHERE modelo = 'Mercedes Ranchera');
SELECT * FROM clientes WHERE idclientes IN(SELECT idclientes FROM encargos WHERE idcoches IN(SELECT idcoches FROM coches WHERE modelo = 'Mercedes Ranchera'));  
