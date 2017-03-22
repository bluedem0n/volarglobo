-- phpMyAdmin SQL Dump
-- version 4.3.13
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-01-2017 a las 21:01:00
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `elfpty_descuento`
--

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `rif`, `dni`, `nombre`, `nickname`, `direccion_fiscal`, `telefono1`, `telefono2`, `email`, `contacto_nombre`, `contacto_puesto`, `contacto_telefono`, `status`, `idioma_id`,  `sitio_web`, `observacion`, `politicas`, `privacidad`, `faq_titulo`, `user_id`, `user_name`, `titulo`, `nacionalidad`, `edo_civil`, `ocupacion`, `grado_instruccion`,  `created_at`, `updated_at`) VALUES(1,  '20392527592', '', 'volarenGlobo', 'volarenGlobo', 'Colocar direccio',  '5072756318', '', 'correo-empresa@mail.com', 'Jonh Doe', 'CEO', NULL, 1, 1, 'www.volarenGlobo.com', '', '<div><b>Privacidad</b><br></div><div>Solocompara está comprometido con el derecho a la privacidad y se compromete a cumplir con las leyes de privacidad y protección de la información.</div><div>Al acceder o utilizar el sitio web solocomparar.com Usted esta aceptando nuestras prácticas de uso de la información.</div><div>&nbsp;<br></div><div><b>Recolección de información</b></div><div>Solocompara recolecta información personal que es necesaria para brindar, mejorar y personalizar nuestro servicio.Esta información puede incluir Ciudad, email, algún dato de contacto, preferencias, los click a los enlaces, procedencia con respecto por el medio que ingreso a nuestra web, y algunos otros datos.<br></div><div>Cada vez que se conecta a Solocompara.com mediante un servicio de terceros como Facebook u otros, solocompara solamente recolecta su nombre, dirección de email, dirección u otra información disponible de acuerdo a lo permitido por esos servicios.La información que recolectamos depende de acuerdo a lo establecido por las condiciones de esas Empresas.</div><div>Cuando Usted visita solocompara.como los servidores recolectan información como cantidad de visitas, fechas, procedencia y otras estadísticas.Utilizamos esta información para monitorear y analizar el uso del servicio y la administración técnica del servicio para mejorar las funcionalidades y adaptarlos a los requerimientos de nuentros usuarios.</div><div>&nbsp;<br></div><div><b>Uso de la información de otros sitios web</b></div><div>Solocompara utiliza links o enlaces a otras páginas externas cuya políticas pueden llegar a diferir de las nuestras y nuestro servcicio no se resposabiliza por las mismas.</div><div>&nbsp;</div><div><b>Revelado de información personal</b><br></div><div>Solocompara también podría llegar a revelar información personal con otras Empresas, agentes o contratistas para desarrollar servicios en nombre de nuestra Empresa. Esto incluye Empresas de mailing, estas Empresas solo pueden hacer uso de la información personal con el propósito de proveer el servicio que solocompara les solicita.</div><div>&nbsp;<br></div><div><b>Comunicaciones</b></div><div>Solocompara utiliza su información personal para enviarle promociones y toda información que pueda ser de su interés.</div><div>Nunca vamos a solicitarle la información referida a accesos o claves personales por cualquier vía de comunicación.</div><div>&nbsp;</div><div><b>Empleo de cookies</b></div><div>Al igual que muchos servicios online, solocompara utiliza cookies para recoger información.Una cookie es un pequeño archivo de datos.&nbsp;</div><div>&nbsp;</div><div><b>Consultas</b></div><div>Ante cualquier duda o comentario relacionado a nuestras políticas de privacidad, por favor contáctese con nosotros y con gusto le vamos a responder.</div><div>Por favor contáctese a : &nbsp; @solocompara.com</div><div><br></div>', '<div><b>Autorización</b><br></div><div>Cuando el usuario accede a la web solocompara.com, lo autoriza a su uso y está aceptando nuestros términos y condiciones.Solocompara podrá cambiar o adaptar en cualquier momento estos términos y condiciones sin previo aviso. Los usuarios pueden revisar en ésta web los cambios realizados en la sección Términos y condiciones.</div><div>&nbsp;</div><div><b>Descripción del servicio</b></div><div>Nuestro servicio le brinda a los usuarios un listado de proveedores de servicios clasificados por distintos rubros, características más importantes y otros datos para que pueda comparar y decidir mejor su contratación. Ahorrando tiempo y dinero.</div><div>El propósito de nuestro servicio es solamente informativo, no cobramos, ni vendemos por los servicios publicados.</div><div>&nbsp;</div><div><b>Hipervínculos</b></div><div>Nuestra web tiene enlaces a web de terceros. El ingreso y su uso a éstas web se hace exclusivamente por cuenta propia y a riesgo de los usuarios.</div><div>Solocompara no se hace responsable por cualquier cuestión entre los usuarios y web de terceros (Enlaces).</div><div>Solocompara se reserva el derecho de aceptar o eliminar cuando lo vea conveniente, en cualquier momento a cualquier enlace de terceros sin previo aviso ni expresión de causa alguna.</div><div>&nbsp;</div><div><b>Publicaciones</b></div><div>Los datos que mostramos son obtenidos a través de investigación y relevamiento propio que nos brindan las Empresas proveedoras de servicios.</div><div>Nuestro equipo se encarga de revisar periódicamente el Mercado para ir incorporando los cambios que las Empresas van realizando.</div><div>Intentamos disponer de la mejor información posible y actualizada para la toma de decisiones.</div><div>Solocompara.com no se hace responsable y no garantiza la exactitud de la información presentada en relación a la calidad, características, descuentos especiales, ofertas, la legalidad o propiedad intelectual de lo publicado.</div><div>&nbsp;</div><div><b>Propiedad Intelectual</b></div><div>Solocompara se reserva todos los derechos de propiedad intelectual y también sobre el servicio, las publicaciones, los contenidos, imágenes, bases de datos. Por lo expuesto con anterioridad está expresamente prohibida la reproducción, modificación o transmisión total o parcial de los contenidos a terceros y/o demás usos sin el consentimiento previo y por escrito de solocompara.</div><div>&nbsp;</div><div><b>Privacidad</b></div><div>Es muy importante para nosotros el tema de la privacidad y la seguridad de nuestros usuarios y proveedores de servicios.</div><div>Al utilizar nuestro servicio Usted nos da el consentimiento a recolectar utilizar su información conforme a lo establecido en nuestra política de privacidad.</div><div>&nbsp;</div><div><b>Usos no permitidos</b></div><div>No está permitido bajo ninguna circunstancia el uso de software, uso de dispositivos u otros medios tendientes a interferir en cualquier parte de su funcionamiento.Cualquier tentativa de alteración, sustracción, comercialización o intromisión de la información de cualquier forma &nbsp;se librarán las acciones legales que correspondan de acuerdo a lo acordado en el presente documento, haciendo responsable a quien corresponda con indemnizaciones por los daños causados.</div><div>No está permitido realizar ningún tipo de cambio o modificación del sitio o descriptar parcial o totalmente el mismo, como también alterar, , interferir o destruir el servicio.</div><div>&nbsp;</div><div><b>Exclusión de responsabilidades</b></div><div>Solocompara no es responsable por daños o perjuicios directos o indirectos causados por cualquier tipo de inconvenientes por medio del uso de la web.</div><div>Es obligación de los usuarios contar con antivirus adecuados y cualquier tipo de protección.</div><div>Solocompara no será responsable por la seguridad técnica, la calidad y funcionamientos de los software de seguridad o cualquier otros tipos de dispositivos o equipos utilizados para la comunicación.</div><div>Solocompara mantendrá la información contenida en su web de forma completa, exacta y actualizada posible, sin embargo no podemos garantizar dichos parámetros por distintas circunstancias, por tal motivo Solocompara queda totalmente excluido de cualquier daño, perjuicio directos o indirectos que puedan ocasionarse por su uso.</div><div>&nbsp;</div><div><b>Ley aplicable</b></div><div>Estos términos y condiciones se otorgan en la Ciudad de La Plata y se rigen de acuerdo a las leyes de nuestro País.Cualquier conflicto derivada del presente acuerdo, su validez, existencia, interpretación, alcance o incumplimiento será sometida a los Tribunales de la Ciudad de La Plata.</div>', '', 1, 'Salazar Jesus', 'sra,sr', 'Mexicana,Americana', 'Soltero,Casado', 'Ingeniero, Vendedor,Piloto', 'Universitario, Técnico ', '0000-00-00 00:00:00', '2017-02-05 00:30:59');


