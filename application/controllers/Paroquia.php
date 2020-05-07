<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paroquia extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('paroquia/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->join('provincia_eclesiastica',
         'provincia_eclesiastica.id_provincia_eclesiastica=paroquia.id_provincia_eclesiastica');
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $this->load->view('paroquia/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();
        $this->load->view('paroquia/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['id_provincia_eclesiastica'] = $this->input->post('provincia_eclesiastica');
        $data['descricao_paroquia'] = $this->input->post('descricao_paroquia');

        if ($this->db->insert('paroquia', $data)) {
            $this->session->set_flashdata('sms', 'paroquia adicionado com sucesso');
            redirect('paroquia/listar');
        }
    }

}
