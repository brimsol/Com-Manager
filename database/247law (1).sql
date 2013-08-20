-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2013 at 01:49 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `247law`
--

-- --------------------------------------------------------

--
-- Table structure for table `247_cities`
--

CREATE TABLE IF NOT EXISTS `247_cities` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_name` varchar(200) DEFAULT NULL,
  `city_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `247_countries`
--

CREATE TABLE IF NOT EXISTS `247_countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `country_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `247_main_statements`
--

CREATE TABLE IF NOT EXISTS `247_main_statements` (
  `main_statement_id` int(11) NOT NULL,
  `main_statement_name` varchar(200) DEFAULT NULL,
  `offence_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`main_statement_id`),
  KEY `offence_id` (`offence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `247_offences`
--

CREATE TABLE IF NOT EXISTS `247_offences` (
  `offence_id` int(11) NOT NULL,
  `offence_name` varchar(200) DEFAULT NULL,
  `offence_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`offence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `247_states`
--

CREATE TABLE IF NOT EXISTS `247_states` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_name` varchar(200) DEFAULT NULL,
  `state_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `247_users`
--

CREATE TABLE IF NOT EXISTS `247_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `username` varchar(250) NOT NULL COMMENT 'User Name',
  `password` varchar(225) NOT NULL COMMENT 'Hashed Password',
  `role` int(11) NOT NULL COMMENT 'User Role',
  `status` int(2) NOT NULL COMMENT 'User Status(active or Inactive)',
  `created_by` int(11) NOT NULL DEFAULT '0' COMMENT 'Who created this user(0 for Dev)',
  `online_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Who is online(0 for offlie,1 for online)',
  `last_loggedin` datetime NOT NULL COMMENT 'Time of last loggedin',
  `last_loggedin_ip` varchar(20) NOT NULL COMMENT 'Last Loggedin IP',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'User Created Time',
  `updated_at` datetime NOT NULL COMMENT 'User Updated time',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `USERNAME` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `247_users`
--

INSERT INTO `247_users` (`user_id`, `username`, `password`, `role`, `status`, `created_by`, `online_status`, `last_loggedin`, `last_loggedin_ip`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 1, 1, 1, 0, '2013-07-31 09:44:23', '', '2013-07-29 12:52:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `247_user_details`
--

CREATE TABLE IF NOT EXISTS `247_user_details` (
  `user_details_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'user_id from users table',
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `contact_no_alt` varchar(20) DEFAULT NULL COMMENT 'contact number alternative',
  `profile_image` varchar(100) DEFAULT NULL COMMENT 'profile image file name',
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `temp_address` varchar(300) DEFAULT NULL,
  `temp_city` int(11) DEFAULT NULL,
  `temp_state` int(11) DEFAULT NULL,
  `temp_country` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_details_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `country` (`country`),
  KEY `state` (`state`),
  KEY `city` (`city`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table which holds user details';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `247_cities`
--
ALTER TABLE `247_cities`
  ADD CONSTRAINT `state_id` FOREIGN KEY (`state_id`) REFERENCES `247_states` (`state_id`);

--
-- Constraints for table `247_main_statements`
--
ALTER TABLE `247_main_statements`
  ADD CONSTRAINT `offence_id` FOREIGN KEY (`offence_id`) REFERENCES `247_offences` (`offence_id`);

--
-- Constraints for table `247_states`
--
ALTER TABLE `247_states`
  ADD CONSTRAINT `country_id` FOREIGN KEY (`country_id`) REFERENCES `247_countries` (`country_id`);

--
-- Constraints for table `247_user_details`
--
ALTER TABLE `247_user_details`
  ADD CONSTRAINT `state` FOREIGN KEY (`state`) REFERENCES `247_states` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `city` FOREIGN KEY (`city`) REFERENCES `247_cities` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `country` FOREIGN KEY (`country`) REFERENCES `247_countries` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `247_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
