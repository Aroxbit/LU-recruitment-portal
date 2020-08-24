-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2020 at 12:28 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `c10_year` int(11) NOT NULL,
  `c12_year` int(11) NOT NULL,
  `ug_year` int(11) NOT NULL,
  `m_year` int(11) NOT NULL,
  `other_year` int(11) NOT NULL,
  `c10_name` varchar(250) NOT NULL,
  `c12_name` varchar(250) NOT NULL,
  `ug_name` varchar(250) NOT NULL,
  `m_name` varchar(250) NOT NULL,
  `other_name` varchar(250) NOT NULL,
  `c10_grade` varchar(10) NOT NULL,
  `c12_grade` varchar(10) NOT NULL,
  `ug_grade` varchar(10) NOT NULL,
  `m_grade` varchar(10) NOT NULL,
  `other_grade` varchar(10) NOT NULL,
  `c10_per` int(11) NOT NULL,
  `c12_per` int(11) NOT NULL,
  `ug_per` int(11) NOT NULL,
  `m_per` int(11) NOT NULL,
  `other_per` int(11) NOT NULL,
  `c10_marks` int(11) NOT NULL,
  `c12_marks` int(11) NOT NULL,
  `ug_marks` int(11) NOT NULL,
  `m_marks` int(11) NOT NULL,
  `other_marks` int(11) NOT NULL,
  `c10_total` int(11) NOT NULL,
  `c12_total` int(11) NOT NULL,
  `ug_total` int(11) NOT NULL,
  `m_total` int(11) NOT NULL,
  `other_total` int(11) NOT NULL,
  `ug_degree` varchar(250) NOT NULL,
  `ug_subject` varchar(250) NOT NULL,
  `m_degree` varchar(250) NOT NULL,
  `m_subject` varchar(250) NOT NULL,
  `other_degree` varchar(250) NOT NULL,
  `other_subject` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `address_one` varchar(250) NOT NULL,
  `address_two` varchar(250) NOT NULL,
  `address_three` varchar(250) NOT NULL,
  `post_office` varchar(250) NOT NULL,
  `police_station` varchar(250) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `parent_phone` varchar(20) NOT NULL,
  `s_address_one` varchar(250) NOT NULL,
  `s_address_two` varchar(250) NOT NULL,
  `s_address_three` varchar(250) NOT NULL,
  `s_post_office` varchar(250) NOT NULL,
  `s_police_station` varchar(250) NOT NULL,
  `s_country` varchar(100) NOT NULL,
  `s_state` varchar(100) NOT NULL,
  `s_district` varchar(100) NOT NULL,
  `s_pin` varchar(100) NOT NULL,
  `s_parent_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `university` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `post` varchar(100) NOT NULL,
  `post_code` varchar(100) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `disability` varchar(250) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `mother_name` varchar(250) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `mother_tongue` varchar(100) NOT NULL,
  `languages` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `category_for` varchar(100) NOT NULL,
  `category_in` varchar(100) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `c10` varchar(250) NOT NULL,
  `c12` varchar(250) NOT NULL,
  `ug` varchar(250) NOT NULL,
  `pg` varchar(250) NOT NULL,
  `net` varchar(250) NOT NULL,
  `other` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `job_nature` varchar(250) NOT NULL,
  `date_joined` varchar(250) NOT NULL,
  `date_left` varchar(250) NOT NULL,
  `pay` varchar(250) NOT NULL,
  `reason` text NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employment_data`
--

CREATE TABLE `employment_data` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `ug_from` varchar(250) NOT NULL,
  `ug_to` varchar(250) NOT NULL,
  `pg_from` varchar(250) NOT NULL,
  `pg_to` varchar(250) NOT NULL,
  `res_from` varchar(250) NOT NULL,
  `res_to` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `university` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `candidate` tinyint(1) NOT NULL DEFAULT '0',
  `photo_sign` tinyint(1) NOT NULL DEFAULT '0',
  `academic` tinyint(1) NOT NULL DEFAULT '0',
  `documents` tinyint(1) NOT NULL DEFAULT '0',
  `specialization` tinyint(1) NOT NULL DEFAULT '0',
  `payment` tinyint(1) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `net`
--

