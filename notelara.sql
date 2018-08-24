-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2018 at 01:15 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notelara`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_16_162354_create_users_table', 1),
(2, '2018_08_17_063431_create_notes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edits` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `note`, `edits`, `user_id`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Potato', 'Sumant Is Potato', 2, 1, 0, '2018-08-22 04:27:02', '2018-08-22 23:03:56'),
(2, 'Potato Edited OK', 'kjnkjnkjn kjn\r\ndf', 2, 1, 1, '2018-08-22 05:20:16', '2018-08-22 05:27:28'),
(3, 'Potato Edited 2', 'kjnkjnkjn kjn\r\ndfasda', 1, 1, 1, '2018-08-22 05:20:49', NULL),
(4, 'Potato Edited APPLE', 'kjnkjnkjn kjn\r\ndf', 1, 1, 1, '2018-08-22 05:22:34', NULL),
(5, 'APPLE Edited', 'kjnkjnkjn kjnaasdhjhjvb\r\nkjhgf', 7, 1, 0, '2018-08-22 05:23:28', '2018-08-22 12:05:58'),
(6, 'Potato Editedasd', 'kjnkjnkjn kjn\r\ndf', 1, 1, 0, '2018-08-22 05:23:48', NULL),
(7, 'Niush', 'Edit Note DD\r\nEdit No 2\r\nm', 4, 1, 0, '2018-08-22 05:28:28', '2018-08-22 12:11:17'),
(8, 'The Title Is This', 'I Keep This Note with Title and user as Manoj', 1, 2, 0, '2018-08-22 10:20:49', NULL),
(9, 'Title is Great', 'Read This Note Again \r\nAnd Again', 2, 1, 0, '2018-08-22 10:49:41', '2018-08-22 10:49:56'),
(10, 'sfssdfs', 'lknlknlknasdasd', 1, 1, 0, '2018-08-22 12:08:54', NULL),
(11, 'sjnkjnkjnkjn', 'kjnkjnksjdnfkjsnfkjsdn', 1, 1, 0, '2018-08-22 12:09:22', NULL),
(12, 'jjknskjnfksjnfkj', 'kjnskdjfnskjdfnskjdfnksdjf', 1, 1, 1, '2018-08-22 12:10:05', NULL),
(13, 'thrhtrhtr', 'hyrhyrhyrhyrhyr', 1, 1, 0, '2018-08-23 00:21:43', NULL),
(14, 'niush', 'niush 2aklsmdkasmd', 1, 1, 0, '2018-08-23 03:58:15', NULL);

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
('admin@example.com', '$2y$10$pqZYU93RWwTRa/qufM9dfOK.OX4Elt6iL3SuqpFd5Ef6uZhYJoD9K', '2018-08-22 10:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$N6ialjUgvzjIhRGI1eft2OVooZs3hjMua068KpfWsyyIQ2HS14lVi', 'admin@example.com', 'OLKqWPzjZtqb4vdqt4IQzDrw7gC5pnDqu6X5OfXYloq7iIxZFjI1wkCV2fFc', '2018-08-21 12:41:56', '2018-08-21 12:41:56'),
(2, 'Manoj', 'manoj', '$2y$10$QB28erM3nZ0W4UblEwXw.OVulsFt5bcBV4WskZib4nZ97TK4vwkHq', 'monaj@email.com', 'r54YPeO328RcRlojxlFR1WSdDeIUtfHeTLpBI3TYfgHlu0hUkivf6zQ2Z326', '2018-08-22 05:31:14', '2018-08-22 05:31:14'),
(3, 'Niush Sitaula', 'niush', '$2y$10$3GRZlBXbg92Z9nswIlxiau9B0ASJdHKjBZMV.4ktjhIVLFeCE0S7a', 'niush@email.com', 'wPSHVo41NPqyX9f2FjP0a8762w8wkUFQnfoAgT2nS8ErQj1qj4Q20BW4XFoa', '2018-08-22 12:17:49', '2018-08-22 12:17:49'),
(4, 'Test', 'Test', '$2y$10$AtEhrMfwqEXS9DIzZ/oIleEnkKTpzO3sG1Fgf4gsfCQxcJGlHJ3NK', 'test@test.c', 'fYxvxUvoFwMFFwTCIrG7uylXXbhFfR7RXDPxBAYK29FNd6m2r1EBFHqQAP7L', '2018-08-22 12:30:29', '2018-08-22 12:30:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
