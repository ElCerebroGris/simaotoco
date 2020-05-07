CREATE TABLE `identificacao` (
  `identificacao_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `descricao_identificacao` varchar(100) NOT NULL,
  `tipo_identificacao` int(11) NOT NULL,
  `estado_identificacao` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `tribo` (
  `tribo_id` int(11) NOT NULL,
  `descricao_tribo` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_tribo` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
); 

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL PRIMARY KEY,
  `tribo_id` int(11) NOT NULL,
  `descricao_tribo` varchar(35) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_area` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
); 

CREATE TABLE `igreja_nacional` (
  `igreja_nacional_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_igreja_nacional` varchar(100) NOT NULL,
  `sigla` varchar(4) NOT NULL,
  `indicador_telefonico` varchar(4) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_igreja_nacional` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `provincia_eclesiastica` (
  `provincia_eclesiastica_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_provincia_eclesiastica` varchar(40) NOT NULL,
  `id_igreja_nacional` int(4) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_provincia_eclesiastica` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `paroquia` (
  `id_paroquia` int(11) NOT NULL,
  `descricao_paroquia` varchar(40) NOT NULL,
  `id_provincia_eclesiastica` int(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado_paroquia` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `descricao_classe` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_paroquia` int(11) NOT NULL,
  `estado_classe` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `nacionalidade` (
  `id_nacionalidade` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `descricao_nacionalidade` varchar(100) NOT NULL,
  `estado_nacionalidade` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
);

CREATE TABLE `pessoa` (
  `pessoa_id` int(11) NOT NULL ,
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

CREATE TABLE `funcao` (
  `id_funcao` int(4) NOT NULL,
  `descricao_funcao` varchar(35) NOT NULL,
  `estado_funcao` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `categoria` (
  `id_categoria` int(4) NOT NULL,
  `descricao_categoria` varchar(35) NOT NULL,
  `estado_categoria` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `membro` (
  `membro_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pessoa_id` int(100) NOT NULL,
  `area_id` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `data_admissao` varchar(10) NOT NULL,
  `data_baptismo` varchar(10) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `estado_membro` int(11) NOT NULL DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `nivel_usuario` (
  `id_nivel_acesso` int(11) NOT NULL,
  `descricao_nivel_usuario` varchar(30) NOT NULL,
  `codigo_nivel_usuario` int(11) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome_usuario` varchar(25) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `codigo_nivel_usuario` int(11) NOT NULL,
  `id_membro` int(11) DEFAULT NULL,
  `estado_usuario` int(11) NOT NULL DEFAULT '0',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `usuario_id` varchar(30) NOT NULL,
  `descricao_log` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);