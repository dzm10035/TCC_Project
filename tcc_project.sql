-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 06:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(10) NOT NULL,
  `account_username` varchar(20) NOT NULL,
  `account_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_username`, `account_password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_status` varchar(20) NOT NULL,
  `prod_quan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_description`, `prod_status`, `prod_quan`) VALUES
(1, 'Quantum Notebook', 'A futuristic notebook that can capture thoughts directly from your mind.', 'active', 3),
(2, 'HoloProjector', 'A portable device that projects holograms in 3D, perfect for presentations.', 'inactive', 25),
(3, 'Smart Water Bottle', 'A bottle that tracks your hydration levels and reminds you to drink.', 'active', 30),
(4, 'Virtual Reality Headset', 'Experience immersive virtual worlds with this cutting-edge headset.', 'active', 15),
(5, 'Eco-Friendly Phone Case', 'A sustainable phone case made from recycled materials.', 'active', 100),
(6, 'Mood Ring 2.0', 'An updated version of the classic mood ring with advanced mood tracking technology.', 'inactive', 0),
(7, 'AI Personal Assistant', 'A compact device that helps you manage your daily tasks and schedules.', 'active', 10),
(8, 'Gaming Console X', 'The latest gaming console that offers stunning graphics and an extensive game library.', 'active', 20),
(9, 'Solar-Powered Backpack', 'A backpack equipped with solar panels to charge your devices on the go.', 'active', 35),
(10, 'Liew Zhao Lun', '6 years old Bastard', 'inactive', 0),
(11, 'Ding Zhen Man', 'A very loyal dog - Border Collie. Buy before sold out!!', 'active', 999999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
