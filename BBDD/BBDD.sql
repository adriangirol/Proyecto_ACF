-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2016 a las 15:04:50
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `amistad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciaentrenamiento`
--

CREATE TABLE `asistenciaentrenamiento` (
  `Entrenamiento_ID_Entrenamiento` int(11) NOT NULL,
  `Jugador_ID_Jugador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `Nombre`) VALUES
(1, 'Bebe'),
(2, 'Prebenjamin'),
(3, 'Benjamin'),
(4, 'Alevin'),
(5, 'Infantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento`
--

CREATE TABLE `entrenamiento` (
  `ID_Entrenamiento` int(11) NOT NULL,
  `Fecha_Entrenamiento` date DEFAULT NULL,
  `ID_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `Id_Equipo` int(11) NOT NULL,
  `Equipo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`Id_Equipo`, `Equipo`) VALUES
(1, 'Bebe A'),
(2, 'Bebe B'),
(3, 'Prebenjamín A'),
(4, 'Prebenjamín B'),
(5, 'Benjamín A'),
(6, 'Benjamín B'),
(7, 'Alevín A'),
(8, 'Alevín B'),
(9, 'Infantíl A'),
(10, 'Infantíl B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Categoria_ID` int(11) DEFAULT NULL,
  `Equipo_Id_Equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`ID`, `Nombre`, `Categoria_ID`, `Equipo_Id_Equipo`) VALUES
(1, 'Nicolas', 5, 9),
(2, 'Manuel Arrayas', 5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadorpartido`
--

CREATE TABLE `jugadorpartido` (
  `Jugador_ID` int(11) NOT NULL,
  `Partido_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `ID` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE `posicion` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posicion`
--

INSERT INTO `posicion` (`ID`, `Nombre`) VALUES
(1, 'Portero'),
(2, 'Lateral Derecho'),
(3, 'Lateral Izquierdo'),
(4, 'Defensa Central'),
(5, 'Mediocentro'),
(6, 'Mediapunta'),
(7, 'Extremo Derecho'),
(8, 'Extremo Izquierda'),
(9, 'Delantero Centro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicionesjugador`
--

CREATE TABLE `posicionesjugador` (
  `Jugador_ID` int(11) NOT NULL,
  `Posicion_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posicionesjugador`
--

INSERT INTO `posicionesjugador` (`Jugador_ID`, `Posicion_ID`) VALUES
(1, 1),
(2, 4),
(2, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistenciaentrenamiento`
--
ALTER TABLE `asistenciaentrenamiento`
  ADD PRIMARY KEY (`Entrenamiento_ID_Entrenamiento`,`Jugador_ID_Jugador`),
  ADD KEY `FK_ASS_2` (`Jugador_ID_Jugador`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `entrenamiento`
--
ALTER TABLE `entrenamiento`
  ADD PRIMARY KEY (`ID_Entrenamiento`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`Id_Equipo`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Jugador_Categoria_FK` (`Categoria_ID`),
  ADD KEY `Jugador_Equipo_FK` (`Equipo_Id_Equipo`);

--
-- Indices de la tabla `jugadorpartido`
--
ALTER TABLE `jugadorpartido`
  ADD PRIMARY KEY (`Jugador_ID`,`Partido_ID`),
  ADD KEY `FK_ASS_4` (`Partido_ID`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `posicion`
--
ALTER TABLE `posicion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `posicionesjugador`
--
ALTER TABLE `posicionesjugador`
  ADD PRIMARY KEY (`Jugador_ID`,`Posicion_ID`),
  ADD KEY `FK_ASS_8` (`Posicion_ID`);

--
-- Restricciones para tablas volcadas
--
ALTER TABLE Entrenamiento ADD CONSTRAINT Equipo_Entrenamiento_FK FOREIGN KEY ( ID_equipo ) REFERENCES Equipo ( Id_Equipo ) ;

--
-- Filtros para la tabla `asistenciaentrenamiento`
--
ALTER TABLE `asistenciaentrenamiento`
  ADD CONSTRAINT `FK_ASS_1` FOREIGN KEY (`Entrenamiento_ID_Entrenamiento`) REFERENCES `entrenamiento` (`ID_Entrenamiento`),
  ADD CONSTRAINT `FK_ASS_2` FOREIGN KEY (`Jugador_ID_Jugador`) REFERENCES `jugador` (`ID`);

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `Jugador_Categoria_FK` FOREIGN KEY (`Categoria_ID`) REFERENCES `categoria` (`ID`),
  ADD CONSTRAINT `Jugador_Equipo_FK` FOREIGN KEY (`Equipo_Id_Equipo`) REFERENCES `equipo` (`Id_Equipo`);

--
-- Filtros para la tabla `jugadorpartido`
--
ALTER TABLE `jugadorpartido`
  ADD CONSTRAINT `FK_ASS_3` FOREIGN KEY (`Jugador_ID`) REFERENCES `jugador` (`ID`),
  ADD CONSTRAINT `FK_ASS_4` FOREIGN KEY (`Partido_ID`) REFERENCES `partido` (`ID`);

--
-- Filtros para la tabla `posicionesjugador`
--
ALTER TABLE `posicionesjugador`
  ADD CONSTRAINT `FK_ASS_7` FOREIGN KEY (`Jugador_ID`) REFERENCES `jugador` (`ID`),
  ADD CONSTRAINT `FK_ASS_8` FOREIGN KEY (`Posicion_ID`) REFERENCES `posicion` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
