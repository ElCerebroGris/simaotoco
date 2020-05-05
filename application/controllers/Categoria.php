<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('categoria/listar');
    }

    public function listar() {
        $dados['categorias'] = $this->db->get('categoria')->result();
        $this->load->view('categoria/listar', $dados);
    }

    public function add() {
        $this->load->view('categoria/add');
    }

    public function addPost() {
        $data['descricao_categoria'] = $this->input->post('descricao_categoria');

        if ($this->db->insert('categoria', $data)) {
            $this->session->set_flashdata('sms', 'categoria adicionado com sucesso');
            redirect('categoria/listar');
        }
    }

}
