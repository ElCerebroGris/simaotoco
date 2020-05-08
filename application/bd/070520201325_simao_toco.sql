-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Maio-2020 às 14:23
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
  `descricao_tribo` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_area` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descricao_categoria` varchar(35) NOT NULL,
  `estado_categoria` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `classe_id` int(11) NOT NULL,
  `descricao_classe` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `paroquia_id` int(11) NOT NULL,
  `estado_classe` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`classe_id`, `descricao_classe`, `endereco`, `telefone`, `email`, `paroquia_id`, `estado_classe`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Vila Sede', '', NULL, NULL, 1, 1, '2020-05-07 12:05:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `id_funcao` int(11) NOT NULL,
  `descricao_funcao` varchar(35) NOT NULL,
  `estado_funcao` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `identificacao`
--

CREATE TABLE `identificacao` (
  `identificacao_id` int(11) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  `descricao_identificacao` varchar(100) NOT NULL,
  `tipo_identificacao` int(11) NOT NULL,
  `estado_identificacao` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `igreja_nacional`
--

CREATE TABLE `igreja_nacional` (
  `igreja_nacional_id` int(11) NOT NULL,
  `descricao_igreja_nacional` varchar(100) NOT NULL,
  `sigla` varchar(4) NOT NULL,
  `indicador_telefonico` varchar(4) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_igreja_nacional` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `igreja_nacional`
--

INSERT INTO `igreja_nacional` (`igreja_nacional_id`, `descricao_igreja_nacional`, `sigla`, `indicador_telefonico`, `endereco`, `telefone`, `email`, `estado_igreja_nacional`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Angola', 'ANG', '+244', '', NULL, NULL, 1, '2020-05-07 12:03:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `usuario_id` varchar(30) NOT NULL,
  `descricao_log` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `membro_id` int(11) NOT NULL,
  `pessoa_id` int(100) NOT NULL,
  `area_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `data_admissao` varchar(10) NOT NULL,
  `data_baptismo` varchar(10) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `estado_membro` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE `nacionalidade` (
  `nacionalidade_id` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `descricao_nacionalidade` varchar(100) NOT NULL,
  `estado_nacionalidade` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_usuario`
--

CREATE TABLE `nivel_usuario` (
  `id_nivel_acesso` int(11) NOT NULL,
  `descricao_nivel_usuario` varchar(30) NOT NULL,
  `codigo_nivel_usuario` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel_usuario`
--

INSERT INTO `nivel_usuario` (`id_nivel_acesso`, `descricao_nivel_usuario`, `codigo_nivel_usuario`, `data_criacao`) VALUES
(1, 'Administrador', 1, '2020-05-07 09:48:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paroquia`
--

CREATE TABLE `paroquia` (
  `paroquia_id` int(11) NOT NULL,
  `descricao_paroquia` varchar(40) NOT NULL,
  `provincia_eclesiastica_id` int(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_paroquia` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paroquia`
--

INSERT INTO `paroquia` (`paroquia_id`, `descricao_paroquia`, `provincia_eclesiastica_id`, `endereco`, `telefone`, `email`, `estado_paroquia`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Sede', 1, '', NULL, NULL, 1, '2020-05-07 12:04:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `pessoa_id` int(11) NOT NULL,
  `pessoa_nome` varchar(100) NOT NULL,
  `nome_pai` varchar(100) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `id_nacionalidade` int(11) NOT NULL,
  `data_nascimento` varchar(30) NOT NULL,
  `estado_civil` int(11) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` text NOT NULL,
  `estado_pessoa` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia_eclesiastica`
--

CREATE TABLE `provincia_eclesiastica` (
  `provincia_eclesiastica_id` int(11) NOT NULL,
  `descricao_provincia_eclesiastica` varchar(40) NOT NULL,
  `igreja_nacional_id` int(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_provincia_eclesiastica` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `provincia_eclesiastica`
--

INSERT INTO `provincia_eclesiastica` (`provincia_eclesiastica_id`, `descricao_provincia_eclesiastica`, `igreja_nacional_id`, `endereco`, `telefone`, `email`, `estado_provincia_eclesiastica`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Luanda', 1, '', NULL, NULL, 1, '2020-05-07 12:04:19', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tribo`
--

INSERT INTO `tribo` (`tribo_id`, `descricao_tribo`, `endereco`, `telefone`, `email`, `estado_tribo`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Manasses', '', NULL, NULL, 1, '2020-05-07 12:06:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `nome_usuario` varchar(25) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `codigo_nivel_usuario` int(11) NOT NULL,
  `id_membro` int(11) DEFAULT NULL,
  `estado_usuario` int(11) NOT NULL DEFAULT '0',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nome_usuario`, `senha`, `codigo_nivel_usuario`, `id_membro`, `estado_usuario`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'admin', 'admin', 1, 1, 1, '2020-05-07 09:47:29', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`classe_id`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id_funcao`);

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
  ADD PRIMARY KEY (`id_nivel_acesso`);

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
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `classe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identificacao`
--
ALTER TABLE `identificacao`
  MODIFY `identificacao_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `igreja_nacional`
--
ALTER TABLE `igreja_nacional`
  MODIFY `igreja_nacional_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membro`
--
ALTER TABLE `membro`
  MODIFY `membro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nacionalidade`
--
ALTER TABLE `nacionalidade`
  MODIFY `nacionalidade_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paroquia`
--
ALTER TABLE `paroquia`
  MODIFY `paroquia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `pessoa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provincia_eclesiastica`
--
ALTER TABLE `provincia_eclesiastica`
  MODIFY `provincia_eclesiastica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tribo`
--
ALTER TABLE `tribo`
  MODIFY `tribo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
