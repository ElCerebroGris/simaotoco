<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Igreja_Nacional extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('igreja_nacional/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $this->load->view('igreja_nacional/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $this->load->view('igreja_nacional/add');
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['descricao_igreja_nacional'] = $this->input->post('descricao_igreja_nacional');
        $data['sigla'] = $this->input->post('sigla');
        $data['indicador_telefonico'] = $this->input->post('indicador_telefonico');

        if ($this->db->insert('igreja_nacional', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('igreja nacional '.$data['descricao_igreja_nacional'].' adicionado');

            $this->session->set_flashdata('sms', 'igreja nacional adicionado com sucesso');
            redirect('igreja_nacional/listar');
        }
    }

    public function editar($id) {
        $this->verificar_acesso();
        $this->db->where('igreja_nacional_id', $id);
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $this->load->view('igreja_nacional/editar', $dados);
    }

    public function editarPost() {
        $this->verificar_acesso();
        $id = $this->input->post('igreja_nacional_id');
        $data['descricao_igreja_nacional'] = $this->input->post('descricao_igreja_nacional');
        $data['sigla'] = $this->input->post('sigla');
        $data['indicador_telefonico'] = $this->input->post('indicador_telefonico');

        $this->db->where('igreja_nacional_id', $id);
        if ($this->db->update('igreja_nacional', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('igreja nacional '.$data['descricao_igreja_nacional'].' atualizada');

            $this->session->set_flashdata('sms', 'igreja nacional atualizada com sucesso');
            redirect('igreja_nacional/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_igreja_nacional'] = 1;
        $this->db->where('igreja_nacional_id', $id);
        if ($this->db->update('igreja_nacional', $data)) {
            $this->session->set_flashdata('sms', 'igreja_nacional atualizado com sucesso');
            redirect('igreja_nacional/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_igreja_nacional'] = 0;
        $this->db->where('igreja_nacional_id', $id);
        if ($this->db->update('igreja_nacional', $data)) {
            $this->session->set_flashdata('sms', 'igreja_nacional atualizado com sucesso');
            redirect('igreja_nacional/listar');
        }
    }

}
