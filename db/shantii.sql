-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 05:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shantii`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_me`
--

CREATE TABLE `contact_me` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_me`
--

INSERT INTO `contact_me` (`id`, `full_name`, `phone`, `email_id`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', '432342', 'sdsdf@dsfs.com', 'asdasd asda', 'asd assa dsad asdasd', '2020-05-09 10:23:51', '2020-05-09 10:23:51'),
(2, 'asdasd', '432342', 'sdsdf@dsfs.com', 'asdasd asda', 'asd assa dsad asdasd', '2020-05-09 11:18:29', '2020-05-09 11:18:29'),
(3, 'asdasd', '432342', 'sdsdf@dsfs.com', 'asda\'sd asda', 'asd assa dsad asdasd\nsdfsdf fhfg', '2020-05-09 11:20:23', '2020-05-09 11:20:23'),
(4, 'dfsd sdf', '42342', 'ewe@gfa.com', 'sds sdfsdf', 'sdf sdwe rwrsdf sfd', '2020-05-09 11:36:00', '2020-05-09 11:36:00'),
(5, 'sdfsd fds', '345345', 'sdfsd@sdfsf.coma', 'asdasd', 's sdfsdf sdfsdf sdfsdf', '2020-05-09 11:39:09', '2020-05-09 11:39:09'),
(6, 'asdasd', '234234', 'sfsdf@sdfsd.ad', 'asdsad', 'asdasd', '2020-05-09 11:47:31', '2020-05-09 11:47:31'),
(7, 'aaaa', '33333', 'aaa@aaa.com', 'aaaa', 'aaaa', '2020-05-09 11:47:53', '2020-05-09 11:47:53'),
(8, 'asdsad', '2342342', 'dasd@sdsa.com', 'asdasd ads', 'sd asd', '2020-05-09 11:49:22', '2020-05-09 11:49:22'),
(9, 'sdfsdf', '44353', 'sdfs@dfds.com', 'dfgasd adasd', 'asd assad', '2020-05-09 11:50:05', '2020-05-09 11:50:05'),
(10, 'bbbb', '22222', 'bbb@bbb.bbb', 'bbb', 'bbbbb', '2020-05-09 12:01:53', '2020-05-09 12:01:53'),
(11, 'cccc', '3333', 'ccc@ccc.ccc', 'ccccc', 'cccccc', '2020-05-09 12:05:43', '2020-05-09 12:05:43'),
(12, 'ddddd', '44444', 'dddd@dddd.ddd', 'dddd', 'ddd d ddd dddd', '2020-05-09 22:53:41', '2020-05-09 22:53:41'),
(13, 'eeee', '55555', 'eeeee@eee.eee', 'eeee eee', 'ee eee eeee eeeee', '2020-05-09 22:55:36', '2020-05-09 22:55:36'),
(14, 'ggg', '6666', 'gggg@ggg.ggg', 'gggg', 'ggg ggg gggg', '2020-05-09 22:59:34', '2020-05-09 22:59:34'),
(15, 'hhhh', '77777', 'hhhh@hhhh.hhh', 'hhhh hhhh', 'hhh hhh hhh hhh', '2020-05-09 23:51:01', '2020-05-09 23:51:01'),
(16, 'kkkk', '88888', 'kkkk@kkkk.kkk', 'kkkk kkkk kkk', 'kkkk kkkk kkk kkkk kkkk kkk \nkkkk kkkk kkk', '2020-05-09 23:52:13', '2020-05-09 23:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_25_061118_create_pictures_table', 2),
(5, '2020_05_06_174417_create_contactme_table', 3);

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
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_catagory` enum('profile','merchandise') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `picture_title`, `picture_caption`, `picture_catagory`, `status`, `created_at`, `updated_at`) VALUES
(1, '1587890073.jpg', NULL, 'profile', 1, '2020-04-26 03:04:34', '2020-04-26 03:04:34'),
(2, '1587890090.jpg', NULL, 'profile', 1, '2020-04-26 03:04:51', '2020-04-26 03:04:51'),
(3, '1587890107.jpg', NULL, 'profile', 1, '2020-04-26 03:05:08', '2020-04-26 03:05:08'),
(4, '1587890138.jpg', NULL, 'profile', 1, '2020-04-26 03:05:39', '2020-04-26 03:05:39'),
(5, '1587890151.jpg', NULL, 'profile', 1, '2020-04-26 03:05:52', '2020-04-26 03:05:52'),
(6, '1587890164.jpg', NULL, 'profile', 1, '2020-04-26 03:06:05', '2020-04-26 03:06:05'),
(7, '1587890198.jpg', NULL, 'profile', 1, '2020-04-26 03:06:45', '2020-04-26 03:06:45'),
(8, '1587890218.jpg', NULL, 'merchandise', 1, '2020-04-26 03:06:59', '2020-04-26 03:06:59'),
(9, '1587890228.jpg', NULL, 'merchandise', 1, '2020-04-26 03:07:09', '2020-04-26 03:07:09'),
(10, '1587890239.jpg', NULL, 'merchandise', 1, '2020-04-26 03:07:20', '2020-04-26 03:07:20'),
(11, '1587890250.jpg', NULL, 'merchandise', 1, '2020-04-26 03:07:30', '2020-04-26 03:07:30'),
(12, '1587890260.jpg', NULL, 'merchandise', 1, '2020-04-26 03:07:41', '2020-04-26 03:07:41'),
(13, '1587890273.jpg', NULL, 'merchandise', 1, '2020-04-26 03:07:54', '2020-04-26 03:07:54'),
(14, '1587890285.jpg', NULL, 'merchandise', 1, '2020-04-26 03:08:06', '2020-04-26 03:08:06'),
(15, '1587890300.jpg', NULL, 'merchandise', 1, '2020-04-26 03:08:21', '2020-04-26 03:08:21'),
(16, '1587890316.jpg', NULL, 'merchandise', 1, '2020-04-26 03:08:36', '2020-04-26 03:08:36'),
(17, '1587890326.jpg', NULL, 'merchandise', 1, '2020-04-26 03:08:47', '2020-04-26 03:08:47'),
(18, '1587890335.jpg', NULL, 'merchandise', 1, '2020-04-26 03:08:56', '2020-04-26 03:08:56'),
(19, '1587890343.jpg', NULL, 'merchandise', 1, '2020-04-26 03:09:03', '2020-04-26 03:09:03'),
(20, '1587890356.jpg', NULL, 'merchandise', 1, '2020-04-26 03:09:17', '2020-04-26 03:09:17'),
(21, '1589088718.jpg', 'Bobble head', 'merchandise', 1, '2020-05-10 00:02:00', '2020-05-10 00:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sandip Nandy', 'admin@admin.com', NULL, '$2y$10$jiv3KiJvxd1nLTZUM85WTONL9x4q5WccrAvYgAAFmYyDqvVF2kYS6', NULL, '2020-04-24 12:26:50', '2020-04-24 12:26:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_me`
--
ALTER TABLE `contact_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pictures_picture_title_unique` (`picture_title`);

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
-- AUTO_INCREMENT for table `contact_me`
--
ALTER TABLE `contact_me`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
