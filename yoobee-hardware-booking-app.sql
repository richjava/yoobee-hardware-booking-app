-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2016 at 10:07 PM
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
  `booking_id`          INT(11) NOT NULL,
  `student_id`          INT(11) DEFAULT NULL,
  `selected_devices_id` INT(11) DEFAULT NULL,
  `start_date`          DATE    DEFAULT NULL,
  `end_date`            DATE    DEFAULT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `bookings_tb`
--

INSERT INTO `bookings_tb` (`booking_id`, `student_id`, `selected_devices_id`, `start_date`, `end_date`) VALUES
  (1, NULL, 0, '2016-04-20', '2016-04-21'),
  (2, NULL, 1, '2016-04-27', '2016-04-29');

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
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices_tb`
--

INSERT INTO `devices_tb` (`device_id`, `device_name`, `description`, `category_id`) VALUES
  (1, 'Sony A7R II',
   'Type: Mirrorless | Sensor size: full frame, 42.4Mp | Lens: Sony E mount (full frame) | Monitor: 3-inch tilting, 1,229k dots | Viewfinder: EVF | Continuous shooting: 5fps | Movies: 4K | User level: Expert',
   1),
  (2, 'Olympus OM-D E-M10 II',
   'Type: Mirrorless | Sensor size: Micro Four Thirds, 16.1MP | Lens: Micro Four Thirds | Monitor: 3-inch tilting, 1,037k dots | Viewfinder: EVF | Continuous shooting: 8.5fps | Movies: 1080 | User level: Enthusiast',
   1),
  (3, 'TomTom Bandit',
   'Type: action cam | Weight: 190g | Waterproofing: Splashproof, with lens swap | 4K video: 15fps | 1080: up to 60fps | 720: up to 120fps | Stills resolution: 16Mp | Battery life: 3hrs',
   2),
  (4, 'Sony RX100 III',
   'Type: high-end compact | Sensor size: 1-inch, CMOS | Megapixels: 20.1 | Lens: 24-70mm-equivalent, f1.8-2.8 | Screen: 3-inch tilting, 1,228,800 dots | Viewfinder: EVF | Continuous shooting: 5fps | Video: 1080p | User level: Enthusiast/expert',
   2),
  (5, 'Panasonic TZ70/ZS50',
   'Type: Compact travel camera: Sensor: 1/2.3-inch, 12.1Mp | Lens: 24-720mm, f/3.3-6.4 | Monitor: 3-inch, 1,040K dots | Viewfinder: Electronic | Continuous shooting: 10fps | Movies: 1080 | User level:Beginner/enthusiast',
   3),
  (6, 'Leica Q',
   'Type: high-end compact | Sensor size: Full frame | Megapixels: 24MP | Lens: 28mm, f/1.7 | Screen: 3-inch touch-screen, 1,040K dots | Viewfinder: EVF | Continuous shooting: 10fps | Video: 1080p | User level: Expert',
   3),
  (7, 'Nikon D7200',
   'Type: DSLR | Sensor: APS-C, 24.2Mp | Lenses: Nikon DX, FX | Monitor: 3.2-inch, 1,229K dots | Viewfinder: Optical | Continuous shooting: 6fps | Movies: 1080p | User level: Enthusiast',
   4),
  (8, 'Canon EOS 760D',
   'Type: DSLR | Sensor: APS-C, 24.2Mp | Lenses: Canon EF/EF-S | Monitor: 3-inch articulating, 1,040K dots | Viewfinder: Optical | Continuous shooting: 5fps | Movies: 1080p | User level: Beginner/enthusiast',
   4),
  (9, 'Panasonic LX100',
   'Type: High-end compact | Sensor: Micro Four Thirds, 12.8MP | Lens: 24-75mm, f/1.7-2.8 | Monitor: 3-inch, 921K dots | Viewfinder: Electronic | Continuous shooting: 11fps | Movies: 4K | User level:Expert',
   5),
  (10, 'Panasonic FZ1000',
   'Type: Bridge camera | Sensor: 1-inch, 20.1Mp | Lens: 25-400mm, f/2.8-4.0 | Monitor: 3-inch articulating, 921K dots | Viewfinder: Electronic | Continuous shooting: 12fps | Movies: 4K | User level: Enthusiast',
   5);

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
  `selected_devices_id` INT(11)      NOT NULL,
  `booking_id`          VARCHAR(255) NOT NULL,
  `device_id`           VARCHAR(255) NOT NULL
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 15
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `selected_devices_tb`
--

INSERT INTO `selected_devices_tb` (`selected_devices_id`, `booking_id`, `device_id`) VALUES
  (1, '1', '10'),
  (4, '1', '1'),
  (5, '0', '4'),
  (8, '0', '3'),
  (9, '2', '7'),
  (10, '2', '8'),
  (11, '2', '10');

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
  (6, 'beshad', '12345', 'sdfg', 'sdg', 'dsfgsdf', 'email@email.com', NULL);

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
MODIFY `booking_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 5;
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
MODIFY `selected_devices_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 15;
--
-- AUTO_INCREMENT for table `students_tb`
--
ALTER TABLE `students_tb`
MODIFY `student_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 7;