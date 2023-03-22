-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2023 at 07:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE `Attendance` (
  `attendance_id` int(3) NOT NULL,
  `attendance_employee_id` int(3) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `checkin_time` varchar(255) NOT NULL,
  `checkout_time` varchar(255) NOT NULL,
  `employee_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Attendance`
--

INSERT INTO `Attendance` (`attendance_id`, `attendance_employee_id`, `attendance_date`, `attendance_status`, `checkin_time`, `checkout_time`, `employee_username`) VALUES
(1, 15, '2023-03-21', 'leave', '', '', 'pavan'),
(9, 16, '2023-03-21', 'fullday', '10:15', '07:15', 'pavankumarn'),
(10, 15, '2023-03-22', 'halfday', '10:15', '05:00', 'pavan'),
(11, 16, '2023-03-22', 'fullday', '10:15', '07:15', 'pavankumarn'),
(12, 17, '2023-03-22', 'leave', '', '', 'james');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `employee_id` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`employee_id`, `firstname`, `middlename`, `lastname`, `course`, `gender`, `phone`, `email`, `password`, `address`, `username`) VALUES
(15, 'Pavan', 'Kumar', 'N', 'MBA', 'Male', 78926552, 'pavan@gmail.com', '$2y$10$iamjayamakshay1115161upPEq.c4LNqAbtmkbQg1dXbvd9KqkdIe', 'Bengaluru', 'pavan'),
(16, 'PAVAN', 'KUMAR', 'N', 'MBA', 'Male', 8525852, 'pavankumarn@gmail.com', '$2y$10$iamjayamakshay1115161uyc8oYwqBRsKJM1XbegQ3CHgQOhthJAa', 'USA', 'pavankumarn'),
(17, 'james', 'james', 'james', 'M.Tech', 'Male', 555414, 'james@gmail.com', '$2y$10$iamjayamakshay1115161uJ7blcyK8NpHD90vq9EGnIjRNNgXd3nG', 'USA', 'james');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attendance`
--
ALTER TABLE `Attendance`
  MODIFY `attendance_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `employee_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
