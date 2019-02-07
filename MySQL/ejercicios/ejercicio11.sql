/*Mostrar todos los cargos y el numero de vendedores que hay en cada cargo*/
SELECT cargo, COUNT(idvendedores) AS 'n° de vendedores' FROM vendedores GROUP BY 1 ORDER BY 2 DESC;