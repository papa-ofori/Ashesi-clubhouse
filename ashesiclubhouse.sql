-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 08:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashesiclubhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'Admin', '$2y$10$CAdErCRnMDNNjHzN7JwnZeR.yOiT563ptQq1xCBaiJa');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `meeting_days` varchar(100) NOT NULL,
  `meeting_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(250) NOT NULL,
  `club_name` varchar(250) NOT NULL,
  `event_description` longtext NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_venue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `club_name`, `event_description`, `event_date`, `event_time`, `event_venue`) VALUES
(1, 'Josiah Summit', 'J Force', 'A conference held to equip attendees with life lessons and knowledge from seasoned veterans in their respective fields. The guest speakers for this years’ event include Dr. Mensah Otabil, Dr Awuah, Dr Osei Kwame Despite', '2021-09-01', '09:00:00', 'R115'),
(2, 'Worship Night 2021', 'Kingdom Christian Fellowship', 'KCF presents our annual worship night. An evening service specially put together to allow the Ashesi community thank God for bring us through the current year. Ministering at this years worship night is Joe Mettle, Maverick City, MOG music and KCF’ very own Kingdom Sanctuary Choir', '2021-09-22', '16:00:00', 'Archer Cornfield Courtyard'),
(3, 'Choral Flow', 'Ashesi Choral', 'A power packed program to bring to you a plethora of Christmas carols to celebrate the season, from old hymns to local jams. Come along and bring a friend. Tis the season to be Jolly!!!!', '2021-09-25', '10:00:00', 'Banquet Hall'),
(4, 'Hackathon ', 'Cyber Geeks ', 'Come one come all, nerds, programmers, software developers to Hackathon a programming competition where you can win amazing prizes. For this year’s event we have a plethora of challenges and competitions based on web development, python and java. Come learn, compete and win ', '2021-10-02', '16:00:00', 'The Hive'),
(5, 'Investment Summit', 'Ashesi Investment Club', 'Ghana’s premier business minds share their knowledge and give insight into Ghana’s financial future as well as how to operate in the international market. This event would be graced by many amazing businessmen and women including Ernesto Taricone, Honorable Kennedy Agyapong amongst others ', '2021-10-05', '10:00:00', 'RB 100'),
(6, 'Talk on diversity in the Ghanaian context', 'Model UN', 'Join our host of panelist as we discuss the role, importance, benefits and risks of foreign nationals in Ghana as well as the international laws that govern immigration.\r\n\r\n', '2021-10-14', '09:00:00', 'The Hive'),
(7, 'The Entrepreneurs Hub ', 'Investment', 'This is an event specifically crafted for entrepreneurs and prospective entrepreneurs to present and fine tune their business ideas, receiving feedback from both their peers and business owners as well as receive funds from prospective investors. ', '2021-10-18', '14:00:00', 'RB100'),
(8, 'Talk to the hands', 'Ashesi Sign Language', 'On this day set aside to raise awareness of the importance of sign language in the full realization of the human rights of people who are deaf, join the sign language club and to learn about the history of sign language, learn about the important roles people hearing impaired people have played and learn how to communicate in sign language.', '2021-10-27', '13:00:00', 'Norton Mulsky'),
(9, 'Berekuso Clean Up ', 'Ashesi Leo Club', 'Come with your cleaning utensils and a heart of service as the Ashesi Leo Club presents the Berekuso cleanup project where we partner with the townspeople to make their community cleaner and more hygienic ', '2021-11-30', '09:00:00', 'Berekusu'),
(10, 'Estate Experience', 'Real Estate', 'The real estate club presents the estate experience, a session during which students can gain more knowledge about property management, forge connections with other real estate companies and apply for internships.', '2021-11-27', '12:00:00', 'RB100');

-- --------------------------------------------------------

--
-- Table structure for table `registered_students_details`
--

CREATE TABLE `registered_students_details` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `student_id` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `club_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_students_details`
--

INSERT INTO `registered_students_details` (`id`, `fname`, `lname`, `email`, `student_id`, `gender`, `class`, `club_name`) VALUES
(1, 'Alex', 'Asante', 'alex.ofori-asante@ashesi.edu.gh', 21322022, 'Male', '2022', 'J force'),
(2, 'Ben', 'Yaadom', 'ben.yaadom@ashesi.edu.gh', 21672025, 'Male', '2025', 'Cyber Geeks'),
(3, 'Chudah', 'Yakung', 'chudah.yakung@ashesi.edu.gh', 89672024, 'Male', '2024', 'Real Estate'),
(4, 'Harry', 'Lamptey', 'harry.lamptey@ashesi.edu.gh', 34562023, 'Male', '2023', 'Kingdom Christian Fellowship'),
(6, 'Sedwen', 'Brook', 'sedwenbrook@ashesi.edu.gh', 78542022, 'Male', '2022', 'J force'),
(7, 'Sandra', 'Wilson', 'sandra.wilson@ashesi.edu.gh', 23112024, 'Female', '2024', 'Morden Un'),
(8, 'Yaw', 'Asare', 'yaw.asare@ashesi.edu.gh', 10032025, 'Male', '2025', 'J force'),
(11, 'Hamed', 'Traore', 'hamed.traore@ashesi.edu.gh', 11692023, 'Male', '2023', 'Ashesi Leo Club'),
(12, 'Kezia', 'Erien', 'kezia.erien@ashesi.edu.gh', 79502023, 'Female', '2023', 'Real Estate'),
(14, 'Emmanuel', 'Kwarase', 'emmanuel.kwarase@ashesi.edu.gh', 73212023, 'Male', '2023', 'J force'),
(15, 'Bright', 'Nellio', 'bright.nellio@ashesi.edu.gh', 96372023, 'Male', '2023', 'Ashesi Sign Language'),
(21, 'Elizabeth', 'Mayor', 'elizabeth.mayor@ashesi.edu.gh', 76342023, 'Female', '2023', 'Cyber Geeks'),
(22, 'Sarah', 'Ackisam', 'sarah.ackisam@ashesi.edu.gh', 56342023, 'Female', '2023', 'Investment Club'),
(23, 'Felix', 'Anthony', 'felix.anthony@ashesi.edu.gh', 24532024, 'Male', '2024', 'Real Estate'),
(24, 'Miracle', 'Darko', 'miracle.darko@ashesi.edu.gh', 78932024, 'Male', '2024', 'Ashesi Sign Language'),
(25, 'Desire', 'Mensah', 'desire.mensah@ashesi.edu.gh', 94672022, 'Female', '2022', 'Cyber Geeks'),
(26, 'Thoko', 'Donald', 'thoko.donald@ashesi.edu.gh', 39852023, 'Male', '2023', 'Ashesi coral'),
(27, 'Amina', 'kweku', 'amina.kweku@ashesi.edu.gh', 45722025, 'Female', '2025', 'Investment Club'),
(28, 'Nana', 'Opomea', 'Nana.opomea@ashesi.edu.gh', 47642023, 'Female', '2023', 'Kingdom Christian Fellowship'),
(29, 'Tawina', 'Chaposa', 'tawina.chaposa@ashesi.edu.gh', 56432023, 'Female', '2023', 'Kingdom Christian Fellowship'),
(30, 'Papa', 'Fio', 'papa.fio@ashesi.edu.gh', 73452022, 'Male', '2022', 'Cyber Geeks'),
(31, 'Joseph', 'Mara', 'joseph.mara@ashesi.edu.gh', 45372025, 'Male', '2025', 'Ashesi Leo Club'),
(32, 'Tabitha', 'Banda', 'tabitha.banda@ashesi.edu.gh', 28462022, 'Female', '2022', 'J force'),
(33, 'Papa', 'Asante', 'papa.ofori-asante@ashesi.edu.gh', 71812022, 'Male', '2022', 'J force'),
(34, 'Eben', 'Akolly', 'ebenezer.akolly@ashesi.edu.gh', 45612023, 'Male', '2023', 'Cyber Geeks'),
(35, 'Papa', 'Asante', 'papa.ofori-asante@ashesi.edu.gh', 21212022, 'Male', '2022', 'J force');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_students_details`
--
ALTER TABLE `registered_students_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminn`
--
ALTER TABLE `adminn`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registered_students_details`
--
ALTER TABLE `registered_students_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
