-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 04:49 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divinewashersfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `admiID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `changeDate` date NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admiID` int(10) NOT NULL,
  `admiFirstName` varchar(11) DEFAULT NULL,
  `admiLastName` varchar(11) DEFAULT NULL,
  `admiEmail` varchar(25) DEFAULT NULL,
  `admiPassword` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admiID`, `admiFirstName`, `admiLastName`, `admiEmail`, `admiPassword`) VALUES
(1, 'Gabriel', 'Velazquez', 'gabriel@upr.edu', '1234'),
(2, 'Steven', 'test', 'steven@upr.edu', '1234'),
(3, 'Briana', 'test', 'briana@upr.edu', '1234'),
(4, 'Celymar', 'test', 'celymar@upr.edu', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Dryer Combo'),
(2, 'Front Load'),
(5, 'Top Load'),
(6, 'Smart Wifi'),
(7, 'Portable');

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `costumerID` int(11) NOT NULL,
  `costumerfirstName` varchar(11) DEFAULT NULL,
  `costumerlastName` varchar(11) DEFAULT NULL,
  `costumerEmail` varchar(25) DEFAULT NULL,
  `costumerPassword` varchar(10) DEFAULT NULL,
  `address` varchar(10) DEFAULT NULL,
  `street` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `state` varchar(15) DEFAULT NULL,
  `zipCode` varchar(6) DEFAULT NULL,
  `phoneNum` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`costumerID`, `costumerfirstName`, `costumerlastName`, `costumerEmail`, `costumerPassword`, `address`, `street`, `city`, `state`, `zipCode`, `phoneNum`, `status`) VALUES
(1, '', '', 'jrios@upr.com', '1234', 'Urb. Lomas', 'carr. 467', 'Arecibo', 'Puerto Rico', '', 0, 1),
(7, 'Steven', 'Rodriguez', 'steven.rodriguez18@upr.co', '1234', 'Calle los ', '', 'Camuy', 'PR', '', 0, 1),
(21, 'Robert', 'Rodriguez', 'robrod@gmail.com', '1234', NULL, NULL, NULL, NULL, NULL, 12345674, 1),
(22, 'Steven', 'Rodriguez', 'jobs@gmail.com', '1234', 'Calle los ', NULL, 'Camuy', 'PR', '', 0, 1),
(29, 'Hola', 'Lola', 'steven.rodriguez18@upr.ed', '1234', 'Los Pinos', NULL, 'Arecibo', 'PR', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `prodName` varchar(20) NOT NULL,
  `productID` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL,
  `pquantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderid`, `prodName`, `productID`, `productprice`, `pquantity`) VALUES
(10, 32, '', 2, '209.99', 1),
(11, 33, '', 1, '199.99', 1),
(12, 34, '', 1, '199.99', 1),
(13, 34, '', 2, '209.99', 1),
(14, 34, '', 3, '999.99', 1),
(15, 35, '', 1, '199.99', 3),
(16, 36, '', 1, '199.99', 1),
(17, 37, '', 1, '199.99', 1),
(18, 37, '', 3, '999.99', 1),
(19, 38, '', 2, '209.99', 1),
(20, 40, '', 3, '999.99', 1),
(21, 41, '', 2, '209.99', 1),
(22, 43, '', 1, '199.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `totalprice` varchar(11) NOT NULL,
  `orderstatus` varchar(11) NOT NULL,
  `paymentmode` varchar(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(32, 1, '209.99', 'Order Place', 'cod', '2022-09-13 20:06:59'),
(33, 1, '199.99', 'Order Place', 'cod', '2022-09-13 20:07:55'),
(34, 1, '1409.97', 'Order Place', 'on', '2022-09-13 20:08:57'),
(35, 1, '599.97', 'Delivered', 'cod', '2022-09-13 20:51:52'),
(36, 1, '199.99', 'Order Place', 'on', '2022-09-13 21:03:22'),
(37, 1, '1199.98', 'Dispatched', 'cod', '2022-09-13 21:06:04'),
(38, 7, '209.99', 'Order Place', '', '2022-09-13 21:25:19'),
(39, 7, '0', 'Order Place', 'cod', '2022-09-13 21:31:34'),
(40, 7, '999.99', 'Order Place', 'cod', '2022-09-13 21:33:27'),
(41, 7, '209.99', 'Order Place', 'on', '2022-09-13 21:35:09'),
(42, 7, '0', 'Order Place', 'cod', '2022-09-13 22:03:26'),
(43, 7, '199.99', 'Order Place', 'cod', '2022-09-13 22:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `orderstracking`
--

CREATE TABLE `orderstracking` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `message` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstracking`
--

