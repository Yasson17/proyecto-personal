-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-02-2016 a las 00:51:20
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bibliotecauni`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Actualizar_categoria`(id int (10), nombre varchar(100), subcategoria int (10))
BEGIN
    UPDATE categorias SET
      nombre_categoria=nombre,
      id_subcategoria = subcategoria
    WHERE id_categoria = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Actualizar_subcategoria`( 
       id int (10),
      nombre varchar(100)
    )
BEGIN
    UPDATE subcategorias SET
      nombre_subcategoria=nombre
    WHERE id_subcategoria = id;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Buscar_categoria`(buscar varchar(50))
BEGIN 
    select * from categorias where nombre_categoria like buscar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Buscar_subcategoria`(buscar varchar(50))
BEGIN 
    select * from subcategorias where nombre_subcategoria like buscar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Eliminar_categoria`( id int(10))
BEGIN   
    Delete from categorias where id_categoria = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Eliminar_subategoria`( id int(10)
    )
BEGIN   
    Delete from subcategorias where id_subcategoria = id;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insertar_Categoria`( 
      pdescripcion varchar(100),
      psubcategoria int (10)
    )
BEGIN   
    INSERT INTO categorias(nombre_categoria, subcategoria)
    VALUES(pdescripcion, psubcategoria);
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insertar_subategoria`(IN nombre varchar(50))
BEGIN
INSERT INTO subcategorias (nombre_subcategoria) VALUES(nombre);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insertar_Subcategoria`( 
      pnombre_subcategoria varchar(50)
    )
BEGIN   
    INSERT INTO categorias(nombre_subcategoria)
    VALUES(pnombre_subcategoria);
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Listar_Categoria`( )
BEGIN
    SELECT * FROM categorias ORDER BY nombre_categoria ASC;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Listar_subcategoria`()
BEGIN
select * from subcategorias;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_biblioteca`
--

CREATE TABLE IF NOT EXISTS `administrador_biblioteca` (
  `id_bibliotecario` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `id_extreme` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bibliotecario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `administrador_biblioteca`
--

INSERT INTO `administrador_biblioteca` (`id_bibliotecario`, `user`, `pass`, `id_extreme`) VALUES
(3, 'carlos', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', ''),
(4, 'elier', '664ff0b670f086f29e8ca50badfe14de12253d5c', ''),
(5, 'javier', '828c1a17681e8566a17a1a4801ea67306010b273', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) NOT NULL,
  `id_subcategoria` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `id_subcategoria` (`id_subcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `id_subcategoria`) VALUES
(1, 'Programacion Avanzada', 3),
(2, 'Aplicaciones web', 2),
(4, 'Estadisticas', 2),
(8, 'pytno', 2),
(9, 'php avanzado', 4),
(10, 'HTML 5', NULL),
(11, 'Base de datos', 2),
(12, 'Ingenieria de Sistemas', 3),
(13, 'Informatica', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(10) NOT NULL AUTO_INCREMENT,
  `remitente` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `remitente`, `correo`, `asunto`, `mensaje`, `fecha`) VALUES
(1, 'Juan Perz', 'juanperz@gmail.com', '', 'Necesito un libro', '2016-01-07'),
(2, 'Elier Javier Rocha', 'elier.aries@gmail.com', 'Prueba', 'Esto es una prueba', '2016-02-05'),
(3, 'Elier Javier Rocha', 'elier.aries@gmail.com', 'Prueba', 'Hola', '2016-02-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int(10) NOT NULL AUTO_INCREMENT,
  `foto` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 NOT NULL,
  `disponible` varchar(2) CHARACTER SET latin1 NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `id_subcategoria` int(10) NOT NULL,
  `id_proveedor` int(10) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `url_descarga` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `foto`, `nombre`, `descripcion`, `disponible`, `id_categoria`, `id_subcategoria`, `id_proveedor`, `fecha_ingreso`, `url_descarga`, `tipo`) VALUES
