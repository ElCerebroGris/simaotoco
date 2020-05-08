<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Pessoa extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('pessoa_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('nacionalidade_id int(11) NOT NULL');
        $this->dbforge->add_field('pessoa_nome varchar(100) NOT NULL UNIQUE');
        $this->dbforge->add_field('nome_pai varchar(100) NOT NULL');
        $this->dbforge->add_field('nome_mae varchar(100) NOT NULL');
        $this->dbforge->add_field('data_nascimento varchar(30) NOT NULL');
        $this->dbforge->add_field('provincia_nascimento varchar(30) NOT NULL');
        $this->dbforge->add_field('municipio_nascimento varchar(30) NOT NULL');
        $this->dbforge->add_field('telefone varchar(100) NOT NULL');
        $this->dbforge->add_field('endereco varchar(100) NOT NULL');
        $this->dbforge->add_field('estado_civil enum(\'SOLTEIRO\',\'CASADO\',\'DIVORCIADO\',\'VIUVIO\') 
        DEFAULT \'SOLTEIRO\'');
        $this->dbforge->add_field('sexo enum(\'MASCULINO\',\'FEMENINO\') DEFAULT \'MASCULINO\'');
        $this->dbforge->add_field('estado_pessoa int(11) NOT NULL DEFAULT 1');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('pessoa');
    }

    public function down()
    {
        $this->dbforge->drop_table('pessoa');
    }
}
