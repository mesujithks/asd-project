-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2017 at 05:21 PM
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
  `courseImage` varchar(100) NOT NULL DEFAULT 'images/default-c.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseId`, `courseName`, `shortD`, `longD`, `courseImage`) VALUES
(1, 'Python', 'hello python', 'python is easy to learn..!!', 'images/default-c.jpg'),
(2, 'PHP', 'this is php', 'welcome php', 'images/default-c.jpg'),
(3, 'Java', 'hello java', 'java is powerful', 'images/default-c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `conentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `discussion_chat`
--

CREATE TABLE `discussion_chat` (
  `chatdetail_id` int(11) NOT NULL,
  `cdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discussion_chatmaster`
--

CREATE TABLE `discussion_chatmaster` (
  `chat_id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `discussion_subtopic`
--

CREATE TABLE `discussion_subtopic` (
  `subtopic_id` int(11) NOT NULL,
  `subtopic_name` varchar(50) NOT NULL,
  `subtopic_description` varchar(500) NOT NULL,
  `s_status` varchar(20) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `login` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 777, 'CSE', 'kandathiparambil', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_courses_taken`
--

CREATE TABLE `faculty_courses_taken` (
  `facultyId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'read', 5, 1, 'Faculty Join Request', 'Something...', 'faculty-request', '2017-10-04 04:13:13', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `student_courses_taken`
--

CREATE TABLE `student_courses_taken` (
  `stdId` int(11) NOT NULL,
  `crsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `image` varchar(50) NOT NULL DEFAULT '/images/avatar.png',
  `dob` date NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `type`, `mobile`, `gender`, `image`, `dob`, `join_date`) VALUES
(1, 'Administrator', 'admin@host.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1234567890, 'M', '/images/avatar.png', '2017-12-05', '2017-10-01 10:33:43'),
(2, 'sujith', 'mesujithks3@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'student', 9656008103, 'M', '/images/avatar.png', '1997-12-05', '2017-10-01 11:12:50'),
(3, 'test', 'test@host.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'student', 1234567890, 'M', '/images/avatar.png', '1991-01-01', '2017-10-01 11:26:52'),
(4, 'Faculty 1', 'faculty@host.com', '21232f297a57a5a743894a0e4a801fc3', 'faculty', 9876543210, 'F', 'images/avatar.png', '1997-07-26', '2017-10-01 15:50:28'),
(5, 'Ajaydev', 'ajay@host.com', '21232f297a57a5a743894a0e4a801fc3', 'faculty', 9037861390, 'M', '/images/avatar.png', '1997-04-20', '2017-10-04 04:12:41');

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
  ADD KEY `courseId` (`courseId`);

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
  ADD KEY `test_id` (`test_id`);

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
  ADD KEY `user` (`user`);

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
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `discussion_answer`
--
ALTER TABLE `discussion_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussion_chat`
--
ALTER TABLE `discussion_chat`
  MODIFY `chatdetail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussion_chatmaster`
--
ALTER TABLE `discussion_chatmaster`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussion_question`
--
ALTER TABLE `discussion_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussion_subtopic`
--
ALTER TABLE `discussion_subtopic`
  MODIFY `subtopic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussion_topic`
--
ALTER TABLE `discussion_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `course_content_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`);

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
  ADD CONSTRAINT `discussion_subtopic_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `discussion_topic` (`topic_id`);

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
  ADD CONSTRAINT `exam_result_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `exam` (`test_id`);

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
