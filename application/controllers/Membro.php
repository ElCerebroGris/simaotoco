<?php
require __DIR__ . '/../../vendor/autoload.php';
defined('BASEPATH') or exit('No direct script access allowed');

class Membro extends CI_Controller
{

    public function verificar_acesso()
    {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index()
    {
        redirect('membro/listar');
    }

    public function listar()
    {
        $this->db->join('identificacao', 'identificacao.id_identificacao=membro.id_identificacao');
        $dados['membros'] = $this->db->get('membro')->result();
        $this->load->view('membro/listar', $dados);
    }

    public function ver($id = null)
    {
        $this->db->where('id_membro', $id);
        $this->db->join('identificacao', 'identificacao.id_identificacao=membro.id_identificacao');
        $dados['membros'] = $this->db->get('membro')->result();

        $this->db->where('id_membro', $id);
        $dados['documentos'] = $this->db->get('membro_documento')->result();
        $this->load->view('membro/ver', $dados);
    }

    public function add()
    {
        $dados['estado_civil'] = $this->db->get('estado_civil')->result();
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $dados['tipo_identificacao'] = $this->db->get('tipo_identificacao')->result();
        $this->load->view('membro/add', $dados);
    }

    public function addPost()
    {
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

        if ($this->db->insert('identificacao', $data1)) {

            $this->db->where('descricao_identificacao', $data1['descricao_identificacao']);
            $dados1['identificacao'] = $this->db->get('identificacao')->result();

            $data['id_identificacao'] = $dados1['identificacao'][0]->id_identificacao;
            if ($this->db->insert('membro', $data)) {
                $this->session->set_flashdata('sms', 'Reserva adicionado com sucesso');
                redirect('membro/listar');
            }
        }
    }

    public function remover($id = null)
    {
        $this->verificar_acesso();

        $this->db->where('id_reserva', $id);
        $this->db->delete('reserva');

        redirect('reserva');
    }


    public function request()
    {
        $postData = $_REQUEST;
        $postData = array_map('strip_tags', $postData);
        $postData = array_map('trim', $postData);

        $action = $postData['action'];
        unset($postData['action']);
        
        switch ($action) {
            case 'foto':
                $dados['files'] = $_FILES;
                // $this->session->set_userdata($dados);
                $json['foto'] = $dados['files'];
                $json['success'] = true;
                break;
            case 'personal':

                $dados['personal'] = [
                    'id' => $postData['identificacao'],
                    'tipo_id' => $postData['tipo_id']
                ];
                
                $this->session->set_userdata($dados);
                $json['personal'] = $dados['personal'];
                $json['success'] = true;
                break;
            case 'other':
                $dados['other']['nacionalidade'] = $postData['nacionalidade'];
                $dados['other']['data_nascimento'] = $postData['data_nascimento'];
                $dados['other']['estado_civil'] = $postData['estado_civil'];
                $dados['other']['endereco'] = $postData['endereco'];

                $this->session->set_userdata($dados);
                $json['other'] = $dados['other'];
                $json['finish'] = true;
                echo json_encode($this->session->userdata());
                return;
                break;

            default:
                $json['error'] = true;
                $json['errMessage'] = 'Erro! Impossível avançar.';
                break;
        }

        echo json_encode($json);
    }

    public function cartao($member_id)
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => [153.1, 240.9],
            'orientation' => 'L',
            'margin_left' => 10,
            'margin_right' => 11,
            'margin_top' => 15,
            'margin_bottom' => 0
        ]);

        $data['stylesheet'] = file_get_contents(base_url() . 'libs/dist/css/card.css');
        $html = $this->load->view('membro/cartao', $data)->output->final_output;
        // var_dump($stylesheet);
        // die();
        // $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->SetTitle('My Title');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }
}