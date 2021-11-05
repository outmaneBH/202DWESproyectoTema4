/*Script creación de base de datos*/

/*Creamos la base de datos DAW2OBDBDepartamentos si existe sino tiene  que crear una*/
create database if not exists DAW2OBDBDepartamentos;

/*usasmos la base de datos*/
use DAW2OBDBDepartamentos;


/*Creamos la tabla Departamento dentro de la base de datos*/
create table Departamento (
 CodDepartamento  varchar(3) not null,
 DescDepartamento  varchar(255) not null,
 FechaBaja date,
 VolumenNegocio float
 primary key (CodDepartamento))ENGINE=INNODB;

 /*Script creación de  usuario: */
 create user if not exists 'usuarioDAW2OBDBDepartamentos'@'%' identified by 'paso';
 grant ALL PRIVILEGES on DAW2OBDBDepartamentos.* to 'usuarioDAW2OBDBDepartamentos'@'%';