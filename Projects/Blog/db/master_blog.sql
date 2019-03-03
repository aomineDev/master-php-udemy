-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-02-2019 a las 17:51:05
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `master_blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategorias` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategorias`, `nombre_categoria`) VALUES
(1, 'Acción'),
(2, 'Rol'),
(3, 'Deportes'),
(4, 'Puzzle'),
(5, 'MOBA'),
(6, 'MMO RPG'),
(7, 'Estrategia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `identradas` int(11) NOT NULL AUTO_INCREMENT,
  `idusuarios` int(11) NOT NULL,
  `idcategorias` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`identradas`),
  KEY `fk_entradas_usuarios` (`idusuarios`),
  KEY `fk_entradas_categorias` (`idcategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`identradas`, `idusuarios`, `idcategorias`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 1, 1, 'Review de GTA V', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi atque ipsam vel similique sit neque magni natus dicta temporibus, molestias qui animi totam aspernatur possimus dolores accusantium soluta! Ea soluta numquam aliquam doloribus hic, odit iusto cupiditate, excepturi, est recusandae consequuntur voluptatum nisi! Quae rerum nisi, quisquam vitae accusantium ab ad ullam nam, asperiores obcaecati ipsam, velit autem voluptatum commodi reprehenderit. Debitis reprehenderit culpa eum excepturi porro minima sint aperiam, obcaecati aspernatur dignissimos provident at natus incidunt quae praesentium quisquam a, cupiditate amet sapiente sequi, necessitatibus expedita accusantium magni. Sint perferendis, totam temporibus itaque, dicta minus ab dolorem neque repellendus, doloremque vel nisi necessitatibus ut facilis praesentium natus illum impedit deserunt! Consectetur voluptate harum corporis saepe accusantium, doloremque cupiditate atque beatae dolorem reiciendis explicabo sed molestiae fuga fugit praesentium accusamus vel vitae deleniti, asperiores exercitationem placeat molestias, eos! Qui illum, fugiat iste laboriosam possimus maiores tempore laudantium similique, voluptatibus quasi minus aut nemo dicta provident. Rem recusandae cupiditate provident, sunt enim odio expedita! Quo necessitatibus fugiat voluptates mollitia laudantium nam error, enim quibusdam dolore hic veniam odit ullam sapiente ex accusantium ducimus quae eum doloribus ratione nihil temporibus. Quia repellat deleniti veritatis quasi, perspiciatis vel libero? Expedita ullam possimus, quae ipsam enim repellendus tempora hic similique labore obcaecati vel beatae dolorum commodi aut dolorem illum facilis ipsa voluptatibus odit voluptate illo aspernatur, minus quidem, cumque. Quas asperiores praesentium expedita, rem nostrum fugiat nulla adipisci necessitatibus eius quisquam sapiente harum modi, earum accusantium magnam facere vitae deserunt aliquam. Eos, repellendus non.', '2019-01-10'),
