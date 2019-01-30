-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2019 a las 09:22:57
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `movilelx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `label`, `valor`, `producto_id`) VALUES
(8, 'Sistema operativo', 'Android 8.0', 61),
(9, 'Procesador', 'Exynos 9810 (8 x 2.7 GHz)', 61),
(10, 'Capacidad memoria', '64 GB', 61),
(11, 'Tipo de pantalla', '5.8&quot; Super AMOLED QHD+', 61),
(12, 'Almacenamiento/RAM', '64 GB (Admite SD) / 4 GB', 61),
(13, 'Cámara tras./frontal', '12 Megapíxeles / 8 Megapíxeles', 61),
(14, 'Capacidad máxima SD', '400 GB', 61),
(15, 'Sistema operativo', 'Android 8.0', 62),
(16, 'Procesador', 'Octa Core 2.2 GHz', 62),
(17, 'Capacidad memoria', '64 GB', 62),
(18, 'Memoria RAM', '4 GB', 62),
(19, 'Tipo de pantalla', '6&quot; Super AMOLED Full HD+', 62),
(20, 'Almacenamiento/RAM', '64 GB (Admite SD) / 4 GB', 62),
(21, 'Cámara tras./frontal', 'Tri-Càmera 24 + 5 + 8 Megapíxeles / 24 Megapíxeles', 62),
(22, 'Sistema operativo', 'Android 8.0', 63),
(23, 'Procesador', 'Snapdragon 660 (8 x 2.2 GHz)', 63),
(24, 'Capacidad memoria', '120 GB', 63),
(25, 'Memoria RAM', '6 GB', 63),
(26, 'Tipo de pantalla', '6.3&quot; Full HD+', 63),
(27, 'Almacenamiento/RAM', '128 GB (Admite SD) / 6 GB', 63),
(28, 'Cámara tras./frontal', '24 + 5 + 10 + 8 Megapíxeles / 24 Megapíxeles', 63),
(29, 'Sistema operativo', 'Android', 64),
(30, 'Procesador', 'Exynos 9810 (8 x 2.7 GHz)', 64),
(31, 'Tipo de pantalla', 'Super Amoled', 64),
(32, 'Almacenamiento/RAM', '128 GB (Admite SD) / 6 GB', 64),
(33, 'Cámara tras./frontal', 'Dual 12 Megapíxeles / 8 Megapíxeles', 64),
(34, 'Capacidad máxima SD', '512 GB', 64),
(35, 'Sistema operativo', 'Exynos 9810 (8 x 2.7 GHz)', 65),
(36, 'Procesador', 'Exynos 9810 (8 x 2.7 GHz)', 65),
(37, 'Tipo de pantalla', 'Super Amoled', 65),
(38, 'Almacenamiento/RAM', '128 GB (Admite SD) / 6 GB', 65),
(39, 'Cámara tras./frontal', 'Dual 12 Megapíxeles / 8 Megapíxeles', 65),
(40, 'Capacidad máxima SD', '512 GB', 65),
(41, 'Sistema operativo', 'Android 8.0', 66),
(42, 'Procesador', 'Exynos 9810 (8 x 2.7 GHz)', 66),
(43, 'Capacidad memoria', '64 GB', 66),
(44, 'Tipo de pantalla', '5.8&quot; Super AMOLED QHD+', 66),
(45, 'Almacenamiento/RAM', '64 GB (Admite SD) / 4 GB', 66),
(46, 'Cámara tras./frontal', '12 Megapíxeles / 8 Megapíxeles', 66),
(47, 'Capacidad máxima SD', '400 GB', 66),
(48, 'Sistema operativo', 'Android 7.0', 67),
(49, 'Procesador', 'Exynos 7885 (8 x 2.2 GHz)', 67),
(50, 'Tipo de pantalla', '5.6&quot; Super AMOLED Full HD+', 67),
(51, 'Almacenamiento/RAM', '32 GB/4GB', 67),
(52, 'Cámara tras./frontal', '16 Megapíxeles / Dual 16 + 8 Megapíxeles', 67),
(53, 'Sensores', 'Acelerómetro, Barómetro, Fingerprint, Giroscopio, Geomagnético, Hall, Sensor Luz RGB, Proximidad', 67),
(54, 'Sistema operativo', 'Android™ Nougat', 68),
(55, 'Procesador', 'Qualcomm® Snapdragon™ 430 Unidad de ocho cores', 68),
(56, 'Tipo de pantalla', '5,5” IPS LCD Full-HD (1920x1080, 16:9) Pantalla de Corning® Gorilla®', 68),
(57, 'Cámara tras./frontal', '16 Megapíxeles/8MP', 68),
(58, 'Sistema operativo', 'Android Oreo', 69),
(59, 'Procesador', 'MT6750N Octa-core 1,5Ghz', 69),
(60, 'Almacenamiento/RAM', '16GB/ 2 GB', 69),
(61, 'Tipo de pantalla', '5,2&quot; HD+, 2,5D Gorilla Glass', 69),
(62, 'Sistema operativo', 'Android Oreo', 70),
(63, 'Procesador', 'Qualcomm Snapdragon 660 2,2 GHz Octacore', 70),
(64, 'Tipo de pantalla', 'IPS LCD 6&quot; Full HD+ (2160 x 1080) 18:9 con Corning Gorilla Glass', 70),
(65, 'Cámara tras./frontal', '12 Megapíxeles / 16 Mp ZEISS', 70),
(66, 'Capacidad memoria', '64GB / 4GB RAM / Ampliable hasta 256GB vía micro SD', 70),
(67, 'Sistema operativo', 'Android 7.1', 71),
(68, 'Procesador', 'Qualcomm MSM8940 (8 x 1.4 GHz)', 71),
(69, 'Capacidad memoria/ram', '32 GB (Admite SD) / 3 GB', 71),
(70, 'Tipo de pantalla', '5.6 LED Full HD', 71),
(71, 'Cámara tras./frontal', '13 Megapíxeles / 5 Megapíxeles', 71),
(72, 'Sistema operativo', 'Android 8.0', 72),
(73, 'Tipo de pantalla', 'IPS LCD 5.6&quot; Full HD+ (2160 x 1080) 18:9 con Corning Gorilla Glass', 72),
(74, 'Capacidad memoria/ram', '64 GB/4 GB', 72),
(75, 'Tipo', 'LED UHD 4K - 55&quot;', 73),
(76, 'Tamaño pantalla (cm)', '138 cm', 73),
(77, 'Diseño Pantalla', 'Plano', 73),
(78, 'Calidad imagen', 'UHD 4K', 73),
(79, 'Procesador', 'Quad Core', 73),
(80, 'Tipo', 'QLED 4K', 75),
(81, 'Tamaño pantalla (cm)', '163 cm', 75),
(82, 'Calidad de imagen', 'UHD 4K 65&quot;', 75),
(83, 'Sistema operativo', 'Samsung Smart TV', 75),
(84, 'Tipo', 'QLED UHD 4K - 49&quot;', 76),
(85, 'Tamaño pantalla (cm)', '123 cm', 76),
(86, 'Tamaño pantalla (pulgadas)', '49&quot; pulgadas', 76),
(87, 'Calidad de imagen', 'UHD 4K', 76),
(88, 'Procesador', 'Q Engine', 76),
(89, 'Tipo', 'OLED UHD 4K - 55&quot;', 77),
(90, 'Tamaño pantalla (cm)', '139 cm', 77),
(91, 'Tamaño pantalla (pulgadas)', '55 &quot;', 77),
(92, 'Calidad de imagen', 'UHD 4K', 77),
(93, 'Sistema operativo', 'Compatible Google Assistant &amp; Home (Actualización Requerida)', 77),
(94, 'Procesador', 'QuadCore', 77),
(95, 'Tipo', 'OLED UHD 4K - 55&quot;', 78),
(96, 'Tamaño pantalla (cm)', '139 cm', 78),
(97, 'Tamaño pantalla (pulgadas)', '55 &quot;', 78),
(98, 'Calidad de imagen', 'UHD 4K', 78),
(99, 'Procesador', 'QuadCore', 78),
(100, 'Sistema operativo', 'Compatible Google Assistant &amp; Home (Actualización Requerida)', 78),
(101, 'lorem', '12mp', 79),
(102, 'ipsum', '125gb', 79),
(103, 'dolor', '1ghz', 79),
(104, 'otro', 'nada', 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `producto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text,
  `padre_id` int(11) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `padre_id`, `activo`) VALUES
