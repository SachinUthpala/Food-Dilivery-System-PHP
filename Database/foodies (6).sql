-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 02:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `umail` varchar(200) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `f_price` varchar(200) NOT NULL,
  `f_img` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `quntity` int(11) NOT NULL DEFAULT 1,
  `TotalPrice` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `umail`, `uname`, `f_name`, `f_price`, `f_img`, `status`, `quntity`, `TotalPrice`) VALUES
(29, 'admin@gmail.com', 'Admin', 'Chicken Nugets', '2000       ', 'IMG-656b58fb4abf61.49766121.jpg', 0, 3, '6000'),
(30, 'admin@gmail.com', 'Admin', 'Chicken Nugets', '2000       ', 'IMG-656b58fb4abf61.49766121.jpg', 0, 1, '2000'),
(31, 'admin@gmail.com', 'Admin', 'Chicken Shawarma', '2900       ', 'IMG-656b57cbc550e2.47629643.jpg', 0, 3, '8700'),
(32, 'admin@gmail.com', 'Admin', 'Beef Rice', '2200       ', 'IMG-656b57da945a21.37067612.jpg', 0, 4, '8800'),
(33, 'admin@gmail.com', 'Admin', 'Pizza', '1200       ', 'IMG-656b57eedb0000.57834707.jpg', 0, 4, '4800'),
(34, 'admin@gmail.com', 'Admin', 'Buriyani', '2700       ', 'IMG-656b5800d3cd94.28351637.jpg', 0, 3, '8100'),
(35, 'admin@gmail.com', 'Admin', 'Sunday', '1200       ', 'IMG-656b582f1c6728.65867404.jpg', 1, 3, '3600'),
(36, 'admin@gmail.com', 'Admin', 'Golden Sunday', '12000      ', 'IMG-656b583fe9ca09.96597317.jpg', 1, 3, '36000'),
(37, 'Sachin@gmail.com', 'Sachin', 'Chicken Nugets', '2000       ', 'IMG-656b58fb4abf61.49766121.jpg', 1, 3, '6000'),
(38, 'Sachin@gmail.com', 'Sachin', 'Beef Nuts', '1000       ', 'IMG-656b5911cf6076.74389281.jpg', 1, 10, '10000'),
(39, 'Sachin@gmail.com', 'Sachin', 'Pizza', '1200       ', 'IMG-656b57eedb0000.57834707.jpg', 0, 8, '9600'),
(40, 'Sachin@gmail.com', 'Sachin', 'Beef Rice', '2200       ', 'IMG-656b57da945a21.37067612.jpg', 0, 4, '8800'),
(41, 'Sachin@gmail.com', 'Sachin', 'Buriyani', '2700       ', 'IMG-656b5800d3cd94.28351637.jpg', 0, 4, '10800'),
(42, 'Sachin@gmail.com', 'Sachin', 'Sunday', '1200       ', 'IMG-656b582f1c6728.65867404.jpg', 1, 3, '3600'),
(43, 'Sachin@gmail.com', 'Sachin', 'Soft Drink Bottle', '700        ', 'IMG-656b585342e554.55015858.jpg', 1, 3, '2100'),
(44, 'Sachin@gmail.com', 'Sachin', 'Golden Sunday', '12000      ', 'IMG-656b583fe9ca09.96597317.jpg', 0, 3, '36000'),
(45, 'Kusal@gmail.com', 'Kusal', 'Chicken Nugets', '2000       ', 'IMG-656b58fb4abf61.49766121.jpg', 1, 1, '2000'),
(46, 'Kusal@gmail.com', 'Kusal', 'Beef Nuts', '1000       ', 'IMG-656b5911cf6076.74389281.jpg', 0, 1, '1000'),
(47, 'Kusal@gmail.com', 'Kusal', 'Chicken Rice', '2500       ', 'IMG-656b57bca3c1b0.21728285.jpg', 1, 1, '2500'),
(48, 'Kusal@gmail.com', 'Kusal', 'Chicken Shawarma', '2900       ', 'IMG-656b57cbc550e2.47629643.jpg', 0, 1, '2900'),
(49, 'Kusal@gmail.com', 'Kusal', 'Pizza', '1200       ', 'IMG-656b57eedb0000.57834707.jpg', 1, 1, '1200'),
(50, 'Kusal@gmail.com', 'Kusal', 'Buriyani', '2700       ', 'IMG-656b5800d3cd94.28351637.jpg', 0, 1, '2700'),
(51, 'Kusal@gmail.com', 'Kusal', 'Soft Drink Bottle', '700        ', 'IMG-656b585342e554.55015858.jpg', 1, 1, '700'),
(52, 'SachinUthpala@gmail.com', 'Sachin', 'Chicken Nugets', '2000       ', 'IMG-656b58fb4abf61.49766121.jpg', 1, 7, '14000'),
(53, 'SachinUthpala@gmail.com', 'Sachin', 'Chicken Rice', '2500       ', 'IMG-656b57bca3c1b0.21728285.jpg', 0, 5, '12500'),
(54, 'SachinUthpala@gmail.com', 'Sachin', 'Chicken', '1200', 'IMG-656b5f44446c04.28109501.jpg', 0, 6, '7200'),
(55, 'SachinUthpala@gmail.com', 'Sachin', 'Golden Sunday', '12000      ', 'IMG-656b583fe9ca09.96597317.jpg', 1, 6, '72000');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `account_number` varchar(120) DEFAULT NULL,
  `bank` varchar(123) DEFAULT NULL,
  `cvv` varchar(120) DEFAULT NULL,
  `birthday` varchar(120) DEFAULT NULL,
  `image` varchar(1200) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `account_number`, `bank`, `cvv`, `birthday`, `image`, `isAdmin`) VALUES
