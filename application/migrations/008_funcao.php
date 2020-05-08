<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Funcao extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('funcao_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('descricao_funcao varchar(35) NOT NULL');
        $this->dbforge->add_field('estado_funcao int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('funcao');
    }

    public function down()
    {
        $this->dbforge->drop_table('funcao');
    }
}
