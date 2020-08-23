<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Tipo_Pagamento extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('tipo_pagamento_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('descricao varchar(50)');
        $this->dbforge->add_field('tipo enum(\'DESPESA\',\'RECEITA\') DEFAULT \'DESPESA\'');
        $this->dbforge->add_field('estado_tipo int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->create_table('tipo_pagamento');
    }

    public function down()
    {
        $this->dbforge->drop_table('tipo_pagamento');
    }
}
