-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 11:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(23, '1', '1', '4', '2022-10-23 06:10:05', '2022-10-24 00:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(14, 'Mobile', 'Mobile', 'Mobile phones brands', 0, 0, '1665342455,jpg', 'good Electronics,Elctronics', 'All types Elctronics Items.', 'All types elctronics Items.', '2022-10-10 01:58:46', '2022-10-10 02:07:35'),
(16, 'Tshirt', 'clothes', 'sssssssssssssssssssss', 1, 1, '1665351894,jpg', 'good Electronics,Elctronics', 'All types Elctronics Items.', 'All types elctronics Items.', '2022-10-10 04:44:54', '2022-10-10 04:44:54'),
(18, 'Elctronics', 'Elctronics', 'xxxxxxxxxxxxxxxxxxxxxxxx', 1, 1, '1665352159,jpg', 'good Electronics,Elctronics', 'All types Elctronics Items.', 'All types elctronics Items.', '2022-10-10 04:49:19', '2022-10-10 04:49:19'),
(20, 'asd', 'clothes', 'ffffffffffffffffffff', 1, 1, '1665352278,jpg', 'good Electronics,Elctronics', 'All types Elctronics Items.', 'All types elctronics Items.', '2022-10-10 04:51:18', '2022-10-10 04:51:18'),
(21, 'Toys', 'Hanye', 'Hanye Build and Play Building Blocks Toy for Kids, 14 Pieces - Multi', 1, 1, '1666546822,jpg', 'Hanye', 'Hanye Build and Play Building Blocks Toy for Kids, 14 Pieces - Multi', 'Hanye Build and Play Building Blocks Toy for Kids, 14 Pieces - Multi', '2022-10-24 00:40:22', '2022-10-24 00:40:22'),
(22, 'Sports Equipment', 'sports', 'LEGO THE LEGO MOVIE 2 Battle-Ready Batman and MetalBeard 70836', 1, 1, '1666547504,jpg', 'Sports', 'LEGO THE LEGO MOVIE 2 Battle-Ready Batman and MetalBeard 70836', 'LEGO THE LEGO MOVIE 2 Battle-Ready Batman and MetalBeard 70836', '2022-10-24 00:51:44', '2022-10-24 00:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `fname`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `pincode`, `status`, `message`, `tracking_no`, `totalPrice`, `created_at`, `updated_at`) VALUES
(19, 1, 'ahmed', 'mohamad', '0118700584', 'sohag', 'sohag', 'maragha', 'africa', 'asdfgdsasd', 1, NULL, 'Doaa2739', NULL, '2022-10-17 01:50:11', '2022-10-18 07:54:53'),
(20, 1, 'ahmed', 'mohamad', '0118700584', 'sohag', 'sohag', 'maragha', 'africa', 'asdfgdsasd', 0, NULL, 'Doaa1401', NULL, '2022-10-17 01:52:26', '2022-10-17 01:52:26'),
(21, 1, 'doaa', 'mohamad', '0118700584', 'sohag', 'sohag', 'maragha', 'africa', 'asdfgdsasd', 0, NULL, 'Doaa7122', NULL, '2022-10-17 02:20:30', '2022-10-17 02:20:30'),
(22, 1, 'amira', 'mohamad', '0118700584', 'sohag', 'sohag', 'maragha', 'africa', 'asdfgdsasd', 0, NULL, 'Doaa6874', '6000', '2022-10-17 21:55:53', '2022-10-17 21:55:53'),
(23, 1, 'ahmed', 'mohamad', '0118700584', 'sohag', 'sohag', 'maragha', 'africa', 'asdfgdsasd', 0, NULL, 'Doaa7960', '12000', '2022-10-19 07:38:13', '2022-10-19 07:38:13'),
(24, 1, 'ahmed', 'mohamad', '0118700584', 'sohag', 'sohag', 'maragha', 'africa', 'asdfgdsasd', 0, NULL, 'Doaa9496', '24000', '2022-10-23 01:38:51', '2022-10-23 01:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `prod_id`, `comment`, `created_at`, `updated_at`) VALUES
(2, '1', '2', 'doaa ipsum dolor sit amet consectetur adipisicing elit. Ipsa reprehenderit beatae inventore vel, rem quidem blanditiis perspiciatis temporibus deserunt, nihil aspernatur iste similique obcaecati neque voluptas molestias possimus tenetur mollitia.', '2022-10-23 01:20:57', '2022-10-23 05:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_09_123751_create_categories_table', 2),
(6, '2022_10_09_222118_create_products_table', 3),
(7, '2022_10_13_114153_create_carts_table', 4),
(8, '2022_10_15_180440_create_checkouts_table', 5),
(9, '2022_10_16_151922_create_orderitems_table', 5),
(10, '2022_10_18_173523_create_wishlists_table', 6),
(11, '2022_10_21_220740_create_ratings_table', 7),
(12, '2022_10_22_164005_create_comments_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(33, '19', '1', '1', '6000', '2022-10-17 01:50:11', '2022-10-17 01:50:11'),
(34, '19', '2', '1', '6000', '2022-10-17 01:50:11', '2022-10-17 01:50:11'),
(35, '20', '2', '1', '6000', '2022-10-17 01:52:26', '2022-10-17 01:52:26'),
(36, '21', '2', '4', '6000', '2022-10-17 02:20:30', '2022-10-17 02:20:30'),
(37, '21', '1', '1', '6000', '2022-10-17 02:20:30', '2022-10-17 02:20:30'),
(38, '22', '2', '1', '6000', '2022-10-17 21:55:53', '2022-10-17 21:55:53'),
(39, '23', '2', '2', '6000', '2022-10-19 07:38:13', '2022-10-19 07:38:13'),
(40, '24', '1', '3', '6000', '2022-10-23 01:38:51', '2022-10-23 01:38:51'),
(41, '24', '2', '1', '6000', '2022-10-23 01:38:51', '2022-10-23 01:38:51');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catId` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_Price` double(8,2) NOT NULL,
  `selling_price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catId`, `name`, `small_description`, `description`, `original_Price`, `selling_price`, `image`, `qty`, `taxes`, `status`, `trending`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 18, 'TV Samsung', 'HD Television', 'HD Television HD Television', 5000.00, 6000.00, '1665490216,jpg', '6', '45', 1, 1, 'HD Television', 'HD Television', 'HD Television', '2022-10-11 19:10:16', '2022-10-23 01:38:51'),
(2, 16, 'Tshirt', 'Tshirt', 'Tshirt', 5000.00, 6000.00, '1665490349,jpg', '1', '45', 1, 1, 'Tshirt', 'Tshirt', 'Tshirt', '2022-10-11 19:12:29', '2022-10-23 01:38:51'),
(4, 21, 'Generic', 'Vehicle Construction Equipment', 'Vehicle Construction Equipment Vehicle Construction Equipment', 35.00, 36.00, '1666546959,jpg', '55', '45', 1, 1, 'Vehicle', 'Vehicle Construction Equipment', 'Vehicle Construction Equipment', '2022-10-24 00:42:39', '2022-10-24 00:42:39'),
(5, 21, 'LEGO', 'LEGO 10899 DUPLO Disney Frozen Ice Castle Princess Elsa and Anna', 'LEGO 10899 DUPLO Disney Frozen Ice Castle Princess Elsa and Anna LEGO 10899 DUPLO Disney Frozen Ice Castle Princess Elsa and Anna', 12.00, 15.00, '1666547092,jpg', '12', '45', 1, 1, 'LEGO', 'LEGO 10899 DUPLO Disney Frozen Ice Castle Princess Elsa and Anna', 'LEGO 10899 DUPLO Disney Frozen Ice Castle Princess Elsa and Anna', '2022-10-24 00:44:52', '2022-10-24 00:44:52'),
(6, 21, 'Generic', 'Piece Funny Bricks Gear Building Toy Set For Kids', 'Piece Funny Bricks Gear Building Toy Set For Kids Piece Funny Bricks Gear Building Toy Set For Kids', 130.00, 135.00, '1666547170,jpg', '33', '45', 1, 1, 'Generic', 'Piece Funny Bricks Gear Building Toy Set For Kids', 'Piece Funny Bricks Gear Building Toy Set For Kids', '2022-10-24 00:46:10', '2022-10-24 00:46:10'),
(7, 21, 'LEGO', 'LEGO THE LEGO MOVIE 2 Battle-Ready Batman and MetalBeard 70836', 'LEGO THE LEGO MOVIE 2 Battle-Ready Batman and MetalBeard 70836 LEGO THE LEGO MOVIE 2 Battle-Ready Batman and MetalBeard 70836', 40.00, 44.00, '1666547281,jpg', '33', '45', 1, 1, 'LEGO', 'LEGO THE LEGO MOVIE 2 Battle-Ready Batman and MetalBeard 70836', 'LEGO THE LEGO MOVIE 2 Battle-Ready Batman and MetalBeard 70836', '2022-10-24 00:48:01', '2022-10-24 00:48:01'),
(8, 22, 'Soccer Ball - Size 5', 'Comes in a good packaging', 'Comes in a good packaging\r\nDesigned to perfection\r\nCompact construction\r\nPacked with features', 300.00, 320.00, '1666547632,jpg', '22', '45', 1, 1, 'Soccer Ball - Size 5', 'Soccer Ball - Size 5', 'Soccer Ball - Size 5', '2022-10-24 00:53:52', '2022-10-24 00:53:52'),
(9, 22, 'Football Goal-keeper Gloves', 'Football Goal-keeper Gloves, Size 5 - Orange', 'Football Goal-keeper Gloves, Size 5 - Orange Football Goal-keeper Gloves, Size 5 - Orange', 155.00, 160.00, '1666547737,jpg', '12', '45', 1, 1, 'Football Goal-keeper Gloves, Size 5 - Orange', 'Football Goal-keeper Gloves, Size 5 - Orange', 'Football Goal-keeper Gloves, Size 5 - Orange', '2022-10-24 00:55:37', '2022-10-24 00:55:37'),
(10, 22, 'Football RD', 'Football RD (A1),Soccer Ball,made with high grade PVC, Size 5 -black', 'Football RD (A1),Soccer Ball,made with high grade PVC, Size 5 -black Football RD (A1),Soccer Ball,made with high grade PVC, Size 5 -black', 340.00, 345.00, '1666547877,jpg', '32', '45', 1, 1, 'Football RD', 'Football RD (A1),Soccer Ball,made with high grade PVC, Size 5 -black', 'Football RD (A1),Soccer Ball,made with high grade PVC, Size 5 -black', '2022-10-24 00:57:57', '2022-10-24 00:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numStars` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `numStars`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '4', '2022-10-22 06:09:52', '2022-10-22 19:38:37'),
(3, '1', '2', '3', '2022-10-22 22:10:50', '2022-10-22 22:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'doaa', 'asd@me.com', NULL, '$2y$10$CSf4sW0CNAb/8XQlg/vH4OmRsWmlDfCbUzt58khXzmPLaiCXNO9Wu', 1, NULL, '2022-10-09 16:00:10', '2022-10-09 16:00:10'),
(2, 'asd', 'zxc@me.com', NULL, '$2y$10$Ein642eyzXLvvXjDN8a53evaGumV.9OP20/EgvfS24G7kVucdYJNC', 0, NULL, '2022-10-09 17:07:20', '2022-10-09 17:07:20'),
(3, 'ahmed', 'qwe@me.com', NULL, '$2y$10$NI0Z2hXmdlMORfrHk3fYl.NXYmKfmoVhIRIAryGci5S7K42qWCVO6', 0, NULL, '2022-10-23 10:11:01', '2022-10-23 10:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
