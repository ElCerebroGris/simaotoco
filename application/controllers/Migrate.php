<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->input->is_cli_request()) {
            show_error('Sem permissão para isso.');
            return;
        }
        $this->load->library('migration');
    }

    public function index()
    {
        // load migration library
        //$this->load->library('migration');
        if (!$this->migration->version(16)) {
            echo 'Error' . $this->migration->error_string();
        } else {
            echo 'Migrations ran successfully!';
        }
    }

    public function all()
    {
        $this->load->model('record_model');
        //$this->record_model->eliminarTabelas();

        for ($version = 1; $version <= 22; ++$version) {
            if (!$this->migration->version($version)) {
                echo 'Error' . $this->migration->error_string();
            }
        }

        $this->record_model->adicionarDados();
        echo 'Migrations run successfully!';
    }

}
