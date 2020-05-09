<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamento extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('pagamento/listar');
    }

    public function listar() {
        
        $this->db->join('membro', 'membro.membro_id=pagamento.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('usuario', 'usuario.usuario_id=pagamento.usuario_id');
        $dados['pagamentos'] = $this->db->get('pagamento')->result();
        $this->load->view('pagamento/listar', $dados);
    }

    public function add() {
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('pagamento/add', $dados);
    }

    public function addPost() {
        $data['membro_id'] = $this->input->post('membro');
        $data['usuario_id'] = $this->session->userdata('id_usuario');
        $data['tipo_pagamento'] = $this->input->post('tipo_pagamento');
        $data['valor'] = $this->input->post('valor');
        $data['mes_referencia'] = $this->input->post('mes_referencia');

        if ($this->db->insert('pagamento', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('pagamento de '.$data['membro_id']
            .' registrado no valor de '.$data['valor']);

            $this->session->set_flashdata('sms', 'Pagamento registrado com sucesso');
            redirect('pagamento/listar');
        }
    }

}
