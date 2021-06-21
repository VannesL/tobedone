-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 07:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickstart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'School', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Daily', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 'Project', '2021-06-20 08:27:32', '2021-06-20 08:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imgvalue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `imgvalue`, `status`, `created_at`, `updated_at`, `price`) VALUES
(1, 'pepe', 'pepe.png', 1, '0000-00-00 00:00:00', '2021-06-21 06:52:28', 50),
(2, 'pepesmile', 'pepesmile.png', 1, '0000-00-00 00:00:00', '2021-06-21 07:39:02', 50),
(3, 'pepebox', 'pepebox.png', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 200),
(4, 'pepemask', 'pepemask.png', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100),
(5, 'pepesad', 'pepesad.png', 1, '0000-00-00 00:00:00', '2021-06-21 08:26:12', 50),
(6, 'pepecool', 'pepecool.png', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100),
(7, 'pepeclap', 'pepeclap.gif', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 500);

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
('2021_06_17_162114_create_tasks_table', 1),
('2021_06_20_074929_create_categories_table', 2),
('2021_06_20_075655_alter_tasks_table_add_category_column', 3),
('2021_06_20_100630_alter_tasks_table_add_descriptiontimeanddate', 4),
('2021_06_20_110036_rename_desctiption_column', 5),
('2021_06_20_125239_update_tasks_table_add_coins', 6),
('2021_06_20_125439_update_tasks_table_delete_coins', 7),
('2021_06_20_125503_update_users_table_add_coins', 7),
('2021_06_20_125642_update_tasks_table_add_status', 8),
('2021_06_21_070103_create_items_table', 9),
('2021_06_21_070125_create_useritems_table', 9),
('2021_06_21_071237_update_users_table_add_pictire', 9),
('2021_06_21_110649_update_items_table_add_price', 10),
('2021_06_21_130318_update_items_table_change_price_dt', 11),
('2021_06_21_131820_update_items_table_add_int_price', 12),
('2021_06_21_133341_update_useritems_table_add_value', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coins` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `created_at`, `updated_at`, `category`, `date`, `time`, `description`, `coins`, `status`) VALUES
(40, 'SE Project', '2021-06-20 22:55:27', '2021-06-21 04:40:30', 'Project', '2021-06-21', '15:55', 'Very Hard', 0, 1),
(41, 'Study', '2021-06-20 23:43:43', '2021-06-20 23:43:43', 'School', '', '', '', 0, 0),
(42, 'Maths HW', '2021-06-20 23:43:52', '2021-06-21 08:17:21', 'School', '2021-06-26', '18:20', 'HWHW', 0, 0),
(44, 'Run & Jog', '2021-06-20 23:44:26', '2021-06-20 23:44:26', 'Daily', '', '18:00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `useritems`
--

CREATE TABLE `useritems` (
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `useritems`
--

INSERT INTO `useritems` (`userid`, `itemid`, `status`, `created_at`, `updated_at`, `value`) VALUES
(1, 1, 0, '2021-06-21 06:52:29', '2021-06-21 06:52:29', 'pepe.png'),
(1, 2, 0, '2021-06-21 07:39:02', '2021-06-21 07:39:02', 'pepesmile.png'),
(1, 5, 0, '2021-06-21 08:26:12', '2021-06-21 08:26:12', 'pepesad.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `coins` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `coins`, `picture`) VALUES
(1, 'Quadro', 'Quadro@gmail.com', 'QuadroQuadro', NULL, '0000-00-00 00:00:00', '2021-06-21 10:21:42', 600, 'pepe.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
