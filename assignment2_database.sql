-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2024 at 04:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2_database`
--
CREATE DATABASE IF NOT EXISTS `assignment2_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `assignment2_database`;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`profile_id`) USING BTREE,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `middle_name`, `last_name`) VALUES
(17, 1, 'greg', 'groog', 'grag'),
(19, 3, 'yum', 'mmmm', 'ers');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `publication_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `publication_title` varchar(50) NOT NULL,
  `publication_text` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publication_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`publication_id`,`profile_id`),
  KEY `FK_Profile_ID_profile` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `publication_title`, `publication_text`, `timestamp`, `publication_status`) VALUES
(1, 17, 'Book about flowers', 'Anyone heard of the flower book coo', '2024-03-18 18:43:46', 1),
(2, 17, 'yellow book', 'Can I know the person ', '2024-03-17 21:12:20', 1),
(7, 19, 'Thinking is hard', 'I\'m a visual learner', '2024-03-21 04:01:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publication_comment`
--

DROP TABLE IF EXISTS `publication_comment`;
CREATE TABLE IF NOT EXISTS `publication_comment` (
  `publication_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `comment_text` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`publication_comment_id`,`profile_id`),
  KEY `publication_comment_ibfk_1` (`publication_id`),
  KEY `publication_comment_ibfk_2` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication_comment`
--

INSERT INTO `publication_comment` (`publication_comment_id`, `profile_id`, `publication_id`, `comment_text`, `timestamp`) VALUES
(1, 17, 2, 'This is great!!!!', '2024-03-18 00:35:41'),
(2, 17, 2, 'This is a test', '2024-03-18 00:35:41'),
(3, 17, 2, 'actually this is so cool', '2024-03-18 18:22:03'),
(12, 19, 1, 'I have!!!\r\n\r\nIts such a great book you gotta check it out sometime', '2024-03-21 04:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(1, 'greg', '$2y$10$2yM/SesPo0YU8Z3PHSkW7u4k3B54dEjRLxebnE7lJjohO32ufLxda'),
(3, 'Crackers', '$2y$10$0Pjztf5o/xdXufLnD3ZNuuIDxPFKsPiu1xdbwh.s3p7UpG6vmeXNa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `FK_Profile_ID_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD CONSTRAINT `publication_comment_ibfk_1` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publication_comment_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
