-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2022 às 17:06
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reverse`
--
CREATE DATABASE IF NOT EXISTS `reverse` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `reverse`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebook`
--

DROP TABLE IF EXISTS `ebook`;
CREATE TABLE `ebook` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ebook`
--

INSERT INTO `ebook` (`id`, `name`, `author`, `photo`) VALUES
(1, 'mida???', 'Eliel Siqueira', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ecoponto`
--

DROP TABLE IF EXISTS `ecoponto`;
CREATE TABLE `ecoponto` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` char(11) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ecoponto`
--
ALTER TABLE `ecoponto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ecoponto`
--
ALTER TABLE `ecoponto`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
