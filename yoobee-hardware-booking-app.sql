-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2016 at 08:15 PM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devicebooking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tb`
--

CREATE TABLE `bookings_tb` (
  `booking_id`   INT(11)   NOT NULL,
  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_id`   INT(11)            DEFAULT NULL,
  `start_date`   DATE               DEFAULT NULL,
  `end_date`     DATE               DEFAULT NULL,
  `status`       VARCHAR(255)       DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `bookings_tb`
--

INSERT INTO `bookings_tb` (`booking_id`, `date_created`, `student_id`, `start_date`, `end_date`, `status`) VALUES
  (18, '2016-05-11 23:09:28', 8, '2016-05-31', '2016-06-02', 'Awaiting Collection'),
  (19, '2016-05-15 20:20:44', 8, '2016-06-08', '2016-06-09', 'Awaiting Collection'),
  (20, '2016-05-16 19:55:26', 8, '2016-06-10', '2016-06-11', 'Awaiting Collection');

-- --------------------------------------------------------

--
-- Table structure for table `categories_tb`
--

CREATE TABLE `categories_tb` (
  `category_id`   INT(11)      NOT NULL,
  `category_name` VARCHAR(255) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `categories_tb`
--

INSERT INTO `categories_tb` (`category_id`, `category_name`) VALUES
  (1, 'Cameras'),
  (2, 'Flash photography'),
  (3, ' Optical filters'),
  (4, 'Photographic shutters'),
  (5, 'Tripod');

-- --------------------------------------------------------

--
-- Table structure for table `devices_tb`
--

CREATE TABLE `devices_tb` (
  `device_id`   INT(11) NOT NULL,
  `device_name` VARCHAR(255) DEFAULT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `category_id` INT(11)      DEFAULT NULL,
  `image_url`   VARCHAR(255) DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `devices_tb`
--

INSERT INTO `devices_tb` (`device_id`, `device_name`, `description`, `category_id`, `image_url`) VALUES
  (1, 'Nikon Coolpix S97000',
   'The Nikon Coolpix S9700 camera packs a 30x zoom lens into a compact body with Wi-Fi. And its images, even at high ISOs, are impressive.',
   2, '12441-3.png'),
  (2, 'Sony Cyber-shot DSC-RX10', 'The Sony Cyber-shot DSC-RX10 is a bridge-style, long-zoom camera that gets just about everything right, and its steep asking price reflects its impeccable quality.', 2, 'ba940-1.png'),
  (5, 'Sony Alpha 6000', 'The Sony Alpha 6000 focuses instantly and shoots at 11.1fps. Its image quality matches its speed, making it our top pick for entry-level mirrorless cameras.', 3, '773be-2.png'),
  (6, 'Olympus OM-D E-M1', 'With gorgeous images—even in low light, incredible speed, and a wealth of high-end features, the Olympus OM-D E-M1 is the best Micro Four Thirds camera that money can buy.', 3, 'd9603-7.png'),
  (9, 'Nikon D5300', 'The Wi-Fi- and GPS-equipped Nikon D5300 D-SLR is a modest upgrade from the previous model, but it\'s just as worthy', 4, 'de009-6.png'),
  (10, 'Pentax K-3', 'The Pentax K-3 is the most refined K-mount SLR to date, offering fast autofocus and superb image quality. Its video autofocus implementation isn\'t the best, but it still manages to snag our Editors\' Choice award.', 4, '44b38-1.png'),
  (11, 'Canon EOS 6D', 'The Canon EOS 6D is a top-notch full-frame camera in a compact body. With a relatively affordable price, enthusiast-friendly features, and spectacular image quality, it\'s an easy Editors\' Choice.', 5, 'c52c2-8.png'),
  (12, 'Canon PowerShot Elph 330 HS ', 'One of the best cameras you can buy for less than $250, the svelte, 10x-zoom Canon PowerShot Elph 330 HS takes beautiful pictures and lets you send them instantaneously with integrated Wi-Fi.', 5, '704b6-3.png'),
  (14, 'Olympus Tough TG-2 iHS', 'The Olympus Tough TG-2 iHS rugged camera is a very minor upgrade to the excellent TG-1. ', 1, '24126-9.png'),
  (15, 'Samsung Galaxy S7 Edge', 'The gorgeous Galaxy S7 Edge makes the best Android phone that much better.', 1, '67c0d-10.png'),
  (16, 'Apple iPhone 6s Plus', 'The iPhone 6S Plus has a few key advantages that give it an edge for serious iPhone users, but its big body still may not fit for a lot of people.', 2, '99063-5.png'),
  (17, 'Samsung Galaxy Note 5',
   'Samsung\'s Galaxy Note 5 is excellent overall, and the only phone to buy if you want to write by hand. However, you\'ll pay a huge premium for a modest upgrade from last year\'s model, and less pricey competitors will satisfy many.',
   3, 'd75e1-9.png'),
  (18, 'LG V10',
   'Packed to the brim with features, the V10 is LG\'s best smartphone yet. But if you don\'t need two front cameras and dual displays, look elsewhere for something less expensive.',
   4, '109b2-3.png'),
  (25, 'Samsung Galaxy S7 Edge', 'The gorgeous Galaxy S7 Edge makes the best Android phone that much better.', 5,
   'e6ef5-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `programmes_tb`
--

CREATE TABLE `programmes_tb` (
  `programme_id`   INT(11)      NOT NULL,
  `programme_name` VARCHAR(255) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Table structure for table `selected_devices_tb`
--

CREATE TABLE `selected_devices_tb` (
  `selected_devices_id` INT(11) NOT NULL,
  `booking_id`          INT(11) NOT NULL,
  `device_id`           INT(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `selected_devices_tb`
--

INSERT INTO `selected_devices_tb` (`selected_devices_id`, `booking_id`, `device_id`) VALUES
  (19, 18, 1),
  (20, 18, 2),
  (21, 19, 14),
  (22, 19, 15),
  (23, 20, 1),
  (24, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `students_tb`
--

CREATE TABLE `students_tb` (
  `student_id`   INT(11)      NOT NULL,
  `username`     VARCHAR(255)          DEFAULT NULL,
  `password`     VARCHAR(255)          DEFAULT NULL,
  `fullname`     VARCHAR(255) NOT NULL,
  `address`      VARCHAR(255) NOT NULL,
  `phone`        VARCHAR(255) NOT NULL,
  `email`        VARCHAR(255) NOT NULL,
  `programme_id` INT(11)               DEFAULT NULL,
  `role`         VARCHAR(11)  NOT NULL DEFAULT 'student'
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `students_tb`
--

INSERT INTO `students_tb` (`student_id`, `username`, `password`, `fullname`, `address`, `phone`, `email`, `programme_id`, `role`)
VALUES
  (8, 'beshad', '8cb2237d0679ca88db6464eac60da96345513964', 'beshad ghorbani',
   '34 rockview place, mount pleasant, Christchurch 8081', '021-2775060', 'admin@xeba.co.nz', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `categories_tb`
--
ALTER TABLE `categories_tb`
ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `devices_tb`
--
ALTER TABLE `devices_tb`
ADD PRIMARY KEY (`device_id`),
ADD UNIQUE KEY `device_id` (`device_id`);

--
-- Indexes for table `programmes_tb`
--
ALTER TABLE `programmes_tb`
ADD PRIMARY KEY (`programme_id`);

--
-- Indexes for table `selected_devices_tb`
--
ALTER TABLE `selected_devices_tb`
ADD PRIMARY KEY (`selected_devices_id`);

--
-- Indexes for table `students_tb`
--
ALTER TABLE `students_tb`
ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings_tb`
--
ALTER TABLE `bookings_tb`
MODIFY `booking_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 21;
--
-- AUTO_INCREMENT for table `categories_tb`
--
ALTER TABLE `categories_tb`
MODIFY `category_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `devices_tb`
--
ALTER TABLE `devices_tb`
MODIFY `device_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 26;
--
-- AUTO_INCREMENT for table `programmes_tb`
--
ALTER TABLE `programmes_tb`
MODIFY `programme_id` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `selected_devices_tb`
--
ALTER TABLE `selected_devices_tb`
MODIFY `selected_devices_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 25;
--
-- AUTO_INCREMENT for table `students_tb`
--
ALTER TABLE `students_tb`
MODIFY `student_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 9;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
