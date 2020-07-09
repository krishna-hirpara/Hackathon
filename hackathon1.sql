-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 07:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `PASSWORD`, `name`, `email`, `mobile`, `address`) VALUES
(1, '123@4', 'abc', 'abc123@gmail.com', 1234567890, 'junagadh'),
(2, 'Own@123', 'owner', 'owner123@gmail.com', 987654321, 'surat'),
(3, '090909', 'ravina', 'srina123@gmail.com', 101010101, 'ahm');

-- --------------------------------------------------------

--
-- Table structure for table `stockdetails`
--

CREATE TABLE `stockdetails` (
  `stockid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `typeofstock` varchar(50) NOT NULL,
  `load_date` date NOT NULL,
  `dept_date` date NOT NULL,
  `weight` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockdetails`
--

INSERT INTO `stockdetails` (`stockid`, `email`, `typeofstock`, `load_date`, `dept_date`, `weight`, `cost`, `status`) VALUES
(8, 'owner123@gmail.com', 'owner123', '2019-02-14', '2020-06-23', 100, 989917, 'Finished'),
(9, 'owner123@gmail.com', 'owner123', '2020-07-08', '2020-12-08', 100, 306083, 'Ongoing'),
(10, 'owner123@gmail.com', 'owner123', '2019-02-23', '2019-06-05', 150, 305875, 'Finished'),
(11, 'owner123@gmail.com', 'owner123@gmail.com', '2019-06-08', '2020-11-23', 200, 2136167, 'Ongoing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockdetails`
--
ALTER TABLE `stockdetails`
  ADD PRIMARY KEY (`stockid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stockdetails`
--
ALTER TABLE `stockdetails`
  MODIFY `stockid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
