-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 08:08 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` bigint(20) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `adminUser` varchar(200) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Syed Nadir Ahmed', 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Acer'),
(2, 'HP'),
(3, 'PC'),
(4, 'Lenovo'),
(5, 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(107, '5ptg2e9ambipelsr96hsmd6679', 3, 'Laptop', 25000.00, 1, 'uploads/387750c252.jpg'),
(113, 'aau4o9h5s7ddsgte6me6gfseet', 1, 'Monitor', 5150.00, 1, 'uploads/83b9af47b0.jpg'),
(114, 'aau4o9h5s7ddsgte6me6gfseet', 5, 'Mobile', 2000.00, 1, 'uploads/a0a99b4c4b.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_Id` int(11) NOT NULL,
  `category_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_Id`, `category_Name`) VALUES
(1, 'Keyboard'),
(2, 'PC Computer'),
(3, 'Mobile'),
(4, 'Laptop'),
(5, 'Mouse'),
(6, 'Head Phone'),
(7, 'Speaker'),
(8, 'Modem'),
(10, 'Test Category');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `phoneno` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `staddress` text NOT NULL,
  `postcode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`Id`, `name`, `email`, `pass`, `phoneno`, `country`, `city`, `staddress`, `postcode`) VALUES
(1, 'Customer up', 'customer@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01718xxxxxx', 'Bangldesh', 'sylhet', 'Jitumiar point', '3123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customerId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(26, 1, 3, 'Laptop', 1, 25000.00, 'uploads/387750c252.jpg', '2020-05-22 01:26:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `category_Id` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `category_Id`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'Monitor', 1, 1, 'This is a desktop monitor', 5150.00, 'uploads/83b9af47b0.jpg', 0),
(2, 'Laptop', 2, 2, 'this as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop', 210000.00, 'uploads/6c9a2c9714.png', 0),
(3, 'Laptop', 3, 3, 'this as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop\r\nthis as laptop.this is laptop.This is laptop', 25000.00, 'uploads/387750c252.jpg', 0),
(4, 'logic', 4, 4, 'this is keyboard.this is keyboard.this is keyboard.\r\nthis is keyboard.this is keyboard.this is keyboard.\r\nthis is keyboard.this is keyboard.this is keyboard.\r\nthis is keyboard.this is keyboard.this is keyboard.', 500.00, 'uploads/9e31986e4f.jpg', 1),
(5, 'Mobile', 5, 5, 'this is a mobile.this is a mobile.this is a mobile.this is a mobile.\r\nthis is a mobile.this is a mobile.this is a mobile.this is a mobile.\r\nthis is a mobile.this is a mobile.this is a mobile.this is a mobile.', 2000.00, 'uploads/a0a99b4c4b.png', 1),
(6, 'Laptop', 6, 6, 'this is laptop.this is laptop.this is laptop.this is laptop.\r\nthis is laptop.this is laptop.this is laptop.this is laptop.\r\nthis is laptop.this is laptop.this is laptop.this is laptop.this is laptop.this is laptop.this is laptop.this is laptop.', 23000.00, 'uploads/f319df67dc.jpg', 0),
(7, 'desktop', 7, 7, 'Desktop computer.Desktop computer.Desktop computer.Desktop computer.\r\nDesktop computer.Desktop computer.Desktop computer.Desktop computer.\r\nDesktop computer.Desktop computer.Desktop computer.Desktop computer.\r\nDesktop computer.Desktop computer.Desktop computer.Desktop computer.', 15400.00, 'uploads/6f9d203337.jpg', 1),
(8, 'PC', 8, 8, 'Desktop computer.Desktop computer.Desktop computer.Desktop computer.\r\nDesktop computer.Desktop computer.Desktop computer.Desktop computer.', 500.10, 'uploads/fda5d14d48.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `customerId`, `productId`, `productName`, `price`, `image`) VALUES
(8, 1, 3, 'Laptop', 25000.00, 'uploads/387750c252.jpg'),
(9, 1, 1, 'Monitor', 5150.00, 'uploads/83b9af47b0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_Id`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
