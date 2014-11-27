-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2014 a las 07:52:03
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `base1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(13) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(10000, 'Aseo personal', 'd'),
(10001, 'Aseo para el Hogar', 'Articulos relacionados con el aseo general de la casa'),
(10002, 'licores', 'Bebidas alcocholicas nacionales e importadas'),
(10003, 'Cosmeticos', 'Maquillajes y articulos para el cuidado de la piel'),
(10004, 'quimicos', 'articulos relacionados con quimicos tales como acidos, alcoholes, disolventes, entre otros'),
(10005, 'jugueteria', 'articulos relacionados con juguetes para niños'),
(10006, 'medicamentos', 'articulos relacionados con cualquiere tipo de medicicina '),
(10007, 'papeleria', 'articulos relacionados con implementos para oficina y estudiantes'),
(100020, 'Cosita', 'asdjfhqjadshfuashdfu'),
(1001010, 'Holiiiii', 'Holiiiiiiiiiiiiiiii');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Documento` int(15) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Correo_Electronico` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Documento`, `Nombres`, `Apellidos`, `Direccion`, `Telefono`, `Correo_Electronico`) VALUES
(123456789, 'hector', 'ocampo', 'carrer', 2147483647, 'hector@hotmail.com'),
(316478955, 'Fernando', 'Osorio', 'carrera', 123456789, 'Feroso@hotmail.com'),
(2147483647, 'Pedro', 'Hurtado', 'carrera 8', 2147483647, 'Hurtado.P.@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `Idfactura` int(7) NOT NULL,
  `fechaventa` varchar(35) NOT NULL,
  `Idvendedor` int(15) NOT NULL,
  `Idcliente` int(15) NOT NULL,
  `IVAtotalfactura` int(10) NOT NULL,
  `montototalsinIVA` int(10) NOT NULL,
  `montototalconIVA` int(10) NOT NULL,
  `estado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Idfactura`, `fechaventa`, `Idvendedor`, `Idcliente`, `IVAtotalfactura`, `montototalsinIVA`, `montototalconIVA`, `estado`) VALUES
