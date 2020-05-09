<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Casamento extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('casamento/listar');
    }

    public function listar() {
        $this->db->join('membro','membro.membro_id=casamento.membro_homem_id');
        $this->db->join('pessoa','pessoa.pessoa_id=membro.pessoa_id');
        $dados['casamentos'] = $this->db->get('casamento')->result();
        
        $this->load->view('casamento/listar', $dados);
    }

    public function add() {
        $this->db->where('sexo', 'MASCULINO');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros_h'] = $this->db->get('membro')->result();

        $this->db->where('sexo', 'FEMENINO');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros_m'] = $this->db->get('membro')->result();

        $this->load->view('casamento/add', $dados);
    }

    public function addPost() {
        $data['membro_homem_id'] = $this->input->post('membro_homem_id');
        $data['membro_mulher_id'] = $this->input->post('membro_mulher_id');
        $data['padrinho_nome'] = $this->input->post('padrinho_nome');
        $data['madrinha_nome'] = $this->input->post('madrinha_nome');
        $data['padrinhos_casados'] = $this->input->post('padrinhos_casados');
        $data['data_casamento'] = $this->input->post('data_casamento');

        if ($this->db->insert('casamento', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('casamento de '.$data['membro_homem_id'].' adicionado');

            $this->session->set_flashdata('sms', 'casamento adicionado com sucesso');
            redirect('casamento/listar');
        }
    }

}
