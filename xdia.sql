-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2026 at 03:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xdia`
--

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

CREATE TABLE `carreras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `imagen`) VALUES
(1, 'Diseño Gráfico Artístico Digital', NULL),
(2, 'Diseño y Programación Web', NULL),
(3, 'Cine y Nuevos Formatos', NULL),
(4, 'Programación de Videojuegos', NULL),
(5, 'Diseño Multimedial', NULL),
(6, 'Cine de Animación y Posproducción', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `imagen`) VALUES
(1, 'Periféricos', NULL),
(2, 'Tabletas Gráficas', NULL),
(3, 'Cámaras', NULL),
(4, 'Iluminación', NULL),
(5, 'Sonido', NULL),
(6, 'Consolas', NULL),
(7, 'Utensilios Gráficos', NULL),
(8, 'Notebook', NULL),
(9, 'Informática', NULL),
(10, 'Monitores', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `monto_total` decimal(10,2) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_compra`
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
-- Table structure for table `producto`
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
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `fecha_ingreso`, `imagen`) VALUES
(1, 'Cámara DSLR Canon EOS 6D Mark ii', 'Kit con lente 18-55mm, 2 baterías y cargador', 12500.00, '2026-02-13', 'canon-6d-mii.webp'),
(2, 'Kit 2 Fresneles GODOX', 'Dos fresneles RGB regulables con dos trípode araña.', 9800.00, '2023-10-15', 'godox-fresneles.webp'),
(3, 'Kit de 3 microfonos dji corbatero', 'Sistema de 3 microfonos inalámbricos para rodaje o entrevistas', 18000.00, '2026-04-17', 'dji-corbatero.webp'),
(4, 'Estabilizador con discos', 'Estabilizador de cámara hasta 4kg con pesas en formato de discos. Incluye funda y manual.', 6000.00, '2026-01-08', 'estabilizador-discos.webp'),
(5, 'Tableta Gráfica WACOM', 'Tableta gráfica con lápiz sensible a 8192 niveles de presión. Incluye funda y manual.', 4000.00, '2022-06-15', 'tg-wacom.webp'),
(6, 'Pantalla Interactiva XP-Pen Artist 16', 'Monitor de dibujo HD de 15.6 pulgadas para ilustración digital y retoque fotográfico directo. Incluye manual de conexión y funda. ', 16000.00, '2025-06-23', 'interactiva-artist-16.webp'),
(7, 'Guía de colores Pantome Formula Guide', 'Muestrario de colores impresos en papel brillante y mate. Incluye caja y funda.', 3000.00, '2022-03-14', 'pantome-guia.webp'),
(8, 'Cortadora de papel rotativa A3', 'Guillotina de precisión para maquetación, armado de fanzines y corte de láminas de entrega. Incluye caja.', 2000.00, '2025-06-15', 'guillotina-a3.webp'),
(9, 'Laptop Lenovo ThinkPad i7 16GB RAM', 'Computadora portátil con softwares de la carrera previamente instalados.', 18000.00, '2026-02-13', 'lenovo-thinkpad-16g.webp'),
(10, 'Monitor secundario portátil 15.6 Full HD', 'Pantalla liviana conectable por USB-C para programar a doble monitor. Incluye cable de conexión, funda y manual.', 6000.00, '2025-02-15', 'monitor-portatil.webp'),
(11, 'Teclado mecánico Keychron K2', 'Teclado compacto a Bluetooth. Incluye caja.', 4000.00, '2025-03-15', 'teclado-keychron.webp'),
(12, 'Casco VR Meta Quest 2', 'Casco VR para testing de prototipos. Incluye caja con todos sus objetos originales.', 20000.00, '2026-02-12', 'meta-quest-2.webp'),
(13, 'Playstation 5 con 2 controles', 'Consola para pruebas de rendimiento, testeos de UX. Incluy e caja con todos sus accesorios originales.', 25000.00, '2025-08-19', 'ps5-controles.webp'),
(14, 'Joystick bluetooth Gamepad (PC/Android)', 'Control inalámbrico programable para mapeo e integración de mandos en Unity y Unreal Engine.', 3000.00, '2024-06-19', 'joystick-bt-gamepad.webp'),
(15, 'Mouse ergonómico', '\"Mouse ergonómico e inalámbrico Logitech. NO incluye pilas extra.', 2000.00, '2025-09-05', 'mouse-erg-logitech.webp');

-- --------------------------------------------------------

--
-- Table structure for table `producto_x_carrera`
--

CREATE TABLE `producto_x_carrera` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_carrera` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto_x_carrera`
--

INSERT INTO `producto_x_carrera` (`id`, `id_producto`, `id_carrera`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 5),
(4, 2, 3),
(5, 2, 5),
(6, 3, 3),
(7, 3, 5),
(8, 3, 6),
(9, 4, 1),
(10, 4, 3),
(11, 4, 5),
(12, 5, 1),
(13, 5, 2),
(14, 5, 5),
(15, 5, 6),
(16, 6, 1),
(17, 6, 5),
(18, 6, 6),
(19, 7, 1),
(20, 7, 5),
(21, 8, 1),
(22, 8, 5),
(23, 9, 1),
(24, 9, 2),
(25, 9, 3),
(26, 9, 5),
(27, 10, 1),
(28, 10, 2),
(29, 10, 3),
(30, 10, 4),
(31, 10, 5),
(32, 10, 6),
(33, 11, 1),
(34, 11, 2),
(35, 11, 3),
(36, 11, 4),
(37, 11, 5),
(38, 11, 6),
(39, 12, 4),
(40, 12, 6),
(41, 13, 4),
(42, 13, 5),
(43, 14, 4),
(44, 14, 5),
(45, 15, 1),
(46, 15, 2),
(47, 15, 3),
(48, 15, 4),
(49, 15, 5),
(50, 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `producto_x_categoria`
--

CREATE TABLE `producto_x_categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto_x_categoria`
--

INSERT INTO `producto_x_categoria` (`id`, `id_producto`, `id_categoria`) VALUES
(1, 1, 3),
(2, 2, 4),
(3, 3, 5),
(4, 5, 2),
(5, 6, 2),
(6, 6, 10),
(7, 7, 7),
(8, 8, 7),
(9, 9, 8),
(10, 9, 9),
(11, 10, 10),
(12, 10, 9),
(13, 10, 1),
(14, 11, 1),
(15, 11, 9),
(16, 12, 1),
(17, 12, 6),
(18, 13, 6),
(19, 14, 1),
(20, 15, 1),
(21, 15, 9),
(22, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Table structure for table `usuario_x_carrera`
--

CREATE TABLE `usuario_x_carrera` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_carrera` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producto_x_carrera`
--
ALTER TABLE `producto_x_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carrera` (`id_carrera`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_x_carrera`
--
ALTER TABLE `usuario_x_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carrera` (`id_carrera`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `producto_x_carrera`
--
ALTER TABLE `producto_x_carrera`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario_x_carrera`
--
ALTER TABLE `usuario_x_carrera`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `producto_x_carrera`
--
ALTER TABLE `producto_x_carrera`
  ADD CONSTRAINT `producto_x_carrera_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_x_carrera_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `producto_x_categoria`
--
ALTER TABLE `producto_x_categoria`
  ADD CONSTRAINT `producto_x_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_x_categoria_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `usuario_x_carrera`
--
ALTER TABLE `usuario_x_carrera`
  ADD CONSTRAINT `usuario_x_carrera_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_x_carrera_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
