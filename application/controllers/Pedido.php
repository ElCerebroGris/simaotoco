<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pedido extends CI_Controller
{

    public function verificar_acesso()
    {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index()
    {
        redirect('pedido/listar');
    }

    public function listar()
    {
        $this->verificar_acesso();
        //Para Gestores Locais
        if($this->session->userdata('nivel') > 3){
            $this->db->where('usuario_id', $this->session->userdata('id_usuario'));
        }
        $this->db->join('usuario', 'usuario.usuario_id=pedido.usuario_id');
        $this->db->join('membro', 'membro.membro_id=pedido.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('classe', 'classe.classe_id=membro.classe_id');
        $this->db->join('paroquia', 'paroquia.paroquia_id=classe.paroquia_id');
        $dados['documentos'] = $this->db->get('pedido')->result();

        $this->load->view('pedido/listar', $dados);
    }

    public function add()
    {
        $this->verificar_acesso();
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('pedido/add', $dados);
    }

    public function addPost()
    {
        $this->verificar_acesso();
        $data['membro_id'] = $this->input->post('membro');
        $data['usuario_id'] = $this->session->userdata('id_usuario');

        if ($this->db->insert('pedido', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('pedido para ' . $data['membro_id'] . ' criado');

            $this->session->set_flashdata('sms', 'pedido adicionado com sucesso');
            redirect('pedido/listar');
        }
    }

    public function atualizar($pedido_id){
        $dados['estado_pedido'] = 0;
        $this->db->where('pedido_id', $pedido_id);
        if($this->db->update('pedido', $dados)){
            $this->load->model('log_model');
            $this->log_model->adicionar('pedido para ' . $pedido_id. ' atualizado');

            $this->session->set_flashdata('sms', 'pedido atualizado com sucesso');
            redirect('pedido/listar');
        }
    }

}
