/*Script creación de base de datos*/

/*Creamos la base de datos DAW202DBDepartamentos si existe sino tiene  que crear una*/
create database if not exists DAW202DBDepartamentos;

/*usasmos la base de datos*/
use DAW202DBDepartamentos;


/*Creamos la tabla Departamento dentro de la base de datos*/
create table Departamento (
 CodDepartamento  varchar(3) primary key not null,
 DescDepartamento  varchar(255) not null,
 FechaBaja date,
 VolumenNegocio float
)ENGINE=INNODB;

 /*Script creación de  usuario: */
 create user if not exists 'usuarioDAW202DBDepartamentos'@'%' identified by 'P@ssw0rd';
 grant ALL PRIVILEGES on DAW2OBDBDepartamentos.* to 'usuarioDAW202DBDepartamentos'@'%' with grant option;