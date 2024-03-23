-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 06:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awc_lab`
--

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
(38, '2014_10_12_000000_create_users_table', 1),
(39, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(40, '2019_08_19_000000_create_failed_jobs_table', 1),
(41, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(42, '2023_10_14_123625_create_permission_tables', 1),
(43, '2024_03_22_165956_create_patients_table', 2),
(44, '2024_03_23_105724_create_reports_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` text NOT NULL,
  `name` text NOT NULL,
  `age` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'sanctum.csrf-cookie', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(2, 'login', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(3, 'logout', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(4, 'register', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(5, 'password.request', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(6, 'password.email', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(7, 'password.reset', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(8, 'password.update', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(9, 'admins.index', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(10, 'admins.create', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(11, 'admins.store', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(12, 'admins.show', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(13, 'admins.edit', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(14, 'admins.update', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(15, 'admins.destroy', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(16, 'users.index', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(17, 'users.create', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(18, 'users.store', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(19, 'users.show', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(20, 'users.edit', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(21, 'users.update', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(22, 'users.destroy', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(23, 'roles.index', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(24, 'roles.create', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(25, 'roles.store', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(26, 'roles.show', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(27, 'roles.edit', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(28, 'roles.update', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(29, 'roles.destroy', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(30, 'permissions.index', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(31, 'permissions.create', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(32, 'permissions.store', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(33, 'permissions.show', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(34, 'permissions.edit', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(35, 'permissions.update', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(36, 'permissions.destroy', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(37, 'dashboard', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(38, 'profile.edit', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(39, 'profile.update', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(40, 'profile.destroy', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(41, 'role.index', 'web', 'web', '2024-03-18 14:16:24', '2024-03-18 14:16:24'),
(42, 'role.create', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(43, 'role.store', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(44, 'role.show', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(45, 'role.edit', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(46, 'role.update', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(47, 'role.destroy', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(48, 'urole.index', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(49, 'urole.create', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(50, 'urole.store', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(51, 'urole.show', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(52, 'urole.edit', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(53, 'urole.update', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(54, 'urole.destroy', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(55, 'password.store', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(56, 'verification.notice', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(57, 'verification.verify', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(58, 'verification.send', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25'),
(59, 'password.confirm', 'web', 'web', '2024-03-18 14:16:25', '2024-03-18 14:16:25');

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `field_01` text NOT NULL,
  `field_02` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-03-18 14:46:59', '2024-03-18 14:46:59'),
(2, 'User', 'web', '2024-03-18 14:48:38', '2024-03-18 14:48:38');

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, NULL, '$2y$10$32VIQzB.wWszPnrqVhMngeJCp4M.0b1j6S0XKXt.3/CIcvpoxg3kq', NULL, '2024-03-18 14:45:26', '2024-03-18 14:45:26', NULL),
(2, 'User', 'user@gmail.com', 'user', NULL, '$2y$10$nd5T7576WHpdtD5YQg3a1Olel6gMjrbrdeh5CnERpu4Ip19f.eVZS', NULL, '2024-03-18 14:53:27', '2024-03-18 14:53:55', NULL);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_invoice_id_unique` (`invoice_id`) USING HASH;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

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
