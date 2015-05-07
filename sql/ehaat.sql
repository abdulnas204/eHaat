-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 11:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ehaat`
--
CREATE DATABASE IF NOT EXISTS `ehaat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ehaat`;

-- --------------------------------------------------------

--
-- Table structure for table `t_executedorderdetails`
--

DROP TABLE IF EXISTS `t_executedorderdetails`;
CREATE TABLE IF NOT EXISTS `t_executedorderdetails` (
  `orderId` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` double(20,10) NOT NULL,
  `price` double(20,10) NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_executedorder`
--

DROP TABLE IF EXISTS `t_executedorder`;
CREATE TABLE IF NOT EXISTS `t_executedorder` (
  `id` int(11) NOT NULL,
  `buyerId` int(11) NOT NULL,
  `addressIndex` int(1) NOT NULL,
  `billAmount` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pendingorderdetails`
--

DROP TABLE IF EXISTS `t_pendingorderdetails`;
CREATE TABLE IF NOT EXISTS `t_pendingorderdetails` (
  `orderId` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` double(20,10) NOT NULL,
  `price` double(20,10) NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pendingorder`
--

DROP TABLE IF EXISTS `t_pendingorder`;
CREATE TABLE IF NOT EXISTS `t_pendingorder` (
`id` int(11) NOT NULL,
  `buyerId` int(11) NOT NULL,
  `addressIndex` int(11) NOT NULL,
  `billAmount` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

DROP TABLE IF EXISTS `t_product`;
CREATE TABLE IF NOT EXISTS `t_product` (
`id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `name` int(255) NOT NULL,
  `rate` double(20,10) NOT NULL,
  `quantityAdded` int(11) NOT NULL,
  `quantitySold` int(11) DEFAULT '0',
  `unitOfQuantity` varchar(255) DEFAULT 'kg',
  `photo` varchar(255),
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_userdetail`
--

DROP TABLE IF EXISTS `t_userdetail`;
CREATE TABLE IF NOT EXISTS `t_userdetail` (
  `userId` int(11) DEFAULT NULL,
  `contact1` int(11) DEFAULT NULL,
  `address1` varchar(255) NOT NULL,
  `contact2` int(11) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE IF NOT EXISTS `t_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `emailID` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `tempKey` varchar(10) NOT NULL,
  `activeKey` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_executedorder`
--
ALTER TABLE `t_executedorder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_executedorderdetails`
--
ALTER TABLE `t_executedorderdetails`
 ADD KEY `ownerId` (`ownerId`), ADD KEY `productId` (`productId`), ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `t_pendingorder`
--
ALTER TABLE `t_pendingorder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pendingorderdetails`
--
ALTER TABLE `t_pendingorderdetails`
 ADD KEY `orderId` (`orderId`), ADD KEY `ownerId` (`ownerId`), ADD KEY `productId` (`productId`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
 ADD PRIMARY KEY (`id`), ADD KEY `t_product_ibfk_1` (`ownerId`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_userdetail`
--
ALTER TABLE `t_userdetail`
 ADD KEY `t_userDetail_ibfk_1` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_pendingorder`
--
ALTER TABLE `t_pendingorder`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_executedorderdetails`
--
ALTER TABLE `t_executedorderdetails`
ADD CONSTRAINT `t_executedorderdetails_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `t_executedorder` (`id`);

--
-- Constraints for table `t_pendingorderdetails`
--
ALTER TABLE `t_pendingorderdetails`
ADD CONSTRAINT `t_pendingorderdetails_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `t_pendingorder` (`id`),
ADD CONSTRAINT `t_pendingorderdetails_ibfk_2` FOREIGN KEY (`ownerId`) REFERENCES `t_user` (`id`),
ADD CONSTRAINT `t_pendingorderdetails_ibfk_3` FOREIGN KEY (`productId`) REFERENCES `t_product` (`id`);

--
-- Constraints for table `t_product`
--
ALTER TABLE `t_product`
ADD CONSTRAINT `t_product_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `t_user` (`id`);

--
-- Constraints for table `t_userdetail`
--
ALTER TABLE `t_userdetail`
ADD CONSTRAINT `t_userDetail_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `t_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
