/* Renombrar una tabla */
ALTER TABLE usuarios RENAME TO usuarios_renom;
RENAME TABLE usuarios TO usuarios_renom;

/*Cambiar el nombre a una columna*/
ALTER TABLE usuarios_renom CHANGE apellidos apellido varchar(100) not null; 

/*Modificar Columna sin cambiar el nombre*/
ALTER TABLE usuarios MODIFY apellido varchar(40) not null;

/*Añadir columnas*/
ALTER tABLE usuarios ADD website varchar(100) null; 

/*Añadir restricción a columna*/
ALTER TABLE usuarios ADD CONSTRAINT uq_email UNIQUE(email);

/*Borrar una columna*/
ALTER TABLE usuarios DROP website;4

/*Borrar Tabla*/
DROP TABLE usuarios;