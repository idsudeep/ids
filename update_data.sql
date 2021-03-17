-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 08:28 PM
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
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `at_id` int(5) NOT NULL,
  `regno` varchar(10) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `issue_date` date NOT NULL,
  `status` varchar(6) NOT NULL,
  `cno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_tbl`
--

INSERT INTO `attendance_tbl` (`at_id`, `regno`, `sub_code`, `issue_date`, `status`, `cno`) VALUES
(60, '18SKSAC007', 'MCA503T', '2021-03-02', 'P', 0),
(61, '18SKSAC008', 'MCA505P', '2021-03-05', 'P', 0),
(62, '18SKSAC006', 'MCA501T', '2021-03-01', 'P', 0),
(63, '18SKSAC006', 'MCA505P', '2021-03-05', 'P', 0),
(64, '18SKSAC007', 'MCA301T', '2021-03-01', 'P', 0),
(65, '18SKSAC008', 'MCA501T', '2021-03-01', 'P', 0),
(67, '18SKSAC008', 'MCA506P', '2021-03-05', 'p', 0),
(68, '18SKSAC007', 'MCA506P', '2021-03-05', 'p', 0),
(70, '18SKSAC006', 'MCA506P', '2021-03-05', 'p', 0),
(76, '18SKSAC007', 'MCA505P', '2021-03-05', 'P', 0),
(77, '18SKSAC008', 'MCA504T', '2021-03-03', 'P', 0),
(78, '18SKSAC007', 'MCA504T', '2021-03-03', 'P', 0),
(79, '18SKSAC006', 'MCA502T', '2021-03-02', 'P', 0),
(80, '18SKSAC007', 'MCA502T', '2021-03-02', 'P', 0),
(81, '18SKSAC008', 'MCA502T', '2021-03-02', 'P', 0),
(82, '18SKSAC008', 'MCA503T', '2021-03-02', 'P', 0),
(83, '18SKSAC006', 'MCA503T', '2021-03-02', 'P', 0),
(84, '18SKSAC006', 'MCA504T', '2021-03-03', 'P', 0),
(85, '18SKSAC008', 'MCA301T', '2021-03-06', 'p', 0),
(86, '18SKSAC007', 'MCA301T', '2021-03-06', 'p', 0),
(87, '18SKSAC006', 'MCA301T', '2021-03-06', 'p', 0);

-- --------------------------------------------------------

--
-- Table structure for table `device_details`
--

CREATE TABLE `device_details` (
  `dd_id` int(5) NOT NULL,
  `model_no` text NOT NULL,
  `date_create` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `d_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_details`
--

INSERT INTO `device_details` (`dd_id`, `model_no`, `date_create`, `status`, `d_type`) VALUES
(1, 'Android 6.0.1; Redmi 3S', '2020-11-29', 'active', 'phone'),
(2, 'Android 6.0.1; Redmi 3s', '2021-01-31', 'active', 'phone'),
(3, 'Android 6.0.1; Redmi 3s', '2021-01-31', 'active', 'phone');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(5) NOT NULL,
  `sample` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `sample`) VALUES
(1, 'dose');

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
  `mobile_no` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_details`
--

INSERT INTO `std_details` (`userid`, `regno`, `fname`, `course`, `sem`, `batch_no`, `email`, `password`, `mobile_no`) VALUES
(1, '18SKSAC006', 'Sudeep', 'MCA', 5, 18, 'sudeep.numb@gmail.com', 'ioi', 9844833545),
(2, '18SKSAC008', 'Nitish Verma', 'MCA', 5, 18, 'nv.fcb10@gmail.com', 'fcb', 7478040006),
(3, '18SKSAC007', 'Ghanshyam', 'MCA', 5, 18, 'boharag124@gmail.com', 'ioi', 9864884648);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `device_details`
--
ALTER TABLE `device_details`
  ADD PRIMARY KEY (`dd_id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_details`
--
ALTER TABLE `std_details`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `at_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `device_details`
--
ALTER TABLE `device_details`
  MODIFY `dd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `std_details`
--
ALTER TABLE `std_details`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
