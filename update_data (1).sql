-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 08:17 PM
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
(60, '18SKSAC008', 'MCA503T', '2021-03-04', 'P', 0),
(61, '18SKSAC008', 'MCA505P', '2021-03-05', 'P', 0),
(62, '18SKSAC006', 'MCA501T', '2021-03-01', 'P', 0),
(63, '18SKSAC006', 'MCA505P', '2021-03-05', 'P', 0),
(64, '18SKSAC004', 'MCA501T', '2021-03-01', 'P', 0),
(65, '18SKSAC008', 'MCA501T', '2021-03-01', 'P', 0),
(67, '18SKSAC008', 'MCA506P', '2021-03-06', 'p', 0),
(68, '18SKSAC004', 'MCA506P', '2021-03-06', 'p', 0),
(70, '18SKSAC006', 'MCA506P', '2021-03-06', 'p', 0),
(76, '18SKSAC004', 'MCA505P', '2021-03-05', 'P', 0),
(77, '18SKSAC008', 'MCA504T', '2021-03-03', 'P', 0),
(78, '18SKSAC006', 'MCA504T', '2021-03-03', 'P', 0),
(79, '18SKSAC008', 'MCA502T', '2021-03-02', 'P', 0),
(80, '18SKSAC004', 'MCA502T', '2021-03-02', 'P', 0),
(81, '18SKSAC006', 'MCA502T', '2021-03-02', 'P', 0),
(82, '18SKSAC006', 'MCA503T', '2021-03-04', 'P', 0),
(83, '18SKSAC004', 'MCA503T', '2021-03-04', 'P', 0),
(84, '18SKSAC004', 'MCA504T', '2021-03-03', 'P', 0),
(85, '18SKSAC004', 'MCA501T', '2021-03-06', 'p', 0),
(86, '18SKSAC008', 'MCA501T', '2021-03-06', 'p', 0),
(87, '18SKSAC006', 'MCA501T', '2021-03-06', 'p', 0),
(90, '18SKSAC004', 'MCA501T', '2021-03-07', 'P', 0),
(91, '18SKSAC006', 'MCA501T', '2021-03-07', 'P', 0),
(92, '18SKSAC008', 'MCA501T', '2021-03-07', 'P', 0),
(93, '18SKSAC004', 'MCA502T', '2021-03-07', 'P', 0),
(94, '18SKSAC006', 'MCA502T', '2021-03-07', 'P', 0),
(95, '18SKSAC008', 'MCA502T', '2021-03-07', 'P', 0),
(96, '18SKSAC004', 'MCA503T', '2021-03-07', 'p', 0),
(97, '18SKSAC006', 'MCA503T', '2021-03-07', 'p', 0),
(98, '18SKSAC008', 'MCA503T', '2021-03-07', 'p', 0),
(99, '18SKSAC004', 'MCA504T', '2021-03-07', 'P', 0),
(100, '18SKSAC006', 'MCA504T', '2021-03-07', 'P', 0),
(101, '18SKSAC008', 'MCA504T', '2021-03-07', 'P', 0),
(102, '18SKSAC004', 'MCA505P', '2021-03-07', 'P', 0),
(103, '18SKSAC006', 'MCA505P', '2021-03-07', 'P', 0),
(104, '18SKSAC008', 'MCA505P', '2021-03-07', 'P', 0),
(105, '18SKSAC004', 'MCA506P', '2021-03-07', 'P', 0),
(106, '18SKSAC006', 'MCA506P', '2021-03-07', 'P', 0),
(107, '18SKSAC008', 'MCA506P', '2021-03-07', 'p', 0),
(108, '18SKSAC004', 'MCA501T', '2021-03-08', 'P', 0),
(109, '18SKSAC006', 'MCA501T', '2021-03-08', 'P', 0),
(110, '18SKSAC008', 'MCA501T', '2021-03-08', 'P', 0),
(111, '18SKSAC004', 'MCA502T', '2021-03-08', 'P', 0),
(112, '18SKSAC006', 'MCA502T', '2021-03-08', 'P', 0),
(113, '18SKSAC008', 'MCA502T', '2021-03-08', 'P', 0),
(114, '18SKSAC004', 'MCA503T', '2021-03-08', 'p', 0),
(115, '18SKSAC006', 'MCA503T', '2021-03-08', 'p', 0),
(116, '18SKSAC008', 'MCA503T', '2021-03-08', 'p', 0),
(117, '18SKSAC004', 'MCA504T', '2021-03-08', 'P', 0),
(118, '18SKSAC006', 'MCA504T', '2021-03-08', 'P', 0),
(119, '18SKSAC008', 'MCA504T', '2021-03-08', 'P', 0),
(120, '18SKSAC004', 'MCA505P', '2021-03-08', 'P', 0),
(121, '18SKSAC006', 'MCA505P', '2021-03-08', 'P', 0),
(122, '18SKSAC008', 'MCA505P', '2021-03-08', 'P', 0),
(123, '18SKSAC004', 'MCA506P', '2021-03-08', 'P', 0),
(124, '18SKSAC006', 'MCA506P', '2021-03-08', 'P', 0),
(125, '18SKSAC008', 'MCA506P', '2021-03-08', 'p', 0),
(126, '18SKSAC004', 'MCA501T', '2021-03-09', 'P', 0),
(127, '18SKSAC006', 'MCA501T', '2021-03-09', 'P', 0),
(128, '18SKSAC008', 'MCA501T', '2021-03-09', 'P', 0),
(129, '18SKSAC004', 'MCA502T', '2021-03-09', 'P', 0),
(130, '18SKSAC006', 'MCA502T', '2021-03-09', 'P', 0),
(131, '18SKSAC008', 'MCA502T', '2021-03-09', 'P', 0),
(132, '18SKSAC004', 'MCA503T', '2021-03-09', 'p', 0),
(133, '18SKSAC006', 'MCA503T', '2021-03-09', 'p', 0),
(134, '18SKSAC008', 'MCA503T', '2021-03-09', 'p', 0),
(135, '18SKSAC004', 'MCA504T', '2021-03-09', 'P', 0),
(136, '18SKSAC006', 'MCA504T', '2021-03-09', 'P', 0),
(137, '18SKSAC008', 'MCA504T', '2021-03-09', 'P', 0),
(138, '18SKSAC004', 'MCA505P', '2021-03-09', 'P', 0),
(139, '18SKSAC006', 'MCA505P', '2021-03-09', 'P', 0),
(140, '18SKSAC008', 'MCA505P', '2021-03-09', 'P', 0),
(141, '18SKSAC004', 'MCA506P', '2021-03-09', 'P', 0),
(142, '18SKSAC006', 'MCA506P', '2021-03-09', 'P', 0),
(143, '18SKSAC008', 'MCA506P', '2021-03-09', 'p', 0),
(144, '18SKSAC004', 'MCA501T', '2021-03-11', 'P', 0),
(145, '18SKSAC006', 'MCA501T', '2021-03-11', 'P', 0),
(146, '18SKSAC008', 'MCA501T', '2021-03-11', 'P', 0),
(147, '18SKSAC004', 'MCA502T', '2021-03-10', 'P', 0),
(148, '18SKSAC006', 'MCA502T', '2021-03-11', 'P', 0),
(149, '18SKSAC008', 'MCA502T', '2021-03-11', 'P', 0),
(150, '18SKSAC004', 'MCA503T', '2021-03-11', 'p', 0),
(151, '18SKSAC006', 'MCA503T', '2021-03-10', 'p', 0),
(152, '18SKSAC008', 'MCA503T', '2021-03-11', 'p', 0),
(153, '18SKSAC004', 'MCA504T', '2021-03-11', 'P', 0),
(154, '18SKSAC006', 'MCA504T', '2021-03-10', 'P', 0),
(155, '18SKSAC008', 'MCA504T', '2021-03-11', 'P', 0),
(156, '18SKSAC004', 'MCA505P', '2021-03-10', 'P', 0),
(157, '18SKSAC006', 'MCA505P', '2021-03-11', 'P', 0),
(158, '18SKSAC008', 'MCA505P', '2021-03-10', 'P', 0),
(159, '18SKSAC004', 'MCA506P', '2021-03-11', 'P', 0),
(160, '18SKSAC006', 'MCA506P', '2021-03-10', 'P', 0),
(161, '18SKSAC008', 'MCA506P', '2021-03-10', 'p', 0),
(162, '18SKSAC004', 'MCA501T', '2021-03-13', 'P', 0),
(163, '18SKSAC006', 'MCA501T', '2021-03-12', 'P', 0),
(164, '18SKSAC008', 'MCA501T', '2021-03-13', 'P', 0),
(165, '18SKSAC004', 'MCA502T', '2021-03-13', 'P', 0),
(166, '18SKSAC006', 'MCA502T', '2021-03-12', 'P', 0),
(167, '18SKSAC008', 'MCA502T', '2021-03-12', 'P', 0),
(168, '18SKSAC004', 'MCA503T', '2021-03-12', 'p', 0),
(169, '18SKSAC006', 'MCA503T', '2021-03-13', 'p', 0),
(170, '18SKSAC008', 'MCA503T', '2021-03-13', 'p', 0),
(171, '18SKSAC004', 'MCA504T', '2021-03-13', 'P', 0),
(172, '18SKSAC006', 'MCA504T', '2021-03-12', 'P', 0),
(173, '18SKSAC008', 'MCA504T', '2021-03-13', 'P', 0),
(174, '18SKSAC004', 'MCA505P', '2021-03-13', 'P', 0),
(175, '18SKSAC006', 'MCA505P', '2021-03-13', 'P', 0),
(176, '18SKSAC008', 'MCA505P', '2021-03-13', 'P', 0),
(177, '18SKSAC004', 'MCA506P', '2021-03-12', 'P', 0),
(178, '18SKSAC006', 'MCA506P', '2021-03-12', 'P', 0),
(179, '18SKSAC008', 'MCA506P', '2021-03-12', 'p', 0),
(180, '18SKSAC004', 'MCA501T', '2021-03-14', 'P', 0),
(181, '18SKSAC006', 'MCA501T', '2021-03-14', 'P', 0),
(182, '18SKSAC008', 'MCA501T', '2021-03-14', 'P', 0),
(183, '18SKSAC004', 'MCA502T', '2021-03-14', 'P', 0),
(184, '18SKSAC006', 'MCA502T', '2021-03-14', 'P', 0),
(185, '18SKSAC008', 'MCA502T', '2021-03-14', 'P', 0),
(186, '18SKSAC004', 'MCA503T', '2021-03-14', 'p', 0),
(187, '18SKSAC006', 'MCA503T', '2021-03-14', 'p', 0),
(188, '18SKSAC008', 'MCA503T', '2021-03-14', 'p', 0),
(189, '18SKSAC004', 'MCA504T', '2021-03-14', 'P', 0),
(190, '18SKSAC006', 'MCA504T', '2021-03-14', 'P', 0),
(191, '18SKSAC008', 'MCA504T', '2021-03-14', 'P', 0),
(192, '18SKSAC004', 'MCA505P', '2021-03-14', 'P', 0),
(193, '18SKSAC006', 'MCA505P', '2021-03-14', 'P', 0),
(194, '18SKSAC008', 'MCA505P', '2021-03-14', 'P', 0),
(195, '18SKSAC004', 'MCA506P', '2021-03-14', 'P', 0),
(196, '18SKSAC006', 'MCA506P', '2021-03-14', 'P', 0),
(197, '18SKSAC008', 'MCA506P', '2021-03-14', 'p', 0),
(198, '18SKSAC004', 'MCA501T', '2021-03-15', 'P', 0),
(199, '18SKSAC006', 'MCA501T', '2021-03-15', 'P', 0),
(200, '18SKSAC008', 'MCA501T', '2021-03-15', 'P', 0),
(201, '18SKSAC004', 'MCA502T', '2021-03-15', 'P', 0),
(202, '18SKSAC006', 'MCA502T', '2021-03-15', 'P', 0),
(203, '18SKSAC008', 'MCA502T', '2021-03-15', 'P', 0),
(204, '18SKSAC004', 'MCA503T', '2021-03-15', 'p', 0),
(205, '18SKSAC006', 'MCA503T', '2021-03-15', 'p', 0),
(206, '18SKSAC008', 'MCA503T', '2021-03-15', 'p', 0),
(207, '18SKSAC004', 'MCA504T', '2021-03-15', 'P', 0),
(208, '18SKSAC006', 'MCA504T', '2021-03-15', 'P', 0),
(209, '18SKSAC008', 'MCA504T', '2021-03-15', 'P', 0),
(210, '18SKSAC004', 'MCA505P', '2021-03-15', 'P', 0),
(211, '18SKSAC006', 'MCA505P', '2021-03-15', 'P', 0),
(212, '18SKSAC008', 'MCA505P', '2021-03-15', 'P', 0),
(213, '18SKSAC004', 'MCA506P', '2021-03-15', 'P', 0),
(214, '18SKSAC006', 'MCA506P', '2021-03-15', 'P', 0),
(215, '18SKSAC008', 'MCA506P', '2021-03-15', 'p', 0),
(216, '18SKSAC004', 'MCA503T', '2021-03-16', 'p', 0),
(217, '18SKSAC006', 'MCA503T', '2021-03-16', 'p', 0),
(218, '18SKSAC008', 'MCA503T', '2021-03-16', 'p', 0),
(219, '18SKSAC004', 'MCA503T', '2021-03-17', 'p', 0),
(220, '18SKSAC006', 'MCA503T', '2021-03-17', 'p', 0),
(221, '18SKSAC008', 'MCA503T', '2021-03-17', 'p', 0),
(222, '18SKSAC004', 'MCA501T', '2021-03-17', 'p', 0),
(223, '18SKSAC006', 'MCA501T', '2021-03-17', 'p', 0),
(224, '18SKSAC008', 'MCA501T', '2021-03-17', 'p', 0),
(225, '18SKSAC004', 'MCA501T', '2021-03-18', 'p', 0),
(226, '18SKSAC006', 'MCA501T', '2021-03-18', 'p', 0),
(227, '18SKSAC008', 'MCA501T', '2021-03-18', 'p', 0),
(228, '18SKSAC004', 'MCA504T', '2021-03-17', 'p', 0),
(229, '18SKSAC006', 'MCA504T', '2021-03-17', 'p', 0),
(230, '18SKSAC008', 'MCA504T', '2021-03-17', 'p', 0),
(231, '18SKSAC004', 'MCA506P', '2021-03-14', 'p', 0),
(232, '18SKSAC006', 'MCA506P', '2021-03-14', 'p', 0),
(233, '18SKSAC008', 'MCA506P', '2021-03-16', 'p', 0),
(234, '18SKSAC004', 'MCA506P', '2021-03-15', 'p', 0),
(235, '18SKSAC006', 'MCA506P', '2021-03-15', 'p', 0),
(236, '18SKSAC008', 'MCA506P', '2021-03-15', 'p', 0),
(237, '18SKSAC004', 'MCA506P', '2021-03-17', 'p', 0),
(238, '18SKSAC006', 'MCA506P', '2021-03-18', 'p', 0),
(239, '18SKSAC008', 'MCA506P', '2021-03-19', 'p', 0),
(240, '18SKSAC004', 'MCA506P', '2021-03-21', 'p', 0),
(241, '18SKSAC006', 'MCA506P', '2021-03-21', 'p', 0),
(242, '18SKSAC008', 'MCA506P', '2021-03-24', 'p', 0),
(243, '18SKSAC004', 'MCA505P', '2021-03-20', 'p', 0),
(244, '18SKSAC006', 'MCA505P', '2021-03-21', 'p', 0),
(245, '18SKSAC008', 'MCA505P', '2021-03-24', 'p', 0),
(246, '18SKSAC004', 'MCA505P', '2021-03-21', 'p', 0),
(247, '18SKSAC006', 'MCA505P', '2021-03-22', 'p', 0),
(248, '18SKSAC008', 'MCA505P', '2021-03-25', 'p', 0),
(249, '18SKSAC004', 'MCA505P', '2021-03-23', 'p', 0),
(250, '18SKSAC006', 'MCA505P', '2021-03-24', 'p', 0),
(251, '18SKSAC008', 'MCA505P', '2021-03-21', 'p', 0),
(252, '18SKSAC004', 'MCA501T', '2021-02-21', 'p', 0),
(253, '18SKSAC006', 'MCA502T', '2021-02-21', 'p', 0),
(254, '18SKSAC008', 'MCA503T', '2021-02-21', 'p', 0),
(255, '18SKSAC004', 'MCA501T', '2021-02-22', 'p', 0),
(256, '18SKSAC006', 'MCA502T', '2021-02-21', 'p', 0),
(257, '18SKSAC006', 'MCA501T', '2021-02-23', 'p', 0),
(258, '18SKSAC008', 'MCA501T', '2021-02-22', 'p', 0),
(259, '18SKSAC004', 'MCA501T', '2021-02-26', 'p', 0),
(260, '18SKSAC006', 'MCA502T', '2021-02-26', 'p', 0),
(261, '18SKSAC006', 'MCA501T', '2021-02-26', 'p', 0),
(262, '18SKSAC008', 'MCA502T', '2021-02-26', 'p', 0),
(263, '18SKSAC004', 'MCA505P', '2021-02-27', 'p', 0),
(264, '18SKSAC006', 'MCA505P', '2021-02-27', 'p', 0),
(265, '18SKSAC006', 'MCA505P', '2021-02-28', 'p', 0),
(266, '18SKSAC008', 'MCA505P', '2021-02-27', 'p', 0);

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
(7, 'Android 11; M2007aaSP) ', '2021-03-22', 'active', 'phone');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tbl`
--

CREATE TABLE `faculty_tbl` (
  `faculty_id` int(5) NOT NULL,
  `faculty_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_tbl`
--

INSERT INTO `faculty_tbl` (`faculty_id`, `faculty_name`, `email`, `password`) VALUES
(1, 'Rajkumar Rana', 'raj@gmail.com', 'add'),
(2, 'GaribRaj Giridhar', 'jar@gmail.com', 'add');

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
(7, '18SKSAC004', 'RAHUL SHARMA', 'MCA', 5, 18, 'rs@gmail.com', 'ioi', 980000098);

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
-- Indexes for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  ADD PRIMARY KEY (`faculty_id`);

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
  MODIFY `at_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `device_details`
--
ALTER TABLE `device_details`
  MODIFY `dd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  MODIFY `faculty_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `std_details`
--
ALTER TABLE `std_details`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
