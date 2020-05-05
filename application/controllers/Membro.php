<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Membro extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('membro/listar');
    }

    public function listar() {
        $this->db->join('identificacao', 'identificacao.id_identificacao=membro.id_identificacao');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('membro/listar', $dados);
    }

    public function ver($id = null) {
        $this->db->where('id_membro', $id);
        $this->db->join('identificacao', 'identificacao.id_identificacao=membro.id_identificacao');
        $dados['membros'] = $this->db->get('membro')->result();
        
        $this->db->where('id_membro', $id);
        $dados['documentos'] = $this->db->get('membro_documento')->result();
        $this->load->view('membro/ver', $dados);
    }

    public function add() {
        $dados['estado_civil'] = $this->db->get('estado_civil')->result();
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $dados['tribos'] = $this->db->get('tribo')->result();
        $dados['categorias'] = $this->db->get('categoria')->result();
        $dados['tipo_identificacao'] = $this->db->get('tipo_identificacao')->result();
        $this->load->view('membro/add', $dados);
    }

    public function addPost() {
        $data['nome_membro'] = $this->input->post('nome_membro');
        $data['nome_pai'] = $this->input->post('nome_pai');
        $data['nome_mae'] = $this->input->post('nome_mae');

        $data1['descricao_identificacao'] = $this->input->post('identificacao');
        $data1['tipo_identificacao'] = $this->input->post('tipo');

        $data['id_nacionalidade'] = $this->input->post('nacionalidade');
        $data['id_tribo'] = $this->input->post('tribo');
        $data['data_admissao'] = $this->input->post('data_admissao');
        $data['data_bapitsmo'] = $this->input->post('data_bapitsmo');
        $data['id_categoria'] = $this->input->post('categoria');
        $data['data_nascimento'] = $this->input->post('data_nascimento');
        $data['estado_civil'] = $this->input->post('estado_civil');
        $data['id_localidade'] = 1;
        $data['telefone'] = $this->input->post('telefone');
        $data['endereco'] = $this->input->post('endereco');

        if ($this->db->insert('identificacao', $data1)) {

            $this->db->where('descricao_identificacao', $data1['descricao_identificacao']);
            $dados1['identificacao'] = $this->db->get('identificacao')->result();

            $data['id_identificacao'] = $dados1['identificacao'][0]->id_identificacao;
            if ($this->db->insert('membro', $data)) {
                $this->session->set_flashdata('sms', 'Reserva adicionado com sucesso');
                redirect('membro/listar');
            }
        }
    }

    public function remover($id = null) {
        $this->verificar_acesso();

        $this->db->where('id_reserva', $id);
        $this->db->delete('reserva');

        redirect('reserva');
    }

}
