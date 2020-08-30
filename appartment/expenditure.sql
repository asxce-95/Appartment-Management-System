-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2019 at 06:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

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
(2, 'jan', 'harish: painting', 50000, 1),
(13, 'jan', 'harish shetty', 50000, 1),
(14, 'jan', 'staff salary', 30000, 1),
(15, 'jan', 'security charge', 20000, 1),
(16, 'jan', 'electricity charge', 4000, 1),
(17, 'jan', 'water charge', 356, 1),
(18, 'jan', 'repairs', 200, 1),
(19, 'jan', 'house keeping', 5400, 1),
(20, 'jan', 'postage', 5689, 1),
(21, 'jan', 'telephone charge', 4356, 1),
(22, 'jan', 'travelling', 5343, 1),
(23, 'jan', 'statinorary', 767, 1),
(24, 'jan', 'generator', 890, 1),
(25, 'jan', 'struct', 4678, 1),
(26, 'feb', 'staff', 4000, 1),
(27, 'jan', 'staff salary', 890, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`transactionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