CREATE TABLE `net` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `agency` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo_sign`
--

CREATE TABLE `photo_sign` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `sign` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rac_a`
--

CREATE TABLE `rac_a` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `journal` varchar(250) NOT NULL,
  `isbn` varchar(250) NOT NULL,
  `peer` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `authorship` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rac_b`
--

CREATE TABLE `rac_b` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `authorship` varchar(250) NOT NULL,
  `isbn` varchar(250) NOT NULL,
  `publisher` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `single` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rac_c`
--

CREATE TABLE `rac_c` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `agency` varchar(250) NOT NULL,
  `period` varchar(250) NOT NULL,
  `grand` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rac_d`
--

CREATE TABLE `rac_d` (
  `id` int(11) NOT NULL,
  `course` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL,
  `thesis` varchar(250) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rac_e1`
--

CREATE TABLE `rac_e1` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `paper` varchar(250) NOT NULL,
  `confrence` varchar(250) NOT NULL,
  `organiser` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rac_e2`
--

CREATE TABLE `rac_e2` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `lecture` varchar(250) NOT NULL,
  `confrence` varchar(250) NOT NULL,
  `organiser` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rac_f`
--

CREATE TABLE `rac_f` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `nature` varchar(250) NOT NULL,
  `module` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `score` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rac_g`
--

CREATE TABLE `rac_g` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `post` varchar(250) NOT NULL,
  `nature` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `organization` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `university` varchar(250) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `teaching` varchar(250) NOT NULL,
  `extension` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `research` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `detail` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `pass` varchar(200) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `v_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `employment_data`
--
ALTER TABLE `employment_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `net`
--
ALTER TABLE `net`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `photo_sign`
--
ALTER TABLE `photo_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rac_a`
--
ALTER TABLE `rac_a`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `rac_b`
--
ALTER TABLE `rac_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `rac_c`
--
ALTER TABLE `rac_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `rac_d`
--
ALTER TABLE `rac_d`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `rac_e1`
--
ALTER TABLE `rac_e1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `rac_e2`
--
ALTER TABLE `rac_e2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `rac_f`
--
ALTER TABLE `rac_f`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `rac_g`
--
ALTER TABLE `rac_g`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `v_id` (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employment_data`
--
ALTER TABLE `employment_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `net`
--
ALTER TABLE `net`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `photo_sign`
--
ALTER TABLE `photo_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rac_a`
--
ALTER TABLE `rac_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rac_b`
--
ALTER TABLE `rac_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rac_c`
--
ALTER TABLE `rac_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rac_d`
--
ALTER TABLE `rac_d`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rac_e1`
--
ALTER TABLE `rac_e1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rac_e2`
--
ALTER TABLE `rac_e2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rac_f`
--
ALTER TABLE `rac_f`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rac_g`
--
ALTER TABLE `rac_g`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic`
--
ALTER TABLE `academic`
  ADD CONSTRAINT `academic_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `employment_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `employment_data`
--
ALTER TABLE `employment_data`
  ADD CONSTRAINT `employment_data_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `net`
--
ALTER TABLE `net`
  ADD CONSTRAINT `net_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `other`
--
ALTER TABLE `other`
  ADD CONSTRAINT `other_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `rac_a`
--
ALTER TABLE `rac_a`
  ADD CONSTRAINT `rac_a_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `rac_b`
--
ALTER TABLE `rac_b`
  ADD CONSTRAINT `rac_b_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `rac_c`
--
ALTER TABLE `rac_c`
  ADD CONSTRAINT `rac_c_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `rac_d`
--
ALTER TABLE `rac_d`
  ADD CONSTRAINT `rac_d_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `rac_e1`
--
ALTER TABLE `rac_e1`
  ADD CONSTRAINT `rac_e1_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `rac_e2`
--
ALTER TABLE `rac_e2`
  ADD CONSTRAINT `rac_e2_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `rac_f`
--
ALTER TABLE `rac_f`
  ADD CONSTRAINT `rac_f_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `rac_g`
--
ALTER TABLE `rac_g`
  ADD CONSTRAINT `rac_g_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `research`
--
ALTER TABLE `research`
  ADD CONSTRAINT `research_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

--
-- Constraints for table `specialization`
--
ALTER TABLE `specialization`
  ADD CONSTRAINT `specialization_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
