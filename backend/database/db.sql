-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 05, 2021 at 02:03 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fagron`
--

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `point` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`id`, `date`, `point`, `user_id`, `hash`, `created_at`, `updated_at`) VALUES
(3, '2021-01-04', 6, 1, 'bd19e7d40cb6e347755f2994a1ce0bf4', '2021-01-04 17:06:08', '2021-01-05 10:27:18'),
(5, '2021-01-07', 22, 1, '388a4605b18c86fe3729f21bd7675a87', '2021-01-06 18:23:39', '2021-01-04 18:23:39'),
(6, '2021-01-08', 21, 1, '76a652f828f5c2068579d324c44b7f9a', '2021-01-11 18:23:48', '2021-01-04 18:23:48'),
(7, '2021-01-09', 26, 1, '024647dc14047d89aa50cb53a2f2ad67', '2021-01-03 18:23:59', '2021-01-04 18:23:59'),
(8, '2021-01-10', 45, 1, '318cb48774d34f0ef2ed20826fef4eb2', '2021-01-22 18:24:07', '2021-01-04 18:24:07'),
(10, '2021-01-07', 25, 1, '5f37dabd88bffe95243a8649f07e4893', '2021-01-05 09:56:53', '2021-01-05 09:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `expire` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `user_id`, `token`, `expire`, `created_at`, `updated_at`) VALUES
(1, 1, '7c89a004b4ed8b6116b8e584609c7e1a', '2021-01-05', '2021-01-04 16:34:37', '2021-01-04 16:34:37'),
(2, 1, '7154ea1231923eeec995c177cc7d83f5', '2021-01-05', '2021-01-04 16:55:59', '2021-01-04 16:55:59'),
(3, 1, '8bfe78ce2272dd7e1426260fe462f2db', '2021-01-05', '2021-01-04 17:47:09', '2021-01-04 17:47:09'),
(4, 1, '54268d6722fb7595ca7d8e2f74590539', '2021-01-05', '2021-01-04 18:49:48', '2021-01-04 18:49:48'),
(5, 1, '026b779b6d54b59d87812dbd862f513a', '2021-01-05', '2021-01-04 18:54:35', '2021-01-04 18:54:35'),
(6, 1, 'd355db1c04041a3ba921be21fa7e78ef', '2021-01-05', '2021-01-04 19:04:56', '2021-01-04 19:04:56'),
(7, 1, '9c02df99f7e822ab157e053bdf649524', '2021-01-05', '2021-01-04 19:06:07', '2021-01-04 19:06:07'),
(8, 1, '3ad9dd777cf2ad4ff9b181cf639b642a', '2021-01-05', '2021-01-04 19:06:50', '2021-01-04 19:06:50'),
(9, 1, 'bf7455f3ddf98df6f8a44b4c3491c3c2', '2021-01-05', '2021-01-04 19:13:10', '2021-01-04 19:13:10'),
(10, 1, 'ad381be994bbedea6c98fe9a0987cd20', '2021-01-05', '2021-01-04 22:33:54', '2021-01-04 22:33:54'),
(11, 1, '0cd380fc1a14596bef988ae211fd4519', '2021-01-05', '2021-01-04 22:40:04', '2021-01-04 22:40:04'),
(12, 1, '939069f93022a236234bbef36171fac1', '2021-01-05', '2021-01-05 08:47:39', '2021-01-05 08:47:39'),
(13, 1, '47a1c7341257da41414678e6fb4d0b4d', '2021-01-05', '2021-01-05 08:57:59', '2021-01-05 08:57:59'),
(14, 1, 'ce92c00738d6f58e81ce77d4a45112ca', '2021-01-05', '2021-01-05 09:09:34', '2021-01-05 09:09:34'),
(15, 1, '890b18b0682f1f38d7e99444df03f67a', '2021-01-05', '2021-01-05 09:55:25', '2021-01-05 09:55:25'),
(16, 1, '64c9fb6eae7d45e363d44338e79e9368', '2021-01-05', '2021-01-05 09:56:45', '2021-01-05 09:56:45'),
(17, 1, '18067676760ebf6b59614c7fdd259059', '2021-01-05', '2021-01-05 10:35:18', '2021-01-05 10:35:18'),
(18, 1, '8647cd73a4b020b817a773e9cbde5c81', '2021-01-05', '2021-01-05 10:36:17', '2021-01-05 10:36:17'),
(19, 1, '0a3f0c49426e350896168d84da70847d', '2021-01-05', '2021-01-05 10:36:50', '2021-01-05 10:36:50'),
(20, 1, '6788dfa063df738def4763b9b2ef7c22', '2021-01-05', '2021-01-05 10:37:04', '2021-01-05 10:37:04'),
(21, 1, '350b7f1f50c2359c68b81eff73b96df0', '2021-01-05', '2021-01-05 10:37:59', '2021-01-05 10:37:59'),
(22, 1, 'c592025fafeecaef3db3a7aa14cb4e30', '2021-01-05', '2021-01-05 10:39:02', '2021-01-05 10:39:02'),
(23, 1, '9ce54e2169ff5ffca337dd606a6f5660', '2021-01-05', '2021-01-05 10:39:39', '2021-01-05 10:39:39'),
(24, 1, '6e98ea9737d2d490c172042c550f043b', '2021-01-05', '2021-01-05 10:43:07', '2021-01-05 10:43:07'),
(25, 1, 'ea7cf12e861dc907aa0b2c0a2c83d2ac', '2021-01-05', '2021-01-05 10:46:27', '2021-01-05 10:46:27'),
(26, 1, '38eb4049a3437f9aef4c7683f0fe06a0', '2021-01-05', '2021-01-05 10:51:56', '2021-01-05 10:51:56'),
(27, 1, 'babd5f99b291b769a65214527c37fcc3', '2021-01-05', '2021-01-05 10:57:08', '2021-01-05 10:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Lebron James', 'james@james.com', '202cb962ac59075b964b07152d234b70', '2021-01-04 08:37:34', '2021-01-04 08:37:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
