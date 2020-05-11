-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Maio-2020 às 17:57
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simao_toco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `tribo_id` int(11) NOT NULL,
  `descricao_area` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_area` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`area_id`, `tribo_id`, `descricao_area`, `endereco`, `telefone`, `email`, `estado_area`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Huila', '', NULL, NULL, 1, '2020-05-07 23:54:30', '2020-05-08 23:19:34'),
(2, 2, 'Malange', '', NULL, NULL, 1, '2020-05-10 00:07:31', '2020-05-10 00:07:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `casamento`
--

CREATE TABLE `casamento` (
  `casamento_id` int(11) NOT NULL,
  `membro_homem_id` int(11) NOT NULL,
  `membro_mulher_id` int(11) NOT NULL,
  `padrinho_nome` varchar(100) NOT NULL,
  `madrinha_nome` varchar(100) NOT NULL,
  `padrinhos_casados` enum('SIM','NÃO') DEFAULT 'NÃO',
  `data_casamento` varchar(30) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `casamento`
--

INSERT INTO `casamento` (`casamento_id`, `membro_homem_id`, `membro_mulher_id`, `padrinho_nome`, `madrinha_nome`, `padrinhos_casados`, `data_casamento`, `data_criacao`, `data_atualizacao`) VALUES
(1, 20, 21, 'AAA', 'BBB', 'SIM', '2020-05-26', '2020-05-08 13:20:32', '0000-00-00 00:00:00'),
(2, 22, 24, 'AAA', 'BBB', 'SIM', '2020-05-05', '2020-05-09 10:10:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `descricao_categoria` varchar(35) NOT NULL,
  `estado_categoria` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `descricao_categoria`, `estado_categoria`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Cristão', 1, '2020-05-07 23:43:29', '2020-05-10 00:21:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `classe_id` int(11) NOT NULL,
  `paroquia_id` int(11) NOT NULL,
  `descricao_classe` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_classe` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`classe_id`, `paroquia_id`, `descricao_classe`, `endereco`, `telefone`, `email`, `estado_classe`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Vila Sede', '', NULL, NULL, 1, '2020-05-07 23:42:57', '2020-05-08 22:59:42'),
(2, 2, 'Shopping', '', NULL, NULL, 1, '2020-05-09 23:07:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `documento_id` int(11) NOT NULL,
  `membro_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo_documento` enum('CARTÃO','TESTIFICAÇÃO','CERTIDÃO DE CASAMENTO','CERTIDÃO DE BAPTISMO') DEFAULT 'CARTÃO',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`documento_id`, `membro_id`, `usuario_id`, `tipo_documento`, `data_criacao`) VALUES
