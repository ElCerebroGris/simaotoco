-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2020 às 10:22
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
(2, '0000', 1, '2020-05-03 22:49:12');

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

INSERT INTO `membro` (`id_membro`, `nome_membro`, `nome_pai`, `nome_mae`, `id_identificacao`, `id_nacionalidade`, `data_nascimento`, `estado_civil`, `id_localidade`, `telefone`, `endereco`, `data_criacao`) VALUES
(1, 'AAA', 'BBB', 'CCC', 1, 1, '2020-05-21', 1, 1, 'lll', 'lll', '2020-05-03 20:25:16'),
(2, 'Mario', 'MMM', 'AAA', 2, 1, '2020-05-20', 1, 1, '', '', '2020-05-03 22:49:13');

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
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(25) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `codigo_nivel_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `estado_usuario` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `senha`, `codigo_nivel_usuario`, `email`, `estado_usuario`, `data_criacao`) VALUES
(1, 'admin', 'admin', 1, 'admin@admin.com', 1, '2020-05-03 18:45:26'),
(2, 'osvaldo', '1234', 1, 'osvaldozamba@gmail.com', 1, '2020-05-03 20:37:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id_estado_civil`);

--
-- Indexes for table `identificacao`
--
ALTER TABLE `identificacao`
  ADD PRIMARY KEY (`id_identificacao`),
  ADD UNIQUE KEY `descricao_identificacao` (`descricao_identificacao`);

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
-- AUTO_INCREMENT for table `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `identificacao`
--
ALTER TABLE `identificacao`
  MODIFY `id_identificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membro`
--
ALTER TABLE `membro`
  MODIFY `id_membro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
