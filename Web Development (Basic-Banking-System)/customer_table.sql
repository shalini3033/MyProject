-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 04:22 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(264) NOT NULL,
  `current_balance` int(5) NOT NULL,
  `latest_balance` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`id`, `name`, `email`, `current_balance`, `latest_balance`) VALUES
(1, 'John', 'john12@email.com', 190, 30),
(2, 'Mike', 'mike230@email.com', 200, 0),
(3, 'Plank', 'plaoto_nk984@email.com', 850, 0),
(4, 'Chin', 'chinxyz@emp.com', 500, 270),
(5, 'Paul', 'dpaul_lime44@email.com', 850, 970),
(6, 'Dev', 'Dev252@email.com', 600, 0),
(7, 'Reema', 'reema@email.com', 580, 0),
(8, 'Amit', 'amit82@email.com', 400, 0),
(9, 'Harry', 'harry978@email.com', 900, 0),
(10, 'Payal', 'payal070@email.com', 350, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