(1, 20, 1, 'CARTÃO', '2020-05-08 15:35:11'),
(2, 21, 1, 'TESTIFICAÇÃO', '2020-05-08 15:50:17'),
(3, 20, 1, 'CERTIDÃO DE CASAMENTO', '2020-05-08 19:38:42'),
(4, 22, 1, 'CERTIDÃO DE BAPTISMO', '2020-05-08 21:16:08'),
(5, 22, 1, 'CARTÃO', '2020-05-08 21:19:35'),
(6, 20, 1, 'CARTÃO', '2020-05-08 21:33:59'),
(7, 20, 1, 'CARTÃO', '2020-05-08 21:34:15'),
(8, 22, 1, 'CERTIDÃO DE BAPTISMO', '2020-05-08 21:34:27'),
(9, 21, 1, 'CARTÃO', '2020-05-08 21:34:35'),
(10, 20, 1, 'CARTÃO', '2020-05-08 21:34:38'),
(11, 20, 1, 'CERTIDÃO DE BAPTISMO', '2020-05-08 21:34:44'),
(12, 22, 1, 'CERTIDÃO DE BAPTISMO', '2020-05-08 21:34:54'),
(13, 21, 1, 'CERTIDÃO DE BAPTISMO', '2020-05-08 21:35:04'),
(14, 21, 1, 'CERTIDÃO DE BAPTISMO', '2020-05-08 21:39:10'),
(15, 21, 1, 'CERTIDÃO DE BAPTISMO', '2020-05-09 10:10:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `funcao_id` int(11) NOT NULL,
  `descricao_funcao` varchar(35) NOT NULL,
  `estado_funcao` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`funcao_id`, `descricao_funcao`, `estado_funcao`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Membro', 1, '2020-05-07 23:43:39', '2020-05-10 00:26:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `identificacao`
--

CREATE TABLE `identificacao` (
  `identificacao_id` int(11) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  `descricao_identificacao` varchar(100) NOT NULL,
  `tipo_identificacao` enum('BI','PASSAPORTE','CÉDULA','OUTRO') DEFAULT 'BI',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `identificacao`
--

INSERT INTO `identificacao` (`identificacao_id`, `pessoa_id`, `descricao_identificacao`, `tipo_identificacao`, `data_criacao`, `data_atualizacao`) VALUES
(20, 23, '33333', 'BI', '2020-05-08 12:14:16', '0000-00-00 00:00:00'),
(21, 24, '1234', 'BI', '2020-05-08 12:19:53', '0000-00-00 00:00:00'),
(22, 25, '12345', 'BI', '2020-05-08 12:26:36', '0000-00-00 00:00:00'),
(23, 26, '123456', 'BI', '2020-05-08 13:19:20', '0000-00-00 00:00:00'),
(24, 27, '33333111', 'BI', '2020-05-08 14:20:57', '0000-00-00 00:00:00'),
(25, 23, '3333312', 'BI', '2020-05-09 09:54:58', '0000-00-00 00:00:00'),
(26, 29, '333331111', 'BI', '2020-05-09 10:09:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `igreja_nacional`
--

CREATE TABLE `igreja_nacional` (
  `igreja_nacional_id` int(11) NOT NULL,
  `descricao_igreja_nacional` varchar(35) NOT NULL,
  `sigla` varchar(30) NOT NULL,
  `indicador_telefonico` varchar(5) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_igreja_nacional` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `igreja_nacional`
--

INSERT INTO `igreja_nacional` (`igreja_nacional_id`, `descricao_igreja_nacional`, `sigla`, `indicador_telefonico`, `endereco`, `telefone`, `email`, `estado_igreja_nacional`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Angola', 'AO', '+244', '', NULL, NULL, 1, '2020-05-07 23:42:28', '2020-05-10 00:11:09'),
(2, 'Portugal', 'PT', '+53', '', NULL, NULL, 1, '2020-05-09 23:30:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `descricao_log` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`log_id`, `usuario_id`, `descricao_log`, `data_criacao`) VALUES
(1, 1, 'usuário vanilson adicionado', '2020-05-09 00:33:18'),
(2, 1, 'usuário terminou sessão', '2020-05-09 00:36:09'),
(3, 1, 'usuário terminou sessão', '2020-05-09 00:36:29'),
(4, 2, 'usuário fez login', '2020-05-09 00:39:23'),
(5, 2, 'usuário terminou sessão', '2020-05-09 00:43:44'),
(6, 1, 'provincia eclesiastica Bengo adicionado', '2020-05-09 00:57:35'),
(7, 1, 'membro Osvaldo Calombe adicionado', '2020-05-09 09:54:58'),
(8, 1, 'membro Marta adicionado', '2020-05-09 10:09:49'),
(9, 1, 'casamento de 22 adicionado', '2020-05-09 10:10:16'),
(10, 1, 'documento CERTIDÃO DE BAPTISMO criado', '2020-05-09 10:10:47'),
(11, 1, 'pagamento de 24 registrado no valor de 30000', '2020-05-09 10:11:57'),
(12, 1, 'usuário terminou sessão', '2020-05-09 11:41:18'),
(13, 1, 'usuário kenny_mario atualizado', '2020-05-09 22:56:47'),
(14, 1, 'paroquia Belas adicionado', '2020-05-09 23:06:53'),
(15, 1, 'classe Shopping adicionado', '2020-05-09 23:07:19'),
(16, 1, 'paroquia Caxito adicionado', '2020-05-09 23:19:24'),
(17, 1, 'igreja nacional Portugal adicionado', '2020-05-09 23:30:51'),
(18, 1, 'provincia eclesiastica Lisboa adicionado', '2020-05-09 23:31:06'),
(19, 1, 'provincia eclesiastica Lisboa1 atualizada', '2020-05-09 23:31:59'),
(20, 1, 'provincia eclesiastica Lisboa atualizada', '2020-05-09 23:32:06'),
(21, 1, 'provincia eclesiastica Lisboa atualizada', '2020-05-09 23:35:15'),
(22, 1, 'provincia eclesiastica Lisboa atualizada', '2020-05-09 23:35:22'),
(23, 1, 'tribo Sulana 2 atualizado', '2020-05-09 23:45:34'),
(24, 1, 'tribo Sulana atualizado', '2020-05-09 23:45:40'),
(25, 1, 'tribo Norte Angola adicionado', '2020-05-10 00:07:16'),
(26, 1, 'area Malange adicionado', '2020-05-10 00:07:31'),
(27, 1, 'area Malange1 atualizada', '2020-05-10 00:07:39'),
(28, 1, 'area Malange atualizada', '2020-05-10 00:07:52'),
(29, 1, 'igreja nacional Angola atualizada', '2020-05-10 00:11:09'),
(30, 1, 'nacionalidade Portuguesa adicionado', '2020-05-10 00:15:41'),
(31, 1, 'nacionalidade Angolana atualizada', '2020-05-10 00:16:12'),
(32, 1, 'nacionalidade Angolana atualizada', '2020-05-10 00:16:18'),
(33, 1, 'categoria Cristão1 atualizada', '2020-05-10 00:21:18'),
(34, 1, 'categoria Cristão atualizada', '2020-05-10 00:21:28'),
(35, 1, 'função Membro11 atualizada', '2020-05-10 00:25:57'),
(36, 1, 'função Membro atualizada', '2020-05-10 00:26:03'),
(37, 1, 'usuário terminou sessão', '2020-05-10 11:50:16'),
(38, 2, 'usuário fez login', '2020-05-10 11:50:29'),
(39, 2, 'usuário osvaldo12 atualizado', '2020-05-10 11:51:01'),
(40, 2, 'usuário osvaldo1 atualizado', '2020-05-10 11:52:29'),
(41, 2, 'usuário terminou sessão', '2020-05-10 11:52:36'),
(42, 2, 'usuário fez login', '2020-05-10 11:52:46'),
(43, 2, 'usuário osvaldo atualizado', '2020-05-10 11:52:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `membro_id` int(11) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `data_admissao` varchar(30) NOT NULL,
  `data_baptismo` varchar(30) DEFAULT NULL,
  `casado` enum('SIM','NÃO') DEFAULT 'NÃO',
  `categoria_id` int(11) NOT NULL,
  `funcao_id` int(11) NOT NULL,
  `estado_membro` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `membro`
--

INSERT INTO `membro` (`membro_id`, `pessoa_id`, `area_id`, `classe_id`, `data_admissao`, `data_baptismo`, `casado`, `categoria_id`, `funcao_id`, `estado_membro`, `data_criacao`, `data_atualizacao`) VALUES
(20, 25, 1, 1, '2020-05-20', '', 'NÃO', 1, 1, 1, '2020-05-08 12:26:37', '2020-05-08 22:46:57'),
(21, 26, 1, 1, '2020-05-22', '2020-05-19', 'NÃO', 1, 1, 1, '2020-05-08 13:19:20', '2020-05-08 22:45:44'),
(22, 27, 1, 1, '2020-05-22', '', 'NÃO', 1, 1, 1, '2020-05-08 14:20:57', '2020-05-08 22:49:56'),
(23, 23, 1, 1, '2020-05-14', '2020-05-28', 'NÃO', 1, 1, 1, '2020-05-09 09:54:58', '0000-00-00 00:00:00'),
(24, 29, 1, 1, '2020-05-21', '2020-05-19', 'NÃO', 1, 1, 1, '2020-05-09 10:09:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE `nacionalidade` (
  `nacionalidade_id` int(11) NOT NULL,
  `descricao_nacionalidade` varchar(35) NOT NULL,
  `pais` varchar(35) NOT NULL,
  `estado_nacionalidade` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`nacionalidade_id`, `descricao_nacionalidade`, `pais`, `estado_nacionalidade`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Angolana', 'Angola', 1, '2020-05-07 23:58:32', '2020-05-10 00:16:18'),
(2, 'Portuguesa', 'Portugal', 1, '2020-05-10 00:15:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_usuario`
--

CREATE TABLE `nivel_usuario` (
  `nivel_usuario_id` int(11) NOT NULL,
  `descricao_nivel_usuario` varchar(35) NOT NULL,
  `codigo_nivel_usuario` varchar(35) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel_usuario`
--

INSERT INTO `nivel_usuario` (`nivel_usuario_id`, `descricao_nivel_usuario`, `codigo_nivel_usuario`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Administrador', '1', '2020-05-08 23:38:04', '0000-00-00 00:00:00'),
(2, 'Gestor de Membros', '2', '2020-05-08 23:38:50', '0000-00-00 00:00:00'),
(3, 'Finanças', '3', '2020-05-08 23:39:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `pagamento_id` int(11) NOT NULL,
  `membro_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `mes_referencia` varchar(30) NOT NULL,
  `valor` float NOT NULL,
  `tipo_pagamento` enum('DIZIMO','QUOTA','OFERTA','OUTRO') DEFAULT 'DIZIMO',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`pagamento_id`, `membro_id`, `usuario_id`, `mes_referencia`, `valor`, `tipo_pagamento`, `data_criacao`, `data_atualizacao`) VALUES
(1, 20, 1, '2', 112312000, 'DIZIMO', '2020-05-08 14:21:47', '0000-00-00 00:00:00'),
(2, 24, 1, '12-2020', 30000, 'DIZIMO', '2020-05-09 10:11:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paroquia`
--

CREATE TABLE `paroquia` (
  `paroquia_id` int(11) NOT NULL,
  `provincia_eclesiastica_id` int(11) NOT NULL,
  `descricao_paroquia` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_paroquia` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paroquia`
--

INSERT INTO `paroquia` (`paroquia_id`, `provincia_eclesiastica_id`, `descricao_paroquia`, `endereco`, `telefone`, `email`, `estado_paroquia`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Viana', '', NULL, NULL, 1, '2020-05-07 23:42:46', '2020-05-08 23:03:24'),
(2, 1, 'Belas', '', NULL, NULL, 1, '2020-05-09 23:06:53', '0000-00-00 00:00:00'),
(3, 2, 'Caxito', '', NULL, NULL, 1, '2020-05-09 23:19:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `pessoa_id` int(11) NOT NULL,
  `nacionalidade_id` int(11) NOT NULL,
  `pessoa_nome` varchar(100) NOT NULL,
  `nome_pai` varchar(100) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `data_nascimento` varchar(30) NOT NULL,
  `provincia_nascimento` varchar(30) NOT NULL,
  `municipio_nascimento` varchar(30) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `estado_civil` enum('SOLTEIRO','CASADO','DIVORCIADO','VIUVIO') DEFAULT 'SOLTEIRO',
  `sexo` enum('MASCULINO','FEMENINO') DEFAULT 'MASCULINO',
  `foto` varchar(30) DEFAULT NULL,
  `estado_pessoa` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`pessoa_id`, `nacionalidade_id`, `pessoa_nome`, `nome_pai`, `nome_mae`, `data_nascimento`, `provincia_nascimento`, `municipio_nascimento`, `telefone`, `endereco`, `estado_civil`, `sexo`, `foto`, `estado_pessoa`, `data_criacao`, `data_atualizacao`) VALUES
(23, 1, 'Osvaldo Calombe', 'AAAA', 'BBBB', '2020-05-13', 'Luanda', '2020-05-13', '', '', 'SOLTEIRO', 'MASCULINO', NULL, 1, '2020-05-08 12:14:15', '0000-00-00 00:00:00'),
(24, 1, 'Vanilson', 'AAAA', 'BBBB', '2020-05-13', 'Luanda', '2020-05-13', '', '', 'SOLTEIRO', 'MASCULINO', '1588940358.jpg', 1, '2020-05-08 12:19:53', '0000-00-00 00:00:00'),
(25, 1, 'Mario', 'AAAA', 'BBBB', '2020-05-13', 'Luanda', '2020-05-13', '', '', 'SOLTEIRO', 'MASCULINO', '1588940766.png', 1, '2020-05-08 12:26:36', '0000-00-00 00:00:00'),
(26, 1, 'Ana', 'AAAA', 'BBBB', '2020-05-11', 'Luanda', '2020-05-11', '', '', 'SOLTEIRO', 'FEMENINO', '1588943925.png', 1, '2020-05-08 13:19:20', '0000-00-00 00:00:00'),
(27, 1, 'Osvaldo Calombe 11', 'AAAA', 'BBBB', '2020-05-12', 'Luanda', '2020-05-12', '', '', 'SOLTEIRO', 'MASCULINO', '1588947609.png', 1, '2020-05-08 14:20:57', '0000-00-00 00:00:00'),
(28, 1, 'Osvaldo Calombe', 'AAAA', 'BBBB', '2020-05-14', 'Luanda', '2020-05-14', '', '', 'SOLTEIRO', 'MASCULINO', '1589018061.png', 1, '2020-05-09 09:54:58', '0000-00-00 00:00:00'),
(29, 1, 'Marta', 'AAAA', 'BBBB', '2015-05-04', 'Luanda', '2015-05-04', '', '', 'SOLTEIRO', 'FEMENINO', '1589018896.png', 1, '2020-05-09 10:09:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia_eclesiastica`
--

CREATE TABLE `provincia_eclesiastica` (
  `provincia_eclesiastica_id` int(11) NOT NULL,
  `igreja_nacional_id` int(11) NOT NULL,
  `descricao_provincia_eclesiastica` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_provincia_eclesiastica` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `provincia_eclesiastica`
--

INSERT INTO `provincia_eclesiastica` (`provincia_eclesiastica_id`, `igreja_nacional_id`, `descricao_provincia_eclesiastica`, `endereco`, `telefone`, `email`, `estado_provincia_eclesiastica`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Luanda', '', NULL, NULL, 1, '2020-05-07 23:42:37', '2020-05-08 23:15:19'),
(2, 1, 'Bengo', '', NULL, NULL, 1, '2020-05-09 00:57:35', '0000-00-00 00:00:00'),
(3, 2, 'Lisboa', '', NULL, NULL, 1, '2020-05-09 23:31:06', '2020-05-09 23:35:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tribo`
--

CREATE TABLE `tribo` (
  `tribo_id` int(11) NOT NULL,
  `descricao_tribo` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_tribo` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tribo`
--

INSERT INTO `tribo` (`tribo_id`, `descricao_tribo`, `endereco`, `telefone`, `email`, `estado_tribo`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Sulana', '', NULL, NULL, 1, '2020-05-07 23:43:08', '2020-05-09 23:45:40'),
(2, 'Norte Angola', '', NULL, NULL, 1, '2020-05-10 00:07:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `membro_id` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `codigo_nivel_usuario` int(11) NOT NULL,
  `estado_usuario` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `membro_id`, `nome_usuario`, `senha`, `email`, `codigo_nivel_usuario`, `estado_usuario`, `data_criacao`, `data_atualizacao`) VALUES
(1, 20, 'admin', 'admin', '', 1, 1, '2020-05-08 14:45:59', '0000-00-00 00:00:00'),
(2, 0, 'osvaldo', 'admin', 'osvaldozamba@gmail.com', 2, 1, '2020-05-08 23:45:57', '2020-05-10 11:52:58'),
(3, 0, 'kenny_mario', 'mario', 'valerio@gmail.com', 3, 1, '2020-05-09 00:32:17', '2020-05-09 22:56:46'),
(4, 0, 'vanilson', 'admin', 'stelviocardoso1@gmail.com', 1, 1, '2020-05-09 00:33:18', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `casamento`
--
ALTER TABLE `casamento`
  ADD PRIMARY KEY (`casamento_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`classe_id`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`documento_id`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`funcao_id`);

--
-- Indexes for table `identificacao`
--
ALTER TABLE `identificacao`
  ADD PRIMARY KEY (`identificacao_id`);

--
-- Indexes for table `igreja_nacional`
--
ALTER TABLE `igreja_nacional`
  ADD PRIMARY KEY (`igreja_nacional_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`membro_id`);

--
-- Indexes for table `nacionalidade`
--
ALTER TABLE `nacionalidade`
  ADD PRIMARY KEY (`nacionalidade_id`);

--
-- Indexes for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  ADD PRIMARY KEY (`nivel_usuario_id`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`pagamento_id`);

--
-- Indexes for table `paroquia`
--
ALTER TABLE `paroquia`
  ADD PRIMARY KEY (`paroquia_id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`pessoa_id`);

--
-- Indexes for table `provincia_eclesiastica`
--
ALTER TABLE `provincia_eclesiastica`
  ADD PRIMARY KEY (`provincia_eclesiastica_id`);

--
-- Indexes for table `tribo`
--
ALTER TABLE `tribo`
  ADD PRIMARY KEY (`tribo_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `casamento`
--
ALTER TABLE `casamento`
  MODIFY `casamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `classe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `documento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `funcao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `identificacao`
--
ALTER TABLE `identificacao`
  MODIFY `identificacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `igreja_nacional`
--
ALTER TABLE `igreja_nacional`
  MODIFY `igreja_nacional_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `membro`
--
ALTER TABLE `membro`
  MODIFY `membro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nacionalidade`
--
ALTER TABLE `nacionalidade`
  MODIFY `nacionalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  MODIFY `nivel_usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `pagamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paroquia`
--
ALTER TABLE `paroquia`
  MODIFY `paroquia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `pessoa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `provincia_eclesiastica`
--
ALTER TABLE `provincia_eclesiastica`
  MODIFY `provincia_eclesiastica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tribo`
--
ALTER TABLE `tribo`
  MODIFY `tribo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
