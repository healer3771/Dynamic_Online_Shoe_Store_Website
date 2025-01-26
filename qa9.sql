-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Dec 02, 2023 at 02:29 AM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qa9`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Guitars'),
(2, 'Basses'),
(3, 'Drums');

-- --------------------------------------------------------

--
-- Table structure for table `foo`
--

CREATE TABLE IF NOT EXISTS `foo` (
  `id` int(11) NOT NULL,
  `gStr` varchar(10) DEFAULT NULL,
  `gInt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foo`
--

INSERT INTO `foo` (`id`, `gStr`, `gInt`) VALUES
(1, 'abx', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productCode` varchar(10) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `listPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `listPrice`) VALUES
(2, 1, 'les_paul', 'Gibson Les Paul', 1199.00),
(3, 1, 'sg', 'Gibson SG', 2517.00),
(4, 1, 'fg700s', 'Yamaha FG700S', 489.99),
(5, 1, 'washburn', 'Washburn D10S', 299.00),
(6, 1, 'rodriguez', 'Rodriguez Caballero 11', 415.00),
(7, 2, 'precision', 'Fender Precision', 799.99),
(8, 2, 'hofner', 'Hofner Icon', 499.99),
(9, 3, 'ludwig', 'Ludwig 5-piece Drum Set with Cymbals', 699.99),
(10, 3, 'tama', 'Tama 5-Piece Drum Set with Cymbals', 799.99),
(12, 1, 'nono3', 'jauman', 400.00);

-- --------------------------------------------------------

--
-- Table structure for table `shoeCategories`
--

CREATE TABLE IF NOT EXISTS `shoeCategories` (
`shoeCategoryID` int(11) NOT NULL,
  `shoeCategoryName` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shoeCategories`
--

