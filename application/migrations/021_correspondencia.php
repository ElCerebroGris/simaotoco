<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Correspondencia extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('correspondencia_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('doc_url text');
        $this->dbforge->add_field('obs text DEFAULT NULL');
        $this->dbforge->add_field('destino_tipo int(11) NOT NULL');
        $this->dbforge->add_field('destino int(11) NOT NULL');
        $this->dbforge->add_field('usuario_id int(11) NOT NULL');
        $this->dbforge->add_field('estado_correspondencia int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->create_table('correspondencia');
    }

    public function down()
    {
        $this->dbforge->drop_table('correspondencia');
    }
}
