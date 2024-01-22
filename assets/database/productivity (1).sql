-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 08:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productivity`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `uid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `contact`, `date`, `description`, `file`, `uid`) VALUES
(2, 'Contractor 2', '+91 0123456789', '01/02/2024 05:37 PM', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque gravida eget sem vel interdum. Donec accumsan ex sollicitudin sapien gravida pharetra. Phasellus congue pulvinar justo at auctor. Integer ut est ut magna vehicula lobortis in ac massa. ', '', 5),
(3, 'test', '+91 0123456784', '04/02/2024 05:37 PM', 'etstt', '', 5),
(4, 'test2', '+91 0123456784', '18/02/2024 05:37 PM', 'conversation 1', '', 5),
(5, 'test', '+91 0123456784', '2024-01-18T14:42', 'conversation 2', '', 5),
(6, 'test 5 ', '+91 0123456784', '2024-01-18T13:25', 'test 5', '', 5),
(7, 'test 6', '+91 88794561231', '2024-01-02T13:32', 'testes', '', 5),
(8, 'test 7 ', '+91 0123456780', '2024-01-05T13:35', 'test 7', '', 5),
(9, 'test 8', '+91 0123456780', '2024-01-15T05:34', 'test 8', '', 5),
(10, 'test 9', '+91 8879369441', '2024-01-08T18:53', 'test 9', '', 5),
(11, 'test 10', '+91 0123456780', '2024-01-07T19:01', 'test 10', '', 5),
(12, 'test 11', '+91 8879369441', '2024-01-16T18:03', 'test 11', '1705566826802Coding Assignment.pdf', 5),
(13, 'test12', '+91 0123456784', '2024-01-23T22:19', 'test 12', '1705582181317CS TT Even Sem 8th Jan 2024.pdf', 5),
(16, 'test13', '+91 0123456784', '2024-01-03T20:53', 'test 13', '/assets/images/posts/2024_01_21_16_23_10.pdf', 14),
(17, 'test13', '+91 0123456780', '2024-01-17T21:01', 'test 13', '/assets/images/posts/2024_01_21_17_06_55.pdf', 14),
(18, 'test13', '+91 0123456780', '2024-01-17T21:01', 'test 13', '/assets/images/posts/2024_01_21_17_07_00.pdf', 14),
(19, 'test13', '+91 0123456784', '2024-01-09T21:37', 'test 13', '/assets/images/posts/2024_01_21_17_07_30.pdf', 14),
(20, 'test14', '+91 88794561231', '2024-01-03T21:38', 'test 13', '/assets/images/posts/2024_01_21_17_09_02.pdf', 14),
(21, 'test14', '+91 88794561231', '2024-01-03T21:38', 'test 13', '/assets/images/posts/2024_01_21_17_37_36.pdf', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'test', 'test@gmail.com', '$2a$10$/DOs2hhqzQcU3P7IeKuPfuXol33YvNw5CEnZK.nHaP9tuXVxFmCGy'),
(2, 'test2', 'test2@gmail.com', '$2a$10$Y/BLS6uQq31GOFOYnf9gTOviWyRkcnIIQLz3JghZNSC8zksROomv2'),
(3, 'test3', 'test3@gmail.com', '$2a$10$7zvGQ/v2QCay./5RTVKcyeBglHd7f4.dJwTZNZF/jVGcn8qkndaJ.'),
(4, 'test4', 'test4@gmail.com', '$2a$10$drWWenV.ZEDzyHNDN954jOWXX/0ccMUoeoSEAKWbiWfSplR9l7tc2'),
(5, 'test5', 'test5@gmail.com', 'test5'),
(6, 'test6', 'test6@gmail.com', '$2a$10$SswYh6oQ.j16ln/XUo7s3OkOJsta5As.Y6WbfkPchF171qyUbpmXO'),
(7, 'test7', 'test7@gmail.com', 'test7'),
(8, 'test8', 'test8@gmail.com', '$2b$10$ogfZ19.43OJ8sqM0OzWk8.0HyA3lBNRAj1g3GG3IsB0i/JoOaOQWm'),
(9, 'test9', 'test9@gmail.com', 'test9'),
(10, 'test10', 'test10@gmail.com', 'test10'),
(11, 'ABC', 'abc@gmail.com', 'abc'),
(12, 'pqr', 'pqr@gmail.com', 'pqr'),
(13, 'test12', 'test12@gmail.com', '$2y$10$5V6U/37ESJCwxv3Lrr/fGub/2l4BD9ULUuqcZh3MKGAnvyejBj9by'),
(14, 'test13', 'test13@gmail.com', '$2y$10$9BXOyb3nXf7Al0L9MJHLOuDi/XzY94.xc0a8hfC6ndZckUS68Lnm.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `Foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
