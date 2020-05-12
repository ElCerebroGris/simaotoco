<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Pedido extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('pedido_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('membro_id int(11) NOT NULL');
        $this->dbforge->add_field('usuario_id int(11) NOT NULL');
        $this->dbforge->add_field('estado_pedido int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->create_table('pedido');
    }

    public function down()
    {
        $this->dbforge->drop_table('pedido');
    }
}
