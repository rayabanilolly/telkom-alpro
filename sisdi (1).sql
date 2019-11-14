-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2019 at 10:00 PM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.24-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

CREATE TABLE `distribution` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distributions` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15') COLLATE utf8mb4_unicode_ci NOT NULL,
  `odc_id` int(11) NOT NULL,
  `capacity` enum('12','24') COLLATE utf8mb4_unicode_ci NOT NULL,
  `panel1` int(11) NOT NULL DEFAULT '0',
  `panel2` int(11) NOT NULL DEFAULT '0',
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`id`, `unique`, `name`, `shortname`, `distributions`, `odc_id`, `capacity`, `panel1`, `panel2`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'p3JdPoQEH9', 'D01', 'D01', '1', 1, '12', 0, 0, '0', '2018-12-15 14:07:37', '2019-06-04 16:11:25'),
(2, '96xeYGF7XJ', 'D01', 'D01', '1', 3, '24', 0, 0, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(3, 'EiYKcrgP7x', 'D01', 'D01', '1', 2, '12', 10, 0, '0', '2018-12-23 17:11:11', '2018-12-23 17:11:11'),
(4, 'jDz5wUSuhi', 'D02', 'D02', '2', 1, '24', 5, 6, '0', '2018-12-25 08:48:22', '2019-06-04 11:06:33'),
(5, 'OmciuDPU7x', 'D10', 'D10', '10', 2, '12', 8, 0, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(6, 'QbVhP2AJqR', 'D03', 'D03', '3', 1, '12', 13, 0, '0', '2019-06-01 10:40:04', '2019-06-04 11:03:27'),
(7, '9Glwnf7IY0', 'D04', 'D04', '4', 1, '12', 14, 0, '0', '2019-06-01 21:10:00', '2019-06-04 11:03:44'),
(8, 'DxGEavUbHy', 'D05', 'D05', '5', 1, '24', 0, 0, '0', '2019-06-01 21:16:22', '2019-06-06 15:10:56'),
(9, '2XQ5Ts0twf', 'D06', 'D06', '6', 1, '12', 8, 0, '0', '2019-06-02 13:32:52', '2019-06-03 10:32:41'),
(10, '1S48wzkRuq', 'D07', 'D07', '7', 1, '24', 9, 10, '0', '2019-06-02 13:35:52', '2019-06-04 11:06:43'),
(11, 'hjIcxa9758', 'D08', 'D08', '8', 1, '24', 1, 2, '0', '2019-06-02 15:59:06', '2019-06-04 16:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `gpon`
--

CREATE TABLE `gpon` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gponmerk_id` int(11) NOT NULL,
  `regional_id` int(11) NOT NULL,
  `witel_id` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `statuscons_id` int(11) NOT NULL,
  `statusinv_id` int(11) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gpon`
--

INSERT INTO `gpon` (`id`, `unique`, `name`, `address`, `gponmerk_id`, `regional_id`, `witel_id`, `sto_id`, `mitra_id`, `statuscons_id`, `statusinv_id`, `lat`, `lng`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'p4DiHFoPyC', 'GPON03-D6-SGK-4 | FiberHome AN5116-06B', '172.20.167.100', 3, 6, 6, 7, 1, 2, 2, '-0.50210600', '117.15370900', '0', '2018-11-17 14:33:13', '2018-11-20 08:18:51'),
(2, '4yNPpwOfgm', 'GPON02-D6-SGK-3 | C300v2', '172.20.163.176', 1, 6, 6, 7, 1, 2, 2, '-0.50210600', '117.15370900', '0', '2018-11-17 14:38:42', '2018-11-17 19:15:14'),
(3, 'xPVQsNXMCS', 'GPON1-D6-SGK-3 | ZTE', '172.20.163.147', 1, 6, 6, 7, 1, 2, 2, '-0.50210600', '117.15370900', '0', '2018-11-17 18:25:33', '2018-11-17 18:25:33'),
(4, 'R8ptBi6Koz', 'GPON00-D6-SGK-3 | ZTE ZXPON C300', '172.20.192.82', 1, 6, 6, 7, 1, 2, 2, '-0.50210600', '117.15370900', '0', '2018-11-20 09:10:05', '2018-11-20 09:10:25'),
(5, 's12pYo5uaE', 'GPON00-D6-LOB-3 | ZTE ZXPON C300', '172.20.192.88', 2, 6, 6, 6, 1, 2, 2, '-0.50210600', '117.15370900', '0', '2018-11-20 09:12:25', '2019-09-30 22:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `gponmerk`
--

CREATE TABLE `gponmerk` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gponmerk`
--

