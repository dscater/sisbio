-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-03-2023 a las 15:55:27
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
-- Base de datos: `sisbio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `personals_id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `ingreso_maniana` time DEFAULT NULL,
  `salida_maniana` time DEFAULT NULL,
  `ingreso_tarde` time DEFAULT NULL,
  `salida_tarde` time DEFAULT NULL,
  `estado` enum('ASISTIÓ','FALTA','PERMISO','VACACIONES') COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `personals_id`, `fecha`, `ingreso_maniana`, `salida_maniana`, `ingreso_tarde`, `salida_tarde`, `estado`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 18, '2023-03-11', '09:54:00', '09:54:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-11 13:54:28', '2023-03-11 13:54:28'),
(2, 18, '2023-03-13', '10:13:00', '10:13:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 14:13:21', '2023-03-13 14:13:21'),
(3, 7, '2023-03-13', '10:17:00', '10:17:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 14:17:22', '2023-03-13 14:17:22'),
(4, 14, '2023-03-13', '10:18:00', '10:18:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 14:18:24', '2023-03-13 14:18:24'),
(5, 13, '2023-03-13', '10:25:00', '10:25:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 14:25:47', '2023-03-13 14:25:47'),
(6, 21, '2023-03-13', '10:27:00', '10:27:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 14:27:20', '2023-03-13 14:27:20'),
(7, 17, '2023-03-13', '10:28:00', '10:28:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 14:28:20', '2023-03-13 14:28:20'),
(8, 8, '2023-03-13', '10:29:00', '10:29:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 14:29:05', '2023-03-13 14:29:05'),
(9, 22, '2023-03-13', '10:32:00', '10:32:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 14:32:51', '2023-03-13 14:32:51'),
(10, 20, '2023-03-13', '11:11:00', '11:11:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 15:11:31', '2023-03-13 15:11:31'),
(11, 9, '2023-03-13', '11:14:00', '11:14:00', NULL, NULL, 'ASISTIÓ', NULL, '2023-03-13 15:14:18', '2023-03-13 15:14:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'CONTADOR', '', '2023-02-11 10:29:11', '2023-02-11 10:29:11'),
(5, 'ADMINISTRACION', '', '2023-02-11 10:29:28', '2023-02-11 10:29:28'),
(6, 'EQUIDAD DE GENERO', '', '2023-02-11 10:29:49', '2023-02-11 10:29:49'),
(7, 'DEFENSORIA', '', '2023-02-11 10:30:06', '2023-02-11 10:30:06'),
(8, 'EVENTUAL', '', '2023-02-11 18:36:27', '2023-02-11 18:36:27'),
(9, 'ABOGADA', '', '2023-02-15 03:01:23', '2023-02-15 03:01:23'),
(10, 'GENERO', '', '2023-02-15 03:01:46', '2023-02-15 03:01:46'),
(11, 'SECRETARIA', '', '2023-02-15 03:02:09', '2023-02-15 03:02:09'),
(12, 'CONTROL SOCIAL', '', '2023-02-15 03:02:38', '2023-02-15 03:02:38'),
(14, 'CARGO DE PRUEBA', 'DESC', '2023-03-13 15:38:36', '2023-03-13 15:38:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `personals_id` int(10) UNSIGNED NOT NULL,
  `fech_ingreso` date NOT NULL,
  `fech_retiro` date NOT NULL,
  `forma_pago` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salario` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_areas_id` int(10) UNSIGNED NOT NULL,
  `cargos_id` int(10) UNSIGNED NOT NULL,
  `tipo_contrato` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turno` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit_personal` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_seguro` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cuenta` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `personals_id`, `fech_ingreso`, `fech_retiro`, `forma_pago`, `salario`, `unidad_areas_id`, `cargos_id`, `tipo_contrato`, `turno`, `nit_personal`, `nro_seguro`, `nro_cuenta`, `nombre_banco`, `observacion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 7, '2023-01-02', '2023-12-12', 'MENSUAL', '4500', 4, 4, 'POR CONTRATO', 'JORNADA ORDINARIA', '69885389', '69885389', '', '', '', 'ACTIVO', '2023-02-11 18:10:02', '2023-02-11 18:10:02'),
(2, 8, '2023-01-02', '2023-12-30', 'MENSUAL', '5200', 6, 7, 'DE PLANTA', 'JORNADA ORDINARIA', '9865328', '8956', '', '', '', 'ACTIVO', '2023-02-11 18:28:23', '2023-02-11 18:28:23'),
(3, 9, '2023-01-02', '2023-12-30', 'DIARIO', '150', 7, 8, 'EVENTUAL', 'TARDE', '6988532', '6988532', '', '', '', 'ACTIVO', '2023-02-11 18:36:03', '2023-02-11 18:37:02'),
(4, 18, '2023-01-02', '2023-12-21', 'MENSUAL', '4200', 8, 10, 'DE PLANTA', 'JORNADA ORDINARIA', '195753456852', '0011', '', '', '', 'ACTIVO', '2023-02-15 03:43:04', '2023-02-15 03:43:04'),
(5, 14, '2023-02-02', '2023-12-20', 'MENSUAL', '4250', 9, 12, 'DE PLANTA', 'JORNADA ORDINARIA', '75315948612', '0022', '', '', '', 'ACTIVO', '2023-02-15 03:45:32', '2023-02-15 03:45:32'),
(6, 13, '2023-01-20', '2023-12-12', 'MENSUAL', '5200', 8, 9, 'DE PLANTA', 'JORNADA ORDINARIA', '15975315975', '0033', '', '', '', 'ACTIVO', '2023-02-15 03:47:14', '2023-02-15 03:47:14'),
(7, 17, '2023-01-20', '2023-12-12', 'MENSUAL', '4800', 9, 12, 'DE PLANTA', 'JORNADA ORDINARIA', '32165498775', '0044', '', '', '', 'ACTIVO', '2023-02-15 03:49:17', '2023-02-15 03:49:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apep` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apem` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargos_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`id`, `name`, `apep`, `apem`, `ci`, `ci_exp`, `dir`, `email`, `fono`, `cel`, `foto`, `cargos_id`, `users_id`, `created_at`, `updated_at`) VALUES
(3, 'MARIO', 'ALCAZAR', 'BARRERA', '123456', 'LP', 'ZONA NORTE', '', '2665678', '78644571', '1553022625M1234562.png', 5, 5, '2023-02-19 19:10:25', '2023-02-19 19:10:25'),
(5, 'RAMIRO', 'CONDE', 'APAZA', '6988532', 'LP', 'ZONA CENTRAL', '', '2887676', '7675544', '1678720919R69885321.jpg', 5, 7, '2023-02-19 19:29:09', '2023-03-13 15:21:59'),
(6, 'PABLO', 'ALBES', 'MARTINEZ', '1122', 'CB', 'LOS OLIVOS', 'PABLO@GMAIL.COM', '22222', '777777', '1678721134P11221.png', 4, 8, '2023-03-13 15:25:34', '2023-03-13 15:25:34'),
(7, 'EDUARDO', 'CACERES', '', '1133', 'LP', 'LOS OLIVOS', '', '22222', '777777', '1678721204E11332.png', 4, 9, '2023-03-13 15:26:44', '2023-03-13 15:26:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `personals_id` int(10) UNSIGNED NOT NULL,
  `tipo_descuento` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mes` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_desc` date NOT NULL,
  `descripcion` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod_emp` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_autorizacion` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_empleador` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zona` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avenida` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_residencia` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `casilla` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividad_economica` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `cod_emp`, `nit`, `nro_autorizacion`, `nro_empleador`, `name`, `alias`, `pais`, `dpto`, `ciudad`, `zona`, `avenida`, `calle`, `nro_residencia`, `email`, `fono`, `cel`, `fax`, `casilla`, `web`, `logo`, `actividad_economica`, `created_at`, `updated_at`) VALUES
(1, '0', '0', '0', '2088975', 'SISTEMA DE RECURSOS HUMANOS', '', 'BOLIVIA', 'LA PAZ', 'LA PAZ', 'LOS OLIVOS', 'PEDREGALES', '0', '0', '', '2886541', '76844514', '', '', '', 'logo.png', 'SERVICIOS', '2023-01-17 23:45:55', '2023-01-17 23:45:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializacion_personals`
--

CREATE TABLE `especializacion_personals` (
  `id` int(10) UNSIGNED NOT NULL,
  `personals_id` int(10) UNSIGNED NOT NULL,
  `institucion` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fech_ini` date NOT NULL,
  `fech_culmi` date NOT NULL,
  `nombre_curso` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` int(11) DEFAULT NULL,
  `archivo` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_archivo` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especializacion_personals`
--

INSERT INTO `especializacion_personals` (`id`, `personals_id`, `institucion`, `fech_ini`, `fech_culmi`, `nombre_curso`, `duracion`, `archivo`, `codigo_archivo`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 7, 'CIES', '2015-05-04', '2016-01-02', 'JAVA SCRIPT', 45, '1552316820CAPIONAABRAHAMCies.pdf', '4501', '', '2023-02-11 18:07:00', '2023-02-11 18:07:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_personals`
--

CREATE TABLE `experiencia_personals` (
  `id` int(10) UNSIGNED NOT NULL,
  `personals_id` int(10) UNSIGNED NOT NULL,
  `empresa` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fech_ini` date NOT NULL,
  `fech_culmi` date NOT NULL,
  `objeto_contratacion` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sueldo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `experiencia_personals`
--

INSERT INTO `experiencia_personals` (`id`, `personals_id`, `empresa`, `fech_ini`, `fech_culmi`, `objeto_contratacion`, `cargo`, `sueldo`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 7, 'BANCO ECO FUTURO', '2016-04-05', '2016-12-12', 'PRUEBA', 'MANTENIMIENTO', '3800', NULL, '2023-02-11 18:07:55', '2023-02-11 18:07:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_personals`
--

CREATE TABLE `formacion_personals` (
  `id` int(10) UNSIGNED NOT NULL,
  `personals_id` int(10) UNSIGNED NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fech_ini` date NOT NULL,
  `fech_culmi` date NOT NULL,
  `grado_academico` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_titulo` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `formacion_personals`
--

INSERT INTO `formacion_personals` (`id`, `personals_id`, `institucion`, `fech_ini`, `fech_culmi`, `grado_academico`, `titulo`, `codigo_titulo`, `observacion`, `created_at`, `updated_at`) VALUES
(3, 7, 'UNIVERSIDAD RENE MORENO', '2010-02-02', '2015-12-15', 'LICENCIATURA', '1552316747CAPIONAABRAHAMuniversidad_rene_moreno.pdf', '024', '', '2023-02-11 18:05:47', '2023-02-11 18:05:47'),
(4, 8, 'SALESIANA', '2008-02-15', '2013-02-18', 'LICENCIATURA', '1552317986HUANCAMARTINAsalesiana.pdf', '00245', '', '2023-02-11 18:26:26', '2023-02-11 18:26:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `unidad_areas_id` int(10) UNSIGNED NOT NULL,
  `ingreso_maniana` time NOT NULL,
  `salida_maniana` time NOT NULL,
  `ingreso_tarde` time NOT NULL,
  `salida_tarde` time NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `unidad_areas_id`, `ingreso_maniana`, `salida_maniana`, `ingreso_tarde`, `salida_tarde`, `observacion`, `created_at`, `updated_at`) VALUES
(5, 6, '08:00:00', '12:30:00', '15:00:00', '18:00:00', '', '2023-02-11 18:11:35', '2023-02-11 18:11:35'),
(6, 4, '08:00:00', '12:00:00', '15:00:00', '17:00:00', '', '2023-02-11 18:12:14', '2023-02-11 18:12:14'),
(7, 5, '08:30:00', '12:00:00', '14:00:00', '17:00:00', '', '2023-02-11 18:29:10', '2023-02-11 18:29:10');

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
(1, '2023_03_11_113558_create_notificacions_table', 1),
(2, '2023_03_11_113701_create_notificacion_users_table', 2),
(3, '2023_03_11_113719_create_registro_logs_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacions`
--

CREATE TABLE `notificacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asistencia_id` bigint(20) UNSIGNED NOT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notificacions`
--

INSERT INTO `notificacions` (`id`, `asistencia_id`, `detalle`, `fecha`, `hora`, `created_at`, `updated_at`) VALUES
(1, 1, 'INGRESO DE ANDRES CAMPOS BATALLA', '2023-03-11', '11:55:00', '2023-03-11 15:55:02', '2023-03-11 15:55:02'),
(2, 2, 'INGRESO DE ANDRES CAMPOS BATALLA', '2023-03-13', '10:14:00', '2023-03-13 14:14:53', '2023-03-13 14:14:53'),
(3, 3, 'INGRESO DE ABRAHAM CAPIONA SALAZAR', '2023-03-13', '10:17:00', '2023-03-13 14:17:23', '2023-03-13 14:17:23'),
(4, 4, 'INGRESO DE ELENA CINCO PAZ', '2023-03-13', '10:18:00', '2023-03-13 14:18:24', '2023-03-13 14:18:24'),
(5, 5, 'INGRESO DE PENELOPE CRUZ ORTIZ', '2023-03-13', '10:25:00', '2023-03-13 14:25:47', '2023-03-13 14:25:47'),
(6, 6, 'INGRESO DE MARIA FLORES DOMINGUEZ', '2023-03-13', '10:27:00', '2023-03-13 14:27:21', '2023-03-13 14:27:21'),
(7, 7, 'INGRESO DE JORGE GUTIERREZ ZAPATA', '2023-03-13', '10:28:00', '2023-03-13 14:28:20', '2023-03-13 14:28:20'),
(8, 8, 'INGRESO DE MARTINA HUANCA ALANOCA', '2023-03-13', '10:29:00', '2023-03-13 14:29:06', '2023-03-13 14:29:06'),
(9, 9, 'INGRESO DE FLORA LOPEZ MACHICADO', '2023-03-13', '10:32:00', '2023-03-13 14:32:52', '2023-03-13 14:32:52'),
(10, 10, 'INGRESO DE ARNOLD MAMANI MAMANI', '2023-03-13', '11:11:00', '2023-03-13 15:11:31', '2023-03-13 15:11:31'),
(11, 11, 'INGRESO DE JESUSA MARIACA DOMINGUEZ', '2023-03-13', '11:14:00', '2023-03-13 15:14:19', '2023-03-13 15:14:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_users`
--

CREATE TABLE `notificacion_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notificacion_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `visto` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notificacion_users`
--

INSERT INTO `notificacion_users` (`id`, `notificacion_id`, `user_id`, `visto`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-03-11 15:55:02', '2023-03-13 15:54:57'),
(2, 2, 1, 1, '2023-03-13 14:14:53', '2023-03-13 15:54:57'),
(3, 3, 1, 1, '2023-03-13 14:17:23', '2023-03-13 15:54:57'),
(4, 4, 1, 1, '2023-03-13 14:18:24', '2023-03-13 15:54:57'),
(5, 5, 1, 1, '2023-03-13 14:25:47', '2023-03-13 15:54:57'),
(6, 6, 1, 1, '2023-03-13 14:27:21', '2023-03-13 15:54:57'),
(7, 7, 1, 1, '2023-03-13 14:28:20', '2023-03-13 15:54:57'),
(8, 8, 1, 1, '2023-03-13 14:29:06', '2023-03-13 15:54:57'),
(9, 9, 1, 1, '2023-03-13 14:32:52', '2023-03-13 15:54:57'),
(10, 1, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(11, 2, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(12, 3, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(13, 4, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(14, 5, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(15, 6, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(16, 7, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(17, 8, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(18, 9, 7, 1, '2023-03-13 14:58:21', '2023-03-13 15:14:28'),
(19, 1, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(20, 2, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(21, 3, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(22, 4, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(23, 5, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(24, 6, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(25, 7, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(26, 8, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(27, 9, 5, 1, '2023-03-13 14:59:08', '2023-03-13 15:11:12'),
(28, 10, 1, 1, '2023-03-13 15:11:31', '2023-03-13 15:54:57'),
(29, 10, 7, 1, '2023-03-13 15:14:00', '2023-03-13 15:14:28'),
(30, 11, 1, 1, '2023-03-13 15:14:19', '2023-03-13 15:54:57'),
(31, 11, 7, 1, '2023-03-13 15:14:19', '2023-03-13 15:14:28'),
(32, 1, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(33, 2, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(34, 3, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(35, 4, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(36, 5, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(37, 6, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(38, 7, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(39, 8, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(40, 9, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(41, 10, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(42, 11, 8, 1, '2023-03-13 15:25:48', '2023-03-13 15:48:20'),
(43, 1, 9, 1, '2023-03-13 15:29:14', '2023-03-13 15:30:51'),
(44, 2, 9, 1, '2023-03-13 15:29:14', '2023-03-13 15:30:51'),
(45, 3, 9, 1, '2023-03-13 15:29:14', '2023-03-13 15:30:51'),
(46, 4, 9, 1, '2023-03-13 15:29:14', '2023-03-13 15:30:51'),
(47, 5, 9, 1, '2023-03-13 15:29:14', '2023-03-13 15:30:51'),
(48, 6, 9, 1, '2023-03-13 15:29:14', '2023-03-13 15:30:51'),
(49, 7, 9, 1, '2023-03-13 15:29:14', '2023-03-13 15:30:51'),
(50, 8, 9, 1, '2023-03-13 15:29:14', '2023-03-13 15:30:51'),
(51, 9, 9, 1, '2023-03-13 15:29:15', '2023-03-13 15:30:51'),
(52, 10, 9, 1, '2023-03-13 15:29:15', '2023-03-13 15:30:51'),
(53, 11, 9, 1, '2023-03-13 15:29:15', '2023-03-13 15:30:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `personals_id` int(10) UNSIGNED NOT NULL,
  `mes` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dias_trabajado` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_total` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `personals_id`, `mes`, `anio`, `dias_trabajado`, `monto_total`, `created_at`, `updated_at`) VALUES
(1, 18, '03', '2023', '30', '3666.18', '2023-03-11 14:33:34', '2023-03-11 14:33:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_extras`
--

CREATE TABLE `pagos_extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `personals_id` int(10) UNSIGNED NOT NULL,
  `tipo_pago` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mes` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fech_pago` date NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Navegar usuarios', 'users.index', 'Lista y navega todos los usuarios', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(2, 'Crear usuarios', 'users.create', 'Crear usuarios', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(3, 'Ver detalle usuario', 'users.show', 'Ver detalles', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(4, 'Edicion de usuarios', 'users.edit', 'Editar datos de usuarios', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(5, 'Eliminar usuarios', 'users.destroy', 'Eliminar cualquier usuario', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(6, 'Navegar cargos', 'cargos.index', 'Lista y navega todos los cargos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(7, 'Crear cargos', 'cargos.create', 'Crear cargos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(8, 'Ver detalle cargo', 'cargos.show', 'Ver detalles cargos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(9, 'Edicion de cargos', 'cargos.edit', 'Editar datos de cargos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(10, 'Eliminar cargos', 'cargos.destroy', 'Eliminar cualquier cargo', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(11, 'Navegar areas', 'areas.index', 'Lista y navega todos los areas', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(12, 'Crear areas', 'areas.create', 'Crear areas', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(13, 'Ver detalle area', 'areas.show', 'Ver detalles areas', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(14, 'Edicion de areas', 'areas.edit', 'Editar datos de areas', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(15, 'Eliminar areas', 'areas.destroy', 'Eliminar cualquier area o unidad', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(16, 'Navegar personal', 'personals.index', 'Lista y navega todo el personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(17, 'Crear personal', 'personals.create', 'Crear personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(18, 'Ver detalle personal', 'personals.show', 'Ver detalles personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(19, 'Edicion de personal', 'personals.edit', 'Editar datos de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(20, 'Eliminar personal', 'personals.destroy', 'Eliminar cualquier personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(21, 'Navegar formacion de personal', 'formacion.index', 'Lista y navega todo la informacion sobre la formacion de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(22, 'Crear formacion de personal', 'formacion.create', 'Crear formacion de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(23, 'Ver detalle formacion de personal', 'formacion.show', 'Ver detalles formacion del personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(24, 'Edicion de formacion de personal', 'formacion.edit', 'Editar datos de formacion de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(25, 'Eliminar formacion de personal', 'formacion.destroy', 'Eliminar cualquier formacion de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(26, 'Navegar especializacion de personal', 'especializacion.index', 'Lista y navega todo la informacion sobre la especializacion de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(27, 'Crear especializacion de personal', 'especializacion.create', 'Crear especializacion de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(28, 'Ver detalle especializacion de personal', 'especializacion.show', 'Ver detalles especializacion del personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(29, 'Edicion de especializacion de personal', 'especializacion.edit', 'Editar datos de especializacion de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(30, 'Eliminar especializacion de personal', 'especializacion.destroy', 'Eliminar cualquier especializacion de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(31, 'Navegar experiencia de personal', 'experiencia.index', 'Lista y navega todo la informacion sobre la experiencia de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(32, 'Crear experiencia de personal', 'experiencia.create', 'Crear experiencia de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(33, 'Ver detalle experiencia de personal', 'experiencia.show', 'Ver detalles experiencia del personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(34, 'Edicion de experiencia de personal', 'experiencia.edit', 'Editar datos de experiencia de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(35, 'Eliminar experiencia de personal', 'experiencia.destroy', 'Eliminar cualquier experiencia de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(36, 'Navegar contratos de personal', 'contratos.index', 'Lista y navega todo la informacion sobre la contratos de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(37, 'Crear contratos de personal', 'contratos.create', 'Crear contratos de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(38, 'Ver detalle contratos de personal', 'contratos.show', 'Ver detalles contratos del personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(39, 'Edicion de contratos de personal', 'contratos.edit', 'Editar datos de contratos de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(40, 'Eliminar contratos de personal', 'contratos.destroy', 'Eliminar cualquier contratos de personal', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(41, 'Navegar pagos extra', 'pagos_extras.index', 'Lista y navega todo la informacion sobre la pagos extra', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(42, 'Crear pagos extra', 'pagos_extras.create', 'Crear pagos extra', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(43, 'Ver detalle pagos extra', 'pagos_extras.show', 'Ver detalles pagos extra', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(44, 'Edicion de pagos extra', 'pagos_extras.edit', 'Editar datos de pagos extra', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(45, 'Eliminar pagos extra', 'pagos_extras.destroy', 'Eliminar cualquier pago extra', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(46, 'Navegar descuentos', 'descuentos.index', 'Lista y navega todo la informacion descuentos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(47, 'Crear descuentos', 'descuentos.create', 'Crear descuentos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(48, 'Ver detalle descuentos', 'descuentos.show', 'Ver detalles descuentos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(49, 'Edicion de descuentos', 'descuentos.edit', 'Editar datos de descuentos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(50, 'Eliminar descuentos', 'descuentos.destroy', 'Eliminar cualquier descuento', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(51, 'Navegar pagos', 'pagos.index', 'Lista y navega todo la informacion pagos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(52, 'Realizar pagos', 'pagos.create', 'Realizar pagos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(53, 'Ver detalle pagos', 'pagos.show', 'Ver detalles pagos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(54, 'Edicion de pagos', 'pagos.edit', 'Editar datos de pagos', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(55, 'Eliminar pagos', 'pagos.destroy', 'Eliminar cualquier descuento', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(56, 'Navegar asistencias', 'asistencias.index', 'Lista y navega todo la informacion de asistencias', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(57, 'Realizar asistencias', 'asistencias.create', 'Realizar asistencias', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(58, 'Ver detalle asistencias', 'asistencias.show', 'Ver detalles asistencias', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(59, 'Edicion de asistencias', 'asistencias.edit', 'Editar datos de asistencias', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(60, 'Eliminar asistencias', 'asistencias.destroy', 'Eliminar cualquier asistencia', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(61, 'Navegar horarios', 'horarios.index', 'Lista y navega todo la informacion horarios', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(62, 'Realizar horarios', 'horarios.create', 'Realizar horarios', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(63, 'Ver detalle horarios', 'horarios.show', 'Ver detalles horarios', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(64, 'Edicion de horarios', 'horarios.edit', 'Editar datos de horarios', '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(65, 'Eliminar horarios', 'horarios.destroy', 'Eliminar cualquier horario', '2023-01-17 23:45:50', '2023-01-17 23:45:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 16, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(2, 17, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(3, 18, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(4, 19, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(5, 20, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(6, 21, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(7, 22, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(8, 23, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(9, 24, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(10, 25, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(11, 26, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(12, 27, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(13, 28, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(14, 29, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(15, 30, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(16, 31, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(17, 32, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(18, 33, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(19, 34, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(20, 35, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(21, 41, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(22, 42, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(23, 43, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(24, 44, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(25, 45, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(26, 46, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(27, 47, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(28, 48, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(29, 49, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(30, 50, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(31, 56, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(32, 57, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(33, 58, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(34, 59, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50'),
(35, 60, 2, '2023-01-17 23:45:50', '2023-01-17 23:45:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personals`
--

CREATE TABLE `personals` (
  `id` int(10) UNSIGNED NOT NULL,
  `ci` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apep` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apem` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fech_nac` date NOT NULL,
  `genero` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_civil` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profesion` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado_academico` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_nac` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personals`
--

INSERT INTO `personals` (`id`, `ci`, `ci_exp`, `name`, `apep`, `apem`, `fech_nac`, `genero`, `est_civil`, `nacionalidad`, `profesion`, `grado_academico`, `lugar_nac`, `domicilio`, `fono`, `cel`, `email`, `foto`, `created_at`, `updated_at`) VALUES
(7, '89564', 'LP', 'ABRAHAM', 'CAPIONA', 'SALAZAR', '1990-12-02', 'M', 'SOLTERO', 'BOLVIANA', 'CONTADOR', 'SUPERIOR', 'MUNAYPATA', 'MIRAFLORES', '', '78945632', 'ABRAHAM@GMAIL.COM', '1552289315ABRAHAMCAPIONA.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(8, '7894562', 'LP', 'MARTINA', 'HUANCA', 'ALANOCA', '1989-12-02', 'F', 'CASADO', 'BOLIVIANA', 'CIENCIAS DE LA EDUCACION', 'LICENCIATURA', 'MAPIRI', 'AV. MIGUEL ANGEL', '2224545', '7425605', 'MAR@HOTMAIL.COM', '1552317814MARTINAHUANCA.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(9, '2356895', 'LP', 'JESUSA', 'MARIACA', 'DOMINGUEZ', '1995-12-02', 'F', 'DIVORCIADO', 'BOLIVIANA', 'NINGUNO', 'NINGUNO', 'CAÑAPAMPA', 'ZONA PISTA', '2224587', '6809978', '', '1552318445JESUSAMARIACA.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(10, '89653247', 'LP', 'SANDY', 'PAPO', 'MARISCAL', '1999-05-02', 'M', 'DIVORCIADO', 'BOLIVIANO', 'INGENIERO', 'LICENCIATURA', 'CHAROPAMPA', 'LAS RAMADAS', '', '6587452', 'SANDY@GMAIL.COM', '1552608307SANDYPAPO.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(11, '6896899', 'LP', 'MARIALUZ', 'SEPITA', 'MACHICADO', '1991-12-01', 'F', 'SOLTERO', 'BOLIVIANA', 'NINGUNO', 'NINGUNO', 'MAPIRI', 'ZONA 5', '', '78954646', 'LUZ@HOTMAIL.COM', '1552608453MARIALUZSEPITA.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(12, '68956568', 'LP', 'ALBERTO', 'RICO', 'PANCARTA', '1986-11-18', 'M', 'SOLTERO', 'BOLIVIANA', 'INGENIERO CIVIL', 'LICENCIATURA', 'VILAQUE', 'CALLE DOMINICANA', '', '68784545', 'AL@HOTMAIL.COM', '1552608636ALBERTORICO.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(13, '98656554', 'BN', 'PENELOPE', 'CRUZ', 'ORTIZ', '1993-02-19', 'F', 'CASADO', 'BOLIVIANA', 'ABOGADA', 'LICENCIATURA', 'ALTO BENI', 'ZONA 1', '2227887', '6895623', 'PENELOPE@GMAIL.COM', '1552608807PENELOPECRUZ.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(14, '99565845', 'LP', 'ELENA', 'CINCO', 'PAZ', '1992-12-12', 'F', 'SOLTERO', 'BOLIVIANA', 'CONTABILIDAD BASICA', 'NINGUNO', 'MAPIRI', 'AV. DOLING', '22332332', '78986532', 'ELECINPA@HOTMAIL.COM', '1552609013ELENACINCO.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(15, '89653256', 'LP', 'MARCOS', 'SANTALLA', 'SANTOS', '1992-02-12', 'M', 'SOLTERO', 'BOLIVIANO', 'ADMINISTRACION DE EMPRESA', 'LICENCIATURA', 'ZONA 7', 'GERENCIA', '', '68956325', 'MARCOS@GMAIL.COM', '1552609927MARCOSSANTALLA.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(16, '89562345', 'LP', 'ANTONIO', 'ROJAS', 'ROLAS', '1989-06-05', 'M', 'SOLTERO', 'BOLIVIANO', 'NINGUNO', 'NINGUNO', 'CIUDAD LA  PAZ', 'ZONA 2', '', '78542562', 'ANTO@GMAIL.COM', '1552610038ANTONIOROJAS.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(17, '89562378', 'LP', 'JORGE', 'GUTIERREZ', 'ZAPATA', '1989-08-30', 'M', 'SOLTERO', 'BOLIVIANO', 'CIENCIAS DE LA EDUCACION', 'LICENCIATURA', 'LA PAZ', 'CACAHUAL', '', '68956345', 'JOR@HOTMAIL.COM', '1552610183JORGEGUTIERREZ.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(18, '78456535', 'LP', 'ANDRES', 'CAMPOS', 'BATALLA', '1987-10-25', 'M', 'SOLTERO', 'BOLIVIANO', 'ABOGADA', 'LICENCIATURA', 'BERNEJO', 'SANTA ROSA', '', '68956412', 'ANDREI@GMAIL.COM', '1552610281ANDRESCAMPOS.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(19, '56894521', 'LP', 'SARA', 'SURCO', 'PADILLA', '1990-12-22', 'F', 'CASADO', 'BOLIVIANA', 'SECRETARIA', 'NINGUNO', 'MAPIRI', 'ZONA 3', '225665', '78456532', 'SARA@HOTMAIL.COM', '1552610383SARASURCO.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(20, '875445', 'LP', 'ARNOLD', 'MAMANI', 'MAMANI', '1991-02-05', 'M', 'SOLTERO', 'BOLIVIANA', 'NINGUNO', 'NINGUNO', 'LA PAZ', 'DOMINC', '7778878', '777887', 'AR@GMAIL.COM', '1552684972ARNOLDMAMANI.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(21, '9856234', 'SC', 'MARIA', 'FLORES', 'DOMINGUEZ', '1990-02-02', 'F', 'SOLTERO', 'BOLIVIANO', 'NINGUNO', 'NINGUNO', 'BERMEJO', 'ZONA PISTA', '', '78887214', 'MARIA@GMAIL.COM', '1552685075MARIAFLORES.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(22, '895665', 'CH', 'FLORA', 'LOPEZ', 'MACHICADO', '1988-04-05', 'F', 'SOLTERO', 'BOLIVIANA', 'NINGUNO', 'NINGUNO', 'ZONA 1', 'ZONA 6', '', '789745213', 'FLORA@GMAIL.COM', '1552685178FLORALOPEZ.png', '2023-02-11 10:28:35', '2023-02-11 10:28:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_logs`
--

CREATE TABLE `registro_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `modulo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accion` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registro_logs`
--

INSERT INTO `registro_logs` (`id`, `user_id`, `modulo`, `accion`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 8, 'CARGOS', 'REGISTRO', 'EL USUARIO P11221 REGISTRO UN CARGO', '2023-03-13 15:38:36', '2023-03-13 15:38:36'),
(2, 8, 'CARGOS', 'ACTUALIZO', 'EL USUARIO P11221 ACTUALIZO UN CARGO', '2023-03-13 15:38:41', '2023-03-13 15:38:41'),
(3, 8, 'UNIDAD/ÁREAS', 'REGISTRO', 'EL USUARIO P11221 REGISTRO UNA UNIDAD/ÁREA', '2023-03-13 15:47:14', '2023-03-13 15:47:14'),
(4, 8, 'UNIDAD/ÁREAS', 'ACTUALIZO', 'EL USUARIO P11221 ACTUALIZO UNA UNIDAD/ÁREA', '2023-03-13 15:47:19', '2023-03-13 15:47:19'),
(5, 8, 'UNIDAD/ÁREAS', 'ELIMINO', 'EL USUARIO P11221 ELIMINO UNA UNIDAD/ÁREA', '2023-03-13 15:47:31', '2023-03-13 15:47:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'USUARIO MAESTRO', 'usuario_maestro', 'Administra todo el sistema', '2023-01-17 23:45:53', '2023-01-17 23:45:53', 'all-access'),
(2, 'USUARIO AUXILIAR', 'usuario_auxiliar', '', '2023-01-17 23:45:53', '2023-01-17 23:45:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-01-17 23:45:53', '2023-01-17 23:45:53'),
(5, 2, 5, '2023-01-19 19:10:25', '2023-01-19 19:10:25'),
(7, 1, 7, '2023-01-19 19:29:09', '2023-01-19 19:29:09'),
(8, 1, 8, '2023-03-13 15:25:33', '2023-03-13 15:25:33'),
(9, 2, 9, '2023-03-13 15:26:44', '2023-03-13 15:26:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasas`
--

CREATE TABLE `tasas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(8,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tasas`
--

INSERT INTO `tasas` (`id`, `name`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'AFPS', 0.1000, '2023-01-11 10:28:35', '2023-01-11 10:28:35'),
(2, 'COMISION AFPS', 0.0050, '2023-01-11 10:28:35', '2023-01-11 10:28:35'),
(3, 'FONDO SOLIDARIO', 0.0050, '2023-01-11 10:28:35', '2023-01-11 10:28:35'),
(4, 'RIESGO COMUN', 0.0171, '2023-01-11 10:28:35', '2023-01-11 10:28:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_areas`
--

CREATE TABLE `unidad_areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unidad_areas`
--

INSERT INTO `unidad_areas` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'AUXILIAR', '', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(5, 'RECURSOS HUMANOS', '', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(6, 'EQUIDAD DE GENERO', '', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(7, 'EVENTUAL', '', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(8, 'DEFENSORIA', '', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(9, 'ADMINISTRACION', '', '2023-02-11 10:28:35', '2023-02-11 10:28:35'),
(10, 'CONTABLE', '', '2023-02-11 10:28:35', '2023-02-11 10:28:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$OXgT3p.Hi1vXx/avLnB9K.I9yeTos1pFCoRpwM7AgG.nl.ECglYVG', 'ZX5RlUbMfA0hJmvADdHdg6SSFf6FwT6Ui9sftnV1Mw9gyenxfJMo6Kl2RH2o', '2023-01-11 10:28:35', '2023-01-11 10:28:35'),
(5, 'M1234562', '$2y$10$jDMa6Kfe8vgHMlmBK5QPyuhxLph2cNnwnQWpWu93PDgnflUwmdApO', '2j2IqXFmb0L8Os1kFSKRCzAF7Lzw6c54YaledTulss05qYgHAsYUzbS8TLYY', '2023-01-11 10:28:35', '2023-01-11 10:28:35'),
(7, 'R69885321', '$2y$10$ds7V8JePJxip8ND8MCmj5uq9Yq2cBzBqG46jpl0E3Vmx0ciBwtXj2', 'CGRiSsRAc6xyEaRGQ1EkA2YTIEUQmsfFKEA8BGRcKSBxDY91Cla6nwlWSIEU', '2023-01-11 10:28:35', '2023-01-11 10:28:35'),
(8, 'P11221', '$2y$10$6woDJ6eZ3CtAYPij3fr5vuvUXk39lXCYHJKu/dkza0BaiGcOqfOmW', NULL, '2023-03-13 15:25:33', '2023-03-13 15:25:33'),
(9, 'E11332', '$2y$10$5.wRGD5x37Q3TLdYKbIZB.zW0wq1NHmXs59H/XgYMk/SDPGrq9mCO', NULL, '2023-03-13 15:26:44', '2023-03-13 15:26:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistencias_personals_id_foreign` (`personals_id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contratos_personals_id_foreign` (`personals_id`),
  ADD KEY `contratos_unidad_areas_id_foreign` (`unidad_areas_id`),
  ADD KEY `contratos_cargos_id_foreign` (`cargos_id`);

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datos_usuarios_cargos_id_foreign` (`cargos_id`),
  ADD KEY `datos_usuarios_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descuentos_personals_id_foreign` (`personals_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especializacion_personals`
--
ALTER TABLE `especializacion_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especializacion_personals_personals_id_foreign` (`personals_id`);

--
-- Indices de la tabla `experiencia_personals`
--
ALTER TABLE `experiencia_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiencia_personals_personals_id_foreign` (`personals_id`);

--
-- Indices de la tabla `formacion_personals`
--
ALTER TABLE `formacion_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formacion_personals_personals_id_foreign` (`personals_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_unidad_areas_id_foreign` (`unidad_areas_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacions`
--
ALTER TABLE `notificacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacion_users`
--
ALTER TABLE `notificacion_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagos_personals_id_foreign` (`personals_id`);

--
-- Indices de la tabla `pagos_extras`
--
ALTER TABLE `pagos_extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagos_extras_personals_id_foreign` (`personals_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_logs`
--
ALTER TABLE `registro_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `tasas`
--
ALTER TABLE `tasas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_areas`
--
ALTER TABLE `unidad_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `especializacion_personals`
--
ALTER TABLE `especializacion_personals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `experiencia_personals`
--
ALTER TABLE `experiencia_personals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formacion_personals`
--
ALTER TABLE `formacion_personals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notificacions`
--
ALTER TABLE `notificacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `notificacion_users`
--
ALTER TABLE `notificacion_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos_extras`
--
ALTER TABLE `pagos_extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personals`
--
ALTER TABLE `personals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `registro_logs`
--
ALTER TABLE `registro_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tasas`
--
ALTER TABLE `tasas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `unidad_areas`
--
ALTER TABLE `unidad_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_personals_id_foreign` FOREIGN KEY (`personals_id`) REFERENCES `personals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_cargos_id_foreign` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contratos_personals_id_foreign` FOREIGN KEY (`personals_id`) REFERENCES `personals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contratos_unidad_areas_id_foreign` FOREIGN KEY (`unidad_areas_id`) REFERENCES `unidad_areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD CONSTRAINT `datos_usuarios_cargos_id_foreign` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `datos_usuarios_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `descuentos_personals_id_foreign` FOREIGN KEY (`personals_id`) REFERENCES `personals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `especializacion_personals`
--
ALTER TABLE `especializacion_personals`
  ADD CONSTRAINT `especializacion_personals_personals_id_foreign` FOREIGN KEY (`personals_id`) REFERENCES `personals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia_personals`
--
ALTER TABLE `experiencia_personals`
  ADD CONSTRAINT `experiencia_personals_personals_id_foreign` FOREIGN KEY (`personals_id`) REFERENCES `personals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formacion_personals`
--
ALTER TABLE `formacion_personals`
  ADD CONSTRAINT `formacion_personals_personals_id_foreign` FOREIGN KEY (`personals_id`) REFERENCES `personals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_unidad_areas_id_foreign` FOREIGN KEY (`unidad_areas_id`) REFERENCES `unidad_areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_personals_id_foreign` FOREIGN KEY (`personals_id`) REFERENCES `personals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos_extras`
--
ALTER TABLE `pagos_extras`
  ADD CONSTRAINT `pagos_extras_personals_id_foreign` FOREIGN KEY (`personals_id`) REFERENCES `personals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
