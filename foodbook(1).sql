-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 10:04 AM
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
-- Database: `foodbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipeID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `recipe_title` text NOT NULL,
  `recipe_ingredients` text NOT NULL,
  `recipe_instructions` text NOT NULL,
  `recipe_category` varchar(255) NOT NULL,
  `recipe_date` text NOT NULL,
  `recipe_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipeID`, `userID`, `recipe_title`, `recipe_ingredients`, `recipe_instructions`, `recipe_category`, `recipe_date`, `recipe_image`) VALUES
(1, 1, 'asdasdasdasd', 'asdasdasdasdasdasd', 'asdasdadasdasda', 'Vegetables Chicken        ', '21_05_28 06:41:56', 'http://127.0.0.1/FoodBookCI3/uploads/memes-armored-trooper-votoms-21.png'),
(2, 1, 'asdas', 'asdasdasd', 'fdgdfgdfgd', 'Vegetables Chicken Pork  ', '21_05_27 10:15:56', 'http://127.0.0.1/FoodBookCI3/uploads/mom2.png'),
(4, 1, 'dfgdfgdf', 'dfgdfgdfgdf', 'dgdfgdfgdfg', '  Beef   Broth', '21_05_28 05:09:53', 'http://127.0.0.1/FoodBookCI3/uploads/56359373_904651323062695_404259647797592064_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Mi` varchar(3) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `Fname`, `Mi`, `Lname`, `date_created`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 'a', 'admin', '2021-05-23 02:31:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
