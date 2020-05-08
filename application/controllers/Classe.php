<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classe extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('classe/listar');
    }

    public function listar() {
        $this->db->join('paroquia', 'paroquia.paroquia_id=classe.paroquia_id');
        $dados['classes'] = $this->db->get('classe')->result();
        $this->load->view('classe/listar', $dados);
    }

    public function add() {
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $this->load->view('classe/add', $dados);
    }

    public function addPost() {
        $data['paroquia_id'] = $this->input->post('paroquia');
        $data['descricao_classe'] = $this->input->post('descricao_classe');

        if ($this->db->insert('classe', $data)) {
            $this->session->set_flashdata('sms', 'classe adicionado com sucesso');
            redirect('classe/listar');
        }
    }

    public function ativar($id) {
        $data['estado_classe'] = 1;
        $this->db->where('classe_id', $id);
        if ($this->db->update('classe', $data)) {
            $this->session->set_flashdata('sms', 'classe atualizado com sucesso');
            redirect('classe/listar');
        }
    }

    public function desativar($id) {
        $data['estado_classe'] = 0;
        $this->db->where('classe_id', $id);
        if ($this->db->update('classe', $data)) {
            $this->session->set_flashdata('sms', 'classe atualizado com sucesso');
            redirect('classe/listar');
        }
    }

}