INSERT INTO `shoeCategories` (`shoeCategoryID`, `shoeCategoryName`, `dateAdded`) VALUES
(1, 'Boots', '2023-10-18 13:47:56'),
(2, 'Sneakers', '2023-10-18 13:47:56'),
(3, 'Sandals', '2023-10-18 13:47:56'),
(4, 'Heels', '2023-10-18 13:47:56'),
(5, 'Flats', '2023-10-18 13:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `shoeManagers`
--

CREATE TABLE IF NOT EXISTS `shoeManagers` (
`shoeManagerID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shoeManagers`
--

INSERT INTO `shoeManagers` (`shoeManagerID`, `emailAddress`, `password`, `firstName`, `lastName`) VALUES
(1, 'john@example.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'John', 'Doe'),
(2, 'bob@example.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Bob', 'Smith'),
(3, 'sarah@example.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Sarah', 'Davis'),
(4, 'mike@example.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Mike', 'Wilson');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE IF NOT EXISTS `shoes` (
`shoeID` int(11) NOT NULL,
  `shoeCategoryID` int(11) NOT NULL,
  `shoeCode` varchar(10) NOT NULL,
  `shoeName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoeID`, `shoeCategoryID`, `shoeCode`, `shoeName`, `description`, `price`, `dateAdded`) VALUES
(1, 1, 'B001', 'Hiking Boots', 'Waterproof leather hiking boots', 129.99, '2023-10-18 13:47:56'),
(2, 1, 'B002', 'Chelsea Boots', 'Suede chelsea boots', 99.99, '2023-10-18 13:47:56'),
(3, 2, 'S001', 'Running Sneakers', 'Mesh running sneakers with foam cushioning', 89.99, '2023-10-18 13:47:56'),
(4, 2, 'S002', 'High Top Sneakers', 'Canvas high top sneakers', 69.99, '2023-10-18 13:47:56'),
(5, 3, 'SA01', 'Birkenstocks', 'Genuine leather Birkenstock sandals', 129.99, '2023-10-18 13:47:56'),
(6, 5, 'SA02', 'Adidas Running Shoes', 'High-performance Adidas running shoes', 89.99, '2023-10-20 18:45:19'),
(7, 2, 'SA03', 'Converse Chuck Taylor', 'Classic Converse Chuck Taylor sneakers', 59.99, '2023-10-20 18:45:19'),
(8, 5, 'SA04', 'Nike Air Max', 'Nike Air Max athletic shoes with air cushioning', 119.99, '2023-10-20 18:45:19'),
(9, 4, 'SA05', 'Vans Old Skool', 'Timeless Vans Old Skool skate shoes', 64.99, '2023-10-20 18:45:19'),
(11, 4, 'R002', 'Running Shoes', 'Lightweight and breathable running shoes', 79.99, '2023-11-03 16:54:37'),
(12, 2, 'S003', 'Classic Sneakers', 'Casual and comfortable sneakers', 49.99, '2023-11-03 16:54:37'),
(13, 4, 'H004', 'High Heels', 'Elegant high heels for special occasions', 89.99, '2023-11-03 16:54:37'),
(14, 3, 'F005', 'Beach Flip-Flops', 'Colorful and lightweight flip-flops', 19.99, '2023-11-03 16:54:37'),
(15, 5, 'B006', 'Basketball Shoes', 'High-top basketball shoes for maximum support', 99.99, '2023-11-03 16:54:37'),
(16, 3, 'S007', 'Strappy Sandals', 'Stylish and comfortable summer sandals', 69.99, '2023-11-03 16:54:37'),
(17, 1, 'D008', 'Mens Dress Shoes', 'Formal leather dress shoes for men', 79.99, '2023-11-03 16:54:37'),
(44, 1, 'SB009', 'Snow Boots', 'Insulated snow boots for cold winter days	', 59.00, '2023-11-03 23:42:11'),
(45, 5, 'SK011', 'Skate Shoes', 'Durable skateboarding shoes with grippy soles', 120.00, '2023-11-03 23:46:45'),
(79, 1, 'WE2W', 'Hiking Boots', 'Waterproof leather hiking boots', 129.00, '2023-11-28 22:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `credits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `lastname`, `address`, `state`, `gpa`, `credits`) VALUES
(1, 'Frodo', 'Baggins', '9 Tolkien Lane', 'NJ', 3.85, 97),
(2, 'Frodo', 'Baggins', '9 Tolkien Lane', 'NJ', 3.7, 98),
(3, 'Frodo', 'Baggins', '9 Tolkien Lane', 'NJ', 3.84, 30),
(4, 'Frodo', 'Baggins', '9 Tolkien Lane', 'NJ', 2.7, 32),
(5, 'Ram', 'Verma', '9 Tolkien Lane', 'NJ', 3.69, 33),
(6, 'Todd', 'Davis', '23 High street', 'WV', 1.7, 64),
(7, 'Alejando', 'Rose', '78 Love street', 'WV', 2.69, 65),
(8, 'Eddie', 'Austin', '4 Inverness Drive', 'CA', 1, 96),
(9, 'Darrne', 'Baggins', '23 High street', 'WV', 1.69, 20),
(10, 'Nadine', 'Norman', '6 4th street', 'TX', 0.7, 25),
(11, 'Ella', 'Morris', '66 Sherwood street', 'TX', 3.7, 15),
(12, 'Rosie', 'Walton', '55 Victoria Avenue', 'TX', 2.8, 99),
(13, 'Nancy', 'Ramsey', '69 Kingdom Drive', 'TX', 3.89, 69),
(14, 'Martin', 'Berry', '23 High street', 'WV', 3.69, 85),
(15, 'Alejandro', 'Rose', '69 Kingdom Drive', 'TX', 0.6, 92),
(16, 'Ella', 'Jones', '6 4th street', 'TX', 0.92, 66),
(17, 'Walton', 'James', '9 Howard road', 'TX', 3.3, 37),
(18, 'Norman', 'Baggins', '51, Inverness Street', 'WV', 1.75, 45),
(19, 'Martin', 'Berry', '55 Victoria Avenue', 'TX', 3.95, 64),
(20, 'Heidi', 'Gutierrez', '9 Howard road', 'TX', 1, 50),
(21, 'Lela', 'Carig', '57 WestLinda Drive', 'MA', 3.86, 78),
(22, 'Irvin', 'Newan', '17 Fordhuam revere', 'WI', 0.92, 88),
(23, 'Davis', 'Baggins', '961 Vine street', 'CA', 2.7, 31),
(24, 'Shelly', 'Mitchell', '40 Talbot street', 'GA', 2.69, 72),
(25, 'Jorge', 'Baggins', '13 Oak street', 'NJ', 3.7, 89),
(26, 'Marina', 'Hansen', '9 Tolkien Lane', 'PA', 2.8, 55);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `foo`
--
ALTER TABLE `foo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`productID`), ADD UNIQUE KEY `productCode` (`productCode`);

--
-- Indexes for table `shoeCategories`
--
ALTER TABLE `shoeCategories`
 ADD PRIMARY KEY (`shoeCategoryID`);

--
-- Indexes for table `shoeManagers`
--
ALTER TABLE `shoeManagers`
 ADD PRIMARY KEY (`shoeManagerID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
 ADD PRIMARY KEY (`shoeID`), ADD UNIQUE KEY `shoeCode` (`shoeCode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `shoeCategories`
--
ALTER TABLE `shoeCategories`
MODIFY `shoeCategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shoeManagers`
--
ALTER TABLE `shoeManagers`
MODIFY `shoeManagerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
MODIFY `shoeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
