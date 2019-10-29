-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 04:32 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT 'NULL',
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `last_name`, `first_name`, `middle_name`, `username`, `password`) VALUES
(1, 'Manabo', 'John Cris', 'Calamongay', 'johncris', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Inte', 'Via Marie', 'Mira', 'via', '14f1f9729a8142e82600dac241e82fe2');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `organization` int(11) NOT NULL,
  `vote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `candidate`, `position`, `organization`, `vote`) VALUES
(2, 4, 4, 5, 0),
(3, 2, 10, 5, 2),
(10, 5, 12, 8, 0),
(11, 9, 15, 8, 1),
(12, 13, 4, 8, 2),
(13, 16, 10, 8, 0),
(14, 12, 16, 5, 2),
(16, 15, 16, 8, 1),
(17, 8, 11, 9, 1),
(19, 14, 12, 5, 0),
(20, 10, 14, 5, 0),
(24, 17, 16, 8, 0),
(25, 18, 4, 9, 0),
(26, 19, 16, 5, 1),
(27, 20, 16, 9, 0),
(28, 21, 16, 5, 1),
(29, 22, 16, 5, 2),
(30, 24, 16, 9, 2),
(31, 23, 16, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_code` varchar(10) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_code`, `department_name`) VALUES
(36, 'asfg', 'ahasdhasd'),
(1, 'BIST', 'Bachelor of Information in Science and Technology'),
(25, 'BSED', 'Bachelor of Science and Education');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL,
  `organization` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization`) VALUES
(5, '4ps'),
(9, 'kkk'),
(8, 'wisely');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position`) VALUES
(17, 'asdhasdh'),
(12, 'Asoc. Secretary'),
(15, 'auditor'),
(10, 'President'),
(4, 'Secretary'),
(16, 'senator'),
(14, 'Treasurer'),
(11, 'Vice President');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `year_level` int(11) NOT NULL,
  `is_vote` varchar(5) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `id_number`, `last_name`, `first_name`, `middle_name`, `gender`, `birthdate`, `mobile_number`, `year_level`, `is_vote`) VALUES
(2, '713171', 'Manabo', 'John Cris', 'Calamongay', 'Male', '2019-10-02', '2019-10-11', 13, 'Yes'),
(4, '248822', 'Inte', 'Via marie', 'Mira', 'Female', '2012-07-17', '1256171', 12, 'Yes'),
(5, '174227', 'Tamine', 'Elmer', 'T', 'Male', '2013-08-20', '1', 16, 'No'),
(8, '28482842', 'yamomo', 'roxan', 'Caseres', 'Female', '1996-03-12', '1731711361', 11, 'No'),
(9, '1737', 'caburnay', 'paul', 'david', 'Male', '2019-10-11', '1737237428', 11, 'No'),
(10, '828482', 'badiang', 'Kilven Mark', 'p.', 'Male', '2019-10-10', '7137171', 11, 'No'),
(11, '1637771', 'Patcho', 'Arah Jane', '', 'Female', '2018-10-10', '78724724', 3, 'No'),
(12, '72247', 'Etang', 'Benjay', 'haim', 'Male', '2019-02-12', '1737', 12, 'No'),
(13, '72728', 'Calamongay', 'Vince', 'Salibay', 'Male', '2019-01-15', '8435959933', 11, 'No'),
(14, '26267357', 'Palanas', 'Rica', '', 'Female', '2019-10-15', '7224', 16, 'No'),
(15, '4282', 'Tumala', 'Gea', 'Cariaga', 'Female', '2019-10-25', '634634735', 4, 'No'),
(16, '17317', 'Jamero', 'Dennes', '', 'Male', '2009-07-24', '3535835', 11, 'No'),
(17, '2747828', 'Baluyos', 'John Michael', NULL, 'Male', '2019-10-16', '824884', 14, 'No'),
(18, '92873582', 'Medina', 'Joniko', NULL, 'Male', '2019-10-10', '2848', 14, 'No'),
(19, '1613616', 'Asinas', 'John Michael', NULL, 'Male', '2019-10-02', '7233', 3, 'No'),
(20, '724723', 'Jabagat', 'Felix', NULL, 'Male', '2019-10-17', '724824', 12, 'No'),
(21, '24724727', 'Briones', 'Michael John', NULL, 'Male', '2019-10-24', '84824', 11, 'No'),
(22, '24889933', 'Cabasag', 'Elton', NULL, 'Male', '2019-10-22', '67248858', 1, 'No'),
(23, '7248248', 'Quennie', 'Clavido', NULL, 'Female', '2019-10-10', '62724859', 12, 'No'),
(24, ' 8395933473', 'Quimno', 'Jc', NULL, 'Male', '2019-10-17', '7248839', 11, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `year_level`
--

CREATE TABLE `year_level` (
  `year_level_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `year_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_level`
--

INSERT INTO `year_level` (`year_level_id`, `department_id`, `year_level`) VALUES
(16, 1, '1'),
(5, 1, 'a'),
(11, 1, 'aa'),
(12, 1, 'asgadah'),
(13, 25, '1ast'),
(1, 25, '2nd'),
(3, 25, 'aaa'),
(4, 25, 'adfha'),
(14, 25, 'kjk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `unique_index` (`candidate`,`position`,`organization`),
  ADD UNIQUE KEY `candidate_2` (`candidate`),
  ADD KEY `candidate` (`candidate`,`position`),
  ADD KEY `organization` (`organization`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `unique_index` (`department_code`,`department_name`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`),
  ADD UNIQUE KEY `organization` (`organization`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`),
  ADD UNIQUE KEY `position` (`position`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `unique_index` (`id_number`,`last_name`,`first_name`,`middle_name`,`gender`,`birthdate`,`mobile_number`,`year_level`),
  ADD KEY `birthdate` (`birthdate`),
  ADD KEY `year_level` (`year_level`);

--
-- Indexes for table `year_level`
--
ALTER TABLE `year_level`
  ADD PRIMARY KEY (`year_level_id`),
  ADD UNIQUE KEY `year_level` (`year_level`),
  ADD UNIQUE KEY `unique_index` (`department_id`,`year_level`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `year_level`
--
ALTER TABLE `year_level`
  MODIFY `year_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`candidate`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`organization`) REFERENCES `organization` (`organization_id`),
  ADD CONSTRAINT `candidate_ibfk_3` FOREIGN KEY (`position`) REFERENCES `position` (`position_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`year_level`) REFERENCES `year_level` (`year_level_id`);

--
-- Constraints for table `year_level`
--
ALTER TABLE `year_level`
  ADD CONSTRAINT `year_level_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
