<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia_Eclesiastica extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('provincia_eclesiastica/listar');
    }

    public function listar() {
        $this->db->join('igreja_nacional', 
        'igreja_nacional.id_igreja_nacional=provincia_eclesiastica.id_igreja_nacional');
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();
        $this->load->view('provincia_eclesiastica/listar', $dados);
    }

    public function add() {
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $this->load->view('provincia_eclesiastica/add', $dados);
    }

    public function addPost() {
        $data['id_igreja_nacional'] = $this->input->post('igreja_nacional');
        $data['descricao_provincia_eclesiastica'] = $this->input->post('descricao_provincia_eclesiastica');

        if ($this->db->insert('provincia_eclesiastica', $data)) {
            $this->session->set_flashdata('sms', 'provincia_eclesiastica adicionado com sucesso');
            redirect('provincia_eclesiastica/listar');
        }
    }

}
