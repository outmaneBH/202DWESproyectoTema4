



create database DAW202DBDepartamentos;
use DAW202DBDepartamentos;



create user 'usuarioDAW202DBDepartamentos'@'%' IDENTIFIED BY 'P@ssw0rd';
grant all privileges on DAW202DBDepartamentos.* to 'usuarioDAW202DBDepartamentos'@'%' with grant option;



CREATE TABLE IF NOT EXISTS Departamento(
CodDepartamento varchar(3) PRIMARY KEY,
DescDepartamento varchar(255) NOT NULL,
FechaBaja date NULL,
VolumenNegocio float NULL
)engine=innodb;