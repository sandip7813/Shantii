-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 08:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_slug`, `category_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'T-Shirts', '34341-t-shirts', 'Shantii Signed T-Shirts', 1, '2020-05-23 23:53:37', '2020-05-23 23:53:37'),
(2, 'Video Book', '47662-video-book', 'Shantii Profile Video', 1, '2020-05-23 23:53:58', '2020-05-23 23:53:58'),
(3, 'Purses', '68349-purses', 'Purse signed by Shantii', 1, '2020-05-23 23:59:18', '2020-05-23 23:59:18'),
(4, 'Shoe', '31375-shoe', 'Shoe signed by Shantii', 1, '2020-05-23 23:59:35', '2020-05-23 23:59:35'),
(5, 'Gift box', '83734-gift-box', 'Shantii Gift Box', 1, '2020-05-23 23:59:54', '2020-05-23 23:59:54'),
(6, 'Bobble head', '25487-bobble-head', 'Bobble head', 1, '2020-05-24 00:00:07', '2020-05-24 00:00:07'),
(7, 'Suits', '68901-suits', 'Shantii Signed Suits', 1, '2020-05-24 00:54:36', '2020-05-24 00:54:36');

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
(5, '2020_05_06_174417_create_contactme_table', 3),
(6, '2020_05_11_163703_create_products_table', 4),
(7, '2020_05_11_171011_create_product_images_table', 5),
(8, '2020_05_16_163603_create_categories_table', 6),
(9, '2020_05_16_165546_add_details_to_categories', 7),
(10, '2020_05_17_060608_create_product_categories_table', 8),
(11, '2020_05_25_164921_create_videos_table', 9);

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
(21, '1589088718.jpg', 'Bobble head', 'merchandise', 1, '2020-05-10 00:02:00', '2020-05-10 00:02:00'),
(22, '1590301272.jpg', 'T-shirts', 'merchandise', 1, '2020-05-24 00:51:13', '2020-05-24 00:51:13'),
(23, '1590301289.jpg', 'Purses', 'merchandise', 1, '2020-05-24 00:51:30', '2020-05-24 00:51:30'),
(24, '1590301396.jpg', 'Shoe', 'merchandise', 1, '2020-05-24 00:53:16', '2020-05-24 00:53:16'),
(25, '1590301412.jpg', 'Bobble Head', 'merchandise', 1, '2020-05-24 00:53:33', '2020-05-24 00:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(6,2) NOT NULL DEFAULT 0.00,
  `items_left` int(11) NOT NULL DEFAULT 0,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_slug`, `product_price`, `items_left`, `product_description`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 'Bobble head', '32481-bobble-head', 20.00, 5, 'Bobble head', 1, '2020-05-24 00:03:36', '2020-05-24 00:03:36'),
(2, 'Gift box', '97743-gift-box', 25.00, 5, 'Shantii Gift box', 1, '2020-05-24 00:04:21', '2020-05-24 00:04:21'),
(3, 'Shoes - White', '11735-shoes-white', 80.00, 5, 'Shoes - White', 1, '2020-05-24 00:06:17', '2020-05-24 00:06:17'),
(4, 'Shoes - Multi-colored', '23456-shoes-multi-colored', 80.00, 5, 'Shoes - Multi-colored', 1, '2020-05-24 00:07:07', '2020-05-24 00:07:07'),
(5, 'Purse - Gray', '41006-purse-gray', 30.00, 5, 'Shantii signed Gray Purse', 1, '2020-05-24 00:41:28', '2020-05-24 00:41:28'),
(6, 'Purse - Orange', '46732-purse-orange', 30.00, 5, 'Shantii signed orange purse', 1, '2020-05-24 00:42:17', '2020-05-24 00:42:17'),
(7, 'Purse - Pink', '31148-purse-pink', 30.00, 5, 'Shantii signed Pink Purse', 1, '2020-05-24 00:42:54', '2020-05-24 00:42:54'),
(8, 'Video book', '65412-video-book', 50.00, 5, 'Shantii Video book', 1, '2020-05-24 00:44:13', '2020-05-24 00:44:13'),
(9, 'T-shirt - White', '89819-t-shirt-white', 20.00, 5, 'Shantii signed white t-shirt', 1, '2020-05-24 00:48:43', '2020-05-24 00:48:43'),
(10, 'T-shirt - Blue', '32828-t-shirt-blue', 20.00, 5, 'Shantii signed blue t-shirt', 1, '2020-05-24 00:49:26', '2020-05-24 00:49:26'),
(11, 'T-shirt - Black', '69357-t-shirt-black', 20.00, 5, 'Shantii signed black t-shirt', 1, '2020-05-24 00:50:21', '2020-05-24 00:50:21'),
(12, 'T-shirt - Pink', '12488-t-shirt-pink', 20.00, 5, 'Shantii Signed pink t-shirt', 1, '2020-05-24 00:50:52', '2020-05-24 00:50:52'),
(13, 'One Piece Suits', '14185-one-piece-suits', 25.00, 5, 'One Piece Suits signed by Shantii', 1, '2020-05-24 00:55:14', '2020-05-24 00:55:14'),
(14, 'Purse - Yellow', '28933-purse-yellow', 30.00, 5, 'Shantii signed yellow Purse', 1, '2020-05-24 09:39:13', '2020-05-24 09:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2020-05-24 00:03:36', '2020-05-24 00:03:36'),
(2, 2, 5, '2020-05-24 00:04:22', '2020-05-24 00:04:22'),
(3, 3, 4, '2020-05-24 00:06:17', '2020-05-24 00:06:17'),
(4, 4, 4, '2020-05-24 00:07:08', '2020-05-24 00:07:08'),
(5, 5, 3, '2020-05-24 00:41:28', '2020-05-24 00:41:28'),
(6, 6, 3, '2020-05-24 00:42:17', '2020-05-24 00:42:17'),
(7, 7, 3, '2020-05-24 00:42:54', '2020-05-24 00:42:54'),
(8, 8, 2, '2020-05-24 00:44:13', '2020-05-24 00:44:13'),
(9, 9, 1, '2020-05-24 00:48:43', '2020-05-24 00:48:43'),
(10, 10, 1, '2020-05-24 00:49:27', '2020-05-24 00:49:27'),
(11, 11, 1, '2020-05-24 00:50:21', '2020-05-24 00:50:21'),
(12, 12, 1, '2020-05-24 00:50:52', '2020-05-24 00:50:52'),
(13, 13, 7, '2020-05-24 00:55:14', '2020-05-24 00:55:14'),
(14, 14, 3, '2020-05-24 09:39:13', '2020-05-24 09:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_title`, `image_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'P_1_1590257235.jpg', 1, '2020-05-23 12:37:16', '2020-05-23 12:37:16'),
(2, 1, 'P_1_1590298416.jpg', 1, '2020-05-24 00:03:37', '2020-05-24 00:03:37'),
(4, 1, 'P_1_1590298417.jpg', 1, '2020-05-24 00:03:37', '2020-05-24 00:03:37'),
(5, 2, 'P_2_1590298462.jpg', 1, '2020-05-24 00:04:22', '2020-05-24 00:04:22'),
(6, 3, 'P_3_1590298577.jpg', 1, '2020-05-24 00:06:17', '2020-05-24 00:06:17'),
(7, 4, 'P_4_1590298628.jpg', 1, '2020-05-24 00:07:08', '2020-05-24 00:07:08'),
(8, 5, 'P_5_1590300688.jpg', 1, '2020-05-24 00:41:28', '2020-05-24 00:41:28'),
(9, 6, 'P_6_1590300737.jpg', 1, '2020-05-24 00:42:17', '2020-05-24 00:42:17'),
(10, 7, 'P_7_1590300774.jpg', 1, '2020-05-24 00:42:55', '2020-05-24 00:42:55'),
(11, 8, 'P_8_1590300853.jpg', 1, '2020-05-24 00:44:13', '2020-05-24 00:44:13'),
(12, 8, 'P_8_1590300853.jpg', 1, '2020-05-24 00:44:13', '2020-05-24 00:44:13'),
(13, 9, 'P_9_1590301123.jpg', 1, '2020-05-24 00:48:44', '2020-05-24 00:48:44'),
(14, 10, 'P_10_1590301167.jpg', 1, '2020-05-24 00:49:27', '2020-05-24 00:49:27'),
(15, 11, 'P_11_1590301221.jpg', 1, '2020-05-24 00:50:23', '2020-05-24 00:50:23'),
(16, 12, 'P_12_1590301252.jpg', 1, '2020-05-24 00:50:53', '2020-05-24 00:50:53'),
(17, 13, 'P_13_1590301514.jpg', 1, '2020-05-24 00:55:14', '2020-05-24 00:55:14'),
(18, 14, 'P_14_1590332953.jpg', 1, '2020-05-24 09:39:14', '2020-05-24 09:39:14');

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
(1, 'Sandip Nandy', 'admin@admin.com', NULL, '$2y$10$jiv3KiJvxd1nLTZUM85WTONL9x4q5WccrAvYgAAFmYyDqvVF2kYS6', 'RY5nE8MHSbej5S6TUnecnMvxQ41gGjZP8vWiC9BkHrcfrP4CEDarLgvO7oAt', '2020-04-24 12:26:50', '2020-04-24 12:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_link`, `video_title`, `video_slug`, `video_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/watch?v=DtBB0osTrc0', 'Shantii Talks about her “Ultimate Fan Gift Box”', '48831-shantii-talks-about-her-ultimate-fan-gift-box', 'Shantii talks about her $15 EP and her “Ultimate Fan Gift Box” \r\n\r\nFollow Shantii on all social media: @Shantii823\r\nwww.shantii823.com', 1, NULL, NULL),
(2, 'https://www.youtube.com/watch?v=tBl-ody33Dg', '[Baddies Having Goals] BHG Shantii - Rule One [OFFICIAL VIDEO]', '81919-baddies-having-goals-bhg-shantii-rule-one-official-video', '@BHGShantii\r\n\r\nShot By @JSwaqqGotHellyG', 1, NULL, NULL),
(3, 'https://www.youtube.com/watch?v=slUak01xOt8', 'Shantii Ft. Molly Brazy- Rule One 2.0', '42825-shantii-ft-molly-brazy-rule-one-20', '@Shantii823 / @only1klumanagement\r\n\r\n@Mollybrazy\r\n\r\nDirected by: @byond_ent', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_slug_unique` (`category_slug`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_slug_unique` (`product_slug`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_video_slug_unique` (`video_slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `fk_cagegories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
