-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 09:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_now`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `status`) VALUES
(3, 'men', 1),
(4, 'women', 1),
(14, 'kids', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'er', 'navmshiana60@gmail.com', '1234', 'jhg', '2022-02-24 03:56:39'),
(2, 'asd', 'asd', '9324564422', 'sdfsdf', '2022-02-24 04:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(200) NOT NULL,
  `mihpayid` varchar(200) NOT NULL,
  `payu_status` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `txnid`, `mihpayid`, `payu_status`, `added_on`) VALUES
(1, 3, 'Delhi', 'delhi', 146111, 'COD', 150, 'pending', 1, '3f10f5e84611fb4c796b', '', '', '2022-02-24 05:10:04'),
(2, 3, 'toronto', 'toronto', 12345, 'payu', 500, 'pending', 1, 'be0f55e26cd85830d9dd', '', '', '2022-02-24 07:19:15'),
(3, 3, 'toronto', 'toronto', 12345, 'payu', 150, 'pending', 1, '5d5bd766894916e05665', '', '', '2022-02-24 07:59:30'),
(4, 3, 'hoshiarpur', 'hoshiarpur', 1234, 'payu', 60, 'pending', 1, 'b51a4bc2c04ce52d7b8c', '', '', '2022-02-24 08:23:19'),
(5, 3, 'hoshiarpur', 'hoshiarpur', 1234, 'payu', 150, 'pending', 1, 'ff13d955c5ef8056ae61', '', '', '2022-02-24 08:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 6, 1, 150),
(2, 2, 4, 1, 500),
(3, 3, 6, 1, 150),
(4, 4, 8, 1, 60),
(5, 5, 6, 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `short_descr` varchar(2000) NOT NULL,
  `descr` text NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `meta_descr` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `product_name`, `product_image`, `mrp`, `price`, `qty`, `short_descr`, `descr`, `meta_keyword`, `meta_descr`, `meta_title`, `status`) VALUES
(1, 3, 'Black Shirt', '530207_five-hundred-men-1.jpg', 1200, 2200, 13, 'Black Shirt', 'Black Shirt', 'Black Shirt', 'Black Shirt', 'Black Shirt', 1),
(2, 14, 'Green Dress', '473557_four-hundred-boys.jpeg', 500, 950, 5, 'Green Dress', 'Green Dress', 'Green Dress', 'Green Dress', 'Green Dress', 1),
(3, 4, 'Pink Dress', '332084_two-hundred-ladies-2.jpg', 900, 500, 20, 'Pink Dress', 'Pink Dress', 'Pink Dress', 'Pink Dress', 'Pink Dress', 1),
(4, 3, 'Purple Shirt', '461822_purple-shirt.jpg', 250, 500, 12, 'It is a purple color shirt', 'Purple Shirt', 'Purple Shirt', 'Purple Shirt', 'Purple Shirt', 1),
(5, 14, 'Blue Dress', '808885_boys-dress-2.jpeg', 600, 1100, 10, 'Blue Dress', 'Blue Dress', 'Blue Dress', 'Blue Dress', 'Blue Dress', 1),
(6, 4, 'AFORDABLE & TRADESIONAL DRESS', '432500_background-image.jpg', 250, 150, 10, 'AFORDABLE & TRADESIONAL DRESS', 'AFORDABLE & TRADESIONAL DRESS', 'AFORDABLE & TRADESIONAL DRESS', 'AFORDABLE & TRADESIONAL DRESS', 'AFORDABLE & TRADESIONAL DRESS', 1),
(7, 14, 'TODDLER CHILDREN\'S DRESS', '849082_boys-kids-1.jpg', 180, 140, 10, 'TODDLER CHILDREN\'S DRESS', 'TODDLER CHILDREN\'S DRESS', 'TODDLER CHILDREN\'S DRESS', 'TODDLER CHILDREN\'S DRESS', 'TODDLER CHILDREN\'S DRESS', 1),
(8, 3, 'MEN\'S BLACK SWEATSHIRT', '337447_blazers.jpg', 80, 60, 10, 'MEN\'S BLACK SWEATSHIRT', 'MEN\'S BLACK SWEATSHIRT', 'MEN\'S BLACK SWEATSHIRT', 'MEN\'S BLACK SWEATSHIRT', 'MEN\'S BLACK SWEATSHIRT', 1),
(9, 14, 'BOYS FLOWER PRINT SHIRT', '595400_five-hundred-boys-2.jpg', 200, 180, 10, 'BOYS FLOWER PRINT SHIRT', 'BOYS FLOWER PRINT SHIRT', 'BOYS FLOWER PRINT SHIRT', 'BOYS FLOWER PRINT SHIRT', 'BOYS FLOWER PRINT SHIRT', 1),
(10, 14, 'GIRLS FLOWER PRINT SKIRT', '881500_girl (2).jpg', 200, 180, 10, 'GIRLS FLOWER PRINT SKIRT', 'GIRLS FLOWER PRINT SKIRT', 'GIRLS FLOWER PRINT SKIRT', 'GIRLS FLOWER PRINT SKIRT', 'GIRLS FLOWER PRINT SKIRT', 1),
(11, 4, 'PLAIN PINK COTTON SAREE', '700833_men.jpg', 500, 400, 10, 'PLAIN PINK COTTON SAREE', 'PLAIN PINK COTTON SAREE', 'PLAIN PINK COTTON SAREE', 'PLAIN PINK COTTON SAREE', 'PLAIN PINK COTTON SAREE', 1),
(12, 14, 'FORMAL TOXEDO DRESS SUITS', '716585_boys-kids.jpg', 800, 750, 10, 'FORMAL TOXEDO DRESS SUITS', 'FORMAL TOXEDO DRESS SUITS', 'FORMAL TOXEDO DRESS SUITS', 'FORMAL TOXEDO DRESS SUITS', 'FORMAL TOXEDO DRESS SUITS', 1),
(13, 3, 'ACCESSORIES & TRADESIONAL DRESS', '289391_five-hundred-men-1.jpg', 190, 130, 10, 'ACCESSORIES & TRADESIONAL DRESS', 'ACCESSORIES & TRADESIONAL DRESS', 'ACCESSORIES & TRADESIONAL DRESS', 'ACCESSORIES & TRADESIONAL DRESS', 'ACCESSORIES & TRADESIONAL DRESS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `mobile` int(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `added_on`) VALUES
(1, 'rahul', 'rahul@gmail.com', 123456789, '', '2022-01-20 05:38:29'),
(3, 'navi', 's', 123456, '12345', '2022-02-15 04:06:25'),
(4, 'nav', 'nav', 123, 'nav', '2022-02-15 04:33:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
