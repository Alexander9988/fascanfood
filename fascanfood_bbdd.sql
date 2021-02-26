-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2021 a las 12:50:12
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fascanfood`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`nombre`, `descripcion`, `precio`, `foto`, `id`) VALUES
('Menú VEGETARIANO', 'Hamburguesa vegetariana a base de habas. Salsa yogurt, lechuga y pan brioche.\r\n\r\nPapas fritas.\r\n\r\nBebida 300ml.', '8.80', 'images/menu2.png', 1),
('Menú CABRA', 'Hamburguesa carne de vacuno con queso de cabra, cebolla caramelizada, lechuga y concentrado de bacon carmelizado.\r\n\r\nPapas fritas.\r\n\r\nBebida 300ml.', '11.00', 'images/menu3.png', 2),
('Menú FRANKFURT', 'Bocadillo de auténtica salchicha frankfurt con pimientos, queso parmesano y mermelada a elegir gusto.\r\n\r\nPapas fritas.\r\n\r\nBebida 300ml.', '6.90', 'images/menu4.png', 3),
('Menú TEXMEX', 'Nachos para 2 personas con bacon, queso, pimientos, guacamole y carne molida en salsa de guindilla mexicana.\r\n\r\nBebida 300ml.', '5.50', 'images/menu5.png', 4),
('Menú PIZZA', 'Pizza 4 quesos para dos personas. Queso mozzarella, queso crema, queso parmesano y queso cheddar.\r\n\r\nBebida 300ml.', '13.00', 'images/menu6.png', 5),
('Menú JALAPEÑO', 'Hamburguesa extremadamente picante con auténtico jalapeño mexicano y salsa secreta de la casa. Papas fritas. Bebida 300ml', '50.00', 'images/bigburger-classic.png', 6789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus_usuarios`
--

CREATE TABLE `menus_usuarios` (
  `usu_id` int(4) NOT NULL,
  `menu_id` int(4) NOT NULL,
  `orden_id` int(4) NOT NULL,
  `menu_img` varchar(100) NOT NULL,
  `menu_descripcion` varchar(200) NOT NULL,
  `menu_precio` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menus_usuarios`
--

INSERT INTO `menus_usuarios` (`usu_id`, `menu_id`, `orden_id`, `menu_img`, `menu_descripcion`, `menu_precio`) VALUES
(798, 2, 2195, 'images/menu3.png', 'Hamburguesa carne de vacuno con queso de cabra, cebolla caramelizada, lechuga y concentrado de bacon carmelizado.Papas fritas.Bebida 300ml.', '11.00'),
(798, 1, 2636, 'images/menu2.png', 'Hamburguesa vegetariana a base de habas. Salsa yogurt, lechuga y pan brioche.Papas fritas.Bebida 300ml.', '8.80'),
(4512, 6789, 5745, 'images/bigburger-classic.png', 'Hamburguesa extremadamente picante con auténtico jalapeño mexicano y salsa secreta de la casa. Papas fritas. Bebida 300ml.', '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(4) NOT NULL,
  `id_usu` int(4) NOT NULL,
  `total_pedido` decimal(4,2) NOT NULL,
  `dir_pedido` varchar(60) NOT NULL,
  `tfn_pedido` varchar(9) NOT NULL,
  `metodo_pedido` varchar(10) NOT NULL,
  `menus_pedido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellidos`, `correo`, `contrasena`, `id`) VALUES
('Francisco', 'Santana', 'francisco@santana.es', '1111', 798),
('Prueba', 'Pruebas correos', 'contacto.finanzas740@gmail.com', '1111', 1767),
('Admin', 'Admin Admin', 'admin@fascanfood.es', '@dminF@sc@nf00d_2020', 4512),
('Daniel', 'Rodriguez', 'daniel@rodriguez.es', '1234', 5556),
('Ciara', 'Cedrés Santana', 'ciaracedres0@gmail.com', '1111', 9189);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus_usuarios`
--
ALTER TABLE `menus_usuarios`
  ADD PRIMARY KEY (`orden_id`),
  ADD KEY `c_extranjera` (`menu_id`),
  ADD KEY `c_extranjera_1` (`usu_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk` (`id_usu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menus_usuarios`
--
ALTER TABLE `menus_usuarios`
  ADD CONSTRAINT `c_extranjera` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `c_extranjera_1` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
