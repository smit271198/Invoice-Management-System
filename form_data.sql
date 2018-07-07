-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2018 at 03:52 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` varchar(15) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`,`CompanyID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CompanyID`, `Name`, `Details`) VALUES
('CG00001', 9, 'Clothes', 'branded');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Pin_Code` int(6) DEFAULT NULL,
  `GSTIN_No` varchar(15) DEFAULT NULL,
  `Pan_No` varchar(10) DEFAULT NULL,
  `Contact_No1` varchar(10) DEFAULT NULL,
  `Contact_No2` varchar(10) DEFAULT NULL,
  `Notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ID`, `Name`, `Username`, `Password`, `Country`, `State`, `City`, `Address`, `Pin_Code`, `GSTIN_No`, `Pan_No`, `Contact_No1`, `Contact_No2`, `Notes`) VALUES
(9, 'Dhaval Barevadiya', 'Dhaval1212', '987654321', 'India', 'Gujarat', 'Dhandhuka', 'Ahmedabad', 388001, '22AAAAA03423005', 'DDDAA005DC', '4653233205', '', NULL),
(10, 'Smit Ladani', 'smit1212', '123456789', 'India', 'Gujarat', 'Keshod', 'Keshod', 388001, '22AAAAA03423043', 'AAAAA0043C', '4653230043', '', NULL),
(19, 'Dhvanit Aghara', 'Dhvanitl1212', '123456789', 'India', 'Gujarat', 'Dhandhuka', 'Ahmedabad', 388001, '22AAAAA03423001', 'AAAAA001DC', '4653230001', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `State_Code` varchar(2) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Pin_Code` int(6) DEFAULT NULL,
  `GSTIN_No` varchar(15) DEFAULT NULL,
  `Pan_No` varchar(10) DEFAULT NULL,
  `Contact_No1` varchar(10) DEFAULT NULL,
  `Contact_No2` varchar(10) DEFAULT NULL,
  `Details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `CompanyID`, `Name`, `State`, `State_Code`, `City`, `Address`, `Pin_Code`, `GSTIN_No`, `Pan_No`, `Contact_No1`, `Contact_No2`, `Details`) VALUES
(1, 9, 'Dhaval Barevadiya', 'Gujarat', '24', 'Dhandhuka', 'Ahmedabad', 388001, '22AAAAA03423005', 'AAAAA005DC', '4653233232', '', ''),
(3, 9, 'Smit Ladani', 'Mizoram', '27', 'Dhandhuka', 'Ahmedabad', 388001, '22AAAAA03423043', 'AAAAA043DC', '4653200043', '', ''),
(4, 9, 'Jimesh Langadiaya', 'Nagaland', '89', 'Rajkot', 'rajkot', 385658, '22AAAAA03423045', 'AAAAA045DC', '4653200045', '', ''),
(5, 9, 'Vatsal  Javia', 'Odisha', '32', 'Jaipur', 'Ahmedabad', 388001, '22AAAAA03423034', 'AAAAA034DC', '1324567654', '', ''),
(9, 10, 'Dhaval Barevadiya', 'Gujarat', '24', 'Dhandhuka', 'Ahmedabad', 388001, '22AAAAA03423005', 'AAAAA005DD', '4653233232', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

DROP TABLE IF EXISTS `customer_group`;
CREATE TABLE IF NOT EXISTS `customer_group` (
  `ID` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `Cust_Name` varchar(30) DEFAULT NULL,
  `Pan_No` varchar(10) DEFAULT NULL,
  KEY `ID` (`ID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`ID`, `CompanyID`, `Cust_Name`, `Pan_No`) VALUES
(2, 9, 'Dhaval Barevadiya', 'AAAAA005DC'),
(2, 9, 'Smit Ladani', 'AAAAA043DC');

-- --------------------------------------------------------

--
-- Table structure for table `group_list`
--

DROP TABLE IF EXISTS `group_list`;
CREATE TABLE IF NOT EXISTS `group_list` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`ID`, `CompanyID`, `Name`, `Details`) VALUES
(2, 9, 'Hostel', '');

-- --------------------------------------------------------

--
-- Table structure for table `id_generator`
--

DROP TABLE IF EXISTS `id_generator`;
CREATE TABLE IF NOT EXISTS `id_generator` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) DEFAULT NULL,
  `OptionName` varchar(15) DEFAULT NULL,
  `OptionValue` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_generator`
--

INSERT INTO `id_generator` (`ID`, `CompanyID`, `OptionName`, `OptionValue`) VALUES
(6, 9, 'InvoiceID', 00005),
(7, 9, 'CategoryID', 00002),
(8, 10, 'InvoiceID', 00001),
(9, 10, 'CategoryID', 00001),
(26, 19, 'InvoiceID', 00001),
(27, 19, 'CategoryID', 00001);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `InvoiceID` varchar(15) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Order_No` varchar(15) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Duedate` date DEFAULT NULL,
  `Total` int(15) DEFAULT NULL,
  PRIMARY KEY (`InvoiceID`,`CompanyID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceID`, `CompanyID`, `Name`, `Order_No`, `Description`, `Date`, `Duedate`, `Total`) VALUES
('IN201800002', 9, 'Dhaval Barevadiya', 'PR000005', '', '2018-06-20', '2018-06-21', 3072),
('IN201800003', 9, 'Smit Ladani', 'PR000043', '', '2018-06-20', '2018-06-28', 3085);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_product`
--

