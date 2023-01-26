-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2023 a las 18:54:15
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `codigocurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`codigo`, `nombre`, `mail`, `codigocurso`) VALUES
(1, 'Antonio Lopez', 'antonio@gmail.com', 1),
(2, 'Maria de la Oz', 'marioz@hotmail.com', 2),
(3, 'Ramon Ramirez', 'ramirez@gmail.com', 3),
(4, 'Carmen Rodiguez', 'crodriguez@iesplayamar.es', 1),
(9, 'Juan', 'juan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`id`, `nombre`, `apellidos`, `direccion`) VALUES
(2, ' Maria             ', ' del Monte             ', 'Triana'),
(3, 'Ramon', 'Ramirez', 'Bda La luz'),
(4, 'Conchita', 'Portales', 'San Andres'),
(7, ' Rafael             ', 'Rodriguez        ', ' Dos Hermanas'),
(8, 'Jose', 'Select', 'Perdido'),
(9, 'Lucia', 'Lopez', 'Trinidad'),
(10, 'Carmen', 'Luzciarra', 'Getaria'),
(11, 'Jacinta', 'Jimenez', 'Los Prados'),
(12, 'Emilia', 'Sanz', 'Puerta Blanca'),
(13, 'Juan', 'Camino', 'Palmilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `estado` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id`, `nombre`, `email`, `telefono`, `creado`, `modificado`, `estado`) VALUES
(1, 'Maria del Monte', 'mmonte@gamial.com', '687687687', '2022-11-22 18:57:59', '2022-11-22 18:57:59', '1'),
(2, 'Antonio Dominguez', 'antonio@gmail.com', '675675675', '2022-11-22 19:01:01', '2022-11-22 19:01:01', '1'),
(3, 'carmen Lopez', 'carmen@gmail.com', '952121212', '2022-11-22 19:01:51', '2022-11-22 19:01:51', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
