<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Record_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function adicionarDados() {
        $sql = "INSERT INTO nivel_usuario (codigo_nivel_usuario, descricao_nivel_usuario) VALUES 
        (0, 'Todos'),
        (1, 'Administrador'),
        (2, 'Secretario Executivo'),
        (3, 'Gestor de Membros'),
        (4, 'Gestor de Igreja Nacional'),
        (5, 'Gestor de Provincia Eclesiastica'),
        (6, 'Gestor de de Paroquia'),
        (7, 'Gestor Financeiro');";
        $this->db->query($sql);

        $sql = "INSERT INTO `tribo` (`descricao_tribo`, `endereco`, `telefone`, `email`) VALUES
        ('Teste', '', NULL, NULL);";
        $this->db->query($sql);

        $sql = "INSERT INTO `area` (`tribo_id`, `descricao_area`, `endereco`, `telefone`, `email`) VALUES
        (1, 'Teste', '', NULL, NULL);";
        $this->db->query($sql);

        $sql = "INSERT INTO `igreja_nacional` (`descricao_igreja_nacional`, `sigla`, `indicador_telefonico`, `endereco`, `telefone`, `email`) VALUES
        ('Angola-Sede', 'Sede', '+244', '', NULL, NULL);";
        $this->db->query($sql);

        $sql = "INSERT INTO `provincia_eclesiastica` (`igreja_nacional_id`, `descricao_provincia_eclesiastica`, `codigo`, `endereco`, `telefone`, `email`) VALUES
        (1, 'Luanda', 'LD','', NULL, NULL), (1, 'Bengo', 'BO','', NULL, NULL),
        (1, 'Zaire', 'ZE','', NULL, NULL), (1, 'Cabinda', 'CD','', NULL, NULL),
        (1, 'Uige', 'UE','', NULL, NULL), (1, 'Malanje', 'MJ','', NULL, NULL),
        (1, 'Kwanza Norte', 'KN','', NULL, NULL), (1, 'Kwanza Sul', 'KS','', NULL, NULL),
        (1, 'Benguela', 'BG','', NULL, NULL), (1, 'Huila', 'HL','', NULL, NULL),
        (1, 'Huambo', 'HB','', NULL, NULL), (1, 'Bié', 'BE','', NULL, NULL),
        (1, 'Cunene', 'CN','', NULL, NULL), (1, 'Pastor Avelino Alberto Quitongo', 'AQ','', NULL, NULL),
        (1, 'Pastor Anastacio Manuel', 'AM','', NULL, NULL), (1, 'Pastor João Baptista Manuel', 'JM','', NULL, NULL),
        (1, 'Pastor Israel Paulo Chipala', 'IC','', NULL, NULL), (1, 'Cuando Cubango', 'CC','', NULL, NULL),
        (1, 'Moxico', 'MC','', NULL, NULL), (1, 'Lunda Sul', 'LS','', NULL, NULL),
        (1, 'Lunda Norte', 'LN','', NULL, NULL), (1, 'Namibe', 'NB','', NULL, NULL);";
        $this->db->query($sql);

        $sql = "INSERT INTO `paroquia` (`provincia_eclesiastica_id`, `descricao_paroquia`, `endereco`, `telefone`, `email`) VALUES
        (1, 'Viana', '', NULL, NULL);";
        $this->db->query($sql);

        $sql = "INSERT INTO `classe` (`paroquia_id`, `descricao_classe`, `endereco`, `telefone`, `email`) VALUES
        (1, 'Teste', '', NULL, NULL);";
        $this->db->query($sql);

        $sql = "INSERT INTO `funcao` (`descricao_funcao`) VALUES
        ('Texte');";
        $this->db->query($sql);

        $sql = "INSERT INTO `categoria` (`descricao_categoria`) VALUES
        ('Teste');";
        $this->db->query($sql);

        $sql = "INSERT INTO `nacionalidade` (`descricao_nacionalidade`, `pais`) VALUES
        ('Angolana', 'Angola');";
        $this->db->query($sql);

        $sql = "INSERT INTO `pessoa` (`nacionalidade_id`, `pessoa_nome`, `nome_pai`, `nome_mae`, `data_nascimento`, `provincia_nascimento`, `municipio_nascimento`, `telefone`, `endereco`, `estado_civil`, `sexo`, `foto`) VALUES
        (1, 'Teste', 'AAAA', 'BBBB', '2020-05-13', 'Luanda', 'Viana', '', '', 'SOLTEIRO', 'MASCULINO', NULL);";
        $this->db->query($sql);

        $sql = "INSERT INTO `identificacao` (`pessoa_id`, `descricao_identificacao`, `tipo_identificacao`) VALUES
        (1, '0000', 'BI');";
        $this->db->query($sql);

        $sql = "INSERT INTO `membro` (`pessoa_id`, `area_id`, `classe_id`, `data_admissao`, `data_baptismo`, `casado`, `categoria_id`, `funcao_id`) VALUES
        (1, 1, 1, '2020-05-20', '', 'NÃO', 1, 1);";
        $this->db->query($sql);

        $sql = "INSERT INTO `usuario` (`membro_id`, `nome_usuario`, `senha`, `email`, `codigo_nivel_usuario`) VALUES
        (1, 'admin', 'admin', '', 1);";
        $this->db->query($sql);

        $sql = "INSERT INTO tipo_pagamento (descricao, tipo) VALUES 
        ('Dizimo', 'RECEITA'),
        ('Quota', 'RECEITA'),
        ('Materias de escritorio', 'DESPESA');";
        $this->db->query($sql);
    }

    function eliminarTabelas() {
        //$this->dbforge->drop_table('migrations',TRUE);
        $this->dbforge->drop_table('documento',TRUE);
        $this->dbforge->drop_table('casamento',TRUE);
        $this->dbforge->drop_table('pagamento',TRUE);
        $this->dbforge->drop_table('log',TRUE);
        $this->dbforge->drop_table('usuario',TRUE);
        $this->dbforge->drop_table('membro',TRUE);
        $this->dbforge->drop_table('identificacao',TRUE);
        $this->dbforge->drop_table('pessoa',TRUE);
        $this->dbforge->drop_table('nivel_usuario',TRUE);
        $this->dbforge->drop_table('nacionalidade',TRUE);
        $this->dbforge->drop_table('funcao',TRUE);
        $this->dbforge->drop_table('categoria',TRUE);
        $this->dbforge->drop_table('classe',TRUE);
        $this->dbforge->drop_table('paroquia',TRUE);
        $this->dbforge->drop_table('provincia_eclesiastica',TRUE);
        $this->dbforge->drop_table('igreja_nacional',TRUE);
        $this->dbforge->drop_table('area',TRUE);
        $this->dbforge->drop_table('tribo',TRUE);
    }

}
