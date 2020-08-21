<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Tribo extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('tribo_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('descricao_tribo varchar(35) NOT NULL');
        $this->dbforge->add_field('endereco varchar(100) NOT NULL');
        $this->dbforge->add_field('telefone varchar(30) DEFAULT NULL');
        $this->dbforge->add_field('email varchar(100) DEFAULT NULL');
        $this->dbforge->add_field('estado_tribo int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->add_key('tribo_id', true);
        $this->dbforge->create_table('tribo');
    }

    public function down()
    {
        $this->dbforge->drop_table('tribo');
    }
}
