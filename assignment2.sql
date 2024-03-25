-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2024 at 06:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--
CREATE DATABASE IF NOT EXISTS `assignment2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `assignment2`;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `last_name`, `middle_name`) VALUES
(5, 3, 'Kaloyan', 'Tsvetkov', NULL),
(6, 4, 'a', 'a', NULL),
(7, 6, 'b', 'b', NULL),
(8, 7, 'John', 'Reacher', NULL),
(9, 8, 'w', 'w', NULL),
(10, 9, '22', '22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `publication_title` varchar(255) DEFAULT NULL,
  `publication_text` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publication_status` enum('public','private') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `publication_title`, `publication_text`, `timestamp`, `publication_status`) VALUES
(12, 6, 'aaa', 'aaaa', '2024-03-23 04:27:33', 'public'),
(13, 6, 'bbb', 'bbb', '2024-03-23 04:30:25', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `publication_comment`
--

CREATE TABLE `publication_comment` (
  `publication_comment_id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `publication_id` int(11) DEFAULT NULL,
  `comment_text` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication_comment`
--

INSERT INTO `publication_comment` (`publication_comment_id`, `profile_id`, `publication_id`, `comment_text`, `timestamp`) VALUES
(1, 6, 12, 'www', '2024-03-23 05:58:40'),
(2, 6, 12, 'w', '2024-03-23 05:58:45'),
(3, 6, 12, 'www', '2024-03-23 05:58:48'),
(4, 8, 12, 'aaa', '2024-03-23 05:59:14'),
(5, 8, 12, 'aaa', '2024-03-23 05:59:17'),
(6, 8, 12, '111', '2024-03-23 06:02:14'),
(7, 8, 13, 'ww', '2024-03-23 06:04:55'),
(8, 8, 13, 'q', '2024-03-23 06:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `active`) VALUES
(2, '1', '$2y$10$2tzK33O45eHWrjNyBCF/AOcNWy2qn4PlorlOT21qMHx0WYHlrkJD.', 1),
(3, 'hello', '$2y$10$q8xJ4YIid.Mu3KleqLL3PuRCQysvay6HY7UPMGV3kLLhCjQTjZfQW', 1),
(4, 'a', '$2y$10$57RSSxEjq6/yG1D6NAYCS.yAAbkxmjVPC.clzIT6eZlrsMhJ/SwaK', 1),
(6, 'b', '$2y$10$X.zDhDq42xOTp.zyAvfhO.ys0L5NP8bR81xN0XzSnO4ixxiym5ZtS', 1),
(7, 'q', '$2y$10$WdacBQYMl7ps01K49LMoJ.ekZlw8G4lvAJdNxa7gGQZjhVyn3OkRC', 1),
(8, 'w', '$2y$10$qfeXXiVPnb.J6fHoo6rQReLIHIp1rcg4wapJAZMgwJ8IzFGT4RR8C', 1),
(9, '22', '$2y$10$Y.a2pwcnEmDLSY7bOnOHf.YF5WtyxxARu.nh8IaxHKrdgN14qB5RO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD PRIMARY KEY (`publication_comment_id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `publication_id` (`publication_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `publication_comment`
--
ALTER TABLE `publication_comment`
  MODIFY `publication_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD CONSTRAINT `publication_comment_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `publication_comment_ibfk_2` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`),
  ADD CONSTRAINT `publication_comment_ibfk_3` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