(1, '20 November 2014 ', 1111111113, 2147483647, 22180, 118820, 141000, 'Sin registra'),
(2, '20 November 2014 ', 1111111113, 123456789, 16800, 90200, 107000, 'Sin registra'),
(3, '20 November 2014 ', 1111111113, 316478955, 33200, 184800, 218000, 'Sin registra'),
(4, '20 November 2014 ', 1111111113, 2147483647, 820, 4580, 5400, 'Sin registra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listaproductos`
--

CREATE TABLE IF NOT EXISTS `listaproductos` (
`id_principal` int(11) NOT NULL,
  `Idfactura` varchar(7) NOT NULL,
  `IdProducto` varchar(15) NOT NULL,
  `cantidadProducto` int(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Volcado de datos para la tabla `listaproductos`
--

INSERT INTO `listaproductos` (`id_principal`, `Idfactura`, `IdProducto`, `cantidadProducto`) VALUES
(99, '3', '100092', 2),
(100, '3', '100092', 2),
(101, '3', '101010J', 1),
(118, '4', '100099', 1),
(119, '4', '7894', 2),
(139, '2', '100094', 4),
(140, '2', '7894', 5),
(141, '2', '101010E', 2),
(142, '2', '100095', 1),
(143, '2', '7894', 3),
(144, '1', '101010E', 2),
(145, '1', '100095', 2),
(146, '1', '7894', 5),
(147, '1', '100095', 1),
(148, '1', '100095', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `Nombre` varchar(50) NOT NULL,
  `Sistema` tinyint(1) NOT NULL,
  `Perfiles` tinyint(1) NOT NULL,
  `Productos` tinyint(1) NOT NULL,
  `Inventario` tinyint(1) NOT NULL,
  `Facturacion` tinyint(1) NOT NULL,
  `Reportes` tinyint(1) NOT NULL,
`ID` int(11) NOT NULL,
  `Clientes` tinyint(1) NOT NULL,
  `Venta` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`Nombre`, `Sistema`, `Perfiles`, `Productos`, `Inventario`, `Facturacion`, `Reportes`, `ID`, `Clientes`, `Venta`) VALUES
('cositus', 1, 0, 1, 1, 0, 0, 1, 0, 0),
('Root', 1, 1, 1, 1, 1, 1, 2, 1, 1),
('tercero', 0, 0, 1, 0, 0, 0, 3, 0, 0),
('cuarto', 1, 1, 1, 1, 1, 1, 4, 0, 1),
('Vendedor', 0, 0, 0, 0, 1, 0, 7, 1, 0),
('cajero', 0, 0, 0, 0, 0, 0, 8, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `categoria` int(13) NOT NULL,
  `iva` varchar(2) NOT NULL,
  `valorIva` decimal(6,0) NOT NULL,
  `precioCompra` decimal(10,0) NOT NULL,
  `precioVenta` decimal(10,0) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `categoria`, `iva`, `valorIva`, `precioCompra`, `precioVenta`, `cantidad`, `estado`) VALUES
('10009010', 'Cuaderno argollado linea corri', 'Producto  esencial para estudiantes', 10001, 'SI', '10', '1400', '2000', 392, 'Disponible'),
('100091', 'Televisores', 'Televisores LCD plasma ', 10000, 'SI', '16', '100003', '100003', 1085855, 'Disponible'),
('100092', 'Detergente en polvo', 'Detergente en polvo de uso general', 10000, 'SI', '10', '5000', '7000', 493, 'Disponible'),
('100093', 'Detergente en polvo para ropa', 'Detergente en polvo de uso especial para el lavado de la ropa', 10000, 'SI', '16', '8000', '10000', 511, 'Disponible'),
('100094', 'caneca Aguardiente Blanco sin ', 'Producto  etilico en presentación de 375cc', 10000, 'SI', '16', '9000', '15000', 400, 'Disponible'),
('100095', 'botella Aguardiente Blanco sin', 'Producto  etilico en presentación de 750cc', 10000, 'SI', '16', '20000', '25000', 400, 'Disponible'),
('100099', 'Cuaderno argollado cuadriculad', 'Producto  esencial para estudiantes', 10000, 'SI', '10', '800', '1400', 400, 'Disponible'),
('101010E', 'acetaminofen', 'semillas del ermitaño en presentación de 30 unidades por caja ', 10002, 'SI', '8', '2500', '3000', 900, 'Disponible'),
('101010I', 'Cuaderno argollado linea corri', 'Producto  esencial para estudiantes', 10005, 'SI', '10', '1400', '2000', 400, 'Disponible'),
('101010J', 'elmo cosquillas', 'peluche de la clasica serie "plaza sesamo"', 10004, 'SI', '16', '150000', '190000', 20, 'Disponible'),
('7894', 'jabon', 'hace espuma y limpia Bien', 10000, 'SI', '17', '1200', '2000', 200, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Documento` double NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Usuario` varchar(8) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Pregunta` varchar(150) NOT NULL,
  `Respuesta` varchar(150) NOT NULL,
  `Tipo_Documento` varchar(5) NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Foto` varchar(400) NOT NULL,
  `Telefono` double NOT NULL,
  `Correo_Electronico` varchar(30) NOT NULL,
  `Genero` varchar(1) NOT NULL,
  `perfiles_Nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Documento`, `Nombres`, `Apellidos`, `Usuario`, `Password`, `Pregunta`, `Respuesta`, `Tipo_Documento`, `Ciudad`, `Direccion`, `Edad`, `Foto`, `Telefono`, `Correo_Electronico`, `Genero`, `perfiles_Nombre`) VALUES
(66725237, 'Beatriz Eliana', 'Rincon', 'beatriz', '12345', 'Lugar de nacimiento?', 'belen', 'CC', 'Tulua', 'Calle 33 #22-0 - Barrio', 35, 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xaf1/v/t1.0-9/484581_116115091853200_1230645316_n.jpg?oh=9bd01ed488658003224494ae6f39f777&oe=54CF8688&__gda__=1418923097_61697874751c8628ccb14f80d1c53', 3173895745, 'beatrizeliana11@gmail.com', 'F', 0),
(1111111113, 'Rootencio', 'Adminez', 'root', '123456', 'asdfasdfa?', 'batman', 'CC', 'Tulua', 'Calle 11 #1-1 - Barrio', 20, 'http://1.bp.blogspot.com/-VuCZ5URwvL4/UOwmLOZMGqI/AAAAAAAAAHE/0tuJa1FKU9A/s1600/tumblr_m0sykzhXsU1r4', 2147483647, 'asdf@root.com', 'M', 2),
(1116255844, 'federico', 'alfonso', 'federico', 'fedemil3', 'direccion de la casa', 'se me olvido', 'CC', 'Tulua', 'calle no se que de la trini', 27, 'URL IMGEN', 3125678341, 'correo@ferderico.me', 'M', 3),
(1116266234, 'Jhonier', 'asdasdasdasdasdasdasdasd', 'jhonier', '123456', 'Segundo nombre?', 'edinson', 'CC', 'Tulua', 'Calle 33 #333-33 - Barrio', 20, 'sdfgsdgfdgsasdasdasdasd', 2147483647, 'jevalenciac@gmail.com', 'M', 0),
(1116266810, 'hector fabio', 'Ocampo arbelaez', 'hector', '123456', 'Â¿Nombre de mi primera mascota?', 'perrita', 'CC', 'tulua', 'carreta 9', 18, 'https://scontent-b-iad.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/10406906_10152299501150878_2547701765636007950_n.jpg?oh=e2935e0f2eaf87b1f4718b457a683d5c&oe=54E4EB80', 23059828, 'the.hector2603@gmail.com', 'M', 7),
(1116268101, 'Yair', 'Mondragon ', 'yair', 'mondra', 'Primera Mascota?', 'perrito', 'CC', 'Tulua', 'Calle 22 #22-2 - Barrio', 20, 'https://scontent-b-dfw.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/12058_288531341277248_255174317_n.jpg?oh=4ce2e3746e3e1592bbdf726faa9a5549&oe=54849F93', 2307004, 'blackandwhite654@gmail.com', 'M', 2),
(1116488415, 'Stiven', 'Flores', 'stiven', '1234', 'Comida favorita?', 'rapida', 'CC', 'Tulua', 'Carrera 44 #44-44 - Barrio', 20, '', 2147483647, 'stiven123@gmail.com', 'M', 1),
(2147483647, 'Andres', 'Vasquez', 'andress', '12345', 'Primer amigo de la infancia?', 'jhon', 'CC', 'Tulua', 'Calle 44 #44-44 - Barrio', 20, 'https://sp.yimg.com/ib/th?id=HN.608055352352440543&pid=15.1&P=0', 2147483647, 'andresvasquez12345@gmail.com', 'M', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`id`,`nombre`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`Documento`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`Idfactura`);

--
-- Indices de la tabla `listaproductos`
--
ALTER TABLE `listaproductos`
 ADD PRIMARY KEY (`id_principal`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`Documento`), ADD KEY `perfiles_Nombre` (`perfiles_Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listaproductos`
--
ALTER TABLE `listaproductos`
MODIFY `id_principal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
