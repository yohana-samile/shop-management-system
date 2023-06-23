-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2023 at 02:38 PM
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
-- Database: `shopmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` text NOT NULL,
  `productCategory` int(11) NOT NULL,
  `productUnit` int(11) NOT NULL,
  `productsInStock` int(11) NOT NULL DEFAULT 1,
  `productPrice` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'on stock',
  `productRegisteredBy` int(11) NOT NULL,
  `dateProductAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `dateProductModified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `productCategory`, `productUnit`, `productsInStock`, `productPrice`, `status`, `productRegisteredBy`, `dateProductAdded`, `dateProductModified`) VALUES
(1, 'azam energy', 1, 14, 50, 500, 'on stock', 1, '2023-06-21 20:39:38', '0000-00-00 00:00:00'),
(2, 'tunda', 18, 14, 12, 700, 'on stock', 1, '2023-06-21 20:54:34', '0000-00-00 00:00:00'),
(3, 'azam energy', 1, 14, 50, 500, 'on stock', 1, '2023-06-21 20:39:38', '0000-00-00 00:00:00'),
(4, 'azam energy', 1, 14, 50, 500, 'on stock', 1, '2023-06-21 20:39:38', '0000-00-00 00:00:00'),
(5, 'azam energy', 1, 14, 50, 500, 'on stock', 1, '2023-06-21 20:39:38', '0000-00-00 00:00:00'),
(6, 'apple punch', 1, 16, 50, 500, 'on stock', 4, '2023-06-22 12:57:34', '0000-00-00 00:00:00'),
(7, 'azam cola', 1, 16, 13, 600, 'on stock', 1, '2023-06-22 12:57:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `categoryId` int(11) NOT NULL,
  `categoryName` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `dateCategoryAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `dateCategoryModified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`categoryId`, `categoryName`, `addedBy`, `dateCategoryAdded`, `dateCategoryModified`) VALUES
