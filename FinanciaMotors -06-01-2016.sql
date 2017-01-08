-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-01-2017 a las 20:57:22
-- Versión del servidor: 5.7.13-0ubuntu0.16.04.2
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `FinanciaMotors`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `id` int(11) NOT NULL,
  `clave_cliente` varchar(45) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`id`, `clave_cliente`, `id_persona`, `id_empresa`) VALUES
(2, 'CFM-2', 38, 4),
(3, 'CFM-3', 39, NULL),
(4, 'CFM-4', 40, 5),
(5, 'CFM-5', 42, 5),
(6, 'CFM-6', 43, NULL),
(7, 'CFM-7', 44, NULL),
(8, 'CFM-8', 45, NULL),
(9, 'CFM-9', 52, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresa`
--

CREATE TABLE `Empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `rfc` varchar(45) NOT NULL,
  `razon_social` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Empresa`
--

INSERT INTO `Empresa` (`id`, `nombre`, `rfc`, `razon_social`) VALUES
(3, 'dsad', 'asd', 'aasd'),
(4, 'mejikanito', 'asdad', 'mejikanito cs de cv'),
(5, 'Fantacias Miguel', '1231addasd12', 'ALPURA');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `getFullProspeccion`
--
CREATE TABLE `getFullProspeccion` (
`id_prospeccion` int(11)
,`id_vendedor` int(11)
,`id_cliente` int(11)
,`vendedor_nombre` varchar(255)
,`vendedor_apellidoPaterno` varchar(255)
,`vendedor_apellidoMaterno` varchar(255)
,`vendedor_correo` varchar(255)
,`vendedor_clave` varchar(45)
,`prospeccion_token` varchar(70)
,`cliente_nombre` varchar(255)
,`cliente_apellidoPaterno` varchar(255)
,`cliente_apellidoMaterno` varchar(255)
,`cliente_correo` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Marca`
--

CREATE TABLE `Marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Marca`
--

INSERT INTO `Marca` (`id`, `nombre`) VALUES
(4, 'Ford'),
(5, 'nissan'),
(6, 'DODGE'),
(7, 'Toyota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Permiso`
--

CREATE TABLE `Permiso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Permiso`
--

INSERT INTO `Permiso` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE `Persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidoPaterno` varchar(255) NOT NULL,
  `apellidoMaterno` varchar(255) DEFAULT NULL,
  `telefono_cel` varchar(45) DEFAULT NULL,
  `telefono_otro` varchar(45) DEFAULT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefono_cel`, `telefono_otro`, `correo`) VALUES
(36, 'Dante Ulses', 'Rangel', 'Robles', '5566751526', '23134432', 'dante.rangelrobles@gmail.com'),
(37, 'dasd', 'asdas', 'asdasd', '1213242', '12312312', 'asdas|@as.as'),
(38, 'Dante', 'Rangel', 'Robles', '12312311', '123123312', 'dante_uli@gmail.com'),
(39, 'EDUARDO', 'SALGUERO', '.', '5569164281', '5590001742', 'edsalfinanciamotors@gmail.com'),
(40, 'CRISTIAN', 'MARTINEZ', 'ROBLES', '55123123123', '1231231321', 'cristian@gmail.com'),
(41, 'Carlos', 'Jimenez', '.', '5512121212', '5512121212', 'cart_jim@hotmail.com'),
(42, 'SDFDAFDS', 'SDFDS', 'SDFSDF', '312321321', '1231231231', 'SDFSDF'),
(43, 'Meribel Berenice', 'Rangel', 'Robles', '12312312312', '123123213', 'meribel@gmail.com'),
(44, 'Juan', 'Sedano', 'Hernandez', '123123123', '1231231232', 'juan@se.sr'),
(45, 'Angeles ', 'Rangel', 'Robles', '12313121312', '123123123', 'angie@gmail.com'),
(47, 'Meribel', 'Rangel', 'Robles', '5566751526', '1231231231', 'dante.rangelrobles@outlook.com'),
(48, 'Carlos ', '____', '.', '5566751526', '', 'dante_uli@hotmail.com'),
(51, 'Patricia', 'Robles', 'Robles', '5566751526', '', 'dante@gowi.com.mx'),
(52, 'juan ', 'perez', 'hernandez', '24342424', '234234234', 'juanito@gaga.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Prospeccion`
--

CREATE TABLE `Prospeccion` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `token_json` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Prospeccion`
--

INSERT INTO `Prospeccion` (`id`, `id_cliente`, `id_vendedor`, `token_json`) VALUES
(1, 3, 14, '5b865c1af3ecf6764656c8e67b638f26.json'),
(2, 3, 14, '5b865c1af3ecf6764656c8e67b638f26.json'),
(3, 3, 14, '5dd6d741a41c8deee499117aa2a56d23.json'),
(4, 3, 14, '5dd6d741a41c8deee499117aa2a56d23.json'),
(5, 3, 14, '5dd6d741a41c8deee499117aa2a56d23.json'),
(6, 3, 14, '5dd6d741a41c8deee499117aa2a56d23.json'),
(7, 3, 14, '5dd6d741a41c8deee499117aa2a56d23.json'),
(8, 8, 14, '9e55a5c9551a8bb58d03a2eb99b681db.json'),
(9, 4, 14, '4cd411fafcfa963895801caabf663990.json'),
(10, 6, 14, '8af876f9c0aca4afbd2ca05afd651aaf.json'),
(11, 6, 14, '8af876f9c0aca4afbd2ca05afd651aaf.json'),
(12, 5, 14, '7ecca0db19ccd2f14425429dadd96c3f.json'),
(13, 6, 17, '65db26f791a8e6aaeb547f52b00f6192.json'),
(14, 8, 17, 'b9dbf0958cd875ed9d72836423d24622.json'),
(15, 7, 14, '8a019674cf2cf5f7886ed0807c405ad4.json'),
(16, 9, 14, '2bc4c53f39e8972d4d9219f7ddb12751.json');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospeccionFecha`
--

CREATE TABLE `prospeccionFecha` (
  `id` int(11) NOT NULL,
  `id_prospeccion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prospeccionFecha`
--

INSERT INTO `prospeccionFecha` (`id`, `id_prospeccion`, `fecha`, `descripcion`) VALUES
(1, 2, '2017-01-12', '1'),
(2, 2, '2017-01-31', '2'),
(3, 1, '2017-02-22', '3'),
(4, 1, '2017-01-31', '4'),
(9, 11, '2017-01-20', ''),
(10, 12, '2017-01-07', ''),
(11, 13, '2017-01-07', ''),
(12, 14, '2017-01-07', ''),
(13, 15, '2017-01-08', ''),
(14, 16, '2017-01-13', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicios`
--

CREATE TABLE `Servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Servicios`
--

INSERT INTO `Servicios` (`id`, `nombre`) VALUES
(3, 'Rines'),
(4, 'Cambio de Llantas'),
(5, 'Afinación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicios_Vehiculo`
--

CREATE TABLE `Servicios_Vehiculo` (
  `id` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `costo` varchar(45) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Servicios_Vehiculo`
--

INSERT INTO `Servicios_Vehiculo` (`id`, `id_servicio`, `id_vehiculo`, `costo`, `fecha`) VALUES
(5, 3, 4, '123', '2016-09-23'),
(9, 3, 7, '1230', '2016-09-17'),
(6, 4, 4, '3242.234', '2016-09-16'),
(7, 4, 4, '32131.12', '2016-09-23'),
(8, 4, 5, '12312.12', '2016-09-16'),
(12, 4, 6, '12312', '2017-01-13'),
(11, 4, 7, '87687', '2016-09-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoVehiculo`
--

CREATE TABLE `tipoVehiculo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoVehiculo`
--

INSERT INTO `tipoVehiculo` (`id`, `tipo`) VALUES
(9, 'dante123'),
(10, 'ola k ase'),
(11, 'Camión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vehiculo`
--

CREATE TABLE `Vehiculo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `transmision` tinyint(1) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `costo` double NOT NULL,
  `factura` tinyint(1) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `id_tipoVehiculo` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `kilometraje` double NOT NULL,
  `fecha_llegada` datetime DEFAULT NULL,
  `fecha_salida` datetime NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Vehiculo`
--

INSERT INTO `Vehiculo` (`id`, `nombre`, `anio`, `modelo`, `status`, `color`, `transmision`, `descripcion`, `costo`, `factura`, `serie`, `id_tipoVehiculo`, `id_marca`, `kilometraje`, `fecha_llegada`, `fecha_salida`, `precio`) VALUES
(4, 'mazda', '2014', 'adsddas', 0, 'verde', 0, 'carro deportivo con ', 123123, 0, '2131231', 9, 6, 23123, NULL, '0000-00-00 00:00:00', 0),
(5, 'Jetta', '2016', 'modelo2', 1, 'Verde', 0, 'dasdasdasdas', 123.12, 2, '312312312312321', 10, 6, 132123.12, NULL, '0000-00-00 00:00:00', 0),
(6, 'ASDASDSADAS', '1231', 'ASASDASD', 1, 'ASDD', 1, 'ASDASDSAD', 12313221, 1, 'aaaaaa', 10, 5, 1231231, '2016-09-22 00:00:00', '2016-09-30 00:00:00', 123.12),
(7, 'FORD', '2013', 'modelo', 0, 'BLANCO', 0, 'LIMITED, ELEVADORES ELECTRICOS, SEGUROS ELECT', 123, 1, '3JHJASDJAKSDHKASDHAKJH', 9, 4, 29000, NULL, '0000-00-00 00:00:00', 0),
(8, 'jetta', '1231', 'modelo', 1, 'asdas', 0, 'asdas', 12312.12, 1, 'asdas', 10, 5, 1231.12, NULL, '0000-00-00 00:00:00', 0),
(9, 'dantea', '1231', 'modelo', 0, '12321', 0, '12321', 123123.123, 0, '1231231', 9, 4, 1231231, NULL, '0000-00-00 00:00:00', 0),
(10, 'daasdas', '1992', '12321', 1, 'Verde', 0, '123123', 123123123, 2, '123123123123', 11, 5, 12312321.12, NULL, '0000-00-00 00:00:00', 1231.98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vendedor`
--

CREATE TABLE `Vendedor` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `clave_vendedor` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(60) DEFAULT NULL,
  `id_permiso` int(11) NOT NULL,
  `img_src` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Vendedor`
--

INSERT INTO `Vendedor` (`id`, `id_persona`, `clave_vendedor`, `password`, `remember_token`, `id_permiso`, `img_src`, `status`) VALUES
(14, 36, 'V-14', '$2y$10$i9mpKn9vZMAXWOh7s/HRS.elroWva0g5QzzU3FwhogxEAdu.ujUfi', 'XOzE70a9URfg7F8PBcgE8UzfH1xy9koJ1Vq84pVJftYRc3roPIMm0pWthvxh', 1, 'dante.jpeg', 1),
(17, 47, 'V-17', '$2y$10$oIqpIqZgVq3KTEDX5vlJeeIaDzMR342uVx2jsoGnCrFGuQRX7Nyv6', NULL, 1, 'tattoo1.jpg', 1),
(18, 48, 'V-18', '$2y$10$sprx91RHX2pVj9RsdtKoAe2S1JC69G6c1chiZzGzWPeIbF3wvMF.m', NULL, 1, 'Oye_tranquilo_viejo.png', 1),
(21, 51, 'V-21', '$2y$10$ignFWAJlptE5NsiJ6fEds.orRw/VjL17ek7dcpPaNjhEkdC7/IGO.', NULL, 1, 'dante.jpeg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ventas`
--

CREATE TABLE `Ventas` (
  `id` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Ventas`
--

INSERT INTO `Ventas` (`id`, `id_vehiculo`, `precio_venta`, `id_cliente`, `id_vendedor`, `fecha_compra`) VALUES
(1, 4, 231123, 2, 14, '2016-09-17'),
(3, 5, 876878, 2, 14, '2016-09-15');

-- --------------------------------------------------------

--
-- Estructura para la vista `getFullProspeccion`
--
DROP TABLE IF EXISTS `getFullProspeccion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getFullProspeccion`  AS  select `pro`.`id` AS `id_prospeccion`,`pro`.`id_vendedor` AS `id_vendedor`,`pro`.`id_cliente` AS `id_cliente`,`per`.`nombre` AS `vendedor_nombre`,`per`.`apellidoPaterno` AS `vendedor_apellidoPaterno`,`per`.`apellidoMaterno` AS `vendedor_apellidoMaterno`,`per`.`correo` AS `vendedor_correo`,`ven`.`clave_vendedor` AS `vendedor_clave`,`pro`.`token_json` AS `prospeccion_token`,`cli_per`.`nombre` AS `cliente_nombre`,`cli_per`.`apellidoPaterno` AS `cliente_apellidoPaterno`,`cli_per`.`apellidoMaterno` AS `cliente_apellidoMaterno`,`cli_per`.`correo` AS `cliente_correo` from ((((`Prospeccion` `pro` join `Vendedor` `ven` on((`pro`.`id_vendedor` = `ven`.`id`))) join `Persona` `per` on((`ven`.`id_persona` = `per`.`id`))) join `Cliente` `cli` on((`cli`.`id` = `pro`.`id_cliente`))) join `Persona` `cli_per` on((`cli_per`.`id` = `cli`.`id_persona`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Cliente_persona1_idx` (`id_persona`),
  ADD KEY `fk_Cliente_Empresa1_idx` (`id_empresa`);

--
-- Indices de la tabla `Empresa`
--
ALTER TABLE `Empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Marca`
--
ALTER TABLE `Marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Permiso`
--
ALTER TABLE `Permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `Prospeccion`
--
ALTER TABLE `Prospeccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Cliente_has_Vendedor_Vendedor1_idx` (`id_vendedor`),
  ADD KEY `fk_Cliente_has_Vendedor_Cliente1_idx` (`id_cliente`);

--
-- Indices de la tabla `prospeccionFecha`
--
ALTER TABLE `prospeccionFecha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prospeccion` (`id_prospeccion`);

--
-- Indices de la tabla `Servicios`
--
ALTER TABLE `Servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Servicios_Vehiculo`
--
ALTER TABLE `Servicios_Vehiculo`
  ADD PRIMARY KEY (`id_servicio`,`id_vehiculo`,`id`) USING BTREE,
  ADD KEY `fk_Servicios_has_Vehiculo_Vehiculo1_idx` (`id_vehiculo`),
  ADD KEY `fk_Servicios_has_Vehiculo_Servicios1_idx` (`id_servicio`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `tipoVehiculo`
--
ALTER TABLE `tipoVehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Vehiculo`
--
ALTER TABLE `Vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Vehiculo_tipoVehiculo_idx` (`id_tipoVehiculo`),
  ADD KEY `fk_Vehiculo_Marca1_idx` (`id_marca`);

--
-- Indices de la tabla `Vendedor`
--
ALTER TABLE `Vendedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave_vendedor` (`clave_vendedor`),
  ADD KEY `fk_Vendedor_persona1_idx` (`id_persona`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `Ventas`
--
ALTER TABLE `Ventas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `fk_Ventas_Vehiculo1_idx` (`id_vehiculo`),
  ADD KEY `fk_Ventas_Cliente1_idx` (`id_cliente`),
  ADD KEY `fk_Ventas_Vendedor1_idx` (`id_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `Empresa`
--
ALTER TABLE `Empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Marca`
--
ALTER TABLE `Marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Permiso`
--
ALTER TABLE `Permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Persona`
--
ALTER TABLE `Persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `Prospeccion`
--
ALTER TABLE `Prospeccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `prospeccionFecha`
--
ALTER TABLE `prospeccionFecha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `Servicios`
--
ALTER TABLE `Servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Servicios_Vehiculo`
--
ALTER TABLE `Servicios_Vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tipoVehiculo`
--
ALTER TABLE `tipoVehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `Vehiculo`
--
ALTER TABLE `Vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `Vendedor`
--
ALTER TABLE `Vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `Ventas`
--
ALTER TABLE `Ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD CONSTRAINT `fk_Cliente_Empresa1` FOREIGN KEY (`id_empresa`) REFERENCES `Empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cliente_persona1` FOREIGN KEY (`id_persona`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Prospeccion`
--
ALTER TABLE `Prospeccion`
  ADD CONSTRAINT `fk_Cliente_has_Vendedor_Cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `Cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cliente_has_Vendedor_Vendedor1` FOREIGN KEY (`id_vendedor`) REFERENCES `Vendedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prospeccionFecha`
--
ALTER TABLE `prospeccionFecha`
  ADD CONSTRAINT `fk_prospeccion` FOREIGN KEY (`id_prospeccion`) REFERENCES `Prospeccion` (`id`);

--
-- Filtros para la tabla `Servicios_Vehiculo`
--
ALTER TABLE `Servicios_Vehiculo`
  ADD CONSTRAINT `fk_Servicios_has_Vehiculo_Servicios1` FOREIGN KEY (`id_servicio`) REFERENCES `Servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Servicios_has_Vehiculo_Vehiculo1` FOREIGN KEY (`id_vehiculo`) REFERENCES `Vehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Vehiculo`
--
ALTER TABLE `Vehiculo`
  ADD CONSTRAINT `fk_Vehiculo_Marca1` FOREIGN KEY (`id_marca`) REFERENCES `Marca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vehiculo_tipoVehiculo` FOREIGN KEY (`id_tipoVehiculo`) REFERENCES `tipoVehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Vendedor`
--
ALTER TABLE `Vendedor`
  ADD CONSTRAINT `Vendedor_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `Persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Ventas`
--
ALTER TABLE `Ventas`
  ADD CONSTRAINT `fk_Ventas_Cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `Cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ventas_Vehiculo1` FOREIGN KEY (`id_vehiculo`) REFERENCES `Vehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ventas_Vendedor1` FOREIGN KEY (`id_vendedor`) REFERENCES `Vendedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
