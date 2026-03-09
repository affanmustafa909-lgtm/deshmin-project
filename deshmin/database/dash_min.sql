-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2026 at 03:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dash_min`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_des` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`id`, `p_name`, `p_des`, `price`, `category`, `image`) VALUES
(1, 'Test Product', 'Sample description', 1000.00, 'Demo', 'test.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_des` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id`, `p_name`, `p_des`, `category`, `price`, `image`) VALUES
(30, 'Laptop', '12000', 'Categories', '142500', 'laptop4.jpg'),
(42, 'smart phone', '1500', 'Just For You', '2000', 'smartphone.jpg'),
(49, 'P47 Wireless Bluetooth Headphones – HiFi', '1999', 'Flash Sale', '688', 'p47.avif'),
(50, 'P47 Wireless Bluetooth Headphones – HiFi', '1999', 'Just For You', '688', 'p47.avif'),
(51, 'Black The boys printed summer tracksuit for men', '1890', 'Flash Sale', '899', 'black boy printed.avif'),
(52, 'Black The boys printed summer tracksuit for men', '1890', 'Just For You', '899', 'black boy printed.avif'),
(53, 'Mini Wireless Bluetooth Earbuds', '1000', 'Flash Sale', '254', 'airbuds wireless.avif'),
(55, 'Brown Genuine Leather Wallet ', '444', 'Flash Sale', '250', 'brown.avif'),
(56, 'Brown Genuine Leather Wallet ', '444', 'Just For You', '250', 'brown.avif'),
(57, 'Aura arabic watch for boys', '1000', 'Flash Sale', '454', 'watch.avif'),
(58, 'Screen Protectors', '10', 'Categories', '1', 'screen.avif'),
(59, ' TOP Quality School BAG', '1400', 'Flash Sale', '965', 'bag.avif'),
(60, ' TOP Quality School BAG', '1400', 'Just For You', '965', 'bag.avif'),
(61, 'Swetshirt  For Kids Baby', '799', 'Just For You', '548', 'pajama trouser.avif'),
(62, 'Peppers', '1', 'Categories', '2', 'pepper..avif'),
(63, 'Kids Food', '7', 'Categories', '8', 'kids food.avif'),
(64, 'Dining Set', '4', 'Categories', '5', 'dining.avif'),
(65, 'Headbands', '4', 'Categories', '5', 'headbands.avif');

-- --------------------------------------------------------

--
-- Table structure for table `buynow`
--

CREATE TABLE `buynow` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `colony` varchar(100) DEFAULT NULL,
  `house` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buynow`
--

INSERT INTO `buynow` (`id`, `product_id`, `p_name`, `price`, `qty`, `fullname`, `province`, `city`, `area`, `colony`, `house`, `phone`, `address`, `order_date`, `image`) VALUES
(3, 41, 'Apple', 25000.00, 1, 'Affan', '147', 'lahore', 'Karachi', 'lahore', 'karachi', '12365489741', 'karachi', '2025-10-07 06:27:39', ''),
(4, 27, 'Motor Cycle', 12500.00, 1, 'Affan', '147', 'lahore', 'Karachi', 'lahore', 'karachi', '12365489741', 'karachi', '2025-10-07 06:27:39', ''),
(5, 25, 'Motor Cycle', 12500.00, 1, 'ali', 'punjab', 'swl', 'swl', 'tbz', '17', '032155555', 'swl', '2025-10-07 10:57:03', ''),
(6, 37, 'Apple', 142500.00, 1, 'Najam', 'punjab', 'lahore', 'Karachi', 'karachi', 'karachi', '12365489741', 'karachi', '2025-10-07 11:02:02', ''),
(7, 36, 'Apple', 142500.00, 1, 'Shehryar', 'punjab', 'sahiwal', 'farid town', 'tbz', '17', '03201215123', 'swl', '2025-10-07 11:16:57', ''),
(8, 29, 'Laptop', 142500.00, 1, 'Najam', 'punjab', 'k', 'Karachi', 'karachi', '17', '03201215123', 'karachi', '2025-10-07 11:19:35', ''),
(9, 27, 'Motor Cycle', 12500.00, 1, 'Hamza', 'punjab', 'Multan', 'Multan', 'Multan', 'Multan', '03332100014', 'Multan', '2025-10-07 11:32:35', 'B.jpg'),
(10, 42, 'smart phone', 2000.00, 1, 'Waqas', 'punjab', 'lahore', 'lahore', 'lahore', 'lahore ajwahouse', '03332100014', 'Punjab lahore ajwahouse', '2025-10-07 11:34:31', 'smartphone.jpg'),
(11, 46, 'Children', 250.00, 1, 'Aftab', 'punjab', 'Sahiwal', 'farid town', 'tbz', '17', '03332100014', 'swl', '2025-10-07 11:38:09', 'smiley-3.jpg'),
(12, 29, 'Laptop', 142500.00, 1, 'Saad', 'punjab', 'swl', 'swl', 'tbz', '17', '03201215123', 'swl', '2025-10-08 09:58:10', 'laptop4.jpg'),
(13, 26, 'Motor Cycle', 12500.00, 1, 'Najam', 'punjab', 'lahore', 'lahore', 'tbz', 'karachi', '12365489741', 'karachi', '2025-10-08 10:17:32', 'B.jpg'),
(14, 47, 'Slide', 200.00, 1, 'Slide', 'punjab', 'Okara', 'CMH okara', 'tbz', '20', '12365489741', 'Okara', '2025-10-08 10:34:24', 'slide-6.jpg'),
(15, 41, 'Apple', 25000.00, 1, 'Hamza', 'punjab', 'swl', 'farid town', 'tbz', '17', '03332100014', 'swl', '2025-10-10 04:53:45', 'children-593313_1280.jpg'),
(16, 48, 'Slide', 200.00, 1, 'Saad', 'punjab', 'lahore', 'lahore', 'lahore', '17', '12365489741', 'Punjab lahore ajwahouse', '2025-10-13 10:45:01', 'slide-6.jpg'),
(17, 42, 'smart phone', 2000.00, 1, 'ali', 'punjab', 'sahiwal', 'farid town', 'tbz', '20', '12365489741', 'swl', '2025-10-13 10:50:00', 'smartphone.jpg'),
(18, 55, 'Brown Genuine Leather Wallet ', 250.00, 1, 'Najam', 'punjab', 'lahore', 'lahore', 'tbz', 'karachi', '12365489741', 'Punjab lahore ajwahouse', '2025-10-14 04:23:59', 'brown.avif'),
(19, 61, 'Swetshirt  For Kids Baby', 548.00, 1, 'Affan', 'punjab', 'k', 'Karachi', 'karachi', 'karachi', '03201215123', 'karachi', '2025-10-14 04:27:23', 'pajama trouser.avif'),
(20, 49, 'P47 Wireless Bluetooth Headphones – HiFi', 688.00, 1, 'Affan', '1250', 'Sahiwal', 'farid town', 'tbz', 'karachi', '03201215123', 'Multan', '2026-01-23 06:34:42', 'p47.avif'),
(21, 53, 'Mini Wireless Bluetooth Earbuds', 254.00, 1, 'Affan', '147', 'swl', 'farid town', 'tbz', 'karachi', '03201215123', 'Multan', '2026-01-27 17:48:49', 'airbuds wireless.avif'),
(22, 59, ' TOP Quality School BAG', 965.00, 1, 'affan', 'punjab', 'sahiwal', 'farid town', 'farid town', '145', '0312456783', 'farid town', '2026-02-05 06:55:32', 'bag.avif'),
(23, 59, ' TOP Quality School BAG', 965.00, 1, 'ali', '1250', 'sahiwal', 'lahore', 'Multan', 'karachi', '03332100014', 'karachi', '2026-03-09 02:04:01', 'bag.avif');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `e_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `e_address`, `password`, `image`) VALUES
(1, 'Ali', 'ali@gmail.com', '123456', 'alex-suprun-ZHvM3XIOHoE-unsplash.jpg'),
(2, 'Ali', 'ali@gmail.com', '123456', 'alex-suprun-ZHvM3XIOHoE-unsplash.jpg'),
(3, 'Sami Ullah', 'sami@gmail.com', '123654', 'Awais Mehmood.png'),
(4, 'Shehryar', 'shehryar@gmail.com', '000000', 'person.jpg'),
(5, 'Ali', 'ali@gmail.com', '123456', 'alex-suprun-ZHvM3XIOHoE-unsplash.jpg'),
(6, 'admin', 'ali@gmail.com', '123456', 'airbird2.jfif'),
(7, 'affan', 'affan@gmail.com', '1234', 'Awais Mehmood.png'),
(8, 'Ali', 'ali@gmail.com', '12345', 'car.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buynow`
--
ALTER TABLE `buynow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `buynow`
--
ALTER TABLE `buynow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
