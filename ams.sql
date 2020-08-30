-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 08:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `cid` int(11) NOT NULL,
  `ctype` varchar(50) NOT NULL,
  `cd` varchar(300) NOT NULL,
  `cdate` varchar(25) NOT NULL,
  `udate` varchar(25) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `ownerID` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`cid`, `ctype`, `cd`, `cdate`, `udate`, `status`, `mob`, `ownerID`) VALUES
(11111111, '', '', '', '', '', '', 'No Owner'),
(11111112, 'Civil', 'Ceiling Leakage', '22-11-2019 09:35:41 am', '22-11-2019 12:54:49 pm', 'Solved', '8899748596', 'himashunbhonge'),
(11111113, 'Facility Related', 'Gym AC not working', '22-11-2019 12:54:32 pm', '02-12-2019 06:33:10 am', 'Solved', '9865326532', '2050sajaljain'),
(11111114, 'Plumbing', 'Pipe Leakagee', '24-11-2019 18:35:35 pm', '24-11-2019 18:36:39 pm', 'Solved', '9295316557', 'asehitesh'),
(11111115, 'Electrical', 'tubelightt\r\n', '30-11-2019 14:04:14 pm', '30-11-2019 14:04:24 pm', 'In Progress', '7217568745', 'nitinbahekar3'),
(11111116, 'Facility Related', 'Gym AC not working', '02-12-2019 06:32:39 am', '', 'In Progress', '9865326532', '2050sajaljain'),
(11111117, 'Plumbing', 'Tap not workinggggg', '02-12-2019 07:51:29 am', '02-12-2019 07:52:04 am', 'Solved', '9865326532', '2050sajaljain');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `tid` int(11) NOT NULL,
  `date` varchar(25) NOT NULL,
  `ownerID` varchar(50) NOT NULL,
  `flatno` varchar(2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `damt` varchar(10) NOT NULL,
  `mop` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`tid`, `date`, `ownerID`, `flatno`, `fname`, `lname`, `damt`, `mop`) VALUES
(1, '29-11-2019 23:49:57 pm', '2050sajaljain', '55', 'Sajal', 'Jain', '50000', 'DD'),
(2, '30-11-2019 14:03:35 pm', 'monish.ambat777', '34', 'Monish', 'Ambat', '50000', 'DD');

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `ID` int(11) NOT NULL,
  `ownerID` varchar(50) NOT NULL,
  `amt` varchar(50) NOT NULL,
  `pamt` varchar(50) NOT NULL,
  `adate` varchar(25) NOT NULL,
  `pdate` varchar(25) NOT NULL DEFAULT 'NA',
  `dd` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`ID`, `ownerID`, `amt`, `pamt`, `adate`, `pdate`, `dd`, `status`) VALUES
