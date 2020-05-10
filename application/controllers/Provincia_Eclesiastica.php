<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia_Eclesiastica extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('provincia_eclesiastica/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->join('igreja_nacional', 
        'igreja_nacional.igreja_nacional_id=provincia_eclesiastica.igreja_nacional_id');
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();
        $this->load->view('provincia_eclesiastica/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $this->load->view('provincia_eclesiastica/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['igreja_nacional_id'] = $this->input->post('igreja_nacional');
        $data['descricao_provincia_eclesiastica'] = $this->input->post('descricao_provincia_eclesiastica');

        if ($this->db->insert('provincia_eclesiastica', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('provincia eclesiastica '.$data['descricao_provincia_eclesiastica'].' adicionado');

            $this->session->set_flashdata('sms', 'provincia_eclesiastica adicionado com sucesso');
            redirect('provincia_eclesiastica/listar');
        }
    }

    public function editar($id) {
        $this->verificar_acesso();
        $this->db->where('provincia_eclesiastica_id', $id);
        $this->db->join('igreja_nacional', 
        'igreja_nacional.igreja_nacional_id=provincia_eclesiastica.igreja_nacional_id');
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();

        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $this->load->view('provincia_eclesiastica/editar', $dados);
    }

    public function editarPost() {
        $this->verificar_acesso();
        $id = $this->input->post('provincia_eclesiastica_id');
        $data['igreja_nacional_id'] = $this->input->post('igreja_nacional');
        $data['descricao_provincia_eclesiastica'] = $this->input->post('descricao_provincia_eclesiastica');

        $this->db->where('provincia_eclesiastica_id', $id);
        if ($this->db->update('provincia_eclesiastica', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('provincia eclesiastica '.$data['descricao_provincia_eclesiastica'].' atualizada');

            $this->session->set_flashdata('sms', 'provincia eclesiastica atualizada com sucesso');
            redirect('provincia_eclesiastica/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_provincia_eclesiastica'] = 1;
        $this->db->where('provincia_eclesiastica_id', $id);
        if ($this->db->update('provincia_eclesiastica', $data)) {
            $this->session->set_flashdata('sms', 'provincia eclesiastica atualizado com sucesso');
            redirect('provincia_eclesiastica/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_provincia_eclesiastica'] = 0;
        $this->db->where('provincia_eclesiastica_id', $id);
        if ($this->db->update('provincia_eclesiastica', $data)) {
            $this->session->set_flashdata('sms', 'provincia eclesiastica atualizado com sucesso');
            redirect('provincia_eclesiastica/listar');
        }
    }

}
