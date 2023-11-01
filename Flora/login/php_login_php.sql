-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2023 a las 17:42:04
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contraseña`, `username`) VALUES
(73, 'tomaskiles2@gmail.com', '$2y$10$IOwi5Evr.544NCcWaVloT.CSybYe4tfINHujsNTHOZvc2bv7Zxpna', 'Kiles'),
(74, 'sad', '$2y$10$0iiC.McgO6lfEx0TwcXab.4UnMyGVShN1Fa3Xx5JauY1dWwbjzJxa', 'sadsa'),
(75, 'asd', '$2y$10$ztV/4lNTtJ.bxaES3HEffuEIyyTXFIK7woACJn0aiUHZENpRyMUae', 'ds'),
(76, 'prueba1', '$2y$10$6EAnaZFKV3Su8rNrY9U5xup4zlwEorough/O6uabQ17RNeszR0kI.', 'p'),
(77, 'cmhposadas63@gmail.com', '$2y$10$zhSsDiB4Nr5vbNJUvTMyMOoLIRRSi0a2ya40CZcQkvTY.rUG395Xe', 'Ramiro '),
(78, 'elcarlosvillalba@gmail.com', '$2y$10$1SnKLQBmRRYxPzb7xKpKaOrZknE0fo7g.zSiUBqNwOkTAlPdXWylG', 'Elprofe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
