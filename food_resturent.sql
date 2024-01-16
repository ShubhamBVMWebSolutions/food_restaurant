-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2024 at 12:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_resturent`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `food__id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `food__id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2024-01-10 01:32:52', '2024-01-10 01:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `cheifs`
--

CREATE TABLE `cheifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `coupon_type` varchar(255) NOT NULL,
  `coupon_discription` varchar(255) NOT NULL,
  `coupon_value` varchar(255) NOT NULL,
  `coupon_valid_from` varchar(255) NOT NULL,
  `coupon_valid_till` varchar(255) NOT NULL,
  `cart_value` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `coupon_type`, `coupon_discription`, `coupon_value`, `coupon_valid_from`, `coupon_valid_till`, `cart_value`, `coupon_code`, `created_at`, `updated_at`) VALUES
(1, 'Dewali', 'percent', 'Get Flat 5% off', '5', '2024-01-12', '2024-03-14', '5000', '74DEWALI89', '2024-01-05 04:47:48', '2024-01-09 02:15:30'),
(2, 'Holi', 'fixed_price', 'Get  instant $5 Off', '100', '2024-03-03', '2024-03-28', '500', '95HOLI22', '2024-01-05 06:40:05', '2024-01-09 02:15:36'),
(3, 'Shubham', 'percent', 'Get Flat 7% off', '7', '2024-03-19', '2024-03-29', '35', '60SHUBHAM72', '2024-01-09 01:45:22', '2024-01-09 04:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` tinyint(4) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `ingrediants` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`ingrediants`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `image`, `name`, `category`, `price`, `ingrediants`, `created_at`, `updated_at`) VALUES
(1, 'food_images/1703591107.png', 'Magnam Tiste', 3, 5.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:15:07', '2023-12-26 06:15:07'),
(2, 'food_images/1703591835.png', 'Aut Luia', 3, 14.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerad\"]', '2023-12-26 06:27:15', '2023-12-26 06:27:15'),
(3, 'food_images/1703591974.png', 'Est Eligendi', 3, 8.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:29:34', '2023-12-26 06:29:34'),
(4, 'food_images/1703592039.png', 'Eos Luibusdam', 3, 12.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:30:39', '2023-12-26 06:30:39'),
(5, 'food_images/1703592097.png', 'Eos Luibusdam', 3, 12.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:31:37', '2023-12-26 06:31:37'),
(6, 'food_images/1703592163.png', 'Laboriosam Direva', 3, 9.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:32:43', '2023-12-26 06:32:43'),
(7, 'food_images/1703591107.png', 'Magnam Tiste', 1, 5.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:15:07', '2023-12-26 06:15:07'),
(8, 'food_images/1703591835.png', 'Aut Luia', 1, 14.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerad\"]', '2023-12-26 06:27:15', '2023-12-26 06:27:15'),
(9, 'food_images/1703591974.png', 'Est Eligendi', 1, 8.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:29:34', '2023-12-26 06:29:34'),
(10, 'food_images/1703592039.png', 'Eos Luibusdam', 1, 12.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:30:39', '2023-12-26 06:30:39'),
(11, 'food_images/1703592097.png', 'Eos Luibusdam', 1, 12.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:31:37', '2023-12-26 06:31:37'),
(12, 'food_images/1703592163.png', 'Laboriosam Direva', 1, 9.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:32:43', '2023-12-26 06:32:43'),
(13, 'food_images/1703591107.png', 'Magnam Tiste', 2, 5.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:15:07', '2023-12-26 06:15:07'),
(14, 'food_images/1703591835.png', 'Aut Luia', 2, 14.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerad\"]', '2023-12-26 06:27:15', '2023-12-26 06:27:15'),
(15, 'food_images/1703591974.png', 'Est Eligendi', 2, 8.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:29:34', '2023-12-26 06:29:34'),
(16, 'food_images/1703592039.png', 'Eos Luibusdam', 2, 12.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:30:39', '2023-12-26 06:30:39'),
(17, 'food_images/1703592097.png', 'Eos Luibusdam', 2, 12.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:31:37', '2023-12-26 06:31:37'),
(18, 'food_images/1703592163.png', 'Laboriosam Direva', 2, 9.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:32:43', '2023-12-26 06:32:43'),
(19, 'food_images/1703591107.png', 'Magnam Tiste', 4, 5.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:15:07', '2023-12-26 06:15:07'),
(20, 'food_images/1703591835.png', 'Aut Luia', 4, 14.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerad\"]', '2023-12-26 06:27:15', '2023-12-26 06:27:15'),
(21, 'food_images/1703591974.png', 'Est Eligendi', 4, 8.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:29:34', '2023-12-26 06:29:34'),
(22, 'food_images/1703592039.png', 'Eos Luibusdam', 4, 12.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:30:39', '2023-12-26 06:30:39'),
(23, 'food_images/1703592097.png', 'Eos Luibusdam', 4, 12.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:31:37', '2023-12-26 06:31:37'),
(24, 'food_images/1703592163.png', 'Laboriosam Direva', 4, 9.95, '[\"Lorem\",\"deren\",\"trataro\",\"filede\",\"nerada\"]', '2023-12-26 06:32:43', '2023-12-26 06:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Lunch', '2023-12-26 01:50:49', '2023-12-26 01:50:49'),
(2, 'Breakfast', '2023-12-26 02:02:29', '2023-12-26 02:02:29'),
(3, 'Starters', '2023-12-26 09:10:52', '2023-12-26 09:10:52'),
(4, 'Dinner', '2023-12-26 09:10:52', '2023-12-26 09:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `ingredient`, `created_at`, `updated_at`) VALUES
(1, 'Soya', '2023-12-27 00:01:29', '2023-12-27 00:01:29'),
(2, 'Bread', '2023-12-27 00:01:49', '2023-12-27 00:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_22_090237_create_user_reviews_table', 2),
(8, '2023_12_26_043423_create_profiles_table', 3),
(9, '2023_12_26_070046_create_food_categories_table', 4),
(10, '2023_12_26_093515_create_ingredients_table', 5),
(12, '2023_12_26_095456_create_food_table', 6),
(14, '2023_12_27_060238_create_cheifs_table', 7),
(15, '2024_01_03_065345_add_country_code_to_profiles_table', 7),
(16, '2024_01_04_110740_create_payments_table', 8),
(17, '2024_01_05_090515_create_coupons_table', 9),
(18, '2024_01_08_050445_create_carts_table', 10),
(19, '2024_01_09_070053_add_coupon_discription_to_coupons_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'PAYID-MWLJ6PA0NU38452MV032725D', '69EKLBQXHEN9U', 'sb-7in2p28181073@personal.example.com', 35.70, 'USD', 'approved', '2024-01-04 06:36:30', '2024-01-04 06:36:30'),
(2, 'PAYID-MWONYQI4EX26706FN312301D', '69EKLBQXHEN9U', 'sb-7in2p28181073@personal.example.com', 55.72, 'USD', 'approved', '2024-01-09 00:11:24', '2024-01-09 00:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `Address_1` varchar(255) DEFAULT NULL,
  `Address_2` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `profile_pic`, `last_name`, `country_code`, `contact_number`, `Address_1`, `Address_2`, `zip_code`, `state`, `area`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, 'profile_images/1703567481.png', 'Saxena', NULL, '9858754254', '922 Shran Kutter', 'JTN Marg', '302022', 'Rajasthan', 'Sitapura', 'India', '2023-12-25 23:39:38', '2023-12-25 23:47:06'),
(2, 4, 'profile_images/1703568540.png', 'Rajavat', NULL, '98458 54875', NULL, 'Jaipur Municipal Corporation', '302001', 'Rajasthan', 'Jaipur Tehsil', 'India', '2023-12-25 23:54:56', '2024-01-03 06:46:35'),
(3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-27 00:51:05', '2023-12-27 00:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` varchar(255) NOT NULL DEFAULT '2' COMMENT '1 => Admin ,2 => user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shubham', 's@gmail.com', NULL, '$2y$12$PaCAaTrH1DB9xW9ZXiAnBuD14VhKn1RTyRGXofsg9afzsDt20JdFq', '2', NULL, '2023-12-22 01:09:24', '2023-12-22 01:09:24'),
(4, 'Ravi', 'ravi@gmail.com', NULL, '$2y$12$4BVSl3FGPmZ2GeczdmWd/OvREm.UArZ3AyPtbN3zK/JUpgpdSs5Oq', '2', NULL, '2023-12-25 23:54:56', '2023-12-25 23:54:56'),
(5, 'Admin', 'admin@gmail.com', NULL, '$2y$12$LERbNLyMWfa0gNjAw2R24usx8TEf7jB./AIGKGfispltopHv8Io9a', '1', NULL, '2023-12-27 00:51:05', '2023-12-27 00:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE `user_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `reviews` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`reviews`)),
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_reviews`
--

INSERT INTO `user_reviews` (`id`, `user_id`, `reviews`, `remarks`, `created_at`, `updated_at`) VALUES
(1, '1', '{\"coustomer_support_rate\":\"4\",\"deliver_rate\":\"2\",\"Quality_rate\":\"5\"}', 'First Review', '2023-12-22 04:12:40', '2023-12-22 04:12:40'),
(4, '4', '{\"coustomer_support_rate\":\"3\",\"deliver_rate\":\"4\",\"Quality_rate\":\"4\"}', 'Second Review', '2023-12-26 00:06:51', '2023-12-26 00:06:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheifs`
--
ALTER TABLE `cheifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cheifs`
--
ALTER TABLE `cheifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
