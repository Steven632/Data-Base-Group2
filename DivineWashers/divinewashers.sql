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
  `admiFirstName` varchar(20) DEFAULT NULL,
  `admiLastName` varchar(50) DEFAULT NULL,
  `admiEmail` varchar(50) DEFAULT NULL,
  `admiPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `Costumer` (
  `costumerID` int(11) NOT NULL,
  `costumerfirstName` varchar(20) DEFAULT NULL,
  `costumerlastName` varchar(20) DEFAULT NULL,
  `costumerEmail` varchar(50) DEFAULT NULL,
  `costumerPassword` varchar(50) DEFAULT NULL, 
  `address` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipCode` varchar(6) DEFAULT NULL,
  `phoneNum` varchar(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `Order`
--
-- verificar: payment method -- 

CREATE TABLE `Order` (
  `orderID` int(11) NOT NULL,
  `costumerID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `shipDate` date NOT NULL,
  `orderStatus` varchar(20) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `creditCard` varchar(20) DEFAULT NULL,
  `totalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `product`
--
-- verificar: prodImage blob --

CREATE TABLE `Product` (
  `productID` int(11) NOT NULL,
  `prodName` varchar(50) NOT NULL,
  `prodDescription` varchar(255) NOT NULL,
  `portable` boolean NOT NULL,
  `frontLoad` varchar(10) NOT NULL,
  `topLoad` varchar(10) NOT NULL,
  `smartWifi` boolean NOT NULL,
  `dryerCombo` boolean NOT NULL,
  `prodBrand` varchar(50) NOT NULL,
  `prodInventory` varchar (100) NOT NULL,
  `prodImage` blob NOT NULL,

  `prodPrice` double  NOT NULL,
  `prodQuantity` varchar(100) NOT NULL
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

  ALTER TABLE `Order`
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

ALTER TABLE `Product`
  ADD PRIMARY KEY (`productID`);
  
  ALTER TABLE `Product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*entrar data a tabla Administrator */
insert into Administrator values(001, 'Gabriel','Velazquez','gabriel@upr.com', '1234');
insert into Administrator values(002, 'Steven','Rodriguez','steven@upr.com', '1234');
insert into Administrator values(003, 'Briana','Santiago','briana@upr.com', '1234');
insert into Administrator values(004, 'Celymar','Torres','celymar@upr.com', '1234');

-- insert de productos (productID, prodName, prodDesc, prodCategory, prodType, prodImage, prodPrice, prodQuantity) --

INSERT INTO Product 
VALUES (1, 'Costway Portable Mini', 'This washing machine is portable and compact. It is perfect for your limited space such as dorms, apartments, condos, motor homes, RVs, camping and more.', 'portable', 'Costway', 15, 'img/Divinewasherslogo1.png' , 199.99, 2);

INSERT INTO Product 
VALUES (2, 'Costway Twin Portable ', 'Featuring a twin tub washing design, this compact washing machine combines spinning function and washing function as one which offers great convenience so that you can directly move the washed clothes to the spinning tub for saving your precious time.', 'portable', 'Costway', 15,'img/Divinewasherslogo1.png' , 209.99, 1);

INSERT INTO Product 
VALUES (3, 'LG Wifi Combo Washer Dryer', 'Enjoy the convenience of an all-in-one washer/dryer without giving up on capacity. Give big loads the same great clean while cutting your wash time by up to 30 minutes with LGs enhanced TurboWash® technology. Based on the cycle you select, LG 6Motion™ te', 'smartWifi', 'LG', 15,'img/Divinewasherslogo1.png' , 999.99, 1);

INSERT INTO Product  
VALUES (4, 'Samsung Platinum Front Load ', 'The Samsung 4.5 cu. ft. capacity front load washer with steam eliminates stains without the need to pretreat.', 'frontload', 'Samsung', 15,'img/Divinewasherslogo1.png' , 1099.99, 1);

INSERT INTO Product 
VALUES (5, 'Whirlpool Smart Top Load Washer', 'Skip adding detergent to every load with the Load & Go™ Dispenser in this top load washing machine.', 'topload', 'Whirlpool', 15,'img/Divinewasherslogo1.png' , 1249.99, 1);

INSERT INTO Product 
VALUES (6, 'Haier Smart Frontload Washer', 'Clean 5 of the most common stains with preprogrammed settings that modify any cycle to help remove mud, grass, tomato, wine, blood ', 'frontload', 'Haier', 15, 'img/Divinewasherslogo1.png' , 999.99, 1);
