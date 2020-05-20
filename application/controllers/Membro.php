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
    public function editar($id)
    {
        $this->verificar_acesso();
        $this->load->model('membro_model');
        $dados['nacionalidades'] = $this->db->get('nacionalidade')->result();
        $dados['tribos'] = $this->db->get('tribo')->result();
        $dados['areas'] = $this->db->get('area')->result();
        $dados['igreja_nacionais'] = $this->db->get('igreja_nacional')->result();
        $dados['provincia_eclesiasticas'] = $this->db->get('provincia_eclesiastica')->result();
        $dados['paroquias'] = $this->db->get('paroquia')->result();
        $dados['classes'] = $this->db->get('classe')->result();
        $dados['categorias'] = $this->db->get('categoria')->result();
        $dados['funcoes'] = $this->db->get('funcao')->result();
        
        $dados['membro'] = $this->membro_model->ver($id);

        if (!$dados['membro']) {
            $this->session->set_flashdata('sms', 'Aviso! O <b>Membro</b> solicitado não existe');
            redirect('membro/listar');
        }

        // var_dump($dados['membro']);
        // die();
        $this->load->view('membro/edit', $dados);
    }

    public function is_empty(array $data, array $not_required)
    {
        foreach (array_keys($data) as $field) {

            if (in_array($field, $not_required)) {
                continue;
            }

            if (!$data[$field]) {
                //Removel Underscore
                $field = str_replace('_', ' ', $field);
                return "<b>" . ucwords($field) . "</b> é um campo obrigatório!";
            }
        }

        return false;
    }

    public function check_ID($tipo, $descricao, $pessoa_id = NULL)
    {

        if ($pessoa_id) {
            $this->db->where('pessoa_id !=', $pessoa_id);
        }

        $this->db->where('tipo_identificacao', $tipo);
        $this->db->where('descricao_identificacao', $descricao);

        $member_id = $this->db->get('identificacao')->result();

        if (!$member_id) {
            return false;
        }

        return true;
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
                if ($this->session->userdata('foto_atual')) {
                    unlink('./fotos/' . $this->session->userdata('foto_atual'));
                }
                if ($this->do_upload()) {
                    $json['success'] = true;
                } else {
                    $json['error'] = true;
                    $json['errMessage'] = 'Erro ao carregar a foto! Selecione uma imagem com um formato é válido!';
                }
                break;
            case 'eclesis':

                $not_required = ["data_baptismo", "local_baptismo"];

                if ($postData['data_baptismo']) {
                    $not_required = [];
                }

                $__empty_fields = $this->is_empty($postData, $not_required);
                if ($__empty_fields) {
                    $json['error'] = true;
                    $json['errMessage'] = $__empty_fields;
                    echo json_encode($json);
                    return;
                }

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

                $not_required = ["telefone", "endereco"];
                $__empty_fields = $this->is_empty($postData, $not_required);
                if ($__empty_fields) {
                    $json['error'] = true;
                    $json['errMessage'] = $__empty_fields;
                    echo json_encode($json);
                    return;
                }

                if ($this->check_ID($postData['tipo'], $postData['identificacao'])) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Ooops! Este número de identificação já está em uso!';
                    echo json_encode($json);
                    return;
                }

                $pessoa = [
                    'pessoa_nome' => $postData['nome_membro'],
                    'nome_pai' => $postData['nome_pai'],
                    'nome_mae' => $postData['nome_mae'],
                    'nacionalidade_id' => $postData['nacionalidade'],
                    'data_nascimento' => $postData['data_nascimento'],
                    'provincia_nascimento' => $postData['provincia_nascimento'],
                    'municipio_nascimento' => $postData['municipio_nascimento'],
                    'sexo' => $postData['sexo'],
                    'estado_civil' => $postData['estado_civil'],
                    'telefone' => $postData['telefone'],
                    'foto' => $this->session->userdata('foto_atual'),
                    'endereco' => $postData['endereco'],
                ];

                //Salvar Pessoa
                $pessoa_id = null;
                if ($this->db->insert('pessoa', $pessoa)) {
                    $pessoa_id = $this->db->insert_id();
                } else {
                    $json['error'] = true;
                    $json['errMessage'] = 'Desculpe! Não foi possível cadastrar.';
                    echo json_encode($json);
                    return;
                }

                //Salvar Identificacao
                $identificacao = [
                    'pessoa_id' => $pessoa_id,
                    'descricao_identificacao' => $postData['identificacao'],
                    'tipo_identificacao' => $postData['tipo'],
                ];

                if (!$this->db->insert('identificacao', $identificacao)) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Desculpe! Não foi possível cadastrar.';
                    echo json_encode($json);
                    return;
                }

                //Salvar Membro
                $eclesiastes = $this->session->userdata('eclesiastes');
                $eclesiastes['pessoa_id'] = $pessoa_id;
                if (!$this->db->insert('membro', $eclesiastes)) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Erro! Impossível avançar.';
                }

                $this->session->set_flashdata('sms', 'Cadastro feito com sucesso!');
                $this->session->unset_userdata('foto_atual');
                $json['finish'] = true;
                $json['redirect'] = base_url()."membro/listar";
                break;

            default:
                $json['error'] = true;
                $json['errMessage'] = 'Erro! Impossível avançar.';
                break;
        }

        echo json_encode($json);
    }

    public function requestedit()
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

                $this->session->set_userdata('foto_atual', $postData['foto_atual']);

                if ($_FILES['foto']['name']) {

                    if ($this->session->userdata('foto_atual')) {
                        unlink('./fotos/' . $this->session->userdata('foto_atual'));
                    }

                    if (!$this->do_upload()) {
                        $json['error'] = true;
                        $json['errMessage'] = 'Erro ao carregar a foto! Selecione uma imagem com um formato é válido!';
                    }

                    $json['success'] = true;
                }

                $json['success'] = true;

                break;
            case 'eclesis':

                $not_required = ["data_baptismo", "local_baptismo"];

                if ($postData['data_baptismo']) {
                    $not_required = [];
                }

                $__empty_fields = $this->is_empty($postData, $not_required);
                if ($__empty_fields) {
                    $json['error'] = true;
                    $json['errMessage'] = $__empty_fields;
                    echo json_encode($json);
                    return;
                }

                $eclesiastes = [
                    'area_id' => $postData['area'],
                    'classe_id' => $postData['classe'],
                    'data_admissao' => $postData['data_admissao'],
                    'categoria_id' => $postData['categoria'],
                    'data_baptismo' => $postData['data_baptismo'],
                    'local_baptismo' => $postData['local_baptismo'],
                    'funcao_id' => $postData['funcao'],
                ];
                $this->session->set_userdata('eclesiastes', $eclesiastes);
                $json['success'] = true;
                break;
            case 'personal':
                $pessoa_id = $postData['pessoa_id'];

                $not_required = ["telefone", "endereco"];
                $__empty_fields = $this->is_empty($postData, $not_required);
                if ($__empty_fields) {
                    $json['error'] = true;
                    $json['errMessage'] = $__empty_fields;
                    echo json_encode($json);
                    return;
                }

                if ($this->check_ID($postData['tipo'], $postData['identificacao'], $pessoa_id)) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Ooops! Este número de identificação já está em uso!';
                    echo json_encode($json);
                    return;
                }

                $pessoa = [
                    'pessoa_nome' => $postData['nome_membro'],
                    'nome_pai' => $postData['nome_pai'],
                    'nome_mae' => $postData['nome_mae'],
                    'nacionalidade_id' => $postData['nacionalidade'],
                    'data_nascimento' => $postData['data_nascimento'],
                    'provincia_nascimento' => $postData['provincia_nascimento'],
                    'municipio_nascimento' => $postData['municipio_nascimento'],
                    'sexo' => $postData['sexo'],
                    'estado_civil' => $postData['estado_civil'],
                    'telefone' => $postData['telefone'],
                    'foto' => $this->session->userdata('foto_atual'),
                    'endereco' => $postData['endereco'],
                ];

                //Salvar Pessoa
                $this->db->where('pessoa_id', $pessoa_id);
                if (!$this->db->update('pessoa', $pessoa)) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Desculpe! Não foi possível cadastrar.';
                    echo json_encode($json);
                    return;
                }

                //Salvar Identificacao
                $identificacao = [
                    'pessoa_id' => $pessoa_id,
                    'descricao_identificacao' => $postData['identificacao'],
                    'tipo_identificacao' => $postData['tipo'],
                ];

                $this->db->where('pessoa_id', $pessoa_id);
                if (!$this->db->update('identificacao', $identificacao)) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Desculpe! Não foi possível cadastrar.';
                    echo json_encode($json);
                    return;
                }

                //Salvar Membro
                $eclesiastes = $this->session->userdata('eclesiastes');
                $eclesiastes['pessoa_id'] = $pessoa_id;
                $this->db->where('pessoa_id', $pessoa_id);
                if (!$this->db->update('membro', $eclesiastes)) {
                    $json['error'] = true;
                    $json['errMessage'] = 'Erro! Impossível avançar.';
                }

                $this->session->set_flashdata('sms', 'Dados Atualizados com sucesso!');
                $this->session->unset_userdata('foto_atual');
                $json['finish'] = true;
                $json['redirect'] = base_url()."membro/listar";
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
        $QRCodeDir = __DIR__ . '/../../libs/phpqrcode';

        require_once $QRCodeDir . '/qrlib.php';

        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'centurygothic',
            'mode' => 'utf-8',
            'format' => [153.1, 240.9],
            'orientation' => 'L',
            'margin_left' => 8,
            'margin_right' => 3,
            'margin_top' => 6,
            'margin_bottom' => 0
        ]);


        $this->load->model('membro_model');
        $data['membro'] = $this->membro_model->ver($member_id);

        if (!$data['membro']) {
            $this->session->set_flashdata('sms', 'Não é possível imprimir o cartão!');
            redirect('membro/listar');
        }

        $genero = ($data['membro']->sexo == 'MASCULINO') ? "Filho de: " : "Filha de: ";

        $qr_data =  "Nome: " . $data['membro']->pessoa_nome . "\n";
        $qr_data .= $genero . $data['membro']->nome_pai . "\n";
        $qr_data .= "E de: " . $data['membro']->nome_mae . "\n";
        $qr_data .= "Categoria: " . $data['membro']->descricao_categoria . "\n";
        $qr_data .= "Data de Nascimento: " . $data['membro']->data_nascimento . "\n";
 
        QRcode::png(utf8_encode($qr_data), $QRCodeDir . '/generated/' . $data['membro']->descricao_identificacao . '.png');

        $data['qr_data'] = "<img width='90px' src='" . base_url() . "libs/phpqrcode/generated/" . $data['membro']->descricao_identificacao . ".png'>";

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
            return false;
        } else {
            //$data = array('upload_data' => $this->upload->data());
            $this->session->set_userdata('foto_atual', $this->upload->data('file_name'));
            //$this->session->set_userdata('formato_foto', $this->upload->data('file_ext'));
            //echo json_encode($data);
            return true;
        }
    }

    //AJAX REQUESTS

    public function areasByTribo($data_id)
    {
        $this->db->where('tribo_id', $data_id);
        $data = $this->db->get('area')->result();

        if (!$data) {
            $json['error'] = true;
            echo json_encode($json);
            return;
        }

        $json['success'] = true;
        $json['content'] = $data;
        echo json_encode($json);
    }

    public function pEclesiasticasByIgreja($data_id)
    {
        $this->db->where('igreja_nacional_id', $data_id);
        $data = $this->db->get('provincia_eclesiastica')->result();

        if (!$data) {
            $json['error'] = true;
            echo json_encode($json);
            return;
        }

        $json['success'] = true;
        $json['content'] = $data;
        echo json_encode($json);
    }

    public function paroquiasBypEclesiastica($data_id)
    {
        $this->db->where('provincia_eclesiastica_id', $data_id);
        $data = $this->db->get('paroquia')->result();

        if (!$data) {
            $json['error'] = true;
            echo json_encode($json);
            return;
        }

        $json['success'] = true;
        $json['content'] = $data;
        echo json_encode($json);
    }

    public function classesByParoquia($data_id)
    {
        $this->db->where('paroquia_id', $data_id);
        $data = $this->db->get('classe')->result();

        if (!$data) {
            $json['error'] = true;
            echo json_encode($json);
            return;
        }

        $json['success'] = true;
        $json['content'] = $data;
        echo json_encode($json);
    }
}
