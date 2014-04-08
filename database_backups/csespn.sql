-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2014 at 11:20 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csespn`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(45) DEFAULT NULL,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `year_UNIQUE` (`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `display_name`, `year`) VALUES
(1, 'Batch 10 - ICE', '2010'),
(2, 'Batch 11 - CSE', '2011'),
(3, 'Batch 12 - ICE', '2012'),
(4, 'Batch 13', '2013');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `partner_type` enum('Basic','Premium','','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `partner_type`) VALUES
(1, 'UoM Students', 'Basic'),
(2, 'UoM Lecturers', 'Premium');

-- --------------------------------------------------------

--
-- Table structure for table `endorsements`
--

CREATE TABLE IF NOT EXISTS `endorsements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=243 ;

--
-- Dumping data for table `endorsements`
--

INSERT INTO `endorsements` (`id`, `technology_id`, `student_id`, `count`) VALUES
(199, 24, 1, 1),
(200, 25, 1, 1),
(201, 26, 1, 1),
(202, 27, 1, 1),
(203, 28, 1, 1),
(204, 29, 1, 1),
(205, 30, 1, 1),
(206, 31, 1, 1),
(207, 32, 1, 1),
(208, 33, 1, 1),
(209, 34, 1, 1),
(210, 35, 1, 1),
(211, 36, 1, 1),
(212, 37, 1, 1),
(213, 38, 1, 1),
(214, 39, 1, 1),
(215, 40, 1, 1),
(216, 41, 1, 1),
(217, 42, 1, 1),
(218, 43, 1, 1),
(219, 44, 1, 1),
(220, 45, 1, 1),
(221, 24, 1, 1),
(222, 25, 1, 1),
(223, 26, 1, 1),
(224, 27, 1, 1),
(225, 28, 1, 1),
(226, 29, 1, 1),
(227, 30, 1, 1),
(228, 31, 1, 1),
(229, 32, 1, 1),
(230, 33, 1, 1),
(231, 34, 1, 1),
(232, 35, 1, 1),
(233, 36, 1, 1),
(234, 37, 1, 1),
(235, 38, 1, 1),
(236, 39, 1, 1),
(237, 40, 1, 1),
(238, 41, 1, 1),
(239, 42, 1, 1),
(240, 43, 1, 1),
(241, 44, 1, 1),
(242, 45, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(45) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_org_idx` (`org_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `session_batchs`
--

CREATE TABLE IF NOT EXISTS `session_batchs` (
  `session_id` int(11) NOT NULL,
  `batch_id` varchar(45) NOT NULL,
  PRIMARY KEY (`session_id`,`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch` int(11) NOT NULL,
  `linkedin_id` varchar(255) NOT NULL,
  `gpa` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `batch`, `linkedin_id`, `gpa`, `description`) VALUES
(1, 2, '0I2andtpA7', '0.0', 'I am a third year undergraduate from the Department of Computer Science & Engineering, University of Moratuwa. My goal is to develop knowledge and competence in the field of information technology, share my knowledge and to provide the leadership.');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE IF NOT EXISTS `technologies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`) VALUES
(24, 'Software Development'),
(25, 'Team Leadership'),
(26, 'Systems Engineering'),
(27, 'Java'),
(28, 'JavaScript'),
(29, 'jQuery'),
(30, 'C++ Language'),
(31, 'Web Applications'),
(32, 'ASP.NET'),
(33, 'ASP.NET MVC'),
(34, 'C++'),
(35, 'C'),
(36, 'Software Engineering'),
(37, 'Eclipse'),
(38, 'Programming'),
(39, 'NetBeans'),
(40, 'MySQL'),
(41, 'SQL'),
(42, 'OOP'),
(43, 'C#'),
(44, 'JSP'),
(45, 'Android Development');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `linkedin_id` varchar(255) NOT NULL,
  `pic_url` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `linkedin_id`, `pic_url`, `company_id`, `profile_url`) VALUES
(22, 'Supun Nakandala', '0I2andtpA7', 'http://m.c.lnkd.licdn.com/mpr/mprx/0_RSNOt_wXpvHGdz6AM2BDt34vYKg7WK9AME8TthWzT9Wxnq3lBwk-p8jRKgjKoBcjVmnhgbBssJ2A', 1, 'http://www.linkedin.com/pub/supun-nakandala/58/210/36');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `session_org` FOREIGN KEY (`org_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
