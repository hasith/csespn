
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
-- Table structure for table `orgs`
--

CREATE TABLE IF NOT EXISTS `orgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



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


-- --------------------------------------------------------


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `org` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`email`),
  KEY `role` (`role`),
  KEY `org` (`org`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`org`) REFERENCES `orgs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Table structure for table `technologies`
--

CREATE TABLE IF NOT EXISTS `technologies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------
--
-- Table structure for table `endorsements`
--

CREATE TABLE `endorsements` (
  `endorser` int(11) NOT NULL,
  `endorsee` int(11) NOT NULL,
  `technology` int(11) NOT NULL,
  PRIMARY KEY (`endorser`,`endorsee`,`technology`),
  KEY `endorsee` (`endorsee`),
  KEY `technology` (`technology`),
  CONSTRAINT `endorsements_ibfk_1` FOREIGN KEY (`endorser`) REFERENCES `users` (`id`),
  CONSTRAINT `endorsements_ibfk_2` FOREIGN KEY (`endorsee`) REFERENCES `users` (`id`),
  CONSTRAINT `endorsements_ibfk_3` FOREIGN KEY (`technology`) REFERENCES `technologies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--
CREATE TABLE `csespn`.`sessions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `timestamp` DATETIME NULL,
  `org_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `session_org_idx` (`org_id` ASC),
  CONSTRAINT `session_org`
    FOREIGN KEY (`org_id`)
    REFERENCES `csespn`.`orgs` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE);
    
-- --------------------------------------------------------

--
-- Table structure for table `batches`
--
    
CREATE TABLE `csespn`.`batches` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `display_name` VARCHAR(45) NULL,
  `year` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `year_UNIQUE` (`year` ASC));
    
-- --------------------------------------------------------

--
-- Table structure for table `session_batchs`
--
CREATE TABLE `csespn`.`session_batchs` (
  `session_id` INT NOT NULL,
  `batch_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`session_id`, `batch_id`));
  

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
