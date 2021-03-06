-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2021 at 06:44 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_falcuty`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_falcuty`
--

INSERT INTO `tbl_faculty` (`id`, `name`) VALUES
(1, 'IT'),
(2, 'Business'),
(3, 'Graphic Design'),
(4, 'Marketing'),
(5, 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE IF NOT EXISTS `tbl_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_groupDoc` int(11) NOT NULL,
  `id_faculty` int(11) NOT NULL,
  `studentID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uploadDate` date NOT NULL,
  `document` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adminID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`id`, `id_groupDoc`, `id_faculty`, `studentID`, `title`, `uploadDate`, `document`, `image`, `status`, `adminID`, `description`) VALUES
(1, 1, 2, '1131060489', 'Marketing Methods', '2021-04-17', 'courseworks_coursework_2019_2020_Term_2_Level_6_COMP1787_term2_Collabs.2021-new.docx', 'quan-tri-marketing-la-gi.jpg','Unapproved', 0, 'afgrdtfghfgdsdasdafgj,hk.jh,jgm'),
(2, 2, 1, '1131060489', 'Javascript', '2021-04-17', 'courseworks_coursework_2019_2020_Term_2_Level_6_COMP1787_term2_Collabs.2021-new.docx', '8c4eed15a33744e996461692464ebc7f.jpg', 'Approved', 0, 'aegrhtrjytu,jhghfgbfrge'),
(3, 2, 1, '1131060418', 'Web developer', '2021-04-17', 'courseworks_coursework_2019_2020_Term_2_Level_6_COMP1787_term2_Collabs.2021-new.docx', 'react.png','Waiting', 0, 'bgfghfgdfsdascdv'),
(4, 3, 1, '1131060418', 'PHP', '2021-04-17', 'courseworks_coursework_2019_2020_Term_2_Level_6_COMP1787_term2_Collabs.2021-new.docx', 'php.jpg', 'Approved', 0, 'efhjmngfvsfeca'),
(5, 3, 3, '1131060489', 'Python', '2021-04-17', 'courseworks_coursework_2019_2020_Term_2_Level_6_COMP1787_term2_Collabs.2021-new.docx', 'vrvsrv.jpg', 'Waiting', 0, 'scdffjdrefwczdvdfwg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_faculty` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phoneNum` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `roles` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `password`, `id_faculty`, `fullname`, `dob`, `phoneNum`, `email`, `roles`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Nguy???n V??n Duy', '1990-08-06', '0986333920', 'giaovien@gmail.com', 'Admin'),
('coordinator', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Nguy???n ?????c Anh', '1989-08-07', '01234213622', 'ducanh@gmail.com', 'Coordinator'),
('manager', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Nguy???n Th??i B??nh', '1994-03-20', '0983465722', 'ntbinh200394@gmail.com', 'Marketing Manager');

-- 
-- --------------------------------------------------------

--
-- Table structure for table `tbl_groupDoc`
--

CREATE TABLE IF NOT EXISTS `tbl_groupDoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_groupDoc`
--

INSERT INTO `tbl_groupDoc` (`id`, `name`) VALUES
(1, 'Research'),
(2, 'Project'),
(3, 'Programming'),
(4, 'Java');


-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `studentID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_faculty` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phoneNum` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`studentID`, `password`, `fullname`, `id_faculty`, `dob`, `phoneNum`, `email`) VALUES
('1131060418', 'e10adc3949ba59abbe56e057f20f883e', 'Tr???n V??n T??n', 2, '1994-08-06', '0986333820', 'vantan@gmail.com'),
('1131060489', '615ad206666f8086103305b8f77173f4', 'Nguy???n Th??? Th???m', 1, '1994-08-07', '0988934888', 'thitham@gmail.com');

-- --------------------------------------------------------
