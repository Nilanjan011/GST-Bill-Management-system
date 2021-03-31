-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 04:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gstdb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `gst5e_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst5cgst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst5sgst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst5t_gst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst5t_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst12e_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst12cgst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst12sgst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst12t_gst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst12t_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst18e_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst18cgst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst18sgst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst18t_gst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst18t_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst28e_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst28cgst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst28sgst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst28t_gst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst28t_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `G_total` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `round_Off` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `F_total` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_all_total` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `name`, `gstin`, `invoice_no`, `state_code`, `registration_date`, `invoice_date`, `gst5e_amt`, `gst5cgst`, `gst5sgst`, `gst5t_gst`, `gst5t_amt`, `gst12e_amt`, `gst12cgst`, `gst12sgst`, `gst12t_gst`, `gst12t_amt`, `gst18e_amt`, `gst18cgst`, `gst18sgst`, `gst18t_gst`, `gst18t_amt`, `gst28e_amt`, `gst28cgst`, `gst28sgst`, `gst28t_gst`, `gst28t_amt`, `G_total`, `operator`, `round_Off`, `F_total`, `grand_all_total`, `created_at`, `updated_at`) VALUES
(29, 'kiran pal', '456455244kl', '45454454554', '21', '10/03/2021', '2021-03-09', '1000', '25', '25', '50', '1050', '1200', '72', '72', '144', '1344', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2394', NULL, NULL, '2394', '2417.94', '2021-03-10 08:31:46', '2021-03-11 11:08:23'),
(30, 'NIlanjan chakraborty', '45645524kl', '45454454554', '21', '10/03/2021', '2021-03-10', '10000', '250', '250', '500', '10500', '1200', '72', '72', '144', '1344', '5679.22', '511.12', '511.12', '1022.25', '6701.47', '0', '0', '0', '0', '0', '18545.47', '-', '0.47', '18545', '18730.45', '2021-03-10 09:18:56', '2021-03-11 11:03:51'),
(31, 'Rakesh kumar roy', '45645524kl', '45454454554p', '21', '10/03/2021', '2021-03-10', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1833.23', '164.99', '164.99', '329.98', '2163.21', '3371.33', '471.98', '471.98', '943.97', '4315.3', '6478.51', '+', '0.49', '6479', '6543.79', '2021-03-10 09:32:28', '2021-03-10 09:32:28'),
(33, 'kiran pal', '455612', '45454454554', '21', '11/03/2021', '2021-03-11', '0', '0', '0', '0', '0', '1200', '72', '72', '144', '1344', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1344', NULL, NULL, '1344', '1357.44', '2021-03-11 05:39:22', '2021-03-11 05:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `gstin`, `email`, `phone`, `address`, `date`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 'kiran pal', '4559999', 'abcd@gmail.com', '7894561230', 'gidwvchjj', '2020-12-08', 2, '2020-12-08 09:40:57', '2021-03-31 08:52:24'),
(2, 'Rakesh kumar roy', '41521', 'rakesh.roy@gmail.com', '9883325789', 'test address', '2020-12-02', 1, '2020-12-08 09:42:14', '2020-12-08 09:42:14'),
(3, 'NIlanjan chakraborty', '85120', 'nilanjan@gmail.com', '8596321478', 'hjbjkzdhbcjkdukh', '2020-12-23', 1, '2020-12-25 08:27:12', '2020-12-25 08:27:12');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2020_11_07_145651_create_admins_table', 1),
(16, '2020_11_09_153138_create_regis_models_table', 1),
(17, '2020_11_13_141230_create_distributors_table', 1),
(18, '2020_11_17_130416_create_bills_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regis_models`
--

CREATE TABLE `regis_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regis_models`
--

INSERT INTO `regis_models` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'nilanjan', 'nilanjan@gmail.com', '$2y$10$UTp7q.lplCGhHTafTej.bOR65tLJeyITJ3f.fjVbA.A3BwHunctg6', '2020-12-08 09:36:48', '2020-12-08 09:36:48'),
(2, 'abcd', 'abcd@gmail.com', '$2y$10$I56SScrSS//mQV57wxaDie4.Wi6XJ2BONFBlV0ZihPL.zzc.uPr9y', '2021-03-30 01:19:47', '2021-03-30 01:19:47');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `distributors_email_unique` (`email`),
  ADD UNIQUE KEY `gstin` (`gstin`);

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
-- Indexes for table `regis_models`
--
ALTER TABLE `regis_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regis_models_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `regis_models`
--
ALTER TABLE `regis_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
