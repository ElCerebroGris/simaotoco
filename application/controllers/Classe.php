<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classe extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('classe/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->join('paroquia', 'paroquia.paroquia_id=classe.paroquia_id');
        $dados['classes'] = $this->db->get('classe')->result();
        $this->load->view('classe/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $this->load->view('classe/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['paroquia_id'] = $this->input->post('paroquia');
        $data['descricao_classe'] = $this->input->post('descricao_classe');

        if(!$this->validar($data['descricao_classe'], 
        $data['paroquia_id'])){
            $this->session->set_flashdata('sms', 'classe já existente');
            redirect('classe/add');
        }

        if ($this->db->insert('classe', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('classe '.$data['descricao_classe'].' adicionado');

            $this->session->set_flashdata('sms', 'classe adicionado com sucesso');
            redirect('classe/listar');
        }
    }

    public function validar($descricao, $paroquia_id){
        $this->db->where('descricao_classe', $descricao);
        $this->db->where('paroquia_id', $paroquia_id);
        $dados['classe'] = $this->db->get('classe')->result();

        if(count($dados['classe']) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function editar($id) {
        $this->verificar_acesso();
        $this->db->where('classe_id', $id);
        $this->db->join('paroquia', 'paroquia.paroquia_id=classe.paroquia_id');
        $dados['classes'] = $this->db->get('classe')->result();
        
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $this->load->view('classe/editar', $dados);
    }

    public function editarPost() {
        $this->verificar_acesso();
        $id = $this->input->post('classe_id');
        $data['paroquia_id'] = $this->input->post('paroquia');
        $data['descricao_classe'] = $this->input->post('descricao_classe');

        if(!$this->validar($data['descricao_classe'], 
        $data['paroquia_id'])){
            $this->session->set_flashdata('sms', 'classe já existente');
            redirect('classe/editar');
        }

        $this->db->where('classe_id', $id);
        if ($this->db->update()('classe', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('classe '.$data['descricao_classe'].' atualizada');

            $this->session->set_flashdata('sms', 'classe atualizada com sucesso');
            redirect('classe/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_classe'] = 1;
        $this->db->where('classe_id', $id);
        if ($this->db->update('classe', $data)) {
            $this->session->set_flashdata('sms', 'classe atualizado com sucesso');
            redirect('classe/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_classe'] = 0;
        $this->db->where('classe_id', $id);
        if ($this->db->update('classe', $data)) {
            $this->session->set_flashdata('sms', 'classe atualizado com sucesso');
            redirect('classe/listar');
        }
    }

}
