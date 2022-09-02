-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2022 a las 19:15:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comercio_morales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagen`) VALUES
(1, 'Namfix', 'https://robohash.org/consecteturvitaeet.png?size=400x400&set=set1'),
(2, 'Daltfresh', 'https://robohash.org/doloremliberosint.png?size=400x400&set=set1'),
(3, 'Cardify', 'https://robohash.org/nemomolestiaeiusto.png?size=400x400&set=set1'),
(4, 'Subin', 'https://robohash.org/siteanostrum.png?size=400x400&set=set1'),
(5, 'Sonair', 'https://robohash.org/magniidaut.png?size=400x400&set=set1'),
(6, 'Biodex', 'https://robohash.org/earumnemoomnis.png?size=400x400&set=set1'),
(7, 'Zoolab', 'https://robohash.org/utvoluptatemsint.png?size=400x400&set=set1'),
(8, 'Bitwolf', 'https://robohash.org/aquaeaut.png?size=400x400&set=set1'),
(9, 'Transcof', 'https://robohash.org/molestiaetemporaquia.png?size=400x400&set=set1'),
(10, 'Pannier', 'https://robohash.org/ipsaetaut.png?size=400x400&set=set1'),
(11, 'Y-Solowarm', 'https://robohash.org/idofficiacum.png?size=400x400&set=set1'),
(12, 'Quo Lux', 'https://robohash.org/quiaassumendaharum.png?size=400x400&set=set1'),
(13, 'Tampflex', 'https://robohash.org/idculpasit.png?size=400x400&set=set1'),
(14, 'Flexidy', 'https://robohash.org/repudiandaeomnisveniam.png?size=400x400&set=set1'),
(15, 'Rank', 'https://robohash.org/itaqueplaceatreiciendis.png?size=400x400&set=set1'),
(16, 'Zathin', 'https://robohash.org/evenietasperioresquo.png?size=400x400&set=set1'),
(17, 'Ronstring', 'https://robohash.org/errorreiciendisvitae.png?size=400x400&set=set1'),
(18, 'Bitchip', 'https://robohash.org/doloreabest.png?size=400x400&set=set1'),
(19, 'Cardify', 'https://robohash.org/sintremsimilique.png?size=400x400&set=set1'),
(20, 'Holdlamis', 'https://robohash.org/occaecatiadalias.png?size=400x400&set=set1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(80) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `email` varchar(80) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `email_user` varchar(80) NOT NULL,
  `proceso` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `id_categoria`) VALUES
(1, 'Cheese - Cream Cheese', 'Removal of Drainage Device from Lower Bursa and Ligament, Percutaneous Endoscopic Approach', '809.48', 8, 'https://robohash.org/voluptatemaliquamrepellendus.png?size=800x800&set=set1', 20),
(2, 'Beef - Striploin Aa', 'Replacement of Right Lower Leg Tendon with Synthetic Substitute, Open Approach', '903.10', 456, 'https://robohash.org/animifacerequia.png?size=800x800&set=set1', 20),
(3, 'Peppercorns - Pink', 'Revision of Spacer in Right Finger Phalangeal Joint, External Approach', '374.93', 7, 'https://robohash.org/quasomnisitaque.png?size=800x800&set=set1', 10),
(4, 'Island Oasis - Magarita Mix', 'Drainage of Inferior Vena Cava, Open Approach', '213.86', 4, 'https://robohash.org/maximequirecusandae.png?size=800x800&set=set1', 20),
(5, 'Apple - Delicious, Red', 'Intraoperative Radiation Therapy (IORT) of Colon', '991.62', 42035, 'https://robohash.org/utveritatisnisi.png?size=800x800&set=set1', 20),
(6, 'Basil - Dry, Rubbed', 'Plain Radiography of Right Knee using Low Osmolar Contrast', '679.95', 235, 'https://robohash.org/veromaioresomnis.png?size=800x800&set=set1', 20),
(7, 'Pie Filling - Cherry', 'Drainage of Right Elbow Region with Drainage Device, Percutaneous Endoscopic Approach', '401.56', 20, 'https://robohash.org/aperiamvoluptatemid.png?size=800x800&set=set1', 20),
(8, 'Apple - Custard', 'Therapeutic Exercise Treatment of Integumentary System - Whole Body using Aerobic Endurance and Conditioning Equipment', '119.77', 8051, 'https://robohash.org/seddolorumexplicabo.png?size=800x800&set=set1', 20),
(9, 'Bay Leaf Ground', 'Drainage of Penis, Percutaneous Approach, Diagnostic', '257.91', 14725, 'https://robohash.org/errorsapientequi.png?size=800x800&set=set1', 9),
(10, 'Seedlings - Buckwheat, Organic', 'Revision of Infusion Pump in Trunk Subcutaneous Tissue and Fascia, Open Approach', '302.51', 319, 'https://robohash.org/omnisillumfacere.png?size=800x800&set=set1', 10),
(11, 'Orange - Tangerine', 'Plaque Radiation of Hard Palate', '477.23', 6996, 'https://robohash.org/etiustonulla.png?size=800x800&set=set1', 11),
(12, 'Tomatoes - Hot House', 'Detachment at Left Upper Leg, High, Open Approach', '644.99', 50, 'https://robohash.org/inciduntsitea.png?size=800x800&set=set1', 12),
(13, 'Tea - Black Currant', 'Bypass Thoracic Aorta, Ascending/Arch to Pulmonary Trunk with Synthetic Substitute, Open Approach', '938.68', 583, 'https://robohash.org/illumrerumhic.png?size=800x800&set=set1', 13),
(14, 'Lamb - Leg, Diced', 'Reposition Left Femoral Shaft with Monoplanar External Fixation Device, Percutaneous Endoscopic Approach', '814.80', 7, 'https://robohash.org/velitistequi.png?size=800x800&set=set1', 14),
(15, 'Lentils - Green, Dry', 'Removal of Neurostimulator Lead from Azygos Vein, Percutaneous Endoscopic Approach', '667.00', 56226, 'https://robohash.org/cumvoluptasat.png?size=800x800&set=set1', 15),
(16, 'Shrimp - Baby, Warm Water', 'Measurement of Cardiac Electrical Activity, Guidance, External Approach', '139.95', 7, 'https://robohash.org/doloreautsunt.png?size=800x800&set=set1', 16),
(17, 'Dish Towel', 'Revision of Radioactive Element in Chest Wall, Percutaneous Approach', '635.17', 6, 'https://robohash.org/sintrepellatat.png?size=800x800&set=set1', 17),
(18, 'Cocoa Powder - Dutched', 'Transfer Right Upper Arm Subcutaneous Tissue and Fascia, Open Approach', '850.12', 47406, 'https://robohash.org/estmolestiaearchitecto.png?size=800x800&set=set1', 18),
(19, 'Placemat - Scallop, White', 'Bypass Right Subclavian Artery to Bilateral Upper Arm Artery with Synthetic Substitute, Open Approach', '412.64', 14927, 'https://robohash.org/doloresnequein.png?size=800x800&set=set1', 19),
(20, 'Chervil - Fresh', 'Revision of Infusion Device in Left Finger Phalangeal Joint, Percutaneous Endoscopic Approach', '378.12', 0, 'https://robohash.org/quoetautem.png?size=800x800&set=set1', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
