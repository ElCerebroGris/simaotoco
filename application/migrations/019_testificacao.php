<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Testificacao extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('testificacao_id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('membro_id int(11) NOT NULL');
        $this->dbforge->add_field('usuario_id int(11) NOT NULL');
        $this->dbforge->add_field('origem_tipo enum(\'PAROQUIA\',\'PROVINCIA ECLESIASTICA\'
        ,\'IGREJA NACIONAL\') DEFAULT \'PAROQUIA\'');
        $this->dbforge->add_field('origem_referencia int(11) NOT NULL');
        $this->dbforge->add_field('destino_tipo enum(\'PAROQUIA\',\'PROVINCIA ECLESIASTICA\'
        ,\'IGREJA NACIONAL\') DEFAULT \'PAROQUIA\'');
        $this->dbforge->add_field('destino_referencia int(11) NOT NULL');
        $this->dbforge->add_field('data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->create_table('testificacao');
    }

    public function down()
    {
        $this->dbforge->drop_table('testificacao');
    }
}
