<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funcao extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('funcao/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $dados['funcoes'] = $this->db->get('funcao')->result();
        $this->load->view('funcao/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $this->load->view('funcao/add');
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['descricao_funcao'] = $this->input->post('descricao_funcao');

        if ($this->db->insert('funcao', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('função '.$data['descricao_funcao'].' adicionado');
            $this->session->set_flashdata('sms', 'funcao adicionado com sucesso');
            redirect('funcao/listar');
        }
    }

    public function editar($id) {
        $this->verificar_acesso();
        $this->db->where('funcao_id', $id);
        $dados['funcaos'] = $this->db->get('funcao')->result();
        $this->load->view('funcao/editar', $dados);
    }

    public function editarPost() {
        $this->verificar_acesso();
        $id = $this->input->post('funcao_id');
        $data['descricao_funcao'] = $this->input->post('descricao_funcao');

        $this->db->where('funcao_id', $id);
        if ($this->db->update('funcao', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('função '.$data['descricao_funcao'].' atualizada');

            $this->session->set_flashdata('sms', 'funcao atualizada com sucesso');
            redirect('funcao/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_funcao'] = 1;
        $this->db->where('funcao_id', $id);
        if ($this->db->update('funcao', $data)) {
            $this->session->set_flashdata('sms', 'funcao atualizado com sucesso');
            redirect('funcao/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_funcao'] = 0;
        $this->db->where('funcao_id', $id);
        if ($this->db->update('funcao', $data)) {
            $this->session->set_flashdata('sms', 'funcao atualizado com sucesso');
            redirect('funcao/listar');
        }
    }

}
