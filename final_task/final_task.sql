-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 07:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `material_type`
--

CREATE TABLE `material_type` (
  `id` int(11) NOT NULL,
  `material_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_type`
--

INSERT INTO `material_type` (`id`, `material_type`) VALUES
(61, 'Cotton'),
(62, 'Fabric'),
(63, 'Polyster');

-- --------------------------------------------------------

--
-- Table structure for table `partorcrown`
--

CREATE TABLE `partorcrown` (
  `id` int(11) NOT NULL,
  `partorcrown` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partorcrown`
--

INSERT INTO `partorcrown` (`id`, `partorcrown`) VALUES
(6, 'right'),
(7, 'left');

-- --------------------------------------------------------

--
-- Table structure for table `part_side`
--

CREATE TABLE `part_side` (
  `id` int(11) NOT NULL,
  `part_side` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_side`
--

INSERT INTO `part_side` (`id`, `part_side`) VALUES
(102, 'left'),
(103, 'right');

-- --------------------------------------------------------

--
-- Table structure for table `step1`
--

CREATE TABLE `step1` (
  `id` int(11) NOT NULL,
  `part_side` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `partorcrown` varchar(255) NOT NULL,
  `material_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `step1`
--

INSERT INTO `step1` (`id`, `part_side`, `volume`, `partorcrown`, `material_type`) VALUES
(1, 'left', '1.5', 'right', 'Polyster');

-- --------------------------------------------------------

--
-- Table structure for table `step10`
--

CREATE TABLE `step10` (
  `id` int(11) NOT NULL,
  `front` varchar(255) NOT NULL,
  `top` varchar(255) NOT NULL,
  `left_temp` varchar(255) NOT NULL,
  `right_temp` varchar(255) NOT NULL,
  `left_side` varchar(255) NOT NULL,
  `right_side` varchar(255) NOT NULL,
  `crown` varchar(255) NOT NULL,
  `back` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `step10`
--

INSERT INTO `step10` (`id`, `front`, `top`, `left_temp`, `right_temp`, `left_side`, `right_side`, `crown`, `back`) VALUES
(1, '440', '550', '550', '231', '132', '321', '231', '123');

-- --------------------------------------------------------

--
-- Table structure for table `volume`
--

CREATE TABLE `volume` (
  `id` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volume`
--

INSERT INTO `volume` (`id`, `volume`) VALUES
(10, '1.5'),
(11, '2.5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material_type`
--
ALTER TABLE `material_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partorcrown`
--
ALTER TABLE `partorcrown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_side`
--
ALTER TABLE `part_side`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step1`
--
ALTER TABLE `step1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step10`
--
ALTER TABLE `step10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volume`
--
ALTER TABLE `volume`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material_type`
--
ALTER TABLE `material_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `partorcrown`
--
ALTER TABLE `partorcrown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `part_side`
--
ALTER TABLE `part_side`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `step1`
--
ALTER TABLE `step1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `step10`
--
ALTER TABLE `step10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `volume`
--
ALTER TABLE `volume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
