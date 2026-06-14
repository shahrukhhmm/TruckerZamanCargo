-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2026 at 08:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trucker`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `date`, `contact`, `reference`, `created_at`, `updated_at`) VALUES
(2, 'Client 16', '2024-10-04', '034512387897', 'reference for the client', '2024-10-04 00:39:04', '2025-08-23 00:27:48'),
(5, 'sdas', '2025-08-21', '034512387897', 'reference for the client', '2025-08-23 00:28:19', NULL),
(6, 'asd', '2025-08-15', '034512387897', 'reference for the client', '2025-08-23 00:32:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `details`, `contact`, `location`, `created_at`, `updated_at`) VALUES
(1, 'name', 'details asjd aspo', '122345', 'near here and theresa', '2024-09-23 23:45:31', '2024-09-24 02:09:07'),
(2, 'customer', 'deatil of the second', '0345216598', 'near here and there', '2024-09-25 23:07:07', '2024-09-30 05:06:49'),
(3, 'hassan', 'detail of the customer', '034156579asd', 'near here and there', '2024-09-28 07:54:15', '2024-09-30 05:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `container_number` varchar(255) NOT NULL,
  `date_of_loading` varchar(255) NOT NULL,
  `date_of_shipping` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `shipping_mark` varchar(255) NOT NULL,
  `deals_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`deals_json`)),
  `total_amount` varchar(225) DEFAULT NULL,
  `date` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT 'Pending',
  `paid_amount` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `customer_id`, `container_number`, `date_of_loading`, `date_of_shipping`, `place`, `shipping_mark`, `deals_json`, `total_amount`, `date`, `status`, `paid_amount`, `created_at`, `updated_at`) VALUES
