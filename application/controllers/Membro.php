<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Membro extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('membro/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->join('identificacao', 'identificacao.id_identificacao=membro.id_identificacao');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('membro/listar', $dados);
    }

    public function ver($id = null) {
        $this->verificar_acesso();
        $this->db->where('id_membro', $id);
        $this->db->join('identificacao', 'identificacao.id_identificacao=membro.id_identificacao');
        $dados['membros'] = $this->db->get('membro')->result();
        
        $this->db->where('id_membro', $id);
        $dados['documentos'] = $this->db->get('membro_documento')->result();
        $this->load->view('membro/ver', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $dados['estado_civil'] = $this->db->get('estado_civil')->result();
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $dados['tribos'] = $this->db->get('tribo')->result();
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $dados['classes'] = $this->db->get('classe')->result();
        $dados['categorias'] = $this->db->get('categoria')->result();
        $dados['funcoes'] = $this->db->get('funcao')->result();
        $dados['tipo_identificacao'] = $this->db->get('tipo_identificacao')->result();
        $this->load->view('membro/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['nome_membro'] = $this->input->post('nome_membro');
        $data['nome_pai'] = $this->input->post('nome_pai');
        $data['nome_mae'] = $this->input->post('nome_mae');

        $data1['descricao_identificacao'] = $this->input->post('identificacao');
        $data1['tipo_identificacao'] = $this->input->post('tipo');

        $data['id_nacionalidade'] = $this->input->post('nacionalidade');
        $data['id_tribo'] = $this->input->post('tribo');
        $data['id_igreja_nacional'] = $this->input->post('igreja_nacional');
        $data['id_provincia_eclesiastica'] = $this->input->post('provincia_eclesiastica');
        $data['id_paroquia'] = $this->input->post('paroquia');
        $data['Id_classe'] = $this->input->post('classe');
        $data['data_admissao'] = $this->input->post('data_admissao');
        $data['data_baptismo'] = $this->input->post('data_baptismo');
        $data['id_categoria'] = $this->input->post('categoria');
        $data['id_funcao'] = $this->input->post('funcao');
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
}
