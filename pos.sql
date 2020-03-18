-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 มี.ค. 2020 เมื่อ 09:03 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--
CREATE DATABASE IF NOT EXISTS `pos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pos`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` varchar(10) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_sname` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_sname`, `address`, `phoneNumber`) VALUES
('c0001', 'อาราวี', 'มะแอเคียน', '234/58 ถ.กาญจนวนิช ซอย 1 ต.เขารูปช้าง อ.เมือง จ.สงขลา 91000', '0825147416');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` varchar(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type_id` int(2) NOT NULL,
  `price` int(5) NOT NULL,
  `product_MFD` date NOT NULL,
  `product_EXP` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type_id`, `price`, `product_MFD`, `product_EXP`) VALUES
('p0001', 'Coke', 1, 15, '2020-03-05', '2052-03-06'),
('p0002', 'เลย์', 3, 20, '2020-03-20', '2021-03-25'),
('p0003', 'กาโตะ', 1, 13, '2020-03-12', '2022-03-31'),
('p0005', 'มาม่า', 2, 6, '2020-03-12', '2022-03-17');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `product_type_id` int(2) NOT NULL,
  `product_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`) VALUES
(0, ''),
(1, 'เครื่องดื่ม'),
(2, 'ของใช้'),
(3, 'ขนมขบเคี้ยว'),
(4, 'อาหารแห้ง');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `product_id` varchar(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `sale`
--

INSERT INTO `sale` (`sale_id`, `product_id`, `product_name`, `qty`, `price`) VALUES
(3, 'p0003', 'กาโตะ', 1, 13);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staff_id` varchar(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_sname` varchar(30) NOT NULL,
  `staff_type_id` int(2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`, `staff_name`, `staff_sname`, `staff_type_id`, `address`, `phoneNumber`) VALUES
('s001', 'admin', 'admin', 'ดนัย', 'เจริญภักดีสกุล', 1, '117/1 หมู่1 ต.โคกหล่อ อ.เมือง จ.ตรัง 92000', '0882372538'),
('s002', 'danai', '123456', 'กฤตเมธ', 'ขำคม', 2, '124/5 หมู่7 ต.ทับเที่ยง อ.เมือง จ.ตรัง 92000', '0825147415'),
('s003', 'far', '1234', 'fatimah', 'dfas', 3, '234/58 ถ.กาญจนวนิช ซอย 1 ต.เขารูปช้าง อ.เมือง จ.สงขลา 90000', '0845476658');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `staff_type`
--

DROP TABLE IF EXISTS `staff_type`;
CREATE TABLE `staff_type` (
  `staff_type_id` int(2) NOT NULL,
  `staff_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type_name`) VALUES
(1, 'ผู้จัดการ'),
(2, 'พนักงานทั่วไป'),
(3, 'แม่บ้าน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
