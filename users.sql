-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 07:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adduser`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `EMP_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `age` int(11) NOT NULL,
  `joinDate` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `leave` int(11) NOT NULL DEFAULT 5,
  `salary` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`EMP_ID`, `name`, `email`, `phone`, `age`, `joinDate`, `role`, `leave`, `salary`, `gender`, `country`) VALUES
(1, 'Jermiah Fisher', 'jerbelly18@gmail.com', '635485504', 20, '2024-03-03', 'Graphic Designer', 5, 40000, 0, ''),
(2, 'Darsh Patel', 'darshpatel45@gmail.com', '8784590231', 20, '2024-03-21', 'Manager', 5, 50000, 0, ''),
(4, 'Elena Gilbert', 'hopemikelson5@gmail.com', '8780882261', 19, '2024-04-02', 'vampire', 5, 5000, 0, 'USA'),
(5, 'Kunjalba vala', 'kunjal24@gmail.com', '8780882261', 20, '2024-04-20', 'Analyst', 5, 20000000, 0, 'Country'),
(6, 'Belly fisher', '22cs044@charusat.edu.in', '8780882261', 20, '2024-04-12', 'vampire', 5, 50000, 0, 'Japan'),
(8, 'Belly conrard 2', '22cs044@charusat.edu.in', '8780882261', 20, '2024-04-12', 'vampire', 5, 50000, 0, 'Japan'),
(9, 'Hetanshi Patel', 'kunjal24@gmail.com', '9913545778', 19, '2024-04-12', 'Manager', 5, 20000000, 0, 'USA'),
(10, 'Belly conrard', '22cs044@charusat.edu.in', '991354577', 19, '2024-04-14', 'Developer', 5, 5000, 0, 'USA'),
(11, 'Kunjalba Vala', 'kunjal24@gmail.com', '8780882261', 20, '2024-04-13', 'Analyst', 5, 50000, 0, 'USA'),
(13, 'Yajat Panchal', 'yajat2512@gmail.com', '9979534982', 19, '2024-04-11', 'Panchaat', 5, 10000, 0, 'India'),
(14, 'Hanaah Baker', 'hanahh13@gmail.com', '8780882216', 19, '2024-04-18', 'Intern', 5, 2000, 0, 'USA'),
(15, 'Stefan Salvatore', 'stefansalvatore1864@gmail.com', '8849727974', 20, '2024-04-19', 'Doplegenger', 5, 1000000, 0, 'USA'),
(31, 'Dhruvi Mahale', 'dhruvimahale34@gmail.com', '8780882261', 20, '2024-05-08', 'Analyst', 5, 20000000, 0, 'India'),
(32, 'Princy patel', 'princyyy25@gmail.com', '991354577', 20, '2024-05-31', 'Worker', 5, 2000, 0, 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
