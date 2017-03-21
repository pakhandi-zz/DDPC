-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 06:39 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ddpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `awarddistribution`
--

CREATE TABLE IF NOT EXISTS `awarddistribution` (
  `sem_no` int(2) NOT NULL,
  `credits_through` varchar(100) NOT NULL,
  `max_credits` int(2) NOT NULL,
  PRIMARY KEY (`sem_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awarddistribution`
--

INSERT INTO `awarddistribution` (`sem_no`, `credits_through`, `max_credits`) VALUES
(1, 'Course Work/Research Seminar/Mini Project/Thesis Performance', 20),
(2, 'Course Work/Research Seminar/Mini Project/Comprehensive/State of the Art/Thesis Performance', 20),
(3, 'Course Work/Research Seminar/Mini Project/Comprehensive/State of the Art/Thesis Performance', 20),
(4, 'State of the Art/Thesis Performance', 20),
(5, 'Thesis Performance', 20),
(6, 'Thesis Performance', 20);

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

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_coordinator` varchar(10) NOT NULL,
  `course_instructor` varchar(10) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` decimal(10,0) NOT NULL,
  PRIMARY KEY (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `dept_id`, `course_name`, `course_coordinator`, `course_instructor`, `sem_type`, `academic_year`) VALUES
('CS-2114', '4 ', 'Advanced Data Modelling', 'aksingh', 'aksingh', '0', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE IF NOT EXISTS `courseregistration` (
  `reg_no` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `credits_enrolled` decimal(3,0) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` decimal(10,0) NOT NULL DEFAULT '0',
  `progress` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `student_selected_coordinator` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`reg_no`,`course_id`,`sem_type`,`academic_year`),
  KEY `course_id` (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courseresultmaster`
--

CREATE TABLE IF NOT EXISTS `courseresultmaster` (
  `reg_no` varchar(10) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` decimal(10,0) NOT NULL,
  `credits_earned` decimal(2,0) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `result` varchar(10) NOT NULL,
  `entered_date` date NOT NULL,
  `enterede_by` varchar(50) NOT NULL,
  `verified_date` date NOT NULL,
  `verified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`reg_no`,`course_id`,`sem_type`,`academic_year`),
  KEY `course_id` (`course_id`,`sem_type`,`academic_year`)
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

--
-- Dumping data for table `currentsupervisor`
--

INSERT INTO `currentsupervisor` (`reg_no`, `supervisor1_id`, `supervisor2_id`) VALUES
('2008RCS05', 'ntyagi', ''),
('2008RCS07', 'ntyagi', ''),
('2008RCS08', 'akmisra', 'ntyagi'),
('2008RCS13', 'dskushwaha', ''),
('2008RCS14', 'rsyadav', ''),
('2009RCS02', 'rsyadav', ''),
('2009RCS09', 'sagarwal', ''),
('2009RCS10', 'bchoudhary', ''),
('2009RCS53', 'mmgore', ''),
('2009RCS55', 'dskushwaha', ''),
('2009RCS57', 'ntyagi', ''),
('2010RCS03', 'ntyagi', 'mpandey'),
('2010RCS04', 'sagarwal', ''),
('2010RCS05', 'rsyadav', ''),
('2010RCS06', 'ntyagi', ''),
('2010RCS53', 'mmgore', 'aksingh'),
('2011RGI01', 'sagarwal', ''),
('2012RCS02', 'sagarwal', ''),
('2012RCS03', 'rsyadav', ''),
('2012RCS04', 'kkmishra', ''),
('2012RCS51', 'sagarwal', ''),
('2012RCS52', 'kkmishra', ''),
('2012RCS53', 'mmgore', 'mpandey'),
('2012RCS54', 'aksingh', ''),
('2012RCS55', 'kkmishra', ''),
('2012RCS56', 'dskushwaha', ''),
('2012RCS57', 'rsyadav', 'ranvijay'),
('2012RCS58', 'ranvijay', ''),
('2013RCS01', 'rsyadav', ''),
('2013RCS02', 'anojkumar', ''),
('2013RCS03', 'aksingh', ''),
('2013RCS04', 'ranvijay', ''),
('2013RCS06', 'mmgore', ''),
('2013RCS07', 'aksingh', ''),
('2013RCS51', 'mmgore', 'mpandey'),
('2013RGI04', 'mpandey', ''),
('2014RCS01', 'mmgore', ''),
('2014RCS02', 'dskushwaha', ''),
('2014RCS03', 'sagarwal', ''),
('2014RCS04', 'ssrvastava', ''),
('2014RCS05', 'ranvijay', ''),
('2014RCS06', 'dskushwaha', ''),
('2014RCS07', 'ssrvastava', ''),
('2014RCS08', 'ssrvastava', ''),
('2014RCS09', 'sagarwal', ''),
('2014RCS10', 'mpandey', ''),
('2014RCS11', 'rsyadav', ''),
('2014RCS12', 'mpandey', ''),
('2014RCS51', 'aksingh', ''),
('2014RCS52', 'mpandey', 'ssrvastava'),
('2014RCS53', 'kkmishra', ''),
('2014RCS54', 'ranvijay', ''),
('2014RCS55', 'dskushwaha', ''),
('2015RCS01', 'ntyagi', ''),
('2015RCS02', 'dskushwaha', ''),
('2015RCS03', 'ranvijay', ''),
('2015RCS04', 'pdwivedi', ''),
('2015RCS05', 'pdwivedi', ''),
('2015RCS07', 'aksingh', ''),
('2015RCS08', 'anojkumar', ''),
('2015RCS09', 'kkmishra', ''),
('2015RCS10', 'dskushwaha', ''),
('2015RCS11', 'kkmishra', ''),
('2015RCS12', 'rsyadav', ''),
('2015RCS13', 'dkyadav', '');

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
('1', 'Civil Engineering', 'Dr. A K Singh'),
('2', 'Chemical Engineering', 'Dr. Anuj Jain'),
('3', 'Mechanical Engineering', 'Dr. Rakesh Narain'),
('4', 'Computer Science and Engineering', 'Dr. Neeraj Tyagi'),
('5', 'Electronics and Communication Engineering', 'Dr. V K Srivastava'),
('6', 'Electrical Engineering', 'Dr. Shubhi Purwar'),
('7', 'Mathematics', 'Dr. Pankaj Srivastava');

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

-- --------------------------------------------------------

--
-- Table structure for table `documentlookup`
--

CREATE TABLE IF NOT EXISTS `documentlookup` (
  `doc_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` varchar(50) NOT NULL,
  PRIMARY KEY (`doc_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `documentlookup`
--

INSERT INTO `documentlookup` (`doc_type_id`, `doc_type`) VALUES
(1, 'Marksheet'),
(3, 'Transcript'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `examinarpanel`
--

CREATE TABLE IF NOT EXISTS `examinarpanel` (
  `reg_no` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`reg_no`,`type`,`faculty_id`),
  KEY `examinarpanel_ibfk_2` (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `contact` decimal(15,0) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `external` binary(1) NOT NULL,
  `affiliation` varchar(100) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  PRIMARY KEY (`faculty_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `password`, `name`, `dept_id`, `designation`, `contact`, `mail_id`, `external`, `affiliation`, `photo_path`) VALUES
('akmisra', 'akmisra', 'A. K. Misra', '4', 'Professor', '0', 'akm@mnnit.ac.in', '\0', '', ''),
('aksingh', 'aksingh', 'A. K. Singh', '4', 'Associate Professor', '0', 'aks@mnnit.ac.in', '\0', '', ''),
('anojkumar', 'anojkumar', 'Anoj Kumar', '4', 'Assistant Professor', '0', 'anojkmr@mnnit.ac.in', '\0', '', ''),
('bchoudhary', 'bchoudhary', 'B. D. Choudhary', '4', 'Professor', '0', 'bdc@mnnit.ac.in', '\0', '', ''),
('dkyadav', 'dkyadav', 'D. K. Yadav', '4', 'Associate Professor', '0', 'dky@mnnit.ac.in', '\0', '', ''),
('dskushwaha', 'dskushwaha', 'D. S. Kushwaha', '4', 'Associate Professor', '0', 'dsk@mnnit.ac.in', '\0', '', ''),
('kkmishra', 'kkmishra', 'K. K. Mishra', '4', 'Assistant Professor', '0', 'kkm@mnnit.ac.in', '\0', '', ''),
('mmgore', 'mmgore', 'M. M. Gore', '4', 'Professor', '0', 'mmg@mnnit.ac.in', '\0', '', ''),
('mpandey', 'mpandey', 'Mayank Pandey', '4', 'Assistant Professor', '0', 'mpnd@mnnit.ac.in', '\0', '', ''),
('ntyagi', 'ntyagi', 'Neeraj Tyagi', '4', 'Professor', '0', 'ntyg@mnnit.ac.in', '\0', '', ''),
('pdwivedi', 'pdwivedi', 'Pragya Dwivedi ', '4', 'Assistant Professor', '0', 'pdwvd@mnnit.ac.in', '\0', '', ''),
('ranvijay', 'ranvijay', 'Ranvijay', '4', 'Assistant Professor', '0', 'rnvjy@mnnit.ac.in', '\0', '', ''),
('rsyadav', 'rsyadav', 'R. S. Yadav', '4', 'Professor', '0', 'rsy@mnnit.ac.in', '\0', '', ''),
('sagarwal', 'sagarwal', 'Suneeta Agarwal', '4', 'Professor', '0', 'sagr@mnnit.ac.in', '\0', '', ''),
('ssrvastava', 'ssrivastava', 'Shashank Srivastava ', '4', 'Assistant Professor', '0', 'ssrvas@mnnit.ac.in', '\0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobdocumentlookup`
--

CREATE TABLE IF NOT EXISTS `jobdocumentlookup` (
  `job_type_id` int(11) NOT NULL,
  `doc_type_id` int(11) NOT NULL,
  PRIMARY KEY (`doc_type_id`,`job_type_id`),
  KEY `job_type_id` (`job_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdocumentlookup`
--

INSERT INTO `jobdocumentlookup` (`job_type_id`, `doc_type_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `joblookup`
--

CREATE TABLE IF NOT EXISTS `joblookup` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type` varchar(50) NOT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `joblookup`
--

INSERT INTO `joblookup` (`job_type_id`, `job_type`) VALUES
(1, 'Getting attested Transcript'),
(2, 'Process to get Scholarship 1');

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
  `status` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `applied_on` date NOT NULL,
  `progress` varchar(25) NOT NULL DEFAULT 'Supervisor',
  PRIMARY KEY (`reg_no`,`leave_type`,`from_date`,`to_date`),
  KEY `leave_type` (`leave_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('2', 'Personal', '5'),
('3', 'casual', '15');

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
  `role` varchar(25) NOT NULL,
  PRIMARY KEY (`member_id`,`committee_id`,`dept_id`),
  KEY `dept_id` (`dept_id`,`committee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `target_group` text NOT NULL,
  `target_member` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `othercourses`
--

CREATE TABLE IF NOT EXISTS `othercourses` (
  `course_id` varchar(10) NOT NULL,
  `min_credits` decimal(2,0) NOT NULL,
  `max_credits` decimal(2,0) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` decimal(10,0) NOT NULL,
  PRIMARY KEY (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partfullstatus`
--

CREATE TABLE IF NOT EXISTS `partfullstatus` (
  `reg_no` varchar(10) NOT NULL,
  `reg_status` varchar(20) NOT NULL,
  `date_of_modification` datetime NOT NULL,
  `reason` varchar(255) NOT NULL,
  `supervisor_comment` varchar(255) NOT NULL,
  `progress` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rolelookup`
--

CREATE TABLE IF NOT EXISTS `rolelookup` (
  `role_id` varchar(25) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolelookup`
--

INSERT INTO `rolelookup` (`role_id`, `role_name`) VALUES
('ChairmanSDPC', 'SDPC Chairman'),
('ChairmanSenate', 'Senate Chairman'),
('ConvenerDDPC', 'DDPC Convener'),
('CourseCoordinator', 'Course Coordinator'),
('ExternalMemberSRC', 'External Member of SRC'),
('HOD', 'Head of Department'),
('InternalMemberSRC', 'Internal Member of SRC'),
('student', 'Student'),
('Supervisor', 'Supervisor');

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
  `status` varchar(25) NOT NULL,
  `progress` varchar(50) NOT NULL,
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
('2008RCS05', '2008RCS05', '', 'General', 'Ph.D.', 'Awadhesh Kumar', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2008RCS08', '2008RCS08', '', 'General', 'Ph.D.', 'Shilpy Agarwal', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2008RCS13', '2008RCS13', '', 'General', 'Ph.D.', 'Avinash Gupta', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2008RCS14', '2008RCS14', '', 'General', 'Ph.D.', 'Anil Kumar Yadav', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2009RCS02', '2009RCS02', '', 'General', 'Ph.D.', 'Shivani Mishra', '', '', '0', '', '', '', '', '', '', 0, '', 'Full Time'),
('2009RCS07', '2009RCS07', '', 'General', 'Ph.D.', 'Rakesh Kumar Singh', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2009RCS09', '2009RCS09', '', 'General', 'Ph.D.', 'Anand Prakash Shukla', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2009RCS10', '2009RCS10', '', '', '', 'Pawan Kumar', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2009RCS53', '2009RCS53', '', 'General', 'Ph.D.', 'Sansar Singh Chauhan', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2009RCS55', '2009RCS55', '', 'General', 'Ph.D.', 'Sanjeev Kumar Pippal', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2009RCS57', '2009RCS57', '', 'General', 'Ph.D.', 'Jokhu Lal', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2010RCS03', '2010RCS03', '', 'General', 'Ph.D.', 'Debjani Ghosh', '', '', '0', '', '', '', '', '', '', 0, '', 'Full Time'),
('2010RCS04', '2010RCS04', '', 'General', 'Ph.D.', 'Neelam Bharadwaj', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2010RCS05', '2010RCS05', '', 'General', 'Ph.D.', 'Hari Mohan Singh', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time(QIP)'),
('2010RCS06', '2010RCS06', '', 'General', 'Ph.D.', 'Vimal Kumar', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2010RCS53', '2010RCS53', '', 'General', 'Ph.D.', 'Rohit', '', '', '0', '', '', '', '', '', '', 0, '', 'Full Time'),
('2011RGI01', '2011RGI01', '', 'General', 'Ph.D.', 'Priyanka Singh', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2012RCS02', '2012RCS02', '', 'General', 'Ph.D.', 'Shivendra Shivani', '', '', '0', '', '', '', '', '', '', 0, '', 'Full Time'),
('2012RCS03', '2012RCS03', '', 'General', 'Ph.D.', 'Sarika Yadav', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2012RCS04', '2012RCS04', '', '', '', 'Nitin Saxena', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2012RCS51', '2012RCS51', '', 'General', 'Ph.D.', 'Rajitha B', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2012RCS52', '2012RCS52', '', '', '', 'Shanti Behera', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2012RCS53', '2012RCS53', '', 'General', 'Ph.D.', 'Shashwati Banerjea', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2012RCS54', '2012RCS54', '', '', '', 'Rupesh Kumar Dewang', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2012RCS55', '2012RCS55', '', '', '', 'Divya Kumar', '', '', '0', '', '', '', '', '', '', 0, '', 'Part time'),
('2012RCS56', '2012RCS56', '', 'General', 'Ph.D.', 'Dushyant Kumar Singh', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2012RCS57', '2012RCS57', '', 'General', 'Ph.D.', 'Dinesh Singh', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2012RCS58', '2012RCS58', '', '', '', 'K. Vinod Kumar', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(QIP)'),
('2013RCS01', '2013RCS01', '', 'General', 'Ph.D.', 'Shruti Jadon', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2013RCS02', '2013RCS02', '', '', '', 'Shailendra Pratap Singh', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2013RCS03', '2013RCS03', '', '', '', 'Praveen Kumar', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2013RCS04', '2013RCS04', '', '', '', 'Rajit Ram Yadav', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(TEQIP-II)'),
('2013RCS06', '2013RCS06', '', 'General', 'Ph.D.', 'Vijay Kumar Dwivedi', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2013RCS07', '2013RCS07', '', '', '', 'Subhadra Bose Shaw', '', '', '0', '', '', '', '', '', '', 0, '', 'Part Time'),
('2013RCS51', '2013RCS51', '', 'General', 'Ph.D.', 'Anurag Sewak', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(TEQIP-II)'),
('2013RGI04', '2013RGI04', '', '', '', 'Abha Trivedi', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(TEQIP-II)'),
('2014RCS01', '2014RCS01', '', 'General', 'Ph.D.', 'Brijendra Pratap Singh', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2014RCS02', '2014RCS02', '', 'General', 'Ph.D.', 'Tarun Kumar', '', '', '0', '', '', '', '', '', '', 0, '', 'Self Financed'),
('2014RCS03', '2014RCS03', '', 'General', 'Ph.D.', 'Shambhu Shankar Bharti', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2014RCS04', '2014RCS04', '', '', '', 'Naveen Kumar', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2014RCS05', '2014RCS05', '', '', '', 'Mainejar Yadav', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2014RCS06', '2014RCS06', '', 'General', 'Ph.D.', 'Rohit Kumar Sachan', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2014RCS07', '2014RCS07', '', '', '', 'Ashuthosh Kumar Singh', '', '', '0', '', '', '', '', '', '', 0, '', 'Self Financed'),
('2014RCS08', '2014RCS08', '', '', '', 'Neelam Dayal', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2014RCS09', '2014RCS09', '', 'General', 'Ph.D.', 'Manish Gupta', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(QIP)'),
('2014RCS10', '2014RCS10', '', '', '', 'Krishna Vijay Kr. Singh', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(QIP)'),
('2014RCS11', '2014RCS11', '', 'General', 'Ph.D.', 'Suresh Kumar', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(QIP)'),
('2014RCS12', '2014RCS12', '', '', '', 'Abhay Singh', '', '', '0', '', '', '', '', '', '', 0, '', 'Project Staff'),
('2014RCS51', '2014RCS51', '', '', '', 'Jagrati Singh', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)'),
('2014RCS52', '2014RCS52', '', '', '', 'Nitin Shukla', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)'),
('2014RCS53', '2014RCS53', '', '', '', 'Ravi Prakash', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)'),
('2014RCS54', '2014RCS54', '', '', '', 'Shailendra Puskin', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)'),
('2014RCS55', '2014RCS55', '', 'General', 'Ph.D.', 'Biru Rajak', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)'),
('2015RCS01', '2015RCS01', '', 'General', 'Ph.D.', 'Shabir Ali', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2015RCS02', '2015RCS02', '', 'General', 'Ph.D.', 'Neelam Dwivedi', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)'),
('2015RCS03', '2015RCS03', '', '', '', 'Sanjeev Kumar', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2015RCS04', '2015RCS04', '', '', '', 'Rajneesh Pareek', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2015RCS05', '2015RCS05', '', '', '', 'Ashish Kumar Sahu', '', '', '0', '', '', '', '', '', '', 0, '', 'Full Time'),
('2015RCS07', '2015RCS07', '', '', '', 'Garima Singh', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)'),
('2015RCS08', '2015RCS08', '', '', '', 'Nidhi Lal', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2015RCS09', '2015RCS09', '', '', '', 'Tribhuvan Singh', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time'),
('2015RCS10', '2015RCS10', '', 'General', 'Ph.D.', 'Dhirendra Kumar Shukla', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(QIP)'),
('2015RCS11', '2015RCS11', '', '', '', 'Satya Deo Kumar Ram', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)'),
('2015RCS12', '2015RCS12', '', 'General', 'Ph.D.', 'Naveen Kumar Gupta', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(QIP)'),
('2015RCS13', '2015RCS13', '', '', '', 'Brajesh Kumar Umrao', '', '', '0', '', '', '', '', '', '', 1, '', 'Full Time(Diety)');

-- --------------------------------------------------------

--
-- Table structure for table `studentmincredit`
--

CREATE TABLE IF NOT EXISTS `studentmincredit` (
  `department` varchar(50) NOT NULL,
  `qualifying_degree` varchar(50) NOT NULL,
  `min_credit_to_earn` decimal(3,0) NOT NULL,
  `min_credit_through` decimal(2,0) NOT NULL,
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

INSERT INTO `studentmincredit` (`department`, `qualifying_degree`, `min_credit_to_earn`, `min_credit_through`, `credit_through_compre_exam`, `credit_through_soa`, `credit_through_research`, `min_duration`, `min_residence_full_time`, `max_duration_full_time`, `max_duration_part_time`) VALUES
('Engineering', 'B.Tech/MCA/M.Sc.', '120', '32', '8', '8', '72', '3 years', '4 semesters', '6 years', '7 years'),
('Engineering', 'M. Tech/M.E.', '80', '16', '8', '8', '48', '2 years', '4 semester', '6 years', '7 years'),
('Management', 'B.tech/M.Sc./MA/M.Com', '120', '32', '8', '8', '72', '3 years', '4 semesters', '6 years', '7years'),
('Management', 'MBA/MMS', '80', '16', '8', '8', '48', '2 years', '4 semesters', '6 years', '7years'),
('Science/HSS', 'B.tech', '120', '32', '8', '8', '72', '3 years', '4 semesters', '6 years', '7years'),
('Science/HSS', 'M.Sc./MA/M.Com', '80', '16', '8', '8', '48', '3 years', '4 semesters', '6 years', '7years');

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
  `date_of_reg` date NOT NULL,
  `remarks` text NOT NULL,
  `total_credits_registered` decimal(3,0) NOT NULL,
  PRIMARY KEY (`reg_no`,`sem_no`,`sem_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `studentthesisdetails`
--

INSERT INTO `studentthesisdetails` (`reg_no`, `AOR`, `proposed_topic`, `final_topic`, `soa_report`) VALUES
('2015RCS01', 'Operating Systems', 'Cooperative Caching: Using Remote Client Memory to Improve File System Performance', 'Cooperative Caching: Using Remote Client Memory to Improve File System Performance', ''),
('2015RCS02', 'Networking', 'Formal modelling, verification and analysis of wireless mesh networks', 'Formal modelling, verification and analysis of wireless mesh networks', '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisorhistory`
--

CREATE TABLE IF NOT EXISTS `supervisorhistory` (
  `reg_no` varchar(10) NOT NULL,
  `supervisor_id` varchar(10) NOT NULL,
  `date_of_allotment` date NOT NULL,
  `date_of_relieving` date NOT NULL,
  PRIMARY KEY (`reg_no`,`supervisor_id`),
  KEY `supervisorhistory_ibfk_1` (`supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theorycourses`
--

CREATE TABLE IF NOT EXISTS `theorycourses` (
  `course_id` varchar(10) NOT NULL,
  `total_credits` decimal(2,0) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` decimal(10,0) NOT NULL,
  PRIMARY KEY (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theorycourses`
--

INSERT INTO `theorycourses` (`course_id`, `total_credits`, `sem_type`, `academic_year`) VALUES
('CS-2114', '4', '0', '2016');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD CONSTRAINT `courseregistration_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`),
  ADD CONSTRAINT `courseregistration_ibfk_2` FOREIGN KEY (`course_id`, `sem_type`, `academic_year`) REFERENCES `course` (`course_id`, `sem_type`, `academic_year`);

--
-- Constraints for table `courseresultmaster`
--
ALTER TABLE `courseresultmaster`
  ADD CONSTRAINT `courseresultmaster_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`),
  ADD CONSTRAINT `courseresultmaster_ibfk_2` FOREIGN KEY (`course_id`, `sem_type`, `academic_year`) REFERENCES `course` (`course_id`, `sem_type`, `academic_year`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `othercourses`
--
ALTER TABLE `othercourses`
  ADD CONSTRAINT `othercourses_ibfk_1` FOREIGN KEY (`course_id`, `sem_type`, `academic_year`) REFERENCES `course` (`course_id`, `sem_type`, `academic_year`);

--
-- Constraints for table `supervisorhistory`
--
ALTER TABLE `supervisorhistory`
  ADD CONSTRAINT `supervisorhistory_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supervisorhistory_ibfk_2` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theorycourses`
--
ALTER TABLE `theorycourses`
  ADD CONSTRAINT `theorycourses_ibfk_1` FOREIGN KEY (`course_id`, `sem_type`, `academic_year`) REFERENCES `course` (`course_id`, `sem_type`, `academic_year`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
