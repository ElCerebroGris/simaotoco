-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Maio-2020 às 23:22
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
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(4) NOT NULL,
  `descricao_categoria` varchar(35) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
); ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao_categoria`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Bispo', '2020-05-05 15:15:37', '0000-00-00 00:00:00'),
(2, 'Sacerdote', '2020-05-05 15:15:48', '0000-00-00 00:00:00'),
(3, 'Vate', '2020-05-05 15:15:59', '0000-00-00 00:00:00'),
(4, 'Vatecinadora', '2020-05-05 15:16:06', '0000-00-00 00:00:00'),
(5, 'Febe', '2020-05-05 15:16:14', '0000-00-00 00:00:00'),
(6, 'Catecúmeno', '2020-05-05 15:16:23', '0000-00-00 00:00:00'),
(7, 'Cristão', '2020-05-05 15:16:31', '0000-00-00 00:00:00'),
(8, 'Ancião(a) Conselheiro(a)', '2020-05-05 15:16:57', '0000-00-00 00:00:00'),
(9, 'Evangelista', '2020-05-05 15:17:08', '0000-00-00 00:00:00'),
(10, 'Pastor', '2020-05-05 15:17:16', '0000-00-00 00:00:00'),
(11, 'Pastor Reverendo', '2020-05-05 15:17:25', '0000-00-00 00:00:00'),
(12, 'Bispo Auxiliar', '2020-05-05 15:17:32', '0000-00-00 00:00:00'),
(13, 'Bispo Honorífico', '2020-05-05 15:17:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `descricao_classe` varchar(100) NOT NULL,
  `id_paroquia` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`id_classe`, `descricao_classe`, `id_paroquia`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Homens 1', 1, '2020-05-05 21:03:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id_estado_civil` int(11) NOT NULL,
  `descricao_estado_civil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado_civil`
--

