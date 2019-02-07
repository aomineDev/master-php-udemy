/*Obtener los nombres y ciudades de los clientes con encargos de 3 unidades en adelante*/
SELECT nombre, ciudad FROM clientes WHERE idclientes IN(SELECT idclientes FROM encargos WHERE cantidad >= 3);