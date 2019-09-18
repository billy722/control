-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-09-2019 a las 10:16:50
-- Versión del servidor: 5.6.40-84.0-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daemmulc_gastos`
--

DELIMITER $$
--
-- Procedimientos
--
$$

$$

$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_actividad`
--

CREATE TABLE `tb_actividad` (
  `id_accion` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion_accion` varchar(255) NOT NULL,
  `id_movimiento` int(11) DEFAULT NULL,
  `rut_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_colegios`
--

CREATE TABLE `tb_colegios` (
  `rbd_colegio` varchar(50) NOT NULL,
  `nombre_colegio` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo_establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_colegios`
--

INSERT INTO `tb_colegios` (`rbd_colegio`, `nombre_colegio`, `estado`, `tipo_establecimiento`) VALUES
('12051', 'ESCUELA ESPECIAL SOLIDARIDAD', 1, 1),
('17751', 'ESCUELA VILLA LA GRANJA', 1, 1),
('17790', 'LICEO NUEVO MUNDO', 1, 1),
('3001', 'SALA CUNA MI PEQUEÑO MUNDO', 1, 2),
('4403', 'ESCUELA ADULTO RIO SUR', 1, 1),
('4404', 'LICEO MIGUEL ANGEL CERDA LEIVA', 1, 1),
('4405', 'BLANCO ENCALADA', 1, 1),
('4406', 'ESCUELA MULCHEN', 1, 1),
('4407', 'ESCUELA IGNACIO VERDUGO CAVADA', 1, 1),
('4408', 'LICEO CRISOL', 1, 1),
('4409', 'ESCUELA SACERDOTE ALEJANDRO MANERA', 1, 1),
('4410', 'ESCUELA VILLA LAS PEÑAS', 1, 1),
('4412', 'ESCUELA ALHUELEMU', 1, 1),
('4414', 'ESCUELA MUNILQUE IZAURIETA', 1, 1),
('4417', 'ESCUELA SAN LUIS DE MALVEN', 1, 1),
('4419', 'ESCUELA BUREO', 1, 1),
('4421', 'ESCUELA PILGUEN', 1, 1),
('4426', 'ESCUELA EL PARRON', 1, 1),
('4432', 'ESCUELA EL EDEN', 1, 1),
('4433', 'ESCUELA RAPELCO', 1, 1),
('4435', 'ESCUELA LOS HINOJOS', 1, 1),
('4436', 'ESCUELA SANTA ADRIANA', 1, 1),
('4437', 'ESCUELA AURORA DE ENERO', 1, 1),
('4441', 'ESCUELA CASAS DE PILE', 1, 1),
('777777', 'Prueba jardin', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cuentas_presupuesto`
--

CREATE TABLE `tb_cuentas_presupuesto` (
  `numero_cuenta` bigint(20) NOT NULL,
  `nombre_cuenta` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_cuentas_presupuesto`
--

INSERT INTO `tb_cuentas_presupuesto` (`numero_cuenta`, `nombre_cuenta`, `estado`) VALUES
(2152201001, 'CXP ALIMENTOS Y BEBIDAS', 1),
(2152101001001, 'C X P PLANTA Sueldo Base', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_colegio`
--

CREATE TABLE `tb_estado_colegio` (
  `id_estado` int(11) NOT NULL,
  `descripcion_estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estado_colegio`
--

INSERT INTO `tb_estado_colegio` (`id_estado`, `descripcion_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_cuenta`
--

CREATE TABLE `tb_estado_cuenta` (
  `id_estado` int(11) NOT NULL,
  `descripcion_estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estado_cuenta`
--

INSERT INTO `tb_estado_cuenta` (`id_estado`, `descripcion_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_movimiento`
--

CREATE TABLE `tb_estado_movimiento` (
  `id_estado` int(11) NOT NULL,
  `descripcion_estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estado_movimiento`
--

INSERT INTO `tb_estado_movimiento` (`id_estado`, `descripcion_estado`) VALUES
(1, 'Activo'),
(2, 'Anulado'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_subvencion`
--

CREATE TABLE `tb_estado_subvencion` (
  `id_estado` int(11) NOT NULL,
  `descripcion_estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estado_subvencion`
--

INSERT INTO `tb_estado_subvencion` (`id_estado`, `descripcion_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_usuario`
--

CREATE TABLE `tb_estado_usuario` (
  `id_estado` int(11) NOT NULL,
  `descripcion_estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estado_usuario`
--

INSERT INTO `tb_estado_usuario` (`id_estado`, `descripcion_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_meses`
--

CREATE TABLE `tb_meses` (
  `numero_mes` int(11) NOT NULL,
  `nombre_mes` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_meses`
--

INSERT INTO `tb_meses` (`numero_mes`, `nombre_mes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_movimientos`
--

CREATE TABLE `tb_movimientos` (
  `id_movimiento` int(11) NOT NULL,
  `numero_certificado` bigint(20) DEFAULT NULL,
  `tipo_movimiento` int(11) NOT NULL,
  `tipo_gasto` int(11) DEFAULT NULL COMMENT '1: normal\n2: sueldo',
  `colegio` varchar(50) NOT NULL,
  `subvencion` int(11) NOT NULL,
  `cuenta_presupuesto` bigint(20) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `descripcion` text NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orden_compra` text,
  `monto` bigint(20) DEFAULT NULL,
  `sep_preferente` bigint(20) DEFAULT NULL,
  `sep_preferencial` bigint(20) DEFAULT NULL,
  `sep_concentracion` bigint(20) DEFAULT NULL,
  `sep_articulo_19` bigint(20) DEFAULT NULL,
  `sep_ajustes` bigint(20) DEFAULT NULL,
  `sep_total` bigint(20) DEFAULT NULL,
  `scvtf_normal` bigint(20) DEFAULT NULL,
  `scvtf_nivelacion` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_movimientos`
--

INSERT INTO `tb_movimientos` (`id_movimiento`, `numero_certificado`, `tipo_movimiento`, `tipo_gasto`, `colegio`, `subvencion`, `cuenta_presupuesto`, `estado`, `descripcion`, `fecha_ingreso`, `orden_compra`, `monto`, `sep_preferente`, `sep_preferencial`, `sep_concentracion`, `sep_articulo_19`, `sep_ajustes`, `sep_total`, `scvtf_normal`, `scvtf_nivelacion`) VALUES
(1, 1, 2, 1, '4405', 3, 2152201001, 1, 'colaciones viaje 17-12-19', '2019-09-16 05:00:00', '3604-2-cm19', 200000, 0, 0, 0, 0, 0, NULL, 0, 0),
(2, 2, 2, 1, '4405', 3, 2152201001, 1, 'DESCUENTO 10% ADMINISTRACION CENTRAL', '2019-09-16 05:00:00', '3604-2-cm19', 20000, 0, 0, 0, 0, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_subvenciones`
--

CREATE TABLE `tb_subvenciones` (
  `id_subvencion` int(11) NOT NULL,
  `subvencion` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_subvenciones`
--

INSERT INTO `tb_subvenciones` (`id_subvencion`, `subvencion`, `estado`) VALUES
(1, 'REGULAR', 1),
(2, 'PIE', 1),
(3, 'SEP', 1),
(4, 'PRO-RETENCION', 1),
(5, 'SC-VTF', 1),
(6, 'MANTENIMIENTO', 1),
(7, 'FAEP 2017', 1),
(8, 'FAEP 2018', 1),
(9, 'FAEP 2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_establecimiento`
--

CREATE TABLE `tb_tipo_establecimiento` (
  `id_tipo_establecimiento` int(11) NOT NULL,
  `descripcion_tipo_establecimiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_tipo_establecimiento`
--

INSERT INTO `tb_tipo_establecimiento` (`id_tipo_establecimiento`, `descripcion_tipo_establecimiento`) VALUES
(1, 'EDUCACION'),
(2, 'JUNJI VTF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_gasto`
--

CREATE TABLE `tb_tipo_gasto` (
  `id_tipo_gasto` int(11) NOT NULL,
  `descripcion_tipo_gasto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_tipo_gasto`
--

INSERT INTO `tb_tipo_gasto` (`id_tipo_gasto`, `descripcion_tipo_gasto`) VALUES
(1, 'Bienes y Servicios'),
(2, 'Sueldo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_movimiento`
--

CREATE TABLE `tb_tipo_movimiento` (
  `id_tipo_movimiento` int(11) NOT NULL,
  `descripcion_tipo_movimiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_tipo_movimiento`
--

INSERT INTO `tb_tipo_movimiento` (`id_tipo_movimiento`, `descripcion_tipo_movimiento`) VALUES
(1, 'INGRESO'),
(2, 'GASTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_usuario`
--

CREATE TABLE `tb_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion_tipo_usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_tipo_usuario`
--

INSERT INTO `tb_tipo_usuario` (`id_tipo_usuario`, `descripcion_tipo_usuario`) VALUES
(1, 'Registrar; Informes; Configurar;'),
(2, 'Registrar; Informes;'),
(3, 'Registrar;'),
(4, 'Informes;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `rut` int(11) NOT NULL,
  `digito_verificador` varchar(1) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `clave` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `tipo_usuario` int(11) NOT NULL DEFAULT '2',
  `correo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`rut`, `digito_verificador`, `nombre`, `clave`, `estado`, `tipo_usuario`, `correo`) VALUES
(14067700, '0', 'David Riquelme', '$2y$10$/FKtMbej9wjBpj236rPSMO5NOoYY2nLuN5zFCo5L8lbhdbp.fNspq', 1, 4, '.'),
(16166595, '9', 'Fabian Silva', '$2y$10$/Ph9/m/FLj/ugnXlc0DXRexAHzrRHhQoVlrE3H87/ccxDyAROrx8y', 1, 1, '.'),
(17076879, '5', 'PEDRO QUEZADA RIQUELME ', '$2y$10$ToTJmCP.3r3IgjwJZ.uM5uRMDyGz/Pkb/zkZamc0.Sxg71edk.HCy', 1, 1, 'PEDRO.QUEZADA@DAEMMULCHEN.CL'),
(18273352, '0', 'Billy John Salazar Rios', '$2y$10$NFDUIty4zeJmTRxFM/vZYO0TLOTJXCWhxWSbhCPlGZIHsuiFtgeMG', 1, 1, 'billy.salazar1992@gmail.com');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_movimientos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_movimientos` (
`id_movimiento` int(11)
,`descripcion` text
,`fecha_ingreso` timestamp
,`orden_compra` text
,`numero_certificado` bigint(20)
,`sep_preferente` bigint(20)
,`sep_preferencial` bigint(20)
,`sep_concentracion` bigint(20)
,`sep_articulo_19` bigint(20)
,`sep_ajustes` bigint(20)
,`sep_total` bigint(20)
,`monto` bigint(20)
,`id_tipo_movimiento` int(11)
,`tipo_gasto` int(11)
,`descripcion_tipo_movimiento` varchar(45)
,`rbd_colegio` varchar(50)
,`nombre_colegio` varchar(45)
,`id_subvencion` int(11)
,`subvencion` varchar(45)
,`numero_cuenta` bigint(20)
,`nombre_cuenta` varchar(255)
,`id_estado` int(11)
,`descripcion_estado` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_usuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_usuario` (
`rut` int(11)
,`digito_verificador` varchar(1)
,`nombre` varchar(250)
,`clave` text
,`estado` int(11)
,`descripcion_estado` varchar(45)
,`tipo_usuario` int(11)
,`descripcion_tipo_usuario` varchar(45)
,`correo` varchar(250)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_movimientos`
--
DROP TABLE IF EXISTS `vista_movimientos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`daemmulc`@`%` SQL SECURITY DEFINER VIEW `vista_movimientos`  AS  select `m`.`id_movimiento` AS `id_movimiento`,`m`.`descripcion` AS `descripcion`,`m`.`fecha_ingreso` AS `fecha_ingreso`,`m`.`orden_compra` AS `orden_compra`,`m`.`numero_certificado` AS `numero_certificado`,`m`.`sep_preferente` AS `sep_preferente`,`m`.`sep_preferencial` AS `sep_preferencial`,`m`.`sep_concentracion` AS `sep_concentracion`,`m`.`sep_articulo_19` AS `sep_articulo_19`,`m`.`sep_ajustes` AS `sep_ajustes`,`m`.`sep_total` AS `sep_total`,`m`.`monto` AS `monto`,`tm`.`id_tipo_movimiento` AS `id_tipo_movimiento`,`m`.`tipo_gasto` AS `tipo_gasto`,`tm`.`descripcion_tipo_movimiento` AS `descripcion_tipo_movimiento`,`c`.`rbd_colegio` AS `rbd_colegio`,`c`.`nombre_colegio` AS `nombre_colegio`,`s`.`id_subvencion` AS `id_subvencion`,`s`.`subvencion` AS `subvencion`,`cp`.`numero_cuenta` AS `numero_cuenta`,`cp`.`nombre_cuenta` AS `nombre_cuenta`,`e`.`id_estado` AS `id_estado`,`e`.`descripcion_estado` AS `descripcion_estado` from (((((`tb_movimientos` `m` join `tb_tipo_movimiento` `tm` on((`m`.`tipo_movimiento` = `tm`.`id_tipo_movimiento`))) join `tb_colegios` `c` on((`m`.`colegio` = `c`.`rbd_colegio`))) join `tb_subvenciones` `s` on((`m`.`subvencion` = `s`.`id_subvencion`))) join `tb_cuentas_presupuesto` `cp` on((`m`.`cuenta_presupuesto` = `cp`.`numero_cuenta`))) join `tb_estado_movimiento` `e` on((`m`.`estado` = `e`.`id_estado`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_usuario`
--
DROP TABLE IF EXISTS `vista_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`daemmulc`@`%` SQL SECURITY DEFINER VIEW `vista_usuario`  AS  select `u`.`rut` AS `rut`,`u`.`digito_verificador` AS `digito_verificador`,`u`.`nombre` AS `nombre`,`u`.`clave` AS `clave`,`u`.`estado` AS `estado`,`eu`.`descripcion_estado` AS `descripcion_estado`,`u`.`tipo_usuario` AS `tipo_usuario`,`tu`.`descripcion_tipo_usuario` AS `descripcion_tipo_usuario`,`u`.`correo` AS `correo` from ((`tb_usuarios` `u` join `tb_estado_usuario` `eu` on((`u`.`estado` = `eu`.`id_estado`))) join `tb_tipo_usuario` `tu` on((`u`.`tipo_usuario` = `tu`.`id_tipo_usuario`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_actividad`
--
ALTER TABLE `tb_actividad`
  ADD PRIMARY KEY (`id_accion`),
  ADD KEY `fk_actividad_movimiento_idx` (`id_movimiento`),
  ADD KEY `fk_usuario_actividad_log_idx` (`rut_usuario`);

--
-- Indices de la tabla `tb_colegios`
--
ALTER TABLE `tb_colegios`
  ADD PRIMARY KEY (`rbd_colegio`),
  ADD KEY `fk_estado_colegio_idx` (`estado`);

--
-- Indices de la tabla `tb_cuentas_presupuesto`
--
ALTER TABLE `tb_cuentas_presupuesto`
  ADD PRIMARY KEY (`numero_cuenta`),
  ADD KEY `fk_estado_cuenta_idx` (`estado`);

--
-- Indices de la tabla `tb_estado_colegio`
--
ALTER TABLE `tb_estado_colegio`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tb_estado_cuenta`
--
ALTER TABLE `tb_estado_cuenta`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tb_estado_movimiento`
--
ALTER TABLE `tb_estado_movimiento`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tb_estado_subvencion`
--
ALTER TABLE `tb_estado_subvencion`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tb_meses`
--
ALTER TABLE `tb_meses`
  ADD PRIMARY KEY (`numero_mes`);

--
-- Indices de la tabla `tb_movimientos`
--
ALTER TABLE `tb_movimientos`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `fk_tipo_movimiento_movimiento_idx` (`tipo_movimiento`),
  ADD KEY `fk_subvencion_movimiento_idx` (`subvencion`),
  ADD KEY `fk_estado_movimiento_idx` (`estado`),
  ADD KEY `fk_cuenta_presupuesto_movimiento_idx` (`cuenta_presupuesto`),
  ADD KEY `fk_colegio_movimiento_idx` (`colegio`),
  ADD KEY `fk_tipo_gasto_movimiento_idx` (`tipo_gasto`);

--
-- Indices de la tabla `tb_subvenciones`
--
ALTER TABLE `tb_subvenciones`
  ADD PRIMARY KEY (`id_subvencion`),
  ADD KEY `fk_estado_subvencion_idx` (`estado`);

--
-- Indices de la tabla `tb_tipo_establecimiento`
--
ALTER TABLE `tb_tipo_establecimiento`
  ADD PRIMARY KEY (`id_tipo_establecimiento`);

--
-- Indices de la tabla `tb_tipo_gasto`
--
ALTER TABLE `tb_tipo_gasto`
  ADD PRIMARY KEY (`id_tipo_gasto`);

--
-- Indices de la tabla `tb_tipo_movimiento`
--
ALTER TABLE `tb_tipo_movimiento`
  ADD PRIMARY KEY (`id_tipo_movimiento`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_actividad`
--
ALTER TABLE `tb_actividad`
  MODIFY `id_accion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_cuentas_presupuesto`
--
ALTER TABLE `tb_cuentas_presupuesto`
  MODIFY `numero_cuenta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2152101001002;
--
-- AUTO_INCREMENT de la tabla `tb_estado_colegio`
--
ALTER TABLE `tb_estado_colegio`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_estado_cuenta`
--
ALTER TABLE `tb_estado_cuenta`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_estado_movimiento`
--
ALTER TABLE `tb_estado_movimiento`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_estado_subvencion`
--
ALTER TABLE `tb_estado_subvencion`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_movimientos`
--
ALTER TABLE `tb_movimientos`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_subvenciones`
--
ALTER TABLE `tb_subvenciones`
  MODIFY `id_subvencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tb_tipo_gasto`
--
ALTER TABLE `tb_tipo_gasto`
  MODIFY `id_tipo_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_tipo_movimiento`
--
ALTER TABLE `tb_tipo_movimiento`
  MODIFY `id_tipo_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_actividad`
--
ALTER TABLE `tb_actividad`
  ADD CONSTRAINT `fk_actividad_movimiento` FOREIGN KEY (`id_movimiento`) REFERENCES `tb_movimientos` (`id_movimiento`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_actividad_log` FOREIGN KEY (`rut_usuario`) REFERENCES `tb_usuarios` (`rut`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_colegios`
--
ALTER TABLE `tb_colegios`
  ADD CONSTRAINT `fk_estado_colegio` FOREIGN KEY (`estado`) REFERENCES `tb_estado_colegio` (`id_estado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_cuentas_presupuesto`
--
ALTER TABLE `tb_cuentas_presupuesto`
  ADD CONSTRAINT `fk_estado_cuenta` FOREIGN KEY (`estado`) REFERENCES `tb_estado_cuenta` (`id_estado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_movimientos`
--
ALTER TABLE `tb_movimientos`
  ADD CONSTRAINT `fk_colegio_movimiento` FOREIGN KEY (`colegio`) REFERENCES `tb_colegios` (`rbd_colegio`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_presupuesto_movimiento` FOREIGN KEY (`cuenta_presupuesto`) REFERENCES `tb_cuentas_presupuesto` (`numero_cuenta`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estado_movimiento` FOREIGN KEY (`estado`) REFERENCES `tb_estado_movimiento` (`id_estado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subvencion_movimiento` FOREIGN KEY (`subvencion`) REFERENCES `tb_subvenciones` (`id_subvencion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_gasto_movimiento` FOREIGN KEY (`tipo_gasto`) REFERENCES `tb_tipo_gasto` (`id_tipo_gasto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_movimiento_movimiento` FOREIGN KEY (`tipo_movimiento`) REFERENCES `tb_tipo_movimiento` (`id_tipo_movimiento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_subvenciones`
--
ALTER TABLE `tb_subvenciones`
  ADD CONSTRAINT `fk_estado_subvencion` FOREIGN KEY (`estado`) REFERENCES `tb_estado_subvencion` (`id_estado`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
