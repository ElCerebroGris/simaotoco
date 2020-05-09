<?php

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
        $this->verificar_acesso();
        redirect('membro/listar');
    }

    public function listar()
    {
        $this->verificar_acesso();
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('identificacao', 'identificacao.pessoa_id=membro.pessoa_id');
        $dados['membros'] = $this->db->get('membro')->result();

        $this->load->view('membro/listar', $dados);
    }

    public function ver($id = null)
    {
        $this->verificar_acesso();
        $this->load->model('membro_model');
        $dados['membros'] = $this->membro_model->ver($id);
        $this->load->view('membro/ver', $dados);
    }

    public function add()
    {
        $this->verificar_acesso();
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $dados['tribos'] = $this->db->get('tribo')->result();
        $dados['areas'] = $this->db->get('area')->result();
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $dados['classes'] = $this->db->get('classe')->result();
        $dados['categorias'] = $this->db->get('categoria')->result();
        $dados['funcoes'] = $this->db->get('funcao')->result();
        $this->load->view('membro/add', $dados);
    }

    public function ativar($id) {
        $this->verificar_acesso();
        $data['estado_membro'] = 1;
        $this->db->where('membro_id', $id);
        if ($this->db->update('membro', $data)) {
            $this->session->set_flashdata('sms', 'membro atualizado com sucesso');
            redirect('membro/listar');
        }
    }

    public function desativar($id) {
        $this->verificar_acesso();
        $data['estado_membro'] = 0;
        $this->db->where('membro_id', $id);
        if ($this->db->update('membro', $data)) {
            $this->session->set_flashdata('sms', 'membro atualizado com sucesso');
            redirect('membro/listar');
        }
    }

    public function request()
    {
        $postData = $_REQUEST;
        $postData = array_map('strip_tags', $postData);
        $postData = array_map('trim', $postData);

        $action = $postData['action'];
        unset($postData['action']);

        $pessoa = array();
        $identificacao = array();
        $eclesiastes = array();

        switch ($action) {
            case 'foto':
                //$json['error'] = true;
                //$json['errMessage'] = 'Formato Inválido!';
                //var_dump($this->session->userdata('foto_atual'));
                //die();
                if($this->session->userdata('foto_atual')){
                    unlink('./fotos/'.$this->session->userdata('foto_atual'));
                }
                if ($this->do_upload()) {
                    $json['success'] = true;
                } else {
                    $json['error'] = true;
                    $json['errMessage'] = 'Erro ao carregar a foto, verifique o tamanho!';
                }
                break;
            case 'eclesis':

                $eclesiastes = [
                    'area_id' => $postData['area'],
                    'classe_id' => $postData['classe'],
                    'data_admissao' => $postData['data_admissao'],
                    'categoria_id' => $postData['categoria'],
                    'data_baptismo' => $postData['data_baptismo'],
                    'funcao_id' => $postData['funcao'],
                ];
                $this->session->set_userdata('eclesiastes', $eclesiastes);
                $json['success'] = true;
                break;
            case 'personal':
                $pessoa = [
                    'pessoa_nome' => $postData['nome_membro'],
                    'nome_pai' => $postData['nome_pai'],
                    'nome_mae' => $postData['nome_mae'],
                    'nacionalidade_id' => $postData['nacionalidade'],
                    'data_nascimento' => $postData['data_nascimento'],
                    'provincia_nascimento' => $postData['provincia_nascimento'],
                    'municipio_nascimento' => $postData['data_nascimento'],
                    'sexo' => $postData['sexo'],
                    'estado_civil' => $postData['estado_civil'],
                    'telefone' => $postData['telefone'],
                    'foto' => $this->session->userdata('foto_atual'),
                    'endereco' => $postData['endereco'],
                ];

                //$this->session->set_userdata('personal', $dados['personal']);

                //Salvar Pessoa
                $pessoa_id = null;
                if ($this->db->insert('pessoa', $pessoa)) {
                    $this->db->where('pessoa_nome', $pessoa['pessoa_nome']);
                    $dados1['pessoa'] = $this->db->get('pessoa')->result();
                    $pessoa_id = $dados1['pessoa'][0]->pessoa_id;
                } else {
                    $json['error'] = true;
                    $json['errMessage'] = 'Erro! Impossível avançar.';
                }

                //Salvar Identificacao
                $identificacao = [
                    'pessoa_id' => $pessoa_id,
                    'descricao_identificacao' => $postData['identificacao'],
                    'tipo_identificacao' => $postData['tipo'],
                ];
                if (!$this->db->insert('identificacao', $identificacao)) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Erro! Impossível avançar.';
                } else {
                    /*Atualizar Foto
                    rename("./fotos/" . $this->session->userdata('foto_atual'),
                        "./fotos/" . $identificacao['descricao_identificacao']
                        . $this->session->userdata('formato_foto'));
                    */
                }

                //Salvar Membro
                $eclesiastes = $this->session->userdata('eclesiastes');
                $eclesiastes['pessoa_id'] = $pessoa_id;
                if (!$this->db->insert('membro', $eclesiastes)) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Erro! Impossível avançar.';
                }
                $this->load->model('log_model');
                $this->log_model->adicionar('membro '.$pessoa['pessoa_nome'].' adicionado');
                $this->session->unset_userdata('foto_atual');
                $json['finish'] = true;
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
        $this->verificar_acesso();
        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'centurygothic',
            'mode' => 'utf-8',
            'format' => [153.1, 240.9],
            'orientation' => 'L',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 0    
        ]);

        
        $this->load->model('membro_model');
        $data['membro'] = $this->membro_model->ver($member_id);
        // var_dump($data);
        // die();
        $html = $this->load->view('membro/cartao', $data)->output->final_output;

        $mpdf->SetTitle('Cartão de Membro');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

    public function do_upload()
    {
        if (!file_exists("./fotos/")) {
            mkdir('./fotos/');
        }
        $config['upload_path'] = './fotos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            //echo json_encode($error);
            return false;
        } else {
            //$data = array('upload_data' => $this->upload->data());
            $this->session->set_userdata('foto_atual', $this->upload->data('file_name'));
            //$this->session->set_userdata('formato_foto', $this->upload->data('file_ext'));
            //echo json_encode($data);
            return true;
        }
    }
}
