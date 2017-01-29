-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2012 at 05:13 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinicosight`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` bigint(4) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1235 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `contactno`, `emailid`, `password`) VALUES
(1234, 'Ragavendra Rao', '7259831199', 'ragavendra@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patid` bigint(4) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atime` varchar(10) NOT NULL,
  `adate` date NOT NULL,
  `docid` bigint(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`appointid`),
  KEY `patid` (`patid`),
  KEY `docid` (`docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointid`, `patid`, `datetime`, `atime`, `adate`, `docid`, `status`, `comment`) VALUES
(3, 111, '2012-03-29 07:03:10', '06:00', '2012-03-29', 1112, '31-03-2012', 'abcd'),
(4, 111, '2012-03-29 12:43:25', '06:00', '2012-03-30', 1112, '31-03-2012', 'abcd'),
(5, 111, '2012-03-29 12:47:21', '06:30', '2012-03-30', 1114, '31-03-2012', 'xyz'),
(6, 112, '2012-03-29 12:55:26', '10:30', '2012-03-30', 1112, '29-03-2012', 'abcd'),
(7, 111, '2012-03-21 08:54:09', '06:30', '2012-03-31', 1112, '31-03-2012', 'abcd'),
(8, 111, '2012-03-21 08:54:22', '06:30', '2012-03-31', 1113, '31-03-2012', 'abcd'),
(9, 111, '2012-03-31 10:06:09', '05:00', '2012-03-31', 1114, '31-03-2012', 'gy'),
(10, 111, '2012-03-31 10:54:16', '06:00', '2012-03-31', 1115, '31-03-2012', 'iuyu\r\n'),
(11, 113, '2012-04-02 07:19:16', '05:00', '2012-04-02', 1113, '02-04-2012', 'xfed'),
(12, 113, '2012-04-02 07:19:36', '01:00', '2012-04-02', 1114, '02-04-2012', 'ff'),
(13, 113, '2012-04-02 07:49:37', '06:15', '2012-04-02', 1112, '02-04-2012', 'tgrt'),
(14, 113, '2012-04-02 07:49:53', '07:15', '2012-04-02', 1115, '02-04-2012', 'gtg');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `billid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patid` bigint(4) NOT NULL,
  `totamt` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `treid` varchar(15) NOT NULL,
  `docid` bigint(4) NOT NULL,
  PRIMARY KEY (`billid`),
  KEY `patid` (`patid`),
  KEY `treid` (`treid`),
  KEY `docid` (`docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billid`, `patid`, `totamt`, `date`, `treid`, `docid`) VALUES
(3, 111, 18500, '2012-03-31 10:00:12', '9,8,', 1113),
(4, 111, 18500, '2012-03-31 10:01:40', '9,8,', 1113),
(5, 111, 18500, '2012-03-31 10:02:29', '9,8,', 1113),
(6, 111, 18500, '2012-03-31 10:04:31', '9,8,', 1113),
(7, 111, 10311, '2012-03-31 10:13:07', '10,9,8,', 1114),
(8, 111, 10311, '2012-03-31 10:19:48', '10,9,8,', 1114),
(9, 111, 10311, '2012-03-31 10:19:50', '10,9,8,', 1114),
(58, 111, 1300, '2012-03-31 11:59:15', '11', 1115),
(59, 111, 800, '2012-04-02 06:06:16', '', 1115),
(60, 113, 1400, '2012-04-02 07:23:27', '25', 1114),
(61, 113, 2713, '2012-04-02 07:52:49', '54', 1115);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `docid` bigint(4) NOT NULL AUTO_INCREMENT,
  `doctorname` varchar(50) NOT NULL,
  `quali` varchar(50) NOT NULL,
  `specialistin` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `biodata` text NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1116 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `doctorname`, `quali`, `specialistin`, `contactno`, `emailid`, `biodata`, `password`) VALUES
