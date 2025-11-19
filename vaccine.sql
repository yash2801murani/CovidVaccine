-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 01:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(5) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('yash', 'yash');

-- --------------------------------------------------------

--
-- Table structure for table `ragistration`
--

CREATE TABLE `ragistration` (
  `sn` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `aadhar` varchar(12) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bloodgroup` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ragistration`
--

INSERT INTO `ragistration` (`sn`, `name`, `age`, `contact`, `aadhar`, `city`, `pincode`, `email`, `gender`, `bloodgroup`) VALUES
(1, 'Vivek', 18, '9558619062', '4554545454', 'upleta', '360490', 'yash.murani0@gmail.com', 'male', 'a'),
(2, 'deep', 19, '9687676398', '789654123', 'upleta', '360490', 'yash.murani0@gmail.com', 'male', 'b+');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `aadhar` varchar(12) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`sno`, `name`, `age`, `mobile`, `aadhar`, `password`) VALUES
(61, 'yash', 18, '9558619062', '555', 'yash'),
(63, 'dhruv', 18, '9558', '645646', 'dhruv'),
(64, 'aa', 5, '55', '55', 'aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ragistration`
--
ALTER TABLE `ragistration`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `aadhar` (`aadhar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ragistration`
--
ALTER TABLE `ragistration`
  MODIFY `sn` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
