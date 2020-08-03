<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paroquia extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('paroquia/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->join('provincia_eclesiastica',
         'provincia_eclesiastica.provincia_eclesiastica_id=paroquia.provincia_eclesiastica_id');
        $this->db->join('membro', 'membro.membro_id = paroquia.representante_id', 'left');
        $this->db->join('pessoa', 'pessoa.pessoa_id = membro.pessoa_id', 'left');
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $this->load->view('paroquia/listar', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();

        $this->load->view('paroquia/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['provincia_eclesiastica_id'] = $this->input->post('provincia_eclesiastica');
        $data['descricao_paroquia'] = $this->input->post('descricao_paroquia');

        if(!$this->validar($data['descricao_paroquia'], 
        $data['provincia_eclesiastica_id'])){
            $this->session->set_flashdata('sms', 'paroquia já existente');
            redirect('paroquia/add');
        }

        if ($this->db->insert('paroquia', $data)) {
            
            $this->load->model('log_model');
            $this->log_model->adicionar('paroquia '.$data['descricao_paroquia'].' adicionado');

            $this->session->set_flashdata('sms', 'paroquia adicionado com sucesso');
            redirect('paroquia/listar');
        }
    }

    public function validar($descricao, $provincia_id){
        $this->db->where('descricao_paroquia', $descricao);
        $this->db->where('provincia_eclesiastica_id', $provincia_id);
        $dados['paroquia'] = $this->db->get('paroquia')->result();

        if(count($dados['paroquia']) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function editar($id) {
        $this->verificar_acesso();
        $this->db->where('paroquia_id', $id);
        $this->db->join('provincia_eclesiastica',
         'provincia_eclesiastica.provincia_eclesiastica_id=paroquia.provincia_eclesiastica_id');
        $dados['paroquias'] = $this->db->get('paroquia')->result();

        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();

        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('paroquia/editar', $dados);
    }

    public function editarPost() {
        $this->verificar_acesso();
        $id = $this->input->post('paroquia_id');
        $data['representante_id'] = $this->input->post('representante_id');
        $data['provincia_eclesiastica_id'] = $this->input->post('provincia_eclesiastica');
        $data['descricao_paroquia'] = $this->input->post('descricao_paroquia');

        /*
        if(!$this->validar($data['descricao_paroquia'], $data['provincia_eclesiastica_id'])){
            $this->session->set_flashdata('sms', 'paroquia já existente');
            redirect('paroquia/editar');
        }*/

        $this->db->where('paroquia_id', $id);
        if ($this->db->update('paroquia', $data)) {
            
            $this->load->model('log_model');
            $this->log_model->adicionar('paroquia '.$data['descricao_paroquia'].' atualizada');

            $this->session->set_flashdata('sms', 'paroquia atualizada com sucesso');
            redirect('paroquia/listar');
        }
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_paroquia'] = 1;
        $this->db->where('paroquia_id', $id);
        if ($this->db->update('paroquia', $data)) {
            $this->session->set_flashdata('sms', 'paroquia atualizado com sucesso');
            redirect('paroquia/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_paroquia'] = 0;
        $this->db->where('paroquia_id', $id);
        if ($this->db->update('paroquia', $data)) {
            $this->session->set_flashdata('sms', 'paroquia atualizado com sucesso');
            redirect('paroquia/listar');
        }
    }

}
