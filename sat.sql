-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2020 at 01:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sat`
--

-- --------------------------------------------------------

--
-- Table structure for table `background_view`
--

CREATE TABLE `background_view` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text,
  `icon` varchar(80) NOT NULL,
  `extra` varchar(80) DEFAULT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background_view`
--

INSERT INTO `background_view` (`id`, `name`, `description`, `content`, `icon`, `extra`, `color`) VALUES
(1, 'Software View', 'Are you a programmer?', NULL, 'fa-file-code-o', NULL, 'aqua'),
(2, 'Designer View', 'Are you a designer?', NULL, 'fa-edit', NULL, 'green'),
(3, 'Business View', 'Interested in business?', NULL, 'fa-briefcase', NULL, 'yellow'),
(4, 'Media View', 'Have a media background?', NULL, 'fa-tablet', NULL, 'red'),
(5, 'Default View', 'For general view.', NULL, 'fa-bullseye', NULL, 'aqua'),
(6, 'Designer view new', 'Are you designer', NULL, 'fa-edit', NULL, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'red'),
(2, 'yellow'),
(3, 'green'),
(4, 'light-blue'),
(5, 'purple'),
(7, 'aqua');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`) VALUES
(1, 'Publications'),
(2, 'Feasibility Research'),
(3, 'Analysis'),
(4, 'Sketch'),
(5, 'Executable'),
(6, 'Libraries and Packages'),
(7, 'CAD files');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `subtitle` varchar(80) DEFAULT NULL,
  `metadata` text NOT NULL,
  `estimate_time` decimal(10,2) UNSIGNED NOT NULL,
  `file_type` enum('folder','image','video','audio','pdf','doc','excel','ppt','txt','zip','unknown') NOT NULL DEFAULT 'unknown',
  `icon` varchar(80) NOT NULL,
  `horizontal_id` int(11) UNSIGNED NOT NULL,
  `vertical_id` int(11) UNSIGNED NOT NULL,
  `view_id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  `extra` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `title`, `name`, `subtitle`, `metadata`, `estimate_time`, `file_type`, `icon`, `horizontal_id`, `vertical_id`, `view_id`, `project_id`, `extra`) VALUES
