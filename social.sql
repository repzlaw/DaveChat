-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 11:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `accts`
--

CREATE TABLE `accts` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_pix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `like` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `like`, `created_at`, `updated_at`) VALUES
(9, 1, 19, 1, '2020-06-04 19:05:37', '2020-06-04 19:10:00'),
(11, 1, 20, 1, '2020-06-04 19:10:07', '2020-06-04 19:11:48'),
(12, 1, 18, 1, '2020-06-04 19:10:25', '2020-06-04 19:10:25'),
(14, 1, 17, 0, '2020-06-04 19:10:39', '2020-06-04 19:10:41'),
(15, 1, 15, 1, '2020-06-04 19:10:47', '2020-06-04 19:10:47'),
(16, 1, 16, 1, '2020-06-04 19:11:35', '2020-06-04 19:11:35'),
(17, 1, 11, 1, '2020-06-04 19:11:37', '2020-06-04 19:11:41'),
(18, 5, 25, 1, '2020-06-09 06:08:46', '2020-06-09 06:10:48'),
(19, 5, 24, 1, '2020-06-09 06:10:47', '2020-06-09 06:10:47'),
(20, 5, 23, 1, '2020-06-09 06:10:54', '2020-06-09 06:10:54'),
(21, 5, 22, 1, '2020-06-09 06:10:58', '2020-06-09 06:10:58'),
(22, 5, 21, 1, '2020-06-09 06:10:59', '2020-06-09 06:10:59'),
(23, 5, 9, 1, '2020-06-09 06:12:08', '2020-06-09 06:12:08'),
(24, 5, 8, 1, '2020-06-09 06:12:09', '2020-06-09 06:12:09'),
(25, 5, 7, 1, '2020-06-09 06:12:14', '2020-06-09 06:12:14'),
(26, 5, 11, 1, '2020-06-09 06:12:54', '2020-06-09 06:12:54'),
(27, 5, 15, 1, '2020-06-09 06:13:00', '2020-06-09 06:13:00'),
(28, 5, 16, 1, '2020-06-09 06:13:02', '2020-06-09 06:13:02'),
(29, 5, 26, 0, '2020-06-11 14:10:04', '2020-06-11 14:10:04'),
(30, 2, 9, 1, '2020-06-11 14:16:01', '2020-06-11 14:16:02'),
(31, 5, 27, 1, '2020-06-11 14:35:33', '2020-06-11 14:35:41');

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
(3, '2020_05_26_084204_create_posts_table', 2),
(4, '2020_05_31_051731_add_cover_image_to_posts', 3),
(6, '2020_05_31_183902_add_p_pix_to_users', 4),
(7, '2020_05_31_190325_create_likes_table', 4),
(8, '2020_06_05_122750_create_accts_table', 5),
(9, '2020_06_06_132356_add_p_pix_to_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('david@gmail.com', '$2y$10$np3WpDKFGFEwT99.j2I74u7puMp8CCRedh4l.Ut/T7/EAFNj2jjTG', '2020-05-26 05:49:00'),
('ibitoyedavid@gmail.com', '$2y$10$1hXxcwkxNh6CcNJ2EoYlgejkCuastcB0PRqjpEBgdzp.f9g2YyWg6', '2020-05-26 05:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `body`, `user_id`, `cover_image`) VALUES
(2, '2020-05-26 18:48:46', '2020-05-26 18:48:46', 'we are good', 2, ''),
(3, '2020-05-26 18:50:45', '2020-05-26 18:50:45', 'why is the success message not displaying?', 2, ''),
(7, '2020-05-27 07:32:49', '2020-05-27 07:32:49', 'lets see if this works', 2, ''),
(9, '2020-05-27 07:39:35', '2020-06-07 15:06:52', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima fugit illo iusto tempora accusantium unde fugiat cupiditate, tempore quas recusandae aliquid rerum dolorem facilis fuga nisi dolorum et ab esse??', 2, ''),
(11, '2020-05-27 07:49:53', '2020-05-27 07:49:53', 'my heart is glad today!!!', 1, ''),
(15, '2020-05-30 08:18:30', '2020-05-30 10:40:54', 'lets see', 1, ''),
(16, '2020-05-31 04:55:09', '2020-05-31 04:55:09', 'fzzzg', 1, 'Capturesd_1590904509.JPG'),
(17, '2020-05-31 05:09:26', '2020-05-31 05:09:26', 'wow', 1, 'images (12)_1590905365.jpg'),
(18, '2020-05-31 05:17:58', '2020-05-31 05:17:58', 'eavg', 1, 'cover_image'),
(19, '2020-05-31 05:18:36', '2020-05-31 05:18:36', 'today is sunday\r\nhope youre going to church?', 1, 'cover_image'),
(20, '2020-05-31 18:21:52', '2020-06-02 13:22:21', 'stay calm', 1, '0'),
(21, '2020-06-04 19:19:44', '2020-06-04 19:19:44', 'lets see', 1, 'combing-625_625x350_41442221139_1591301983.jpg'),
(22, '2020-06-05 12:30:34', '2020-06-05 12:30:34', 'am making steady progress', 1, 'download (10)_1591363834.jpg'),
(23, '2020-06-08 15:05:08', '2020-06-08 15:05:08', 'is this true?', 1, '0'),
(24, '2020-06-08 15:06:58', '2020-06-08 15:06:58', 'what do you say', 1, ''),
(25, '2020-06-08 15:38:55', '2020-06-08 15:38:55', 'say hi to me...am new here', 4, ''),
(27, '2020-06-11 14:25:18', '2020-06-11 15:17:35', 'joshua ibrahim is king!!', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `p_pix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'noimage.jpeg',
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `p_pix`, `fname`, `lname`, `oname`, `dob`, `gender`) VALUES
(1, 'Sir davies', 'david@gmail.com', '$2y$10$Op4nmeqx9AyfOvn7EKEYgeL77DcA9HIhmWsi83CbFeD.w/BN4tmMe', '2xzrNWM4d0r0hFse9qIP2FH2AT6Busep029kYYHXxikXmnQmtszzB0Jc7A9e', '2020-05-26 05:30:28', '2020-06-08 14:37:22', 'adolescence-bag-cute-944762_1591630642.jpg', 'Sir davies', 'ibitoye', 'queen', NULL, 'male'),
(2, 'dave', 'ibitoyedavid@gmail.com', '$2y$10$7Dt5goC4D.bPcytNhCKII.9YuojLXMN5ddOcPDne3h2eW//4.5Dfy', 'lkAME8J9eIpmTciLUpJMEMq7wG9UldLDgaBKupWySAqV0RYAtouA7kxdvEiL', '2020-05-26 05:50:25', '2020-06-07 17:06:49', 'noimage.jpg', 'dave', 'ayodele', 'josh', '2020-06-04', 'male'),
(3, 'joy', 'joydavid@gmail.com', '$2y$10$65rLCGWA00ligLHzfQTsK.yn2nDp5h90JlOQEVMxy6IwtJnAqruq6', 'RrtHlvGyr3XDMH0c3SBaMiNo0dZS2VBJsmVyS4qAbfwT0TtLq1cl0GYwFMsZ', '2020-06-06 12:34:43', '2020-06-06 12:34:43', 'noimage.jpg', NULL, NULL, NULL, NULL, NULL),
(4, 'joy', 'mosobolaje@gmail.com', '$2y$10$IaLVLRullkqxa2SLun6xo.jhxND8K63oe3TlzjA.Si0SlU8vJGJPq', 'PYJ1U0kovG87lKZJbtOVGEC3LN0WoT2J723rgR4XlxjhFH6q9hS9Fi9RnLMM', '2020-06-08 15:36:59', '2020-06-09 05:49:54', 'hkjb$2012_02_23_10_18_30_1591684513.jpg', 'joy', 'mosobalaje', 'olabisi', '2020-06-09', 'Female'),
(5, 'josh', 'josh@gmail.com', '$2y$10$4wXH7.pt14ePZ7G0CnyC/etU38B243CfgtcbnQ26uVU6jKz8ii5LK', 'L6tIW3ATbANjol2HoaPh8Gsd0vQOqAvW3J0otFPGtKCZGgIVcjbtYNcyusT1', '2020-06-09 06:05:59', '2020-06-11 14:39:38', 'noimage.jpeg', 'joshua', 'ibrahim', 'queen', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accts`
--
ALTER TABLE `accts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `accts`
--
ALTER TABLE `accts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
