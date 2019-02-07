/*Insertar registros en la tabla usuarios*/
INSERT INTO usuarios VALUES(null, 'aomine', 'Daiki', 'aomine@gmail.com', 'contraseña', '19-01-08');

INSERT INTO usuarios VALUES(null, 'Akashi', 'Seijuro', 'akashi@gmail.com', 'contraseña', '19-01-07'), (null, 'Kuroko', 'tetsuya', 'kuroko@gmail.com', 'contraseña', '19-01-05');

INSERT INTO usuarios(nombre, apellidos, email, fecha_registro) VALUES('Kise', 'Ryouta', 'kise@gmail.com', '19-01-08');

INSERT INTO usuarios VALUES(nul, 'Omar', 'Carrion', 'omar@gmail.com', 'contraseña', CURDATE()), (nul, 'Midorima', 'Rintarou', 'midorima@gmail.com', 'contraseña', '18-12-31');

/*Insert para categorias*/
INSERT INTO categorias VALUES(null, 'Acción'), (null, 'Rol'), (null, 'Deportes'), (null, 'Puzzle'), (null, 'MOBA');

/*Insert para entradas*/
INSERT INTO entradas VALUES(null, 1, 1, 'Review de GTA V', 'Apreciacion de GTA V', CURDATE()),
(null, 1, 2, 'Novedades de FF VIII', 'Todo sobre FF VIII', CURDATE()),
(null, 1, 3, 'Nuevo jugadores de Fifa 2019', 'Review de Fifa 2019', CURDATE()),
(null, 2, 1, 'Novedades de Assasins', 'Review de Assasins', CURDATE()),
(null, 2, 2, 'Novedades de WOW', 'Review de WOW', CURDATE()),
(null, 2, 3, 'Novedades de PES 2019', 'Review de PES 2019', CURDATE()),
(null, 3, 1, 'Novedades de Call of Duty', 'Review de Call of Duty', CURDATE()),
(null, 3, 1, 'Novedades de CS:GO', 'CS:GO Gratuito', CURDATE()),
(null, 4, 3, 'Novedades de Formula 1 2k20', 'Todo sobre el nuevo Formula 1 2k20', CURDATE()),
(null, 3, 1, 'Guia de GTA V', 'Guia detallada de como pasar las mision 26 de GTA V', '19-01-11'),
(null, 1, 1, 'Call Of Duty', 'Review de Call Of Duty', '19-01-11');