(2, 'asehitesh', '1000', '0', '01-12-2019 15:56:20 pm', '01-12-2019 16:48:30 pm', 'Tubelight', 'Paid'),
(3, 'asehitesh', '1554', '0', '01-12-2019 16:02:51 pm', '01-12-2019 16:48:30 pm', 'Toilet', 'Paid'),
(4, 'sajalbhonge', '190', '0', '01-12-2019 17:51:18 pm', 'NA', 'Property Damage', 'Pending'),
(5, 'sajalbhonge', '1000', '0', '01-12-2019 17:53:43 pm', '01-12-2019 17:54:09 pm', 'Fine', 'Paid'),
(6, 'asehitesh', '1544', '0', '02-12-2019 06:13:09 am', 'NA', 'Property Damage', 'Pending'),
(7, 'asehitesh', '1455', '0', '02-12-2019 06:18:46 am', 'NA', 'Property Damage', 'Pending'),
(8, 'himashunbhonge', '1000', '0', '02-12-2019 06:39:00 am', 'NA', 'Tubelight', 'Pending'),
(9, '2050sajaljain', '2000', '0', '02-12-2019 06:55:48 am', 'NA', 'monthly maintainence', 'Pending'),
(10, 'monish.ambat777', '1566', '0', '02-12-2019 06:59:47 am', '02-12-2019 07:00:24 am', 'Tubelight Damage', 'Paid'),
(11, 'monish.ambat777', '2500', '0', '02-12-2019 07:39:22 am', '02-12-2019 07:41:30 am', 'monthly maintainence', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `serial_no` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `comm_addr` varchar(600) NOT NULL,
  `perm_addr` varchar(600) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `Role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`serial_no`, `fname`, `lname`, `comm_addr`, `perm_addr`, `mobile_no`, `Role`) VALUES
(8, 'Gopikshan', 'Thawre', 'Nanded', 'Nanded', '7217568744', 'Sweeperr'),
(9, 'J', 'Hima', 'Ngpur', 'Ngpur', '7217568780', 'Electrician');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `transactionid` int(11) NOT NULL,
  `month` varchar(320) NOT NULL,
  `name` varchar(320) NOT NULL,
  `payment` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`transactionid`, `month`, `name`, `payment`, `status`) VALUES
(18, 'Nov', 'Repairs', 200, 1),
(19, 'Nov', 'House keeping', 5400, 1),
(20, 'Nov', 'Postage', 5689, 1),
(21, 'Nov', 'Telephone Charges', 4356, 1),
(22, 'Nov', 'Travelling', 5343, 1),
(23, 'Nov', 'Statinorary', 767, 1),
(25, 'Nov', 'Prints and Notices', 4678, 1),
(26, 'Nov', 'Staff Salary', 40000, 1),
(28, 'Nov', 'Secuirty', 12220, 1),
(32, 'nov', 'Staff Bomus', 15000, 1),
(33, 'nov', 'Sponser', 1556, 1),
(34, 'nov', 'painting b', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `doorNo` varchar(13) NOT NULL,
  `ownerID` varchar(50) NOT NULL DEFAULT 'No Owner'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`doorNo`, `ownerID`) VALUES
('1-N-12-599/29', '2050sajaljain'),
('1-N-12-799/29', 'ajaygarkal07'),
('1-N-11-799/29', 'asehitesh'),
('1-N-12-222/29', 'himashunbhonge'),
('1-N-12-007/29', 'monish.ambat777'),
('1-N-10-799/29', 'nemadehitesh1995'),
('1-N-12-119/29', 'nitinbahekar3'),
('1-N-10-799/11', 'sajalbhonge');

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `lid` int(11) NOT NULL,
  `ownerID` varchar(50) NOT NULL,
  `ownername` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `datetoday` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `flatno` varchar(25) NOT NULL,
  `referenceno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `letter` varchar(1000) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`lid`, `ownerID`, `ownername`, `subject`, `datetoday`, `address`, `flatno`, `referenceno`, `email`, `letter`, `status`) VALUES
(2, 'asehitesh', 'Hitesh Nemade', 'Meeting At 2', '02/12/2019', 'Akruti', '22', '123', 'asehitesh@gmail.com', 'Please be present for Meeting At 2 PM. Please be present for Meeting At 2 PM. Please be present for Meeting At 2 PM. Please be present for Meeting At 2 PM. Please be present for Meeting At 2 PM. Please be present for Meeting At 2 PM. ', 'Approved'),
(4, 'himashunbhonge', 'Himanshu Bhonge', 'Meeting for Election', '02-12-2019', 'Akruti', '55', '15', 'himashunbhonge@gmail.com', 'Meeting for Election. Meeting for Election. Meeting for Election. Meeting for Election. Meeting for Election. Meeting for Election. Meeting for Election. Meeting for Election. Meeting for Election. Meeting for Election. Meeting for Election. ', 'Approved'),
(5, 'asehitesh', 'Hitesh Nemade', 'meeting hall', '02-12-2019', 'mklk', '12', '1234', 'asehitesh@gmail.com', 'meeting hall meeting hall meeting hallmeeting hallmeeting hallmeeting hallmeeting hallmeeting hallmeeting hallmeeting hallmeeting hallmeeting hallmeeting hall', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `tid` int(10) NOT NULL,
  `ownerID` varchar(50) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `flatno` varchar(2) NOT NULL,
  `period` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `mop` varchar(10) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`tid`, `ownerID`, `fname`, `lname`, `flatno`, `period`, `month`, `year`, `amount`, `mop`, `date`) VALUES
