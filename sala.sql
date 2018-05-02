-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Maio-2018 às 00:59
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sala`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms`
--

CREATE TABLE `adms` (
  `matsup` varchar(10) DEFAULT '0',
  `nome` varchar(20) DEFAULT NULL,
  `senha` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `adms`
--

INSERT INTO `adms` (`matsup`, `nome`, `senha`) VALUES
('admin', 'Andersu Silva', 'krow24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `cod_sala` int(20) UNSIGNED DEFAULT '0',
  `matricula` int(20) UNSIGNED DEFAULT '0',
  `datatempo` datetime DEFAULT NULL,
  `ticket` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `cod_sala` int(3) UNSIGNED NOT NULL,
  `nome_sala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`cod_sala`, `nome_sala`) VALUES
(1, 'LAB 1'),
(2, 'LAB 2'),
(3, 'LAB 3'),
(4, 'LAB 4'),
(4, 'LAB 5'),
(4, 'LAB 6'),
(4, 'LAB 7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sups`
--

CREATE TABLE `sups` (
  `matsup` int(10) DEFAULT NULL,
  `nome_sup` varchar(255) DEFAULT NULL,
  `senha` varchar(16) DEFAULT NULL,
  `ilha` int(10) DEFAULT NULL,
  `pri` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sups`
--

INSERT INTO `sups` (`matsup`, `nome_sup`, `senha`, `ilha`, `pri`) VALUES
(2, 'UDF', 'udf', 99, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
  ADD KEY `cod_sala` (`cod_sala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `salas`
--
ALTER TABLE `salas`
  MODIFY `cod_sala` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
