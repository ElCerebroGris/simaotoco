<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paroquia extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('paroquia/listar');
    }

    public function listar() {
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $this->load->view('paroquia/listar', $dados);
    }

    public function add() {
        $this->load->view('paroquia/add');
    }

    public function addPost() {
        $data['id_provincia_eclesiastica'] = $this->input->post('provincia_eclesiastica');
        $data['descricao_paroquia'] = $this->input->post('descricao_paroquia');

        if ($this->db->insert('paroquia', $data)) {
            $this->session->set_flashdata('sms', 'paroquia adicionado com sucesso');
            redirect('paroquia/listar');
        }
    }

}
