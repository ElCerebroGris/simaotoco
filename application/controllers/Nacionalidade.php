<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nacionalidade extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('nacionalidade/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $this->load->view('nacionalidade/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $this->load->view('nacionalidade/add');
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['pais'] = $this->input->post('pais');
        $data['descricao_nacionalidade'] = $this->input->post('descricao_nacionalidade');

        if(!$this->validar($data['descricao_nacionalidade'])){
            $this->session->set_flashdata('sms', 'nacionalidade já existente');
            redirect('nacionalidade/add');
        }

        if ($this->db->insert('nacionalidade', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('nacionalidade '.$data['descricao_nacionalidade'].' adicionado');

            $this->session->set_flashdata('sms', 'nacionalidade adicionado com sucesso');
            redirect('nacionalidade/listar');
        }
    }

    public function validar($descricao){
        $this->db->where('descricao_nacionalidade', $descricao);
        $dados['nacionalidade'] = $this->db->get('nacionalidade')->result();

        if(count($dados['nacionalidade']) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function editar($id) {
        $this->verificar_acesso();
        $this->db->where('nacionalidade_id', $id);
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $this->load->view('nacionalidade/editar', $dados);
    }

    public function editarPost() {
        $this->verificar_acesso();
        $id = $this->input->post('nacionalidade_id');
        $data['pais'] = $this->input->post('pais');
        $data['descricao_nacionalidade'] = $this->input->post('descricao_nacionalidade');

        if(!$this->validar($data['descricao_nacionalidade'])){
            $this->session->set_flashdata('sms', 'nacionalidade já existente');
            redirect('nacionalidade/editar');
        }

        $this->db->where('nacionalidade_id', $id);
        if ($this->db->update('nacionalidade', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('nacionalidade '.$data['descricao_nacionalidade'].' atualizada');

            $this->session->set_flashdata('sms', 'nacionalidade atualizada com sucesso');
            redirect('nacionalidade/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_nacionalidade'] = 1;
        $this->db->where('nacionalidade_id', $id);
        if ($this->db->update('nacionalidade', $data)) {
            $this->session->set_flashdata('sms', 'nacionalidade atualizado com sucesso');
            redirect('nacionalidade/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_nacionalidade'] = 0;
        $this->db->where('nacionalidade_id', $id);
        if ($this->db->update('nacionalidade', $data)) {
            $this->session->set_flashdata('sms', 'nacionalidade atualizado com sucesso');
            redirect('nacionalidade/listar');
        }
    }

}