(3, 'images/mysql.jpg', 'Mysql', 'Para crear aplicaciones dinamicas', 'si', 4, 2, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'mysql'),
(4, 'images/product2.jpg', 'HTML5 2da Edicion', 'Para crear aplicaciones dinamicas', 'si', 2, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'html'),
(5, 'images/product1.jpg', 'Java 8', 'Libro de Programacion', 'no', 1, 0, 1, '2016-01-06', 'http://mega.co.nz/sldldldlffkf', 'java'),
(6, 'images/product5.jpg', 'ASP.NET', 'Crea aplicaciones dinamicas', 'si', 2, 0, 1, '2016-01-07', 'http://mega.co.nz/sldldldlffkf', 'asp'),
(8, 'images/product6.jpg', 'Ajax', 'lenguaje de programacion', 'no', 2, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'ajax'),
(9, 'images/product4.jpg', 'JQuery 2da Edicion', 'Sincronizacion con la base de datos', 'no', 2, 0, 2, '2016-01-14', 'http://mediafire.com/id=203044', 'jquery'),
(10, 'images/php.jpg', 'PHP', 'Para crear aplicaciones dinamicas', 'no', 2, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'mysql'),
(11, 'images/pyton.jpg', 'Python', 'Para crear aplicaciones dinamicas', 'no', 1, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'html'),
(12, 'images/visualbasic.jpg', 'Visual Basic', 'Libro de Programacion', 'si', 1, 0, 1, '2016-01-06', 'http://mega.co.nz/sldldldlffkf', 'java'),
(13, 'images/java7.jpg', 'Java 7', 'Crea aplicaciones dinamicas', 'no', 1, 0, 1, '2016-01-07', 'http://mega.co.nz/sldldldlffkf', 'asp'),
(16, 'images/javascript.jpg', 'JavaScript para principiantes', 'Excelente libro para aprender Javascript', 'si', 2, 8, 2, '2016-02-05', 'http://mega.co.nz/sldldldlffkf', 'aplication/pdf'),
(17, 'images/csharp.jpg', 'C# Avanzado', 'para programacion', 'si', 1, 2, 2, '2016-02-05', 'http://mega.co.nz/sldldldlffkf', 'aplication/pdf'),
(18, 'images/db1.jpg', 'Postgre Sql', 'Para almacenar datos', 'si', 11, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'Postgresql'),
(19, 'images/db2.jpg', 'SYBAse', 'Para almacenar datos', 'no', 11, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'SYBAse'),
(20, 'images/db3.jpg', 'dBASE III', 'Para almacenar datos', 'si', 11, 0, 1, '2016-01-06', 'http://mega.co.nz/sldldldlffkf', 'dBASE'),
(21, 'images/db4.jpg', 'IBM Informix', 'Para almacenar datos', 'no', 11, 0, 1, '2016-01-07', 'http://mega.co.nz/sldldldlffkf', 'Informix'),
(22, 'images/db5.jpg', 'SQL Server 2012', 'Para almacenar datos', 'si', 11, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'sqlserver'),
(23, 'images/db6.jpg', 'Oracle 11g', 'Para almacenar datos', 'si', 11, 0, 2, '2016-01-14', 'http://mediafire.com/id=203044', 'Oracle'),
(24, 'images/sistemas1.jpg', 'Libro de Sistemas', 'Para aprender mas', 'si', 12, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'sistemas'),
(25, 'images/sistemas2.jpg', 'Libro de Sistemas', 'Para aprender mas', 'no', 12, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'sistemas'),
(26, 'images/sistemas3.jpg', 'Libro de Sistemas', 'Para aprender mas', 'si', 12, 0, 1, '2016-01-06', 'http://mega.co.nz/sldldldlffkf', 'sistemas'),
(27, 'images/sistemas4.jpg', 'Libro de Sistemas', 'Para aprender mas', 'no', 12, 0, 1, '2016-01-07', 'http://mega.co.nz/sldldldlffkf', 'sistemas'),
(28, 'images/sistemas5.jpg', 'Libro de Sistemas', 'Para aprender mas', 'si', 12, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'sistemas'),
(29, 'images/sistemas6.jpg', 'Libro de Sistemas', 'Para aprender mas', 'si', 12, 0, 2, '2016-01-14', 'http://mediafire.com/id=203044', 'sistemas'),
(30, 'images/informatica1.jpg', 'Libro de informatica', 'Para aprender mas', 'si', 13, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'informatica'),
(31, 'images/informatica2.jpg', 'Libro de informatica', 'Para aprender mas', 'no', 13, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'informatica'),
(32, 'images/informatica3.jpg', 'Libro de informatica', 'Para aprender mas', 'si', 13, 0, 1, '2016-01-06', 'http://mega.co.nz/sldldldlffkf', 'informatica'),
(33, 'images/informatica4.jpg', 'Libro de informatica', 'Para aprender mas', 'no', 13, 0, 1, '2016-01-07', 'http://mega.co.nz/sldldldlffkf', 'informatica'),
(34, 'images/informatica5.jpg', 'Libro de informatica', 'Para aprender mas', 'si', 13, 0, 1, '2016-01-07', 'http://mediafire.com/id=203044', 'informatica'),
(35, 'images/informatica6.jpg', 'Libro de informatica', 'Para aprender mas', 'si', 13, 0, 2, '2016-01-14', 'http://mediafire.com/id=203044', 'informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pdf`
--

CREATE TABLE IF NOT EXISTS `pdf` (
  `id_pdf` int(10) NOT NULL AUTO_INCREMENT,
  `id_libro` int(10) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` mediumtext,
  `tamanio` int(10) unsigned DEFAULT NULL,
  `tipo` varchar(150) DEFAULT NULL,
  `nombre_archivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pdf`),
  KEY `id_libro` (`id_libro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `pdf`
--

INSERT INTO `pdf` (`id_pdf`, `id_libro`, `titulo`, `descripcion`, `tamanio`, `tipo`, `nombre_archivo`) VALUES
(1, 5, 'javascript', 'Buen Libro', 13311, 'application/pdf', 'libro.pdf'),
(2, 3, 'Mysql Avanzado', 'Para conectar base de datos', 970475, 'application/pdf', 'libro.pdf'),
(3, 4, 'HTML 5', 'Para aplicaciones web', 635134, 'application/pdf', 'libro.pdf'),
(4, 5, 'Java Enterprise Edition', 'Para aplicaciones moviles y de escritorio', 294261, 'application/pdf', 'libro.pdf'),
(5, 9, 'Jquery', 'Sincronizacion con el servidor', 405398, 'application/pdf', 'libro.pdf'),
(6, 10, 'php', 'Buen Libro', 13311, 'application/pdf', 'libro.pdf'),
(7, 11, 'pyton', 'Para conectar base de datos', 970475, 'application/pdf', 'libro.pdf'),
(8, 12, 'Visual Basic', 'Para aplicaciones web', 635134, 'application/pdf', 'libro.pdf'),
(9, 6, 'Asp. Net', 'Para aplicaciones moviles y de escritorio', 294261, 'application/pdf', 'libro.pdf'),
(10, 17, 'C#', 'Sincronizacion con el servidor', 405398, 'application/pdf', 'libro.pdf'),
(11, 3, 'mysql', 'dkdkff', 171766, 'application/pdf', 'libro.pdf'),
(12, 3, 'mysql', 'dkdkff', 171766, 'application/pdf', 'libro.pdf'),
(13, 3, 'mysql', 'dkdkff', 171766, 'application/pdf', 'libro.pdf'),
(14, 3, 'mysql', 'dkdkff', 171766, 'application/pdf', 'libro.pdf'),
(15, 4, 'HTML 5', 'bueno', 171766, 'application/pdf', 'libro.pdf'),
(16, 17, 'C# Avanzado', 'bueno', 171766, 'application/pdf', 'libro.pdf'),
(17, 30, 'informatica2', 'bueno', 171766, 'application/pdf', 'libro.pdf'),
(18, 31, 'dkfk', 'dkkf', 171766, 'application/pdf', 'libro.pdf'),
(19, 28, 'prueba', 'bueno', 171766, 'application/pdf', 'libro.pdf'),
(20, 8, 'Libro pdf de ajax', 'es bueno', 403835, 'application/pdf', 'art08.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_libro`
--

CREATE TABLE IF NOT EXISTS `prestamo_libro` (
  `id_prestamo` int(100) NOT NULL AUTO_INCREMENT,
  `fecha_prestamo` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `id_libro` int(10) NOT NULL,
  `id_usuario_estudiante` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  PRIMARY KEY (`id_prestamo`),
  KEY `id_libro` (`id_libro`),
  KEY `id_usuario_estudiante` (`id_usuario_estudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `prestamo_libro`
--

INSERT INTO `prestamo_libro` (`id_prestamo`, `fecha_prestamo`, `fecha_entrega`, `id_libro`, `id_usuario_estudiante`, `estado`) VALUES
(1, '2016-02-07', '2016-02-23', 3, 1, 1),
(2, '2016-02-07', '2016-02-10', 33, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_proveedor`, `direccion`, `telefono`, `email`) VALUES
(1, 'Libreria Gomper', 'Managgua', 234955, 'gomper23@gmail.com'),
(2, 'Libreria Juigalpa', 'Juiglapa', 25498068, 'juanantonio@yahoo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id_subcategoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_subcategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_subcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id_subcategoria`, `nombre_subcategoria`) VALUES
(1, 'C'),
(2, 'C#'),
(3, 'C++'),
(4, 'php'),
(5, 'java'),
(6, 'python'),
(7, 'html'),
(8, 'Javascript');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE IF NOT EXISTS `suscriptores` (
  `id_suscriptor` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(30) DEFAULT NULL,
  `correo` varchar(30) NOT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `fecha_suscripcion` date DEFAULT NULL,
  PRIMARY KEY (`id_suscriptor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id_suscriptor`, `nombre_completo`, `correo`, `observaciones`, `fecha_suscripcion`) VALUES
(2, 'Juan Carlos', 'juan@gmail.com', 'ninguna', '2016-01-08'),
(4, 'Elli', 'elier.aries@gmail.com', 'nada', '2016-01-08'),
(5, 'carlos jose', 'carloslslslsl', 'nada', '2016-01-08'),
(6, 'german', 'german@gmail.com', 'nada', '2016-01-08'),
(9, NULL, 'elier.aries@gmail.com', NULL, '2016-02-05'),
(13, NULL, 'elier.aries@gmail.com', NULL, '2016-02-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(180) DEFAULT NULL,
  `password` varchar(180) DEFAULT NULL,
  `email` varchar(180) DEFAULT NULL,
  `id_extreme` varchar(180) DEFAULT NULL,
  `rol` varchar(15) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `imagen` blob,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `username`, `password`, `email`, `id_extreme`, `rol`, `foto`, `imagen`) VALUES
(10, 'elier', 'elier123', 'elier.aries@gmail.com', NULL, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_estudiante`
--

CREATE TABLE IF NOT EXISTS `usuario_estudiante` (
  `id_usuario_estudiante` int(10) NOT NULL AUTO_INCREMENT,
  `carnet` varchar(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `anio` varchar(10) NOT NULL,
  `carrera` varchar(30) NOT NULL,
  PRIMARY KEY (`id_usuario_estudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuario_estudiante`
--

INSERT INTO `usuario_estudiante` (`id_usuario_estudiante`, `carnet`, `nombre`, `apellidos`, `email`, `anio`, `carrera`) VALUES
(1, '2012-43355', 'Elier', 'Rocha', 'elier.aries@gmail.com', '4to', 'Ingenieria de Sistemas'),
(2, '2012-43356', 'Alex ', 'jarquin', 'alexjqr@gmail.com', '5to.', 'Ingenieria Civil'),
(5, '2012-04050', 'Petrona', 'Davila', 'petronadavilad@hotmail.com', '3ro.', 'Ingenieria Agroindustrial'),
(6, '2012-4356', 'Juan Carlos', 'perez', 'juanperez@gmail.com', '4to.', 'Ingenieria Agroindustrial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `utc` int(10) NOT NULL,
  `fecha_visita` date NOT NULL,
  `ip` varchar(50) NOT NULL,
  `navegador` varchar(255) NOT NULL,
  `pagina` varchar(255) NOT NULL,
  PRIMARY KEY (`utc`),
  UNIQUE KEY `utc` (`utc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`utc`, `fecha_visita`, `ip`, `navegador`, `pagina`) VALUES
(1452812471, '2016-01-14', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '/bibliotecaUNI/index.php'),
(1452812727, '2016-01-14', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '/bibliotecaUNI/index.php'),
(1452812875, '2016-01-14', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', '/bibliotecaUNI/index.php'),
(1452968003, '2016-01-16', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '/bibliotecaUNI/'),
(1452968098, '2016-01-16', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '/bibliotecaUNI/index.php'),
(1453772863, '2016-01-26', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '/BibliotecaUNI/'),
(1453773165, '2016-01-26', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '/BibliotecaUNI/'),
(1453827789, '2016-01-26', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '/BibliotecaUNI/'),
(1453857609, '2016-01-27', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '/BibliotecaUNI/index.php'),
(1453859354, '2016-01-27', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701251, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701288, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701298, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454701305, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701341, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701770, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701822, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701839, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701873, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701902, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701925, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454701934, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454702382, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454702480, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454702484, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454702497, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454702555, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454702664, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454702748, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454702769, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454702825, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454702842, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454702853, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454703154, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454703210, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454703256, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454703308, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454703354, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454703408, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454703599, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454703649, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454703913, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704090, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454704164, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704216, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704235, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704249, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704424, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704471, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704507, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704558, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704645, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704820, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704865, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704885, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454704912, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454708196, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454708560, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454709531, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454710350, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_bd.php'),
(1454710445, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_bd.php'),
(1454710592, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_bd.php'),
(1454710662, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_bd.php'),
(1454710726, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_bd.php'),
(1454710832, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454711173, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454711212, '2016-02-05', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454716913, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454716919, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_web.php'),
(1454716960, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_web.php'),
(1454716991, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_web.php'),
(1454717018, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454717052, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454717172, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454717306, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454717321, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454717330, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454717339, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_bd.php'),
(1454717351, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_web.php'),
(1454717412, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_web.php'),
(1454717442, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454717491, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454719864, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454719872, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454720632, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454720670, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454720680, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454720693, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454720697, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_bd.php'),
(1454720707, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_web.php'),
(1454721023, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_web.php'),
(1454721575, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454721658, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454721717, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454721730, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454722273, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454725114, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454725263, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454726174, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454727071, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454732770, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_sistemas.php'),
(1454732802, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454732856, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454732879, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454736583, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454736599, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454736931, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454737236, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454737308, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454737325, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454737361, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454737382, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454737460, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454737504, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454737533, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454737675, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454737715, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454737821, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454775560, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454783207, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', '/BibliotecaUNI/'),
(1454783261, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', '/BibliotecaUNI/contacto.php'),
(1454783317, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', '/BibliotecaUNI/'),
(1454783322, '2016-02-06', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', '/BibliotecaUNI/'),
(1454862424, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454862431, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454862450, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454862540, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454862545, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454862554, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454862568, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454862585, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454866580, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454879789, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454879794, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454879848, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454879932, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454879982, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454880001, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454880083, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454880108, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454882326, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454882336, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454888953, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/'),
(1454889112, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454889132, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454889215, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454889284, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454889452, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454889586, '2016-02-07', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454889616, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454889634, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454890569, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454890588, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/libros_informatica.php'),
(1454890600, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454890606, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/libros_web.php'),
(1454891074, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454891087, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454891099, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454891567, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454891597, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/contacto.php'),
(1454891617, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/prestamos.php'),
(1454891623, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/index.php'),
(1454891674, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/libros_programacion.php'),
(1454892386, '2016-02-08', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.103 Safari/537.36', '/BibliotecaUNI/index.php');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id_subcategoria`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `pdf`
--
ALTER TABLE `pdf`
  ADD CONSTRAINT `pdf_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`);

--
-- Filtros para la tabla `prestamo_libro`
--
ALTER TABLE `prestamo_libro`
  ADD CONSTRAINT `prestamo_libro_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `prestamo_libro_ibfk_2` FOREIGN KEY (`id_usuario_estudiante`) REFERENCES `usuario_estudiante` (`id_usuario_estudiante`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
