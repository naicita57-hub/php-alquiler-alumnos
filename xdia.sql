-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2026 a las 14:55:00
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
-- Base de datos: `xdia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `imagen`) VALUES
(1, 'Diseño Gráfico Artístico Digital', NULL),
(2, 'Diseño y Programación Web', NULL),
(3, 'Cine y Nuevos Formatos', NULL),
(4, 'Programación de Videojuegos', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `imagen`) VALUES
(1, 'Periféricos', NULL),
(2, 'Tabletas Gráficas', NULL),
(3, 'Cámaras', NULL),
(4, 'Iluminación', NULL),
(5, 'Sonido', NULL),
(6, 'Consolas', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `monto_total` decimal(10,2) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) UNSIGNED DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `fecha_ingreso`, `imagen`) VALUES
(1, 'sdasdasd', 'dasdasdafasf', 40000.00, '2026-11-04', 'hjbjbkjbjk.png'),
(2, 'nvbnfgh', 'gjxzfgjhxfgh', 20000.00, '2026-11-01', 'czxczczxc.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_x_carrera`
--

CREATE TABLE `producto_x_carrera` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_carrera` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_x_categoria`
--

CREATE TABLE `producto_x_categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `profile_picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_x_carrera`
--

CREATE TABLE `usuario_x_carrera` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_carrera` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_x_carrera`
--
ALTER TABLE `producto_x_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carrera` (`id_carrera`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_x_carrera`
--
ALTER TABLE `usuario_x_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carrera` (`id_carrera`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto_x_carrera`
--
ALTER TABLE `producto_x_carrera`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_x_carrera`
--
ALTER TABLE `usuario_x_carrera`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_x_carrera`
--
ALTER TABLE `producto_x_carrera`
  ADD CONSTRAINT `producto_x_carrera_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_x_carrera_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  ADD CONSTRAINT `producto_x_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_x_categoria_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_x_carrera`
--
ALTER TABLE `usuario_x_carrera`
  ADD CONSTRAINT `usuario_x_carrera_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_x_carrera_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
