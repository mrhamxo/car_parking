-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 09:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `park`
--

-- --------------------------------------------------------

--
-- Table structure for table `park_slot`
--

CREATE TABLE `park_slot` (
  `slot_id` int(100) NOT NULL,
  `slot_name` varchar(50) NOT NULL,
  `slot_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `park_slot`
--

INSERT INTO `park_slot` (`slot_id`, `slot_name`, `slot_status`) VALUES
(17, 'B2', 'active'),
(18, 'uet1', 'inactive'),
(19, 'amir park', 'inactive'),
(20, 'UOP', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `VehicleCat`, `CreationDate`) VALUES
(1, 'Four Wheeler Vehicle', '2022-05-01 11:06:50'),
(2, 'Two Wheeler Vehicle', '2022-03-02 11:07:09'),
(4, 'Bicycles', '2022-05-03 11:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblregusers`
--

CREATE TABLE `tblregusers` (
  `ID` int(5) NOT NULL,
  `FirstName` varchar(250) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblregusers`
--

INSERT INTO `tblregusers` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(2, 'Anuj', 'Kumar', 1234567890, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-05-10 18:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

CREATE TABLE `tblvehicle` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(1, '521796069', 'Two Wheeler Category', 'Hyundai', 'DEL-678787', 'Rakesh Chandra', 7987987987, '2022-05-09 05:58:38', '2022-05-09 11:38:04', '50 Rs', 'NA', 'Out'),
(2, '469052796', 'Two Wheeler Vehicle', 'Activa', 'DEL-895623', 'Pankaj', 8989898989, '2022-05-06 08:58:38', '2022-05-07 11:09:33', '35 Rs.', 'NA', 'Out'),
(3, '734465023', 'Four Wheeler Vehicle', 'Hondacity', 'DEL-562389', 'Avinash', 7845123697, '2022-05-06 08:58:38', '2022-05-06 08:59:36', '50 Rs.', 'Vehicle Out', 'Out'),
(4, '432190880', 'Two Wheeler Vehicle', 'Hero Honda', 'DEL-451236', 'Harish', 1234567890, '2022-05-06 08:58:38', '2022-05-10 18:07:00', '35 Rs.', 'Vehicle Out', 'Out'),
(7, '917725207', 'Two Wheeler Vehicle', 'Honda', 'DL 1c RT2323', 'ABC', 1234567890, '2022-05-07 11:03:05', '2022-05-09 04:43:55', '50', 'ljlkjlk', 'Out'),
(9, '118754736', 'Four Wheeler Vehicle', 'Honda', 'BMW-12345', 'Hamza Khattak', 3737373838, '2023-04-07 05:47:37', '2023-04-07 05:50:35', '30', 'Null', 'Out'),
(10, '355233399', 'Two Wheeler Vehicle', 'CD', '1233-BD', 'Sharif', 3737374821, '2023-04-07 05:48:33', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `user_type`, `password`) VALUES
(1, 'Aimal', 'Aimalkhan123@gmail.com', 'admin', 'admin'),
(2, 'Samad', 'Samadkhan123@gmail.com', 'user', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_car`
--

CREATE TABLE `user_car` (
  `id` int(11) NOT NULL,
  `parking_address` varchar(50) NOT NULL,
  `parking_slots` int(50) NOT NULL,
  `parking_area` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `action` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_car`
--

INSERT INTO `user_car` (`id`, `parking_address`, `parking_slots`, `parking_area`, `status`, `action`) VALUES
(65, 'uet park', 18, 'civil department', 0, '0'),
(66, 'islmia park', 17, 'ahmad faraz block', 1, '0'),
(67, 'Peshawar university park', 20, 'geological department', 1, '0'),
(68, 'madina market', 19, 'back side park area', 1, '0'),
(69, 'amir park', 20, 'main gate', 1, '0'),
(70, 'sldkfgj1', 17, 'erkgj', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `park_slot`
--
ALTER TABLE `park_slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VehicleCat` (`VehicleCat`);

--
-- Indexes for table `tblregusers`
--
ALTER TABLE `tblregusers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MobileNumber` (`MobileNumber`);

--
-- Indexes for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_car`
--
ALTER TABLE `user_car`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `park_slot`
--
ALTER TABLE `park_slot`
  MODIFY `slot_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblregusers`
--
ALTER TABLE `tblregusers`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_car`
--
ALTER TABLE `user_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
