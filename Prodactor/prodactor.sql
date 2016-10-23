-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2016 at 01:08 AM
-- Server version: 5.7.12-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prodactor`
--

-- --------------------------------------------------------

--
-- Table structure for table `map page data`
--

CREATE TABLE IF NOT EXISTS `map page data` (
  `LocationID` int(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Goodstype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `map page data`
--

INSERT INTO `map page data` (`LocationID`, `Name`, `Description`, `Goodstype`) VALUES
(1, 'The Corner shop', 'The only shop in rhynie. Sells pies. Lovely pies.', 'Retailer'),
(2, 'Rhinturk', 'Located in the "Cabrach" area west of Rhynie, it produces jams of all sorts all locally made. Can be found by following the road up to the Cabrach. ', 'Producer');

-- --------------------------------------------------------

--
-- Table structure for table `page_information`
--

CREATE TABLE IF NOT EXISTS `page_information` (
  `LocationID` int(10) NOT NULL COMMENT 'This is the key',
  `Name` varchar(255) NOT NULL,
  `PostCode` varchar(8) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Star Rating` int(1) NOT NULL,
  `LocationType` varchar(255) NOT NULL,
  `InfoPageLink` text NOT NULL,
  `img_link` varchar(255) NOT NULL,
  PRIMARY KEY (`LocationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_information`
--

INSERT INTO `page_information` (`LocationID`, `Name`, `PostCode`, `Address`, `Star Rating`, `LocationType`, `InfoPageLink`, `img_link`) VALUES
(1, 'The Corner Shop', 'AB54 4HB', '2-6 Main street, Rhyine, Huntly, Aberdeenshire', 5, 'Retailer', 'InfoPageTCS.html', 'http://imgur.com/IaW6dwY.jpg'),
(2, 'Rhinturk', 'AB54 4ES', 'Huntly, Uk', 4, 'Producer', 'InfoPageRhinTurk.html', 'https://static.pexels.com/photos/5247/field-agriculture-farm-grass-large.jpg'),
(3, 'Morgan McVeighs', 'AB52 6UY', 'Colpy, Insch, Aberdeenshire', 4, 'Retailer', 'InfoPageMM.html', 'http://i.imgur.com/UinhkrMg.jpg'),
(4, 'Kellockbank Gift Shops', 'AB52 6SN', 'Culsalmond, Insch, Aberdeenshire', 4, 'Retailer', 'InfoPageKellockBank.html', 'http://i.imgur.com/RcC0oqOg.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
