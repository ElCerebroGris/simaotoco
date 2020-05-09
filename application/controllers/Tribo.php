<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tribo extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('tribo/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $dados['tribos'] = $this->db->get('tribo')->result();
        $this->load->view('tribo/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $this->load->view('tribo/add');
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['descricao_tribo'] = $this->input->post('descricao_tribo');

        if ($this->db->insert('tribo', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('tribo '.$data['descricao_tribo'].' adicionado');

            $this->session->set_flashdata('sms', 'tribo adicionado com sucesso');
            redirect('tribo/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_tribo'] = 1;
        $this->db->where('tribo_id', $id);
        if ($this->db->update('tribo', $data)) {
            $this->session->set_flashdata('sms', 'tribo atualizado com sucesso');
            redirect('tribo/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_tribo'] = 0;
        $this->db->where('tribo_id', $id);
        if ($this->db->update('tribo', $data)) {
            $this->session->set_flashdata('sms', 'tribo atualizado com sucesso');
            redirect('tribo/listar');
        }
    }

}
