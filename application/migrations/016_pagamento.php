<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Pagamento extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('pagamento_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('membro_id int(11) NOT NULL');
        $this->dbforge->add_field('usuario_id int(11) NOT NULL');
        $this->dbforge->add_field('mes_referencia varchar(30) DEFAULT NULL');
        $this->dbforge->add_field('valor float NOT NULL');
        $this->dbforge->add_field('tipo_pagamento varchar(30)');
        $this->dbforge->add_field('moeda varchar(10)');
        $this->dbforge->add_field('tipo varchar(50) DEFAULT NULL');
        $this->dbforge->add_field('descricao varchar(100) DEFAULT NULL');
        $this->dbforge->add_field('modo_pagamento enum(\'CAIXA\',\'BANCO\',\'OUTRO\') 
        DEFAULT \'OUTRO\'');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('pagamento');
    }

    public function down()
    {
        $this->dbforge->drop_table('pagamento');
    }
}
