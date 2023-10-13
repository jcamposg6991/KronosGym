-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-08-2023 a las 23:31:27
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jcdesarr_kronosgym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ejercicios`
--

CREATE TABLE `Ejercicios` (
  `Id_Ejercicio` int(2) NOT NULL,
  `Nombre_Ejercicio` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Id_Zona` int(2) NOT NULL,
  `Id_Musculo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Ejercicios`
--

INSERT INTO `Ejercicios` (`Id_Ejercicio`, `Nombre_Ejercicio`, `Descripcion`, `Id_Zona`, `Id_Musculo`) VALUES
(1, 'Curl con Mancuerna ', 'Para hacer un Curl con mancuernas correctamente, empieza sosteniendo una mancuerna en cada mano, los brazos extendidos y las palmas mirando hacia adelante. Levanta una mancuerna hacia el hombro, flexionando únicamente el codo. Baja lentamente la mancuerna a la posición inicial y repite con el otro brazo.', 2, 6),
(2, 'Largartijas', 'Tu cuerpo debe formar una línea recta, con las piernas completamente extendidas detrás de ti y las caderas, rodillas y tobillos alineados. Manteniendo el cuerpo rígido en línea recta, con la cara hacia el suelo, baja hacia el suelo y detente justo antes de que tu nariz toque el suelo.', 3, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mediciones`
--

CREATE TABLE `Mediciones` (
  `Id_Medicion_Unico` int(20) NOT NULL,
  `Id_Medicion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Estatura_cm` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `Peso_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `MME_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `MGC_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `IMC_kg_m2` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `PGC_Por` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `MMS_BD_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `MMS_BI_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `MMS_PD_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `MMS_PI_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `MMS_TOR_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `GS_BD_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `GS_BI_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `GS_PD_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `GS_PI_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `GS_TOR_kg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Mediciones`
--

INSERT INTO `Mediciones` (`Id_Medicion_Unico`, `Id_Medicion`, `Estatura_cm`, `Peso_kg`, `MME_kg`, `MGC_kg`, `IMC_kg_m2`, `PGC_Por`, `MMS_BD_kg`, `MMS_BI_kg`, `MMS_PD_kg`, `MMS_PI_kg`, `MMS_TOR_kg`, `GS_BD_kg`, `GS_BI_kg`, `GS_PD_kg`, `GS_PI_kg`, `GS_TOR_kg`, `Fecha`, `Id_Usuario`) VALUES
(2, '49676465beb1482f9548', '1,51', '57', '15', '87', '18', '15', '20', '84', '84', '95', '48', '7', '8', '7', '8', '9', '2023-08-06', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Musculos`
--

CREATE TABLE `Musculos` (
  `Id_Musculo` int(2) NOT NULL,
  `Nombre_Musculo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Musculos`
--

INSERT INTO `Musculos` (`Id_Musculo`, `Nombre_Musculo`) VALUES
(1, 'Supinador largo'),
(2, 'Supinador largo'),
(3, 'Pronador redondo'),
(4, 'Braquial'),
(5, 'Tríceps '),
(6, 'Bíceps '),
(7, 'Deltoide anterior'),
(8, 'Deltoide medio'),
(9, 'Deltoide Frontal'),
(10, 'Cuádriceps'),
(11, 'Isquiotibiales'),
(12, 'Glúteos'),
(13, 'Tríceps sural'),
(14, 'aductores'),
(15, 'abductores'),
(16, 'Pectoral mayor'),
(17, 'Pectoral menor'),
(18, 'Serrato anterior'),
(19, 'Trapecio'),
(20, 'Dorsal ancho'),
(21, 'Romboides'),
(22, 'Recto abdominal'),
(23, 'Oblicuos'),
(24, 'Piramidal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perfiles`
--

CREATE TABLE `Perfiles` (
  `Id_Perfil` int(1) NOT NULL,
  `Tipo_Perfil` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Perfiles`
--

INSERT INTO `Perfiles` (`Id_Perfil`, `Tipo_Perfil`) VALUES
(1, 'Administrador'),
(2, 'Asistente'),
(3, 'Entrenador'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedores`
--

CREATE TABLE `Proveedores` (
  `Id_Proveedor` int(4) NOT NULL,
  `Nombre_Proveedor` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` int(8) NOT NULL,
  `Correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Ultimo_Cambio` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Proveedores`
--

INSERT INTO `Proveedores` (`Id_Proveedor`, `Nombre_Proveedor`, `Cedula`, `Telefono`, `Correo`, `Direccion`, `Ultimo_Cambio`) VALUES
(1, 'Acueductos y Alcantarillados', '400004213804', 22425124, 'servicioalcliente@aya.go.cr', 'Diagonal al Cuerpo de Bomberos, Rohrmoser, Pavas.', 'asis'),
(3, 'Compañia Nacional de Fuerza y Luz', '310100004636', 22955000, 'succen@cnfl.go.cr', 'Av. 1 21, La California, San José, 10101.', ''),
(5, 'Jiménez y Tanzi', '3101006463', 40521110, 'informacion@gs1cr.com', 'Oficinas Centrales Av. 5 y 7 San José ,San José Costa Rica', 'asis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rutinas`
--

CREATE TABLE `Rutinas` (
  `Id_Rutina_Unico` int(20) NOT NULL,
  `Id_Rutina` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_Ejercicio_Rutina` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion_Ejercicio_Rutina` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Categoria` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Series` int(3) NOT NULL,
  `Repeticiones` int(3) NOT NULL,
  `Fecha_Rutina` date NOT NULL,
  `Id_Usuario` int(4) NOT NULL,
  `Id_Ejercicio` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Rutinas`
--

INSERT INTO `Rutinas` (`Id_Rutina_Unico`, `Id_Rutina`, `Nombre_Ejercicio_Rutina`, `Descripcion_Ejercicio_Rutina`, `Categoria`, `Series`, `Repeticiones`, `Fecha_Rutina`, `Id_Usuario`, `Id_Ejercicio`) VALUES
(16, '251a1bd6765152e86f23', 'Curl con Mancuerna', 'Para hacer un Curl con mancuernas correctamente, empieza sosteniendo una mancuerna en cada mano, los brazos extendidos y las palmas mirando hacia adelante. Levanta una mancuerna hacia el hombro, flexionando únicamente el codo. Baja lentamente la mancuerna a la posición inicial y repite con el otro brazo.', 'Brazos', 4, 4, '2023-08-05', 21, 1),
(17, '251a1bd6765152e86f23', 'Largartijas', 'Tu cuerpo debe formar una línea recta, con las piernas completamente extendidas detrás de ti y las caderas, rodillas y tobillos alineados. Manteniendo el cuerpo rígido en línea recta, con la cara hacia el suelo, baja hacia el suelo y detente justo antes de que tu nariz toque el suelo.', 'Pecho', 5, 10, '2023-08-05', 21, 2),
(18, 'cb80c11a00a0dd54af0c', 'Curl con Mancuerna', 'Para hacer un Curl con mancuernas correctamente, empieza sosteniendo una mancuerna en cada mano, los brazos extendidos y las palmas mirando hacia adelante. Levanta una mancuerna hacia el hombro, flexionando únicamente el codo. Baja lentamente la mancuerna a la posición inicial y repite con el otro brazo.', 'Brazos', 1, 3, '2023-08-06', 21, 1),
(19, 'cb80c11a00a0dd54af0c', 'Largartijas', 'Tu cuerpo debe formar una línea recta, con las piernas completamente extendidas detrás de ti y las caderas, rodillas y tobillos alineados. Manteniendo el cuerpo rígido en línea recta, con la cara hacia el suelo, baja hacia el suelo y detente justo antes de que tu nariz toque el suelo.', 'Pecho', 222, 222, '2023-08-06', 21, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sedes`
--

CREATE TABLE `Sedes` (
  `Id_Sede` int(1) NOT NULL,
  `Nombre_Sede` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Sedes`
--

INSERT INTO `Sedes` (`Id_Sede`, `Nombre_Sede`) VALUES
(1, 'Guayabo'),
(2, 'Puriscal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Transacciones`
--

CREATE TABLE `Transacciones` (
  `Id_Transaccion` int(10) NOT NULL,
  `Factura_Comprobante` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario_Proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Metodo_Pago` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_Transaccion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `Fecha_Transaccion` date NOT NULL,
  `Ultimo_Cambio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Usuario` int(4) DEFAULT NULL,
  `Id_Proveedor` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Transacciones`
--

INSERT INTO `Transacciones` (`Id_Transaccion`, `Factura_Comprobante`, `Usuario_Proveedor`, `Concepto`, `Metodo_Pago`, `Tipo_Transaccion`, `Monto`, `Fecha_Transaccion`, `Ultimo_Cambio`, `Id_Usuario`, `Id_Proveedor`) VALUES
(2, '23524t43t5', 'Ariana Naranjo Vasquez', 'Mensualidad mes de Julio', 'Efectivo', 'Ingreso', '15000.00', '2023-07-08', 'admin', 21, NULL),
(6, 'sdgdgfgd', 'Acueductos y Alcantarillados', 'dfgddfg', 'Efectivo', 'Egreso', '-700.00', '2023-08-08', 'admin', NULL, 1),
(8, '345354', 'Ariana Naranjo Vasquez', 'terterg', 'Transferencia', 'Ingreso', '498494.00', '2023-08-03', 'asis', 21, NULL),
(9, 'ghdfg', 'Jiménez y Tanzi', 'dhfhdfh', 'SinpeMovil', 'Egreso', '-8494.00', '2023-07-31', 'asis', NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `Id_Usuario` int(4) NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido1` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido2` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Edad` int(2) NOT NULL,
  `Telefono` int(8) NOT NULL,
  `Correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Contrasena` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Palabra_Clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Id_Perfil` int(1) NOT NULL,
  `Id_Sede` int(1) NOT NULL,
  `Activo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Ultimo_Cambio` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`Id_Usuario`, `Nombre`, `Apellido1`, `Apellido2`, `Edad`, `Telefono`, `Correo`, `Usuario`, `Contrasena`, `Palabra_Clave`, `Fecha_Nacimiento`, `Fecha_Ingreso`, `Id_Perfil`, `Id_Sede`, `Activo`, `Ultimo_Cambio`) VALUES
(17, 'Jordan', 'Campos', 'Garro', 31, 72718761, 'jonas6991@hotmail.com', 'admin', '1', 'pitulila', '1991-09-06', '2023-08-02', 1, 2, 'Si', ''),
(19, 'asis', 'asis', 'asis', 25, 15975319, 'asis@hotmail.com', 'asis', '2', '', '1993-09-08', '2022-09-08', 2, 1, 'Si', ''),
(20, 'Freddy', 'Personal', 'Trainer', 25, 15975319, 'ent@hotmail.com', 'ent', '3', '', '1993-09-08', '2022-09-08', 3, 2, 'Si', ''),
(21, 'Ariana', 'Naranjo', 'Vasquez', 25, 72010574, 'nana-04-10@hotmail.com', 'cli', '4', 'pitu', '1993-09-08', '2022-09-08', 4, 2, 'Si', ''),
(33, 'qqqq', 'qqqq', 'qqqq', 25, 40521110, '1@gmail.com', 'q', '1234', 'kronos', '1993-09-08', '2022-09-08', 4, 1, 'Si', ''),
(34, 'a', 'a', 'a', 25, 40521110, 'nana-04-10@hotmail.com', 'a', '1234', 'kronos', '1993-09-08', '2022-09-08', 1, 2, 'No', 'admin'),
(35, 'w', 'w', 'w', 25, 72010574, 'asis@hotmail.com', 'w', '1234', 'kronos', '1993-09-08', '2022-09-08', 4, 2, 'Si', ''),
(36, 'z', 'z', 'z', 25, 72010574, 'ent@hotmail.com', 'z', '1234', 'kronos', '2023-08-08', '2023-08-22', 3, 2, 'Si', ''),
(39, 'r', 'r', 'r', 25, 15975319, 'asis@hotmail.com', 'r', '1234', 'kronos', '2023-08-01', '2023-08-17', 4, 1, 'Si', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Zonas_Cuerpo`
--

CREATE TABLE `Zonas_Cuerpo` (
  `Id_Zona` int(2) NOT NULL,
  `Nombre_Zona` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Zonas_Cuerpo`
--

INSERT INTO `Zonas_Cuerpo` (`Id_Zona`, `Nombre_Zona`) VALUES
(1, 'Piernas'),
(2, 'Brazos'),
(3, 'Pecho'),
(4, 'Espalda'),
(5, 'Abdomen');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Ejercicios`
--
ALTER TABLE `Ejercicios`
  ADD PRIMARY KEY (`Id_Ejercicio`),
  ADD KEY `Id_Zona` (`Id_Zona`),
  ADD KEY `Id_Musculo` (`Id_Musculo`);

--
-- Indices de la tabla `Mediciones`
--
ALTER TABLE `Mediciones`
  ADD PRIMARY KEY (`Id_Medicion_Unico`),
  ADD KEY `Id_Cliente` (`Id_Usuario`);

--
-- Indices de la tabla `Musculos`
--
ALTER TABLE `Musculos`
  ADD PRIMARY KEY (`Id_Musculo`);

--
-- Indices de la tabla `Perfiles`
--
ALTER TABLE `Perfiles`
  ADD PRIMARY KEY (`Id_Perfil`);

--
-- Indices de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  ADD PRIMARY KEY (`Id_Proveedor`);

--
-- Indices de la tabla `Rutinas`
--
ALTER TABLE `Rutinas`
  ADD PRIMARY KEY (`Id_Rutina_Unico`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Ejercicio` (`Id_Ejercicio`);

--
-- Indices de la tabla `Sedes`
--
ALTER TABLE `Sedes`
  ADD PRIMARY KEY (`Id_Sede`);

--
-- Indices de la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  ADD PRIMARY KEY (`Id_Transaccion`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Proveedor` (`Id_Proveedor`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `Id_Perfil` (`Id_Perfil`),
  ADD KEY `Id_Sede` (`Id_Sede`);

--
-- Indices de la tabla `Zonas_Cuerpo`
--
ALTER TABLE `Zonas_Cuerpo`
  ADD PRIMARY KEY (`Id_Zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Ejercicios`
--
ALTER TABLE `Ejercicios`
  MODIFY `Id_Ejercicio` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Mediciones`
--
ALTER TABLE `Mediciones`
  MODIFY `Id_Medicion_Unico` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Musculos`
--
ALTER TABLE `Musculos`
  MODIFY `Id_Musculo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `Perfiles`
--
ALTER TABLE `Perfiles`
  MODIFY `Id_Perfil` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `Id_Proveedor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Rutinas`
--
ALTER TABLE `Rutinas`
  MODIFY `Id_Rutina_Unico` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `Sedes`
--
ALTER TABLE `Sedes`
  MODIFY `Id_Sede` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  MODIFY `Id_Transaccion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `Id_Usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `Zonas_Cuerpo`
--
ALTER TABLE `Zonas_Cuerpo`
  MODIFY `Id_Zona` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Ejercicios`
--
ALTER TABLE `Ejercicios`
  ADD CONSTRAINT `Ejercicios_ibfk_1` FOREIGN KEY (`Id_Zona`) REFERENCES `Zonas_Cuerpo` (`Id_Zona`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Ejercicios_ibfk_2` FOREIGN KEY (`Id_Musculo`) REFERENCES `Musculos` (`Id_Musculo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Mediciones`
--
ALTER TABLE `Mediciones`
  ADD CONSTRAINT `Mediciones_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `Usuarios` (`Id_Usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Rutinas`
--
ALTER TABLE `Rutinas`
  ADD CONSTRAINT `Rutinas_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `Usuarios` (`Id_Usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Rutinas_ibfk_2` FOREIGN KEY (`Id_Ejercicio`) REFERENCES `Ejercicios` (`Id_Ejercicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Transacciones`
--
ALTER TABLE `Transacciones`
  ADD CONSTRAINT `Transacciones_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `Usuarios` (`Id_Usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Transacciones_ibfk_2` FOREIGN KEY (`Id_Proveedor`) REFERENCES `Proveedores` (`Id_Proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`Id_Perfil`) REFERENCES `Perfiles` (`Id_Perfil`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Usuarios_ibfk_2` FOREIGN KEY (`Id_Sede`) REFERENCES `Sedes` (`Id_Sede`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
