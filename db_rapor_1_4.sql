-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 02, 2020 at 02:12 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rapor_1_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `t001_sekolah`
--

CREATE TABLE `t001_sekolah` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text DEFAULT NULL,
  `KepalaSekolah` varchar(50) DEFAULT NULL,
  `NIPKepalaSekolah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t001_sekolah`
--

INSERT INTO `t001_sekolah` (`id`, `Nama`, `Alamat`, `KepalaSekolah`, `NIPKepalaSekolah`) VALUES
(1, 'MINU Karakter Bojonegoro', NULL, NULL, NULL),
(2, 'MINU Unggulan Bojonegoro', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t002_tahunajaran`
--

CREATE TABLE `t002_tahunajaran` (
  `id` int(11) NOT NULL,
  `Mulai` varchar(4) NOT NULL,
  `Selesai` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t002_tahunajaran`
--

INSERT INTO `t002_tahunajaran` (`id`, `Mulai`, `Selesai`) VALUES
(1, '2019', '2020'),
(2, '2020', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `t101_session`
--

CREATE TABLE `t101_session` (
  `id` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_jam` datetime NOT NULL,
  `session_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t201_employees`
--

CREATE TABLE `t201_employees` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `TitleOfCourtesy` varchar(25) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `HomePhone` varchar(24) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` longtext DEFAULT NULL,
  `ReportsTo` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `UserLevel` int(11) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Activated` enum('Y','N') NOT NULL DEFAULT 'N',
  `Profile` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t201_employees`
--

INSERT INTO `t201_employees` (`EmployeeID`, `LastName`, `FirstName`, `Title`, `TitleOfCourtesy`, `BirthDate`, `HireDate`, `Address`, `City`, `Region`, `PostalCode`, `Country`, `HomePhone`, `Extension`, `Email`, `Photo`, `Notes`, `ReportsTo`, `Password`, `UserLevel`, `Username`, `Activated`, `Profile`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', -1, 'admin', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t202_userlevels`
--

CREATE TABLE `t202_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t202_userlevels`
--

INSERT INTO `t202_userlevels` (`userlevelid`, `userlevelname`) VALUES
(-2, 'Anonymous'),
(-1, 'Administrator'),
(0, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `t203_userlevelpermissions`
--

CREATE TABLE `t203_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t203_userlevelpermissions`
--

INSERT INTO `t203_userlevelpermissions` (`userlevelid`, `tablename`, `permission`) VALUES
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c201_home.php', 72),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c202_home.php', 72),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t001_sekolah', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t002_tahunajaran', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t101_session', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t201_employees', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t202_userlevels', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t203_userlevelpermissions', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t204_audittrail', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t205_default', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t001_sekolah', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t201_employees', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t202_userlevels', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t203_userlevelpermissions', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t204_audittrail', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c201_home.php', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c202_home.php', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t001_sekolah', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t002_tahunajaran', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t101_session', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t201_employees', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t202_userlevels', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t203_userlevelpermissions', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t204_audittrail', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t205_default', 0),
(0, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t001_sekolah', 0),
(0, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t201_employees', 0),
(0, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t202_userlevels', 0),
(0, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t203_userlevelpermissions', 0),
(0, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t204_audittrail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t204_audittrail`
--

CREATE TABLE `t204_audittrail` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext DEFAULT NULL,
  `oldvalue` longtext DEFAULT NULL,
  `newvalue` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t204_audittrail`
--

INSERT INTO `t204_audittrail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(1, '2020-03-17 07:13:57', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(2, '2020-03-17 07:16:47', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(3, '2020-03-17 07:17:41', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(4, '2020-03-17 07:24:25', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(5, '2020-03-17 07:24:27', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(6, '2020-03-17 07:24:38', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(7, '2020-03-17 07:28:15', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(8, '2020-03-17 07:30:40', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(9, '2020-03-17 07:32:54', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(10, '2020-03-17 07:34:29', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(11, '2020-03-17 08:46:50', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(12, '2020-03-17 08:47:14', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(13, '2020-03-17 08:53:18', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(14, '2020-03-17 08:53:22', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(15, '2020-03-17 08:57:18', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(16, '2020-03-17 08:57:24', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(17, '2020-03-17 08:57:44', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(18, '2020-03-17 08:58:03', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(19, '2020-03-17 08:58:29', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(20, '2020-03-17 08:58:35', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(21, '2020-03-17 08:58:55', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(22, '2020-03-17 08:59:07', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(23, '2020-03-17 10:19:37', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(24, '2020-03-17 10:29:14', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(25, '2020-03-17 10:33:27', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(26, '2020-03-17 10:35:23', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(27, '2020-03-17 10:37:24', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(28, '2020-03-17 10:38:39', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(29, '2020-03-17 10:39:09', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(30, '2020-03-17 11:18:23', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(31, '2020-03-18 03:27:45', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(32, '2020-03-18 03:34:25', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(33, '2020-03-18 03:34:33', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(34, '2020-03-18 10:47:55', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(35, '2020-03-18 10:48:25', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(36, '2020-03-18 10:48:37', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(37, '2020-03-18 10:52:18', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(38, '2020-03-18 10:58:11', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(39, '2020-03-18 10:58:17', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(40, '2020-03-18 11:04:28', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(41, '2020-03-18 11:04:39', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(42, '2020-03-18 11:08:39', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(43, '2020-03-18 11:08:46', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(44, '2020-03-18 11:11:46', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(45, '2020-03-18 11:11:50', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(46, '2020-03-18 11:14:12', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(47, '2020-03-18 11:14:17', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(48, '2020-03-18 11:15:44', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(49, '2020-03-18 11:15:49', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(50, '2020-03-18 11:16:56', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(51, '2020-03-18 11:43:32', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(52, '2020-03-19 02:40:10', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(53, '2020-03-19 04:39:18', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(54, '2020-03-19 04:39:27', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(55, '2020-03-19 05:07:57', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(56, '2020-03-19 05:08:06', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(57, '2020-03-19 05:08:35', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(58, '2020-03-19 05:08:44', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(59, '2020-03-19 05:11:25', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(60, '2020-03-19 05:11:29', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(61, '2020-03-19 05:15:34', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(62, '2020-03-19 05:15:41', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(63, '2020-03-19 08:10:13', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(64, '2020-03-19 08:10:21', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(65, '2020-03-19 08:40:34', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(66, '2020-03-19 08:40:43', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(67, '2020-03-19 09:30:43', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(68, '2020-03-19 09:30:50', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(69, '2020-03-19 10:27:43', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(70, '2020-03-19 10:27:51', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(71, '2020-03-19 10:35:22', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(72, '2020-03-19 10:35:27', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(73, '2020-03-20 01:54:12', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(74, '2020-03-20 01:56:53', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(75, '2020-03-20 01:57:01', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(76, '2020-03-20 01:59:06', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(77, '2020-03-20 01:59:11', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(78, '2020-03-20 02:05:57', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(79, '2020-03-20 02:06:05', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(80, '2020-03-20 02:07:35', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(81, '2020-03-20 02:07:58', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(82, '2020-03-20 02:09:54', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(83, '2020-03-20 02:10:02', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(84, '2020-03-20 02:16:16', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(85, '2020-03-20 02:16:23', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(86, '2020-03-20 02:20:49', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(87, '2020-03-20 02:21:00', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(88, '2020-03-20 02:24:56', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(89, '2020-03-20 02:25:02', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(90, '2020-03-20 02:27:28', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(91, '2020-03-20 02:27:34', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(92, '2020-03-20 02:33:09', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(93, '2020-03-20 02:33:16', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(94, '2020-03-20 02:34:21', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(95, '2020-03-20 02:34:26', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(96, '2020-03-20 02:34:42', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(97, '2020-03-20 03:30:24', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(98, '2020-03-20 03:30:38', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(99, '2020-03-20 03:31:04', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(100, '2020-03-20 03:35:32', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(101, '2020-03-20 03:35:37', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(102, '2020-03-20 03:36:01', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(103, '2020-03-20 04:19:54', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(104, '2020-03-20 04:20:18', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(105, '2020-03-20 04:22:52', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(106, '2020-03-20 08:16:26', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(107, '2020-03-20 08:16:30', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(108, '2020-03-20 08:43:17', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(109, '2020-03-20 08:43:25', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(110, '2020-03-20 08:43:41', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(111, '2020-03-20 08:43:45', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(112, '2020-03-20 09:25:08', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(113, '2020-03-20 09:25:22', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(114, '2020-03-20 09:30:21', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(115, '2020-03-20 09:30:25', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(116, '2020-03-20 09:36:11', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(117, '2020-03-20 09:36:16', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(118, '2020-03-21 06:28:01', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(119, '2020-03-21 06:28:14', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(120, '2020-03-21 06:28:18', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(121, '2020-03-21 08:24:49', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(122, '2020-03-21 08:39:08', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(123, '2020-03-21 08:39:33', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(124, '2020-03-21 08:39:38', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(125, '2020-03-21 09:00:48', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(126, '2020-03-21 09:00:59', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(127, '2020-03-23 06:53:19', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(128, '2020-03-23 07:40:05', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(129, '2020-03-23 07:40:09', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(130, '2020-03-24 04:18:05', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(131, '2020-03-24 04:18:13', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(132, '2020-03-24 04:22:11', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(133, '2020-03-24 04:22:16', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(134, '2020-03-24 04:24:01', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(135, '2020-03-24 04:24:04', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(136, '2020-03-24 04:27:02', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(137, '2020-03-24 04:27:05', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(138, '2020-04-02 07:29:55', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(139, '2020-04-02 07:30:33', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(140, '2020-04-02 07:30:38', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(141, '2020-04-02 11:52:43', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(142, '2020-04-02 11:52:56', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', ''),
(143, '2020-04-02 11:54:41', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(144, '2020-04-02 11:54:56', '/rapor-1.4/login.php', 'admin', 'login', '::1', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t205_default`
--

CREATE TABLE `t205_default` (
  `id` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Field_ID` varchar(25) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t205_default`
--

INSERT INTO `t205_default` (`id`, `User_ID`, `Field_ID`, `Keterangan`, `Nilai`) VALUES
(1, 1, 'sekolah_id', 'Sekolah', '1'),
(2, 1, 'tahunajaran_id', 'Tahun Ajaran', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t001_sekolah`
--
ALTER TABLE `t001_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t002_tahunajaran`
--
ALTER TABLE `t002_tahunajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t101_session`
--
ALTER TABLE `t101_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t201_employees`
--
ALTER TABLE `t201_employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `t202_userlevels`
--
ALTER TABLE `t202_userlevels`
  ADD PRIMARY KEY (`userlevelid`);

--
-- Indexes for table `t203_userlevelpermissions`
--
ALTER TABLE `t203_userlevelpermissions`
  ADD PRIMARY KEY (`userlevelid`,`tablename`);

--
-- Indexes for table `t204_audittrail`
--
ALTER TABLE `t204_audittrail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t205_default`
--
ALTER TABLE `t205_default`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t001_sekolah`
--
ALTER TABLE `t001_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t002_tahunajaran`
--
ALTER TABLE `t002_tahunajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t101_session`
--
ALTER TABLE `t101_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t201_employees`
--
ALTER TABLE `t201_employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t204_audittrail`
--
ALTER TABLE `t204_audittrail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `t205_default`
--
ALTER TABLE `t205_default`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
