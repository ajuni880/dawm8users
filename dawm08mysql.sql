-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 12:24 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dawm08mysql`
--
CREATE DATABASE IF NOT EXISTS `dawm08mysql` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dawm08mysql`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  KEY `bgen_id_fk` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `genre_id`) VALUES
(1, 'El senyor de los anillos 5', 'JRR Tolkien', 1),
(2, 'El senyor de los anillos 2', 'JRR Tolkien', 1),
(3, 'El senyor de los anillos 3', 'JRR Tolkien', 1),
(4, 'Harry Potter', 'JK Rowling', 5);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `name`) VALUES
(0, 'Comedia'),
(1, 'Aventura'),
(2, 'Novela'),
(3, 'Cuento'),
(4, 'Ciencia-ficción'),
(5, 'Magia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `surname` text COLLATE utf8_unicode_ci NOT NULL,
  `registered` datetime NOT NULL,
  `lastLogin` datetime NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `registered`, `lastLogin`, `password`) VALUES
(3, 'exemple@gmail.com', 'Ed', 'Elrick', '2016-11-29 00:00:00', '2016-11-29 00:00:00', 'winry'),
(5, 'jorge@gmail.com', 'Jorgito', 'Mierda', '2016-12-11 00:00:00', '2016-11-29 00:00:00', 'mia');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `bgen_id_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
