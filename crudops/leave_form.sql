-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 11:52 AM
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
-- Database: `leave_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajax`
--

CREATE TABLE `ajax` (
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Leave_type` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ajax`
--

INSERT INTO `ajax` (`Name`, `Age`, `City`, `Leave_type`, `Department`, `Date`) VALUES
('Durga', 22, 'kpm', 'sick, personal', 'Development', 2023),
('durga', 33, 'dff', 'sick, personal', 'Development', 2023),
('durga', 222, 'fdf', 'sick', 'Development', 2023),
('dsff', 343, 'dffs', 'sick, personal', 'QA', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `ajax_table`
--

CREATE TABLE `ajax_table` (
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Emp_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ajax_table`
--

INSERT INTO `ajax_table` (`First_Name`, `Last_Name`, `Emp_Id`) VALUES
('', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_table`
--

CREATE TABLE `leave_table` (
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Emp_Id` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Type_of_Absence` varchar(255) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `Absence_From` date NOT NULL,
  `Absence_Through` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leave_table`
--

INSERT INTO `leave_table` (`First_Name`, `Last_Name`, `Emp_Id`, `Department`, `Date`, `Type_of_Absence`, `Reason`, `Absence_From`, `Absence_Through`) VALUES
('dfsdf', 'add', 0, 'Development', '2023-08-29', 'sick,personal', ' sdfsf', '2023-09-14', '2023-09-29'),
('Durga', 'Jesin', 2, 'Development', '2023-09-12', 'sick,personal', ' sdfdsf', '2023-09-05', '2023-09-30'),
('Selvam', 'A', 3, 'Development', '2023-09-13', 'sick,personal', ' sjfksjfsfksf', '2023-09-06', '2023-09-28'),
('Devi', 'S', 7, 'QA', '2023-09-05', 'sick,personal', ' sfsfsdfsfsf', '2023-09-21', '2023-10-03'),
('Mahi', 'S', 8, 'Development', '2023-09-04', 'sick,personal', ' sdfkjsdlfjsf', '2023-09-06', '2023-09-28'),
('aaa', 'aaa', 33, 'Development', '2023-09-04', 'personal', ' sffsf', '2023-09-13', '2023-10-03'),
('sfs', 'sfds', 222, 'Development', '2023-09-15', 'sick,personal', ' dfsfsdf', '2023-08-31', '2023-09-25'),
('Durga', 'dff', 2222, 'Development', '2023-09-05', 'maternityPaternity,timeOff', ' asddad', '2023-09-06', '2023-09-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajax_table`
--
ALTER TABLE `ajax_table`
  ADD PRIMARY KEY (`Emp_Id`);

--
-- Indexes for table `leave_table`
--
ALTER TABLE `leave_table`
  ADD PRIMARY KEY (`Emp_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
