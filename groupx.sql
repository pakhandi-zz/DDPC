-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 12:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `groupx`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
  `dept_id` varchar(10) NOT NULL,
  `committee_id` varchar(10) NOT NULL,
  `committee_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`,`committee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`dept_id`, `committee_id`, `committee_name`) VALUES
('4', '1', 'DDPC');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_coordinator` varchar(10) NOT NULL,
  `course_instructor` varchar(10) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE IF NOT EXISTS `courseregistration` (
  `reg_no` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `credits_enrolled` decimal(3,0) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `sem_tyoe` tinyint(1) NOT NULL,
  PRIMARY KEY (`reg_no`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courseresultmaster`
--

CREATE TABLE IF NOT EXISTS `courseresultmaster` (
  `reg_no` varchar(10) NOT NULL,
  `ay` decimal(4,0) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `sem_type` tinyint(1) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `credits_earned` decimal(2,0) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `result` varchar(10) NOT NULL,
  `entered_date` date NOT NULL,
  `enterede_by` varchar(50) NOT NULL,
  `verified_date` date NOT NULL,
  `verified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`reg_no`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currentsupervisor`
--

CREATE TABLE IF NOT EXISTS `currentsupervisor` (
  `reg_no` varchar(10) NOT NULL,
  `supervisor1_id` varchar(10) NOT NULL,
  `supervisor2_id` varchar(10) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dakinout`
--

CREATE TABLE IF NOT EXISTS `dakinout` (
  `doc_id` varchar(10) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `reference` varchar(100) NOT NULL,
  `send_to` varchar(50) NOT NULL,
  `received_by` varchar(50) NOT NULL,
  `resend_outside` varchar(50) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` varchar(10) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `hod` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `hod`) VALUES
('1', 'Civil Engineering', 'Dr. Duggal'),
('2', 'Chemical Engineering', ''),
('3', 'Mechanical Engineering', ''),
('4', 'Computer Science and Engineering', 'Dr. Neeraj Tyagi'),
('5', 'Electronics and Communication Engineering', 'Mr. Asim Mukherjee');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `doc_id` varchar(10) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `academic_year` decimal(4,0) NOT NULL,
  `application_type` varchar(20) NOT NULL,
  `date_of_upload` date NOT NULL,
  `date_of_final_approval` date NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `member_id`, `sem_no`, `academic_year`, `application_type`, `date_of_upload`, `date_of_final_approval`) VALUES
('1', '20134065', '1', '2016', '1', '2016-04-27', '0000-00-00'),
('2', '20134065', '1', '2016', '1', '2016-04-27', '0000-00-00'),
('3', '20134136', '0', '2016', '1', '2016-05-10', '0000-00-00'),
('4', '20134136', '0', '2016', '1', '2016-05-10', '0000-00-00'),
('5', '20134136', '0', '2016', '1', '2016-05-10', '0000-00-00'),
('6', '20134136', '0', '2016', '1', '2016-10-13', '0000-00-00'),
('7', '20134136', '0', '2016', '1', '2016-10-13', '0000-00-00'),
('8', '20134136', '1', '2016', '', '2016-10-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `documentlookup`
--

CREATE TABLE IF NOT EXISTS `documentlookup` (
  `doc_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` varchar(50) NOT NULL,
  PRIMARY KEY (`doc_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `documentlookup`
--

INSERT INTO `documentlookup` (`doc_type_id`, `doc_type`) VALUES
(1, 'registration'),
(2, 'administrative'),
(3, 'academic');

-- --------------------------------------------------------

--
-- Table structure for table `examinarpanel`
--

CREATE TABLE IF NOT EXISTS `examinarpanel` (
  `reg_no` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`reg_no`,`type`,`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `contact` decimal(15,0) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `external` binary(1) NOT NULL,
  `affiliation` varchar(100) NOT NULL,
  PRIMARY KEY (`faculty_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `reg_no` varchar(10) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` decimal(4,0) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of_days` decimal(2,0) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`reg_no`,`leave_type`,`from_date`,`to_date`),
  KEY `leave_type` (`leave_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`reg_no`, `leave_type`, `sem_no`, `sem_type`, `academic_year`, `from_date`, `to_date`, `no_of_days`, `approved`) VALUES
('20134065', '1', '1', 'Odd', '2016', '2016-10-20', '2016-10-26', '7', 1),
('20134136', '1', '1', 'Odd', '2016', '2016-10-20', '2016-10-29', '10', 0),
('20134136', '1', '1', 'Odd', '2016', '2016-11-02', '2016-11-03', '2', 0),
('20134136', '2', '1', 'Odd', '2016', '2016-10-20', '2016-10-20', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leavelookup`
--

CREATE TABLE IF NOT EXISTS `leavelookup` (
  `leave_type` varchar(20) NOT NULL,
  `leave_name` varchar(20) NOT NULL,
  `no_of_days` decimal(3,0) NOT NULL,
  PRIMARY KEY (`leave_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavelookup`
--

INSERT INTO `leavelookup` (`leave_type`, `leave_name`, `no_of_days`) VALUES
('1', 'Sick Leave', '10'),
('2', 'Personal', '5');

-- --------------------------------------------------------

--
-- Table structure for table `meetattendance`
--

CREATE TABLE IF NOT EXISTS `meetattendance` (
  `meeting_no` varchar(10) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  PRIMARY KEY (`meeting_no`,`member_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE IF NOT EXISTS `meeting` (
  `meeting_no` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `committee_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`meeting_no`,`dept_id`,`committee_id`),
  KEY `dept_id` (`dept_id`,`committee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetingagendabrief`
--

CREATE TABLE IF NOT EXISTS `meetingagendabrief` (
  `meeting_no` varchar(10) NOT NULL,
  `agenda_id` varchar(10) NOT NULL,
  `agenda_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`meeting_no`,`agenda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetingdocs`
--

CREATE TABLE IF NOT EXISTS `meetingdocs` (
  `meeting_no` varchar(10) NOT NULL,
  `meeting_minute` longblob NOT NULL,
  `meeting_notice_with_agenda` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` varchar(10) NOT NULL,
  `member_type` varchar(20) NOT NULL,
  `committee_id` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  PRIMARY KEY (`member_id`,`committee_id`,`dept_id`),
  KEY `dept_id` (`dept_id`,`committee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_type`, `committee_id`, `dept_id`) VALUES
('20134136', 'student', '1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `issue_date`, `description`) VALUES
(1, '2016-04-26', 'hello this a new notification'),
(2, '2016-04-27', 'sample notif'),
(3, '2016-05-09', 'hello there is a meeting'),
(4, '2016-05-10', 'a meeting'),
(5, '2015-05-10', 'hi this is ayushi'),
(6, '2016-05-10', 'this is first meeting'),
(7, '2016-05-13', 'i am at home'),
(8, '0000-00-00', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `othercourses`
--

CREATE TABLE IF NOT EXISTS `othercourses` (
  `course_id` varchar(10) NOT NULL,
  `min_credits` decimal(2,0) NOT NULL,
  `max_credits` decimal(2,0) NOT NULL,
  `deadline` date NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partfullstatus`
--

CREATE TABLE IF NOT EXISTS `partfullstatus` (
  `reg_no` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_of_modification` datetime NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `src`
--

CREATE TABLE IF NOT EXISTS `src` (
  `reg_no` varchar(10) NOT NULL,
  `src_int_id` varchar(10) NOT NULL,
  `src_ext_id` varchar(10) NOT NULL,
  `supervisor1_id` varchar(10) NOT NULL,
  `supervisor2_id` varchar(10) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stipend`
--

CREATE TABLE IF NOT EXISTS `stipend` (
  `reg_no` varchar(10) NOT NULL,
  `month` decimal(2,0) NOT NULL,
  `year` decimal(4,0) NOT NULL,
  `date_sent` date NOT NULL,
  `stipend_amount` decimal(7,2) NOT NULL,
  PRIMARY KEY (`reg_no`,`month`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentmaster`
--

CREATE TABLE IF NOT EXISTS `studentmaster` (
  `reg_no` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo_path` varchar(50) NOT NULL,
  `category` varchar(10) NOT NULL,
  `program` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` decimal(15,0) NOT NULL,
  `mail_id` varchar(30) NOT NULL,
  `hostel` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `highest_qualification` varchar(100) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `admission_category_code` varchar(10) NOT NULL,
  `stipendiary` tinyint(1) NOT NULL,
  `program_type` varchar(25) NOT NULL,
  `program_category` varchar(25) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmaster`
--

INSERT INTO `studentmaster` (`reg_no`, `password`, `photo_path`, `category`, `program`, `name`, `father_name`, `address`, `contact_no`, `mail_id`, `hostel`, `gender`, `highest_qualification`, `nationality`, `admission_category_code`, `stipendiary`, `program_type`, `program_category`) VALUES
('20134065', 'hello', './images/20134065.jpg', 'Genral', 'B.Tech', 'Manish K Sinha', 'Rajesh Sinha Pathak', 'Mars', '1234567890', 'joker.ace@gmail.com', 'Tandon', 'M', 'AISSCE', 'Indian', '', 0, '', ''),
('20134136', 'gurha', './images/20134136.jpg', 'General', 'BTech', 'Ayushi Gurha', 'S G Gurha', 'G-5, KNGH', '9410671505', 'ayushigurha@gmail.com', 'KNGH', 'Female', 'AISCCE', 'Indian', '444', 0, 'Btech', '5005'),
('20134171', 'hello', './images/20134171.jpg', 'General', 'B.Tech', 'Asim Krishna Prasad', 'Ajay Krishna Prasad', 'MNNIT, Allahabad', '8175843965', 'asimkprasad@gmail.com', 'Tandon', 'M', 'AISSCE', 'Indian', '', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentmincredit`
--

CREATE TABLE IF NOT EXISTS `studentmincredit` (
  `department` varchar(50) NOT NULL,
  `qualifying_degree` varchar(50) NOT NULL,
  `min_credit_to_earn` decimal(3,0) NOT NULL,
  `min_credit_through_course_work` decimal(2,0) NOT NULL,
  `min_credit_research_seminar` decimal(2,0) NOT NULL,
  `min_credit_through_project` decimal(2,0) NOT NULL,
  `credit_through_compre_exam` decimal(2,0) NOT NULL,
  `credit_through_soa` decimal(2,0) NOT NULL,
  `credit_through_research` decimal(2,0) NOT NULL,
  `min_duration` varchar(30) NOT NULL,
  `min_residence_full_time` varchar(30) NOT NULL,
  `max_duration_full_time` varchar(30) NOT NULL,
  `max_duration_part_time` varchar(30) NOT NULL,
  PRIMARY KEY (`department`,`qualifying_degree`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmincredit`
--

INSERT INTO `studentmincredit` (`department`, `qualifying_degree`, `min_credit_to_earn`, `min_credit_through_course_work`, `min_credit_research_seminar`, `min_credit_through_project`, `credit_through_compre_exam`, `credit_through_soa`, `credit_through_research`, `min_duration`, `min_residence_full_time`, `max_duration_full_time`, `max_duration_part_time`) VALUES
('Engineering', 'B.Tech', '120', '32', '32', '32', '8', '8', '72', '3 years', '4 semesters', '6 years', '7 years'),
('Engineering', 'M. Tech', '80', '16', '16', '16', '8', '8', '48', '2 years', '4 semester', '6 years', '7 years'),
('Engineering', 'M.E.', '80', '16', '16', '16', '8', '8', '48', '2 years', '4 semesters', '6 years', '7 years'),
('Engineering', 'MCA', '120', '32', '32', '32', '8', '8', '72', '3 years', '4 semesters', '6 years', '7 years');

-- --------------------------------------------------------

--
-- Table structure for table `studentprogramdetails`
--

CREATE TABLE IF NOT EXISTS `studentprogramdetails` (
  `reg_no` varchar(10) NOT NULL,
  `date_of_comp_of_course_work` date NOT NULL,
  `credit_earn_course_work` decimal(2,0) NOT NULL,
  `credit_earn_thesis` decimal(2,0) NOT NULL,
  `date_of_comp` date NOT NULL,
  `date_of_soa` date NOT NULL,
  `date_of_open` date NOT NULL,
  `date_of_final_viva` date NOT NULL,
  `date_thesis_submission` date NOT NULL,
  `date_of_termination` date NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `program_left` tinyint(1) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentregistration`
--

CREATE TABLE IF NOT EXISTS `studentregistration` (
  `reg_no` varchar(10) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `registration_by` varchar(50) NOT NULL,
  `date_of_reg` datetime NOT NULL,
  `remarks` text NOT NULL,
  `total_credits_registered` decimal(3,0) NOT NULL,
  PRIMARY KEY (`reg_no`,`sem_no`,`sem_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentregistration`
--

INSERT INTO `studentregistration` (`reg_no`, `sem_no`, `sem_type`, `registration_by`, `date_of_reg`, `remarks`, `total_credits_registered`) VALUES
('20134065', '1', 'Odd', 'Admin', '2016-04-05 00:00:00', '', '12'),
('20134136', '1', 'Odd', 'Admin', '2016-10-13 00:00:00', '', '12'),
('20134171', '1', 'Odd', 'Admin', '2016-04-05 00:00:00', '', '16');

-- --------------------------------------------------------

--
-- Table structure for table `studentthesisdetails`
--

CREATE TABLE IF NOT EXISTS `studentthesisdetails` (
  `reg_no` varchar(10) NOT NULL,
  `AOR` varchar(150) NOT NULL,
  `proposed_topic` varchar(150) NOT NULL,
  `final_topic` varchar(150) NOT NULL,
  `soa_report` longblob NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisorhistory`
--

CREATE TABLE IF NOT EXISTS `supervisorhistory` (
  `reg_no` varchar(10) NOT NULL,
  `supervisor_id` varchar(10) NOT NULL,
  `date_of_allotment` date NOT NULL,
  `date_of_relieving` date NOT NULL,
  PRIMARY KEY (`reg_no`,`supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theorycourses`
--

CREATE TABLE IF NOT EXISTS `theorycourses` (
  `course_id` varchar(10) NOT NULL,
  `total_credits` decimal(2,0) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD CONSTRAINT `courseRegistration_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`),
  ADD CONSTRAINT `courseRegistration_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `courseresultmaster`
--
ALTER TABLE `courseresultmaster`
  ADD CONSTRAINT `courseResultMaster_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `courseregistration` (`reg_no`),
  ADD CONSTRAINT `courseResultMaster_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courseregistration` (`course_id`);

--
-- Constraints for table `currentsupervisor`
--
ALTER TABLE `currentsupervisor`
  ADD CONSTRAINT `currentSupervisor_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`);

--
-- Constraints for table `dakinout`
--
ALTER TABLE `dakinout`
  ADD CONSTRAINT `dakinout_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `document` (`doc_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`leave_type`) REFERENCES `leavelookup` (`leave_type`);

--
-- Constraints for table `meetattendance`
--
ALTER TABLE `meetattendance`
  ADD CONSTRAINT `meetattendance_ibfk_1` FOREIGN KEY (`meeting_no`) REFERENCES `meeting` (`meeting_no`),
  ADD CONSTRAINT `meetattendance_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`dept_id`, `committee_id`) REFERENCES `committee` (`dept_id`, `committee_id`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`dept_id`, `committee_id`) REFERENCES `committee` (`dept_id`, `committee_id`);

--
-- Constraints for table `meetingagendabrief`
--
ALTER TABLE `meetingagendabrief`
  ADD CONSTRAINT `meetingagendabrief_ibfk_1` FOREIGN KEY (`meeting_no`) REFERENCES `meeting` (`meeting_no`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`dept_id`, `committee_id`) REFERENCES `committee` (`dept_id`, `committee_id`);

--
-- Constraints for table `othercourses`
--
ALTER TABLE `othercourses`
  ADD CONSTRAINT `otherCourses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `partfullstatus`
--
ALTER TABLE `partfullstatus`
  ADD CONSTRAINT `partfullstatus_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`);

--
-- Constraints for table `src`
--
ALTER TABLE `src`
  ADD CONSTRAINT `src_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`);

--
-- Constraints for table `stipend`
--
ALTER TABLE `stipend`
  ADD CONSTRAINT `stipend_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`);

--
-- Constraints for table `studentprogramdetails`
--
ALTER TABLE `studentprogramdetails`
  ADD CONSTRAINT `studentProgramDetails_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`);

--
-- Constraints for table `studentregistration`
--
ALTER TABLE `studentregistration`
  ADD CONSTRAINT `studentregistration_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`);

--
-- Constraints for table `studentthesisdetails`
--
ALTER TABLE `studentthesisdetails`
  ADD CONSTRAINT `studentthesisdetails_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
