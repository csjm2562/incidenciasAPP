-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2018 a las 06:50:17
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
  `id_producto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `estado_actual` int(11) NOT NULL,
  `historico_estado` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `hora_estado` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `url_video` text COLLATE utf8_unicode_ci,
  `hora_estado_actual` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `peticion_servicio` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `localizacion` text COLLATE utf8_unicode_ci,
  `comentarios` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id_incidencia`, `id_producto`, `id_cliente`, `id_empleado`, `estado_actual`, `historico_estado`, `hora_estado`, `url_video`, `hora_estado_actual`, `peticion_servicio`, `localizacion`, `comentarios`) VALUES
(1, 0, 0, 4, 2, '2~', '1536120444~', '1536098763_1536098823_5248631452', '1536120444', '0', '5248631452', ''),
(2, 1, 1, 2, 1, '1~', '1536120975~', 'NULL', '1536120975', '0', 'NULL', 'pruebamodifica'),
(3, 1, 1, 2, 2, '1~', '1536121004~', 'NULL', '1536121004', '1', 'NULL', 'Probando2'),
(4, 1, 3, 4, 1, '1~', '1536121523~', 'NULL', '1536121523', '1', 'NULL', 'Prueba2'),
(5, 1, 4, 2, 1, '1~', '1536122068~', 'NULL', '1536122068', '1', 'NULL', 'pruebaempleado'),
(6, 0, 5, 4, 2, '2~', '1536122201~', '1536100486_1536100546_5246899', '1536122201', '0', '5246899', 'pruebaincidencia'),
(7, 1, 5, 4, 2, '1~', '1536122304~', 'NULL', '1536122304', '1', 'NULL', 'altapeticioncliente'),
(8, 1, 5, 0, 1, '1~', '1536122322~', 'NULL', '1536122322', '0', 'NULL', 'altaincidenciacliente'),
(9, 1, 1, 0, 1, '1~', '1536122347~', 'NULL', '1536122347', '1', 'NULL', 'petadm'),
(10, 1, 1, 2, 2, '1~', '1536122356~', 'NULL', '1536122356', '0', 'NULL', 'este comentario puede ser muy largo, por ello la tabla debe truncar la información para que se muestre bien y se mantenga en armonía con el diseño de toda la web.'),
(11, 1, 2, 0, 1, '1~', '1536376626~', 'NULL', '1536376626', '1', 'NULL', 'as'),
(12, 1, 2, NULL, 1, '1~', '1536553391~', '', '1536553391', '1', NULL, 'prueba insercion NULL'),
(13, NULL, 3, 2, 2, '2~', '1536553550~', '1536575055_1536575115_5', '1536553550', '0', '5', 'pruebaactualizanull'),
(14, NULL, 3, 2, 2, '2~', '1536553777~', '1536575055_1536575115_5', '1536553777', '0', '5', 'pruebaidcliente'),
(15, NULL, 5, 2, 2, '2~', '1536553785~', '1536575055_1536575115_5', '1536553785', '0', '5', 'pruebaidcliente'),
(16, NULL, 3, 2, 2, '2~', '1536554964~', '1536576382_1536576442_3', '1536554964', '0', '3', 'prueba url null'),
(17, 1, 2, NULL, 1, '1~', '1536554986~', NULL, '1536554986', '1', NULL, 'prueba url null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion`) VALUES
(1, 'Celular'),
(2, 'Laptop'),
(3, 'Modem'),
(4, 'TV'),
(5, 'Teclado'),
(6, 'Monitor'),
(7, 'Mouse'),
(8, 'Cama'),
(9, 'Silla'),
(10, 'Corneta'),
(11, 'Impresora'),
(12, 'Pizarra'),
(13, 'Pintura'),
(14, 'Agua'),
(15, 'Bombillo'),
(16, 'Camisa'),
(17, 'Pantalon'),
(18, 'Camara'),
(19, 'Bolso'),
(20, 'Morral'),
(21, 'Cartera'),
(22, 'Correa'),
(23, 'Gorra'),
(24, 'Sombrero'),
(25, 'Lapiz'),
(26, 'Papel'),
(27, 'Marcador'),
(28, 'Color'),
(29, 'Borrador'),
(30, 'Antena'),
(31, 'Memoria'),
(32, 'Pendrive');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_usuario`
--

CREATE TABLE `producto_usuario` (
  `producto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `producto_usuario`
--

INSERT INTO `producto_usuario` (`producto_id`, `usuario_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(15, 3),
(25, 3);

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
(5, 3, 1, 'erodriguez', '$2y$10$6ZSYBBI158f1IvIpy1q.Q..OyL3AfqsAU3p6Awe45v0PN0VsYpPQm', 'Eduardo', 'Rodriguez', 'eduardorodriguez@gmail.com', 1),
(6, 3, 1, 'lruiz', '$2y$10$EI/zSAKsM4h5gsW4F9wL7ee82HE0PUGYSVjlWnZ3npwBZggwmR5qW', 'Leudis', 'Ruiz', 'leudisruiz@gmail.com', 1),
(7, 3, 1, 'jcabello', '$2y$10$l0MyWru5VGuB.X0Nc9mo1eW1kRiHKyrlKp7W73fRxpTul5OzXvMFG', 'Jesus', 'Cabello', 'jesuscabello@gmail.com', 1),
(8, 3, 1, 'tcontreras', '$2y$10$HXMEQdp.9GP3N2rjPGuyjOEYUjFk1rr098d0UAIqleO6RsyiF940i', 'Tomasa', 'Contreras', 'tomasacontreras@gmail.com', 1),
(9, 3, 1, 'msolano', '$2y$10$1S3L0PYSVs3FDid3K5ppguRS8rH6KDG37g/Al9MRka/mygcc6.QFi', 'Milfra', 'Solano', 'milfrasolano@gmail.com', 1),
(10, 3, 1, 'nsolano', '$2y$10$BrhDo9SGR6ywqzqUd/lvLua1DCk711j./vbnNaKCH67HfoIYKANJa', 'Milfra', 'Solano', 'milfrasolano@gmail.com', 1),
(11, 2, 1, 'prueba', '$2y$10$O9VbU0jEgmEO0XzuiwVJVOJMhsgCc3LH7zreIRaK1PATRPjwyQtgO', 'prueba', 'Prueba', 'prueba@gmail.com', 1),
(12, 2, 1, 'krueba', '$2y$10$6p1.RsokC992JbAWch5HzuppLTjaepw234Ler7AA1AVKLkqyAvvnS', 'prueba', 'Prueba', 'prueba@gmail.com', 1),
(13, 2, 1, 'porueba', '$2y$10$WfZl2Q2EcYJoclBL6T6O9OQkZZNozF2ufklaUMogE/6z2ZHA7/5.G', 'prueba', 'Prueba', 'prueba@gmail.com', 1),
(14, 2, 1, 'iiorueba', '$2y$10$YnT0Y.ZMlHRxeOr6.tM1e..xfSh2LjWqiaJD6i3sWiA/Cyl1pNzsq', 'prueba', 'Prueba', 'prueba@gmail.com', 1);

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
-- Indices de la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `usuario_id` (`usuario_id`);

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
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto_usuario`
--
ALTER TABLE `producto_usuario`
  ADD CONSTRAINT `producto_usuario_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `producto_usuario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
