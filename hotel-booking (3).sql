-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2024 at 06:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int NOT NULL,
  `children` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'confirmed',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `hotel_id`, `room_id`, `check_in`, `check_out`, `adults`, `children`, `status`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2024-10-16', '2024-10-17', 1, 2, 'confirmed', '', '', '', '', '2024-10-16 11:37:34', '2024-10-16 11:37:34'),
(2, 4, 1, '2024-10-18', '2024-10-19', 1, 2, 'confirmed', '', '', '', '', '2024-10-16 12:10:09', '2024-10-16 12:10:09'),
(3, 4, 2, '2024-10-16', '2024-10-17', 2, 1, 'confirmed', '', '', '', '', '2024-10-16 12:13:05', '2024-10-16 12:13:05'),
(4, 1, 4, '2024-10-17', '2024-10-18', 2, 2, 'confirmed', '', '', '', '', '2024-10-17 04:39:20', '2024-10-17 04:39:20'),
(5, 4, 1, '2024-10-23', '2024-10-24', 1, 2, 'confirmed', 'as', 'baby@gmail.com', '+923172112990', 'pakas', '2024-10-23 10:29:34', '2024-10-23 10:29:34'),
(6, 4, 2, '2024-10-23', '2024-10-24', 1, 2, 'confirmed', 'as', 'asasas@notmail.com', 'as', 'asas', '2024-10-23 11:33:42', '2024-10-23 11:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint UNSIGNED NOT NULL,
  `state_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint UNSIGNED NOT NULL,
  `sortname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `departments` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `departments`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'Active', '2024-01-11 12:06:08', '2024-01-11 12:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `location`, `description`, `image`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Sheraton Hotel', 'Sheraton Hotel Karachi Hotel', 'Sheraton Hotel Karachi Hotel', '/storage/hotels/rRv3BtDRrdN0lty96X0C727o9pSyY9yeoghaaFEO.jpg', '/storage/hotels/logo/3ir9EmZaCD8Mn7PhOzYXmwiOS8f59BsMKpUTjDVg.jpg', '2024-10-10 11:12:15', '2024-10-14 05:56:22'),
