-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2023 at 04:26 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ols_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `material_id` int NOT NULL,
  `instructor_id` int DEFAULT NULL,
  `learner_id` int DEFAULT NULL,
  `comment_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `course_id`, `material_id`, `instructor_id`, `learner_id`, `comment_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, 12, 5, NULL, 'Hello', 1, '2023-02-05 13:17:07', '2023-02-05 13:17:07'),
(2, 2, 1, 3, NULL, 'Hello DIlian', 1, '2023-02-05 13:17:46', '2023-02-05 13:17:46'),
(3, 2, 3, 3, NULL, 'hello fsdafsadfsda', 1, '2023-02-05 13:17:59', '2023-02-05 13:17:59'),
(4, 1, 4, 2, NULL, 'hello', 1, '2023-02-06 01:36:48', '2023-02-06 01:36:48'),
(5, 1, 4, NULL, 7, 'hi', 1, '2023-02-06 01:37:32', '2023-02-06 01:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `instructor_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`, `image`, `price`, `status`, `instructor_id`, `created_at`, `updated_at`) VALUES
(1, 'Demarcus Erdman', 'Id maxime.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 2908, 1, 2, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(2, 'Dillan Anderson', 'Voluptas.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 5055, 1, 3, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(3, 'Jeremy Stark', 'Ratione.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 4458, 1, 4, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(4, 'Holden Prosacco IV', 'Dolor.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 2799, 1, 2, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(5, 'Dr. Dashawn Yost', 'Maiores.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 4317, 1, 3, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(6, 'Porter Kovacek', 'Ut et.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 2990, 1, 4, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(7, 'Ahmad Johns', 'Sint.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 2691, 1, 5, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(8, 'Ike Stoltenberg Sr.', 'Corrupti.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 5245, 1, 6, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(9, 'Rafaela Keeling', 'Deserunt.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 7655, 1, 2, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(10, 'Abigayle Bahringer', 'Ut.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 4412, 1, 4, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(11, 'Jade Huel', 'Unde.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 2670, 1, 6, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(12, 'Drew Thompson', 'Iusto.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 7021, 1, 3, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(13, 'Jessy Beier', 'Id omnis.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 6127, 1, 3, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(14, 'Everette Ratke', 'Nihil.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 2389, 1, 5, '2023-01-30 08:29:24', '2023-01-30 08:29:24'),
(15, 'Dr. Skye Kling', 'Nostrum.', 'image\\1PFAGYeFMsGQGLA8a4DaE9sJfMeGQYzwq1PfZvKE.jpg', 6557, 1, 5, '2023-01-30 08:29:24', '2023-01-30 08:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `files` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_extension` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materials_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `course_id`, `title`, `description`, `status`, `files`, `file_extension`, `created_at`, `updated_at`) VALUES
(1, 2, 'Test Resource', 'asdjsakjfklas', 1, 'image/k5bNW528Jj3BIRIWSE7RDiMuZkkTCVpd8Vvmw1P1.jpg', 'png', '2023-01-30 10:55:13', '2023-01-30 10:55:13'),
(2, 2, 'test', 'test', 1, 'image/GiArWkKhihynidbDoK4m6GDdtMsGS3dtR10uz8S6.jpg', 'png', '2023-01-30 11:02:42', '2023-01-30 11:02:42'),
(3, 2, 'gdshdsah', 'jhdajshdakjd', 1, 'image/ZuzBXa1qvhJonOgb7n1vbki5MVLudugvK5c9FJ05.jpg', 'png', '2023-01-30 11:18:20', '2023-01-30 11:18:20'),
(4, 1, 'TestResource', 'sdsadasdasd', 1, 'image/llw81y5PuYFtreH0DmQusIlYPe3rLEB8JzJWWsWy.jpg', 'png', '2023-02-01 10:20:56', '2023-02-01 10:20:56'),
(5, 1, 'Test Resourcs 222', 'sdasdasda', 1, 'image/ze7wtpYkOmkonqLiG6wVN6kq12Z9dFIyL28gpxGk.pdf', 'png', '2023-02-01 10:29:49', '2023-02-01 10:29:49'),
(6, 1, 'onTest', 'asdasdadad', 1, 'image/5mlDIa2qPGraYmkMI8CZV3fVANXzmyDAWQypXiWr.jpg', 'png', '2023-02-01 11:36:18', '2023-02-01 11:36:18'),
(7, 1, 'testdjskahdfskdf', 'afadklasjdlkasjdl', 1, 'image/0Dgww7eXML62eHZFQ8uRrjrkNAopsu1d1KNWPlT8.png', 'png', '2023-02-02 08:44:57', '2023-02-02 08:44:57'),
(8, 7, 'test Resource', 'sfdasdasdasadada', 1, 'image/7ZSqd92dskwEUWcqlzbF9ZvJ29OZeIVQyaS0S9hC.mp4', 'mp4', '2023-02-02 09:22:29', '2023-02-02 09:22:29'),
(9, 7, 'sdfsfsadf', 'asfdsadfasa', 1, 'image/e0bX4msw6FKtCMjtvtIlmSun4i1VEerTFYPBitpG.mp4', 'mp4', '2023-02-02 09:34:01', '2023-02-02 09:34:01'),
(10, 7, 'sfsafsadfasfdsadsafasfsf', 'sasefasfsafasfasfsafasd', 1, 'image/o7fcyd8OrbSoFwOOwC6GbquOzvvT1OHi8gqP8u4N.mp4', 'mp4', '2023-02-02 09:34:19', '2023-02-02 09:34:19'),
(11, 7, 'sjhfjkashfksaasfaifioa', 'isajfioasdjfoias', 1, 'image/rvWqwAk8FyfrXIXQcUYQ33jlPJm7wIKTvcmRDwpu.pdf', 'pdf', '2023-02-02 10:03:38', '2023-02-02 10:03:38'),
(12, 15, 'Test Resource', 'sadasdsad', 1, 'image/Gxn0WmZg8TTyjHrIgnEZz4KM1NRpzUS07MHD7yw0.mp4', 'mp4', '2023-02-02 12:50:49', '2023-02-02 12:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_27_150225_create_courses_table', 1),
(6, '2023_01_29_175644_create_materials_table', 1),
(7, '2023_02_02_172345_create_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','learner','instructor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Graham Fadel', 'modesta.howell@example.net', '2023-02-07 10:00:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'F1HLKsQZ6U', 'admin', '2023-02-07 10:00:13', '2023-02-07 10:00:13'),
(2, 'Prof. Hazel O\'Reilly I', 'jedediah.homenick@example.org', '2023-02-07 10:02:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qyv9qX3J40', 'instructor', '2023-02-07 10:02:00', '2023-02-07 10:02:00'),
(3, 'Lorenza McGlynn', 'ischamberger@example.org', '2023-02-07 10:02:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RAbxRweWPw', 'instructor', '2023-02-07 10:02:00', '2023-02-07 10:02:00'),
(4, 'Lukas Block', 'jazmin73@example.com', '2023-02-07 10:02:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dtY340rVni', 'instructor', '2023-02-07 10:02:00', '2023-02-07 10:02:00'),
(5, 'Dr. Eliane Abernathy DDS', 'laney41@example.net', '2023-02-07 10:02:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rcZaqmG1Rz', 'instructor', '2023-02-07 10:02:00', '2023-02-07 10:02:00'),
(6, 'Adela O\'Keefe', 'reid54@example.org', '2023-02-07 10:02:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ArAX9hWpNw', 'instructor', '2023-02-07 10:02:00', '2023-02-07 10:02:00'),
(7, 'Birdie Morar', 'jheaney@example.org', '2023-02-07 10:02:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0wcW6l83Vy', 'learner', '2023-02-07 10:02:25', '2023-02-07 10:02:25'),
(8, 'Joy Zieme', 'rafael70@example.org', '2023-02-07 10:02:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '04irRLBQQA', 'learner', '2023-02-07 10:02:25', '2023-02-07 10:02:25'),
(9, 'Francesca Satterfield I', 'jordan66@example.org', '2023-02-07 10:02:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Qv1CdiY5eC', 'learner', '2023-02-07 10:02:25', '2023-02-07 10:02:25'),
(10, 'Marcos Schmitt', 'casper.eddie@example.com', '2023-02-07 10:02:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lh6WKGzZTF', 'learner', '2023-02-07 10:02:25', '2023-02-07 10:02:25'),
(11, 'Ms. Twila Thiel DDS', 'terry.karolann@example.net', '2023-02-07 10:02:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1YGMxED0Y8', 'learner', '2023-02-07 10:02:25', '2023-02-07 10:02:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