(2, '2', 'c2321', '2024-10-03', '2024-10-11', 'rwp', 'zm', '[{\"item_name\":\"egg\",\"ctn\":\"5\",\"quantity\":\"5\",\"total_quantity\":25,\"weight\":\"5\",\"total_weight\":25,\"cbm\":\"0.1\",\"total_cbm\":0.5,\"rate_type\":\"KG\",\"rate\":\"200\",\"amount\":5000},{\"item_name\":\"dog\",\"ctn\":\"10\",\"quantity\":\"10\",\"total_quantity\":100,\"weight\":\"7\",\"total_weight\":70,\"cbm\":\"0.2\",\"total_cbm\":2,\"rate_type\":\"CBM\",\"rate\":\"1000\",\"amount\":2000}]', '7000', '2024-10-03', 'Partialy Paid', '200', '2024-10-03 06:02:25', '2024-10-03 23:34:22'),
(3, '1', 'c2321', '2024-10-09', '2024-10-09', 'rwp', 'zm', '[{\"item_name\":\"egg\",\"ctn\":5,\"quantity\":12,\"total_quantity\":60,\"weight\":1.5,\"total_weight\":7.5,\"cbm\":0.1,\"total_cbm\":0.5,\"rate_type\":\"KG\",\"rate\":100,\"amount\":750}]', '750', '2024-10-09', 'Pending', '500', '2024-10-08 23:15:59', '2024-11-09 00:52:26'),
(4, '1', 'c2321', '2025-06-29 00:00:00', '2025-06-29 00:00:00', 'rwp', 'zm', '\"[{\\\"item_name\\\":\\\"asd\\\",\\\"ctn\\\":10,\\\"quantity\\\":5,\\\"total_quantity\\\":50,\\\"weight\\\":0,\\\"total_weight\\\":0,\\\"cbm\\\":0,\\\"total_cbm\\\":0,\\\"rate_type\\\":\\\"PC\\\",\\\"rate\\\":10,\\\"amount\\\":500}]\"', '500', '2025-06-29 00:00:00', 'Pending', NULL, '2025-06-29 10:36:37', '2025-06-29 10:36:37'),
(5, '1', 'c2321', '2025-06-29 00:00:00', '2025-06-29 00:00:00', 'rwp', 'zm', '\"[{\\\"item_name\\\":\\\"egg\\\",\\\"ctn\\\":2,\\\"quantity\\\":3,\\\"total_quantity\\\":6,\\\"weight\\\":10,\\\"total_weight\\\":20,\\\"cbm\\\":0.1,\\\"total_cbm\\\":0.2,\\\"rate_type\\\":\\\"PC\\\",\\\"rate\\\":100,\\\"amount\\\":600}]\"', '600', '2025-06-29 00:00:00', 'Pending', NULL, '2025-08-16 04:15:48', '2025-08-16 04:15:48'),
(6, '1', 'c2321', '2025-06-29 00:00:00', '2025-06-29 00:00:00', 'rwp', 'zm', '\"[{\\\"item_name\\\":\\\"egg\\\",\\\"ctn\\\":2,\\\"quantity\\\":3,\\\"total_quantity\\\":6,\\\"weight\\\":11,\\\"total_weight\\\":22,\\\"cbm\\\":2,\\\"total_cbm\\\":4,\\\"rate_type\\\":\\\"PC\\\",\\\"rate\\\":100,\\\"amount\\\":600},{\\\"item_name\\\":\\\"dog\\\",\\\"ctn\\\":3,\\\"quantity\\\":2,\\\"total_quantity\\\":6,\\\"weight\\\":1,\\\"total_weight\\\":3,\\\"cbm\\\":3,\\\"total_cbm\\\":9,\\\"rate_type\\\":\\\"KG\\\",\\\"rate\\\":100,\\\"amount\\\":300}]\"', '900', '2025-06-29 00:00:00', 'Pending', NULL, '2025-08-16 04:24:38', '2025-08-16 04:24:38'),
(7, '1', 'c2321', '2025-06-29 00:00:00', '2025-06-29 00:00:00', 'rwp', 'zm', '\"[{\\\"item_name\\\":\\\"pig\\\",\\\"ctn\\\":\\\"1\\\",\\\"quantity\\\":\\\"0\\\",\\\"total_quantity\\\":0,\\\"weight\\\":\\\"10\\\",\\\"total_weight\\\":10,\\\"cbm\\\":\\\"0\\\",\\\"total_cbm\\\":0,\\\"rate_type\\\":\\\"KG\\\",\\\"rate\\\":\\\"100\\\",\\\"amount\\\":1000}]\"', '1000', '2025-06-29 00:00:00', 'Pending', '300', '2025-08-16 04:29:51', '2025-08-23 01:36:07'),
(10, '1', 'c2321', '2025-06-29 00:00:00', '2025-06-29 00:00:00', 'rwp', 'zm', '\"[{\\\"item_name\\\":\\\"egg\\\",\\\"ctn\\\":\\\"2.5\\\",\\\"quantity\\\":\\\"5.3\\\",\\\"total_quantity\\\":13.25,\\\"weight\\\":\\\"0\\\",\\\"total_weight\\\":0,\\\"cbm\\\":\\\"0\\\",\\\"total_cbm\\\":0,\\\"rate_type\\\":\\\"CBM\\\",\\\"rate\\\":\\\"10\\\",\\\"amount\\\":0}]\"', '0', '2025-06-29 00:00:00', 'Pending', '2000', '2025-08-23 03:37:35', '2025-08-24 09:30:23');

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
-- Table structure for table `ledger_reports`
--

CREATE TABLE `ledger_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledger_reports`
--

