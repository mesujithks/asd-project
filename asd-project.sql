-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2017 at 08:11 PM
-- Server version: 10.1.26-MariaDB-1
-- PHP Version: 7.0.22-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asd-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `shortD` varchar(100) NOT NULL,
  `longD` varchar(1000) NOT NULL,
  `courseImage` varchar(100) NOT NULL DEFAULT '../images/default-c.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseId`, `courseName`, `shortD`, `longD`, `courseImage`) VALUES
(1, 'Python', 'hello python', 'python is easy to learn..!!', '../images/course-cover-1.jpg'),
(2, 'PHP', 'this is php', 'welcome php new', '../images/course-cover-2.jpg'),
(3, 'Java', 'hello java', 'java is powerful', '../images/course-cover-3.jpg'),
(4, 'Test', 'image test', 'upload test', '../images/course-cover-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `conentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`conentId`, `courseId`, `title`, `body`, `attachment`, `post_date`, `post_by`) VALUES
(1, 1, 'tset update ffile', 'ssjhfsjdf new', '../files/attachment-1509044754.pdf', '2017-10-21 15:12:22', 4),
(2, 1, 'test title', 'sdsg new uload', '../files/attachment-1509045796.pdf', '2017-10-21 15:41:37', 4),
(8, 2, 'uoload test', 'test', '../files/attachment-1509044831.pdf', '2017-10-25 21:14:57', 4);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_answer`
--

CREATE TABLE `discussion_answer` (
  `answer_id` int(11) NOT NULL,
  `replied` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_detail` varchar(2000) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `like` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_answer`
--

INSERT INTO `discussion_answer` (`answer_id`, `replied`, `question_id`, `answer_detail`, `datetime`, `user_id`, `like`) VALUES
(8, 0, 1, 'my reply', '2017-11-05 11:12:00', 6, 0),
(9, 0, 2, 'test reply', '2017-11-05 15:50:59', 4, 0),
(10, 0, 1, 'reply by faculty', '2017-11-05 15:51:32', 4, 0),
(11, 0, 1, 'repy frm suryajith', '2017-11-06 03:58:44', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_chat`
--

CREATE TABLE `discussion_chat` (
  `chatdetail_id` int(11) NOT NULL,
  `cdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_chat`
--

INSERT INTO `discussion_chat` (`chatdetail_id`, `cdatetime`, `message`, `user_id`, `chat_id`, `status`) VALUES
(1, '2017-11-06 13:43:45', 'hi', 7, 1, 'unread'),
(2, '2017-11-06 13:45:10', 'test msg', 7, 2, 'unread'),
(3, '2017-11-06 15:38:00', 'hello', 6, 3, 'unread'),
(6, '2017-11-06 16:26:04', 'reply msg', 6, 2, 'unread'),
(7, '2017-11-06 23:55:28', 'hi there', 4, 3, 'unread'),
(8, '2017-11-07 00:15:34', 'contact me immediately', 1, 4, 'unread'),
(9, '2017-11-07 00:41:13', 'OK sir', 4, 4, 'unread'),
(10, '2017-11-07 01:57:47', 'welome', 4, 5, 'unread'),
(11, '2017-11-07 01:59:20', 'msg frm admin', 1, 6, 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_chatmaster`
--

CREATE TABLE `discussion_chatmaster` (
  `chat_id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_chatmaster`
--

INSERT INTO `discussion_chatmaster` (`chat_id`, `user_id_from`, `user_id_to`) VALUES
(1, 7, 2),
(2, 7, 6),
(3, 6, 4),
(4, 1, 4),
(5, 4, 7),
(6, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_question`
--

CREATE TABLE `discussion_question` (
  `question_id` int(11) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `question_detail` varchar(2000) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `subtopic_id` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_question`
--

INSERT INTO `discussion_question` (`question_id`, `heading`, `question_detail`, `datetime`, `user_id`, `subtopic_id`, `views`) VALUES
(1, 'What is this?', 'help me', '2017-11-05 08:50:40', 6, 2, 0),
(2, 'test', 'question', '2017-11-05 10:15:03', 6, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_subtopic`
--

CREATE TABLE `discussion_subtopic` (
  `subtopic_id` int(11) NOT NULL,
  `subtopic_name` varchar(50) NOT NULL,
  `subtopic_description` varchar(500) NOT NULL,
  `s_status` varchar(20) NOT NULL DEFAULT 'true',
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_subtopic`
--

INSERT INTO `discussion_subtopic` (`subtopic_id`, `subtopic_name`, `subtopic_description`, `s_status`, `topic_id`) VALUES
(2, 'General', 'general python discussion', 'true', 1),
(3, 'PHP Security', 'Security in PHP Web Applications', 'true', 2),
(4, 'Test Topic', 'no needed', 'true', 4),
(5, 'Web Development', 'Python In Web Development', 'true', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_topic`
--

CREATE TABLE `discussion_topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(50) NOT NULL,
  `topic_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `test_id` int(5) NOT NULL,
  `sub_id` int(5) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`test_id`, `sub_id`, `test_name`, `total_que`) VALUES
(2, 1, 'test', '5'),
(3, 4, 'new exam', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `que_id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
(1, 2, 'que1', 'a', 'b', 'c', 'd', 1),
(2, 2, 'que2', 'e', 'f', 'g', 'h', 2),
(3, 2, 'que3', 'i', 'j', 'k', 'l', 3),
(4, 2, 'que4', 'm', 'n', 'o', 'p', 4),
(5, 2, 'que5 new', 'q', 'r', 's', 't', 2),
(6, 3, 'my qus', 'ans1', 'ans2', 'ans3', 'ans4', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `sid` int(11) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`sid`, `test_id`, `test_date`, `score`) VALUES
(6, 2, '2017-11-04 19:47:06', 5),
(7, 2, '2017-11-06 09:27:22', 4),
(7, 2, '2017-11-06 15:34:31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `exam_useranswer`
--

CREATE TABLE `exam_useranswer` (
  `sess_id` varchar(80) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_useranswer`
--

INSERT INTO `exam_useranswer` (`sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES
('6otaifpb6a8qacpu0dmvtgese2', 2, 'que1', 'a', 'b', 'c', 'd', 1, 1),
('6otaifpb6a8qacpu0dmvtgese2', 2, 'que2', 'e', 'f', 'g', 'h', 2, 2),
('6otaifpb6a8qacpu0dmvtgese2', 2, 'que3', 'i', 'j', 'k', 'l', 3, 3),
('6otaifpb6a8qacpu0dmvtgese2', 2, 'que4', 'm', 'n', 'o', 'p', 4, 4),
('6otaifpb6a8qacpu0dmvtgese2', 2, 'que5 new', 'q', 'r', 's', 't', 2, 4),
('ov2l6b16pkv88930jnuff0e7t2', 2, 'que1', 'a', 'b', 'c', 'd', 1, 2),
('ov2l6b16pkv88930jnuff0e7t2', 2, 'que2', 'e', 'f', 'g', 'h', 2, 3),
('ov2l6b16pkv88930jnuff0e7t2', 2, 'que3', 'i', 'j', 'k', 'l', 3, 3),
('ov2l6b16pkv88930jnuff0e7t2', 2, 'que4', 'm', 'n', 'o', 'p', 4, 4),
('ov2l6b16pkv88930jnuff0e7t2', 2, 'que5 new', 'q', 'r', 's', 't', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyId` int(11) NOT NULL,
  `empId` int(11) NOT NULL,
  `department` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'not approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyId`, `empId`, `department`, `address`, `status`) VALUES
(4, 12345, 'EC', 'test address', 'approved'),
(5, 777, 'CSE', 'kandathiparambil', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_courses_taken`
--

CREATE TABLE `faculty_courses_taken` (
  `facultyId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_courses_taken`
--

INSERT INTO `faculty_courses_taken` (`facultyId`, `courseId`, `status`) VALUES
(4, 1, 'approved'),
(4, 2, 'approved'),
(5, 3, 'approved'),
(5, 2, 'pending'),
(5, 1, 'pending'),
(4, 3, 'approved'),
(4, 4, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `user`, `course`, `subject`, `Description`, `Date`) VALUES
(1, 4, 1, 'notice title', 'test notice updated', '2017-10-29 21:06:22'),
(2, 1, 0, 'general notice', 'test', '2017-11-07 11:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationId` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'active',
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `page` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationId`, `status`, `user_from`, `user_to`, `heading`, `description`, `page`, `time`, `action`) VALUES
(3, 'read', 4, 1, 'Faculty Join Request', 'Something...', 'faculty-request', '2017-10-04 04:02:34', 'done'),
(4, 'read', 5, 1, 'Faculty Join Request', 'Something...', 'faculty-request', '2017-10-04 04:13:13', 'done'),
(5, 'read', 4, 1, 'Faculty Course Registraion Request', 'Something...', 'faculty-course', '2017-10-20 13:32:56', 'done'),
(6, 'read', 4, 1, 'Faculty Course Registraion Request', 'Something...', 'faculty-course', '2017-10-20 13:55:55', 'done'),
(7, 'read', 5, 1, 'Faculty Course Registraion', 'Something...', 'faculty-course', '2017-10-21 11:41:07', 'done'),
(8, 'read', 5, 1, 'Faculty Course Registraion', 'Something...', 'faculty-course', '2017-10-21 11:41:14', 'pending'),
(9, 'read', 5, 1, 'Faculty Course Registraion', 'Something...', 'faculty-course', '2017-10-21 11:41:21', 'pending'),
(10, 'read', 4, 1, 'Faculty Course Registraion', 'Something...', 'faculty-course', '2017-10-21 12:04:03', 'done'),
(11, 'read', 4, 1, 'Faculty Course Registraion', 'Something...', 'faculty-course', '2017-10-22 10:07:56', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `admno` int(11) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `addrs` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `admno`, `dept`, `addrs`, `status`) VALUES
(2, 0, '', '', 'incomplete'),
(6, 1234, 'CSE', 'test address', 'complete'),
(7, 5445, 'CSE', 'pooja enclave', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses_taken`
--

CREATE TABLE `student_courses_taken` (
  `stdId` int(11) NOT NULL,
  `crsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_courses_taken`
--

INSERT INTO `student_courses_taken` (`stdId`, `crsId`) VALUES
(6, 1),
(6, 2),
(6, 3),
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT '../images/avatar.png',
  `dob` date NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `type`, `mobile`, `gender`, `image`, `dob`, `join_date`) VALUES
(1, 'Stite Admin', 'admin@host.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1234567890, 'M', '../images/avatar-1.jpg', '2017-12-05', '2017-10-01 10:33:43'),
(2, 'sujith', 'mesujithks3@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'student', 9656008103, 'M', '../images/avatar.png', '1997-12-05', '2017-10-01 11:12:50'),
(4, 'Sujith K S', 'faculty@host.com', '21232f297a57a5a743894a0e4a801fc3', 'faculty', 1234557891, 'M', '../images/avatar-4.jpg', '2017-10-03', '2017-10-01 15:50:28'),
(5, 'Ajaydev', 'ajay@host.com', '21232f297a57a5a743894a0e4a801fc3', 'faculty', 9037861390, 'M', '../images/avatar-5.jpg', '1997-04-22', '2017-10-04 04:12:41'),
(6, 'Sujith K S', 'student@host.com', '21232f297a57a5a743894a0e4a801fc3', 'student', 1234557891, 'M', '../images/avatar-6.jpg', '2017-10-03', '2017-10-19 19:21:12'),
(7, 'suryajith', 'suryajith082@gmail.com', 'c680bc05d42ebf43a70cbfcd2096f313', 'student', 9544329179, 'M', '../images/avatar.png', '1997-09-05', '2017-11-06 09:24:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`conentId`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `discussion_answer`
--
ALTER TABLE `discussion_answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `discussion_chat`
--
ALTER TABLE `discussion_chat`
  ADD PRIMARY KEY (`chatdetail_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `discussion_chatmaster`
--
ALTER TABLE `discussion_chatmaster`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_id_to` (`user_id_to`),
  ADD KEY `user_id_from` (`user_id_from`);

--
-- Indexes for table `discussion_question`
--
ALTER TABLE `discussion_question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subtopic_id` (`subtopic_id`);

--
-- Indexes for table `discussion_subtopic`
--
ALTER TABLE `discussion_subtopic`
  ADD PRIMARY KEY (`subtopic_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `discussion_topic`
--
ALTER TABLE `discussion_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD KEY `test_id` (`test_id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `exam_useranswer`
--
ALTER TABLE `exam_useranswer`
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyId`);

--
-- Indexes for table `faculty_courses_taken`
--
ALTER TABLE `faculty_courses_taken`
  ADD KEY `facultyId` (`facultyId`),
  ADD KEY `faculty_courses_taken_ibfk_2` (`courseId`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `user` (`user`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationId`),
  ADD KEY `userId` (`user_from`),
  ADD KEY `user_to` (`user_to`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `student_courses_taken`
--
ALTER TABLE `student_courses_taken`
  ADD KEY `stdId` (`stdId`),
  ADD KEY `crsId` (`crsId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `conentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `discussion_answer`
--
ALTER TABLE `discussion_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `discussion_chat`
--
ALTER TABLE `discussion_chat`
  MODIFY `chatdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `discussion_chatmaster`
--
ALTER TABLE `discussion_chatmaster`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `discussion_question`
--
ALTER TABLE `discussion_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `discussion_subtopic`
--
ALTER TABLE `discussion_subtopic`
  MODIFY `subtopic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `discussion_topic`
--
ALTER TABLE `discussion_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `course_content_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`),
  ADD CONSTRAINT `course_content_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `faculty` (`facultyId`);

--
-- Constraints for table `discussion_answer`
--
ALTER TABLE `discussion_answer`
  ADD CONSTRAINT `discussion_answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `discussion_question` (`question_id`),
  ADD CONSTRAINT `discussion_answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `discussion_chat`
--
ALTER TABLE `discussion_chat`
  ADD CONSTRAINT `discussion_chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `discussion_chat_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `discussion_chatmaster` (`chat_id`);

--
-- Constraints for table `discussion_chatmaster`
--
ALTER TABLE `discussion_chatmaster`
  ADD CONSTRAINT `discussion_chatmaster_ibfk_1` FOREIGN KEY (`user_id_to`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `discussion_chatmaster_ibfk_2` FOREIGN KEY (`user_id_from`) REFERENCES `users` (`id`);

--
-- Constraints for table `discussion_question`
--
ALTER TABLE `discussion_question`
  ADD CONSTRAINT `discussion_question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `discussion_question_ibfk_2` FOREIGN KEY (`subtopic_id`) REFERENCES `discussion_subtopic` (`subtopic_id`);

--
-- Constraints for table `discussion_subtopic`
--
ALTER TABLE `discussion_subtopic`
  ADD CONSTRAINT `discussion_subtopic_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `courses` (`courseId`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `courses` (`courseId`);

--
-- Constraints for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD CONSTRAINT `exam_question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `exam` (`test_id`);

--
-- Constraints for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD CONSTRAINT `exam_result_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `exam` (`test_id`),
  ADD CONSTRAINT `exam_result_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `students` (`studentId`);

--
-- Constraints for table `exam_useranswer`
--
ALTER TABLE `exam_useranswer`
  ADD CONSTRAINT `exam_useranswer_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `exam` (`test_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`facultyId`) REFERENCES `users` (`id`);

--
-- Constraints for table `faculty_courses_taken`
--
ALTER TABLE `faculty_courses_taken`
  ADD CONSTRAINT `faculty_courses_taken_ibfk_1` FOREIGN KEY (`facultyId`) REFERENCES `faculty` (`facultyId`),
  ADD CONSTRAINT `faculty_courses_taken_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`);

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_from`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`user_to`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_courses_taken`
--
ALTER TABLE `student_courses_taken`
  ADD CONSTRAINT `student_courses_taken_ibfk_1` FOREIGN KEY (`stdId`) REFERENCES `students` (`studentId`),
  ADD CONSTRAINT `student_courses_taken_ibfk_2` FOREIGN KEY (`crsId`) REFERENCES `courses` (`courseId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