--
-- Volcado de datos para la tabla `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(1, 'administrador', 'Grupo Administrador', '2012-08-02 17:06:32', '2012-08-02 17:06:32');
INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(2, 'registrado', 'Usuario Registrado por la Pagina Web', '2012-08-02 17:06:32', '2012-08-02 17:06:32');
INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(3, 'invitado', 'Es el usuario registrado en la primera Fase', '2012-08-02 17:06:32', '2012-08-02 17:06:32');

--
-- Volcado de datos para la tabla `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `empresa_id`, `name`, `description`, `detalles`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 'administrador', 'Permiso de Administrador', NULL, 0, '2012-05-26 16:42:18', '2012-05-26 16:42:18');



INSERT INTO `tipo_personal` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Oficina', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_personal` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Piloto', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_personal` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(3, 1, 'Jefe de tripulante', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_personal` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(4, 1, 'Tripulante', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');

INSERT INTO `tipo_vuelo` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Privado', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_vuelo` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Compartido', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');


INSERT INTO `tipo_motivo` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Aniversario', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_motivo` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Anillo - compromiso', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_motivo` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(3, 1, 'Cumpleaños', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');


INSERT INTO `tipo_lona` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Generica', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_lona` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Personalizada', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');


INSERT INTO `tipo_restriciones` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Niños menores a 4 años', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_restriciones` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Si ha padecido del corazón', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_restriciones` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(3, 1, 'Si tiene una cirugía reciente', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_restriciones` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(4, 1, 'Si tiene problemas en la columna', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_restriciones` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(5, 1, 'Mujeres embarazadas.', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');

INSERT INTO `tipo_recomendaciones` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Traer ropa cómoda.', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_recomendaciones` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Cualquier equipo electrónico como reproductor, cámaras de fotografía, video, etc., los pueden llevar bajo su propia responsabilidad.', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `tipo_recomendaciones` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(3, 1, 'Ser puntuales, a fin de poder abordar a tiempo y evitar así la suspensión de su vuelo', '', '1', '', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');



