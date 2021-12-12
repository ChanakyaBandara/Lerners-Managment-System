-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 03:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lerners`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `name`, `email`, `UID`) VALUES
(1, 'Admin', 'Admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EID`, `SID`, `result`, `timestamp`) VALUES
(4, 1, 11, '0000-00-00 00:00:00'),
(5, 1, 11, '2021-11-29 08:06:35'),
(6, 1, 8, '2021-11-29 08:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `exam_content`
--

CREATE TABLE `exam_content` (
  `EQID` int(11) NOT NULL,
  `EID` int(11) NOT NULL,
  `QID` int(11) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_content`
--

INSERT INTO `exam_content` (`EQID`, `EID`, `QID`, `answer`) VALUES
(1, 5, 1, 4),
(2, 5, 2, 3),
(3, 6, 1, 1),
(4, 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FID`, `SID`, `feedback`, `rating`) VALUES
(1, 1, 'sdfs', 3),
(2, 1, '22', 5);

-- --------------------------------------------------------

--
-- Table structure for table `lerners`
--

CREATE TABLE `lerners` (
  `LID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `mobile` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lerners`
--

INSERT INTO `lerners` (`LID`, `name`, `reg_no`, `owner`, `email`, `location`, `mobile`, `rating`, `UID`) VALUES
(2, 'Learn From Chana', 'df43e', 'Chanakya', 'chanalearn@gmail.com', 'Kurunagala ', 41445254, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UID`, `username`, `password`, `type`) VALUES
(1, 'Admin@gmail.com', '$2y$10$cu80N2xc2O4vhiok7Xmml.5icMAwlo/r4bbJ4nSjOD27wtu8lty3.', 1),
(8, 'kls@gmail.com', '$2y$10$cu80N2xc2O4vhiok7Xmml.5icMAwlo/r4bbJ4nSjOD27wtu8lty3.', 3),
(10, 'chanaLearn@gmail.com', '$2y$10$cu80N2xc2O4vhiok7Xmml.5icMAwlo/r4bbJ4nSjOD27wtu8lty3.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PACKID` int(11) NOT NULL,
  `LID` int(11) NOT NULL,
  `PACKname` varchar(100) NOT NULL,
  `desciption` varchar(255) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`PACKID`, `LID`, `PACKname`, `desciption`, `duration`, `price`) VALUES
(1, 2, 'Long Learn', 'Long time to learn', '6 years', 25000),
(3, 2, 'Fast 5', 'Learn in 1 month', '1 month', 25000),
(4, 2, 'Crash Cose', 'Learn How to crash', '3 month', 100);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PID` int(11) NOT NULL,
  `LID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `PACKID` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PID`, `LID`, `SID`, `PACKID`, `timestamp`) VALUES
(1, 2, 1, 1, '2021-11-07 06:19:02'),
(2, 2, 1, 4, '2021-11-28 17:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `QID` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `answer_1` varchar(100) NOT NULL,
  `answer_2` varchar(100) NOT NULL,
  `answer_3` varchar(100) NOT NULL,
  `answer_4` varchar(100) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `LID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`QID`, `content`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `LID`) VALUES
(1, 'Go Straight', 'ok', 'NO', 'wait', 'close', 2, 2),
(2, 'jhj', '2', '3', '4', '4', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `SHID` int(11) NOT NULL,
  `LID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`SHID`, `LID`, `name`, `day`, `duration`) VALUES
(3, 2, 'daily', 'Tuesday', '1 hour 30 minutes'),
(4, 2, 'gtest', 'Wednesday', '1 hour');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `SID` int(11) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(200) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(1) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SID`, `Fname`, `Lname`, `nic`, `email`, `mobile`, `address`, `age`, `dob`, `gender`, `UID`) VALUES
(1, 'Kusal', 'Lahiru', '123456778', 'kls@gmail.com', 123456789, 'piliyandala', 23, '2021-12-02', 'm', 8);

-- --------------------------------------------------------

--
-- Table structure for table `student_lerners_package`
--

CREATE TABLE `student_lerners_package` (
  `SLPID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `LID` int(11) NOT NULL,
  `PACKID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_lerners_package`
--

INSERT INTO `student_lerners_package` (`SLPID`, `SID`, `LID`, `PACKID`) VALUES
(1, 1, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_schedule`
--

CREATE TABLE `student_schedule` (
  `SSID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `SHID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_schedule`
--

INSERT INTO `student_schedule` (`SSID`, `SID`, `SHID`) VALUES
(4, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `exam_content`
--
ALTER TABLE `exam_content`
  ADD PRIMARY KEY (`EQID`),
  ADD UNIQUE KEY `EID` (`EID`,`QID`),
  ADD KEY `QID` (`QID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FID`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `lerners`
--
ALTER TABLE `lerners`
  ADD PRIMARY KEY (`LID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PACKID`),
  ADD KEY `LID` (`LID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `LID` (`LID`),
  ADD KEY `PACKID` (`PACKID`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`QID`),
  ADD KEY `LID` (`LID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`SHID`),
  ADD KEY `LID` (`LID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `student_lerners_package`
--
ALTER TABLE `student_lerners_package`
  ADD PRIMARY KEY (`SLPID`),
  ADD KEY `SID` (`SID`),
  ADD KEY `PACKID` (`PACKID`),
  ADD KEY `LID` (`LID`);

--
-- Indexes for table `student_schedule`
--
ALTER TABLE `student_schedule`
  ADD PRIMARY KEY (`SSID`),
  ADD KEY `SID` (`SID`),
  ADD KEY `SHID` (`SHID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_content`
--
ALTER TABLE `exam_content`
  MODIFY `EQID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lerners`
--
ALTER TABLE `lerners`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PACKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `SHID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_lerners_package`
--
ALTER TABLE `student_lerners_package`
  MODIFY `SLPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_schedule`
--
ALTER TABLE `student_schedule`
  MODIFY `SSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `login` (`UID`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`);

--
-- Constraints for table `exam_content`
--
ALTER TABLE `exam_content`
  ADD CONSTRAINT `exam_content_ibfk_1` FOREIGN KEY (`EID`) REFERENCES `exam` (`EID`),
  ADD CONSTRAINT `exam_content_ibfk_2` FOREIGN KEY (`QID`) REFERENCES `question_bank` (`QID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`);

--
-- Constraints for table `lerners`
--
ALTER TABLE `lerners`
  ADD CONSTRAINT `lerners_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `login` (`UID`);

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`LID`) REFERENCES `lerners` (`LID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`LID`) REFERENCES `lerners` (`LID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`PACKID`) REFERENCES `package` (`PACKID`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`);

--
-- Constraints for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD CONSTRAINT `question_bank_ibfk_1` FOREIGN KEY (`LID`) REFERENCES `lerners` (`LID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`LID`) REFERENCES `lerners` (`LID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `login` (`UID`);

--
-- Constraints for table `student_lerners_package`
--
ALTER TABLE `student_lerners_package`
  ADD CONSTRAINT `student_lerners_package_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`),
  ADD CONSTRAINT `student_lerners_package_ibfk_2` FOREIGN KEY (`PACKID`) REFERENCES `package` (`PACKID`),
  ADD CONSTRAINT `student_lerners_package_ibfk_3` FOREIGN KEY (`LID`) REFERENCES `lerners` (`LID`);

--
-- Constraints for table `student_schedule`
--
ALTER TABLE `student_schedule`
  ADD CONSTRAINT `student_schedule_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`),
  ADD CONSTRAINT `student_schedule_ibfk_2` FOREIGN KEY (`SHID`) REFERENCES `schedule` (`SHID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
