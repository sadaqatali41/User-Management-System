-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2018 at 05:00 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jan`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(5) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `mobile`, `message`) VALUES
(1, 'ram', 'ram@mail.com', 23423423, 'Hello'),
(2, 'Siva', 'siva@mail.com', 23432423, 'Hello'),
(3, 'naresh', 'naresh@mail.com', 34242, 'welcome'),
(4, 'suresh', 'suresh@mail.com', 1212121212, 'Hello'),
(5, 'ravi kumar', 'ravi@mail.com', 9885776740, 'dasf'),
(6, 'rambabburi', 'rambabburi@gmail.com', 9885776740, 'asd'),
(7, 'rambabburi', 'rambabburi@gmail.com', 9885776740, 'asd'),
(8, 'lakshmi', 'lakshmi@mail.com', 12121212, 'hello'),
(9, 'koti', 'ravi@mail.com', 312312, 'qweqweqw'),
(10, 'Ram', 'ravi@mail.com', 9885776740, 'w31231'),
(11, 'ravi kumar', 'ravi@mail.com', 645645645, 'tryt');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(250) NOT NULL,
  `category` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `filename`, `category`, `date`, `ip`, `status`) VALUES
(1, 'This program is free software; you can redistribute it', 'This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.\r\n\r\nThis program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. ', 'Hydrangeas.jpg', 'Movies', '2018-02-17 08:08:38', '::1', 1),
(2, 'GNU General Public License', 'This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. \r\n\r\nYou should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.', 'Penguins.jpg', 'Movies', '2018-02-17 08:11:59', '::1', 1),
(3, 'GNU General Public License', 'This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. \r\n\r\nYou should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.', 'Lighthouse.jpg', 'Sports', '2018-02-17 08:13:37', '::1', 1),
(4, 'GNU General Public License', 'This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. \r\n', 'Penguins.jpg', 'Movies', '2018-02-17 08:13:39', '::1', 0),
(5, 'GNU General Public License', 'This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. \r\n\r\nYou should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.', 'Penguins.jpg', 'Movies', '2018-02-17 08:13:40', '::1', 0),
(7, 'GNU General Public License', 'This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. \r\n\r\nYou should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.', 'Penguins.jpg', 'Movies', '2018-02-17 08:14:53', '::1', 0),
(8, 'GNU General Public License', 'This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. \r\n\r\nYou should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.', 'Penguins.jpg', 'Movies', '2018-02-17 08:14:57', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `terms` int(11) NOT NULL,
  `date_of_reg` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(30) NOT NULL,
  `profile_pic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `mobile`, `gender`, `city`, `state`, `address`, `terms`, `date_of_reg`, `status`, `ip`, `profile_pic`) VALUES
(1, 'kumar', 'ravi@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9885770000', 'Male', 'Hyderabad', 'Telangana', 'Maithrivanam', 1, '2018-02-11 08:47:42', 1, '::1', 'swzdyi2x7b_1518664409.jpg'),
(2, 'ram', 'ram@mail.com', '202cb962ac59075b964b07152d234b70', '9885776740', 'Male', 'Hyderabad', 'Telangana', 'Shivbagh', 1, '2018-02-11 08:51:39', 1, '::1', ''),
(3, 'rambabburi', 'rambabburi@gmail.com', '202cb962ac59075b964b07152d234b70', '9885776740', 'Male', 'Hyderabad', 'Telangana', 'asdasd', 1, '2018-02-13 08:16:27', 0, '::1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
