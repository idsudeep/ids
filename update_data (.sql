-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 05:01 PM
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
-- Database: `update_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_pannel`
--

CREATE TABLE `admin_pannel` (
  `userid` int(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `words` varchar(20) NOT NULL,
  `AccountType` varchar(20) NOT NULL,
  `issue_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_pannel`
--

INSERT INTO `admin_pannel` (`userid`, `email`, `words`, `AccountType`, `issue_date`) VALUES
(2, 'raj@gmail.com', 'wwy', 'bb', '2021-04-02 23:47:02'),
(1001, 'sysadmin@gmail.com', 'ioi', 'sysA', '2021-04-02 23:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject`
--

CREATE TABLE `assign_subject` (
  `sub_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_subject`
--

INSERT INTO `assign_subject` (`sub_id`, `faculty_id`, `sub_code`, `status`) VALUES
(1, 1, 'MCA501T', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `at_id` int(5) NOT NULL,
  `regno` varchar(10) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `issue_date` date NOT NULL,
  `status` varchar(6) NOT NULL,
  `cno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_tbl`
--

CREATE TABLE `class_tbl` (
  `class_id` int(5) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `recent_date` date NOT NULL,
  `total_no_of_class` int(5) NOT NULL,
  `keyword` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `device_details`
--

CREATE TABLE `device_details` (
  `dd_id` int(5) NOT NULL,
  `model_no` text NOT NULL,
  `d_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_details`
--

INSERT INTO `device_details` (`dd_id`, `model_no`, `d_type`) VALUES
(1, 'Android 6.0.1; Redmi 3S', 'phone');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tbl`
--

CREATE TABLE `faculty_tbl` (
  `faculty_id` int(5) NOT NULL,
  `faculty_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Words_` varchar(20) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `dept_` varchar(10) NOT NULL,
  `issue_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_tbl`
--

INSERT INTO `faculty_tbl` (`faculty_id`, `faculty_name`, `email`, `Words_`, `mobile_no`, `dept_`, `issue_Date`, `status`) VALUES
(12, 'Raj', 'sudeep.numb@gmail.com', 'ioi', 980000098, 'MCA', '2021-04-11 08:46:38', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `std_details`
--

CREATE TABLE `std_details` (
  `userid` int(5) NOT NULL,
  `regno` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `sem` int(5) NOT NULL,
  `batch_no` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile_no` bigint(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'inactive',
  `date_of_join` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_details`
--

INSERT INTO `std_details` (`userid`, `regno`, `fname`, `course`, `sem`, `batch_no`, `email`, `password`, `mobile_no`, `status`, `date_of_join`) VALUES
(1, '18SKSAC006', 'SUDEEP', 'MCA', 5, 18, 'sudeep.numb@gmail.com', 'ioi', 9731892750, 'inactive', '2021-04-13 15:30:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_pannel`
--
ALTER TABLE `admin_pannel`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `assign_subject`
--
ALTER TABLE `assign_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `class_tbl`
--
ALTER TABLE `class_tbl`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `device_details`
--
ALTER TABLE `device_details`
  ADD PRIMARY KEY (`dd_id`);

--
-- Indexes for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `std_details`
--
ALTER TABLE `std_details`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_pannel`
--
ALTER TABLE `admin_pannel`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `assign_subject`
--
ALTER TABLE `assign_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `at_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `class_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `device_details`
--
ALTER TABLE `device_details`
  MODIFY `dd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  MODIFY `faculty_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `std_details`
--
ALTER TABLE `std_details`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
