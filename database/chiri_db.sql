-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-08-2022 a las 16:35:02
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chiri_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anticipos`
--

CREATE TABLE `anticipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `a_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entregado_por` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mes` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` decimal(24,2) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `anticipos`
--

INSERT INTO `anticipos` (`id`, `fecha`, `a_nombre`, `entregado_por`, `mes`, `monto`, `fecha_registro`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, '2021-12-21', 'FELIPE PEREZ', 'JUAN PEREZ', '01', '650.00', '2021-12-21', 1, 1, '2021-12-22 00:01:37', '2021-12-22 00:01:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `tipo_movimiento` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` decimal(24,2) NOT NULL,
  `detalle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int(11) NOT NULL,
  `compra_id` bigint(20) UNSIGNED NOT NULL,
  `venta_id` bigint(20) UNSIGNED NOT NULL,
  `anticipo_id` bigint(20) UNSIGNED NOT NULL,
  `cheque_id` bigint(20) UNSIGNED NOT NULL,
  `personal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `fecha`, `tipo_movimiento`, `monto`, `detalle`, `fecha_registro`, `estado`, `compra_id`, `venta_id`, `anticipo_id`, `cheque_id`, `personal_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2021-12-15', 'INGRESO', '250.00', 'T IS A LONG ESTABLISHED FACT THAT A READER WILL BE DISTRACTED BY THE READABLE CONTENT OF A PAGE WHEN LOOKING AT ITS LAYOUT.', '2021-12-15', 1, 0, 1, 0, 0, 1, 1, '2021-12-15 23:41:44', '2021-12-15 23:41:44'),
(2, '2021-12-15', 'INGRESO', '200.00', 'DETALLE TRABAJO DE', '2021-12-15', 1, 0, 2, 0, 0, 1, 1, '2021-12-16 01:16:25', '2021-12-16 01:16:25'),
(3, '2021-12-15', 'INGRESO', '150.00', 'T IS A LONG ESTABLISHED FACT THAT A READER WILL BE DISTRACTED BY THE READABLE CONTENT OF A PAGE WHEN LOOKING AT ITS LAYOUT.', '2021-12-15', 1, 0, 3, 0, 0, 1, 1, '2021-12-16 01:16:45', '2021-12-16 01:16:45'),
(4, '2021-12-16', 'EGRESO', '250.00', 'DESCRIPCION DE LA COMRPA', '2021-12-16', 1, 1, 0, 0, 0, 1, 1, '2021-12-16 23:52:58', '2021-12-16 23:52:58'),
(5, '2021-12-18', 'INGRESO', '850.00', 'DETALLE INGRESO', '2021-12-18', 1, 0, 0, 0, 0, 2, 1, '2021-12-18 22:11:57', '2021-12-18 22:11:57'),
(6, '2021-12-18', 'APERTURA', '0.00', 'APERTURA DE CAJA CON SALDO 1200', '2021-12-18', 2, 0, 0, 0, 0, 0, 1, '2021-12-18 22:19:45', '2021-12-18 22:19:45'),
(7, '2021-12-20', 'APERTURA', '0.00', 'APERTURA DE CAJA CON SALDO. 1200', '2021-12-20', 2, 0, 0, 0, 0, 0, 1, '2021-12-20 22:53:59', '2021-12-20 22:53:59'),
(8, '2021-12-20', 'CIERRE', '0.00', 'CIERRE DE CAJA CON SALDO 1200', '2021-12-20', 3, 0, 0, 0, 0, 0, 1, '2021-12-20 23:13:19', '2021-12-20 23:13:19'),
(9, '2021-12-20', 'APERTURA', '0.00', 'APERTURA DE CAJA CON SALDO. 1200', '2021-12-20', 2, 0, 0, 0, 0, 0, 1, '2021-12-20 23:13:48', '2021-12-20 23:13:48'),
(10, '2021-12-20', 'CIERRE', '0.00', 'CIERRE DE CAJA CON SALDO 1200', '2021-12-20', 3, 0, 0, 0, 0, 0, 1, '2021-12-20 23:19:30', '2021-12-20 23:19:30'),
(11, '2021-12-20', 'APERTURA', '0.00', 'APERTURA DE CAJA CON SALDO. 1200', '2021-12-20', 2, 0, 0, 0, 0, 0, 1, '2021-12-20 23:19:40', '2021-12-20 23:19:40'),
(13, '2021-12-20', 'CIERRE', '0.00', 'CIERRE DE CAJA CON SALDO 1295', '2021-12-20', 3, 0, 0, 0, 0, 0, 1, '2021-12-20 23:23:32', '2021-12-20 23:23:32'),
(14, '2021-12-21', 'CIERRE', '0.00', 'CIERRE DE CAJA CON SALDO 1295', '2021-12-21', 3, 0, 0, 0, 0, 0, 1, '2021-12-21 23:34:33', '2021-12-21 23:34:33'),
(16, '2021-12-21', 'APERTURA', '0.00', 'APERTURA DE CAJA CON SALDO 1295', '2021-12-21', 2, 0, 0, 0, 0, 0, 1, '2021-12-21 23:36:13', '2021-12-21 23:36:13'),
(17, '2021-12-21', 'EGRESO', '650.00', 'ANTICIPO A NOMBRE DE FELIPE PEREZ', '2021-12-21', 1, 0, 0, 1, 0, 0, 1, '2021-12-22 00:01:37', '2021-12-22 00:01:37'),
(18, '2021-12-23', 'INGRESO', '100.00', 'DETALLE TRABAJO DE', '2021-12-23', 1, 0, 6, 0, 0, 0, 1, '2021-12-23 23:22:17', '2021-12-23 23:22:17'),
(19, '2022-02-10', 'INGRESO', '250.00', 'DETALLE TRABAJO 4', '2022-02-10', 1, 0, 7, 0, 0, 0, 1, '2022-02-10 21:05:06', '2022-02-10 21:05:06'),
(20, '2022-02-19', 'INGRESO', '300.00', 'DETALLE DE TRABAJO NUEVO', '2022-02-19', 1, 0, 8, 0, 0, 0, 1, '2022-02-19 15:54:13', '2022-02-19 15:54:13'),
(21, '2022-05-31', 'INGRESO', '550.00', 'DETALLE DEL TRABAJO DE LA ZONA LOS OLIVOS', '2022-05-31', 1, 0, 9, 0, 0, 0, 2, '2022-05-31 20:00:40', '2022-05-31 20:00:40'),
(23, '2022-07-15', 'CIERRE', '0.00', 'CIERRE DE CAJA CON SALDO 1750', '2022-07-15', 3, 0, 0, 0, 0, 0, 1, '2022-07-16 03:18:33', '2022-07-16 03:18:33'),
(24, '2022-07-16', 'POR RENDIR INGRESO', '500.00', 'DETALLE DE PRUEBA POR RENDIR INGRESO', '2022-07-16', 1, 0, 0, 0, 0, 3, 1, '2022-07-16 15:35:36', '2022-07-16 15:35:36'),
(25, '2022-07-16', 'POR RENDIR EGRESO', '150.00', 'DETALLE DE PRUEBA POR RENDIR EGRESO', '2022-07-16', 1, 0, 0, 0, 0, 3, 1, '2022-07-16 15:35:51', '2022-07-16 15:35:51'),
(26, '2022-08-04', 'EGRESO', '230.00', 'PRUEBA DE IMPORTE QUE SE REGISTRA EN CAJA', '2022-08-04', 1, 2, 0, 0, 0, 0, 1, '2022-08-05 03:16:36', '2022-08-05 03:16:36'),
(27, '2022-08-05', 'INGRESO', '100.00', 'DETALLE TRABAJO 4', '2022-08-05', 1, 0, 10, 0, 0, 0, 1, '2022-08-05 16:10:16', '2022-08-05 16:10:16'),
(28, '2022-08-18', 'INGRESO', '1000.00', 'DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2022-08-18', 1, 0, 12, 0, 0, 0, 1, '2022-08-19 00:33:12', '2022-08-19 00:33:12'),
(29, '2022-08-18', 'INGRESO', '55.00', 'DETALLE TRABAJO DE', '2022-08-18', 1, 0, 13, 0, 0, 0, 1, '2022-08-19 00:41:54', '2022-08-19 00:41:54'),
(30, '2022-08-19', 'EGRESO', '200.00', 'DETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVO', '2022-08-19', 1, 0, 15, 0, 0, 0, 1, '2022-08-19 14:04:17', '2022-08-19 14:04:17'),
(31, '2022-08-19', 'INGRESO', '50.00', 'DETALLE TRABAJO 4', '2022-08-19', 1, 0, 16, 0, 0, 0, 1, '2022-08-19 14:05:31', '2022-08-19 14:05:31'),
(32, '2022-08-19', 'EGRESO', '200.00', 'DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2022-08-19', 1, 0, 17, 0, 0, 0, 1, '2022-08-19 14:06:57', '2022-08-19 14:06:57'),
(33, '2022-08-19', 'INGRESO', '800.00', 'DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2022-08-19', 1, 0, 19, 0, 0, 0, 1, '2022-08-19 17:50:09', '2022-08-19 17:50:09'),
(34, '2022-08-22', 'INGRESO', '200.00', 'PRUEBA 2 REPORTE OBS. 21 SIN ORDEN DE TRABAJO', '2022-08-22', 1, 0, 20, 0, 0, 0, 1, '2022-08-22 16:33:56', '2022-08-22 16:33:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheques`
--

CREATE TABLE `cheques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cheque` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_cheque` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` decimal(24,2) NOT NULL,
  `fac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_cheque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_cobro` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_cobro` date NOT NULL,
  `estado_cobro` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cheques`
--

INSERT INTO `cheques` (`id`, `fecha`, `banco`, `nro_cheque`, `fecha_cheque`, `monto`, `fac`, `empresa`, `nombre_cheque`, `tipo_cobro`, `fecha_cobro`, `estado_cobro`, `fecha_registro`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, '2021-12-21', 'BANCO', '546545', '2021-12-21', '600.00', '2102', 'EMPRESA', 'NOMBRE CHEQUE', 'DEPOSITO', '2021-12-21', 'PENDIENTE', '2021-12-21', 1, 1, '2021-12-22 00:00:44', '2021-12-22 00:00:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nit` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solicitante1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel1` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicitante2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel2` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicitante3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel3` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nit`, `solicitante1`, `cel1`, `email1`, `solicitante2`, `cel2`, `email2`, `solicitante3`, `cel3`, `email3`, `dir`, `fecha_registro`, `razon_social`, `created_at`, `updated_at`) VALUES
(1, '11111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DIRECCION', '2021-10-25', 'RAZON 1', '2021-10-25 14:17:43', '2021-10-25 14:18:39'),
(2, '555555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2021-11-01', 'RAZON 2', '2021-11-01 21:34:00', '2021-11-01 21:34:00'),
(3, '56655', 'JUAN PEREZ', '', 'JUANPEREZ@GMAIL.COM', 'MARIO PEÑA', '', '', 'JESUS BARDERO', '', '', '', '2021-12-18', 'RAZON SOCIAL CLIENTE 3', '2021-12-18 21:52:42', '2022-02-17 17:38:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proveedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_factura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_recibo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importe` decimal(24,2) NOT NULL,
  `rc_it` decimal(24,2) NOT NULL,
  `rc_iue` decimal(24,2) NOT NULL,
  `rs_it` decimal(24,2) NOT NULL,
  `rs_iue` decimal(24,2) NOT NULL,
  `neto` decimal(24,2) NOT NULL,
  `nit_id` bigint(20) UNSIGNED NOT NULL,
  `personal_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_registro` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `descripcion`, `proveedor`, `nro_factura`, `nro_recibo`, `importe`, `rc_it`, `rc_iue`, `rs_it`, `rs_iue`, `neto`, `nit_id`, `personal_id`, `fecha_registro`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, '2021-12-16', 'DESCRIPCION DE LA COMRPA', 'PROVEEDOR', '555666', '', '250.00', '7.50', '12.50', '7.50', '31.25', '191.25', 3, 2, '2021-12-16', 1, 1, '2021-12-16 23:52:58', '2021-12-21 23:17:42'),
(2, '2022-08-04', 'PRUEBA DE IMPORTE QUE SE REGISTRA EN CAJA', 'JUAN RAMIREZ', '10000', '', '230.00', '6.90', '11.50', '6.90', '28.75', '175.95', 3, 2, '2022-08-04', 1, 1, '2022-08-05 03:16:36', '2022-08-05 03:16:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_trabajos`
--

CREATE TABLE `control_trabajos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nro` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `tipo_trabajo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipo_id` bigint(20) UNSIGNED NOT NULL,
  `personal_id` bigint(20) UNSIGNED NOT NULL,
  `detalle_trabajo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo_trabajo` decimal(24,2) NOT NULL,
  `a_cuenta` decimal(24,2) NOT NULL,
  `saldo` decimal(24,2) NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicitante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `archivar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `control_trabajos`
--

INSERT INTO `control_trabajos` (`id`, `nro`, `fecha`, `tipo_trabajo`, `equipo_id`, `personal_id`, `detalle_trabajo`, `costo_trabajo`, `a_cuenta`, `saldo`, `ubicacion`, `tipo`, `cliente`, `solicitante`, `fecha_registro`, `archivar`, `estado`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-12-15', 'ORDEN DE TRABAJO', 1, 1, 'IT IS A LONG ESTABLISHED FACT THAT A READER WILL BE DISTRACTED BY THE READABLE CONTENT OF A PAGE WHEN LOOKING AT ITS LAYOUT.', '650.00', '0.00', '650.00', 'UBICACION', 'CLIENTE', NULL, NULL, '2021-12-15', 'ARCHIVADO', 1, '2021-12-15 23:42:49', '2022-02-10 21:48:08'),
(3, 2, '2021-12-27', 'SIN ORDEN DE TRABAJO', 2, 2, 'DETALLE TRABAJO 4', '500.00', '400.00', '100.00', 'UBICACION', 'CLIENTE', '', '', '2021-12-27', 'PENDIENTE', 1, '2021-12-27 23:04:57', '2022-08-19 14:05:31'),
(4, 3, '2022-02-04', 'ORDEN DE TRABAJO', 1, 1, 'DETALL DE UN NUEVO CONTROL DE TRABAJO', '1500.00', '0.00', '1500.00', 'UBICACION NUEVO CONTROL', 'CLIENTE', 'MARIO CORDOVA', 'JUAN PEREZ', '2022-02-04', 'PENDIENTE', 1, '2022-02-04 20:39:23', '2022-02-04 20:39:23'),
(5, 4, '2022-02-04', 'ORDEN DE TRABAJO', 4, 2, 'DETALLE TRABAJO', '0.00', '0.00', '0.00', 'UBICACION NUEVO CONTROL', 'CLIENTE', 'MARIO CORDOVA', 'JUAN PEREZ', '2022-02-04', 'PENDIENTE', 1, '2022-02-04 20:59:26', '2022-02-04 20:59:26'),
(6, 5, '2022-02-04', 'ORDEN DE TRABAJO', 2, 2, 'DETALLE DE CONTROL DE TRABAJO DETALLE DE CONTROL DE TRABAJO DETALLE DE CONTROL DE TRABAJO DETALLE DE CONTROL DE TRABAJO DETALLE DE CONTROL DE TRABAJO', '1560.00', '0.00', '1560.00', 'UBICACION NUEVO CONTROL', 'CLIENTE', 'MARIO CORDOVA', 'JUAN PEREZ', '2022-02-04', 'PENDIENTE', 1, '2022-02-04 21:00:17', '2022-02-04 21:00:17'),
(7, 6, '2022-02-19', 'ORDEN DE TRABAJO', 2, 4, 'DETALLE DE UNA NUEVA ORDEN DE TRABAJO', '1000.00', '0.00', '1000.00', 'UBICACION NUEVO CONTROL', 'CLIENTE', '', '', '2022-02-19', 'PENDIENTE', 1, '2022-02-19 15:27:26', '2022-02-19 15:27:26'),
(8, 7, '2022-02-19', 'ORDEN DE TRABAJO', 2, 2, 'DETALLE DEL TRABAJO', '1000.00', '0.00', '1000.00', 'UBICACION NUEVO CONTROL', 'CLIENTE', '', '', '2022-02-19', 'PENDIENTE', 1, '2022-02-19 16:13:46', '2022-02-19 16:13:46'),
(9, 8, '2022-08-18', 'SIN ORDEN DE TRABAJO', 2, 2, 'DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2600.00', '1200.00', '800.00', 'UBICACION', 'CLIENTE', 'CLIENTE', '', '2022-08-18', 'PENDIENTE', 1, '2022-08-19 00:29:23', '2022-08-19 14:06:57'),
(10, 9, '2022-08-22', 'ORDEN DE TRABAJO', 2, 2, 'DETALLE DE PRUEBA OBSERVACION 21', '1500.00', '0.00', '1500.00', 'LA PAZ', 'CLIENTE', 'JUAN PEREZ', 'JORGE PEREZ', '2022-08-22', 'PENDIENTE', 1, '2022-08-22 16:07:24', '2022-08-22 16:07:24'),
(11, 10, '2022-08-22', 'SIN ORDEN DE TRABAJO', 2, 3, 'PRUEBA SIN ORDEN DE TRABAJO OBS. 21', '600.00', '0.00', '600.00', 'LA PAZ', 'CLIENTE', 'JUAN PEREZ', '', '2022-08-22', 'PENDIENTE', 1, '2022-08-22 16:26:28', '2022-08-22 16:26:28'),
(12, 11, '2022-01-01', 'SIN ORDEN DE TRABAJO', 4, 4, 'PRUEBA 2 REPORTE OBS. 21 SIN ORDEN DE TRABAJO', '400.00', '200.00', '200.00', 'LA PAZ', 'CLIENTE', '', '', '2022-08-22', 'PENDIENTE', 1, '2022-08-22 16:27:01', '2022-08-22 16:33:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_bancarias`
--

CREATE TABLE `cuenta_bancarias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuenta_bancarias`
--

INSERT INTO `cuenta_bancarias` (`id`, `banco`, `titular`, `nro_cuenta`, `ci`, `nit_id`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 'BANCO CENTRAL DE BOLIVIA', 'JUAN PEREZ', '1000556666', '', 1, '2021-10-26', '2021-10-26 20:24:08', '2021-10-26 20:24:08'),
(2, 'BANCO UNION', 'ELVIS TARIQUI', '100055566666', '', 3, '2021-11-01', '2021-11-01 21:39:04', '2021-11-01 21:39:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono_directo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`id`, `nombre`, `paterno`, `materno`, `ci`, `ci_exp`, `dir`, `email`, `fono`, `cel`, `fono_directo`, `fecha_registro`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'JUAN', 'PEREZ', '', '123', 'LP', 'ZONA LOS OLIVOS CALLE 3 #322', '', '2314568', '78945612', '78945612', '2021-10-22', 2, '2021-10-22 14:37:16', '2021-10-22 14:37:16'),
(2, 'JAIME', 'GONZALES', 'MAMANI', '1111', 'LP', 'ZONA LOS OLIVOS', '', '2314568', '78945612', '2314568', '2021-10-26', 3, '2021-10-26 22:20:52', '2021-10-26 22:20:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_vacaciones`
--

CREATE TABLE `dias_vacaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_id` bigint(20) UNSIGNED NOT NULL,
  `dias` int(11) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dias_vacaciones`
--

INSERT INTO `dias_vacaciones` (`id`, `personal_id`, `dias`, `anio`) VALUES
(3, 1, 7, 2022),
(4, 3, 8, 2022),
(5, 1, 6, 2021),
(6, 4, 20, 2022),
(7, 2, 15, 2022);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_vacacions`
--

CREATE TABLE `dia_vacacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vacacion_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dia_vacacions`
--

INSERT INTO `dia_vacacions` (`id`, `vacacion_id`, `fecha`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(2, 2, '2022-06-02', '2022-05-31', '2022-05-31 22:21:16', '2022-05-31 22:21:16'),
(3, 2, '2022-06-03', '2022-05-31', '2022-05-31 22:21:16', '2022-05-31 22:21:16'),
(4, 2, '2022-06-04', '2022-05-31', '2022-05-31 22:27:53', '2022-05-31 22:27:53'),
(5, 2, '2022-06-01', '2022-05-31', '2022-05-31 22:27:53', '2022-05-31 22:27:53'),
(6, 3, '2022-06-01', '2022-05-31', '2022-05-31 22:28:10', '2022-05-31 22:28:10'),
(8, 3, '2022-06-03', '2022-05-31', '2022-05-31 22:28:19', '2022-05-31 22:28:19'),
(9, 4, '2022-07-30', '2022-07-16', '2022-07-16 15:23:15', '2022-07-16 15:23:15'),
(10, 4, '2022-07-29', '2022-07-16', '2022-07-16 15:23:15', '2022-07-16 15:23:15'),
(12, 4, '2022-07-28', '2022-07-16', '2022-07-16 15:23:15', '2022-07-16 15:23:15'),
(13, 4, '2022-08-03', '2022-07-16', '2022-07-16 15:29:12', '2022-07-16 15:29:12'),
(14, 4, '2022-08-02', '2022-07-16', '2022-07-16 15:29:12', '2022-07-16 15:29:12'),
(15, 4, '2022-07-27', '2022-07-16', '2022-07-16 15:29:12', '2022-07-16 15:29:12'),
(16, 4, '2022-07-26', '2022-07-16', '2022-07-16 15:29:12', '2022-07-16 15:29:12'),
(17, 4, '2022-07-25', '2022-07-16', '2022-07-16 15:29:48', '2022-07-16 15:29:48'),
(18, 4, '2022-08-01', '2022-07-16', '2022-07-16 15:29:48', '2022-07-16 15:29:48'),
(19, 4, '2022-07-23', '2022-07-16', '2022-07-16 15:29:48', '2022-07-16 15:29:48'),
(20, 5, '2022-07-19', '2022-07-18', '2022-07-18 20:17:22', '2022-07-18 20:17:22'),
(21, 5, '2022-07-20', '2022-07-18', '2022-07-18 20:17:22', '2022-07-18 20:17:22'),
(22, 5, '2022-07-21', '2022-07-18', '2022-07-18 20:17:22', '2022-07-18 20:17:22'),
(23, 5, '2022-07-23', '2022-07-18', '2022-07-18 20:17:22', '2022-07-18 20:17:22'),
(26, 5, '2022-07-27', '2022-07-18', '2022-07-18 20:20:03', '2022-07-18 20:20:03'),
(27, 5, '2022-07-28', '2022-07-18', '2022-07-18 20:20:03', '2022-07-18 20:20:03'),
(28, 5, '2022-07-29', '2022-07-18', '2022-07-18 20:20:03', '2022-07-18 20:20:03'),
(29, 6, '2022-07-20', '2022-07-18', '2022-07-18 20:20:28', '2022-07-18 20:20:28'),
(30, 6, '2022-07-21', '2022-07-18', '2022-07-18 20:20:28', '2022-07-18 20:20:28'),
(31, 6, '2022-07-22', '2022-07-18', '2022-07-18 20:20:28', '2022-07-18 20:20:28'),
(32, 6, '2022-07-23', '2022-07-18', '2022-07-18 20:20:28', '2022-07-18 20:20:28'),
(33, 7, '2022-08-09', '2022-08-19', '2022-08-19 14:16:58', '2022-08-19 14:16:58'),
(34, 7, '2022-08-10', '2022-08-19', '2022-08-19 14:16:58', '2022-08-19 14:16:58'),
(35, 7, '2022-08-11', '2022-08-19', '2022-08-19 14:16:58', '2022-08-19 14:16:58'),
(36, 7, '2022-08-12', '2022-08-19', '2022-08-19 14:16:58', '2022-08-19 14:16:58'),
(37, 8, '2022-08-31', '2022-08-19', '2022-08-19 14:26:02', '2022-08-19 14:26:02'),
(38, 8, '2022-09-01', '2022-08-19', '2022-08-19 14:26:02', '2022-08-19 14:26:02'),
(39, 8, '2022-09-02', '2022-08-19', '2022-08-19 14:26:02', '2022-08-19 14:26:02'),
(40, 8, '2022-09-03', '2022-08-19', '2022-08-19 14:26:02', '2022-08-19 14:26:02'),
(41, 9, '2022-10-26', '2022-08-19', '2022-08-19 14:26:23', '2022-08-19 14:26:23'),
(42, 9, '2022-10-27', '2022-08-19', '2022-08-19 14:26:23', '2022-08-19 14:26:23'),
(44, 10, '2022-08-31', '2022-08-19', '2022-08-19 14:27:11', '2022-08-19 14:27:11'),
(45, 10, '2022-09-01', '2022-08-19', '2022-08-19 14:27:11', '2022-08-19 14:27:11'),
(46, 10, '2022-09-02', '2022-08-19', '2022-08-19 14:27:11', '2022-08-19 14:27:11'),
(47, 10, '2022-09-03', '2022-08-19', '2022-08-19 14:27:11', '2022-08-19 14:27:11'),
(48, 10, '2022-08-30', '2022-08-19', '2022-08-19 14:27:12', '2022-08-19 14:27:12'),
(49, 11, '2022-10-27', '2022-08-19', '2022-08-19 14:27:29', '2022-08-19 14:27:29'),
(50, 11, '2022-10-28', '2022-08-19', '2022-08-19 14:27:29', '2022-08-19 14:27:29'),
(51, 11, '2022-10-29', '2022-08-19', '2022-08-19 14:27:29', '2022-08-19 14:27:29'),
(52, 11, '2022-10-26', '2022-08-19', '2022-08-19 14:27:29', '2022-08-19 14:27:29'),
(53, 11, '2022-10-25', '2022-08-19', '2022-08-19 14:27:29', '2022-08-19 14:27:29'),
(54, 12, '2022-12-01', '2022-08-19', '2022-08-19 14:27:47', '2022-08-19 14:27:47'),
(55, 12, '2022-11-30', '2022-08-19', '2022-08-19 14:27:47', '2022-08-19 14:27:47'),
(56, 12, '2022-12-02', '2022-08-19', '2022-08-19 14:27:47', '2022-08-19 14:27:47'),
(57, 12, '2022-11-29', '2022-08-19', '2022-08-19 14:27:47', '2022-08-19 14:27:47'),
(58, 12, '2022-12-03', '2022-08-19', '2022-08-19 14:27:47', '2022-08-19 14:27:47'),
(59, 9, '2022-10-25', '2022-08-19', '2022-08-19 14:32:34', '2022-08-19 14:32:34'),
(60, 9, '2022-10-24', '2022-08-19', '2022-08-19 14:32:34', '2022-08-19 14:32:34'),
(61, 9, '2022-10-22', '2022-08-19', '2022-08-19 14:32:34', '2022-08-19 14:32:34'),
(62, 13, '2022-12-29', '2022-08-19', '2022-08-19 14:32:59', '2022-08-19 14:32:59'),
(63, 13, '2022-12-28', '2022-08-19', '2022-08-19 14:32:59', '2022-08-19 14:32:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_maquinarias`
--

CREATE TABLE `equipo_maquinarias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chasis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `combustible` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `propietario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_aproximado` decimal(24,2) DEFAULT NULL,
  `dui` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruat` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soat` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `inspeccion` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vencimiento_i` date DEFAULT NULL,
  `certificado_petrovisa` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vencimiento_cp` date DEFAULT NULL,
  `poliza_seguro` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vencimiento_ps` date DEFAULT NULL,
  `impuestos` decimal(24,2) DEFAULT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extintor` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento_ex` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipo_maquinarias`
--

INSERT INTO `equipo_maquinarias` (`id`, `codigo`, `item`, `clase`, `capacidad`, `placa`, `marca`, `modelo`, `peso`, `color`, `chasis`, `combustible`, `propietario`, `nit`, `valor_aproximado`, `dui`, `ruat`, `soat`, `vencimiento`, `inspeccion`, `vencimiento_i`, `certificado_petrovisa`, `vencimiento_cp`, `poliza_seguro`, `vencimiento_ps`, `impuestos`, `municipio`, `flete`, `extintor`, `fecha_vencimiento_ex`, `foto`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 'EM-0001', '1111', 'GRUA', '18', '1518 ECA', 'KINGLONG', '1995', '', '', '', '', '', '', '0.00', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0.00', '', '', NULL, NULL, 'default.png', '2021-10-22', '2021-10-22 15:19:39', '2021-11-01 20:42:14'),
(2, 'EM-0002', '22222', 'GRUA', '18', '1518 ECB', 'MARCA', '', '', '', '', '', '', '', '0.00', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0.00', '', '', NULL, NULL, 'default.png', '2021-10-22', '2021-10-22 15:24:25', '2021-10-22 15:24:25'),
(3, 'EEE-001', '55556', 'GRUA 3', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '2021-11-02', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0.00', '', '', NULL, NULL, 'default.png', '2021-11-01', '2021-11-01 21:38:14', '2021-11-01 21:38:14'),
(4, 'EEE-02', '455', 'GRUA', '4', '', '', '', '800', 'ROJO', '', '', '', '', '0.00', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0.00', '', '', 'SI', '2022-01-01', 'default.png', '2021-12-12', '2021-12-12 13:07:58', '2021-12-12 13:08:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_seguimientos`
--

CREATE TABLE `log_seguimientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `accion` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `modulo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `log_seguimientos`
--

INSERT INTO `log_seguimientos` (`id`, `user_id`, `accion`, `descripcion`, `modulo`, `fecha`, `hora`, `created_at`, `updated_at`) VALUES
(1, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2021-12-15', '19:41:44', '2021-12-15 23:41:44', '2021-12-15 23:41:44'),
(2, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2021-12-15', '19:41:44', '2021-12-15 23:41:44', '2021-12-15 23:41:44'),
(4, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2021-12-15', '19:42:49', '2021-12-15 23:42:49', '2021-12-15 23:42:49'),
(5, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN DETALLE DE CONTROL DE TRABAJO', 'CONTROL DE TRABAJO DETALLE', '2021-12-15', '19:50:00', '2021-12-15 23:50:00', '2021-12-15 23:50:00'),
(6, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2021-12-15', '21:05:21', '2021-12-16 01:05:21', '2021-12-16 01:05:21'),
(7, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2021-12-15', '21:16:24', '2021-12-16 01:16:24', '2021-12-16 01:16:24'),
(8, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2021-12-15', '21:16:45', '2021-12-16 01:16:45', '2021-12-16 01:16:45'),
(9, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE COMPRA', 'COMPRAS', '2021-12-16', '19:52:58', '2021-12-16 23:52:58', '2021-12-16 23:52:58'),
(10, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN DETALLE DE CONTROL DE TRABAJO', 'CONTROL DE TRABAJO DETALLE', '2021-12-18', '17:50:52', '2021-12-18 21:50:52', '2021-12-18 21:50:52'),
(11, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CLIENTE', 'CLIENTES', '2021-12-18', '17:52:42', '2021-12-18 21:52:42', '2021-12-18 21:52:42'),
(12, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UNA NOTA DE DEBITO', 'NOTAS DE DEBITO', '2021-12-18', '17:58:51', '2021-12-18 21:58:51', '2021-12-18 21:58:51'),
(13, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE CAJA', 'CAJAS', '2021-12-18', '18:11:57', '2021-12-18 22:11:57', '2021-12-18 22:11:57'),
(14, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE CAJA', 'CAJAS', '2021-12-18', '18:19:45', '2021-12-18 22:19:45', '2021-12-18 22:19:45'),
(15, 1, 'CREACIÓN', 'EL USUARIO admin REALIZÓ UNA APERTURA DE CAJA', 'CAJAS', '2021-12-20', '18:53:59', '2021-12-20 22:53:59', '2021-12-20 22:53:59'),
(16, 1, 'CREACIÓN', 'EL USUARIO admin REALIZÓ UN CIERRE DE CAJA', 'CAJAS', '2021-12-20', '19:13:19', '2021-12-20 23:13:19', '2021-12-20 23:13:19'),
(17, 1, 'CREACIÓN', 'EL USUARIO admin REALIZÓ UNA APERTURA DE CAJA', 'CAJAS', '2021-12-20', '19:13:48', '2021-12-20 23:13:48', '2021-12-20 23:13:48'),
(18, 1, 'CREACIÓN', 'EL USUARIO admin REALIZÓ UN CIERRE DE CAJA', 'CAJAS', '2021-12-20', '19:19:30', '2021-12-20 23:19:30', '2021-12-20 23:19:30'),
(19, 1, 'CREACIÓN', 'EL USUARIO admin REALIZÓ UNA APERTURA DE CAJA', 'CAJAS', '2021-12-20', '19:19:40', '2021-12-20 23:19:40', '2021-12-20 23:19:40'),
(20, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2021-12-20', '19:23:15', '2021-12-20 23:23:15', '2021-12-20 23:23:15'),
(21, 1, 'CREACIÓN', 'EL USUARIO admin REALIZÓ UN CIERRE DE CAJA', 'CAJAS', '2021-12-20', '19:23:32', '2021-12-20 23:23:32', '2021-12-20 23:23:32'),
(22, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN REGISTRO DE COMPRA', 'COMPRAS', '2021-12-21', '19:17:42', '2021-12-21 23:17:42', '2021-12-21 23:17:42'),
(23, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN REGISTRO DE VENTA', 'VENTAS', '2021-12-21', '19:22:11', '2021-12-21 23:22:11', '2021-12-21 23:22:11'),
(24, 1, 'CREACIÓN', 'EL USUARIO admin REALIZÓ UN CIERRE DE CAJA', 'CAJAS', '2021-12-21', '19:34:33', '2021-12-21 23:34:33', '2021-12-21 23:34:33'),
(26, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE CAJA', 'CAJAS', '2021-12-21', '19:36:13', '2021-12-21 23:36:13', '2021-12-21 23:36:13'),
(27, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CHEQUE', 'CHEQUES', '2021-12-21', '20:00:44', '2021-12-22 00:00:44', '2021-12-22 00:00:44'),
(28, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN NUEVO ANTICIPO', 'ANTICIPOS', '2021-12-21', '20:01:37', '2021-12-22 00:01:37', '2021-12-22 00:01:37'),
(29, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN PERSONAL', 'PERSONAL', '2021-12-22', '19:46:11', '2021-12-22 23:46:11', '2021-12-22 23:46:11'),
(30, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2021-12-23', '19:21:49', '2021-12-23 23:21:49', '2021-12-23 23:21:49'),
(31, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2021-12-23', '19:22:17', '2021-12-23 23:22:17', '2021-12-23 23:22:17'),
(32, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2021-12-27', '19:04:57', '2021-12-27 23:04:57', '2021-12-27 23:04:57'),
(33, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2021-12-27', '19:05:04', '2021-12-27 23:05:04', '2021-12-27 23:05:04'),
(34, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN DETALLE DE CONTROL DE TRABAJO', 'CONTROL DE TRABAJO DETALLE', '2021-12-27', '19:06:13', '2021-12-27 23:06:13', '2021-12-27 23:06:13'),
(35, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-01-11', '19:04:13', '2022-01-11 23:04:13', '2022-01-11 23:04:13'),
(36, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-02', '12:28:42', '2022-02-02 16:28:42', '2022-02-02 16:28:42'),
(37, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-02', '12:28:42', '2022-02-02 16:28:42', '2022-02-02 16:28:42'),
(38, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-02', '12:28:51', '2022-02-02 16:28:51', '2022-02-02 16:28:51'),
(39, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-02', '12:31:52', '2022-02-02 16:31:52', '2022-02-02 16:31:52'),
(40, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CLIENTE', 'CLIENTES', '2022-02-02', '13:27:48', '2022-02-02 17:27:48', '2022-02-02 17:27:48'),
(41, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CLIENTE', 'CLIENTES', '2022-02-02', '13:29:04', '2022-02-02 17:29:04', '2022-02-02 17:29:04'),
(42, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-04', '16:39:23', '2022-02-04 20:39:23', '2022-02-04 20:39:23'),
(43, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-02-04', '16:45:06', '2022-02-04 20:45:06', '2022-02-04 20:45:06'),
(44, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-04', '16:59:26', '2022-02-04 20:59:26', '2022-02-04 20:59:26'),
(45, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-04', '17:00:17', '2022-02-04 21:00:17', '2022-02-04 21:00:17'),
(46, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-02-10', '17:05:06', '2022-02-10 21:05:06', '2022-02-10 21:05:06'),
(47, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN PERSONAL', 'PERSONAL', '2022-02-10', '17:24:53', '2022-02-10 21:24:53', '2022-02-10 21:24:53'),
(48, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN PERSONAL', 'PERSONAL', '2022-02-10', '17:25:52', '2022-02-10 21:25:52', '2022-02-10 21:25:52'),
(49, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO (ARCHIVAR)', 'CONTROL DE TRABAJO', '2022-02-10', '17:48:08', '2022-02-10 21:48:08', '2022-02-10 21:48:08'),
(50, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CLIENTE', 'CLIENTES', '2022-02-17', '13:38:15', '2022-02-17 17:38:15', '2022-02-17 17:38:15'),
(51, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-02-17', '13:56:45', '2022-02-17 17:56:45', '2022-02-17 17:56:45'),
(52, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-02-17', '14:00:20', '2022-02-17 18:00:20', '2022-02-17 18:00:20'),
(53, 1, 'ELIMINACIÓN', 'EL USUARIO admin ELIMINO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-02-17', '14:02:13', '2022-02-17 18:02:13', '2022-02-17 18:02:13'),
(54, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-19', '11:27:26', '2022-02-19 15:27:26', '2022-02-19 15:27:26'),
(55, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-02-19', '11:54:13', '2022-02-19 15:54:13', '2022-02-19 15:54:13'),
(56, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-02-19', '11:54:13', '2022-02-19 15:54:13', '2022-02-19 15:54:13'),
(57, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-02-19', '12:13:46', '2022-02-19 16:13:46', '2022-02-19 16:13:46'),
(58, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-02-19', '12:21:23', '2022-02-19 16:21:23', '2022-02-19 16:21:23'),
(59, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-02-19', '12:26:52', '2022-02-19 16:26:52', '2022-02-19 16:26:52'),
(60, 1, 'CREACIÓN', 'EL USUARIO admin ASIGNO UN PERMISO', 'USUARIOS PERMISOS', '2022-02-22', '12:36:27', '2022-02-22 16:36:27', '2022-02-22 16:36:27'),
(61, 1, 'ELIMINACIÓN', 'EL USUARIO admin ELIMINO UN USUARIO', 'USUARIOS', '2022-05-31', '15:37:49', '2022-05-31 19:37:49', '2022-05-31 19:37:49'),
(62, 1, 'ELIMINACIÓN', 'EL USUARIO admin ELIMINO UN USUARIO', 'USUARIOS', '2022-05-31', '15:38:29', '2022-05-31 19:38:29', '2022-05-31 19:38:29'),
(63, 1, 'CREACIÓN', 'EL USUARIO admin ASIGNO UN PERMISO', 'USUARIOS PERMISOS', '2022-05-31', '15:39:48', '2022-05-31 19:39:48', '2022-05-31 19:39:48'),
(64, 1, 'CREACIÓN', 'EL USUARIO admin ASIGNO UN PERMISO', 'USUARIOS PERMISOS', '2022-05-31', '15:40:17', '2022-05-31 19:40:17', '2022-05-31 19:40:17'),
(65, 1, 'CREACIÓN', 'EL USUARIO admin ASIGNO UN PERMISO', 'USUARIOS PERMISOS', '2022-05-31', '15:40:19', '2022-05-31 19:40:19', '2022-05-31 19:40:19'),
(66, 2, 'CREACIÓN', 'EL USUARIO JPEREZ REGISTRO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-05-31', '16:00:40', '2022-05-31 20:00:40', '2022-05-31 20:00:40'),
(67, 2, 'CREACIÓN', 'EL USUARIO JPEREZ REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-05-31', '16:00:40', '2022-05-31 20:00:40', '2022-05-31 20:00:40'),
(68, 1, 'CREACIÓN', 'EL USUARIO admin ASIGNO UN PERMISO', 'USUARIOS PERMISOS', '2022-05-31', '16:01:06', '2022-05-31 20:01:06', '2022-05-31 20:01:06'),
(69, 1, 'CREACIÓN', 'EL USUARIO admin ASIGNO UN PERMISO', 'USUARIOS PERMISOS', '2022-05-31', '16:06:09', '2022-05-31 20:06:09', '2022-05-31 20:06:09'),
(70, 1, 'CREACIÓN', 'EL USUARIO admin ASIGNO UN PERMISO', 'USUARIOS PERMISOS', '2022-05-31', '16:06:10', '2022-05-31 20:06:10', '2022-05-31 20:06:10'),
(71, 1, 'CREACIÓN', 'EL USUARIO admin ASIGNO UN PERMISO', 'USUARIOS PERMISOS', '2022-05-31', '16:06:11', '2022-05-31 20:06:11', '2022-05-31 20:06:11'),
(72, 2, 'MODIFICACIÓN', 'EL USUARIO JPEREZ MODIFICO UN REGISTRO DE VENTA', 'VENTAS', '2022-05-31', '16:23:51', '2022-05-31 20:23:51', '2022-05-31 20:23:51'),
(73, 2, 'MODIFICACIÓN', 'EL USUARIO JPEREZ MODIFICO UN REGISTRO DE VENTA', 'VENTAS', '2022-05-31', '16:24:07', '2022-05-31 20:24:07', '2022-05-31 20:24:07'),
(74, 2, 'MODIFICACIÓN', 'EL USUARIO JPEREZ MODIFICO UN REGISTRO DE VENTA', 'VENTAS', '2022-05-31', '16:24:22', '2022-05-31 20:24:22', '2022-05-31 20:24:22'),
(75, 1, 'CREACIÓN', 'EL USUARIO admin REALIZÓ UN CIERRE DE CAJA', 'CAJAS', '2022-07-15', '23:18:33', '2022-07-16 03:18:33', '2022-07-16 03:18:33'),
(76, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE CAJA', 'CAJAS', '2022-07-16', '11:35:36', '2022-07-16 15:35:36', '2022-07-16 15:35:36'),
(77, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE CAJA', 'CAJAS', '2022-07-16', '11:35:51', '2022-07-16 15:35:51', '2022-07-16 15:35:51'),
(78, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN PERSONAL', 'PERSONAL', '2022-07-16', '12:06:51', '2022-07-16 16:06:51', '2022-07-16 16:06:51'),
(79, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN PERSONAL', 'PERSONAL', '2022-07-16', '12:10:05', '2022-07-16 16:10:05', '2022-07-16 16:10:05'),
(80, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN PERSONAL', 'PERSONAL', '2022-07-16', '12:10:16', '2022-07-16 16:10:16', '2022-07-16 16:10:16'),
(81, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN PERSONAL', 'PERSONAL', '2022-07-16', '12:11:15', '2022-07-16 16:11:15', '2022-07-16 16:11:15'),
(82, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN USUARIO', 'USUARIOS', '2022-07-16', '12:12:30', '2022-07-16 16:12:30', '2022-07-16 16:12:30'),
(83, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN REGISTRO DE COMPRA', 'COMPRAS', '2022-07-16', '12:13:19', '2022-07-16 16:13:19', '2022-07-16 16:13:19'),
(84, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE COMPRA', 'COMPRAS', '2022-08-04', '23:16:36', '2022-08-05 03:16:36', '2022-08-05 03:16:36'),
(85, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-05', '12:10:16', '2022-08-05 16:10:16', '2022-08-05 16:10:16'),
(86, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-08-18', '20:29:23', '2022-08-19 00:29:23', '2022-08-19 00:29:23'),
(87, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-08-18', '20:29:48', '2022-08-19 00:29:48', '2022-08-19 00:29:48'),
(88, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-08-18', '20:30:27', '2022-08-19 00:30:27', '2022-08-19 00:30:27'),
(89, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-18', '20:32:48', '2022-08-19 00:32:48', '2022-08-19 00:32:48'),
(90, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-18', '20:33:12', '2022-08-19 00:33:12', '2022-08-19 00:33:12'),
(91, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-18', '20:41:54', '2022-08-19 00:41:54', '2022-08-19 00:41:54'),
(92, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-18', '20:42:11', '2022-08-19 00:42:11', '2022-08-19 00:42:11'),
(93, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-19', '10:04:17', '2022-08-19 14:04:17', '2022-08-19 14:04:17'),
(94, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-19', '10:05:31', '2022-08-19 14:05:31', '2022-08-19 14:05:31'),
(95, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-19', '10:06:57', '2022-08-19 14:06:57', '2022-08-19 14:06:57'),
(96, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-19', '13:32:08', '2022-08-19 17:32:08', '2022-08-19 17:32:08'),
(97, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-19', '13:49:35', '2022-08-19 17:49:35', '2022-08-19 17:49:35'),
(98, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN REGISTRO DE VENTA', 'VENTAS', '2022-08-19', '13:50:09', '2022-08-19 17:50:09', '2022-08-19 17:50:09'),
(99, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-08-22', '12:07:24', '2022-08-22 16:07:24', '2022-08-22 16:07:24'),
(100, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-08-22', '12:08:21', '2022-08-22 16:08:21', '2022-08-22 16:08:21'),
(101, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-08-22', '12:14:35', '2022-08-22 16:14:35', '2022-08-22 16:14:35'),
(102, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UNA ORDEN DE TRABAJO', 'ORDEN DE TRABAJO', '2022-08-22', '12:22:07', '2022-08-22 16:22:07', '2022-08-22 16:22:07'),
(103, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-08-22', '12:26:28', '2022-08-22 16:26:28', '2022-08-22 16:26:28'),
(104, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-08-22', '12:27:01', '2022-08-22 16:27:01', '2022-08-22 16:27:01'),
(105, 1, 'MODIFICACIÓN', 'EL USUARIO admin MODIFICO UN CONTROL DE TRABAJO', 'CONTROL DE TRABAJO', '2022-08-22', '12:32:21', '2022-08-22 16:32:21', '2022-08-22 16:32:21'),
(106, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-22', '12:33:56', '2022-08-22 16:33:56', '2022-08-22 16:33:56'),
(107, 1, 'CREACIÓN', 'EL USUARIO admin REALIZO UN NUEVO REGISTRO DE VENTA', 'VENTAS', '2022-08-22', '12:34:21', '2022-08-22 16:34:21', '2022-08-22 16:34:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_equipo_maquinarias`
--

CREATE TABLE `mantenimiento_equipo_maquinarias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipo_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `encargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jefe_mantenimiento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purgadora_limpieza` blob,
  `purgadora_control` blob,
  `purgadora_cambios` blob,
  `purgadora_regularizacion` blob,
  `purgadora_mantenimiento` blob,
  `filtro_aire_limpieza` blob,
  `filtro_aire_control` blob,
  `filtro_aire_cambios` blob,
  `filtro_aire_regularizacion` blob,
  `filtro_aire_mantenimiento` blob,
  `sis_enfriamiento_limpieza` blob,
  `sis_enfriamiento_control` blob,
  `sis_enfriamiento_cambios` blob,
  `sis_enfriamiento_regularizacion` blob,
  `sis_enfriamiento_mantenimiento` blob,
  `nivel_agua_limpieza` blob,
  `nivel_agua_control` blob,
  `nivel_agua_cambios` blob,
  `nivel_agua_regularizacion` blob,
  `nivel_agua_mantenimiento` blob,
  `nivel_lf_limpieza` blob,
  `nivel_lf_control` blob,
  `nivel_lf_cambios` blob,
  `nivel_lf_regularizacion` blob,
  `nivel_lf_mantenimiento` blob,
  `nivel_le_limpieza` blob,
  `nivel_le_control` blob,
  `nivel_le_cambios` blob,
  `nivel_le_regularizacion` blob,
  `nivel_le_mantenimiento` blob,
  `nivel_ld_limpieza` blob,
  `nivel_ld_control` blob,
  `nivel_ld_cambios` blob,
  `nivel_ld_regularizacion` blob,
  `nivel_ld_mantenimiento` blob,
  `nivel_lh_limpieza` blob,
  `nivel_lh_control` blob,
  `nivel_lh_cambios` blob,
  `nivel_lh_regularizacion` blob,
  `nivel_lh_mantenimiento` blob,
  `desgaste_pe_limpieza` blob,
  `desgaste_pe_control` blob,
  `desgaste_pe_cambios` blob,
  `desgaste_pe_regularizacion` blob,
  `desgaste_pe_mantenimiento` blob,
  `desgaste_m_limpieza` blob,
  `desgaste_m_control` blob,
  `desgaste_m_cambios` blob,
  `desgaste_m_regularizacion` blob,
  `desgaste_m_mantenimiento` blob,
  `desgaste_zf_limpieza` blob,
  `desgaste_zf_control` blob,
  `desgaste_zf_cambios` blob,
  `desgaste_zf_regularizacion` blob,
  `desgaste_zf_mantenimiento` blob,
  `desgaste_rp_limpieza` blob,
  `desgaste_rp_control` blob,
  `desgaste_rp_cambios` blob,
  `desgaste_rp_regularizacion` blob,
  `desgaste_rp_mantenimiento` blob,
  `desgaste_cw_limpieza` blob,
  `desgaste_cw_control` blob,
  `desgaste_cw_cambios` blob,
  `desgaste_cw_regularizacion` blob,
  `desgaste_cw_mantenimiento` blob,
  `correas_vd_limpieza` blob,
  `correas_vd_control` blob,
  `correas_vd_cambios` blob,
  `correas_vd_regularizacion` blob,
  `correas_vd_mantenimiento` blob,
  `luces_limpieza` blob,
  `luces_control` blob,
  `luces_cambios` blob,
  `luces_regularizacion` blob,
  `luces_mantenimiento` blob,
  `cruce_cd_limpieza` blob,
  `cruce_cd_control` blob,
  `cruce_cd_cambios` blob,
  `cruce_cd_regularizacion` blob,
  `cruce_cd_mantenimiento` blob,
  `aceite_m_limpieza` blob,
  `aceite_m_control` blob,
  `aceite_m_cambios` blob,
  `aceite_m_regularizacion` blob,
  `aceite_m_mantenimiento` blob,
  `filtro_aceite_limpieza` blob,
  `filtro_aceite_control` blob,
  `filtro_aceite_cambios` blob,
  `filtro_aceite_regularizacion` blob,
  `filtro_aceite_mantenimiento` blob,
  `filtro_combustible_limpieza` blob,
  `filtro_combustible_control` blob,
  `filtro_combustible_cambios` blob,
  `filtro_combustible_regularizacion` blob,
  `filtro_combustible_mantenimiento` blob,
  `aceite_cc_limpieza` blob,
  `aceite_cc_control` blob,
  `aceite_cc_cambios` blob,
  `aceite_cc_regularizacion` blob,
  `aceite_cc_mantenimiento` blob,
  `aceite_t_limpieza` blob,
  `aceite_t_control` blob,
  `aceite_t_cambios` blob,
  `aceite_t_regularizacion` blob,
  `aceite_t_mantenimiento` blob,
  `aceite_d_limpieza` blob,
  `aceite_d_control` blob,
  `aceite_d_cambios` blob,
  `aceite_d_regularizacion` blob,
  `aceite_d_mantenimiento` blob,
  `engrase_limpieza` blob,
  `engrase_control` blob,
  `engrase_cambios` blob,
  `engrase_regularizacion` blob,
  `engrase_mantenimiento` blob,
  `neumaticos_limpieza` blob,
  `neumaticos_control` blob,
  `neumaticos_cambios` blob,
  `neumaticos_regularizacion` blob,
  `neumaticos_mantenimiento` blob,
  `motor_limpieza` blob,
  `motor_control` blob,
  `motor_cambios` blob,
  `motor_regularizacion` blob,
  `motor_mantenimiento` blob,
  `sistema_e_limpieza` blob,
  `sistema_e_control` blob,
  `sistema_e_cambios` blob,
  `sistema_e_regularizacion` blob,
  `sistema_e_mantenimiento` blob,
  `frenos_limpieza` blob,
  `frenos_control` blob,
  `frenos_cambios` blob,
  `frenos_regularizacion` blob,
  `frenos_mantenimiento` blob,
  `embrague_limpieza` blob,
  `embrague_control` blob,
  `embrague_cambios` blob,
  `embrague_regularizacion` blob,
  `embrague_mantenimiento` blob,
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_11_11_164550_create_razon_socials_table', 1),
(3, '2020_11_11_164632_create_datos_usuarios_table', 1),
(4, '2021_10_21_093838_create_permisos_table', 1),
(5, '2021_10_21_093924_create_user_permisos_table', 1),
(6, '2021_10_21_094033_create_equipo_maquinarias_table', 1),
(7, '2021_10_21_094035_create_control_trabajos_table', 1),
(8, '2021_10_21_094048_create_trabajo_detalles_table', 1),
(9, '2021_10_21_094101_create_clientes_table', 1),
(10, '2021_10_21_094101_create_personals_table', 1),
(11, '2021_10_21_094102_create_orden_trabajos_table', 1),
(12, '2021_10_21_094212_create_mantenimiento_equipo_maquinarias_table', 1),
(13, '2021_10_21_094222_create_nits_table', 1),
(14, '2021_10_21_094223_create_cuenta_bancarias_table', 1),
(15, '2021_10_21_094233_create_nota_debitos_table', 1),
(16, '2021_10_21_094245_create_cajas_table', 1),
(17, '2021_10_21_094256_create_anticipos_table', 1),
(18, '2021_10_21_094305_create_cheques_table', 1),
(19, '2021_11_03_112933_create_log_seguimientos_table', 2),
(20, '2021_11_03_115754_create_orden_claves_table', 3),
(21, '2021_12_11_184037_create_notificacions_table', 4),
(22, '2021_12_11_184054_create_user_notificacions_table', 5),
(23, '2021_12_12_092314_create_compras_table', 6),
(24, '2021_12_12_092404_create_ventas_table', 7),
(26, '2021_12_12_092509_create_vacacions_table', 8),
(27, '2022_05_31_172120_create_dia_vacacions_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nits`
--

CREATE TABLE `nits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propietario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nits`
--

INSERT INTO `nits` (`id`, `razon_social`, `nit`, `propietario`, `dir`, `fonos`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 'RAZON SOCIAL', '112335', 'JUAN PEREZ', 'ZONA LOS OLIVOS CALLE 3 #322', '78945612 - 78945612', '2021-10-26', '2021-10-26 20:16:44', '2021-10-26 20:16:53'),
(3, 'RAZON SOCIAL 2', '555666', 'ALFRED CARASCO', 'ZONA LOS OLIVOS CALLE 3 #322', '65432156 - 78945612', '2021-10-26', '2021-10-26 20:17:31', '2021-10-26 20:17:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_debitos`
--

CREATE TABLE `nota_debitos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nro` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `cuenta_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nota_debitos`
--

INSERT INTO `nota_debitos` (`id`, `nro`, `cliente_id`, `cuenta_id`, `fecha`, `observaciones`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2021-12-18', 'OBSERVACIONES', 1, '2021-12-18 21:58:51', '2021-12-18 21:58:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacions`
--

CREATE TABLE `notificacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `control_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notificacions`
--

INSERT INTO `notificacions` (`id`, `control_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, 2, 'NUEVA ORDEN DE TRABAJO - 2021-12-15 - IT IS A LONG ESTABLISHED FACT THAT A READER WILL BE DISTRACTED BY THE READABLE CONTENT OF A PAGE WHEN LOOKING AT ITS LAYOUT.', '2021-12-15 23:42:49', '2021-12-15 23:42:49'),
(3, 3, 'NUEVA ORDEN DE TRABAJO - 2021-12-27 - DETALLE TRABAJO 4', '2021-12-27 23:04:57', '2021-12-27 23:04:57'),
(4, 4, 'NUEVA ORDEN DE TRABAJO - 2022-02-04 - DETALL DE UN NUEVO CONTROL DE TRABAJO', '2022-02-04 20:39:23', '2022-02-04 20:39:23'),
(5, 5, 'NUEVA ORDEN DE TRABAJO - 2022-02-04 - DETALLE TRABAJO', '2022-02-04 20:59:26', '2022-02-04 20:59:26'),
(6, 6, 'NUEVA ORDEN DE TRABAJO - 2022-02-04 - DETALLE DE CONTROL DE TRABAJO DETALLE DE CONTROL DE TRABAJO DETALLE DE CONTROL DE TRABAJO DETALLE DE CONTROL DE TRABAJO DETALLE DE CONTROL DE TRABAJO', '2022-02-04 21:00:17', '2022-02-04 21:00:17'),
(7, 7, 'NUEVA ORDEN DE TRABAJO - 2022-02-19 - DETALLE DE UNA NUEVA ORDEN DE TRABAJO', '2022-02-19 15:27:26', '2022-02-19 15:27:26'),
(8, 8, 'NUEVA ORDEN DE TRABAJO - 2022-02-19 - DETALLE DEL TRABAJO', '2022-02-19 16:13:46', '2022-02-19 16:13:46'),
(9, 9, 'NUEVA ORDEN DE TRABAJO - 2022-08-18 - DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2022-08-19 00:29:23', '2022-08-19 00:29:23'),
(10, 10, 'NUEVA ORDEN DE TRABAJO - 2022-08-22 - DETALLE DE PRUEBA OBSERVACION 21', '2022-08-22 16:07:24', '2022-08-22 16:07:24'),
(11, 11, 'NUEVA ORDEN DE TRABAJO - 2022-08-22 - PRUEBA SIN ORDEN DE TRABAJO OBS. 21', '2022-08-22 16:26:29', '2022-08-22 16:26:29'),
(12, 12, 'NUEVA ORDEN DE TRABAJO - 2022-08-22 - PRUEBA 2 REPORTE OBS. 21 SIN ORDEN DE TRABAJO', '2022-08-22 16:27:01', '2022-08-22 16:27:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_claves`
--

CREATE TABLE `orden_claves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orden_id` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orden_claves`
--

INSERT INTO `orden_claves` (`id`, `orden_id`, `clave`, `fecha`, `created_at`, `updated_at`) VALUES
(1, 1, '123', '2022-01-11', '2022-01-11 23:04:03', '2022-01-11 23:04:03'),
(2, 4, '123', '2022-02-17', '2022-02-17 18:00:11', '2022-02-17 18:00:11'),
(3, 5, '123', '2022-02-19', '2022-02-19 15:54:22', '2022-02-19 15:54:22'),
(4, 7, '123', '2022-08-22', '2022-08-22 16:22:00', '2022-08-22 16:22:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajos`
--

CREATE TABLE `orden_trabajos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `control_id` bigint(20) UNSIGNED NOT NULL,
  `nro_orden` bigint(20) UNSIGNED NOT NULL,
  `nro_boleta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `nro_factura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_factura` date NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `solicitante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_trabajo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipo_id` bigint(20) UNSIGNED NOT NULL,
  `detalle_trabajo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_almuerzo` time NOT NULL,
  `hora_retorno` time NOT NULL,
  `total_horas` time NOT NULL,
  `costo_hora` decimal(24,2) NOT NULL,
  `total_horas_extra` time NOT NULL,
  `costo_hora_extra` decimal(24,2) NOT NULL,
  `a_cuenta` decimal(24,2) NOT NULL,
  `saldo` decimal(24,2) NOT NULL,
  `total_pagar` decimal(24,2) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_encargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci_encargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel_encargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orden_trabajos`
--

INSERT INTO `orden_trabajos` (`id`, `control_id`, `nro_orden`, `nro_boleta`, `fecha`, `nro_factura`, `fecha_factura`, `cliente_id`, `solicitante`, `lugar_trabajo`, `equipo_id`, `detalle_trabajo`, `hora_salida`, `hora_almuerzo`, `hora_retorno`, `total_horas`, `costo_hora`, `total_horas_extra`, `costo_hora_extra`, `a_cuenta`, `saldo`, `total_pagar`, `observaciones`, `personal_id`, `nombre_encargado`, `ci_encargado`, `cel_encargado`, `fecha_registro`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '10001', '2021-12-15', '1100011', '2021-12-01', 3, 'asas', 'LUGAR DE TRABAJO', 1, 'ECHO SLAM', '08:30:00', '12:00:00', '17:30:00', '00:00:07', '85.00', '00:00:00', '0.00', '595.00', '0.00', '595.00', '', 2, 'JUAN PEREZ', '455566', '', '2021-12-15', 1, '2021-12-15 23:41:44', '2022-01-11 23:04:13'),
(2, 5, 2, '10002', '2021-12-15', '1100015555', '2021-01-01', 1, '', 'LUGAR DE TRABAJO', 4, 'DETALLE TRABAJO DE', '09:00:00', '12:30:00', '17:15:00', '00:00:07', '65.00', '00:00:00', '0.00', '455.00', '0.00', '455.00', '', 2, 'JUAN PEREZ', '455566', '', '2021-12-15', 1, '2021-12-16 01:05:21', '2022-08-19 17:32:08'),
(3, 4, 3, '100056', '2022-02-04', '1000555', '0000-00-00', 3, 'JUAN PEREZ', 'LUGAR DE TRABAJO', 1, 'DETALLE DE TRABAJO', '08:00:00', '12:30:00', '16:35:00', '00:00:07', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '', 1, '', '', '', '2022-02-04', 1, '2022-02-04 20:45:06', '2022-02-04 20:45:06'),
(4, 6, 4, '100056', '2022-02-17', '10005552122', '0000-00-00', 3, 'MARIO PEÑA', 'LUGAR DE TRABAJO', 2, 'DETALLE DE TRABAJO CON NUEVO CALCULO DE HORAS', '08:45:00', '00:00:00', '16:15:00', '00:00:07', '20.00', '00:00:00', '0.00', '0.00', '146.00', '146.00', '', 2, 'FREDDY CASAS', '12312', '', '2022-02-17', 0, '2022-02-17 17:56:45', '2022-02-17 18:02:13'),
(5, 7, 5, '1000561212', '2022-02-19', '1000555666111', '0000-00-00', 3, 'JUAN PEREZ', 'LUGAR DE TRABAJO', 2, 'DETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVO', '10:00:00', '01:30:00', '15:45:00', '04:15:00', '180.00', '00:00:00', '0.00', '500.00', '500.00', '1000.00', 'PAGO CORREGIDO', 1, 'FREDDY CASAS', '12312', '', '2022-02-19', 1, '2022-02-19 15:54:13', '2022-08-19 14:04:17'),
(6, 8, 6, '444444', '2022-05-31', '3333333', '0000-00-00', 3, 'MARIO PEÑA', 'ZONA LOS OLIVOS CALLE #322', 2, 'DETALLE DEL TRABAJO DE LA ZONA LOS OLIVOS', '09:00:00', '01:00:00', '15:00:00', '05:00:00', '250.00', '01:30:00', '200.00', '550.00', '1000.00', '1550.00', '', 2, '', '', '', '2022-05-31', 1, '2022-05-31 20:00:40', '2022-05-31 20:00:40'),
(7, 10, 7, '123123123123', '2022-08-22', '0', '0000-00-00', 3, 'MARIO PEÑA', 'LA PAZ, ZONA OBRAJES', 2, 'TRABAJO DEPRUEBA', '09:00:00', '00:30:00', '12:00:00', '02:30:00', '40.00', '00:00:00', '0.00', '0.00', '100.00', '100.00', '', 1, '', '', '', '2022-08-22', 1, '2022-08-22 16:14:35', '2022-08-22 16:22:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `modulo`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'TODOS', NULL, NULL, '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(2, 'USUARIOS', 'users.index', 'VER LA LISTA DE USUARIOS', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(3, 'USUARIOS', 'users.create', 'CREAR USUARIOS', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(4, 'USUARIOS', 'users.edit', 'EDITAR USUARIOS', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(5, 'USUARIOS', 'users.destroy', 'ELIMINAR USUARIOS', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(6, 'USUARIOS PERMISOS', 'user_permisos.index', 'VER LA LISTA DE PERMISOS DE UN USUARIO', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(7, 'USUARIOS PERMISOS', 'user_permisos.edit', 'MODIFICAR LOS PERMISOS DE USUARIOS', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(8, 'EMPRESA', 'empresa.index', 'VER INFORMACIÓN DE LA EMPRESA', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(9, 'EMPRESA', 'empresa.edit', 'EDITAR INFORMACIÓN DE LA EMPRESA', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(10, 'REPORTES', 'reportes.index', 'VER Y GENERAR REPORTES', '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(11, 'PERSONAL', 'personals.index', 'VER LA LISTA DE PERSONAL', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(12, 'PERSONAL', 'personals.create', 'CREAR PERSONAL', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(13, 'PERSONAL', 'personals.edit', 'EDITAR PERSONAL', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(14, 'PERSONAL', 'personals.destroy', 'ELIMINAR PERSONAL', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(15, 'CLIENTES', 'clientes.index', 'VER LA LISTA DE CLIENTES', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(16, 'CLIENTES', 'clientes.create', 'CREAR CLIENTES', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(17, 'CLIENTES', 'clientes.edit', 'EDITAR CLIENTES', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(18, 'CLIENTES', 'clientes.destroy', 'ELIMINAR CLIENTES', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(19, 'ORDEN DE TRABAJO', 'orden_trabajos.index', 'VER LA LISTA DE ORDEN DE TRABAJO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(20, 'ORDEN DE TRABAJO', 'orden_trabajos.create', 'CREAR ORDEN DE TRABAJO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(21, 'ORDEN DE TRABAJO', 'orden_trabajos.edit', 'EDITAR ORDEN DE TRABAJO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(22, 'ORDEN DE TRABAJO', 'orden_trabajos.destroy', 'ELIMINAR ORDEN DE TRABAJO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(27, 'CONTROL DE TRABAJO', 'control_trabajos.index', 'VER LA LISTA DE CONTROL DE TRABAJO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(28, 'CONTROL DE TRABAJO', 'control_trabajos.create', 'CREAR CONTROL DE TRABAJO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(29, 'CONTROL DE TRABAJO', 'control_trabajos.edit', 'EDITAR CONTROL DE TRABAJO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(30, 'CONTROL DE TRABAJO', 'control_trabajos.destroy', 'ELIMINAR CONTROL DE TRABAJO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(31, 'CONTROL DE TRABAJO DETALLE', 'trabajo_detalles.index', 'VER LA LISTA DE CONTROL DE TRABAJO DETALLE', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(32, 'CONTROL DE TRABAJO DETALLE', 'trabajo_detalles.create', 'CREAR CONTROL DE TRABAJO DETALLE', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(33, 'CONTROL DE TRABAJO DETALLE', 'trabajo_detalles.edit', 'EDITAR CONTROL DE TRABAJO DETALLE', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(34, 'CONTROL DE TRABAJO DETALLE', 'trabajo_detalles.destroy', 'ELIMINAR CONTROL DE TRABAJO DETALLE', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(35, 'EQUIPOS Y MAQUINARIAS', 'equipo_maquinarias.index', 'VER LA LISTA DE EQUIPOS Y MAQUINARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(36, 'EQUIPOS Y MAQUINARIAS', 'equipo_maquinarias.create', 'CREAR EQUIPOS Y MAQUINARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(37, 'EQUIPOS Y MAQUINARIAS', 'equipo_maquinarias.edit', 'EDITAR EQUIPOS Y MAQUINARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(38, 'EQUIPOS Y MAQUINARIAS', 'equipo_maquinarias.destroy', 'ELIMINAR EQUIPOS Y MAQUINARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(39, 'MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS', 'mantenimiento_equipo_maquinarias.index', 'VER LA LISTA DE MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(40, 'MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS', 'mantenimiento_equipo_maquinarias.create', 'CREAR MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(41, 'MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS', 'mantenimiento_equipo_maquinarias.edit', 'EDITAR MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(42, 'MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS', 'mantenimiento_equipo_maquinarias.destroy', 'ELIMINAR MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(43, 'CUENTAS BANCARIAS', 'cuenta_bancarias.index', 'VER LA LISTA DE CUENTAS BANCARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(44, 'CUENTAS BANCARIAS', 'cuenta_bancarias.create', 'CREAR CUENTAS BANCARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(45, 'CUENTAS BANCARIAS', 'cuenta_bancarias.edit', 'EDITAR CUENTAS BANCARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(46, 'CUENTAS BANCARIAS', 'cuenta_bancarias.destroy', 'ELIMINAR CUENTAS BANCARIAS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(47, 'NIT', 'nits.index', 'VER LA LISTA DE NIT', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(48, 'NIT', 'nits.create', 'CREAR NIT', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(49, 'NIT', 'nits.edit', 'EDITAR NIT', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(50, 'NIT', 'nits.destroy', 'ELIMINAR NIT', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(51, 'NOTAS DE DEBITO', 'nota_debitos.index', 'VER LA LISTA DE NOTAS DE DEBITO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(52, 'NOTAS DE DEBITO', 'nota_debitos.create', 'CREAR NOTAS DE DEBITO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(53, 'NOTAS DE DEBITO', 'nota_debitos.edit', 'EDITAR NOTAS DE DEBITO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(54, 'NOTAS DE DEBITO', 'nota_debitos.destroy', 'ELIMINAR NOTAS DE DEBITO', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(55, 'CAJA', 'cajas.index', 'VER LA LISTA DE CAJA', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(56, 'CAJA', 'cajas.create', 'CREAR CAJA', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(57, 'CAJA', 'cajas.edit', 'EDITAR CAJA', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(58, 'CAJA', 'cajas.destroy', 'ELIMINAR CAJA', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(59, 'ANTICIPOS', 'anticipos.index', 'VER LA LISTA DE ANTICIPOS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(60, 'ANTICIPOS', 'anticipos.create', 'CREAR ANTICIPOS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(61, 'ANTICIPOS', 'anticipos.edit', 'EDITAR ANTICIPOS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(62, 'ANTICIPOS', 'anticipos.destroy', 'ELIMINAR ANTICIPOS', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(63, 'CHEQUES', 'cheques.index', 'VER LA LISTA DE CHEQUES', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(64, 'CHEQUES', 'cheques.create', 'CREAR CHEQUES', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(65, 'CHEQUES', 'cheques.edit', 'EDITAR CHEQUES', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(66, 'CHEQUES', 'cheques.destroy', 'ELIMINAR CHEQUES', '2021-10-26 21:45:29', '2021-10-26 21:45:29'),
(67, 'COMPRAS', 'compras.index', 'VER LA LISTA DE COMPRAS', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(68, 'COMPRAS', 'compras.create', 'CREAR COMPRAS', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(69, 'COMPRAS', 'compras.edit', 'EDITAR COMPRAS', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(70, 'COMPRAS', 'compras.destroy', 'ELIMINAR COMPRAS', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(71, 'VENTAS', 'ventas.index', 'VER LA LISTA DE VENTAS', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(72, 'VENTAS', 'ventas.create', 'CREAR VENTAS', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(73, 'VENTAS', 'ventas.edit', 'EDITAR VENTAS', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(74, 'VENTAS', 'ventas.destroy', 'ELIMINAR VENTAS', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(75, 'VACACIONES', 'vacacions.index', 'VER LA LISTA DE VACACIONES', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(76, 'VACACIONES', 'vacacions.create', 'CREAR VACACIONES', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(77, 'VACACIONES', 'vacacions.edit', 'EDITAR VACACIONES', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(78, 'VACACIONES', 'vacacions.destroy', 'ELIMINAR VACACIONES', '2021-12-12 14:24:57', '2021-12-12 14:24:57'),
(79, 'CONTROL DE TRABAJO', 'control_trabajos.archivar', 'ARCHIVAR CONTROL DE TRABAJO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personals`
--

CREATE TABLE `personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nro` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `responsable_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `tiempo_trabajo` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificacion` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seguro_accidentes` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seguro_salud` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad_hijos` int(11) DEFAULT NULL,
  `nombre_esposa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci_fami` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel_fami` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otros_cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio_fami` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona_fami` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_referencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentesco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fono_fami` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_sangre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lentes` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enfermedad_base` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fracturas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacunas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alergias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `licencia` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento_l` date DEFAULT NULL,
  `licencia_operador` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento_lo` date DEFAULT NULL,
  `petrovisa` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento_p` date DEFAULT NULL,
  `fortaleza` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento_f` date DEFAULT NULL,
  `cns` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_afiliacion` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `retiro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finiquito` decimal(24,2) DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacuna_covid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario` decimal(24,2) DEFAULT NULL,
  `zapato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ropa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personals`
--

INSERT INTO `personals` (`id`, `nro`, `nombre`, `paterno`, `materno`, `cel`, `foto`, `fecha_nac`, `responsable_cargo`, `fecha_ingreso`, `tiempo_trabajo`, `certificacion`, `seguro_accidentes`, `seguro_salud`, `estado_civil`, `cantidad_hijos`, `nombre_esposa`, `ci_fami`, `cel_fami`, `otros_cargo`, `domicilio_fami`, `zona_fami`, `persona_referencia`, `parentesco`, `fono_fami`, `tipo_sangre`, `lentes`, `enfermedad_base`, `operaciones`, `fracturas`, `vacunas`, `alergias`, `ci`, `fecha_vencimiento`, `licencia`, `fecha_vencimiento_l`, `licencia_operador`, `fecha_vencimiento_lo`, `petrovisa`, `fecha_vencimiento_p`, `fortaleza`, `fecha_vencimiento_f`, `cns`, `fecha_afiliacion`, `fecha_baja`, `retiro`, `causa`, `finiquito`, `observacion`, `vacuna_covid`, `salario`, `zapato`, `ropa`, `fecha_registro`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'CARLOS', 'PEREZ', '', '78945612', 'user_default.png', '0000-00-00', 'EVENTUAL', '2021-01-01', '150', 'SI', 'SI', 'SI', 'CONYUGUE', 2, 'MARIA MAMANI', '4444', '78945612', 'MARIA MAMANI CHOQUE', 'ZONA LOS OLIVOS CALLE 3 #3333', 'ZONA BALLIVIANA', 'JUAN PEREZ', 'HERMANO', '78945612', 'O+', 'NO', 'NINGUNA', 'NINGUNA OPERACION', 'NINGUNA FRACTURA', 'VACUNA1, VACUNA2, VACUNA3', 'NINGUNA', '456123', '2021-11-01', 'CATEGORIA B', '2021-11-01', 'LICENCIA OPERADOR', '2021-11-01', 'PETROVISA', '2022-01-01', 'FORTALEZ', '2022-01-01', 'CAJA', '2021-01-01', '2022-01-01', '', '', '0.00', 'OBSERVACIONES', '', '1500.00', '39', 'M', '2021-10-25', 1, '2021-10-25 15:23:37', '2022-07-16 16:11:15'),
(2, 2, 'JOSE MIGUEL', 'BLANCO', '', '35001', 'user_default.png', NULL, 'CARGO', '2021-01-01', '', 'SI', 'SI', 'SI', 'CONYUGUE', 1, 'ELVIRA CHOQUE', '', '', '', '', '', '', '', '', '', 'NO', '', '', '', '', '', '9924307', '2022-03-02', 'NO', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '0.00', '', '', '0.00', '39', 'M', '2021-10-25', 1, '2021-10-25 15:30:07', '2021-12-22 23:46:11'),
(3, 3, 'JUAN CARLOS', 'MAMANI', 'PEREZ', '54664561', 'user_default.png', '0000-00-00', '', '0000-00-00', '', 'SI', 'SI', 'SI', '', 0, '', '', '', '', '', '', '', '', '', '', 'NO', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '0.00', '', '', '0.00', '', '', '2021-11-01', 1, '2021-11-01 21:33:33', '2022-07-16 16:06:51'),
(4, 4, 'MAX', 'PONSE', '', '78945612', 'user_default.png', '1990-03-01', '', '0000-00-00', '', 'SI', 'SI', 'SI', '', 0, '', '', '', '', '', '', '', '', '', '', 'NO', '', '', '', '', '', '6547891', '2023-01-01', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '0.00', '', '', '0.00', '', '', '2022-02-10', 1, '2022-02-10 21:24:53', '2022-02-10 21:25:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razon_socials`
--

CREATE TABLE `razon_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `casilla` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actividad_economica` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `razon_socials`
--

INSERT INTO `razon_socials` (`id`, `nombre`, `alias`, `ciudad`, `dir`, `fono`, `cel`, `casilla`, `correo`, `web`, `logo`, `actividad_economica`, `created_at`, `updated_at`) VALUES
(1, 'EMPRESA PRUEBA', 'CP', 'LA PAZ', 'ZONA LOS OLIVOS CALLE 3 #3232', '21134568', '78945612', '', '', '', 'logo.png', 'ACTIVIDAD ECONOMICA', '2021-10-22 14:36:50', '2021-10-22 14:36:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo_detalles`
--

CREATE TABLE `trabajo_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `control_id` bigint(20) UNSIGNED NOT NULL,
  `nro_boleta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_cobrar` decimal(24,2) NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `nro_factura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_factura` date DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trabajo_detalles`
--

INSERT INTO `trabajo_detalles` (`id`, `control_id`, `nro_boleta`, `monto_cobrar`, `fecha_pago`, `nro_factura`, `fecha_factura`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 2, '555', '1500.00', '2021-12-15', '1100011', '2022-01-01', '2021-12-15', '2021-12-15 23:50:00', '2021-12-15 23:50:00'),
(2, 2, '5556', '650.00', '2021-12-18', '110001122', NULL, '2021-12-18', '2021-12-18 21:50:52', '2021-12-18 21:50:52'),
(3, 3, '0055', '350.00', '2021-12-27', '45555', '2022-01-01', '2021-12-27', '2021-12-27 23:06:13', '2021-12-27 23:06:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('ADMINISTRADOR','OPERADOR') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `tipo`, `foto`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$RrCZZySOwPej2gMFWsrjMe6dLzfaL5Q88h4J75I1FesEBRNPwq1x.', 'ADMINISTRADOR', 'user_default.png', 1, '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(2, 'JPEREZ', '$2y$10$59CMbEzWcMxln8cvtyaExuFPMQEny7ezyzdAR5wK1f9x1aA8YqijC', 'OPERADOR', 'JUAN1634913436.jpg', 1, '2021-10-22 14:37:16', '2021-10-22 14:37:16'),
(3, 'JGONZALES', '$2y$10$TdtUioHVDge5wTj8LZXK5eKikTml26XFKJveekvQdwgwzybPDU/dW', 'ADMINISTRADOR', 'JAIME1635286852.jpg', 1, '2021-10-26 22:20:52', '2021-10-26 22:20:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_notificacions`
--

CREATE TABLE `user_notificacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notificacion_id` bigint(20) UNSIGNED NOT NULL,
  `leido` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_notificacions`
--

INSERT INTO `user_notificacions` (`id`, `user_id`, `notificacion_id`, `leido`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2021-12-15 23:42:49', '2021-12-15 23:42:56'),
(2, 2, 2, 0, '2021-12-15 23:42:49', '2021-12-15 23:42:49'),
(3, 3, 2, 0, '2021-12-15 23:42:49', '2021-12-15 23:42:49'),
(6, 1, 3, 1, '2021-12-27 23:04:57', '2022-02-04 21:05:29'),
(7, 2, 3, 0, '2021-12-27 23:04:57', '2021-12-27 23:04:57'),
(8, 3, 3, 0, '2021-12-27 23:04:57', '2021-12-27 23:04:57'),
(11, 1, 4, 1, '2022-02-04 20:39:23', '2022-02-04 21:05:54'),
(12, 2, 4, 0, '2022-02-04 20:39:23', '2022-02-04 20:39:23'),
(13, 3, 4, 0, '2022-02-04 20:39:23', '2022-02-04 20:39:23'),
(16, 1, 5, 1, '2022-02-04 20:59:26', '2022-02-04 21:06:06'),
(17, 2, 5, 0, '2022-02-04 20:59:26', '2022-02-04 20:59:26'),
(18, 3, 5, 0, '2022-02-04 20:59:26', '2022-02-04 20:59:26'),
(21, 1, 6, 1, '2022-02-04 21:00:17', '2022-02-04 21:06:04'),
(22, 2, 6, 0, '2022-02-04 21:00:17', '2022-02-04 21:00:17'),
(23, 3, 6, 0, '2022-02-04 21:00:17', '2022-02-04 21:00:17'),
(26, 1, 7, 0, '2022-02-19 15:27:26', '2022-02-19 15:27:26'),
(27, 2, 7, 0, '2022-02-19 15:27:26', '2022-02-19 15:27:26'),
(28, 3, 7, 0, '2022-02-19 15:27:26', '2022-02-19 15:27:26'),
(31, 1, 8, 0, '2022-02-19 16:13:46', '2022-02-19 16:13:46'),
(32, 2, 8, 0, '2022-02-19 16:13:46', '2022-02-19 16:13:46'),
(33, 3, 8, 0, '2022-02-19 16:13:46', '2022-02-19 16:13:46'),
(34, 1, 9, 0, '2022-08-19 00:29:23', '2022-08-19 00:29:23'),
(35, 2, 9, 0, '2022-08-19 00:29:23', '2022-08-19 00:29:23'),
(36, 3, 9, 0, '2022-08-19 00:29:23', '2022-08-19 00:29:23'),
(37, 1, 10, 0, '2022-08-22 16:07:24', '2022-08-22 16:07:24'),
(38, 2, 10, 0, '2022-08-22 16:07:24', '2022-08-22 16:07:24'),
(39, 3, 10, 0, '2022-08-22 16:07:24', '2022-08-22 16:07:24'),
(40, 1, 11, 0, '2022-08-22 16:26:29', '2022-08-22 16:26:29'),
(41, 2, 11, 0, '2022-08-22 16:26:29', '2022-08-22 16:26:29'),
(42, 3, 11, 0, '2022-08-22 16:26:29', '2022-08-22 16:26:29'),
(43, 1, 12, 0, '2022-08-22 16:27:01', '2022-08-22 16:27:01'),
(44, 2, 12, 0, '2022-08-22 16:27:01', '2022-08-22 16:27:01'),
(45, 3, 12, 0, '2022-08-22 16:27:01', '2022-08-22 16:27:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_permisos`
--

CREATE TABLE `user_permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permiso_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_permisos`
--

INSERT INTO `user_permisos` (`id`, `user_id`, `permiso_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-10-22 14:36:50', '2021-10-22 14:36:50'),
(4, 2, 2, '2021-10-26 22:21:02', '2021-10-26 22:21:02'),
(6, 2, 39, '2021-10-26 22:50:18', '2021-10-26 22:50:18'),
(7, 2, 27, '2021-10-26 22:50:19', '2021-10-26 22:50:19'),
(8, 2, 43, '2021-10-26 22:50:19', '2021-10-26 22:50:19'),
(9, 2, 47, '2021-10-26 22:50:20', '2021-10-26 22:50:20'),
(10, 2, 31, '2021-10-26 22:50:21', '2021-10-26 22:50:21'),
(11, 2, 35, '2021-10-26 22:50:22', '2021-10-26 22:50:22'),
(12, 2, 51, '2021-10-26 22:50:22', '2021-10-26 22:50:22'),
(13, 2, 6, '2021-10-26 22:50:25', '2021-10-26 22:50:25'),
(15, 2, 55, '2021-10-26 22:51:40', '2021-10-26 22:51:40'),
(16, 2, 59, '2021-10-26 22:51:40', '2021-10-26 22:51:40'),
(17, 2, 63, '2021-10-26 22:51:41', '2021-10-26 22:51:41'),
(18, 3, 2, '2021-10-26 22:53:05', '2021-10-26 22:53:05'),
(19, 3, 3, '2021-10-26 22:53:07', '2021-10-26 22:53:07'),
(20, 3, 6, '2021-10-26 22:53:09', '2021-10-26 22:53:09'),
(21, 3, 8, '2021-10-26 22:53:12', '2021-10-26 22:53:12'),
(22, 3, 11, '2021-10-26 22:53:13', '2021-10-26 22:53:13'),
(23, 3, 12, '2021-10-26 22:53:14', '2021-10-26 22:53:14'),
(25, 3, 20, '2021-10-26 22:53:19', '2021-10-26 22:53:19'),
(26, 3, 27, '2021-10-26 22:53:20', '2021-10-26 22:53:20'),
(27, 3, 28, '2021-10-26 22:53:21', '2021-10-26 22:53:21'),
(28, 3, 31, '2021-10-26 22:53:21', '2021-10-26 22:53:21'),
(29, 3, 32, '2021-10-26 22:53:22', '2021-10-26 22:53:22'),
(30, 3, 35, '2021-10-26 22:53:23', '2021-10-26 22:53:23'),
(31, 3, 36, '2021-10-26 22:53:23', '2021-10-26 22:53:23'),
(32, 3, 39, '2021-10-26 22:53:25', '2021-10-26 22:53:25'),
(33, 3, 40, '2021-10-26 22:53:25', '2021-10-26 22:53:25'),
(34, 3, 43, '2021-10-26 22:53:26', '2021-10-26 22:53:26'),
(35, 3, 44, '2021-10-26 22:53:26', '2021-10-26 22:53:26'),
(36, 3, 47, '2021-10-26 22:53:27', '2021-10-26 22:53:27'),
(37, 3, 48, '2021-10-26 22:53:27', '2021-10-26 22:53:27'),
(38, 3, 51, '2021-10-26 22:53:28', '2021-10-26 22:53:28'),
(39, 3, 52, '2021-10-26 22:53:29', '2021-10-26 22:53:29'),
(40, 3, 55, '2021-10-26 22:53:30', '2021-10-26 22:53:30'),
(41, 3, 56, '2021-10-26 22:53:31', '2021-10-26 22:53:31'),
(42, 3, 59, '2021-10-26 22:53:31', '2021-10-26 22:53:31'),
(43, 3, 60, '2021-10-26 22:53:32', '2021-10-26 22:53:32'),
(44, 3, 63, '2021-10-26 22:53:33', '2021-10-26 22:53:33'),
(45, 3, 64, '2021-10-26 22:53:34', '2021-10-26 22:53:34'),
(51, 3, 67, '2021-12-12 14:36:01', '2021-12-12 14:36:01'),
(52, 3, 68, '2021-12-12 14:36:03', '2021-12-12 14:36:03'),
(53, 3, 71, '2021-12-12 14:36:05', '2021-12-12 14:36:05'),
(54, 3, 72, '2021-12-12 14:36:05', '2021-12-12 14:36:05'),
(55, 3, 69, '2021-12-12 14:36:07', '2021-12-12 14:36:07'),
(56, 3, 73, '2021-12-12 14:36:08', '2021-12-12 14:36:08'),
(57, 3, 70, '2021-12-12 14:36:09', '2021-12-12 14:36:09'),
(58, 3, 74, '2021-12-12 14:36:10', '2021-12-12 14:36:10'),
(59, 3, 75, '2021-12-12 14:39:50', '2021-12-12 14:39:50'),
(60, 3, 76, '2021-12-12 14:39:51', '2021-12-12 14:39:51'),
(61, 3, 77, '2021-12-12 14:39:51', '2021-12-12 14:39:51'),
(62, 3, 78, '2021-12-12 14:39:52', '2021-12-12 14:39:52'),
(63, 3, 19, '2021-12-12 14:43:53', '2021-12-12 14:43:53'),
(64, 2, 79, '2022-02-22 16:36:27', '2022-02-22 16:36:27'),
(65, 2, 15, '2022-05-31 19:39:48', '2022-05-31 19:39:48'),
(66, 2, 19, '2022-05-31 19:40:17', '2022-05-31 19:40:17'),
(67, 2, 20, '2022-05-31 19:40:19', '2022-05-31 19:40:19'),
(68, 2, 21, '2022-05-31 20:01:06', '2022-05-31 20:01:06'),
(69, 2, 71, '2022-05-31 20:06:09', '2022-05-31 20:06:09'),
(70, 2, 72, '2022-05-31 20:06:10', '2022-05-31 20:06:10'),
(71, 2, 73, '2022-05-31 20:06:11', '2022-05-31 20:06:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacacions`
--

CREATE TABLE `vacacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_id` bigint(20) UNSIGNED NOT NULL,
  `anio` int(11) NOT NULL,
  `nro_boleta` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_dias` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vacacions`
--

INSERT INTO `vacacions` (`id`, `personal_id`, `anio`, `nro_boleta`, `total_dias`, `saldo`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(5, 1, 2022, '33333', 7, 0, '2022-07-18', '2022-07-18 20:17:22', '2022-07-18 20:20:03'),
(6, 3, 2022, '333434', 4, 4, '2022-07-18', '2022-07-18 20:20:28', '2022-07-18 20:20:28'),
(7, 4, 2022, '322323', 4, 16, '2022-08-19', '2022-08-19 14:16:58', '2022-08-19 14:16:58'),
(8, 4, 2022, '432', 4, 12, '2022-08-19', '2022-08-19 14:26:02', '2022-08-19 14:26:02'),
(9, 4, 2022, '444', 5, 7, '2022-08-19', '2022-08-19 14:26:23', '2022-08-19 14:32:34'),
(10, 2, 2022, '5556565', 5, 10, '2022-08-19', '2022-08-19 14:27:11', '2022-08-19 14:27:11'),
(11, 2, 2022, '33333333', 5, 5, '2022-08-19', '2022-08-19 14:27:29', '2022-08-19 14:27:29'),
(12, 2, 2022, '55555', 5, 0, '2022-08-19', '2022-08-19 14:27:47', '2022-08-19 14:27:47'),
(13, 4, 2022, '234234', 2, 5, '2022-08-19', '2022-08-19 14:32:59', '2022-08-19 14:32:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registro_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pagar` decimal(24,2) NOT NULL,
  `total_cancelado` decimal(24,2) NOT NULL,
  `saldo` decimal(24,2) NOT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `nro_factura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `nit_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuenta_id` bigint(20) UNSIGNED NOT NULL,
  `nit_id` bigint(20) UNSIGNED NOT NULL,
  `personal_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_registro` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `registro_id`, `tipo`, `total_pagar`, `total_cancelado`, `saldo`, `detalle`, `fecha`, `nro_factura`, `cliente_id`, `nit_cliente`, `tipo_pago`, `cuenta_id`, `nit_id`, `personal_id`, `fecha_registro`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'ORDEN DE TRABAJO', '595.00', '250.00', '345.00', 'AAAAAA', '2021-12-15', '1100011', 1, '11111111', 'EFECTIVO', 0, 0, 3, '2021-12-15', 1, 1, '2021-12-15 23:41:44', '2021-12-21 23:22:11'),
(2, 2, 'ORDEN DE TRABAJO', '0.00', '200.00', '255.00', 'DETALLE TRABAJO DE', '2021-12-15', '1100011666', 1, '11111111', 'EFECTIVO', 0, 0, 2, '2021-12-15', 1, 1, '2021-12-16 01:16:24', '2021-12-16 01:16:24'),
(3, 1, 'ORDEN DE TRABAJO', '0.00', '150.00', '195.00', 'BBBBBB', '2021-12-15', '888888', 1, '11111111', 'DEPOSITO BANCARIO', 1, 1, 1, '2021-12-15', 1, 1, '2021-12-16 01:16:45', '2021-12-16 01:16:45'),
(4, 1, 'ORDEN DE TRABAJO', '0.00', '95.00', '100.00', 'T IS A LONG ESTABLISHED FACT THAT A READER WILL BE DISTRACTED BY THE READABLE CONTENT OF A PAGE WHEN LOOKING AT ITS LAYOUT.', '2021-12-20', '1100011666', 2, '555555', 'POR PAGAR', 0, 0, 1, '2021-12-20', 1, 1, '2021-12-20 23:23:15', '2022-05-31 20:24:22'),
(5, 1, 'ORDEN DE TRABAJO', '0.00', '100.00', '0.00', 'T IS A LONG ESTABLISHED FACT THAT A READER WILL BE DISTRACTED BY THE READABLE CONTENT OF A PAGE WHEN LOOKING AT ITS LAYOUT.', '2021-12-23', '110001122', 2, '555555', 'DEPOSITO BANCARIO', 2, 3, 1, '2021-12-23', 1, 1, '2021-12-23 23:21:49', '2021-12-23 23:21:49'),
(6, 2, 'ORDEN DE TRABAJO', '0.00', '100.00', '155.00', 'DETALLE TRABAJO DE', '2021-12-23', '555666', 3, '56655', 'EFECTIVO', 0, 0, 1, '2021-12-23', 1, 1, '2021-12-23 23:22:17', '2021-12-23 23:22:17'),
(7, 3, 'SIN ORDEN DE TRABAJO', '0.00', '250.00', '250.00', 'DETALLE TRABAJO 4', '2022-02-10', '1000555666', 3, '56655', 'EFECTIVO', 0, 0, 2, '2022-02-10', 1, 1, '2022-02-10 21:05:06', '2022-02-10 21:05:06'),
(8, 5, 'ORDEN DE TRABAJO', '1000.00', '300.00', '700.00', 'DETALLE DE TRABAJO NUEVO', '2022-02-19', '1000555666111', 3, '56655', 'EFECTIVO', 0, 0, 1, '2022-02-19', 1, 1, '2022-02-19 15:54:13', '2022-02-19 15:54:13'),
(9, 6, 'ORDEN DE TRABAJO', '1550.00', '550.00', '1000.00', 'DETALLE DEL TRABAJO DE LA ZONA LOS OLIVOS', '2022-05-31', '3333333', 3, '56655', 'EFECTIVO', 0, 0, 2, '2022-05-31', 2, 1, '2022-05-31 20:00:40', '2022-05-31 20:00:40'),
(10, 3, 'SIN ORDEN DE TRABAJO', '0.00', '100.00', '150.00', 'DETALLE TRABAJO 4', '2022-08-05', '10000', 2, '555555', 'EFECTIVO', 2, 3, 3, '2022-08-05', 1, 1, '2022-08-05 16:10:16', '2022-08-05 16:10:16'),
(11, 9, 'SIN ORDEN DE TRABAJO', '0.00', '600.00', '2000.00', 'DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2022-08-18', '10000', 2, '555555', 'POR PAGAR', 1, 1, 2, '2022-08-18', 1, 1, '2022-08-19 00:32:48', '2022-08-19 00:32:48'),
(12, 9, 'SIN ORDEN DE TRABAJO', '0.00', '1000.00', '1000.00', 'DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2022-08-18', '4334433434', 2, '555555', 'EFECTIVO', 2, 3, 4, '2022-08-18', 1, 1, '2022-08-19 00:33:12', '2022-08-19 00:33:12'),
(13, 2, 'ORDEN DE TRABAJO', '0.00', '55.00', '100.00', 'DETALLE TRABAJO DE', '2022-08-18', '43433333', 2, '555555', 'EFECTIVO', 1, 1, 2, '2022-08-18', 1, 1, '2022-08-19 00:41:54', '2022-08-19 00:41:54'),
(14, 6, 'ORDEN DE TRABAJO', '0.00', '500.00', '500.00', 'DETALLE DEL TRABAJO DE LA ZONA LOS OLIVOS', '2022-08-18', '43343434', 2, '555555', 'POR PAGAR', 2, 3, 1, '2022-08-18', 1, 1, '2022-08-19 00:42:11', '2022-08-19 00:42:11'),
(15, 5, 'ORDEN DE TRABAJO', '0.00', '200.00', '500.00', 'DETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVODETALLE DE TRABAJO NUEVO', '2022-08-19', '435345345345', 2, '555555', 'EGRESOS SUELDOS', 1, 1, 2, '2022-08-19', 1, 1, '2022-08-19 14:04:17', '2022-08-19 14:04:17'),
(16, 3, 'SIN ORDEN DE TRABAJO', '0.00', '50.00', '100.00', 'DETALLE TRABAJO 4', '2022-08-19', '3423423423', 1, '11111111', 'EFECTIVO', 2, 3, 1, '2022-08-19', 1, 1, '2022-08-19 14:05:31', '2022-08-19 14:05:31'),
(17, 9, 'SIN ORDEN DE TRABAJO', '0.00', '200.00', '800.00', 'DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2022-08-19', '324234234234', 1, '11111111', 'EGRESOS SUELDOS', 2, 3, 3, '2022-08-19', 1, 1, '2022-08-19 14:06:57', '2022-08-19 14:06:57'),
(18, 2, 'ORDEN DE TRABAJO', '0.00', '100.00', '0.00', 'DETALLE TRABAJO PRUEBA, PAGADO TOTAL', '2022-08-19', '34234234234', 1, '11111111', 'DEPOSITO BANCARIO', 1, 1, 2, '2022-08-19', 1, 1, '2022-08-19 17:32:08', '2022-08-19 17:32:08'),
(19, 9, 'SIN ORDEN DE TRABAJO', '0.00', '800.00', '0.00', 'DETALLE DE CONTROL DE TRABAJO SIN ORDEN DE TRABAJO', '2022-08-19', '43534534', 2, '555555', 'EFECTIVO', 1, 1, 3, '2022-08-19', 1, 1, '2022-08-19 17:49:35', '2022-08-19 17:50:09'),
(20, 12, 'SIN ORDEN DE TRABAJO', '0.00', '200.00', '200.00', 'PRUEBA 2 REPORTE OBS. 21 SIN ORDEN DE TRABAJO', '2022-08-22', '43344334342', 1, '11111111', 'EFECTIVO', 1, 1, 1, '2022-08-22', 1, 1, '2022-08-22 16:33:56', '2022-08-22 16:33:56'),
(21, 12, 'SIN ORDEN DE TRABAJO', '0.00', '100.00', '100.00', 'PRUEBA 2 REPORTE OBS. 21 SIN ORDEN DE TRABAJO', '2022-08-22', '3333', 2, '555555', 'POR PAGAR', 2, 3, 1, '2022-08-22', 1, 1, '2022-08-22 16:34:21', '2022-08-22 16:34:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anticipos`
--
ALTER TABLE `anticipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `control_trabajos`
--
ALTER TABLE `control_trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_trabajos_equipo_id_foreign` (`equipo_id`);

--
-- Indices de la tabla `cuenta_bancarias`
--
ALTER TABLE `cuenta_bancarias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuenta_bancarias_nit_id_foreign` (`nit_id`);

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datos_usuarios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `dias_vacaciones`
--
ALTER TABLE `dias_vacaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dia_vacacions`
--
ALTER TABLE `dia_vacacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipo_maquinarias`
--
ALTER TABLE `equipo_maquinarias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `equipo_maquinarias_codigo_unique` (`codigo`);

--
-- Indices de la tabla `log_seguimientos`
--
ALTER TABLE `log_seguimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimiento_equipo_maquinarias`
--
ALTER TABLE `mantenimiento_equipo_maquinarias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mantenimiento_equipo_maquinarias_equipo_id_foreign` (`equipo_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nits`
--
ALTER TABLE `nits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nota_debitos`
--
ALTER TABLE `nota_debitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota_debitos_cliente_id_foreign` (`cliente_id`),
  ADD KEY `nota_debitos_cuenta_id_foreign` (`cuenta_id`);

--
-- Indices de la tabla `notificacions`
--
ALTER TABLE `notificacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_claves`
--
ALTER TABLE `orden_claves`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_trabajos`
--
ALTER TABLE `orden_trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_trabajos_cliente_id_foreign` (`cliente_id`),
  ADD KEY `orden_trabajos_equpo_id_foreign` (`equipo_id`),
  ADD KEY `orden_trabajos_personal_id_foreign` (`personal_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `razon_socials`
--
ALTER TABLE `razon_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajo_detalles`
--
ALTER TABLE `trabajo_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabajo_detalles_control_id_foreign` (`control_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_notificacions`
--
ALTER TABLE `user_notificacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_permisos`
--
ALTER TABLE `user_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacacions`
--
ALTER TABLE `vacacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anticipos`
--
ALTER TABLE `anticipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `control_trabajos`
--
ALTER TABLE `control_trabajos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cuenta_bancarias`
--
ALTER TABLE `cuenta_bancarias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dias_vacaciones`
--
ALTER TABLE `dias_vacaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `dia_vacacions`
--
ALTER TABLE `dia_vacacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `equipo_maquinarias`
--
ALTER TABLE `equipo_maquinarias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `log_seguimientos`
--
ALTER TABLE `log_seguimientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_equipo_maquinarias`
--
ALTER TABLE `mantenimiento_equipo_maquinarias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `nits`
--
ALTER TABLE `nits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nota_debitos`
--
ALTER TABLE `nota_debitos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notificacions`
--
ALTER TABLE `notificacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `orden_claves`
--
ALTER TABLE `orden_claves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `orden_trabajos`
--
ALTER TABLE `orden_trabajos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `personals`
--
ALTER TABLE `personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `razon_socials`
--
ALTER TABLE `razon_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `trabajo_detalles`
--
ALTER TABLE `trabajo_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_notificacions`
--
ALTER TABLE `user_notificacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `user_permisos`
--
ALTER TABLE `user_permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `vacacions`
--
ALTER TABLE `vacacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control_trabajos`
--
ALTER TABLE `control_trabajos`
  ADD CONSTRAINT `control_trabajos_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipo_maquinarias` (`id`);

--
-- Filtros para la tabla `cuenta_bancarias`
--
ALTER TABLE `cuenta_bancarias`
  ADD CONSTRAINT `cuenta_bancarias_nit_id_foreign` FOREIGN KEY (`nit_id`) REFERENCES `nits` (`id`);

--
-- Filtros para la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD CONSTRAINT `datos_usuarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `mantenimiento_equipo_maquinarias`
--
ALTER TABLE `mantenimiento_equipo_maquinarias`
  ADD CONSTRAINT `mantenimiento_equipo_maquinarias_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipo_maquinarias` (`id`);

--
-- Filtros para la tabla `nota_debitos`
--
ALTER TABLE `nota_debitos`
  ADD CONSTRAINT `nota_debitos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `nota_debitos_cuenta_id_foreign` FOREIGN KEY (`cuenta_id`) REFERENCES `cuenta_bancarias` (`id`);

--
-- Filtros para la tabla `orden_trabajos`
--
ALTER TABLE `orden_trabajos`
  ADD CONSTRAINT `orden_trabajos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `orden_trabajos_equpo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipo_maquinarias` (`id`),
  ADD CONSTRAINT `orden_trabajos_personal_id_foreign` FOREIGN KEY (`personal_id`) REFERENCES `personals` (`id`);

--
-- Filtros para la tabla `trabajo_detalles`
--
ALTER TABLE `trabajo_detalles`
  ADD CONSTRAINT `trabajo_detalles_control_id_foreign` FOREIGN KEY (`control_id`) REFERENCES `control_trabajos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
