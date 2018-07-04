-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 03:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freelancinggig_tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `agent` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `address_ibfk_1` (`agent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `agent`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `country`, `zip_code`) VALUES
(66, 'sukant@gmail.com', 1, 'zvxjgs', 'bvmbmbb', 'alld', 'uttarpradesh', 'india', 22432),
(71, 'eius@gmail.com', 1, 'libero', 'quisquam', 'consequuntur', 'cum', 'nulla', 0),
(72, 'eius@gmail.com', 2, 'aliquam', 'aut', 'mollitia', 'dolorem', 'molestias', 0),
(73, 'sed@gmail.com', 1, 'rerum', 'aut', 'porro', 'excepturi', 'est', 0),
(74, 'sed@gmail.com', 2, 'veniam', 'qui', 'quibusdam', 'accusamus', 'in', 0);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `agent_id` int(15) NOT NULL AUTO_INCREMENT,
  `id` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` bigint(20) NOT NULL,
  `role` bigint(20) NOT NULL,
  `department` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`agent_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `id`, `password`, `last_login`, `role`, `department`, `status`, `rating`) VALUES
(12, 'sukant@gmail.com', 'password', 0, 1, 5, 0, 0),
(16, 'eius@gmail.com', 'password', 0, 2, 4, 0, 0),
(17, 'sed@gmail.com', 'password', 0, 2, 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` varchar(20) NOT NULL,
  `country_code` int(11) NOT NULL,
  `area_code` int(11) NOT NULL,
  `telephone_no` bigint(20) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `extension` bigint(20) NOT NULL,
  `personal_email_id` varchar(255) NOT NULL,
  `official_email_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `country_code`, `area_code`, `telephone_no`, `mobile_no`, `extension`, `personal_email_id`, `official_email_id`) VALUES
('eius@gmail.com', 0, 0, 0, 0, 0, 'Gavin_Skiles@gmail.com', 'Marilyne.Williamson59@gmail.com'),
('sed@gmail.com', 0, 0, 0, 0, 0, 'Rosa_Dickinson10@yahoo.com', 'Boris.Quitzon@hotmail.com'),
('sukant@gmail.com', 123, 123, 123456, 890789099, 767678, 'ab@ex.com', 'ab@ex.com');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `status`) VALUES
(4, 'Sales Department', 0),
(5, 'Technical Department', 0),
(33, 'new Department', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE IF NOT EXISTS `personal_info` (
  `id` varchar(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joining` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `date_of_joining`) VALUES
('eius@gmail.com', 'dignissimos', 'dicta', 1, '2183-12-05', '2291-03-01'),
('sed@gmail.com', 'ut', 'eaque', 1, '2921-01-02', '2279-10-07'),
('sukant@gmail.com', 'sukant', 'tiwari', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Departmental Head'),
(3, 'Agent');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ticket` bigint(20) NOT NULL,
  `agent` varchar(20) DEFAULT NULL,
  `text` text,
  `type` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket` (`ticket`),
  KEY `user` (`agent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `ticket`, `agent`, `text`, `type`, `date`, `status`) VALUES
(9, 11, 'rama@gmail.com', 'hbfghftgyt', 1, '2018-06-01 18:30:00', 1),
(37, 24, 'sukant@gmail.com', 'hvnjhgjmh', 1, '2018-06-21 08:27:17', 1),
(38, 11, 'rama@gmail.com', '65yrtyhgvnhv7utyhb ', 2, '2018-06-23 01:12:09', 1),
(40, 26, 'rama@gmail.com', 'zxczfcvd', 1, '2018-06-25 03:34:20', 1),
(43, 26, '-Select-', '', 2, '2018-06-25 07:59:09', 1),
(44, 26, 'tangle@gmail.com', '', 2, '2018-06-25 08:04:25', 1),
(45, 28, NULL, 'sdfsdsd', 1, '2018-06-25 09:01:10', 2),
(47, 30, 'sukant@gmail.com', 'dfdrgrtyhtujty', 1, '2018-06-27 07:53:27', 1),
(48, 31, NULL, 'Sequi a eum dolor tenetur. Qui quo suscipit pariatur voluptatem facere sit. Quaerat praesentium officia ullam itaque ratione.', 1, '2018-07-04 02:05:13', 2),
(49, 32, NULL, 'Beatae et tenetur fugit enim quos. Omnis officia commodi maiores consequuntur aut rerum. Fugit ducimus non architecto labore deserunt. Occaecati molestiae quae quasi non facere enim enim eos alias.', 1, '2018-07-04 02:20:39', 2),
(50, 33, NULL, 'Repudiandae ea quod officia illum quod magni. Laboriosam qui magnam. Illum voluptatem omnis nihil est ut.', 1, '2018-07-04 02:24:31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client` varchar(255) NOT NULL,
  `open_date` timestamp NOT NULL,
  `close_date` date DEFAULT NULL,
  `subject` varchar(200) NOT NULL,
  `service` varchar(255) NOT NULL,
  `department` bigint(20) NOT NULL,
  `priority` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `client`, `open_date`, `close_date`, `subject`, `service`, `department`, `priority`, `status`) VALUES
(11, 'nbghjgj', '2018-06-22 04:40:35', NULL, 'cbvcb', 'bvc', 5, 3, 3),
(19, 'nmhjk', '2018-06-19 06:28:51', NULL, 'hkjhyiy', 'jkhuyuii', 4, 2, 1),
(22, 'gfhfnhjg', '2018-06-19 09:14:03', NULL, 'nhjdtyhryh', 'fthftgbh', 4, 1, 3),
(24, 'CL0088', '2018-06-21 08:27:17', NULL, 'yghutuy', 'ANY', 4, 2, 3),
(26, 'CL7800', '2018-06-25 03:34:20', NULL, 'yghutuy', 'ANY', 5, 1, 3),
(28, 'sdf', '2018-06-25 09:01:10', NULL, 'sdf', 'sdf', 13, 2, 3),
(30, 'fgbfhg', '2018-06-27 07:53:27', NULL, 'fytuhtujyi', 'fghgyjhygt', 5, 1, 3),
(31, 'enim', '2018-07-04 02:05:13', NULL, 'iste', 'nihil', 4, 1, 2),
(32, 'modi', '2018-07-04 02:20:39', NULL, 'ex', 'architecto', 4, 1, 2),
(33, 'excepturi', '2018-07-04 02:24:31', NULL, 'optio', 'sunt', 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_agent`
--

CREATE TABLE IF NOT EXISTS `ticket_agent` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `ticket` bigint(20) NOT NULL,
  `agent` varchar(20) NOT NULL,
  `AgentStatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ticket_agent`
--

INSERT INTO `ticket_agent` (`id`, `ticket`, `agent`, `AgentStatus`) VALUES
(1, 26, '-Select-', 0),
(2, 26, 'tangle@gmail.com', 1),
(3, 27, 'neeraj.patel@gmail.c', 1),
(4, 30, 'sukant@gmail.com', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`agent`) REFERENCES `agent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id`) REFERENCES `agent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD CONSTRAINT `personal_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `agent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`ticket`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
