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
        $data['membro_homem_id'] = $this->input->post('paroquia');
        $data['membro_mulher_id'] = $this->input->post('descricao_classe');
        $data['padrinho_nome'] = $this->input->post('descricao_classe');
        $data['madrinha_nome'] = $this->input->post('descricao_classe');
        $data['padrinhos_casados'] = $this->input->post('descricao_classe');
        $data['data_casamento'] = $this->input->post('descricao_classe');

        if ($this->db->insert('casamento', $data)) {
            $this->session->set_flashdata('sms', 'casamento adicionado com sucesso');
            redirect('casamento/listar');
        }
    }

}
