-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Maio-2018 às 05:48
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Reuniao', '#0071c5', '2018-05-29 09:00:00', '2018-05-29 11:00:00'),
(2, 'Palestra', '#40E0D0', '2018-05-30 14:00:00', '2018-05-30 17:00:00'),
(3, 'Reuniao 01', '#FFD700', '2018-05-31 08:00:00', '2018-05-31 09:00:00'),
(4, 'Reuniao 3', '#40e0d0', '2018-06-01 10:00:00', '2018-06-01 11:00:00'),
(5, 'Reuniao 4', '#0071c5', '2018-06-04 11:00:00', '2017-06-04 12:00:00'),
(6, 'Reuniao 5', '#FFD700', '2018-06-04 13:00:00', '2018-06-04 14:00:00'),
(7, 'Reuniao 6', '#0071c5', '2018-06-04 14:00:00', '2018-06-04 15:00:00'),
(9, 'Hack SaÃºde 2018', '#FF4500', '2018-06-02 09:00:00', '2018-06-03 18:00:00'),
(10, 'testando', '#1C1C1C', '2018-06-05 00:00:00', '2018-06-06 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
