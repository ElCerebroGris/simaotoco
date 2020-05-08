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
        $dados['tribos'] = $this->db->get('tribo')->result();
        $this->load->view('area/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['tribo_id'] = $this->input->post('tribo');
        $data['descricao_area'] = $this->input->post('descricao_area');

        if ($this->db->insert('area', $data)) {
            $this->session->set_flashdata('sms', 'area adicionado com sucesso');
            redirect('area/listar');
        }
    }

}
