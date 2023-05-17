-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-05-2023 a las 04:34:51
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustes`
--

DROP TABLE IF EXISTS `ajustes`;
CREATE TABLE IF NOT EXISTS `ajustes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cuatrimestre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `1_fecha_inicio` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `1_fecha_fin` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `2_fecha_inicio` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `2_fecha_fin` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `examenes_i` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `examenes_f` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `materias_i` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `materias_f` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `h_materias` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `h_examenes` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ajustes`
--

INSERT INTO `ajustes` (`id`, `cuatrimestre`, `1_fecha_inicio`, `1_fecha_fin`, `2_fecha_inicio`, `2_fecha_fin`, `examenes_i`, `examenes_f`, `materias_i`, `materias_f`, `h_materias`, `h_examenes`) VALUES
(1, '2do Cuatrimestre', '13/03/2022', '28/06/2022', '13/08/2022', '22/11/2022', '14/09/2022', '18/09/2022', '14/09/2022', '22/09/2022', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(1, 'Ingeniería de Sistemas'),
(2, 'Licenciatura en Sistemas'),
(3, 'Programador Universitario'),
(6, 'Desarrollador de software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

DROP TABLE IF EXISTS `certificados`;
CREATE TABLE IF NOT EXISTS `certificados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int NOT NULL,
  `estado` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `certificados`
--

INSERT INTO `certificados` (`id`, `id_alumno`, `estado`, `tipo`) VALUES
(4, 2, 'Impreso', 'materias'),
(5, 2, 'No Impreso', 'alumno'),
(6, 2, 'No Impreso', 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisiones`
--

DROP TABLE IF EXISTS `comisiones`;
CREATE TABLE IF NOT EXISTS `comisiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_materia` int NOT NULL,
  `c_maxima` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `horario` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `numero` int NOT NULL,
  `dias` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `comisiones`
--

INSERT INTO `comisiones` (`id`, `id_materia`, `c_maxima`, `horario`, `numero`, `dias`) VALUES
(1, 2, '25', '18:00 a 21:30', 1, 'Martes y Viernes'),
(2, 3, '30', '18:00 a 21:30', 1, 'Martes y Viernes'),
(3, 3, '15', '15:00 a 17:00', 2, 'Lunes, Jueves');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

DROP TABLE IF EXISTS `examenes`;
CREATE TABLE IF NOT EXISTS `examenes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` int NOT NULL,
  `id_carrera` int NOT NULL,
  `id_materia` int NOT NULL,
  `aula` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `profesor` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `estado`, `id_carrera`, `id_materia`, `aula`, `profesor`, `hora`, `fecha`) VALUES
(1, 1, 6, 2, '14', 'Guzman', '17:00', '13/10/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insc_examenes`
--

DROP TABLE IF EXISTS `insc_examenes`;
CREATE TABLE IF NOT EXISTS `insc_examenes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int NOT NULL,
  `id_examen` int NOT NULL,
  `libreta` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `insc_examenes`
--

INSERT INTO `insc_examenes` (`id`, `id_alumno`, `id_examen`, `libreta`) VALUES
(1, 2, 1, 'AlejoP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insc_materias`
--

DROP TABLE IF EXISTS `insc_materias`;
CREATE TABLE IF NOT EXISTS `insc_materias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_materia` int NOT NULL,
  `id_alumno` int NOT NULL,
  `id_comision` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `insc_materias`
--

INSERT INTO `insc_materias` (`id`, `id_materia`, `id_alumno`, `id_comision`) VALUES
(4, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_carrera` int NOT NULL,
  `codigo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `grado` int NOT NULL,
  `tipo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `programa` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `id_carrera`, `codigo`, `nombre`, `grado`, `tipo`, `programa`) VALUES
(1, 6, '1220', 'Programación web', 3, '2do Cuatrimestre', 'Vistas/programas/Prog-454.pdf'),
(2, 6, '1010', 'Herramientas Informaticas II', 1, '2do Cuatrimestre', ''),
(3, 6, '111', 'Herramientas Informáticas I', 1, '1er Cuatrimestre', ''),
(5, 6, '1123', 'Inglés I', 1, '1er Cuatrimestre', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int NOT NULL,
  `libreta` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_materia` int NOT NULL,
  `fecha` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `profesor` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nota_final` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_alumno`, `libreta`, `id_materia`, `fecha`, `profesor`, `nota_final`, `estado`) VALUES
(1, 2, 'AlejoP', 2, '13/09/2019', 'Guzman', '3', 'Desaprobado'),
(2, 2, 'AlejoP', 5, '15/09/2019', 'Cornell', '9', 'Aprobado'),
(3, 2, 'AlejoP', 1, '22/09/2019', 'Mariana', '6', 'Regular'),
(4, 2, 'AlejoP', 3, '13/09/2022', 'Guzman', '3', 'Desaprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libreta` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_carrera` int NOT NULL,
  `fechanac` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `pais` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `preparatoria` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `libreta`, `clave`, `nombre`, `apellido`, `id_carrera`, `fechanac`, `direccion`, `telefono`, `correo`, `pais`, `preparatoria`, `rol`) VALUES
(1, 'admin', '123', 'Jorge', 'Prieto', 0, '12/25/1992', 'Cundinamarca', '222333', 'jp@correo.com', 'Colombia', 'Domingo Savio', 'Administrador'),
(2, 'AlejoP', '1233', 'Alejandro', 'Petrelli', 6, '', '', '', '', '', '', 'Estudiante');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
