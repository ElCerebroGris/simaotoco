<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Pagamento_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function guia_pagamento($id_aluno, $id_turma) {
        $this->db->where('pagamento.id_aluno', $id_aluno);
        $this->db->join('aluno', 'aluno.id_aluno=pagamento.id_aluno');
        $this->db->order_by('pagamento.id_pagamento');
        $dados['pagamento'] = $this->db->get('pagamento')->result();

        $this->db->where('id_turma', $id_turma);
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $dados['turma'] = $this->db->get('turma')->result();

        $msg = $this->load->view('pdf/guia_pagamento_mensal', $dados, true);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A7-P', 'margin-left' => 50]);
        $html = $msg;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function adicionar() {
        $data['id_aluno'] = $this->input->post('id_aluno');
        $data['id_tipo_pagamento'] = $this->input->post('tipo');
        $data['valor_pago'] = $this->input->post('valor');
        $data['multa'] = $this->input->post('multa');
        $data['id_turma'] = $this->input->post('id_turma');
        $data['referencia'] = $this->input->post('referencia');
        $data['data_criacao'] = date('d/m') . '/20' . date('y');
        
        if($data['multa'] == 1){
            $data['valor_pago'] += 500;
        }

        $this->load->model('Log_Model', 'log_model');
        $sms = 'adicionou o pagamento de ' . $data['id_aluno'] . ' do tipo ' . $data['id_tipo_pagamento'];
        $this->log_model->adicionar('Adicionar', $sms);

        return $this->db->insert('pagamento', $data);
    }

}
