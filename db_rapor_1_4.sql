-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 17, 2020 at 12:23 PM
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
(1, 'MINU Karakter Bojonegoro', NULL, NULL, NULL);

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
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t001_sekolah', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t201_employees', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t202_userlevels', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t203_userlevelpermissions', 0),
(-2, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t204_audittrail', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t001_sekolah', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t201_employees', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t202_userlevels', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t203_userlevelpermissions', 0),
(-2, '{5AD54D4D-CCFB-4098-9C1D-F67CF7652422}t204_audittrail', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}c201_home.php', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t001_sekolah', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t201_employees', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t202_userlevels', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t203_userlevelpermissions', 0),
(0, '{3C5552E0-8BEE-4542-ADE6-BB9DE9BAE233}t204_audittrail', 0),
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
(30, '2020-03-17 11:18:23', '/rapor-1.4/logout.php', 'admin', 'logout', '::1', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t001_sekolah`
--
ALTER TABLE `t001_sekolah`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t001_sekolah`
--
ALTER TABLE `t001_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
