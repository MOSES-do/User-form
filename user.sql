-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 05:15 PM
-- Server version: 8.0.21
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `semester`, `password`) VALUES
(1, 'Genius_coder', 'gcoder@gmail.com', '3rd', 'nnnnnnnn'),
(2, 'Ace77', 'gcoder@gmail.com', '2nd', 'nnnnnnnn'),
(3, 'Genius_coder', 'bcode@gmail.com', '3rd', 'oooooooo'),
(4, 'Genius_coder', 'gcoder@gmail.com', '2nd', 'nnnnnnnn'),
(5, 'Genius_coder', 'shirleen@coderscamp.co.za', '3rd', '12345678'),
(6, 'Asbury101', 'abs@abs.com', '5th', '12345678'),
(7, 'mace', 'mace@gmail.com', '2nd', '11111111'),
(8, 'Ace', 'bcode@gmail.com', '4th', '12345678'),
(9, 'Ace', 'bcode@gmail.com', '3rd', 'pppppppp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
