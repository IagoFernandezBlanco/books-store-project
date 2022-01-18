-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2022 a las 19:44:05
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_alugado`
--

CREATE TABLE `libro_alugado` (
  `titulo` varchar(80) NOT NULL,
  `cantidade` int(11) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `editorial` varchar(24) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_aluguer`
--

CREATE TABLE `libro_aluguer` (
  `titulo` varchar(80) NOT NULL,
  `cantidade` int(11) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `editorial` varchar(24) NOT NULL,
  `prezo` int(11) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_devolto`
--

CREATE TABLE `libro_devolto` (
  `titulo` varchar(80) NOT NULL,
  `cantidade` int(11) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `editorial` varchar(24) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_venda`
--

CREATE TABLE `libro_venda` (
  `titulo` varchar(80) NOT NULL,
  `cantidade` int(11) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `editorial` varchar(24) NOT NULL,
  `prezo` int(11) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novo_rexistro`
--

CREATE TABLE `novo_rexistro` (
  `usuario` varchar(24) NOT NULL,
  `contrasinal` varchar(8) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nifdni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(24) NOT NULL,
  `contrasinal` varchar(8) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nifdni` varchar(9) NOT NULL,
  `tipo_usuario` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
