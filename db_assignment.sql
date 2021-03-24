-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 07:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblauthor`
--

CREATE TABLE `tblauthor` (
  `authorId` int(11) NOT NULL,
  `authorName` varchar(30) NOT NULL,
  `authorUrl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblauthor`
--

INSERT INTO `tblauthor` (`authorId`, `authorName`, `authorUrl`) VALUES
(1, 'John doe', 'https://johndoe.com'),
(2, 'Nitya', 'https://nitya.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogo`
--

CREATE TABLE `tbllogo` (
  `logoId` int(11) NOT NULL,
  `logoWidth` int(3) NOT NULL,
  `logoheight` int(3) NOT NULL,
  `logoUrl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogo`
--

INSERT INTO `tbllogo` (`logoId`, `logoWidth`, `logoheight`, `logoUrl`) VALUES
(1, 400, 55, 'http://www.example.com/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `postId` int(11) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `datePublished` datetime NOT NULL,
  `inLanguage` varchar(10) NOT NULL,
  `contentLocation` varchar(30) NOT NULL,
  `authorId` int(3) NOT NULL,
  `publisherId` int(3) NOT NULL,
  `articleSection` varchar(30) NOT NULL,
  `articleBody` text NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`postId`, `headline`, `url`, `image`, `dateCreated`, `datePublished`, `inLanguage`, `contentLocation`, `authorId`, `publisherId`, `articleSection`, `articleBody`, `keywords`, `active`) VALUES
(1, 'My love for spirituality explained', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-12 22:54:00', '2021-03-24 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1),
(2, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://static.prod.abebookscdn.com/cdn/com/images/7-reasons-to-love-reading/reading.jpg\"', '2021-03-22 22:54:00', '2021-03-22 22:57:00', 'en-US', 'Atlanta-GA', 2, 2, 'Hobbies', 'The responses we received were a treat to read. Some, like me, have loved reading since before they even knew how. Others came to appreciate the hobby later in life. I could relate to many of the memories shared. The adventure of having my first library card. The frustration of being continually told by my parents to “take a break” from reading and “go outside.” The wonderful feeling of refreshment that I continue to experience each day that I spend reading a book (most recently C.S. Lewis’s The Last Battle and Elizabeth Gaskell’s Cranford).\r\n\r\n', 'Books, reading, knowledge gaining, hobbies', 1),
(3, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://static.prod.abebookscdn.com/cdn/com/images/7-reasons-to-love-reading/reading.jpg\"', '2021-03-22 22:54:00', '2021-03-22 22:57:00', 'en-US', 'Atlanta-GA', 2, 2, 'Hobbies', 'The responses we received were a treat to read. Some, like me, have loved reading since before they even knew how. Others came to appreciate the hobby later in life. I could relate to many of the memories shared. The adventure of having my first library card. The frustration of being continually told by my parents to “take a break” from reading and “go outside.” The wonderful feeling of refreshment that I continue to experience each day that I spend reading a book (most recently C.S. Lewis’s The Last Battle and Elizabeth Gaskell’s Cranford).\r\n\r\n', 'Books, reading, knowledge gaining, hobbies', 1),
(4, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-22 22:54:00', '2021-03-22 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1),
(5, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '0000-00-00 00:00:00', '2021-03-22 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 0),
(6, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-12 22:54:00', '2021-03-22 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1),
(7, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-12 22:54:00', '2021-03-22 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1),
(8, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-12 22:54:00', '2021-03-22 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1),
(9, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-12 22:54:00', '2021-03-24 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1),
(10, 'My love for spirituality explained', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-12 22:54:00', '2021-03-24 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1),
(11, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-12 22:54:00', '2021-03-24 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1),
(12, '', 'https://www.abebooks.com/books/7-reasons-to-love-reading/index.shtml/', 'https://isha.sadhguru.org/in/en/sadhguru/mystic', '2021-03-12 22:54:00', '2021-03-24 22:54:00', 'in-en', 'Asia-Mumbai', 2, 2, 'Spiritality', 'Our two eyes can capture the physical world, that which can block light, but are blind to all else. Only by opening the third eye can one perceive that which is seen and unseen. This is the realm of mysticism, of knowing life in its full depth and dimension. Sadhguru is a bridge into this mysterious arena of life. It is a homecoming, a settling back into yourself.', 'Spiritality,sadguru,religion,isha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublisher`
--

CREATE TABLE `tblpublisher` (
  `publisherId` int(11) NOT NULL,
  `publisherName` varchar(30) NOT NULL,
  `publisherUrl` varchar(100) NOT NULL,
  `publisherLogoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpublisher`
--

INSERT INTO `tblpublisher` (`publisherId`, `publisherName`, `publisherUrl`, `publisherLogoId`) VALUES
(1, 'some publisher', 'https://examplepublisher.com', 1),
(2, 'TMH', 'https://tatamacgrawhills.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblauthor`
--
ALTER TABLE `tblauthor`
  ADD PRIMARY KEY (`authorId`);

--
-- Indexes for table `tbllogo`
--
ALTER TABLE `tbllogo`
  ADD PRIMARY KEY (`logoId`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `tblpublisher`
--
ALTER TABLE `tblpublisher`
  ADD PRIMARY KEY (`publisherId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblauthor`
--
ALTER TABLE `tblauthor`
  MODIFY `authorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllogo`
--
ALTER TABLE `tbllogo`
  MODIFY `logoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpublisher`
--
ALTER TABLE `tblpublisher`
  MODIFY `publisherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
