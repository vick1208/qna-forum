-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2024 at 04:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qna_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP', '2024-04-28 04:20:21', '2024-04-28 04:20:21'),
(2, 'Database', '2024-04-27 21:52:23', '2024-04-27 21:52:23'),
(11, 'Javascript', '2024-04-29 15:38:28', '2024-04-29 15:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_04_24_052152_create_profiles_table', 1),
(7, '2024_04_24_065135_create_categories_table', 1),
(8, '2024_04_24_070320_create_questions_table', 1),
(9, '2024_04_24_070816_create_replies_table', 1);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `age` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `age`, `address`, `bio`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 24, 'Kebumen', NULL, 2, '2024-04-27 05:26:50', '2024-04-27 05:26:50'),
(2, 15, 'Boyolali', NULL, 3, '2024-04-29 08:36:39', '2024-04-29 08:36:39'),
(3, 22, 'Boyolali', NULL, 4, '2024-04-29 08:54:16', '2024-04-29 08:54:16'),
(4, 64, 'Boyolali', NULL, 5, '2024-04-29 08:59:09', '2024-04-29 08:59:09'),
(5, 11, 'Boyolali', NULL, 6, '2024-04-29 09:06:16', '2024-04-29 09:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `slug`, `detail`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Cara Upgrade Apache', 'cara-upgrade-apache', '<div>Bagaimana cara upgrade Apache 2.2.14 di Windows? Apakah jika di update akan impact ke versi PHP juga?<br><br></div>', 1, 3, '2024-04-29 08:39:11', '2024-04-29 08:39:11'),
(4, 'Tanya masalah program php', 'tanya-masalah-program-php', '<div>Assalamualaikum wr WB</div><div>Selamat sore pada para master,sepuh,dan kakak2 PHP mysql indonesia.</div><div>Saya memiliki aplikasi web berbasis PHP mysql di localhost.&nbsp;</div><div>Bagaimanakah cara agar database itu bisa diakses secara online tetapi programnya tetap di localhost?</div><div>Sudah cari di Mbah google belum menemukan jawaban nya...</div><div>Sekian dan terima kasih</div><div><br></div>', 1, 4, '2024-04-29 08:57:31', '2024-04-29 08:57:31'),
(5, 'Need Help', 'need-help', '<div>adakah yang bisa bantu edit edit Javscript bagian backend? butuh urgent gaiss</div>', 11, 5, '2024-04-29 09:05:00', '2024-04-29 09:05:00'),
(6, 'Need Jasa Koding', 'need-jasa-koding', '<div>Hallo&nbsp;</div><div>Butuh jasa pembuat website sekola dengan php native database MySQL&nbsp;</div><div>Mulai dari registrasi siswa baru sampai ujian kenaikan kelas / penentuan kenaikan klas&nbsp;</div><div>Untuk SMA</div>', 1, 6, '2024-04-29 09:07:01', '2024-04-29 09:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `question_id`, `user_id`, `detail`, `created_at`, `updated_at`) VALUES
(5, 3, 2, 'Nggak, hanya apache doang yang keupdate, php itungannya beda installasi', '2024-04-29 08:40:50', '2024-04-29 08:40:50'),
(6, 3, 4, 'ngaruh kalau libphpapache nya nggak support versi php yg terinstal. kalau di windows cukup install xampp terbaru', '2024-04-29 08:54:47', '2024-04-29 08:54:47'),
(7, 4, 3, 'aplikasi nya di localhost akses db pake API ke hosting', '2024-04-29 08:57:59', '2024-04-29 08:57:59'),
(8, 4, 2, 'pake serverless database. misal nya supabase atau planetscale. nanti aplikasi nya tetep local tapi bisa akses database dari mana saja dan kapan saja', '2024-04-29 08:58:17', '2024-04-29 08:58:17'),
(9, 4, 5, 'db nya simpan di hosting,,, set agar bisa di remote', '2024-04-29 08:59:27', '2024-04-29 08:59:27'),
(10, 5, 3, 'pakai framework apaan bang ?', '2024-04-29 09:05:42', '2024-04-29 09:05:42'),
(11, 6, 2, 'Budget berape ?', '2024-04-29 09:07:42', '2024-04-29 09:07:42'),
(12, 6, 6, 'Budget mah gampang ntar', '2024-04-29 09:08:22', '2024-04-29 09:08:22'),
(13, 6, 6, '1jt mau ?', '2024-04-29 09:08:36', '2024-04-29 09:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(2, 'Michael B', 'rijal2@gmail.com', NULL, '$2y$10$jX071cLe7M2FoHcOvOXvK.F1ObqgWni55i9lKWlzUYXsMIE.FNkzW', NULL, '2024-04-27 05:26:50', '2024-04-27 05:26:50'),
(3, 'Firman Pratama', 'firman_pratama@gmail.com', NULL, '$2y$10$pXt8vNLduwW6PNWknSXKkuSjxYmhVGfju3zwUdlrUlDf7aJZXDLMu', NULL, '2024-04-29 08:36:39', '2024-04-29 08:36:39'),
(4, 'Ayuditha Putri', 'putri@gmail.com', NULL, '$2y$10$2uLiNXdRDdrKxQmAmUmYnutb6MmVyVGaf25tREywe1Xy1w9o/id16', NULL, '2024-04-29 08:54:16', '2024-04-29 08:54:16'),
(5, 'Kalima Fajar', 'kalima_fajar@gmail.com', NULL, '$2y$10$mff.d1eXW/CPv0XOUC5w3ez4ZdPh3tsmHq7jpGj4TVkaCSwM/0S0m', NULL, '2024-04-29 08:59:09', '2024-04-29 08:59:09'),
(6, 'Dono Kasino', 'dono_kasino@gmail.com', NULL, '$2y$10$IGFswjZudnXGf8l6MRrfMOWQ.LK8t8E3cdUmjidcx.zYdUHFFC.XG', NULL, '2024-04-29 09:06:16', '2024-04-29 09:06:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `questions_slug_unique` (`slug`),
  ADD KEY `questions_category_id_foreign` (`category_id`),
  ADD KEY `questions_user_id_foreign` (`user_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_question_id_foreign` (`question_id`),
  ADD KEY `replies_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
