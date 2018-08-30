-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2018 a las 18:20:14
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `incidenciasapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL DEFAULT '0',
  `id_cliente` int(11) NOT NULL DEFAULT '0',
  `id_empleado` int(11) NOT NULL DEFAULT '0',
  `estado_actual` int(11) NOT NULL,
  `historico_estado` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `hora_estado` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `url_video` text COLLATE utf8_unicode_ci NOT NULL,
  `hora_estado_actual` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `peticion_servicio` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `localizacion` text COLLATE utf8_unicode_ci NOT NULL,
  `comentarios` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id_incidencia`, `id_producto`, `id_cliente`, `id_empleado`, `estado_actual`, `historico_estado`, `hora_estado`, `url_video`, `hora_estado_actual`, `peticion_servicio`, `localizacion`, `comentarios`) VALUES
(2, 0, 4, 2, 0, '', '', '', '', '', '', ''),
(3, 0, 4, 2, 2, '', '', '', '', '', '', ''),
(4, 0, 4, 2, 2, '', '', '', '', '', '1234567890', ''),
(5, 0, 4, 2, 2, '', '', '', '', '', '1234567890', 'Comentario de prueba.'),
(6, 0, 4, 2, 2, '', '', '', '', '0', '1234567890', 'Comentario de prueba.'),
(7, 0, 4, 2, 2, '', '', '', '', '0', '1234567890', 'Comentario de prueba.'),
(8, 0, 4, 2, 2, '', '', '', '1535618194', '0', '1234567890', 'Comentario de prueba.'),
(9, 0, 4, 2, 2, '', '', '', '1535618266', '0', '1234567890', 'Comentario de prueba.'),
(10, 0, 4, 3, 2, '', '', '', '1535618307', '0', '1234567890', 'Comentario de prueba.'),
(11, 0, 4, 3, 2, '', '', '', '1535618332', '0', '1234567890', 'Comentario de prueba.'),
(12, 0, 4, 2, 2, '', '', '', '1535618354', '0', '1234567890', 'Comentario de prueba.'),
(13, 0, 4, 2, 2, '.2.', '', '', '1535618556', '0', '1234567890', 'Comentario de prueba.'),
(14, 0, 4, 2, 2, '.2~.', '', '', '1535618566', '0', '1234567890', 'Comentario de prueba.'),
(15, 0, 4, 2, 2, '2~.', '', '', '1535618595', '0', '1234567890', 'Comentario de prueba.'),
(16, 0, 4, 3, 2, '2~', '', '', '1535618604', '0', '1234567890', 'Comentario de prueba.'),
(17, 0, 4, 2, 2, '2~', '', '', 'time()', '0', '1234567890', 'Mas comentarios.'),
(18, 0, 4, 2, 2, '2~', '', '', '1535618662', '0', '1234567890', 'Comentario de prueba.'),
(19, 0, 4, 2, 2, '2~', '1535618720~', '', '1535618720', '0', '1234567890', 'Comentario de prueba.'),
(20, 0, 4, 2, 2, '2~', '1535618761~', '1535593584_1535593644_1234567890', '1535618761', '0', '1234567890', 'Comentario de prueba.'),
(21, 0, 4, 2, 2, '2~', '1535618837~', '1535593584_1535593644_1234567890', '1535618837', '0', '1234567890', 'Comentario de prueba.'),
(22, 1, 1, 0, 1, '1~', '1535619449~', 'NULL', '1535619449', '0', 'NULL', 'Probando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id_reporte` int(11) NOT NULL,
  `id_cliente` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_reporte` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_reporte`
--

CREATE TABLE `tipo_reporte` (
  `id_estado` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_tipo`, `id_producto`, `nombre_usuario`, `password`, `nombre`, `apellido`, `activacion`) VALUES
(1, 1, 0, 'jsolano', '$2y$10$1Z3SQvkA3I4ITaJzY07guu6EGG4OA66/qtB.MmYxw5SOYEnM9Ce.S', 'Johan', 'Solano', 1),
(2, 2, 0, 'mcontreras', '$2y$10$1Z3SQvkA3I4ITaJzY07guu6EGG4OA66/qtB.MmYxw5SOYEnM9Ce.S', 'Micael', 'Contreras', 1),
(3, 2, 0, 'midrogo', '$2y$10$1Z3SQvkA3I4ITaJzY07guu6EGG4OA66/qtB.MmYxw5SOYEnM9Ce.S', 'Mary', 'Idrogo', 1),
(4, 3, 0, 'pmarchan', '$2y$10$1Z3SQvkA3I4ITaJzY07guu6EGG4OA66/qtB.MmYxw5SOYEnM9Ce.S', 'Pedro', 'Marchan', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
