-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 04:08 AM
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
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `pid` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `flight_num` varchar(50) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`pid`, `flight_id`, `flight_num`, `origin`, `destination`, `time`) VALUES
(1, 1, 'FR120', 'Madrid Barajas', 'Vienna Int.', '12:00:00'),
(2, 2, 'MR650', 'Malaga Aeroport', 'Madrid Barajas', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `pid` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `options` text NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`pid`, `hotel_id`, `name`, `rating`, `location`, `options`, `website`) VALUES
(1, 1, 'Continental', 4, 'Linzer Strasse 68, 2721', 'Breakfast,\r\nPrivate bathroom,\r\nAir Conditioning,\r\nFree Wifi', 'https://Hotel.com'),
(2, 2, 'The Westin Palace', 4, 'Pl. de las Cortes, 7, 28014 Madrid', 'Breakfast,\r\nPrivate bathroom,\r\nAir Conditioning', 'https://Hotel.com');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pack_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pack_id`, `name`, `description`, `image`, `start_date`, `end_date`, `price`) VALUES
(1, '3 days in Vienna', 'Explore Vienna\'s stunning landmarks, indulge in traditional cuisine, and experience the vibrant arts scene on this 3-day trip. Comfortable accommodations and expert guides make it the perfect introduction to this enchanting city.', '/uploads/1683766310_cbc04117516e3b3d555d.jpg', '2023-05-01', '2023-05-04', 399),
(2, '1 Day in Madrid', 'Experience the highlights of Madrid in just one day. Explore iconic landmarks, admire world-class art, and indulge in delicious tapas. Discover the vibrant energy of the Spanish capital on this unforgettable day trip.', '/uploads/1683766331_30eba089e1443a5a57c3.jpg', '2023-05-11', '2023-05-12', 79);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tour_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `day1` varchar(50) NOT NULL,
  `day2` varchar(50) NOT NULL,
  `day3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `pid`, `day1`, `day2`, `day3`) VALUES
(1, 1, 'Schönbrunn Palace', 'St. Stephen\'s Cathedral', 'No Plans'),
(2, 2, 'Santiago Bernabeu', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` tinyint(4) DEFAULT 0,
  `phone` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `phone`, `birthday`, `gender`, `address`) VALUES
(1, 'Aziz Mohamadi', 'ahmad@gmail.com', '$2y$10$ISbazb5VGF0vMf4e1LOvzeOVn0YG1eTtvV1pS4IubiKdjRTnpPohi', 2, '9362200928', '2000-06-06', 'Male', 'Campus Las Lagunillas, 23071, Jaén, Spain'),
(2, 'Aziz', 'aziz@gmail.com', '$2y$10$/chujcwG2maMK0XVa5doB.UdkPOub/UqSAeA/77X8ykk3UWMg.s2.', 1, '9632000798', '2001-05-09', 'Male', 'Jaen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `pack_flight_fk` (`pid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `pack_hotel_fk` (`pid`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `pack_tour_fk` (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `pack_flight_fk` FOREIGN KEY (`pid`) REFERENCES `packages` (`pack_id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `pack_hotel_fk` FOREIGN KEY (`pid`) REFERENCES `packages` (`pack_id`);

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `pack_tour_fk` FOREIGN KEY (`pid`) REFERENCES `packages` (`pack_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
