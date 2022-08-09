-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 09-08-2022 a las 19:02:29
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine_ud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `contraseña`, `correo`) VALUES
(1010, 'santiago', NULL),
(1020, 'juan', NULL),
(1030, 'ivan', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cine`
--

CREATE TABLE `cine` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cine`
--

INSERT INTO `cine` (`id`, `nombre`, `telefono`, `direccion`, `id_administrador`, `id_empleado`) VALUES
(2010, 'Titan Plaza', '1234567', 'Av. Boyacá #80-94', 1010, 500),
(2020, 'Plaza de las americas', '8656898', 'Cra 71D No. 6-94 Sur', 1020, 500),
(2030, 'Calima', '9786543', 'Ave Cra 30 # 19', 1030, 500),
(2040, 'Unicentro', '3451267', 'Cra. 15 #124-30', 1010, 500),
(2050, 'Portal 80', '3562789', 'Tv. 100a #80A-20', 1020, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id_d` int(11) NOT NULL,
  `nombre_d` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id_d`, `nombre_d`) VALUES
(5010, 'Angus MacLane'),
(5020, 'Joseph Kosinski'),
(5030, 'Kyle Balda'),
(5040, 'Taika Waititi'),
(5050, 'James Cameron'),
(5060, 'Joe Russo'),
(5070, 'Scott Derrickson'),
(5080, 'Rob Minkoff'),
(5090, 'Sam Raimi'),
(6010, 'J. J. Abrams'),
(6020, 'Phillip Noyce'),
(6030, 'Vanya Peirani-Vignes'),
(6040, 'Jared Stern'),
(6050, 'David Leitch'),
(6060, 'Martín Novoa'),
(6070, 'Sam Levine'),
(6080, 'Anthony Russo'),
(6090, 'Jon Favreau');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `contraseña`, `correo`) VALUES
(500, 'Ivana', 'Bonito  ', 'd1f82a16', 'jsfeoo@correo.udistrital.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `n_boletas` int(11) NOT NULL,
  `id_cine` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tarifa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_g` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_g`, `nombre`) VALUES
(10, 'Comedia'),
(20, 'Accion'),
(30, 'Aventura'),
(40, 'Romance'),
(50, 'Terror'),
(60, 'Musical'),
(70, 'Ciencia ficción'),
(80, 'Drama'),
(90, 'Suspenso'),
(100, 'Documental'),
(110, 'Thriller'),
(120, 'Animacion'),
(130, 'Infantil'),
(140, 'No definido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `hora_funcion` time NOT NULL,
  `dia` varchar(10) NOT NULL,
  `id_pelicula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `imagen` longblob NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `clasificacion` varchar(10) NOT NULL,
  `duracion` varchar(15) DEFAULT NULL,
  `id_genero` int(11) NOT NULL,
  `id_director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protagonista`
--

CREATE TABLE `protagonista` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `id_pelicula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `id` int(11) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`id`, `dia`, `precio`) VALUES
(11111, 'Lunes', 9000),
(22222, 'Martes', 4500),
(33333, 'Miercoles', 4500),
(44444, 'Jueves', 9000),
(55555, 'Viernes', 9000),
(66666, 'Sabado', 9000),
(77777, 'Domingo', 9000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `apellido`, `correo`, `contraseña`) VALUES
(123, 'juan', 'feo', 'jsfeoo@correo.udistrita.e', '123'),
(233457, 'Kevin', 'Chavarro', 'chavarrokevin29@gmail.com', 'b8c0cd2d');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cine`
--
ALTER TABLE `cine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_administrador` (`id_administrador`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id_d`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cine` (`id_cine`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tarifa` (`id_tarifa`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_g`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_director` (`id_director`),
  ADD KEY `fk_genero` (`id_genero`);

--
-- Indices de la tabla `protagonista`
--
ALTER TABLE `protagonista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cine`
--
ALTER TABLE `cine`
  ADD CONSTRAINT `cine_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id`),
  ADD CONSTRAINT `cine_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_cine`) REFERENCES `cine` (`id`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`cedula`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifa` (`id`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id`);

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `fk_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_d`),
  ADD CONSTRAINT `fk_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_g`);

--
-- Filtros para la tabla `protagonista`
--
ALTER TABLE `protagonista`
  ADD CONSTRAINT `protagonista_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
