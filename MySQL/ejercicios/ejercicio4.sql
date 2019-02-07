/*Mostrar todos los vendedores cuya fecha de alta sea posterior al 1 de julio del 2018*/
UPDATE vendedores SET fecha_alta = '2018-06-17' WHERE idvendedores = 5;
SELECT * FROM vendedores WHERE fecha_alta > '2018-07-01';