(1, 'Juice', 1, '2023-06-14 18:33:40', '0000-00-00 00:00:00'),
(18, 'soft beverages', 1, '2023-06-15 18:06:53', '0000-00-00 00:00:00'),
(19, 'alcoholic beverages', 1, '2023-06-16 20:05:51', '0000-00-00 00:00:00'),
(20, 'alcoholic beverages', 1, '2023-06-21 14:37:31', '0000-00-00 00:00:00'),
(21, 'home appliances', 4, '2023-06-22 11:45:52', '0000-00-00 00:00:00'),
(22, 'home appliances', 4, '2023-06-22 11:46:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `producttocart`
--

CREATE TABLE `producttocart` (
  `cartId` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '''on cart''',
  `dateProductAddedInCart` datetime NOT NULL DEFAULT current_timestamp(),
  `dateSold` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttocart`
--

INSERT INTO `producttocart` (`cartId`, `product`, `productQuantity`, `productPrice`, `status`, `dateProductAddedInCart`, `dateSold`) VALUES
(3, 1, 30, 15000, 'sold', '2023-06-17 22:51:41', '0000-00-00 00:00:00'),
(4, 2, 5, 2500, 'sold', '2023-06-18 17:34:38', '0000-00-00 00:00:00'),
(5, 1, 5, 2500, 'sold', '2023-06-18 17:51:23', '0000-00-00 00:00:00'),
(6, 1, 45, 22500, 'sold', '2023-06-18 18:17:37', '0000-00-00 00:00:00'),
(7, 2, 2, 1000, 'sold', '2023-06-18 19:19:43', '2023-06-18 19:19:45'),
(8, 2, 3, 1500, 'on cart', '2023-06-21 14:35:50', '0000-00-00 00:00:00'),
(9, 2, 10, 5000, 'sold', '2023-06-21 15:48:29', '2023-06-21 15:48:59'),
(10, 1, 20, 10000, 'on cart', '2023-06-21 20:44:11', '0000-00-00 00:00:00'),
(11, 7, 20, 12000, 'sold', '2023-06-22 13:15:15', '2023-06-22 13:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `productUnit`
--

CREATE TABLE `productUnit` (
  `unitId` int(11) NOT NULL,
  `unitName` text NOT NULL,
  `addedBy` int(11) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `timeModified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productUnit`
--

INSERT INTO `productUnit` (`unitId`, `unitName`, `addedBy`, `dateAdded`, `timeModified`) VALUES
(12, 'kilogram', 1, '2023-06-21 18:25:00', '2023-06-21 19:13:39'),
(14, 'dozen', 1, '2023-06-21 19:13:50', '2023-06-21 20:35:15'),
(16, 'catton', 4, '2023-06-22 12:56:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE `systemlogs` (
  `logId` int(11) NOT NULL,
  `actionPerformed` text NOT NULL,
  `performedBy` int(11) NOT NULL,
  `dateTimePerformed` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `systemlogs`
--

INSERT INTO `systemlogs` (`logId`, `actionPerformed`, `performedBy`, `dateTimePerformed`) VALUES
(1, 'login in the system', 1, '2023-06-14 17:34:43'),
(2, 'logout', 1, '2023-06-14 17:46:51'),
(3, 'login in the system', 1, '2023-06-14 17:46:56'),
(4, 'logout', 1, '2023-06-14 17:48:29'),
(5, 'login in the system', 1, '2023-06-14 17:48:34'),
(6, 'logout', 1, '2023-06-14 18:03:59'),
(7, 'login in the system', 1, '2023-06-14 18:19:57'),
(9, 'Register Product Category', 1, '2023-06-14 18:41:51'),
(10, 'Register Product Category', 1, '2023-06-14 18:43:03'),
(11, 'Register Product Category', 1, '2023-06-14 18:43:48'),
(12, 'logout', 1, '2023-06-15 09:00:41'),
(13, 'login in the system', 1, '2023-06-15 17:16:10'),
(14, 'Register New user Role', 1, '2023-06-15 17:33:51'),
(15, 'Register New user Role', 1, '2023-06-15 17:37:10'),
(16, 'Register Product Category', 1, '2023-06-15 18:06:53'),
(17, 'logout', 1, '2023-06-15 19:18:54'),
(18, 'login in the system', 1, '2023-06-15 19:19:07'),
(19, 'logout', 1, '2023-06-15 19:19:13'),
(20, 'login in the system', 1, '2023-06-15 19:19:20'),
(21, 'Staff Registration', 1, '2023-06-15 18:53:56'),
(22, 'logout', 1, '2023-06-15 20:12:09'),
(23, 'login in the system', 1, '2023-06-16 20:30:48'),
(24, 'Register Product ', 1, '2023-06-16 21:00:44'),
(25, 'Register Product ', 1, '2023-06-16 21:01:03'),
(26, 'Register Product Category', 1, '2023-06-16 20:05:51'),
(27, 'edit Product', 1, '2023-06-16 22:38:52'),
(28, 'edit Product', 1, '2023-06-16 22:40:03'),
(29, 'edit Product', 1, '2023-06-16 22:41:20'),
(30, 'add Product to card', 1, '2023-06-17 22:50:02'),
(31, 'add Product to card', 1, '2023-06-17 22:51:41'),
(32, 'order modification', 1, '2023-06-18 01:58:06'),
(33, 'order modification', 1, '2023-06-18 15:17:10'),
(34, 'order modification', 1, '2023-06-18 15:18:16'),
(35, 'order modification', 1, '2023-06-18 15:18:45'),
(36, 'order modification', 1, '2023-06-18 15:18:55'),
(37, 'order modification', 1, '2023-06-18 15:19:18'),
(38, 'order modification', 1, '2023-06-18 15:19:39'),
(39, 'order modification', 1, '2023-06-18 15:24:54'),
(40, 'order modification', 1, '2023-06-18 15:25:21'),
(41, 'order modification', 1, '2023-06-18 15:25:35'),
(42, 'order modification', 1, '2023-06-18 15:35:05'),
(43, 'order modification', 1, '2023-06-18 15:38:43'),
(44, 'order modification', 1, '2023-06-18 15:39:17'),
(45, 'order modification', 1, '2023-06-18 15:40:45'),
(46, 'order modification', 1, '2023-06-18 15:41:00'),
(47, 'order modification', 1, '2023-06-18 16:23:22'),
(48, 'order modification', 1, '2023-06-18 17:15:50'),
(49, 'order modification', 1, '2023-06-18 17:16:05'),
(50, 'order modification', 1, '2023-06-18 17:17:13'),
(51, 'order modification', 1, '2023-06-18 17:17:38'),
(52, 'Sell product', 1, '2023-06-18 17:26:53'),
(53, 'add Product to card', 1, '2023-06-18 17:34:38'),
(54, 'Sell product', 1, '2023-06-18 17:39:09'),
(55, 'add Product to card', 1, '2023-06-18 17:51:23'),
(56, 'Sell product', 1, '2023-06-18 18:13:28'),
(57, 'add Product to card', 1, '2023-06-18 18:17:37'),
(58, 'Sell product', 1, '2023-06-18 18:17:39'),
(59, 'add Product to card', 1, '2023-06-18 19:19:43'),
(60, 'Sell product', 1, '2023-06-18 19:19:45'),
(61, 'logout', 1, '2023-06-19 03:58:06'),
(62, 'login in the system', 1, '2023-06-19 22:28:37'),
(63, 'login in the system', 1, '2023-06-20 01:30:12'),
(64, 'logout', 1, '2023-06-20 01:53:51'),
(65, 'login in the system', 1, '2023-06-20 02:00:12'),
(66, 'logout', 1, '2023-06-20 02:23:15'),
(67, 'login in the system', 2, '2023-06-20 02:23:57'),
(68, 'logout', 2, '2023-06-20 02:41:25'),
(69, 'login in the system', 1, '2023-06-20 02:41:32'),
(70, 'logout', 1, '2023-06-20 02:41:42'),
(71, 'login in the system', 1, '2023-06-20 02:41:47'),
(72, 'logout', 1, '2023-06-20 02:42:57'),
(73, 'login in the system', 1, '2023-06-20 11:29:01'),
(74, 'login in the system', 1, '2023-06-20 15:30:38'),
(75, 'logout', 1, '2023-06-20 15:51:23'),
(76, 'login in the system', 1, '2023-06-21 01:27:20'),
(77, 'Register New user Role', 1, '2023-06-21 00:44:15'),
(78, 'login in the system', 1, '2023-06-21 13:27:38'),
(79, 'add Product to card', 1, '2023-06-21 14:35:50'),
(80, 'order modification', 1, '2023-06-21 14:36:09'),
(81, 'logout', 1, '2023-06-21 14:47:57'),
(82, 'login in the system', 1, '2023-06-21 15:36:58'),
(83, 'Register Product Category', 1, '2023-06-21 14:37:31'),
(84, 'Staff Registration', 1, '2023-06-21 14:43:12'),
(85, 'add Product to card', 1, '2023-06-21 15:48:29'),
(86, 'order modification', 1, '2023-06-21 15:48:54'),
(87, 'Sell product', 1, '2023-06-21 15:48:59'),
(88, 'logout', 1, '2023-06-21 15:56:24'),
(89, 'login in the system', 2, '2023-06-21 15:56:30'),
(90, 'logout', 2, '2023-06-21 16:01:52'),
(91, 'login in the system', 1, '2023-06-21 16:02:14'),
(92, 'logout', 1, '2023-06-21 16:04:16'),
(93, 'login in the system', 4, '2023-06-21 16:04:23'),
(94, 'logout', 4, '2023-06-21 16:06:18'),
(95, 'login in the system', 1, '2023-06-21 16:24:31'),
(96, 'Register Product ', 1, '2023-06-21 20:36:00'),
(97, 'Register Product ', 1, '2023-06-21 20:39:38'),
(98, 'add Product to card', 1, '2023-06-21 20:44:11'),
(99, 'Register Product ', 1, '2023-06-21 20:54:34'),
(100, 'logout', 1, '2023-06-21 20:59:06'),
(101, 'login in the system', 1, '2023-06-21 21:06:17'),
(102, 'Staff Registration', 1, '2023-06-21 22:57:12'),
(103, 'logout', 1, '2023-06-21 23:59:44'),
(104, 'login in the system', 4, '2023-06-21 23:59:51'),
(105, 'logout', 4, '2023-06-22 00:01:40'),
(106, 'login in the system', 6, '2023-06-22 00:01:50'),
(107, 'logout', 6, '2023-06-22 00:18:03'),
(108, 'login in the system', 1, '2023-06-22 08:22:45'),
(109, 'logout', 1, '2023-06-22 12:44:02'),
(110, 'login in the system', 4, '2023-06-22 12:44:07'),
(111, 'Register Product Category', 4, '2023-06-22 11:45:52'),
(112, 'Register Product Category', 4, '2023-06-22 11:46:45'),
(113, 'Register New user Role', 1, '2023-06-22 11:49:47'),
(114, 'Staff Registration', 1, '2023-06-22 11:53:34'),
(115, 'Register Product ', 4, '2023-06-22 12:57:34'),
(116, 'add Product to card', 4, '2023-06-22 13:15:15'),
(117, 'order modification', 4, '2023-06-22 13:16:23'),
(118, 'order modification', 4, '2023-06-22 13:16:43'),
(119, 'Sell product', 4, '2023-06-22 13:16:53'),
(120, 'logout', 4, '2023-06-22 13:41:31'),
(121, 'login in the system', 3, '2023-06-22 13:42:06'),
(122, 'logout', 3, '2023-06-22 13:42:10'),
(123, 'login in the system', 3, '2023-06-22 13:42:38'),
(124, 'logout', 3, '2023-06-22 13:44:32'),
(125, 'login in the system', 2, '2023-06-22 13:45:18'),
(126, 'logout', 2, '2023-06-22 13:45:52'),
(127, 'login in the system', 3, '2023-06-22 13:46:42'),
(128, 'logout', 3, '2023-06-22 13:48:08'),
(129, 'login in the system', 1, '2023-06-22 13:52:06'),
(130, 'logout', 1, '2023-06-22 14:32:26'),
(131, 'login in the system', 1, '2023-06-22 15:23:26'),
(132, 'logout', 1, '2023-06-22 15:29:55'),
(133, 'login in the system', 1, '2023-06-22 15:30:09'),
(134, 'logout', 1, '2023-06-22 15:30:10'),
(135, 'login in the system', 1, '2023-06-22 15:30:16'),
(136, 'logout', 1, '2023-06-22 15:30:21'),
(137, 'login in the system', 1, '2023-06-22 15:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `username` varchar(100) NOT NULL,
  `passportSize` text NOT NULL,
  `position` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `dateModified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `fullName`, `gender`, `username`, `passportSize`, `position`, `password`, `dateAdded`, `dateModified`) VALUES
(1, 'yohana samile', 'male', 'samile', 'default.png', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2023-06-06 15:21:53', '2023-06-06 15:21:53'),
(2, 'Stanley mtui', 'male', 'mtui', 'default.png', 4, '81dc9bdb52d04dc20036dbd8313ed055', '2023-06-15 18:53:56', '0000-00-00 00:00:00'),
(3, 'magreth evarist', 'female', 'evarist', 'img.png', 5, '81dc9bdb52d04dc20036dbd8313ed055', '2023-06-21 01:00:35', '0000-00-00 00:00:00'),
(4, 'olipa sanga', 'female', 'olipa', 'img.png', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2023-06-21 14:43:12', '0000-00-00 00:00:00'),
(6, 'zaituni mohammed', 'female', 'zaituni', 'IMG-20230619-WA0001.jpg', 4, '81dc9bdb52d04dc20036dbd8313ed055', '2023-06-21 22:57:12', '0000-00-00 00:00:00'),
(7, 'Eliya Peter Shimba', 'male', 'shimba', 'Zanzibar_Utility_Regulatory_Authority_Logo.png', 4, '81dc9bdb52d04dc20036dbd8313ed055', '2023-06-22 11:53:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `dateModified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`roleId`, `roleName`, `dateAdded`, `dateModified`) VALUES
(1, 'administrator', '2023-06-06 15:18:19', '2000-06-06 15:18:19'),
(4, 'cashier', '2023-06-15 17:37:10', '0000-00-00 00:00:00'),
(5, 'aid', '2023-06-21 00:44:15', '0000-00-00 00:00:00'),
(6, 'manager', '2023-06-22 11:49:47', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `productCategory` (`productCategory`),
  ADD KEY `productUnit` (`productUnit`),
  ADD KEY `productRegisteredBy` (`productRegisteredBy`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `producttocart`
--
ALTER TABLE `producttocart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `productUnit`
--
ALTER TABLE `productUnit`
  ADD PRIMARY KEY (`unitId`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD PRIMARY KEY (`logId`),
  ADD KEY `performedBy` (`performedBy`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `producttocart`
--
ALTER TABLE `producttocart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productUnit`
--
ALTER TABLE `productUnit`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `systemlogs`
--
ALTER TABLE `systemlogs`
  MODIFY `logId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`productCategory`) REFERENCES `productcategory` (`categoryId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`productUnit`) REFERENCES `productUnit` (`unitId`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`productRegisteredBy`) REFERENCES `user` (`userId`);

--
-- Constraints for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD CONSTRAINT `productcategory_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `user` (`userId`);

--
-- Constraints for table `producttocart`
--
ALTER TABLE `producttocart`
  ADD CONSTRAINT `producttocart_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`productId`);

--
-- Constraints for table `productUnit`
--
ALTER TABLE `productUnit`
  ADD CONSTRAINT `productUnit_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `user` (`userId`);

--
-- Constraints for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD CONSTRAINT `systemlogs_ibfk_1` FOREIGN KEY (`performedBy`) REFERENCES `user` (`userId`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`position`) REFERENCES `userrole` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
