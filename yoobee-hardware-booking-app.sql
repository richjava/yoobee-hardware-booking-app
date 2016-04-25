-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2016 at 11:51 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `devicebooking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings_tb`
--

CREATE TABLE `bookings_tb` (
  `booking_id` INT(11)   NOT NULL,
  `student_id` INT(11)        DEFAULT NULL,
  `start_date` TIMESTAMP NULL DEFAULT NULL,
  `end_date`   TIMESTAMP NULL DEFAULT NULL,
  `status`     TINYINT(1)     DEFAULT '0'
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 17
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `bookings_tb`
--

INSERT INTO `bookings_tb` (`booking_id`, `student_id`, `start_date`, `end_date`, `status`) VALUES
  (1, NULL, '2016-04-26 12:00:00', '2016-04-28 12:00:00', 0),
  (2, NULL, '2016-04-17 12:00:00', '2016-04-18 12:00:00', 0),
  (3, NULL, NULL, NULL, 0),
  (4, NULL, NULL, NULL, 0),
  (5, NULL, NULL, NULL, 0),
  (6, NULL, NULL, NULL, 0),
  (7, NULL, '2016-05-05 12:00:00', '2016-05-06 12:00:00', 0),
  (8, NULL, NULL, NULL, 0),
  (9, NULL, '2016-04-19 12:00:00', '2016-04-20 12:00:00', 0),
  (10, NULL, '2016-04-25 12:00:00', '2016-04-26 12:00:00', 0),
  (11, NULL, NULL, NULL, 0),
  (12, NULL, '2016-04-25 12:00:00', '2016-04-26 12:00:00', 0),
  (13, NULL, '2016-04-25 12:00:00', '2016-04-26 12:00:00', 0),
  (14, NULL, '2016-04-11 12:00:00', '2016-04-13 12:00:00', 0),
  (15, NULL, '2016-04-02 11:00:00', '2016-04-06 12:00:00', 0),
  (16, NULL, '2016-04-13 12:00:00', '2016-04-15 12:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories_tb`
--

CREATE TABLE `categories_tb` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 6
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
  `description` varchar(255) DEFAULT NULL,
  `category_id` INT(11)      DEFAULT NULL,
  `image_url`   VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices_tb`
--

INSERT INTO `devices_tb` (`device_id`, `device_name`, `description`, `category_id`, `image_url`) VALUES
  (0, NULL, NULL, NULL, '0ddc9-screen-shot-2016-04-25-at-12.29.33-am.png'),
  (1, 'Sony A7R II 2',
   'Type: Mirrorless | Sensor size: full frame, 42.4Mp | Lens: Sony E mount (full frame) | Monitor: 3-inch tilting, 1,229k dots | Viewfinder: EVF | Continuous shooting: 5fps | Movies: 4K | User level: Expert',
   1, NULL),
  (2, 'Olympus OM-D E-M10 II',
   'TypePPe Mirrorless | Sensor size: Micro Four Thirds, 16.1MP | Lens: Micro Four Thirds | Monitor: 3-inch tilting, 1,037k dots | Viewfinder: EVF | Continuous shooting: 8.5fps | Movies: 1080 | User level: Enthusiast',
   5, NULL),
  (4, 'Sony RX100 IIIIII',
   'Type: high-end compact | Sensor size: 1-inch, CMOS | Megapixels: 20.1 | Lens: 24-70mm-equivalent, f1.8-2.8 | Screen: 3-inch tilting, 1,228,800 dots | Viewfinder: EVF | Continuous shooting: 5fps | Video: 1080p | User level: Enthusiast/expert',
   2, NULL),
  (5, 'Panasonic TZ70/ZS50',
   'Type: Compact travel camera: Sensor: 1/2.3-inch, 12.1Mp | Lens: 24-720mm, f/3.3-6.4 | Monitor: 3-inch, 1,040K dots | Viewfinder: Electronic | Continuous shooting: 10fps | Movies: 1080 | User level:Beginner/enthusiast',
   3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programmes_tb`
--

CREATE TABLE `programmes_tb` (
  `programme_id` int(11) NOT NULL,
  `programme_name` varchar(255) NOT NULL
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
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `selected_devices_tb`
--

INSERT INTO `selected_devices_tb` (`selected_devices_id`, `booking_id`, `device_id`) VALUES
  (1, 2, 1),
  (2, 2, 2),
  (3, 7, 7),
  (4, 7, 8),
  (5, 9, 5),
  (6, 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students_tb`
--

CREATE TABLE `students_tb` (
  `student_id`   INT(11)      NOT NULL,
  `username`     VARCHAR(255) DEFAULT NULL,
  `password`     VARCHAR(255) DEFAULT NULL,
  `fullname`     VARCHAR(255) NOT NULL,
  `address`      VARCHAR(255) NOT NULL,
  `phone`        VARCHAR(255) NOT NULL,
  `email`        VARCHAR(255) NOT NULL,
  `programme_id` INT(11)      DEFAULT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `students_tb`
--

INSERT INTO `students_tb` (`student_id`, `username`, `password`, `fullname`, `address`, `phone`, `email`, `programme_id`)
VALUES
  (6, 'beshad', '12345', 'beshad Ghorbani', '34 Rockview Place', '021-2775060', 'email@email.com', 19);

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
ADD PRIMARY KEY (`device_id`);

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
MODIFY `booking_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 17;
--
-- AUTO_INCREMENT for table `categories_tb`
--
ALTER TABLE `categories_tb`
MODIFY `category_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `programmes_tb`
--
ALTER TABLE `programmes_tb`
MODIFY `programme_id` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `selected_devices_tb`
--
ALTER TABLE `selected_devices_tb`
MODIFY `selected_devices_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 7;
--
-- AUTO_INCREMENT for table `students_tb`
--
ALTER TABLE `students_tb`
MODIFY `student_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 7;