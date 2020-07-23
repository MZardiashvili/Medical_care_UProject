-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 08:54 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medclinic_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appt_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DEPARTMENT_ID` int(11) NOT NULL,
  `DEPARTMENT_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `image` varchar(200) NOT NULL,
  `Doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Address` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `Department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`image`, `Doctor_id`, `doctor_name`, `Gender`, `Address`, `phonenumber`, `salary`, `Department_id`) VALUES
('meredith.jpg', 15, 'Meredith Grey', 'Female', 'Kingston, New York 12401: United States', '577456893', '$1,920,000', NULL),
('dr_mike.jpeg', 16, 'Mikhail Varshavski', 'Male', '492 Main St, , Chatham, New Jersey', '727-397-195', '$200000', NULL),
('house.jpg', 17, 'Gregory House', 'Male', '221B Baker Street', '973-635-243', '$1,920,000', NULL),
('shaun.jpg', 18, 'Shaun Murphy', 'Male', 'Kingston, New York 12401: United States', '727-397-195', '$25075000', NULL),
('meredith.jpg', 19, 'Meredith Grey', 'Female', '492 Main St, , Chatham, New Jersey', '727-397-195', '$1,920,000', NULL),
('grey.jpg', 20, 'Miranda Bailey', 'Female', '613 Harper Lane', '273-456-987', '$1,000,000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `info` varchar(255) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appt_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `fullname`, `address`, `Gender`, `email`, `phonenumber`, `DOB`, `info`, `doctor_id`, `appt_id`) VALUES
(3, 'mariam zardiashvili', '221B Baker Street', 'Female', 'zardiashvili@gmail.com', '577456893', '2020-06-11', 'write something here', NULL, NULL),
(4, 'nana peikrishvili', '492 Main St', 'Female', 'nanapeiqrishvili@gmail.com', '273-456-987', '2020-07-23', 'something', NULL, NULL),
(5, 'tamar nasrashvili', 'georgia, tbilisi', 'Female', 'tamarnasrashvili@gmail.com', '551848402', '2020-07-01', 'bla bla bla', NULL, NULL),
(6, 'tamar nasrashvili', 'georgia, tbilisi', 'Female', 'tamarnasrashvili@gmail.com', '551848402', '2020-07-01', 'bla bla bla', NULL, NULL),
(10, 'giorgi zardiashvili', '613 Harper Lane', 'Male', 'gzardiashvili@gmail.com', '727-397-195', '2020-07-08', 'kljfdskjdhfjds', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `user_type`, `create_at`) VALUES
(1, 'mariam zardiashvili', 'Mariami_00', 'mariamizardiashvili@gmail.com', '0', '', '2020-07-08 16:15:29'),
(2, 'giorgi zardiashvili', 'giorgi', 'giorgizardiashvili@gmail.com', '0', '', '2020-07-08 16:16:51'),
(3, 'zardiashvili mariami', 'mariarty', 'mrmzardiashvili@gmail.com', '$2y$10$bNxgk8jDYRntMkJZqECkv..WvKdy.GD5FFFJKTG3k/qtrO5uShxnG', '', '2020-07-08 16:18:05'),
(4, 'nanuka dolidze', 'nanuka_11', 'nanuka123@gmail.com', '$2y$10$injVv8503dmMheND1h.CeOLaByLq9p6A.uZeTXsKtB83Q4k5.yMay', '', '2020-07-08 16:20:41'),
(5, 'nata shengelia', 'nata_7', 'natashengelia@gmail.com', 'beab9bbc5f3174b4d32d2de76dc9b801', 'user', '2020-07-08 17:12:55'),
(6, 'zardiashvili mariami', 'Mariami_00', 'mariamizardiashvili@gmail.com', '4145b776f78b8bd932c2e68fe8b2b44c', '', '2020-07-08 17:35:25'),
(7, 'nanuka dolidze', 'nanuka_23', 'nanukadolidze@gmail.com', '7b7e7d34c9623ac5a96576a846b4957b', 'admin', '2020-07-17 14:04:20'),
(8, 'mariam zardiashvili', 'mariarty', 'mzardiashvili@gmail.com', '4145b776f78b8bd932c2e68fe8b2b44c', 'admin', '2020-07-17 14:13:23'),
(9, 'tamar nasrashvili', 'tamari123', 'tamarnasrashvili@gmail.com', '386220911a0f2256f4ced87b886db0f6', 'user', '2020-07-17 15:21:59'),
(10, 'nata shengelia', 'nata12', 'natashengelia1@gmail.com', 'a817d533ed72329657a2a92db23ec63b', 'user', '2020-07-18 14:22:09'),
(11, 'tamar nasrashvili', 'tamari1', 'natashengelia@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2020-07-18 14:25:32'),
(12, 'tamar nasrashvili', 'nanuka_23', 'dolidze@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2020-07-18 14:26:22'),
(13, 'nata shengelia', 'nata1', 'shengelianata@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2020-07-18 14:29:57'),
(14, 'giorgi zardiashvili', 'giorgi', 'zardiashvili@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '2020-07-18 14:30:32'),
(15, 'nana peikrishvili', 'nana_123', 'nanapeikrishvili@gmail.com', '518d5f3401534f5c6c21977f12f60989', 'user', '2020-07-18 17:52:33'),
(16, 'mariam zardiashvili', 'mariarty121', 'mariamizardiashvi2li@gmail.com', '72496e635a3b9dc5eed9c60bc3b152a0', 'user', '2020-07-18 18:23:34'),
(17, 'Mariam Zardiashvili', 'admin', 'adminadmin@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin', '2020-07-18 18:25:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appt_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DEPARTMENT_ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Doctor_id`),
  ADD KEY `Department_id` (`Department_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `appt_id` (`appt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DEPARTMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `Doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`Department_id`) REFERENCES `departments` (`DEPARTMENT_ID`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`Doctor_id`),
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`Doctor_id`),
  ADD CONSTRAINT `patients_ibfk_3` FOREIGN KEY (`appt_id`) REFERENCES `appointment` (`appt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
