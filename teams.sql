-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 09:25 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp4711`
--

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(3) NOT NULL,
  `conference` varchar(3) NOT NULL,
  `division` varchar(3) NOT NULL,
  `wins` int(11) NOT NULL,
  `losses` int(11) NOT NULL,
  `points_for` int(11) NOT NULL,
  `points_against` int(11) NOT NULL,
  `net_points` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `code`, `conference`, `division`, `wins`, `losses`, `points_for`, `points_against`, `net_points`) VALUES
(1, 'Arizona Cardinals', 'ARI', 'NFC', 'NCW', 7, 2, 302, 185, 117),
(2, 'Atlanta Falcons', 'ATL', 'NFC', 'NCS', 6, 3, 229, 190, 39),
(3, 'Baltimore Ravens', 'BAL', 'AFC', 'ACN', 2, 7, 210, 236, -26),
(4, 'Buffalo Bills', 'BUF', 'AFC', 'ACE', 5, 4, 231, 207, 24),
(5, 'Carolina Panthers', 'CAR', 'NFC', 'NCS', 9, 0, 255, 175, 80),
(6, 'Chicago Bears', 'CHI', 'NFC', 'NCN', 4, 5, 199, 234, -35),
(7, 'Cincinnati Bengals', 'CIN', 'AFC', 'ACN', 8, 0, 229, 142, 87),
(8, 'Cleveland Browns', 'CLE', 'AFC', 'ACN', 2, 8, 186, 277, -91),
(9, 'Dallas Cowboys', 'DAL', 'NFC', 'NCE', 2, 7, 166, 214, -48),
(10, 'Denver Broncos', 'DEN', 'AFC', 'ACW', 7, 2, 205, 168, 37),
(11, 'Detroit Lions', 'DET', 'NFC', 'NCN', 2, 7, 167, 261, -94),
(12, 'Green Bay Packers', 'GB', 'NFC', 'NCN', 6, 3, 219, 185, 34),
(13, 'Houston Texans', 'HOU', 'AFC', 'ACS', 3, 5, 174, 205, -31),
(14, 'Indianapolis Colts', 'IND', 'AFC', 'ACS', 4, 5, 200, 227, -27),
(15, 'Jacksonville Jaguars', 'JAC', 'AFC', 'ACS', 3, 6, 192, 255, -63),
(16, 'Kansas City Chiefs', 'KC', 'AFC', 'ACW', 4, 5, 224, 195, 29),
(17, 'Miami Dolphins', 'MIA', 'AFC', 'ACE', 4, 5, 191, 225, -34),
(18, 'Minnesota Vikings', 'MIN', 'NFC', 'NCN', 7, 2, 198, 154, 44),
(19, 'New England Patriots', 'NE', 'AFC', 'ACE', 9, 0, 303, 169, 134),
(20, 'New Orleans Saints', 'NO', 'NFC', 'NCS', 4, 6, 255, 315, -60),
(21, 'New York Giants', 'NYG', 'NFC', 'NCE', 5, 5, 273, 253, 20),
(22, 'New York Jets', 'NYJ', 'AFC', 'ACE', 5, 4, 217, 184, 33),
(23, 'Oakland Raiders', 'OAK', 'AFC', 'ACW', 4, 5, 227, 241, -14),
(24, 'Philadelphia Eagles', 'PHI', 'NFC', 'NCE', 4, 5, 212, 184, 28),
(25, 'Pittsburgh Steelers', 'PIT', 'AFC', 'ACN', 6, 4, 236, 191, 45),
(26, 'San Diego Chargers', 'SD', 'AFC', 'ACW', 2, 7, 210, 249, -39),
(27, 'Seattle Seahawks', 'SEA', 'NFC', 'NCW', 4, 5, 199, 179, 20),
(28, 'San Francisco 49ers', 'SF', 'NFC', 'NCW', 3, 6, 126, 223, -97),
(29, 'St. Louis Rams', 'STL', 'NFC', 'NCW', 4, 5, 166, 183, -17),
(30, 'Tampa Bay Buccaneers', 'TB', 'NFC', 'NCS', 4, 5, 191, 237, -46),
(31, 'Tennessee Titans', 'TEN', 'AFC', 'ACS', 2, 7, 169, 214, -45),
(32, 'Washington Redskins', 'WAS', 'NFC', 'NCE', 4, 5, 205, 209, -4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
