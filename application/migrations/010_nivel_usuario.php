<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Nivel_Usuario extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('nivel_usuario_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('descricao_nivel_usuario varchar(35) NOT NULL');
        $this->dbforge->add_field('codigo_nivel_usuario varchar(35) NOT NULL');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('nivel_usuario');
    }

    public function down()
    {
        $this->dbforge->drop_table('nivel_usuario');
    }
}
