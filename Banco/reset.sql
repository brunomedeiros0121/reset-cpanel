-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/07/2017 às 13:38
-- Versão do servidor: 10.1.24-MariaDB
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reset`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_servicos`
--

CREATE TABLE `tb_servicos` (
  `id` int(11) NOT NULL,
  `text_id` varchar(20) NOT NULL COMMENT 'recebe o nome do serviço a ser reiniciado',
  `text_name` varchar(20) NOT NULL COMMENT 'recebo o name do input para o php',
  `label` varchar(20) NOT NULL COMMENT 'Nome a ser apresentado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_servidores`
--

CREATE TABLE `tb_servidores` (
  `id` int(10) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `ip` varchar(17) NOT NULL COMMENT 'Ip do servidor',
  `chave` varchar(25) NOT NULL COMMENT 'Token de conexao Cpanel',
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_servicos`
--
ALTER TABLE `tb_servicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `text_id` (`text_id`),
  ADD UNIQUE KEY `text_name` (`text_name`),
  ADD UNIQUE KEY `label` (`label`);

--
-- Índices de tabela `tb_servidores`
--
ALTER TABLE `tb_servidores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`),
  ADD UNIQUE KEY `chave` (`chave`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_servicos`
--
ALTER TABLE `tb_servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_servidores`
--
ALTER TABLE `tb_servidores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
