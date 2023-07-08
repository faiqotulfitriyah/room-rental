-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 02:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roomrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(10) NOT NULL,
  `today_date` date NOT NULL,
  `room_id` char(10) NOT NULL,
  `tenant_id` char(15) NOT NULL,
  `book_start_date` date NOT NULL,
  `book_end_date` date NOT NULL,
  `book_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `today_date`, `room_id`, `tenant_id`, `book_start_date`, `book_end_date`, `book_status`) VALUES
(1, '2022-01-01', 'M01', 'T06', '2022-03-01', '2022-04-01', 'Paid'),
(2, '2022-02-25', 'W01', 'T03', '2022-04-01', '2022-06-01', 'Paid'),
(3, '2022-01-03', 'M05', 'T07', '2022-05-01', '2022-06-01', 'Paid'),
(4, '2022-01-27', 'W05', 'T08', '2022-03-01', '2022-06-01', 'Paid'),
(5, '2022-01-25', 'M07', 'T04', '2022-08-01', '2022-10-01', 'Paid'),
(6, '2022-01-16', 'W06', 'T09', '2022-01-01', '2022-02-01', 'Paid'),
(7, '2022-01-15', 'W04', 'T01', '2022-03-01', '2022-04-01', 'Paid'),
(8, '2022-02-02', 'M02', 'T06', '2022-04-01', '2022-06-01', 'Paid'),
(9, '2022-02-17', 'M07', 'T06', '2022-04-01', '2022-07-01', 'Paid'),
(12, '2022-03-05', 'W09', 'T09', '2022-07-01', '2022-08-01', 'Unpaid'),
(13, '2022-04-13', 'W02', 'T01', '2022-05-01', '2022-06-01', 'Unpaid'),
(14, '2022-04-17', 'W08', 'T09', '2022-05-01', '2022-07-01', 'Unpaid'),
(15, '2022-06-01', 'M01', 'T06', '2022-07-01', '2022-08-01', 'Unpaid'),
(16, '2022-06-17', 'M03', 'T10', '2022-07-01', '2022-08-01', 'Unpaid'),
(17, '2022-05-13', 'M02', 'T04', '2022-06-01', '2022-09-01', 'Unpaid'),
(18, '2022-05-14', 'M10', 'T04', '2022-09-01', '2022-10-01', 'Unpaid'),
(19, '2022-07-18', 'W07', 'T01', '2022-08-01', '2022-09-01', 'Unpaid'),
(20, '2022-06-26', 'M08', 'T10', '2022-07-01', '2022-09-01', 'Unpaid'),
(21, '2022-06-01', 'W07', 'T03', '2022-11-01', '2022-12-01', 'Unpaid'),
(22, '2022-06-03', 'M06', 'T02', '2022-07-01', '2022-08-01', 'Unpaid'),
(23, '2022-08-01', 'M01', 'T06', '2022-09-01', '2022-11-01', 'Unpaid'),
(24, '2023-07-01', 'W03', 'T08', '2022-08-01', '2022-09-01', 'Unpaid'),
(25, '2022-05-01', 'M01', 'T06', '2022-05-01', '2022-06-01', 'Unpaid'),
(26, '2022-04-01', 'W03', 'T09', '2022-06-01', '2022-07-01', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `book_id` int(11) NOT NULL,
  `fine_id` int(11) NOT NULL,
  `property` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`book_id`, `fine_id`, `property`, `price`) VALUES
(4, 1, 'Trash can', 25000),
(7, 2, 'Pillow', 100000),
(6, 3, 'Light bulb', 30000),
(1, 4, 'Cabinet', 150000),
(5, 5, 'Mattress', 500000),
(3, 6, 'Chair', 150000),
(2, 7, 'Trash can', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('skyblue', '$2y$04$A0LNOaed0FugPdDW5s8EIOQDwuzPD8Jtecd17tPIcecc6u2eXgb1e'),
('skyblue2', '$2y$04$6onyblUIqcZEKBRVujqa3eaJaPcLiAxpXL2o/9Tb7aRPb7UU4mJoq'),
('skyblue3', '$2y$04$F3T9fhZP4xkvCQlpz4RRVua7sDAzQprv6vVr5xkxXcZzqV5ZpE9X2'),
('fiqa', '$2y$04$2fEgD6LiucngJSr40Ae5T.QMP/DV2RaEWBF.pD0tZdjGdcLaLEUc2'),
('sila', '$2y$04$fJND5IptFbi233lZc2Cl0OXR.pHXJWHlaZA86Mj8jT0LliEpuyCPW');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`) VALUES
(1, 'Bed'),
(2, 'Mattress'),
(3, 'Pillow'),
(4, 'Light bulb'),
(5, 'Desk'),
(6, 'Chair'),
(7, 'Cabinet'),
(8, 'Air conditioner'),
(9, 'Trash can'),
(10, 'Window');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` char(10) NOT NULL,
  `room_label` varchar(30) NOT NULL,
  `room_location` varchar(30) NOT NULL,
  `room_gender` varchar(20) NOT NULL,
  `room_window` varchar(100) NOT NULL,
  `room_monthly_price` varchar(50) NOT NULL,
  `room_availability` varchar(50) NOT NULL,
  `room_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_label`, `room_location`, `room_gender`, `room_window`, `room_monthly_price`, `room_availability`, `room_description`) VALUES
('M01', 'Blue-01', '1st floor', 'Men', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M02', 'Blue-02', '1st floor', 'Men', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M03', 'Blue-03', '1st floor', 'Men', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M04', 'Blue-04', '1st floor', 'Men', 'Garden', 'Rp1.000.000', 'Available', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M05', 'Blue-05', '1st floor', 'Men', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M06', 'Blue-06', '2nd floor', 'Men', 'Swimming Pool', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M07', 'Blue-07', '2nd floor', 'Men', 'Swimming Pool', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M08', 'Blue-08', '2nd floor', 'Men', 'Swimming Pool', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M09', 'Blue-09', '2nd floor', 'Men', 'Swimming Pool', 'Rp1.000.000', 'Available', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('M10', 'Blue-10', '2nd floor', 'Men', 'Swimming Pool', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W01', 'Red-01', '1st floor', 'Women', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W02', 'Red-02', '1st floor', 'Women', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W03', 'Red-03', '1st floor', 'Women', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W04', 'Red-04', '1st floor', 'Women', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W05', 'Red-05', '1st floor', 'Women', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W06', 'Red-06', '2nd floor', 'Women', 'Swimming Pool', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W07', 'Red-07', '2nd floor', 'Women', 'Swimming Pool', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W08', 'Red-08', '2nd floor', 'Women', 'Swimming Pool', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W09', 'Red-09', '2nd floor', 'Women', 'Swimming Pool', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.'),
('W10', 'Red-10', '2nd floor', 'Women', 'Garden', 'Rp1.000.000', 'Occupied', 'Equipped with the most up-to-date amenities, free high-speed Wi-Fi, smart LED TVs, a work desk, bathrooms with shower and bathtub.');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` char(15) NOT NULL,
  `tenant_name` varchar(50) NOT NULL,
  `tenant_address` varchar(255) NOT NULL,
  `tenant_ktp_no` varchar(16) NOT NULL,
  `tenant_phone` varchar(20) NOT NULL,
  `tenant_email` varchar(50) NOT NULL,
  `tenant_emergcp` varchar(50) NOT NULL,
  `tenant_emergcp_phone` varchar(20) NOT NULL,
  `tenant_emergcp_email` varchar(50) NOT NULL,
  `tenant_bankaccount` varchar(50) NOT NULL,
  `tenant_bankaccount_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `tenant_name`, `tenant_address`, `tenant_ktp_no`, `tenant_phone`, `tenant_email`, `tenant_emergcp`, `tenant_emergcp_phone`, `tenant_emergcp_email`, `tenant_bankaccount`, `tenant_bankaccount_no`) VALUES
('T01', 'Taylor Swift ', '21 Brooklands Avenue, Sidcup', '550731391 ', '+19159969739', 'taylor@gmail.com', 'Andrea Swift', '+19159953937', 'swift@gmail.com', 'BCA', '5221375558'),
('T02', 'Harry Styles ', '14 Brook Street, Flimby', '540751373', '+18959879737', 'harry@yahoo.com', 'Gemma Styles', '+18976871726', 'styles@hotmail.com', 'BCA', '5229997873'),
('T03', 'Elizabeth Olsen ', '74 Hill Top Road, Whitehaven', '527751156 ', '+14148929343', 'lizzie@gmail.com', 'James Mcavoy', '+14158980343', 'james@gmail.com', 'BRI', '034101000743'),
('T04', 'James Mcavoy', '24 Church Street, Maryport', '725751651', '+17864206154', 'jamie@gmail.com', 'Michael Fassbender', '+17864206154', 'fassbender@gmail.com', 'BCA', '5224327875'),
('T05', 'Sophie Turner ', '47 Nayland Road, Mile End', '775521156 ', '+14158980356', 'sophiet@gmail.com', 'Nick Jonas', '+14158980489', 'nick@hotmail.com', 'CIMB', '034101999789'),
('T06', 'Alex Turner ', '9 New Mount Close, Littleover', '400374545 ', '+12025550131', 'alex@yahoo.com', 'Jamie Turner ', '+12025550172', 'jamie@gmail.com', 'BCA', '5220556728'),
('T07', 'Kevin Hart ', '8 Ennerdale Walk, Derby', '483118053 ', '+12025550129', 'kevhart@gmail.com', 'Nancy Hart', '+12025670348', 'nancy@gmail.com', 'BNI ', '0178305704'),
('T08', 'Niki Zefanya ', '6 Green Mount, Sidmouth', '428194341 ', '+12025550131', 'niki@hotmail.com', 'James Wu ', '+12020890132', 'jameswu@gmail.com', 'BCA', '5221568782'),
('T09', 'Raisa Andriani ', '36 Withy Close, Tiverton', '530614750 ', '+4048329358', 'raisa@yahoo.com', 'Hamish Daud ', '+4048329678', 'hdaud@gmail.com', 'BRI', '5224568882'),
('T10', 'Oscar Isaac', '21 Front Street, Portesham', '122225687 ', '+12025550131', 'isaac@gmail.com', 'Marc Spector ', '+12023879131', 'marc@hotmail.com', 'BCA', '6560775498');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fine_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `fine_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
