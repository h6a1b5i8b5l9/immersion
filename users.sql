-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2021 at 10:23 PM
-- Server version: 8.0.19
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immersion`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `password`, `name`, `avatar`, `position`, `telephone`, `address`) VALUES
(1, 'user', 'oliver.kopyov@smartadminwebapp.com', 'Oliver', 'Oliver Kopyov', 'img/demo/avatars/avatar-b.png', 'IT Director, Gotbootstrap Inc.', '+1 317-456-2564', '15 Charist St, Detroit, MI, 48212, USA'),
(2, 'user', 'Alita@smartadminwebapp.com', 'Alita', 'Alita Gray', 'img/demo/avatars/avatar-c.png', 'Project Manager, Gotbootstrap Inc.', '+1 313-461-1347', '134 Hamtrammac, Detroit, MI, 48314, USA'),
(3, 'user', 'john.cook@smartadminwebapp.com', 'John', 'Dr. John Cook PhD', 'img/demo/avatars/avatar-e.png', 'Human Resources, Gotbootstrap Inc.', '+1 313-779-1347', '55 Smyth Rd, Detroit, MI, 48341, USA'),
(4, 'admin', 'jim.ketty@smartadminwebapp.com', 'Jim', 'Jim Ketty', 'img/demo/avatars/avatar-k.png', 'Staff Orgnizer, Gotbootstrap Inc.', '+1 313-779-3314', '134 Tasy Rd, Detroit, MI, 48212, USA'),
(5, 'user', 'john.oliver@smartadminwebapp.com', 'John', 'Dr. John Oliver', 'img/demo/avatars/avatar-g.png', 'Oncologist, Gotbootstrap Inc.', '+1 313-779-8134', '134 Gallery St, Detroit, MI, 46214, USA'),
(6, 'user', 'sarah.mcbrook@smartadminwebapp.com', 'Sarah', 'Sarah McBrook', 'img/demo/avatars/avatar-h.png', 'Xray Division, Gotbootstrap Inc.', '+1 313-779-7613', '13 Jamie Rd, Detroit, MI, 48313, USA'),
(7, 'user', 'jimmy.fallan@smartadminwebapp.com', 'Jimmy', 'Jimmy Fellan', 'img/demo/avatars/avatar-i.png', 'Accounting, Gotbootstrap Inc.', '+1 313-779-4314', '55 Smyth Rd, Detroit, MI, 48341, USA'),
(8, 'user', 'arica.grace@smartadminwebapp.com', 'Arica', 'Arica Grace', 'img/demo/avatars/avatar-j.png', 'Accounting, Gotbootstrap Inc.', '+1 313-779-3347', '798 Smyth Rd, Detroit, MI, 48341, USA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
