<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Testificacao extends CI_Controller
{

    public function verificar_acesso()
    {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index()
    {
        redirect('testificacao/listar');
    }

    public function listar()
    {
        $this->verificar_acesso();
        $this->load->model('testificacao_model');
        $dados['documentos'] = $this->testificacao_model->listar();

        $this->load->view('testificacao/listar', $dados);
    }

    public function igrejas()
    {
        $this->verificar_acesso();
        $data = $this->db->get('igreja_nacional')->result();
        $json['success'] = true;
        $json['content'] = $data;
        echo json_encode($json);
    }

    public function provincias()
    {
        $this->verificar_acesso();
        $data = $this->db->get('provincia_eclesiastica')->result();
        $json['success'] = true;
        $json['content'] = $data;
        echo json_encode($json);
    }

    public function paroquias()
    {
        $this->verificar_acesso();
        $data = $this->db->get('paroquia')->result();
        $json['success'] = true;
        $json['content'] = $data;
        echo json_encode($json);
    }

    public function add()
    {
        $this->verificar_acesso();
        
        $this->db->where('estado_membro', 1);
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('testificacao/add', $dados);
    }

    public function addPost()
    {
        $this->verificar_acesso();
        $data['membro_id'] = $this->input->post('membro');
        $data['origem_tipo'] = $this->input->post('origem_tipo');
        $data['origem_referencia'] = $this->input->post('origem_referencia');
        $data['destino_tipo'] = $this->input->post('destino_tipo');
        $data['destino_referencia'] = $this->input->post('destino_referencia');
        $data['usuario_id'] = $this->session->userdata('id_usuario');

        if ($this->db->insert('testificacao', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('testificacao para ' . $data['membro_id'] . ' criado');

            $this->session->set_flashdata('sms', 'testificacao adicionado com sucesso');
            redirect('testificacao/listar');
        }
    }

    public function mostrar_pdf($testificacao_id = null)
    {
        $this->verificar_acesso();
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);

        $this->load->model('testificacao_model');
        $dados['documentos'] = $this->testificacao_model->ver($testificacao_id);

        $html = $this->load->view('membro/docs/testificacao', $dados)->output->final_output;

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Testificação");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('Asadsaddas', 'E');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

}
