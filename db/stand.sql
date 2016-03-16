-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2016 at 06:05 PM
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
-- Table structure for table `stand`
--

CREATE TABLE IF NOT EXISTS `stand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_reserved` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `stand`
--

INSERT INTO `stand` (`id`, `size`, `name`, `is_reserved`, `user_id`) VALUES
(1, 4, 'Stand1', 0, NULL),
(2, 4, 'Stand2', 0, NULL),
(3, 4, 'Stand3', 0, NULL),
(4, 2, 'Stand4', 0, NULL),
(5, 2, 'Stand5', 0, NULL),
(6, 2, 'Stand6', 0, NULL),
(7, 2, 'Stand7', 0, NULL),
(8, 2, 'Stand8', 0, NULL),
(9, 2, 'Stand9', 0, NULL),
(10, 3, 'Stand10', 0, NULL),
(11, 3, 'Stand11', 0, NULL),
(12, 2, 'Stand12', 0, NULL),
(13, 2, 'Stand13', 0, NULL),
(14, 3, 'Stand14', 0, NULL),
(15, 2, 'Stand15', 0, NULL),
(16, 2, 'Stand16', 0, NULL),
(17, 2, 'Stand17', 0, NULL),
(18, 2, 'Stand18', 0, NULL),
(19, 2, 'Stand19', 0, NULL),
(20, 2, 'Stand20', 0, NULL),
(21, 2, 'Stand21', 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
