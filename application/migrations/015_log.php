<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Log extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('log_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('usuario_id int(11) NOT NULL');
        $this->dbforge->add_field('descricao_log text NOT NULL');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->create_table('log');
    }

    public function down()
    {
        $this->dbforge->drop_table('log');
    }
}
