-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2014 at 01:16 AM
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
-- Table structure for table `endorsements`
--

CREATE TABLE IF NOT EXISTS `endorsements` (
  `endorser` int(11) NOT NULL,
  `endorsee` int(11) NOT NULL,
  `technology` int(11) NOT NULL,
  PRIMARY KEY (`endorser`,`endorsee`,`technology`),
  KEY `endorsee` (`endorsee`),
  KEY `technology` (`technology`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `endorsements`
--

INSERT INTO `endorsements` (`endorser`, `endorsee`, `technology`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

CREATE TABLE IF NOT EXISTS `orgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`id`, `name`) VALUES
(1, '99XTechnology');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Company'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pending_internship` tinyint(1) NOT NULL DEFAULT '0',
  `pending_graduation` tinyint(1) NOT NULL DEFAULT '0',
  `gpa` double NOT NULL,
  `course` enum('CSE','ICE','','') NOT NULL,
  `linkedin_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `image_path`, `description`, `pending_internship`, `pending_graduation`, `gpa`, `course`, `linkedin_url`) VALUES
(1, 1, 'img5.jpg', 'Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.', 1, 0, 4.1, 'CSE', 'http://www.google.lk'),
(2, 1, 'img5.jpg', 'Passionate in dynamic field of Computer Science & Engineering and to explore new technology, new perceptions and diverse thinking patterns. Yet, not restricted as a computer science geek, but passionate in experiencing diverse fields and people. Proven myself to be successful in team work and leadership.', 1, 1, 2.3, 'ICE', 'http://www.google.lk');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE IF NOT EXISTS `technologies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`) VALUES
(1, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `org` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`email`),
  KEY `role` (`role`),
  KEY `org` (`org`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `display_name`, `email`, `role`, `org`) VALUES
(1, 'Supun Nakandala', '99XTechnology', 'supun.nakandala@gmail.com', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `endorsements`
--
ALTER TABLE `endorsements`
  ADD CONSTRAINT `endorsements_ibfk_1` FOREIGN KEY (`endorser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `endorsements_ibfk_2` FOREIGN KEY (`endorsee`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `endorsements_ibfk_3` FOREIGN KEY (`technology`) REFERENCES `technologies` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`org`) REFERENCES `orgs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
