-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2014 at 03:23 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Cloth`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE IF NOT EXISTS `accountant` (
  `product_id` int(11) NOT NULL,
  `orginalprice` int(11) NOT NULL,
  `totalexpenditure` int(11) NOT NULL,
  `finalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`product_id`, `orginalprice`, `totalexpenditure`, `finalprice`) VALUES
(5, 1000, 63000, 70400),
(6, 1200, 2300, 3850),
(7, 2000, 2300, 4730),
(8, 1000, 2300, 3630);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customer_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_no` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `phone_no`) VALUES
(2, 'charan', 9573429278),
(3, 'nanda', 874256310);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`userid` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `join_date` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `flat_no` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone_no` bigint(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`userid`, `first_name`, `last_name`, `join_date`, `sex`, `age`, `salary`, `flat_no`, `street`, `city`, `state`, `zip`, `phone_no`) VALUES
(7, 'nanda', 'kishore', '2014-11-12', 0, 19, 20000, '221', 'Gachibowli', 'HYderabad', 'AndhraPradesh', 500032, 8751426302),
(8, 'test', 'test', '2014-11-13', 0, 19, 1000, '', '', '', '', 0, 123456790);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE IF NOT EXISTS `expenditure` (
`expenditureid` int(11) NOT NULL,
  `electricitybill` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `maintanancecharges` int(11) NOT NULL,
  `salarycuttings` int(11) NOT NULL,
  `totalexpenditure` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`expenditureid`, `electricitybill`, `rent`, `maintanancecharges`, `salarycuttings`, `totalexpenditure`) VALUES
(3, 1000, 100, 200, 1000, 2300);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `product_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `offerflag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`product_id`, `startdate`, `enddate`, `offerflag`) VALUES
(6, '2014-11-20', '2014-11-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
`order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `products` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `customer_id`, `products`, `quantity`) VALUES
(3, 3, '1,', 2),
(5, 3, '', 0),
(6, 3, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `product_id` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`product_id`, `unitprice`, `quantity`, `totalprice`) VALUES
(6, 1080, 5, 5400);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`payment_id` int(11) NOT NULL,
  `purchasedate` date NOT NULL,
  `order_id` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `cashgiven` int(11) NOT NULL,
  `difference` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `purchasedate`, `order_id`, `totalprice`, `cashgiven`, `difference`) VALUES
(3, '2014-11-10', 3, 1800, 2000, 200),
(4, '2014-11-10', 4, 300, 6100, 100),
(5, '2014-11-13', 4, 6000, 6100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(11) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `retailersid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `date_of_purchase` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `productname`, `retailersid`, `quantity`, `unitprice`, `stock`, `date_of_purchase`) VALUES
(5, 'shirt', 1, 100, 100, 50, '2014-11-12'),
(6, 'pant', 2, 100, 1080, 50, '2014-06-11'),
(7, 'sarees', 1, 200, 2000, 127, '2014-01-08'),
(8, 'tea', 3, 1000, 1000, 500, '2014-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE IF NOT EXISTS `retailers` (
`retailersid` int(11) NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `contactname` varchar(30) NOT NULL,
  `flat_no` int(11) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone_no` bigint(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`retailersid`, `companyname`, `contactname`, `flat_no`, `street`, `city`, `state`, `zip`, `phone_no`) VALUES
(2, 'c1', 'cn1', 23, 'gachiboi', 'hfsdjk', 'AP', 50021, 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `password` int(20) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `flag`) VALUES
('charan', 123, 0),
('nanda', 123, 1),
('user.7', 2147483647, 0),
('user.8', 15464, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
 ADD PRIMARY KEY (`expenditureid`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
 ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
 ADD PRIMARY KEY (`order_id`), ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
 ADD PRIMARY KEY (`retailersid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
MODIFY `expenditureid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
MODIFY `retailersid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
