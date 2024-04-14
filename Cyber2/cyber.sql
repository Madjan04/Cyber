-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 01:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyber`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(4, 'Fantasy'),
(5, 'Adventure'),
(6, 'Action'),
(7, 'Sports'),
(8, 'Sci-Fi'),
(9, 'MMORPG'),
(10, 'Arcade');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordersID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `date_ordered` varchar(88) DEFAULT NULL,
  `MOP` varchar(88) DEFAULT NULL,
  `Transaction_code` varchar(88) DEFAULT NULL,
  `TransactionID` varchar(88) DEFAULT NULL,
  `Status` varchar(88) NOT NULL DEFAULT 'unpaid',
  `Rate` varchar(88) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordersID`, `userID`, `productID`, `date_ordered`, `MOP`, `Transaction_code`, `TransactionID`, `Status`, `Rate`) VALUES
(20, 9, 12, 'February-13-2024 11:07pm', 'Gcash', 'JHD09765A4', 'SKU4962-9485-1342', 'rated', '3'),
(21, 9, 22, 'February-13-2024 11:09pm', 'Paymaya', 'JHD09765A4', 'SKU5187-3474-9576', 'rated', '3'),
(22, 9, 11, 'February-13-2024 11:27pm', 'Gcash', 'MHGt2568o', 'SKU8244-5913-8742', 'paid', NULL),
(23, 9, 20, 'February-16-2024 8:33pm', 'Gcash', 'HKh8797l', 'SKU3687-6801-9712', 'paid', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productName` varchar(88) NOT NULL,
  `productImage` varchar(88) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `files` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `categoryID`, `productName`, `productImage`, `productPrice`, `files`) VALUES
(11, 4, 'Arcana', 'game1.png', 1989, 'game1.png'),
(12, 4, 'When Sky Meets the Sea', 'game2.jpg', 999, 'game2.jpg'),
(13, 5, 'The Little Octopus', 'game3.png', 1200, 'game3.png'),
(14, 4, 'Atlantis', 'game4.jpg', 759, 'game4.jpg'),
(15, 4, 'Mystic: Blood Lake', 'game6.png', 1499, 'game6.png'),
(16, 7, 'Tennis Mania 2', 'game7.png', 899, 'game7.png'),
(17, 8, 'End Game 2987', 'game8.png', 1370, 'game8.png'),
(18, 8, 'Alienation', 'game9.png', 1890, 'game9.png'),
(19, 6, 'Faith & Glory: Reborn', 'game5.png', 1335, 'game5.png'),
(20, 10, 'Chicken Surf', 'game10.png', 989, 'game10.png'),
(21, 4, 'The Reaper of Morris Hill', 'game11.png', 1600, 'game11.png'),
(22, 9, 'Anna: Order of the Heiress', 'game12.png', 2000, 'game12.png'),
(23, 5, 'anime', 'download.jpg', 878, 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `code` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `roles` int(11) NOT NULL DEFAULT 2,
  `profile` varchar(288) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `first_name`, `last_name`, `address`, `contact`, `email`, `password`, `code`, `status`, `roles`, `profile`) VALUES
(8, 'Admin', 'Admin', 'New York', '092365785', 'admin@gmail.com', '$2y$10$XEPlQKZL.6bmTZBHZTE0juCyfJHKpdo.Nu3DLY1YWAeG1eAeMygOe', 0, 'verified', 1, 'avatar.png'),
(9, 'Analyn', 'Decierdo', 'Zamboanga City', '0912345678', 'analyn@gmail.com', '$2y$10$j.4hjBij5wuiD0AiPvQMwOABjridvx5q67p36OaeosvOC54MCJQmC', 0, 'verified', 2, 'download.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersID`,`userID`,`productID`),
  ADD KEY `fk_orders` (`userID`),
  ADD KEY `fk_orders1` (`productID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`,`categoryID`),
  ADD KEY `fk_product` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_orders1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
