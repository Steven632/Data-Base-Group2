-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 06:41 AM
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
(1, 'Juan', 'Rios', 'jrios@upr.com', '1234', 'Urb. Lomas', 'carr. 467', 'Arecibo', 'Puerto Rico', '00628', 2147483647, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `costumerID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `shipDate` date NOT NULL,
  `orderStatus` float NOT NULL -- tinyint(1) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `order` ('OrderID', 'costumerID', 'orderDate', 'shipDate', 'orderStatus') VALUES
(0, 1, 2022-08-01, 2022-08-02, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `prodPrice` float NOT NULL,
  `prodQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `productID`, `prodPrice`, `prodQuantity`) VALUES
(0, 1, 199.99, 0),
(0, 2, 209.99, 0),
(0, 3, 999.99, 0),
(0, 4, 699.99, 0),
(0, 5, 829.99, 0),
(0, 6, 999.99, 0),
(0, 7, 150.99, 0);

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
  `prodImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `prodName`, `prodDesc`, `portable`, `frontLoad`, `topLoad`, `smartWifi`, `dryerCombo`, `prodBrand`, `prodInventory`, `prodImage`) VALUES
(1, 'Costway Portable Mini', 'This washing machine is portable and compact. It is perfect for your limited space such as dorms, apartments, condos, motor homes, RVs, camping and more.', 1, 0, 1, 0, 0, 'Costway', 15, 'img/costwayamazon_list.png'),
(2, 'Costway Twin Portable ', 'Featuring a twin tub washing design, this compact washing machine combines spinning function and washing function as one which offers great convenience so that you can directly move the washed clothes', 1, 0, 1, 0, 0, 'Costway', 15, 'img/costwaytwin_list.png'),
(3, 'LG Wifi Combo Washer Dryer', 'Enjoy the convenience of an all-in-one washer/dryer without giving up on capacity. Give big loads the same great clean while cutting your wash time by up to 30 minutes with LGs enhanced TurboWash® tec', 0, 1, 0, 1, 1, 'LG', 15, 'img/LgWifi_list.png'),
(4, 'Samsung Platinum Front Load', 'The Samsung 4.5 cu. ft. capacity front load washer with steam eliminates stains without the need to pretreat.', 0, 1, 0, 0, 0, 'Samsung', 15, 'img/samsungfront.png'),
(5, 'Whirlpool Smart Top Load ', 'Skip adding detergent to every load with the Load & Go™ Dispenser in this top load washing machine.', 0, 0, 1, 0, 0, 'Whirlpool', 15, 'img/whirlpooltop.png'),
(6, 'Haier Smart Frontload Wash', 'Clean 5 of the most common stains with preprogrammed settings that modify any cycle to help remove mud, grass, tomato, wine, blood ', 0, 1, 0, 1, 0, 'Haier', 15, 'img/haierFrontLoad_list.png'),
(7, 'washer test', 'super cool washer to test quantity when added to cart/bought and search + other things aswell', 1, 1 ,0 ,0 ,0, 'LG', 0, 'img/samsung_front_2.png');


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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`);
  ADD KEY (`costumerID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

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
  MODIFY `costumerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orderdetails` (`orderID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
