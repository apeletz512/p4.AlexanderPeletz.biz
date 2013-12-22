-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 10:04 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `alexan22_p4_AlexanderPeletz_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `institution_id` int(11) NOT NULL,
  `class_number` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `class_name` (`class_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `institution_id`, `class_number`, `class_name`) VALUES
(15, 4, 'Med 1', 'Histology'),
(16, 5, 'MESAS-300', 'The History of the Indian Ocean Littoral Regions'),
(17, 5, 'POLS-100', 'Introduction to Political Theory'),
(18, 7, 'LSCI-215', 'Modern Dairy Production Methods'),
(19, 5, 'BIO-190', 'Intro to Biology: Freshman Seminar'),
(20, 5, 'new class', 'new class'),
(21, 5, 'pols-201', ''),
(22, 5, '203', '123'),
(25, 9, 'asdf', 'asfd');

-- --------------------------------------------------------

--
-- Table structure for table `flash_cards`
--

CREATE TABLE `flash_cards` (
  `flash_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `front` varchar(255) NOT NULL,
  `back` varchar(500) NOT NULL,
  PRIMARY KEY (`flash_card_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `flash_cards`
--

INSERT INTO `flash_cards` (`flash_card_id`, `class_id`, `front`, `back`) VALUES
(3, 17, 'Machiavelli', 'Author of ''The Prince'''),
(4, 17, 'Cyrus', 'Ruler of Ancient Persia'),
(5, 17, 'Fun', 'Stuff'),
(6, 17, 'I''m going to', 'have to clean up these flashcards'),
(7, 17, 'Yet Another', 'Flash Card'),
(8, 17, 'qwertyuiopasdfghjklzxcvbnqwertyuiopasdfghjklzxcvbnqwertyuiopasdfghjklzxcvbnqwertyuiopasdfghjklzxcvbnqwertyuiopasdfghjklzxcvbnqwertyuiopasdfghjklzxcvbnqwertyuiopasdfghjklzxcvbnqwertyuiopasdfghjklzxcvbnqwertyuiopasdfghjklzxcvbn', 'back stuff'),
(9, 17, 'Yet another new', 'flash card to test'),
(10, 17, '', ''),
(11, 17, 'A new flashcard', 'A new flashcard'),
(12, 16, '12', '12'),
(13, 15, '', ''),
(14, 15, '''''', ''),
(15, 19, '', ''),
(16, 19, 'field', 'field');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `institution_id` int(11) NOT NULL AUTO_INCREMENT,
  `institution_name` varchar(255) NOT NULL,
  PRIMARY KEY (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`institution_id`, `institution_name`) VALUES
(4, 'Tufts School of Medicine'),
(5, 'Emory University'),
(6, 'Georgia Tech'),
(7, 'University of Wisconsin, Madison'),
(8, '123'),
(9, '1234'),
(10, ''),
(11, '12345'),
(12, '123456'),
(13, '222'),
(14, '333'),
(15, 'Inst'),
(16, '\\''\\'''),
(17, '\\''institution\\'''),
(18, 'new inst');
