-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 11:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parent_feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `loginid`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'Active'),
(6, 'Akash sharma', 'akashsharma', '123456789', 'Active'),
(7, 'akashk', 'akashk', '123456789', 'Active'),

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` bigint(20) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_description` text NOT NULL,
  `course_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_description`, `course_status`) VALUES
(1, 'Computer Engineering', 'Computer Science', 'Active'),
(2, 'Information Technology', 'Information Technology', 'Active'),
(3, 'Electronics and Telecommunications', 'Electronics and Telecommunications', 'Active'),
(4, 'Artificial Intelligence and Data Science', 'Artificial Intelligence and Data Science', 'Active'),
(5, 'Electronics', 'Electronics', 'Active'),
(6, 'MTech in Artificial Intelligence', 'MTech in Artificial Intelligence', 'Active'),
(7, 'All', 'for all courses', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` bigint(20) NOT NULL,
  `faculty_name` varchar(25) NOT NULL,
  `faculty_designation` varchar(30) NOT NULL,
  `faculty_img` varchar(300) NOT NULL,
  `faculty_profile` text NOT NULL,
  `faculty_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_designation`, `faculty_img`, `faculty_profile`, `faculty_status`) VALUES
(1, 'Prakash K', 'Lecturer', '285277618Tulips.jpg', 'He is experience lecturer', 'Active'),
(2, 'Raj', 'Lecturer', '206418318Koala.jpg', 'He is experience lecturer', 'Active'),
(3, 'Raj', 'Lecturer', '1823306781Jellyfish.jpg', 'He is experience lecturer', 'Active'),
(4, 'Balakrishna', 'Professor', '1495582553Penguins.jpg', 'Balakrishna is experience', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackquestion`
--

CREATE TABLE `feedbackquestion` (
  `feedbackquestionid` int(11) NOT NULL,
  `feedbacktopicid` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `option5` text DEFAULT NULL,
  `option6` text DEFAULT NULL,
  `option7` text DEFAULT NULL,
  `option8` text DEFAULT NULL,
  `option9` text DEFAULT NULL,
  `option10` text DEFAULT NULL,
  `question_type` varchar(25) NOT NULL,
  `img` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbackquestion`
--

INSERT INTO `feedbackquestion` (`feedbackquestionid`, `feedbacktopicid`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `question_type`, `img`, `status`) VALUES
(1, 1, 'bbbbbbbbbbbbbbbbbbbb', 'a', 'b', 'c', 'd', '', '', '', '', '', '', 'Radio Button', '630163822', 'Active'),
(2, 1, 'aaaaaaaaaaaaaaaaaaaa', '', '', '', '', '', '', '', '', '', '', 'Text Box', '29933691', 'Active'),
(3, 1, 'hhhhhhhhhhhh', 'a', 'b', 'c', 'd', '', '', '', '', '', '', 'Check Box', '1908265410', 'Active'),
(4, 2, 'asdgsadgsadg', 'asdg', 'asdg', '', '', '', '', '', '', '', '', 'Check Box', '1792871413', 'Active'),
(5, 3, 'aasdgads', 'sdg', 'dsg', 'ssdg', 'dsg', '', '', '', '', '', '', 'Radio Button', '1960116506', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackquestion_result`
--

CREATE TABLE `feedbackquestion_result` (
  `feedbackquestion_resultid` bigint(20) NOT NULL,
  `feedbacktopicid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `feedbackquestionid` bigint(20) NOT NULL,
  `selectedanswer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbackquestion_result`
--

INSERT INTO `feedbackquestion_result` (`feedbackquestion_resultid`, `feedbacktopicid`, `parentid`, `date`, `feedbackquestionid`, `selectedanswer`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', 1, 'b'),
(2, 1, 1, '0000-00-00 00:00:00', 2, 'asgsadg'),
(3, 1, 1, '0000-00-00 00:00:00', 3, 'b'),
(4, 1, 5, '0000-00-00 00:00:00', 1, 'b'),
(5, 1, 5, '0000-00-00 00:00:00', 2, 'dhfshdshj'),
(6, 1, 5, '0000-00-00 00:00:00', 3, 'c'),
(7, 2, 5, '0000-00-00 00:00:00', 4, 'asdg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktopic`
--

CREATE TABLE `feedbacktopic` (
  `feedbacktopicid` int(11) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `faculty_id` bigint(20) NOT NULL,
  `section_name` tinytext NOT NULL,
  `year_id` int(11) NOT NULL,
  `feedback_topic` varchar(250) NOT NULL,
  `feedbacktopic_date` datetime NOT NULL,
  `feedback_icon` varchar(100) NOT NULL,
  `feedback_disptype` varchar(25) NOT NULL,
  `feedbacktopic_detail` text NOT NULL,
  `feedbacktopic_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbacktopic`
--

INSERT INTO `feedbacktopic` (`feedbacktopicid`, `course_id`, `faculty_id`, `section_name`, `year_id`, `feedback_topic`, `feedbacktopic_date`, `feedback_icon`, `feedback_disptype`, `feedbacktopic_detail`, `feedbacktopic_status`) VALUES
(1, 7, 0, 'all', 0, 'Feedback Topic 1', '2023-06-08 16:40:49', '1752588736', '', 'Feedback Topic 1 Description', 'Approved'),
(2, 1, 0, 'A', 1, 'asdg', '2023-06-08 17:44:53', '360584633', '', 'asdgsdg', 'Approved'),
(3, 7, 0, 'all', 0, 'dddddddddddd', '2023-06-09 15:12:14', '1646692730', '', 'fffffffffffffff', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentid` int(11) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `rollno` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `years_id` bigint(20) NOT NULL,
  `academicyear` varchar(50) DEFAULT NULL,
  `section` varchar(25) NOT NULL,
  `parentname` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `parent_no` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `companyname` varchar(50) DEFAULT NULL,
  `companyaddress` varchar(50) DEFAULT NULL,
  `designation` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `otherocc` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `is_verified` tinyint(4) NOT NULL,
  `verification_code` varchar(191) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentid`, `studentname`, `rollno`, `course_id`, `years_id`, `academicyear`, `section`, `parentname`, `email_id`, `parent_no`, `companyname`, `companyaddress`, `designation`, `occupation`, `otherocc`, `status`, `is_verified`, `verification_code`, `password`) VALUES
(2, '', 102, 3, 2, '2022-23', 'A', 'Dakshita', 'd.kolte@somaiya.edu', '5555555555', NULL, '', '', '0', '0', 'Active', 0, '', 'Admin@123'),
(8, '', 11, 2, 3, '2022-23', 'A', 'Kapil Bhatia', 'kapil.bhatia@somaiya.edu', '1111111111', NULL, '', '', '0', '0', 'Active', 0, '', 'Admin@123'),
(9, 'qqq', 111, 2, 1, '2022-23', 'A', 'Radha Bhatia', 'lapil.bhatia@somaiya.edu', '1111111111', NULL, '', '', '0', '0', 'Active', 0, '', 'Admin@123'),
(15, 'kapil Bhatia', 11, 4, 3, '2022-23', 'A', 'radha bhatia', 'rsbcell@gmail.com', '1111111111', 'none', 'Home', 'Teacher', 'Education', 'none', 'Active', 0, '', 'Admin@123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `report`
-- (See below for the actual view)
--
CREATE TABLE `report` (
);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `years_id` bigint(20) NOT NULL,
  `years_title` varchar(50) NOT NULL,
  `years_description` text NOT NULL,
  `years_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`years_id`, `years_title`, `years_description`, `years_status`) VALUES
(0, 'All', 'All', 'Active'),
(1, 'FY', 'First Year', 'Active'),
(2, 'SY', 'Second Year', 'Active'),
(3, 'TY', 'Third Year', 'Active'),
(4, 'LY', 'Last Year', 'Active');

-- --------------------------------------------------------

--
-- Structure for view `report`
--
DROP TABLE IF EXISTS `report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report`  AS SELECT DISTINCT `student`.`studentname` AS `studentname`, `student`.`rollno` AS `rollno`, `course`.`course_title` AS `course_title`, `years`.`years_title` AS `years_title`, `student`.`section` AS `section`, `feedbacktopic`.`feedback_topic` AS `feedback_topic` FROM ((((`student` left join `feedbackquestion_result` on(`student`.`studentid` = `feedbackquestion_result`.`studentid`)) left join `feedbacktopic` on(`feedbacktopic`.`feedbacktopicid` = `feedbackquestion_result`.`feedbacktopicid`)) left join `course` on(`course`.`course_id` = `student`.`course_id`)) left join `years` on(`years`.`years_id` = `student`.`years_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `feedbackquestion`
--
ALTER TABLE `feedbackquestion`
  ADD PRIMARY KEY (`feedbackquestionid`);

--
-- Indexes for table `feedbackquestion_result`
--
ALTER TABLE `feedbackquestion_result`
  ADD PRIMARY KEY (`feedbackquestion_resultid`);

--
-- Indexes for table `feedbacktopic`
--
ALTER TABLE `feedbacktopic`
  ADD PRIMARY KEY (`feedbacktopicid`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentid`),
  ADD UNIQUE KEY `rollno` (`email_id`),
  ADD KEY `years_id` (`years_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`years_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedbackquestion`
--
ALTER TABLE `feedbackquestion`
  MODIFY `feedbackquestionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedbackquestion_result`
--
ALTER TABLE `feedbackquestion_result`
  MODIFY `feedbackquestion_resultid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedbacktopic`
--
ALTER TABLE `feedbacktopic`
  MODIFY `feedbacktopicid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
