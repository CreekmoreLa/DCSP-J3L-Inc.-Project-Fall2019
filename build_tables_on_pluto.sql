-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2019 at 05:29 AM
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
('000121', 13.45, 22, 'Large', 'Maroon', 1),
('000123', 25.99, 13, 'Small', 'Blue', 0),
('000382', 7.99, 17, 'Medium', 'Green', 0),
('000567', 6.79, 4, 'Small', 'White', 1);

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `email` varchar(75) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `cc_num` varchar(25) NOT NULL,
  `mail_address` varchar(90) NOT NULL,
  `reward_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`email`, `user_name`, `password`, `cc_num`, `mail_address`, `reward_points`) VALUES
('bossman@msstate.edu', 'The Boss', 'makemeadmin', '123456789', '804 Alexis Ave Starkville, MS 39751', 0),
('jared@msstate.edu', 'Jared Oakes', 'jared', '123456789', '804 Alexis Ave Starkville, MS 39751', 9),
('jayden@msstate.edu', 'Jayden Rushing', 'jayden', '123456789', '804 Alexis Ave Starkville, MS 39751', 12),
('joe@msstate.edu', 'Joe Patterson', 'joe', '123456789', '804 Alexis Ave Starkville, MS 39751', 0),
('laura@msstate.edu', 'Laura Creekmore', 'laura', '123456789', '804 Alexis Ave Starkville, MS 39751', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `INVENTORY`
--
ALTER TABLE `INVENTORY`
  ADD PRIMARY KEY (`shirtID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
