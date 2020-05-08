<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Documento extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('documento_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('membro_id int(11) NOT NULL');
        $this->dbforge->add_field('usuario_id int(11) NOT NULL');
        $this->dbforge->add_field('tipo_documento enum(\'CARTÃO\',\'TESTIFICAÇÃO\'
        ,\'CERTIDÃO DE CASAMENTO\',\'CERTIDÃO DE BAPTISMO\') 
        DEFAULT \'CARTÃO\'');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->create_table('documento');
    }

    public function down()
    {
        $this->dbforge->drop_table('documento');
    }
}
