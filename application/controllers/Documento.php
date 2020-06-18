<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Documento extends CI_Controller
{

    public function verificar_acesso()
    {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index()
    {
        redirect('documento/listar');
    }

    public function listar()
    {
        $this->verificar_acesso();
        $this->db->join('usuario', 'usuario.usuario_id=documento.usuario_id');
        $this->db->join('membro', 'membro.membro_id=documento.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        
        $dados['documentos'] = $this->db->get('documento')->result();
        $this->load->view('documento/listar', $dados);
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

    public function mostrar($documento_id, $membro_id)
    {
        $this->verificar_acesso();
        $this->db->where('documento_id', $documento_id);
        $dados['documentos'] = $this->db->get('documento')->result();
        switch ($dados['documentos'][0]->tipo_documento) {
            case 'TESTIFICAÇÃO':
                redirect('documento/testificacao/' . $membro_id);
                break;
            case 'CERTIDÃO DE CASAMENTO':
                redirect('documento/cerdidaoCasamento/' . $membro_id);
                break;
            case 'CERTIDÃO DE BAPTISMO':
                redirect('documento/cerdidaoBaptismo/' . $membro_id);
                break;
        }
        $this->load->view('documento/listar', $dados);
    }

    public function add()
    {
        $this->verificar_acesso();
        $this->db->where('estado_membro', 1);
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('documento/add', $dados);
    }

    public function addPost()
    {
        $this->verificar_acesso();
        $data['tipo_documento'] = $this->input->post('tipo_documento');
        $data['membro_id'] = $this->input->post('membro');
        $data['usuario_id'] = $this->session->userdata('id_usuario');

        //Verificar se o membro é casado
        if($data['tipo_documento'] == 'CERTIDÃO DE CASAMENTO'){
            $this->db->where('membro_homem_id', $$data['membro_id']);
            $dados['casamento'] = $this->db->get('casamento')->result();
            if(!$dados['casamento']){
                $this->session->set_flashdata('sms', 'Membro não é casado!!!');
                redirect('documento/add');
            }
        }

        //Verificar se o membro é baptisado
        if($data['tipo_documento'] == 'CERTIDÃO DE BAPTISMO'){
            $this->db->where('membro_id', $data['membro_id']);
            $dados['membro'] = $this->db->get('membro')->result();
            if(!$dados['membro'][0]->data_baptismo){
                $this->session->set_flashdata('sms', 'Membro não é baptisado!!!');
                redirect('documento/add');
            }
        }

        if ($this->db->insert('documento', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('documento '.$data['tipo_documento'].' criado');

            $this->session->set_flashdata('sms', 'documento adicionado com sucesso');
            redirect('documento/listar');
        }
    }

    public function cerdidaoCasamento($membro_id)
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

        $this->db->where('membro_homem_id', $membro_id);
        $dados['casamento'] = $this->db->get('casamento')->result();

        $this->load->model('membro_model');
        $dados['homem'] = $this->membro_model->ver($membro_id);
        $dados['mulher'] = $this->membro_model->ver($dados['casamento'][0]->membro_mulher_id);

        $html = $this->load->view('membro/docs/certidao_casamento', $dados)->output->final_output;

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Certidão de Casamento");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('Asadsaddas', 'E');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

    public function cerdidaoBaptismo($membro_id)
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

        $this->load->model('membro_model');
        $dados['membro'] = $this->membro_model->ver($membro_id);

        $html = $this->load->view('membro/docs/certidao_batismo', $dados)->output->final_output;

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Certidão de Baptismo");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('Asadsaddas', 'E');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

    public function testificacao($membro_id = null)
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

        $this->load->model('membro_model');
        $dados['documentos'] = $this->membro_model->ver($membro_id);

        $html = $this->load->view('membro/docs/testificacao', $dados)->output->final_output;

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Testificação");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('Asadsaddas', 'E');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

}
