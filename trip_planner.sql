-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2018 at 04:27 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `firstName`, `lastName`, `emailAddress`, `phoneNumber`) VALUES
(1, 'John', 'Doe', 'jdoe@gmail.com', '1231234123'),
(2, 'Rachel', 'Doe', 'jdoe@gmail.com', '1231234123'),
(3, 'Jordan', 'Barrett', 'rbgreene@live.com', '1864973465'),
(4, 'Tim', 'Brown', 'timmybrown@gmail.com', '1856453284'),
(5, 'Forrest', 'Cashmark', 'forcash@live.com', '9763819465');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `contactID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`contactID`, `firstName`, `lastName`, `emailAddress`) VALUES
(1, 'John', 'Doe', 'jdoe@gmail.com'),
(2, 'Rachel', 'Greene', 'rbgreene@live.com'),
(17, 'testnews', 'testtnews', 'testingnews@gmail.com'),
(18, 'Ron', 'Weasley', 'ron@hp.com'),
(19, 'Dominique', 'Barrett', 'dominiquebarrett@mycwi.cc'),
(20, 'Dominique', 'bar', 'dominiquebarrett@mycwi.cc'),
(23, 'Dominique', 'Barret', 'root@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitorID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitorID`, `employeeID`, `firstName`, `lastName`, `emailAddress`, `phoneNumber`) VALUES
(1, 3, 'Harry', 'Potter', 'HP@gmail.com', '1654357892'),
(2, 4, 'John', 'Wick', 'Wicky@live.com', '1643257945'),
(4, 2, 'Iron', 'Man', 'Ironbaby@hotmail.com', '9118764565'),
(5, 3, 'Bruce', 'Banner', 'HulkyMan@hotmail.com', '7986453156'),
(6, 2, 'Reed', 'Richards', 'stretchyman@gmail.com', '9765315495'),
(7, 3, 'Stephen', 'Strange', 'drstrange@hotmail.com', '7946583521'),
(8, 3, 'Otto', 'Octavius', 'droctopus@live.com', '7894653215'),
(9, 3, 'Sue', 'Storm', 'youcantseeme@gmail.com', '2637496834'),
(10, 5, 'Wade', 'Wilson', 'deadmanwalkinhere@hotmail.com', '5676663847'),
(11, 4, 'Matt', 'Murdock', 'icanseeyou@live.com', '1657988765'),
(12, 4, 'Victor', 'Doom', 'VDoom@hotmail.com', '3859601726'),
(14, 4, 'Scott', 'Summers', 'cyclops@gmail.com', '3758394857'),
(17, 5, 'Matt', 'Murdock', 'icanseeyou@live.com', '1657988765'),
(18, 5, 'Scott', 'Summers', 'cyclops@gmail.com', '3758394857'),
(30, 5, 'Bucky', 'Barnes', 'wintersoldier@gmail.com', '8092536405'),
(43, 5, 'Dominique', 'Barrett', 'dominiquebarrett@mycwi.cc', '1234567894');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitorID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `visitor_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
