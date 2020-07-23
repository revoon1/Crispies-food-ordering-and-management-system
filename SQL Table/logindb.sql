-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 11:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cimage` varchar(100) NOT NULL,
  `cprice` float NOT NULL,
  `cquantity` int(10) NOT NULL DEFAULT 1,
  `ctype` varchar(20) NOT NULL,
  `cdescription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `cname`, `cimage`, `cprice`, `cquantity`, `ctype`, `cdescription`) VALUES
(9, 'abcc', 'Biryani', 'po3.jpg', 160, 1, 'Crispies Special', 'Mast'),
(30, '', 'Biryani', 'po3.jpg', 160, 1, 'Crispies Special', 'Mast'),
(48, '', 'Biryani', 'po3.jpg', 160, 1, 'Crispies Special', 'Mast');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `oimage` varchar(50) NOT NULL,
  `oname` varchar(20) NOT NULL,
  `oprice` float NOT NULL,
  `oquantity` int(20) NOT NULL,
  `ototalprice` float NOT NULL,
  `ophonenum` int(30) NOT NULL,
  `oaddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `oimage`, `oname`, `oprice`, `oquantity`, `ototalprice`, `ophonenum`, `oaddress`) VALUES
(27, 'alm', 'po3.jpg', 'Biryani', 160, 1, 160, 2147483647, 'isdn'),
(28, 'alm', 'po2.jpg', 'Hyderabadi Biryani', 180, 1, 180, 2147483647, 'isdn'),
(29, 'alm', 'po3.jpg', 'Biryani', 160, 1, 160, 2147483647, 'Ravi Nursery');

-- --------------------------------------------------------

--
-- Table structure for table `pcategory`
--

CREATE TABLE `pcategory` (
  `pid` int(10) NOT NULL,
  `ptype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcategory`
--

INSERT INTO `pcategory` (`pid`, `ptype`) VALUES
(4, 'Crispies Special'),
(5, 'Sweets'),
(6, 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `fimage` varchar(100) NOT NULL,
  `fprice` float NOT NULL,
  `ftype` varchar(20) NOT NULL,
  `fdescription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `fname`, `fimage`, `fprice`, `ftype`, `fdescription`) VALUES
(25, 'Biryani', 'po3.jpg', 160, 'Crispies Special', 'Mast'),
(26, 'Kaju Katli', 'swt3.jpg', 400, 'Sweets', 'Badhiya'),
(27, 'Noodles', 'ch1.jpg', 180, 'Chinese', 'Mast'),
(28, 'Hyderabadi Biryani', 'po2.jpg', 180, 'Crispies Special', 'Mast');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` int(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `contact`, `address`) VALUES
('abc', 'alm', '123', 0, ''),
('', '', '', 0, ''),
('Akshat', 'akshatshukla745@gmail.com', '123', 0, ''),
('abcc', 'abcc', '123', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcategory`
--
ALTER TABLE `pcategory`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pcategory`
--
ALTER TABLE `pcategory`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