(2, 1, 2, 'Novedades de FF VIII', 'Todo sobre FF VIII la verdad nunca lo eh jugado pero algún día :v', '2019-02-03'),
(3, 1, 3, 'Nuevo jugadores de Fifa 2019', 'Review de Fifa 2019', '2019-01-10'),
(4, 2, 1, 'Novedades de Assasins', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, doloremque quos dignissimos magnam porro nam quam, quas odit tenetur sit ipsa facilis mollitia obcaecati animi, aut perspiciatis ab in? Corrupti ipsam reiciendis assumenda deserunt numquam eaque mollitia, commodi est perspiciatis quod officiis expedita aliquid optio tenetur beatae voluptate veniam necessitatibus sint vero! Praesentium aperiam totam, assumenda animi magnam, ipsam optio fugit, ab impedit porro recusandae consequuntur dignissimos deserunt quibusdam sapiente. Asperiores a, consectetur, reprehenderit molestiae, itaque quis nemo quo minima inventore aliquid laborum! Est sequi et, quaerat nostrum reprehenderit animi soluta cumque dignissimos facilis, asperiores exercitationem quia ullam reiciendis, repellat quas accusamus iste dolores. Possimus nihil, quibusdam esse nam commodi qui? Et itaque cupiditate soluta consequuntur tempora quae dolor alias tempore at, culpa, possimus veritatis saepe. Fugit voluptate eligendi pariatur doloribus animi ut iste facilis rerum voluptatum voluptatem iusto quas repudiandae unde qui quisquam nihil, enim temporibus eum possimus natus quae. Beatae doloribus assumenda architecto voluptatum explicabo. Sed omnis harum necessitatibus! Laborum nulla earum asperiores reprehenderit vero eum aliquid voluptas harum officia alias quidem dolor tempora ad autem provident, itaque mollitia suscipit rerum placeat molestias adipisci? Nisi consequatur, pariatur a et, ut, suscipit animi aliquam alias possimus cum vitae omnis dolor porro. Earum saepe reiciendis hic delectus, nesciunt quod odit cupiditate suscipit excepturi. Eveniet consequatur quasi itaque nulla eum laudantium minima molestiae inventore optio corporis deserunt, quas, incidunt odit quo nobis atque repellendus. Quam beatae veritatis, perferendis laborum libero quos. Optio, id, dicta magnam ab eius molestiae officiis totam error!', '2019-01-10'),
(5, 2, 2, 'Novedades de WOW', 'Review de WOW', '2019-01-10'),
(6, 2, 3, 'Novedades de PES 2019', 'Review de PES 2019', '2019-01-10'),
(7, 3, 1, 'Novedades de Call of Duty', 'Review de Call of Duty', '2019-01-10'),
(8, 3, 1, 'Novedades de CS:GO', 'CS:GO Gratuito', '2019-01-10'),
(10, 3, 1, 'Guia de GTA V', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corrupti nihil quis debitis nobis magnam et officiis placeat iste sequi, dolores earum quaerat facere atque, accusantium optio nulla sunt quos quisquam consectetur fugit tempore! Ratione repellat iste veritatis illo, similique esse laboriosam assumenda consequatur nemo temporibus mollitia, aspernatur cum consequuntur magni totam voluptate autem possimus saepe deserunt beatae magnam provident dolorum. Nemo saepe explicabo ut, expedita perferendis nulla quibusdam similique optio accusantium harum iste, ratione cum ducimus delectus tempora dolor quod dolores perspiciatis minus voluptas quae ipsa voluptates repellendus quo! Possimus ipsa dolores autem hic assumenda ipsum eaque illum cupiditate fugit in vitae expedita minus quaerat harum obcaecati, tempore provident ex maiores natus voluptatibus exercitationem atque laudantium, cumque neque quia. Explicabo recusandae adipisci assumenda illum distinctio esse voluptates molestias, expedita quasi quia molestiae similique mollitia non, aliquid veniam animi provident neque repellendus quibusdam, magni. Fugit facere voluptatum provident cum, aliquam, inventore fugiat animi asperiores repellendus earum dolores dicta tenetur id cumque? Cumque illum modi provident illo, officiis nobis odit optio odio! Nesciunt doloribus fuga distinctio accusamus facilis beatae, eum libero harum, soluta ad at, quod, nisi! Dolore laborum vero magni autem reiciendis dolorum laboriosam eaque accusamus tenetur eveniet aut perferendis sit delectus veritatis quis optio aliquid a natus eligendi dicta quod omnis cum, adipisci esse. Porro qui quibusdam nemo voluptatum dignissimos distinctio magni ipsum, laudantium rerum. Id porro, soluta necessitatibus impedit, harum, possimus libero sunt minus reiciendis deleniti dolorem autem. Repellat placeat nesciunt cumque praesentium ab dolores, error voluptatem corrupti.', '2019-01-11'),
(11, 1, 1, 'Call Of Duty Black Ops III', 'The biggest action series of all time returns. Call of Duty®: Black Ops is an entertainment experience that will take you to conflicts across the globe, as elite Black Ops forces fight in the deniable operations and secret wars that occurred under the veil of the Cold War.', '2019-02-03'),
(12, 3, 7, 'Dota auto Chess', 'Dota auto Chess se ha convertido en uno de los juegos mas jugados en steam. con una jugabilidad muy adictiva donde se requiere de skill y suerte.', '2019-01-28'),
(13, 3, 1, 'Ninja GO', 'Un juego sobre ninjas el cual se puede jugar en la plataforma de Facebook. Con una mecánica simple pero muy adictiva se ah convertido en mi mini-juego favorito.', '2019-01-29'),
(14, 1, 5, 'Dota 2 New Event', 'Hace unos días salio un nuevo evento de dota 2 por el año nuevo chino pero que no trae algún modo de juego solo recompensas por jugar partidas normales o rankeds que seria una girada de ruleta', '2019-02-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'contraseña',
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombre`, `apellidos`, `email`, `password`, `fecha_registro`) VALUES
(1, 'aomine-', 'Dai', 'aomine@gmail.com', '$2y$04$3tfStYSmwz7ZdKJTUYIfsO0N.rIeaSnhlHdNQFiHwqH8NbY8KTHS6', '2019-01-29'),
(2, 'Kevin', 'Roland', 'kevin@gmail.com', '$2y$04$AQExG0JPDlaITjtFBd/YGuv4riK0DZhnPB95OLGKB26FK/CrItnWm', '2019-01-29'),
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$04$yC7MH5Ymc7Zkz/eq0ufAZOSpyTONNClNf1e1DamIWfG/dx8/S4tIa', '2019-01-29'),
(4, 'Akashi-', 'Seijuro', 'akashi@gmail.com', '$2y$04$orzVidKiTuPNA8bK74uXiOiznHP1PfaAGKSocqYLm16rzYE89hP7W', '2019-01-29');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entradas_categorias` FOREIGN KEY (`idcategorias`) REFERENCES `categorias` (`idcategorias`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_entradas_usuarios` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
