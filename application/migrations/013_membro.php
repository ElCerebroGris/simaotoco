<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Membro extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('membro_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('pessoa_id int(11) NOT NULL');
        $this->dbforge->add_field('area_id int(11) NOT NULL');
        $this->dbforge->add_field('classe_id int(11) NOT NULL');
        $this->dbforge->add_field('data_admissao varchar(30) NOT NULL');
        $this->dbforge->add_field('data_baptismo varchar(30)');
        $this->dbforge->add_field('local_baptismo varchar(100)');
        $this->dbforge->add_field('casado enum(\'SIM\',\'NÃO\') DEFAULT \'NÃO\'');
        $this->dbforge->add_field('categoria_id int(11) NOT NULL');
        $this->dbforge->add_field('funcao_id int(11) NOT NULL');
        $this->dbforge->add_field('estado_membro int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('ordem int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('serie int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('numero_membro varchar(100) NOT NULL DEFAULT UNIQUE');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('membro');
    }

    public function down()
    {
        $this->dbforge->drop_table('membro');
    }
}
