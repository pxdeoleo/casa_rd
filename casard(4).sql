-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2019 a las 15:28:48
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casard`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'apartamento'),
(2, 'casa'),
(3, 'penthouse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `sector` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `banos` int(11) DEFAULT NULL,
  `hab` int(11) DEFAULT NULL,
  `par` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `visitas` int(11) DEFAULT 0,
  `caracteristicas` varchar(120) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `nombre`, `direccion`, `sector`, `ciudad`, `provincia`, `banos`, `hab`, `par`, `area`, `fecha`, `id_categoria`, `precio`, `descripcion`, `visitas`, `caracteristicas`, `usuario_id`) VALUES
(1, 'Apartamento en Piantini', 'C/ Tengo la pinta la paca y la mona', 'Piantini', 'Distrito Nacional', 'Santo Domingo', 3, 4, 2, 130, '2019-10-17', 1, 125000, NULL, 21, NULL, 1),
(2, 'Apartamento en Piantini 2', 'C/ Tengo la pinta la paca y la mona 2', 'Piantini', 'Distrito Nacional', 'Santo Domingo', 3, 4, 2, 130, '2019-09-17', 1, 125000, NULL, 5, NULL, 1),
(3, 'Apartamento en alquiler, La Esperilla', 'C/ Nose', 'La Esperilla', 'Distrito Nacional', 'Santo Domingo', 4, 3, 1, 120, '2019-09-17', 1, 4000, NULL, 44, 'Ventanas automaticas, Vista al oceano, Terraza', 1),
(4, 'Hermoso Penthouse en Venta, Serralles', 'Otra calle que no se', 'Serralles', 'Santo Domingo', 'Santo Domingo', 3, 3, 1, 500, '2019-10-17', 3, 700000, NULL, 15, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(35) NOT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `nombre_empresa` varchar(50) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `ciudad` varchar(40) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `cedula`, `correo`, `telefono`, `nacionalidad`, `genero`, `nombre_empresa`, `direccion`, `ciudad`, `user`, `pass`) VALUES
(1, 'Freddy', 'Soto', '', 'fsoto@correo.com', '80980980980', NULL, NULL, NULL, NULL, NULL, 'fsoto', 'fsoto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
