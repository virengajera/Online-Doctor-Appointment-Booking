-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2020 at 07:48 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `de`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointmentid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `timeslot` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `prescription` varchar(20) NOT NULL,
  `report_need` varchar(20) NOT NULL DEFAULT 'No',
  `description` varchar(20) NOT NULL,
  `clientid` int(20) NOT NULL,
  `doctorid` int(20) NOT NULL,
  PRIMARY KEY (`appointmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentid`, `date`, `timeslot`, `status`, `prescription`, `report_need`, `description`, `clientid`, `doctorid`) VALUES
(7, '2020-04-21', '01:20PM-06:40PM', 'not done', 'paracitamol lev', 'yes', 'Felling Lazy\r\nNot ok', 1, 2),
(8, '2020-04-20', '10:40PM-12:00PM', '', '', 'yes', 'Fever', 1, 2),
(9, '2020-04-23', '10:40PM-12:00PM', 'later', 'riphampsin', 'no', 'check', 2, 2),
(10, '2020-04-14', '10:20AM-09:40AM', 'good', 'yes', 'yes', 'no', 33, 2),
(11, '2020-04-22', '45', 'ok', 'gyjjmu', 'yes', 'bjk', 2, 2),
(12, '2020-04-21', '4163', 'good', 'bjksrv', 'yes', 'hio', 3, 2),
(13, '2020-04-21', '', 'done', 'paracitamol', 'no', 'not good', 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `clientlogin`
--

DROP TABLE IF EXISTS `clientlogin`;
CREATE TABLE IF NOT EXISTS `clientlogin` (
  `clientid` int(20) NOT NULL AUTO_INCREMENT,
  `clientname` varchar(20) NOT NULL,
  `clientpassword` varchar(20) NOT NULL,
  `clientemail` varchar(20) NOT NULL,
  `phoneno` bigint(10) NOT NULL,
  `bloodgroup` varchar(3) NOT NULL,
  `address` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `age` int(2) NOT NULL,
  `allergy` varchar(25) NOT NULL,
  PRIMARY KEY (`clientid`),
  UNIQUE KEY `clientname` (`clientname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientlogin`
--

INSERT INTO `clientlogin` (`clientid`, `clientname`, `clientpassword`, `clientemail`, `phoneno`, `bloodgroup`, `address`, `dob`, `age`, `allergy`) VALUES
(1, 'partone', 'asd123456', 'viren@gmail.com', 9876543210, 'AB+', '3,Abc soc', '2020-03-03', 23, 'skin           '),
(2, 'darshan', '123', 'darsh@gmal.com', 94433133, 'a', 'makr surat', '2000-05-29', 20, 'as ');

-- --------------------------------------------------------

--
-- Table structure for table `cliniclogin`
--

/* DROP TABLE IF EXISTS `cliniclogin`; */
CREATE TABLE IF NOT EXISTS `cliniclogin` (
  `clinicid` int(20) NOT NULL AUTO_INCREMENT,
  `clinicname` varchar(20) NOT NULL,
  `clinicpassword` varchar(20) NOT NULL,
  `clinicemail` varchar(20) NOT NULL,
  `phoneno` bigint(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `owner` varchar(20) NOT NULL,
  PRIMARY KEY (`clinicid`),
  UNIQUE KEY `clinicname` (`clinicname`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliniclogin`
--

INSERT INTO `cliniclogin` (`clinicid`, `clinicname`, `clinicpassword`, `clinicemail`, `phoneno`, `location`, `address`, `owner`) VALUES
(2, 'clinicone', 'clinic123', 'clinic@gmail.com', 0, 'surat', '49,abc ', 'abc'),
(3, 'clc2', 'cl2123456', 'clc2@gmail.com', 12369875, 'surat', '1,xccv,surat', 'clc2'),
(4, 'clc3', 'clc3123456', 'clc3@gmail.com', 98765453, 'surat', 'xc,hfgghf,surat', 'clc3'),
(5, 'clc4', 'clc413456', 'clc4@gmail.com', 6587485, 'navsari', '5,dfg,navasri', 'clc4'),
(6, 'clc5', 'clc5123456', 'clc5@gmail.com', 65788748, 'navasari', '3,asd,navasari', 'clc5'),
(7, 'clc6', 'clc6123456', 'clc6@gmail.com', 54646878, 'surat', '6,acas,surat', 'clc6');

-- --------------------------------------------------------

--
-- Table structure for table `doctorlogin`
--

DROP TABLE IF EXISTS `doctorlogin`;
CREATE TABLE IF NOT EXISTS `doctorlogin` (
  `doctorid` int(20) NOT NULL AUTO_INCREMENT,
  `clinicid` int(20) DEFAULT NULL,
  `doctorname` varchar(20) NOT NULL,
  `doctorpassword` varchar(20) NOT NULL,
  `doctoremail` varchar(20) NOT NULL,
  `phoneno` bigint(10) DEFAULT NULL,
  `speciality` varchar(20) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `degree` varchar(20) DEFAULT NULL,
  `experience` float DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `fee` bigint(5) DEFAULT NULL,
  `profile` text NOT NULL,
  PRIMARY KEY (`doctorid`),
  UNIQUE KEY `doctorname` (`doctorname`),
  KEY `clinicid` (`clinicid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorlogin`
--

INSERT INTO `doctorlogin` (`doctorid`, `clinicid`, `doctorname`, `doctorpassword`, `doctoremail`, `phoneno`, `speciality`, `rating`, `degree`, `experience`, `age`, `fee`, `profile`) VALUES
(2, 3, 'darsh', '1234', 'doc1@gmail.com', 1346789, 'surgon', 7.5, 'mbbs', 8.92, 383, 50000, ''),
(3, 2, 'daesh', 'doc2123456', 'doc2@gmail.com', 5465564, 'dentist', 5.5, 'md', 6, 25, 1000, ''),
(4, 5, 'doc3', 'doc3123456', 'doc3@gmail.com', 5454, 'ortho', 7.7, 'dvd', 5, 37, 2000, ''),
(5, 6, 'doc4', 'doc4123456', 'doc4@gmail.com', 587943131, 'skin', 5.2, 'ms', 8, 42, 2000, ''),
(8, 2, 'doc5', 'doc5123456', 'doc5@gmail.com', 545, 'kidny', 5.5, 'ms', 9, 33, 2500, ''),
(9, 2, 'doc6', '1234', 'doc6@gmail.com', 545545, 'gynec', 8.5, 'mbbs', 8, 39, 5000, ''),
(19, NULL, 'dae', '123', 'ad', 3434223454, 'no', NULL, 'no', 45, 34, 2434, ''),
(20, NULL, 'abc', '1234', 'axssc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

DROP TABLE IF EXISTS `laboratory`;
CREATE TABLE IF NOT EXISTS `laboratory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `labname` varchar(15) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phoneno` bigint(20) DEFAULT NULL,
  `labtype` varchar(20) DEFAULT NULL,
  `speciality` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `labname`, `date`, `username`, `password`, `email`, `phoneno`, `labtype`, `speciality`) VALUES
(1, 'darshan', '2020-04-21', 'abc', '123', 'waf@vds.com', 4561313568, 'x-ray', 'radiiologist'),
(9, NULL, NULL, 'hari', 'om', NULL, NULL, NULL, NULL),
(10, 'good', NULL, 'test1', '123', 'dsah@ff.com', 55656, 'non', 'kjnj'),
(11, 'good', NULL, 'test', '1234', 'dsah@ff.com1', 5565, 'nonop', 'kjnjl'),
(12, 'hi', NULL, 'new1', 'new', 'asv.sf@gf.com', 1213290, 'first', 'bfd');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appoinmentid` int(11) NOT NULL,
  `doctorid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `report` text DEFAULT NULL,
  `report_type` varchar(11) NOT NULL,
  `date_of_request` date NOT NULL,
  `report_status` varchar(10) NOT NULL,
  `report_upload_date` date DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `appoinmentid`, `doctorid`, `clientid`, `lab_id`, `report`, `report_type`, `date_of_request`, `report_status`, `report_upload_date`, `fee`) VALUES
(1, 2, 2, 2, 1, 'career options.gif', 'blood', '2020-04-23', 'uploaded', '2020-04-23', 780),
(24, 7, 2, 1, 4, NULL, '', '2020-04-18', '', NULL, NULL),
(23, 8, 2, 1, 1, 'hello.php', 'sc', '2020-04-16', 'uploaded', '2020-04-23', 500),
(22, 8, 2, 1, 9, NULL, '', '2020-04-23', '', NULL, NULL),
(21, 8, 2, 1, 9, NULL, '', '2020-04-10', '', NULL, NULL),
(25, 13, 19, 2, 11, 'Aladdin.2019.720p.WEB-DL.x264.AAC-BonsaiHD_English_-ELSUBTITLE.COM-.srt', 'blood doe', '2020-04-23', 'uploaded', '2020-04-23', 200);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctorlogin`
--
ALTER TABLE `doctorlogin`
  ADD CONSTRAINT `doctorlogin_ibfk_1` FOREIGN KEY (`clinicid`) REFERENCES `cliniclogin` (`clinicid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
