
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
-- Table structure for table `companies`
--
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `partner_type` enum('Basic','Premium','','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


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
  `batch` int(11) NOT NULL,
  `linkedin_id` varchar(255) NOT NULL,
  `gpa` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------


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

CREATE TABLE IF NOT EXISTS `endorsements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=243 ;


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
    REFERENCES `csespn`.`companies` (`id`)
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