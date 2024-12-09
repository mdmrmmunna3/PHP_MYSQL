-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 08:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_information`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_student` (IN `n` VARCHAR(255), IN `e` VARCHAR(255), IN `ph` VARCHAR(255), IN `gen` VARCHAR(255))   BEGIN
INSERT INTO student_info SET id = null, name=n, email=e, phone=ph, gender=gen;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_info` (IN `stId` INT(11), IN `stN` VARCHAR(255), IN `stE` VARCHAR(255), IN `stPh` VARCHAR(255), IN `stGen` VARCHAR(255))   BEGIN
UPDATE student_info SET name=stN, email=stE, phone=stPh, gender=stGen WHERE id =stId;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `email`, `phone`, `gender`) VALUES
(12, 'munna', 'munna2@gmail.com', '01247574603', 'Male'),
(15, 'Tiger', 'tiger@gmail.com', '7896325', 'Male'),
(16, 'Hazrat A', 'bangladesh@gmail.com', '145111657464', 'Male'),
(17, 'Bangladesh', 'bangladesh@gmail.com', '101353212332', 'Female'),
(18, 'munna', 'admin@gmail.com', '145111657464', 'Male'),
(19, 'ali akbar', 'ali@gmail.com', '145111657464', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
