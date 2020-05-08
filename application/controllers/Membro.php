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
        $this->db->where('id_membro', $id);
        $this->db->join('igreja_nacional', 'igreja_nacional.id_igreja_nacional=membro.id_igreja_nacional');
        $this->db->join(
            'provincia_eclesiastica',
            'provincia_eclesiastica.id_provincia_eclesiastica=membro.id_provincia_eclesiastica'
        );
        $this->db->join('paroquia', 'paroquia.id_paroquia=membro.id_paroquia');
        $this->db->join('classe', 'classe.id_classe=membro.id_classe');
        $this->db->join('categoria', 'categoria.id_categoria=membro.id_categoria');
        $this->db->join('funcao', 'funcao.id_funcao=membro.id_funcao');
        $this->db->join('tribo', 'tribo.id_tribo=membro.id_tribo');
        $this->db->join('estado_civil', 'estado_civil.id_estado_civil=membro.id_estado_civil');
        $this->db->join('nacionalidade', 'nacionalidade.id_nacionalidade=membro.id_nacionalidade');
        $this->db->join('identificacao', 'identificacao.id_identificacao=membro.id_identificacao');
        $dados['membros'] = $this->db->get('membro')->result();

        $this->db->where('id_membro', $id);
        $dados['documentos'] = $this->db->get('membro_documento')->result();
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

    public function addPost()
    {
        $this->verificar_acesso();
        //Pessoa
        //var_dump($this->session->userdata());
        //die();
        $data1['nacionalidade_id'] = $this->session->userdata('personal')['nacionalidade'];
        $data1['pessoa_nome'] = $this->session->userdata('personal')['pessoa_nome'];
        $data1['nome_pai'] = $this->session->userdata('personal')['nome_pai'];
        $data1['nome_mae'] = $this->session->userdata('personal')['nome_mae'];
        $data1['data_nascimento'] = $this->session->userdata('personal')['data_nascimento'];
        $data1['provincia_nascimento'] = $this->session->userdata('personal')['provincia_nascimento'];
        $data1['municipio_nascimento'] = $this->session->userdata('personal')['municipio_nascimento'];
        $data1['telefone'] = $this->session->userdata('personal')['telefone'];
        $data1['endereco'] = $this->session->userdata('personal')['endereco'];
        $data1['estado_civil'] = $this->session->userdata('personal')['estado_civil'];
        $data1['sexo'] = $this->session->userdata('personal')['sexo'];
        if ($this->db->insert('pessoa', $data1)) {
            $this->db->where('pessoa_nome', $data1['pessoa_nome']);
            $dados1['pessoa'] = $this->db->get('pessoa')->result();
            $pessoa_id = $dados1['pessoa'][0]->pessoa_id;
        }else {
            redirect('membro/add');
        }

        //Identificação
        $data3['pessoa_id'] = $pessoa_id;
        $data3['descricao_identificacao'] = $this->session->userdata('personal')['identificacao'];
        $data3['tipo_identificacao'] = $this->session->userdata('personal')['tipo'];
        if (!$this->db->insert('identificacao', $data3)) {
            redirect('membro/add');
        }

        //Membro
        $data['pessoa_id'] = $pessoa_id;
        $data['area_id'] = $this->session->userdata('eclesiastes')['area'];
        $data['classe_id'] = $this->session->userdata('eclesiastes')['classe'];
        $data['data_admissao'] = $this->session->userdata('eclesiastes')['data_admissao'];
        $data['data_baptismo'] = $this->session->userdata('eclesiastes')['data_baptismo'];
        $data['categoria_id'] = $this->session->userdata('eclesiastes')['categoria'];
        $data['funcao_id'] = $this->session->userdata('eclesiastes')['funcao'];      
        if ($this->db->insert('membro', $data)) {
            redirect('membro/listar');
        }else {
            redirect('membro/add');
        }
        
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
                $this->session->set_userdata('files', $_FILES);
                $json['success'] = true;
                // $json['error'] = true;
                // $json['errMessage'] = 'Formato Inválido!';
                break;
            case 'eclesis':

                $dados['eclesiastes'] = [
                    'area' => $postData['area'],
                    'classe' => $postData['classe'],
                    'data_admissao' => $postData['data_admissao'],
                    'categoria' => $postData['categoria'],
                    'data_baptismo' => $postData['data_baptismo'],
                    'funcao' => $postData['funcao']
                ];

                $this->session->set_userdata('eclesiastes', $dados['eclesiastes']);
                $json['success'] = true;
                break;
            case 'personal':
                $dados['personal'] = [
                    'pessoa_nome' => $postData['nome_membro'],
                    'nome_pai' => $postData['nome_pai'],
                    'nome_mae' => $postData['nome_mae'],
                    'identificacao' => $postData['identificacao'],
                    'tipo' => $postData['tipo'],
                    'nacionalidade' => $postData['nacionalidade'],
                    'data_nascimento' => $postData['data_nascimento'],
                    'provincia_nascimento' => $postData['provincia_nascimento'],
                    'municipio_nascimento' => $postData['data_nascimento'],
                    'sexo' => $postData['sexo'],
                    'estado_civil' => $postData['estado_civil'],
                    'telefone' => $postData['telefone'],
                    'endereco' => $postData['endereco']
                ];
                $this->session->set_userdata('personal', $dados['personal']);
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

        $mpdf->SetTitle('My Title');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }
}