(3, 'Farhan Hotel', 'Farhan Hotel Karachi', 'Farhan Hotel Karachi', '/storage/hotel/zGSsf9DwIQ5uAj5jzDxiqS6iA5dJGsva2aK2B3ZM.jpg', '/storage/hotels/logo/S000e3wnXdM6Yp8mTVGNYOemgfH0M983ZfifqYeD.jpg', '2024-10-10 12:32:56', '2024-10-14 05:56:33'),
(4, 'Galaxy Hotel', 'Galaxy Hotel Karachi', 'Galaxy Hotel Karachi', '/storage/hotel/aBNCxlqhyXY4EHt6OvplLXWHVDn4j78a8vXeLj1X.jpg', '/storage/hotels/logo/7S6DdQd1oLBulnbmTxsr9msQjzA32Tx2e5JHegjn.png', '2024-10-10 12:37:26', '2024-10-16 12:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `lead_id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `amount_paid` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `user_id`, `lead_id`, `comment`, `status`, `total_amount`, `amount_paid`, `created_at`, `updated_at`) VALUES
(1, '20240202173820-8120', 2, 1, NULL, 'inprocess', '2385.00', '50.00', '2024-02-02 12:38:48', '2024-02-02 12:38:48'),
(2, '20240202173848-1437', 2, 1, NULL, 'inprocess', '2500.00', '100.00', '2024-02-02 12:48:22', '2024-02-02 12:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `product`, `description`, `amount`, `qty`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '20240202173820-8120', '1', 'hello', '1.00', 10, '10.00', '2024-02-02 12:38:48', '2024-02-02 12:38:48'),
(2, '20240202173820-8120', '2', 'no', '20.00', 10, '200.00', '2024-02-02 12:38:48', '2024-02-02 12:38:48'),
(3, '20240202173820-8120', '2', 'yes', '32.00', 25, '800.00', '2024-02-02 12:38:48', '2024-02-02 12:38:48'),
(4, '20240202173848-1437', '2', 'yes i have Done', '10.00', 250, '2500.00', '2024-02-02 12:48:22', '2024-02-02 12:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_17_142500_create_permission_tables', 1),
(6, '2022_11_18_154332_create_users_verify_table', 1),
(7, '2022_11_29_123506_create_country_table', 1),
(8, '2022_11_29_123754_create_state_table', 1),
(9, '2022_11_29_123812_create_city_table', 1),
(10, '2022_12_05_143339_create_page_category_table', 1),
(11, '2022_12_05_145055_create_sections_table', 1),
(12, '2022_12_08_114205_create_general_settings_table', 1),
(13, '2023_01_13_150926_create_attendance_table', 1),
(14, '2023_01_13_164521_create_shifts_table', 1),
(15, '2023_01_16_140337_create_leaves_table', 1),
(16, '2023_01_16_154755_create_departments_table', 1),
(17, '2023_01_17_180940_create_clients_table', 1),
(18, '2023_01_18_112451_create_projects_table', 1),
(19, '2023_01_18_163812_create_mails_table', 1),
(21, '2023_12_18_130015_create_permission_user_table', 1),
(22, '2023_12_18_140643_create_user_permissions_table', 1),
(23, '2024_01_12_124540_create_lead_statuses_table', 2),
(24, '2024_01_12_125046_create_lead_sources_table', 2),
(25, '2023_05_04_160158_create_leads_table', 3),
(26, '2024_01_15_121414_create_user_leads_table', 4),
(27, '2023_01_13_164521_create_shift_table', 5),
(28, '2024_01_16_101552_create_packages_table', 5),
(29, '2024_01_22_150509_create_product_table', 6),
(35, '2024_02_02_164911_create_invoices_table', 7),
(36, '2024_02_02_165020_create_invoice_details_table', 7),
(37, '2024_10_10_151205_create_hotels_table', 8),
(40, '2024_10_10_161722_create_room_images_table', 9),
(41, '2024_10_11_144109_create_room_types_table', 10),
(42, '2024_10_10_151731_create_rooms_table', 11),
(43, '2024_10_10_151917_create_bookings_table', 12),
(44, '2024_10_23_145128_add_columns_to_bookings_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 1),
(58, 'App\\Models\\User', 1),
(59, 'App\\Models\\User', 1),
(70, 'App\\Models\\User', 1),
(75, 'App\\Models\\User', 1),
(76, 'App\\Models\\User', 1),
(77, 'App\\Models\\User', 1),
(78, 'App\\Models\\User', 1),
(79, 'App\\Models\\User', 1),
(80, 'App\\Models\\User', 1),
(81, 'App\\Models\\User', 1),
(82, 'App\\Models\\User', 1),
(83, 'App\\Models\\User', 1),
(84, 'App\\Models\\User', 1),
(85, 'App\\Models\\User', 1),
(86, 'App\\Models\\User', 1),
(87, 'App\\Models\\User', 1),
(88, 'App\\Models\\User', 1),
(89, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 2),
(9, 'App\\Models\\User', 2),
(10, 'App\\Models\\User', 2),
(11, 'App\\Models\\User', 2),
(12, 'App\\Models\\User', 2),
(57, 'App\\Models\\User', 2),
(58, 'App\\Models\\User', 2),
(59, 'App\\Models\\User', 2),
(70, 'App\\Models\\User', 2),
(75, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 4),
(6, 'App\\Models\\User', 4),
(7, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 4),
(9, 'App\\Models\\User', 4),
(10, 'App\\Models\\User', 4),
(11, 'App\\Models\\User', 4),
(12, 'App\\Models\\User', 4),
(57, 'App\\Models\\User', 4),
(58, 'App\\Models\\User', 4),
(59, 'App\\Models\\User', 4),
(70, 'App\\Models\\User', 4),
(75, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 5),
(7, 'App\\Models\\User', 5),
(8, 'App\\Models\\User', 5),
(9, 'App\\Models\\User', 5),
(10, 'App\\Models\\User', 5),
(11, 'App\\Models\\User', 5),
(12, 'App\\Models\\User', 5),
(57, 'App\\Models\\User', 5),
(58, 'App\\Models\\User', 5),
(59, 'App\\Models\\User', 5),
(70, 'App\\Models\\User', 5),
(75, 'App\\Models\\User', 5),
(76, 'App\\Models\\User', 5),
(77, 'App\\Models\\User', 5),
(78, 'App\\Models\\User', 5),
(79, 'App\\Models\\User', 5),
(80, 'App\\Models\\User', 5),
(81, 'App\\Models\\User', 5),
(82, 'App\\Models\\User', 5),
(83, 'App\\Models\\User', 5),
(76, 'App\\Models\\User', 6),
(77, 'App\\Models\\User', 6),
(78, 'App\\Models\\User', 6),
(79, 'App\\Models\\User', 6),
(84, 'App\\Models\\User', 6),
(85, 'App\\Models\\User', 6),
(86, 'App\\Models\\User', 6),
(87, 'App\\Models\\User', 6),
(88, 'App\\Models\\User', 6),
(89, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `page_category`
--

CREATE TABLE `page_category` (
  `id` bigint UNSIGNED NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-01-11 12:00:37', '2024-01-11 12:00:37'),
(2, 'role-create', 'web', '2024-01-11 12:00:37', '2024-01-11 12:00:37'),
(3, 'role-edit', 'web', '2024-01-11 12:00:37', '2024-01-11 12:00:37'),
(4, 'role-delete', 'web', '2024-01-11 12:00:37', '2024-01-11 12:00:37'),
(5, 'user-list', 'web', '2024-01-11 12:00:37', '2024-01-11 12:00:37'),
(6, 'user-create', 'web', '2024-01-11 12:00:37', '2024-01-11 12:00:37'),
(7, 'user-edit', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(8, 'user-delete', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(9, 'permission-list', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(10, 'permission-create', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(11, 'permission-edit', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(12, 'permission-delete', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(57, 'user-permission', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(58, 'change-password', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(59, 'general_setting', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(70, 'leads-invoice', 'web', '2024-01-17 11:42:00', '2024-01-17 11:42:00'),
(75, 'mail-inbox', 'web', '2024-01-17 11:48:23', '2024-01-17 11:48:23'),
(76, 'room-type-list', 'web', '2024-10-11 09:58:18', '2024-10-11 09:58:18'),
(77, 'room-type-create', 'web', '2024-10-11 09:58:26', '2024-10-11 09:58:26'),
(78, 'room-type-edit', 'web', '2024-10-11 09:59:53', '2024-10-11 09:59:53'),
(79, 'room-type-delete', 'web', '2024-10-11 10:00:03', '2024-10-11 10:00:03'),
(80, 'hotel-list', 'web', '2024-10-11 10:53:44', '2024-10-11 10:53:44'),
(81, 'hotel-create', 'web', '2024-10-11 10:53:50', '2024-10-11 10:53:50'),
(82, 'hotel-edit', 'web', '2024-10-11 10:53:56', '2024-10-11 10:53:56'),
(83, 'hotel-delete', 'web', '2024-10-11 10:54:00', '2024-10-11 10:54:00'),
(84, 'room-list', 'web', '2024-10-14 04:57:31', '2024-10-14 04:57:31'),
(85, 'room-create', 'web', '2024-10-14 04:57:37', '2024-10-14 04:57:37'),
(86, 'room-edit', 'web', '2024-10-14 04:57:45', '2024-10-14 04:57:45'),
(87, 'room-delete', 'web', '2024-10-14 04:57:51', '2024-10-14 04:57:51'),
(88, 'booking-available', 'web', '2024-10-16 12:31:04', '2024-10-16 12:31:04'),
(89, 'booking-list', 'web', '2024-10-16 12:31:12', '2024-10-16 12:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(2, 'User', 'web', '2024-01-11 12:00:38', '2024-01-11 12:00:38'),
(3, 'Company', 'web', '2024-01-11 12:00:38', '2024-01-17 11:52:04'),
(4, 'Member', 'web', '2024-01-12 12:19:33', '2024-01-12 12:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `benefits` text COLLATE utf8mb4_unicode_ci,
  `adults` int NOT NULL,
  `children` int DEFAULT NULL,
  `facilities` json DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `name`, `type`, `price`, `is_available`, `benefits`, `adults`, `children`, `facilities`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, 'Harriet Trevino', '1', '1500.00', 1, '[\"Free Wi-Fi\",\"Breakfast Included\",\"Gym\"]', 1, 2, '[\"Swimming Pool\", \"breakfast\", \"Gym\"]', NULL, '2024-10-14 05:02:21', '2024-10-16 12:59:15'),
(2, 4, 'Ruth Flynn', '1', '667.00', 1, '[\"Free Wi-Fi\",\"Breakfast Included\",\"Swimming Pool\",\"Gym\"]', 2, 1, '[\"Omnis consequat Omn\"]', NULL, '2024-10-16 12:12:34', '2024-10-16 13:00:04'),
(3, 4, 'Jolene Marshall', '1', '545.00', 1, '[\"Free Wi-Fi\",\"Breakfast Included\",\"Swimming Pool\",\"Gym\"]', 1, 2, '[\"Cumque fugiat aliqui\"]', NULL, '2024-10-16 12:38:54', '2024-10-16 12:38:54'),
(4, 1, 'Felix Kramer', '1', '537.99', 1, '[\"Free Wi-Fi\"]', 3, 2, '[\"Sit enim nisi tempo\", null]', NULL, '2024-10-17 04:38:22', '2024-10-17 04:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'rooms/VDs6G0hXkgZSPXGvU7Z1fJvT74cPlmTcypi6WrOH.jpg', '2024-10-14 05:02:22', '2024-10-16 12:54:00'),
(2, 1, 'rooms/njncw1xZAp0qSFpgPMXcmVZjQX76Xbgxt15NXyok.jpg', '2024-10-14 05:02:33', '2024-10-16 12:54:08'),
(3, 2, 'rooms/6wGmJbnDT2afQE0o9gmklqGZ5BJYedsxg4nNCAvu.jpg', '2024-10-16 12:12:34', '2024-10-16 12:57:44'),
(4, 3, 'rooms/ZEWQTrLL78GIrNwOKl6xMJLgdZcznMqK8KPmQgNi.jpg', '2024-10-16 12:38:54', '2024-10-16 12:55:00'),
(5, 1, 'rooms/f7IiLZEaPxKnUhq2YFB22KStU88ZTOThRDp1w3gX.jpg', '2024-10-16 12:54:15', '2024-10-16 12:54:15'),
(6, 2, 'rooms/YD0ZwnbXGavx9f053QU9CAElae4JHKloRUdj9roM.jpg', '2024-10-16 12:54:44', '2024-10-16 12:54:50'),
(7, 3, 'rooms/BN7qke6L85Yz4SSHbojrJ7i11AC7CPZgi9c7tL6A.jpg', '2024-10-16 12:55:06', '2024-10-16 12:55:06'),
(8, 4, 'rooms/C4175eAzMZ28hYt3p62dyu1DegjhOm66VUmf7fzE.jpg', '2024-10-17 04:38:22', '2024-10-17 04:38:22'),
(9, 4, 'rooms/lKDYHnX58YzCympz5DrAgX2gCy95Z3hOggxKRwVZ.jpg', '2024-10-17 04:38:22', '2024-10-17 04:38:22'),
(10, 4, 'rooms/YMncZ6pfIUeklgjAg5WkGT8o4etrJcJyQP42UlsM.jpg', '2024-10-17 04:38:22', '2024-10-17 04:38:22'),
(11, 4, 'rooms/rOiN3aldKsV1GtBOk82JhqA2qW5tx8oZDfeI9U5g.jpg', '2024-10-17 04:38:22', '2024-10-17 04:38:22'),
(12, 4, 'rooms/bgWGnwbNXbXkSFIWPX8nxPcrCuxWcbxYJhT0rIr9.jpg', '2024-10-17 04:38:22', '2024-10-17 04:38:22'),
(13, 4, 'rooms/8voywjAU2iuLxkSUKiISKkUMSuu125XMXMoYdiqx.jpg', '2024-10-17 04:38:22', '2024-10-17 04:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Silver', 'Silver Room', '2024-10-11 10:18:14', '2024-10-16 12:59:02'),
(2, 'Golden', 'Golden Room', '2024-10-16 12:58:46', '2024-10-16 12:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `hotel_id`, `name`, `address`, `image`, `email`, `is_admin`, `email_verified_at`, `password`, `created_by`, `phone`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`) VALUES
(1, 4, 'Admin', 'East 181st Avenue', 'profile-icon.jpg1728572819Hatch-social.jpg', 'admin@gmail.com', NULL, '2024-01-11 00:00:39', '$2y$10$2Sq4aF9mvh4gAMF9rGNS6e5TZVosepJvNsxzBsz56GU6yYTaNWCn.', '1', '6175775234', NULL, '2024-01-11 12:00:39', '2024-10-11 11:46:31', 0),
(2, 2, 'Jonathan Neal', '101 E. Chapman AveOrange, CA 92866', 'profile-icon.jpg1706896584Hatch-social.jpg', 'company@gmail.com', NULL, '2024-01-11 12:10:42', '$2y$10$FVcxz/eG0cFZ0ZnKOuW8reAMemUbIh40C6LWO96/cqdJXZOEiIfC6', '2', '(800) 555-1234', NULL, '2024-01-11 12:08:26', '2024-02-02 12:56:24', 0),
(3, 3, 'User', NULL, NULL, 'user@gmail.com', NULL, '2024-01-11 12:19:57', '$2y$10$viWFFWO23S89x6GYuKHeXOJfSOnKoNgsT6asbIAdpLxgxEvaibUD6', '2', NULL, NULL, '2024-01-11 12:18:31', '2024-01-11 12:19:57', 0),
(4, 3, 'Nasir Husain', NULL, NULL, 'member@gmail.com', NULL, NULL, '$2y$10$kc8HE4dxS/5BONl3qMsvH.6HaBlAfXHHyi7gzzdW4C8qaaK0YdvuC', '1', NULL, NULL, '2024-01-12 12:20:15', '2024-10-11 11:46:15', 0),
(5, 2, 'tahir', NULL, NULL, 'tahir@gmail.com', NULL, NULL, '$2y$10$OQSb7cxJwoj8IrHQODJEN.4V2DHU/xWOzooYQJsWo9ze8ltAU6hmG', '1', NULL, NULL, '2024-10-11 11:50:39', '2024-10-11 11:50:39', 0),
(6, 1, 'khan', NULL, NULL, 'khan@gmail.com', NULL, NULL, '$2y$10$l7.4G2SjJB4UPaHWh.U42uN7IdkD.zGP4Np4zufUv7/RaHdpN7WUS', '1', NULL, NULL, '2024-10-17 04:34:01', '2024-10-17 04:37:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `user_id` int NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_leads`
--

CREATE TABLE `user_leads` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `lead_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `total_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_leads`
--

INSERT INTO `user_leads` (`id`, `user_id`, `lead_id`, `status`, `comment`, `amount`, `qty`, `total_amount`, `created_at`, `updated_at`, `description`, `product`, `amount_paid`) VALUES
(1, 2, 1, 'accepted', NULL, 10, 250, '2500', '2024-01-24 06:29:13', '2024-02-02 12:48:22', '[\"yes i have Done\"]', '[\"2\"]', '100'),
(2, 2, 1, 'pick', NULL, NULL, NULL, NULL, '2024-02-02 11:42:45', '2024-02-02 11:42:45', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_hotel_id_foreign` (`hotel_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_lead_id_foreign` (`lead_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `page_category`
--
ALTER TABLE `page_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_images_room_id_foreign` (`room_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_leads`
--
ALTER TABLE `user_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_leads_user_id_foreign` (`user_id`),
  ADD KEY `user_leads_lead_id_foreign` (`lead_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_permissions_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `page_category`
--
ALTER TABLE `page_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_leads`
--
ALTER TABLE `user_leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_leads`
--
ALTER TABLE `user_leads`
  ADD CONSTRAINT `user_leads_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`),
  ADD CONSTRAINT `user_leads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
