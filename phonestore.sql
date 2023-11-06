-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 06:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `itempurchase`
--

CREATE TABLE `itempurchase` (
  `ID` int(11) NOT NULL,
  `Model` varchar(64) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Buyers_name` varchar(64) DEFAULT NULL,
  `Buyers_phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itempurchase`
--

INSERT INTO `itempurchase` (`ID`, `Model`, `Price`, `Buyers_name`, `Buyers_phone`) VALUES
(1, 'S21 Ultra', 24000, 'Ahmad', 937823234),
(2, 'S22 Ultra', 120000, 'Walid', 79123442),
(5, 'Iphone 15 Pro Max', 120000, 'Mujtaba', 792343111),
(7, 'Tab 8 Ultra', 45000, 'Khanullah', 765353543);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itempurchase`
--
ALTER TABLE `itempurchase`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itempurchase`
--
ALTER TABLE `itempurchase`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
