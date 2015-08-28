-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2015 a las 21:47:22
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `autos_lote`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE IF NOT EXISTS `autos` (
  `ID_key` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `antiguedad` varchar(10) NOT NULL,
  `potencia` varchar(10) NOT NULL,
  `velocidad` varchar(10) NOT NULL,
  `precio` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`ID_key`, `marca`, `modelo`, `color`, `antiguedad`, `potencia`, `velocidad`, `precio`) VALUES
('123', 'Chebrolet', 'OHR', 'uno', '', '', '', '120,000.00'),
('1231', 'Chebrolet', 'df', 'sfgs', 'sf', 'gs', 'fgsf', 'dga'),
('12345', 'Nissan', 'Juke', 'uno', '', '', '', '120,000.00'),
('12345f', 'Nissan', 'Juke', 'Negro', '2010', '1,000', '2,000', '180,000.00'),
('1279', 'Chebrolet', 'Rety', 'uno', '', '', '', '123456'),
('13245', 'Nissan', 'Yunk', 'Negro', '2010', '1,000', '2,000', '180,000.00'),
('456', 'Fork', 'fbfhb', 'fg', '', '', '', 'dghtd'),
('erte', 'Fork', 'dss', 'fbdfb', '', '', '', 'dfd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clave`, `nombre`, `apellido`, `direccion`, `telefono`, `ciudad`) VALUES
('dfd', 'gjf', 'fg', 'sdg', 'dga', 'fgs'),
('fdgs', 'dbfb', 'gbdgw', 'gfnd', 'dghgd', 'rsgr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`clave`, `nombre`, `apellido`, `direccion`, `telefono`, `ciudad`) VALUES
('42123', 'Juanita', 'Cerrano', 'Nativitas', '4552535445', 'D.F.me'),
('HEAO901014', 'Omar', 'HernÃ¡ndez Avellaneda', 'Corral Viejo', '435 103 8612', 'San Lucas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialactividades`
--

CREATE TABLE IF NOT EXISTS `historialactividades` (
  `fecha` date NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historialactividades`
--

INSERT INTO `historialactividades` (`fecha`, `descripcion`, `usuario`) VALUES
('2000-12-12', 'Eliminado elcliente', 'Omar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `key_Empleado` varchar(10) NOT NULL,
  `nSesion` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `tipo_User` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`key_Empleado`, `nSesion`, `pass`, `tipo_User`) VALUES
('7910', 'Omar', 'crafty', 'Administrador');

--
-- Disparadores `sesion`
--
DELIMITER //
CREATE TRIGGER `sesion_elim` AFTER DELETE ON `sesion`
 FOR EACH ROW insert historialactividades (fecha, descripcion, usuario)
values ('2000-12-12', 'Eliminado elcliente', 'Omar')
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `clave_Key` varchar(10) NOT NULL,
  `cv_Cliente` varchar(10) NOT NULL,
  `name_Cliente` varchar(20) NOT NULL,
  `cv_Empleado` varchar(10) NOT NULL,
  `name_Empleado` varchar(20) NOT NULL,
  `cv_Auto` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `fecha_Venta` date NOT NULL,
  `fecha_Entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`clave_Key`, `cv_Cliente`, `name_Cliente`, `cv_Empleado`, `name_Empleado`, `cv_Auto`, `marca`, `descripcion`, `precio`, `fecha_Venta`, `fecha_Entrega`) VALUES
('234d45', 'dfd', 'gjf', 'HEAO901014', 'Omar', '13245', 'Nissan', 'saf sga ', '120,000.00', '2015-08-01', '2015-08-03'),
('523g12', 'dfd', 'gjf', 'HEAO901014', 'Omar', '13245', 'Nissan', '', '', '2015-08-01', '2015-08-01'),
('523g12g', 'dfd', 'gjf', 'HEAO901014', 'Omar', '13245', 'Nissan', '', '', '2015-08-01', '2015-05-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
 ADD PRIMARY KEY (`ID_key`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
 ADD PRIMARY KEY (`nSesion`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`clave_Key`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
