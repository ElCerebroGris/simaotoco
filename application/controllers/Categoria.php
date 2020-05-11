<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('categoria/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $dados['categorias'] = $this->db->get('categoria')->result();
        $this->load->view('categoria/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $this->load->view('categoria/add');
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['descricao_categoria'] = $this->input->post('descricao_categoria');

        if(!$this->validar($data['descricao_categoria'])){
            $this->session->set_flashdata('sms', 'categoria já existente');
            redirect('categoria/add');
        }

        if ($this->db->insert('categoria', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('categoria '.$data['descricao_categoria'].' adicionado');

            $this->session->set_flashdata('sms', 'categoria adicionado com sucesso');
            redirect('categoria/listar');
        }
    }

    public function validar($descricao){
        $this->db->where('descricao_categoria', $descricao);
        $dados['categoria'] = $this->db->get('categoria')->result();

        if(count($dados['categoria']) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function editar($id) {
        $this->verificar_acesso();
        $this->db->where('categoria_id', $id);
        $dados['categorias'] = $this->db->get('categoria')->result();
        $this->load->view('categoria/editar', $dados);
    }

    public function editarPost() {
        $this->verificar_acesso();
        $id = $this->input->post('categoria_id');
        $data['descricao_categoria'] = $this->input->post('descricao_categoria');

        if(!$this->validar($data['descricao_categoria'])){
            $this->session->set_flashdata('sms', 'categoria já existente');
            redirect('categoria/editar');
        }

        $this->db->where('categoria_id', $id);
        if ($this->db->update('categoria', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('categoria '.$data['descricao_categoria'].' atualizada');

            $this->session->set_flashdata('sms', 'categoria atualizada com sucesso');
            redirect('categoria/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_categoria'] = 1;
        $this->db->where('categoria_id', $id);
        if ($this->db->update('categoria', $data)) {
            $this->session->set_flashdata('sms', 'categoria atualizado com sucesso');
            redirect('categoria/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_categoria'] = 0;
        $this->db->where('categoria_id', $id);
        if ($this->db->update('categoria', $data)) {
            $this->session->set_flashdata('sms', 'categoria atualizado com sucesso');
            redirect('categoria/listar');
        }
    }

}
