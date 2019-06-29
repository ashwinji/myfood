-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 11:01 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anotherfoodprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appsettings`
--

CREATE TABLE `appsettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobilenum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_received_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 (for Monday)',
  `production_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '2 (for Tuesday)',
  `delivery_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3' COMMENT '1 (for Wednesday)',
  `seo_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appsettings`
--

INSERT INTO `appsettings` (`id`, `app_name`, `app_logo`, `email`, `address`, `mobilenum`, `item_received_day`, `production_day`, `delivery_day`, `seo_keyword`, `seo_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(2, 'Food Production', 'assets/images/logo.png', 'admin@mail.com', 'Sweden', '987456321', '1', '2', '3', NULL, NULL, NULL, '2019-06-22 06:20:07', '2019-06-22 06:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `recipe_master_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL COMMENT 'raw_material_master_id',
  `standard_qty` decimal(9,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recipe_master_id`, `item_id`, `standard_qty`, `created_at`, `updated_at`) VALUES
(20, 8, 1, '22.000', '2019-06-25 00:31:28', '2019-06-25 00:31:28'),
(22, 10, 1, '1.000', '2019-06-27 04:41:08', '2019-06-27 04:41:08'),
(23, 10, 5, '2.000', '2019-06-27 04:41:08', '2019-06-27 04:41:08'),
(24, 11, 1, '7.000', '2019-06-29 01:12:49', '2019-06-29 01:12:49'),
(25, 11, 5, '8.000', '2019-06-29 01:12:49', '2019-06-29 01:12:49'),
(26, 5, 1, '10.000', '2019-06-29 02:27:55', '2019-06-29 02:27:55'),
(27, 5, 5, '5.000', '2019-06-29 02:27:55', '2019-06-29 02:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `meal_and_recipes`
--

CREATE TABLE `meal_and_recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `meal_master_id` int(10) UNSIGNED NOT NULL,
  `recipe_master_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_and_recipes`
--

INSERT INTO `meal_and_recipes` (`id`, `meal_master_id`, `recipe_master_id`, `created_at`, `updated_at`) VALUES
(9, 15, 5, '2019-06-24 08:21:05', '2019-06-24 08:21:05'),
(10, 15, 5, '2019-06-24 08:21:05', '2019-06-24 08:21:05'),
(11, 16, 5, '2019-06-25 01:00:57', '2019-06-25 01:00:57'),
(12, 16, 6, '2019-06-25 01:00:57', '2019-06-25 01:00:57'),
(13, 16, 8, '2019-06-25 01:00:57', '2019-06-25 01:00:57'),
(14, 16, 9, '2019-06-25 01:00:57', '2019-06-25 01:00:57'),
(15, 17, 5, '2019-06-25 01:04:35', '2019-06-25 01:04:35'),
(16, 17, 6, '2019-06-25 01:04:35', '2019-06-25 01:04:35'),
(17, 19, 6, '2019-06-25 02:32:31', '2019-06-25 02:32:31'),
(25, 21, 5, '2019-06-25 02:51:53', '2019-06-25 02:51:53'),
(26, 21, 6, '2019-06-25 02:51:53', '2019-06-25 02:51:53'),
(27, 21, 8, '2019-06-25 02:51:53', '2019-06-25 02:51:53'),
(28, 21, 9, '2019-06-25 02:51:53', '2019-06-25 02:51:53'),
(29, 20, 6, '2019-06-25 03:30:04', '2019-06-25 03:30:04'),
(30, 20, 8, '2019-06-25 03:30:04', '2019-06-25 03:30:04'),
(31, 22, 5, '2019-06-25 03:30:20', '2019-06-25 03:30:20'),
(33, 4, 5, '2019-06-25 04:20:00', '2019-06-25 04:20:00'),
(34, 14, 5, '2019-06-25 04:20:08', '2019-06-25 04:20:08'),
(35, 23, 5, '2019-06-28 23:58:23', '2019-06-28 23:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `meal_masters`
--

CREATE TABLE `meal_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `meal_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_masters`
--

INSERT INTO `meal_masters` (`id`, `meal_name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Meals2', 0, '2019-06-24 02:49:34', '2019-06-24 02:49:47'),
(14, 'Recipe 88', 1, '2019-06-24 08:04:41', '2019-06-24 08:04:41'),
(15, 'Meal one', 1, '2019-06-24 08:21:05', '2019-06-24 08:21:05'),
(16, 'Meal 787', 1, '2019-06-25 01:00:57', '2019-06-25 01:00:57'),
(17, 'meal 9000', 1, '2019-06-25 01:04:35', '2019-06-25 01:04:35'),
(18, '9000meal', 1, '2019-06-25 01:10:09', '2019-06-25 01:10:09'),
(19, 'Meal dummy', 1, '2019-06-25 02:32:31', '2019-06-25 02:32:31'),
(20, 'dummy meal', 1, '2019-06-25 02:32:54', '2019-06-25 02:32:54'),
(21, 'dfsafas', 1, '2019-06-25 02:34:23', '2019-06-25 02:34:23'),
(22, 'Champak meal', 1, '2019-06-25 03:30:20', '2019-06-25 03:30:20'),
(23, 'aaaa', 1, '2019-06-28 23:58:23', '2019-06-28 23:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `menu_plannings`
--

CREATE TABLE `menu_plannings` (
  `id` int(10) UNSIGNED NOT NULL,
  `meal_master_id` int(10) UNSIGNED NOT NULL,
  `week_number` int(11) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `day_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Monday',
  `day_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tuesday',
  `day_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Wednesday',
  `day_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thursday',
  `day_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Friedday',
  `day_6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Saterday',
  `day_7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Sunday',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_31_075943_create_permission_tables', 1),
(4, '2018_12_31_081041_create_appsettings_table', 1),
(5, '2019_06_21_105628_create_raw_material_masters_table', 1),
(6, '2019_06_21_110100_create_unit_masters_table', 1),
(7, '2019_06_21_110359_create_raw_material_stocks_table', 1),
(8, '2019_06_21_111727_create_purchase_indents_table', 1),
(9, '2019_06_21_111728_create_purchase_indent_items_table', 1),
(10, '2019_06_21_113735_create_raw_material_rec_trans_logs_table', 1),
(11, '2019_06_21_114548_create_suppliers_table', 1),
(12, '2019_06_21_114724_create_supplier_items_table', 1),
(13, '2019_06_21_120129_create_recipe_masters_table', 1),
(14, '2019_06_21_120358_create_ingredients_table', 1),
(15, '2019_06_21_120805_create_raw_material_stock_outs_table', 1),
(16, '2019_06_21_121732_create_meal_masters_table', 1),
(17, '2019_06_21_121752_create_meal_and_recipes_table', 1),
(18, '2019_06_21_121832_create_menu_plannings_table', 1),
(19, '2019_06_21_125843_create_task_assigns_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 5),
(2, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users-list', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(2, 'user-view', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(3, 'user-create', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(4, 'user-edit', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(5, 'user-delete', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(6, 'user-action', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(7, 'role-list', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(8, 'role-create', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(9, 'role-edit', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(10, 'role-delete', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(11, 'permission-list', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(12, 'permission-create', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(13, 'permission-edit', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(14, 'permission-delete', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(15, 'app-setting', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_indents`
--

CREATE TABLE `purchase_indents` (
  `id` int(10) UNSIGNED NOT NULL,
  `indent_date` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending' COMMENT 'Pending, Send, Process, Complete',
  `indent_complete` date DEFAULT NULL COMMENT 'all items status:Complete then purchase_indents status:Complete and completed date',
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_indent_items`
--

CREATE TABLE `purchase_indent_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_indent_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL COMMENT 'raw_material_master_id',
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_qty` decimal(9,2) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `accept_qty` decimal(9,2) DEFAULT NULL,
  `item_status` enum('Process','Complete') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_masters`
--

CREATE TABLE `raw_material_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_price` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raw_material_masters`
--

INSERT INTO `raw_material_masters` (`id`, `item_name`, `unit`, `expected_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cumin Seeds', '1', '200.00', '2019-06-22 05:21:30', '2019-06-22 05:37:16', NULL),
(4, 'Turmeric', '1', '22.00', '2019-06-24 02:05:52', '2019-06-24 02:05:58', '2019-06-24 02:05:58'),
(5, 'Turmaric', '1', '22.00', '2019-06-24 02:48:50', '2019-06-24 02:48:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_rec_trans_logs`
--

CREATE TABLE `raw_material_rec_trans_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_indent_id` int(10) UNSIGNED NOT NULL,
  `purchase_indent_item_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL COMMENT 'raw_material_master_id',
  `qty` decimal(9,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_stocks`
--

CREATE TABLE `raw_material_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL COMMENT 'raw_material_master_id',
  `minimum_qty` decimal(9,3) NOT NULL DEFAULT 0.000,
  `current_stock` decimal(9,3) NOT NULL DEFAULT 0.000,
  `stock_type` enum('Automatic','Manually') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'if qty will be deduct during create Recipe : status will be Automatic, Opposite: Manually',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raw_material_stocks`
--

INSERT INTO `raw_material_stocks` (`id`, `item_id`, `minimum_qty`, `current_stock`, `stock_type`, `created_at`, `updated_at`) VALUES
(1, 1, '25.000', '10.000', 'Automatic', NULL, '2019-06-29 02:38:09'),
(2, 5, '25.000', '5.000', 'Automatic', NULL, '2019-06-29 02:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_stock_outs`
--

CREATE TABLE `raw_material_stock_outs` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL COMMENT 'raw_material_master_id',
  `created_by` int(10) UNSIGNED NOT NULL COMMENT 'Chef / User id',
  `old_stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change_stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_masters`
--

CREATE TABLE `recipe_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'save complete image path',
  `recipe_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipe_masters`
--

INSERT INTO `recipe_masters` (`id`, `name`, `image_path`, `recipe_info`, `recipe_method`, `recipe_status`, `created_at`, `updated_at`) VALUES
(5, 'First Recipe', 'assets/uploads/recipe/mjonpfle2n.jpg', 'sadfsa', 'dsf', 1, '2019-06-24 03:16:44', '2019-06-24 07:36:04'),
(6, 'Second Recipe', 'assets/uploads/recipe/cxasgxn3rc.jpg', 'fdasfsa', 'fas', 1, '2019-06-24 03:20:05', '2019-06-24 03:20:05'),
(8, 'Recipe Third', 'assets/uploads/recipe/bzvvpaa8oa.jpg', 'Recipe infor heere', 'Method will be here', 1, '2019-06-25 00:02:24', '2019-06-25 00:02:24'),
(9, 'Fourth Recipe', 'assets/uploads/recipe/ai2nxfxwha.jpg', 'acccc', 'b', 1, '2019-06-25 00:54:31', '2019-06-25 00:57:47'),
(10, 'Final recipe', 'assets/uploads/recipe/yhxqpgalvc.jpg', 'a', 'b', 1, '2019-06-27 04:41:08', '2019-06-27 04:41:08'),
(11, 'fff', 'assets/uploads/recipe/gfczin337e.jpg', 'fdsaf', 'fdsaf', 1, '2019-06-29 01:12:49', '2019-06-29 01:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-06-22 06:20:08', '2019-06-22 06:20:08'),
(2, 'chef', 'web', '2019-06-25 03:51:44', '2019-06-25 03:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_items`
--

CREATE TABLE `supplier_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL COMMENT 'raw_material_master_id',
  `item_price` decimal(9,2) DEFAULT NULL COMMENT 'just for information',
  `select_for_item_deliver` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_assigns`
--

CREATE TABLE `task_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `chef_id` int(10) UNSIGNED NOT NULL COMMENT 'user id',
  `recipe_master_id` int(10) UNSIGNED NOT NULL,
  `assigned_qty` int(11) NOT NULL,
  `assigned_date` date NOT NULL,
  `prepared_qty` int(11) DEFAULT NULL,
  `prepared_date` date DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_assigns`
--

INSERT INTO `task_assigns` (`id`, `chef_id`, `recipe_master_id`, `assigned_qty`, `assigned_date`, `prepared_qty`, `prepared_date`, `reason`, `created_at`, `updated_at`) VALUES
(217, 3, 5, 12, '2019-06-28', 1, '2019-06-29', 'power cut', '2019-06-28 04:04:53', '2019-06-29 00:49:04'),
(218, 3, 6, 11, '2019-06-28', 1, '2019-06-29', 'सामान कम पड़ गया था', '2019-06-28 04:04:54', '2019-06-29 00:45:24'),
(219, 4, 9, 22, '2019-06-28', 99, NULL, NULL, '2019-06-28 04:05:06', '2019-06-29 00:23:06'),
(220, 4, 10, 55, '2019-06-28', 99, NULL, NULL, '2019-06-28 04:05:07', '2019-06-29 00:23:06'),
(221, 3, 9, 7, '2019-06-29', 0, '2019-06-29', 'रसोइ में घुसने ही नही दिया', '2019-06-28 23:51:34', '2019-06-29 00:36:37'),
(222, 3, 5, 15, '2019-06-29', 4, NULL, 'dfas', '2019-06-28 23:59:19', '2019-06-29 00:28:26'),
(223, 4, 6, 25, '2019-06-29', 99, NULL, NULL, '2019-06-28 23:59:41', '2019-06-29 00:23:07'),
(224, 4, 6, 45, '2019-06-29', 99, NULL, NULL, '2019-06-29 00:01:12', '2019-06-29 00:23:07'),
(225, 3, 6, 48, '2019-06-29', 4, NULL, 'dfas', '2019-06-29 00:01:28', '2019-06-29 00:28:26'),
(226, 3, 5, 88, '2019-06-29', 4, NULL, 'dfas', '2019-06-29 00:01:55', '2019-06-29 00:28:26'),
(227, 3, 5, 1, '2019-06-29', 4, NULL, 'dfas', '2019-06-29 00:02:19', '2019-06-29 00:28:26'),
(228, 6, 5, 1, '2019-06-29', 1, '2019-06-29', NULL, '2019-06-29 02:29:05', '2019-06-29 02:30:01'),
(229, 6, 5, 1, '2019-06-29', 1, '2019-06-29', NULL, '2019-06-29 02:37:53', '2019-06-29 02:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `unit_masters`
--

CREATE TABLE `unit_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_masters`
--

INSERT INTO `unit_masters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kg', '2019-06-22 04:27:02', '2019-06-22 04:44:15'),
(5, 'Ltr', '2019-06-24 02:49:09', '2019-06-24 02:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `userType` enum('admin','manager','chef','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'chef',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locktimeout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10' COMMENT 'System auto logout if no activity found.',
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Inactive, 1:Active, 2:Delete',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userType`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `city`, `zipCode`, `api_token`, `locktimeout`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'admin', 'admin', 'admin@mail.com', NULL, '$2y$10$PdMharBZKN2oS5WLgdLjOuwRDaU1BUz2UrgoD9nuJCzivlSacANz6', '741258963', 'Sweden', NULL, '909090', 'KCmfC4bVlXJKbFjWUtMTmajrmtUjFjFOepXg1VS4cHusn43iMbWLf5tlrWqh', '10', '1', '3ZIatXIxsFHEs5GpFVN9B1R1GECgUzfgyQ9M0d03ZlgtL84gbZErREst7Ls6', '2019-06-22 06:20:08', '2019-06-22 06:20:08', NULL),
(3, 'chef', 'rajesh', 'rajesh@gmail.com', NULL, '$2y$10$PdMharBZKN2oS5WLgdLjOuwRDaU1BUz2UrgoD9nuJCzivlSacANz6', '9865986532', 'dafdsfasf', NULL, '852963', 'moBSX0LUOJ3QaX32iDJ08Fs8j', '10', '1', '4t6C2iLUefcmq4pSvkY48TjKTc67O93bZmg5ZWaIX1GNPuPehiHo8zBpyr0T', '2019-06-25 05:10:03', '2019-06-25 05:10:03', NULL),
(4, 'chef', 'vijay', 'vijay@mail.com', NULL, '$2y$10$PdMharBZKN2oS5WLgdLjOuwRDaU1BUz2UrgoD9nuJCzivlSacANz6', '8787878787', 'dsfsafsaf', NULL, '653265', '', '10', '1', NULL, NULL, NULL, NULL),
(5, 'chef', 'Kailash Kherss', 'kailash@gmail.com', NULL, '$2y$10$PdMharBZKN2oS5WLgdLjOuwRDaU1BUz2UrgoD9nuJCzivlSacANz6', '9425790552', 'Mumbai', 'Mumbai', '989898', 'indoPvWTLJP5FeGf5lHbXpaO7', '10', '1', NULL, '2019-06-27 00:07:14', '2019-06-27 00:41:23', '2019-06-27 00:41:23'),
(6, 'chef', 'Ramukaka', 'ramu@gmail.com', NULL, '$2y$10$77cZyPyVGqUr/KR/mfaOmOZSvxwNfM4In6eRMhcNWe5j5LkeegaF6', '9898909898', 'bhopal', 'bhopal', '898980', 'UpGvPKMkSs5vMc9KqKkiY1uXe', '10', '1', 'SuWy9theuQowunOpgjhWM0ixtzW3HsJ5LGZcngyP54w1kSVWupaBCvrcFAX0', '2019-06-29 01:26:33', '2019-06-29 01:26:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appsettings`
--
ALTER TABLE `appsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_recipe_master_id_foreign` (`recipe_master_id`),
  ADD KEY `ingredients_item_id_foreign` (`item_id`);

--
-- Indexes for table `meal_and_recipes`
--
ALTER TABLE `meal_and_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_and_recipes_meal_master_id_foreign` (`meal_master_id`),
  ADD KEY `meal_and_recipes_recipe_master_id_foreign` (`recipe_master_id`);

--
-- Indexes for table `meal_masters`
--
ALTER TABLE `meal_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meal_masters_meal_name_unique` (`meal_name`);

--
-- Indexes for table `menu_plannings`
--
ALTER TABLE `menu_plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_plannings_meal_master_id_foreign` (`meal_master_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_indents`
--
ALTER TABLE `purchase_indents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_indent_items`
--
ALTER TABLE `purchase_indent_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_indent_items_purchase_indent_id_foreign` (`purchase_indent_id`),
  ADD KEY `purchase_indent_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `raw_material_masters`
--
ALTER TABLE `raw_material_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `raw_material_masters_item_name_unique` (`item_name`);

--
-- Indexes for table `raw_material_rec_trans_logs`
--
ALTER TABLE `raw_material_rec_trans_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_material_rec_trans_logs_purchase_indent_id_foreign` (`purchase_indent_id`),
  ADD KEY `raw_material_rec_trans_logs_purchase_indent_item_id_foreign` (`purchase_indent_item_id`),
  ADD KEY `raw_material_rec_trans_logs_item_id_foreign` (`item_id`);

--
-- Indexes for table `raw_material_stocks`
--
ALTER TABLE `raw_material_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_material_stocks_item_id_foreign` (`item_id`);

--
-- Indexes for table `raw_material_stock_outs`
--
ALTER TABLE `raw_material_stock_outs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_material_stock_outs_item_id_foreign` (`item_id`),
  ADD KEY `raw_material_stock_outs_created_by_foreign` (`created_by`);

--
-- Indexes for table `recipe_masters`
--
ALTER TABLE `recipe_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_masters_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_items`
--
ALTER TABLE `supplier_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_items_supplier_id_foreign` (`supplier_id`),
  ADD KEY `supplier_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `task_assigns`
--
ALTER TABLE `task_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_assigns_chef_id_foreign` (`chef_id`),
  ADD KEY `task_assigns_recipe_master_id_foreign` (`recipe_master_id`);

--
-- Indexes for table `unit_masters`
--
ALTER TABLE `unit_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_masters_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appsettings`
--
ALTER TABLE `appsettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `meal_and_recipes`
--
ALTER TABLE `meal_and_recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `meal_masters`
--
ALTER TABLE `meal_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu_plannings`
--
ALTER TABLE `menu_plannings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchase_indents`
--
ALTER TABLE `purchase_indents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_indent_items`
--
ALTER TABLE `purchase_indent_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raw_material_masters`
--
ALTER TABLE `raw_material_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `raw_material_rec_trans_logs`
--
ALTER TABLE `raw_material_rec_trans_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raw_material_stocks`
--
ALTER TABLE `raw_material_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `raw_material_stock_outs`
--
ALTER TABLE `raw_material_stock_outs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_masters`
--
ALTER TABLE `recipe_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_items`
--
ALTER TABLE `supplier_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_assigns`
--
ALTER TABLE `task_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `unit_masters`
--
ALTER TABLE `unit_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `raw_material_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredients_recipe_master_id_foreign` FOREIGN KEY (`recipe_master_id`) REFERENCES `recipe_masters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meal_and_recipes`
--
ALTER TABLE `meal_and_recipes`
  ADD CONSTRAINT `meal_and_recipes_meal_master_id_foreign` FOREIGN KEY (`meal_master_id`) REFERENCES `meal_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_and_recipes_recipe_master_id_foreign` FOREIGN KEY (`recipe_master_id`) REFERENCES `recipe_masters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_plannings`
--
ALTER TABLE `menu_plannings`
  ADD CONSTRAINT `menu_plannings_meal_master_id_foreign` FOREIGN KEY (`meal_master_id`) REFERENCES `meal_masters` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `purchase_indent_items`
--
ALTER TABLE `purchase_indent_items`
  ADD CONSTRAINT `purchase_indent_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `raw_material_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_indent_items_purchase_indent_id_foreign` FOREIGN KEY (`purchase_indent_id`) REFERENCES `purchase_indents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `raw_material_rec_trans_logs`
--
ALTER TABLE `raw_material_rec_trans_logs`
  ADD CONSTRAINT `raw_material_rec_trans_logs_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `raw_material_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `raw_material_rec_trans_logs_purchase_indent_id_foreign` FOREIGN KEY (`purchase_indent_id`) REFERENCES `purchase_indents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `raw_material_rec_trans_logs_purchase_indent_item_id_foreign` FOREIGN KEY (`purchase_indent_item_id`) REFERENCES `purchase_indent_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `raw_material_stocks`
--
ALTER TABLE `raw_material_stocks`
  ADD CONSTRAINT `raw_material_stocks_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `raw_material_masters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `raw_material_stock_outs`
--
ALTER TABLE `raw_material_stock_outs`
  ADD CONSTRAINT `raw_material_stock_outs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `raw_material_stock_outs_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `raw_material_masters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplier_items`
--
ALTER TABLE `supplier_items`
  ADD CONSTRAINT `supplier_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `raw_material_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_items_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_assigns`
--
ALTER TABLE `task_assigns`
  ADD CONSTRAINT `task_assigns_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_assigns_recipe_master_id_foreign` FOREIGN KEY (`recipe_master_id`) REFERENCES `recipe_masters` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
