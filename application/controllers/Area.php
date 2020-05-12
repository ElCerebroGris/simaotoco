<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('area/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->join('tribo',
         'tribo.tribo_id=area.tribo_id');
        $dados['areas'] = $this->db->get('area')->result();
        $this->load->view('area/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $this->verificar_acesso();
        $dados['tribos'] = $this->db->get('tribo')->result();
        $this->load->view('area/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['tribo_id'] = $this->input->post('tribo');
        $data['descricao_area'] = $this->input->post('descricao_area');

        if(!$this->validar($data['descricao_area'], 
        $data['tribo_id'])){
            $this->session->set_flashdata('sms', 'area já existente');
            redirect('area/add');
        }

        if ($this->db->insert('area', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('area '.$data['descricao_area'].' adicionado');

            $this->session->set_flashdata('sms', 'area adicionado com sucesso');
            redirect('area/listar');
        }
    }

    public function validar($descricao, $tribo_id){
        $this->db->where('descricao_area', $descricao);
        $this->db->where('tribo_id', $tribo_id);
        $dados['area'] = $this->db->get('area')->result();

        if(count($dados['area']) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function editar($id) {
        $this->verificar_acesso();
        $this->db->where('area_id', $id);
        $this->db->join('tribo',
         'tribo.tribo_id=area.tribo_id');
        $dados['areas'] = $this->db->get('area')->result();
        $dados['tribos'] = $this->db->get('tribo')->result();

        $this->load->view('area/editar', $dados);
    }

    public function editarPost() {
        $this->verificar_acesso();
        $id = $this->input->post('area_id');
        $data['tribo_id'] = $this->input->post('tribo');
        $data['descricao_area'] = $this->input->post('descricao_area');

        if(!$this->validar($data['descricao_area'], 
        $data['tribo_id'])){
            $this->session->set_flashdata('sms', 'area já existente');
            redirect('area/editar');
        }

        $this->db->where('area_id', $id);
        if ($this->db->update('area', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('area '.$data['descricao_area'].' atualizada');

            $this->session->set_flashdata('sms', 'area atualizada com sucesso');
            redirect('area/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_area'] = 1;
        $this->db->where('area_id', $id);
        if ($this->db->update('area', $data)) {
            $this->session->set_flashdata('sms', 'area atualizado com sucesso');
            redirect('area/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_area'] = 0;
        $this->db->where('area_id', $id);
        if ($this->db->update('area', $data)) {
            $this->session->set_flashdata('sms', 'area atualizado com sucesso');
            redirect('area/listar');
        }
    }

}
