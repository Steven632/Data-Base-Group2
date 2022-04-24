-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 06:11 PM
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
  `admiID` int(11) NOT NULL,
  `admiFirstName` varchar(255) DEFAULT NULL,
  `admiLastName` varchar(255) DEFAULT NULL,
  `admiEmail` varchar(255) DEFAULT NULL,
  `admiPassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `Costumer` (
  `costumerID` int(11) NOT NULL,
  `costumerfirstName` varchar(255) DEFAULT NULL,
  `costumerLastName` varchar(255) DEFAULT NULL,
  `costumerEmail` varchar(255) DEFAULT NULL,
  `costumerPassword` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phoneNum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Order` (
  `orderID` int(11) NOT NULL,
 
  `orderDate` date NOT NULL,
  `action` varchar(255) NOT NULL,
  `shipDate` date NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `prodDesc` varchar(255) NOT NULL,
  `prodCategory` varchar(255) NOT NULL,
  `prodType` varchar(255) NOT NULL,
  `prodImage` int(11) NOT NULL,
  `prodPrice` double NOT NULL,
  `prodQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `Administrator`
  ADD PRIMARY KEY (`admiID`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `Costumer`
  ADD PRIMARY KEY (`costumerID`);
  
  ALTER TABLE `Order`
  ADD PRIMARY KEY (`orderID`);

  ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `Administrator`
  MODIFY `admiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `Costumer`
  MODIFY `costumerID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);
  
  ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*entrar data a tabla Administrator */
insert into Administrator values(001, 'Gabriel','Velazquez','gabriel@yahoo.com', '1234');
insert into Administrator values(002, 'Steven','test','steven@yahoo.com', '1234');
insert into Administrator values(003, 'Briana','test','briana@yahoo.com', '1234');
insert into Administrator values(004, 'Celymar','test','celymar@yahoo.com', '1234');

--- insert de productos
INSERT INTO product (productID, prodName, prodDesc, prodCategory, prodType, prodImage, prodPrice, prodQuantity) 
VALUES (1, 'Costway Portable Mini', 'This washing machine is portable and compact. It is perfect for your limited space such as dorms, apartments, condos, motor homes, RVs, camping and more.', 'portable', 'Costway', 0, 199.99, 10);

INSERT INTO product (`productID`, `prodName`, `prodDesc`, `prodCategory`, `prodType`, `prodImage`, `prodPrice`, `prodQuantity`) 
VALUES (2, 'Costway Twin Portable ', 'Featuring a twin tub washing design, this compact washing machine combines spinning function and washing function as one which offers great convenience so that you can directly move the washed clothes to the spinning tub for saving your precious time.', 'portable', 'Costway', 0, 209.99, 5);

INSERT INTO product (`productID`, `prodName`, `prodDesc`, `prodCategory`, `prodType`, `prodImage`, `prodPrice`, `prodQuantity`) 
VALUES (3, 'LG Wifi Combo Washer Dryer', 'Enjoy the convenience of an all-in-one washer/dryer without giving up on capacity. Give big loads the same great clean while cutting your wash time by up to 30 minutes with LGs enhanced TurboWash® technology. Based on the cycle you select, LG 6Motion™ te', 'smartWifi', 'LG', 0, 999.99, 2);

INSERT INTO product (`productID`, `prodName`, `prodDesc`, `prodCategory`, `prodType`, `prodImage`, `prodPrice`, `prodQuantity`) 
VALUES (4, 'Samsung Platinum Front Load ', 'The Samsung 4.5 cu. ft. capacity front load washer with steam eliminates stains without the need to pretreat.', 'frontload', 'Samsung', 0, 1099.99, 9);

INSERT INTO product (`productID`, `prodName`, `prodDesc`, `prodCategory`, `prodType`, `prodImage`, `prodPrice`, `prodQuantity`) 
VALUES (5, 'Whirlpool Smart Top Load Washer', 'Skip adding detergent to every load with the Load & Go™ Dispenser in this top load washing machine.', 'topload', 'Whirlpool', 0, 1249.99, 6);

INSERT INTO product (`productID`, `prodName`, `prodDesc`, `prodCategory`, `prodType`, `prodImage`, `prodPrice`, `prodQuantity`) 
VALUES (6, 'Haier Smart Frontload Washer', 'Clean 5 of the most common stains with preprogrammed settings that modify any cycle to help remove mud, grass, tomato, wine, blood ', 'frontload', 'Haier', 0, 999.99, 1);
