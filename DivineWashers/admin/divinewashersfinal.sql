-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 04:33 AM
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
-- Database: `divinewashers`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `Administrator` (
  `admiID` int(10) NOT NULL,
  `admiFirstName` varchar(11) DEFAULT NULL,
  `admiLastName` varchar(11) DEFAULT NULL,
  `admiEmail` varchar(25) DEFAULT NULL,
  `admiPassword` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `Administrator` (`admiID`, `admiFirstName`, `admiLastName`, `admiEmail`, `admiPassword`) VALUES
(1, 'Gabriel', 'Velazquez', 'gabriel@upr.com', '1234'),
(2, 'Steven', 'test', 'steven@upr.com', '1234'),
(3, 'Briana', 'test', 'briana@upr.com', '1234'),
(4, 'Celymar', 'test', 'celymar@upr.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `Costumer` (
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

INSERT INTO `Costumer` (`costumerID`, `costumerfirstName`, `costumerlastName`, `costumerEmail`, `costumerPassword`, `address`, `street`, `city`, `state`, `zipCode`, `phoneNum`, `status`) VALUES
(1, 'Juan', 'Rios', 'jrios@upr.com', '1234', 'Urb. Lomas', 'carr. 467', 'Arecibo', 'Puerto Rico', '00628', '7874584669', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `Order` (
  `orderID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `shipDate` date NOT NULL,
  `orderStatus` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `Product` (
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

INSERT INTO Product (`productID`, `prodName`, `prodDesc`, `portable`, `frontLoad`, `topLoad`, `smartWifi`, `dryerCombo`, `prodBrand`, `prodInventory`, `prodImage`)
VALUES (1, 'Costway Portable Mini', 'This washing machine is portable and compact. It is perfect for your limited space such as dorms, apartments, condos, motor homes, RVs, camping and more.', '1','0','1','0','0', 'Costway', 15, 'img/costwayAmazon.png' );
INSERT INTO Product 
VALUES (2, 'Costway Twin Portable ', 'Featuring a twin tub washing design, this compact washing machine combines spinning function and washing function as one which offers great convenience so that you can directly move the washed clothes to the spinning tub for saving your precious time.', '1','0','1','0','0', 'Costway', 15,'img/Costway portable compact twin.png' );
INSERT INTO Product 
VALUES (3, 'LG Wifi Combo Washer Dryer', 'Enjoy the convenience of an all-in-one washer/dryer without giving up on capacity. Give big loads the same great clean while cutting your wash time by up to 30 minutes with LGs enhanced TurboWash® technology. Based on the cycle you select, LG 6Motion™ te', '0','1','0','1','1', 'LG', 15,'img/LG Smart Wifi Washer Dryer Combo.png' );
INSERT INTO Product  
VALUES (4, 'Samsung Platinum Front Load ', 'The Samsung 4.5 cu. ft. capacity front load washer with steam eliminates stains without the need to pretreat.','0','1','0','0','0', 'Samsung', 15,'img/samsung_front.png' );
INSERT INTO Product 
VALUES (5, 'Whirlpool Smart Top Load Washer', 'Skip adding detergent to every load with the Load & Go™ Dispenser in this top load washing machine.', '0','0','1','0','0', 'Whirlpool', 15,'img/whirlpooltop.png' );
INSERT INTO Product 
VALUES (6, 'Haier Smart Frontload Washer', 'Clean 5 of the most common stains with preprogrammed settings that modify any cycle to help remove mud, grass, tomato, wine, blood ', '0','1','0','1','0', 'Haier', 15, 'img/Haier FrontLoad Smart Washer.png' );

--
--
--
CREATE TABLE `Orderdetails` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `prodPrice` float  NOT NULL,
  `prodQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 ALTER TABLE `Orderdetails`
    ADD KEY `orderID` (`orderID`),
    ADD KEY `productID` (`productID`);

--
--
--

CREATE TABLE `Adds` (
   `admiID` int(11) NOT NULL,
   `productID` int(11) NOT NULL,
  `changeDate` date NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `Adds`
    ADD KEY `admiID` (`admiID`),
    ADD KEY `productID` (`productID`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costumer`
--
ALTER TABLE `Costumer`
  ADD PRIMARY KEY (`costumerID`);

--
-- Indexes for table `order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`productID`);
--
--
--
ALTER TABLE `Administrator`
  ADD PRIMARY KEY (`admiID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `Costumer`
  MODIFY `costumerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `Order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `Product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--
ALTER TABLE `Orderdetails`
  ADD CONSTRAINT `Orderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `Order` (`orderID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `Orderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `Product` (`productID`) ON DELETE NO ACTION;
COMMIT;

ALTER TABLE `Adds`
  ADD CONSTRAINT `Adds_ibfk_1` FOREIGN KEY (`admiID`) REFERENCES `Administrator` (`admiID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `Adds_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `Product` (`productID`) ON DELETE NO ACTION;
COMMIT;



--
-- Constraints for table `order`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
