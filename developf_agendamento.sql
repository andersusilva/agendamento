-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 11-Jun-2018 às 22:36
-- Versão do servidor: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developf_agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(10) UNSIGNED NOT NULL,
  `sala_id_sala` int(10) UNSIGNED NOT NULL,
  `professor_id_professor` int(10) UNSIGNED NOT NULL,
  `nome_disciplina` varchar(50) DEFAULT NULL,
  `turno_disciplina` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `sala_id_sala`, `professor_id_professor`, `nome_disciplina`, `turno_disciplina`) VALUES
(2, 0, 0, 'AnÃ¡lise de Projetos e Sistemas', 'NOTURNO'),
(3, 0, 0, 'Engenharia de Software', 'VESPERTINO'),
(6, 0, 0, 'BD', 'MATUTINO');

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
(12, 'Dia de Dormir ate mais tarde', '#1C1C1C', '2018-06-09 00:30:00', '2018-06-09 06:00:00'),
(2, 'Palestra Empreendedorismo', '#40E0D0', '0000-00-00 00:00:00', '2018-05-30 17:00:00'),
(3, 'Reuniao Representantes', '#FFD700', '2018-05-31 08:05:00', '2018-05-31 09:00:00'),
(4, 'Reuniao 3', '#1C1C1C', '2018-06-01 10:00:00', '2018-06-01 11:00:00'),
(5, 'Reuniao 4', '#0071c5', '2018-06-04 11:00:00', '2017-06-04 12:00:00'),
(6, 'Reuniao 5', '#FFD700', '2018-06-04 13:00:00', '2018-06-04 14:00:00'),
(7, 'Reuniao 6', '#0071c5', '2018-06-04 14:00:00', '2018-06-04 15:00:00'),
(9, 'Hack SaÃºde 2018', '#FF4500', '2018-06-02 09:15:00', '2018-06-03 18:00:00'),
(11, 'ApresentaÃ§Ã£o Trabalho', '#FF4500', '2018-06-08 19:30:00', '2018-06-08 21:30:00'),
(14, 'Estrutura de Dados', '#8B4513', '2018-06-08 14:10:00', '2018-06-08 18:00:00'),
(20, 'asjash', 'lime', '2018-06-08 00:00:00', '2018-06-09 00:00:00'),
(21, 'ReuniÃ£o de TI', '#A020F0', '2018-06-14 09:00:00', '2018-06-01 10:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(10) UNSIGNED NOT NULL,
  `nome_professor` varchar(50) DEFAULT NULL,
  `sobrenome_professor` varchar(50) DEFAULT NULL,
  `status_atual` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `nome_professor`, `sobrenome_professor`, `status_atual`) VALUES
(1, 'Fernando', 'Xavier', 0),
(3, 'Wilson', 'Amaral', 0),
(6, 'Luciano', 'Zanzoni', 0),
(7, 'Eliel', 'Silva', 0),
(11, 'Fernando Xavier', 'da Silva', 0),
(12, 'jj', ',mmm', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(10) UNSIGNED NOT NULL,
  `nome_sala` varchar(50) DEFAULT NULL,
  `capacidade` int(10) UNSIGNED DEFAULT NULL,
  `pcd` varchar(5) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id_sala`, `nome_sala`, `capacidade`, `pcd`, `tipo`) VALUES
(1, 'Lab 5', 36, 'SIM', ''),
(3, 'Lab 3', 31, 'NAO', ''),
(5, '305', 40, 'SIM', ''),
(6, 'S4', 50, 'NAO', ''),
(8, 'Lab 5', 50, 'NAO', 'Estudo'),
(9, 'Lab 5', 43, 'NAO', 'Estudo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `disciplina_FKIndex1` (`professor_id_professor`),
  ADD KEY `disciplina_FKIndex2` (`sala_id_sala`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