(9, 'Moviles', '', 0, 1),
(10, 'Samsung', 'Descubre mejores móviles de la marca samsung en nuestra tienda', 9, 1),
(11, 'Nokia', 'descubre los últimos smartphones de la gama Nokia ', 9, 1),
(12, 'Lg', 'Descubre los mejores telefonos de la marca Lg ', 9, 1),
(13, 'Televisores', 'descubre los mejores televisores en movilelx', 0, 1),
(14, 'Samsung', 'Descubre mejores televisores de la marca samsung en nuestra tienda', 13, 1),
(15, 'Lg', 'Descubre mejores televisores de la marca Lg en nuestra tienda', 13, 1),
(18, 'Otros', 'varios productos de la tienda', 0, 1),
(19, 'fundas para smartphones', 'fundas para smartfones', 18, 1),
(20, 'teste', 'lorem ipsum', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedido`
--

CREATE TABLE `linea_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_recep` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea_pedido`
--

INSERT INTO `linea_pedido` (`id`, `pedido_id`, `producto_id`, `precio_compra`, `cantidad`, `fecha_recep`) VALUES
(42, 29, 61, 600, 1, NULL),
(43, 29, 62, 350, 1, NULL),
(44, 29, 65, 900, 1, NULL),
(45, 30, 73, 520, 1, NULL),
(46, 30, 75, 2350, 1, NULL),
(47, 31, 62, 350, 1, NULL),
(48, 32, 63, 480, 1, NULL),
(49, 33, 61, 1200, 2, NULL),
(50, 33, 62, 350, 1, NULL),
(51, 34, 75, 2350, 1, NULL),
(52, 34, 74, 340, 1, NULL),
(53, 34, 73, 520, 1, NULL),
(70, 48, 62, 350, 1, NULL),
(71, 48, 63, 480, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `usuario_id`, `estado`, `fecha`) VALUES
(29, 48, 1, '2019-01-13'),
(30, 55, 0, '2019-01-13'),
(31, 56, 2, '2019-01-13'),
(32, 48, 0, '2019-01-15'),
(33, 48, 0, '2019-01-16'),
(34, 48, 0, '2019-01-16'),
(48, 48, 0, '2019-01-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text,
  `precio` float DEFAULT NULL,
  `imagen` varchar(250) DEFAULT 'no_image.jpg',
  `active` tinyint(1) NOT NULL,
  `es_oferta` int(11) NOT NULL DEFAULT '0',
  `tipo_oferta` int(11) NOT NULL DEFAULT '0',
  `precio_reducido` decimal(10,0) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `active`, `es_oferta`, `tipo_oferta`, `precio_reducido`, `categoria_id`, `created_at`, `updated_at`) VALUES
(61, 'Samsung Galaxy S9, 5.8', 'Desde las estrellas llega el móvil Samsung Galaxy S9 Dual SIM en color negro repleto de prestaciones para ofrecerte una muy buena experiencia y hacer que asciendas hasta el cielo y más allá. La pantalla sin bordes de este smartphone ocupará toda la palma de tu mano y te permitirá disfrutar de tu contenido y aplicaciones favoritas. Además, podrás enviar a tus amigos y familiares emoticonos animados con los AR Emoji. Y estas son sólo unas pocas características.\r\n&lt;h4 class=&quot;color-orange&quot;&gt;¡Velocidad interestelar!&lt;/h4&gt;\r\nEl Samsung Galaxy S9 incorpora un procesador de 10nm y ocho núcleos que permiten al teléfono móvil funcionar con una gran potencia sin consumir tanto. Estas dos características, sumadas a los 4 GB de RAM, te proporcionarán una velocidad de vértigo para utilizar tus aplicaciones y realizar todo tipo de tareas. Además, podrás guardar todos tus fotos, vídeos, archivos e instalar una gran cantidad de aplicaciones en los 64 GB de almacenamiento, ampliables hasta 256 GB con una tarjeta MicroSD.\r\n&lt;h4 class=&quot;color-orange&quot;&gt;5.8 pulgadas de infinitud &lt;/h4&gt;\r\nMira tus fotos, vídeos y todo lo que quieras en su pantalla de 5.8&quot;&quot; Curva Super AMOLED. Esta pantalla te ofrece una gran nitidez y una alta resolución con la que no se te escapará ningún detalle. Pero no sólo podrás ver imágenes espectaculares, sino que también podrás escucharlas con un audio de calidad gracias a sus altavoces estéreo. Y no te preocupes por el consumo de la pantalla, ya que el smartphone está equipado con una batería de 3000 mAh que te permitirá usarlo durante horas y horas sin tener que preocuparte. \r\n&lt;h4 class=&quot;color-orange&quot;&gt;Una cámara de otra galaxia&lt;/h4&gt;\r\nEl móvil incorpora una cámara trasera de 12 MP para que captures cada momento con total precisión. Tiene una apertura de f/1.5 que permite que entre mucha luz en el sensor Dual Píxel, por lo que podrás hacer fotografías en condiciones de luz muy bajas. Además, gracias al estabilizador de imagen OIS, la imagen se corregirá si está ligeramente movida. Pero es que la cosa no acaba aquí. También podrás grabar vídeos en Super Slow-mo a 960 fps. Y si lo tuyo son los selfies, el Samsung Galaxy S9 tiene una cámara frontal de 8 MP con una apertura de f/1.7 y autofocus.\r\n&lt;h4 class=&quot;color-orange&quot;&gt;Diviértete enviando emojis&lt;/h4&gt;\r\nUna de las características más singulares de este smartphone son los AR Emoji. Con esta función podrás grabarte y convertirte en un emoticono, pasarlo a GIF y enviarlo a tus familiares y amigos por cualquier aplicación de mensajería o por las redes sociales. Y no te preocupes si enviando un emoticono animado tienes un accidente y se te cae al agua, ya que este smartphone de Samsung tiene resistencia al agua y el polvo (IP68) para acompañarte en tus aventuras y ayudarte a conservar tus recuerdos hasta el fin de los tiempos.', 600, 'samsung_galaxy_s9_negro.jpg', 1, 0, 0, NULL, 10, '2019-01-12', '2019-01-16'),
(62, 'Samsung Galaxy A7 dorado', 'Disfruta de las nuevas ventajas que te ofrece samsung, con su nuevo smartphone Galaxy A7, que incorpora excelentes funcionalidades y aumento de técnologias que te ayudarán a realizar tus tareas favoritas y a gestionar tus redes sociales.\r\n<h4 class=\"color-orange\">Triple cámara para todo</h4>\r\nNo importa dónde se encuentre y lo que esté experimentando en este momento: con el Samsung Galaxy A7 (2018) siempre lleva consigo su triple cámara. La cámara principal está equipada con una lente de 120 °, que captura un ángulo de visión particularmente amplio de 24 MP. Puede utilizar el efecto bokeh para regular el desenfoque del fondo, colocando a los sujetos al frente. Incluso en condiciones de poca luz, tener éxito en imágenes de alto contraste. Así es como grabas todos los aspectos más destacados de tu noche de fiesta.\r\n<h4 class=\"color-orange\">Almacenamiento Ampliable</h4>\r\nNo solo las fotos y los videos del Samsung Galaxy A7 (2018) son impresionantes, sino que el teléfono inteligente en sí también llama la atención gracias a su dorso brillante y se convierte en un accesorio elegante. Un montón de espacio para sus grabaciones, música, juegos y aplicaciones ofrece los 64 GB de memoria. Con una tarjeta microSD, puede expandirse adicionalmente hasta 512 GB. Además de la ranura para la tarjeta de memoria, hay dos más para cada tarjeta SIM.\r\n<h4 class=\"color-orange\">Protección que necesitas</h4>\r\nCon el Samsung Galaxy A7 (2018), sus datos están a salvo de miradas indiscretas. Desbloquea el smartphone con tu huella dactilar. El escáner correspondiente está ubicado en el botón de encendido en el borde lateral de la carcasa y, por lo tanto, es particularmente fácil de alcanzar. Pero incluso con la pantalla desbloqueada, sus archivos están protegidos si los coloca en una carpeta segura. Solo tú puedes acceder a ellos, los usuarios extranjeros no tienen acceso.', 350, 'comprar-samsung-Galaxy-A7-dorado.png', 1, 1, 1, '320', 10, '2019-01-12', '2019-01-24'),
(63, 'Samsung Galaxy A9 Azul', ' ¿Creías que un teléfono no podía contar con 4 cámaras? Pues ahora ya tioenes la prueba física de ello con el Samsung Galaxy A9 que, además, está dispuesto a proporcionarte un rendimiento de nivel.\r\n<h4 class=\"color-orange\">El primer smartphone con 4 cámaras</h4>\r\nPrepárate para inmortalizar aquellos paisajes y momentos que tanto te gustaría recordar con la quad camera trasera de 25 + 10 + 8 + 5 MP con unas aperturas que varian de f1.7 a f/2.4 con flash incorporado. Y si eres un amante de los selfies, podrás hacerlas en una calidad total gracias a su cámara frontal de 24 MP con flash.\r\n<h4 class=\"color-orange\">Rendimiento multiplicado por ocho</h4>\r\nSi te preocupa la velocidad de tu móvil, este smartphone Dual Sim te asegura una buena velocidad con su procesador Octa-Core de 1.8 GHz. Y no solo esto, sino que la memoria RAM de 6 GB te permitirá utilizar diferentes aplicaciones manteniendo el mismo rendimiento.\r\n<h4 class=\"color-orange\">Más que Full HD</h4>\r\nNo te conformes con mirar tus imágenes y vídeos en resolución Full HD si aspiras a más. Con la pantalla Infinity de 6.3 pulgadas del móvil Samsung Galaxy A9 podrás observarlo todo con total precisión y en alta calidad gracias a la tecnología Super AMOLED y la resolución Full HD+ (2220 x 1080).\r\n<h4 class=\"color-orange\">Espacio para todo</h4>\r\nPodrás guardar tus fotos y vídeos, así como aquellos archivos que quieras descargarte gracias a la memoria interna de 128 GB. ¿Qué no tienes suficiente? Ningún problema porque puedes insertar una tarjeta microSD para ampliar el espacio hasta los 512 GB. ¡No será por gigas de memoria!\r\n<h4 class=\"color-orange\">Batería duradera</h4>\r\n¿Odias llegar al mediodía con un 15% de batería? Los 3800 mAh de capacidad de la batería del móvil Samsung Galaxy A9 te permitirán afrontar un día y más con el móvil en funcionamiento sin necesidad de cargarlo. ', 480, 'comprar-samsung-galaxy-A9-azul.png', 1, 1, 1, '450', 10, '2019-01-12', '2019-01-24'),
(64, 'Samsung Galaxy Note 9, 6.4\"', 'La revolución ya está aquí y tiene forma de smartphone. Ya te puedes agarrar bien fuerte porque el móvil Samsung Galaxy Note 9 en color negro te sorprenderá con unas prestaciones que no te dejarán indiferente. Desde su procesador Octa-core hasta su memoria interna y otros tantos componentes que te garantizan un funcionamiento del más alto nivel.\r\n<h4 class=\"color-orange\">Descubre el S Pen. Dibuja y anota </h4>\r\nDibuja y comunícate con tus amigos mediante el S Pen. Podrás crear mensajes animados y emojis parecidos a ti, así como dibujar en la pantalla. Deja que Pen-up te enseñe y sorpréndete. Además, descubre Screen Off Memo y toma tus notas sin necesidad de desbloquear el Samsung Galaxy Note 9. Con Samsung Notes podrás añadir las fotos y notas de voz que necesites para tenerlo todo en un mismo sitio.\r\n<h4 class=\"color-orange\">Siempre conectado</h4>\r\nDescubre una manera original para comunicarte con los tuyos con Live Message y AR Emoji y crea mensajes animados y emojis que se mueven y hablan como tú. \r\n<h4 class=\"color-orange\">Como un diseñador</h4>\r\nTrabaja con mayor precisión que la de un ratón y realiza tus elaboraciones con DeX, que te permitirá conectar tu Samsung Galaxy Note 9 a un monitor.\r\n<h4 class=\"color-orange\">A distancia</h4>\r\nAprovéchate de todas las ventajas del S Pen y maneja la cámara, tus playlists y presentaciones mediante control remoto. Y no solo eso, sino que podrás acceder a todas tus funciones mediante el menú propio personalizable Air Command.\r\n<h4 class=\"color-orange\">Funcionalidad de altos vuelos. Velocidad y potencia garantizadas</h4>\r\nPrepárate porque la rapidez de este teléfono la has visto pocas veces. El rendimiento que te asegura tiene nombre: Exynos 9810. Este procesador de ocho núcleos cuenta con una velocidad de 2.7 GHz y 1.7 GHz, pero eso no es todo. Además, con la conectividad LTE podrás disfrutar de tus películas y series en 4K.\r\n<h4 class=\"color-orange\">Pantalla de grandes dimensiones</h4>\r\nSi hasta ahora estabas acostumbrado a pantallas de móvil que no superaban las 6 pulgadas, esta es la excepción. El móvil Samsung Galaxy Note 9 incorpora una pantalla Super Amoled de 6.4 pulgadas que te permitirá mirar tus vídeos y fotos a lo grande. Y no solo eso. Su resolución Quad HD+ (2960 x 1440) te garantiza una calidad de imagen de altos vuelos.\r\n<h4 class=\"color-orange\">Más de 100 GB de memoria</h4>\r\n¿Tus fotos y vídeos están tan mejorados que pesan más de lo normal? La memoria interna de este teléfono no va a ser ningún problema porque cuenta con hasta 128 GB para que lo guardes absolutamente todo. Además, el smartphone cuenta con una memoria RAM de nada más y nada menos que 6 GB, por lo que tus aplicaciones funcionarán a toda velocidad.\r\n<h4 class=\"color-orange\">Carga rápida y para todo el día</h4>\r\nNo dejes de disfrutar de todo lo que te ofrece el smartphone Samsung Galaxy Note 9 gracias a su batería de 4000 mAh de capacidad. A prueba de largas jornadas de trabajo y largas sesiones de series y juegos. Y si se te está acabando la carga, aprovéchate de la función Fast Charging para llenar la batería en un momento o activa Wireless Fast Charging para una carga rápida e inalámbrica.\r\n<h4 class=\"color-orange\">Tecnología Galaxy. Contra polvo y agua</h4>\r\nLa seguridad y la resistencia son dos de los puntos clave de este móvil gracias a su índice de protección IP68 que lo hace resistente al polvo y al agua. No importará que el móvil suene mientras estás en la piscina o llueve porque podrás responder a cualquier llamada.', 900, 'comprar_samsung_galaxy_note_9_negro_1.jpg', 1, 0, 0, NULL, 10, '2019-01-12', NULL),
(65, 'Samsung Galaxy Note 9, 6.4 Azul', 'La revolución ya está aquí y tiene forma de smartphone. Ya te puedes agarrar bien fuerte porque el móvil Samsung Galaxy Note 9 en color negro te sorprenderá con unas prestaciones que no te dejarán indiferente. Desde su procesador Octa-core hasta su memoria interna y otros tantos componentes que te garantizan un funcionamiento del más alto nivel.\r\n<h4 class=\"color-orange\">Descubre el S Pen. Dibuja y anota </h4>\r\nDibuja y comunícate con tus amigos mediante el S Pen. Podrás crear mensajes animados y emojis parecidos a ti, así como dibujar en la pantalla. Deja que Pen-up te enseñe y sorpréndete. Además, descubre Screen Off Memo y toma tus notas sin necesidad de desbloquear el Samsung Galaxy Note 9. Con Samsung Notes podrás añadir las fotos y notas de voz que necesites para tenerlo todo en un mismo sitio.\r\n<h4 class=\"color-orange\">Siempre conectado</h4>\r\nDescubre una manera original para comunicarte con los tuyos con Live Message y AR Emoji y crea mensajes animados y emojis que se mueven y hablan como tú. \r\n<h4 class=\"color-orange\">Como un diseñador</h4>\r\nTrabaja con mayor precisión que la de un ratón y realiza tus elaboraciones con DeX, que te permitirá conectar tu Samsung Galaxy Note 9 a un monitor.\r\n<h4 class=\"color-orange\">A distancia</h4>\r\nAprovéchate de todas las ventajas del S Pen y maneja la cámara, tus playlists y presentaciones mediante control remoto. Y no solo eso, sino que podrás acceder a todas tus funciones mediante el menú propio personalizable Air Command.\r\n<h4 class=\"color-orange\">Funcionalidad de altos vuelos. Velocidad y potencia garantizadas</h4>\r\nPrepárate porque la rapidez de este teléfono la has visto pocas veces. El rendimiento que te asegura tiene nombre: Exynos 9810. Este procesador de ocho núcleos cuenta con una velocidad de 2.7 GHz y 1.7 GHz, pero eso no es todo. Además, con la conectividad LTE podrás disfrutar de tus películas y series en 4K.\r\n<h4 class=\"color-orange\">Pantalla de grandes dimensiones</h4>\r\nSi hasta ahora estabas acostumbrado a pantallas de móvil que no superaban las 6 pulgadas, esta es la excepción. El móvil Samsung Galaxy Note 9 incorpora una pantalla Super Amoled de 6.4 pulgadas que te permitirá mirar tus vídeos y fotos a lo grande. Y no solo eso. Su resolución Quad HD+ (2960 x 1440) te garantiza una calidad de imagen de altos vuelos.\r\n<h4 class=\"color-orange\">Más de 100 GB de memoria</h4>\r\n¿Tus fotos y vídeos están tan mejorados que pesan más de lo normal? La memoria interna de este teléfono no va a ser ningún problema porque cuenta con hasta 128 GB para que lo guardes absolutamente todo. Además, el smartphone cuenta con una memoria RAM de nada más y nada menos que 6 GB, por lo que tus aplicaciones funcionarán a toda velocidad.\r\n<h4 class=\"color-orange\">Carga rápida y para todo el día</h4>\r\nNo dejes de disfrutar de todo lo que te ofrece el smartphone Samsung Galaxy Note 9 gracias a su batería de 4000 mAh de capacidad. A prueba de largas jornadas de trabajo y largas sesiones de series y juegos. Y si se te está acabando la carga, aprovéchate de la función Fast Charging para llenar la batería en un momento o activa Wireless Fast Charging para una carga rápida e inalámbrica.\r\n<h4 class=\"color-orange\">Tecnología Galaxy. Contra polvo y agua</h4>\r\nLa seguridad y la resistencia son dos de los puntos clave de este móvil gracias a su índice de protección IP68 que lo hace resistente al polvo y al agua. No importará que el móvil suene mientras estás en la piscina o llueve porque podrás responder a cualquier llamada.', 900, 'comprar_samsung_galaxy_note_9_azul.jpg', 1, 0, 0, NULL, 10, '2019-01-12', NULL),
(66, 'Samsung Galaxy S9, 5.8 Dorado', 'Desde las estrellas llega el móvil Samsung Galaxy S9 Dual SIM en color negro repleto de prestaciones para ofrecerte una muy buena experiencia y hacer que asciendas hasta el cielo y más allá. La pantalla sin bordes de este smartphone ocupará toda la palma de tu mano y te permitirá disfrutar de tu contenido y aplicaciones favoritas. Además, podrás enviar a tus amigos y familiares emoticonos animados con los AR Emoji. Y estas son sólo unas pocas características.\r\n<h4 class=\"color-orange\">¡Velocidad interestelar!</h4>\r\nEl Samsung Galaxy S9 incorpora un procesador de 10nm y ocho núcleos que permiten al teléfono móvil funcionar con una gran potencia sin consumir tanto. Estas dos características, sumadas a los 4 GB de RAM, te proporcionarán una velocidad de vértigo para utilizar tus aplicaciones y realizar todo tipo de tareas. Además, podrás guardar todos tus fotos, vídeos, archivos e instalar una gran cantidad de aplicaciones en los 64 GB de almacenamiento, ampliables hasta 256 GB con una tarjeta MicroSD.\r\n<h4 class=\"color-orange\">5.8 pulgadas de infinitud </h4>\r\nMira tus fotos, vídeos y todo lo que quieras en su pantalla de 5.8\"\" Curva Super AMOLED. Esta pantalla te ofrece una gran nitidez y una alta resolución con la que no se te escapará ningún detalle. Pero no sólo podrás ver imágenes espectaculares, sino que también podrás escucharlas con un audio de calidad gracias a sus altavoces estéreo. Y no te preocupes por el consumo de la pantalla, ya que el smartphone está equipado con una batería de 3000 mAh que te permitirá usarlo durante horas y horas sin tener que preocuparte. \r\n<h4 class=\"color-orange\">Una cámara de otra galaxia</h4>\r\nEl móvil incorpora una cámara trasera de 12 MP para que captures cada momento con total precisión. Tiene una apertura de f/1.5 que permite que entre mucha luz en el sensor Dual Píxel, por lo que podrás hacer fotografías en condiciones de luz muy bajas. Además, gracias al estabilizador de imagen OIS, la imagen se corregirá si está ligeramente movida. Pero es que la cosa no acaba aquí. También podrás grabar vídeos en Super Slow-mo a 960 fps. Y si lo tuyo son los selfies, el Samsung Galaxy S9 tiene una cámara frontal de 8 MP con una apertura de f/1.7 y autofocus.\r\n<h4 class=\"color-orange\">Diviértete enviando emojis</h4>\r\nUna de las características más singulares de este smartphone son los AR Emoji. Con esta función podrás grabarte y convertirte en un emoticono, pasarlo a GIF y enviarlo a tus familiares y amigos por cualquier aplicación de mensajería o por las redes sociales. Y no te preocupes si enviando un emoticono animado tienes un accidente y se te cae al agua, ya que este smartphone de Samsung tiene resistencia al agua y el polvo (IP68) para acompañarte en tus aventuras y ayudarte a conservar tus recuerdos hasta el fin de los tiempos.', 600, 'comprar_samsung_galaxy_s9_oro.jpg', 1, 0, 0, NULL, 10, '2019-01-12', NULL),
(67, 'Samsung Galaxy A8, 5.6\" Negro', ' Descubre todas las ventajas que te ofrece samsung con su Galaxy A8, está dispuesto a proporcionarte un rendimiento de nivel. Cuenta con reconocimiento facial y lector de huella para que solo tú accedas al teléfono.\r\n<h4 class=\"color-orange\">Procesador muy potente</h4>\r\nSi te preocupa la velocidad de tu móvil, este smartphone Dual Sim te asegura una buena velocidad con su procesador Octa-Core de 1.6 GHz, hasta 2.2 GHz. Y no solo esto, sino que la memoria RAM te permitirá utilizar diferentes aplicaciones manteniendo el mismo rendimiento.\r\n<h4 class=\"color-orange\">Calidad de imágenes</h4>\r\nNo te conformes con mirar tus imágenes y vídeos en resolución HD si aspiras a más. Con la pantalla de 5.6 pulgadas del móvil Samsung Galaxy A8 podrás observarlo todo con total precisión y en alta calidad gracias a la tecnología Super AMOLED y la resolución FHD+ (2220 x 1080).\r\n<h4 class=\"color-orange\">Espacio para tus archivos</h4>\r\nPodrás guardar tus fotos y vídeos, así como aquellos archivos que quieras descargarte gracias a la memoria interna de 32 GB. ¿Qué no tienes suficiente? Ningún problema porque puedes insertar una tarjeta microSD para ampliar el espacio hasta los 400 GB. ¡No será por gigas de memoria!\r\n<h4 class=\"color-orange\">Fotos con alta definición</h4>\r\nPrepárate para inmortalizar aquellos paisajes y momentos que tanto te gustaría recordar con la cámara trasera de 16 MP con flash y una apertura de f1.9. Y si eres un amante de los selfies, podrás hacerlos en alta calidad gracias a su cámara frontal.', 310, 'samsung_galaxy_a8_2018_negro.jpg', 1, 0, 0, NULL, 10, '2019-01-12', NULL),
(68, 'Nokia 6 Negro 5.5\"', '<h4 class=\"color-orange\">Diseñado para ser perfecto, fabricado para durar</h4>\r\nNokia 6 continúa nuestra tradición de diseño: tiene un diseño llimpio, un exterior suave de metal y detalles precisos; puedes elegir entre cinco colores.\r\n<h4 class=\"color-orange\">Hecho para durar</h4>\r\nEl cuerpo de Nokia 6 está realizado a partir de una pieza de aluminio con laminado de precisión. La máquina tarda 55 minutos en fabricarlo a partir de un bloque sólido de metal. Al igual que la pantalla de Corning® Gorilla® Glass esculpido, está hecho con materiales capaces de afrontar los desafíos más duros.\r\n<h4 class=\"color-orange\">Smartphones para vivir la vida como tú la vives</h4>\r\nLos teléfonos Nokia han sido durante décadas sinónimo de diseño artesanal y excelente calidad. Este móvil no es diferente: se ha creado para enfrentarse a la vida tal como lo conoces, con materiales atractivos y duraderos, agradable tacto y un equilibrio perfecto entre rendimiento y duración de la batería.\r\nY, aún mejor, tu móvil Nokia estará siempre seguro y al día con las actualizaciones regulares de software.\r\n<h4 class=\"color-orange\">Imagen y texto en una pantalla grande y brillante</h4>\r\nLa pantalla full HD de 5,5” y la amplia reproducción cromática color harán que disfrutes más tus momentos de ocio, incluso en exteriores a pleno sol. Y el gran ángulo de visión te permite ver vídeos con los amigos.\r\n<h4 class=\"color-orange\">Entretenimiento inmersivo</h4>\r\nCon el doble altavoz y el amplificador de Nokia 6, conseguirás volumen, graves profundos y mucha claridad. Incluye sonido Dolby Atmos® certificado.\r\n<h4 class=\"color-orange\">Documenta tu vida con la cámara de 16 MP</h4>\r\nSacar fotos de tus momentos favoritos es fácil con la aplicación de cámara de Nokia 6. Cuenta con una cámara trasera con autofocus y detección de fase de 16 MP y una cámara frontal de 8 MP. Además, el flash de doble tono de la cámara principal te ayuda a sacar fotos naturales incluso con poca luz.\r\n<h4 class=\"color-orange\">Puro, seguro y actualizado</h4>\r\nNokia 6 incluye Android Nougat, con toda la gama de Google Services y sin extras innecesarios. Disfrutarás de una experiencia sin capas extras y nos aseguraremos de que tengas actualizaciones regulares, para que siempre estés a la última en características y seguridad ', 160, 'comprar_nokia_6_2018_negro.jpg', 1, 0, 0, NULL, 11, '2019-01-12', NULL),
(69, 'Nokia 3.1 5,2\" 16GB Blanco cobre Dual SIM', 'El Nokia 3 llega como el smartphone Android más económico de Nokia y cuenta con una pantalla HD de 5 pulgadas, procesador MediaTek quad-core a 1.3GHz, 2GB de RAM, 16GB de almacenamiento interno expandible, cámaras de 8 megapixels tanto al frente como atrás, chasis de policarbonato, batería de 2630 mAh y Android 7.0 Nougat.\r\n<h4 class=\"color-orange\">Diseñado para ser perfecto, fabricado para durar</h4>\r\nNokia 3 continúa nuestra tradición de diseño: tiene un diseño llimpio, un exterior suave de metal y detalles precisos; puedes elegir entre cinco colores.\r\n<h4 class=\"color-orange\">Hecho para durar</h4>\r\nEl cuerpo de Nokia 3 está realizado a partir de una pieza de aluminio con laminado de precisión. La máquina tarda 55 minutos en fabricarlo a partir de un bloque sólido de metal. Al igual que la pantalla de Corning® Gorilla® Glass esculpido, está hecho con materiales capaces de afrontar los desafíos más duros.\r\n<h4 class=\"color-orange\">Smartphones para vivir la vida como tú la vives</h4>\r\nLos teléfonos Nokia han sido durante décadas sinónimo de diseño artesanal y excelente calidad. Este móvil no es diferente: se ha creado para enfrentarse a la vida tal como lo conoces, con materiales atractivos y duraderos, agradable tacto y un equilibrio perfecto entre rendimiento y duración de la batería.\r\nY, aún mejor, tu móvil Nokia estará siempre seguro y al día con las actualizaciones regulares de software.', 100, 'comprar_nokia_3_blanco_cobre.jpg', 1, 0, 0, NULL, 11, '2019-01-12', NULL),
(70, 'Nokia 7 negro', 'El Nokia 7 plus, mecanizado a partir de un único bloque de aluminio de serie 6000, es un teléfono resistente y con estilo.\r\n<h4 class=\"color-orange\">Cuenta con una pantalla Full HD+ de 6\".</h4> \r\nCon un solo toque, divide la pantalla y abre dos pantallas 1:1. Para hacer varias tareas simultáneamente, pero de la mejor manera.\r\n<h4 class=\"color-orange\">Despídete de la frustración de esperar a que el dispositivo responda.</h4>\r\n El Nokia 7 plus incorpora la plataforma móvil Qualcomm Snapdragon 660 y 4 GB de RAM que proporcionan toda la potencia necesaria, además de una excelente batería con una autonomía de dos días de duración.\r\n<h4 class=\"color-orange\">Consigue una carga del 50% en 30 minutos en el cargador USB tipo C.</h4>\r\nLos sensores de 12 Mp y 13 Mp con ópticas ZEISS y el zoom óptico 2x producen colores vivos que dan vida a tus fotografías. Del otro lado, la cámara frontal de 16 Mp con ópticas ZEISS y un excelente desempeño en condiciones de poca luz, toma selfies perfectas, de día o de noche.\r\nIndependientemente de dónde estés y del nivel de decibelios, tres micrófonos de gran calidad captan todos los matices sónicos. Consigue una grabación de audio espacial de alta fidelidad.', 350, 'comprar_nokia_7_plus_negro.jpg', 1, 0, 0, NULL, 11, '2019-01-12', NULL),
(71, 'Lg Q6 negro 5.6\"', 'LG Q6 Platino diseño minimalista, estilizado y con una gran pantalla con equinas redondeadas para que aprecies en la palma de tu mano todo lujo de detalles y elegancia.\r\n<h4 class=\"color-orange\">FullVision, el límite lo pones tú, no tu pantalla</h4>\r\n5,5 pulgadas de panel IPS Fullvision Full HD que te permitirá ver más. Su formato 18:9 te ofrecerá una experiencia visual en un Smartphone, que hasta hoy no hubieses imaginado. Navega, juega y mira tus vídeos a otro nivel o dispara fotos con formato cuadrado para subirlas directamente a Instagram sin recortar. \r\n<h4 class=\"color-orange\">Realmente resistente</h4>\r\nEl LG Q6 ha sido creado con un cuerpo resistente, con aluminio para que pueda resistir los posibles golpes e impactos mejor. Todos los detalles en tus fotos y un gran angular 100º para tus Selfies, con el que podrás ampliar tus fotos, pero si lo prefieres toma tus fotos con el ángulo normal y haz fotos más cercanas. O usa el modo cuadrado exclusivo de LG para crear fotos divertidas y únicas, para después compartirlas con tus contactos. Tiene certificado de resistencia militar, te certifica que ha superado 14 pruebas de3 durabilidad y resistencia en condiciones extremas.\r\n<h4 class=\"color-orange\">Comodidad con tan solo una mano</h4>\r\nTiene un grosor de 69,3 mm, lo que hace que el LG Q6 lo puedas coger y hacer servir con una sola mano. Su pantalla y el bisel son planos para poder reducir los accidentes que pueden surgir en modelos con pantallas curvas.\r\n<h4 class=\"color-orange\">Reconocimiento facial</h4>\r\nUsa tu sonrisa y tu teléfono estará disponible para ser usado con el reconocimiento facial, con lo que ganarás más tiempo que si usar la huella dactilar.', 160, 'lg-q6-negro.png', 1, 0, 0, NULL, 12, '2019-01-12', NULL),
(72, 'Lg Q6 plus negro 5.6', 'Desubre el último Q6+ de lg con 64gb de memoria', 179, 'lg-q6-negro.png', 1, 0, 0, NULL, 12, '2019-01-12', '2019-01-12'),
(73, 'TV LED 55', 'El color cobra vida con el TV LED 55\" Samsung UE55NU7175. Disfruta de tu contenido y películas favoritas con colores vivos y brillantes, para no perder ni un solo detalle.\r\n<h4 class=\"color-orange\">Resolución UHD 4K</h4>\r\nEl TV LED 55\" Samsung UE55NU7175UXXC tiene una resolución 4K UHD real, lo que quiere decir que su definición es 4 veces superior a Full HD. Complementado con la tecnología PurColor, se consigue nitidez además de unos colores vivos y realistas. Además, con su tecnología HDR 10+ podrás ver todos los detalles sin importar lo brillante u oscura que sea una escena. Tus películas se verán en todo su esplendor.\r\n<h4 class=\"color-orange\">Smart TV</h4>\r\nSi te gusta disfrutar de tus series y películas favoritas a través de internet, podrás hacerlo sin problemas con esta tele. Disfruta de apps como Netflix, HBO, Spotify, etc sin necesidad de nada más que tu televisor. Además, podrás controlarlo a través de tu móvil con la app SmartThings.\r\n<h4 class=\"color-orange\">Cables ocultos</h4>\r\n¿Te has preguntado alguna vez dónde esconden los cables del televisor en las revistas de decoración? El diseño de este televisor Samsung permite ocultar los cables en su peana a través de unas guías.', 520, 'tv-samsung-55.jpg', 1, 1, 2, '480', 14, '2019-01-12', '2019-01-24'),
(74, 'TV LED 32', 'Disfruta del tu contenido multimedia en casa con el TV LED 32\" Samsung UE32M5525 Full HD Smart TV con Wi-Fi y conexiones HDMI y USB.\r\n<h4 class=\"color-orange\">Color en estado puro</h4>\r\nLa TV LED de 32\" Samsung UE32M5525 te hará disfrutar de las imágenes como nunca gracias a sus tecnologías de tratamiento de color. Como por ejemplo El Ultra Clean View, un avanzado algoritmo que reduce el ruido de las imágenes para que las veas nítidas. O el innovador Micro Dimming Pro, una tecnología capaz de analizar cada zona de la imagen para ofrecer mejores sombreados y detalles en color. Por si fuera poco, el sistema PurColor te proporciona unos colores naturales y mucho más puros.\r\n<h4 class=\"color-orange\">Audio a la altura</h4>\r\nSamsung no ha descuidado el sonido de este televisor. Gracias a la tecnología Dolby Digital Plus y la potencia de salida de 20 W de los altavoces, disfrutaras de una experiencia totalmente immersiva sin moverte del salón.\r\n<h4 class=\"color-orange\">Conectividad Smartphone</h4>\r\nPuedes navegar fácilmente y controlar tu televisor Samsung UE32M5525 desde tu Smarphone o tablet con SmartView. También puedes compartir los contenidos de tu móvil y disfrutarlos en el televisior de forma fácil.. Y por si fuera poco, consta de 2 ranuras USB para que puedas conectar un pendrive y reproducir sus archivos. Si te has quedado con ganas de más, conéctate a la Wi-Fi incorporada y convierte la tele en mucho más.', 340, 'samsung_32_uhd.png', 1, 1, 2, '300', 14, '2019-01-12', '2019-01-24'),
(75, 'TV QLED 65&quot; Samsung Ultra HD 4K HDR Curvo', 'Producto reacondicionado: El precio es exclusivo para compra online a través de mediamarkt.es y servicio de entrega a domicilioEstado del producto: Buen estadoEstado del embalaje: Embalaje dañadoEl TV QLED de 65 pulgadas Samsung QE65Q7CAMTXXC Samsung incorpora tecnologías avanzadas que te ofrecen una calidad de imagen y una precisión de color excelentes. Emociónate con una experiencia de visualización fuera de lo común. QLED: colores que cobran vidaEn la nueva serie 7 con Q Picture los colores cobran vida, prepárate para vivir más las películas, series de televisión o retransmisiones de eventos deportivos. La tecnología Quantum Dot, de puntos cuánticos con recubrimiento metálico, está creada para espectadores exigentes, pues puede expresar más de mil millones de colores con cualquier nivel de brillo, un 100% de volumen de color. Además, con Q Contraste tanto con escenas de noche como de día, el televisor plano QE65Q7CAMTXXC con HDR 1500 logra un contraste intenso que te sumergirá en los contenidos. Los negros están cargados de realismo, sin importar la luz de la sala. No te pierdas ningún detalleEntre sus características destaca también la alta calidad de imagen que te proporciona su resolución Ultra HD 4K y un procesador de gran potencia.Diseño para una inmersión totalUna visión perfecta desde cualquier ángulo. Gracias al Q Ángulo de visión, olvídate de volver a desear el mejor asiento del sofá porque ahora todos son buenos. Diseño 360 para una inmersión total a sus avanzadas tecnologías de imagen hay que añadir un diseño sin marco, muy elegante y minimalista, que encajará perfectamente con la decoración de tu salón. Su soporte de pared \"No Gap\", que prácticamente no deja hueco, te resultará muy fácil de instalar. Además, te ofrece una conexión casi invisible para conectar todos los dispositivos al televisor y obtener una visión más limpia del espacio.Ventana al entretenimientoUtiliza el versátil mando One Remote Control para controlar con facilidad todos tus dispositivos conectados por HDMI. Incluso dispone de control por voz para una total comodidad. Con él podrás acceder a Smart Hub, la plataforma de Smart TV en la que ver todo tipo de apps y contenidos multimedia. Si lo prefieres navega fácilmente y controla tu televisor desde tu Smartphone o Tablet con Smart View. Samsung QLED con Certificado Ultra HD Premium. The Next Innovation in TV.', 2350, 'samsung-TV-QLED-65.png', 1, 1, 1, '2250', 14, '2019-01-12', '2019-01-24'),
(76, 'TV QLED 49\" Samsung 2018 4K UHD,Smart TV', 'El color cobra vida. Disfruta de contenido y de películas con los colores todavía más vivos y brillantes de tu televisor Samsung 49Q6FN. No se te escapará ni un solo detalle*.\r\n*Los televisores QLED han recibido la verificación de una de las asociaciones de certificación y homologación más importantes del mercado, VDE (Verband Deutscher Elektrotechniker), por su capacidad para producir el 100% del volumen de color.\r\n<h4 class=\"color-orange\">Volumen de color</h4>\r\nEl televisor Samsung 49Q6FN es capaz de reproducir el 100% del volumen de color, sin importar el nivel de brillo del televisor. Esto se traduce en colores reales, llenos de matices muy vivos.\r\n<h4 class=\"color-orange\">Mejor manejo del contraste gracias a: Q Contrast y Q HDR 1000 (HDR 10+)</h4>\r\nCon Q Contrast percibirás hasta el más mínimo detalle, en escenas oscuras ya no te perderás nada, sin importar las condiciones lumínicas de la sala. Además, un mayor nivel de brillo y contraste de Q HDR Elite, con un rango de luminosidad de hasta de 1.000 nits, hará que ver tus películas y contenidos se convierta en toda una experiencia que seguramente no habrás disfrutado hasta ahora.\r\n<h4 class=\"color-orange\">Mayor vida útil</h4>\r\nHechos para durar. Las nanopartículas Quantum dot de los televisores QLED están fabricadas con material inorgánico, esto significa que tu televisor no se degradará, por lo que no sufrirá marcado de pantalla con el tiempo, y disfrutarás de los colores y del nivel de detalle del primer día.* \r\n*Imágenes simuladas únicamente para fines ilustrativos.\r\nMarcado de pantalla. El marcado de pantalla es una decoloración permanente en la pantalla de la tele ocasionada por mostrar una imagen estática de forma continuada, como por ejemplo, los logos de los canales de TV. \r\n<h4 class=\"color-orange\">Diseñados para que nada se interponga entre tus contenidos y tú</h4>\r\nEl diseño de tu televisor Samsung 49Q6FN mantiene su parte trasera libre de marañas de cables, escondiéndolos en el interior de su peana. Sólo tendrás que conectarlos, introducirlos en las líneas de cables de su trasera y organizarlos cómodamente a través de la peana.\r\n<h4 class=\"color-orange\">Ambient Mode: El fin de la pantalla negra</h4>\r\nGracias a Ambient Mode* podrás camuflar tu televisor en tu pared eligiendo el fondo que más se parezca o duplicando tu pared, o también podrás estar al día de las noticias y el tiempo o simplemente utilizarlo para revivir tus recuerdos.\r\n<h4 class=\"color-orange\">Todo ello lo harás de manera sencilla desde la aplicación SmartThingsTM* disponible para tu smartphone. </h4>\r\n*Ambient Mode está disponible a través de la app SmartThings, disponible para smartphones Android (4.1 o superior) o iPhone (iOS 9.0 o superior). Se requiere conexión a internet y Samsung Account.\r\n<h4 class=\"color-orange\">Una forma inteligente de disfrutar de tu televisor</h4>\r\nAccede a tu contenido de forma rápida y sencilla. Un asistente personal, un mando a distancia único y un sencillo Smart hub donde controlar todos tus dispositivos. Únete a una experiencia televisiva inteligente.\r\n<h4 class=\"color-orange\">One Remote Control.</h4>\r\n Controla fácilmente todos tus dispositivos conectados con un único mando a distancia. Cuenta con Auto Detección, por lo que tu mando reconocerá automáticamente todos tus dispositivos, controlándolos al momento. Todo el poder en la palma de tu mano.\r\nSmartThings*, una sola aplicación para todo\r\nLa app SmartThings también cuenta con Guía universal, mando a distancia e incluso te permitirá ajustar Ambient Mode.\r\n<stong>*Se debe descargar e instalar la app SmartThings.</strong>', 1100, 'TV-QLED-49_samsung-49Q6FN-2018.png', 1, 0, 0, NULL, 14, '2019-01-12', NULL),
(77, 'TV OLED 55\" - LG OLED55E8PLA, UHD 4K Cinema HDR', ' ¿Te imaginas tener un cine en casa? La idea puede sonar descabellada, pero con la TV OLED 55\"\" LG OLED55E8PLA estará cerca de convertirse en realidad. Este panel te ofrece un negro puro, sin matices, que se traduce en un mayor contraste de la imagen. Además, cuenta con navegador webOS 4.0 que convertirá la pantalla en algo más que una tele.\r\n\r\n<h4 class=\"color-orange\">Disfruta del negro puro</h4>\r\nLas pantallas OLED se caracterizan por tener un LED orgánico capaz de apagarse totalmente. Al estar apagado del todo, el negro que se genera es puro. Esto lleva a un mayor contraste y a una mayor profundidad en los colores. Esto hace que el panel OLED tenga una calidad de imagen muy buena.\r\n<h4 class=\"color-orange\">Explosión de color</h4>\r\nLa TV OLED 65\"\" LG OLED65E8PLA cuenta con una resolución 4K de 3840x2160 píxeles. Con tal densidad de píxeles, tendrías que estar muy cerca de la pantalla para ver los puntos. Además, esta tele soporta diferentes formatos de HDR: Dolby Vision, Technicolor, HDR10 Pro y HLG Pro. Esto hace que, sumado al negro puro, la imagen tenga todavía mejor color y contraste. Y, con el Procesador Inteligente 9 de 14 bits, el televisor será capaz de proporcionarte una imagen mucho más clara y detallada.\r\n<h4 class=\"color-orange\">Un sonido de cine</h4>\r\nLa mayoría de salas cinematográficas incorporan ya sonido Dolby Atmos®. Esta televisión cuenta con la misma tecnología, capaz de capturar el movimiento de lo que se ve en pantalla para crear un sonido totalmente realista y envolvente en 360º reales. Si a esto le sumas una potencia de 60 W en 4.2 canales, tendrás una experiencia mucho más inmersiva.\r\n<h4 class=\"color-orange\">Una Smart TV con estilo</h4>\r\nLa TV OLED 55\" LG OLED55E8PLA ha sido diseñada con estilo para que encaje a la perfección con cualquier parte de tu casa. Además, este televisor LG cuenta con el navegador webOS 4.0, que te permitirá usar diferentes aplicaciones en streaming como YouTube o Netflix. Por si fuese poco, el sistema de inteligencia artificial ThingQ te permitirá controlar la tele por voz.', 2499, 'TV-OLED-55-lg.png', 1, 0, 0, NULL, 15, '2019-01-12', NULL),
(78, 'TV OLED 55\" - LG, UHD 4K Cinema HDR', ' ¿Te imaginas tener un cine en casa? La idea puede sonar descabellada, pero con la TV OLED 55\"\" LG OLED55B8PLA estará cerca de convertirse en realidad. Este panel te ofrece un negro puro, sin matices, que se traduce en un mayor contraste de la imagen. Además, cuenta con navegador webOS 4.0 que convertirá la pantalla en algo más que una tele.\r\n<h4 class=\"color-orange\">Disfruta del negro puro</h4>\r\nLas pantallas OLED se caracterizan por tener un LED orgánico capaz de apagarse totalmente. Al estar apagado del todo, el negro que se genera es puro. Esto lleva a un mayor contraste y a una mayor profundidad en los colores. Esto hace que el panel OLED tenga una calidad de imagen muy buena.\r\n<h4 class=\"color-orange\">Explosión de color</h4>\r\nLa TV OLED 55\"\" LG OLED55B8PLA cuenta con una resolución 4K de 3840x2160 píxeles. Con tal densidad de píxeles, tendrías que estar muy cerca de la pantalla para ver los puntos. Además, esta tele soporta diferentes formatos de HDR: Dolby Vision, Technicolor, HDR10 Pro y HLG Pro. Esto hace que, sumado al negro puro, la imagen tenga todavía mejor color y contraste. Y, con el Procesador Inteligente 7 de 12 bits, el televisor será capaz de proporcionarte una imagen mucho más clara y detallada.\r\n<h4 class=\"color-orange\">Un sonido de cine</h4>\r\nLa mayoría de salas cinematográficas incorporan ya sonido Dolby Atmos®. Esta televisión cuenta con la misma tecnología, capaz de capturar el movimiento de lo que se ve en pantalla para crear un sonido totalmente realista y envolvente en 360º reales. Si a esto le sumas una potencia de 40 W en 2.2 canales, tendrás una experiencia mucho más inmersiva.\r\n<h4 class=\"color-orange\">Una Smart TV con estilo</h4>\r\nLa TV OLED 55\" LG OLED55B8PLA ha sido diseñada con estilo para que encaje a la perfección con cualquier parte de tu casa. Además, este televisor LG cuenta con el navegador webOS 4.0, que te permitirá usar diferentes aplicaciones en streaming como YouTube o Netflix. Por si fuese poco, el sistema de inteligencia artificial ThingQ te permitirá controlar la tele por voz.', 1500, 'TV-OLED-55.png', 1, 0, 0, NULL, 15, '2019-01-12', NULL),
(79, 'un produit de teste edité', 'c\'est juste un produit poru le teste ', 950, '45a9396710bd383593aeb90b94dc873a.jpg', 1, 1, 1, '600', 10, '2019-01-24', '2019-01-24'),
(83, 'un ejemplo de producto', 'lorem', 900, 'b798abe6e1b1318ee36b0dcb3fb9e4d3.jpg', 1, 0, 0, NULL, 14, '2019-01-29', NULL),
(91, 'un produit sans image', 'lorem', 854, '6c194c95af4a37b48a70aa0d42bc7dc0.jpg', 1, 0, 0, NULL, 19, '2019-01-29', '2019-01-29'),
(92, 'lorem', 'llal', 85, '6c194c95af4a37b48a70aa0d42bc7dc0.jpg', 1, 0, 0, NULL, 10, '2019-01-29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `direccion`, `email`, `password`, `created`, `updated`, `role`, `active`) VALUES
(46, 'Admin', 'Admin', 'severo ochoa', 'javier@gmail.com', '$2y$10$7vJ0yXdEWnWWBOxswTdmWuO311ud6BEqrLyHrPtiMn3halXP0zk7i', '2018-12-15', NULL, 10, 1),
(47, 'amirouche', 'naitslimane', 'severo ochoa Elche', 'amirouche@gmail.com', '$2y$10$4xUkLXjtzdJppB1fcqVTMOmajEvsoXslyQTdGUR8UR/Z8fSqT0V7m', '2018-12-15', '2018-12-22', 1, 1),
(48, 'Mi cliente', 'cliente', 'elche alicante', 'cliente@gmail.com', '$2y$10$/9axBfRMlpes/m5upZs92uTV/COnsSelMzAKZKqRkZX5Z/6z26Pi2', '2018-12-16', '2019-01-17', 2, 1),
(52, 'amirouche', 'naitslimane', 'severo ochoa Elche', 'amiroucheamazighkabyle@gmail.com', '$2y$10$mzqEkBUbtZX.MzHqvkzdxuzBESEl/N8NhbFqce9o3Jg4LDlpwr8bu', '2018-12-16', '2018-12-23', 2, 1),
(53, 'admin2', 'admin2', 'severo ochoa Elche', 'admin2@gmail.com', '$2y$10$pFF0S2dwHFv4D/F.5cInG..u3.63WZ3EE3HUTx7f/u.1lmH6upgdq', '2018-12-22', '2018-12-27', 1, 1),
(55, 'cliente2', 'cleinte2', 'elche', 'cliente2@gmail.com', '$2y$10$H1MdCnpaKCotLNPN/lJtkemtDcplcKnLJ.3VvFsM9Lemzm/CmKIrS', '2019-01-12', NULL, 2, 1),
(56, 'cliente3', 'cleinte3', 'severo ochoa Elche', 'cliente3@gmail.com', '$2y$10$NJcV1fnmU.OBylW4yi.s.uoNIvMmF1C2ehNTdl1VOiu4HAZB89oKy', '2019-01-12', NULL, 2, 1),
(57, 'cliente4', 'cliente4', 'alicante elche', 'cliente4@gmail.com', '$2y$10$RpMMCmJ6VwHEu2PbJnBGz.fT8OxdCH5cY94oyZ7qZ388nsOSebXim', '2019-01-12', NULL, 2, 1),
(58, 'javi', 'javi', 'javi', 'javi@gmail.com', '$2y$10$KKZM.C3FkR/KewBW4xwedeB27U1Jzap.ftNO9cgy0Vby.U7VWn5M6', '2019-01-15', NULL, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_caracteristicas_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carrito_producto1_idx` (`producto_id`),
  ADD KEY `fk_carrito_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `padre_id` (`padre_id`);

--
-- Indices de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CAJ_LINEAPED_PRODUCTO` (`producto_id`),
  ADD KEY `CAJ_LINEAPED_PEDIDO` (`pedido_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CAJ_PEDIDO_CLIENTE` (`usuario_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria1_idx` (`categoria_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD CONSTRAINT `fk_caracteristicas_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carrito_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD CONSTRAINT `CAJ_LINEAPED_PEDIDO` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CAJ_LINEAPED_PRODUCTO` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `CAJ_PEDIDO_CLIENTE` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
