-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2018 às 21:43
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbemprestimo`
--

CREATE TABLE `tbemprestimo` (
  `id` int(11) NOT NULL,
  `id_emprestimo` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `devolucao` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `id` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `data-hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblivro`
--

INSERT INTO `tblivro` (`id`, `id_obra`, `status`, `usuario`, `data-hora`) VALUES
(1, 2, 0, '', '0000-00-00 00:00:00'),
(2, 2, 0, '', '0000-00-00 00:00:00'),
(5, 2, 0, '', '0000-00-00 00:00:00'),
(6, 0, 0, '', '0000-00-00 00:00:00'),
(7, 2, 0, '', '0000-00-00 00:00:00'),
(9, 3, 0, '', '0000-00-00 00:00:00'),
(10, 3, 0, '', '0000-00-00 00:00:00'),
(12, 3, 0, '', '0000-00-00 00:00:00'),
(13, 4, 0, '', '0000-00-00 00:00:00'),
(14, 4, 0, '', '0000-00-00 00:00:00'),
(15, 4, 0, '', '0000-00-00 00:00:00'),
(16, 4, 0, '', '0000-00-00 00:00:00'),
(17, 2, 0, '', '0000-00-00 00:00:00'),
(18, 2, 0, '', '0000-00-00 00:00:00'),
(19, 2, 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbobra`
--

CREATE TABLE `tbobra` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `editora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbobra`
--

INSERT INTO `tbobra` (`id`, `nome`, `autor`, `ano`, `editora`) VALUES
(2, 'PHP FÃ¡cil', 'Wlad', 2018, 'IFRN'),
(3, 'PHP cientÃ­fico', 'Edna Maria', 2000, 'Elserver'),
(4, 'InteligÃªncia Artificial', 'Norving', 2000, 'Campus'),
(5, 'hgrhrtyh', 'yrty', 0, 'rtyrty');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `nome`, `email`, `senha`, `admin`) VALUES
(1, 'admin', 'admin@adm.com', '123456', 1),
(2, 'maria silva', 'maria@gmail.com', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbemprestimo`
--
ALTER TABLE `tbemprestimo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbobra`
--
ALTER TABLE `tbobra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbemprestimo`
--
ALTER TABLE `tbemprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbobra`
--
ALTER TABLE `tbobra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