DROP TABLE IF EXISTS `invoice_product`;
CREATE TABLE IF NOT EXISTS `invoice_product` (
  `InvoiceID` varchar(15) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `Product` varchar(30) DEFAULT NULL,
  `Price` int(15) DEFAULT NULL,
  `Quantity` int(10) DEFAULT NULL,
  `GST` float(4,2) DEFAULT NULL,
  `Subtotal` int(15) DEFAULT NULL,
  KEY `InvoiceID` (`InvoiceID`,`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_product`
--

INSERT INTO `invoice_product` (`InvoiceID`, `CompanyID`, `Product`, `Price`, `Quantity`, `GST`, `Subtotal`) VALUES
('IN201800002', 9, 'Levis Jeans', 2400, 1, 28.00, 3072),
('IN201800003', 9, 'Levis Jeans', 2410, 1, 28.00, 3085);

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

DROP TABLE IF EXISTS `login_data`;
CREATE TABLE IF NOT EXISTS `login_data` (
  `ID` int(11) DEFAULT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Password` varchar(15) DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`ID`, `Username`, `Password`) VALUES
(9, 'Dhaval1212', '987654321'),
(10, 'smit1212', '123456789'),
(19, 'Dhvanitl1212', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

DROP TABLE IF EXISTS `price_list`;
CREATE TABLE IF NOT EXISTS `price_list` (
  `ID` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `Product` varchar(30) DEFAULT NULL,
  `Price` int(15) DEFAULT NULL,
  KEY `ID` (`ID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`ID`, `CompanyID`, `Product`, `Price`) VALUES
(2, 9, 'Levis Jeans', 2300);

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

DROP TABLE IF EXISTS `product_price`;
CREATE TABLE IF NOT EXISTS `product_price` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) DEFAULT NULL,
  `Type` varchar(9) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`ID`, `CompanyID`, `Type`, `Name`) VALUES
(2, 9, 'Group', 'Hostel');

-- --------------------------------------------------------

--
-- Table structure for table `product_service`
--

DROP TABLE IF EXISTS `product_service`;
CREATE TABLE IF NOT EXISTS `product_service` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` varchar(15) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `HSN_SAC` varchar(8) DEFAULT NULL,
  `Price` int(15) DEFAULT NULL,
  `GST` float(4,2) DEFAULT NULL,
  `Details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CategoryID` (`CategoryID`,`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_service`
--

INSERT INTO `product_service` (`ID`, `CategoryID`, `CompanyID`, `Name`, `HSN_SAC`, `Price`, `GST`, `Details`) VALUES
(2, 'CG00001', 9, 'Levis Jeans', '12323476', 2500, 28.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `InvoiceID` varchar(15) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Amount` int(15) DEFAULT NULL,
  `Mode` varchar(10) DEFAULT NULL,
  `Details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`ID`, `CompanyID`, `Name`, `InvoiceID`, `Date`, `Amount`, `Mode`, `Details`) VALUES
(3, 9, 'Dhaval Barevadiya', 'IN201800002', '2018-06-20', 372, 'Cash', ''),
(6, 9, 'Smit Ladani', 'IN201800003', '2018-06-20', 30, 'Cash', ''),
(7, 9, 'Dhaval Barevadiya', 'IN201800002', '2018-06-20', 26, 'Check', '');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

DROP TABLE IF EXISTS `reminder`;
CREATE TABLE IF NOT EXISTS `reminder` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `InvoiceID` varchar(15) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Duedate` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `InvoiceID` (`InvoiceID`,`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD CONSTRAINT `customer_group_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `group_list` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_group_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `group_list`
--
ALTER TABLE `group_list`
  ADD CONSTRAINT `group_list_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `id_generator`
--
ALTER TABLE `id_generator`
  ADD CONSTRAINT `id_generator_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_product`
--
ALTER TABLE `invoice_product`
  ADD CONSTRAINT `invoice_product_ibfk_1` FOREIGN KEY (`InvoiceID`,`CompanyID`) REFERENCES `invoice` (`InvoiceID`, `CompanyID`) ON DELETE CASCADE;

--
-- Constraints for table `login_data`
--
ALTER TABLE `login_data`
  ADD CONSTRAINT `login_data_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `price_list`
--
ALTER TABLE `price_list`
  ADD CONSTRAINT `price_list_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `product_price` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `price_list_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `product_price`
--
ALTER TABLE `product_price`
  ADD CONSTRAINT `product_price_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `product_service`
--
ALTER TABLE `product_service`
  ADD CONSTRAINT `product_service_ibfk_1` FOREIGN KEY (`CategoryID`,`CompanyID`) REFERENCES `categories` (`CategoryID`, `CompanyID`) ON DELETE CASCADE;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`InvoiceID`,`CompanyID`) REFERENCES `invoice` (`InvoiceID`, `CompanyID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
