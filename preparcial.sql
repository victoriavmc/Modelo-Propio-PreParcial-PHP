-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2024 a las 03:33:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `preparcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Emp_id` int(11) NOT NULL,
  `Emp_nombre` varchar(55) DEFAULT NULL,
  `Emp_apellido` varchar(55) DEFAULT NULL,
  `Emp_cuit` int(11) DEFAULT NULL,
  `Emp_fechaNacimiento` date DEFAULT NULL,
  `Emp_barrio` varchar(55) DEFAULT NULL,
  `Emp_calle` varchar(55) DEFAULT NULL,
  `Emp_altura` int(11) DEFAULT NULL,
  `Emp_puesto` varchar(55) DEFAULT NULL,
  `Emp_ingresoAlSistema` date DEFAULT NULL,
  `Emp_salario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Emp_id`, `Emp_nombre`, `Emp_apellido`, `Emp_cuit`, `Emp_fechaNacimiento`, `Emp_barrio`, `Emp_calle`, `Emp_altura`, `Emp_puesto`, `Emp_ingresoAlSistema`, `Emp_salario`) VALUES
(12, 'Victoria', 'Vmc', 14254556, '2024-05-19', 'San Martin', 'wewrw', 3424, 'Programadora', '2024-05-24', 4534535),
(16, 'Graciela', 'Corti', 14254556, '2023-02-09', 'San Martin', 'wewrw', 3424, 'Analista', '2024-04-30', 4534535),
(30, 'Miles', 'Bennet', 14254556, '2024-05-03', 'San Martin', 'wewrw', 3424, 'Diseñador', '2024-05-09', 4534535);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `Log_id` int(11) NOT NULL,
  `Log_usuario` varchar(55) DEFAULT NULL,
  `Log_contrasenia` varchar(55) DEFAULT NULL,
  `Log_correo` varchar(200) DEFAULT NULL,
  `Log_pinOlvido` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`Log_id`, `Log_usuario`, `Log_contrasenia`, `Log_correo`, `Log_pinOlvido`) VALUES
(1, 'Admin', 'xd', 'victoriavmcortitrabajos@gmail.com', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Emp_id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Log_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `Log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
