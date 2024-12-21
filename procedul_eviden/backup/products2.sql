-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 06:03 AM
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
-- Database: `products2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `manufac` (IN `manu_n` VARCHAR(50), IN `manu_add` VARCHAR(100), IN `manu_con` VARCHAR(50))   BEGIN
INSERT INTO manufacture SET id=null, name = manu_n, address = manu_add, contact = manu_con;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `products` (IN `p_name` VARCHAR(50), IN `p_price` INT(5), IN `manu_id` INT)   BEGIN
INSERT INTO product SET id=null, name = p_name, price = P_price, manufacture_id = manu_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`id`, `name`, `address`, `contact`) VALUES
(1, 'Redmi', 'Agargoan,Super Market', '01421464521'),
(3, 'samsung', 'Shymoli Squre', '0101454741'),
(4, 'Infinix', 'Amar bazar', '012478562');

--
-- Triggers `manufacture`
--
DELIMITER $$
CREATE TRIGGER `del_product` AFTER DELETE ON `manufacture` FOR EACH ROW BEGIN
DELETE FROM product WHERE manufacture_id = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  `manufacture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `manufacture_id`) VALUES
(1, 'redmi 15pro max', 60000, 1),
(2, 'redmi 14 pro ', 45000, 1),
(4, 'samsung ultra', 2000, 3),
(5, 'samsung ultra2', 4900, 3),
(6, 'infinix 140', 5001, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_details`
-- (See below for the actual view)
--
CREATE TABLE `products_details` (
`pro_name` varchar(50)
,`price` int(5)
,`manufacture_id` int(11)
,`name` varchar(50)
,`address` varchar(100)
,`contact` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `products_details`
--
DROP TABLE IF EXISTS `products_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_details`  AS SELECT `product`.`name` AS `pro_name`, `product`.`price` AS `price`, `product`.`manufacture_id` AS `manufacture_id`, `manufacture`.`name` AS `name`, `manufacture`.`address` AS `address`, `manufacture`.`contact` AS `contact` FROM (`product` join `manufacture`) WHERE `product`.`manufacture_id` = `manufacture`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
