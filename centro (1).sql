-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 00:38:11
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
-- Base de datos: `centro`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actu_evento` (IN `id` INT, IN `nombre` VARCHAR(30), IN `fecha_horaE` DATETIME, IN `fecha_horaS` DATETIME, IN `costo` DECIMAL(7,2), IN `capacidad` INT)   BEGIN
start transaction;
UPDATE evento
set evento.nombre=nombre,
evento.fecha_horaE=fecha_horaE,
evento.fecha_horaS=fecha_horaS,
evento.costo=costo,
evento.capacidad=capacidad
where evento.id=id;
commit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actu_persona` (IN `id` INT, IN `nombre` VARCHAR(45), IN `apellidoP` VARCHAR(45), IN `apellidoM` VARCHAR(45), IN `direccion` VARCHAR(150), IN `telefono` CHAR(11), IN `correo` VARCHAR(45))   BEGIN
start transaction;
UPDATE persona
set persona.nombre=nombre,
persona.apellidoP=apellidoP,
persona.apellidoM=apellidoM,
persona.direccion=direccion,
persona.telefono=telefono,
persona.correo=correo
where persona.id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alta_evento` (IN `id_cliente` INT, IN `id_persona` INT, IN `nombre` VARCHAR(30), IN `fecha_horaE` DATETIME, IN `fecha_horaS` DATETIME, IN `costo` DECIMAL(7,2), IN `capacidad` INT)   begin 
start transaction;
insert into cliente(id,id_persona)
values (id_cliente,id_persona);
insert into evento 
values (null,id_cliente,nombre,fecha_horaE,fecha_horaS,costo,capacidad);
commit;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alta_persona` (IN `nombre` VARCHAR(45), IN `apellidoP` VARCHAR(45), IN `apellidoM` VARCHAR(45), IN `direccion` VARCHAR(150), IN `telefono` CHAR(11), IN `correo` VARCHAR(45), IN `id_persona` INT, IN `user_name` VARCHAR(50), IN `contrasenia` BLOB, IN `rol` ENUM('1','2'))   BEGIN
start transaction;
INSERT INTO persona
VALUES (id,nombre,apellidoP,apellidoM,direccion,telefono,correo);
INSERT INTO usuario (id_persona,user_name,contrasenia,rol)
values (id_persona,user_name,aes_encrypt(contrasenia, "hunter2"),rol);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alta_personaUsu` (IN `nombre` VARCHAR(45), IN `apellidoP` VARCHAR(45), IN `apellidoM` VARCHAR(45), IN `direccion` VARCHAR(150), IN `telefono` CHAR(11), IN `correo` VARCHAR(45), IN `id_persona` INT, IN `user_name` VARCHAR(50), IN `contrasenia` BLOB, IN `rol` ENUM('1','2'))   BEGIN
start transaction;
INSERT INTO persona
VALUES (id,nombre,apellidoP,apellidoM,direccion,telefono,correo);
INSERT INTO usuario (id_persona,user_name,contrasenia,rol)
values (id_persona,user_name,aes_encrypt(contrasenia, "hunter2"),rol);
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar` (IN `id_P` INT)   begin
start transaction; 
delete from persona
where id = (id_P);
COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajon`
--

CREATE TABLE `cajon` (
  `id` int(11) NOT NULL,
  `estado` enum('libre','ocupado','apartado') NOT NULL,
  `hora_entrada` datetime DEFAULT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cajon`
--

