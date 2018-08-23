-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2018 a las 08:02:35
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
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `idIncidencia` int(11) NOT NULL,
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

INSERT INTO `incidencia` (`idIncidencia`, `id_producto`, `id_cliente`, `id_empleado`, `estado_actual`, `historico_estado`, `hora_estado`, `url_video`, `hora_estado_actual`, `peticion_servicio`, `localizacion`, `comentarios`) VALUES
(11, 11, 11, 11, 1, '1', '1', '1', '1', '1', '1', '1'),
(5, 5, 0, 5, 5, '5', '5', '55', '5', '5', '5', '5'),
(5, 5, 0, 0, 5, '5', '5', '55', '5', '5', '5', '5'),
(1, 21, 2, 0, 12, '12', '12', '21', '12', '12', '12', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `idReporte` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`idReporte`, `usuario`, `tipo`, `fecha`, `descripcion`) VALUES
(1, 'johan2562', 1, '2018-08-19', 'prueba'),
(2, 'juan', 1, '2018-08-19', 'salu'),
(3, 'oscar', 1, '2018-08-19', 'campillo'),
(4, 'julio', 1, '2018-08-19', 'martinez'),
(5, 'marta', 1, '2018-08-19', 'mendoza'),
(6, 'joaquin', 1, '2018-08-19', 'alvarado'),
(7, 'guillermo', 1, '2018-08-19', 'roma'),
(8, 'arturo', 1, '2018-08-19', 'cruz'),
(9, 'fernando', 1, '2018-08-19', 'cortes'),
(10, 'tomas', 1, '2018-08-19', 'mendez'),
(11, 'lucas', 1, '2018-08-19', 'Aurea'),
(12, 'Daniel', 1, '2018-08-19', 'Alevra'),
(13, 'Luis', 1, '2018-08-19', 'Mendoza'),
(14, 'Daniel', 1, '2018-08-19', 'Huerta'),
(15, 'pedro', 1, '2018-08-19', 'Garcia'),
(16, 'Jaime', 1, '2018-08-19', 'Cepeda'),
(17, 'veronica', 1, '2018-08-19', 'Carrillo'),
(18, 'Bea', 1, '2018-08-19', 'Martinez'),
(19, 'Raul', 1, '2018-08-19', 'Muñoz'),
(20, 'Marcos', 1, '2018-08-19', 'Peralta');

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `correo`, `last_session`, `activacion`, `token`, `token_password`, `password_request`, `id_tipo`) VALUES
(1, 'johan2562', '$2y$10$RN7j5qqxUpbmVpa1ZViRpOiNUZjNT7V5E4/53zU66Bp1zOJhrnhOi', 'Johan Solano', 'jmsolanoc@gmail.com', '2018-08-23 01:25:57', 1, '9cae5af0290e1b5b14a2875ba067c984', '', 0, 1),
(2, 'sgerson91', '$2y$10$3Y.3q9RVoifTl4CUfv2BFeZUvbETvs86PN84eaZY0yt08RJgWmAA.', 'Gerson Solano', 'sgerson91@gmail.com', '2018-08-23 01:26:27', 1, '4ef60c04ad04b03c114f7912655ef5c6', '', 0, 2),
(3, 'mcontreras', '$2y$10$ls.TKXDeZ6D2h64Y4u/1Fu04CLEMoPhGJJ85W5xL7vpJEm4SFdW/m', 'Micael Contreras', 'johansolano94@gmail.com', '2018-08-21 00:55:10', 1, 'ef2b05ff529bad1258575fdd52f3cf00', '', 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
