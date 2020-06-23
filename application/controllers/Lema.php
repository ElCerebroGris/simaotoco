<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lema extends CI_Controller
{

    public function verificar_acesso()
    {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index()
    {
        $this->verificar_acesso();
        redirect('lema/listar');
    }

    public function listar()
    {
        $this->verificar_acesso();
        $dados['lemas'] = $this->db->get('lema')->result();
        $this->load->view('lema/listar', $dados);
    }

    public function add()
    {
        $this->verificar_acesso();
        $this->load->view('lema/add');
    }

    public function addPost()
    {
        $this->verificar_acesso();
        $data['ano'] = $this->input->post('ano');
        $data['lema'] = $this->input->post('lema');

        if ($this->input->post('status') && $this->input->post('status') == "on") {
            $this->updateStatus();
            $data['status'] = 1;
        }

        if (!$this->validar($data['ano'])) {
            $this->session->set_flashdata('sms', 'Não se pode cadastrar mais de um lema no mesmo ano');
            redirect('lema/add');
        }

        if ($this->db->insert('lema', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('Lema ' . $data['lema'] . ' adicionado');

            $this->session->set_flashdata('sms', 'Lema adicionado com sucesso');
            redirect('lema/listar');
        }
    }

    public function validar($ano, $id = null)
    {
        if ($id) {
            $this->db->where('ano', $ano);
            $this->db->where('id !=', $id);
        } else {
            $this->db->where('ano', $ano);
        }

        $dados['lemas'] = $this->db->get('lema')->result();

        if (count($dados['lemas']) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStatus(){
        $data['status'] = 0;
        $this->db->update('lema', $data);
    }

    public function editar($id)
    {
        $this->verificar_acesso();
        $this->db->where('id', $id);
        $dados['lema'] = $this->db->get('lema')->result();
        $this->load->view('lema/editar', $dados);
    }

    public function editarPost()
    {
        $this->verificar_acesso();
        $id = $this->input->post('lema_id');
        $data['ano'] = $this->input->post('ano');
        $data['lema'] = $this->input->post('lema');

        if ($this->input->post('status') && $this->input->post('status') == "on") {
            $this->updateStatus();
            $data['status'] = 1;
        }

        if (!$this->validar($data['ano'], $id)) {
            $this->session->set_flashdata('sms', 'Não se pode cadastrar mais de um lema no mesmo ano');
            redirect('lema/editar/' . $id);
        }

        $this->db->where('id', $id);
        if ($this->db->update('lema', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('Lema ' . $data['lema'] . ' atualizado');

            $this->session->set_flashdata('sms', 'Lema atualizado com sucesso');
            redirect('lema/listar');
        }
    }
}
