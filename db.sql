-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 02:58 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `userid` int(255) NOT NULL,
  `createAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `content`, `userid`, `createAt`) VALUES
(1, 'khong biet noi gi', 1, '2019-11-06 00:00:00'),
(2, 'doan xem', 2, '2019-11-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `code` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `status`, `code`, `email`) VALUES
(1, 'khai', '$2y$10$gNYQAuCTtLQkfLWDv4ECqux7i1gA8lAaVXFkZrohcnEERW7HUi81i', 0, '', 'khai@gmail.com'),
(2, 'khai1', '$2y$10$x0znJsEZAGK2hya44lutmeTrOp6ugtO.hcEtZ3XUZf95vcB0Cxiqm', 0, '', 'chi2caithoi@gmail.com'),
(3, 'khai1', '$2y$10$G0nM6dNqudthnFdlyDYxGOnlgrVvGdlSMJCBW8lJdsjXT6wGhKtCi', 0, '', 'chi3caithoi@gmail.com'),
(4, 'tet den roi', '$2y$10$tVyzfNuE.7D6Fz2mJdcnieR0YT6t/FO4dQ4z7PKtTOKfFzZB7QOA2', 0, '', 'chi4caithoi@gmail.com'),
(5, 'chao cac ban', '$2y$10$C5EZH7TbuismOafIri5tFe.g32XEISAPTDP2uppw0lxOS5fYU30Iu', 0, '', 'aa@gmail.com'),
(6, 'khai12345', '$2y$10$KluqZjVQ7FwOdfztCFtKremOoOD0FGW.DLfViV1C1mF5Wjin.koKy', 0, '6w9sm5j2rtxjp45m', 'chi5caithoi@gmail.com'),
(12, 'khai8', '$2y$10$B4pHRp76pRUlv3exVweGqevuKlkj9y52jrZXw.CKadYZLS8aEu35K', 1, '', 'chi1caithoi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