INSERT INTO `orderstracking` (`id`, `orderid`, `status`, `message`, `timestamp`) VALUES
(3, 35, 'In Progress', ' ', '2022-09-14 00:55:28'),
(4, 37, 'Dispatched', ' ', '2022-09-14 01:11:04'),
(6, 35, 'Delivered', ' ', '2022-09-14 01:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `prodName` varchar(25) NOT NULL,
  `prodDesc` varchar(200) NOT NULL,
  `portable` tinyint(1) NOT NULL,
  `frontLoad` tinyint(1) NOT NULL,
  `topLoad` tinyint(1) NOT NULL,
  `smartWifi` tinyint(1) NOT NULL,
  `dryerCombo` tinyint(1) NOT NULL,
  `prodBrand` varchar(15) NOT NULL,
  `prodInventory` int(100) NOT NULL,
  `prodImage` varchar(50) DEFAULT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `catid`, `prodName`, `prodDesc`, `portable`, `frontLoad`, `topLoad`, `smartWifi`, `dryerCombo`, `prodBrand`, `prodInventory`, `prodImage`, `price`) VALUES
(1, 7, 'Costway Portable Mini', 'This washing machine is portable and compact. It is perfect for your limited space such as dorms, apartments, condos, motor homes, RVs, camping and more.', 1, 0, 1, 0, 0, 'Costway', 15, 'img/costwayamazon_list.png', '199.99'),
(2, 7, 'Costway Twin Portable ', 'Featuring a twin tub washing design, this compact washing machine combines spinning function and washing function as one which offers great convenience so that you can directly move the washed clothes', 1, 0, 1, 0, 0, 'Costway', 15, 'img/costwaytwin_list.png', '209.99'),
(3, 1, 'LG Wifi Combo Washer Drye', 'Enjoy the convenience of an all-in-one washer/dryer without giving up on capacity. Give big loads the same great clean while cutting your wash time by up to 30 minutes with LGs enhanced TurboWash® tec', 0, 1, 0, 1, 1, 'LG', 15, 'img/LgWifi_list.png', '999.99'),
(4, 2, 'Samsung Platinum Front Lo', 'The Samsung 4.5 cu. ft. capacity front load washer with steam eliminates stains without the need to pretreat.', 0, 1, 0, 0, 0, 'Samsung', 15, 'img/samsungfront.png', '699.99'),
(5, 6, 'Whirlpool Smart Top Load ', 'Skip adding detergent to every load with the Load & Go™ Dispenser in this top load washing machine.', 0, 0, 1, 0, 0, 'Whirlpool', 15, 'img/whirlpooltop.png', '829.99'),
(6, 2, 'Haier Smart Frontload Was', 'Clean 5 of the most common stains with preprogrammed settings that modify any cycle to help remove mud, grass, tomato, wine, blood ', 0, 1, 0, 1, 0, 'Haier', 15, 'img/haierFrontLoad_list.png', '999.99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD KEY `admiID` (`admiID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admiID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`costumerID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID_2` (`productID`),
  ADD KEY `orderid` (`orderid`) USING BTREE,
  ADD KEY `productID` (`productID`) USING BTREE,
  ADD KEY `prodName` (`prodName`),
  ADD KEY `prodName_2` (`prodName`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);--,
  --ADD KEY `uid_2` (`uid`),
  --ADD KEY `uid_3` (`uid`),
  --ADD KEY `uid` (`uid`) USING BTREE;

--
-- Indexes for table `orderstracking`
--
ALTER TABLE `orderstracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderid` (`orderid`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `catid_2` (`catid`),
  ADD KEY `catid` (`catid`) USING BTREE,
  ADD KEY `prodName` (`prodName`),
  ADD KEY `prodName_2` (`prodName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `costumerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orderstracking`
--
ALTER TABLE `orderstracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adds`
--
ALTER TABLE `adds`
  ADD CONSTRAINT `adds_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `adds_ibfk_3` FOREIGN KEY (`admiID`) REFERENCES `administrator` (`admiID`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `costumer` (`costumerID`) ON DELETE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
