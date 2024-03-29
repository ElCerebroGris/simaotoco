<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
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
        redirect('usuario/listar');
    }

    public function listar()
    {
        $this->verificar_acesso();
        $this->db->where('usuario_id !=', $this->session->userdata('id_usuario'));
        $this->db->join('nivel_usuario', 'nivel_usuario.codigo_nivel_usuario=usuario.codigo_nivel_usuario');
        $dados['usuarios'] = $this->db->get('usuario')->result();

        $this->load->view('usuario/listar', $dados);
    }

    public function add()
    {
        $this->verificar_acesso();
        $dados['niveis'] = $this->db->get('nivel_usuario')->result();

        $this->db->where('estado_membro', 1);
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('usuario/add', $dados);
    }

    public function addPost()
    {
        $this->verificar_acesso();
        $data['membro_id'] = $this->input->post('membro_id');
        $data['nome_usuario'] = $this->input->post('nome_usuario');
        $data['senha'] = $this->input->post('senha');
        $data['codigo_nivel_usuario'] = $this->input->post('codigo_nivel_usuario');
        $data['email'] = $this->input->post('email');

        if (!$this->validar($data['nome_usuario'], $data['email'], 0)) {
            $this->session->set_flashdata('sms', 'Usuário já existente');
            redirect('usuario/add');
        }

        if ($this->db->insert('usuario', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('usuário ' . $data['nome_usuario'] . ' adicionado');

            $this->session->set_flashdata('sms', 'Usuário adicionado com sucesso');
            redirect('usuario/listar');
        }

    }

    public function validar($username, $email, $id)
    {
        $this->db->where('nome_usuario', $username);
        $this->db->or_where('email', $email);
        $dados['usuarios'] = $this->db->get('usuario')->result();

        if (count($dados['usuarios']) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function editar($id)
    {
        $this->verificar_acesso();
        $this->db->where('usuario_id', $id);
        $this->db->join('nivel_usuario', 'nivel_usuario.codigo_nivel_usuario=usuario.codigo_nivel_usuario');
        $dados['usuarios'] = $this->db->get('usuario')->result();

        $dados['niveis'] = $this->db->get('nivel_usuario')->result();
        $this->load->view('usuario/editar', $dados);
    }

    public function editarPost()
    {
        $this->verificar_acesso();
        $id = $this->input->post('usuario_id');
        $data['nome_usuario'] = $this->input->post('nome_usuario');
        $data['codigo_nivel_usuario'] = $this->input->post('codigo_nivel_usuario');
        $data['email'] = $this->input->post('email');

        /*if (!$this->validar($data['nome_usuario'], $data['email'], $id)) {
            $this->session->set_flashdata('sms', 'Usuário já existente');
            redirect('usuario/editar/' . $id);
        }*/

        $this->db->where('usuario_id', $id);
        if ($this->db->update('usuario', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('usuário ' . $data['nome_usuario'] . ' atualizado');

            $this->session->set_flashdata('sms', 'Usuário atualizaddo com sucesso');
            redirect('usuario/listar');
        }

    }

    public function perfil()
    {
        $this->verificar_acesso();
        $this->db->where('usuario_id', $this->session->userdata('id_usuario'));
        $this->db->join('nivel_usuario', 'nivel_usuario.codigo_nivel_usuario=usuario.codigo_nivel_usuario');
        $dados['usuarios'] = $this->db->get('usuario')->result();

        $dados['niveis'] = $this->db->get('nivel_usuario')->result();
        $this->load->view('usuario/perfil', $dados);
    }

    public function perfilPost()
    {
        $id = $this->input->post('usuario_id');
        $data['nome_usuario'] = $this->input->post('nome_usuario');
        $data['senha'] = $this->input->post('senha');
        $data['codigo_nivel_usuario'] = $this->input->post('codigo_nivel_usuario');
        $data['email'] = $this->input->post('email');

        $this->db->where('usuario_id', $id);
        if ($this->db->update('usuario', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('usuário ' . $data['nome_usuario'] . ' atualizado');

            $this->session->set_flashdata('sms', 'Usuário atualizaddo com sucesso');
            redirect('usuario/perfil/' . $id);
        }

    }

    public function ativar($id)
    {
        $this->verificar_acesso();
        $data['estado_usuario'] = 1;
        $this->db->where('usuario_id', $id);
        if ($this->db->update('usuario', $data)) {
            $this->session->set_flashdata('sms', 'usuario atualizado com sucesso');
            redirect('usuario/listar');
        }
    }

    public function desativar($id)
    {
        $this->verificar_acesso();
        $data['estado_usuario'] = 0;
        $this->db->where('usuario_id', $id);
        if ($this->db->update('usuario', $data)) {
            $this->session->set_flashdata('sms', 'usuario atualizado com sucesso');
            redirect('usuario/listar');
        }
    }

    public function sair()
    {
        $this->verificar_acesso();
        $this->load->model('log_model');
        $this->log_model->adicionar('usuário terminou sessão');

        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function entrarPost()
    {
        $nome_usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');

        //Fase de desenvolvimento

        $this->db->where('nome_usuario', $nome_usuario);
        $this->db->where('senha', $senha);
        $this->db->where('estado_membro', 1);
        $this->db->join('membro', 'membro.membro_id=usuario.membro_id');
        $this->db->join('nivel_usuario', 'nivel_usuario.codigo_nivel_usuario=usuario.codigo_nivel_usuario');
        $data['usuarios'] = $this->db->get('usuario')->result();

        if (count($data['usuarios']) == 1) {
            $dados['id_usuario'] = $data['usuarios'][0]->usuario_id;
            $dados['nome_completo'] = $data['usuarios'][0]->nome_usuario;
            $dados['nome_usuario'] = $data['usuarios'][0]->nome_usuario;
            $dados['logado'] = true;
            $dados['nivel'] = $data['usuarios'][0]->codigo_nivel_usuario;
            $dados['descricao'] = $data['usuarios'][0]->descricao_nivel_usuario;
            $this->session->set_userdata($dados);

            $this->load->model('log_model');
            $this->log_model->adicionar('usuário fez login');
            redirect('welcome');
        }
        $this->session->set_flashdata('sms', 'Usuário/senha incorretos');
        redirect('welcome/entrar');
        //redirect('welcome');
    }

    public function recuperar_senha()
    {
        $this->load->view('usuario/recuperar_senha');
    }

    public function recuperar_senhaPost()
    {
        redirect('usuario/nova_senha');
    }

    public function nova_senha()
    {
        $this->load->view('usuario/nova_senha');
    }
}
