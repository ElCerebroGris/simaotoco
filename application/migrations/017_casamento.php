<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Casamento extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('casamento_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('membro_homem_id int(11) NOT NULL');
        $this->dbforge->add_field('membro_mulher_id int(11) NOT NULL');
        $this->dbforge->add_field('padrinho_nome varchar(100) NOT NULL');
        $this->dbforge->add_field('madrinha_nome varchar(100) NOT NULL');
        $this->dbforge->add_field('padrinhos_casados enum(\'SIM\',\'NÃO\') DEFAULT \'NÃO\'');
        $this->dbforge->add_field('data_casamento varchar(30) NOT NULL');
        $this->dbforge->add_field('numero_folha varchar(10) NOT NULL DEFAULT \'1\'');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('casamento');
    }

    public function down()
    {
        $this->dbforge->drop_table('casamento');
    }
}