(1112, 'Krishna Prasad N', 'M.D, D.M', 'Orthology', '7865432157', 'krishna@yahoo.co.in', 'Specialist in Orthology', '100002'),
(1113, 'Deepak Shedde M', 'M.B.B.S', 'E.N.T', '9865321478', 'deepak@yahoo.com', 'Specialist In E.N.T', '100003'),
(1114, 'Raj Kiran M', 'M.D.M.B.B.S', 'Neurologist', '9865327412', 'rajkiran@yahoo.co.in', 'Specialist in: Neurologist', '100004'),
(1115, 're gsf sdfg', 'rht', '5tik', '12345677998', 'ddgf@vfvb.vghf', 'jhkh', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empid` bigint(4) NOT NULL AUTO_INCREMENT,
  `password` varchar(25) NOT NULL,
  `empname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(30) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `designation` varchar(59) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11115 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `password`, `empname`, `address`, `contactno`, `emailid`, `designation`) VALUES
(11111, '111111', 'Suvarna Kumari M', 'Kankanadi,Mangalore', '7865423165', 'suvarnakumari@gmail.com', 'Receptionist'),
(11112, '111112', 'Babitha Kumari K', 'Karkala, Udupi', '7896543256', 'babitha@yahoo.co.in', 'Lab Assistant'),
(11113, '111113', 'Sowmya Kumari K', 'Bantwal, Mangalore', '8965478932', 'sowmyakumarik@gmail.com', 'Receptionist'),
(11114, '111114', 'Hari Prasad M', 'Hampankatta, Mangalore', '9865473214', 'Hariprasad@hotmail.com', 'Lab Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expensetype` varchar(50) NOT NULL,
  `quantity` int(2) NOT NULL,
  `expamt` float NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expensetype`, `quantity`, `expamt`, `date`, `comment`) VALUES
('Dustbin', 3, 300, '2012-03-22', 'Today 3 Dustbin Purchased'),
('Table', 2, 1000, '2012-03-24', 'Receptionist Table'),
('Chair', 5, 1250, '2012-03-25', '5 Receptionist Chair Purchased');

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE IF NOT EXISTS `labtest` (
  `testid` bigint(4) NOT NULL AUTO_INCREMENT,
  `ttypeid` bigint(4) NOT NULL,
  `patid` bigint(4) NOT NULL,
  `empid` bigint(4) NOT NULL DEFAULT '0',
  `labfee` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `treid` bigint(4) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`testid`),
  KEY `ttypeid` (`ttypeid`),
  KEY `patid` (`patid`),
  KEY `empid` (`empid`),
  KEY `treid` (`treid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`testid`, `ttypeid`, `patid`, `empid`, `labfee`, `date`, `time`, `treid`, `comment`) VALUES
(1, 5, 111, 11111, 5000, '2012-03-29', '06:20:58', 1, 'abc'),
(2, 2, 111, 11111, 6000, '2012-03-29', '06:21:30', 2, ''),
(3, 3, 111, 11111, 4000, '2012-03-29', '06:21:58', 2, 'ab'),
(4, 4, 111, 11111, 1000, '2012-03-29', '06:22:11', 2, '1'),
(5, 5, 111, 11111, 1500, '2012-03-29', '06:22:23', 2, 'q'),
(6, 2, 111, 11111, 5000, '2012-03-29', '06:21:43', 3, 'xyz'),
(19, 1, 111, 11111, 5000, '2012-03-29', '06:28:19', 6, 'abcd'),
(20, 2, 111, 11111, 6000, '2012-03-29', '06:28:44', 6, 'abccd'),
(21, 3, 111, 11111, 3350, '2012-03-29', '06:28:57', 6, 'ad'),
(22, 2, 112, 11111, 5000, '2012-03-29', '06:35:28', 7, 'ABCD 1'),
(23, 3, 112, 11111, 10000, '2012-03-29', '06:36:00', 7, 'ABCD 2'),
(24, 4, 112, 11111, 6000, '2012-03-29', '06:36:13', 7, 'BCD 3'),
(25, 2, 111, 11111, 9500, '2012-03-31', '02:27:14', 9, 'abcd'),
(26, 5, 111, 11111, 1111, '2012-03-31', '03:42:34', 10, '4ku'),
(27, 3, 111, 11111, 800, '2012-03-31', '04:25:30', 11, 'dd'),
(28, 1, 113, 11112, 600, '2012-04-02', '12:52:35', 12, 'sererr'),
(29, 4, 113, 11112, 333, '2012-04-02', '01:22:34', 14, 'wsw');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine`, `description`) VALUES
('fghfh', 'ghg'),
('ghghggg', 'dggh'),
('gddfffff', ''),
('gadfg', 'dgdf'),
('kkkk', 'dfss');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patfname` varchar(25) NOT NULL,
  `patlname` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `bloodgroup` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`patid`),
  UNIQUE KEY `emailid` (`emailid`),
  UNIQUE KEY `contactno` (`contactno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patid`, `patfname`, `patlname`, `password`, `dob`, `gender`, `emailid`, `contactno`, `address`, `city`, `state`, `country`, `bloodgroup`, `status`) VALUES
