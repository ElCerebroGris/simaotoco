<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Paroquia extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('paroquia_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('provincia_eclesiastica_id int(11) NOT NULL');
        $this->dbforge->add_field('descricao_paroquia varchar(35) NOT NULL');
        $this->dbforge->add_field('endereco varchar(100) NOT NULL');
        $this->dbforge->add_field('telefone varchar(30) DEFAULT NULL');
        $this->dbforge->add_field('email varchar(100) DEFAULT NULL');
        $this->dbforge->add_field('estado_paroquia int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('paroquia');
    }

    public function down()
    {
        $this->dbforge->drop_table('paroquia');
    }
}
