-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2016 at 06:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `js16_stand`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_custom_fields`
--

CREATE TABLE IF NOT EXISTS `user_custom_fields` (
  `user_id` int(11) unsigned NOT NULL,
  `attribute` varchar(50) NOT NULL DEFAULT '',
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_custom_fields`
--

INSERT INTO `user_custom_fields` (`user_id`, `attribute`, `value`) VALUES
(2, 'standSize', '3'),
(3, 'standSize', '2'),
(4, 'standSize', '4'),
(5, 'standSize', '4'),
(6, 'standSize', '4'),
(7, 'standSize', '4'),
(8, 'standSize', '3'),
(9, 'standSize', '3'),
(10, 'standSize', '3'),
(11, 'standSize', '2'),
(12, 'standSize', '2'),
(13, 'standSize', '2'),
(14, 'standSize', '2'),
(15, 'standSize', '2'),
(16, 'standSize', '2'),
(17, 'standSize', '2'),
(18, 'standSize', '2'),
(19, 'standSize', '2'),
(20, 'standSize', '2'),
(21, 'standSize', '2'),
(22, 'standSize', '2'),
(23, 'standSize', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
