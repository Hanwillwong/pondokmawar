-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 03:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pondokmawar`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_12_13_055045_create_product_table', 1),
(11, '2023_12_13_055055_create_riwayatharga_table', 1),
(12, '2024_01_26_025719_create_satuan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Personal Access Token', 'b15e5b72963dc211d8537cee01d1c3707989f71c2d2ead284893b5313760a956', '[\"*\"]', NULL, NULL, '2024-01-25 21:58:35', '2024-01-25 21:58:35'),
(2, 'App\\Models\\User', 2, 'Personal Access Token', 'dbfb39c0abd87151868139480924c692b293417361de9560d90e396c2f20f07b', '[\"*\"]', NULL, NULL, '2024-01-25 23:21:44', '2024-01-25 23:21:44'),
(3, 'App\\Models\\User', 3, 'Personal Access Token', '51e59f45476a91c18657a4028d755a9fca82f4023d6ee0d96a5fb673f849d527', '[\"*\"]', NULL, NULL, '2024-01-25 23:22:02', '2024-01-25 23:22:02'),
(4, 'App\\Models\\User', 1, 'personal-access-token', '67cd1b4b83684b6780da4e804076010b14122f78f50f504fcc28161408c3b0c1', '[\"*\"]', NULL, NULL, '2024-01-25 23:22:06', '2024-01-25 23:22:06'),
(5, 'App\\Models\\User', 2, 'personal-access-token', '96becae9a62f916b84ca7298e9dc116c6e753cd685ed1122e5c044f8bb898e97', '[\"*\"]', NULL, NULL, '2024-01-25 23:22:23', '2024-01-25 23:22:23'),
(6, 'App\\Models\\User', 3, 'personal-access-token', '8f3a31f260503c9299f6df47d92d1594d2e095102fc5f329e5c8747a4068786d', '[\"*\"]', NULL, NULL, '2024-01-26 00:19:11', '2024-01-26 00:19:11'),
(7, 'App\\Models\\User', 1, 'personal-access-token', '667b014385a58cf3e245a75f4132925ddf6e19e5661b5c0e5033ea1f619f42a3', '[\"*\"]', NULL, NULL, '2024-01-26 00:19:20', '2024-01-26 00:19:20'),
(8, 'App\\Models\\User', 1, 'personal-access-token', 'fda84f518dcb32683296210163ac88d8f0efd6742475f18c128fa9d774913b05', '[\"*\"]', NULL, NULL, '2024-01-30 07:14:36', '2024-01-30 07:14:36'),
(9, 'App\\Models\\User', 3, 'personal-access-token', '8442a21163b2f2a8f7f526f5f7e84c4eba559e2683c036c9a61f79baf6243975', '[\"*\"]', NULL, NULL, '2024-01-30 19:37:59', '2024-01-30 19:37:59'),
(10, 'App\\Models\\User', 3, 'personal-access-token', '8300f30592f09c7161b3719687ef7609362097c18ecb28f214f01805670aa78d', '[\"*\"]', NULL, NULL, '2024-01-30 19:38:00', '2024-01-30 19:38:00'),
(11, 'App\\Models\\User', 3, 'personal-access-token', '84db3a8e036d792f63737138f6ce7fd3d229b5cb45feefebaef457c8ecd19e67', '[\"*\"]', NULL, NULL, '2024-01-30 19:41:11', '2024-01-30 19:41:11'),
(12, 'App\\Models\\User', 3, 'personal-access-token', '9593efb3e05114cf81f5bff550cbe6dd3054cdaefda82ec1906a9be1861cbaf4', '[\"*\"]', NULL, NULL, '2024-01-30 19:41:14', '2024-01-30 19:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuanid` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `satuanid`, `nama_barang`, `merk`, `supplier`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 5, 'Plastik PP 12 x 18', 'Bengkoang', 'SBJ', 15000, 18000, '2024-01-25 22:03:22', '2024-01-26 00:18:44'),
(2, 5, 'Plastik PP 10 x 17', 'Bengkoang', 'SBJ', 10000, 14000, '2024-01-26 00:17:38', '2024-01-26 00:17:38'),
(3, 5, 'Plastik PP 10 x 20', 'Bengkoang', 'SBJ', 13000, 16000, '2024-01-26 00:18:00', '2024-01-26 00:18:00'),
(4, 5, 'Plastik PP 10 x 25', 'Bengkoang', 'SBJ', 13000, 16000, '2024-01-26 00:18:27', '2024-01-26 00:18:27'),
(5, 5, 'Plastik PP 12 x 24', 'Bengkoang', 'SBJ', 15000, 18000, '2024-01-26 00:20:11', '2024-01-26 00:20:11'),
(6, 5, 'Plastik PP 18 x 30', 'Bengkoang', 'SBJ', 15000, 18000, '2024-01-26 00:20:40', '2024-01-26 00:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `riwayatharga`
--

CREATE TABLE `riwayatharga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayatharga`
--

INSERT INTO `riwayatharga` (`id`, `barang_id`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 15000, 18000, '2024-01-25 22:03:22', '2024-01-25 22:03:22'),
(2, 2, 10000, 14000, '2024-01-26 00:17:38', '2024-01-26 00:17:38'),
(3, 3, 13000, 16000, '2024-01-26 00:18:00', '2024-01-26 00:18:00'),
(4, 4, 13000, 16000, '2024-01-26 00:18:27', '2024-01-26 00:18:27'),
(5, 5, 15000, 18000, '2024-01-26 00:20:11', '2024-01-26 00:20:11'),
(6, 6, 15000, 18000, '2024-01-26 00:20:40', '2024-01-26 00:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Pcs', 1, '2024-01-25 22:00:06', '2024-01-25 22:00:06'),
(5, 'Bungkus', 0, '2024-01-25 23:13:23', '2024-01-25 23:13:23'),
(7, 'Koli', 0, '2024-01-25 23:16:13', '2024-01-25 23:16:13'),
(8, 'Karung', 0, '2024-01-26 00:21:08', '2024-01-26 00:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'karyawan',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'Owner@gmail.com', 'owner', '$2y$12$exhn.822Os2zXswINwvv8uw1yLhdCwFH4FqloS41ZeXfCXXyz/BGu', NULL, '2024-01-25 21:58:35', '2024-01-25 21:58:35'),
(2, 'Admin', 'admin@gmail.com', 'admin', '$2y$12$NgmPnzYqb2L0udfkQFcpUe3w4dl7b1/FVXmgJWAgxPCMoxfk2tU5O', NULL, '2024-01-25 23:21:44', '2024-01-25 23:22:14'),
(3, 'karyawan', 'karyawan@gmail.com', 'karyawan', '$2y$12$7x7hDUYhGylOqx525ycx1OgmQjZB.TGzSJ67cD0rQFRX/uduSRll.', NULL, '2024-01-25 23:22:02', '2024-01-25 23:22:02');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayatharga`
--
ALTER TABLE `riwayatharga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayatharga_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
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
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `riwayatharga`
--
ALTER TABLE `riwayatharga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayatharga`
--
ALTER TABLE `riwayatharga`
  ADD CONSTRAINT `riwayatharga_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
