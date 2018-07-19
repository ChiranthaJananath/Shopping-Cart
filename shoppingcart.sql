-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 06:39 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `idadministratorUsername` varchar(45) DEFAULT NULL,
  `administratorpassword` varchar(45) DEFAULT NULL,
  `administratorIDl` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`administratorIDl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`idadministratorUsername`, `administratorpassword`, `administratorIDl`) VALUES
('admin1', 'admin147', 1),
('admin2', 'admin258', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`cartID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE IF NOT EXISTS `clothes` (
  `productCode` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(45) DEFAULT NULL,
  `newprice` int(11) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `oldprice` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`productCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='			' AUTO_INCREMENT=100186 ;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`productCode`, `brand`, `newprice`, `image`, `oldprice`, `type`, `quantity`) VALUES
(100145, 'MAS', 1850, 'kids1.jpg', 2100, 'kids', 5),
(100146, 'Any-tshirt.lk', 2100, 'kids2.jpg', 2300, 'kids', 3),
(100147, 'Thilakawardana', 1450, 'kids3.jpg', 1600, 'kids', 2),
(100148, 'MAS', 2000, 'kids4.jpg', 2200, 'kids', 3),
(100149, 'Any-tshirt.lk', 2450, 'kids5.jpg', 2600, 'kids', 3),
(100150, 'Thilakawardana', 1450, 'kids6.png', 1890, 'kids', 2),
(100151, 'MAS', 1630, 'kids7.png', 1850, 'kids', 4),
(100152, 'Any-tshirt.lk', 1100, 'kids8.jpg', 1300, 'kids', 2),
(100153, 'Thilakawardana', 1280, 'kids9.jpg', 1360, 'kids', 5),
(100154, 'GLITZ', 1230, 'men1.jpg', 1560, 'men', 4),
(100155, 'Brandix', 1600, 'men2.jpg', 1800, 'men', 4),
(100157, 'GLITZ', 1900, 'men4.jpg', 2100, 'men', 2),
(100158, 'Brandix', 2800, 'men5.jpg', 3100, 'men', 5),
(100159, 't-shirt.lk', 1450, 'men6.jpg', 1900, 'men', 4),
(100160, 't-shirt.lk', 1820, 'men3.jpg', 2100, 'men', 4),
(100162, 'Brandix', 1890, 'men8.jpg', 2200, 'men', 5),
(100163, 't-shirt.lk', 2400, 'men9.jpg', 2600, 'men', 3),
(100164, 'MAS', 33200, 'wedding1.jpg', 35000, 'weddings', 3),
(100165, 'Any-tshirt.lk', 22300, 'wedding2.jpg', 25000, 'weddings', 5),
(100166, 'Thilakawardana', 35000, 'wedding3.jpg', 37000, 'weddings', 5),
(100167, 'MAS', 29800, 'wedding4.jpg', 32000, 'weddings', 3),
(100168, 'Any-tshirt.lk', 45870, 'wedding5.jpg', 47000, 'weddings', 3),
(100169, 'Thilakawardana', 34500, 'wedding6.jpg', 37000, 'weddings', 6),
(100170, 'MAS', 2240, 'wedding7.jpg', 2500, 'weddings', 6),
(100171, 'Any-tshirt.lk', 3400, 'wedding8.jpg', 3600, 'weddings', 2),
(100172, 'Thilakawardana', 2430, 'wedding9.jpg', 2600, 'weddings', 6),
(100174, 'Brandix', 3120, 'women12.jpg', 3450, 'women', 5),
(100175, 't-shirt.lk', 2580, 'women13.jpg', 2780, 'women', 6),
(100176, 'GLITZ', 1500, 'women14.jpg', 1900, 'women', 6),
(100178, 't-shirt.lk', 4560, 'women16.jpg', 4890, 'women', 6),
(100182, 'GLITZ', 1960, 'women17.jpg', 2200, 'women', 3),
(100183, 'Brandix', 2100, 'women18.jpg', 2300, 'women', 3),
(100184, 't-shirt.lk', 1890, 'women19.jpg', 2100, 'women', 4),
(100185, 'GLITZ', 1450, 'men3.jpg', 1650, 'men', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `username` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `email`, `password`, `firstName`, `lastName`, `telephone`) VALUES
(44, 'chiranthajtk@gmail.com', 'mrt123', 'Chirantha', 'Jananath', '0768388662'),
(45, 'maduranga@gmail.com', 'mrt123', 'Kanishka', 'maduranga', '0768388663'),
(46, 'janith@gmail.com', 'qwe123', 'Janith', 'Udara', '0768388667'),
(47, 'naduni@gmail.com', 'asd345', 'Naduni', 'Nethsara', '0768388669'),
(48, 'lakshan@gmail.com', 'hyt567', 'Asitha', 'Lakshan', '0768388664'),
(50, 'chiranthajana@gmail.com', 'kln123', 'Chirantha', 'Jananath', '0768388662'),
(51, 'sudharmak@gmail.com', 'aqws12', 'sudharma', 'Kumari', '0767678606');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionID` int(11) NOT NULL AUTO_INCREMENT,
  `address1` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `postalCode` int(16) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `username` int(11) DEFAULT NULL,
  `electroncardName` varchar(45) DEFAULT NULL,
  `electroncardExpireDate` date DEFAULT NULL,
  PRIMARY KEY (`transactionID`),
  KEY `username_idx` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `address1`, `address2`, `city`, `postalCode`, `comments`, `username`, `electroncardName`, `electroncardExpireDate`) VALUES
(248, 'Dalugama', 'Kelaniya', 'Gampaha', 2147483647, 'Please try give the order as soon as possible', 44, 'W.M.C.J.T.Kitthulwatta', '2018-01-06'),
(249, 'Dalugama', 'Kelaniya', 'Gampaha', 2147483647, 'Please try give the order as soon as possible', 44, 'W.M.C.J.T.Kitthulwatta', '2018-01-06'),
(250, 'Dalugama', 'Kelaniya', 'Gampaha', 2147483647, 'Please try give the order as soon as possible', 44, 'W.M.C.J.T.Kitthulwatta', '2018-01-06'),
(251, 'Boralesgamuwa', 'Pannipitiya', 'Colombo', 2147483647, 'Nice online shopping mall.', 45, 'K.Maduranga', '2017-08-12'),
(252, 'New House Scheem', 'Bogaspitiya Springvelley', 'Badulla', 2147483647, 'Please send me above orderedtextiles.', 51, 'K.H.W.M.S.K.gunathilake', '2018-02-14');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `transactionID` FOREIGN KEY (`cartID`) REFERENCES `transaction` (`transactionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
