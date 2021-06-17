-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-06-2021 a las 09:24:27
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gb2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `assigned_roles`
--

INSERT INTO `assigned_roles` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2021_03_16_185037_create_sistemas_table', 1),
(31, '2021_03_17_203015_create_roles_table', 1),
(32, '2021_03_17_214354_create_assigned_roles_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'administrador', 'el admin es un crack', '2021-03-17 21:59:46', '2021-03-17 21:59:46'),
(2, 'sistemas', 'sistemas', 'sistemas de biotecap', '2021-06-09 05:07:32', '2021-07-06 05:07:41'),
(3, 'compras', 'compras', 'dpto compras accion', '2021-06-09 14:22:47', '2021-06-09 14:23:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemas`
--

DROP TABLE IF EXISTS `sistemas`;
CREATE TABLE IF NOT EXISTS `sistemas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `desctription` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventos` double NOT NULL,
  `fecha` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sistemas`
--

INSERT INTO `sistemas` (`id`, `user_id`, `desctription`, `observaciones`, `eventos`, `fecha`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mantenimiento Preventivo', '1', 1, '17-05-21', NULL, NULL),
(2, 1, 'Mantenimiento correctivo', '1', 1, '17-05-21', NULL, NULL),
(3, 1, 'Lineas telefonicas locales', '1', 1, '17-05-21', NULL, NULL),
(4, 1, 'Lineas telefonicas Celulares', '2', 2, '17-05-21', NULL, NULL),
(5, 1, 'Equipos Reparacion', '2', 2, '17-05-21', NULL, NULL),
(6, 1, 'Equipos Renovacion', '2', 2, '17-05-21', NULL, NULL),
(7, 1, 'Atencion a fallas', '2', 2, '17-05-21', NULL, NULL),
(8, 1, 'Cracion y renovacion de reportes', '2', 2, '17-05-21', NULL, NULL),
(9, 1, 'Redes y antenas', '2', 2, '17-05-21', NULL, NULL),
(10, 1, 'Respaldo a servidores', '2', 2, '17-05-21', NULL, NULL),
(11, 1, 'Respaldo a Usuarios', '2', 2, '17-05-21', NULL, NULL),
(12, 1, 'Proyectos', '2', 2, '17-05-21', NULL, NULL),
(13, 1, 'Monitoreo video vigilancia', '2', 2, '17-05-21', NULL, NULL),
(14, 1, 'Monitoreo Seguridad Informatica', '2', 2, '17-05-21', NULL, NULL),
(15, 1, 'Impresoras y consumibles', '2', 2, '17-05-21', NULL, NULL),
(16, 1, 'ERP software administrativo', '2', 2, '17-05-21', NULL, NULL),
(17, 1, 'software especializado', '2', 2, '17-05-21', NULL, NULL),
(18, 1, 'Multimedia', '2', 2, '17-05-21', NULL, NULL),
(19, 1, 'Provedores y consumibles', '2', 2, '17-05-21', NULL, NULL),
(20, 1, 'Mantenimiento Preventivo', '9', 2, '25-04-21', NULL, NULL),
(21, 1, 'Mantenimiento correctivo', '99', 29, '25-04-21', NULL, NULL),
(22, 1, 'Lineas telefonicas locales', '99', 8, '25-04-21', NULL, NULL),
(23, 1, 'Lineas telefonicas Celulares', '98', 98, '25-04-21', NULL, NULL),
(24, 1, 'Equipos Reparacion', '27', 7, '25-04-21', NULL, NULL),
(25, 1, 'Equipos Renovacion', '79', 79, '25-04-21', NULL, NULL),
(26, 1, 'Atencion a fallas', '63', 63, '25-04-21', NULL, NULL),
(27, 1, 'Cracion y renovacion de reportes', '636', 636, '25-04-21', NULL, NULL),
(28, 1, 'Redes y antenas', '86', 268, '25-04-21', NULL, NULL),
(29, 1, 'Respaldo a servidores', '86', 86, '25-04-21', NULL, NULL),
(30, 1, 'Respaldo a Usuarios', '86', 86, '25-04-21', NULL, NULL),
(31, 1, 'Proyectos', '56', 56, '25-04-21', NULL, NULL),
(32, 1, 'Monitoreo video vigilancia', '56', 56, '25-04-21', NULL, NULL),
(33, 1, 'Monitoreo Seguridad Informatica', '65', 65, '25-04-21', NULL, NULL),
(34, 1, 'Impresoras y consumibles', '56', 65, '25-04-21', NULL, NULL),
(35, 1, 'ERP software administrativo', '65', 65, '25-04-21', NULL, NULL),
(36, 1, 'software especializado', '65', 65, '25-04-21', NULL, NULL),
(37, 1, 'Multimedia', '56', 65, '25-04-21', NULL, NULL),
(38, 1, 'Provedores y consumibles', '56', 65, '25-04-21', NULL, NULL),
(39, 1, 'Mantenimiento Preventivo', '9', 2, '25-04-21', NULL, NULL),
(40, 1, 'Mantenimiento correctivo', '99', 29, '25-04-21', NULL, NULL),
(41, 1, 'Lineas telefonicas locales', '99', 8, '25-04-21', NULL, NULL),
(42, 1, 'Lineas telefonicas Celulares', '98', 98, '25-04-21', NULL, NULL),
(43, 1, 'Equipos Reparacion', '27', 7, '25-04-21', NULL, NULL),
(44, 1, 'Equipos Renovacion', '79', 79, '25-04-21', NULL, NULL),
(45, 1, 'Atencion a fallas', '63', 63, '25-04-21', NULL, NULL),
(46, 1, 'Cracion y renovacion de reportes', '636', 636, '25-04-21', NULL, NULL),
(47, 1, 'Redes y antenas', '86', 268, '25-04-21', NULL, NULL),
(48, 1, 'Respaldo a servidores', '86', 86, '25-04-21', NULL, NULL),
(49, 1, 'Respaldo a Usuarios', '86', 86, '25-04-21', NULL, NULL),
(50, 1, 'Proyectos', '56', 56, '25-04-21', NULL, NULL),
(51, 1, 'Monitoreo video vigilancia', '56', 56, '25-04-21', NULL, NULL),
(52, 1, 'Monitoreo Seguridad Informatica', '65', 65, '25-04-21', NULL, NULL),
(53, 1, 'Impresoras y consumibles', '56', 65, '25-04-21', NULL, NULL),
(54, 1, 'ERP software administrativo', '65', 65, '25-04-21', NULL, NULL),
(55, 1, 'software especializado', '65', 65, '25-04-21', NULL, NULL),
(56, 1, 'Multimedia', '56', 65, '25-04-21', NULL, NULL),
(57, 1, 'Provedores y consumibles', '56', 65, '25-04-21', NULL, NULL),
(58, 1, 'Mantenimiento Preventivo', '9', 2, '25-04-21', NULL, NULL),
(59, 1, 'Mantenimiento correctivo', '99', 29, '25-04-21', NULL, NULL),
(60, 1, 'Lineas telefonicas locales', '99', 8, '25-04-21', NULL, NULL),
(61, 1, 'Lineas telefonicas Celulares', '98', 98, '25-04-21', NULL, NULL),
(62, 1, 'Equipos Reparacion', '27', 7, '25-04-21', NULL, NULL),
(63, 1, 'Equipos Renovacion', '79', 79, '25-04-21', NULL, NULL),
(64, 1, 'Atencion a fallas', '63', 63, '25-04-21', NULL, NULL),
(65, 1, 'Cracion y renovacion de reportes', '636', 636, '25-04-21', NULL, NULL),
(66, 1, 'Redes y antenas', '86', 268, '25-04-21', NULL, NULL),
(67, 1, 'Respaldo a servidores', '86', 86, '25-04-21', NULL, NULL),
(68, 1, 'Respaldo a Usuarios', '86', 86, '25-04-21', NULL, NULL),
(69, 1, 'Proyectos', '56', 56, '25-04-21', NULL, NULL),
(70, 1, 'Monitoreo video vigilancia', '56', 56, '25-04-21', NULL, NULL),
(71, 1, 'Monitoreo Seguridad Informatica', '65', 65, '25-04-21', NULL, NULL),
(72, 1, 'Impresoras y consumibles', '56', 65, '25-04-21', NULL, NULL),
(73, 1, 'ERP software administrativo', '65', 65, '25-04-21', NULL, NULL),
(74, 1, 'software especializado', '65', 65, '25-04-21', NULL, NULL),
(75, 1, 'Multimedia', '56', 65, '25-04-21', NULL, NULL),
(76, 1, 'Provedores y consumibles', '56', 65, '25-04-21', NULL, NULL),
(77, 1, 'Mantenimiento Preventivo', '9', 29, '03-06-21', NULL, NULL),
(78, 1, 'Mantenimiento correctivo', '90', 90, '03-06-21', NULL, NULL),
(79, 1, 'Lineas telefonicas locales', '90', 90, '03-06-21', NULL, NULL),
(80, 1, 'Lineas telefonicas Celulares', '90', 90, '03-06-21', NULL, NULL),
(81, 1, 'Equipos Reparacion', '90', 9, '03-06-21', NULL, NULL),
(82, 1, 'Equipos Renovacion', '09', 90, '03-06-21', NULL, NULL),
(83, 1, 'Atencion a fallas', '90', 9, '03-06-21', NULL, NULL),
(84, 1, 'Cracion y renovacion de reportes', '90', 90, '03-06-21', NULL, NULL),
(85, 1, 'Redes y antenas', '90', 9, '03-06-21', NULL, NULL),
(86, 1, 'Respaldo a servidores', '09', 89, '03-06-21', NULL, NULL),
(87, 1, 'Respaldo a Usuarios', '79', 78, '03-06-21', NULL, NULL),
(88, 1, 'Proyectos', '8', 9, '03-06-21', NULL, NULL),
(89, 1, 'Monitoreo video vigilancia', '87', 6, '03-06-21', NULL, NULL),
(90, 1, 'Monitoreo Seguridad Informatica', '78', 678, '03-06-21', NULL, NULL),
(91, 1, 'Impresoras y consumibles', '78', 78, '03-06-21', NULL, NULL),
(92, 1, 'ERP software administrativo', '78', 78, '03-06-21', NULL, NULL),
(93, 1, 'software especializado', '76', 78, '03-06-21', NULL, NULL),
(94, 1, 'Multimedia', '768', 67, '03-06-21', NULL, NULL),
(95, 1, 'Provedores y consumibles', '786', 768, '03-06-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `task` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `dpto` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `real_delivery_time` datetime DEFAULT NULL,
  `firm_path` text,
  `description_work` text,
  `image_work_before` varchar(250) DEFAULT NULL,
  `image_work_after` varchar(250) DEFAULT NULL,
  `used_material` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `user_name`, `task`, `status`, `dpto`, `updated_at`, `real_delivery_time`, `firm_path`, `description_work`, `image_work_before`, `image_work_after`, `used_material`) VALUES
(1, 'abraham ramon cabrera Lopez', 'asdfasdfasdfasdf', 'pendiente', 'sistemas', '2021-06-22 12:45:00', NULL, NULL, NULL, '1623379907Captura de pantalla (4).png', NULL, NULL),
(2, 'abraham ramon cabrera Lopez', 'Probando sistema', 'pendiente', 'sistemas', '2021-06-11 10:04:00', NULL, NULL, NULL, '16233807761623380652134244017898131948989.jpg', NULL, NULL),
(3, 'abraham ramon cabrera Lopez', 'Esa es una aberración', 'pendiente', 'sistemas', '2021-06-11 22:11:00', NULL, NULL, NULL, '162338110416233810515391365995989959499957.jpg', NULL, NULL),
(4, 'abraham ramon cabrera Lopez', 'Levantar al prendido', 'pendiente', 'sistemas', '2021-06-11 00:29:00', NULL, NULL, NULL, '162338940816233893741408758245383323854486.jpg', NULL, NULL),
(5, 'abraham ramon cabrera Lopez', 'Una pc', 'pendiente', 'sistemas', '2021-06-11 09:42:00', NULL, NULL, NULL, '162342256116234225459465249367787729263717.jpg', NULL, NULL),
(6, 'abraham ramon cabrera Lopez', 'PC 2', 'pendiente', 'sistemas', '2021-06-11 11:52:00', NULL, NULL, NULL, '162343039316234303275072327463157132557593.jpg', NULL, NULL),
(7, 'abraham ramon cabrera Lopez', 'Reparar sello', 'pendiente', 'sistemas', '2021-06-11 11:54:00', NULL, NULL, NULL, '162343049416234304752664746693384986935679.jpg', NULL, NULL),
(8, 'abraham ramon cabrera Lopez', 'Probando', 'pendiente', 'sistemas', '2021-06-11 12:00:00', NULL, NULL, NULL, '162343086216234308461321662583450513431001.jpg', NULL, NULL),
(9, 'abraham ramon cabrera Lopez', 'EL COCHILOCO', 'pendiente', 'sistemas', '2021-01-01 12:23:00', NULL, NULL, NULL, '1623441325Captura de pantalla (8).png', NULL, NULL),
(10, 'abraham ramon cabrera Lopez', 'Pantalla negro', 'pendiente', 'sistemas', '2021-06-13 09:14:00', NULL, NULL, NULL, '162350730816235072386822052671146890848751.jpg', NULL, NULL),
(11, 'abraham ramon cabrera Lopez', 'Skgsjrkgaarj', 'pendiente', 'sistemas', '2021-06-12 09:22:00', NULL, NULL, NULL, '162350775916235077437114309568245125355128.jpg', NULL, NULL),
(12, 'abraham ramon cabrera Lopez', 'Esta bien feo y pendejo alv', 'pendiente', 'sistemas', '2021-06-17 20:44:00', NULL, NULL, NULL, '162354871016235486506172799841578824940968.jpg', NULL, NULL),
(13, 'abraham ramon cabrera Lopez', 'Se me olvidó el usuario el usuario y la contraseña', 'pendiente', 'sistemas', '2021-06-17 16:54:00', NULL, NULL, NULL, '162370046616237004147902180016624474632453.jpg', NULL, NULL),
(14, 'abraham ramon cabrera Lopez', 'Ese enchufe es de otro c9lor', 'pendiente', 'sistemas', '2021-06-14 18:05:00', NULL, NULL, NULL, '16237119201623711893089854273475683683921.jpg', NULL, NULL),
(15, 'abraham ramon cabrera Lopez', 'muestra esa ventana', 'pendiente', 'sistemas', '2021-06-17 16:26:00', NULL, NULL, NULL, '1623788811Captura de pantalla (5).png', NULL, NULL),
(16, 'abraham ramon cabrera Lopez', 'Teclas borrosas', 'realizado', 'sistemas', '2021-06-20 16:31:00', '2021-06-23 20:31:00', 'data:image/png;base64,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', 'lñjñlñljlñj', '162379267716237926468014713419517025283255.jpg', '1623893535Captura de pantalla (9).png', 'ñlklñklñ'),
(17, 'abraham ramon cabrera Lopez', 'Comprar jabón para los trastes', 'realizado', 'sistemas', '2021-06-19 22:33:00', '2021-06-16 22:35:00', 'data:image/png;base64,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', 'Se compró jabón salvó', '162390084316239007762313065892636714661368.jpg', '162390100716239009310004707676352613799104.jpg', '25 pesos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dpto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `dpto`) VALUES
(1, 'abraham ramon cabrera Lopez', 'admin@admin.com', NULL, '$2y$10$gDO32Adk/Bl6MkaQnqVP3.9OTq8GETNW95Njxiix/xRswubxJzYZK', 'tNCCMvxvYRsrBsoGlok6OFNRBJTPm4UauG3bwphOdM1tQ1me76D66UZ8CIa6', '2021-03-18 04:51:43', '2021-03-18 04:51:43', 'sistemas'),
(2, 'admin', '123@123.1', NULL, '12345', NULL, '2021-03-19 00:39:27', '2021-03-19 00:39:27', ''),
(3, 'minimi', 'sistemas@biotecap.com.mx', NULL, '$2y$10$4QyQXk.ZWG6aC5hlB2s5Yu9HSKb.RXL2AgE2sTHyntLlS21N75rPq', NULL, '2021-06-09 08:56:13', '2021-06-09 08:56:13', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
