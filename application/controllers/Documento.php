<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documento extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('documento/listar');
    }

    public function listar() {
        $this->db->join('membro', 'membro.id_membro=membro_documento.id_membro');
        $dados['documentos'] = $this->db->get('membro_documento')->result();
        $this->load->view('documento/listar', $dados);
    }

    public function add() {
        $dados['tipo_documento'] = $this->db->get('tipo_documento')->result();
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('documento/add', $dados);
    }

    public function addPost() {
        $data['nome_membro'] = $this->input->post('nome_membro');
        $data['nome_pai'] = $this->input->post('nome_pai');
        $data['nome_mae'] = $this->input->post('nome_mae');

        $data1['descricao_identificacao'] = $this->input->post('identificacao');
        $data1['tipo_identificacao'] = $this->input->post('tipo');

        $data['id_nacionalidade'] = $this->input->post('nacionalidade');
        $data['data_nascimento'] = $this->input->post('data_nascimento');
        $data['estado_civil'] = $this->input->post('estado_civil');
        $data['id_localidade'] = 1;
        $data['telefone'] = $this->input->post('telefone');
        $data['endereco'] = $this->input->post('endereco');

        $data['id_identificacao'] = $dados1['identificacao'][0]->id_identificacao;
        if ($this->db->insert('documento', $data)) {
            $this->session->set_flashdata('sms', 'Reserva adicionado com sucesso');
            redirect('documento/listar');
        }
    }

}
