
INSERT INTO `area` (`area_id`, `tribo_id`, `descricao_area`, `endereco`, `telefone`, `email`, `estado_area`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Huila', '', NULL, NULL, 1, '2020-05-07 23:54:30', '0000-00-00 00:00:00');


INSERT INTO `casamento` (`casamento_id`, `membro_homem_id`, `membro_mulher_id`, `padrinho_nome`, `madrinha_nome`, `padrinhos_casados`, `data_casamento`, `data_criacao`, `data_atualizacao`) VALUES
(1, 20, 21, 'AAA', 'BBB', 'SIM', '2020-05-26', '2020-05-08 13:20:32', '0000-00-00 00:00:00');


INSERT INTO `categoria` (`categoria_id`, `descricao_categoria`, `estado_categoria`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Cristão', 1, '2020-05-07 23:43:29', '0000-00-00 00:00:00');

INSERT INTO `classe` (`classe_id`, `paroquia_id`, `descricao_classe`, `endereco`, `telefone`, `email`, `estado_classe`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Vila Sede', '', NULL, NULL, 1, '2020-05-07 23:42:57', '0000-00-00 00:00:00');

INSERT INTO `documento` (`documento_id`, `membro_id`, `usuario_id`, `tipo_documento`, `data_criacao`) VALUES
(1, 20, 1, 'CARTÃO', '2020-05-08 15:35:11');

INSERT INTO `funcao` (`funcao_id`, `descricao_funcao`, `estado_funcao`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Membro', 1, '2020-05-07 23:43:39', '0000-00-00 00:00:00');

INSERT INTO `identificacao` (`identificacao_id`, `pessoa_id`, `descricao_identificacao`, `tipo_identificacao`, `data_criacao`, `data_atualizacao`) VALUES
(20, 23, '33333', 'BI', '2020-05-08 12:14:16', '0000-00-00 00:00:00'),
(21, 24, '1234', 'BI', '2020-05-08 12:19:53', '0000-00-00 00:00:00'),
(22, 25, '12345', 'BI', '2020-05-08 12:26:36', '0000-00-00 00:00:00'),
(23, 26, '123456', 'BI', '2020-05-08 13:19:20', '0000-00-00 00:00:00'),
(24, 27, '33333111', 'BI', '2020-05-08 14:20:57', '0000-00-00 00:00:00');

INSERT INTO `igreja_nacional` (`igreja_nacional_id`, `descricao_igreja_nacional`, `sigla`, `indicador_telefonico`, `endereco`, `telefone`, `email`, `estado_igreja_nacional`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Angola', 'ANG', '+244', '', NULL, NULL, 1, '2020-05-07 23:42:28', '0000-00-00 00:00:00');

INSERT INTO `membro` (`membro_id`, `pessoa_id`, `area_id`, `classe_id`, `data_admissao`, `data_baptismo`, `casado`, `categoria_id`, `funcao_id`, `estado_membro`, `data_criacao`, `data_atualizacao`) VALUES
(20, 25, 1, 1, '2020-05-20', '', 'NÃO', 1, 1, 1, '2020-05-08 12:26:37', '0000-00-00 00:00:00'),
(21, 26, 1, 1, '2020-05-22', '2020-05-19', 'NÃO', 1, 1, 1, '2020-05-08 13:19:20', '0000-00-00 00:00:00'),
(22, 27, 1, 1, '2020-05-22', '', 'NÃO', 1, 1, 1, '2020-05-08 14:20:57', '0000-00-00 00:00:00');

INSERT INTO `nacionalidade` (`nacionalidade_id`, `descricao_nacionalidade`, `pais`, `estado_funcao`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Angolana', 'Angola', 1, '2020-05-07 23:58:32', '0000-00-00 00:00:00');

INSERT INTO `pagamento` (`pagamento_id`, `membro_id`, `usuario_id`, `mes_referencia`, `valor`, `tipo_pagamento`, `data_criacao`, `data_atualizacao`) VALUES
(1, 20, 1, '2', 112312000, 'DIZIMO', '2020-05-08 14:21:47', '0000-00-00 00:00:00');

INSERT INTO `paroquia` (`paroquia_id`, `provincia_eclesiastica_id`, `descricao_paroquia`, `endereco`, `telefone`, `email`, `estado_paroquia`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Viana', '', NULL, NULL, 1, '2020-05-07 23:42:46', '0000-00-00 00:00:00');

INSERT INTO `pessoa` (`pessoa_id`, `nacionalidade_id`, `pessoa_nome`, `nome_pai`, `nome_mae`, `data_nascimento`, `provincia_nascimento`, `municipio_nascimento`, `telefone`, `endereco`, `estado_civil`, `sexo`, `foto`, `estado_pessoa`, `data_criacao`, `data_atualizacao`) VALUES
(23, 1, 'Osvaldo Calombe', 'AAAA', 'BBBB', '2020-05-13', 'Luanda', '2020-05-13', '', '', 'SOLTEIRO', 'MASCULINO', NULL, 1, '2020-05-08 12:14:15', '0000-00-00 00:00:00'),
(24, 1, 'Vanilson', 'AAAA', 'BBBB', '2020-05-13', 'Luanda', '2020-05-13', '', '', 'SOLTEIRO', 'MASCULINO', '1588940358.jpg', 1, '2020-05-08 12:19:53', '0000-00-00 00:00:00'),
(25, 1, 'Mario', 'AAAA', 'BBBB', '2020-05-13', 'Luanda', '2020-05-13', '', '', 'SOLTEIRO', 'MASCULINO', '1588940766.png', 1, '2020-05-08 12:26:36', '0000-00-00 00:00:00'),
(26, 1, 'Ana', 'AAAA', 'BBBB', '2020-05-11', 'Luanda', '2020-05-11', '', '', 'SOLTEIRO', 'FEMENINO', '1588943925.png', 1, '2020-05-08 13:19:20', '0000-00-00 00:00:00'),
(27, 1, 'Osvaldo Calombe 11', 'AAAA', 'BBBB', '2020-05-12', 'Luanda', '2020-05-12', '', '', 'SOLTEIRO', 'MASCULINO', '1588947609.png', 1, '2020-05-08 14:20:57', '0000-00-00 00:00:00');

INSERT INTO `provincia_eclesiastica` (`provincia_eclesiastica_id`, `igreja_nacional_id`, `descricao_provincia_eclesiastica`, `endereco`, `telefone`, `email`, `estado_provincia_eclesiastica`, `data_criacao`, `data_atualizacao`) VALUES
(1, 1, 'Luanda', '', NULL, NULL, 1, '2020-05-07 23:42:37', '0000-00-00 00:00:00');

INSERT INTO `tribo` (`tribo_id`, `descricao_tribo`, `endereco`, `telefone`, `email`, `estado_tribo`, `data_criacao`, `data_atualizacao`) VALUES
(1, 'Sulana', '', NULL, NULL, 1, '2020-05-07 23:43:08', '0000-00-00 00:00:00');

INSERT INTO `usuario` (`usuario_id`, `membro_id`, `nome_usuario`, `senha`, `codigo_nivel_usuario`, `estado_usuario`, `data_criacao`, `data_atualizacao`) VALUES
(1, 20, 'admin', 'admin', 1, 1, '2020-05-08 14:45:59', '0000-00-00 00:00:00');