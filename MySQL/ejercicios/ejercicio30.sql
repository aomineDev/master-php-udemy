/*Mostrar los datos de los vendedores con mas antiguedad en el concesionario*/
SELECT * FROM vendedores ORDER BY fecha_alta LIMIT 1;

/* 30 + */ 
/* Obtener los coches con mas unidades vendidas */
SELECT * FROM coches WHERE idcoches IN(SELECT idcoches FROM encargos WHERE cantidad IN(SELECT MAX(cantidad) FROM encargos));  
