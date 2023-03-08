-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 04:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees_record`
--

CREATE TABLE `employees_record` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `date` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` int(50) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `parent_phone` int(20) NOT NULL,
  `parent_profession` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `gurdian_phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE `student_record` (
  `id` int(11) NOT NULL,
  `admission` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `date` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `registration` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `class` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`id`, `admission`, `fname`, `lastname`, `religion`, `gender`, `date`, `phone`, `country`, `city`, `state`, `address`, `registration`, `school`, `class`) VALUES
(2, 'ff', 'samuel', 'maina', 'gg', 'male', '2021-10-07', 2, 'Kenya', 'Kenya', 'ffff', 'ddd', '2021-10-27', 'ff', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees_record`
--
ALTER TABLE `employees_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_record`
--
ALTER TABLE `student_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees_record`
--
ALTER TABLE `employees_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
