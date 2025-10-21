-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Set-2022 às 23:58
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_nome` int(11) NOT NULL,
  `nm_nome` varchar(140) NOT NULL,
  `nm_email` varchar(140) NOT NULL,
  `nm_senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_nome`, `nm_nome`, `nm_email`, `nm_senha`) VALUES
(1, '', 'antonio', 'antonio'),
(2, '', 'antonio', 'antonio'),
(3, '', 'antonio', 'antonio'),
(4, '', 'antonio', 'antonio'),
(5, '', 'antonio', 'antonio'),
(6, '', 'antonio', 'antonio'),
(7, '', 'antonio', 'antonio'),
(8, '', 'antonio', 'antonio'),
(9, '', 'antonio', 'antonio'),
(10, '', 'antonio', 'antonio'),
(11, '', 'antonio', 'antonio'),
(12, '', 'antonio', 'antonio'),
(13, '', 'antonio', 'antonio'),
(14, '', 'antonio', 'antonio'),
(15, '', 'antonio', 'antonio'),
(16, '', 'antonio', 'antonio'),
(17, '', 'antonio', 'antonio'),
(18, '', 'antonio', 'antonio'),
(19, '', 'antonio', 'antonio'),
(20, '', 'antonio', 'antonio'),
(21, '', 'antonio', 'antonio'),
(22, '', 'antonio', 'antonio'),
(23, '', 'antonio', 'antonio'),
(24, '', 'antonio', 'antonio'),
(25, '', 'antonio', 'antonio'),
(26, '', 'antonio', 'antonio'),
(27, '', 'antonio', 'antonio'),
(28, '', 'antonio', 'antonio'),
(29, '', 'antonio', 'antonio'),
(30, '', 'antonio', 'antonio'),
(31, '', 'antonio', 'antonio'),
(32, '', 'antonio', 'antonio'),
(33, '', 'antonio', 'antonio'),
(34, '', 'antonio', 'antonio'),
(35, '', 'antonio', 'antonio'),
(36, '', 'antonio', 'antonio'),
(37, '', 'antonio', 'antonio'),
(38, '', 'antonio', 'antonio'),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', ''),
(44, '', 'antonio', 'antonio'),
(45, '', 'antonio', 'antonio'),
(46, '', 'antonio', 'antonio'),
(47, '', 'antonio', 'antonio'),
(48, '', 'antonio', 'antonio'),
(49, '', 'antonio', 'antonio'),
(50, '', 'antonio', 'antonio'),
(51, '', 'antonio', 'antonio'),
(52, '', 'antonio', 'antonio'),
(53, '', 'sdsdsd', 'sdsdsd'),
(54, '', 'sdsdsd', 'sdsdsd'),
(55, '', 'sdsdsd', 'sdsdsd'),
(56, '', 'sdsdsd', 'sdsdsd'),
(57, '', 'sdsdsd', 'sdsdsd'),
(58, '', 'antonio', 'antonio'),
(59, '', 'antonio', 'antonio'),
(60, '', 'antonio', 'antonio'),
(61, '', 'antonio', 'antonio'),
(62, '', 'antonio', 'antonio'),
(63, '', 'gffff', 'gffff'),
(64, '', 'gffff', 'gffff'),
(65, '', 'gffff', 'gffff'),
(66, '', 'gffff', 'gffff'),
(67, '', 'gffff', 'gffff'),
(68, '', 'antonio', 'antonio'),
(69, '', 'antonio', 'antonio'),
(70, '', 'antonio', 'antonio'),
(71, '', 'antonio', 'antonio'),
(72, '', 'antonio', 'antonio'),
(73, '', 'antonio', 'antonio'),
(74, '', 'antonio', 'antonio'),
(75, '', 'antonio', 'antonio'),
(76, '', 'antonio', 'antonio'),
(77, '', 'antonio', 'antonio'),
(78, '', '', ''),
(79, '', '', ''),
(80, '', '', ''),
(81, '', '', ''),
(82, '', '', ''),
(83, '', '', ''),
(84, '', '', ''),
(85, '', '', ''),
(86, '', '', ''),
(87, '', 'yuongartte@gmail.com', 'yuongartte@gmail'),
(88, '', 'yuongartte@gmail.com', 'yuongartte@gmail'),
(89, '', 'yuongartte@gmail.com', 'yuongartte@gmail'),
(90, '', 'yuongartte@gmail.com', 'yuongartte@gmail'),
(91, '', 'yuongartte@gmail.com', 'yuongartte@gmail'),
(92, '', 'yuongartte@gmail.com', 'yuongartte@gmail'),
(93, '', '', ''),
(94, '', '', ''),
(95, '', '', ''),
(96, '', '', ''),
(97, '', '', ''),
(98, '', '', ''),
(99, '', '', ''),
(100, '', '0', '0'),
(101, '', '0', '0'),
(102, '', '', ''),
(103, '', '', ''),
(104, '', 'asas', 'asas'),
(105, '', '', ''),
(106, '', '', ''),
(107, '', '', ''),
(108, '', '', ''),
(109, '', '', ''),
(110, '', '', ''),
(111, '', '', ''),
(112, '', '', ''),
(113, '', '', ''),
(114, '', '', ''),
(115, '', '', ''),
(116, '', '', ''),
(117, '', '', ''),
(118, '', '10', '10'),
(119, '', '', ''),
(120, '', 'yuongartte@gmail.com', 'yuongartte@gmail'),
(121, '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_nome`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_nome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
