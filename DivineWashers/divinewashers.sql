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
  `id` int(11) NOT NULL,
  `clientefirstName` varchar(255) DEFAULT NULL,
  `clienteLastName` varchar(255) DEFAULT NULL,
  `clienteEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phoneNum` varchar(255) DEFAULT NULL
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*entrar data a tabla Administrator */
insert into Administrator values(001, 'Gabriel','Velazquez','gabriel@yahoo.com', '1234');
insert into Administrator values(002, 'Steven','test','steven@yahoo.com', '1234');
insert into Administrator values(003, 'Briana','test','briana@yahoo.com', '1234');
insert into Administrator values(004, 'Celymar','test','celymar@yahoo.com', '1234');

/*entrar data a tabla Order */
insert into order values(100, null,null,null, null, null, null, null);
