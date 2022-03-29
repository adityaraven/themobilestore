-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 10:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `acc_id` int(10) NOT NULL,
  `acc_cat` int(255) NOT NULL,
  `acc_prod` int(255) NOT NULL,
  `acc_title` varchar(255) NOT NULL,
  `acc_price` int(100) NOT NULL,
  `acc_quantity` int(255) NOT NULL,
  `acc_desc` text NOT NULL,
  `acc_image` text NOT NULL,
  `acc_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`acc_id`, `acc_cat`, `acc_prod`, `acc_title`, `acc_price`, `acc_quantity`, `acc_desc`, `acc_image`, `acc_keywords`) VALUES
(7, 1, 18, 'one plus 6t tempered glass', 259, 10, '', '71Jn2YHnJUL._SL1500_.jpg', 'one plus 6t tempered glass');

-- --------------------------------------------------------

--
-- Table structure for table `accessories_cat`
--

CREATE TABLE `accessories_cat` (
  `acc_cat_id` int(10) NOT NULL,
  `acc_cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories_cat`
--

INSERT INTO `accessories_cat` (`acc_cat_id`, `acc_cat_title`) VALUES
(1, 'Tempered Glass'),
(2, 'Back Cover');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'test@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(55) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Samsung'),
(2, 'Nokia'),
(3, 'Sony'),
(4, 'Xiaomi'),
(5, 'Apple'),
(6, 'oneplus'),
(7, 'vivo'),
(8, 'Realme');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cust_mail` varchar(50) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_addr` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(55) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Accessories'),
(2, 'Android'),
(3, 'iphone');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_fname` text NOT NULL,
  `customer_lname` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_dob` date NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_fname`, `customer_lname`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_dob`, `customer_phone`, `customer_ip`) VALUES
(1, 'aditya', '0', 'adityaraven2@gmail.com', '12345', 'India', 'Allahabad', '1994-09-30', 2147483647, ''),
(4, 'rakesh', '0', 'drakesh@gmail.com', '1234', 'Israel', 'hongkong', '1994-02-06', 2147483647, '::1'),
(3, 'lithma', '0', 'lbhrama@gmail.com', '1234', 'Japan', 'korea', '0000-00-00', 2147483647, ''),
(8, 'manoj', 'kumar', 'manoj@gmail.com', 'cdd1538139b1c20bc81358e78783606340b1b9b1', 'India', 'nagpur', '1995-06-22', 2147483647, '::1'),
(6, 'Rahul', '0', 'rahul@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nepal', 'kathmandu', '1989-02-12', 2147483647, '::1'),
(5, 'rajdeep', '0', 'rajdeep@gmail.com', '12345', 'Pakistan', 'lahore', '1993-04-15', 2147483647, '::1'),
(12, 'sanghpriya', 'Bhimte', 'sanghpriya@gmail.com', 'cdd1538139b1c20bc81358e78783606340b1b9b1', 'India', 'Bilaspur', '1994-06-05', 2147483647, '::1'),
(2, 'sanghpriya', '0', 'sangu@gmail.com', '12345', 'India', 'Allahabad', '1994-05-04', 2147483647, ''),
(10, 'shubham', 'bhimte', 'shubham@gmail.com', 'cdd1538139b1c20bc81358e78783606340b1b9b1', 'Pakistan', 'lahoire', '1992-05-06', 2147483647, '::1'),
(7, 'sunder', 'lal', 'sunder@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Israel', 'lahore', '1995-05-02', 2147483647, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `detail_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`detail_id`, `product_id`, `order_id`, `quantity`) VALUES
(25, 18, 39, 1),
(26, 19, 39, 2),
(27, 18, 40, 3),
(28, 19, 40, 1),
(29, 19, 41, 0),
(30, 19, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `state` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `name`, `city`, `pincode`, `state`, `phone`, `desc`) VALUES
(39, 'sangu@gmail.com', '2019-04-25', 'Aditya', 'Allahabad', 211114, 'UP', 2147483647, ' TELIARGANJ , ALLAHABAD , UP'),
(40, 'sangu@gmail.com', '2019-04-25', 'bhrama', 'Allahabad', 242424, 'assam', 2147483647, 'assam'),
(41, 'sangu@gmail.com', '2019-04-25', 'SANG', 'Allahabad', 211114, 'UP', 1331313131, ' TELIAR'),
(42, 'sangu@gmail.com', '2019-04-25', 'Aditya', 'hongkong', 877777, 'china', 2147483647, ' beging');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE `os` (
  `os_id` int(10) NOT NULL,
  `os_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`os_id`, `os_title`) VALUES
(1, 'Andriod'),
(2, 'iOS');

-- --------------------------------------------------------

--
-- Table structure for table `processors`
--

CREATE TABLE `processors` (
  `pro_id` int(50) NOT NULL,
  `pro_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processors`
--

INSERT INTO `processors` (`pro_id`, `pro_title`) VALUES
(1, 'Exynos 7884'),
(2, 'Qualcomm Snapdragon 660 AIE '),
(3, 'Qualcomm Snapdragon 636 '),
(4, 'Qualcomm Snapdragon 845');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(50) NOT NULL,
  `product_brand` int(50) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_cat` int(50) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_ram` varchar(50) NOT NULL,
  `product_rom` varchar(50) NOT NULL,
  `product_battery` int(50) NOT NULL,
  `product_processor` int(50) NOT NULL,
  `product_camera` int(50) NOT NULL,
  `product_screen_size` int(50) NOT NULL,
  `product_image` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_brand`, `product_title`, `product_cat`, `product_price`, `product_ram`, `product_rom`, `product_battery`, `product_processor`, `product_camera`, `product_screen_size`, `product_image`, `product_desc`, `product_keywords`, `product_quantity`) VALUES
(18, 4, 'OnePlus 6Tt', 1, 34999, '6', '128', 3700, 4, 20, 6, '51EfDWKl24L._SL1300_.jpg', '<p>hello its one of the best phon</p>', 'oneplus, 6t, oneplus 6t', 45),
(19, 4, 'Redmi Note 6 Pro', 1, 9999, '4', '64', 4000, 3, 20, 6, 'mi-redmi-note-6-pro-mzb6882in-original-imafb6npun9zvqbk.jpeg', '', 'Note 6 Pro, mi,note', 37);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `accessories_cat`
--
ALTER TABLE `accessories_cat`
  ADD PRIMARY KEY (`acc_cat_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cust_mail`,`p_id`),
  ADD KEY `cust_mail_2` (`cust_mail`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_email`,`customer_phone`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`os_id`);

--
-- Indexes for table `processors`
--
ALTER TABLE `processors`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `acc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `accessories_cat`
--
ALTER TABLE `accessories_cat`
  MODIFY `acc_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `os_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `processors`
--
ALTER TABLE `processors`
  MODIFY `pro_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
