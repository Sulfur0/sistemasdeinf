-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2018 a las 08:44:25
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemasdeinf`
--
CREATE DATABASE IF NOT EXISTS `sistemasdeinf` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistemasdeinf`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `carr_id` int(11) NOT NULL,
  `carr_nombre` varchar(100) NOT NULL,
  `carr_unid_cred` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`carr_id`, `carr_nombre`, `carr_unid_cred`, `fac_id`) VALUES
(2, 'Ingeniería de Sistemas', 200, 6),
(3, 'Farmacia', 150, 8),
(4, 'Primeros Auxilios', 50, 8),
(5, 'Ingeniería Electrónica', 200, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `dep_id` int(11) NOT NULL,
  `dep_nombre` varchar(100) NOT NULL,
  `fac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`dep_id`, `dep_nombre`, `fac_id`) VALUES
(2, 'Departamento de Control de Estudio', 6),
(3, 'Departamento de Profesores', 8),
(4, 'Departamento de Atención al Cliente', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `emp_id` int(11) NOT NULL,
  `emp_nombre` varchar(100) NOT NULL,
  `emp_rif` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`emp_id`, `emp_nombre`, `emp_rif`) VALUES
(1, 'stuff inc.', 'RJ45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `est_id` int(11) NOT NULL,
  `est_cedula` varchar(15) NOT NULL,
  `est_nombre` varchar(50) NOT NULL,
  `est_fec_nam` date NOT NULL,
  `est_direccion` varchar(255) NOT NULL,
  `est_email` varchar(100) NOT NULL,
  `est_curriculum` varchar(1000) NOT NULL,
  `car_id` int(11) NOT NULL,
  `est_semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`est_id`, `est_cedula`, `est_nombre`, `est_fec_nam`, `est_direccion`, `est_email`, `est_curriculum`, `car_id`, `est_semestre`) VALUES