INSERT INTO `gponmerk` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'HQeuxv4P9b', 'ZTE', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(2, 'iZpBETxgO0', 'ALU', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, 'zZUD3fNT7o', 'FIBERHOME', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(4, 'Qk13dJzgKG', 'HUAWEI', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(728, '2014_10_12_000000_create_users_table', 1),
(729, '2014_10_12_100000_create_password_resets_table', 1),
(730, '2018_10_07_091209_create_gpon_table', 1),
(731, '2018_10_07_091251_create_gponmerk_table', 1),
(732, '2018_10_07_091400_create_odf_table', 1),
(733, '2018_10_07_091710_create_odc_table', 1),
(734, '2018_10_07_094446_create_statuscons_table', 1),
(735, '2018_10_07_094552_create_odp_table', 1),
(736, '2018_10_07_094829_create_regional_table', 1),
(737, '2018_10_07_094852_create_witel_table', 1),
(738, '2018_10_07_094914_create_sto_table', 1),
(739, '2018_10_07_094943_create_odcspec_table', 1),
(740, '2018_10_07_095014_create_odpspec_table', 1),
(741, '2018_10_07_095138_create_statusinv_table', 1),
(742, '2018_10_07_095214_create_distribution_table', 1),
(743, '2018_10_08_044534_create_project_table', 1),
(744, '2018_10_08_080855_create_statusproj_table', 1),
(745, '2018_10_08_084722_create_mitra_table', 1),
(746, '2018_10_08_135418_create_typeproj_table', 1),
(747, '2018_10_16_153530_create_log_table', 1),
(749, '2019_11_13_204219_create_splitters_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'fxFsQ3TJje', 'PT TA', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(2, 'ujKspPmD5E', 'PT BISTEL', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, 'e0UiWZD8kg', 'PT TEKKEN', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(4, 'k5XQ3IFqtB', 'PT SPM', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(5, 'DXjfPmoQZy', 'PT TKM', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(6, '0DPjzrLJkb', 'PT TRIPUTRA', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(7, '0b4fqunaA9', 'PT RAYA KEREN Edit', '1', '2019-11-13 09:42:29', '2019-11-13 09:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `odc`
--

CREATE TABLE `odc` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `odcspec_id` int(11) NOT NULL,
  `odf_id` int(11) NOT NULL DEFAULT '0',
  `regional_id` int(11) NOT NULL,
  `witel_id` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `statuscons_id` int(11) NOT NULL DEFAULT '1',
  `statusinv_id` int(11) NOT NULL DEFAULT '1',
  `lat` decimal(10,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `odc`
--

INSERT INTO `odc` (`id`, `unique`, `name`, `odcspec_id`, `odf_id`, `regional_id`, `witel_id`, `sto_id`, `mitra_id`, `project_id`, `statuscons_id`, `statusinv_id`, `lat`, `lng`, `deleted`, `created_at`, `updated_at`) VALUES
(1, '3tTNSJ9moP', 'ODC-SEM-FA', 3, 0, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(2, 'ZVlFOX0o41', 'ODC-TSN-FA', 3, 0, 6, 6, 2, 2, 2, 1, 1, NULL, NULL, '0', '2018-12-23 10:34:09', '2018-12-23 10:34:09'),
(3, 'xEWeBq1D7t', 'ODC-PAA-FA', 3, 0, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(4, 'TkBw8hGCVi', 'ODC-SEM-FT', 4, 0, 6, 6, 1, 1, 8, 1, 1, NULL, NULL, '0', '2018-12-25 20:25:12', '2018-12-25 20:25:12'),
(5, 'PGl4beSzqg', 'ODC-SEM-FJ', 5, 0, 6, 6, 1, 6, 10, 3, 8, NULL, NULL, '0', '2019-09-30 22:45:48', '2019-11-13 07:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `odcspec`
--

CREATE TABLE `odcspec` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `odcspec`
--

INSERT INTO `odcspec` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'zKUGY3nVaC', 'ODC-B-48', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(2, 'pmqf6u1FST', 'ODC-C-576', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, 'Qg8b0HKuem', 'ODC-C-288', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(4, 'TqYw6W3tCs', 'ODC-C-144', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(5, 'XzQNkeygvY', 'ODC-C-48', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `odf`
--

CREATE TABLE `odf` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpon_id` int(11) NOT NULL DEFAULT '0',
  `regional_id` int(11) NOT NULL,
  `witel_id` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `statuscons_id` int(11) NOT NULL,
  `statusinv_id` int(11) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `odf`
--

INSERT INTO `odf` (`id`, `unique`, `name`, `gpon_id`, `regional_id`, `witel_id`, `sto_id`, `mitra_id`, `statuscons_id`, `statusinv_id`, `lat`, `lng`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'vR6cxb4U9W', 'ODF/BOG/01-O-SIDE', 0, 6, 6, 18, 1, 2, 2, '0.13333300', '117.50000000', '0', '2018-11-20 12:10:34', '2018-12-23 19:14:39'),
(2, 'KCynvQl70R', 'ODF/BOG/05-O-SIDE', 0, 6, 6, 18, 1, 2, 2, '0.13333300', '117.50000000', '0', '2018-11-20 12:37:53', '2018-12-23 19:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `odp`
--

CREATE TABLE `odp` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frame` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odpspec_id` int(11) NOT NULL DEFAULT '1',
  `odc_id` int(11) NOT NULL,
  `distribution_id` int(11) NOT NULL,
  `panel_in` int(11) DEFAULT NULL,
  `port_in` enum('1','2','3','4','5','6','7','8','9','10','11','12') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_out` int(11) DEFAULT NULL,
  `port_out` enum('1','2','3','4','5','6','7','8','9','10','11','12') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regional_id` int(11) NOT NULL,
  `witel_id` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `statuscons_id` int(11) NOT NULL DEFAULT '1',
  `statusinv_id` int(11) NOT NULL DEFAULT '1',
  `lat` decimal(10,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `odp`
--

INSERT INTO `odp` (`id`, `unique`, `label`, `name`, `frame`, `power`, `odpspec_id`, `odc_id`, `distribution_id`, `panel_in`, `port_in`, `panel_out`, `port_out`, `regional_id`, `witel_id`, `sto_id`, `mitra_id`, `project_id`, `statuscons_id`, `statusinv_id`, `lat`, `lng`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'nvN3tdh24U', 1, 'ODP-SEM-FA/001Edit', 'FA/D01/001.01/Edit', '40', 1, 1, 1, 1, '12', 2, '1', 6, 6, 1, 6, 1, 3, 8, '0.13333300', '117.50000000', '0', '2018-12-15 14:07:37', '2019-11-13 09:17:11'),
(2, 'YtquZFeJak', 2, 'ODP-SEM-FA/002', 'FA/D01/002.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(3, 'piBIy2Ahlw', 3, 'ODP-SEM-FA/003', 'FA/D01/003.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(4, 'OnvHhakTeE', 4, 'ODP-SEM-FA/004', 'FA/D01/004.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(5, 'FBhaXGVOsz', 5, 'ODP-SEM-FA/005', 'FA/D01/005.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(6, 'yvuZGUS4hB', 6, 'ODP-SEM-FA/006', 'FA/D01/006.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(7, 'PZYcHyQ9R5', 7, 'ODP-SEM-FA/007', 'FA/D01/007.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(8, 'Kyexu4dUM5', 8, 'ODP-SEM-FA/008', 'FA/D01/008.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(9, '3ZsYzfc5vP', 9, 'ODP-SEM-FA/009', 'FA/D01/009.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(10, '8i5ZaOXetf', 10, 'ODP-SEM-FA/010', 'FA/D01/010.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(11, 'E3onlDcqTW', 11, 'ODP-SEM-FA/011', 'FA/D01/011.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(12, 'Gm2WauiFg1', 12, 'ODP-SEM-FA/012', 'FA/D01/012.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 1, 1, 1, NULL, NULL, '0', '2018-12-15 14:07:37', '2018-12-15 14:07:37'),
(13, 'nbeC8LZJUa', 1, 'ODP-SMR-PAA/001', 'PAA/D01/001.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(14, 'qazN41rvKP', 2, 'ODP-SMR-PAA/002', 'PAA/D01/002.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(15, 'N214PGV9Uk', 3, 'ODP-SMR-PAA/003', 'PAA/D01/003.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(16, 'U31YS8t9pe', 4, 'ODP-SMR-PAA/004', 'PAA/D01/004.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(17, 'PZ6C1UHpes', 5, 'ODP-SMR-PAA/005', 'PAA/D01/005.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(18, '3fF48N1bar', 6, 'ODP-SMR-PAA/006', 'PAA/D01/006.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(19, '03aKP8HSfV', 7, 'ODP-SMR-PAA/007', 'PAA/D01/007.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(20, '5uTOlAki8s', 8, 'ODP-SMR-PAA/008', 'PAA/D01/008.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(21, 'TUjuHhSFom', 9, 'ODP-SMR-PAA/009', 'PAA/D01/009.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(22, 'QXrm52AY1e', 10, 'ODP-SMR-PAA/010', 'PAA/D01/010.01', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, 6, 6, 3, 2, 3, 1, 1, NULL, NULL, '0', '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(23, 'x9B8VeJZjD', 1, 'ODP-TSN-FA/001', 'FA/D01/001.01', NULL, 1, 2, 3, NULL, NULL, NULL, NULL, 6, 6, 2, 2, 4, 1, 1, NULL, NULL, '0', '2018-12-23 17:11:11', '2018-12-23 17:11:11'),
(24, 'egJnKRB61p', 2, 'ODP-TSN-FA/002', 'FA/D01/002.01', NULL, 1, 2, 3, NULL, NULL, NULL, NULL, 6, 6, 2, 2, 4, 1, 1, NULL, NULL, '0', '2018-12-23 17:11:11', '2018-12-23 17:11:11'),
(25, 'SHYz1tAk7O', 3, 'ODP-TSN-FA/003', 'FA/D01/003.01', NULL, 1, 2, 3, NULL, NULL, NULL, NULL, 6, 6, 2, 2, 4, 1, 1, NULL, NULL, '0', '2018-12-23 17:11:11', '2018-12-23 17:11:11'),
(26, 'FOLs3V5MjW', 4, 'ODP-TSN-FA/004', 'FA/D01/004.01', NULL, 1, 2, 3, NULL, NULL, NULL, NULL, 6, 6, 2, 2, 4, 1, 1, NULL, NULL, '0', '2018-12-23 17:11:11', '2018-12-23 17:11:11'),
(27, 'HdckOZqstN', 5, 'ODP-TSN-FA/005', 'FA/D01/005.01', NULL, 1, 2, 3, NULL, NULL, NULL, NULL, 6, 6, 2, 2, 4, 1, 1, NULL, NULL, '0', '2018-12-23 17:11:11', '2018-12-23 17:11:11'),
(28, 'Ztj3LlUB6e', 13, 'ODP-SEM-FA/013', 'FA/D01/013.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 5, 1, 1, NULL, NULL, '0', '2018-12-23 17:12:26', '2018-12-23 17:12:26'),
(29, 'AsBe7TJuo5', 14, 'ODP-SEM-FA/014', 'FA/D01/014.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 5, 1, 1, NULL, NULL, '0', '2018-12-23 17:12:26', '2018-12-23 17:12:26'),
(30, 'GQ8Vwjm6bc', 15, 'ODP-SEM-FA/015', 'FA/D01/015.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 5, 1, 1, NULL, NULL, '0', '2018-12-23 17:12:26', '2018-12-23 17:12:26'),
(31, 'E2VmbAnzH9', 16, 'ODP-SEM-FA/016', 'FA/D01/016.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 5, 1, 1, NULL, NULL, '0', '2018-12-23 17:12:26', '2018-12-23 17:12:26'),
(32, 'pfwtKSARUh', 17, 'ODP-SEM-FA/017', 'FA/D01/017.01', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 5, 1, 1, NULL, NULL, '0', '2018-12-23 17:12:26', '2018-12-23 17:12:26'),
(33, 'Nr2bPYewth', 18, 'ODP-SEM-FA/018', 'FA/D02/018.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:22', '2018-12-25 08:48:22'),
(34, 'eXEHBiGAgN', 19, 'ODP-SEM-FA/019', 'FA/D02/019.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:22', '2018-12-25 08:48:22'),
(35, 'g8nsaLpIFo', 20, 'ODP-SEM-FA/020', 'FA/D02/020.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:22', '2018-12-25 08:48:22'),
(36, 'o62VaUTPvw', 21, 'ODP-SEM-FA/021', 'FA/D02/021.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:22', '2018-12-25 08:48:22'),
(37, 'QVjXNsmDA2', 22, 'ODP-SEM-FA/022', 'FA/D02/022.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:22', '2018-12-25 08:48:22'),
(38, 'We5OXNY3k4', 23, 'ODP-SEM-FA/023', 'FA/D02/023.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:22', '2018-12-25 08:48:22'),
(39, 'nNSAOHfyLP', 24, 'ODP-SEM-FA/024', 'FA/D02/024.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:22', '2018-12-25 08:48:22'),
(40, '9GCftdD8Lc', 25, 'ODP-SEM-FA/025', 'FA/D02/025.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:23', '2018-12-25 08:48:23'),
(41, 'DZhJNKAVzf', 26, 'ODP-SEM-FA/026', 'FA/D02/026.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:23', '2018-12-25 08:48:23'),
(42, 'cOsMbYmnSp', 27, 'ODP-SEM-FA/027', 'FA/D02/027.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 3, 6, 1, 1, NULL, NULL, '0', '2018-12-25 08:48:23', '2018-12-25 08:48:23'),
(43, 'esN7ovPgMb', 6, 'ODP-TSN-FA/006', 'FA/D10/006.01', NULL, 1, 2, 5, NULL, NULL, NULL, NULL, 6, 6, 2, 1, 7, 1, 1, NULL, NULL, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(44, 'p4RYIvi239', 7, 'ODP-TSN-FA/007', 'FA/D10/007.01', NULL, 1, 2, 5, NULL, NULL, NULL, NULL, 6, 6, 2, 1, 7, 1, 1, NULL, NULL, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(45, 'I3SLmBdAh8', 8, 'ODP-TSN-FA/008', 'FA/D10/008.01', NULL, 1, 2, 5, NULL, NULL, NULL, NULL, 6, 6, 2, 1, 7, 1, 1, NULL, NULL, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(46, 'hKe2Asfd6M', 9, 'ODP-TSN-FA/009', 'FA/D10/009.01', NULL, 1, 2, 5, NULL, NULL, NULL, NULL, 6, 6, 2, 1, 7, 1, 1, NULL, NULL, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(47, 'QD2JdTvbjW', 10, 'ODP-TSN-FA/010', 'FA/D10/010.01', NULL, 1, 2, 5, NULL, NULL, NULL, NULL, 6, 6, 2, 1, 7, 1, 1, NULL, NULL, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(48, 'puzrOQT1cv', 11, 'ODP-TSN-FA/011', 'FA/D10/011.01', NULL, 1, 2, 5, NULL, NULL, NULL, NULL, 6, 6, 2, 1, 7, 1, 1, NULL, NULL, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(49, 'MPOfc7w0DX', 12, 'ODP-TSN-FA/012', 'FA/D10/012.01', NULL, 1, 2, 5, NULL, NULL, NULL, NULL, 6, 6, 2, 1, 7, 1, 1, NULL, NULL, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(50, 'au4gYd2e0v', 13, 'ODP-TSN-FA/013', 'FA/D10/013.01', NULL, 1, 2, 5, NULL, NULL, NULL, NULL, 6, 6, 2, 1, 7, 1, 1, NULL, NULL, '0', '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(51, '9bkpJizavo', 28, 'ODP-SEM-FA/028', 'FA/D03/028.01', NULL, 1, 1, 6, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 9, 1, 1, NULL, NULL, '0', '2019-06-01 10:40:04', '2019-06-01 10:40:04'),
(52, 'pEONJ0G4DK', 29, 'ODP-SEM-FA/029', 'FA/D03/029.01', NULL, 1, 1, 6, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 9, 1, 1, NULL, NULL, '0', '2019-06-01 10:40:04', '2019-06-01 10:40:04'),
(53, '9cifLrJFox', 30, 'ODP-SEM-FA/030', 'FA/D03/030.01', NULL, 1, 1, 6, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 9, 1, 1, NULL, NULL, '0', '2019-06-01 10:40:04', '2019-06-01 10:40:04'),
(54, 'hAaNUXSpy5', 31, 'ODP-SEM-FA/031', 'FA/D03/031.01', NULL, 1, 1, 6, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 9, 1, 1, NULL, NULL, '0', '2019-06-01 10:40:04', '2019-06-01 10:40:04'),
(55, 'xpR6TCYn3o', 1, 'ODP-SEM-FJ/001', 'FJ/D01/001.01', NULL, 1, 5, 15, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 10, 1, 1, NULL, NULL, '0', '2019-09-30 22:45:48', '2019-09-30 22:45:48'),
(56, 'IMbTUh7H94', 2, 'ODP-SEM-FJ/002', 'FJ/D01/002.01', NULL, 1, 5, 15, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 10, 1, 1, NULL, NULL, '0', '2019-09-30 22:45:48', '2019-09-30 22:45:48'),
(57, 'w3czxplqJ1', 3, 'ODP-SEM-FJ/003', 'FJ/D01/003.01', NULL, 1, 5, 15, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 10, 1, 1, NULL, NULL, '0', '2019-09-30 22:45:49', '2019-09-30 22:45:49'),
(58, 'HwIih2q4fZ', 4, 'ODP-SEM-FJ/004', 'FJ/D01/004.01', NULL, 1, 5, 15, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 10, 1, 1, NULL, NULL, '0', '2019-09-30 22:45:49', '2019-09-30 22:45:49'),
(59, '3imcavRJPU', 5, 'ODP-SEM-FJ/005', 'FJ/D01/005.01', NULL, 1, 5, 15, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 10, 1, 1, NULL, NULL, '0', '2019-09-30 22:45:49', '2019-09-30 22:45:49'),
(60, 'qIuQPhm0kd', 6, 'ODP-SEM-FJ/006', 'FJ/D01/006.01', NULL, 1, 5, 15, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 10, 1, 1, NULL, NULL, '0', '2019-09-30 22:45:49', '2019-09-30 22:45:49'),
(61, 'HxiP7VvOgo', 7, 'ODP-SEM-FJ/007', 'FJ/D01/007.01', NULL, 1, 5, 15, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 10, 1, 1, NULL, NULL, '0', '2019-09-30 22:45:49', '2019-09-30 22:45:49'),
(62, 'tmbw7faMHI', 32, 'ODP-SEM-FA/032', 'FA/D02/032.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 11, 1, 1, NULL, NULL, '0', '2019-11-05 01:48:44', '2019-11-05 01:48:44'),
(63, 'ts4mX3ZlRG', 33, 'ODP-SEM-FA/033', 'FA/D02/033.01', NULL, 1, 1, 4, NULL, NULL, NULL, NULL, 6, 6, 1, 1, 11, 1, 1, NULL, NULL, '0', '2019-11-05 01:48:44', '2019-11-05 01:48:44'),
(64, 'HjuixSa4Xq', 1, 'ODP-SEM-FT/001', 'FT/D01/001.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38'),
(65, 'lxqvfOGZMm', 2, 'ODP-SEM-FT/002', 'FT/D01/002.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38'),
(66, 'gyrlK4xcQM', 3, 'ODP-SEM-FT/003', 'FT/D01/003.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38'),
(67, 'cA56lrXY3T', 4, 'ODP-SEM-FT/004', 'FT/D01/004.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38'),
(68, 'MTHUJWrm1i', 5, 'ODP-SEM-FT/005', 'FT/D01/005.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38'),
(69, 'WlH3jzYxnR', 6, 'ODP-SEM-FT/006', 'FT/D01/006.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38'),
(70, 'I0gBUfR7pW', 7, 'ODP-SEM-FT/007', 'FT/D01/007.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38'),
(71, '34pYaQw609', 8, 'ODP-SEM-FT/008', 'FT/D01/008.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38'),
(72, 'EbQqrWJ2m6', 9, 'ODP-SEM-FT/009', 'FT/D01/009.01', NULL, 1, 4, 12, NULL, NULL, NULL, NULL, 6, 6, 1, 2, 12, 1, 1, NULL, NULL, '0', '2019-11-05 12:29:38', '2019-11-05 12:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `odpspec`
--

CREATE TABLE `odpspec` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `odpspec`
--

INSERT INTO `odpspec` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'CG3JYXdoAD', 'ODP-CA-8', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(2, 'P7R1rSLQVZ', 'ODP-PB-8', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regional_id` int(11) NOT NULL,
  `witel_id` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `typeproj_id` int(11) NOT NULL,
  `no_contract` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `odpcount` int(11) NOT NULL DEFAULT '0',
  `statusproj_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `unique`, `name`, `regional_id`, `witel_id`, `sto_id`, `typeproj_id`, `no_contract`, `mitra_id`, `odpcount`, `statusproj_id`, `created_at`, `updated_at`) VALUES
(1, 'Z0sSpVMIf2', 'ABD-FTTH PERUM SEMPAJA LESTARI INDAH', 6, 6, 1, 1, '6000098765B5', 1, 12, 10, '2018-12-15 14:07:37', '2019-11-12 08:46:24'),
(2, 'eUkQ1ys42w', 'ABD-FTTH STTF2 TANJUNG SANTAN', 6, 6, 2, 1, '600008B56789', 2, 0, 1, '2018-12-23 10:34:09', '2018-12-23 10:34:09'),
(3, 'H38zpYMElx', 'ABD-FTTH STTF2 PALIMA PT2', 6, 6, 3, 1, '600008B56789', 2, 10, 1, '2018-12-23 17:09:33', '2018-12-23 17:09:33'),
(4, 'vV5xtduhbw', 'ABD-FTTH TANJUNG SANTAN KE 2', 6, 6, 2, 1, '600008B56789', 2, 5, 1, '2018-12-23 17:11:11', '2018-12-23 17:11:11'),
(5, '0qowCf7iSx', 'ABD-FTTH SEMPAJA PERUMAHAN BENGKURING RAYA', 6, 6, 1, 1, '600008B56789', 2, 5, 8, '2018-12-23 17:12:26', '2019-11-12 08:47:45'),
(6, 'VMNJE1afYg', 'ABD-FTTH STTF2 SEMPAJA', 6, 6, 1, 1, '60000B67895', 3, 10, 1, '2018-12-25 08:48:22', '2018-12-25 08:48:22'),
(7, '5syB80OwaN', 'ABD-FTTH STTF2 TANJUNG SANTAN', 6, 6, 2, 1, '6B5880000087', 1, 8, 1, '2018-12-25 08:51:12', '2018-12-25 08:51:12'),
(8, 'AOJhMbPlmN', 'ABD-FTTH SEMPAJA BARU STTF2', 6, 6, 1, 1, '689957640001', 1, 0, 1, '2018-12-25 20:25:12', '2018-12-25 20:25:12'),
(9, 'WaESLkhpQK', 'ABD-FTTH PERUM SEMPAJA LESTARI INDAH TAHAP II', 6, 6, 1, 1, '6000098765B9', 1, 4, 1, '2019-06-01 10:40:04', '2019-06-01 10:40:04'),
(10, 'cjH9nZXbuR', 'STTF2 SEMPAJA', 6, 6, 1, 5, '08115556925', 1, 7, 1, '2019-09-30 22:45:48', '2019-09-30 22:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `regional`
--

CREATE TABLE `regional` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regional`
--

INSERT INTO `regional` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'XWEbsoveRt', 'REGIONAL 1 (SUMATERA)', '0', '2018-11-13 21:47:38', '2019-10-15 00:53:44'),
(2, 'mP3lvJdB4r', 'REGIONAL 2 (JADEBOTABES)', '0', '2018-11-13 21:47:38', '2019-10-15 00:54:52'),
(3, 'bktL13zQ7Z', 'REGIONAL 3 (JAWA BARAT)', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(4, 'A78crtTbPH', 'REGIONAL 4 (JATENG & DIY)', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(5, 'nC2QtaJXOd', 'REGIONAL 5 (JATIM BALI NUSRA)', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(6, 'HBeOC2QG7l', 'REGIONAL 6 (KALIMANTAN)', '0', '2018-11-13 21:47:38', '2019-10-13 10:31:34'),
(7, 'Avdt3hajXH', 'REGIONAL 7 (KTI)', '1', '2018-11-13 21:47:38', '2019-11-13 09:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `splitters`
--

CREATE TABLE `splitters` (
  `id` int(10) UNSIGNED NOT NULL,
  `odc_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `splitters`
--

INSERT INTO `splitters` (`id`, `odc_id`, `name`, `port`, `created_at`, `updated_at`) VALUES
(2, 1, 'SPL-001-001', 2, '2019-11-13 13:47:23', '2019-11-13 13:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `statuscons`
--

CREATE TABLE `statuscons` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuscons`
--

INSERT INTO `statuscons` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'uaK1FM0eyx', 'PLANNED', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(2, 'piaNjtQPF3', 'IN SERVICE', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, 'Fdryw5uIcP', 'CANCEL', '0', '2018-11-13 21:47:38', '2019-10-14 14:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `statusinv`
--

CREATE TABLE `statusinv` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statusinv`
--

INSERT INTO `statusinv` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'gDcFJmBNTw', 'OGP', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(2, '9aDr1RNhfs', 'GOLIVE', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, 'PoYiIpQr3w', 'KURANG POWER', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(4, 'X2Guclh5Qy', 'DUPLIKASI POWER', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(5, 'kyD60i59Fe', 'DELETED', '0', '2018-11-13 21:47:38', '2019-10-14 14:45:57'),
(6, 'sX6JxutVGQ', 'CANCEL', '0', '2018-11-13 21:47:38', '2019-10-14 14:46:04'),
(7, 'KRkXuMyolj', 'SURVEY', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(8, 'DMuZoS79fl', 'SELESAI SURVEY', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `statusproj`
--

CREATE TABLE `statusproj` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statusproj`
--

INSERT INTO `statusproj` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'HBluSIhjio', 'BOOKING', '0', '2018-11-13 21:47:38', '2019-10-14 14:56:48'),
(2, '4deJyfH8SQ', 'PEMBANGUNAN', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, 'FcBhRnfXM5', 'SETOR ABD', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(4, 'EMnpNteigY', 'REDRAW ABD', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(5, 'C4XpDIGhtk', 'INTEGRASI', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(6, 'LqavQcsmhi', 'CONNECTIVITY', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(7, 'Ok8e2KEpnU', 'CLOSE', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(8, 'c6TYjrt03z', 'KENDALA EKSISTING', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(9, 'qecBDEvSKt', 'KENDALA POWER', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(10, '7V3OmipCWf', 'CANCEL', '0', '2018-11-13 21:47:38', '2019-10-14 14:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE `sto` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witel_id` int(11) NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sto`
--

INSERT INTO `sto` (`id`, `unique`, `name`, `shortname`, `witel_id`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'fITGVHx6Jv', 'SMRSEM', 'SEM', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(2, 'UjZ6r4Xhyk', 'SMRTSN', 'TSN', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, 'IiOARTcuk8', 'SMRPAA', 'PAA', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(5, 'jonJEstdW8', 'SMRPLL', 'PLL', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(6, 'woG9YZVpaM', 'SMRLOB', 'LOB', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(7, '6fd3Q2GkSE', 'SMRSGK', 'SGK', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(8, 'p0jewzxlDT', 'SMRSBR', 'SBR', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(9, 'F4eXTd7Unr', 'SMRTMD', 'TMD', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(10, 'zJwuD1jq0Y', 'SMRSMR', 'SMR', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(11, 'IpVGPYgyKN', 'TRGTGG', 'TGG', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(12, 'ywcUNmFrsE', 'TRGSAN', 'SAN', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(13, 'rPFztOHfCT', 'TRGAGN', 'AGN', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(14, 'LlxFOMuU0E', 'MLKMLA', 'MLA', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(15, 'hYiGpRWDfJ', 'MBDMBD', 'MBD', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(16, 'a6M7RuLoYH', 'SAASTT', 'STT', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(17, 'U6zKiHbyxB', 'BOGLKT', 'LKT', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(18, 'rKMFNgYtfy', 'BOGBOT', 'BOT', 6, '0', '2018-11-13 21:47:38', '2019-10-14 01:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `typeproj`
--

CREATE TABLE `typeproj` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeproj`
--

INSERT INTO `typeproj` (`id`, `unique`, `name`, `deleted`, `created_at`, `updated_at`) VALUES
(1, '47LVmM1JBY', 'OSP FTTH', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(2, 'ykH937nqbs', 'UNSC', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, 'rylWqhp0gx', 'LME HEM', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(4, '2AahjNmZzP', 'GRANULAR', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(5, '3L24sq5QRl', 'MIGRASI', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(6, 'x9iUnVaBWS', 'VALIDASI', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(7, 'x1aOEmJPXQ', 'TEKNIS', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(8, 'IahRDmLX6N', 'FO EKSISTING', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(9, 'rE32dDsyel', 'DISCOVERY', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(10, '7ok0pDHUIJ', 'ALU', '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mitra_id` int(11) DEFAULT NULL,
  `level` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique`, `name`, `nik`, `email`, `password`, `mitra_id`, `level`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'oeZ54xanT2', 'Administrator', '94170274', 'mf16081994@gmail.com', '$2y$12$7KokIF0fHxAn7KD.5umpoOX4W4ixLSNy7JIpKO9XNOOv9bWGQ0S8C', 1, '1', '0', '9WsacJTFyLxTQv8kiugPbKTxWTtV5HfxTy0womRKRbYswZXQaNIk0Td8lmJA', '2018-11-13 21:47:39', '2018-11-13 21:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `witel`
--

CREATE TABLE `witel` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regional_id` int(11) NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `witel`
--

INSERT INTO `witel` (`id`, `unique`, `name`, `regional_id`, `deleted`, `created_at`, `updated_at`) VALUES
(1, '1oqHLSXMYy', 'BALIKPAPAN', 6, '0', '2018-11-13 21:47:38', '2019-10-15 00:56:27'),
(2, 'b9FWnIxU6D', 'KALBAR', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(3, '4U6Fd8Cp9t', 'KALSEL', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(4, 'mXZwhLudR9', 'KALTARA', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(5, 'Goj7dDZOwB', 'KALTENG', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38'),
(6, '89XyMKTiNq', 'SAMARINDA', 6, '0', '2018-11-13 21:47:38', '2018-11-13 21:47:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `distribution_unique_unique` (`unique`);

--
-- Indexes for table `gpon`
--
ALTER TABLE `gpon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gpon_unique_unique` (`unique`);

--
-- Indexes for table `gponmerk`
--
ALTER TABLE `gponmerk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gponmerk_unique_unique` (`unique`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `log_unique_unique` (`unique`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mitra_unique_unique` (`unique`);

--
-- Indexes for table `odc`
--
ALTER TABLE `odc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `odc_unique_unique` (`unique`);

--
-- Indexes for table `odcspec`
--
ALTER TABLE `odcspec`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `odcspec_unique_unique` (`unique`);

--
-- Indexes for table `odf`
--
ALTER TABLE `odf`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `odf_unique_unique` (`unique`);

--
-- Indexes for table `odp`
--
ALTER TABLE `odp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `odp_unique_unique` (`unique`);

--
-- Indexes for table `odpspec`
--
ALTER TABLE `odpspec`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `odpspec_unique_unique` (`unique`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_unique_unique` (`unique`);

--
-- Indexes for table `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regional_unique_unique` (`unique`);

--
-- Indexes for table `splitters`
--
ALTER TABLE `splitters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuscons`
--
ALTER TABLE `statuscons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statuscons_unique_unique` (`unique`);

--
-- Indexes for table `statusinv`
--
ALTER TABLE `statusinv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statusinv_unique_unique` (`unique`);

--
-- Indexes for table `statusproj`
--
ALTER TABLE `statusproj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statusproj_unique_unique` (`unique`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sto_unique_unique` (`unique`);

--
-- Indexes for table `typeproj`
--
ALTER TABLE `typeproj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typeproj_unique_unique` (`unique`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_unique_unique` (`unique`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `witel`
--
ALTER TABLE `witel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `witel_unique_unique` (`unique`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gpon`
--
ALTER TABLE `gpon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gponmerk`
--
ALTER TABLE `gponmerk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `odc`
--
ALTER TABLE `odc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `odcspec`
--
ALTER TABLE `odcspec`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `odf`
--
ALTER TABLE `odf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `odp`
--
ALTER TABLE `odp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `odpspec`
--
ALTER TABLE `odpspec`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `regional`
--
ALTER TABLE `regional`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `splitters`
--
ALTER TABLE `splitters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuscons`
--
ALTER TABLE `statuscons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statusinv`
--
ALTER TABLE `statusinv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `statusproj`
--
ALTER TABLE `statusproj`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sto`
--
ALTER TABLE `sto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `typeproj`
--
ALTER TABLE `typeproj`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `witel`
--
ALTER TABLE `witel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
