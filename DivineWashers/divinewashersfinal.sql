-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 04:40 PM
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
  `Paypallogin` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`costumerID`, `costumerfirstName`, `costumerlastName`, `costumerEmail`, `costumerPassword`, `address`, `street`, `city`, `state`, `zipCode`, `phoneNum`, `Paypallogin`, `status`) VALUES
(1, 'Juan', 'Rios', 'jrios@upr.com', '1234', 'Urb. Lomas', 'carr. 467', 'Arecibo', 'Puerto Rico', '00628', 2147483647, NULL, 1),
(7, 'Steven', 'Rodriguez', 'steven.rodriguez18@upr.co', '1234', NULL, NULL, NULL, NULL, NULL, 12345674, NULL, 1),
(21, 'Robert', 'Rodriguez', 'robrod@gmail.com', '1234', NULL, NULL, NULL, NULL, NULL, 12345674, NULL, 1),
(22, 'Bob', 'Jobs', 'jobs@gmail.com', '1234', NULL, NULL, NULL, NULL, NULL, 123456, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL,
  `pquantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
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

INSERT INTO `product` (`productID`, `prodName`, `prodDesc`, `portable`, `frontLoad`, `topLoad`, `smartWifi`, `dryerCombo`, `prodBrand`, `prodInventory`, `prodImage`, `price`) VALUES
(1, 'Costway Portable Mini', 'This washing machine is portable and compact. It is perfect for your limited space such as dorms, apartments, condos, motor homes, RVs, camping and more.', 1, 0, 1, 0, 0, 'Costway', 15, 'img/costwayamazon_list.png', '199.99'),
(2, 'Costway Twin Portable ', 'Featuring a twin tub washing design, this compact washing machine combines spinning function and washing function as one which offers great convenience so that you can directly move the washed clothes', 1, 0, 1, 0, 0, 'Costway', 15, 'img/costwaytwin_list.png', '209.99'),
(3, 'LG Wifi Combo Washer Drye', 'Enjoy the convenience of an all-in-one washer/dryer without giving up on capacity. Give big loads the same great clean while cutting your wash time by up to 30 minutes with LGs enhanced TurboWash® tec', 0, 1, 0, 1, 1, 'LG', 15, 'img/LgWifi_list.png', '999.99'),
(4, 'Samsung Platinum Front Lo', 'The Samsung 4.5 cu. ft. capacity front load washer with steam eliminates stains without the need to pretreat.', 0, 1, 0, 0, 0, 'Samsung', 15, 'img/samsungfront.png', '699.99'),
(5, 'Whirlpool Smart Top Load ', 'Skip adding detergent to every load with the Load & Go™ Dispenser in this top load washing machine.', 0, 0, 1, 0, 0, 'Whirlpool', 15, 'img/whirlpooltop.png', '829.99'),
(6, 'Haier Smart Frontload Was', 'Clean 5 of the most common stains with preprogrammed settings that modify any cycle to help remove mud, grass, tomato, wine, blood ', 0, 1, 0, 1, 0, 'Haier', 15, 'img/haierFrontLoad_list.png', '999.99');

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
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`costumerID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD UNIQUE KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `costumerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `orderitems` (`orderid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `costumer` (`costumerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
