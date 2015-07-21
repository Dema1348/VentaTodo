-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2015 a las 09:51:25
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ventatodo`
--

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detallefull`
--
CREATE TABLE IF NOT EXISTS `detallefull` (
`codigo_venta` int(11)
,`codigo_producto` int(11)
,`nombre_producto` varchar(200)
,`nombre_tipo` varchar(2000)
,`cantidad` int(11)
,`precio_producto` int(11)
,`total` int(11)
,`codigo_tipo` int(11)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `codigo_producto` (`codigo_producto`),
  KEY `codigo_venta` (`codigo_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `codigo_venta`, `cantidad`, `total`, `codigo_producto`) VALUES
(1, 1, 1, 2890, 1),
(2, 1, 2, 8180, 2),
(3, 2, 2, 759980, 5),
(4, 3, 1, 2890, 1),
(5, 22, 1, 2890, 1),
(6, 23, 1, 2890, 1),
(7, 24, 1, 2890, 1),
(8, 25, 1, 2890, 1),
(9, 26, 1, 2890, 1),
(10, 26, 2, 299980, 4),
(11, 27, 1, 2890, 1),
(12, 27, 1, 9490, 3),
(13, 28, 1, 2890, 1),
(14, 28, 1, 9490, 3),
(15, 29, 1, 2890, 1),
(16, 29, 1, 9490, 3),
(17, 30, 1, 2890, 1),
(18, 30, 1, 9490, 3),
(19, 31, 1, 2890, 1),
(20, 31, 1, 9490, 3),
(21, 32, 1, 2890, 1),
(22, 32, 1, 9490, 3),
(23, 33, 1, 2890, 1),
(24, 33, 1, 9490, 3),
(25, 34, 1, 2890, 1),
(26, 35, 1, 2890, 1),
(27, 36, 1, 2890, 1),
(28, 37, 1, 2890, 1),
(29, 38, 1, 2890, 1),
(30, 38, 1, 149990, 4),
(31, 39, 1, 2890, 1),
(32, 40, 1, 2890, 1),
(33, 41, 1, 2890, 1),
(34, 42, 1, 2890, 1),
(35, 43, 1, 2890, 1),
(36, 44, 1, 2890, 1),
(37, 45, 1, 2890, 1),
(38, 46, 1, 2890, 1),
(39, 47, 1, 2890, 1),
(40, 48, 1, 2890, 1),
(41, 49, 1, 2890, 1),
(42, 50, 1, 2890, 1),
(43, 51, 1, 2890, 1),
(44, 52, 1, 2890, 1),
(45, 53, 1, 2890, 1),
(46, 54, 1, 2890, 1),
(47, 54, 1, 2890, 1),
(48, 55, 1, 2890, 1),
(49, 55, 1, 2890, 1),
(50, 56, 1, 2890, 1),
(51, 57, 1, 2890, 1),
(52, 58, 1, 2890, 1),
(53, 58, 1, 2890, 1),
(54, 59, 1, 2890, 1),
(55, 60, 1, 2890, 1),
(56, 61, 1, 2890, 1),
(57, 61, 1, 2890, 1),
(58, 62, 1, 2890, 1),
(59, 62, 1, 2890, 1),
(60, 63, 1, 2890, 1),
(61, 63, 1, 2890, 1),
(62, 64, 1, 2890, 1),
(63, 64, 1, 2890, 1),
(64, 65, 1, 2890, 1),
(65, 65, 1, 2890, 1),
(66, 66, 1, 2890, 1),
(67, 66, 1, 2890, 1),
(68, 67, 1, 2890, 1),
(69, 67, 1, 2890, 1),
(70, 68, 1, 2890, 1),
(71, 68, 1, 2890, 1),
(72, 69, 1, 2890, 1),
(73, 70, 1, 2890, 1),
(74, 71, 1, 2890, 1),
(75, 72, 1, 2890, 1),
(76, 73, 1, 2890, 1),
(77, 74, 1, 2890, 1),
(78, 74, 1, 2890, 1),
(79, 75, 1, 2890, 1),
(80, 75, 1, 2890, 1),
(81, 76, 1, 2890, 1),
(82, 76, 1, 2890, 1),
(83, 77, 1, 2890, 1),
(84, 77, 1, 2890, 1),
(85, 78, 1, 4090, 2),
(86, 78, 2, 18980, 3),
(87, 79, 1, 2890, 1),
(88, 79, 1, 2890, 1),
(89, 80, 1, 2890, 1),
(90, 80, 1, 2890, 1),
(91, 81, 1, 2890, 1),
(92, 81, 1, 2890, 1),
(93, 82, 1, 2890, 1),
(94, 82, 1, 2890, 1),
(95, 83, 1, 2890, 1),
(96, 83, 1, 2890, 1),
(97, 83, 1, 2890, 1),
(98, 84, 1, 2890, 1),
(99, 84, 1, 2890, 1),
(100, 85, 1, 2890, 1),
(101, 85, 1, 2890, 1),
(102, 86, 1, 2890, 1),
(103, 86, 1, 2890, 1),
(104, 87, 1, 2890, 1),
(105, 87, 1, 2890, 1),
(106, 88, 1, 2890, 1),
(107, 88, 1, 2890, 1),
(108, 89, 1, 2890, 1),
(109, 90, 1, 2890, 1),
(110, 90, 1, 2890, 1),
(111, 91, 1, 2890, 1),
(112, 91, 1, 2890, 1),
(113, 92, 1, 2890, 1),
(114, 92, 1, 2890, 1),
(115, 92, 1, 2890, 1),
(116, 93, 1, 2890, 1),
(117, 93, 1, 2890, 1),
(118, 94, 1, 2890, 1),
(119, 94, 1, 2890, 1),
(120, 95, 1, 2890, 1),
(121, 95, 1, 2890, 1),
(122, 96, 1, 2890, 1),
(123, 96, 2, 759980, 5),
(124, 97, 1, 2890, 1),
(125, 97, 1, 2890, 1),
(126, 97, 1, 2890, 1),
(127, 98, 1, 38790, 8),
(128, 99, 1, 379990, 5),
(129, 100, 1, 40000, 8),
(130, 100, 1, 40000, 8),
(131, 101, 1, 2890, 1),
(132, 102, 1, 100000, 25),
(133, 102, 1, 100000, 25),
(134, 103, 1, 15000, 26),
(135, 104, 1, 20490, 7),
(136, 104, 1, 20490, 7),
(137, 104, 1, 20490, 7),
(138, 105, 1, 40000, 8),
(139, 105, 1, 40000, 8),
(140, 106, 2, 50000, 27),
(141, 107, 1, 15000, 26),
(142, 107, 1, 15000, 26),
(143, 108, 1, 2890, 1),
(144, 108, 1, 379990, 5),
(145, 109, 1, 2890, 1),
(146, 110, 1, 15000, 26),
(147, 111, 1, 2890, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `codigo_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`codigo_perfil`, `nombre_perfil`) VALUES
(1, 'Administrador'),
(2, 'Consulta'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `codigo_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(200) NOT NULL,
  `codigo_tipo` int(11) NOT NULL,
  `precio_producto` int(11) NOT NULL,
  PRIMARY KEY (`codigo_producto`),
  KEY `codigo_tipo` (`codigo_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo_producto`, `nombre_producto`, `codigo_tipo`, `precio_producto`) VALUES
(1, 'SonyÃƒÂƒÃ‚Â‚ÃƒÂ‚Ã‚Â® Audifono In Ear MDR-E9LP Negro', 1, 2890),
(2, 'Genius® Microfono Multimedia MIC-02A', 1, 4090),
(3, 'GeniusÂ® Manos Libres HS-120BT', 5, 9490),
(4, 'Garmin® GPS portatil etrex 20 2,2"', 2, 149990),
(5, 'Sony® Consola PlayStation 4 (PS4) Blanca + Destiny', 4, 379990),
(6, 'Microsoft® Consola Xbox One 500GB + Assassins Creed Unity & Black Flag', 4, 329790),
(7, 'Blizzard® Juego PC - Starcraft 2 Heart Of The Swarm', 3, 20490),
(8, 'RockstarÂ® Juego PC - GTA V', 3, 40000),
(25, 'Parlantes', 1, 100000),
(26, 'Xiaomi Audifonos', 1, 15000),
(27, 'Win 10', 18, 25000);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `productofull`
--
CREATE TABLE IF NOT EXISTS `productofull` (
`codigo_producto` int(11)
,`nombre_producto` varchar(200)
,`precio_producto` int(11)
,`nombre_tipo` varchar(2000)
,`codigo_tipo` int(11)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `codigo_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(2000) NOT NULL,
  PRIMARY KEY (`codigo_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`codigo_tipo`, `nombre_tipo`) VALUES
(1, 'Audio'),
(2, 'Automovil'),
(3, 'Juegos'),
(4, 'Consola'),
(5, 'Computador'),
(6, 'Redes'),
(7, 'Almacenamiento'),
(8, 'Monitores'),
(9, 'Impresoras'),
(18, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login_usuario` varchar(200) NOT NULL,
  `pass_usuario` varchar(200) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `apellido_usuario` varchar(200) NOT NULL,
  `correo_usuario` varchar(200) NOT NULL,
  `codigo_perfil` int(11) NOT NULL,
  `fechaNacimiento_usuario` date NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `codigo_perfil` (`codigo_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login_usuario`, `pass_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `codigo_perfil`, `fechaNacimiento_usuario`) VALUES
(0, '2', 'ac627ab1ccbdb62ec96e702f07f6425b', 'Lucas', 'Soto', '9@sd.com', 3, '2015-07-06'),
(2, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Nicolas', 'Perez', 'asdsda@gmail.com', 3, '1990-08-02'),
(3, 'dema', '202cb962ac59075b964b07152d234b70', 'Juan', 'Pedro', 'edasd@gmail.com', 1, '2015-07-16'),
(4, 'juabn', 'c4ca4238a0b923820dcc509a6f75849b', 'Pedro', 'Diaz', 'wqwqd@gmail.com', 3, '2015-07-16'),
(123, 'Dios', 'd41d8cd98f00b204e9800998ecf8427e', 'Jisus', 'Crist', 'das@dsa.com', 1, '2015-07-09'),
(777, 'MalVendedor', 'd41d8cd98f00b204e9800998ecf8427e', 'Mendoza', 'MasaÃ±a', 'masa@gmail.com', 3, '1990-07-08'),
(1313, 'op', 'd41d8cd98f00b204e9800998ecf8427e', 'Jaime', 'Lucas', '1@dwdw.com', 1, '1990-12-31'),
(696969, 'vende', '202cb962ac59075b964b07152d234b70', 'Edson', 'Perez', 'eds.perez@gmail.com', 3, '1990-08-02'),
(106157770, 'Cristi', '202cb962ac59075b964b07152d234b70', 'Cristina', 'Demanet', 'add@gmail.com', 2, '1960-07-08');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuariofull`
--
CREATE TABLE IF NOT EXISTS `usuariofull` (
`id_usuario` int(11)
,`login_usuario` varchar(200)
,`pass_usuario` varchar(200)
,`nombre_usuario` varchar(200)
,`apellido_usuario` varchar(200)
,`correo_usuario` varchar(200)
,`fechaNacimiento_usuario` date
,`codigo_perfil` int(11)
,`nombre_perfil` varchar(200)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `codigo_venta` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_vendedor` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `total_venta` int(11) NOT NULL,
  PRIMARY KEY (`codigo_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`codigo_venta`, `codigo_vendedor`, `fecha_venta`, `total_venta`) VALUES
(1, 2, '2015-07-30', 11070),
(2, 2, '2015-07-30', 759980),
(3, 2, '1969-12-31', 2890),
(22, 2, '2015-07-17', 2890),
(23, 2, '2015-07-31', 2890),
(24, 2, '2015-07-31', 2890),
(25, 2, '2015-07-31', 2890),
(26, 4, '2015-07-31', 302870),
(27, 2, '2015-07-16', 12380),
(28, 2, '2015-07-16', 12380),
(29, 2, '2015-07-16', 12380),
(30, 2, '2015-07-16', 12380),
(31, 2, '2015-07-16', 12380),
(32, 2, '2015-07-16', 12380),
(33, 2, '2015-07-16', 12380),
(34, 2, '2015-07-30', 2890),
(35, 2, '2015-07-29', 2890),
(36, 2, '2015-07-31', 2890),
(37, 2, '2015-07-31', 2890),
(38, 2, '2015-07-31', 152880),
(39, 2, '2015-07-08', 2890),
(40, 2, '2015-07-29', 2890),
(41, 2, '2015-07-24', 2890),
(42, 2, '2015-07-15', 2890),
(43, 2, '2015-07-03', 2890),
(44, 2, '2015-07-30', 2890),
(45, 2, '2015-07-22', 2890),
(46, 2, '2015-07-21', 2890),
(47, 2, '2015-07-31', 2890),
(48, 2, '2015-07-31', 2890),
(49, 2, '2015-07-29', 2890),
(50, 2, '2015-07-29', 2890),
(51, 2, '2015-07-31', 2890),
(52, 2, '2015-07-30', 2890),
(53, 2, '2015-07-31', 2890),
(54, 2, '2015-07-09', 5780),
(55, 2, '2015-07-03', 5780),
(56, 2, '2015-07-30', 2890),
(57, 2, '2015-07-30', 2890),
(58, 2, '2015-07-02', 5780),
(59, 2, '2015-07-09', 2890),
(60, 2, '2015-07-09', 2890),
(61, 2, '2015-07-08', 5780),
(62, 2, '2015-07-16', 5780),
(63, 2, '2015-07-16', 5780),
(64, 2, '2015-07-16', 5780),
(65, 2, '2015-07-16', 5780),
(66, 2, '2015-07-16', 5780),
(67, 2, '2015-07-16', 5780),
(68, 2, '2015-07-16', 5780),
(69, 2, '2015-07-01', 2890),
(70, 2, '2015-07-10', 2890),
(71, 2, '2015-07-09', 2890),
(72, 2, '2015-07-31', 2890),
(73, 2, '2015-07-10', 2890),
(74, 2, '2015-07-10', 5780),
(75, 2, '2015-07-10', 5780),
(76, 2, '2015-07-01', 5780),
(77, 2, '2015-07-02', 5780),
(78, 2, '2015-07-09', 23070),
(79, 2, '2015-07-03', 5780),
(80, 2, '2015-07-03', 5780),
(81, 2, '2015-07-16', 5780),
(82, 2, '2015-07-03', 5780),
(83, 2, '2015-07-09', 8670),
(84, 2, '2015-07-03', 5780),
(85, 2, '2015-07-02', 5780),
(86, 2, '2015-07-02', 5780),
(87, 2, '2015-07-29', 5780),
(88, 2, '2015-07-03', 5780),
(89, 2, '2015-07-03', 2890),
(90, 2, '2015-07-09', 5780),
(91, 2, '2015-07-01', 5780),
(92, 2, '2015-07-02', 8670),
(93, 2, '2015-07-10', 5780),
(94, 2, '2015-07-31', 5780),
(95, 2, '2015-07-23', 5780),
(96, 2, '2015-07-10', 762870),
(97, 2, '2015-07-03', 8670),
(98, 3, '2015-07-14', 38790),
(99, 2, '2015-07-06', 379990),
(100, 3, '2015-07-06', 80000),
(101, 2, '2015-07-09', 2890),
(102, 4, '2015-07-10', 200000),
(103, 4, '2015-07-07', 15000),
(104, 4, '2015-07-03', 61470),
(105, 4, '2015-07-02', 80000),
(106, 0, '2015-07-08', 50000),
(107, 0, '2015-07-08', 30000),
(108, 696969, '2015-07-08', 382880),
(109, 0, '1969-12-31', 2890),
(110, 0, '2015-07-08', 15000),
(111, 0, '2015-07-08', 2890),
(112, 0, '1969-12-31', 2890);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ventafull`
--
CREATE TABLE IF NOT EXISTS `ventafull` (
`codigo_venta` int(11)
,`nombre_usuario` varchar(200)
,`apellido_usuario` varchar(200)
,`fecha_venta` date
,`total_venta` int(11)
,`codigo_usuario` int(11)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `detallefull`
--
DROP TABLE IF EXISTS `detallefull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detallefull` AS select `d`.`codigo_venta` AS `codigo_venta`,`p`.`codigo_producto` AS `codigo_producto`,`p`.`nombre_producto` AS `nombre_producto`,`t`.`nombre_tipo` AS `nombre_tipo`,`d`.`cantidad` AS `cantidad`,`p`.`precio_producto` AS `precio_producto`,`d`.`total` AS `total`,`t`.`codigo_tipo` AS `codigo_tipo` from ((`detalle_venta` `d` join `producto` `p`) join `tipo` `t`) where ((`d`.`codigo_producto` = `p`.`codigo_producto`) and (`p`.`codigo_tipo` = `t`.`codigo_tipo`));

-- --------------------------------------------------------

--
-- Estructura para la vista `productofull`
--
DROP TABLE IF EXISTS `productofull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productofull` AS (select `p`.`codigo_producto` AS `codigo_producto`,`p`.`nombre_producto` AS `nombre_producto`,`p`.`precio_producto` AS `precio_producto`,`t`.`nombre_tipo` AS `nombre_tipo`,`t`.`codigo_tipo` AS `codigo_tipo` from (`producto` `p` join `tipo` `t`) where (`p`.`codigo_tipo` = `t`.`codigo_tipo`));

-- --------------------------------------------------------

--
-- Estructura para la vista `usuariofull`
--
DROP TABLE IF EXISTS `usuariofull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuariofull` AS select `u`.`id_usuario` AS `id_usuario`,`u`.`login_usuario` AS `login_usuario`,`u`.`pass_usuario` AS `pass_usuario`,`u`.`nombre_usuario` AS `nombre_usuario`,`u`.`apellido_usuario` AS `apellido_usuario`,`u`.`correo_usuario` AS `correo_usuario`,`u`.`fechaNacimiento_usuario` AS `fechaNacimiento_usuario`,`p`.`codigo_perfil` AS `codigo_perfil`,`p`.`nombre_perfil` AS `nombre_perfil` from (`usuario` `u` join `perfil` `p`) where (`u`.`codigo_perfil` = `p`.`codigo_perfil`);

-- --------------------------------------------------------

--
-- Estructura para la vista `ventafull`
--
DROP TABLE IF EXISTS `ventafull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ventafull` AS select `v`.`codigo_venta` AS `codigo_venta`,`u`.`nombre_usuario` AS `nombre_usuario`,`u`.`apellido_usuario` AS `apellido_usuario`,`v`.`fecha_venta` AS `fecha_venta`,`v`.`total_venta` AS `total_venta`,`u`.`id_usuario` AS `codigo_usuario` from (`venta` `v` join `usuario` `u`) where (`u`.`id_usuario` = `v`.`codigo_vendedor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`codigo_venta`) REFERENCES `venta` (`codigo_venta`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`codigo_tipo`) REFERENCES `tipo` (`codigo_tipo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`codigo_perfil`) REFERENCES `perfil` (`codigo_perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
