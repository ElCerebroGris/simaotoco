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
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $this->load->view('igreja_nacional/listar', $dados);
    }

    public function add() {
        $this->load->view('igreja_nacional/add');
    }

    public function addPost() {
        $data['descricao_igreja_nacional'] = $this->input->post('descricao_igreja_nacional');
        $data['sigla'] = $this->input->post('sigla');
        $data['indicador_telefonico'] = $this->input->post('indicador_telefonico');

        if ($this->db->insert('igreja_nacional', $data)) {
            $this->session->set_flashdata('sms', 'igreja nacional adicionado com sucesso');
            redirect('igreja_nacional/listar');
        }
    }

}
