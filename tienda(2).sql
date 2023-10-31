-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2023 a las 22:00:00
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `id_producto`, `cantidad`, `fecha`, `estado`) VALUES
(33, 13, 11, '2023-07-03 22:47:57', 1),
(34, 13, 40, '2023-06-27 05:51:49', 1),
(35, 22, 15, '2023-07-03 22:40:54', 1),
(36, 23, 12, '2023-07-03 22:46:17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre`, `precio`, `descripcion`, `foto`, `fecha`, `estado`) VALUES
(13, '123', 'Leche de soya', '8.00', 'aaa', '2023_06_15_17_20_51mafalda.jpg', '2023-06-15 17:20:51', 0),
(18, 'BBB', 'Ropa fiesta', '54.00', 'nn', '2023_06_15_17_21_00pajaroLoco.jpg', '2023-06-15 17:21:00', 0),
(19, 'ZZZ', 'Ropa fiesta', '54.00', 'nn', '2023_06_15_17_37_11leon.jpg', '2023-06-15 17:37:11', 0),
(20, '232', 'aaaaa', '32.00', 'sdsd', '2023_06_05_19_34_30_mafalda.jpg', '2023-06-19 19:22:36', 0),
(21, '123', 'dsd', '23.00', 'fdf', '2023_06_13_16_21_25_imagen1.jpg', '2023-06-13 16:21:25', 1),
(22, '123', 'Leche de soya', '8.00', 'aaa', '2023_06_20_21_09_52_leon.jpg', '2023-06-20 21:09:52', 1),
(23, '1245', 'Arroz', '25.00', 'Grano de oro', '2023_06_26_23_48_56_Captura de pantalla 2023-04-04 121926.png', '2023-06-26 23:48:56', 1),
(24, '12345', 'Arroz grano de Oro', '120.00', 'Arros Graneao', '2023_07_31_19_15_21_Imagen de WhatsApp 2023-04-26 a las 00.41.50.jpg', '2023-07-31 19:15:21', 1),
(25, '6564', 'Chocolate', '250.00', 'leche', '2023_08_01_21_08_04_Captura de pantalla 2023-04-04 121926.png', '2023-08-01 21:08:04', 1),
(26, '987', 'Pera', '12.00', 'Pera mote', '2023_08_01_21_14_28_Captura de pantalla 2023-03-24 153617.png', '2023-08-01 21:14:28', 1),
(27, '6987', 'Camote', '15.00', 'Camotes', '2023_08_01_21_15_15_Captura de pantalla 2023-04-10 202450.png', '2023-08-01 21:15:15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `paterno` varchar(20) NOT NULL,
  `materno` varchar(20) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `usu` varchar(50) NOT NULL,
  `contra` varchar(64) NOT NULL,
  `nivel` tinyint(1) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `realacionCompraProducto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `realacionCompraProducto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
