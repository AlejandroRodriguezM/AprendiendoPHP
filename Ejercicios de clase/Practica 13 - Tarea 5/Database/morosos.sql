-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2023 a las 20:21:30
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `morosos`
--
CREATE DATABASE IF NOT EXISTS `morosos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `morosos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anunciantes`
--

DROP TABLE IF EXISTS `anunciantes`;
CREATE TABLE `anunciantes` (
  `login` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `bloqueado` tinyint(1) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_table`
--

DROP TABLE IF EXISTS `new_table`;
CREATE TABLE `new_table` (
  `autor` varchar(40) NOT NULL,
  `moroso` varchar(40) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anunciantes`
--
ALTER TABLE `anunciantes`
  ADD PRIMARY KEY (`login`,`email`);

--
-- Indices de la tabla `new_table`
--
ALTER TABLE `new_table`
  ADD PRIMARY KEY (`autor`,`moroso`,`fecha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;