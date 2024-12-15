-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 07:52 AM
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
-- Database: `products`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_products` (IN `product` VARCHAR(255), IN `brand` INT, IN `pr` DOUBLE(10,2))   BEGIN
INSERT INTO products_info(product_name,brand_id,price) VALUES(product,brand,pr);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_brand` (IN `brandName` VARCHAR(255), IN `contact` VARCHAR(255))   BEGIN
INSERT INTO brand_info SET id=null, name=brandName, contact=contact;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brand_info`
--

CREATE TABLE `brand_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand_info`
--

INSERT INTO `brand_info` (`id`, `name`, `contact`) VALUES
(1, 'redmi', '145124785'),
(2, 'walton', '863453'),
(3, 'samsung', '863453532'),
(4, 'apple', '45637878'),
(5, 'vivo', '56346346'),
(6, 'sony', '0145754754'),
(7, 'oppo', '0145754777'),
(8, 'huyai', '0145754254'),
(9, 'infinix', '5634634614');

--
-- Triggers `brand_info`
--
DELIMITER $$
CREATE TRIGGER `del_product` AFTER DELETE ON `brand_info` FOR EACH ROW BEGIN
DELETE FROM brand_info WHERE brand_id.id = products_info.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_details`
-- (See below for the actual view)
--
CREATE TABLE `products_details` (
`name` varchar(255)
,`contact` varchar(255)
,`product_name` varchar(255)
,`price` double(10,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `products_info`
--

CREATE TABLE `products_info` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_info`
--

INSERT INTO `products_info` (`id`, `product_name`, `brand_id`, `price`) VALUES
(2, 'samsung gallexy', 3, 16500.00),
(3, 'vivo 5g', 5, 20000.00),
(5, 'redmi note 14 pro', 1, 45000.00);

-- --------------------------------------------------------

--
-- Structure for view `products_details`
--
DROP TABLE IF EXISTS `products_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_details`  AS SELECT `brand_info`.`name` AS `name`, `brand_info`.`contact` AS `contact`, `products_info`.`product_name` AS `product_name`, `products_info`.`price` AS `price` FROM (`brand_info` join `products_info`) WHERE `brand_info`.`id` = `products_info`.`brand_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_info`
--
ALTER TABLE `brand_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_info`
--
ALTER TABLE `products_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_info`
--
ALTER TABLE `brand_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products_info`
--
ALTER TABLE `products_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_info`
--
ALTER TABLE `products_info`
  ADD CONSTRAINT `products_info_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
