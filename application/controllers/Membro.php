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
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('identificacao', 'identificacao.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        
        $this->load->view('membro/listar', $dados);
    }

    public function ver($id = null) {
        $this->verificar_acesso();
        $this->db->where('id_membro', $id);
        $this->db->join('igreja_nacional', 'igreja_nacional.id_igreja_nacional=membro.id_igreja_nacional');
        $this->db->join('provincia_eclesiastica', 
        'provincia_eclesiastica.id_provincia_eclesiastica=membro.id_provincia_eclesiastica');
        $this->db->join('paroquia', 'paroquia.id_paroquia=membro.id_paroquia');
        $this->db->join('classe', 'classe.id_classe=membro.id_classe');
        $this->db->join('categoria', 'categoria.id_categoria=membro.id_categoria');
        $this->db->join('funcao', 'funcao.id_funcao=membro.id_funcao');
        $this->db->join('tribo', 'tribo.id_tribo=membro.id_tribo');
        $this->db->join('estado_civil', 'estado_civil.id_estado_civil=membro.id_estado_civil');
        $this->db->join('nacionalidade', 'nacionalidade.id_nacionalidade=membro.id_nacionalidade');
        $this->db->join('identificacao', 'identificacao.id_identificacao=membro.id_identificacao');
        $dados['membros'] = $this->db->get('membro')->result();
        
        $this->db->where('id_membro', $id);
        $dados['documentos'] = $this->db->get('membro_documento')->result();
        $this->load->view('membro/ver', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $dados['tribos'] = $this->db->get('tribo')->result();
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $dados['classes'] = $this->db->get('classe')->result();
        $dados['categorias'] = $this->db->get('categoria')->result();
        $dados['funcoes'] = $this->db->get('funcao')->result();
        $this->load->view('membro/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['nome_membro'] = $this->input->post('nome_membro');
        $data['nome_pai'] = $this->input->post('nome_pai');
        $data['nome_mae'] = $this->input->post('nome_mae');

        $data1['descricao_identificacao'] = $this->input->post('identificacao');
        $data1['tipo_identificacao'] = $this->input->post('tipo');

        $data['nacionalidade_id'] = $this->input->post('nacionalidade');
        $data['tribo_id'] = $this->input->post('tribo');
        $data['igreja_nacional_id'] = $this->input->post('igreja_nacional');
        $data['provincia_eclesiastica_id'] = $this->input->post('provincia_eclesiastica');
        $data['paroquia_id'] = $this->input->post('paroquia');
        $data['classeid_'] = $this->input->post('classe');
        $data['data_admissao'] = $this->input->post('data_admissao');
        $data['data_baptismo'] = $this->input->post('data_baptismo');
        $data['categoriaid_id'] = $this->input->post('categoria');
        $data['funcao_id'] = $this->input->post('funcao');
        $data['data_nascimento'] = $this->input->post('data_nascimento');
        $data['estado_civil_id'] = $this->input->post('estado_civil');
        $data['telefone'] = $this->input->post('telefone');
        $data['endereco'] = $this->input->post('endereco');

        if ($this->db->insert('identificacao', $data1)) {

            $this->db->where('descricao_identificacao', $data1['descricao_identificacao']);
            $dados1['identificacao'] = $this->db->get('identificacao')->result();

            $data['identificacao_id'] = $dados1['identificacao'][0]->id_identificacao;
            if ($this->db->insert('membro', $data)) {
                $this->session->set_flashdata('sms', 'Reserva adicionado com sucesso');
                redirect('membro/listar');
            }
        }
    }
}
