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
        } else if ($id == 2) {
            $this->db->where('tipo', 'RECEITA');
            $this->db->where('estado_tipo', 1);
            $data = $this->db->get('tipo_pagamento')->result();
            $json['success'] = true;
            $json['content'] = $data;
            echo json_encode($json);
        } else {
            $this->db->where('tipo', 'DESPESA');
            $this->db->where('estado_tipo', 1);
            $data = $this->db->get('tipo_pagamento')->result();
            $json['success'] = true;
            $json['content'] = $data;
            echo json_encode($json);
        }
    }

    public function ver($id)
    {
        $this->verificar_acesso();
        $this->db->where('membro.membro_id', $id);
        $this->db->join('membro', 'membro.membro_id=pagamento.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('usuario', 'usuario.usuario_id=pagamento.usuario_id');
        $data = $this->db->get('pagamento')->result();
        if($data){
            $json['success'] = true;
            $json['content'] = $data[0];
            echo json_encode($json);
        }else{
            $json['error'] = true;
            $json['content'] = array();
            echo json_encode($json);
        }
    }

    public function tipos()
    {
        $this->verificar_acesso();
        $dados['tipos'] = $this->db->get('tipo_pagamento')->result();
        $this->load->view('pagamento/tipos', $dados);
    }

    public function addTipoPost()
    {
        $this->verificar_acesso();
        $data['tipo'] = $this->input->post('tipo');
        $data['descricao'] = $this->input->post('descricao');;

        if($data['tipo']=='0'){
            $this->session->set_flashdata('sms', 'Selecione um tipo...');
            redirect('pagamento/tipos');
        }

        if ($this->db->insert('tipo_pagamento', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('tipo pagamento de ' . $data['descricao']);

            $this->session->set_flashdata('sms', 'Tipo de Pagamento registrado com sucesso');
            redirect('pagamento/tipos');
        }
    }

    public function ativar_tipo($id) {
        $this->verificar_acesso();
        $data['estado_tipo'] = 1;
        $this->db->where('tipo_pagamento_id', $id);
        if ($this->db->update('tipo_pagamento', $data)) {
            $this->session->set_flashdata('sms', 'tipo de pagamento atualizado com sucesso');
            redirect('pagamento/tipos');
        }
    }

    public function desativar_tipo($id) {
        $this->verificar_acesso();
        $data['estado_tipo'] = 0;
        $this->db->where('tipo_pagamento_id', $id);
        if ($this->db->update('tipo_pagamento', $data)) {
            $this->session->set_flashdata('sms', 'tipo de pagamento atualizado com sucesso');
            redirect('pagamento/tipos');
        }
    }

    public function listar()
    {
        $this->verificar_acesso();
        $this->db->select('tipo_pagamento.tipo, tipo_pagamento.descricao, pessoa.pessoa_nome,
        pagamento.valor, pagamento.moeda, pagamento.data_criacao, pagamento.pagamento_id');
        $this->db->join('membro', 'membro.membro_id=pagamento.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id=membro.pessoa_id');
        $this->db->join('tipo_pagamento', 'tipo_pagamento.tipo_pagamento_id=pagamento.tipo_pagamento');
        $dados['pagamentos'] = $this->db->get('pagamento')->result();
        $this->load->view('pagamento/listar', $dados);
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
        $data['descricao'] = $this->input->post('descricao');
        $data['valor'] = $this->input->post('valor');
        $data['moeda'] = $this->input->post('moeda');
        $data['modo_pagamento'] = $this->input->post('modo_pagamento');

        if ($data['tipo_pagamento'] == 'RECEITA') {
            $data['referencia_transacao'] = $this->input->post('referencia_transacao');
            $data['data_transacao'] = $this->input->post('data_transacao');
            if (!$this->verificar_referencia($data['referencia_transacao'], $data['data_transacao'])) {
                $this->session->set_flashdata('sms', 'Referencia já usada nesta data');
                redirect('pagamento/addCaixa');
            }
        }

        if ($this->db->insert('pagamento', $data)) {
            $this->load->model('log_model');
            $this->log_model->adicionar('pagamento de ' . $data['membro_id']
                . ' registrado no valor de ' . $data['valor']);

            $this->session->set_flashdata('sms', 'Pagamento registrado com sucesso');
            redirect('pagamento/listar');
        }
    }

    public function verificar_referencia($ref, $data)
    {
        $this->verificar_acesso();
        $where = "referencia_transacao='$ref' AND data_transacao='$data'";
        $this->db->where($where);
        $dados['pagamentos'] = $this->db->get('pagamento')->result();
        return count($dados['pagamentos']) == 0;
    }

    public function relatorios()
    {
        $this->verificar_acesso();
        $this->load->view('pagamento/relatorio');
    }

    public function gerarRelatorio($testificacao_id = null)
    {
        // $this->verificar_acesso();
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 10,
            'margin_footer' => 10,
            'orientation' => 'L'
        ]);

        $data = array_map('trim', $_POST);
        $data = array_map('strip_tags', $data);
        $data = array_map('htmlspecialchars', $data);
        $data = (object)$data;

        $start_date = date("Y-m-d", strtotime($data->data_inicio));
        $end_date = date("Y-m-d", strtotime($data->data_fim));
        $dados['data_inicio'] = date('d/m/Y', strtotime($start_date));
        $dados['data_fim'] = date('d/m/Y', strtotime($end_date));

        $this->db->select('
                            pessoa.pessoa_nome as nome_membro, 
                            provincia_eclesiastica.descricao_provincia_eclesiastica as provincia, 
                            paroquia.descricao_paroquia as paroquia, 
                            classe.descricao_classe as classe,
                            tribo.descricao_tribo	 as tribo,
                            area.descricao_area as area,
                            pagamento.mes_referencia as mes,
                            pagamento.valor as valor,
                            pagamento.moeda as moeda,
                            pagamento.tipo as tipo,
                            pagamento.tipo_pagamento as tipo_pagamento,
                            pagamento.modo_pagamento as modo_pagamento
                            ');

        $this->db->join('membro', 'membro.membro_id = pagamento.membro_id');
        $this->db->join('pessoa', 'pessoa.pessoa_id = membro.pessoa_id');

        $this->db->join('classe', 'classe.classe_id = membro.classe_id');
        $this->db->join('paroquia', 'paroquia.paroquia_id = classe.paroquia_id');
        $this->db->join('provincia_eclesiastica', 'provincia_eclesiastica.provincia_eclesiastica_id = paroquia.provincia_eclesiastica_id');

        $this->db->join('area', 'area.area_id = membro.area_id');
        $this->db->join('tribo', 'tribo.tribo_id = area.tribo_id');

        if ($data->tipo == "1") {
            $this->db->where_in("tipo_pagamento", ["DIZIMO", "QUOTA", "RECEITA", "DESPESA"]);
        } elseif ($data->tipo == "2") {
            $this->db->where("tipo_pagamento", "DIZIMO");
            $dados['tipo'] = "DIZIMOS";
        } elseif ($data->tipo == "3") {
            $dados['tipo'] = "QUOTAS";
            $this->db->where("tipo_pagamento", "QUOTA");
        }

        $this->db->where("date(pagamento.data_criacao) BETWEEN '{$start_date}' AND '{$end_date}'");

        $this->db->order_by('pagamento_id DESC');

        $dados['pagamentos'] = $this->db->get('pagamento')->result();

        if ($data->tipo == "2" || $data->tipo == "3") {
            $html = $this->load->view('membro/docs/controle', $dados)->output->final_output;
        } else {
            if ($data->tipo == "1") {
                $dados["pagamentos"] = $this->orderFolhaCaixa($dados['pagamentos']);
            }
            $dados['tipo'] = "FOLHA DE CAIXA";
            $html = $this->load->view('membro/docs/pagamento', $dados)->output->final_output;
        }

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle($dados['tipo']);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter('Asadsaddas', 'E');
        $mpdf->WriteHTML($html);
        $mpdf->Output('cartao_de_membro.pdf', 'I');
    }

    public function orderFolhaCaixa($data)
    {
        if (!count($data)) {
            return $data;
        }

        $newData = [];
        $incomeTypes = [
            'DIZIMO' => 'Dizimo',
            'QUOTA' => 'Quota',
            'OUTRO' => 'Outro',
            'Oferta_dominical' => 'Oferta dominical',
            'Oferta_voluntarias' => 'Oferta voluntárias',
            'Oferta_culto_4_feira' => 'Oferta culto 4ª feira',
            'Oferta_culto_6_feira' => 'Oferta voluntárias',
            'Oferta_culto_Sabado' => 'Oferta Culdo de Sábado',
            'Oferta_Santa_Ceia' => 'Oferta Santa Ceia',
            'Oferta_Jejum' => 'Oferta Jejum'
        ];

        $outcomeTypes= [
            'Material_de_Escritorio_Gastaveis' => 'Material de Escritório - Gastaveis',
            'Material_de_Escritorio_Equipamentos' => 'Material de Escritório - Equipamentos'
        ];

        foreach ($incomeTypes as $keyType => $type) {

            $newData['income'][$keyType]['type'] = $type;
            $newData['income'][$keyType]['kz'] = 0;
            $newData['income'][$keyType]['usd'] = 0;
            $newData['income'][$keyType]['euro'] = 0;
            $newData['income'][$keyType]['zar'] = 0;
            $newData['income'][$keyType]['other_coin'] = 0;

            foreach ($data as  $payment) {

                if ($payment->tipo == $keyType) {

                    switch ($payment->moeda) {
                        case 'AKZ':
                            $newData['income'][$keyType]['kz'] = $newData['income'][$keyType]['kz'] += $payment->valor;
                            break;
                        case 'USD':
                            $newData['income'][$keyType]['usd'] = $newData['income'][$keyType]['usd'] += $payment->valor;
                            break;
                        case 'EURO':
                            $newData['income'][$keyType]['euro'] = $newData['income'][$keyType]['euro']  += $payment->valor;
                            break;
                        case 'ZAR':
                            $newData['income'][$keyType]['zar'] = $newData['income'][$keyType]['zar'] += $payment->valor;
                            break;

                        default:
                            $newData['income'][$keyType]['other_coin'] = $newData['income'][$keyType]['other_coin'] += $payment->valor;
                            break;
                    }
                }
            }
        }

        foreach ($outcomeTypes as $keyType => $type) {

            $newData['outcome'][$keyType]['type'] = $type;
            $newData['outcome'][$keyType]['kz'] = 0;
            $newData['outcome'][$keyType]['usd'] = 0;
            $newData['outcome'][$keyType]['euro'] = 0;
            $newData['outcome'][$keyType]['zar'] = 0;
            $newData['outcome'][$keyType]['other_coin'] = 0;

            foreach ($data as  $payment) {

                if ($payment->tipo == $keyType) {

                    switch ($payment->moeda) {
                        case 'AKZ':
                            $newData['outcome'][$keyType]['kz'] = $newData['outcome'][$keyType]['kz'] += $payment->valor;
                            break;
                        case 'USD':
                            $newData['outcome'][$keyType]['usd'] = $newData['outcome'][$keyType]['usd'] += $payment->valor;
                            break;
                        case 'EURO':
                            $newData['outcome'][$keyType]['euro'] = $newData['outcome'][$keyType]['euro']  += $payment->valor;
                            break;
                        case 'ZAR':
                            $newData['outcome'][$keyType]['zar'] = $newData['outcome'][$keyType]['zar'] += $payment->valor;
                            break;

                        default:
                            $newData['outcome'][$keyType]['other_coin'] = $newData['outcome'][$keyType]['other_coin'] += $payment->valor;
                            break;
                    }
                }
            }
        }
        
        return $newData;
    }
}
