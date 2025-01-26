-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 08:02 AM
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
-- Database: `laravel`
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
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `loan_type_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `interest_rate` decimal(5,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` enum('pending','approved','rejected','disbursed','fully repaid') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `loan_type_id`, `amount`, `interest_rate`, `duration`, `status`, `created_at`, `updated_at`, `approved_at`) VALUES
(1, 1, 1, 250000.00, 5.00, 6, 'approved', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(3, 1, 1, 260000.00, 7.00, 2, 'approved', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(4, 6, 15, 260000.00, 7.00, 1, 'approved', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `min_amount` decimal(10,2) NOT NULL,
  `max_amount` decimal(10,2) NOT NULL,
  `default_interest_rate` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `name`, `description`, `min_amount`, `max_amount`, `default_interest_rate`, `created_at`, `updated_at`) VALUES
(1, 'Home Loan', 'A loan for purchasing or renovating a home, with longer repayment terms.', 500000.00, 25000000.00, 9.00, NULL, '2024-12-14 09:23:51'),
(15, 'Personal Loan', 'A loan for personal use with flexible repayment terms.', 150000.00, 900000.00, 12.50, '2024-12-16 21:41:51', '2024-12-16 21:41:51'),
(16, 'Student Loan', 'A loan for funding education expenses, typically with longer repayment terms and lower interest rates.', 50000.00, 300000.00, 5.00, '2024-12-16 21:41:51', '2024-12-16 21:41:51'),
(17, 'Business Loan', 'A loan to fund business operations or expansion, usually requiring a solid business plan and financial history.', 100000.00, 20000000.00, 8.00, '2024-12-16 21:41:51', '2024-12-16 21:41:51');

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
(5, '2024_10_31_062910_create_products_table', 1),
(6, '2024_12_10_111941_add_role_to_users_table', 2),
(7, '2024_12_14_022802_create_loan_types_table', 3),
(8, '2024_12_14_103433_add_details_to_users_table', 4),
(9, '2024_12_14_163045_create_loans_table', 5),
(10, '2024_12_14_163107_create_repayments_table', 5),
(11, '2024_12_14_163116_create_payments_table', 5),
(12, '2024_12_14_173703_add_yearly_salary_and_profession_to_users_table', 6),
(13, '2024_12_16_111737_update_payments_table_add_transaction_id_and_pending_status', 7),
(14, '2024_12_16_195538_add_approved_at_to_loans_table', 8);

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
  `repayment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('bkash','nagad','rocket','bank','cash') NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `repayment_id`, `user_id`, `amount`, `method`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(26, 274, 1, 12350.00, 'rocket', 'trahhjb5453', 'completed', '2024-12-16 22:46:59', '2024-12-16 22:46:59'),
(27, 309, 6, 250000.00, 'bkash', 'frdfdf', 'completed', NULL, '2024-12-17 22:11:03');

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
-- Table structure for table `repayments`
--

CREATE TABLE `repayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `installment_number` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','paid','overdue') NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repayments`
--

INSERT INTO `repayments` (`id`, `loan_id`, `installment_number`, `due_date`, `amount`, `status`, `paid_at`, `created_at`, `updated_at`) VALUES
(274, 3, 1, '2025-01-17', 12350.00, 'paid', '2024-12-16 22:46:59', '2024-12-16 22:45:09', '2024-12-16 22:46:59'),
(275, 3, 2, '2025-02-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(276, 3, 3, '2025-03-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(277, 3, 4, '2025-04-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(278, 3, 5, '2025-05-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(279, 3, 6, '2025-06-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(280, 3, 7, '2025-07-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(281, 3, 8, '2025-08-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(282, 3, 9, '2025-09-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(283, 3, 10, '2025-10-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(284, 3, 11, '2025-11-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(285, 3, 12, '2025-12-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(286, 3, 13, '2026-01-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(287, 3, 14, '2026-02-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(288, 3, 15, '2026-03-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(289, 3, 16, '2026-04-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(290, 3, 17, '2026-05-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(291, 3, 18, '2026-06-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(292, 3, 19, '2026-07-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(293, 3, 20, '2026-08-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(294, 3, 21, '2026-09-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(295, 3, 22, '2026-10-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(296, 3, 23, '2026-11-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(297, 3, 24, '2026-12-17', 12350.00, 'pending', NULL, '2024-12-16 22:45:09', '2024-12-16 22:45:09'),
(298, 4, 1, '2025-01-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(299, 4, 2, '2025-02-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(300, 4, 3, '2025-03-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(301, 4, 4, '2025-04-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(302, 4, 5, '2025-05-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(303, 4, 6, '2025-06-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(304, 4, 7, '2025-07-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(305, 4, 8, '2025-08-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(306, 4, 9, '2025-09-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(307, 4, 10, '2025-10-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(308, 4, 11, '2025-11-18', 23183.33, 'pending', NULL, '2024-12-17 22:09:34', '2024-12-17 22:09:34'),
(309, 4, 12, '2025-12-18', 23183.33, 'paid', '2024-12-17 22:11:03', '2024-12-17 22:09:34', '2024-12-17 22:11:03'),
(310, 1, 1, '2025-01-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(311, 1, 2, '2025-02-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(312, 1, 3, '2025-03-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(313, 1, 4, '2025-04-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(314, 1, 5, '2025-05-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(315, 1, 6, '2025-06-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(316, 1, 7, '2025-07-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(317, 1, 8, '2025-08-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(318, 1, 9, '2025-09-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(319, 1, 10, '2025-10-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(320, 1, 11, '2025-11-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(321, 1, 12, '2025-12-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(322, 1, 13, '2026-01-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(323, 1, 14, '2026-02-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(324, 1, 15, '2026-03-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(325, 1, 16, '2026-04-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(326, 1, 17, '2026-05-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(327, 1, 18, '2026-06-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(328, 1, 19, '2026-07-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(329, 1, 20, '2026-08-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(330, 1, 21, '2026-09-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(331, 1, 22, '2026-10-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(332, 1, 23, '2026-11-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(333, 1, 24, '2026-12-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(334, 1, 25, '2027-01-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(335, 1, 26, '2027-02-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(336, 1, 27, '2027-03-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(337, 1, 28, '2027-04-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(338, 1, 29, '2027-05-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(339, 1, 30, '2027-06-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(340, 1, 31, '2027-07-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(341, 1, 32, '2027-08-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(342, 1, 33, '2027-09-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(343, 1, 34, '2027-10-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(344, 1, 35, '2027-11-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(345, 1, 36, '2027-12-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(346, 1, 37, '2028-01-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(347, 1, 38, '2028-02-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(348, 1, 39, '2028-03-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(349, 1, 40, '2028-04-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(350, 1, 41, '2028-05-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(351, 1, 42, '2028-06-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(352, 1, 43, '2028-07-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(353, 1, 44, '2028-08-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(354, 1, 45, '2028-09-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(355, 1, 46, '2028-10-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(356, 1, 47, '2028-11-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(357, 1, 48, '2028-12-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(358, 1, 49, '2029-01-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(359, 1, 50, '2029-02-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(360, 1, 51, '2029-03-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(361, 1, 52, '2029-04-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(362, 1, 53, '2029-05-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(363, 1, 54, '2029-06-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(364, 1, 55, '2029-07-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(365, 1, 56, '2029-08-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(366, 1, 57, '2029-09-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(367, 1, 58, '2029-10-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(368, 1, 59, '2029-11-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(369, 1, 60, '2029-12-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(370, 1, 61, '2030-01-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(371, 1, 62, '2030-02-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(372, 1, 63, '2030-03-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(373, 1, 64, '2030-04-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(374, 1, 65, '2030-05-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(375, 1, 66, '2030-06-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(376, 1, 67, '2030-07-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(377, 1, 68, '2030-08-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(378, 1, 69, '2030-09-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(379, 1, 70, '2030-10-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(380, 1, 71, '2030-11-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17'),
(381, 1, 72, '2030-12-24', 4513.89, 'pending', NULL, '2024-12-24 00:27:17', '2024-12-24 00:27:17');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `date_of_birth` date DEFAULT NULL,
  `marital_status` enum('single','married') DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `yearly_salary` decimal(10,2) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `date_of_birth`, `marital_status`, `mobile_number`, `present_address`, `state`, `city`, `postal_code`, `image`, `yearly_salary`, `profession`) VALUES
(1, 'NazmulJoy', 'admin@gmail.com', NULL, '$2y$10$Y8Ws96nkCKBrD/LSEe2cjOl.JddSMQzeMPtOi2ltndXsWw7hv2uVC', NULL, '2024-12-10 05:38:00', '2024-12-14 09:24:51', 'admin', '1998-04-16', 'single', '01674450396', 'Kadamtoli,keraniganj,dhaka', 'Keraniganj', 'Dhaka', '1210', 'PV-71940.jpg', 1500000.00, 'Student'),
(6, 'John Doe', 'johndoe@example.com', NULL, '$2y$10$vYL8TxuVzuUHJUvzI4BTpOeq4.HBTnoVwEYBNbctPIOuCbe3IvUwW', NULL, '2024-12-16 21:45:44', '2024-12-16 21:45:44', 'user', '1990-04-15', 'single', '1234567890', '123 Elm St', 'California', 'Los Angeles', '90001', NULL, 55000.00, 'Software Engineer'),
(7, 'Emily Smith', 'emilysmith@example.com', NULL, '$2y$10$KXMQvJprMxwuFeJepByE7uvErEPtm54rLftOZEheTugVa3Er9oZYe', NULL, '2024-12-16 21:45:44', '2024-12-16 21:45:44', 'user', '1985-11-20', 'married', '2345678901', '456 Oak St', 'Texas', 'Houston', '77001', NULL, 75000.00, 'Teacher'),
(8, 'Michael Brown', 'michaelbrown@example.com', NULL, '$2y$10$Ofpj.U0hCxM4sVRqQO1wZOaLCJ0yd9pgMwotp5sK8Zn0RS6v.3Hve', NULL, '2024-12-16 21:45:44', '2024-12-16 21:45:44', 'user', '1992-07-09', 'married', '3456789012', '789 Pine St', 'Florida', 'Miami', '33101', NULL, 65000.00, 'Sales Manager'),
(9, 'Sarah Johnson', 'sarahjohnson@example.com', NULL, '$2y$10$HpGw6bUMYRWknQ0L3XGMXOxaKrLG.bu66grbO.rOjWV7ltTbh6PTC', NULL, '2024-12-16 21:45:44', '2024-12-16 21:45:44', 'user', '1995-02-25', 'single', '4567890123', '101 Maple St', 'New York', 'New York', '10001', NULL, 45000.00, 'Nurse'),
(10, 'janina', 'janina@gmail.com', NULL, '$2y$10$Hp95NSpRjk1GGSFncCrEgO5jvb9XjEyp8PElaLxwSLkH993Zce/U6', NULL, NULL, NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_user_id_foreign` (`user_id`),
  ADD KEY `loans_loan_type_id_foreign` (`loan_type_id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_repayment_id_foreign` (`repayment_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `repayments`
--
ALTER TABLE `repayments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repayments_loan_id_foreign` (`loan_id`);

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
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repayments`
--
ALTER TABLE `repayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_loan_type_id_foreign` FOREIGN KEY (`loan_type_id`) REFERENCES `loan_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_repayment_id_foreign` FOREIGN KEY (`repayment_id`) REFERENCES `repayments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `repayments`
--
ALTER TABLE `repayments`
  ADD CONSTRAINT `repayments_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