(17, 'Uthpala', 'uthpala@gmail.com', 'uthpala', '1122334456', 'NO 39, RUHUNA, SRI LANKA', '1234 2345 3456', 'DFCC  ', '123', '2020-10-11', 'IMG-656aed346e6502.96313843.jpeg', 0),
(18, 'Sachin', 'Sachin@gmail.com', 'Sachin-123', '0750860862', 'NO 59, Flower Road , Sri Lanka', '1234 5678 9010', 'BOC       ', '123', '2022-10-10', 'IMG-656b5c456990c0.35566348.png', 0),
(24, 'Kamal', 'kamal@gmail.com', 'Kamal-123', '0762712200', 'NO 39,New Malkaduwawa , Kurunegala', '1234 1230 1120', 'HNB ', '554', '2023-10-10', 'IMG-656a034a8d5100.99569830.png', 0),
(28, 'piyal', 'Piyal@gmail.com', 'Piyala-111111', '0762712200', 'NO58', '1111 2222 3333', 'DFCC ', '111', '2030-10-10', 'IMG-656a034a8d5100.99569830.png', 0),
(29, 'chathuea', 'chathuea@gmail.com', '11111111', NULL, NULL, NULL, NULL, NULL, NULL, 'IMG-656a034a8d5100.99569830.png', 0),
(30, 'Admin', 'Admin@gmail.com', 'AdminFoodies-123', NULL, NULL, NULL, NULL, NULL, NULL, 'IMG-656a0404340eb5.75826149.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(1111) NOT NULL,
  `p_catogary` varchar(1111) NOT NULL,
  `p_discription` varchar(1111) NOT NULL,
  `p_price` varchar(11) NOT NULL,
  `p_img` varchar(11111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_catogary`, `p_discription`, `p_price`, `p_img`) VALUES
(6, 'Chicken Nugets', 'Starter', 'This is a starter Food', '2000       ', 'IMG-656b58fb4abf61.49766121.jpg'),
(7, 'Chicken Rice', 'Mains', 'Thanduri Chicken', '2500       ', 'IMG-656b57bca3c1b0.21728285.jpg'),
(8, 'Chicken Shawarma', 'Mains', 'Special Shawarma', '2900       ', 'IMG-656b57cbc550e2.47629643.jpg'),
(10, 'Sunday', 'Desserts', 'Ice cream', '1200       ', 'IMG-656b582f1c6728.65867404.jpg'),
(11, 'Soft Drink Bottle', 'Desserts', 'Sprite , Pepsi , Fanta', '700        ', 'IMG-656b585342e554.55015858.jpg'),
(12, 'Beef Nuts', 'Starter', 'Starter Food', '1000       ', 'IMG-656b5911cf6076.74389281.jpg'),
(14, 'Golden Sunday', 'Desserts', 'Special Sunday Ice cream with Gold', '12000      ', 'IMG-656b583fe9ca09.96597317.jpg'),
(16, 'Pizza', 'Mains', 'Chicken Pizza', '1200       ', 'IMG-656b57eedb0000.57834707.jpg'),
(17, 'Buriyani', 'Mains', 'Chicken Buriyani', '2700       ', 'IMG-656b5800d3cd94.28351637.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
