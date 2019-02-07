/*Mostrar todos los coches en cuya marca exista la letra 'A' y cuyo modelo empieze con 'F'*/
SELECT * FROM coches WHERE marca LIKE '%A%' AND modelo LIKE 'F%';

/*Mostrar todos los coches en cuya marca exista la letra 'A' o cuyo modelo empieze con 'F'*/
SELECT * FROM coches WHERE marca LIKE '%A%' OR modelo LIKE 'F%';