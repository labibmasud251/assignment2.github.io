-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2016 at 08:56 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rb147258_getaride`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Md. Ryad Ahmed Biplob', 'robyrogers', '$2y$10$oSv2.xoa..cB9usUM/ID7O5P79ypHSBEJTMUD9uQMQxtPDHCTMvCe'),
(2, 'Hossain Al Muhee', 'muhee69', '$2y$10$lTd48eoMxxB8ZW7HyGo5/exMGgH38GMSfqlBmdbYJbvO2JefJWSwq');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `authorized` tinyint(1) DEFAULT '0',
  `receiver` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `contact`, `email`, `password`, `address`, `authorized`, `receiver`) VALUES
(8, 'Maria Biva', '01820127702', 'biva@gmail.com', '$2y$10$0Kmx.WFcsSvL6.JOi22UA.GdSLYyU8oLhrIBKSY.aVaYOGsbzXfq2', '43/1, Mayakanan, Basaboo, Shabujbag, Dhaka-1214', 1, 0),
(9, 'Md. Ryad Ahmed Biplob', '01687255035', 'rb147258@gmail.com', '$2y$10$a14.4zPgkHpv15JPcQoSmuGovSu1Qv9zDablUE6TNY8.5s8zUQ25K', '43/1, Mayakanan, Basaboo, Shabujbag, Dhaka-1214', 1, 0),
(10, 'Hossain Al Muhee', '01703178187', 'ryad147258@gmail.com', '$2y$10$DUtZzPIIM0k2iZJNm6eX5uEdo0DFmQ3wEXtIb0b1NnvPegq1iGPZy', 'Shegunbagicha', 1, 1),
(12, 'Mahim', '01687255036', 'mahim@gmail.com', '$2y$10$uu0dX9CqDeHrgg1AzmlfauzSk7dp/E5/rrxP4cQ2dhirLPs2b/v5C', '43/1, Mayakanan, Basaboo, Shabujbag, Dhaka-1214', 1, 1),
(13, 'Fahim', '01687255037', 'fahim@gmail.com', '$2y$10$prM8eIRWDLfk4axxPU5NjeLl33Q6om72ZI4SdJhD5.DJ/hhNBFOXi', '43/1, Mayakanan, Basaboo, Shabujbag, Dhaka-1214', 1, 1),
(14, 'Nehal', '01687255039', 'nehal@gmail.com', '$2y$10$nN51Rt.lcFRlvAXe2/aZdOve6jx/9/K5mlfR7nFjjwM9853XYn8um', '43/1, Mayakanan, Basaboo, Shabujbag, Dhaka-1214', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `pId` int(11) NOT NULL,
  `dLicense` varchar(50) NOT NULL,
  `numPlate` varchar(15) NOT NULL,
  `client_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`pId`, `dLicense`, `numPlate`, `client_id`) VALUES
(6, 'sadf64safd', 'asdf645', 'biva@gmail.com'),
(7, 'sadflns54sdf', 'asdf651sadf', 'rb147258@gmail.com'),
(8, 'sadfsadf56', 'as6', 'nehal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `id` int(11) NOT NULL,
  `pPaid` tinyint(1) DEFAULT NULL,
  `rPay` tinyint(1) DEFAULT NULL,
  `date` date NOT NULL,
  `p_Id` varchar(50) NOT NULL,
  `r_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `departure` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `day`, `departure`) VALUES
(8, 'MONDAY', '2:00 PM'),
(8, 'SUNDAY', '5:30 PM'),
(9, 'MONDAY', '5:30 PM'),
(9, 'SUNDAY', '12:00 PM'),
(9, 'WEDNESDAY', '4:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `destination` varchar(20) NOT NULL,
  `price` int(4) DEFAULT '0',
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`destination`, `price`, `pro_id`) VALUES
('Abul hotel', 20, 8),
('Basaboo', 50, 8),
('Gulshan-1', 10, 8),
('Link Road', 10, 8),
('Rampura Bridge', 20, 8),
('Badda', 0, 9),
('Basaboo', 0, 9),
('Khilgaon', 0, 9),
('Mugdapara', 0, 9),
('Rampura', 0, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`,`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`pId`),
  ADD UNIQUE KEY `dLicense` (`dLicense`),
  ADD UNIQUE KEY `numPlate` (`numPlate`),
  ADD UNIQUE KEY `client_id` (`client_id`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_Id` (`p_Id`),
  ADD KEY `r_Id` (`r_Id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`,`day`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`pro_id`,`destination`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`email`);

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_ibfk_1` FOREIGN KEY (`p_Id`) REFERENCES `provider` (`client_id`),
  ADD CONSTRAINT `rides_ibfk_2` FOREIGN KEY (`r_Id`) REFERENCES `clients` (`email`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `stops`
--
ALTER TABLE `stops`
  ADD CONSTRAINT `stops_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `clients` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
