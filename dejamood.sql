-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 12:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dejamood`
--

-- --------------------------------------------------------

--
-- Table structure for table `mood`
--

CREATE TABLE `mood` (
  `mood_id` int(11) NOT NULL,
  `mood_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mood`
--

INSERT INTO `mood` (`mood_id`, `mood_name`) VALUES
(1, 'Happy'),
(2, 'Energetic'),
(3, 'Calm'),
(4, 'Tired'),
(5, 'Sad'),
(6, 'Stressed'),
(7, 'Anxious'),
(8, 'Angry');

-- --------------------------------------------------------

--
-- Table structure for table `moodlog`
--

CREATE TABLE `moodlog` (
  `moodlog_id` int(11) NOT NULL,
  `context` varchar(255) NOT NULL,
  `date_time` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `mood_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moodlog`
--

INSERT INTO `moodlog` (`moodlog_id`, `context`, `date_time`, `user_id`, `mood_id`) VALUES
(1, 'Day off from work', '2023-02-28 21:49:37', 1, 1),
(18, 'Day off from work', '2023-02-28 22:20:26', 1, 1),
(36, 'mark test ', '2023-03-05 11:12:43', 2, 8),
(60, 'Longer context to see how it looks when you add more text and even more text and loads of text how does it work', '2023-03-18 17:58:58', 1, 1),
(65, 'check edit works', '2023-03-20 16:30:41', 14, 1),
(71, 'testing', '2023-03-20 18:08:09', 14, 2),
(76, 'test', '2023-03-23 11:47:33', 14, 3),
(77, 'test', '2023-03-23 11:48:07', 14, 1),
(79, 'Day off from work', '2023-03-23 20:53:57', 35, 2),
(80, 'Trouble sleeping', '2023-03-23 20:54:47', 35, 4),
(81, 'Project deadline', '2023-03-23 20:54:56', 35, 7),
(82, 'Project completed', '2023-03-23 20:55:10', 35, 1),
(83, 'Day off', '2023-03-23 20:55:17', 35, 1),
(84, 'Event coming up', '2023-03-23 20:55:38', 35, 7),
(85, 'Working from home ', '2023-02-01 20:55:58', 35, 3),
(86, 'Noisy neighbours', '2023-02-06 20:55:58', 35, 8),
(87, 'Long work week', '2023-02-12 20:57:23', 35, 6),
(88, 'test', '2023-02-14 20:57:23', 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_password`, `user_email`) VALUES
(1, 'sally', 'test', ''),
(2, 'mark', 'markpassword', ''),
(13, 'bob', 'bobpassword', ''),
(14, 'test3', '8ad8757baa8564dc136c1e07507f4a98', ''),
(35, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'email@email.com'),
(39, 'demo3', '098f6bcd4621d373cade4e832627b4f6', 'email@email.com'),
(40, 'test405', 'test', 'email@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mood`
--
ALTER TABLE `mood`
  ADD PRIMARY KEY (`mood_id`);

--
-- Indexes for table `moodlog`
--
ALTER TABLE `moodlog`
  ADD PRIMARY KEY (`moodlog_id`),
  ADD KEY `FK_moodlog_user_id` (`user_id`),
  ADD KEY `FK_moodlog_mood_id` (`mood_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mood`
--
ALTER TABLE `mood`
  MODIFY `mood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `moodlog`
--
ALTER TABLE `moodlog`
  MODIFY `moodlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moodlog`
--
ALTER TABLE `moodlog`
  ADD CONSTRAINT `FK_moodlog_mood_id` FOREIGN KEY (`mood_id`) REFERENCES `mood` (`mood_id`),
  ADD CONSTRAINT `FK_moodlog_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
