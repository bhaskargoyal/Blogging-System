-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 09:40 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `subheading` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `heading`, `subheading`, `text`, `time`) VALUES
(1, 1, '1914 translation', 'A haunt to scare', 'Dignissim malesuada sapien finibus tincidunt. Nullam vitae velit sodales, ullamcorper mauris ac, feugiat nisl. Vestibulum ultricies ligula lacus, sit amet aliquet ipsum sagittis ac. Proin volutpat rutrum tellus eget porttitor. Aliquam lorem metus, viverra in molestie ut, facilisis id felis. Suspendisse dapibus a risus ac iaculis. In porta ante a mi viverra aliquet. Fusce ac risus pharetra, molestie purus non, vulputate magna. Vestibulum lectus erat, aliquet ac velit vel, lacinia suscipit augue.\r\n\r\nAenean et facilisis massa. Praesent mattis quam et purus rutrum luctus. Quisque quis arcu magna. Etiam sed commodo lacus. Vivamus vestibulum mi at urna dapibus egestas. Vestibulum consequat eros non velit aliquam consequat. Sed dapibus porta sapien, ut gravida nulla consectetur sit amet. Aenean elit nisi, eleifend et purus vitae, gravida pellentesque est. In a consequat odio. Sed venenatis augue eu condimentum euismod. Donec sit amet nisl varius, gravida sapien at, fringilla nisl. Fusce dapibus lobortis commodo. Aliquam commodo mattis dui, sed lacinia metus scelerisque in. Etiam pellentesque, libero condimentum lobortis efficitur, mi leo mollis mi, non mollis enim turpis non ipsum. Donec leo lorem, malesuada ut cursus ac, laoreet in felis.\r\n\r\nNullam non odio mi. Vivamus non bibendum nunc. Nullam quis sem eget nulla blandit consectetur. Mauris dignissim bibendum sem id pellentesque. Sed tincidunt dignissim ex, dapibus elementum libero volutpat a. Aenean non libero hendrerit sapien porttitor gravida. Nunc sodales placerat magna, eget sagittis enim pharetra ut. Sed maximus pellentesque ligula at pretium.\r\n\r\nVestibulum id commodo magna. Morbi a urna risus. Maecenas ac purus massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer id odio et orci rutrum consequat. Mauris vehicula congue porttitor. Nunc cursus vulputate placerat.\r\n\r\nAliquam nec ex ex. Aenean lectus tortor, posuere id vestibulum quis, tempus in tortor. Aenean laoreet ipsum non ante laoreet, sed vestibulum arcu semper. Vivamus vel tristique orci. Sed in urna nisi. In risus turpis, interdum eget sagittis nec, convallis a sem. Morbi non nunc neque.																																																								', '2016-04-17 18:23:05'),
(3, 2, 'Don''t Take it too Harsh', 'Okay, no!', 'Am dignissim malesuada sapien finibus tincidunt. Nullam vitae velit sodales, ullamcorper mauris ac, feugiat nisl. Vestibulum ultricies ligula lacus, sit amet aliquet ipsum sagittis ac. Proin volutpat rutrum tellus eget porttitor. Aliquam lorem metus, viverra in molestie ut, facilisis id felis. Suspendisse dapibus a risus ac iaculis. In porta ante a mi viverra aliquet. Fusce ac risus pharetra, molestie purus non, vulputate magna. Vestibulum lectus erat, aliquet ac velit vel, lacinia suscipit augue.\r\n\r\nAenean et facilisis massa. Praesent mattis quam et purus rutrum luctus. Quisque quis arcu magna. Etiam sed commodo lacus. Vivamus vestibulum mi at urna dapibus egestas. Vestibulum consequat eros non velit aliquam consequat. Sed dapibus porta sapien, ut gravida nulla consectetur sit amet. Aenean elit nisi, eleifend et purus vitae, gravida pellentesque est. In a consequat odio. Sed venenatis augue eu condimentum euismod. Donec sit amet nisl varius, gravida sapien at, fringilla nisl. Fusce dapibus lobortis commodo. Aliquam commodo mattis dui, sed lacinia metus scelerisque in. Etiam pellentesque, libero condimentum lobortis efficitur, mi leo mollis mi, non mollis enim turpis non ipsum. Donec leo lorem, malesuada ut cursus ac, laoreet in felis.\r\n\r\nNullam non odio mi. Vivamus non bibendum nunc. Nullam quis sem eget nulla blandit consectetur. Mauris dignissim bibendum sem id pellentesque. Sed tincidunt dignissim ex, dapibus elementum libero volutpat a. Aenean non libero hendrerit sapien porttitor gravida. Nunc sodales placerat magna, eget sagittis enim pharetra ut. Sed maximus pellentesque ligula at pretium.\r\n\r\nVestibulum id commodo magna. Morbi a urna risus. Maecenas ac purus massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer id odio et orci rutrum consequat. Mauris vehicula congue porttitor. Nunc cursus vulputate placerat.\r\n\r\nAliquam nec ex ex. Aenean lectus tortor, posuere id vestibulum quis, tempus in tortor. Aenean laoreet ipsum non ante laoreet, sed vestibulum arcu semper. Vivamus vel tristique orci. Sed in urna nisi. In risus turpis, interdum eget sagittis nec, convallis a sem. Morbi non nunc neque.\r\n							', '2016-04-11 18:01:10'),
(16, 3, 'Food around the belt', 'Hmm, yummy food.', 'Dignissim malesuada sapien finibus tincidunt. Nullam vitae velit sodales, ullamcorper mauris ac, feugiat nisl. Vestibulum ultricies ligula lacus, sit amet aliquet ipsum sagittis ac. Proin volutpat rutrum tellus eget porttitor. Aliquam lorem metus, viverra in molestie ut, facilisis id felis. Suspendisse dapibus a risus ac iaculis. In porta ante a mi viverra aliquet. Fusce ac risus pharetra, molestie purus non, vulputate magna. Vestibulum lectus erat, aliquet ac velit vel, lacinia suscipit augue.\r\n\r\nAenean et facilisis massa. Praesent mattis quam et purus rutrum luctus. Quisque quis arcu magna. Etiam sed commodo lacus. Vivamus vestibulum mi at urna dapibus egestas. Vestibulum consequat eros non velit aliquam consequat. Sed dapibus porta sapien, ut gravida nulla consectetur sit amet. Aenean elit nisi, eleifend et purus vitae, gravida pellentesque est. In a consequat odio. Sed venenatis augue eu condimentum euismod. Donec sit amet nisl varius, gravida sapien at, fringilla nisl. Fusce dapibus lobortis commodo. Aliquam commodo mattis dui, sed lacinia metus scelerisque in. Etiam pellentesque, libero condimentum lobortis efficitur, mi leo mollis mi, non mollis enim turpis non ipsum. Donec leo lorem, malesuada ut cursus ac, laoreet in felis.\r\n\r\nNullam non odio mi. Vivamus non bibendum nunc. Nullam quis sem eget nulla blandit consectetur. Mauris dignissim bibendum sem id pellentesque. Sed tincidunt dignissim ex, dapibus elementum libero volutpat a. Aenean non libero hendrerit sapien porttitor gravida. Nunc sodales placerat magna, eget sagittis enim pharetra ut. Sed maximus pellentesque ligula at pretium.\r\n\r\nVestibulum id commodo magna. Morbi a urna risus. Maecenas ac purus massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer id odio et orci rutrum consequat. Mauris vehicula congue porttitor. Nunc cursus vulputate placerat.\r\n\r\nAliquam nec ex ex. Aenean lectus tortor, posuere id vestibulum quis, tempus in tortor. Aenean laoreet ipsum non ante laoreet, sed vestibulum arcu semper. Vivamus vel tristique orci. Sed in urna nisi. In risus turpis, interdum eget sagittis nec, convallis a sem. Morbi non nunc neque.																												', '2016-04-11 18:17:53'),
(17, 4, 'A walk we remember', 'Newspapers day out', 'hello  im chirag.							', '2016-04-17 15:50:35'),
(18, 1, 'Fridge is the laptop', 'Dont underestimate this', 'Hello, this is quite weird, but please bear with me.								', '2016-04-17 18:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'bhaskar', 'qwerty'),
(2, 'arihant', 'asdfgh'),
(3, 'arjun', 'zxcvbn'),
(4, 'chirag', 'chirag'),
(5, 'prachi', 'prachi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `age`, `username`) VALUES
(1, 'Bhaskar', 'Goyal', 19, 'bhaskar'),
(2, 'Arihant', 'Jain', 20, 'arihant'),
(3, 'Arjun', 'Sharma', 20, 'arjun'),
(4, 'Chirag', 'Batra', 20, 'chirag'),
(5, 'Prachi', 'Gupta', 23, 'prachi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
