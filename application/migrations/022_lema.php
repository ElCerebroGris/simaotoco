<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Lema extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field('id int(11) NOT NULL PRIMARY KEY auto_increment');
        $this->dbforge->add_field('ano int(4) NOT NULL');
        $this->dbforge->add_field('lema text DEFAULT NULL');
        $this->dbforge->add_field('status tinyint(1) NOT NULL');
        $this->dbforge->create_table('lema');
    }

    public function down()
    {
        $this->dbforge->drop_table('lema');
    }
}
