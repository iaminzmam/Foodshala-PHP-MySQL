-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 09:45 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshaladb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Custid` int(6) UNSIGNED NOT NULL,
  `CustName` varchar(20) NOT NULL,
  `CustEmail` varchar(30) NOT NULL,
  `CustPsw` varchar(10) NOT NULL,
  `CustMobile` bigint(12) NOT NULL,
  `CustTaste` varchar(10) NOT NULL,
  `CustAddress` varchar(50) NOT NULL,
  `CustCity` varchar(20) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Custid`, `CustName`, `CustEmail`, `CustPsw`, `CustMobile`, `CustTaste`, `CustAddress`, `CustCity`, `RegDate`) VALUES
(2, 'Inzamam', 'inzamam@i.com', 'inzamam', 8787878787, 'Non-Veg', 'Aziz Nagar', 'Lucknow', '2019-07-01 07:38:53'),
(3, 'Sameer', 'sameer@s.com', 'sameer', 9898879809, 'Veg', 'Chowk', 'Lucknow', '2019-07-01 07:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `fooditems`
--

CREATE TABLE `fooditems` (
  `Foodid` int(6) UNSIGNED NOT NULL,
  `FoodName` varchar(20) NOT NULL,
  `FoodType` varchar(15) NOT NULL,
  `FoodPrice` int(7) NOT NULL,
  `FoodImg` varchar(30) NOT NULL,
  `Restid` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fooditems`
--

INSERT INTO `fooditems` (`Foodid`, `FoodName`, `FoodType`, `FoodPrice`, `FoodImg`, `Restid`) VALUES
(1, 'Maggi', 'Veg', 30, '5d19b40403cc09.57633448.jpg', 2),
(2, 'Burger', 'Veg', 50, '5d19b67c1b45a3.91564815.jpg', 2),
(3, 'Puri Chola', 'Veg', 49, '5d19b6fa62e6e6.60058570.jpg', 3),
(4, 'Kadhai Paneer', 'Veg', 129, '5d19b71427c823.70223597.jpg', 3),
(5, 'Roasted Chicken', 'Non-Veg', 199, '5d19b75e4abdb2.37598738.jpg', 4),
(6, 'Chicken Roll', 'Non-Veg', 69, '5d19b76fc0a930.19265068.jpg', 4),
(7, 'Ice Cream', 'Veg', 70, '5d19b7df0d4e71.77629362.jpg', 5),
(8, 'Cake', 'Veg', 499, '5d19b803d16084.18686839.jpg', 5),
(9, 'Pizza', 'Veg', 70, '5d19b8193cfe80.06889901.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Orderid` int(6) UNSIGNED NOT NULL,
  `OrderFoodName` varchar(20) NOT NULL,
  `OrderPrice` int(6) NOT NULL,
  `OrderRest` varchar(20) NOT NULL,
  `OrderCustName` varchar(20) NOT NULL,
  `OrderEmail` varchar(30) NOT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Custid_fk` int(6) UNSIGNED NOT NULL,
  `Restid_fk` int(6) UNSIGNED NOT NULL,
  `Foodid_fk` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Orderid`, `OrderFoodName`, `OrderPrice`, `OrderRest`, `OrderCustName`, `OrderEmail`, `OrderTime`, `Custid_fk`, `Restid_fk`, `Foodid_fk`) VALUES
(1, 'Roasted Chicken', 199, 'KGN Restaurant', 'Inzamam', 'inzamam@i.com', '2019-07-01 07:39:02', 2, 4, 5),
(2, 'Roasted Chicken', 199, 'KGN Restaurant', 'Inzamam', 'inzamam@i.com', '2019-07-01 07:39:22', 2, 4, 5),
(3, 'Burger', 50, 'Fauzi Dhaba', 'Sameer', 'sameer@s.com', '2019-07-01 07:41:03', 3, 2, 2),
(4, 'Ice Cream', 70, 'Bakers Point', 'Sameer', 'sameer@s.com', '2019-07-01 07:41:11', 3, 5, 7),
(5, 'Chicken Roll', 69, 'KGN Restaurant', 'Inzamam', 'inzamam@i.com', '2019-07-01 07:43:11', 2, 4, 6),
(6, 'Cake', 499, 'Bakers Point', 'Inzamam', 'inzamam@i.com', '2019-07-01 07:43:29', 2, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restid` int(6) UNSIGNED NOT NULL,
  `RestTitle` varchar(20) NOT NULL,
  `RestOwner` varchar(20) NOT NULL,
  `RestEmail` varchar(30) NOT NULL,
  `RestPsw` varchar(10) NOT NULL,
  `RestAddress` varchar(50) NOT NULL,
  `RestCity` varchar(20) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restid`, `RestTitle`, `RestOwner`, `RestEmail`, `RestPsw`, `RestAddress`, `RestCity`, `RegDate`) VALUES
(2, 'Fauzi Dhaba', 'Fauzi', 'fauzi@f.com', 'fauzi', 'Sitapur Road', 'Lucknow', '2019-07-01 07:16:42'),
(3, 'Midway Dinner', 'Manish', 'midway@m.com', 'midway', 'Tedi Puliya', 'Lucknow', '2019-07-01 07:31:38'),
(4, 'KGN Restaurant', 'khwaja', 'kgn@k.com', 'kgn', 'Aliganj', 'Lucknow', '2019-07-01 07:33:22'),
(5, 'Bakers Point', 'Seena', 'bakers@b.com', 'bakers', 'Madiyaon', 'Lucknow', '2019-07-01 07:35:34'),
(6, 'inzamam', 'inzamam', 'inz@g.com', 'inzamam', 'aziz nagar', 'Lucknow', '2019-07-01 07:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Custid`);

--
-- Indexes for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`Foodid`),
  ADD KEY `Restid` (`Restid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Orderid`),
  ADD KEY `Custid_fk` (`Custid_fk`),
  ADD KEY `Restid_fk` (`Restid_fk`),
  ADD KEY `Foodid_fk` (`Foodid_fk`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Custid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `Foodid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Orderid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Restid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD CONSTRAINT `fooditems_ibfk_1` FOREIGN KEY (`Restid`) REFERENCES `restaurant` (`REstid`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Custid_fk`) REFERENCES `customer` (`Custid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Restid_fk`) REFERENCES `restaurant` (`REstid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Foodid_fk`) REFERENCES `fooditems` (`Foodid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
