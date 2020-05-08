<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Categoria extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('categoria_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('descricao_categoria varchar(35) NOT NULL UNIQUE');
        $this->dbforge->add_field('estado_categoria int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->add_key('categoria_id', true);
        $this->dbforge->create_table('categoria');
    }

    public function down()
    {
        $this->dbforge->drop_table('categoria');
    }
}
