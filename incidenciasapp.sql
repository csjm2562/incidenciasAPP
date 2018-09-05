-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2018 a las 07:06:07
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
(1, 0, 0, 4, 2, '2~', '1536120444~', '1536098763_1536098823_5248631452', '1536120444', '0', '5248631452', 'prueba'),
(2, 1, 1, 0, 1, '1~', '1536120975~', 'NULL', '1536120975', '0', 'NULL', 'pruebamodifica'),
(3, 1, 1, 4, 1, '1~', '1536121004~', 'NULL', '1536121004', '1', 'NULL', 'Probando2'),
(4, 1, 4, 4, 1, '1~', '1536121523~', 'NULL', '1536121523', '1', 'NULL', 'Prueba2'),
(5, 1, 4, 0, 1, '1~', '1536122068~', 'NULL', '1536122068', '1', 'NULL', 'pruebaempleado'),
(6, 0, 5, 4, 2, '2~', '1536122201~', '1536100486_1536100546_5246899', '1536122201', '0', '5246899', 'pruebaincidencia'),
(7, 1, 5, 0, 1, '1~', '1536122304~', 'NULL', '1536122304', '1', 'NULL', 'altapeticioncliente'),
(8, 1, 5, 0, 1, '1~', '1536122322~', 'NULL', '1536122322', '0', 'NULL', 'altaincidenciacliente'),
(9, 1, 1, 0, 1, '1~', '1536122347~', 'NULL', '1536122347', '1', 'NULL', 'petadm'),
(10, 1, 1, 0, 1, '1~', '1536122356~', 'NULL', '1536122356', '0', 'NULL', 'incadm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_usuario`, `descripcion`) VALUES
(1, 0, 'Celular'),
(2, 0, 'Laptop'),
(3, 0, 'Modem'),
(4, 0, 'TV'),
(5, 0, 'Teclado'),
(6, 0, 'Monitor'),
(7, 0, 'Mouse'),
(8, 0, 'Cama'),
(9, 0, 'Silla'),
(10, 0, 'Corneta'),
(11, 0, 'Impresora'),
(12, 0, 'Pizarra'),
(13, 0, 'Pintura'),
(14, 0, 'Agua'),
(15, 0, 'Bombillo'),
(16, 0, 'Camisa'),
(17, 0, 'Pantalon'),
(18, 0, 'Camara'),
(19, 0, 'Bolso'),
(20, 0, 'Morral'),
(21, 0, 'Cartera'),
(22, 0, 'Correa'),
(23, 0, 'Gorra'),
(24, 0, 'Sombrero'),
(25, 0, 'Lapiz'),
(26, 0, 'Papel'),
(27, 0, 'Marcador'),
(28, 0, 'Color'),
(29, 0, 'Borrador'),
(30, 0, 'Antena'),
(31, 0, 'Memoria'),
(32, 0, 'Pendrive');

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
  `id_usuario` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo`, `id_producto`, `nombre_usuario`, `password`, `nombre`, `apellido`, `correo`, `activacion`) VALUES
(1, 1, 1, 'jsolano', '$2y$10$/tzwk26x2ls.Sp0MKVDS.u9SMZ3xBgWmRhi8c.V0gO218HKPt7i3O', 'Johan', 'Solano', 'johansolano@gmail.com', 1),
(2, 2, 1, 'mcontreras', '$2y$10$8gGaRKR3wj9dLA94bbWl8uBU/oAQg2o.wIpIh2AJuHb2lD9tdtl.6', 'Micael', 'Contreras', 'micaelcontreras@gmail.com', 1),
(3, 3, 1, 'midrogo', '$2y$10$J3wkDm4TxsmLJwKDOQ2f7eGWAwoSyOhZo.HcPPtgwrtYewjsKVNdq', 'Mary', 'Idrogo', 'maryidrogo@gmail.com', 1),
(4, 2, 1, 'pmarchan', '$2y$10$XqSOWVcgXQSlY0wqoLVeJ.pjxwsqv0q0gTfAZd8wN8/2Hu.OcTbQ6', 'Pedro', 'Marchan', 'pedromarchan@gmail.com', 1),
(5, 3, 1, 'erodriguez', '$2y$10$6ZSYBBI158f1IvIpy1q.Q..OyL3AfqsAU3p6Awe45v0PN0VsYpPQm', 'Eduardo', 'Rodriguez', 'eduardorodriguez@gmail.com', 1);

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
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `tipo_reporte`
--
ALTER TABLE `tipo_reporte`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
