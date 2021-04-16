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

--
-- Database: `quanlydoan_tailieu`
--

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
(4, 'Marketing');

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
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adminID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`id`, `id_groupDoc`, `id_faculty`, `studentID`, `title`, `uploadDate`, `document`, `status`, `adminID`, `description`) VALUES
(1, 2, 1, '1131060418', 'Phần mềm quản lý điểm THPT', '2021-10-06', 'phan mem quan ly diem THPT.rar', 'Đã duyệt', 'giaovien', ''),
(3, 3, 1, '1131060489', 'Đồ án xây dựng website bán hàng', '2021-10-07', 'do an.rar', 'Không được duyệt', '', ''),
(4, 2, 2, '1131060418', 'Đồ án điện', '2021-12-10', 'Chrysanthemum.jpg', 'Chưa duyệt', '0', ''),
(5, 1, 2, '1131060418', 'aaaaâ', '2021-12-28', 'Chrysanthemum.jpg', 'Đã duyệt', '', '');

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
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Nguyễn Văn Duy', '1990-08-06', '0986333920', 'giaovien@gmail.com', 'Admin'),
('giaovien', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Nguyễn Đức Anh', '1989-08-07', '01234213622', 'ducanh@gmail.com', 'Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hedaotao`
--

-- CREATE TABLE IF NOT EXISTS `tbl_hedaotao` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- --
-- -- Dumping data for table `tbl_hedaotao`
-- --

-- INSERT INTO `tbl_hedaotao` (`id`, `name`) VALUES
-- (1, 'Đại học chính quy'),
-- (2, 'Cao đẳng chính quy'),
-- (3, 'Liên thông CĐ - ĐH'),
-- (4, 'Liên thông TC - ĐH'),
-- (5, 'Tại chức');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khoahoc`
--

-- CREATE TABLE IF NOT EXISTS `tbl_khoahoc` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --
-- -- Dumping data for table `tbl_khoahoc`
-- --

-- INSERT INTO `tbl_khoahoc` (`id`, `name`) VALUES
-- (1, 'Khóa 1'),
-- (2, 'Khóa 2'),
-- (3, 'Khóa 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lophoc`
--

-- CREATE TABLE IF NOT EXISTS `tbl_lophoc` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `id_hedaotao` int(11) NOT NULL,
--   `id_khoahoc` int(11) NOT NULL,
--   `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --
-- -- Dumping data for table `tbl_lophoc`
-- --

-- INSERT INTO `tbl_lophoc` (`id`, `id_hedaotao`, `id_khoahoc`, `name`) VALUES
-- (1, 1, 1, 'Khoa học máy tính 1'),
-- (2, 1, 1, 'Khoa học máy tính 2'),
-- (3, 1, 1, 'Khoa học máy tính 4');

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
(1, 'Tìm hiểu và nghiên cứu'),
(2, 'Xây dựng sản phẩm thực tế'),
(3, 'Lập trình');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhomtailieu`
--

-- CREATE TABLE IF NOT EXISTS `tbl_nhomtailieu` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --
-- -- Dumping data for table `tbl_nhomtailieu`
-- --

-- INSERT INTO `tbl_nhomtailieu` (`id`, `name`) VALUES
-- (1, 'Lập trình PHP'),
-- (2, 'Lập trình Winform');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `studentID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  -- `id_lophoc` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phoneNum` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`studentID`, `password`, `fullname`, `dob`, `phoneNum`, `email`) VALUES
('1131060418', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Văn Tân', '1994-08-06', '0986333820', 'vantan@gmail.com'),
('1131060489', '615ad206666f8086103305b8f77173f4', 'Nguyễn Thị Thắm', '1994-08-07', '0988934888', 'thitham@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tailieu`
--

-- CREATE TABLE IF NOT EXISTS `tbl_tailieu` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `id_nhomtailieu` int(11) NOT NULL,
--   `id_faculty` int(11) NOT NULL,
--   `adminID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
--   `tentailieu` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
--   `hinhanh` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
--   `noidung` longtext COLLATE utf8_unicode_ci NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --
-- -- Dumping data for table `tbl_tailieu`
-- --

-- INSERT INTO `tbl_tailieu` (`id`, `id_nhomtailieu`, `id_faculty`, `adminID`, `tentailieu`, `hinhanh`, `noidung`) VALUES
-- (1, 1, 1, 'giaovien', 'Giáo trình PHP', '5663f221-d9d9d09aa7.jpg', 'ssssssssssssssssss'),
-- (3, 1, 1, 'giaovien', 'Hướng dẫn tạo forum', 'book-xxl.png', 'ssssssssssss');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;