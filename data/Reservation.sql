-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: laravel-db
-- Generation Time: Mar 28, 2020 at 08:24 PM
-- Server version: 5.7.29
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dormitory`
--

CREATE TABLE `Dormitory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_Eng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Name_Thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Dormitory`
--

INSERT INTO `Dormitory` (`id`, `Name_Eng`, `Name_Thai`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'Tao-Thoung Student Dormitory 1', 'หอพักนักศึกษา เทา-ทอง 1', 'หอพักนิสิต ชาย', '2020-03-28 20:14:47', '2020-03-28 20:14:47'),
(2, 'Tao-Thoung Student Dormitory 2', 'หอพักนักศึกษา เทา-ทอง 2', 'หอพักนิสิต หญิง', '2020-03-28 20:15:50', '2020-03-28 20:15:50'),
(3, 'Tao-Thoung Student Dormitory 3', 'หอพักนักศึกษา เทา-ทอง 3', 'หอพักนิสิต หญิง', '2020-03-28 20:16:32', '2020-03-28 20:16:32'),
(4, 'Tao-Thoung Student Dormitory 4', 'หอพักนักศึกษา เทา-ทอง 4', 'หอพักนิสิต หญิง', '2020-03-28 20:17:49', '2020-03-28 20:17:49'),
(5, 'Student Dormitory 14', 'หอพักนักศึกษา 14', 'หอพักนิสิต ชาย', '2020-03-28 20:18:31', '2020-03-28 20:18:31'),
(6, 'Student Dormitory 15', 'หอพักนักศึกษา 15', 'หอพักนิสิต หญิง', '2020-03-28 20:18:44', '2020-03-28 20:18:44'),
(7, 'International student dormitory for Male', 'หอพักนักศึกษา นานาชติ ชาย', 'หอพักนิสิต ชาย', '2020-03-28 20:21:37', '2020-03-28 20:21:37'),
(8, 'International student dormitory for Female', 'หอพักนักศึกษา นานาชติ หญิง', 'หอพักนิสิต หญิง', '2020-03-28 20:22:13', '2020-03-28 20:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_08_201239_create_table_add_admin_field', 3),
(5, '2020_03_08_145329_create_table_dormitory', 8),
(12, '2020_03_17_085336_create_table_userdetails', 6),
(23, '2020_03_17_214159_create_table_problemtype', 10),
(27, '2020_03_17_214747_create_table_roomtype', 11),
(29, '2020_03_17_091252_create_table_rooms', 12),
(30, '2020_03_17_092810_create_table_reservations', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ProblemType`
--

CREATE TABLE `ProblemType` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ProblemName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ProblemType`
--

INSERT INTO `ProblemType` (`id`, `ProblemName`, `created_at`, `updated_at`) VALUES
(1, 'แจ้งซ่อม', '2020-03-28 18:48:32', '2020-03-28 18:48:32'),
(2, 'ติดต่อสอบถาม', '2020-03-28 18:56:00', '2020-03-28 18:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `Reservations`
--

CREATE TABLE `Reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `UserDetails_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `RoomCode_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `BookingDate` datetime NOT NULL,
  `DueDate` datetime NOT NULL,
  `Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Rooms`
--

CREATE TABLE `Rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `RoomCode_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Floor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AtNumberPreple` int(11) DEFAULT NULL,
  `StatusRoom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Roomtype_ID` int(11) NOT NULL,
  `Dormitory_ID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Rooms`
--

INSERT INTO `Rooms` (`id`, `RoomCode_ID`, `Floor`, `AtNumberPreple`, `StatusRoom`, `Roomtype_ID`, `Dormitory_ID`, `created_at`, `updated_at`) VALUES
(1, 'A326', '3', 4, NULL, 2, 1, '2020-03-21 13:11:09', '2020-03-21 13:11:09'),
(2, 'A325', '3', 3, '', 2, 1, '2020-03-21 13:11:52', '2020-03-21 13:11:52'),
(3, 'A101', '1', NULL, NULL, 1, 1, '2020-03-21 13:13:17', '2020-03-21 13:13:17'),
(4, 'A101', '1', NULL, NULL, 1, 2, '2020-03-21 13:38:50', '2020-03-21 13:38:50'),
(5, 'A211', '2', NULL, NULL, 1, 1, '2020-03-28 18:15:02', '2020-03-28 18:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `RoomType`
--

CREATE TABLE `RoomType` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Type` int(11) NOT NULL,
  `NumberPeople` int(11) NOT NULL,
  `Dormitory_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `RoomType`
--

INSERT INTO `RoomType` (`id`, `Type`, `NumberPeople`, `Dormitory_ID`, `created_at`, `updated_at`) VALUES
(10, 1, 4, '1', '2020-03-20 19:55:01', '2020-03-20 19:55:01'),
(11, 1, 7, '6', '2020-03-20 19:55:11', '2020-03-20 19:55:11'),
(12, 2, 7, '6', '2020-03-20 19:55:54', '2020-03-20 19:55:54'),
(13, 2, 7, '5', '2020-03-20 19:56:07', '2020-03-20 19:56:07'),
(14, 2, 4, '1', '2020-03-20 19:57:16', '2020-03-20 19:57:16'),
(15, 1, 4, '2', '2020-03-20 19:57:22', '2020-03-20 19:57:22'),
(16, 2, 4, '2', '2020-03-20 19:57:32', '2020-03-20 19:57:32'),
(17, 1, 7, '5', '2020-03-20 20:02:08', '2020-03-20 20:02:08'),
(18, 2, 4, '3', '2020-03-20 20:02:18', '2020-03-20 20:02:18'),
(19, 1, 4, '3', '2020-03-20 20:02:28', '2020-03-20 20:02:28'),
(20, 1, 2, '8', '2020-03-20 20:02:40', '2020-03-20 20:02:40'),
(21, 1, 2, '7', '2020-03-20 20:02:48', '2020-03-20 20:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `UserDetails`
--

CREATE TABLE `UserDetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Code_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Collegian_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Firstname_Thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lastname_Thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Firstname_Eng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lastname_Eng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ethnicity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Birth_Date` date NOT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Faculty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Major` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Amphures` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Districts` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Provinces` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `isAdmin`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 0, 'admin@gmail.com', NULL, '$2y$10$eAa623Xr0PsR8OLdw9jVm.t/3ToNcroeIzIoRKczu0nHFb2o.W61C', NULL, '2020-03-07 19:39:29', '2020-03-07 19:39:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dormitory`
--
ALTER TABLE `Dormitory`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ProblemType`
--
ALTER TABLE `ProblemType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Reservations`
--
ALTER TABLE `Reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Rooms`
--
ALTER TABLE `Rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RoomType`
--
ALTER TABLE `RoomType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserDetails`
--
ALTER TABLE `UserDetails`
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
-- AUTO_INCREMENT for table `Dormitory`
--
ALTER TABLE `Dormitory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ProblemType`
--
ALTER TABLE `ProblemType`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Reservations`
--
ALTER TABLE `Reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Rooms`
--
ALTER TABLE `Rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RoomType`
--
ALTER TABLE `RoomType`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `UserDetails`
--
ALTER TABLE `UserDetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
