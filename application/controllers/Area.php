<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('area/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->join('tribo',
         'tribo.tribo_id=area.tribo_id');
        $dados['areas'] = $this->db->get('area')->result();
        $this->load->view('area/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $this->verificar_acesso();
        $dados['tribos'] = $this->db->get('tribo')->result();
        $this->load->view('area/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['tribo_id'] = $this->input->post('tribo');
        $data['descricao_area'] = $this->input->post('descricao_area');

        if ($this->db->insert('area', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('area '.$data['descricao_area'].' adicionado');

            $this->session->set_flashdata('sms', 'area adicionado com sucesso');
            redirect('area/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_area'] = 1;
        $this->db->where('area_id', $id);
        if ($this->db->update('area', $data)) {
            $this->session->set_flashdata('sms', 'area atualizado com sucesso');
            redirect('area/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_area'] = 0;
        $this->db->where('area_id', $id);
        if ($this->db->update('area', $data)) {
            $this->session->set_flashdata('sms', 'area atualizado com sucesso');
            redirect('area/listar');
        }
    }

}
