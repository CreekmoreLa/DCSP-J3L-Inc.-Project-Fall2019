-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2019 at 06:01 PM
-- Server version: 10.3.18-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jr2329`
--

-- --------------------------------------------------------

--
-- Table structure for table `INVENTORY`
--

CREATE TABLE IF NOT EXISTS `INVENTORY` (
  `shirtID` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `sleeve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `INVENTORY`
--

INSERT INTO `INVENTORY` (`shirtID`, `price`, `quantity`, `size`, `color`, `sleeve`) VALUES
('000021', 10, 7, 'XXX-Large', 'Black', 0),
('000069', 12.69, 13, 'XX-Large', 'Teal', 1),
('000121', 13.45, 22, 'Large', 'Maroon', 1),
('000123', 25.99, 13, 'Small', 'Blue', 0),
('000154', 19.99, 19, 'Large', 'Purple', 1),
('000212', 15.99, 15, 'X-Small', 'Orange', 0),
('000382', 7.99, 17, 'Medium', 'Green', 0),
('000412', 21.99, 20, 'X-Large', 'Red', 1),
('000567', 6.79, 4, 'Small', 'White', 1),
('042069', 16, 5, 'Medium', 'Yellow', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `INVENTORY`
--
ALTER TABLE `INVENTORY`
  ADD PRIMARY KEY (`shirtID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
