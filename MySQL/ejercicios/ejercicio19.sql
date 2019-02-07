/*Obtener los vendedores con 2 o más clientes*/
SELECT * FROM vendedores WHERE idvendedores IN(SELECT idvendedores FROM clientes GROUP BY idvendedores HAVING COUNT(idvendedores) >= 2); 