INSERT INTO `ledger_reports` (`id`, `client_id`, `status`, `amount`, `detail`, `date`, `created_at`, `updated_at`) VALUES
(1, '2', 'Paid', '100', 'detail', '2024-10-04', '2024-10-04 01:08:59', '2024-10-04 01:23:51'),
(2, '2', 'Used', '100', 'detail', '2024-10-04', '2024-10-04 02:09:13', NULL),
(8, '6', 'Paid', '500', 'detail', '2025-08-13', '2025-08-24 06:44:02', NULL),
(9, '6', 'Used', '1000', 'port', '2025-08-24', '2025-08-24 06:44:23', NULL),
(10, '6', 'Paid', '2000', 'detail', '2025-08-24', '2025-08-24 08:48:03', '2025-08-24 09:14:28'),
(11, '6', 'Paid', '600', 'detail', '2025-08-24', '2025-08-24 09:17:31', '2025-08-24 09:29:19');

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
(5, '2024_08_12_084643_create_branches_table', 2),
(6, '2024_08_15_150839_create_inventories_table', 3),
(7, '2024_08_17_053536_create_inventory_categories_table', 4),
(8, '2024_08_19_045220_create_sales_table', 5),
(9, '2024_08_19_045434_create_sale_items_table', 5),
(10, '2024_08_20_044144_create_user_attandances_table', 6),
(11, '2024_08_22_053117_create_zakat_table', 7),
(12, '2024_08_22_060154_create_zakats_table', 8),
(13, '2024_09_23_135959_create_customers_table', 9),
(15, '2024_09_23_154514_create_transections_table', 9),
(17, '2024_09_23_140329_create_deals_table', 10),
(18, '2024_10_04_052004_create_clients_table', 11),
(20, '2024_10_04_054153_create_ledger_reports_table', 12);

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
-- Table structure for table `transections`
--

CREATE TABLE `transections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `deal_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transections`
--

INSERT INTO `transections` (`id`, `customer_id`, `deal_id`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1245', '2024-10-02', '2024-10-02 00:14:07', NULL),
(2, '2', '2', '200', '2024-10-04', '2024-10-03 23:34:22', NULL),
(4, '1', '3', '500', '2024-11-07', '2024-11-09 00:51:38', NULL),
(5, '1', '7', '300', '2025-08-22', '2025-08-23 00:51:49', NULL),
(6, '1', '10', '200', '2025-08-24', '2025-08-24 09:30:23', '2025-08-24 09:30:40');

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
  `role_id` varchar(225) DEFAULT NULL,
  `branch_id` varchar(225) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `branch_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 'superadmin@gmail.com', NULL, '$2y$12$h4QKfa5kxhP/hU8of/6j7OV8RlvgXNpCPY5qUTS10bn.D5FFQb9F6', '1', NULL, NULL, '2024-08-07 04:17:41', '2024-08-13 07:10:40'),
(5, 'admin', 'admin2@gmail.com', NULL, '$2y$12$oq/9nBjIFPmJZ/KbuQzdluG4WwGamkuQUiKgaa5hIxYgbha/ppmHa', '2', '2', NULL, '2024-08-07 04:26:04', '2024-08-12 03:45:09'),
(6, 'shahrukh', 'shahrukh@gmail.com', NULL, '$2y$12$O1pEmRqn9t5wMkfujZLmfujnY7go3Jl1JxSSc/HJghyvSuLdLurA6', '2', '2', NULL, '2024-08-09 01:56:57', '2024-08-13 07:15:13'),
(7, 'tets', 'haris@gmail.com', NULL, '$2y$12$L9sXdiS0PdPeA4y2JsFN5ehn0du/Eto7/G2MltLNZccnMQhg.cdfm', '2', '2', NULL, '2024-08-13 07:46:53', NULL),
(8, 'asd', 'asd@gmail.com', NULL, '$2y$12$6exYahh37fMcFn9SWYVHi.P2mAOi2pWQUzrUWYTeiQwW9MF0Z1Hjy', '2', '2', NULL, '2024-08-16 02:18:54', NULL),
(11, 'user2', 'user2@gmail.com', NULL, '$2y$12$j6BIRl5Z.Y9aQ6bvvVWd4O7Pmj8qbgutkw.pkNA5VtNty0uPGHjOG', '2', '3', NULL, '2024-08-23 11:00:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ledger_reports`
--
ALTER TABLE `ledger_reports`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transections`
--
ALTER TABLE `transections`
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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger_reports`
--
ALTER TABLE `ledger_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transections`
--
ALTER TABLE `transections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
