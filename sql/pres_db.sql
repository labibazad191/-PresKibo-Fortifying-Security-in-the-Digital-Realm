-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 07:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pres_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `app_time` varchar(30) NOT NULL,
  `app_date` varchar(30) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `msg` varchar(60) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `dob` varchar(10) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `ID` int(11) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `department`) VALUES
(1, 'Cardiology'),
(2, 'Gastrology'),
(3, 'Neurology'),
(4, 'Dentist'),
(5, 'Gynocology'),
(6, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(10) NOT NULL,
  `Full_Name` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `DOB` varchar(10) DEFAULT NULL,
  `Email` varchar(20) NOT NULL,
  `Department` varchar(30) DEFAULT NULL,
  `Designation` varchar(30) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `Full_Name`, `Password`, `DOB`, `Email`, `Department`, `Designation`, `Gender`, `Phone`, `username`, `created_at`) VALUES
(12, 'Labib Azad', '12345', NULL, 'labib_azad@gmail.com', NULL, NULL, NULL, '01780898491', 'labibazad', '2023-11-21 19:28:50'),
(13, 'Md.Rashedul Islam Uzzal ', '12345', NULL, 'muzzal191217@bscse.u', NULL, NULL, NULL, '01777700001', 'rashed', '2023-11-21 19:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Generic` varchar(30) NOT NULL,
  `Details` varchar(60) NOT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `Name`, `Generic`, `Details`, `company`) VALUES
(4, 'Napa', 'Paracetemol', 'Test Medicine', 'Beximco'),
(6, 'Seclo 500mg', 'Omeprazole', 'This is Demo Medicine to test', 'Square'),
(11, 'Flexi®', 'Aceclofenac', 'Osteoarthritis, rheumatoid arthritis and ankylosing spondyli', 'https://www.squarepharma.com.bd/index.php'),
(12, 'Camlosart™', 'Amlodipine + Olmesartan Medoxo', 'The usual starting dose is one tablet (5/20 mg) once daily. ', 'https://www.squarepharma.com.bd/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `patient_ID` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `age` varchar(30) NOT NULL,
  `comment` varchar(60) NOT NULL,
  `doctor_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `fullname`, `email`, `phone`, `dob`, `patient_ID`, `gender`, `age`, `comment`, `doctor_name`) VALUES
(5, 'Rownak', 'rownak@gmail.com', '15154515', '10/1/2000', '4F1CS0FE', 'Female', '22', 'Hello', 'Labib Azad'),
(6, 'Picchi', 'picchi@gmail.com', '01780808091', '12/12/12', '6I5XTW5I', 'Female', '10', 'Hello Dear Doctor, I need help right now can you fix a meeti', 'Labib Azad'),
(7, 'Rodela', 'rodela@gmail.com', '01712851818', '12/12/12', '7RLCGPRD', 'Female', '10', 'hello!!', 'Labib Azad');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `patient_age` varchar(30) NOT NULL,
  `patient_dob` varchar(30) NOT NULL,
  `Doctor_name` varchar(30) NOT NULL,
  `medicine_name` varchar(30) NOT NULL,
  `dose` varchar(30) NOT NULL,
  `strength` varchar(30) NOT NULL,
  `advice` varchar(30) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_name`, `patient_id`, `patient_age`, `patient_dob`, `Doctor_name`, `medicine_name`, `dose`, `strength`, `advice`, `duration`) VALUES
(1, 'Pushpa', '4sf5sdf', '12', '10/12/2000', 'Labib Azad', 'Seclo 500mg', '1/1/1', '', 'before meal', '7days'),
(2, 'Pushpa', '4sf5sdf', '12', '10/12/2000', 'Labib Azad', 'Flexi®', '1', '1', '1', '1'),
(3, 'Rodela', '7RLCGPRD', '10', '12/12/12', 'Labib Azad', 'Flexi®', '1', '1', '1', '1day');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
