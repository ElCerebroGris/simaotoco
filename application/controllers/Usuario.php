<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function nivel_usuario() {
        if ($this->session->userdata('nivel') == 0) {
            redirect('professor');
        } else {
            redirect('exame/exames');
        }
    }

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        $this->verificar_acesso();
        redirect('usuario/listar');
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->where('id_usuario !=', $this->session->userdata('id_usuario'));
        $this->db->join('nivel_usuario', 'nivel_usuario.codigo_nivel_usuario=usuario.codigo_nivel_usuario');
        $dados['usuarios'] = $this->db->get('usuario')->result();

        $this->load->view('usuario/listar', $dados);
    }
    
    public function perfil() {
        $this->verificar_acesso();
        $this->db->where('id_usuario', $this->session->userdata('id_usuario'));
        $this->db->join('funcionario', 'funcionario.id_funcionario=usuario.id_funcionario');
        $this->db->join('cargo', 'cargo.codigo_cargo=funcionario.codigo_cargo');
        $this->db->join('nivel_usuario', 'nivel_usuario.codigo_nivel_usuario=usuario.codigo_nivel_usuario');
        $dados['usuarios'] = $this->db->get('usuario')->result();
        
        $dados['niveis'] = $this->db->get('nivel_usuario')->result();

        $this->load->view('usuario/perfil', $dados);
    }

    public function add() {
        $this->verificar_acesso();
        $dados['niveis'] = $this->db->get('nivel_usuario')->result();
        $this->load->view('usuario/add', $dados);
    }

    public function addPost() {
        $this->verificar_acesso();
        $data['nome_usuario'] = $this->input->post('nome_usuario');
        $data['senha'] = $this->input->post('senha');
        $data['codigo_nivel_usuario'] = $this->input->post('codigo_nivel_usuario');
        $data['email'] = $this->input->post('email');
        
        if($this->db->insert('usuario', $data)){
            $this->session->set_flashdata('sms', 'Usuário adicionado com sucesso');
            redirect('usuario/listar');
        }
        
    }
    
    public function perfilPost() {
        $this->verificar_acesso();
        $data['nome_usuario'] = $this->input->post('nome_usuario');
        $data['senha'] = $this->input->post('senha');
        
        $this->db->where('id_usuario', $this->session->userdata('id_usuario'));
        if($this->db->update('usuario', $data)){
            redirect('usuario/perfil');
        }
        
    }

    public function sair() {
        $this->verificar_acesso();

        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function entrarPost() {
        $nome_usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');

        $this->db->where('nome_usuario', $nome_usuario);
        $this->db->where('senha', $senha);
        $this->db->join('nivel_usuario', 'nivel_usuario.codigo_nivel_usuario=usuario.codigo_nivel_usuario');
        $data['usuarios'] = $this->db->get('usuario')->result();

        if (count($data['usuarios']) == 1) {
            $dados['id_usuario'] = $data['usuarios'][0]->id_usuario;
            //$dados['nome_completo'] = $data['usuarios'][0]->nome_completo;
            $dados['nome_usuario'] = $data['usuarios'][0]->nome_usuario;
            $dados['logado'] = true;
            $dados['nivel'] = $data['usuarios'][0]->codigo_nivel_usuario;
            $dados['descricao'] = $data['usuarios'][0]->descricao_nivel_usuario;
            $this->session->set_userdata($dados);
        }
        redirect('welcome');
    }
    
    public function recuperar_senha() {
        $this->load->view('usuario/recuperar_senha');
    }
    
    public function recuperar_senhaPost() {
        redirect('usuario/nova_senha');
    }
    
    public function nova_senha() {
        $this->load->view('usuario/nova_senha');
    }

}
