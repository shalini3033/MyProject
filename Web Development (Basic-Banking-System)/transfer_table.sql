-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 04:24 PM
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
-- Table structure for table `transfer_table`
--

CREATE TABLE `transfer_table` (
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `sender_bal` int(100) NOT NULL,
  `receiver_bal` int(100) NOT NULL,
  `amount_transfer` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_table`
--

INSERT INTO `transfer_table` (`sender`, `receiver`, `sender_bal`, `receiver_bal`, `amount_transfer`) VALUES
('John', 'Mike', 310, 100, 100),
('John', 'Chin', 210, 380, 20),
('Paul', 'Chin', 950, 400, 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
