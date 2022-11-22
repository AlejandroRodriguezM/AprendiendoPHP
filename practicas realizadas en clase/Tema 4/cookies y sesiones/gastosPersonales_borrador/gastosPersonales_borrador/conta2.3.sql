
-- Base de datos: `conta2`
--
CREATE DATABASE IF NOT EXISTS `conta2` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `conta2`;

--
-- Estructura de las tablas
--
DROP TABLE IF EXISTS `usuarios`;
create table IF NOT EXISTS usuarios (
 login varchar(20) primary key,
 password varchar(128) not null,
 nombre varchar(30) not null,
 fNacimiento date not null,
 presupuesto float not null
 );

DROP TABLE IF EXISTS `movimientos`;
create table IF NOT EXISTS movimientos (
 codigoMov varchar(4),
 loginUsu varchar(20),
 fecha date not null,
 concepto varchar(20) not null,
 cantidad float not null,
 primary key (codigoMov, loginUsu),
 foreign key (loginUsu) references usuarios(login)
);
