<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nacionalidade extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('nacionalidade/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $this->load->view('nacionalidade/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $this->load->view('nacionalidade/add');
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['pais'] = $this->input->post('pais');
        $data['descricao_nacionalidade'] = $this->input->post('descricao_nacionalidade');

        if ($this->db->insert('nacionalidade', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('nacionalidade '.$data['descricao_nacionalidade'].' adicionado');

            $this->session->set_flashdata('sms', 'nacionalidade adicionado com sucesso');
            redirect('nacionalidade/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_nacionalidade'] = 1;
        $this->db->where('nacionalidade_id', $id);
        if ($this->db->update('nacionalidade', $data)) {
            $this->session->set_flashdata('sms', 'nacionalidade atualizado com sucesso');
            redirect('nacionalidade/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_nacionalidade'] = 0;
        $this->db->where('nacionalidade_id', $id);
        if ($this->db->update('nacionalidade', $data)) {
            $this->session->set_flashdata('sms', 'nacionalidade atualizado com sucesso');
            redirect('nacionalidade/listar');
        }
    }

}
