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
-- Banco de dados: `db_pokedex`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pokemon`
--

CREATE TABLE `tb_pokemon` (
  `cd_pokemon` int(11) NOT NULL,
  `nm_pokemon` varchar(30) NOT NULL,
  `ds_tipo1` varchar(30) NOT NULL,
  `ds_tipo2` varchar(30) NOT NULL,
  `url_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pokemon`
--

INSERT INTO `tb_pokemon` (`cd_pokemon`, `nm_pokemon`, `ds_tipo1`, `ds_tipo2`, `url_img`) VALUES
(16, 'Charrizard', 'fire ', 'flyind', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/006.png'),
(44, 'Charmander', 'Fire', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/004.png'),
(45, 'Charmeleon', 'Fire', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/005.png'),
(46, 'Squirtle', 'Water', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/007.png'),
(47, 'Wartortle', 'Water', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/008.png'),
(48, 'Blastoise', 'Water', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/009.png'),
(49, 'Caterpie', 'Bug', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/010.png'),
(50, 'Metapod', 'Bug', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/011.png'),
(51, 'Butterfree', 'Bug', 'Flying', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/012.png'),
(52, 'Weedle', 'Bug', 'Poison', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/013.png'),
(53, 'Kakuna', 'Bug', 'Poison', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/014.png'),
(54, 'Beedrill', 'Bug', 'Poison', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/015.png'),
(55, 'Pikachu', 'Electric', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/025.png'),
(56, 'Raichu', 'Electric', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/026.png'),
(57, 'Clefairy', 'Fairy', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/035.png'),
(58, 'Vulpix', 'Fire', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/037.png'),
(59, 'Ninetales', 'Fire', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/038.png'),
(60, 'Diglett', 'Ground', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/050.png'),
(61, 'Psyduck', 'Water', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/054.png'),
(62, 'Abra', 'Psychic', '', 'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/063.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_pokemon`
--
ALTER TABLE `tb_pokemon`
  ADD PRIMARY KEY (`cd_pokemon`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_pokemon`
--
ALTER TABLE `tb_pokemon`
  MODIFY `cd_pokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
