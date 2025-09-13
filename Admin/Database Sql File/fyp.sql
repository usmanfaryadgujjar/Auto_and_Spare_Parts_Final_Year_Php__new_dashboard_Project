-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 07:06 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `seller_or_admin` varchar(100) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `cnic` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `seller_or_admin`, `seller_id`, `cnic`) VALUES
(1, 'Haider', 'haider@haider.com', '$2y$10$Otn8B3nZEmVaYwHh4ffyUe3gO1bhOxt6C.EIXaN0hx3cdmbvYQOvu', 'admin', 0, ''),
(2, 'sherjeel', 'sherjeel@sherjeel.com', '$2y$10$EIw.C4tQw8udHH0T5lhrL.M8b8DwXx2oL0onAnpi5LXcSAIJW/kfC', 'admin', 0, ''),
(3, 'usman gujjar', 'usman@usman.com', '$2y$10$XbHt/IwlupdMZjacia/SjuT0NYI9.XCcqW4xDTgi3.C60Hv2gNOsS', 'admin', 0, ''),
(28, 'Amjad', 'amjad@gmail.com', '$2y$10$Otn8B3nZEmVaYwHh4ffyUe3gO1bhOxt6C.EIXaN0hx3cdmbvYQOvu', 'seller', 6, '35202-9293748-7'),
(29, 'Zaheer', 'zaheer@gmail.com', '$2y$10$h0ey5KaN8nLhkmnusH2w/usIGuvcfFdawxN./w2u5PXLjvpeZ9qnK', 'seller', 7, '35100-9293748-6'),
(31, 'Ali Gujjar ', 'alimanager@gmail.com', '$2y$10$J5gyv0Yogj9c/YQ9ZFUgG..kKfMox4ic5p3/..WEaxPh3z/kPcUve', 'manager', 0, '35252-4293746-9');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL,
  `admin_id` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `admin_id`) VALUES
(1, 'BMW', '3'),
(2, ' Ferrari', '3'),
(3, 'Alfa Romeo', '3'),
(4, ' Aston Martin', '3'),
(8, 'Lamborghini', ''),
(11, 'Maserati', ''),
(13, ' Pagani', ''),
(14, 'Porsche', ''),
(15, 'Honda', ''),
(16, 'Mercedes-Benz', ''),
(17, 'Toyota', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `admin_id` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `admin_id`) VALUES
(1, 'Tyres and Wheels', '3'),
(2, 'Tools', '3'),
(3, 'Gadgets', ''),
(4, 'Oil', '3'),
(6, ' Brakes', ''),
(7, 'Lights', ''),
(9, 'Audio OR Video', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `qty` int(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `edit_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `card_H_N` varchar(100) NOT NULL,
  `exp_date` varchar(100) NOT NULL,
  `cvc` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `Total_Bill` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `account_name`, `card_no`, `card_H_N`, `exp_date`, `cvc`, `address`, `Total_Bill`) VALUES
(1, '12', 'VISA', '1234567891231', 'ali', '12-2020', '123', 'lhr-OR-lhr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(100) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_condition` varchar(100) NOT NULL,
  `pro_user_add_id` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`, `product_condition`, `pro_user_add_id`) VALUES
(20, 6, 1, 'Rear LH Disc Brake Caliper', 8000, 8, 'Rear LH Disc Brake Caliper UZJ200 VDJ200 2007', '1988535591.jpg', 'Brakes', 'New_product', '2'),
(21, 6, 2, 'Rear LH Disc Brake Caliper 150 se', 5000, 2, 'Rear LH Disc Brake Caliper JB9381C25', '1018570155.jpg', 'Brakes', 'Old_product', '3'),
(22, 2, 3, 'Timing Belt + Water Pump Kit suits', 1550, 5, 'Timing Belt  Water Pump Kit suits 1HZ HZJ75 HZJ80 ', '1703401668.jpg', 'Belt', 'New_product', '1'),
(25, 6, 17, 'New Front Brake Caliper Rubbers kit', 1000, 5, 'New Front Brake Caliper Rubbers kit  and Brake Caliper Rubbers Piston Repair ', '359310891.jpg', 'Brakes', 'New_product', '2'),
(26, 2, 15, 'Japan Honda CL7 Bearing ', 999, 3, 'All is good condition Brake Caliper Rubbers Piston Repair', '1747112267.jpg', 'Belt', 'Old_product', '1'),
(32, 2, 17, 'Rear Brake Caliper Kit suits', 2150, 3, 'Toyota Landcruiser HZJ80 HDJ80 FZJ80 FJ80 80 Series', '439219375.jpg', 'belt, kit', 'New_product', '6'),
(33, 9, 1, 'Full HD LCD ', 8599, 3, 'New Box Packed With Warranty\r\nUniversal Screen\r\n7 inch screen size\r\nWith Remote contraption\r\nAux in funtion\r\nBluetooth\r\nMirror link option\r\nReview Camera function\r\nFull HD 720p 1080p support\r\nUsb Aux SD card Bluetooth Mirror link option ', '1593585461_Hd lcd23.png', 'LCD, Video ', 'New_product', '3'),
(34, 7, 1, 'Head Lights', 10000, 10, 'Brand new', '933163868.jpg', '', 'New_product', '6');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
`user_id` int(10) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(300) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL,
  `user_type` varchar(300) NOT NULL,
  `cnic` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `user_type`, `cnic`) VALUES
(6, 'Amjad', 'ali', 'amjad@gmail.com', '$2y$10$lZDbpP4DDep.ZU47HuOvRePTZtOUZKVURkF/LiQRH.dk5xMNJH4UO', '12345678913', 'lhr23', 'h23-5k3', 'seller', '35202-9293748-7'),
(7, 'Zaheer', 'ali', 'zaheer@gmail.com', '25f9e794323b453885f5181f1b624d0b', '12345678912', 'lhr', '', 'seller', '35100-9293748-6'),
(11, 'Muhammad', 'usman', 'muhammadusman@gmail.com', '25f9e794323b453885f5181f1b624d0b', '12345678912', 'lhr', '', 'customer', '35252-4293006-5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`), ADD KEY `fk_product_cat` (`product_cat`), ADD KEY `fk_product_brand` (`product_brand`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
