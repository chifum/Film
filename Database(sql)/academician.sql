-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 11:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academician`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '0703@Chifum');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `addres` varchar(255) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `fullName`, `email`, `addres`, `dob`, `gender`, `phone`, `password`, `date_created`) VALUES
(36, 'Emeri Chifum', 'chifum@gmail.com', '9b Abeke Animashaun by cottage drive,Lekki phase 1, Lagos.', '1992/01/01', 'Male', '07035372400', '0703@Emeri', '2020-08-10 12:47:16'),
(38, 'Emeri Faith', 'faith@gmail.com', '9b Abeke Animashaun by cottage drive,Lekki phase 1, Lagos.', '1992/01/01', 'Female', '07035372409', '0703@Chifum', '2020-08-10 22:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `film_order`
--

CREATE TABLE `film_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(255) DEFAULT NULL,
  `film_id` int(225) DEFAULT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `filmName` varchar(255) NOT NULL,
  `filmPrice` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film_order`
--

INSERT INTO `film_order` (`order_id`, `customer_id`, `film_id`, `fullName`, `email`, `filmName`, `filmPrice`, `total`, `order_date`) VALUES
(1, 36, 19, 'Emeri Chifum', 'chifum@gmail.com', 'Die Another Day', '40000', '40000', '2020-08-10 16:14:17'),
(2, 38, 22, 'Emeri Faith', 'faith@gmail.com', 'Die Another', '40000', '40000', '2020-08-10 23:25:17'),
(3, 38, 22, 'Emeri Faith', 'faith@gmail.com', 'Die Another', '40000', '40000', '2020-08-11 00:30:01'),
(4, 38, 24, 'Emeri Faith', 'faith@gmail.com', 'Die Another Day', '40000', '40000', '2020-08-11 00:46:56'),
(5, 36, 25, 'Emeri Chifum', 'chifum@gmail.com', 'Die Another Day', '40000', '40000', '2020-08-11 01:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `film_table`
--

CREATE TABLE `film_table` (
  `film_id` int(11) NOT NULL,
  `filmName` varchar(255) NOT NULL,
  `filmPrice` varchar(255) NOT NULL,
  `filmDetails` varchar(255) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `subcat_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film_table`
--

INSERT INTO `film_table` (`film_id`, `filmName`, `filmPrice`, `filmDetails`, `cat_id`, `subcat_id`, `image`, `date_created`) VALUES
(19, 'Die Another Day', '40000', 'James Bond, Harry B', '1', '1', 'person_1.jpg', '2020-08-09 23:45:26'),
(22, 'Die Another', '40000', 'James Bond, Harry', '1', '1', 'person_2.jpg', '2020-08-10 08:44:37'),
(24, 'Die Another Day', '40000', 'James Bond, Harry B', '1', '1', 'person_3.jpg', '2020-08-10 11:20:23'),
(25, 'Die Another Day', '40000', 'James Bond, Harry B', '1', '1', 'person_4.jpg', '2020-08-10 11:21:37'),
(26, 'Die Another Day', '40000', 'James Bond, Harry B', '1', '1', 'person_5.jpg', '2020-08-10 11:22:09'),
(27, 'Die Another Day', '40000', 'James Bond, Harry B', '1', '1', 'person_6.jpg', '2020-08-10 11:22:30'),
(28, 'BookSmart', '40000', 'Comedy movie', '2', '2', 'img_4.jpg', '2020-08-11 09:09:32'),
(29, 'Once Upon a Time', '40000', 'Movie to watch', '2', '2', 'person_3.jpg', '2020-08-11 09:11:09'),
(30, 'Jumanji', '40000', 'Dwanyne Johnson, Jake Kasdan', '3', '3', 'person_4.jpg', '2020-08-11 09:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcategory` varchar(20) NOT NULL,
  `subcat_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `subcategory`, `subcat_date`) VALUES
(1, 'Comic Action', '2020-08-09 00:52:06'),
(2, 'Comedy Drama', '2020-08-11 07:57:47'),
(3, 'Adventure Drama', '2020-08-11 08:00:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `film_order`
--
ALTER TABLE `film_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `film_table`
--
ALTER TABLE `film_table`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `film_order`
--
ALTER TABLE `film_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `film_table`
--
ALTER TABLE `film_table`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film_order`
--
ALTER TABLE `film_order`
  ADD CONSTRAINT `film_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_order_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `film_table` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
