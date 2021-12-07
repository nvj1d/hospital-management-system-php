-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 10:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hopital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(3, 'root', 'alpha1', 'EmtJCAOXIAMkpCd.jpg'),
(10, 'admin', 'letmein', 'Screenshot-2019-01-23-00.20.04-1024x639.png');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `appointment_date` varchar(100) NOT NULL,
  `symptoms` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_booked` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `firstname`, `lastname`, `gender`, `phone`, `appointment_date`, `symptoms`, `status`, `date_booked`) VALUES
(1, 'firstname', 'lastname', 'gender', 'phone', 'appointment_date', 'symptoms', 'status', 'date_booked'),
(2, 'David', 'Beckham\r\n	 						', 'male', '+1 215-414-8784', '2021-06-04', 'gha projet', 'discharge', '2021-06-11 15:57:15'),
(3, 'David', 'Beckham\r\n	 						', 'male', '+1 215-414-8784', '2021-07-21', 'gha projet22', 'discharge', '2021-06-19 01:30:37'),
(4, 'David', 'Beckham\r\n	 						', 'male', '+1 215-414-8784', '2021-06-05', 'gha projet228', 'pendding', '2021-06-19 17:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salaire` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `statut` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `lastname`, `username`, `email`, `gender`, `phone`, `pays`, `password`, `salaire`, `data`, `statut`, `profile`) VALUES
(1, 'David', 'Beckham', 'ahmed', 'najid99m@gmail.com', 'male', '212000000000', 'algerie', 'ahmed', '50', '2021-06-09 17:28:43', 'Approved', 'astronaut_on_the_moon_victory-wallpaper-1366x768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `date_discharge` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `patient`, `doctor`, `date_discharge`, `amount`, `description`) VALUES
(1, 'David', 'a', '2021-06-11 17:05:49', '1200', 'walo'),
(2, 'David', 'a', '2021-06-11 17:09:50', '1200', 'walo'),
(3, 'David', 'ahmed', '2021-06-19 01:37:32', '1200', 'testt'),
(4, 'David', 'ahmed', '2021-06-19 01:37:36', '1200', 'testt');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_reg` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `username`, `email`, `phone`, `gender`, `country`, `password`, `date_reg`, `profile`) VALUES
(1, 'David', 'Beckham', 'patient1', 'th3n1@aol.com', '+1 215-414-8784', 'male', 'tunisie', 'aaaa', '2021-06-10 21:42:26', '38471334_2002292106767146_2197887129328025600_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date_send` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `username`, `title`, `message`, `date_send`) VALUES
(2, '', 'hello', 'hello!!', '2021-06-11 00:45:17'),
(3, 'patient4', 'hello', 'hi doctor!', '2021-06-11 00:46:22'),
(4, 'patient4', 'hello', 'hi doctor!', '2021-06-11 00:50:42'),
(5, 'patient4', 'hello', 'hi doctor!', '2021-06-11 00:52:06'),
(6, 'patient4', 'hello', 'hi doctor!', '2021-06-11 00:52:32'),
(7, 'patient1', 'hello', 'holla!!', '2021-06-19 01:27:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