(8, '123', 'asd', '2018-09-06', 'asdasdas', 'e@2.d', 'hzdghdgsad\r\nasdjsahdaj\r\nasdjshdjsadas\r\ndasdasdas\r\ndasdas\r\n', 2, 2),
(9, '1234', 'asdasd', '2018-09-03', 'asdasdas', 'e@2.d', 'ghghfhgfhgfhgfgfhg', 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `fac_id` int(11) NOT NULL,
  `fac_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`fac_id`, `fac_nombre`) VALUES
(6, 'Santiago Mariño'),
(8, 'Facultad de Farmacia de la ULA'),
(9, 'Facultad de Ingeniería de la ULA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscrito`
--

CREATE TABLE `inscrito` (
  `insc_id` int(11) NOT NULL,
  `llam_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `insc_fecha` date NOT NULL,
  `insc_contratado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscrito`
--

INSERT INTO `inscrito` (`insc_id`, `llam_id`, `est_id`, `insc_fecha`, `insc_contratado`) VALUES
(8, 3, 8, '2018-09-16', 1),
(9, 3, 9, '2018-09-16', 1),
(13, 4, 9, '2018-09-22', 0),
(14, 5, 8, '2018-09-07', 0),
(15, 5, 9, '2018-09-22', 0),
(16, 6, 8, '2018-09-22', 0),
(17, 6, 9, '2018-09-08', 1),
(18, 7, 8, '2018-09-08', 1),
(19, 7, 9, '2018-09-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamado`
--

CREATE TABLE `llamado` (
  `llam_id` int(11) NOT NULL,
  `llam_fec_inic` date NOT NULL,
  `llam_fec_lim` date NOT NULL,
  `llam_status` enum('pendiente','desierto','finalizado') NOT NULL,
  `llam_desierto` varchar(255) DEFAULT NULL,
  `ofer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `llamado`
--

INSERT INTO `llamado` (`llam_id`, `llam_fec_inic`, `llam_fec_lim`, `llam_status`, `llam_desierto`, `ofer_id`) VALUES
(3, '2018-09-14', '2018-09-21', 'finalizado', NULL, 2),
(4, '2018-09-22', '2018-09-30', 'desierto', 'mensaje de desierto', 11),
(5, '2018-09-03', '2018-09-26', 'desierto', 'hasdasdhasgdhas', 12),
(6, '2018-09-15', '2018-09-30', 'finalizado', NULL, 13),
(7, '2018-09-01', '2018-09-30', 'finalizado', NULL, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `ofer_id` int(11) NOT NULL,
  `ofer_destino` varchar(100) NOT NULL,
  `ofer_destino_dep` varchar(100) DEFAULT NULL,
  `ofer_descripcion` varchar(255) NOT NULL,
  `ofer_figurar` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`ofer_id`, `ofer_destino`, `ofer_destino_dep`, `ofer_descripcion`, `ofer_figurar`) VALUES
(2, 'Santiago Mariño', 'Departamento de Control de Estudio', 'Primera oferta de trabajo', 1),
(11, 'stuff inc.', NULL, 'Segunda oferta de trabajo', 1),
(12, 'Facultad de Ingeniería de la ULA', 'Departamento de Atención al Cliente', 'Segunda oferta de trabajo de Facultad', 1),
(13, 'stuff inc.', NULL, 'Primera oferta de trabajo updated', 0),
(14, 'Facultad de Farmacia de la ULA', 'Departamento de Profesores', 'Cuarta oferta de trabajo de facultad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

CREATE TABLE `oficina` (
  `ofi_id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficina`
--

INSERT INTO `oficina` (`ofi_id`, `fac_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `tel_id` int(11) NOT NULL,
  `tel_descripcion` varchar(255) NOT NULL,
  `tel_numero` varchar(50) NOT NULL,
  `est_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`tel_id`, `tel_descripcion`, `tel_numero`, `est_id`) VALUES
(8, 'asjhdasdasj', '28376232', 8),
(9, 'asjhdasdasj', '1234', 8),
(10, 'asjhdasdasj', '28376232', 9),
(11, 'asjhdasdasj', '1234', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`carr_id`),
  ADD KEY `car_fk_1` (`fac_id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `dep_fk_1` (`fac_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`est_id`),
  ADD UNIQUE KEY `est_cedula` (`est_cedula`),
  ADD KEY `est_fk_1` (`car_id`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indices de la tabla `inscrito`
--
ALTER TABLE `inscrito`
  ADD PRIMARY KEY (`insc_id`),
  ADD KEY `est_insc_fk_1` (`llam_id`),
  ADD KEY `est_insc_fk_2` (`est_id`);

--
-- Indices de la tabla `llamado`
--
ALTER TABLE `llamado`
  ADD PRIMARY KEY (`llam_id`),
  ADD KEY `llam_fk_1` (`ofer_id`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`ofer_id`);

--
-- Indices de la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD PRIMARY KEY (`ofi_id`),
  ADD KEY `ofi_fk_1` (`fac_id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`tel_id`),
  ADD KEY `tel_fk_1` (`est_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `carr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inscrito`
--
ALTER TABLE `inscrito`
  MODIFY `insc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `llamado`
--
ALTER TABLE `llamado`
  MODIFY `llam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `ofer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `oficina`
--
ALTER TABLE `oficina`
  MODIFY `ofi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `tel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `car_fk_1` FOREIGN KEY (`fac_id`) REFERENCES `facultad` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `dep_fk_1` FOREIGN KEY (`fac_id`) REFERENCES `facultad` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `est_fk_1` FOREIGN KEY (`car_id`) REFERENCES `carrera` (`carr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscrito`
--
ALTER TABLE `inscrito`
  ADD CONSTRAINT `est_insc_fk_1` FOREIGN KEY (`llam_id`) REFERENCES `llamado` (`llam_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `est_insc_fk_2` FOREIGN KEY (`est_id`) REFERENCES `estudiantes` (`est_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `llamado`
--
ALTER TABLE `llamado`
  ADD CONSTRAINT `llam_fk_1` FOREIGN KEY (`ofer_id`) REFERENCES `oferta` (`ofer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD CONSTRAINT `ofi_fk_1` FOREIGN KEY (`fac_id`) REFERENCES `facultad` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `tel_fk_1` FOREIGN KEY (`est_id`) REFERENCES `estudiantes` (`est_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
