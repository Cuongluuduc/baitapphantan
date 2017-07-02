-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 06:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doantotnghiep`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `avarta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `graduation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `avarta`, `gender`, `birthday`, `phone`, `address`, `graduation`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'nam', '1994-07-13', '01674313908', 'Hải Dương', 'Đại học BKHN', 2, NULL, NULL, '2017-05-12 02:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_station`
--

CREATE TABLE `admin_station` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `station_id` int(11) NOT NULL,
  `graduation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_station`
--

INSERT INTO `admin_station` (`id`, `user_id`, `created_at`, `updated_at`, `gender`, `birthday`, `phone`, `station_id`, `graduation`) VALUES
(1, 100, '2017-06-05 00:19:01', '2017-06-05 00:19:01', 'nam', '1981-12-22', '98789776', 1, 'DH Bach Khoa'),
(2, 101, '2017-06-05 00:19:01', '2017-06-05 00:19:01', '2017-06-05 00:00:00', '1991-08-22', '98574872765', 2, 'DH Kinh T?');

-- --------------------------------------------------------

--
-- Table structure for table `car_lt`
--

CREATE TABLE `car_lt` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity_chair` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_lt`
--

INSERT INTO `car_lt` (`id`, `status`, `status2`, `name`, `quantity_chair`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 1, '29A-001', 9, '2017-06-04 18:16:10', '2017-06-04 18:16:10', 1),
(2, 1, 1, '29A-002', 5, '2017-06-04 18:16:49', '2017-06-04 18:16:49', 2),
(3, 1, 1, '29A-003', 9, '2017-06-05 00:52:09', '2017-06-05 00:52:09', 1),
(4, 1, 1, '29A-004', 5, '2017-06-04 18:16:50', '2017-06-04 18:16:50', 2),
(5, 1, 1, '29A-005', 9, '2017-06-04 23:29:21', '2017-06-04 23:29:21', 1),
(6, 1, 1, '29A-006', 5, '2017-06-04 23:29:29', '2017-06-04 23:29:29', 2),
(7, 1, 1, '29A-007', 9, '2017-06-04 23:29:22', '2017-06-04 23:29:22', 1),
(8, 1, 0, '29A-008', 5, '2017-06-04 23:27:49', '2017-06-04 23:27:49', 2),
(9, 0, 0, '29A-009', 9, '2017-06-08 08:27:44', '2017-06-08 08:27:44', 1),
(10, 0, 0, '29A-01', 5, '2017-06-08 08:27:26', '2017-06-08 08:27:26', 2),
(11, 1, 1, '29A-011', 9, '2017-06-05 00:39:43', '2017-06-05 00:39:43', 1),
(12, 1, 0, '29A-0012', 5, '2017-06-04 23:36:18', '2017-06-04 23:36:18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `car_route`
--

CREATE TABLE `car_route` (
  `id` int(11) NOT NULL,
  `router_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `car_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_route`
--

INSERT INTO `car_route` (`id`, `router_id`, `created_at`, `updated_at`, `car_id`, `status`) VALUES
(31, 30, '2017-06-04 23:22:40', '2017-06-04 23:22:40', 1, 1),
(32, 31, '2017-06-04 23:22:40', '2017-06-04 23:22:40', 1, 1),
(33, 30, '2017-06-04 18:15:22', '2017-06-04 18:15:22', 3, 0),
(34, 31, '2017-06-04 18:15:22', '2017-06-04 18:15:22', 3, 0),
(35, 32, '2017-06-04 23:28:42', '2017-06-04 23:28:42', 5, 1),
(36, 33, '2017-06-04 23:28:42', '2017-06-04 23:28:42', 5, 1),
(37, 32, '2017-06-04 23:27:09', '2017-06-04 23:27:09', 7, 0),
(38, 33, '2017-06-04 23:27:09', '2017-06-04 23:27:09', 7, 0),
(41, 36, '2017-06-04 23:37:36', '2017-06-04 23:37:36', 11, 1),
(42, 37, '2017-06-04 23:37:36', '2017-06-04 23:37:36', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_station`
--

CREATE TABLE `car_station` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_station`
--

INSERT INTO `car_station` (`id`, `station_id`, `car_id`, `created_at`, `updated_at`) VALUES
(9, 1, 2, '2017-06-04 18:15:36', '2017-06-04 18:15:36'),
(10, 1, 4, '2017-06-04 18:15:49', '2017-06-04 18:15:49'),
(11, 2, 6, '2017-06-04 23:27:36', '2017-06-04 23:27:36'),
(12, 2, 8, '2017-06-04 23:27:49', '2017-06-04 23:27:49'),
(14, 4, 12, '2017-06-04 23:36:18', '2017-06-04 23:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(10) UNSIGNED NOT NULL,
  `soluot` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `graduation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `soluot`, `gender`, `birthday`, `phone`, `type`, `status`, `score`, `salary`, `experience`, `graduation`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 0, 'nam', '1994-08-13', '938784578', 2, 1, 0, '', '', 'THPT', 89, NULL, '2017-06-04 17:50:08', '2017-06-04 18:16:49'),
(3, 1, 'nam', '1994-09-13', '97845787', 1, 1, 8, '', '', 'THCS', 90, NULL, '2017-06-04 17:50:08', '2017-06-05 01:36:14'),
(4, 1, 'nam', '1994-10-13', '93458947', 2, 1, 10, '', '', 'DH', 91, NULL, '2017-06-04 17:50:08', '2017-06-05 01:36:14'),
(5, 0, 'nam', '1994-11-13', '17465745', 2, 1, 0, '', '', 'DH', 92, NULL, '2017-06-04 17:50:08', '2017-06-04 23:29:29'),
(6, 0, 'nam', '1992-12-21', '8656767', 1, 1, 0, '', '', 'DH', 93, NULL, '2017-06-04 17:50:08', '2017-06-04 23:29:21'),
(7, 0, 'nam', '1992-12-21', '8656767', 1, 1, 0, '', '', 'DH', 94, NULL, '2017-06-04 17:50:08', '2017-06-04 23:29:21'),
(8, 0, 'nam', '1992-12-21', '98765456', 1, 0, 0, '', '', 'THPT', 95, NULL, '2017-06-04 17:50:09', '2017-06-08 08:27:44'),
(9, 0, 'nam', '1982-07-22', '987346772', 1, 1, 0, '', '', 'THPT', 106, NULL, '2017-06-05 00:39:23', '2017-06-05 00:39:43'),
(10, 0, 'nam', '1983-01-10', '98754783', 1, 1, 0, '', '', 'THPT', 107, NULL, '2017-06-05 00:39:24', '2017-06-05 00:52:09'),
(11, 0, 'nam', '1994-07-13', '167865748', 1, 0, 0, '', '', 'THPT', 108, NULL, '2017-06-05 00:51:36', '2017-06-05 00:51:36'),
(12, 0, 'nam', '1991-10-22', '987583237', 2, 0, 0, '', '', 'THPT', 109, NULL, '2017-06-05 00:51:36', '2017-06-05 00:51:36'),
(13, 0, 'nam', '1972-10-01', '98548783', 1, 0, 0, '', '', 'THPT', 110, NULL, '2017-06-05 00:51:37', '2017-06-05 00:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `driver_car`
--

CREATE TABLE `driver_car` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_car`
--

INSERT INTO `driver_car` (`id`, `car_id`, `driver_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '2017-06-05 17:27:08', '2017-06-05 17:27:08'),
(3, 2, 2, '2017-06-04 18:16:49', '2017-06-04 18:16:49'),
(4, 4, 4, '2017-06-04 18:16:49', '2017-06-04 18:16:49'),
(5, 5, 6, '2017-06-04 23:29:21', '2017-06-04 23:29:21'),
(6, 7, 7, '2017-06-04 23:29:21', '2017-06-04 23:29:21'),
(8, 6, 5, '2017-06-04 23:29:29', '2017-06-04 23:29:29'),
(9, 11, 9, '2017-06-05 00:39:43', '2017-06-05 00:39:43'),
(10, 3, 3, '2017-06-05 17:27:08', '2017-06-05 17:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tickit_id` int(11) NOT NULL,
  `pickupcar_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `number`, `phone`, `status`, `vote`, `user_id`, `tickit_id`, `pickupcar_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '098547847', 1, 1, 102, 2, 8, NULL, '2017-06-05 00:21:58', '2017-06-05 01:36:14'),
(2, 1, '0985784783', 1, 0, 103, 2, 9, NULL, '2017-06-05 00:22:47', '2017-06-05 00:24:59'),
(3, 2, '0985478783', 1, 0, 104, 2, 9, NULL, '2017-06-05 00:23:35', '2017-06-05 00:24:59'),
(4, 2, '0986548783', 1, 0, 105, 2, 8, NULL, '2017-06-05 00:24:30', '2017-06-05 00:24:59'),
(5, 1, 'ksdjkfsj', 1, 0, 111, 13, 8, NULL, '2017-06-05 16:12:53', '2017-06-05 16:38:27'),
(6, 0, '0958936893', -1, 0, 112, 13, 8, NULL, '2017-06-05 16:14:09', '2017-06-05 16:14:09'),
(7, -1, '09885768348', -1, 0, 113, 13, 8, NULL, '2017-06-05 16:27:46', '2017-06-05 16:27:46'),
(8, 2, '0988568999', 0, 0, 114, 14, 9, NULL, '2017-06-05 16:35:16', '2017-06-05 16:35:16'),
(9, 2, '09877836789', 1, 0, 115, 21, 8, NULL, '2017-06-05 16:45:32', '2017-06-05 17:15:54'),
(10, 1, '0985748378', 1, 0, 116, 33, 9, NULL, '2017-06-05 17:24:05', '2017-06-05 17:26:37'),
(11, 2, '0987685483', 1, 0, 117, 33, 8, NULL, '2017-06-05 17:24:54', '2017-06-05 17:26:37'),
(12, 3, '09857873753', 1, 0, 118, 33, 9, NULL, '2017-06-05 17:25:46', '2017-06-05 17:26:37'),
(13, 1, '09868399693', 1, 0, 119, 51, 11, NULL, '2017-06-08 08:45:48', '2017-06-08 08:51:32'),
(14, 2, '09833653281', 1, 0, 120, 51, 10, NULL, '2017-06-08 08:46:37', '2017-06-08 08:51:33'),
(15, 2, '01653989893', 0, 0, 121, 51, 10, NULL, '2017-06-08 08:47:40', '2017-06-08 08:47:40'),
(16, 2, '0986836356', 1, 0, 122, 51, 11, NULL, '2017-06-08 08:48:41', '2017-06-08 08:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_13_182813_tram_xe', 1),
('2017_03_19_153800_rollback', 1),
('2017_03_29_094218_drive', 2),
('2017_03_29_101613_admin', 3),
('2017_03_29_102412_station', 4),
('2017_03_29_200522_router', 5),
('2017_03_29_230253_pickup_point', 6),
('2017_03_30_114152_route_car', 7),
('2017_04_02_034649_tickit', 8),
('2017_04_03_013010_guest', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('longbk203@gmail.com', '101ebf150b6246611f5914f44ead738332a78b889be74258112361cc8b3da5c7', '2017-04-07 16:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_point`
--

CREATE TABLE `pickup_point` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ing` double(8,2) NOT NULL,
  `lat` double(8,2) NOT NULL,
  `station_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pickup_point`
--

INSERT INTO `pickup_point` (`id`, `name`, `ing`, `lat`, `station_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'UBND phường Bạch Mai', 0.00, 0.00, '1', NULL, '2017-06-04 17:58:53', '2017-06-04 17:58:53'),
(9, 'UBND phường Kim Mã', 0.00, 0.00, '1', NULL, '2017-06-04 17:59:15', '2017-06-04 17:59:15'),
(10, 'UBND xã Hưng Thái', 0.00, 0.00, '2', NULL, '2017-06-04 18:04:17', '2017-06-04 18:04:17'),
(11, 'Thị trấn Ninh Giang', 0.00, 0.00, '2', NULL, '2017-06-04 18:04:40', '2017-06-04 18:04:40'),
(12, 'Thị trấn An Dương', 0.00, 0.00, '3', NULL, '2017-06-04 18:05:06', '2017-06-04 18:05:06'),
(13, 'UBND xã Tiền An', 0.00, 0.00, '3', NULL, '2017-06-04 18:05:27', '2017-06-04 18:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `router`
--

CREATE TABLE `router` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ing` double(8,2) NOT NULL,
  `lat` double(8,2) NOT NULL,
  `station_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_time` time NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `station_dich` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `router`
--

INSERT INTO `router` (`id`, `name`, `ing`, `lat`, `station_id`, `total_time`, `remember_token`, `created_at`, `updated_at`, `station_dich`) VALUES
(30, 'Hà Nội<=>Ninh Giang', 0.00, 0.00, '1', '03:00:00', NULL, '2017-06-04 17:55:46', '2017-06-04 17:55:46', 2),
(31, 'Ninh Giang<=>Hà Nội', 0.00, 0.00, '2', '03:00:00', NULL, '2017-06-04 17:55:46', '2017-06-04 17:55:46', 1),
(32, 'Hà Nội<=>An Dương', 0.00, 0.00, '1', '03:00:00', NULL, '2017-06-04 17:58:19', '2017-06-04 17:58:19', 3),
(33, 'An Dương<=>Hà Nội', 0.00, 0.00, '3', '03:00:00', NULL, '2017-06-04 17:58:19', '2017-06-04 17:58:19', 1),
(34, 'Ninh Giang<=>An Dương', 0.00, 0.00, '2', '02:30:00', NULL, '2017-06-04 18:05:59', '2017-06-04 18:05:59', 3),
(35, 'An Dương<=>Ninh Giang', 0.00, 0.00, '3', '02:30:00', NULL, '2017-06-04 18:05:59', '2017-06-04 18:05:59', 2),
(36, 'Hà Nội<=>Nam Định', 0.00, 0.00, '1', '02:45:00', NULL, '2017-06-04 23:33:39', '2017-06-04 23:33:39', 4),
(37, 'Nam Định<=>Hà Nội', 0.00, 0.00, '4', '02:45:00', NULL, '2017-06-04 23:33:39', '2017-06-04 23:33:39', 1),
(38, 'Le Duan<=>Hoa Suong', 0.00, 0.00, '6', '03:00:00', NULL, '2017-06-06 02:37:15', '2017-06-06 02:37:15', 7),
(39, 'Hoa Suong<=>Le Duan', 0.00, 0.00, '7', '03:00:00', NULL, '2017-06-06 02:37:15', '2017-06-06 02:37:15', 6);

-- --------------------------------------------------------

--
-- Table structure for table `route_car`
--

CREATE TABLE `route_car` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_route_id` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_chair` int(11) NOT NULL,
  `time_data` time NOT NULL,
  `router_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `route_car`
--

INSERT INTO `route_car` (`id`, `car_route_id`, `time`, `total_chair`, `time_data`, `router_id`, `driver_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 31, '07 giờ 00 phút', 0, '07:00:00', 30, 0, NULL, '2017-06-04 23:22:40', '2017-06-04 23:22:40'),
(2, 32, '10 giờ 00 phút', 0, '10:00:00', 31, 0, NULL, '2017-06-04 23:22:40', '2017-06-04 23:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `ing` double(8,2) NOT NULL,
  `lat` double(8,2) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `name`, `number`, `ing`, `lat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', 17, 0.00, 0.00, NULL, '2017-06-04 17:52:59', '2017-06-05 17:25:46'),
(2, 'Ninh Giang', 7, 0.00, 0.00, NULL, '2017-06-04 17:53:09', '2017-06-08 08:48:41'),
(3, 'An Dương', 0, 0.00, 0.00, NULL, '2017-06-04 17:53:21', '2017-06-04 17:53:21'),
(4, 'Nam Định', 0, 0.00, 0.00, NULL, '2017-06-04 17:53:31', '2017-06-04 17:53:31'),
(5, 'Mù Căng Chải', 0, 0.00, 0.00, NULL, '2017-06-04 17:55:12', '2017-06-04 17:55:12'),
(6, 'Le Duan', 0, 0.00, 0.00, NULL, '2017-06-06 02:31:12', '2017-06-06 02:31:12'),
(7, 'Hoa Suong', 0, 0.00, 0.00, NULL, '2017-06-06 02:35:08', '2017-06-06 02:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `tickit`
--

CREATE TABLE `tickit` (
  `id` int(10) UNSIGNED NOT NULL,
  `cost` bigint(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `total_tickit` int(11) NOT NULL,
  `empty_tickit` int(11) NOT NULL,
  `routercar_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickit`
--

INSERT INTO `tickit` (`id`, `cost`, `date`, `status`, `total_tickit`, `empty_tickit`, `routercar_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 100000, '2017-06-05', 0, 9, 9, 1, NULL, '2017-06-04 23:32:31', '2017-06-04 23:32:31'),
(2, 100000, '2017-06-05', 1, 9, 3, 3, NULL, '2017-06-04 23:32:31', '2017-06-05 00:24:59'),
(3, 100000, '2017-06-05', 0, 9, 9, 2, NULL, '2017-06-04 23:32:31', '2017-06-04 23:32:31'),
(4, 100000, '2017-06-05', 0, 9, 9, 4, NULL, '2017-06-04 23:32:31', '2017-06-04 23:32:31'),
(5, 160000, '2017-06-05', 0, 9, 9, 5, NULL, '2017-06-04 23:32:31', '2017-06-04 23:32:31'),
(6, 160000, '2017-06-05', 0, 9, 9, 7, NULL, '2017-06-04 23:32:31', '2017-06-04 23:32:31'),
(7, 160000, '2017-06-05', 0, 9, 9, 6, NULL, '2017-06-04 23:32:31', '2017-06-04 23:32:31'),
(8, 160000, '2017-06-05', 0, 9, 9, 8, NULL, '2017-06-04 23:32:31', '2017-06-04 23:32:31'),
(9, 150000, '2017-06-05', 0, 9, 9, 9, NULL, '2017-06-04 23:41:18', '2017-06-04 23:41:18'),
(10, 150000, '2017-06-05', 0, 9, 9, 11, NULL, '2017-06-04 23:41:18', '2017-06-04 23:41:18'),
(11, 150000, '2017-06-05', 0, 9, 9, 10, NULL, '2017-06-04 23:41:18', '2017-06-04 23:41:18'),
(12, 150000, '2017-06-05', 0, 9, 9, 12, NULL, '2017-06-04 23:41:18', '2017-06-04 23:41:18'),
(13, 100000, '2017-06-06', 1, 9, 8, 1, NULL, '2017-06-04 23:46:09', '2017-06-05 16:38:27'),
(14, 100000, '2017-06-06', 0, 9, 7, 3, NULL, '2017-06-04 23:46:09', '2017-06-05 16:35:16'),
(15, 100000, '2017-06-06', 0, 9, 9, 2, NULL, '2017-06-04 23:46:09', '2017-06-04 23:46:09'),
(16, 100000, '2017-06-06', 0, 9, 9, 4, NULL, '2017-06-04 23:46:09', '2017-06-04 23:46:09'),
(17, 150000, '2017-06-06', 1, 9, 9, 9, NULL, '2017-06-04 23:46:09', '2017-06-05 17:39:31'),
(18, 150000, '2017-06-06', 0, 9, 9, 11, NULL, '2017-06-04 23:46:09', '2017-06-04 23:46:09'),
(19, 150000, '2017-06-06', 0, 9, 9, 10, NULL, '2017-06-04 23:46:09', '2017-06-04 23:46:09'),
(20, 150000, '2017-06-06', 0, 9, 9, 12, NULL, '2017-06-04 23:46:09', '2017-06-04 23:46:09'),
(21, 160000, '2017-06-06', 1, 9, 7, 5, NULL, '2017-06-04 23:46:09', '2017-06-05 17:15:54'),
(22, 160000, '2017-06-06', 0, 9, 9, 7, NULL, '2017-06-04 23:46:09', '2017-06-04 23:46:09'),
(23, 160000, '2017-06-06', 0, 9, 9, 6, NULL, '2017-06-04 23:46:09', '2017-06-04 23:46:09'),
(24, 160000, '2017-06-06', 0, 9, 9, 8, NULL, '2017-06-04 23:46:10', '2017-06-04 23:46:10'),
(25, 100000, '2017-06-07', 0, 9, 9, 1, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(26, 100000, '2017-06-07', 0, 9, 9, 3, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(27, 100000, '2017-06-07', 0, 9, 9, 2, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(28, 100000, '2017-06-07', 0, 9, 9, 4, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(29, 150000, '2017-06-07', 0, 9, 9, 9, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(30, 150000, '2017-06-07', 0, 9, 9, 11, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(31, 150000, '2017-06-07', 0, 9, 9, 10, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(32, 150000, '2017-06-07', 0, 9, 9, 12, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(33, 160000, '2017-06-07', 1, 9, 3, 5, NULL, '2017-06-05 17:18:53', '2017-06-05 17:26:37'),
(34, 160000, '2017-06-07', 0, 9, 9, 7, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(35, 160000, '2017-06-07', 0, 9, 9, 6, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(36, 160000, '2017-06-07', 0, 9, 9, 8, NULL, '2017-06-05 17:18:53', '2017-06-05 17:18:53'),
(37, 100000, '2017-06-08', 0, 9, 9, 1, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(38, 100000, '2017-06-08', 0, 9, 9, 3, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(39, 100000, '2017-06-08', 0, 9, 9, 2, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(40, 100000, '2017-06-08', 0, 9, 9, 4, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(41, 150000, '2017-06-08', 0, 9, 9, 9, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(42, 150000, '2017-06-08', 0, 9, 9, 11, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(43, 150000, '2017-06-08', 0, 9, 9, 10, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(44, 150000, '2017-06-08', 0, 9, 9, 12, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(45, 160000, '2017-06-08', 0, 9, 9, 5, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(46, 160000, '2017-06-08', 0, 9, 9, 7, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(47, 160000, '2017-06-08', 0, 9, 9, 6, NULL, '2017-06-05 17:21:21', '2017-06-05 17:21:21'),
(48, 160000, '2017-06-08', 0, 9, 9, 8, NULL, '2017-06-05 17:21:22', '2017-06-05 17:21:22'),
(49, 100000, '2017-06-09', 0, 9, 9, 1, NULL, '2017-06-05 17:22:43', '2017-06-05 17:22:43'),
(50, 100000, '2017-06-09', 0, 9, 9, 3, NULL, '2017-06-05 17:22:43', '2017-06-05 17:22:43'),
(51, 100000, '2017-06-09', 1, 9, 2, 2, NULL, '2017-06-05 17:22:43', '2017-06-08 08:51:33'),
(52, 100000, '2017-06-09', 0, 9, 9, 4, NULL, '2017-06-05 17:22:43', '2017-06-05 17:22:43'),
(53, 150000, '2017-06-09', 0, 9, 9, 9, NULL, '2017-06-05 17:22:43', '2017-06-05 17:22:43'),
(54, 150000, '2017-06-09', 0, 9, 9, 11, NULL, '2017-06-05 17:22:43', '2017-06-05 17:22:43'),
(55, 150000, '2017-06-09', 0, 9, 9, 10, NULL, '2017-06-05 17:22:43', '2017-06-05 17:22:43'),
(56, 150000, '2017-06-09', 0, 9, 9, 12, NULL, '2017-06-05 17:22:44', '2017-06-05 17:22:44'),
(57, 160000, '2017-06-09', 0, 9, 9, 5, NULL, '2017-06-05 17:22:44', '2017-06-05 17:22:44'),
(58, 160000, '2017-06-09', 0, 9, 9, 7, NULL, '2017-06-05 17:22:44', '2017-06-05 17:22:44'),
(59, 160000, '2017-06-09', 0, 9, 9, 6, NULL, '2017-06-05 17:22:44', '2017-06-05 17:22:44'),
(60, 160000, '2017-06-09', 0, 9, 9, 8, NULL, '2017-06-05 17:22:44', '2017-06-05 17:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `title`, `created_at`, `updated_at`, `content`, `admin_id`) VALUES
(1, 'sdfsdfsdf', '2017-05-29 15:08:35', '2017-05-29 15:08:35', '<p><iframe frameborder="0" src="//www.youtube.com/embed/8A2t_tAjMz8" width="640" height="360" class="note-video-clip"></iframe><br></p>', 1),
(2, 'Hot hot hot', '2017-05-29 15:25:57', '2017-05-29 15:25:57', '<p><iframe frameborder="0" src="//www.youtube.com/embed/iUHsg-DrFFY" width="640" height="360" class="note-video-clip"></iframe><br></p>', 1),
(3, 'hot', '2017-06-05 01:09:27', '2017-06-05 01:09:27', '<p><img src="data:image/jpeg;base64,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qMHIMpte6ToYYpeSKtVOPLL7aiALDndg/mCaAADgIqjksmheImTFVLSufcWwwIPqG8blYnvZHufNwqf/2SAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg" data-filename="kc1tbCnu.jpg" style="width: 512px;"><br></p>', 1);
INSERT INTO `tintuc` (`id`, `title`, `created_at`, `updated_at`, `content`, `admin_id`) VALUES
(4, 'ngày mai', '2017-06-05 16:42:47', '2017-06-05 16:42:47', '<p><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEAYABgAAD/4RDqRXhpZgAATU0AKgAAAAgABgALAAIAAAAmAAAIYgESAAMAAAABAAgAAAExAAIAAAAmAAAIiAEyAAIAAAAUAAAIrodpAAQAAAABAAAIwuocAAcAAAgMAAAAVgAAAAAc6gAAAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFdpbmRvd3MgUGhvdG8gRWRpdG9yIDEwLjAuMTAwMTEuMTYzODQAV2luZG93cyBQaG90byBFZGl0b3IgMTAuMC4xMDAxMS4xNjM4NAAyMDE3OjAzOjMwIDIyOjMxOjA3AAAB6hwABwAACAwAAAjUAAAAABzqAAAACAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA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PjwvcmRmOkRlc2NyaXB0aW9uPjwvcmRmOlJERj48L3g6eG1wbWV0YT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9J3cnPz7/2wBDAAkGBwgHBgkICAgKCgkLDhcPDg0NDhwUFREXIh4jIyEeICAlKjUtJScyKCAgLj8vMjc5PDw8JC1CRkE6RjU7PDn/2wBDAQoKCg4MDhsPDxs5JiAmOTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTk5OTn/wgARCALQA8ADACIAAREBAhEB/8QAGgAAAwEBAQEAAAAAAAAAAAAAAQIDAAQFBv/EABgBAQEBAQEAAAAAAAAAAAAAAAABAgME/9oADAMAAAEQAhAAAAHwlZvJ6ADhHGH20ZHFRBSgGW3EGti0TJCv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', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Lưu Đức Cương', 'ducluucuong@gmail.com', '$2y$10$tYR.C1LXNY/D093Ra5PXdeJulx3P.2f692JyIHlRGVVyiNEjgWkO6', 1, 'AwSrJYya0yGpxt26RWzUFl9Jo9UmP8i6dxcsR036AutitvQjeIdgEIYQPQVi', NULL, '2017-06-08 09:56:50'),
(89, 'Châu Tinh Trì', 'hai@gmail.com', '$2y$10$OtLIjCBrqHhtpQgct0HO6.qFgWPhDBHFB0afrXphPjvNXg9veqABe', 2, 'daYTrWaJ1J5umRj0GlIpq56tIokVZOf2q3Vnh3q8N9MLtoZD4rok4zbd8Djv', '2017-06-04 17:50:08', '2017-06-05 17:17:09'),
(90, 'Lã Thành Long', 'ba@gmail.com', '$2y$10$ss5cYA/Wy9jZyurXOyHel.4OU0GEUQIgZmHOBKhGsnhIaUtwqNd0a', 2, 'XDokyEqodHzrxTKlpDfUy7mRFLcFA88mucOmsCHX6onn9jnahAQTK0TCjVD0', '2017-06-04 17:50:08', '2017-06-05 00:44:39'),
(91, 'Phương Thế Ngọc', 'bon@gmail.com', '$2y$10$M8sRB5349RApjZR3nTrBceLjeotIuO30Shp8qhqLqDaJsE5DLjvra', 2, 'D3i2O23p9XkuX3Ud34AfIlzjyjMlufN6vScwAyMgltelIrgGfZ3G236Vqb3s', '2017-06-04 17:50:08', '2017-06-05 00:35:56'),
(92, 'Đỗ Giao Diện', 'nam@gmail.com', '$2y$10$QYX8CdyAHyO9llz0YlkRk.c3O7H8Qtu.mRr/xdR78qhs39Ln3MmnK', 2, '6EQPqtlIFm1IAsHUfGkffpbh2C5nqVL4O2YSt1saC60KCDam8BQiIM4Iy9Ju', '2017-06-04 17:50:08', '2017-06-08 09:02:50'),
(93, 'Hà Nhật Minh', 'sau@gmail.com', '$2y$10$iu3844R7Md.HnoRzZIeT5uh8ZJN7W9q1sLlzvGheyng7bADjqYRJa', 2, NULL, '2017-06-04 17:50:08', '2017-06-04 17:50:08'),
(94, 'Lí Thần Y', 'bay@gmail.com', '$2y$10$p2zkcvgAz4rta8in7/GeuOd4cwL7ejZ5gf6F5P3oD25/sR8Esbwfe', 2, NULL, '2017-06-04 17:50:08', '2017-06-04 17:50:08'),
(95, 'Trương Tam Phong', 'tam@gmail.com', '$2y$10$UTClz1xYk7vNkGuNZv7Mre2hajGsoU4EolbZ1JwS7qinaMlYptqXe', 2, NULL, '2017-06-04 17:50:09', '2017-06-04 17:50:09'),
(100, 'Nguyễn Văn A', 'hanoi@gmail.com', '$2y$10$TsqM.9zNM/Ej5mdDTTYZ7uf1ukFmcRKgSbGeAudpjbpgj.P5IJaKO', 3, 'LqgrmA6jaO9lYIyrWra4SUoFZZpFzIMsZbZTpv1gnpws4ExcEksNR9fcOH61', '2017-06-05 00:19:01', '2017-06-08 08:44:46'),
(101, 'Nguyễn Văn B', 'ninhgiang@gmail.com', '$2y$10$4/SXHGwwFVVy1NG0QmxUi.FXpXfm7UrTGl5PG8MdORhaQZdgp.fZO', 3, 'Sg7oOLZpN0fyTY4W0jjDH5rcbGqPph3t0Hzl8yBFfCPEkbiPf7x5uhcS8LPd', '2017-06-05 00:19:01', '2017-06-08 09:14:19'),
(102, 'Nguyễn Văn A', 'khachmot@gmail.com', '$2y$10$NRF8XnUFeW4iudvdNyuAVeSOceFpHrZLfwpji.1xgJCDgpdXDYbCC', 0, '85ZzvkcuqvM7cKaV5q0kOdmLUJeIyajtmPdPxOedIUZywalSLuu2maZO53kH', '2017-06-05 00:21:58', '2017-06-05 01:40:19'),
(103, 'nguyễn Văn B', 'khachhai@gmail.com', '$2y$10$QTv./UzMOJgyqokFmhE8deXrAmWfZ.tcHiQ0cfc2Kjx3UJf4kaUfC', 0, NULL, '2017-06-05 00:22:47', '2017-06-05 00:22:47'),
(104, 'nguyễn Văn C', 'khachba@gmail.com', '$2y$10$o9YasOkAlv.Em7.hVU3vV.bV3O6jpAvUEH/qrMjGL62JfGvLFXZWC', 0, NULL, '2017-06-05 00:23:35', '2017-06-05 00:23:35'),
(105, 'Nguyễn Văn D', 'khachbon@gmail.com', '$2y$10$.wqQF8rZPNlCtLjSwVIu9.q5MKW2R2bqwc6Zc1Iw8WqgJ5BmAMBtu', 0, NULL, '2017-06-05 00:24:30', '2017-06-05 00:24:30'),
(106, 'Trương Tuấn Kiệt', 'muoi@gmail.com', '$2y$10$v9ovc8f3u3dSY0fENf2Xjedb.fbdB.Cxv/DAaR7ad8k7OSScodOcK', 2, NULL, '2017-06-05 00:39:23', '2017-06-05 00:39:23'),
(107, 'Trương Lã Hành', 'muoimot@gmail.com', '$2y$10$rNvjIeT7VSk5Xnwu1g7JcOe7FpVlWV9Ca0raMD0EbvqtZqIwck1Fm', 2, 'PaJxe0D9TiPVtBvx5mtaqLET3bzkJ6r3zWDGUuq9zwRooNtCUeR8lHoNLdqU', '2017-06-05 00:39:24', '2017-06-08 09:13:25'),
(108, 'Lí Á Bằng', 'mot@gmail.com', '$2y$10$RBjncp/3n9oBh4EusG7FBe82LiTSz.BFrsaIpIGzOUdVkiQF3HY8m', 2, NULL, '2017-06-05 00:51:36', '2017-06-05 00:51:36'),
(109, 'Hà  Tiến Nam', 'chin@gmail.com', '$2y$10$sp8hjmFtk2iw8PZWCGMd6.euWK7cmee06v3urKUMiq8i90mgDpFIi', 2, NULL, '2017-06-05 00:51:36', '2017-06-05 00:51:36'),
(110, 'Quách Tĩnh', 'muoihai@gmail.com', '$2y$10$V21fNOSheVVxHRMPooq1R.4T3KmEOA/kCtmX94p3goQ4mruwBqnoW', 2, NULL, '2017-06-05 00:51:37', '2017-06-05 00:51:37'),
(111, 'Hoàng Sĩ Công', 'khachnam@gmail.com', '$2y$10$KnKArsJEw.eVTjCeHFk4u.7cQTFk6dHIkIgPOzGzq9ya78kWVlYVm', 0, NULL, '2017-06-05 16:12:53', '2017-06-05 16:12:53'),
(112, 'Hoàng Văn Được', 'khachbay@gmail.com', '$2y$10$iSJapGNXO6F3.be2H4e7fu/pr4i8BU7H9Q6k7tglU7thWriM/txIC', 0, NULL, '2017-06-05 16:14:09', '2017-06-05 16:14:09'),
(113, 'Lí Đan Phượng', 'khachtam@gmail.com', '$2y$10$nFlU.A3Uyf3/Cbxw9N0xIu3Q/jt/nUvGgvjwf1JuiJ2zHjO9Dzgya', 0, NULL, '2017-06-05 16:27:46', '2017-06-05 16:27:46'),
(114, 'Lí Đan Đan', 'khachchin@gmail.com', '$2y$10$KkwNTq1udr3A.UdmPjP77uCGMxAW7mWpsUlG92Sk1wCj1e1PiAG7K', 0, NULL, '2017-06-05 16:35:16', '2017-06-05 16:35:16'),
(115, 'Trần Thị Phương', 'khachmuoi@gmail.com', '$2y$10$aYWveRaMHyPUPKrd6uuf0ukdyEShkbBE2jRXQFbVSQdM56xPpmMMy', 0, NULL, '2017-06-05 16:45:32', '2017-06-05 16:45:32'),
(116, 'Châu Nhuận Phát', 'khachmuoimot@gmail.com', '$2y$10$DaE887e7f2T/IHLHYwxzCOQRtFzUDgOgwGJ2XuuPOd3xYup51sHGm', 0, NULL, '2017-06-05 17:24:05', '2017-06-05 17:24:05'),
(117, 'Hà Duy Kính', 'khachmuoiba@gmail.com', '$2y$10$3ytiOt87.gnyhecG24kSiuMsVrGRBxj21WFYWTiknVb1M3NUgVuSS', 0, NULL, '2017-06-05 17:24:54', '2017-06-05 17:24:54'),
(118, 'Nguyễn Duy Anh', 'khachmuoitu@gmail.com', '$2y$10$ynbEAj7iJVxt/ULjLMXEH.4JNGxc.hFlDktSR3ujTFrkbo9dGQEZa', 0, NULL, '2017-06-05 17:25:46', '2017-06-05 17:25:46'),
(119, 'Phạm Như Trường', 'truong@gmail.com', '$2y$10$LlWrphMJ0lRxGXEO8sv7u.lVdhcqj5Haz2DDpcNJGJoE/1ChKs8zm', 0, NULL, '2017-06-08 08:45:47', '2017-06-08 08:45:47'),
(120, 'Phạm thị Yên', 'yenyen@gmail.com', '$2y$10$Wx0aO1YMLbtc4gF7H6bbe.cRAnbiZtM3TV2njwd2tpoD5HbKSMmyK', 0, NULL, '2017-06-08 08:46:37', '2017-06-08 08:46:37'),
(121, 'Phạm Thị Giang', 'san@gmail.com', '$2y$10$0oTMtl/wI4vuY06y24gWEulOyZCEEsedyYgpH0QAO7Emus20aDtaq', 0, NULL, '2017-06-08 08:47:40', '2017-06-08 08:47:40'),
(122, 'Phạm Như Luân', 'luanluan@gmail.com', '$2y$10$CEJkB3qmR7Pu8uYu5HiiHuGxTtxFekGJ/9vJc8mntcD0uHRmz4Gbe', 0, NULL, '2017-06-08 08:48:40', '2017-06-08 08:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `tickit_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `drivercar_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `tickit_id`, `guest_id`, `name`, `drivercar_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, 4, '2017-06-05 00:25:08', '2017-06-05 00:25:08'),
(2, 2, 2, 0, 3, '2017-06-05 00:25:08', '2017-06-05 00:25:08'),
(3, 2, 3, 0, 4, '2017-06-05 00:25:08', '2017-06-05 00:25:08'),
(4, 2, 4, 0, 3, '2017-06-05 00:25:08', '2017-06-05 00:25:08'),
(5, 13, 5, 0, 4, '2017-06-05 16:38:53', '2017-06-05 16:38:53'),
(6, 21, 9, 0, 3, '2017-06-05 17:16:00', '2017-06-05 17:16:00'),
(7, 33, 10, 0, 4, '2017-06-05 17:26:44', '2017-06-05 17:26:44'),
(8, 33, 11, 0, 3, '2017-06-05 17:26:44', '2017-06-05 17:26:44'),
(9, 33, 12, 0, 4, '2017-06-05 17:26:44', '2017-06-05 17:26:44'),
(10, 51, 13, 0, 8, '2017-06-08 08:51:42', '2017-06-08 08:51:42'),
(11, 51, 14, 0, 8, '2017-06-08 08:51:42', '2017-06-08 08:51:42'),
(12, 51, 16, 0, 8, '2017-06-08 08:51:42', '2017-06-08 08:51:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_station`
--
ALTER TABLE `admin_station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_lt`
--
ALTER TABLE `car_lt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_route`
--
ALTER TABLE `car_route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_station`
--
ALTER TABLE `car_station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_car`
--
ALTER TABLE `driver_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pickup_point`
--
ALTER TABLE `pickup_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route_car`
--
ALTER TABLE `route_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickit`
--
ALTER TABLE `tickit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_station`
--
ALTER TABLE `admin_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `car_lt`
--
ALTER TABLE `car_lt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `car_route`
--
ALTER TABLE `car_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `car_station`
--
ALTER TABLE `car_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `driver_car`
--
ALTER TABLE `driver_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pickup_point`
--
ALTER TABLE `pickup_point`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `router`
--
ALTER TABLE `router`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `route_car`
--
ALTER TABLE `route_car`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tickit`
--
ALTER TABLE `tickit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
