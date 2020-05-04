<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nacionalidade extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('nacionalidade/listar');
    }

    public function listar() {
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $this->load->view('nacionalidade/listar', $dados);
    }

    public function add() {
        $this->load->view('nacionalidade/add');
    }

    public function addPost() {
        $data['pais'] = $this->input->post('pais');
        $data['descricao_nacionalidade'] = $this->input->post('descricao_nacionalidade');

        if ($this->db->insert('nacionalidade', $data)) {
            $this->session->set_flashdata('sms', 'nacionalidade adicionado com sucesso');
            redirect('nacionalidade/listar');
        }
    }

}