(7, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '1', 'August', '2019', '1000', 'Cash', '30-11-2019 14:01:52 pm'),
(38, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'Sept', '2019', '1010', 'Cash', '30-11-2019 17:01:45 pm'),
(39, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'Oct', '2019', '1010', 'Cash', '30-11-2019 17:01:45 pm'),
(40, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'Nov', '2019', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(41, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'Dec', '2019', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(42, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'Jan', '2020', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(43, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'Feb', '2020', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(44, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'March', '2020', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(45, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'April', '2020', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(46, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'May', '2020', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(47, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'June', '2020', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(48, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'July', '2020', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(49, 'himashunbhonge', 'Himanshu', 'Bhonge', '11', '12', 'August', '2020', '1000', 'Cash', '30-11-2019 17:01:45 pm'),
(68, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'Nov', '2019', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(69, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'Dec', '2019', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(70, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'Jan', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(71, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'Feb', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(72, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'March', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(73, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'April', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(74, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'May', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(75, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'June', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(76, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'July', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(77, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'August', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(78, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'Sept', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(79, '2050sajaljain', 'Sajal', 'Jain', '55', '12', 'Oct', '2020', '1000', 'Cash', '30-11-2019 17:07:01 pm'),
(80, 'asehitesh', 'Hitesh', 'Nemade', '22', '6', 'Nov', '2019', '1000', 'Cash', '30-11-2019 17:17:01 pm'),
(81, 'asehitesh', 'Hitesh', 'Nemade', '22', '6', 'Dec', '2019', '1000', 'Cash', '30-11-2019 17:17:01 pm'),
(82, 'asehitesh', 'Hitesh', 'Nemade', '22', '6', 'Jan', '2020', '1000', 'Cash', '30-11-2019 17:17:01 pm'),
(83, 'asehitesh', 'Hitesh', 'Nemade', '22', '6', 'Feb', '2020', '1000', 'Cash', '30-11-2019 17:17:01 pm'),
(84, 'asehitesh', 'Hitesh', 'Nemade', '22', '6', 'March', '2020', '1000', 'Cash', '30-11-2019 17:17:01 pm'),
(85, 'asehitesh', 'Hitesh', 'Nemade', '22', '6', 'April', '2020', '1000', 'Cash', '30-11-2019 17:17:01 pm'),
(89, 'nitinbahekar3', 'Nitin', 'Bahekar', '44', '6', 'Nov', '2019', '1000', 'Card', '30-11-2019 18:22:47 pm'),
(90, 'nitinbahekar3', 'Nitin', 'Bahekar', '44', '6', 'Dec', '2019', '1000', 'Card', '30-11-2019 18:22:47 pm'),
(91, 'nitinbahekar3', 'Nitin', 'Bahekar', '44', '6', 'Jan', '2020', '1000', 'Card', '30-11-2019 18:22:47 pm'),
(92, 'nitinbahekar3', 'Nitin', 'Bahekar', '44', '6', 'Feb', '2020', '1000', 'Card', '30-11-2019 18:22:47 pm'),
(93, 'nitinbahekar3', 'Nitin', 'Bahekar', '44', '6', 'March', '2020', '1000', 'Card', '30-11-2019 18:22:47 pm'),
(94, 'nitinbahekar3', 'Nitin', 'Bahekar', '44', '6', 'April', '2020', '1000', 'Card', '30-11-2019 18:22:47 pm'),
(95, 'monish.ambat777', 'Monish', 'Ambat', '34', '3', 'Sept', '2019', '1000', 'Cash', '30-11-2019 19:13:13 pm'),
(108, 'sajalbhonge', 'Sanju', 'Bhonge', '55', '1', 'Sept', '2019', '1000', 'Cash', '02-12-2019 07:21:26 am'),
(115, 'monish.ambat777', 'Monish', 'Ambat', '34', '3', 'Oct', '2019', '1010', 'Card', '02-12-2019 07:45:51 am'),
(116, 'monish.ambat777', 'Monish', 'Ambat', '34', '3', 'Nov', '2019', '1010', 'Card', '02-12-2019 07:45:51 am'),
(117, 'monish.ambat777', 'Monish', 'Ambat', '34', '3', 'Dec', '2019', '1000', 'Card', '02-12-2019 07:45:51 am'),
(118, 'sajalbhonge', 'Sanju', 'Bhonge', '55', '1', 'Oct', '2019', '1010', 'Check', '02-12-2019 07:46:57 am'),
(119, 'sajalbhonge', 'Sanju', 'Bhonge', '55', '1', 'Nov', '2019', '1010', 'Check', '02-12-2019 07:46:57 am'),
(120, 'sajalbhonge', 'Sanju', 'Bhonge', '55', '1', 'Dec', '2019', '1000', 'Check', '02-12-2019 07:46:57 am');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `tid` int(10) NOT NULL,
  `ownerID` varchar(50) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `flatno` varchar(2) NOT NULL,
  `period` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `mop` varchar(10) NOT NULL,
  `facility` varchar(15) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`tid`, `ownerID`, `fname`, `lname`, `flatno`, `period`, `amount`, `mop`, `facility`, `date`) VALUES
(1, '2050sajaljain', 'Sajal', 'Jain', '55', '2019', '2500', 'Cash', 'Swiming', '29-11-2019 23:20:05 pm'),
(2, 'asehitesh', 'Hitesh', 'Nemade', '22', '2019', '2500', 'Cash', 'Gym', '30-11-2019 14:03:13 pm');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `lid` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `datetoday` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `flatno` varchar(25) NOT NULL,
  `referenceno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `letter` varchar(1000) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`lid`, `subject`, `datetoday`, `address`, `flatno`, `referenceno`, `email`, `letter`, `status`) VALUES
(3, 'Meeting At 2 PM', '01-12-2019', 'Akruti Heights', '', '1', '', 'Please be present for Meeting At 2 PMPlease be present for Meeting At 2 PMPlease be present for Meeting At 2 PMPlease be present for Meeting At 2 PMPlease be present for Meeting At 2 PM', 'Approved'),
(4, 'Committee Election', '01-12-2019', 'Akruti Heights', '', '2', '', 'Please be present for Election 2 PM. Please be present for Election 2 PM. Please be present for Election 2 PM. Please be present for Election 2 PM. Please be present for Election 2 PM. ', 'Approved'),
(5, 'Come for Meeting', '02-12-2019', 'Akruti Heights', '', '12', '', 'Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. Come for Meeting. ', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `ownerdetails`
--

CREATE TABLE `ownerdetails` (
  `ownerID` varchar(50) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tid` varchar(50) NOT NULL DEFAULT '0',
  `flatno` varchar(2) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `idproof` varchar(100) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `occ` varchar(50) NOT NULL,
  `cadd` varchar(100) NOT NULL,
  `padd` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `sale` varchar(100) NOT NULL,
  `num` varchar(1) NOT NULL DEFAULT '0',
  `vr` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ownerdetails`
--

INSERT INTO `ownerdetails` (`ownerID`, `fname`, `lname`, `mobile`, `email`, `password`, `tid`, `flatno`, `photo`, `idproof`, `father`, `mother`, `occ`, `cadd`, `padd`, `type`, `sale`, `num`, `vr`, `status`) VALUES
('2050sajaljain', 'Sajal', 'Jain', '9865326532', '2050sajaljain@gmail.com', 'Dummy', '0', '55', '', '', 'Himanshu Jain', 'Himanshi Jaim', 'Teacher', 'Akruti Heights, Hiranandani', 'Indore', 'secretary', '', '1', '', 'Active'),
('ajaygarkal07', 'Ajay', 'Garkal', '9123456789', 'ajaygarkal07@gmail.com', 'Dummy', 'asehitesh', '22', '', '', 'Khilawan Garkal', 'Khilli Garkal', 'MBA', 'Akruti Heights, Hiranandani', 'Akruti Heights, Hiranandani', 'tenant', '', '1', 'MH 04 1235', 'Active'),
('asehitesh', 'Hitesh', 'Nemade', '9295316557', 'asehitesh@gmail.com', 'Dummy', '0', '22', '', '', 'Devram Nemade', 'Pratibha Nemade', 'Student', 'Dombivli', 'Dombivli', 'owner', '', '1', '', 'Active'),
('gopi', 'Gopikshan', 'Thawre', '7217568788', 'gopi@gmail.com', '', 'nitinbahekar3', '44', '', '', 'Xyz', 'Abc', 'Service', 'Nanded', 'Nanded', 'tenant', '', '0', 'MH 04 1235', 'Active'),
('hima', 'Himan', 'Shu', '8899748597', 'hima@gmail.com', '', 'nitinbahekar3', '44', '', '', 'Hima', 'Himani', 'Service', 'Nanded', 'Nanded', 'tenant', '', '0', 'MH 04 1444', 'Active'),
('himashunbhonge', 'Himanshu', 'Bhonge', '8899748596', 'himanshunbhonge@gmail.com', 'Dummy', '0', '11', '', '', 'Himanshu Bhonge', 'Himanshi Bhonge', 'Driver', 'Bangalore', 'Nagpur', 'ofc', '', '1', '', 'Active'),
('monish.ambat777', 'Monish', 'Ambat', '8787946544', 'monish.ambat777@gmail.com', 'Dummy', '0', '34', '', '', 'Himanshu Ambat', 'Himanshi Ambat', 'Student', 'Bangalore', 'Aurangabad', 'president', '', '1', '', 'Active'),
('nemadehitesh1995', 'Akshay', 'Nemade', '9874563211', 'nemadehitesh1995@gmail.com', 'Dummy', 'asehitesh', '22', '', '', 'Devram Nemade', 'Pratibha Nemade', 'Service', 'Akruti Heights, Hiranandani', 'Bangalore, Karnataka', 'tenant', '', '1', 'MH 04 1235', 'Active'),
('nitinbahekar3', 'Nitin', 'Bahekar', '7217568745', 'nitinbahekar3@gmail.com', 'Dummy', '0', '44', '', '', 'Eknath', 'Mina', 'Service', 'Nanded', 'Nanded', 'treas', '', '1', '', 'Active'),
('No Owner', '', '', '00', 'not', '4124bc0a9335c27f086f24ba207a4912', '0', '', '', '', '', '', '', '', '', '', '', '0', '', 'Active'),
('sajalbhonge', 'Sanju', 'Bhonge', '7217568777', 'sajalbhonge@gmail.com', 'Dummy', '0', '55', '', '', 'Sajalll', 'Bhongeee', 'Student', 'Nanded', 'Nanded', 'owner', '', '1', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `ID` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset`
--

INSERT INTO `reset` (`ID`, `code`, `email`) VALUES
(7, '15dd778b14397b', 'nitinbahekar3@gmail.com'),
(8, '15dd7795e857ce', 'monish.ambat777@gmail.com'),
(9, '15de3eeb887491', 'sajalbhonge@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `fk` (`ownerID`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`doorNo`),
  ADD KEY `ownerID` (`ownerID`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `ownerdetails`
--
ALTER TABLE `ownerdetails`
  ADD PRIMARY KEY (`ownerID`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11111118;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `fk` FOREIGN KEY (`ownerID`) REFERENCES `ownerdetails` (`ownerID`);

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`ownerID`) REFERENCES `ownerdetails` (`ownerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
