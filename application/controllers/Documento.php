<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documento extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('documento/listar');
    }

    public function listar() {
        $this->db->join('membro', 'membro.id_membro=membro_documento.id_membro');
        $dados['documentos'] = $this->db->get('membro_documento')->result();
        $this->load->view('documento/listar', $dados);
    }

    public function add() {
        $dados['tipo_documento'] = $this->db->get('tipo_documento')->result();
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('documento/add', $dados);
    }

    public function addPost() {
        $data['nome_membro'] = $this->input->post('nome_membro');
        $data['nome_pai'] = $this->input->post('nome_pai');
        $data['nome_mae'] = $this->input->post('nome_mae');

        $data1['descricao_identificacao'] = $this->input->post('identificacao');
        $data1['tipo_identificacao'] = $this->input->post('tipo');

        $data['id_nacionalidade'] = $this->input->post('nacionalidade');
        $data['data_nascimento'] = $this->input->post('data_nascimento');
        $data['estado_civil'] = $this->input->post('estado_civil');
        $data['id_localidade'] = 1;
        $data['telefone'] = $this->input->post('telefone');
        $data['endereco'] = $this->input->post('endereco');

        $data['id_identificacao'] = $data['identificacao'][0]->id_identificacao;
        if ($this->db->insert('documento', $data)) {
            $this->session->set_flashdata('sms', 'Reserva adicionado com sucesso');
            redirect('documento/listar');
        }
    }

    public function cerdidaoCasamento($user_id = NULL)
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $data['stylesheet'] = file_get_contents(base_url() . 'libs/dist/css/card.css');
        $html = $this->load->view('membro/docs/certidao_casamento', $data)->output->final_output;

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Certidão de Casamento");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('Asadsaddas', 'E');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

    public function cerdidaoBaptismo($user_id = NULL)
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $data['stylesheet'] = file_get_contents(base_url() . 'libs/dist/css/card.css');
        $html = $this->load->view('membro/docs/certidao_batismo', $data)->output->final_output;

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Certidão de Baptismo");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('Asadsaddas', 'E');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

    public function testificacao($user_id = NULL)
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $data['stylesheet'] = file_get_contents(base_url() . 'libs/dist/css/card.css');
        $html = $this->load->view('membro/docs/testificacao', $data)->output->final_output;

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Testificação");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('Asadsaddas', 'E');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

}
