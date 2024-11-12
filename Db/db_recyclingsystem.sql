-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2024 at 11:07 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_recyclingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(19, 'Admin', '9098765645', 'admin@gmail.com', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collectiondetails`
--

CREATE TABLE IF NOT EXISTS `tbl_collectiondetails` (
  `collectiondetails_id` int(11) NOT NULL AUTO_INCREMENT,
  `wastetype_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `collectiondetails_qty` varchar(100) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `collectionhead_id` int(11) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `collection_status` int(20) NOT NULL DEFAULT '0',
  `collection_date` varchar(100) NOT NULL,
  PRIMARY KEY (`collectiondetails_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `tbl_collectiondetails`
--

INSERT INTO `tbl_collectiondetails` (`collectiondetails_id`, `wastetype_id`, `unit_id`, `collectiondetails_qty`, `rate_id`, `collectionhead_id`, `total_amount`, `collection_status`, `collection_date`) VALUES
(102, 11, 4, '500', 22, 39, '27900', 0, '2024-11-12'),
(103, 13, 5, '100', 24, 39, '27900', 0, '2024-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collectionhead`
--

CREATE TABLE IF NOT EXISTS `tbl_collectionhead` (
  `collectionhead_id` int(11) NOT NULL AUTO_INCREMENT,
  `collectionhead_date` date NOT NULL,
  `wastepicker_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `collection_status` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`collectionhead_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl_collectionhead`
--

INSERT INTO `tbl_collectionhead` (`collectionhead_id`, `collectionhead_date`, `wastepicker_id`, `user_id`, `ward_id`, `collection_status`) VALUES
(39, '2024-11-12', 23, 21, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE IF NOT EXISTS `tbl_complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_message` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_replydate` varchar(100) NOT NULL,
  `complaint_status` int(20) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_date` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_message` varchar(100) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate`
--

CREATE TABLE IF NOT EXISTS `tbl_rate` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_amount` int(11) NOT NULL,
  `wastetype_id` int(11) NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_rate`
--

INSERT INTO `tbl_rate` (`rate_id`, `rate_amount`, `wastetype_id`) VALUES
(22, 50, 11),
(23, 100, 12),
(24, 60, 13),
(25, 30, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_date` date NOT NULL,
  `wastepicker_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `schedule_date`, `wastepicker_id`, `ward_id`) VALUES
(18, '2024-11-13', 23, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_qty` varchar(100) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit_qty`) VALUES
(4, 'Kilogram(Kg)'),
(5, 'Gram(g)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `user_housename` varchar(100) NOT NULL,
  `user_houseno` int(50) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_aadhar` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '0',
  `user_photo` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `ward_id`, `user_housename`, `user_houseno`, `user_gender`, `user_contact`, `user_email`, `user_password`, `user_aadhar`, `user_status`, `user_photo`) VALUES
(21, 'Robert Mathew', 19, 'Vadakkethil (H) ', 345, 'Male', '4567342891', 'robert2001@gmail.com', 'Robert@2001', '234567890241', 1, 'images (1).jpg'),
(22, 'Andrew Garfield', 20, 'Thekedath', 567, 'Male', '9076634218', 'andrew34@gmail.com', 'Andrew@21', '896542348034', 0, 'view-world-monument-celebrate-world-heritage-day_23-2151297243.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ward`
--

CREATE TABLE IF NOT EXISTS `tbl_ward` (
  `ward_id` int(11) NOT NULL AUTO_INCREMENT,
  `ward_no` varchar(20) NOT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_ward`
--

INSERT INTO `tbl_ward` (`ward_id`, `ward_no`) VALUES
(19, 'ward 1'),
(20, 'ward 2'),
(21, 'ward 3'),
(22, 'ward 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wastepicker`
--

CREATE TABLE IF NOT EXISTS `tbl_wastepicker` (
  `wastepicker_id` int(11) NOT NULL AUTO_INCREMENT,
  `wastepicker_name` varchar(20) NOT NULL,
  `wastepicker_address` varchar(50) NOT NULL,
  `wastepicker_gender` varchar(10) NOT NULL,
  `wastepicker_dob` date NOT NULL,
  `wastepicker_age` int(2) NOT NULL,
  `wastepicker_contact` varchar(10) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `wastepicker_email` varchar(50) NOT NULL,
  `wastepicker_password` varchar(10) NOT NULL,
  `wastepicker_aadhar` varchar(50) NOT NULL,
  `wastepicker_license` varchar(500) NOT NULL,
  `wastepicker_photo` varchar(500) NOT NULL,
  `wastepicker_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`wastepicker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_wastepicker`
--

INSERT INTO `tbl_wastepicker` (`wastepicker_id`, `wastepicker_name`, `wastepicker_address`, `wastepicker_gender`, `wastepicker_dob`, `wastepicker_age`, `wastepicker_contact`, `ward_id`, `wastepicker_email`, `wastepicker_password`, `wastepicker_aadhar`, `wastepicker_license`, `wastepicker_photo`, `wastepicker_status`) VALUES
(23, 'Richard James', 'Rosevilla', 'male', '2003-11-10', 20, '4567823456', 19, 'richard2003@gmail.com', 'Richard@20', 'college edited.JPG', '2972534.jpg', 'tulip.jpg', 1),
(24, 'Tom Holland', 'Tomvilla', 'male', '2001-07-14', 23, '5638977234', 20, 'tom@gmail.com', 'Tom@2001', 'art.jpg', 'recycleindexfirst.jpg', 'college edited.JPG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wastetype`
--

CREATE TABLE IF NOT EXISTS `tbl_wastetype` (
  `wastetype_id` int(11) NOT NULL AUTO_INCREMENT,
  `wastetype_name` varchar(50) NOT NULL,
  `wastetype_image` varchar(50) NOT NULL,
  PRIMARY KEY (`wastetype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_wastetype`
--

INSERT INTO `tbl_wastetype` (`wastetype_id`, `wastetype_name`, `wastetype_image`) VALUES
(11, 'plastic', '2972534.jpg'),
(12, 'E -waste', 'ac556aaf712b70a2d8552c4ac8879a0d.jpg'),
(13, 'Metal', 'gratisography-covered-in-confetti-800x525.jpg'),
(14, 'Old Fabric', 'recycle-samll_Small.webp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
