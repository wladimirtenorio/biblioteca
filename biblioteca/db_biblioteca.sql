-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Dez-2018 às 20:47
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
  `hora_data_emprestimo` datetime NOT NULL,
  `hora_data_devolucao` datetime NOT NULL,
  `devolucao` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbemprestimo`
--

INSERT INTO `tbemprestimo` (`id`, `id_emprestimo`, `id_obra`, `usuario`, `hora_data_emprestimo`, `hora_data_devolucao`, `devolucao`) VALUES
(5, 22, 1, 11, '2018-12-09 00:00:00', '2018-12-09 06:07:00', 0),
(7, 14, 4, 4, '2018-12-12 02:16:27', '2018-12-12 02:18:34', 0),
(8, 15, 4, 4, '2018-12-12 04:18:22', '2018-12-12 04:30:46', 0),
(9, 16, 4, 4, '2018-12-12 04:27:02', '0000-00-00 00:00:00', 1),
(10, 15, 4, 4, '2018-12-12 04:30:33', '2018-12-12 04:30:46', 0),
(11, 16, 4, 4, '2018-12-12 04:35:37', '0000-00-00 00:00:00', 1),
(12, 14, 4, 4, '2018-12-12 04:40:06', '2018-12-12 06:18:30', 0),
(13, 12, 3, 4, '2018-12-12 04:47:57', '2018-12-12 04:48:02', 0),
(14, 9, 3, 4, '2018-12-12 04:56:00', '2018-12-12 05:35:27', 0),
(15, 9, 3, 4, '2018-12-12 05:39:42', '2018-12-12 05:39:45', 0),
(16, 9, 3, 4, '2018-12-12 05:39:50', '2018-12-12 05:45:26', 0),
(17, 9, 3, 4, '2018-12-12 05:49:49', '2018-12-12 05:50:43', 0),
(18, 10, 3, 4, '2018-12-12 05:50:39', '2018-12-12 05:50:41', 0),
(19, 10, 3, 4, '2018-12-12 05:50:45', '2018-12-13 08:23:51', 0),
(20, 9, 3, 2, '2018-12-13 07:15:11', '2018-12-13 07:15:36', 0),
(21, 13, 4, 7, '2018-12-13 16:17:21', '2018-12-13 16:17:24', 0),
(22, 15, 4, 7, '2018-12-13 16:18:10', '2018-12-13 16:18:12', 0),
(23, 15, 4, 7, '2018-12-13 16:18:16', '2018-12-13 16:18:18', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `id` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblivro`
--

INSERT INTO `tblivro` (`id`, `id_obra`, `status`, `usuario`, `data_hora`) VALUES
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
(16, 4, 1, '', '2018-12-12 04:35:37'),
(17, 2, 0, '', '0000-00-00 00:00:00'),
(18, 2, 0, '', '0000-00-00 00:00:00'),
(22, 2, 0, '', '0000-00-00 00:00:00'),
(23, 0, 0, '', '0000-00-00 00:00:00'),
(24, 0, 0, '', '0000-00-00 00:00:00'),
(25, 0, 0, '', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `nome`, `email`, `senha`, `admin`) VALUES
(1, 'admin', 'admin@adm.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'maria silva', 'maria@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'JoÃ£o Silva', 'joao@silva.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbobra`
--
ALTER TABLE `tbobra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
