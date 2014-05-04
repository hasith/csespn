-- --------------------------------------------------------
/*Drop the existing csespn databse and create new database*/
DROP DATABASE csespn;
CREATE DATABASE csespn;
USE csespn;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(45) DEFAULT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `year_UNIQUE` (`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `access_level` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `endorsements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  `date_confirmed` tinyint(1) NOT NULL,
  `time` time DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL COMMENT 'url of event fb page/web page',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL,
  `date` datetime DEFAULT NULL,
  `start_time` char(10) DEFAULT NULL,
  `duration` int(5) DEFAULT NULL,
  `resp_name` varchar(50) DEFAULT NULL,
  `resp_contact` varchar(10) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `session_org_idx` (`org_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `session_batches` (
  `session_id` int(11) NOT NULL,
  `batch_id` varchar(45) NOT NULL,
  PRIMARY KEY (`session_id`,`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `sponsorships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text,
  `taken_by` int(11) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `taken_by` (`taken_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch` int(11) NOT NULL,
  `linkedin_id` varchar(255) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  `oauth_token` varchar(255) NOT NULL,
  `oauth_token_secret` varchar(255) NOT NULL,
  `gpa` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `technologies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `linkedin_id` varchar(255) NOT NULL,
  `pic_url` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `research` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `resp_name` varchar(50) DEFAULT NULL,
  `resp_contact` varchar(10) DEFAULT NULL,  
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `research_tech__map` (
  `research_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL
);

ALTER TABLE `sessions`
  ADD CONSTRAINT `session_org` FOREIGN KEY (`org_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `sponsorships`
  ADD CONSTRAINT `taken_by` FOREIGN KEY (`taken_by`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