--
-- Volcado de datos para la tabla `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `identificacion`, `fecha_nacimiento`, `direcion`, `telefono_principal`,  `sexo`, `edo_civil`,  `nacionalidad`, `empresa_id`, `ocupacion`, `titulo`, `grado_instruccion`, `email_address`, `username`, `algorithm`, `salt`, `password`,  `is_active`, `is_super_admin`, `last_login`, `alerta`, `observacion`, `created_at`, `updated_at`) 
VALUES                      (1,   'Jesus',         'Salazar',       '',          '1985-02-25',          '',         '04149210498',        1   ,   '' ,            '',           1,             '',        '',           '',             'usmjesus@gmail.com', 'admin', 'sha1', '7b92a2dd5e73580100da0461f7d8b127', 'bf5b7e5db8404724461b50b08ef70e8e402ee26a',  1, 1, '2017-01-31 09:53:54', '', '', '2012-08-02 17:06:32', '2017-01-31 09:53:54');

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `empresa_id`, `tipo_id`, `padre`, `orden`, `nombre`, `mancheta`, `descripcion_breve`, `status`, `keywords`, `imagen`, `user_id`, `user_name`, `created_at`, `updated_at`, `slug`) VALUES(1, 1, 1, NULL, 1, 'Fotogragia', '', '', 1, '', '', 1, 'Salazar Jesus', '2017-03-10 11:08:36', '2017-03-10 11:08:36', 'fotogragia');
INSERT INTO `categoria` (`id`, `empresa_id`, `tipo_id`, `padre`, `orden`, `nombre`, `mancheta`, `descripcion_breve`, `status`, `keywords`, `imagen`, `user_id`, `user_name`, `created_at`, `updated_at`, `slug`) VALUES(2, 1, 1, NULL, 2, 'Entretenimiento', '', '', 1, '', '', 1, 'Salazar Jesus', '2017-03-13 00:37:17', '2017-03-13 00:37:17', 'entretenimiento');
INSERT INTO `categoria` (`id`, `empresa_id`, `tipo_id`, `padre`, `orden`, `nombre`, `mancheta`, `descripcion_breve`, `status`, `keywords`, `imagen`, `user_id`, `user_name`, `created_at`, `updated_at`, `slug`) VALUES(3, 1, 1, NULL, 3, 'Excursiones', '', '', 1, '', '', 1, 'Salazar Jesus', '2017-03-13 00:37:33', '2017-03-13 00:37:36', 'excursiones');
INSERT INTO `categoria` (`id`, `empresa_id`, `tipo_id`, `padre`, `orden`, `nombre`, `mancheta`, `descripcion_breve`, `status`, `keywords`, `imagen`, `user_id`, `user_name`, `created_at`, `updated_at`, `slug`) VALUES(4, 1, 1, NULL, 4, 'Alimentos', '', '', 1, '', '', 1, 'Salazar Jesus', '2017-03-13 00:37:57', '2017-03-13 00:37:57', 'alimentos');




INSERT INTO `marca` (`id`, `empresa_id`, `nombre`, `descripcion_breve`, `status`, `keywords`, `imagen`, `user_id`, `user_name`, `created_at`, `updated_at`, `slug`) VALUES(1, 1, 'Generica', '', 1, '', NULL, 1, 'Salazar Jesus', '2017-03-10 10:54:01', '2017-03-10 10:54:01', 'marca-prueba');

--
-- Volcado de datos para la tabla `entidad`
--



--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Efectico', '', '1', 'cash.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Amazon', '', '2', 'amazon.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(3, 1, 'American Express', '', '3', 'american_express.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(4, 1, 'Bank of America', '', '4', 'bank_of_america.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(5, 1, 'Google Checkout', '', '5', 'google_checkout.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(6, 1, 'Maestro', '', '6', 'maestro.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(7, 1, 'Mastercard', '', '7', 'mastercard.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(8, 1, 'paypal', '', '8', 'paypal.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');
INSERT INTO `pago` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `imagen`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(9, 1, 'visa', '', '9', 'visa.png', 1, 1, 'Salazar Jesus', '2017-01-26 08:12:57', '2017-01-26 10:14:48');




--
-- Volcado de datos para la tabla `rede`
--

INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 'Facebook', 'facebook.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(2, 1, 'aim', 'aim.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(3, 1, 'blogger', 'blogger.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(4, 1, 'digg', 'digg.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(5, 1, 'dropbox', 'dropbox.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(6, 1, 'evernote', 'evernote.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(8, 1, 'feed', 'feed.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(9, 1, 'flickr', 'flickr.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(10, 1, 'foursquare', 'foursquare.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(11, 1, 'google+', 'google+.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(12, 1, 'linked-in', 'linked-in.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(13, 1, 'meetup', 'meetup.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(14, 1, 'myspace', 'myspace.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(15, 1, 'picasa', 'picasa.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(16, 1, 'reddit', 'reddit.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(17, 1, 'skype', 'skype.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(18, 1, 'snapchat', 'snapchat.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(19, 1, 'tumblr', 'tumblr.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(20, 1, 'twitter', 'twitter.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(21, 1, 'vimeo', 'vimeo.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(22, 1, 'youtube', 'youtube.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');
INSERT INTO `rede` (`id`, `empresa_id`, `nombre`, `logo`, `user_id`, `user_name`, `status`, `created_at`, `updated_at`) VALUES(23, 1, 'instagram', 'instagram.png', 1, 'Admin Admin', 1, '2016-10-04 23:54:21', '2016-10-04 23:54:21');



--
-- Volcado de datos para la tabla `globo`
--

INSERT INTO `globo` (`id`, `empresa_id`, `ubicacion_id`, `marca_id`, `canastilla_id`, `quemador_id`, `modelo`, `numero_serie`, `nombre`, `peso_limite`, `peso_max_vacio`, `peso_max_pasajeros`, `combustible`, `tamano`, `cantidad_tanques`, `capacidad`, `certificado`, `descripcion`, `observacion`, `orden`, `imagen`, `status`, `mantenimiento_proximo`, `mantenimiento_ultimo`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, NULL, 1, NULL, NULL, 'MODELO', 'SERIES', 'ZEUS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, 1, '2017-03-10', '0000-00-00', 1, 'Salazar Jesus', '2017-03-10 11:12:29', '2017-03-10 11:12:29');

--
-- Volcado de datos para la tabla `mantenimiento_globo`
--

INSERT INTO `mantenimiento_globo` (`id`, `empresa_id`, `globo_id`, `fecha`, `observacion`, `realizado_por`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 1, '2017-03-10', 'prueba', 'Jesus Salazar', 1, '', '2017-03-10 11:12:29', '2017-03-10 11:12:29');




--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `empresa_id`, `provincia_id`, `ciudad_id`, `categoria_id`, `rif`, `dni`, `nombre`, `nickname`, `direccion_fiscal`, `direccion_fisica`, `horario`, `telefono1`, `telefono2`, `email`, `website`, `contacto_nombre`, `contacto_puesto`, `contacto_telefono`, `status`, `descripcion`, `observacion`, `logo`, `video`, `redes_sociales`, `palabras_claves`, `destacado`, `click`, `user_id`, `user_name`, `created_at`, `updated_at`, `slug`) VALUES(1, 1, NULL, NULL, 1, '9999999', '', 'Volar en Globo', 'Volar en Globo', '', '', '', '', '', 'volarenglobo@gmail.com', '', '', '', NULL, 1, '', '', NULL, '', '', '', 1, 1, 1, 'Salazar Jesus', '2017-03-13 00:40:25', '2017-03-13 00:40:25', 'volar-en-globo');

--
-- Volcado de datos para la tabla `rango_edad`
--

INSERT INTO `rango_edad` (`id`, `empresa_id`, `nombre`, `descripcion`, `rango_desde`, `rango_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Niño', 'Niños menores de edad', 1, 10, 1, 1, 'Salazar Jesus', '2017-03-12 23:26:41', '2017-03-12 23:28:22');
INSERT INTO `rango_edad` (`id`, `empresa_id`, `nombre`, `descripcion`, `rango_desde`, `rango_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Adulto', '', 20, 50, 1, 1, 'Salazar Jesus', '2017-03-13 00:00:45', '2017-03-13 00:00:45');


--
-- Volcado de datos para la tabla `tipo_tarifa`
--

INSERT INTO `tipo_tarifa` (`id`, `empresa_id`, `tipo_vuelo_id`, `nombre`, `descripcion`, `cant_desde`, `cant_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 2, 'Normal', '', 1, 51, 1, 1, 'Salazar Jesus', '2017-03-13 00:12:01', '2017-03-13 00:12:01');
INSERT INTO `tipo_tarifa` (`id`, `empresa_id`, `tipo_vuelo_id`, `nombre`, `descripcion`, `cant_desde`, `cant_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 2, 'Promoción 1', '', 1, 51, 1, 1, 'Salazar Jesus', '2017-03-13 00:18:35', '2017-03-13 00:18:35');
INSERT INTO `tipo_tarifa` (`id`, `empresa_id`, `tipo_vuelo_id`, `nombre`, `descripcion`, `cant_desde`, `cant_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(3, 1, 2, 'Promoción 2', '', 1, 51, 1, 1, 'Salazar Jesus', '2017-03-13 00:19:09', '2017-03-13 00:19:09');
INSERT INTO `tipo_tarifa` (`id`, `empresa_id`, `tipo_vuelo_id`, `nombre`, `descripcion`, `cant_desde`, `cant_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(4, 1, 1, 'Normal', '', 1, 2, 1, 1, 'Salazar Jesus', '2017-03-13 00:19:36', '2017-03-13 00:19:36');
INSERT INTO `tipo_tarifa` (`id`, `empresa_id`, `tipo_vuelo_id`, `nombre`, `descripcion`, `cant_desde`, `cant_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(5, 1, 1, 'Normal', '', 3, 51, 1, 1, 'Salazar Jesus', '2017-03-13 00:20:10', '2017-03-13 00:20:10');
INSERT INTO `tipo_tarifa` (`id`, `empresa_id`, `tipo_vuelo_id`, `nombre`, `descripcion`, `cant_desde`, `cant_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(6, 1, 1, 'Promoción 1', '', 1, 51, 1, 1, 'Salazar Jesus', '2017-03-13 00:20:38', '2017-03-13 00:20:38');
INSERT INTO `tipo_tarifa` (`id`, `empresa_id`, `tipo_vuelo_id`, `nombre`, `descripcion`, `cant_desde`, `cant_hasta`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(7, 1, 1, 'Promoción 2', '', 1, 51, 1, 1, 'Salazar Jesus', '2017-03-13 00:21:06', '2017-03-13 00:21:06');




--
-- Volcado de datos para la tabla `tipo_tarifa_precio`
--

INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 1, 1, 1700.00, 1, '', '2017-03-13 00:12:01', '2017-03-13 00:12:01');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 1, 2, 2300.00, 1, '', '2017-03-13 00:12:01', '2017-03-13 00:12:01');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(3, 1, 2, 1, 1600.00, 1, '', '2017-03-13 00:18:35', '2017-03-13 00:18:35');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(4, 1, 2, 2, 2100.00, 1, '', '2017-03-13 00:18:35', '2017-03-13 00:18:35');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(5, 1, 3, 1, 1500.00, 1, '', '2017-03-13 00:19:09', '2017-03-13 00:19:09');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(6, 1, 3, 2, 1950.00, 1, '', '2017-03-13 00:19:09', '2017-03-13 00:19:09');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(7, 1, 4, 1, 1700.00, 1, '', '2017-03-13 00:19:36', '2017-03-13 00:19:36');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(8, 1, 4, 2, 3500.00, 1, '', '2017-03-13 00:19:36', '2017-03-13 00:19:36');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(9, 1, 5, 1, 1500.00, 1, '', '2017-03-13 00:20:10', '2017-03-13 00:20:10');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(10, 1, 5, 2, 3500.00, 1, '', '2017-03-13 00:20:10', '2017-03-13 00:20:10');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(11, 1, 6, 1, 1600.00, 1, '', '2017-03-13 00:20:38', '2017-03-13 00:20:38');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(12, 1, 6, 2, 3000.00, 1, '', '2017-03-13 00:20:38', '2017-03-13 00:20:38');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(13, 1, 7, 1, 1500.00, 1, '', '2017-03-13 00:21:06', '2017-03-13 00:21:06');
INSERT INTO `tipo_tarifa_precio` (`id`, `empresa_id`, `tipo_tarifa_id`, `rango_edad_id`, `precio`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(14, 1, 7, 2, 2750.00, 1, '', '2017-03-13 00:21:06', '2017-03-13 00:21:06');



--
-- Volcado de datos para la tabla `proveedor_descuento`
--

INSERT INTO `proveedor_descuento` (`id`, `empresa_id`, `tipo`, `status`, `categoria_id`, `proveedor_id`, `nombre`, `proveedor_sucursal_id`, `observacion`, `condiciones`, `fecha_limite`, `fecha_activacion`, `fecha_finalizacion`, `num_descuentos`, `comportamiento`, `aplicacion`, `precio`, `precio_oferta`, `destacado`, `click`, `user_id`, `user_name`, `imagen_uno`, `imagen_dos`, `imagen_tres`, `imagen_cuatro`, `imagen_cinco`, `created_at`, `updated_at`, `slug`) VALUES(1, 1, 1, 1, 2, 1, 'Trio musical ', NULL, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 2000.00, 2000.00, 1, 1, 1, 'Salazar Jesus', NULL, '', '', '', '', '2017-03-13 00:42:39', '2017-03-13 00:42:42', 'trio-musical');



--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Normal', '', '', 1, 1, 'Salazar Jesus', '2017-03-13 02:11:06', '2017-03-13 02:11:06');
INSERT INTO `tipo_habitacion` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Suite', '', '', 1, 1, 'Salazar Jesus', '2017-03-13 02:11:13', '2017-03-13 02:11:13');


--
-- Volcado de datos para la tabla `tipo_cama`
--

INSERT INTO `tipo_cama` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Cama matrimonial', '', '', 1, 1, 'Salazar Jesus', '2017-03-13 02:18:55', '2017-03-13 02:18:55');
INSERT INTO `tipo_cama` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 'Cama King size', '', '', 1, 1, 'Salazar Jesus', '2017-03-13 02:19:06', '2017-03-13 02:19:06');
INSERT INTO `tipo_cama` (`id`, `empresa_id`, `nombre`, `descripcion`, `orden`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(3, 1, 'Camas individual', '', '', 1, 1, 'Salazar Jesus', '2017-03-13 02:19:17', '2017-03-13 02:20:23');



--
-- Volcado de datos para la tabla `hospedaje`
--

INSERT INTO `hospedaje` (`id`, `empresa_id`, `provincia_id`, `ciudad_id`, `rif`, `dni`, `nombre`, `nickname`, `direccion_fiscal`, `direccion_fisica`, `horario`, `telefono1`, `telefono2`, `email`, `website`, `contacto_nombre`, `contacto_puesto`, `contacto_telefono`, `status`, `descripcion`, `observacion`, `logo`, `video`, `redes_sociales`, `palabras_claves`, `destacado`, `click`, `user_id`, `user_name`, `created_at`, `updated_at`, `slug`) VALUES(1, 1, NULL, NULL, '999999912', '', 'Quinta Sol', 'Quinta sol', '', '', '', '', '', 'quintasol@gmail.com', '', '', '', NULL, 1, '', '', NULL, '', '', '', 1, 1, 1, 'Salazar Jesus', '2017-03-13 01:33:40', '2017-03-13 01:37:35', 'quinta-sol');


--
-- Volcado de datos para la tabla `hospedaje_habitacion`
--

INSERT INTO `hospedaje_habitacion` (`id`, `empresa_id`, `hospedaje_id`, `tipo_habitacion_id`, `nombre`, `precio`, `foto`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 1, 2, 'QSS', 1000.00, NULL, 1, '', '2017-03-13 01:33:40', '2017-03-13 01:37:35');
INSERT INTO `hospedaje_habitacion` (`id`, `empresa_id`, `hospedaje_id`, `tipo_habitacion_id`, `nombre`, `precio`, `foto`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, 1, 1, 'QSD', 2000.00, NULL, 1, '', '2017-03-13 01:37:35', '2017-03-13 01:37:35');


--
-- Dumping data for table `provincia`
--

INSERT INTO `provincia` (`id`, `empresa_id`, `codigo`, `nombre`, `imagen`, `status`, `observacion`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, '', 'Estado de mexico', NULL, 1, '', 1, 'Salazar Jesus', '2017-03-21 21:23:19', '2017-03-21 21:23:19');
INSERT INTO `provincia` (`id`, `empresa_id`, `codigo`, `nombre`, `imagen`, `status`, `observacion`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(2, 1, '', 'Jalisco', NULL, 1, '', 1, 'Salazar Jesus', '2017-03-21 21:23:19', '2017-03-21 21:23:19');


--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`id`, `empresa_id`, `provincia_id`, `codigo`, `nombre`, `status`, `observacion`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 1, NULL, 'toluca', 1, '', 1, 'Salazar Jesus', '2017-03-21 21:29:32', '2017-03-21 21:29:32');

--
-- Dumping data for table `vehiculo_marca`
--

INSERT INTO `vehiculo_marca` (`id`, `empresa_id`, `nombre`, `descripcion`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Ford', '', 1, 1, 'Salazar Jesus', '2017-03-21 21:30:56', '2017-03-21 21:30:56');

--
-- Dumping data for table `vehiculo_tipo`
--

INSERT INTO `vehiculo_tipo` (`id`, `empresa_id`, `nombre`, `descripcion`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Camioneta', '', 1, 1, 'Salazar Jesus', '2017-03-21 21:34:23', '2017-03-21 21:34:23');

--
-- Dumping data for table `vehiculo_tipo_transmision`
--

INSERT INTO `vehiculo_tipo_transmision` (`id`, `empresa_id`, `nombre`, `descripcion`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Automatico', '', 1, 1, 'Salazar Jesus', '2017-03-21 21:46:17', '2017-03-21 21:47:31');

--
-- Dumping data for table `vehiculo_marca_modelo`
--

INSERT INTO `vehiculo_marca_modelo` (`id`, `empresa_id`, `vehiculo_marca_id`, `nombre`, `descripcion`, `status`, `cantidad_puerta`, `capacidad_maleta`, `capacidad_persona`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 1, 'Fiesta', '', 1, 5, 1, 5, 1, 'Salazar Jesus', '2017-03-21 21:51:17', '2017-03-21 21:51:17');

--
-- Dumping data for table `vehiculo_tipo_reproductor`
--

INSERT INTO `vehiculo_tipo_reproductor` (`id`, `empresa_id`, `nombre`, `descripcion`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'CD MP3', '', 1, 1, 'Salazar Jesus', '2017-03-21 21:53:45', '2017-03-21 21:53:45');

--
-- Dumping data for table `vehiculo_politica`
--

INSERT INTO `vehiculo_politica` (`id`, `empresa_id`, `nombre`, `descripcion`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'No montar mascotas ', '', 1, 1, 'Salazar Jesus', '2017-03-21 21:56:26', '2017-03-21 21:56:26');

--
-- Dumping data for table `vehiculo_seguro`
--

INSERT INTO `vehiculo_seguro` (`id`, `empresa_id`, `nombre`, `descripcion`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Básico', '', 1, 1, 'Salazar Jesus', '2017-03-21 21:57:56', '2017-03-21 21:57:56');

--
-- Dumping data for table `vehiculo_adicional`
--

INSERT INTO `vehiculo_adicional` (`id`, `empresa_id`, `nombre`, `descripcion`, `status`, `icono`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Silla Bebé', '', 1, '', 1, 'Salazar Jesus', '2017-03-21 21:58:39', '2017-03-21 21:58:39');

--
-- Dumping data for table `vehiculo_categoria`
--

INSERT INTO `vehiculo_categoria` (`id`, `empresa_id`, `nombre`, `descripcion`, `status`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES(1, 1, 'Carro', '', 1, 1, 'Salazar Jesus', '2017-03-21 22:01:31', '2017-03-21 22:01:31');





/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