INSERT INTO `estado_civil` (`id_estado_civil`, `descricao_estado_civil`) VALUES
(1, 'Solteiro'),
(2, 'Casado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `id_funcao` int(4) NOT NULL,
  `descricao_funcao` varchar(35) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`id_funcao`, `descricao_funcao`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Líder Espiritual da Igreja', '2020-05-05 15:25:35', '0000-00-00 00:00:00'),
(2, 'Adjunto do Secretário Executivo', '2020-05-05 15:25:45', '0000-00-00 00:00:00'),
(3, 'Director', '2020-05-05 15:25:59', '0000-00-00 00:00:00'),
(4, 'Oficial de Protocolo', '2020-05-05 15:26:08', '0000-00-00 00:00:00'),
(5, 'Oficial de Fiscalização', '2020-05-05 15:26:16', '0000-00-00 00:00:00'),
(6, 'Representante', '2020-05-05 15:26:24', '0000-00-00 00:00:00'),
(7, 'Conselheiro da Direcção', '2020-05-05 15:26:35', '0000-00-00 00:00:00'),
(8, 'Coordenador(a)', '2020-05-05 15:26:45', '0000-00-00 00:00:00'),
(9, 'Supervisor(a)', '2020-05-05 15:26:52', '0000-00-00 00:00:00'),
(10, 'Membro do Episcopado', '2020-05-05 15:27:10', '0000-00-00 00:00:00'),
(11, 'Membro do Corpo dos 24 Ancião', '2020-05-05 15:27:20', '0000-00-00 00:00:00'),
(12, 'Músico', '2020-05-05 15:27:27', '0000-00-00 00:00:00'),
(13, 'Secretário(a)', '2020-05-05 15:27:36', '0000-00-00 00:00:00'),
(14, 'Inspector', '2020-05-05 15:27:42', '0000-00-00 00:00:00'),
(15, 'Líder Espiritual', '2020-05-05 15:27:50', '0000-00-00 00:00:00'),
(16, 'Secretário Executivo', '2020-05-05 15:27:59', '0000-00-00 00:00:00'),
(17, 'Secretário Executivo Central', '2020-05-05 15:28:06', '0000-00-00 00:00:00'),
(18, 'Resp Área Administrativa', '2020-05-05 15:28:17', '0000-00-00 00:00:00'),
(19, 'Resp Área Espiritual', '2020-05-05 15:28:26', '0000-00-00 00:00:00'),
(20, 'Responsável Área Espiritual', '2020-05-05 15:28:35', '0000-00-00 00:00:00'),
(21, 'Responsável Área Administrativa', '2020-05-05 15:28:47', '0000-00-00 00:00:00'),
(22, 'Coord Reg Ecles Pastor Lopes Panzo', '2020-05-05 15:29:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `identificacao`
--

CREATE TABLE `identificacao` (
  `id_identificacao` int(11) NOT NULL,
  `descricao_identificacao` varchar(100) NOT NULL,
  `tipo_identificacao` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `identificacao`
--

INSERT INTO `identificacao` (`id_identificacao`, `descricao_identificacao`, `tipo_identificacao`, `data_criacao`) VALUES
(1, '1234', 1, '2020-05-03 20:25:16'),
(2, '0000', 1, '2020-05-03 22:49:12'),
(7, '111111111', 1, '2020-05-05 21:10:50'),
(8, '121212', 1, '2020-05-05 21:17:16'),
(9, '3333', 1, '2020-05-05 21:18:20'),
(11, '777', 1, '2020-05-05 21:20:51'),
(12, '12121212112', 1, '2020-05-05 21:22:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `igreja_nacional`
--

CREATE TABLE `igreja_nacional` (
  `id_igreja_nacional` int(11) NOT NULL,
  `descricao_igreja_nacional` varchar(100) NOT NULL,
  `sigla` varchar(4) NOT NULL,
  `indicador_telefonico` varchar(4) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `igreja_nacional`
--

INSERT INTO `igreja_nacional` (`id_igreja_nacional`, `descricao_igreja_nacional`, `sigla`, `indicador_telefonico`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Angola', 'ANG', '+244', '2020-05-05 20:51:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `id_membro` int(11) NOT NULL,
  `nome_membro` varchar(100) NOT NULL,
  `nome_pai` varchar(100) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `id_identificacao` int(11) NOT NULL,
  `id_nacionalidade` int(11) NOT NULL,
  `id_tribo` int(11) NOT NULL,
  `id_igreja_nacional` int(11) NOT NULL,
  `id_provincia_eclesiastica` int(11) NOT NULL,
  `id_paroquia` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `data_admissao` varchar(10) NOT NULL,
  `data_baptismo` varchar(10) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `data_nascimento` varchar(30) NOT NULL,
  `estado_civil` int(11) NOT NULL,
  `id_localidade` int(11) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membro`
--

INSERT INTO `membro` (`id_membro`, `nome_membro`, `nome_pai`, `nome_mae`, `id_identificacao`, `id_nacionalidade`, `id_tribo`, `id_igreja_nacional`, `id_provincia_eclesiastica`, `id_paroquia`, `id_classe`, `data_admissao`, `data_baptismo`, `id_categoria`, `id_funcao`, `data_nascimento`, `estado_civil`, `id_localidade`, `telefone`, `endereco`, `data_criacao`) VALUES
(1, 'AAA', 'BBB', 'CCC', 1, 1, 0, 0, 0, 0, 0, '', '', 0, 0, '2020-05-21', 1, 1, 'lll', 'lll', '2020-05-03 20:25:16'),
(2, 'Mario', 'MMM', 'AAA', 2, 1, 0, 0, 0, 0, 0, '', '', 0, 0, '2020-05-20', 1, 1, '', '', '2020-05-03 22:49:13'),
(3, 'LLLL', 'LLLL', 'LLLL', 12, 1, 1, 1, 1, 1, 1, '2020-05-12', '2020-05-21', 1, 1, '2020-05-18', 1, 1, '', '', '2020-05-05 21:22:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro_documento`
--

CREATE TABLE `membro_documento` (
  `id_membro_documento` int(11) NOT NULL,
  `id_membro` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro_pagamento`
--

CREATE TABLE `membro_pagamento` (
  `id_membro_pagamento` int(11) NOT NULL,
  `id_membro` int(11) NOT NULL,
  `id_pagamento` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE `nacionalidade` (
  `id_nacionalidade` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `descricao_nacionalidade` varchar(100) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`id_nacionalidade`, `pais`, `descricao_nacionalidade`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Angola', 'Angolana', '2020-05-03 19:42:43', '0000-00-00 00:00:00');

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
(1, 'Administrador', 1, '2020-05-03 18:42:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `descricao_pagamento` varchar(100) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paroquia`
--

CREATE TABLE `paroquia` (
  `id_paroquia` int(11) NOT NULL,
  `descricao_paroquia` varchar(40) NOT NULL,
  `id_provincia_eclesiastica` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paroquia`
--

INSERT INTO `paroquia` (`id_paroquia`, `descricao_paroquia`, `id_provincia_eclesiastica`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Sede', 1, '2020-05-05 20:58:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia_eclesiastica`
--

CREATE TABLE `provincia_eclesiastica` (
  `id_provincia_eclesiastica` int(4) NOT NULL,
  `descricao_provincia_eclesiastica` varchar(40) NOT NULL,
  `id_igreja_nacional` int(4) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `provincia_eclesiastica`
--

INSERT INTO `provincia_eclesiastica` (`id_provincia_eclesiastica`, `descricao_provincia_eclesiastica`, `id_igreja_nacional`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Luanda', 1, '2020-05-05 20:54:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `descricao_tipo_documento` varchar(100) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `descricao_tipo_documento`, `data_criacao`) VALUES
(1, 'CERTIFICADO DE CASAMENTO', '2020-05-03 21:08:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_identificacao`
--

CREATE TABLE `tipo_identificacao` (
  `id_tipo_identificacao` int(11) NOT NULL,
  `descricao_tipo_identificacao` varchar(100) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_identificacao`
--

INSERT INTO `tipo_identificacao` (`id_tipo_identificacao`, `descricao_tipo_identificacao`, `data_criacao`) VALUES
(1, 'Bilhete de Identidade', '2020-05-03 19:52:27'),
(2, 'Passaporte', '2020-05-03 19:52:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tribo`
--

CREATE TABLE `tribo` (
  `id_tribo` int(4) NOT NULL,
  `descricao_tribo` varchar(35) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tribo`
--

INSERT INTO `tribo` (`id_tribo`, `descricao_tribo`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'José', '2020-05-05 14:28:40', '0000-00-00 00:00:00'),
(2, 'Judá', '2020-05-05 14:28:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(25) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `codigo_nivel_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_membro` int(11) DEFAULT NULL,
  `estado_usuario` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `senha`, `codigo_nivel_usuario`, `email`, `id_membro`, `estado_usuario`, `data_criacao`) VALUES
(1, 'admin', 'admin', 1, 'admin@admin.com', 0, 1, '2020-05-03 18:45:26'),
(2, 'osvaldo', '1234', 1, 'osvaldozamba@gmail.com', 0, 1, '2020-05-03 20:37:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id_estado_civil`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id_funcao`);

--
-- Indexes for table `identificacao`
--
ALTER TABLE `identificacao`
  ADD PRIMARY KEY (`id_identificacao`),
  ADD UNIQUE KEY `descricao_identificacao` (`descricao_identificacao`);

--
-- Indexes for table `igreja_nacional`
--
ALTER TABLE `igreja_nacional`
  ADD PRIMARY KEY (`id_igreja_nacional`);

--
-- Indexes for table `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`id_membro`),
  ADD UNIQUE KEY `nome_membro` (`nome_membro`),
  ADD UNIQUE KEY `id_identificacao` (`id_identificacao`);

--
-- Indexes for table `membro_documento`
--
ALTER TABLE `membro_documento`
  ADD PRIMARY KEY (`id_membro_documento`);

--
-- Indexes for table `membro_pagamento`
--
ALTER TABLE `membro_pagamento`
  ADD PRIMARY KEY (`id_membro_pagamento`);

--
-- Indexes for table `nacionalidade`
--
ALTER TABLE `nacionalidade`
  ADD PRIMARY KEY (`id_nacionalidade`),
  ADD UNIQUE KEY `descricao_nacionalidade` (`descricao_nacionalidade`);

--
-- Indexes for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  ADD PRIMARY KEY (`id_nivel_acesso`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Indexes for table `paroquia`
--
ALTER TABLE `paroquia`
  ADD PRIMARY KEY (`id_paroquia`);

--
-- Indexes for table `provincia_eclesiastica`
--
ALTER TABLE `provincia_eclesiastica`
  ADD PRIMARY KEY (`id_provincia_eclesiastica`);

--
-- Indexes for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indexes for table `tipo_identificacao`
--
ALTER TABLE `tipo_identificacao`
  ADD PRIMARY KEY (`id_tipo_identificacao`);

--
-- Indexes for table `tribo`
--
ALTER TABLE `tribo`
  ADD PRIMARY KEY (`id_tribo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`nome_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id_funcao` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `identificacao`
--
ALTER TABLE `identificacao`
  MODIFY `id_identificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `igreja_nacional`
--
ALTER TABLE `igreja_nacional`
  MODIFY `id_igreja_nacional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `membro`
--
ALTER TABLE `membro`
  MODIFY `id_membro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `membro_documento`
--
ALTER TABLE `membro_documento`
  MODIFY `id_membro_documento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membro_pagamento`
--
ALTER TABLE `membro_pagamento`
  MODIFY `id_membro_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nacionalidade`
--
ALTER TABLE `nacionalidade`
  MODIFY `id_nacionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paroquia`
--
ALTER TABLE `paroquia`
  MODIFY `id_paroquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `provincia_eclesiastica`
--
ALTER TABLE `provincia_eclesiastica`
  MODIFY `id_provincia_eclesiastica` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_identificacao`
--
ALTER TABLE `tipo_identificacao`
  MODIFY `id_tipo_identificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tribo`
--
ALTER TABLE `tribo`
  MODIFY `id_tribo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
