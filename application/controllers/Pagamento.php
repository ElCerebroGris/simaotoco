<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pagamento extends CI_Controller
{

    public function verificar_acesso()
    {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index()
    {
        redirect('pagamento/listar');
    }

    public function getTipos($id)
    {
        $this->verificar_acesso();

        if ($id == 0) {
            $json['error'] = true;
            $json['content'] = array();
            echo json_encode($json);
        } else if ($id == 1) {
            $data = array(
                array("Oferta_dominical", "Oferta dominical"),
                array("Oferta_voluntarias", "Oferta voluntárias"),
                array("Oferta_culto_4_feira", "Oferta culto 4ª feira"),
                array("Oferta_culto_6_feira", "Oferta culto 6ª feira"),
                array("Oferta_culto_Sábado", "Oferta culto Sábado"),
                array("Oferta_Santa_Ceia", "Oferta Santa Ceia"),
                array("Oferta_Jejum", "Oferta Jejum"),
            );
            $json['success'] = true;
            $json['content'] = $data;
            echo json_encode($json);
        } else {
            $data = array(
                array("Material_de_Escritorio_Gastaveis", "Material de Escritório - Gastaveis"),
                array("Material_de_Escritorio_Equipamentos", "Material de Escritório - Equipamentos")
            );
            $json['success'] = true;
            $json['content'] = $data;
            echo json_encode($json);
        }

    }

    public function listar()
    {
        $this->verificar_acesso();
        $this->db->join('membro', 'membro.membro_id=pagamento.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('usuario', 'usuario.usuario_id=pagamento.usuario_id');
        $dados['pagamentos'] = $this->db->get('pagamento')->result();
        $this->load->view('pagamento/listar', $dados);
    }

    public function add()
    {
        $this->verificar_acesso();
        $this->db->where('estado_membro', 1);
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('pagamento/add', $dados);
    }

    public function addPost()
    {
        $this->verificar_acesso();
        $data['membro_id'] = $this->input->post('membro');
        $data['usuario_id'] = $this->session->userdata('id_usuario');
        $data['tipo_pagamento'] = $this->input->post('tipo_pagamento');
        $data['modo_pagamento'] = $this->input->post('modo_pagamento');
        $data['valor'] = $this->input->post('valor');
        $data['mes_referencia'] = $this->input->post('mes_referencia');
        $data['moeda'] = $this->input->post('moeda');

        if ($this->db->insert('pagamento', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('pagamento de ' . $data['membro_id']
                . ' registrado no valor de ' . $data['valor']);

            $this->session->set_flashdata('sms', 'Pagamento registrado com sucesso');
            redirect('pagamento/listar');
        }
    }

    public function addCaixa()
    {
        $this->verificar_acesso();
        $this->db->where('estado_membro', 1);
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('pagamento/addCaixa', $dados);
    }

    public function addCaixaPost()
    {
        $this->verificar_acesso();
        $data['membro_id'] = $this->input->post('membro');
        $data['usuario_id'] = $this->session->userdata('id_usuario');
        $data['tipo_pagamento'] = $this->input->post('tipo_pagamento');
        $data['tipo'] = $this->input->post('tipo');
        $data['descricao'] = $this->input->post('descricao');
        $data['valor'] = $this->input->post('valor');
        $data['moeda'] = $this->input->post('moeda');

        if ($this->db->insert('pagamento', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('pagamento de ' . $data['membro_id']
                . ' registrado no valor de ' . $data['valor']);

            $this->session->set_flashdata('sms', 'Pagamento registrado com sucesso');
            redirect('pagamento/listar');
        }
    }

    public function relatorios()
    {
        $this->verificar_acesso();
        $this->load->view('pagamento/relatorio');
    }

}
