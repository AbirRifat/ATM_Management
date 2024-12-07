-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 01:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `city_atm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_number` varchar(191) NOT NULL,
  `balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `account_number`, `balance`, `created_at`, `updated_at`) VALUES
(31, 51, '72224542761', 1073.26, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(32, 52, '28071172302', 9224.82, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(33, 53, '48751095426', 4000.00, '2024-11-29 09:59:53', '2024-11-30 15:11:40'),
(34, 54, '71991731509', 6084.20, '2024-11-29 09:59:53', '2024-11-30 15:11:40'),
(35, 55, '85935240337', 4175.72, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(36, 56, '49849883434', 1360.69, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(37, 57, '56326589756', 3161.21, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(38, 58, '84793523566', 9212.81, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(39, 59, '39129696756', 4117.71, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(40, 60, '21544498972', 9691.84, '2024-11-29 09:59:53', '2024-11-29 09:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_14_125436_create_users_table', 2),
(5, '2024_11_14_125448_create_accounts_table', 2),
(6, '2024_11_14_125458_create_transactions_table', 2),
(7, '2024_11_14_125510_create_pins_table', 2),
(8, '2024_11_17_110651_create_sessions_table', 3),
(9, '2024_11_18_105745_modify_transaction_type_in_transactions_table', 4),
(10, '2024_11_28_214828_create_users_table', 5),
(11, '2024_11_28_214829_create_accounts_table', 6),
(12, '2024_11_28_214829_create_pins_table', 6),
(13, '2024_11_28_214830_create_transactions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pin` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pins`
--

INSERT INTO `pins` (`id`, `user_id`, `pin`, `created_at`, `updated_at`) VALUES
(31, 51, '2790', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(32, 52, '2317', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(33, 53, '3876', '2024-11-29 09:59:53', '2024-11-30 15:39:09'),
(34, 54, '5545', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(35, 55, '3916', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(36, 56, '5292', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(37, 57, '1669', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(38, 58, '0765', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(39, 59, '8534', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(40, 60, '0695', '2024-11-29 09:59:53', '2024-11-29 09:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2de0lUUcr7Idvxw4574LJlvtFOkIbHC6XzYllpcO', 53, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXIvZGFzaGJvYXJkIjt9czo2OiJfdG9rZW4iO3M6NDA6IjQ3N3FlMWxqNngwbnJsbXhFa2dNbDVMc20xVTV0MnVJS0J4NzJJZ1MiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjUzO3M6MTM6InBpbl92YWxpZGF0ZWQiO2I6MTt9', 1732984493),
('aOaJNU4oRe308sKhGWDwBhXQxjro5YsW015EcmkJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUNlazhOZzVjNWJqR2t0NXlsbm9qV0EyVlpJbEloc21hWWlYQ0liaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732984461);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` enum('withdrawal','deposit','transfer','debit','credit') NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_id`, `transaction_type`, `amount`, `created_at`, `updated_at`) VALUES
(71, 31, 'credit', 3177.87, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(72, 31, 'transfer', 1514.05, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(73, 31, 'credit', 4906.31, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(74, 31, 'deposit', 3534.69, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(75, 31, 'deposit', 695.69, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(76, 32, 'deposit', 1407.52, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(77, 32, 'debit', 2351.38, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(78, 32, 'debit', 2990.86, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(79, 32, 'withdrawal', 1083.34, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(80, 32, 'transfer', 4495.71, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(81, 33, 'withdrawal', 1483.70, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(82, 33, 'debit', 2188.96, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(83, 33, 'deposit', 2138.56, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(84, 33, 'withdrawal', 3707.44, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(85, 33, 'debit', 189.07, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(86, 34, 'debit', 4751.59, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(87, 34, 'deposit', 3699.63, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(88, 34, 'transfer', 2013.19, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(89, 34, 'deposit', 1301.87, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(90, 34, 'deposit', 4004.28, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(91, 35, 'credit', 1891.15, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(92, 35, 'transfer', 514.63, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(93, 35, 'credit', 4376.00, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(94, 35, 'withdrawal', 807.59, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(95, 35, 'credit', 1347.13, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(96, 36, 'withdrawal', 3319.16, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(97, 36, 'deposit', 4865.45, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(98, 36, 'deposit', 2929.96, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(99, 36, 'credit', 2198.98, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(100, 36, 'transfer', 4388.66, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(101, 37, 'withdrawal', 1122.88, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(102, 37, 'withdrawal', 3066.49, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(103, 37, 'withdrawal', 72.54, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(104, 37, 'deposit', 3978.09, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(105, 37, 'debit', 2416.37, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(106, 38, 'credit', 3353.08, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(107, 38, 'withdrawal', 803.19, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(108, 38, 'transfer', 595.08, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(109, 38, 'transfer', 2368.85, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(110, 38, 'withdrawal', 2464.19, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(111, 39, 'deposit', 4334.63, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(112, 39, 'credit', 3585.67, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(113, 39, 'deposit', 3141.46, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(114, 39, 'debit', 2088.38, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(115, 39, 'debit', 3458.54, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(116, 40, 'debit', 723.32, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(117, 40, 'debit', 4247.40, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(118, 40, 'deposit', 4533.86, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(119, 40, 'transfer', 4928.82, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(120, 40, 'credit', 3171.73, '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(121, 33, 'withdrawal', 587.99, '2024-11-29 13:57:47', '2024-11-29 13:57:47'),
(122, 33, 'deposit', 500.00, '2024-11-29 14:32:34', '2024-11-29 14:32:34'),
(123, 33, 'debit', 2000.00, '2024-11-30 15:05:24', '2024-11-30 15:05:24'),
(124, 33, 'credit', 2000.00, '2024-11-30 15:05:24', '2024-11-30 15:05:24'),
(125, 33, 'debit', 2000.00, '2024-11-30 15:11:40', '2024-11-30 15:11:40'),
(126, 34, 'credit', 2000.00, '2024-11-30 15:11:40', '2024-11-30 15:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(51, 'Mrs. Ressie Daugherty', 'hmuller@example.net', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(52, 'Rosalia Fay', 'vhirthe@example.com', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(53, 'Prof. Shanel Beahan V', 'flo88@example.com', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(54, 'Dr. Salvatore Nicolas III', 'oberbrunner.ceasar@example.org', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(55, 'Gerard Lakin', 'zpfeffer@example.org', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(56, 'Ms. Marie Kessler I', 'heathcote.kelvin@example.com', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(57, 'Wellington Wisoky', 'becker.gustave@example.com', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(58, 'Ambrose Conn', 'hettinger.michele@example.org', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(59, 'Velva Block II', 'oschoen@example.com', '2024-11-29 09:59:53', '2024-11-29 09:59:53'),
(60, 'Ronaldo Turcotte IV', 'mweber@example.com', '2024-11-29 09:59:53', '2024-11-29 09:59:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_account_number_unique` (`account_number`),
  ADD KEY `accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pins_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_account_id_foreign` (`account_id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pins`
--
ALTER TABLE `pins`
  ADD CONSTRAINT `pins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
