-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2023 a las 04:56:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `konecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `CATEGORIA` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `CATEGORIA`) VALUES
(1, 'ROPA'),
(2, 'ACCESORIOS'),
(3, 'CALZADO'),
(4, 'ASEO'),
(5, 'CARNES'),
(6, 'ELECTRODOMESTICOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(255) NOT NULL,
  `REFERENCIA` varchar(255) NOT NULL,
  `PRECIO` int(11) NOT NULL,
  `PESO` int(11) NOT NULL,
  `CATEGORIA` int(11) NOT NULL,
  `STOCK` int(11) NOT NULL,
  `FECHA_CREACION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `NOMBRE_PRODUCTO`, `REFERENCIA`, `PRECIO`, `PESO`, `CATEGORIA`, `STOCK`, `FECHA_CREACION`) VALUES
(1, 'nevera', 'RMP400FLCG1', 2113425, 10, 6, 2, '2023-02-21'),
(3, 'Lavadora Olimpo 7 Kg', 'OLWM07-TMH', 699000, 5, 6, 3, '2023-02-21'),
(4, 'Aire Acondicionado Olimpo Mini Split', 'OLACB12', 1799000, 2, 6, 2, '2023-02-21'),
(5, 'Papel Higiénico Olimpica Mega Rollo Triple Hoja', '2260769', 15600, 1, 4, 7, '2023-02-22'),
(6, 'Blanqueador Clorox Original 1.8 Lt ', '2146511', 6900, 1, 4, 2, '2023-02-22'),
(7, 'Carne Molida De Res Especial X Kg', '176910', 21980, 1, 5, 17, '2023-02-22'),
(8, 'Pechuga De Pollo Mercapollo Fresca Sin Piel', '895', 18950, 1, 5, 21, '2023-02-22'),
(9, 'Gafas Invicta Specialty Astra C3 Hombre Azul', '1100051668', 199900, 1, 2, 2, '2023-02-21'),
(10, 'Gorro Con Protección Fisher Price Panda Para Niños', '1100017040', 4950, 1, 2, 1, '2023-02-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `ROL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID`, `ROL`) VALUES
(1, 'ADMIN'),
(2, 'EMPLEADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `CONTRASEÑA` varchar(255) NOT NULL,
  `CORREO` varchar(255) NOT NULL,
  `ID_ROLES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `USUARIO`, `CONTRASEÑA`, `CORREO`, `ID_ROLES`) VALUES
(2, 'admin', '1234', 'admin@gmail.com', 1),
(7, 'user', 'qwerty', 'bimafa1205@specialistblog.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID_VENTAS` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DATETIME_VENTA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID_VENTAS`, `ID_PRODUCTO`, `CANTIDAD`, `DATETIME_VENTA`) VALUES
(9, 1, 6, '2023-02-22 03:11:45'),
(10, 5, 3, '2023-02-22 02:24:25'),
(11, 6, 5, '2023-02-22 02:24:44'),
(12, 7, 3, '2023-02-22 02:24:56'),
(14, 10, 8, '2023-02-22 03:13:46'),
(15, 9, 1, '2023-02-22 03:14:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CATEGORIA` (`CATEGORIA`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ROLES` (`ID_ROLES`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID_VENTAS`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID_VENTAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_ROLES`) REFERENCES `roles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
