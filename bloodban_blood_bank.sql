-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2022 at 10:53 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodban_blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'jahid', 'jahidrana', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `blood_group`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'O+'),
(6, 'O-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `contact_id` int(11) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_mail` varchar(50) NOT NULL,
  `contact_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contact_id`, `contact_address`, `contact_mail`, `contact_phone`) VALUES
(1, 'Blood Bank,Jashore', 'bloodbank@gmail.com', '7056550477');

-- --------------------------------------------------------

--
-- Table structure for table `district_tb`
--

CREATE TABLE `district_tb` (
  `id` int(50) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `dist_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district_tb`
--

INSERT INTO `district_tb` (`id`, `district_name`, `dist_id`) VALUES
(1, 'Rajshahi', '1'),
(2, 'Bogura', '2'),
(3, 'Naogaon', '3'),
(4, 'Joypurhat', '4'),
(5, 'Natore', '5'),
(6, 'Jashore', '6');

-- --------------------------------------------------------

--
-- Table structure for table `donor_details`
--

CREATE TABLE `donor_details` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `donor_number` varchar(10) NOT NULL,
  `donor_mail` varchar(50) DEFAULT NULL,
  `donor_age` int(60) NOT NULL,
  `donor_gender` varchar(10) NOT NULL,
  `donor_blood` varchar(10) NOT NULL,
  `donor_district` varchar(100) NOT NULL,
  `donor_upzila` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_details`
--

INSERT INTO `donor_details` (`donor_id`, `donor_name`, `donor_number`, `donor_mail`, `donor_age`, `donor_gender`, `donor_blood`, `donor_district`, `donor_upzila`) VALUES
(1, 'Jahid Rana', '0173960188', 'jahidrana2020@gmail.com', 22, 'Male', ' A+', 'Jashore', 'Jessore Sadar'),
(3, 'Ridwan', '0175981028', 'topsellerhouse@gmail.com', 22, 'Male', ' A+', 'Joypurhat', 'Khetlal'),
(4, 'Sayem', '0175981028', 'jahidrana@gmail.com', 22, 'Male', 'O+', 'Joypurhat', 'Joypurhat Sadar'),
(5, 'Raihan', '0175981028', 'jahidrana@gmail.com', 22, 'Male', 'O+', 'Joypurhat', 'Joypurhat Sadar'),
(7, 'Rana', '0148666', 'jahidrana2020@gmail.com', 23, 'Male', ' O-', 'Jashore', 'Bagherpara'),
(10, 'Jahid Rana', '0148666', 'jahidrana2020@gmail.com', 22, 'Male', ' AB+', 'Joypurhat', 'Panchbibi'),
(12, 'Jahid Rana', '0148666', 'jahidrana2020@gmail.com', 22, 'Male', ' B-', 'Joypurhat', 'Akkelpur'),
(13, 'Jahid Rana', '', 'jahidrana2020@gmail.com', 22, 'Male', ' A+', 'Joypurhat', 'Joypurhat Sadar'),
(14, 'Jahid Rana', '0173960188', 'jahidrana2020@gmail.com', 22, 'Male', 'O+', 'Jashore', 'Jhikargachha'),
(15, 'MD. JAHID RANA', '148666', 'jahidrana2020@gmail.com', 23, 'Male', ' O+', '4', '4');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_type` varchar(50) DEFAULT NULL,
  `page_data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(2, 'Why Become Donor', 'donor', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Blood is the most precious gift that anyone can give to another person the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components  red cells, platelets and plasma which can be used individually for patients with specific conditions. Safe blood saves lives and improves health. Blood transfusion is needed for:\r\n<ul><li>women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.\r\n</li><li>children with severe anaemia often resulting from malaria or malnutrition.\r\n</li><li>people with severe trauma following man-made and natural disasters.\r\n</li><li>many complex medical and surgical procedures and cancer patients.</li></ul>\r\n<br>It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia. There is a constant need for regular blood supply because blood can be stored for only a limited time before use. Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.</span>'),
(3, 'About Us ', 'aboutus', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Blood bank is a place where blood bag that is collected from blood donation events is stored in one place. The term blood bank refers to a division of a hospital laboratory where the storage of blood product occurs and where proper testing is performed to reduce the risk of transfusion related events . The process of managing the blood bag that is received from the blood donation events needs a proper and systematic management. The blood bag must be handled with care and treated thoroughly as it is related to someones life. The development of Web-based Blood Bank And Donation Management System (BBDMS) is proposed to provide a management functional to the blood bank in order to handle the blood bag and to make entries of the individuals who want to donate blood and who are in need.</span>'),
(4, 'The Need For Blood', 'needforblood', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many reasons patients need blood. A common misunderstanding about blood usage is that accident victims are the patients who use the most blood. Actually, people needing the most blood include those:\n1) Being treated for cancer<br>\n2) Undergoing orthopedic surgeries<br>\n3) Undergoing cardiovascular surgeries<br>\n4) Being treated for inherited blood disorders</span>'),
(5, 'Blood Tips', 'bloodtips', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\n1) You must be in good health. <br>\n2) Hydrate and eat a healthy meal before your donation.<br>\n3) You’re never too old to donate blood. <br>\n4) Rest and relaxed.<br>\n5) Don’t forget your FREE post-donation snack. \n</span>'),
(6, 'Who you could Help', 'whoyouhelp', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\nEvery 2 seconds, someone in the World needs blood. Donating blood can help:\n\n1) People who go through disasters or emergency situations.<br>\n2) People who lose blood during major surgeries.<br>\n3) People who have lost blood because of a gastrointestinal bleed.<br>\n4) Women who have serious complications during pregnancy or childbirth.<br>\n5) People with cancer or severe anemia sometimes caused by thalassemia or sickle cell disease.<br>\n</span>'),
(7, 'Blood Groups', 'bloodgroups', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\n  <p>  Blood group of any human being will mainly fall in any one of the following groups.</p>\n                <ul>\n\n                  <li>A positive or A negative</li>\n                  <li>B positive or B negative</li>\n                  <li>O positive or O negative</li>\n                  <li>AB positive or AB negative.</li>\n                </ul>\n                <p>Your blood group is determined by the genes you inherit from your parents.<br>\n                  A healthy diet helps ensure a successful blood donation, and also makes you feel better!\n                </p>\n\n</span>'),
(8, 'Universal Donors And Recepients', 'universal', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\n  <p>\nThe most common blood type is O, followed by type A.\n\nType O individuals are often called \"universal donors\" since their blood can be transfused into persons with any blood type. Those with type AB blood are called \"universal recipients\" because they can receive blood of any type.</p>\n\n            For emergency transfusions, blood group type O negative blood is the variety of blood that has the lowest risk of causing serious reactions for most people who receive it. Because of this, it\'s sometimes called the universal blood donor type.\n\n</span>');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `names` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `age` int(10) NOT NULL,
  `phone` text NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `img_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `username`, `names`, `email`, `age`, `phone`, `blood_group`, `address`, `gender`, `img_file`) VALUES
