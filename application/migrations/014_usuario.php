<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Usuario extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('usuario_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('membro_id int(11) NOT NULL');
        $this->dbforge->add_field('nome_usuario varchar(100) NOT NULL UNIQUE');
        $this->dbforge->add_field('senha varchar(100) NOT NULL');
        $this->dbforge->add_field('codigo_nivel_usuario int(11) NOT NULL');
        $this->dbforge->add_field('estado_usuario int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('usuario');
    }

    public function down()
    {
        $this->dbforge->drop_table('usuario');
    }
}