(111, 'Abdulla', 'Basheer', '000001', '1989-05-09', 'Male', 'basheer@gmail.com', '8795632145', 'Falnir, Mangalore', 'Mangalore', 'Karnataka', 'India', 'O+ve', ''),
(112, 'Mohan', 'Das', '000002', '1976-05-07', '', 'mohandas@yahoo.com', '8965485632', 'Karkala,Udupi', 'Mangalore', 'Karnataka', 'India', 'B+ve', ''),
(113, 'Rama', 'Krishna', '000003', '1983-03-26', 'Male', 'ramakrishna@hotmail.com', '7568956123', 'Manjeshwar', 'Kasaragod', 'Kerala', 'India', 'O-ve', ''),
(114, 'Abdulla', 'Nizar', '000004', '1992-06-16', 'Male', 'nizarabdulla@gmail.com', '7589653212', 'Thokkottu', 'Mangalore', 'Karnataka', 'India', 'O+ve', ''),
(115, 'Renci', 'Monthi', '123456', '0000-00-00', '', 'Renci@gmail.com', '7259832256', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `presid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patid` bigint(4) NOT NULL,
  `medicine` text NOT NULL,
  `treid` bigint(4) NOT NULL,
  PRIMARY KEY (`presid`),
  KEY `patid` (`patid`),
  KEY `treid` (`treid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`presid`, `patid`, `medicine`, `treid`) VALUES
(1, 111, '<td>&nbsp;fghfh</td><td>&nbsp;2</td><td>&nbsp;0-0-1</td>', 10),
(2, 111, '<td>&nbsp;ghghggg</td><td>&nbsp;5</td><td>&nbsp;0-1-0</td>', 11),
(3, 111, '<td>&nbsp;gadfg</td><td>&nbsp;02</td><td>&nbsp;0-1-0</td>', 8),
(4, 113, '<td>&nbsp;kkkk</td><td>&nbsp;6</td><td>&nbsp;0-0-1</td>', 12),
(5, 113, '<td>&nbsp;gddfffff</td><td>&nbsp;3</td><td>&nbsp;1-1-1</td>', 12),
(6, 113, '<td>&nbsp;ghghggg</td><td>&nbsp;5</td><td>&nbsp;0-1-1</td>', 13),
(7, 113, '<td>&nbsp;gddfffff</td><td>&nbsp;4</td><td>&nbsp;0-1-0</td>', 14),
(8, 113, '<td>&nbsp;gadfg</td><td>&nbsp;5</td><td>&nbsp;0-0-1</td>', 14);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `date` date NOT NULL,
  `empid` bigint(4) NOT NULL,
  `salaryamt` float NOT NULL,
  `monthsal` date NOT NULL,
  KEY `empid` (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`date`, `empid`, `salaryamt`, `monthsal`) VALUES
('2012-02-22', 11111, 5000, '2012-02-22'),
('2012-02-22', 11112, 4500, '2012-02-26'),
('2012-02-22', 11113, 5000, '2012-02-22'),
('2012-02-22', 11114, 4500, '2012-02-22'),
('2012-03-31', 11111, 6000, '2012-03-31'),
('2012-03-31', 11112, 6000, '2012-03-31'),
('2012-03-31', 11113, 6000, '2012-03-31'),
('2012-03-31', 11114, 5500, '2012-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `testtype`
--

CREATE TABLE IF NOT EXISTS `testtype` (
  `ttypeid` bigint(4) NOT NULL AUTO_INCREMENT,
  `testtype` varchar(25) NOT NULL,
  `descript` varchar(100) NOT NULL,
  PRIMARY KEY (`ttypeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `testtype`
--

INSERT INTO `testtype` (`ttypeid`, `testtype`, `descript`) VALUES
(1, 'Blood Test', 'Testing of Blood'),
(2, 'Blood Group', 'Testing of Blood Group'),
(3, 'BP', 'Testing of Blood Pleasure'),
(4, 'Sugar', 'Testing of Sugar'),
(5, 'X-RAY', 'X-Ray is Taking'),
(6, 'Scanning', 'Scanning of Body');

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE IF NOT EXISTS `timings` (
  `docid` bigint(4) DEFAULT NULL,
  `timings` text NOT NULL,
  `fromtime` time DEFAULT NULL,
  `totime` time DEFAULT NULL,
  `session` varchar(25) NOT NULL,
  `tstatus` varchar(25) DEFAULT NULL,
  KEY `docid` (`docid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`docid`, `timings`, `fromtime`, `totime`, `session`, `tstatus`) VALUES
(1112, ' 10:00 10:15 10:30 10:45 11:00 06:00 11:15 06:15 11:30 06:30 11:45 06:45 07:00 07:15 07:30 07:45', NULL, NULL, '', NULL),
(1113, ' 05:00 05:15 05:30 05:45 06:00 06:15 06:30 06:45 07:00 07:15 07:30 07:45', NULL, NULL, '', NULL),
(1114, ' 01:00 05:00 01:15 05:15 01:30 05:30 01:45 05:45 02:00 06:00 02:15 06:15 02:30 06:30 02:45 06:45 03:00 07:00 03:15 07:15 03:30 07:30 03:45 07:45', NULL, NULL, '', NULL),
(1115, ' 06:00 06:15 06:45 07:00 07:15 07:30 07:45', NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE IF NOT EXISTS `treatment` (
  `treid` bigint(4) NOT NULL AUTO_INCREMENT,
  `docid` bigint(4) NOT NULL,
  `treatfee` float NOT NULL,
  `treatment` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointid` bigint(4) NOT NULL,
  PRIMARY KEY (`treid`),
  KEY `docid` (`docid`),
  KEY `appointid` (`appointid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treid`, `docid`, `treatfee`, `treatment`, `date`, `time`, `appointid`) VALUES
(1, 1112, 1000, 'abcd', '2012-03-29', '06:11:46', 3),
(2, 1112, 600, 'abcd', '2012-03-29', '06:14:25', 3),
(3, 1112, 600, 'abcd', '2012-03-29', '06:14:25', 3),
(4, 1112, 600, 'abcd', '2012-03-29', '06:14:25', 3),
(5, 1112, 6004, 'aa', '2012-03-29', '06:18:50', 3),
(6, 1112, 50000, 'gg', '2012-03-29', '06:26:57', 3),
(7, 1112, 50000, 'BCDD', '2012-03-29', '06:34:09', 6),
(8, 1112, 2500, 'abcd', '2012-03-31', '02:25:14', 7),
(9, 1113, 6500, 'abcd', '2012-03-31', '02:26:35', 8),
(10, 1114, 200, 'hg', '2012-03-31', '03:38:55', 9),
(11, 1115, 500, 'uuj', '2012-03-31', '04:24:41', 10),
(12, 1113, 500, '', '2012-04-02', '12:50:53', 11),
(13, 1114, 900, 'cdsfsd', '2012-04-02', '12:51:44', 12),
(14, 1112, 280, 'fgt', '2012-04-02', '01:20:16', 13),
(15, 1115, 700, 'cf', '2012-04-02', '01:22:01', 14);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`);

--
-- Constraints for table `labtest`
--
ALTER TABLE `labtest`
  ADD CONSTRAINT `labtest_ibfk_1` FOREIGN KEY (`ttypeid`) REFERENCES `testtype` (`ttypeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labtest_ibfk_2` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labtest_ibfk_4` FOREIGN KEY (`treid`) REFERENCES `treatment` (`treid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`treid`) REFERENCES `treatment` (`treid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timings`
--
ALTER TABLE `timings`
  ADD CONSTRAINT `timings_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_ibfk_3` FOREIGN KEY (`appointid`) REFERENCES `appointment` (`appointid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
