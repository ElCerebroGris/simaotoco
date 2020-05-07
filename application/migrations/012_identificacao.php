<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Identificacao extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('identificacao_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('pessoa_id int(11) NOT NULL');
        $this->dbforge->add_field('descricao_identificacao varchar(100) NOT NULL');
        $this->dbforge->add_field('tipo_identificacao enum(\'BI\',\'PASSAPORTE\',\'CÉDULA\',\'OUTRO\')
         DEFAULT \'BI\'');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_field('data_atualizacao timestamp ON UPDATE CURRENT_TIMESTAMP');
        $this->dbforge->create_table('identificacao');
    }

    public function down()
    {
        $this->dbforge->drop_table('identificacao');
    }
}
