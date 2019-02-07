/*Mostrar todos los vendedores con su nombre y el número de dias que llevan en el concesionario*/
UPDATE vendedores SET fecha_alta = '2018-02-11' WHERE idvendedores = 8;
UPDATE vendedores SET fecha_alta = '2018-12-03' WHERE idvendedores = 7;
SELECT nombre, DATEDIFF(CURDATE(), fecha_alta) AS 'tiempo' FROM vendedores;