INSERT INTO `cajon` (`id`, `estado`, `hora_entrada`, `hora_salida`, `id_cliente`) VALUES
(2, 'ocupado', '2023-11-08 12:30:00', NULL, 1),
(3, 'libre', '2023-11-17 01:30:00', '2023-11-19 12:00:00', 20),
(4, 'ocupado', '2023-11-28 12:00:00', '2023-11-29 12:00:00', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `id_persona`) VALUES
(20, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha_horaE` datetime DEFAULT NULL,
  `fecha_horaS` datetime DEFAULT NULL,
  `costo` decimal(7,2) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `id_cliente`, `nombre`, `fecha_horaE`, `fecha_horaS`, `costo`, `capacidad`) VALUES
(14, 20, 'FC Barcelona', '2023-11-14 12:00:00', '2023-11-16 12:00:00', '1.00', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialautos`
--

CREATE TABLE `historialautos` (
  `id` int(11) NOT NULL,
  `id_cajon` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `hora_entrada` datetime NOT NULL,
  `hora_salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mostrar_clientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `mostrar_clientes` (
`ID cliente` int(11)
,`ID persona` int(11)
,`Nombre` varchar(50)
,`Apellido Paterno` varchar(50)
,`Apellido Materno` varchar(50)
,`Telefono` char(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mostrar_evento`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `mostrar_evento` (
`ID Cliente` int(11)
,`Nombre de el Evento` varchar(30)
,`Hora de entrada y Fecha` datetime
,`Hora de Salida y Fecha` datetime
,`Costo de el Evento` decimal(7,2)
,`Capacidad Maxima` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `mostrar_per_usu`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `mostrar_per_usu` (
`Nombre` varchar(50)
,`Apellido Paterno` varchar(50)
,`Apellido Materno` varchar(50)
,`User Name` varchar(50)
,`ID Persona` int(11)
,`ID Usuario` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` char(11) NOT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellidoP`, `apellidoM`, `direccion`, `telefono`, `correo`) VALUES
(17, 'Carlos', 'Romero', 'Flores', '12', '1234', '12345@.com  '),
(18, 'Levith', 'Martinez', 'Diaz', '12', '1234', '1234@.com'),
(19, 'Gustavo', 'Garay', 'Gama', '12', '1234', '123@.com'),
(20, 'Diego', 'Ramirez', 'Tome', '12', '1234', 'diegoramireztome@gmail.com'),
(21, 'Angel', 'Carro', 'Miranda', '12', '1234', '1@.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `contrasenia` blob NOT NULL,
  `rol` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_persona`, `user_name`, `contrasenia`, `rol`) VALUES
(1, 17, '8CHARLY8', 0x38436861726c79382e, '1'),
(2, 18, 'TheDixuzRT', 0x6b69766130383039, '1'),
(3, 19, 'Aplixoco', 0x72756e72756e, '1'),
(4, 20, 'WayCry', 0x636869717569746f6d65646173, '1');

-- --------------------------------------------------------

--
-- Estructura para la vista `mostrar_clientes`
--
DROP TABLE IF EXISTS `mostrar_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostrar_clientes`  AS SELECT `cliente`.`id` AS `ID cliente`, `persona`.`id` AS `ID persona`, `persona`.`nombre` AS `Nombre`, `persona`.`apellidoP` AS `Apellido Paterno`, `persona`.`apellidoM` AS `Apellido Materno`, `persona`.`telefono` AS `Telefono` FROM (`cliente` join `persona` on(`cliente`.`id_persona` = `persona`.`id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `mostrar_evento`
--
DROP TABLE IF EXISTS `mostrar_evento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostrar_evento`  AS SELECT `cliente`.`id` AS `ID Cliente`, `evento`.`nombre` AS `Nombre de el Evento`, `evento`.`fecha_horaE` AS `Hora de entrada y Fecha`, `evento`.`fecha_horaS` AS `Hora de Salida y Fecha`, `evento`.`costo` AS `Costo de el Evento`, `evento`.`capacidad` AS `Capacidad Maxima` FROM (`cliente` left join `evento` on(`evento`.`id_cliente` = `cliente`.`id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `mostrar_per_usu`
--
DROP TABLE IF EXISTS `mostrar_per_usu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostrar_per_usu`  AS SELECT `persona`.`nombre` AS `Nombre`, `persona`.`apellidoP` AS `Apellido Paterno`, `persona`.`nombre` AS `Apellido Materno`, `usuario`.`user_name` AS `User Name`, `persona`.`id` AS `ID Persona`, `usuario`.`id` AS `ID Usuario` FROM (`persona` join `usuario` on(`persona`.`id` = `usuario`.`id_persona`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajon`
--
ALTER TABLE `cajon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_ibfk_1` (`id_persona`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`,`fecha_horaE`),
  ADD KEY `evento_ibfk_1` (`id_cliente`);

--
-- Indices de la tabla `historialautos`
--
ALTER TABLE `historialautos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`,`apellidoP`,`apellidoM`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_ibfk_1` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajon`
--
ALTER TABLE `cajon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `historialautos`
--
ALTER TABLE `historialautos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