(8, 'JR', 'MD. JAHID RANA', 'jahidrana2020@gmail.', 22, '148666', ' O+', 'Tarakul,Uttorhatshahor,Khetlal,Joypurhat', 'Male', '16-07-22-jahid.jpg'),
(9, 'check', 'Check account', 'check@gmail.com', 21, '01749057274', ' O+', 'jashore', 'Male', '18-07-22-photo-1608681299041-cc19878f79f1.jpg'),
(10, 'ridwan1', 'Ridwan dewan', 'ridwan@gmail.com', 25, '01739601888', ' A+', 'Bangladesh', 'Male', '21-07-22-Big seller point.png');

-- --------------------------------------------------------

--
-- Table structure for table `upzila_tb`
--

CREATE TABLE `upzila_tb` (
  `uid` int(30) NOT NULL,
  `upzila_name` varchar(100) NOT NULL,
  `dist_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upzila_tb`
--

INSERT INTO `upzila_tb` (`uid`, `upzila_name`, `dist_id`) VALUES
(1, 'Akkelpur', 4),
(2, 'Joypurhat Sadar', 4),
(3, 'Kalai', 4),
(4, 'Khetlal', 4),
(5, 'Panchbibi', 4),
(6, 'Jessore Sadar', 6),
(7, 'Jhikargachha', 6),
(8, 'Manirampur', 6),
(9, 'Bagherpara', 6),
(10, 'Abhaynagar ', 6),
(11, 'Keshabpur', 6),
(12, 'Sharsha ', 6),
(13, 'Chaugachha', 6),
(14, 'Bagmara', 1),
(15, 'Paba', 1),
(16, 'Bogura Sadar', 2),
(17, 'Sherpur', 2),
(18, 'Atrai', 3),
(19, 'Mohadebpur', 3),
(20, 'Natore sador', 5),
(21, 'Naldanga', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `phone` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone`, `username`, `password`, `created_at`) VALUES
(15, '01749057274', 'safia', '21232f297a57a5a743894a0e4a801fc3', '2022-07-22 22:47:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `district_tb`
--
ALTER TABLE `district_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD UNIQUE KEY `page_id` (`page_id`),
  ADD UNIQUE KEY `page_type` (`page_type`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upzila_tb`
--
ALTER TABLE `upzila_tb`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district_tb`
--
ALTER TABLE `district_tb`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donor_details`
--
ALTER TABLE `donor_details`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `upzila_tb`
--
ALTER TABLE `upzila_tb`
  MODIFY `uid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