(1, 'File P1', '15786100871.pdf', 'Info P1', ' Metadata Metadata Metadata Metadata Metadata Metadata Metadata Metadata Metadata', '20.00', 'pdf', 'fa-file-pdf-o', 1, 14, 1, 7, NULL),
(2, 'File P2', '15786103181.pdf', 'Info P2', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', '20.00', 'pdf', 'fa-file-pdf-o', 1, 14, 1, 7, NULL),
(3, 'File P3', '15786104161.pdf', 'Info P3', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', '20.00', 'pdf', 'fa-file-pdf-o', 1, 14, 1, 7, NULL),
(4, 'File P4', '15786104711.pdf', 'Info P4', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', '30.00', 'pdf', 'fa-file-pdf-o', 1, 13, 1, 7, NULL),
(5, 'File P5', '15786105231.pdf', 'Info P5', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', '30.00', 'pdf', 'fa-file-pdf-o', 1, 15, 1, 7, NULL),
(6, 'File P6', '15786105741.pdf', 'Info P6', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', '35.00', 'pdf', 'fa-file-pdf-o', 1, 15, 1, 7, NULL),
(7, 'File P1', '15787430891.png', 'Info P1', 'Bla Bla Bla Bla', '50.00', 'image', 'fa-image', 4, 17, 2, 8, NULL),
(8, 'File P2', '15787431691.pdf', 'Info P2', 'Bla Bla Bla Bla', '10.00', 'pdf', 'fa-file-pdf-o', 4, 17, 2, 8, NULL),
(9, 'File F2', '15787432331.jpg', 'Info F2', 'Bla Bla Bla Bla', '30.00', 'image', 'fa-image', 4, 18, 2, 8, NULL),
(10, 'File P2', '15787432791.pdf', 'Info P2', 'Bla Bla Bla Bla', '80.00', 'pdf', 'fa-file-pdf-o', 4, 19, 2, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `horizontal`
--

CREATE TABLE `horizontal` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text,
  `sort_order` int(4) UNSIGNED NOT NULL,
  `view_id` int(11) UNSIGNED NOT NULL,
  `extra` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horizontal`
--

INSERT INTO `horizontal` (`id`, `name`, `description`, `sort_order`, `view_id`, `extra`) VALUES
(1, 'Research and Analysis', NULL, 1, 1, NULL),
(2, 'Design and Prototype', NULL, 2, 1, NULL),
(3, 'Development and Testing', NULL, 3, 1, NULL),
(4, 'Research and Analysis', NULL, 1, 2, NULL),
(5, 'Design', NULL, 2, 2, NULL),
(6, 'Prototyping and testing', NULL, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `overview`
--

CREATE TABLE `overview` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `paragraph` text NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  `extra` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overview`
--

INSERT INTO `overview` (`id`, `title`, `paragraph`, `project_id`, `extra`) VALUES
(4, 'Project Abstract', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\n- - -', 5, NULL),
(5, 'Research Flow', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\n- - -', 5, NULL),
(6, 'Result', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 5, NULL),
(7, 'System Technology Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\n- - -', 5, NULL),
(8, 'Software Module Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 5, NULL),
(9, 'Software Module Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 5, NULL),
(10, 'Software Module Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 5, NULL),
(11, 'Project Abstract', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 6, NULL),
(12, 'Research Flow', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 6, NULL),
(13, 'Result', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 6, NULL),
(14, 'System Technology Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 6, NULL),
(15, 'Software Module Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 6, NULL),
(16, 'More', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 6, NULL),
(17, 'More and more', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 6, NULL),
(18, 'More more and more', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 6, NULL),
(19, 'Project Abstract', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 7, NULL),
(20, 'Research Flow', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 7, NULL),
(21, 'Result', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 7, NULL),
(22, 'System Technology Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 7, NULL),
(23, 'Software Module Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 7, NULL),
(24, 'Conclusion', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.\r\n\r\nLorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 7, NULL),
(25, 'Project Abstract', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 8, NULL),
(26, 'Research Flow', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 8, NULL),
(27, 'Result', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 8, NULL),
(28, 'System Technology Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans. Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 8, NULL),
(29, 'Project Abstract', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed pretium mi, nec varius dolor. Cras consectetur dolor eu magna posuere pretium. Curabitur at elit vel lectus facilisis sollicitudin. Aliquam ultrices scelerisque augue, in luctus nibh. Nulla condimentum porttitor lacus vel scelerisque. Quisque lacinia imperdiet feugiat. Aliquam a aliquet magna, quis scelerisque augue. Sed et augue sed elit malesuada ullamcorper non eget metus. Etiam tempor magna sagittis porta egestas.', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `overview` text,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `logo` varchar(80) NOT NULL,
  `extra` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `overview`, `date_from`, `date_to`, `logo`, `extra`) VALUES
(5, 'iStopFall', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec convallis odio. Sed vitae ligula in ipsum iaculis cursus. Fusce fermentum risus in tincidunt iaculis. In accumsan aliquam mi lacinia tincidunt. Nunc eu lacus tincidunt, cursus urna quis, pharetra sem. Morbi euismod elementum diam, ut auctor sem feugiat id. Integer dictum sollicitudin odio, id bibendum sem vehicula sit amet. Donec ut quam nulla. Duis auctor justo sapien, eu viverra est porta at.', NULL, '2008-01-01', '2012-12-31', '15782265961.jpg', NULL),
(6, 'iStopFall', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec convallis odio. Sed vitae ligula in ipsum iaculis cursus. Fusce fermentum risus in tincidunt iaculis. In accumsan aliquam mi lacinia tincidunt. Nunc eu lacus tincidunt, cursus urna quis, pharetra sem. Morbi euismod elementum diam, ut auctor sem feugiat id. Integer dictum sollicitudin odio, id bibendum sem vehicula sit amet. Donec ut quam nulla. Duis auctor justo sapien, eu viverra est porta at.', NULL, '2008-01-01', '2012-12-31', '15783243721.jpg', NULL),
(7, 'iStopFall', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec convallis odio. Sed vitae ligula in ipsum iaculis cursus. Fusce fermentum risus in tincidunt iaculis. In accumsan aliquam mi lacinia tincidunt. Nunc eu lacus tincidunt, cursus urna quis, pharetra sem. Morbi euismod elementum diam, ut auctor sem feugiat id. Integer dictum sollicitudin odio, id bibendum sem vehicula sit amet. Donec ut quam nulla. Duis auctor justo sapien, eu viverra est porta at.', NULL, '2008-01-31', '2009-01-31', '15785912841.jpg', NULL),
(8, 'Project X', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed pretium mi, nec varius dolor. Cras consectetur dolor eu magna posuere pretium. Curabitur at elit vel lectus facilisis sollicitudin. Aliquam ultrices scelerisque augue, in luctus nibh. Nulla condimentum porttitor lacus vel scelerisque. Quisque lacinia imperdiet feugiat.', NULL, '2000-01-01', '2004-12-31', '15787421441.png', NULL),
(9, 'Cyberrusten', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed pretium mi, nec varius dolor. Cras consectetur dolor eu magna posuere pretium. Curabitur at elit vel lectus facilisis sollicitudin. Aliquam ultrices scelerisque augue, in luctus nibh. Nulla condimentum porttitor lacus vel scelerisque. Quisque lacinia imperdiet feugiat. Aliquam a aliquet magna, quis scelerisque augue. Sed et augue sed elit malesuada ullamcorper non eget metus. Etiam tempor magna sagittis porta egestas.', NULL, '2016-01-01', '2019-01-01', '15787465851.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `authKey` varchar(80) DEFAULT NULL,
  `accessToken` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `authKey`, `accessToken`) VALUES
(1, 'Member', 'One', 'member1', 'member1@email.com', 'member1', 'test101key', '101-token');

-- --------------------------------------------------------

--
-- Table structure for table `vertical`
--

CREATE TABLE `vertical` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `sort_order` int(4) UNSIGNED NOT NULL,
  `horizontal_id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  `view_id` int(11) UNSIGNED NOT NULL,
  `extra` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vertical`
--

INSERT INTO `vertical` (`id`, `name`, `description`, `sort_order`, `horizontal_id`, `project_id`, `view_id`, `extra`) VALUES
(1, 'Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 1, 1, 5, 1, NULL),
(2, 'Preliminarily Files', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 2, 1, 5, 1, NULL),
(3, 'Feasibility Research', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 3, 1, 5, 1, NULL),
(4, 'Publications', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 4, 1, 5, 1, NULL),
(5, 'Test', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 1, 2, 5, 1, NULL),
(6, 'Test two', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 2, 2, 5, 1, NULL),
(7, 'Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 1, 1, 6, 1, NULL),
(8, 'Preliminarily Files', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 2, 1, 6, 1, NULL),
(9, 'Feasibility Research', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 3, 1, 6, 1, NULL),
(10, 'Publications', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 4, 1, 6, 1, NULL),
(11, 'Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 1, 2, 6, 1, NULL),
(12, 'More test', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 2, 2, 6, 1, NULL),
(13, 'Overview', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 1, 1, 7, 1, NULL),
(14, 'Preliminarily Files', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 2, 1, 7, 1, NULL),
(15, 'Feasibility Research', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 3, 1, 7, 1, NULL),
(16, 'Publications', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 4, 1, 7, 1, NULL),
(17, 'Preliminarily Files', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 1, 4, 8, 2, NULL),
(18, 'Feasibility Research', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 2, 4, 8, 2, NULL),
(19, 'Publications', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like.', 3, 4, 8, 2, NULL),
(20, 'Mis', 'gvbjrjgbnrd\r\n', 4, 5, 6, 2, NULL),
(21, 'Preliminary Files', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed pretium mi, nec varius dolor. Cras consectetur dolor eu magna posuere pretium. Curabitur at elit vel lectus facilisis sollicitudin. Aliquam ultrices scelerisque augue, in luctus nibh. Nulla condimentum porttitor lacus vel scelerisque. Quisque lacinia imperdiet feugiat. Aliquam a aliquet magna, quis scelerisque augue. Sed et augue sed elit malesuada ullamcorper non eget metus. Etiam tempor magna sagittis porta egestas.', 1, 1, 9, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `background_view`
--
ALTER TABLE `background_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_vertical` (`vertical_id`),
  ADD KEY `file_horizontal` (`horizontal_id`),
  ADD KEY `file_project` (`project_id`),
  ADD KEY `file_view` (`view_id`);

--
-- Indexes for table `horizontal`
--
ALTER TABLE `horizontal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horizontal_view` (`view_id`);

--
-- Indexes for table `overview`
--
ALTER TABLE `overview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overview_project` (`project_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vertical`
--
ALTER TABLE `vertical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vertical_horizontal` (`horizontal_id`),
  ADD KEY `vertical_project` (`project_id`),
  ADD KEY `vertical_view` (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `background_view`
--
ALTER TABLE `background_view`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `horizontal`
--
ALTER TABLE `horizontal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `overview`
--
ALTER TABLE `overview`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vertical`
--
ALTER TABLE `vertical`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_horizontal` FOREIGN KEY (`horizontal_id`) REFERENCES `horizontal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_vertical` FOREIGN KEY (`vertical_id`) REFERENCES `vertical` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_view` FOREIGN KEY (`view_id`) REFERENCES `background_view` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horizontal`
--
ALTER TABLE `horizontal`
  ADD CONSTRAINT `horizontal_view` FOREIGN KEY (`view_id`) REFERENCES `background_view` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `overview`
--
ALTER TABLE `overview`
  ADD CONSTRAINT `overview_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vertical`
--
ALTER TABLE `vertical`
  ADD CONSTRAINT `vertical_horizontal` FOREIGN KEY (`horizontal_id`) REFERENCES `horizontal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vertical_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vertical_view` FOREIGN KEY (`view_id`) REFERENCES `background_view` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
