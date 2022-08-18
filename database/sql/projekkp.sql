-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 08:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', 'superadmin', NULL, '$2y$10$B2Cc9n33K4GPPrUnPsvHT.Huvr2PNdQttzFdZkTPAgpRStc8gEp86', 'kOcg7BMzLCbDhF8oX3b4NEaMPzw7pPuT9JeJ7BOrQ6q112tYM1bCkz2mqM7r', '2022-08-12 08:15:58', '2022-08-12 08:15:58'),
(2, 'Deny Rizky Rivaldi', 'denyrizky9@gmail.com', 'Meiko', NULL, '$2y$10$pTTukT.t0TIc1XIehy0kPO1.HUBQkyZIPuFiep9nLMCqfBYOB2PJG', NULL, '2022-08-12 08:20:56', '2022-08-12 08:20:56'),
(3, 'adde', 'Jadam@gmail.com', 'adde', NULL, '$2y$10$9WH0VDC9mqpyzM8v3EDd0OC/N6BiDFD/loMpl9GBHDcgbUZfzY9oi', NULL, '2022-08-15 10:26:27', '2022-08-15 10:30:32');

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
-- Table structure for table `kecil`
--

CREATE TABLE `kecil` (
  `id` int(11) NOT NULL,
  `nama_pemilik_usaha` varchar(50) NOT NULL,
  `almt_kntr` text NOT NULL,
  `nilai_inves` int(11) NOT NULL,
  `ktp` int(11) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `NIB` int(11) NOT NULL,
  `sektor_usaha` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `kbli` varchar(50) NOT NULL,
  `tenaga_kerja` int(11) NOT NULL,
  `dikeluarkan_tgl` date NOT NULL,
  `nilai_produksi` int(11) NOT NULL,
  `komoditif` varchar(50) NOT NULL,
  `usaha` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecil`
--

INSERT INTO `kecil` (`id`, `nama_pemilik_usaha`, `almt_kntr`, `nilai_inves`, `ktp`, `nama_usaha`, `NIB`, `sektor_usaha`, `lokasi`, `kbli`, `tenaga_kerja`, `dikeluarkan_tgl`, `nilai_produksi`, `komoditif`, `usaha`, `created_at`, `updated_at`) VALUES
(2, 'Deny Rizky Rivaldi222', 'sadsadasd', 21321, 312312, 'dsasd', 312312, '3sadasd', 'sadasdad', 'asdasf', 312312, '2022-08-17', 3123, '12331231asd', 1, '2022-08-18 17:43:13', '2022-08-18 10:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `kecil_ilmea`
--

CREATE TABLE `kecil_ilmea` (
  `id` int(11) NOT NULL DEFAULT 0,
  `nama_pemilik_usaha` varchar(50) NOT NULL,
  `almt_kntr` text NOT NULL,
  `nilai_inves` int(11) NOT NULL,
  `ktp` int(11) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `NIB` int(11) NOT NULL,
  `sektor_usaha` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `kbli` varchar(50) NOT NULL,
  `tenaga_kerja` int(11) NOT NULL,
  `dikeluarkan_tgl` date NOT NULL,
  `nilai_produksi` int(11) NOT NULL,
  `komoditif` varchar(50) NOT NULL,
  `usaha` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menengah`
--

CREATE TABLE `menengah` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `badan_hukum` varchar(50) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelompok_industri` varchar(50) NOT NULL,
  `komoditi_industri` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `jk` int(11) NOT NULL,
  `nilai_investasi` int(11) NOT NULL,
  `nilai_produksi` int(11) NOT NULL,
  `surat_terbit` date NOT NULL,
  `usaha` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menengah`
--

INSERT INTO `menengah` (`id`, `nama_perusahaan`, `badan_hukum`, `nama_pemohon`, `alamat_perusahaan`, `kelurahan`, `kecamatan`, `kelompok_industri`, `komoditi_industri`, `jumlah`, `satuan`, `jk`, `nilai_investasi`, `nilai_produksi`, `surat_terbit`, `usaha`, `created_at`, `updated_at`) VALUES
(1, 'Deny Rizky Rivaldi2', 'ptaas', 'meiko', 'bbbcjr', 'sawah gede', 'karangtengah', 'gatau', 'apaini', 100, 12, 1, 111, 11, '2022-08-15', 1, '2022-08-16 15:39:00', '2022-08-16 08:39:00'),
(3, 'sadasd', 'dsadsa', 'dsadas', 'dasdasd', 'asdsad', 'asdasd', 'asdsad', 'asd', 21231, 312321, 1, 213, 213, '2022-08-17', 2, '2022-08-17 08:54:53', '2022-08-17 08:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `menengah_ilmea`
--

CREATE TABLE `menengah_ilmea` (
  `id` int(11) NOT NULL DEFAULT 0,
  `nama_perusahaan` varchar(50) NOT NULL,
  `badan_hukum` varchar(50) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelompok_industri` varchar(50) NOT NULL,
  `komoditi_industri` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `jk` int(11) NOT NULL,
  `nilai_investasi` int(11) NOT NULL,
  `nilai_produksi` int(11) NOT NULL,
  `surat_terbit` date NOT NULL,
  `usaha` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menengah_ilmea`
--

INSERT INTO `menengah_ilmea` (`id`, `nama_perusahaan`, `badan_hukum`, `nama_pemohon`, `alamat_perusahaan`, `kelurahan`, `kecamatan`, `kelompok_industri`, `komoditi_industri`, `jumlah`, `satuan`, `jk`, `nilai_investasi`, `nilai_produksi`, `surat_terbit`, `usaha`, `created_at`, `updated_at`) VALUES
(1, 'Deny Rizky Rivaldi2', 'ptaas', 'meiko', 'bbbcjr', 'sawah gede', 'karangtengah', 'gatau', 'apaini', 100, 12, 1, 111, 11, '2022-08-15', 1, '2022-08-16 15:39:00', '2022-08-16 08:39:00'),
(3, 'sadasd', 'dsadsa', 'dsadas', 'dasdasd', 'asdsad', 'asdasd', 'asdsad', 'asd', 21231, 312321, 1, 213, 213, '2022-08-17', 2, '2022-08-17 08:54:53', '2022-08-17 08:54:53');

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
(4, '2020_07_24_184706_create_permission_tables', 1),
(5, '2020_09_12_043205_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 3);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2022-08-12 08:15:59', '2022-08-12 08:15:59'),
(2, 'dashboard.edit', 'admin', 'dashboard', '2022-08-12 08:15:59', '2022-08-12 08:15:59'),
(3, 'blog.create', 'admin', 'blog', '2022-08-12 08:15:59', '2022-08-12 08:15:59'),
(4, 'blog.view', 'admin', 'blog', '2022-08-12 08:15:59', '2022-08-12 08:15:59'),
(5, 'blog.edit', 'admin', 'blog', '2022-08-12 08:15:59', '2022-08-12 08:15:59'),
(6, 'blog.delete', 'admin', 'blog', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(7, 'blog.approve', 'admin', 'blog', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(8, 'admin.create', 'admin', 'admin', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(9, 'admin.view', 'admin', 'admin', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(10, 'admin.edit', 'admin', 'admin', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(11, 'admin.delete', 'admin', 'admin', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(12, 'admin.approve', 'admin', 'admin', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(13, 'role.create', 'admin', 'role', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(14, 'role.view', 'admin', 'role', '2022-08-12 08:16:00', '2022-08-12 08:16:00'),
(15, 'role.edit', 'admin', 'role', '2022-08-12 08:16:01', '2022-08-12 08:16:01'),
(16, 'role.delete', 'admin', 'role', '2022-08-12 08:16:01', '2022-08-12 08:16:01'),
(17, 'role.approve', 'admin', 'role', '2022-08-12 08:16:01', '2022-08-12 08:16:01'),
(18, 'profile.view', 'admin', 'profile', '2022-08-12 08:16:01', '2022-08-12 08:16:01'),
(19, 'profile.edit', 'admin', 'profile', '2022-08-12 08:16:01', '2022-08-12 08:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2022-08-12 08:15:59', '2022-08-12 08:15:59'),
(2, 'Operator', 'admin', '2022-08-12 08:18:46', '2022-08-12 08:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
(18, 2),
(19, 1),
(19, 2);

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
(1, 'Maniruzzaman Akash', 'manirujjamanakash@gmail.com', NULL, '$2y$10$NUMq9nfIs4OV41z725BBNuo1hFcywOF8YYSAWRIB/YAQNzGq3wHy.', NULL, '2022-08-12 08:15:58', '2022-08-12 08:15:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecil`
--
ALTER TABLE `kecil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecil_ilmea`
--
ALTER TABLE `kecil_ilmea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menengah`
--
ALTER TABLE `menengah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menengah_ilmea`
--
ALTER TABLE `menengah_ilmea`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecil`
--
ALTER TABLE `kecil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menengah`
--
ALTER TABLE `menengah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
