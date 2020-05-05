<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tribo extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('tribo/listar');
    }

    public function listar() {
        $dados['tribos'] = $this->db->get('tribo')->result();
        $this->load->view('tribo/listar', $dados);
    }

    public function add() {
        $this->load->view('tribo/add');
    }

    public function addPost() {
        $data['descricao_tribo'] = $this->input->post('descricao_tribo');

        if ($this->db->insert('tribo', $data)) {
            $this->session->set_flashdata('sms', 'tribo adicionado com sucesso');
            redirect('tribo/listar');
        }
    }

}
