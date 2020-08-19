<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Correspondencia extends CI_Controller
{

    public function verificar_acesso()
    {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index()
    {
        redirect('correspondencia/listar');
    }

    public function listar()
    {
        $this->verificar_acesso();
        $this->load->model('correspondencia_model');
        $dados['documentos'] = $this->correspondencia_model->listar();

        $this->load->view('correspondencia/listar', $dados);
    }

    public function add()
    {
        $this->verificar_acesso();

        $this->load->view('correspondencia/add');
    }

    public function addPost()
    {
        $this->verificar_acesso();

        $destinos = $this->input->post('destinos');
        
        $this->load->model('correspondencia_model');
        if ($this->correspondencia_model->add()) {
            $this->load->model('log_model');
            $this->log_model->adicionar('correspondencia de ' . $this->session->userdata('id_usuario') . ' criado');
            $this->session->set_flashdata('sms', 'correspondencia adicionado com sucesso');
            redirect('correspondencia/listar');
        }
        
    }
}
